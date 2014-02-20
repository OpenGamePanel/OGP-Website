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

function exec_ogp_module() {
    global $db;
    global $view;
	require_once('includes/lib_remote.php');
    $game = "N/A";
    $home_id = $_GET['home_id'];
    $y = isset($_GET['y']) ? $_GET['y'] : "";
    $files = isset($_GET['files']) ? $_GET['files'] : "";
	$force = isset($_GET['force']) ? $_GET['force'] : "";

	$home_info = $db->getGameHomeWithoutMods($home_id);

    if( $home_info === FALSE )
    {
        print_failure("User home_id $home_id not found.");
        $view->refresh("?m=user_games");
        return;
    }

    if($y !== 'y')
    {
        echo "<p>".get_lang_f('sure_to_delete_serverid_from_remoteip_and_directory',$home_info['home_id'],$home_info['agent_ip'],$home_info['home_path'])."</p>";
		$server_info = $db->getRemoteServerById($home_info['remote_server_id']);
		$remote = new OGPRemoteLibrary($server_info['agent_ip'], $server_info['agent_port'], $server_info['encryption_key']);
		$r = $remote->rfile_exists($home_info['home_path']);
		if($r == 1)
		{
			echo "<p><a href=\"?m=user_games&amp;p=del&amp;y=y&amp;home_id=$home_id&amp;files=y\">".get_lang('yes_and_delete_the_files')."</a> | ";		
		}
        echo "<a href=\"?m=user_games&amp;p=del&amp;y=y&amp;home_id=$home_id\">".
        get_lang('yes')."</a> | <a href=\"?m=user_games\">".
        get_lang('no')."</a></p>";
        return;
    }
	if($force == 'y')
	{
		if ( $db->deleteGameHome($home_id) === FALSE )
			print_failure(get_lang('failed_to_remove_gamehome_from_database'));
		else
		{
			print_success(get_lang_f('successfully_deleted_game_server_with_id', $home_id));
			$db->logger(get_lang_f('successfully_deleted_game_server_with_id', $home_id));
		}
		global $view;
		$view->refresh("?m=user_games");
		return;
	}
	
	if ( $db->IsFtpEnabled($home_id) )
	{
		$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
		$remote = new OGPRemoteLibrary($home_info['agent_ip'], $home_info['agent_port'], $home_info['encryption_key']);
		if ( $remote->ftp_mgr("userdel", $ftp_login) === 0 )
		{
			print_failure(get_lang('failed_to_remove_ftp_account_from_remote_server'));
			echo "<p>".get_lang('remove_it_anyway')."<p>
				<a href=\"?m=user_games&amp;p=del&amp;y=y&amp;force=y&amp;home_id=$home_id\">".
				get_lang('yes')."</a> | <a href=\"?m=user_games\">".
				get_lang('no')."</a></p>";
			return;
		}
		else
		{
			if ( $db->deleteGameHome($home_id) === FALSE )
				print_failure(get_lang('failed_to_remove_gamehome_from_database'));
			else
			{
				print_success(get_lang_f('successfully_deleted_game_server_with_id',$home_info['home_id']));
				$db->logger(get_lang_f('successfully_deleted_game_server_with_id', $home_info['home_id']));
			}
		}
	}
	else
	{
		if ( $db->deleteGameHome($home_id) === FALSE )
			print_failure(get_lang('failed_to_remove_gamehome_from_database'));
		else
		{
			print_success(get_lang_f('successfully_deleted_game_server_with_id',$home_info['home_id']));
			$db->logger(get_lang_f('successfully_deleted_game_server_with_id', $home_info['home_id']));
		}
	}

    if($files == 'y')
    {
        $server_info = $db->getRemoteServerById($home_info['remote_server_id']);
        $remote = new OGPRemoteLibrary($server_info['agent_ip'],
            $server_info['agent_port'],$server_info['encryption_key']);

        $del_rc = $remote->remove_home($home_info['home_path']);
		while(!$del_rc)
        {
            sleep(1);
        }
        if($del_rc == 1)
        {
            print_success(get_lang_f('sucessfully_deleted', $home_info['home_path']));
			$db->logger(get_lang_f('sucessfully_deleted', $home_info['home_path']));
        }
        elseif($del_rc == 0)
        {
            print_failure(get_lang_f('the_agent_had_a_problem_deleting', $home_info['home_path']));
        }
    }
    global $view;
    $view->refresh("?m=user_games");
}
?>
