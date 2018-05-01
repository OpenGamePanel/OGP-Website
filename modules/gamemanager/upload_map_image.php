<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

require_once("modules/config_games/server_config_parser.php");

function smart_resize_image($file,
							$string			 = null,
							$width			  = 0, 
							$height			 = 0, 
							$proportional	   = false, 
							$output			 = 'file', 
							$delete_original	= true, 
							$use_linux_commands = false,
							$quality = 100) {

	if ( $height <= 0 && $width <= 0 ) return false;
	if ( $file === null && $string === null ) return false;

	# Setting defaults and meta
	$info						 = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
	$image						= '';
	$final_width				  = 0;
	$final_height				 = 0;
	list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;

	# Calculating proportionality
	if ($proportional)
	{
	  if	  ($width  == 0)$factor = $height/$height_old;
	  elseif  ($height == 0)$factor = $width/$width_old;
	  else					$factor = min( $width / $width_old, $height / $height_old );

	  $final_width  = round( $width_old * $factor );
	  $final_height = round( $height_old * $factor );
	}
	else
	{
		$final_width = ( $width <= 0 ) ? $width_old : $width;
		$final_height = ( $height <= 0 ) ? $height_old : $height;
		$widthX = $width_old / $width;
		$heightX = $height_old / $height;

		$x = min($widthX, $heightX);
		$cropWidth = ($width_old - $width * $x) / 2;
		$cropHeight = ($height_old - $height * $x) / 2;
	}

	# Loading image to memory according to type
	switch ( $info[2] ) {
		case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
		case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
		case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
		default: return false;
	}
	
	
	# This is the resizing/resampling/transparency-preserving magic
	$image_resized = imagecreatetruecolor( $final_width, $final_height );
	if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
		$transparency = imagecolortransparent($image);
		$palletsize = imagecolorstotal($image);

		if ($transparency >= 0 && $transparency < $palletsize)
		{
			$transparent_color  = imagecolorsforindex($image, $transparency);
			$transparency	   = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
			imagefill($image_resized, 0, 0, $transparency);
			imagecolortransparent($image_resized, $transparency);
		}
		elseif ($info[2] == IMAGETYPE_PNG)
		{
			imagealphablending($image_resized, false);
			$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
			imagefill($image_resized, 0, 0, $color);
			imagesavealpha($image_resized, true);
		}
	}
	imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
	# Taking care of original, if needed
	if ( $delete_original )
	{
		if ( $use_linux_commands ) exec('rm '.$file);
		else @unlink($file);
	}

	# Preparing a method of providing result
	switch ( strtolower($output) )
	{
		case 'browser':
			$mime = image_type_to_mime_type($info[2]);
			header("Content-type: $mime");
			$output = NULL;
		break;
		case 'file':
			$output = $file;
			break;
		case 'return':
			return $image_resized;
			break;
		default:
			break;
	}
	
	# Writing image according to type to the output destination and image quality
	switch ( $info[2] ) {
	  case IMAGETYPE_GIF:   imagegif($image_resized, $output);	break;
	  case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
	  case IMAGETYPE_PNG:
		$quality = 9 - (int)((0.9*$quality)/10.0);
		imagepng($image_resized, $output, $quality);
		break;
	  default: return false;
	}

	return true;
}

function exec_ogp_module() {

	global $db;

	if( isset($_POST['home_id']) and isset($_POST['mod_id']) and isset($_POST['map']) and isset($_POST['extension']) )
	{
		$home_id = $_POST['home_id'];
		$mod_id = $_POST['mod_id'];
		$map = $_POST['map'];
		$extension = $_POST['extension'];

		$home_info = $db->getGameHome($home_id);
		
		$mods = $home_info['mods'];
		$current_mod_info = $mods[$mod_id];
		$mod_name = $current_mod_info['mod_name'];
		$mod_key = $current_mod_info['mod_key'];
		
		if ( strtolower($mod_name) == "none")
			$mod = $mod_key;
		else 
			$mod = $mod_name;
		
		$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

		if ($server_xml->protocol == "gameq")
			$query_name = $server_xml->gameq_query_name;
		elseif ($server_xml->protocol == "lgsl")
			$query_name = $server_xml->lgsl_query_name;
		else
			$query_name = $mod; // If query name does not exist use mod key instead.
		
		$dest_path = "protocol". DIRECTORY_SEPARATOR ."lgsl". DIRECTORY_SEPARATOR ."maps". DIRECTORY_SEPARATOR ."$query_name". DIRECTORY_SEPARATOR ."$mod";
		$dest_file = $dest_path . DIRECTORY_SEPARATOR . "$map.$extension";
		
		if( $_FILES['map-image']['error'] == 0 )
		{
			if( !file_exists($dest_path))
			{
				if(!@mkdir($dest_path, 0700, true))
				{
					echo get_lang_f('cant_create_folder',$dest_path);
					return;
				}
			}
			
			if(@move_uploaded_file( $_FILES["map-image"]["tmp_name"], $dest_file ))
			{
				print_lang('uploaded_successfully');
				smart_resize_image($dest_file, null, 160, 120, true);
			}
			else
			{
				echo get_lang_f('cant_write_file',$dest_file);
			}
		}
		else
		{
			switch ($_FILES['map-image']['error']) 
			{
				case UPLOAD_ERR_INI_SIZE:
					echo get_lang_f('exceeded_php_directive','upload_max_filesize='.ini_get('upload_max_filesize'));
				case UPLOAD_ERR_FORM_SIZE:
					echo get_lang_f('exceeded_php_directive','post_max_size='.ini_get('post_max_size'));
				default:
					print_lang('unknown_errors');
			}
		}
	}
}
?>
