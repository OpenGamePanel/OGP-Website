<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
function rmdir_recurse($path) {
    $path = rtrim($path, '/').'/';
    $handle = opendir($path);
    while(false !== ($file = readdir($handle))) {
        if($file != '.' and $file != '..' ) {
            $fullpath = $path.$file;
            if(is_dir($fullpath)) rmdir_recurse($fullpath); else unlink($fullpath);
        }
    }
    closedir($handle);
    rmdir($path);
}

function exec_ogp_module()
{
	if( !function_exists("curl_init") )
	{
		print_failure( curl_needed );
		return;
	}

	if($_SESSION['users_group'] != "admin")
	{
		print_failure( no_access );
		return;
	}

	global $db;
	global $view;
	
	$version = $_GET['version'];
	$vtype = "SVN";

	echo "<h4>" . dwl_update . "</h4>\n";

	//This is usefull when you are downloading big files, as it
	//will prevent time out of the script
	set_time_limit(0);
	error_reporting(E_ALL);
	ini_set('display_errors',true);

	$baseDir = str_replace( "modules" . DIRECTORY_SEPARATOR . "update","",dirname(__FILE__) );

	if( !is_writable( $baseDir ) )
	{
		if ( ! @chmod( $baseDir, 0755 ) )
		{
			print_failure( get_lang_f( 'base_dir_not_writable', $baseDir ) );
			return;
		}
	}
	
	$temp = get_temp_dir(dirname(__FILE__));
	
	if( is_writable( $temp ) )
	{
		// Download file to temporary folder
		if(isset($_POST['mirror']) && !empty($_POST['mirror'])){
			$mirror = $_POST['mirror'];
		}else{
			if( ini_get('open_basedir') or get_true_boolean(ini_get('safe_mode')) )
				$mirror = "master";
			else
				$mirror = "autoselect";
		}
		$temp_dwl = $temp . DIRECTORY_SEPARATOR . 'svn.tar.gz';
		$fp = fopen ($temp_dwl, 'w+'); //This is the download destination
		$date = new DateTime();
		$expires = gmdate('D, d-M-Y H:i:s \G\M\T', $date->getTimestamp() + 31536000000);
		if($mirror == "autoselect")
			$url = "https://sourceforge.net/projects/ogpextras/files/Alternative-Snapshot/hldstart-code-${version}.zip/download";
		else
			$url = "http://".$mirror.".dl.sourceforge.net/project/ogpextras/Alternative-Snapshot/hldstart-code-${version}.zip";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_COOKIE, "FreedomCookie=true;path=/;expires=".$expires);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		
		// Check if the file exists and the size is bigger than a 404 error page from sf.net
		if( file_exists( $temp_dwl ) )
		{
			$stat = stat( $temp_dwl );
		}
		else
		{
			print_failure( get_lang_f( 'dwl_failed', $url ) ); 
			return;
		}
		
		if( $stat['size'] > 1500 )
		{
			print_success( dwl_complete );
		}
		else
		{
			print_failure( get_lang_f( 'dwl_failed', $url ) ); 
			return;
		}
		
		echo "<h4>". install_update . "</h4>\n";
				
		// Set default values for file checkings before installing
		$not_writable = can_not_update_non_writable_files . " :<br>";
		$filename = "";
		$overwritten = 0;
		$new = 0;
		$all_writable = TRUE;
		$filelist = "";
		$overwritten_files = "";
		$new_files = "";
		
		$unwanted_path = "hldstart-code-${version}/trunk/upload";
		$extract_path = $temp . DIRECTORY_SEPARATOR . "OGP_update";
		if( !file_exists($extract_path) )
			mkdir($extract_path, 0775);
			
		$blacklist = array ('/install.php',
							'/modules/gamemanager/rsync_sites_local.list');
							
		$blacklisted_files = $db->resultQuery('SELECT file_path FROM `OGP_DB_PREFIXupdate_blacklist`;');
		if($blacklisted_files !== FALSE)
		{
			$curren_blacklist = array();
			foreach($blacklisted_files as $blacklisted_file)
			{
				$curren_blacklist[] = $blacklisted_file['file_path'];
			}			
			$blacklist = array_merge($curren_blacklist,$blacklist);
		}
		
		include ( 'unzip.php' );     // array|false extractZip( string $zipFile, string $extract_path [, string $remove_path, array $blacklist, array $whitelist] )
		$result = extractZip( $temp_dwl, $extract_path, $unwanted_path, '', '' );
		if ( is_array( $result['extracted_files'] ) and count($result['extracted_files']) > 0 )
		{
			// Check file by file if already exists, if it matches, compares both files 
			// looking for changes determining if the file needs to be updated.
			// Also determines if the file is writable
			$filelist = array();
			$i = 0;
			foreach( $result['extracted_files'] as $file )
			{
				$filename = str_replace( $unwanted_path, "" , $file['filename'] );				
				$temp_file = $extract_path . DIRECTORY_SEPARATOR . $filename;
				$web_file = $baseDir . $filename;

				if( file_exists( $web_file ) )
				{
					$temp = file_get_contents($temp_file);
					$web = file_get_contents($web_file);
					
					if( $temp != $web )
					{
						if( !is_writable( $web_file ) )
						{
							if ( ! @chmod( $web_file, 0775 ) )
							{
								$all_writable = FALSE;
								$not_writable .= $web_file."<br>";
							}
							else
							{
								$filelist[$i] = $file['filename'];
								$i++;
								$overwritten_files .= $filename . "<br>";
								$overwritten++;
							}
						}
						else
						{
							$filelist[$i] = $file['filename'];
							$i++;
							if( !in_array( $filename, $blacklist  ) )
							{
								$overwritten_files .= $filename . "<br>";
								$overwritten++;
							}
						}
					}
				}
				else
				{	
					$filelist[$i] = $file['filename'];
					$i++;
					if( !in_array( $filename, $blacklist  ) )
					{
						$new_files .= $filename . "<br>";
						$new++;
					}
				}
			}
		}
		else
		{
			echo $result;
			$all_writable = FALSE;
		}
						
		// Once checking is done the temp folder is removed
 		if( file_exists( $extract_path ) )
		{
			rmdir_recurse( $extract_path );
		}
		
		if( $all_writable )
		{
			// Extract the files that are set in $filelist, to the folder at $baseDir and removes 'upload' from the beginning of the path.

			$result = extractZip( $temp_dwl, preg_replace("/\/$/","",$baseDir), $unwanted_path, $blacklist, $filelist );
			if( is_array( $result['ignored_files'] ) and !empty( $result['ignored_files'] ) )
			{
				print_failure(get_lang_f('ignored_files',count($result['ignored_files'])));
				echo get_lang_f("not_updated_files_blacklisted", implode("<br>", $result['ignored_files']) );
				echo "<br><br><br>";
			}
			if( is_array( $result['extracted_files'] ) )
			{
				// Updated files
				if ( $overwritten > 0 )
				{
					print_success(get_lang_f('files_overwritten',$overwritten)); 
					echo get_lang_f( "updated_files", $overwritten_files );
				}
				
				if ( $new > 0 )
				{
					print_success(get_lang_f('new_files',$new));
					echo get_lang_f( "updated_files", $new_files );
				}
				
				// update version info in db
								
				$db->query("UPDATE OGP_DB_PREFIXsettings SET value = '$version'	WHERE setting = 'ogp_version'");
				$db->query("UPDATE OGP_DB_PREFIXsettings SET value = '$vtype'	WHERE setting = 'version_type'");

				// Remove the downloaded package
				if( file_exists( $temp_dwl ) )
					unlink( $temp_dwl );
				
				// Remove files that are not related to the panel
				if( file_exists( $baseDir . DIRECTORY_SEPARATOR . "hldstart-code-${version}" ) )
				{
					rmdir_recurse( $baseDir . DIRECTORY_SEPARATOR . "hldstart-code-${version}" );
				}

				echo "<br>\n<h4>" . updating_modules ."</h4>\n";
				
				require_once('modules/modulemanager/module_handling.php');

				$modules = $db->getInstalledModules();
				
				foreach ( $modules as $row )
				{
					update_module($db, $row['id'], $row['folder']);
				}
				print_success(update_complete); 
			}
			else
			{
				echo $result;
			}
		}
		else
		{
			print_failure($not_writable);
		}
	}
	else
	{
		print_failure( get_lang_f( 'temp_folder_not_writable', $temp ) );
	}
}
?>
