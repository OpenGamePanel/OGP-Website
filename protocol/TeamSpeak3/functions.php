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

global $view;

require_once("protocol/TeamSpeak3/TeamSpeak3.php");
$cfg["user"] = "serveradmin";
$cfg["pass"] = $server_home['control_password'];
$cfg["voice"] = $server_home['port'];
$cfg["query"] = 10011;
foreach($db->getHomeIpPorts($server_home['home_id']) as $ts3Port)
{
	if($remote->rfile_exists( "startups/".$ts3Port['ip']."-".$ts3Port['port'] ) === 1)
		$cfg["query"] = $ts3Port['port'] + 24;
}

if ( $server_home['use_nat'] == 1 )
	$cfg["host"] = $server_home['agent_ip'];
else
	$cfg["host"] = $server_home['ip'];

try
{
	$ts3_ServerInstance = TeamSpeak3::factory("serverquery://" . $cfg["user"] . ":" . $cfg["pass"] . "@" . $cfg["host"] . ":" . $cfg["query"] . "/?server_port=" . $cfg["voice"] . "#no_query_clients");
	if($ts3_ServerInstance->isOnline() == TRUE)
	{
		$status = "online";
		$startup_file_exists = $remote->rfile_exists( "startups/".$server_home['ip']."-".$server_home['port'] ) === 1;

		if (isset($_POST['new_ts3_port']) && isPortValid($_POST['new_ts3_port']) && $server_home['home_id'] == $_POST['home_id']) {
			if (isset($ts3_ServerInstance)) unset($ts3_ServerInstance);

			$ts3_ServerInstance = TeamSpeak3::factory("serverquery://" . $cfg["user"] . ":" . $cfg["pass"] . "@" . $cfg["host"] . ":" . $cfg["query"] . "/");
			$new_port = $_POST['new_ts3_port'];
			$new_hostname = $_POST['new_ts3_hostname'];
			$new_players = $_POST['new_ts3_players'];

			/* add port to home on ogp db */
			$AddVirtual = $db->addGameIpPort($server_home['home_id'], $server_home['ip_id'], $new_port);
			if ($AddVirtual === TRUE)
			{
				/* create server using given props */
				$FAILURE = FALSE;
				try
				{
					$ts3_ServerInstance->serverCreate(array("virtualserver_name" => "$new_hostname", "virtualserver_maxclients" => $new_players, "virtualserver_port" => $new_port));
				}
				catch(Exception $e)
				{
					print_failure($e->getMessage());
					$db->delGameIpPort($server_home['home_id'], $server_home['ip_id'], $new_port);
					$FAILURE = TRUE;
				}
				if(!$FAILURE)
				{
					$firewall_settings = $db->getFirewallSettings($server_home['remote_server_id']);
					if ($firewall_settings['status'] == "enable")
						set_firewall($remote, $firewall_settings, 'allow', $new_port, $server_home['ip']);
				}
				$view->refresh("?m=gamemanager&p=game_monitor&home_id-mod_id-ip-port=" . $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $new_port, 0);
			}
			elseif ($AddVirtual === FALSE) 
			{
				echo "The chosen port is already in use.";
			}
		}
		
		if(isset($_POST['del_ts3_port']) && $_POST['del_ts3_port'] == $cfg["voice"] AND $server_home['home_id'] == $_POST['home_id'] )
		{
			if( ! $startup_file_exists )
			{
				/* Delete port to home on ogp db */
				$del_port = $_POST['del_ts3_port'];
				$DelVirtual = $db->delGameIpPort($server_home['home_id'], $server_home['ip_id'], $del_port);
				
				if ($DelVirtual === TRUE)
				{
					if(isset($ts3_ServerInstance)) unset($ts3_ServerInstance);
					$ts3_ServerInstance = TeamSpeak3::factory("serverquery://" . $cfg["user"] . ":" . $cfg["pass"] . "@" . $cfg["host"] . ":" . $cfg["query"] . "/");
												
					/* stop & remove server using given ID */
					$sid = (int)$_POST['id'];

					if ($sid !== 0) {
						$ts3_ServerInstance->serverStop($sid);
						$ts3_ServerInstance->serverDelete($sid);
						$db->query( "DELETE FROM OGP_DB_PREFIXts3_homes WHERE vserver_id=" . $db->real_escape_string($sid));
					}

					/* refresh */
					$view->refresh("?m=gamemanager&p=game_monitor&home_id=" . $server_home['home_id'], 0);
				}
				elseif ($DelVirtual === FALSE) echo "Virtual server can not be deleted.";
			}
			else
				echo "The main virtual server can not be deleted.";
		}
		$add_remove_virtual = "<table class='center'>";
		if(!$startup_file_exists)
			$add_remove_virtual .= "<tr><td>Remove This<br>Virtual Server</td><td>
								   <form action='' method='POST'>
								   <input type='hidden' name='del_ts3_port' value='".$server_home['port']."'/>
								   <input type='hidden' name='id' value='".$ts3_ServerInstance->getId()."'  /> 
								   <input type='hidden' name='home_id' value='".$server_home['home_id']."'  />
								   <input type='submit' value='Delete'/>
								   </form></td></tr>";
		if($startup_file_exists)
			$add_remove_virtual .= "<tr><th>Add Virtual Server</th></tr>
									<tr><td colspan=2>
									<form action='' method='POST'>
									<label for='hostname'>".get_lang('hostname')."</label>
									<input type='text' name='new_ts3_hostname' size='27' value='TeamSpeak 3 Server' id='hostname'/>
									</td></tr>
									<tr><td>
									<label for='port'>".get_lang('port')."</label>
									</td><td>
									<input type='text' name='new_ts3_port' size='5' value='".rand(9988,10010)."' id='port'/>
									</td></tr>
									<tr><td>
									<label for='players'>".get_lang('players')."</label>
									</td><td>
									<input type='text' name='new_ts3_players' size='5' value='10' id='players'/>
									<input type='hidden' name='home_id' value='".$server_home['home_id']."' />
									</td></tr>
									<tr><td colspan=2>
									<input type='submit' value='Add'/>
									</form></td></tr>";
		// Teamspeak3 Admin
		$TS3Admin_installed = $db->isModuleInstalled('TS3Admin');
		if( $TS3Admin_installed )
		{
			if(isset($_POST['assign_to_user']) && (int)$_POST['vserver_id'] == $ts3_ServerInstance->getId() AND $server_home['remote_server_id'] == $_POST['remote_server_id'] )
			{
				$query_ip = $server_home['use_nat'] == 1 ? $server_home['agent_ip'] : $server_home['ip'];
				$db->query("INSERT INTO OGP_DB_PREFIXts3_homes (`rserver_id`, `ip`, `pwd`, `vserver_id`, `user_id`, `port`) VALUES ('".$server_home['remote_server_id']."', '".$query_ip."', '".$cfg["pass"]."', '".(int)$_POST['vserver_id']."', '".$db->real_escape_string($_POST['assign_to_user'])."', '".$cfg['query']."');");
			}
			if(isset($_POST['remove_vuser_id']) && (int)$_POST['vserver_id'] == $ts3_ServerInstance->getId() AND $server_home['remote_server_id'] == (int)$_POST['remote_server_id'] )
			{
				$db->query( "DELETE FROM OGP_DB_PREFIXts3_homes WHERE vserver_id='" . (int)$_POST['vserver_id'] . "' AND user_id='".(int)$_POST['remove_vuser_id']."' AND rserver_id='".(int)$_POST['remote_server_id']."';" );
			}
			$add_remove_virtual .= "<tr><td>Assign This Virtual<br>Server To User</td><td>
									<form action='' method='POST'>
									<select onchange=".'"this.form.submit()"'." name='assign_to_user'>
									<option>&nbsp;</option>";
							   
			$users = $db->getUserList();
			foreach ( $users as $user )
			{
				$add_remove_virtual .= "<option value='".$user['user_id']."'>".$user['users_login']."</option>\n";
			}	
			$add_remove_virtual .= "</select>
									<input type='hidden' name='remote_server_id' value='".$server_home['remote_server_id']."' />
									<input type='hidden' name='vserver_id' value='".$ts3_ServerInstance->getId()."' />
									</form></td></tr>";

			$ts3vservers = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXts3_homes WHERE vserver_id='".$ts3_ServerInstance->getId()."' AND rserver_id=".$server_home['remote_server_id'] );
			if($ts3vservers != 0)
			{
				$ts3vuserlist = "<b>TeamSpeak 3</b><br>";
				foreach($ts3vservers as $ts3vserver)
				{
					$ts3vuser = $db->getUserById($ts3vserver['user_id']);
					
					$ts3vuserlist .= "<form action='' method='POST' >
									  <input type='hidden' name='remote_server_id' value='".$server_home['remote_server_id']."' />
									  <input type='hidden' name='remove_vuser_id' value='".$ts3vserver['user_id']."'>
									  <input type='hidden' name='vserver_id' value='".$ts3_ServerInstance->getId()."'>
									  ".$ts3vuser['users_login']." 
									  <input type='image' src='modules/administration/images/remove.gif' onsubmit=".'"submit-form();"'." ></form>";
				}
			}
			else
				$ts3vuserlist = "";
		}
		$add_remove_virtual .= "</table>";
		// Full Teamspeak3 Management
		$ts3_installed = $db->isModuleInstalled('teamspeak3');
		if($ts3_installed and $startup_file_exists)
		{
			$ts3_full =	"<form action='modules/teamspeak3/index.php?site=login' method='post' target='_blank'>
						 <input type='hidden' name='skey' value='0' />
						 <input type='hidden' name='hostname' value='".$cfg['host']."' />
						 <input type='hidden' name='query' value='".$cfg['query']."' />
						 <input type='hidden' name='loginUser' value='".$cfg['user']."' />
						 <input type='hidden' name='loginPw' value='".$cfg['pass']."' />
						 <input class='button' type='submit' name='sendlogin' value='Full Teamspeak3 Management'/>
						 </form>";
		}
		@$ts3opt = "$ts3_full$add_remove_virtual";
		unset($ts3_full);
		unset($add_remove_virtual);
		$groupsus .= $ts3vuserlist;
	}
}
catch(Exception $e)
{
	$status = "half";
	$order=2;
}
?>