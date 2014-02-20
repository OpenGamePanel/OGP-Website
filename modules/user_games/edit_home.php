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

require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module()
{
    global $db;
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
    $submit = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : "";
		
	$home_id = $_GET['home_id'];
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
		$home_cfg_id = $game_home['home_cfg_id'];
		$new_home_cfg_id = $_POST['home_cfg_id'];
		if($db->updateHomeCfgId($home_id, $new_home_cfg_id))
		{
			print_success(get_lang('successfully_changed_game_server'));
			$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('change_game_type').":old home_cfg_id:$home_cfg_id, new home_cfg_id:$new_home_cfg_id");
		}
		$enabled_mods = $db->getHomeMods($home_id);
	}
	
	if( $isAdmin )
		$game_home = $db->getGameHome($_GET['home_id']);
	else
		$game_home = $db->getUserGameHome($_SESSION['user_id'],$_GET['home_id']);
	if ( ! $game_home and ! $isAdmin )
		return;
	
	$home_info = $db->getGameHomeWithoutMods($home_id);
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION.$home_info['home_cfg_file']);
	include('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);
	$ftp_installed = $db->isModuleInstalled('ftp');
	
	$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_info['home_id']) === 1;
	if ( $isAdmin )
	{
		$game_home['access_rights'] = "ufpet";
	}
	echo "<h2>".get_lang('editing_home_called')." \"".$home_info['home_name']."\"</h2>";
	
    if( isset($_REQUEST['change_name']) )
    {
        $server_name = $_POST['server_name'];
        if ( $db->changeHomeName($home_id, $server_name) === TRUE )
		{
            print_success(get_lang('successfully_changed_game_server'));
			$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('game_server_name').":$server_name");
		}
        else
            print_failure("Name update failed.");
    }
    elseif ( isset($_REQUEST['change_control_password']) )
    {
        $control_password = $_POST['control_password'];
        if ( $db->changeHomeControlPassword($home_id, $control_password) === TRUE )
		{
            print_success(get_lang('control_password_updated_successfully'));
			$db->logger(get_lang('control_password_updated_successfully')." HOME ID:$home_id - ".get_lang('game_control_password').":$control_password");
		}
        else
            print_failure(get_lang('control_password_update_failed'));
    }
	elseif( isset( $_REQUEST['change_ftp_login']) && preg_match("/t/",$game_home['access_rights']) > 0 )
	{
		// Is FTP Module Installed?
		if($ftp_installed){
			if ($db->IsFtpEnabled($home_id) OR $isAdmin)
			{
				$post_ftp_login = trim($_POST['ftp_login']);
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
							if ($ftp_login == $post_ftp_login)
							{
								$user_exists = TRUE;
								break;
							}
						}
					}
				}
				if( $host_online and ! $user_exists )
				{
					$old_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
					$change_login_delete_old = $remote->ftp_mgr("userdel", $old_login);
					if ($change_login_delete_old !== 0)
					{
						$change_login_add_new = $remote->ftp_mgr("useradd", $post_ftp_login, $home_info['ftp_password'], $home_info['home_path']);
					}
					
					if (isset($change_login_add_new) and $change_login_add_new !== 0)
					{
						if ( $db->changeFtpLogin($home_id,$post_ftp_login) === TRUE )
						{
							print_success(get_lang('successfully_changed_game_server'));
							$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('server_ftp_login').":$post_ftp_login");
						}
					}
					else
					{
						print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_login_can_not_be_changed'));
					}
				}
				else
				{
					print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_login_can_not_be_changed'));
				}
			}
		}
    }
	elseif( isset( $_REQUEST['change_ftp_password']) && preg_match("/t/",$game_home['access_rights']) > 0 )
	{
		// Is FTP Module Installed?
		if($ftp_installed){
			if ($db->IsFtpEnabled($home_id) OR $isAdmin)
			{
				$ftp_password = $_POST['ftp_password'];
				$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
				$change_passwd_on_remote = $remote->ftp_mgr("passwd", $ftp_login, $ftp_password);
				if ($change_passwd_on_remote !== 0)
				{
					if ( $db->changeFtpPassword($home_id,clean_path($ftp_password)) === TRUE )
					{
						print_success(get_lang('successfully_changed_game_server'));
						$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('server_ftp_password').":$ftp_password");
					}
				}
				else
				{
					print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_password_can_not_be_changed'));
				}
			}
		}
    }
	elseif (isset($_POST["force_mod_id"]))
	{
		$force_mod_id = $_POST['force_mod_id'];
		$ip_id = $_POST['ip_id'];
		$port = $_POST['port'];
		
		if ( $db->forceModAtAddress($ip_id, $port, $force_mod_id) )
		{
			print_success(get_lang('successfully_assigned_mod_to_address'));
			$db->logger(get_lang('successfully_assigned_mod_to_address'));
			
		}
		else
			print_failure("Failed to assign mod to address.");
	}
	elseif ( $isAdmin )
	{
		if( isset( $_REQUEST['create_ftp']) )
		{
			$login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
			$create_ftp = $remote->ftp_mgr("useradd", $login, $home_info['ftp_password'], $home_info['home_path']);
			if ($create_ftp === 0)
			{
				print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_can_not_be_switched_on'));
			}
			else
			{
				$db->changeFtpStatus('enabled',$home_id);
				print_success(get_lang('successfully_changed_game_server'));
				$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('change_ftp_account_status').":enabled");
			}
		}
		else if( isset( $_REQUEST['delete_ftp']) )
		{
			$login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
			$delete_ftp = $remote->ftp_mgr("userdel", $login);
			if ($delete_ftp === 0)
			{
				print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_can_not_be_switched_off'));
			}
			else
			{
				$db->changeFtpStatus('disabled',$home_id);
				print_success(get_lang('successfully_changed_game_server'));
				$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('change_ftp_account_status').":disabled");
			}
		}
		else if( isset( $_REQUEST['change_user_id_main']) )
		{
			$user_id_main = $_POST['user_id_main'];
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
			$old_home = $db->getUserGameHome($home_info['user_id_main'],$home_id);
			if ( $db->changeUserIdMain($home_id,clean_path($user_id_main)) === TRUE && $db->assignHomeTo("user",$user_id_main,$home_id,$old_home['access_rights']) === TRUE )
			{
				print_success(get_lang('successfully_changed_game_server'));
				$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('change_user_id_main').":$user_id_main");
			}
		}
		else if( isset( $_REQUEST['change_home'] ) )
		{
			$home_path = $_POST['home_path'];
			if ( $db->changeHomePath($home_id,clean_path($home_path)) === TRUE )
			{
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
							print_success(get_lang('successfully_changed_game_server'));
							$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('home_path').":$home_path");
						}
						else
						{
							print_failure(get_lang('error_ocurred_on_remote_server')." ".get_lang('ftp_login_can_not_be_changed'));
						}
					}
					else
					{
						print_success(get_lang('successfully_changed_game_server'));
						$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('home_path').":$home_path");
					}
				}
				else
				{
					print_success(get_lang('successfully_changed_game_server'));
					$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('home_path').":$home_path");
				}
			}
		}
		else if( isset( $_REQUEST['master_server'] ) )
		{
			if ( isset( $_POST['add'] ) )
				$action = "add";
			else
				$action = "remove";
			if ( $db->setMasterServer($action, $home_id, $home_info['home_cfg_id'], $home_info['remote_server_id']) === TRUE )
			{
				print_success(get_lang('successfully_changed_game_server'));
				$db->logger(get_lang('successfully_changed_game_server')." HOME ID:$home_id - ".get_lang('set_as_master_server').":$action");
			}
		}
		
		if( isset($_REQUEST['add_mod']) )
		{
			$mod_cfg_id = $_POST['mod_cfg_id'];
			if ( $db->addModToGameHome($home_id,$mod_cfg_id) === FALSE )
			{
				print_failure(get_lang_f('failed_to_assing_mod_to_home',$mod_cfg_id));
			}
			else
			{
				print_success(get_lang_f('successfully_assigned_mod_to_home',$mod_cfg_id));
				$db->logger(get_lang_f('successfully_assigned_mod_to_home',$mod_cfg_id)." [HOME ID:$home_id]");
			}
		}
		
		else if($submit == "delete_mod")
		{
			$mod_id = $_GET['mod_id'];
			if ( $db->delGameMod($mod_id) === TRUE )
				print_success(get_lang('successfully_removed_mod'));
				$db->logger(get_lang('successfully_removed_mod')." [MOD ID:$mod_id HOME ID:$home_id]");
		}

		else if(isset($_REQUEST['set_options']))
		{
			$maxplayers = 0 + @$_POST['maxplayers'];
			$cliopts = $_POST['cliopts'];
			$cpus = $_POST['cpus'];
			$nice = $_POST['nice'];
			$mod_cfg_id = $_POST['mod_cfg_id'];

			$db->updateGameModParams($maxplayers,$cliopts,$cpus,$nice,$home_id,$mod_cfg_id);
			print_success(get_lang("successfully_modified_mod"));
			$db->logger(get_lang('successfully_modified_mod')." [MOD CFG ID:$mod_cfg_id HOME ID:$home_id]");
			echo "<meta http-equiv='refresh' content='2'>";
		}
	}

	$home_info = $db->getGameHomeWithoutMods($home_id);
	$custom_fileds_access_enabled = preg_match("/c/",$game_home['access_rights']) > 0 ? TRUE : FALSE;
	echo "<p>";
	echo "<a href='?m=gamemanager&p=game_monitor&home_id=$home_id'>&lt;&lt; ".get_lang('back_to_game_monitor')."</a>";
	if ( $isAdmin )
	{
		echo " &nbsp; ";
		echo "<a href='?m=user_games'>&lt;&lt; ".get_lang('back_to_game_servers')."</a>";
		$custom_fileds_access_enabled = TRUE;
	}
	if( isset($server_xml->custom_fields) and $custom_fileds_access_enabled )
		echo " &nbsp; <a href='?m=user_games&p=custom_fields&home_id=".$home_id."'>".get_lang('go_to_custom_fields')." &gt;&gt;</a>";
	
	echo "</p>";
	echo "<table class='center'>";	
	if ( $isAdmin )
	{
		// Form to change game type
		echo "<tr><td rowspan='2' class='right'>".get_lang('game_type').":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		$game_cfgs = $db->getGameCfgs();
		$host_stat = $remote->status_chk();
		if( $host_stat === 1)
			$os = $remote->what_os();
		else
			$os = "Unknown OS";
		echo "<select name='home_cfg_id' >";
		// Linux 64 bits + wine
		if( preg_match("/Linux/", $os) AND preg_match("/64/", $os) AND preg_match("/wine/", $os) )
		{
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/linux/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name'];
					if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
					echo "</option>\n";
				}
			}
			echo "<option style='background:black;color:white;' value=''>".get_lang('wine_games').":</option>\n";
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/win/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name'];
					if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
					echo "</option>\n";
				}
			}
		}
		// Linux 64 bits
		elseif( preg_match("/Linux/", $os) AND preg_match("/64/", $os) )
		{
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/linux/", $row['game_key']))
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name'];
					if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
					echo "</option>\n";
				}
			}
		}
		// Linux 32 bits + wine
		elseif( preg_match("/Linux/", $os) AND preg_match("/wine/", $os) )
		{ 
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/linux32/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name']."</option>\n";
				}
			}
			echo "<option style='background:black;color:white;' value=''>".get_lang('wine_games')."</option>\n";
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/win32/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name']."</option>\n";
				}
			}
		}
		// Linux 32 bits
		elseif( preg_match("/Linux/", $os) )
		{ 
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/linux32/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name']."</option>\n";
				}
			}
		}
		// Windows 64 bits (CYGWIN)
		elseif( preg_match("/CYGWIN/", $os) AND preg_match("/64/", $os))
		{
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/win/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name'];
					if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
					echo "</option>\n";
				}
			}
		}
		// Windows 32 bits (CYGWIN)
		elseif( preg_match("/CYGWIN/", $os))
		{
			foreach ( $game_cfgs as $row )
			{
				if ( preg_match("/win32/", $row['game_key']) )
				{
					$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
					echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name']."</option>\n";
				}
			}
		}
		elseif ( $os == "Unknown OS" )
		{
			foreach ( $game_cfgs as $row )
			{
				$selected = $home_info['home_cfg_id'] == $row['home_cfg_id'] ? 'selected="selected"' : "";
				echo "<option value='".$row['home_cfg_id']."' $selected>".$row['game_name'];
				if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
				echo "</option>\n";
			}
		}
		echo "</select>\n</td></tr>";
		echo "<tr><td class='left'><input type='submit' name='change_home_cfg_id' value='".get_lang('change_game_type')."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>".get_lang('change_game_type_info')."</td></tr>";
		// Form to edit main user.
		echo "<tr><td rowspan='3' class='right'>".get_lang('user_id_main').":</td><td class='left'>";
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
		echo "</select></td></tr>";
		echo "<tr><td><input type='checkbox' name='deleteoldassigns' id='deleteoldassigns' /><label for='deleteoldassigns' >".get_lang('Delete_old_user_assigned_homes')."</label></td></tr>";
		echo "<tr><td class='left'><input type='submit' name='change_user_id_main' value='".get_lang('change_user_id_main')."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>".get_lang('change_user_id_main_info')."</td></tr>";
		
		// Form to edit game path.
		echo "<tr><td class='right'>".get_lang('home_path').":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
		echo "<input type='text' size='30' name='home_path' value=".$home_info['home_path']." />";
		echo "<input type='submit' name='change_home' value='".get_lang('change_home')."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>".get_lang('change_home_info')."</td></tr>";
	}

    // Form to edit game name
    echo "<tr><td class='right'>".get_lang('game_server_name').":</td><td class='left'>";
    echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
    echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
    echo "<input type='text' size='30' name='server_name' value='".$home_info['home_name']."' />";
    echo "<input type=submit name='change_name' value='".get_lang('change_name')."' />";
    echo "</form></td></tr>";
    echo "<tr><td colspan='2' class='info'>".get_lang('change_name_info')."</td></tr>";

    // Form to edit control password
    echo "<tr><td class='right'>".get_lang('game_control_password').":</td><td class='left'>";
    echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
    echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
    echo "<input type='text' size='30' name='control_password' value='".$home_info['control_password']."' />";
    echo "<input type='submit' name='change_control_password' value='".get_lang('change_control_password')."' />";
    echo "</form></td></tr>";
    echo "<tr><td colspan='2' class='info'>".get_lang('change_control_password_info')."</td></tr>";
	if ( preg_match("/t/",$game_home['access_rights']) > 0 && $ftp_installed && $db->IsFtpEnabled($home_id) )
	{
		// Form to edit control ftp login
		$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
		echo "<tr><td class='right'>".get_lang('server_ftp_login').":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='text' size='30' name='ftp_login' value='".$ftp_login."' />";
		echo "<input type='submit' name='change_ftp_login' value='".get_lang('change_ftp_login')."' />";
		echo "</form></td></tr>";
		echo "<tr><td  colspan='2' class='info'>".get_lang('change_ftp_login_info')."</td></tr>";
		// Form to edit control ftp password
		echo "<tr><td class='right'>".get_lang('server_ftp_password').":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='text' size='30' name='ftp_password' value='".$home_info['ftp_password']."' />";
		echo "<input type='submit' name='change_ftp_password' value='".get_lang('change_ftp_password')."' />";
		echo "</form></td></tr>";
		echo "<tr><td  colspan='2' class='info'>".get_lang('change_ftp_password_info')."</td></tr>";
	}
	if ( $isAdmin && $ftp_installed )
	{
		// Forms to enable/disable ftp account
		echo "<tr>";
		echo "<td class='right'>".get_lang('change_ftp_account_status').":</td>";
		echo "<td class='left'>";
		if ( !$db->IsFtpEnabled( $home_id ) )
		{
			echo "<div style='display:block;float:left;' ><form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
			echo "<input type='submit' name='create_ftp' value='".get_lang('ftp_on')."' />";
			echo "</form></div>";
		}
		else
		{
			echo "<div style='display:block;float:left;' ><form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
			echo "<input type='submit' name='delete_ftp' value='".get_lang('ftp_off')."' />";
			echo "</form></div>";
		}
		echo "</td></tr>";
		echo "<tr><td  colspan='2' class='info'>".get_lang('change_ftp_account_status_info')."</td>";
		echo "</tr>";
	}
	
	if ( $isAdmin )
	{
		$master_server_home_id = $db->getMasterServer( $home_info['remote_server_id'], $home_info['home_cfg_id'] );
		if( $master_server_home_id != FALSE AND $master_server_home_id == $home_id )
			$checked = 'checked ="checked"';
		else
			$checked = "";
		// Form to enable/disable as master server for local update		
		echo "</tr><tr><td class='right'>".get_lang('master_server_for_clon_update').":</td><td class='left'>";
		echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>";
		echo "<input type='checkbox' name='add' $checked />";
		echo "<input type='submit' name='master_server' value='".get_lang('set_as_master_server')."' />";
		echo "</form></td></tr>";
		echo "<tr><td colspan='2' class='info'>".get_lang('set_as_master_server_for_local_clon_update').
			 " (".get_lang_f( 'only_available_for', $server_xml->game_name, $home_info['remote_server_name']).")</td></tr>";
	}
	
    echo "</table>";
	
	if ( $isAdmin )
	{
		$avail_ips = $db->getRemoteServerIPs($home_info['remote_server_id']);

		$ip_array = array();

		if ( is_array($avail_ips) && !empty($avail_ips) )
		{
			echo "<h3>".get_lang('ips_and_ports')."</h3>";
			
			if( ! $screen_running )
			{
				if( isset($_REQUEST['set_ip']) )
				{
					$ip_id = $_POST['ip'];
					$ip_row = $db->resultQuery( "SELECT ip FROM OGP_DB_PREFIXremote_server_ips WHERE ip_id=".$ip_id );
					$ip = $ip_row['0']['ip'];
					$port = $_POST['port'];
					$port = (int)(trim($port));
					$home_id = $_POST['home_id'];

					if ( !isPortValid($port) ) 
					{
						print_failure(get_lang('port_range_error'));
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
						print_success(get_lang('successfully_assigned_ip_port'));
						$db->logger(get_lang('successfully_assigned_ip_port')." [unassigned]");
					}
					else
						print_failure("Failed to unassign ip:port.");
				}
								
				echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n";
				echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
				echo get_lang('ip').":<select name='ip' onchange='this.form.submit();'>";
				
				foreach($avail_ips as $value)
				{
					$selected = ( isset($_POST['ip']) and $_POST['ip'] == $value['ip_id'] ) ? "selected='selected'" : "";
					echo "<option value='".$value['ip_id']."' $selected >".$value['ip']."</option>\n";
				}
				
				echo "</select>";

				$ip_id = isset($_POST['ip']) ? $_POST['ip'] : $avail_ips[0]['ip_id'];
				$port = $db->getNextAvailablePort($ip_id,$home_info['home_cfg_id']);
					
				echo " ".get_lang('port').":<input type='text' name='port' value='".$port."' size='6' />";
				echo "<input type='submit' name='set_ip' value='".get_lang('set_ip')."' />";
				echo "</form>";
				$assigned = $db->getHomeIpPorts($home_id);
				if( empty($assigned) )
				{
					print_failure(get_lang('no_ip_ports_assigned'));
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
										  "<option value='0' >".get_lang('force_mod_on_this_address')."</option>";
							foreach($enabled_mods as $mod)
							{
								$selected = $mod['mod_id'] == $assigned_rows['force_mod_id'] ? "selected='selected'" : "";
								$force_mod .= "<option value='".$mod['mod_id']."' $selected>".$mod['mod_name']."</option>";
							}
							$force_mod .= "</select>\n</form>\n</td>\n";
							$align = "right";
						}
						echo "<table class='center'><tr><td align='$align'>".$assigned_rows['ip'].":".$assigned_rows['port'].
							 " <a href='?m=user_games&amp;p=edit&amp;home_id=$home_id&amp;delete_ip&amp;ip=".
							 $assigned_rows['ip_id']."&amp;port=".$assigned_rows['port'].
							 "'>[ ".get_lang('delete')." ]</a></td>\n".
							 $force_mod.
							 "</tr>\n</table>\n";
					}
				}
			}
			else
			{
				print_failure( get_lang('server_is_running_change_addresses_not_available') );
			}
		}
		else
		{
			print_failure( get_lang('no_ip_addresses_configured')."<a href='?m=server'>".get_lang('server_page')."</a>." );
		}

		echo "<h3>".get_lang('mods')."</h3>";
		echo "<p class='info'>".get_lang('extra_cmd_line_info')."</p>\n";
				
		if( empty($enabled_mods) )
		{
			print_failure(get_lang('note').":".get_lang('note_no_mods'));
		
			$cpu_count = $remote->cpu_count();
			if($cpu_count === -1)
			{
				print_failure(get_lang('warning_agent_offline_defaulting_CPU_count_to_1'));
				$cpu_count = 'NA';
			}
			else
			{
				// cpu numbering starts from 0 so lets remove the last cpu.
				$cpu_count -= 1;
			}
			
			$game_mods = $db->getAvailableModsForGameHome($home_id);
			foreach ( $game_mods as $game_mod )
			{
				if( $game_mod['mod_name']=="none" )
				{
					$mod_cfg_id=$game_mod['mod_cfg_id'];
				}
				if( $game_mod['mod_name']=="None" )
				{
					$mod_cfg_id=$game_mod['mod_cfg_id'];
				}
			}
			
			if (isset($mod_cfg_id))
			{
				$db->addModToGameHome($home_id,$mod_cfg_id);
				unset($mod_cfg_id);
				echo "<meta http-equiv='refresh' content='0'>";
			}
			else
			{
				echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n";
				echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
				echo "<p>".get_lang('available_mods').": <select name='mod_cfg_id'>\n";
				foreach ( $game_mods as $game_mod )
				{
					echo "<option value='".$game_mod['mod_cfg_id']."'>".$game_mod['mod_name']."</option>\n";
				}
				echo "</select>\n";
				echo "<input type='submit' name='add_mod' value='".get_lang('add_mod')."' /></p>";
				echo "</form>";
			}
		}
		else
		{
			$cpu_count = $remote->cpu_count();
			if($cpu_count === -1)
			{
				print_failure(get_lang('warning_agent_offline_defaulting_CPU_count_to_1'));
				$cpu_count = 'NA';
			}
			else
			{
				// cpu numbering starts from 0 so lets remove the last cpu.
				$cpu_count -= 1;
			}

			echo "<table class='center'>\n";
			echo "<tr><td></td><td><b>".get_lang('mod_name')."</b></td>";
			if ( $server_xml->max_user_amount )
			{
				echo "<td><b>".get_lang('max_players')."</b></td>";
			}
			echo "<td><b>".get_lang('extra_cmd_line_args')."</b></td><td><b>".get_lang('cpu_affinity')."</b></td>";
			echo "<td><b>".get_lang('nice_level')."</b></td><td></td></tr>\n";
			foreach ( $enabled_mods as $enabled_rows ) {
				echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'><tr><td>\n".
					 "<input type='hidden' name='home_id' value=\"$home_id\" />\n".
				     "<input type='hidden' name='mod_cfg_id' value=\"".$enabled_rows['mod_cfg_id']."\" />\n".
					 "<a href='?m=user_games&amp;p=edit&amp;mod_id=".$enabled_rows['mod_id'].
					 "&amp;home_id=$home_id&amp;submit=delete_mod'>[ ".get_lang('remove_mod')." ]</a><br>".
					 "<a href='?m=user_games&p=install_cmds&home_id=$home_id&mod_id=".$enabled_rows['mod_id'].
					 "'>".get_lang('mod_install_cmds')."</a></td>".
					 "<td>".$enabled_rows['mod_name']."</td>";
				if ( $server_xml->max_user_amount )
				{
					echo "<td>".create_drop_box_from_array(range(0,$server_xml->max_user_amount),
						'maxplayers',$enabled_rows['max_players'],true)."</td>";
				}
				echo "<td><input type='text' name='cliopts' size='20' value=\"".
					$enabled_rows['extra_params']."\" /></td>";
				echo "<td>".create_drop_box_from_array(array_merge(array('NA'),range(0,$cpu_count)),
					'cpus',$enabled_rows['cpu_affinity'])."</td>";

				echo "<td>".create_drop_box_from_array(array_merge(range(-19,19)),
					'nice',$enabled_rows['nice'])."</td>";
				echo "<td><input type='submit' name='set_options' value='".get_lang('set_options')."' /></td></tr></form>\n";
			}
			echo "</table>\n";
			$game_mods = $db->getAvailableModsForGameHome($home_id);
			foreach ( $game_mods as $game_mod )
			{
				if ($game_mod['mod_name']=="none")
				{
					$mods_available = 0;
				}
				elseif ($game_mod['mod_name']=="None")
				{
					$mods_available = 0;
				}
				else
				{
					$mods_available = 1;
				}
			}
			if($mods_available == 1)
			{
				echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n";
				echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
				echo "<p>".get_lang('available_mods').": <select name='mod_cfg_id'>\n";
				foreach ( $game_mods as $game_mod )
				{
					echo "<option value='".$game_mod['mod_cfg_id']."'>".$game_mod['mod_name']."</option>\n";
				}
				echo "</select>\n";
				echo "<input type='submit' name='add_mod' value='".get_lang('add_mod')."' /></p>";
				echo "</form>";
			}
		}
    }
	else
	{
		$assigned = $db->getHomeIpPorts($home_id);
		if( !empty($assigned) and !empty($enabled_mods) and count($enabled_mods) > 1 )
		{
			echo "<table class='center'>\n".
				 "<tr>\n".
				 "<td colspan='2' align='center'>".
				 "<h3>".get_lang('switch_mods')."</h3>".
				 "</td>\n".
				 "</tr>\n";
			foreach ( $assigned as $assigned_rows )
			{
				$force_mod = "<tr>\n<td align='right' style='width:50%' >".get_lang_f('switch_mod_for_address',$assigned_rows['ip'].":".$assigned_rows['port']).
							 "</td>\n".
				$force_mod .= "<td align='left' style='width:50%' >\n".
							  "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n".
							  "<input type='hidden' name='ip_id' value=".$assigned_rows['ip_id']." />".
							  "<input type='hidden' name='port' value=".$assigned_rows['port']." />".
							  "<select name='force_mod_id' onchange='this.form.submit();'>";
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
