<script type="text/javascript" src="js/modules/user_games.js"></script>
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

require_once('includes/lib_remote.php');

function litefm_check($home_id)
{
	if (isset($_GET['folder']))
		$_SESSION['browser_cwd_'.$home_id] = stripslashes($_GET['folder']);
	
	if (isset($_GET['item']))
	{
		if($_SESSION['browser_folders_'.$home_id][$_GET['item']])
		{
			$_SESSION['browser_cwd_'.$home_id] = clean_path(@$_SESSION['browser_cwd_'.$home_id] . "/" .
												 $_SESSION['browser_folders_'.$home_id][$_GET['item']]);
		}
	}
	// To go back a dir, we just use dirname to strip the last directory or file off the path
	if (isset($_GET['back']))
	{
		$_SESSION['browser_cwd_'.$home_id] = dirname( $_SESSION['browser_cwd_'.$home_id] );
	}
	return TRUE;
}

function exec_ogp_module()
{
	$home_id = $_REQUEST['home_id'];

	if (empty($home_id))
	{
		print_failure(get_lang('home_id_missing'));
		return;
	}

	global $db;
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
	
	$home_id = $home_cfg['home_id'];

	litefm_check($home_id);
	
	$remote = new OGPRemoteLibrary($home_cfg['agent_ip'], $home_cfg['agent_port'], $home_cfg['encryption_key'], $home_cfg['timeout']);

	if($isAdmin and isset($_GET['all_fs']))
		$path = clean_path("/".@$_SESSION['browser_cwd_'.$home_id]);
	else
		$path = clean_path($home_cfg['home_path'].@$_SESSION['browser_cwd_'.$home_id]);

	while(!$remote->rfile_exists($path))
	{
		$_SESSION['browser_cwd_'.$home_id] = dirname( $_SESSION['browser_cwd_'.$home_id] );
		if($isAdmin && $_GET['all_fs'])
			$path = clean_path("/".@$_SESSION['browser_cwd_'.$home_id]);
		else
			$path = clean_path($home_cfg['home_path'].@$_SESSION['browser_cwd_'.$home_id]);
	}
	
	if( isset( $_GET['create_folder'] ) )
	{
		$folder_name = stripslashes($_GET['folder_name']);
		$folder_path = clean_path( $path . "/" . $folder_name );
		$remote->shell_action('create_dir', $folder_path);
		$db->logger( get_lang("create_folder") . ": " . $folder_path );
	}
		
	$dirlist = $remote->remote_dirlistfm($path);
	$_SESSION['browser_folders_'.$home_id] = array();
	if ( is_array($dirlist) )
	{
		$selected_path = clean_path("/".@$_SESSION['browser_cwd_'.$home_id]);
		echo "<p id=selected_path >$selected_path</p>".
			 "<table class='center' width='440px' >\n<b class='levelup'  title='".
			 get_lang("level_up_info")."' data-home-id='".$home_id."' data-path='".$path."' >";
		if( $path != "/" )
			echo '..&nbsp;&nbsp;'.get_lang("level_up");
		echo "</b><tr><td align=left >\n".
			 get_lang('folder')."</td>".
			 "<td align=center >".get_lang('owner').
			 "</td><td align=center >".get_lang('group')."</td></tr>\n";
		
		if(isset($dirlist['directorys']) and is_array($dirlist['directorys']))
		{
			$dirlist['directorys'] = array_orderby($dirlist['directorys'], 'filename', SORT_ASC);
			$i = 0;
			foreach($dirlist['directorys'] as $directory)
			{
				echo "<tr>\n".
					 "<td class='folder' align=left data-item='$i' >".
					 "<img src=\"" . check_theme_image("images/folder.png") . "\" alt=\"Directory\" /> ".
					 "<b>" . $directory['filename'] . "</b></td>";
				echo "<td align=center >" . $directory['user'] . "</td>".
					 "<td align=center >" . $directory['group']. "</td>\n".
					 "</tr>\n";
				$_SESSION['browser_folders_'.$home_id][$i] = $directory['filename'];
				$i++;
			}
		}
		echo "<tr>\n".
			 "<td align=left>".
			 "<input style='width:100%;' type=text name=dirname placeholder='".
			 get_lang("add_folder")."' title='".get_lang("add_folder_info").
			 "' ></td><td align=left >&nbsp;<img id='addfolder' src=\"" . check_theme_image("images/addfolder.png") . "\" title=\"".
			 get_lang("add_folder")."\" /> ".
			 "</td>\n".
			 "</tr>\n".
			 "</table>\n";
	}
}
?>
