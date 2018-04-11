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

require_once('home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module() {

	global $view,$db;

	require_once('includes/lib_remote.php');

	$ip = $_REQUEST['ip'];
	$port = $_REQUEST['port'];
	$home_id = $_REQUEST['home_id'];
	$mod_id = $_REQUEST['mod_id'];
	$user_id = $_SESSION['user_id'];
	
	// Check ip/port inputs
	if(!is_numeric($port))
		return;
	
	if(!preg_match("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/",$ip))
		return;
	
	$isAdmin = $db->isAdmin( $user_id );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($user_id,$home_id);
	
	if ( $home_info === FALSE )
	{
		print_failure(get_lang('no_rights_to_stop_server'));
		return;
	}

	$home_id = $home_info['home_id'];
	$home_path = clean_path($home_info['home_path']."/");
	
	echo "<h2>".htmlentities($home_info['home_name'])."</h2>";

	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

	if ( !$server_xml )
	{
		echo create_back_button("gamemanager","game_monitor");
		return;
	}

	$rserver = $db->getRemoteServerById($home_info['remote_server_id']);

	if ( empty($rserver) )
	{
		print_failure("Could not find the remote server with ID ".$home_info['remote_server_id'].".");
	}
	else
	{
		$remote = new OGPRemoteLibrary($rserver['agent_ip'],
									   $rserver['agent_port'],
									   $rserver['encryption_key'],
									   $rserver['timeout']);
			
		if(isset($server_xml->control_protocol_type))$control_type = $server_xml->control_protocol_type; else $control_type = "";
		
		if ($server_xml->protocol == "gameq")
		{
			$query_port = get_query_port($server_xml, $port);
		}
		elseif ($server_xml->protocol == "lgsl")
		{
			require('protocol/lgsl/lgsl_protocol.php');
			$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
			$query_port = $get_ports['1'];
		}
		elseif ($server_xml->protocol == "teamspeak3")
		{
			$query_port = "10011";
		}
		
		$remote_retval = $remote->remote_stop_server($home_id,
			$ip, $port, $server_xml->control_protocol,
			$home_info['control_password'],$control_type, $home_path);
		$db->logger(get_lang_f('server_stopped', $home_info['home_name'] ) . "($ip:$port)");
		$firewall_settings = $db->getFirewallSettings($home_info['remote_server_id']);
		if ( $remote_retval === 1 )
		{
			print_success(get_lang_f("server_stopped",htmlentities($home_info['home_name'])));
			if ($firewall_settings['status'] == "enable")
			{
				$ip_ports = $db->getHomeIpPorts($home_id);
				foreach ($ip_ports as $ip_port)
				{
					if ($server_xml->protocol == "gameq")
					{
						$query_port = get_query_port($server_xml, $ip_port['port']);
					}
					elseif ($server_xml->protocol == "lgsl")
					{
						require('protocol/lgsl/lgsl_protocol.php');
						$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $ip_port['port'], "", "");
						$query_port = $get_ports['1'];
					}
					elseif ($server_xml->protocol == "teamspeak3")
					{
						$query_port = "10011";
					}
					set_firewall($remote, $firewall_settings, 'deny', $ip_port['port'], $ip_port['ip']);
					if(isset($query_port) and $query_port != "" and $query_port != $ip_port['port'])
						set_firewall($remote, $firewall_settings, 'deny', $query_port, $ip_port['ip']);
				}
			}
		}
		elseif ( $remote_retval === 0 )
		{
			$remote_retval = $remote->remote_stop_server($home_info['home_id'],
			$ip, $port, $server_xml->control_protocol,"",$control_type,$home_path);
			if ($remote_retval === 1 )
			{
				print_success(get_lang_f("server_stopped",htmlentities($home_info['home_name'])));
				if ($firewall_settings['status'] == "enable")
				{
					$ip_ports = $db->getHomeIpPorts($home_id);
					foreach ($ip_ports as $ip_port)
					{
						if ($server_xml->protocol == "gameq")
						{
							$query_port = get_query_port($server_xml, $ip_port['port']);
						}
						elseif ($server_xml->protocol == "lgsl")
						{
							require('protocol/lgsl/lgsl_protocol.php');
							$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $ip_port['port'], "", "");
							$query_port = $get_ports['1'];
						}
						elseif ($server_xml->protocol == "teamspeak3")
						{
							$query_port = "10011";
						}
						$remote->sudo_exec(str_replace("%PORT%",$ip_port['port'],$firewall_settings['deny_port_command']));
						if(isset($query_port))
						{
							$remote->sudo_exec(str_replace("%PORT%",$query_port,$firewall_settings['deny_port_command']));
						}
					}
				}
			}
		}

		if ( $remote_retval === 0 )
			print_failure(get_lang("agent_offline"));
		elseif ( $remote_retval !== 1 )
			print_failure("Error occurred on the remote host.");
	}
	$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $ip . "-" . $port,3);
}
?>
