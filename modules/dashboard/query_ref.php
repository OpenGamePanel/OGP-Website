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

function print_player_list($player_list,$players,$playersmax,$gamename)
{
    $data = "<center><table class='currently-online' >".
			"<tr><td style='text-align:left;'>".
			$gamename." [".$players.'/'.$playersmax."] ".
			get_lang('players').":</td>\n</tr>";
	foreach( $player_list as $player )
	{
		$data .= "<tr><td style='text-align:center;color:#".rand(0,5).rand(0,5).rand(0,5).";' >".$player['name']."</td></tr>";
    }
    $data .= '</table></center><br><br>';
	return $data;
}

function exec_ogp_module() 
{
	$server_key = 'server_'.$_GET['ip'].'_'.$_GET['port'];
	if(isset($_GET['show']) and $_GET['show'] == "players")
	{
		if(isset($_SESSION[$server_key]['online_players']))
		{
			echo $_SESSION[$server_key]['online_players'];
		}
		return;
	}
	if(isset($_GET['show']) and $_GET['show'] == "player_statistics")
	{
		//if($_SESSION['player_statistics']['playersmax'] > 0)
			echo $_SESSION['player_statistics']['players'] . "/" . $_SESSION['player_statistics']['playersmax']. " "  . players;
		return;
	}
	global $db;
	require('modules/gamemanager/home_handling_functions.php');
	require('modules/config_games/server_config_parser.php');
	$server_home = $_SESSION[$server_key];
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
	$port = $server_home['port'];
	$query_name = "";
	$mod = "";
	$stats_players = 0;
	$stats_maxplayers = 0;
	$ip = $server_home['ip'];
	$port = $server_home['port'];
	// Check if the screen running the server is running.
	if ($server_xml->protocol == "gameq")
	{
		function print_player_list_gameq($player_list,$players,$playersmax){return FALSE;}
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
		$status = "half";
	}
	
	if($status == "online")
	{
		echo "<div class='name' ><a title='".htmlentities($server_home['home_name']).
			 "' href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=".
			 $server_home['home_id']."-".$server_home['mod_id']."-".$server_home['ip']."-".$server_home['port'].
			 "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/><span>". 
			 htmlentities($server_home['home_name'])."</span></a></div>".
			 "<div><div style='font-size:8pt;' >[".$players.'/'.$playersmax."]</div> " . ((isset($mapRaw) && !empty($mapRaw)) ? htmlentities($mapRaw) : $map) .'</div>'.
			 "<div id='gamelink' >$address</div>";
		$_SESSION[$server_key]['playersmax'] = $playersmax;
		if ( $players >= 1 )
		{
			$_SESSION[$server_key]['online_players'] = print_player_list($playersList,$players,$playersmax,$server_home['game_name']);
		}
		elseif(isset($_SESSION[$server_key]['online_players']))
			unset($_SESSION[$server_key]['online_players']);
		
		if ( isset($_SESSION[$server_key]['server_playersmax']) )
		{
			if( $_SESSION[$server_key]['server_playersmax'] != $playersmax )
			{
				$_SESSION['player_statistics']['playersmax'] += ($playersmax - $_SESSION['player_statistics']['playersmax']);
				$_SESSION[$server_key]['server_playersmax'] = $playersmax;
			}
		}
		else
		{
			$_SESSION['player_statistics']['playersmax'] += $playersmax;
			$_SESSION[$server_key]['server_playersmax'] = $playersmax;
		}
		
		if ( isset($_SESSION[$server_key]['server_players']) )
		{
			if($_SESSION[$server_key]['server_players'] != $players)
			{
				$_SESSION['player_statistics']['players'] += ($players - $_SESSION[$server_key]['server_players']);
				$_SESSION[$server_key]['server_players'] = $players;
			}
		}
		else
		{
			$_SESSION['player_statistics']['players'] += $players;
			$_SESSION[$server_key]['server_players'] = $players;
		}
	}
	elseif($status == "half")
	{
		echo "<div class='name' ><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=" . 
			 $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" .
			 $server_home['port'] . "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/>" . 
			 htmlentities($server_home['home_name']) . "</a></div>".
			 "<div><div style='font-size:8pt;' ></div> </div>".
			 "<div id='gamelink' >" . $server_home['ip'] . ":$port</div>";
		if(isset($_SESSION[$server_key]['online_players']))
			unset($_SESSION[$server_key]['online_players']);
	}
	else
	{
		if(isset($_SESSION[$server_key]['online_players']))
			unset($_SESSION[$server_key]['online_players']);
	}
}
