<script type="text/javascript" src="js/modules/extras.js"></script>
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
require('modules/update/unzip.php');
require('modules/modulemanager/module_handling.php');

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

function getMyFile($url,$destination)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$date = new DateTime();
	$expires = gmdate('D, d-M-Y H:i:s \G\M\T', $date->getTimestamp() + 31536000000);
	curl_setopt($ch, CURLOPT_COOKIE, "FreedomCookie=true;path=/;expires=".$expires);
	//Save Page
	$result = curl_exec($ch);
	curl_close($ch);
	return file_put_contents($destination, $result);
}

function installUpdate($info, $base_dir)
{
	$tmp = get_temp_dir(dirname(__FILE__));
	$temp_dwl = $tmp . DIRECTORY_SEPARATOR . $info['file'];
	$_SESSION['link'] = $info['link'];
	if(!getMyFile($info['link'],$temp_dwl))
	{
		echo get_lang_f('unable_download',$info['title'])."\n";
		return;
	}
	
	$calcMD5 = md5_file( $temp_dwl );
	if($calcMD5 != $info['md5'])
	{
		echo get_lang_f('md5_failed',$info['title']);
		unlink($temp_dwl);
		return;
	}
	
	// Set default values for file checkings before installing
	$not_writable = get_lang( 'can_not_update_non_writable_files' )." :\n";
	$filename = "";
	$overwritten = 0;
	$new = 0;
	$all_writable = TRUE;
	$filelist = "";
	$overwritten_files = "";
	$new_files = "";
	
	$temp_dir = $tmp . DIRECTORY_SEPARATOR . "OGP_Extras";
	if( !file_exists($temp_dir) )
		mkdir($temp_dir, 0775);
	
	$result = extractZip( $temp_dwl, $temp_dir . DIRECTORY_SEPARATOR );
		
	if ( is_array($result['extracted_files']) and count($result['extracted_files']) > 0 )
	{
		$nfo_file = preg_replace("/themes\/themes/","themes",$base_dir.$info['install_path']."/install.nfo");
		$install_nfo = $info['timestamp']."\n$nfo_file\n";
		// Check file by file if already exists, if it matches, compares both files 
		// looking for changes determining if the file needs to be updated.
		// Also determines if the file is writable
		$filelist = array();
		$i = 0;
		foreach( $result['extracted_files'] as $file )
		{
			$install_nfo .= $base_dir.$file['filename']."\n";
			$filename = $file['filename'];
			$temp_file = $temp_dir . DIRECTORY_SEPARATOR . $filename;
			$web_file = $base_dir . $filename;
			
			if( file_exists( $web_file ) )
			{
				$temp = file_get_contents($temp_file);
				$web = file_get_contents($web_file);
				
				if( $temp != $web )
				{
					if( !is_writable( $web_file ) )
					{
						if ( ! @chmod( $web_file, 0644 ) )
						{
							$all_writable = FALSE;
							$not_writable .= $web_file."\n";
						}
						else
						{
							$filelist[$i] = $file['filename'];
							$i++;
							$overwritten_files .= $filename . "\n";
							$overwritten++;
						}
					}
					else
					{
						$filelist[$i] = $file['filename'];
						$i++;
						$overwritten_files .= $filename . "\n";
						$overwritten++;
					}
				}
			}
			else
			{	
				$filelist[$i] = $file['filename'];
				$i++;
				$new_files .= $filename . "\n";
				$new++;
			}
		}
	}
	else
	{
		echo $result;
		// Remove the downloaded package
		if( file_exists( $temp_dwl ) )
			unlink( $temp_dwl );
		return FALSE;
	}
	
	// Once checkings are done the temp folder is removed
	if( file_exists( $temp_dir ) )
	{
		rmdir_recurse( $temp_dir );
	}
	
	if( $all_writable )
	{
		// Extract the files that are set in $filelist, to the folder at $base_dir.
		$result = extractZip( $temp_dwl, $base_dir, '', '', $filelist );
		
		if( is_array( $result['extracted_files'] ) )
		{
			// Updated files
			if ( $overwritten > 0 )
			{
				echo get_lang_f('files_overwritten',$overwritten).":\n".$overwritten_files;
			}
			
			if ( $new > 0 )
			{
				echo get_lang_f('new_files',$new).":\n".$new_files;
			}
						
			// Add install.nfo file to the module/theme directory so we can remove the installed files later and check the installed files timestamp.
			file_put_contents($info['install_path']."/install.nfo", $install_nfo);
			// Remove the downloaded package
			if( file_exists( $temp_dwl ) )
				unlink( $temp_dwl );
			return TRUE;
		}
		else
		{
			echo $result;
			// Remove the downloaded package
			if( file_exists( $temp_dwl ) )
				unlink( $temp_dwl );
			return FALSE;
		}
	}
	else
	{
		echo $info['title'].":\n$not_writable";
		// Remove the downloaded package
		if( file_exists( $temp_dwl ) )
			unlink( $temp_dwl );
		return FALSE;
	}
}
 
function exec_ogp_module() 
{
	set_time_limit(0);
	if(isset($_POST['remove']))
	{
		$themeDirRelPath = $_POST['remove'] . "/" . $_POST['folder'];
		if(file_exists($themeDirRelPath) && is_dir($themeDirRelPath)){
			recursiveDelete($themeDirRelPath);
		}
		return;
	}
	$url = 'http://sourceforge.net/projects/ogpextras/rss?limit=200'; // Increased limit from 50 to 200 since SourceForge lists 51 entries in the RSS for alternative snapshots.
	require_once 'rss_php.php';
	$rss = new rss_php;
	$rss->load($url);
	$items = $rss->getItems(); #returns all rss items

	$m = 0;
	$modules = array();
	$t = 0;
	$themes = array();

	foreach ($items as $index => $item)
	{
		if(preg_match("/(Mods|Alternative-Snapshot)/",$item['title']))continue;
		
		if(preg_match("/\/Modules\//",$item['title']))
		{
			$pubDate = explode(",",$item['pubDate']);
			$pubDate = $pubDate[1];
			$pubDate = explode(" ",$pubDate);
			array_pop($pubDate);
			$pubDate = implode(" ",$pubDate);
			$item['pubDate'] = $pubDate;
			$module_title = preg_replace("/(\/Modules\/|\.zip)/","",$item['title']);
			$modules[$m]['title'] = $module_title;
			$modules[$m]['file'] = str_replace("/Modules/","",$item['title']);
			$modules[$m]['link'] = (string)$item['link'];
			$modules[$m]['date'] = $item['pubDate'];
			$modules[$m]['timestamp'] = strtotime($item['pubDate']);
			$modules[$m]['md5'] = $item['media:content']['media:hash'];
			$module_fld = strtolower($module_title);
			$module_fld = $module_fld == 'simple-billing' ? 'billing' : $module_fld;
			$module_fld = $module_fld == 'lgsl + img mod' ? 'lgsl' : $module_fld;
			$module_fld = $module_fld == 'fast download' ? 'fastdl' : $module_fld;
			$modules[$m]['install_path'] = MODULES.$module_fld;
			$m++;
		}
		if(preg_match("/\/Themes\//",$item['title']))
		{
			$pubDate = explode(",",$item['pubDate']);
			$pubDate = $pubDate[1];
			$pubDate = explode(" ",$pubDate);
			array_pop($pubDate);
			$pubDate = implode(" ",$pubDate);
			$item['pubDate'] = $pubDate;
			$theme_title = preg_replace("/(\/Themes\/|\.zip)/","",$item['title']);
			$themes[$t]['title'] = $theme_title;
			$themes[$t]['file'] = str_replace("/Themes/","",$item['title']);
			$themes[$t]['link'] = (string)$item['link'];
			$themes[$t]['date'] = $item['pubDate'];
			$themes[$t]['timestamp'] = strtotime($item['pubDate']);
			$themes[$t]['md5'] = $item['media:content']['media:hash'];
			$themes[$t]['install_path'] = 'themes/'.$theme_title;
			$t++;
		}
	}

	global $db;
	$installed_modules = $db->getInstalledModules();
	
	if(isset($_POST['update']))
	{
		$baseDir = str_replace( "modules" . DIRECTORY_SEPARATOR . "extras","",dirname(__FILE__) );
		$temesFolder = $baseDir . "themes" . DIRECTORY_SEPARATOR;
		$uMF = array();
		$tmpdir = get_temp_dir(dirname(__FILE__));
		if( !is_writable( $tmpdir ) )
		{
			echo get_lang_f('temp_folder_not_writable', $tmpdir);
			return;
		}
		$use_custom_mirror = false;
		if(isset($_POST['mirror']))
		{
			$mirror = $_POST['mirror'];
			unset($_POST['mirror']);
			$use_custom_mirror = true;
		}
		foreach($_POST as $key => $value)
		{
			if($key == 'update')continue;

			if($key == 'module')
			{
				foreach($value as $m)
				{
					$info = $modules[$m];
					if($use_custom_mirror)
						$info['link'] = preg_replace("/(.*)\/\/(.*)projects(.*)\/files(.*)\/download/","$1//$mirror.dl.$2project$3$4",$info['link']);
					if(installUpdate($info, $baseDir))
						$uMF[] = str_replace(MODULES,"",$info['install_path']);
				}
			}
			if($key == 'theme')
			{
				foreach($value as $t)
				{
					$info = $themes[$t];
					if($use_custom_mirror)
						$info['link'] = preg_replace("/(.*)\/\/(.*)projects(.*)\/files(.*)\/download/","$1//$mirror.dl.$2project$3$4",$info['link']);
					installUpdate($info, $temesFolder);
				}
			}
		}
		
		if(isset($_POST['module']))
		{
			foreach ( $installed_modules as $installed_module )
			{
				if(in_array($installed_module['folder'],$uMF))
				{
					update_module($db,$installed_module['id'],$installed_module['folder']);
					echo "\n";
				}
			}
		}
		return;
	}
	
	echo "<h2>".get_lang('extras')."</h2>";
	echo "<table style=\"width:100%;\">";

	if ( ini_get('open_basedir') or get_true_boolean(ini_get('safe_mode')) )
	{
		echo "<tr><td colspan=2 style='text-align:center;' >";
		$sf_mirrors = file("modules/extras/mirrors.list");
		echo get_lang('select_mirror').": ".create_drop_box_from_array_rsync($sf_mirrors,"mirror");
		echo "</td></tr>";
	}
	echo "<tr><td style=\"width:50%;\">";
	# MODULES
	echo "<div class=\"dragbox bloc rounded\" style=\"margin:1%;\">".
		 "<h4>".get_lang('extra_modules')."</h4>".
		 "<div class=\"dragbox-content\" >";
	
	foreach ( $installed_modules as $installed_module )
	{
		$folder = $installed_module['folder'];
		$installed_modules_by_folder[$folder] = $installed_module['id'];
	}
	
	foreach($modules as $key => $module)
	{
		$on_disk = file_exists($module['install_path']."/module.php");
		$folder = str_replace(MODULES,"",$module['install_path']);
		$installed = array_key_exists($folder,$installed_modules_by_folder);
		
		$installed_str = $on_disk ? $installed ? "<a class='uninstall' style='color:blue;' data-module-folder='$folder' data-module-id='".
												 $installed_modules_by_folder[$folder]."' href='#uninstall_$folder' >".get_lang('uninstall')."</a>" : 
												 "<a class='install' style='color:blue;' data-module-folder='$folder' href='#install_$folder' >".get_lang('install')."</a> - ".
												 "<a class='remove' style='color:red;' data-module-folder='$folder' data-remove-mode='modules' href='#remove_$folder' >".get_lang('remove')."</a>" : 
												 "<b style='color:red;' >".get_lang('not_installed')."</b>";
		$uptodate = FALSE;
		if(file_exists($module['install_path']."/install.nfo"))
		{
			$install_nfo = file_get_contents($module['install_path']."/install.nfo");
			list($timestamp, $files) = explode("\n", $install_nfo);
			$uptodate = ($timestamp == $module['timestamp']) ? TRUE : FALSE;
		}
		$updated_str = $on_disk ? $uptodate ? " - <b style='color:green;' >".get_lang('uptodate')."</b>" : " - <b style='color:orange;' >".get_lang('update_available')."</b> (".$module['date'].")" : "";
		$disabled = $uptodate ? "disabled=disabled" : "";
		echo '<input type="checkbox" name="module" value="'.$key."\" $disabled>";
		echo '<b>'.$module['title']."</b> - $installed_str$updated_str <span id='loading' class='$folder' ></span><br>";
	}
	
	echo "</div></td><td></div>";
	
	# THEMES
	echo "<div class=\"dragbox bloc rounded\" style=\"margin:1%;\">".
		 "<h4>".get_lang('extra_themes')."</h4>".
		 "<div class=\"dragbox-content\" >";
	
	foreach($themes as $key => $theme)
	{
		$installed = file_exists($theme['install_path']);
		$folder = str_replace("themes/","",$theme['install_path']);
		$installed_str = $installed ? "<b style='color:green;' >".get_lang('installed')."</b> - ".
									  "<a class='remove' style='color:red;' data-module-folder='$folder' data-remove-mode='themes' href='#remove_$folder' >".get_lang('remove')."</a>": 
									  "<b style='color:red;' >".get_lang('not_installed')."</b>";
		$uptodate = FALSE;
		if(file_exists($theme['install_path']."/install.nfo"))
		{
			$install_nfo = file_get_contents($theme['install_path']."/install.nfo");
			list($timestamp, $files) = explode("\n", $install_nfo);
			$uptodate = ($timestamp == $theme['timestamp']) ? TRUE : FALSE;
		}
		$updated_str = $installed ? $uptodate ? " - <b style='color:green;' >".get_lang('uptodate')."</b>" : " - <b style='color:orange;' >".get_lang('update_available')."</b> (".$theme['date'].")" : "";
		$disabled = $uptodate ? "disabled=disabled" : "";
		echo '<input type="checkbox" name="theme" value="'.$key."\" $disabled>";
		echo '<b>'.$theme['title']."</b> - $installed_str$updated_str<br>";
	}
	
	echo "</div></div></td></tr>".
		 "<tr><td colspan=2 ><span id=updateButton ><button name=update >".get_lang('download_update')."</button></span></td></tr></table><div id=resp ></div>";
	
	echo "<div id='dialog".
		 "' data-uninstalling_module_dataloss='".get_lang('uninstalling_module_dataloss').
		 "' data-are_you_sure='".get_lang('are_you_sure').
		 "' data-remove_files_for='".get_lang('remove_files_for').
		 "' data-confirm='".get_lang('confirm').
		 "' data-cancel='".get_lang('cancel').
		 "' ></div>";
}
?>
