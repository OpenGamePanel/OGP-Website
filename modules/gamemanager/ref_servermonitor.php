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

require_once('modules/gamemanager/home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");
require_once('includes/lib_remote.php');
function exec_ogp_module()
{
	global $db;

	$home_id = $_REQUEST['home_id'];
	$mod_id = $_REQUEST['mod_id'];
	// Is admin ??
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if( $isAdmin )
		$server_home = $db->getGameHome($home_id);
	else
		$server_home = $db->getUserGameHome($_SESSION['user_id'],$home_id);
	
	if ( !$server_home )
		return;
		
	$port = $_REQUEST['port'];
	$ip = $_REQUEST['ip'];
	$server_home['ip'] = $ip;
	$server_home['port'] = $port;
	$stats_players = 0;
	$stats_maxplayers = 0;

	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
	$xml_installer = $server_xml->installer;

	$mod_name = $server_home['mods'][$mod_id]['mod_name'];
	$mod_key = $server_home['mods'][$mod_id]['mod_key'];

	if (strtolower($mod_name) == "none")
		$mod = $mod_key;
	else 
		$mod = $mod_name;

	if ($server_xml->protocol == "gameq")
		$query_name = $server_xml->gameq_query_name;
	elseif ($server_xml->protocol == "lgsl")
		$query_name = $server_xml->lgsl_query_name;
	else
		$query_name = $mod; // If query name does not exist use mod key instead.

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
	$map_image_upload = '<br><button class="upload-image" id="'.$home_id.'" data-map="'.$map.'" data-mod_id="'.$mod_id.'" onClick="uploadMapImg(this);" >'. get_lang("upload_map_image") .'</button>';
		
	@$map_icon = "<img class='mapicon' src='$maplocation'/>";
	@$currentmap = $map;
	
	//Properties for Specific Status
	if($status == "half" || $status == "online")
	{
		if($status == "online")
		{
			$onlineT = "<div class='map-icon' >";
				$onlineT .= "$map_icon";
				if($isAdmin)
					$onlineT .= "$map_image_upload";
			$onlineT .= "</div>";
			$onlineT .= "<div class='server-info' >";
				@$onlineT .= get_lang("hostname") .": <marquee class='hostname'>" . htmlentities($name) . "</marquee><br />";
				@$onlineT .= get_lang("current_map") . ": " . ((isset($mapRaw) && !empty($mapRaw)) ? htmlentities($mapRaw) : $currentmap);
			$onlineT .= "</div>";
		}
		else if($status == "half")
		{
			@$notifications .= get_lang("failed_querying_server");
		}
		$remote_server_id = $server_home['remote_server_id'];
		$rserver = $db->getRemoteServerById($remote_server_id);
		$remote = new OGPRemoteLibrary($rserver['agent_ip'], $rserver['agent_port'], $rserver['encryption_key'], $rserver['timeout']);
		$startup_file_exists = $remote->rfile_exists( "startups/".$ip."-".$port ) === 1;
		$SrvCtrl = "<table class='srvctrl'><tr><td style='border:0;text-align:center;background:transparent'><a href='?m=gamemanager&amp;p=restart&amp;home_id=".
					 $home_id."&amp;mod_id=".$mod_id."&amp;ip=".$ip."&amp;port=".$port.
					 "'><img src='" . check_theme_image("images/restart.png") . "' width='64' border='0' alt='". get_lang("restart_server") ."' /><br><b>". get_lang("restart_server") .
					 "</b></a></td><td style='border:0;text-align:center;background:transparent'><a href='?m=gamemanager&amp;p=stop&amp;home_id=".
					$home_id."&amp;mod_id=".$mod_id."&amp;ip=".$ip."&amp;port=".$port."'><img src='" . check_theme_image("images/stop.png") . "' width='64' border='0' alt='".
					get_lang("stop_server") ."' /><br><b>". get_lang("stop_server") .
					"</b></a></td></tr></table>";
	}
	//Echo them all
	echo "<div class='monitor-1'>".@$onlineT.@$halfT.@$offlineT."</div>";
	if( $server_xml->protocol != "teamspeak3" OR ($startup_file_exists and $server_xml->protocol == "teamspeak3") )
		echo "<div class='monitor-2 bloc'>".@$SrvCtrl."</div>";
	if(isset($player_list))	
		echo "<div class='monitor-3'>".@$player_list."</div>";
	if(isset($notifications))
		echo "<div class='monitor-3 bloc'>".@$notifications."</div>";
}
?>
