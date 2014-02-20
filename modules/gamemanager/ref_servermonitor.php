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
require_once('modules/gamemanager/home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module()
{
	global $db;
	require_once('includes/lib_remote.php');
	$access = FALSE;
	$port = $_REQUEST['port'];
	$ip = $_REQUEST['ip'];
	$server_home = $db->getGameHomeByIP($ip, $port);

	$home_id = $server_home['home_id'];
	// Is user ??
	$users = $db->getUsersByHomeId($home_id);
	if($users)
	{
		foreach($users as $user)
		{
			if( $user['user_id'] == $_SESSION['user_id'] )
			{
				$access = TRUE;
			}
		}
	}
	// Is group user ??
	$groupusers = $db->getGroupUsersByHomeId($home_id);
	if($groupusers)
	{
		foreach($groupusers as $groupuser)
		{
			if( $groupuser['user_id'] == $_SESSION['user_id'] )
			{
				$access = TRUE;
			}
		}
	}
	// Is admin ??
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if ($isAdmin)
	{
		$access = TRUE;
	}

	if($access == FALSE){
		print_failure("Access Denied!");
		die();
	}
	
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
	$xml_installer = $server_xml->installer;
	
	$mod = $server_xml->mods->mod['key'];
	if ($server_xml->protocol == "gameq")
	$query_name = $server_xml->gameq_query_name;
	elseif ($server_xml->protocol == "lgsl")
	$query_name = $server_xml->lgsl_query_name;
	else
	$query_name = $mod; // If query name does not exist use mod key instead.
	
			
	//Properties for all servers
	if(isset($_GET['home_id']) && $_GET['home_id'] == $server_home['home_id'])
		$trclass = "class='expandme'";
	$user = $db->getUserById($server_home['user_id_main']);


	$btns = "<a href='?m=gamemanager&amp;p=gamemanager&amp;home_id=".$server_home['home_id']."'><img src='images/gamemanager.png' style='border:0;height:16px;' />".get_lang('gamemanager')."</a>&nbsp;&nbsp;".
			"<a href='?m=gamemanager&amp;p=log&amp;home_id=".$server_home['home_id']."'><img style='border:0;height:16px;' src='images/log.png'/>".get_lang('view_log')."</a>&nbsp;&nbsp;".
			"<a href='?m=ftp&amp;home_id=".$server_home['home_id']."'><img style='border:0;height:16px;' src='images/ftp.png'/>".get_lang('ftp')."</a>";
			
	// Check if the screen running the server is running.
	if ($server_xml->protocol == "gameq")
	{
		require('protocol/GameQ/functions.php');
		require_once('protocol/GameQ/GameQMonitor.php');
	}
	else if ($server_xml->protocol == "lgsl")
	{
		require('protocol/lgsl/functions.php');
		require_once('protocol/lgsl/LGSLMonitor.php');
	}
	else if ($server_xml->protocol == "teamspeak3")
	{
		require_once('protocol/TeamSpeak3/TS3Monitor.php');
	}
	else
	{
		// This is here because some servers are not supported by LGSL/GameQ or
		// because we do not have proper support for them yet.
		// With properly supported games this should not needed.
		// (In a perfect world no one would need an insurance.)
		$status = "online";
		$map = $status;
		$maplocation = get_map_path($query_name,$mod,$map);
		@$notifications .= get_lang("query_protocol_not_supported");
	}			

	@$map_icon = "<img class='mapicon' src='$maplocation'/>";
	@$currentmap = $map;
			
	//Properties for Specific Status
	if($status == "half" || $status == "online")
	{
		if($status == "online")
		{
			$onlineT = "<div>";
				$onlineT .= "$map_icon";
			$onlineT .= "</div>";
			$onlineT .= "<div>";
				@$onlineT .= get_lang('hostname').": <marquee class='hostname'>$name</marquee><br />";
				@$onlineT .= get_lang('current_map').": $currentmap";
			$onlineT .= "</div>";
		}
		else if($status == "half")
		{
			@$notifications .= get_lang("failed_querying_server");
		}
		$remote_server_id = $server_home['remote_server_id'];
		$rserver = $db->getRemoteServerById($remote_server_id);
		$remote = new OGPRemoteLibrary($rserver['agent_ip'], $rserver['agent_port'], $rserver['encryption_key'], $rserver['timeout']);
		$startup_file_exists = $remote->rfile_exists( "startups/".$server_home['ip']."-".$server_home['port'] ) === 1;
		$SrvCtrl = "<table class='srvctrl'><tr>";
		if($startup_file_exists)
		{
			$SrvCtrl .= "<td style='border:0;text-align:center;background:transparent'><a href='?m=gamemanager&amp;p=restart&amp;home_id=".
						 $server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;ip=".$server_home['ip']."&amp;port=".$server_home['port'].
						 "'><img src='images/restart.png' width='64' border='0' alt='".get_lang('restart_server')."' /><br><b>".get_lang('restart_server').
						 "</b></a></td>";
							
		}
		$SrvCtrl .= "<td style='border:0;text-align:center;background:transparent'><a href='?m=gamemanager&amp;p=stop&amp;home_id=".
					$server_home['home_id']."&amp;ip=".$server_home['ip']."&amp;port=".$server_home['port']."'><img src='images/stop.png' width='64' border='0' alt='".
					get_lang('stop_server')."' /><br><b>".get_lang('stop_server').
					"</b></a></td></tr></table>";
	}



	//Echo them all
	echo "<div class='monitor-1'>".@$onlineT.@$halfT.@$offlineT."</div>".
		 "<div class='monitor-2 bloc'>".@$SrvCtrl."</div>";
	if(isset($player_list))	
		echo "<div class='monitor-3'>".@$player_list."</div>";
	if(isset($notifications))
		echo "<div class='monitor-3 bloc'>".@$notifications."</div>";
}
?>