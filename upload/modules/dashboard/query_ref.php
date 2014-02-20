<style>
div #column2 .online_servers div{
	float:left;
	text-align:left;
	width:35%;
	height:15px;
	overflow: hidden;
	text-overflow: ellipsis;
	-o-text-overflow: ellipsis;
	-moz-binding: url('assets/xml/ellipsis.xml#ellipsis');
}
div #column2 .online_servers div#gamelink{
	width:36%;
	float:right;
	text-align:right;
}
div #column2 .online_servers div.name{
	width:29%;
}
</style>
<script type="text/javascript">
$( document ).ready( function(){
    setInterval(function () {
		$('.online_servers div#scrolldown').animate({
		scrollTop: $('.online_servers div#scrolldown').get(0).scrollHeight
		}, 1500, function(){
			$('.online_servers div#scrolldown').animate({
			scrollTop: 0
			});
		});
	},1000);
});
</script>

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

function print_player_list($player_list,$players,$playersmax,$gamename)
{
    $data =  "<center><table class='currently-online'>
			  <tr>
			  <td style='text-align:left;'>".$gamename." [".$players.'/'.$playersmax."] ".get_lang('players').":
			  <div style='clear:both;width:100%;background-color:#d1d1d1;height:1px;margin-top:10px;margin-bottom:10px;'/></td>
			  </tr>";
	$max = 0;
	foreach($player_list as $id => $player)
	{
		$maxcount = 0;
		foreach($player as $td => $column)
		{
			if($column != null)
			{	
				$sub = substr($td,0,3);
				if($sub == "gq_"){
					$player_list[$id][substr($td,3)] = $column;
					unset($player_list[$id][$td]);
				}
			}
			else
				unset($player_list[$id][$td]);
			if(isset($player_list[$id][$td]))
				$maxcount++;
		}
		if($max < $maxcount)
		{
			$max = $maxcount;
			$maxid = $id;
		}
	}

	foreach ( $player_list as $player ){
		$data .= "<tr>";
		foreach($player_list[$maxid] as $maxtd => $maxcolumn)
		{
			if( isset($player[$maxtd]) and $maxtd == "name" )
				$data .= "<td style='text-align:center;color:#".rand(0,5).rand(0,5).rand(0,5).";' >".$player[$maxtd]."</td>";
		}
		$data .= "</tr>";
    }
    $data .= '</table></center><br /><br />';
	return $data;
}

function print_player_list_gameq($player_list,$players,$playersmax,$gamename)
{
	return print_player_list($player_list,$players,$playersmax,$gamename);
}

function exec_ogp_module() 
{
	global $db,$OnlineServers;
	
	$isAdmin = $db->isAdmin($_SESSION['user_id']);
	$panel_settings = $db->getSettings();
	$settings = $db->getSettings();

	$OnlineServers = "";
	$OnlineServersTitle = "";
	
	
	require_once('includes/lib_remote.php');
	
	if ( $isAdmin )
	{
		$server_homes = $db->getIpPorts();
	}
	else
	{
		$server_homes = $db->getIpPortsForUser($_SESSION['user_id']);
	}

	$player_list = "";
	
	if ( !$server_homes )
	{
			$OnlineServers .= "";
	}
	else
	{
		$stats_servers    = 0;
		$stats_servers_online = 0;
		$stats_players    = 0;
		$stats_maxplayers = 0;
		$onlinePlayers = "";

		$OnlineServers .= "<table style='width:100%;' class='online_servers'>";
		foreach( $server_homes as $server_home )
		{
			$remote_server_id = $server_home['remote_server_id'];

			$rserver = $db->getRemoteServerById($remote_server_id);
			
			// Count the number of servers.
			$stats_servers++;

			// Remember to clear the old value here.
			$message = "";

			$remote = new OGPRemoteLibrary($server_home['agent_ip'],
			$server_home['agent_port'],$server_home['encryption_key']);
			$host_stat = $remote->status_chk();
			if( $host_stat === 1)
			{
				// Check if the screen running the server is running.
				$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1;

				$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
				
				$id = strlen($server_home['home_name']) > 15 ? "id='scrolldown'":"";
				
				if ( $screen_running  )
				{
					// Check if the screen running the server is running.
					if ($server_xml->protocol == "gameq")
					{
						require('protocol/GameQ/GameQMonitor.php');
					}
					else if ($server_xml->protocol == "lgsl")
					{
						require('protocol/lgsl/LGSLMonitor.php');
					}
					else if ($server_xml->protocol == "teamspeak3")
					{
						require('protocol/TeamSpeak3/TS3Monitor.php');
					}
					else
					{
						// This is here because some servers are not supported by LGSL/GameQ or
						// because we do not have proper support for them yet.
						// With properly supported games this should not needed.
						// (In a perfect world no one would need an insurance.)
						$status = "half";
						if ( $server_home['use_nat'] == 1 )
							$ip = $server_home['agent_ip'];
						else
							$ip = $server_home['ip'];
						$port = $server_home['port'];
						$player_list = "";
					}
		
					if($status == "online")
					{
						$OnlineServers .= "<tr><td><div $id class='name' ><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=" . $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/>" . $server_home['home_name'] . "</a></div>";
						$OnlineServers .= "<div><div style='font-size:8pt;' >[".$players.'/'.$playersmax."]</div> ".$map.'</div>';
						if($server_xml->protocol == "lgsl" OR $server_xml->protocol == "teamspeak3") 
							$OnlineServers .= "<div id='gamelink' >$address</div>";
						elseif( $server_xml->protocol == "gameq" AND $server_xml->installer == "steam")
							$OnlineServers .= "<div><a href='steam://connect/$ip:$port'>$ip:$port</a></div>"; 
						elseif( $server_xml->protocol == "gameq" OR ! isset( $server_xml->protocol ) )
							$OnlineServers .= "<div id='gamelink' >$ip:$port</div>"; 
						$OnlineServers .= "</td></tr>";
						if ( $players >= 1 )
							$onlinePlayers .= print_player_list($playersList,$players,$playersmax,$server_home['game_name']);
						$stats_servers_online++;
					}
					elseif($status == "half")
					{
						$OnlineServers .= "<tr><td><div $id class='name' ><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=" . $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/>" . $server_home['home_name'] . "</a></div>";
						$OnlineServers .= "<div><div style='font-size:8pt;' ></div> </div>";
						$OnlineServers .= "<div id='gamelink' >$ip:$port</div>"; 
						$OnlineServers .= "</td></tr>";
						$stats_servers_online++;
					}
				}
			}
			unset(  
				$map,
				$player_list, 
				$status,
				$ip,
				$port,
				$players,
				$playersmax,
				$name,
				$map,
				$mod,
				$xml_mod,
				$qport,
				$address,
				$maplocation
		      );
		}
		$OnlineServers .= "</table>";
		$OnlineServers .= "<center>".get_lang('statistics').":<br>$stats_servers_online/$stats_servers 
		".get_lang('servers')."<br>$stats_players/$stats_maxplayers ".get_lang('players')."</center>";
		
	}
	if($_GET['show'] == "servers")
		echo $OnlineServers;
	if($_GET['show'] == "players")
		echo $onlinePlayers;
}