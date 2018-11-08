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

require_once(MODULES."/litefm/litefm.php");

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
	
	if ( preg_match("/f/",$home_cfg['access_rights']) != 1 )
	{
		print_failure( get_lang("no_rights") );
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_cfg['home_id']."'><< ". get_lang("back") ."</a></td></tr></table>";
		return;
	}

	if ( isset($_REQUEST['save_file']) )
	{
		$_REQUEST['file_content'] = strip_real_escape_string($_REQUEST['file_content']);

		$remote = new OGPRemoteLibrary($home_cfg['agent_ip'], $home_cfg['agent_port'], $home_cfg['encryption_key'], $home_cfg['timeout']);
		$file_info = $remote->remote_writefile($home_cfg['home_path']."/".$_SESSION['fm_cwd_'.$home_id], $_REQUEST['file_content']);
		if ( $file_info === 1 )
		{
			print_success(get_lang('wrote_changes'));
			$db->logger(get_lang('wrote_changes')." ( ".$home_cfg['home_name']." - ".$home_cfg['home_path'].$_SESSION['fm_cwd_'.$home_id]." )");
		}
		else if ( $file_info === 0 )
			print_failure(get_lang('failed_write'));
		else
			print_failure(get_lang("agent_offline"));
	}
	echo "<table class='center' style='width:100%;'>".show_back($home_id)."</table>";
}
?>
