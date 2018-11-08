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

function create_selection($selection,$flag)
{
	return "<tr><td align='right'><label for='".clean_id_string($selection)."'>".get_lang($selection).":</label></td>
		<td align='left'><input id='".clean_id_string($selection)."' type='checkbox' name='".$selection."' value='1' checked='checked' /></td></tr><tr>
		<td align='left' class='info' colspan='2'>".get_lang($selection.'_info')."</td></tr>";
}
function exec_ogp_module()
{
	global $db, $settings;
	global $view;
	echo "<h2>".get_lang('add_new_game_home')."</h2>";
	echo "<p><a href='?m=user_games'>&lt;&lt; ".get_lang('back_to_game_servers')."</a></p>";

	$default_home_dir = $settings["default_game_server_home_path_prefix"];

	$remote_servers = $db->getRemoteServers();
	if( $remote_servers === FALSE )
	{
		echo "<p class='note'>".get_lang('no_remote_servers_configured')."</p>
			  <p><a href='?m=server'>".get_lang('add_remote_server')."</a></p>";

		return;
	}

	$game_cfgs = $db->getGameCfgs();
	$users = $db->getUserList();

	if ( $game_cfgs === FALSE )
	{
		echo "<p class='note'>".get_lang('no_game_configurations_found')." <a href='?m=config_games'>".get_lang('game_configurations')."</a></p>";
		return;
	}

	echo "<p> <span class='note'>".get_lang('note').":</span> ".get_lang('add_mods_note')."</p>";
	
	$selections = array();
	foreach($db->getModulesAccessRights() as $ar)
		$selections[$ar['description']] = $ar['flag'];
	
	if ( isset($_REQUEST['add_game_home']) )
	{
		$rserver_id = $_POST['rserver_id'];
		$home_cfg_id = $_POST['home_cfg_id'];
		$web_user_id = trim($_POST['web_user_id']);
		$control_password = genRandomString(8);
		$access_rights = "";
		
		$ftp = FALSE;
		foreach ($selections as $selection => $flag)
		{
			if (isset($_REQUEST[$selection]))
			{
				$access_rights .= $flag;
				if ($flag == "t")
				{
					$ftp = TRUE;
				}
			}
		}
		
		if ( empty( $web_user_id ) )
		{
			print_failure(get_lang('game_path_empty'));
		}
		else
		{
			foreach ( $game_cfgs as $row )
			{
				if($row['home_cfg_id'] == $home_cfg_id){
					 $server_name = $row['game_name'];
					 $game_key = $row['game_key'];
					 $readable_game_key = substr($game_key, 0, stripos($game_key, "_"));
					 $readable_game_key = strtolower($readable_game_key);
				}
			}
			foreach ( $remote_servers as $server )
			{
				if($server['remote_server_id'] == $rserver_id) $ogp_user = $server['ogp_user'];
			}
			foreach ( $users as $user )
			{
				if($user['user_id'] == $web_user_id) $web_user = $user['users_login'];
			}
			$ftppassword = genRandomString(8);
			
			// Game path logic
			$game_path = "/home/".$ogp_user."/OGP_User_Files/"; // Default
	
			$skipId = false;
			if(hasValue($default_home_dir)){
				// Replace some user supported variables with actual value.
				$game_path = $default_home_dir;			
				$game_path = str_replace("{USERNAME}", $web_user,  $game_path); 
				if(stripos($game_path, "{SKIPID}") !== false){
					$skipId = true;
				}
				$game_path = str_replace("{SKIPID}", "",  $game_path); 
				$game_path = str_replace("{GAMEKEY}", $readable_game_key, $game_path);
			}
			
			if($game_path[strlen($game_path)-1] != "/"){ // Make sure the path ends with forward slash
				$game_path .= "/";
			}
			
			$game_path = clean_path($game_path); // Clean it
			// End game path logic
			
			if ( ( $new_home_id = $db->addGameHome($rserver_id,$web_user_id,$home_cfg_id,
				clean_path($game_path),$server_name,$control_password,$ftppassword,$skipId) )!== FALSE )
			{				
				$success = $db->assignHomeTo("user",$web_user_id,$new_home_id,$access_rights);
				if($success){
					$home_info = $db->getGameHomeWithoutMods($new_home_id);
					require_once('includes/lib_remote.php');
					$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
					
					// Create new home directory if it doesn't already exist
					$remote->exec("mkdir -p " . clean_path($game_path) . (!$skipId ? $new_home_id : ""));
					
					if($ftp)
					{
						$host_stat = $remote->status_chk();
						if( $host_stat === 1)
							$remote->ftp_mgr("useradd", $home_info['home_id'], $home_info['ftp_password'], $home_info['home_path']);
						$db->changeFtpStatus('enabled',$new_home_id);
					}
					print_success(get_lang('game_home_added'));
					$db->logger(get_lang('game_home_added')." ($server_name)");
					$view->refresh("?m=user_games&amp;p=edit&amp;home_id=$new_home_id", 0);
				}else{
					print_failure(get_lang_f("failed_to_assign_home_to_user", $new_home_id, $web_user . " " . $db->getError()));
				}
			}
			else
			{
				print_failure(get_lang_f("failed_to_add_home_to_db",$db->getError()));
			}
		}
	}

	// View form to add more servers.
	if( !isset($_POST['rserver_id']) )
	{
		echo "<form action='?m=user_games&amp;p=add' method='post'>";
		echo "<table class='center'>";
		echo "<tr><td  class='right'>".get_lang('game_server')."</td><td class='left'><select onchange=".'"this.form.submit()"'." name='rserver_id'>\n";
		echo "<option>".get_lang('select_remote_server')."</option>\n";
		foreach ( $remote_servers as $server )
		{
			echo "<option value='".$server['remote_server_id']."'>".
				$server['remote_server_name']." (".$server['agent_ip'].")</option>\n";
		}
		echo "</select>\n";
		echo "</form>";
		echo "</td></tr></table>";
	}
	else
	{
		if(isset($_POST['rserver_id']))
			$rhost_id = $_POST['rserver_id'];
		$remote_server = $db->getRemoteServer($rhost_id);
		require_once('includes/lib_remote.php');
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
		$host_stat = $remote->status_chk();
		if( $host_stat === 1)
			$os = $remote->what_os();
		else
		{
			print_failure(get_lang_f("caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms"));
			$os = "Unknown OS";
		}
		echo "<form action='?m=user_games&amp;p=add' method='post'>";
		echo "<table class='center'>";
		echo "<tr><td class='right'>".get_lang('game_type')."</td><td class='left'> <select name='home_cfg_id'>\n";
		echo get_game_selector($os, $game_cfgs);
		echo "</select>\n</td></tr>";
		// Select user
		echo "<tr><td class='right'>".get_lang('login').":</td>
			<td class='left'><select name='web_user_id'>";
		$users = $db->getUserList();
		foreach ( $users as $user ){
			// Only users and admins can be assigned homes... not subusers
			if(is_null($user['users_parent'])){
				echo "<option value='".$user['user_id']."'>".$user['users_login']."</option>\n";
			}
		}
		echo "</select>\n</td></tr>";
		// Select permisions
		echo "<tr><td class='right'>".get_lang('access_rights').":</td>
			<td class='left'>";
		foreach ( $selections as $selection => $flag)
		{
			echo create_selection($selection,$flag);
		}
		echo "</td></tr>";
		// Assign home
		echo "<tr><td align='center' colspan='2'>
			  <input type='hidden' name='rserver_id' value='".$rhost_id."' />".
			  "<input type='submit' name='add_game_home' value='".
			get_lang('add_game_home')."' /></td></tr></table>";
		echo "</form>";
	}
}
?>
