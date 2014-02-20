<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<style>
span.chattrLock{
	padding-left: 20px;
	background: #FFFFFF url(images/locked.png) no-repeat left center;
	color: black; 
	font-size: 12px; 
	height: 16px;
}

span.chattrUnlock{
	padding-left: 20px;
	background: #FFFFFF url(images/unlocked.png) no-repeat left center;
	color: black; 
	font-size: 12px; 
	height: 16px;
}

input.chattrButton{
	color: black; 
	font-size: 12px; 
	height: 16px;
	text-align: center;
	vertical-align: middle;
	padding: 0px;
	border: 1px solid black;
}
.viewitem{
	height:16px;
}
</style>
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

require_once(MODULES."/litefm/litefm.php");
function exec_ogp_module()
{
    $home_id = $_REQUEST['home_id'];

    if (empty($home_id))
    {
        print_failure(get_lang('home_id_missing'));
        return;
    }

    global $db, $view;
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_cfg = $db->getGameHome($home_id);
	else
		$home_cfg = $db->getUserGameHome($_SESSION['user_id'],$home_id);
	
    if ($home_cfg === FALSE)
    {
        print_failure(get_lang('no_access_to_home'));
        return;
    }

    litefm_check($home_id);
    
    $remote = new OGPRemoteLibrary($home_cfg['agent_ip'], $home_cfg['agent_port'], $home_cfg['encryption_key'] );
	
	$os_string = $remote->what_os();
	$os = preg_match("/Linux/i", $os_string) ? "linux" : "windows";
	
	echo "<h2>";
	echo empty($home_cfg['home_name']) ? get_lang('not_available') : $home_cfg['home_name'];
	echo "</h2>";

	// We must always add the home directory to the fm_cwd so that user
	// can not go out of the homedir.
	$path = clean_path($home_cfg['home_path']."/".@$_SESSION['fm_cwd_'.$home_id]);
	$upload_folder_path = "modules/litefm/uploads/home_id_$home_id";
	
	if( isset( $_GET['pid'] ) and $_GET['pid'] != ""  )
	{
		$bytes = $_GET['bytes'];
		$totalsize = $bytes / 1024;
		$uploaded_filename = $_GET['uploaded_filename'];
		$dest_file_path = clean_path( $upload_folder_path . "/" . $uploaded_filename . ".txt" );
		$kbytes = $remote->rsync_progress( clean_path( $path."/".$uploaded_filename ) );
		list($totalsize,$mbytes,$pct) = explode(";",do_progress($kbytes,$totalsize));
		$totalmbytes = round($totalsize / 1024, 2);
		$pct = $pct > 100 ? 100 : $pct;
		
		if( $pct > 0 )
		{
			echo '<div class="dragbox bloc rounded" style="background-color:#dce9f2;" >
					<h4>'.get_lang('upload')." ".$uploaded_filename." ${mbytes}MB/${totalmbytes}MB</h4>
				  <div style='background-color:#dce9f2;' >
				  ";
			$bar = '';
			for( $i = 1; $i <= $pct; $i++ )
			{
				$bar .= '<img style="width:0.92%;vertical-align:middle;" src="images/progressBar.png">';
			}
			echo "<center>$bar <b style='vertical-align:top;display:inline;font-size:1.2em;color:red;' >$pct%</b></center>
					</div>
				  </div>";
		}

		$pid = $_GET['pid'];
		
		if ( $remote->is_file_download_in_progress( $pid ) == 0 )
		{
			unlink($dest_file_path);
			
			$directory = dir($upload_folder_path);
			$directory_not_empty = FALSE;
			while ((FALSE !== ($item = $directory->read())) && ( ! isset($directory_not_empty)))
			{
				if ($item != '.' && $item != '..')
				{
					$directory_not_empty = TRUE;
				}
			}
			$directory->close();
			if( ! $directory_not_empty )
				rmdir( $upload_folder_path );
			
			print_success(print_lang('upload_complete'));
			$db->logger(get_lang('upload_complete')." ( " . clean_path( $path . "/" . $uploaded_filename ) . " )");
			$view->refresh( '?m=litefm&amp;home_id=' . $home_id, 2 );
			return;
		}
		else
		{
			print_success(print_lang('upload_in_progress'));
			$view->refresh( '?m=litefm&amp;home_id=' . $home_id . "&uploaded_filename=$uploaded_filename&bytes=$bytes&pid=$pid&upload=true", 2 );
			return;
		}
	}
	else
    {
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_cfg['home_id']."'><< ".get_lang('back')."</a></td></tr></table>";
		$POST_MAX_SIZE = ini_get('post_max_size');
		$mul = substr($POST_MAX_SIZE, -1);
		$mul = ($mul == 'M' ? 1048576 : ($mul == 'K' ? 1024 : ($mul == 'G' ? 1073741824 : 1)));
		if ( isset( $_GET['upload'] ) && $_GET['upload'] == "true" && $_SERVER['CONTENT_LENGTH'] > $mul*(int)$POST_MAX_SIZE && $POST_MAX_SIZE )
		{
			print_failure( get_lang_f('upload_failed', '( php.ini: upload_max_filesize = '.ini_get('upload_max_filesize') . ", post_max_size = " . ini_get('post_max_size') . ", memory_limit = " . ini_get('memory_limit') . ' )' ) );
		}
		
		if( isset( $_POST['upload'] ) )
		{
			if( isset( $_FILES['uploaded_file'] ) )
			{
				$bytes = $_FILES['uploaded_file']['size'];
				$bad_chars = preg_replace( "/([[:alnum:]_\.-]*)/", "", $_FILES['uploaded_file']['name'] );
				$bad_arr = str_split( $bad_chars );
				$uploaded_filename = str_replace( $bad_arr, "", $_FILES['uploaded_file']['name'] );
				$dest_file_path = clean_path( $upload_folder_path . "/" . $uploaded_filename . ".txt" );
				$s = isset($_SERVER['HTTPS']) ? "s" : "";
				$p = isset($_SERVER['SERVER_PORT']) & $_SERVER['SERVER_PORT'] != "80" ? ":".$_SERVER['SERVER_PORT'] : NULL ;
				$url = 'http'.$s.'://'.$_SERVER['SERVER_NAME'].$p.$_SERVER['SCRIPT_NAME'];
				$file_url = str_replace( "home.php", $dest_file_path, $url );
				
				if( $_FILES['uploaded_file']['error'] > 0 )
				{
					print_failure( get_lang_f('upload_failed'), $_FILES['uploaded_file']['error'] );
				}
				else
				{					
					if( ! file_exists( $upload_folder_path ) )
					{
						if( ! mkdir($upload_folder_path, 0777, true) )
							print_failure( get_lang_f('can_not_create_upload_folder_path'), $upload_folder_path );
					}
					
					if( file_exists( $dest_file_path ) )
						unlink($dest_file_path);
					
					move_uploaded_file( $_FILES["uploaded_file"]["tmp_name"], $dest_file_path );
					
					if ( file_exists( $dest_file_path ) )
					{
						$remote_file_path = clean_path( $path . "/" . $uploaded_filename );
						if( $remote->rfile_exists($remote_file_path) )
							$remote->exec('rm -f ' . $remote_file_path );
							
						$uncompress = isset( $_POST['uncompress'] ) ? "uncompress" : "";
						$pid = $remote->start_file_download( $file_url, $path, $uploaded_filename, $uncompress );
						if ( $remote->is_file_download_in_progress( $pid ) < 0 )
						{
							print_failure( get_lang_f('upload_failed', get_lang_f('url_is_not_accesible_from_agent', $file_url ) ) );
						}
						else
						{
							$view->refresh( '?m=litefm&amp;home_id=' . $home_id . "&uploaded_filename=$uploaded_filename&bytes=$bytes&pid=$pid&upload=true", 1 );
						}
					}
				}
			}
		}
		
		if( isset( $_POST['create_folder'] ) )
		{
			$bad_chars = preg_replace( "/([[:alnum:]_\.-]*)/", "", $_POST['folder_name'] );
			$bad_arr = str_split( $bad_chars );
			$folder_name = str_replace( $bad_arr, "", $_POST['folder_name'] );
			$remote->exec('mkdir ' . clean_path( $path . "/" . $folder_name ) );
			$db->logger( get_lang('create_folder') . " " . clean_path( $path . "/" . $folder_name ) );
		}
		
		if( isset( $_POST['delete'] ) )
		{
			if( ! isset( $_POST['delete_check'] ) )
			{
				echo "<table class='center' style='width:100%;' ><tr>\n".
					 "<td>".
					 get_lang_f( 'delete_item', clean_path( $path . "/" . $_POST['delete'] ) ) . "</td>".
					 "</tr><tr><td>".
					 '<form action="?m=litefm&home_id='.$home_id.'" method="post" enctype="multipart/form-data">'."\n".
					 '<input type="hidden" name="delete" value="' . $_POST['delete'] . '">'."\n".
					 '<button name="delete_check" value="yes" >'.get_lang('yes')."</button>\n".
					 '<button name="delete_check" value="no" >'.get_lang('no')."</button>\n".
					 "</form>\n".
					 "</td>\n".
					 "</tr>\n".
					 "</table>\n";
			}
			elseif( $_POST['delete_check'] == "yes" )
			{
				$remote->exec( 'rm -Rf "' . clean_path( $path . "/" . $_POST['delete'] ) . '"' );
				$db->logger( 'rm -Rf "' . clean_path( $path . "/" . $_POST['delete'] ) . '"' );
			}
		}
		
		// Chattr Check
		if( isset( $_POST['secureButton'] ) )
		{
			if( ! isset( $_POST['secure_check'] ) )
			{
				echo "<table class='center' style='width:100%;' ><tr>\n".
					 "<td>".
					 get_lang_f( 'secure_item', clean_path( $path . "/" . $_POST['secureFile'] ) ) . "</td>".
					 "</tr><tr><td>".
					 '<form action="?m=litefm&home_id='.$home_id.'" method="post" >'."\n".
					 '<input type="hidden" name="secureFile" value="' . $_POST['secureFile'] . '">'."\n".
					 '<input type="hidden" name="secureButton" value="' . $_POST['secureButton'] . '">'."\n".
					 '<button name="secure_check" value="yes" >'.get_lang('yes')."</button>\n".
					 '<button name="secure_check" value="no" >'.get_lang('no')."</button>\n".
					 "</form>\n".
					 "</td>\n".
					 "</tr>\n".
					 "</table>\n";
			}
			elseif( $_POST['secure_check'] == "yes" )
			{
				$chatAction = $_POST['secureButton'];
				if($chatAction == get_lang('chattr_yes')){
					$action = 'chattr+i';
				}else{
					$action = 'chattr-i';
				}
				$pathToFile = clean_path( $path . "/" . $_POST['secureFile'] );
				
				$remote->secure_path($action, $pathToFile);
				
				if($action == 'chattr+i')
					$db->logger( get_lang('chattr_locked') . ": $pathToFile" );
				else
					$db->logger( get_lang('chattr_unlocked') . ": $pathToFile" );
			}
		}
					   
		echo "<table class='center' style='width:100%;' ><tr>\n".
			 "<td colspan='3' ><h3>".
			 get_lang_f('currently_viewing',$path)."</h3></td>".
			 "</tr><tr><td style='border:1px solid gray;'>".
			 get_lang('upload_file').
			 ':<form action="?m=litefm&home_id='.$home_id.'&upload=true" method="post" enctype="multipart/form-data">'."\n".
			 '<input type="file" name="uploaded_file" id="file">'."\n".
			 '<input type="checkbox" name="uncompress" value="true"> '.get_lang('uncompress')."\n".
			 '<input type="submit" name="upload" value="'.get_lang('upload').'">'."\n".
			 "</form>\n".
			 "</td>\n".
			 "<td>\n".
			 "&nbsp;&nbsp;&nbsp;&nbsp;".
			 "</td>\n".
			 "<td style='border:1px solid gray;' >\n".
			 get_lang('create_folder').
			 ':<form action="?m=litefm&home_id='.$home_id.'&create_folder=true" method="post" >'."\n".
			 '<input type="text" name="folder_name" />'."\n".
			 '<input type="submit" name="create_folder" value="'.get_lang('create').'"/>'."\n".
			 "</form>\n".
			 "</td></tr>\n".
			 "</table>\n";
			 		
		if (!$remote->rfile_exists($path))
		{
			$path = clean_path($home_cfg['home_path']);
			if (!$remote->rfile_exists($path))
			{
				print_failure(get_lang_f("dir_not_found",$path));
			}
			else
			{
				$_SESSION['fm_cwd_'.$home_id] = str_replace( "\\", "", dirname( $_SESSION['fm_cwd_'.$home_id] ) );
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=?m=litefm&amp;home_id=' . $home_id . '">';
			}
		}
		else
		{
			$dirlist = $remote->remote_dirlistfm($path);
			if( $os == "linux" )
				$lsattr = $remote->exec('lsattr '.$path);
			
			if (!is_array($dirlist))
			{
				if($dirlist === -1)
				{
					if ( $path != $home_cfg['home_path'] . "/" )
						echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=?m=litefm&amp;home_id=' . $home_id . '">';
					else
						print_failure('Your game server\'s home path is too long or there is a file with a very long name inside of your game server\'s home folder.');
				}
				else
				{
					if ($remote->rfile_exists($path))
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
						
						$_SESSION['fm_cwd_'.$home_id] = str_replace( "\\", "", dirname( $_SESSION['fm_cwd_'.$home_id] ) );
						echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=?m=litefm&amp;home_id=' . $home_id . '&amp;path='.$filename.'&amp;p=read_file">';
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
				echo "<table class='center' style='width:100%;' >\n".
					 show_back($home_id)."</table>";
			}
			else
			{
				echo "<table class='center' style='width:100%;' >\n"
					 .show_back($home_id).
					 "<tr><td style='width:10px;' ></td><td align=left>\n".
					 get_lang('filename')."</td>";
				if( $os == "linux" )
					echo "<td>". get_lang('filesecure') ."</td>";
				echo "<td>".get_lang('filesize')." [".get_lang('bytes')."]</td><td>".
					 get_lang('owner')." ".get_lang('group')."</td></tr>\n";
					 
				$directorys = array();
				$files		= array();
				$binarys	= array();
				
				foreach( $dirlist as $item )
				{
					# dirlist FM returns an array.  Each element has 5 fields separated by the | character
					list($filename,$size,$user,$group,$type) = explode("|",$item);
					$filepath = str_replace("/", "\/", clean_path( $path . "/" . $filename ) );
					if( $os == "linux" )
						preg_match( '/(\S+)\s'.$filepath.'/', $lsattr, $file_attributes );

					// Directory
					if($type == 'D')
					{
						$directorys[$filename]['filename'] = $filename;
						$directorys[$filename]['user'] = $user;
						$directorys[$filename]['group'] = $group;
					}
					// File
					elseif($type == 'F')
					{
						$files[$filename]['filename'] = $filename;
						$files[$filename]['size'] = $size;
						$files[$filename]['user'] = $user;
						$files[$filename]['group'] = $group;
						if( $os == "linux" )
							$files[$filename]['attr'] = $file_attributes[1];
					}
					// Binary
					elseif($type == 'B')
					{
						$binarys[$filename]['filename'] = $filename;
						$binarys[$filename]['size'] = $size;
						$binarys[$filename]['user'] = $user;
						$binarys[$filename]['group'] = $group;
						if( $os == "linux" )
							$binarys[$filename]['attr'] = $file_attributes[1];
					}	
				}
				
				foreach($directorys as $directory)
				{
					echo "<tr>\n".
						 "<td>".
						 '<form method=POST>'.
						 "<input type=hidden name='delete' value='" . $directory['filename'] . "' class='item' />\n".
						 '<input type="image" style="width:12px;padding-left:5px;" src="modules/administration/images/remove.gif" />'.
						 "</form>\n".
						 "</td>".
						 "<td align=left>".
						 "<img class=\"viewitem\" src=\"images/folder.png\" alt=\"Directory\" /> ".
						 "<a href=\"?m=litefm&amp;home_id=$home_id&amp;path=" . $directory['filename'] . "\">". 
						 $directory['filename'] . "</a></td>";
					if( $os == "linux" )
						echo "<td>-</td>";
					echo "<td>-</td> <td>" . $directory['user'] . " " . $directory['group']. "</td>\n".
						 "</tr>\n";
				}
				
				foreach($files as $file)
				{
					if( $os == "linux" )
					{
						if($isAdmin){
							$secureFile = '<td><form method=POST>'; 
							$secureFile .= "<input type=hidden name='secureFile' value='" . $file['filename'] . "' class='item' />\n";
							if( preg_match( "/i/", $file['attr'] ) ){
								$secureFile .= "<input type='submit' class='chattrButton' name='secureButton' value='" .get_lang('chattr_no'). "' class='item' />\n";
							}else{
								$secureFile .= "<input type='submit' class='chattrButton' name='secureButton' value='" .get_lang('chattr_yes'). "' class='item' />\n";
							}
							$secureFile .= '</form></td>';
						}else{
							$secureFile = "<td><span class=";
							if( preg_match( "/i/", $file['attr'] ) ){
								$secureFile .= "'chattrLock'>".get_lang('chattr_locked'); 
							}else{
								$secureFile .= "'chattrUnlock'>".get_lang('chattr_unlocked'); 
							}
							$secureFile .= "</span></td>\n";
						}
					}
					else
						$secureFile = "";
						
					echo "<tr>\n".
						 "<td>".
						 '<form method=POST>'.
						 "<input type=hidden name='delete' value='" . $file['filename'] . "' class='item' />\n".
						 '<input type="image" style="width:12px;padding-left:5px;" src="modules/administration/images/remove.gif" />'.
						 "</form>\n".
						 "</td>".
						 "<td align=left>";
					echo "<img class=\"viewitem\" src=\"images/txt.png\" alt=\"Text file\" /> ".
						 "<a href=\"?m=litefm&amp;home_id=$home_id&amp;path=" . $file['filename'] . "&amp;p=read_file\">".get_lang("button_edit")."</a>" . $file['filename'] . "</td>
						 $secureFile<td>" . $file['size'] . "</td> <td>" . $file['user'] . " " . $file['group']. "</td>\n";
					echo "</tr>\n";
				}
				
				foreach($binarys as $binary)
				{
					if( $os == "linux" )
					{
						if($isAdmin){
							$secureFile = '<td><form method=POST>'; 
							$secureFile .= "<input type=hidden name='secureFile' value='" . $binary['filename'] . "' class='item' />\n";
							if( preg_match( "/i/", $binary['attr'] ) ){
								$secureFile .= "<input type='submit' class='chattrButton' name='secureButton' value='" .get_lang('chattr_no'). "' class='item' />\n";
							}else{
								$secureFile .= "<input type='submit' class='chattrButton' name='secureButton' value='" .get_lang('chattr_yes'). "' class='item' />\n";
							}
							$secureFile .= '</form></td>';
						}else{
							$secureFile = "<td><span class=";
							if( preg_match( "/i/", $binary['attr'] ) ){
								$secureFile .= "'chattrLock'>".get_lang('chattr_locked'); 
							}else{
								$secureFile .= "'chattrUnlock'>".get_lang('chattr_unlocked'); 
							}
							$secureFile .= "</span></td>\n";
						}
					}
					else
						$secureFile = "";
						
					echo "<tr>\n".
						 "<td>".
						 '<form method=POST>'.
						 "<input type=hidden name='delete' value='" . $binary['filename'] . "' class='item' />\n".
						 '<input type="image" style="width:12px;padding-left:5px;" src="modules/administration/images/remove.gif" />'.
						 "</form>\n".
						 "</td>".
						 "<td align=left>";
					echo "<img class=\"viewitem\" src=\"images/exec.png\" alt=\"Binary file\" /> " . $binary['filename'] . "</td>
						 $secureFile<td>" . $binary['size'] . "</td><td>" . $binary['user'] . " " . $binary['group']. "</td>\n";
					echo "</tr>\n";
				}
				
				echo "</table>\n";
			}
		}
	}
	echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_cfg['home_id']."'><< ".get_lang('back')."</a></td></tr></table>";
}
?>
