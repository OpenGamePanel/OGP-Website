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

function exec_ogp_module()
{
	global $db;
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	$home_id = $_GET['home_id'];
	
	if( $isAdmin )
		$game_home['access_rights'] = "ufpetc";
	else
		$game_home = $db->getUserGameHome($_SESSION['user_id'],$home_id);
	
	if ( !$game_home and !$isAdmin )
		return;

	$submit = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : "";

	$home_info = $db->getGameHomeWithoutMods($home_id);
	$servers_with_same_path = $db->getGameServersWithSamePath($home_info['remote_server_id'], $home_info['home_path']); 
	$servers_with_same_path = (is_array($servers_with_same_path) ? count($servers_with_same_path) : 0);
	
	$home_id = $home_info['home_id'];
	$enabled_mods = $db->getHomeMods($home_id);

	if( $isAdmin and isset( $_POST['change_home_cfg_id'] ) )
	{
		if( !empty($enabled_mods) )
		{
			foreach ( $enabled_mods as $enabled_rows ) 
			{
				$db->delGameMod($enabled_rows['mod_id']);
			}
		}
		$home_cfg_id = $home_info['home_cfg_id'];
		$new_home_cfg_id = $_POST['home_cfg_id'];
		if($db->updateHomeCfgId($home_id, $new_home_cfg_id))
		{
			$json_message = array('result' => 'success', 'info' => get_lang("successfully_changed_game_server"));
			echo json_encode($json_message);			
			$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("change_game_type") .":old home_cfg_id:$home_cfg_id, new home_cfg_id:$new_home_cfg_id");
		}
		else
			echo json_encode(array('result' => 'failure', 'info' => 'Error while updating game type.'));
		return;
	}
	
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION.$home_info['home_cfg_file']);
	include('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
	$ftp_installed = $db->isModuleInstalled('ftp');
		
	if( isset($_REQUEST['change_name']) )
	{
		$server_name = strip_tags(strip_real_escape_string($_POST['server_name']));
		if ( $db->changeHomeName($home_id, $server_name) === TRUE )
		{
			echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_changed_game_server")));
			$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("game_server_name") .":$server_name");
		}
		else
			echo json_encode(array('result' => 'failure', 'info' => 'Name update failed.'));
		return;
	}
	elseif ( isset($_REQUEST['change_control_password']) )
	{
		$control_password = $_POST['control_password'];
		if($control_password != "")
		{
			$control_password = validate_login($control_password);
			if(!$control_password)
			{
				echo json_encode(array('result' => 'failure', 'info' => 'Not allowed characters'));
				return;
			}
		}
		
		if ( $db->changeHomeControlPassword($home_id, $control_password) === TRUE )
		{			
			echo json_encode(array('result' => 'success', 'info' => get_lang("control_password_updated_successfully")));
			$db->logger( get_lang("control_password_updated_successfully") ." HOME ID:$home_id - ". get_lang("game_control_password") .":$control_password");
		}
		else
			echo json_encode(array('result' => 'failure', 'info' => get_lang("control_password_update_failed")));
		return;
	}
	elseif( isset($_REQUEST['change_ftp_login']) && preg_match("/t/",$game_home['access_rights']) > 0 )
	{
		// Is FTP Module Installed?
		if($ftp_installed){
			if ($db->IsFtpEnabled($home_id) OR $isAdmin)
			{
				$old_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
				$post_ftp_login = $_POST['ftp_login'];
				if($post_ftp_login != "")
				{
					$post_ftp_login = validate_login($post_ftp_login);
					if(!$post_ftp_login)
					{
						echo json_encode(array('result' => 'failure', 'info' => 'Not allowed characters'));
						return;
					}
				}
				else
				{
					echo json_encode(array('result' => 'failure', 'info' => 'Empty input not permitted.'));
					return;
				}
				
				// Validation
				
				// Is the same user old and new?
				if($old_login == $post_ftp_login)
				{
					echo json_encode(array('result' => 'success', 'info' => ''));
					return;
				}
				
				if(strlen($post_ftp_login) > 20){
					echo json_encode(array('result' => 'failure', 'info' => get_lang("ftp_account_username_too_long")));
					return;
				}
					
				$host_stat = $remote->status_chk();
				$user_exists = FALSE;
				$old_login_exists = FALSE;
				$host_online = FALSE;
				if( $host_stat === 1 )
				{			
					$host_online = TRUE;
					$ftp_accounts_list = $remote->ftp_mgr("list");
					$ftp_accounts = explode("\n",$ftp_accounts_list);

					foreach($ftp_accounts as $ftp_account)
					{
						if( $ftp_account != "" )
						{
							list($ftp_login, $ftp_path) = explode("\t",$ftp_account);
							$ftp_login = trim($ftp_login);
							
							if ($ftp_login == $old_login)
								$old_login_exists = TRUE;
							if ($ftp_login == $post_ftp_login)
								$user_exists = TRUE;
						}
					}
				}
				if( $host_online and ! $user_exists )
				{
					if($old_login_exists)
						$change_login_delete_old = $remote->ftp_mgr("userdel", $old_login);
					else
						$change_login_delete_old = 1;
					
					if ($change_login_delete_old !== 0)
					{
						$change_login_add_new = $remote->ftp_mgr("useradd", $post_ftp_login, $home_info['ftp_password'], $home_info['home_path']);
					}
					
					if (isset($change_login_add_new) and $change_login_add_new !== 0)
					{
						if ( $db->changeFtpLogin($home_id,$post_ftp_login) === TRUE )
						{
							echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_changed_game_server")));
							$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("server_ftp_login") .":$post_ftp_login");
						}
					}
					else
					{
						echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																				" " . get_lang("ftp_login_can_not_be_changed")));
					}
				}
				else
				{
					echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																			" " . get_lang("ftp_login_can_not_be_changed")));
				}
			}
		}
		return;
	}
	elseif( isset( $_REQUEST['change_ftp_password']) && preg_match("/t/",$game_home['access_rights']) > 0 )
	{
		// Is FTP Module Installed?
		if($ftp_installed){
			if ($db->IsFtpEnabled($home_id) OR $isAdmin)
			{
				$ftp_password = $_POST['ftp_password'];
				if($ftp_password != "")
				{
					$ftp_password = validate_login($ftp_password);
					if(!$ftp_password)
					{
						echo json_encode(array('result' => 'failure', 'info' => 'Not allowed characters'));
						return;
					}
				}
				else
				{
					echo json_encode(array('result' => 'failure', 'info' => 'Empty input not permitted.'));
					return;
				}
				
				// Validation
				
				// Is the same password old and new?
				if($home_info['ftp_password'] == $ftp_password)
				{
					echo json_encode(array('result' => 'success', 'info' => ''));
					return;
				}
				
				if(strlen($ftp_password) > 20){
					echo json_encode(array('result' => 'failure', 'info' => get_lang("ftp_account_password_too_long")));
					return;
				}
				
				$host_stat = $remote->status_chk();
				$current_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
				$login_exists = FALSE;
				$host_online = FALSE;
				
				if( $host_stat === 1 )
				{			
					$host_online = TRUE;
					$ftp_accounts_list = $remote->ftp_mgr("list");
					$ftp_accounts = explode("\n",$ftp_accounts_list);
					foreach($ftp_accounts as $ftp_account)
					{
						if( $ftp_account != "" )
						{
							list($ftp_login, $ftp_path) = explode("\t",$ftp_account);
							$ftp_login = trim($ftp_login);
							if ($ftp_login == $current_login)
							{
								$login_exists = TRUE;
								break;
							}
						}
					}
				}
				
				if($host_online)
				{
					if(!$login_exists)
					{
						if($remote->ftp_mgr("useradd", $current_login, $ftp_password, $home_info['home_path']) !== 0)
						{
							echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_changed_game_server")));
							$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("server_ftp_password") .":$ftp_password");
						}
						else
						{
							echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																				" " . get_lang("ftp_password_can_not_be_changed")));
						}
						return;
					}
					else
					{
						if ($remote->ftp_mgr("passwd", $current_login, $ftp_password) !== 0)
						{
							if ( $db->changeFtpPassword($home_id,clean_path($ftp_password)) === TRUE )
							{
								echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_changed_game_server")));
								$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("server_ftp_password") .":$ftp_password");
							}
						}
						else
						{
							echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																					" " . get_lang("ftp_password_can_not_be_changed")));
						}
					}
				}
				else
					echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																			" " . get_lang("ftp_password_can_not_be_changed")));
			}
		}
		return;
	}
	elseif (isset($_POST["force_mod_id"]))
	{
		$force_mod_id = $_POST['force_mod_id'];
		$ip_id = $_POST['ip_id'];
		$port = $_POST['port'];
		
		if ( $db->forceModAtAddress($ip_id, $port, $force_mod_id) )
		{
			echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_assigned_mod_to_address")));
			$db->logger( get_lang("successfully_assigned_mod_to_address") );
			
		}
		else
			echo json_encode(array('result' => 'failure', 'info' => "Failed to assign mod to address."));
		return;
	}
	elseif ( $isAdmin )
	{
		if( isset( $_REQUEST['create_ftp']) )
		{
			$login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
			
			$success = true;
			if(strlen($login) > 20){
				$result = get_lang("ftp_account_username_too_long");
				$type = "failure";
				$success = false;
			}
			
			if($success){
				if ($remote->ftp_mgr("useradd", $login, $home_info['ftp_password'], $home_info['home_path']) === 0)
				{
					$result = get_lang("error_ocurred_on_remote_server") ." ". get_lang("ftp_can_not_be_switched_on");
					$type = "failure";
				}
				else
				{
					$db->changeFtpStatus('enabled',$home_id);
					$result = get_lang("successfully_changed_game_server");
					$type = "success";
					$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("change_ftp_account_status") .":enabled");
				}
			}
		}
		else if( isset( $_REQUEST['delete_ftp']) )
		{
			$login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
			$host_stat = $remote->status_chk();
			$user_exists = FALSE;
			$host_online = FALSE;
			if( $host_stat === 1 )
			{
				$host_online = TRUE;
				$ftp_accounts_list = $remote->ftp_mgr("list");
				$ftp_accounts = explode("\n",$ftp_accounts_list);
				foreach($ftp_accounts as $ftp_account)
				{
					if( $ftp_account != "" )
					{
						list($ftp_login, $ftp_path) = explode("\t",$ftp_account);
						$ftp_login = trim($ftp_login);
						
						if ($ftp_login == $login)
						{
							$user_exists = TRUE;
							break;
						}
					}
				}
			}
			
			if($host_online and $ftp_accounts_list !== 0)
			{
				if( $user_exists )
				{
					$delete_ftp = $remote->ftp_mgr("userdel", $login);
					if ($delete_ftp === 0)
					{
						$result = get_lang("error_ocurred_on_remote_server") ." ". get_lang("ftp_can_not_be_switched_off");
						$type = "failure";
					}
					else
					{
						$db->changeFtpStatus('disabled',$home_id);
						$result = get_lang("successfully_changed_game_server");
						$type = "success";
						$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("change_ftp_account_status") .":disabled");
					}
				}
				else
				{
					$db->changeFtpStatus('disabled',$home_id);
					$result = get_lang("successfully_changed_game_server");
					$type = "success";
					$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("change_ftp_account_status") .":disabled");
				}
			}
			else
			{
				$result = get_lang("error_ocurred_on_remote_server") ." ". get_lang("ftp_can_not_be_switched_off");
				$type = "failure";
			}
		}
		else if( isset( $_REQUEST['change_user_id_main']) )
		{
			$user_id_main = $_POST['user_id_main'];
			$old_home = $db->getUserGameHome($home_info['user_id_main'],$home_id);
			if(isset($_POST['deleteoldassigns']))
			{
				$db->unassignHomeFrom("user",$home_info['user_id_main'],$home_id);
				$home_groups = $db->getGroupsForHome($home_info['home_id']);
				if( isset( $home_groups ) )
				{
					foreach($home_groups as $home_group)
					{
						$db->unassignHomeFrom("group",$home_group['group_id'],$home_id);
					}
				}
			}
			
			if ( $db->changeUserIdMain($home_id,$user_id_main) == TRUE )
			{
				$db->assignHomeTo("user",$user_id_main,$home_id,$old_home['access_rights']);
				echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_changed_game_server")));
				$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("change_user_id_main") .":$user_id_main");
			}
			else
				echo json_encode(array('result' => 'failure', 'info' => "Unable to change main user."));
			return;
		}
		else if( isset( $_REQUEST['change_home'] ) )
		{
			$home_path = strip_real_escape_string($_POST['home_path']);
			if(preg_match("/^[a-z]:\//i", $home_path))
			{
				$home_path = str_replace("/", "\\\\", $home_path);
				$home_path = rtrim($remote->exec("cygpath -u $home_path"));
			}
			if(preg_match("/^\//",$home_path))
			{
				if ( $db->changeHomePath($home_id,clean_path($home_path)) === TRUE )
				{
					$home_info = $db->getGameHomeWithoutMods($home_id);
					$servers_with_same_path = $db->getGameServersWithSamePath($home_info['remote_server_id'], $home_info['home_path']); 
					$servers_with_same_path = (is_array($servers_with_same_path) ? count($servers_with_same_path) : 0);
					
					$success_json = array('result' => 'success', 'info' => get_lang("successfully_changed_game_server"));
					
					if($servers_with_same_path > 1){
						$success_json["warning_info"] = get_lang('other_servers_exist_with_path_please_change');
					}
					
					// Create new home directory if it doesn't already exist
					$remote->exec("mkdir -p " . clean_path($home_path));
					
					// If FTP is enabled, update the FTP info.
					if($ftp_installed){
						if ($db->IsFtpEnabled($home_id))
						{
							$login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
							$delte_old_ftp_account = $remote->ftp_mgr("userdel", $login);
							if ($delte_old_ftp_account !== 0)
							{
								$create_new_ftp_account = $remote->ftp_mgr("useradd", $login, $home_info['ftp_password'], $home_path);
							}
							
							if (isset($create_new_ftp_account) and $create_new_ftp_account !== 0)
							{
								echo json_encode($success_json);
								$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("home_path") .":$home_path");
							}
							else
							{
								echo json_encode(array('result' => 'failure', 'info' => get_lang("error_ocurred_on_remote_server") .
																						" " . get_lang("ftp_login_can_not_be_changed")));
							}
						}
						else
						{
							echo json_encode($success_json);
							$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("home_path") .":$home_path");
						}
					}
					else
					{
						echo json_encode($success_json);
						$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("home_path") .":$home_path");
					}
				}
				else
					echo json_encode(array('result' => 'failure', 'info' => get_lang("selected_path_already_in_use")));
			}
			else
				echo json_encode(array('result' => 'failure', 'info' => get_lang("invalid_path")));
			return;
		}
		else if( isset( $_REQUEST['master_server'] ) )
		{
			if ( isset( $_POST['add'] ) )
				$action = "add";
			else
				$action = "remove";
			if ( $db->setMasterServer($action, $home_id, $home_info['home_cfg_id'], $home_info['remote_server_id']) === TRUE )
			{
				$result = get_lang("successfully_changed_game_server");
				$type = "success";
				$db->logger( get_lang("successfully_changed_game_server") ." HOME ID:$home_id - ". get_lang("set_as_master_server") .":$action");
			}
		}
		
		if( isset($_REQUEST['add_mod']) )
		{
			$mod_cfg_id = $_POST['mod_cfg_id'];
			if ( $db->addModToGameHome($home_id,$mod_cfg_id) === FALSE )
			{
				$result = get_lang_f('failed_to_assing_mod_to_home',$mod_cfg_id);
				$type = "failure";
			}
			else
			{
				$result = get_lang_f('successfully_assigned_mod_to_home',$mod_cfg_id);
				$type = "success";
				$db->logger(get_lang_f('successfully_assigned_mod_to_home',$mod_cfg_id)." [HOME ID:$home_id]");
			}
		}
		
		else if($submit == "delete_mod")
		{
			$mod_id = $_GET['mod_id'];
			if ( $db->delGameMod($mod_id) === TRUE )
			{
				$result = get_lang("successfully_removed_mod");
				$type = "success";
				$db->logger( get_lang("successfully_removed_mod") ." [MOD ID:$mod_id HOME ID:$home_id]");
			}
		}

		else if(isset($_REQUEST['set_options']))
		{
			$maxplayers = 0 + @$_POST['maxplayers'];
			$cliopts = $_POST['cliopts'];

			// Get the total CPU count. and, if the agent is offline, set the CPU to NA.
			$remoteCpus = $remote->cpu_count();
			$validCpus = $remoteCpus === -1 ? 'NA' : $remoteCpus-1;

			if(isset($_POST['cpus']) && $validCpus !== 'NA')
			{
				$cpuArray = explode(',', $_POST['cpus']);

				// Check if a a valid core has been submitted. eg, the checkbox hasn't been manually edited.
				foreach($cpuArray as $cpu)
				{
					if($cpu > $validCpus || !is_numeric($cpu))
					{
						$cpus = 'NA';
						break;
					} else {
						$cpus[] = $cpu;
					}
				}

				// If $cpus is an array, seperate all the values with a comma. Otherwise, just pass $cpus to the query - which, as above, will be NA.
				$cpus = is_array($cpus) ? implode(',', $cpus) : $cpus;

			} else {
				$cpus = 'NA';
			}

			// If we're on Windows, and some cores have been selected...
			if (preg_match('/cygwin/i', $remote->what_os()) && $cpus !== 'NA') {
				$result = 0;
				$cores = explode(',', $cpus);

				foreach ($cores as $core) {
					$coreNum = intval($core);
					$result |= (1 << $coreNum);
				}

				$cpus = strtoupper(dechex($result));
			}

			$nice = isset($_POST['nice']) ? (int)$_POST['nice'] : 0;
			$mod_cfg_id = $_POST['mod_cfg_id'];

			if ( $db->updateGameModParams($maxplayers,$cliopts,$cpus,$nice,$home_id,$mod_cfg_id) === TRUE )
			{
				echo json_encode(array('result' => 'success', 'info' => get_lang("successfully_modified_mod")));
				$db->logger( get_lang("successfully_modified_mod") ." [MOD CFG ID:$mod_cfg_id HOME ID:$home_id]");
			}
			else
				echo json_encode(array('result' => 'failure', 'info' => "The mod could not be changed."));
			return;
		}
		else if( isset( $_REQUEST['set_expiration_date'] ) )
		{
			if ( $db->updateExpirationDate($home_id, $_POST['expiration_date'], 'server') === TRUE )
			{
				echo json_encode(array('result' => 'success', 'info' => get_lang('expiration_date_changed')));
				$db->logger( get_lang('expiration_date_changed') ." [ HOME ID:$home_id NEW DATE:$_POST[expiration_date] ]");
			}
			else
				echo json_encode(array('result' => 'failure', 'info' => get_lang('expiration_date_could_not_be_changed')));
			return;
		}
	}
	?>
	<link rel="stylesheet" type="text/css" href="js/datetimepicker/jquery.datetimepicker.min.css"/>
	<script src="js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="js/modules/user_games.js"></script>
	<?php
	echo "<h2>". get_lang("editing_home_called") ." \"".htmlentities($home_info['home_name'])."\"</h2><div id='result' >";
	if(isset($result))
	{
		if($type == 'success')
			print_success($result);
		elseif($type = 'failure')
			print_failure($result);
	}
	echo "</div>";
	$home_info = $db->getGameHomeWithoutMods($home_id);
	echo "<p>";
	echo "<a href='?m=gamemanager&p=game_monitor&home_id=$home_id'>&lt;&lt; ". get_lang("back_to_game_monitor") ."</a>";
	if ( $isAdmin )
	{
		echo " &nbsp; ";
		echo "<a href='?m=user_games'>&lt;&lt; ". get_lang("back_to_game_servers") ."</a>";
	}
	echo "</p>";
	echo "<table class='center' id='main_settings' >";	
	if ( $isAdmin )
	{
		// Form to change game type
		echo "<tr><td rowspan='2' class='right'>". get_lang("game_type") .":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		$game_cfgs = $db->getGameCfgs();
		$host_stat = $remote->status_chk();
		if( $host_stat === 1)
			$os = $remote->what_os();
		else
			$os = "Unknown OS";
		echo "<select name='home_cfg_id' >";
		echo get_game_selector($os, $game_cfgs, $home_info['home_cfg_id']);
		echo "</select>";
		echo "<input type='submit' name='change_home_cfg_id' value='". get_lang("change_game_type") ."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>". get_lang("change_game_type_info") ."</td></tr>";
		// Form to edit main user.
		echo "<tr><td class='right'>". get_lang("user_id_main") .":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
		echo "<select name='user_id_main'>";
		$user = $db->getUserById($home_info['user_id_main']);
		echo "<option value='".$home_info['user_id_main']."'>".$user['users_login']."</option>\n";
		$users = $db->getUserList();
		foreach ( $users as $user ){
			// Only users and admins can be assigned homes... not subusers
			if(is_null($user['users_parent'])){
				if($home_info['user_id_main'] != $user['user_id']){
					echo "<option value='".$user['user_id']."'>".$user['users_login']."</option>\n";
				}
			}
		}
		echo "</select><br>";
		echo "<input type='checkbox' name='deleteoldassigns' id='deleteoldassigns' style='width:auto;' /><label for='deleteoldassigns' >". get_lang("Delete_old_user_assigned_homes") ."</label>";
		echo "<input type='submit' name='change_user_id_main' value='". get_lang("change_user_id_main") ."' />";
		echo "</form>";
		echo "</td></tr><tr><td colspan='2' class='info'>" . get_lang("change_user_id_main_info") ."</td></tr>";
		
		// Form to edit game path.
		echo "<tr><td class='right'>". get_lang("home_path") .":</td><td class='left'>".
			 "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>".
			 "<input type='hidden' name='home_id' value=\"$home_id\" />\n".
			 "<input type='text' size='30' name='home_path' value=\"".str_replace('"', "&quot;", $home_info['home_path'])."\" />".
			 "<input type='submit' name='change_home' value='". get_lang("change_home") ."' id='change_home_path' />".
			 "</form><button data-path=\"".str_replace('"', "&quot;", $home_info['home_path'])."\" data-home-id='".$home_id."' id='browse'>".
			  get_lang("browse") ."</button>";
			  if($servers_with_same_path > 1){
				print_failure(get_lang('other_servers_exist_with_path_please_change'), "warning");
			  }
		echo "</td></tr>".
			 "<tr><td colspan='2' class='info'>". get_lang("change_home_info") ."</td></tr>";
		
		//Jquery path browser dialog
		echo "<div id='dialog".
			 "' data-select_home_path='". get_lang("select_home_path") .
			 "' data-set_this_path='". get_lang("set_this_path") .
			 "' data-cancel='". get_lang("cancel") .
			 "' ></div>";
	}

	// Form to edit game name
	echo "<tr><td class='right'>". get_lang("game_server_name") .":</td><td class='left'>";
	echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
	echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
	echo "<input type='text' size='30' name='server_name' value=\"".str_replace('"', "&quot;", htmlentities($home_info['home_name']))."\" />";
	echo "<input type=submit name='change_name' value='". get_lang("change_name") ."' />";
	echo "</form></td></tr>";
	echo "<tr><td colspan='2' class='info'>". get_lang("change_name_info") ."</td></tr>";

	// Form to edit control password
	echo "<tr><td class='right'>". get_lang("game_control_password") .":</td><td class='left'>";
	echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
	echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
	echo "<input type='text' size='30' name='control_password' value=\"".str_replace('"', "&quot;", $home_info['control_password'])."\" />";
	echo "<input type='submit' name='change_control_password' value='". get_lang("change_control_password") ."' />";
	echo "</form></td></tr>";
	echo "<tr><td colspan='2' class='info'>". get_lang("change_control_password_info") ."</td></tr>";
	if ( $isAdmin && $ftp_installed )
	{
		// Forms to enable/disable ftp account
		echo "<tr>";
		echo "<td class='right'>". get_lang("change_ftp_account_status") .":</td>";
		echo "<td class='left'>";
		if ( !$db->IsFtpEnabled( $home_id ) )
		{
			echo "<div style='display:block;float:left;' ><form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
			echo "<input type='submit' name='create_ftp' value='". get_lang("ftp_on") ."' />";
			echo "</form></div>";
		}
		else
		{
			echo "<div style='display:block;float:left;' ><form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
			echo "<input type='submit' name='delete_ftp' value='". get_lang("ftp_off") ."' />";
			echo "</form></div>";
		}
		echo "</td></tr>";
		echo "<tr><td  colspan='2' class='info'>". get_lang("change_ftp_account_status_info") ."</td>";
		echo "</tr>";
	}
	if ( preg_match("/t/",$game_home['access_rights']) > 0 && $ftp_installed && $db->IsFtpEnabled($home_id) )
	{
		// Form to edit control ftp login
		$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
		echo "<tr><td class='right'>". get_lang("server_ftp_login") .":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='text' size='30' name='ftp_login' value=\"".str_replace('"', "&quot;", $ftp_login)."\" />";
		echo "<input type='submit' name='change_ftp_login' value='". get_lang("change_ftp_login") ."' />";
		echo "</form></td></tr>";
		echo "<tr><td  colspan='2' class='info'>". get_lang("change_ftp_login_info") ."</td></tr>";
		// Form to edit control ftp password
		echo "<tr><td class='right'>". get_lang("server_ftp_password") .":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='text' size='30' name='ftp_password' value=\"".str_replace('"', "&quot;", $home_info['ftp_password'])."\" />";
		echo "<input type='submit' name='change_ftp_password' value='". get_lang("change_ftp_password") ."' />";
		echo "</form></td></tr>";
		echo "<tr><td  colspan='2' class='info'>". get_lang("change_ftp_password_info") ."</td></tr>";
	}
		
	if ( $isAdmin )
	{
		$master_server_home_id = $db->getMasterServer( $home_info['remote_server_id'], $home_info['home_cfg_id'] );
		if( $master_server_home_id != FALSE AND $master_server_home_id == $home_id )
			$checked = 'checked ="checked"';
		else
			$checked = "";
		// Form to enable/disable as master server for local update		
		echo "</tr><tr><td class='right'>". get_lang("master_server_for_clon_update") .":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='checkbox' name='add' $checked />";
		echo "<input type='submit' name='master_server' value='". get_lang("set_as_master_server") ."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>". get_lang("set_as_master_server_for_local_clon_update") .
			 " (".get_lang_f( 'only_available_for', $server_xml->game_name, $home_info['remote_server_name']).")</td></tr>";
		// Expiration
		echo "<tr><td class='right'>".get_lang('server_expiration_date').":</td>\n".
			 "<td class='left'><form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>".
			 "<div id='datetimepicker' class='input-append date'>".
			 "<input name='expiration_date' placeholder='dd/MM/yyyy hh:mm:ss' type='text' value='".$expiration_date.
			 "' data-today='".date('d/m/Y H:i:s')."' >\n".
			 "</div>".
			 "<input type='submit' name='set_expiration_date' value='". get_lang("set_expiration_date") ."' />".
			 "</form></td></tr>\n".
			 "<tr><td  colspan='2' class='info'>". get_lang("server_expiration_date_info") ."</td></tr>";
	}
	
	echo "</table>";
	
	if ( $isAdmin )
	{
		$avail_ips = $db->getRemoteServerIPs($home_info['remote_server_id']);

		$ip_array = array();

		if ( is_array($avail_ips) && !empty($avail_ips) )
		{
			echo "<h3>". get_lang("ips_and_ports") ."</h3>";
			$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_info['home_id']) === 1;
			if( ! $screen_running )
			{
				if( isset($_REQUEST['set_ip']) )
				{
					$ip_id = $db->real_escape_string($_POST['ip']);
					$ip_row = $db->resultQuery( "SELECT ip FROM OGP_DB_PREFIXremote_server_ips WHERE ip_id=".$ip_id );
					$ip = $ip_row['0']['ip'];
					$port = $_POST['port'];
					$port = (int)(trim($port));
					$home_id = $_POST['home_id'];

					if ( !isPortValid($port) ) 
					{
						print_failure( get_lang("port_range_error") );
					}
					else
					{
						if ( $db->addGameIpPort($home_id, $ip_id, $port) === FALSE )
						{
							print_failure(get_lang_f('ip_port_already_in_use', $ip, $port));
						}
						else {
							print_success(get_lang_f('successfully_assigned_ip_port_to_server_id', $ip, $port, $home_id));
							$db->logger(get_lang_f('successfully_assigned_ip_port_to_server_id', $ip, $port, $home_id));
						}
					}
				}
				
				if (isset($_REQUEST["delete_ip"]))
				{
					$del_ip = $_GET['ip'];
					$del_port = $_GET['port'];
					
					if ( $db->delGameIpPort($home_id,$del_ip,$del_port) )
					{
						print_success( get_lang("successfully_assigned_ip_port") );
						$db->logger( get_lang("successfully_assigned_ip_port") ." [unassigned]");
					}
					else
						print_failure("Failed to unassign ip:port.");
				}

				echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n";
				echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
				echo  get_lang("ip") .":<select name='ip' onchange='this.form.submit();'>";

				foreach($avail_ips as $value)
				{
					$selected = ( isset($_POST['ip']) and $_POST['ip'] == $value['ip_id'] ) ? "selected='selected'" : "";
					echo "<option value='".$value['ip_id']."' $selected >".$value['ip']."</option>\n";
				}

				echo "</select>";

				$ip_id = isset($_POST['ip']) ? $_POST['ip'] : $avail_ips[0]['ip_id'];
				$port = $db->getNextAvailablePort($ip_id,$home_info['home_cfg_id']);

				echo " ". get_lang("port") .":<input type='text' name='port' value='".$port."' size='6' />";
				echo "<input type='submit' name='set_ip' value='". get_lang("set_ip") ."' />";
				echo "</form>";
				$assigned = $db->getHomeIpPorts($home_id);
				if( empty($assigned) )
				{
					print_failure( get_lang("no_ip_ports_assigned") );
				}
				else
				{
					foreach ( $assigned as $assigned_rows )
					{
						$force_mod = "";
						$align = "center";
						if( !empty($enabled_mods) and count($enabled_mods) > 1 )
						{
							$force_mod .= "<td align='left'>\n".
										  "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n".
										  "<input type='hidden' name='ip_id' value=".$assigned_rows['ip_id']." />".
										  "<input type='hidden' name='port' value=".$assigned_rows['port']." />".
										  "<select name='force_mod_id' onchange='this.form.submit();'>".
										  "<option value='0' >". get_lang("force_mod_on_this_address") ."</option>";
							foreach($enabled_mods as $mod)
							{
								$selected = $mod['mod_id'] == $assigned_rows['force_mod_id'] ? "selected='selected'" : "";
								$force_mod .= "<option value='".$mod['mod_id']."' $selected>".$mod['mod_name']."</option>";
							}
							$force_mod .= "</select>\n</form>\n</td>\n";
							$align = "right";
						}
						echo "<table class='center'><tr><td align='$align'>".$assigned_rows['ip'].":".$assigned_rows['port'].
							 " <a href='?m=user_games&p=edit&home_id=$home_id&delete_ip&ip=".
							 $assigned_rows['ip_id']."&port=".$assigned_rows['port'].
							 "'>[ ". delete ." ]</a></td>\n".
							 $force_mod.
							 "</tr>\n</table>\n";
					}
				}
			}
			else
			{
				print_failure(  get_lang("server_is_running_change_addresses_not_available")  );
			}
		}
		else
		{
			print_failure(  get_lang("no_ip_addresses_configured") ."<a href='?m=server'>". get_lang("server_page") ."</a>." );
		}
		echo "<div id='mods'></div>";
	}
	else
	{
		$assigned = $db->getHomeIpPorts($home_id);
		if( !empty($assigned) and !empty($enabled_mods) and count($enabled_mods) > 1 )
		{
			echo "<table class='center'>\n".
				 "<tr>\n".
				 "<td colspan='2' align='center'>".
				 "<h3>". get_lang("switch_mods") ."</h3>".
				 "</td>\n".
				 "</tr>\n";
			$force_mod = "";
			foreach ( $assigned as $assigned_rows )
			{
				$force_mod .= "<tr>\n<td align='right' style='width:50%' >".get_lang_f('switch_mod_for_address',$assigned_rows['ip'].":".$assigned_rows['port']).
							  "</td>\n<td align='left' style='width:50%' >\n".
							  "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n".
							  "<input type='hidden' name='ip_id' value=".$assigned_rows['ip_id']." />".
							  "<input type='hidden' name='port' value=".$assigned_rows['port']." />".
							  "<select name='force_mod_id' onchange='this.form.submit();'>".
							  "<option value='0' >". get_lang("force_mod_on_this_address") ."</option>";
				foreach($enabled_mods as $mod)
				{
					$selected = $mod['mod_id'] == $assigned_rows['force_mod_id'] ? "selected='selected'" : "";
					$force_mod .= "<option value='".$mod['mod_id']."' $selected>".$mod['mod_name']."</option>";
				}
				$force_mod .= "</select>\n</form>\n</td>\n</tr>\n";
			}
			echo $force_mod."</table>\n";
		}
	}
}
?>
