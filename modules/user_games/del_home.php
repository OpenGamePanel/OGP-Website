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

function logHandling($home_id, $action = 'delete', &$remote){
	$fileId = str_pad($home_id, 9, '0', STR_PAD_LEFT);
	
	$files = array(
		'screenlogs/screenlog.OGP_HOME_'.$fileId	=> 'file',
		'screenlogs/screenlog.OGP_UPDATE_'.$fileId	=> 'file',
		'screenlogs/home_id_'.$home_id.'/'			=> 'dir',
	);
	
	if($action == 'backup'){
		$remote->exec('tar czf screenlogs/home_log_backup_'.$home_id.'.tar.gz '.implode(' ', array_keys($files)));
	}
	
	foreach($files as $file => $type){
		if($remote->rfile_exists($file)){
			if($type == 'file'){
				$remote->exec('rm '.$file);
			}
			
			if($type == 'dir'){
				$remote->exec('rm -r '.$file);
			}
		}
	}
}
 
function exec_ogp_module() {
	global $db, $view;
	require_once('includes/lib_remote.php');
	$home_id = $_GET['home_id'];
	$y = isset($_GET['y']) ? $_GET['y'] : "";
	$files = isset($_GET['files']) ? $_GET['files'] : "";
	$force = isset($_GET['force']) ? $_GET['force'] : "";
	$logAction = !empty($_GET['logAction']) ? $_GET['logAction'] : false;

	$home_info = $db->getGameHomeWithoutMods($home_id);

	if( $home_info === FALSE )
	{
		print_failure("User home_id $home_id not found.");
		$view->refresh("?m=user_games");
		return;
	}
	
	$remote = new OGPRemoteLibrary($home_info['agent_ip'], $home_info['agent_port'], $home_info['encryption_key'], $home_info['timeout']);
	$agent_online = $remote->status_chk() === 1;
	
	if($y != 'y')
	{
		echo "<p>".get_lang_f('sure_to_delete_serverid_from_remoteip_and_directory', 
							  $home_info['home_id'], $home_info['agent_ip'], $home_info['home_path'])."</p>";
		if($agent_online)
		{
			$r = $remote->rfile_exists($home_info['home_path']);
			if($r == 1)
			{
				echo "<p><a href=\"?m=user_games&amp;p=del&amp;y=y&amp;home_id=$home_id&amp;files=y\" id=\"deleteLink\">" . 
					 get_lang("yes_and_delete_the_files") . "</a> ";	
				echo '<input type="checkbox" name="logAction" id="doBackup"><label for="doBackup">Delete and Backup Logs</label> |';
			}
		}
		else
			print_failure(get_lang("agent_offline") . " " . get_lang("remove_it_anyway") . "?");
		echo "<a href=\"?m=user_games&amp;p=del&amp;y=y&amp;home_id=$home_id\">".
		get_lang("yes") . "</a> | <a href=\"?m=user_games\">".
		get_lang("no") . "</a></p>";
		
		// Not the prettiest way to do this...
		echo '<script>
			$(function(){
				var linkElement = $("#deleteLink"),
				defaultLink = linkElement.attr("href"),
				newLink = linkElement.attr("href");
				
				$("#doBackup").change(function(){
					if($(this).is(":checked")){
						linkElement.attr("href", newLink + "&logAction=backup");
					}else{
						linkElement.attr("href", defaultLink);
					}
				});
			});
		</script>';
		
		return;
	}

	if ( $db->IsFtpEnabled($home_id) and $force != 'y' and $agent_online )
	{
		$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
		if ( $remote->ftp_mgr("userdel", $ftp_login) === 0 )
		{
			$del_files = $files == 'y' ? '&amp;files=y' : '';
			print_failure(get_lang("failed_to_remove_ftp_account_from_remote_server"));
			echo "<p>" . get_lang("remove_it_anyway") . "<p>
				<a href=\"?m=user_games&amp;p=del&amp;y=y&amp;force=y&amp;home_id=$home_id$del_files\">".
				get_lang("yes") . "</a> | <a href=\"?m=user_games\">".
				get_lang("no") . "</a></p>";
			return;
		}
	}
		
	if($y == 'y')
	{
		if($agent_online)
		{
			$assigned = $db->getHomeIpPorts($home_id);
			if( !empty($assigned) )
			{
				foreach($assigned as $address)
				{
					if($remote->rfile_exists( "startups/".$address['ip']."-".$address['port'] ) === 1)
					{
						require_once("modules/gamemanager/home_handling_functions.php");
						require_once("modules/config_games/server_config_parser.php");
						exec_operation('stop', $home_id, FALSE, $address['ip'], $address['port']);
						
						break;
					}
				}
				
				if($logAction && is_numeric($home_id)){
					logHandling($home_id, $logAction, $remote);
				}
			}
		}
		
		// Delete cronjobs
		if(file_exists('modules/cron/shared_cron_functions.php')){
			require_once('modules/cron/shared_cron_functions.php');
			if(function_exists("deleteJobsByHomeServerID")){
				deleteJobsByHomeServerID($home_id);
			}
		}
		
		if ( $db->deleteGameHome($home_id) === FALSE )
		{
			print_failure(get_lang("failed_to_remove_gamehome_from_database"));
			return;
		}
		else
		{
			print_success(get_lang_f('successfully_deleted_game_server_with_id', $home_info['home_id']));
			$db->logger(get_lang_f('successfully_deleted_game_server_with_id', $home_info['home_id']));
		}
	}

	if($files == 'y' and $agent_online)
	{
		if($remote->remove_home($home_info['home_path']) == 1)
		{
			print_success(get_lang_f('sucessfully_deleted', $home_info['home_path']));
			$db->logger(get_lang_f('sucessfully_deleted', $home_info['home_path']));
		}
		else
		{
			print_failure(get_lang_f('the_agent_had_a_problem_deleting', $home_info['home_path']));
		}
	}
	$view->refresh("?m=user_games");
}
?>
