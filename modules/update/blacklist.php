<script type="text/javascript" src="js/modules/update.js"></script>
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

function show_back()
{
    if( isset($_SESSION['fm_cwd']) && preg_match("/^\/*$/",$_SESSION['fm_cwd']) == 0 )
        return "<tr>\n".
			   "<td align=left colspan='2' >\n".
			   "<a href=\"?m=".$_GET['m']."&amp;p=blacklist&amp;back\" style='padding-left:5px;' > ..&nbsp;&nbsp;".get_lang("level_up")."</a>\n".
			   "</td>\n".
			   "</tr>\n";
}

function path_check()
{
	if (isset($_GET['path']) and !isset( $_POST['save_to_blacklist'] ))
    {
        $path = $_GET['path'];
        // Make sure nobody tries to get outside thier game server by referencing the .. directory
        if(preg_match("/\.\.|\||;/", $path))
        {
            print_failure(get_lang("unallowed_char"));
            $_SESSION['fm_cwd'] = NULL;
            return FALSE;
        }
        else
        {
            $_SESSION['fm_cwd'] = @$_SESSION['fm_cwd'] . "/" . $path;
        }
    }

    // To go back a dir, we just use dirname to strip the last directory or file off the path
    if (isset($_GET['back']) and !isset( $_POST['save_to_blacklist'] ))
    {
        $_SESSION['fm_cwd'] = str_replace( "\\", "", dirname( $_SESSION['fm_cwd'] ) );
    }

    return TRUE;
}
function exec_ogp_module()
{
	global $db, $view;
	
	$blacklist = array ('/install.php',
						'/modules/gamemanager/rsync_sites_local.list');
						
	$current_blacklist = array();
	
	$blacklisted_files = $db->resultQuery('SELECT file_path FROM `OGP_DB_PREFIXupdate_blacklist`;');
	if($blacklisted_files !== FALSE)
	{
		$current_blacklist = array();
		foreach($blacklisted_files as $blacklisted_file)
		{
			$current_blacklist[] = $blacklisted_file['file_path'];
		}			
	}

	if( isset( $_POST['save_to_blacklist'] ) )
	{
		foreach($_POST['blacklist'] as $file)
		{
			$file = $db->real_escape_string($file);
			$db->query("INSERT INTO `OGP_DB_PREFIXupdate_blacklist` SET file_path='$file';");
		}
		
		foreach($_POST['folder_files'] as $file)
		{
			if(in_array($file,$current_blacklist))
			{
				if(!in_array($file,$_POST['blacklist']))
				{
					$file = $db->real_escape_string($file);
					$db->query("DELETE FROM `OGP_DB_PREFIXupdate_blacklist` WHERE file_path='$file';");
				}
			}
		}
		
		$blacklisted_files = $db->resultQuery('SELECT file_path FROM `OGP_DB_PREFIXupdate_blacklist`;');
		if($blacklisted_files !== FALSE)
		{
			$current_blacklist = array();
			foreach($blacklisted_files as $blacklisted_file)
			{
				$current_blacklist[] = $blacklisted_file['file_path'];
			}			
		}
	}
		
	$current_blacklist = array_merge($current_blacklist,$blacklist);
	
    path_check();
    	
	echo "<h2>";
	echo get_lang('blacklist_files');
	echo "</h2>";

	$baseDir = str_replace( "modules" . DIRECTORY_SEPARATOR . $_GET['m'],"",dirname(__FILE__) );
	$path = clean_path($baseDir."/".@$_SESSION['fm_cwd']);
	if (!file_exists($path))
	{
		while(!file_exists($path))
		{
			$path = dirname($path);
			$_SESSION['fm_cwd'] = dirname($_SESSION['fm_cwd']);
			if($path == clean_path($baseDir))
			{
				print_failure(get_lang_f("dir_not_found",$path));
				break;
			}
		}
	}

	echo "<table class='center' style='width:100%;' ><tr>\n".
		 "<td colspan='3' ><h3>".
		 get_lang_f('currently_viewing',$path)."</h3></td>".
		 "</tr></table>";
	
	$dirlist = scandir($path);
			
	if (!is_array($dirlist))
	{
		if($dirlist === -1)
		{
			if ( $path != $baseDir . "/" )
				$view->refresh('?m='.$_GET['m'].'&amp;p=blacklist',0);
			else
				print_failure('The path is too long or there is a file with a very long name inside of your game server\'s home folder.');
		}
		else
		{
			if (file_exists($path))
			{
				if(strpos($path, '/') !== FALSE)
				{
					$ePath = explode('/', $path);
					$filename = end($ePath);
				}
				else if(strpos($path, '\\') !== FALSE)
				{
					$ePath = explode('\\', $path);
					$filename = end($ePath);
				}
				
				$_SESSION['fm_cwd'] = str_replace( "\\", "", dirname( $_SESSION['fm_cwd'] ) );
				$view->refresh('?m='.$_GET['m'].'&amp;p=blacklist'.'&amp;path='.$filename,0);
			}
			else
			{
				print_failure(get_lang("failed_list"));
			}
		}
		return;
	}

	if ( empty($dirlist) )
	{
		print_lang('empty_directory');
	}
	else
	{				 
		echo "<form method=POST>".
			 "<table class='center' style='width:100%;' >\n"
			 .show_back().
			 "<tr>\n".
			 "<td style='width:10px;' >\n".
			 "<input type='checkbox' onclick='toggleChecked(this.checked)'>\n".
			 "</td>\n".
			 "<td align=left>\n".
			 get_lang('filename').
			 "\n</td>\n".
			 "</tr>\n";
			 
		$directorys = array();
		$files		= array();
		$x = 0;
		$basedir_path = rtrim($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME']),DIRECTORY_SEPARATOR);
		$preg_basedir_path = preg_quote($basedir_path,"/");
		foreach( $dirlist as $item )
		{
			# dirlist FM returns an array.  Each element has 5 fields separated by the | character
			if($item == "." or $item == "..")
				continue;
			$filename = $item;
			$filepath = clean_path( $path . "/" . $filename );
			
			// Directory
			if(is_dir($filepath))
			{
				$directorys[$x]['filename'] = $filename;
			}
			// File
			else
			{
				$files[$x]['filename'] = $filename;
				$files[$x]['filepath'] = preg_replace("/^".$preg_basedir_path."/","",$filepath);
			}	
			$x++;
		}
		
		foreach($directorys as $directory)
		{
			echo "<tr>\n".
				 "<td>".
				 "</td>".
				 "<td align=left>".
				 "<img class=\"viewitem\" src=\"images/folder.png\" alt=\"Directory\" /> ".
				 "<a href=\"?m=".$_GET['m']."&amp;p=blacklist&amp;path=" . $directory['filename'] . "\">". 
				 $directory['filename'] . "</a></td></tr>\n";
		}
		$i = 0;
		$unchecked = array();
		foreach($files as $file)
		{
			$checked = in_array($file['filepath'],$current_blacklist) ? "checked='checked'" : "";
			echo "<tr>\n".
				 "<td>".
				 "<input type=checkbox name='blacklist[$i]' value='" . $file['filepath'] . "' class='item' $checked/>\n".
				 "<input type=hidden name='folder_files[$i]' value='" . $file['filepath'] . "' />\n".
				 "</td>".
				 "<td align=left>";
			echo "<img class=\"viewitem\" src=\"images/txt.png\" alt=\"Text file\" /> ".
				 $file['filename'] . "</td>\n".
				 "</tr>\n";
			$i++;
		}
					
		echo "</table>\n".
			 "<input type=submit name='save_to_blacklist' value='".get_lang('save_to_blacklist')."' />\n".
			 "</form>\n";
		
	}
	echo create_back_button($_GET['m']);
}
?>