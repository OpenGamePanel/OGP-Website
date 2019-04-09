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

function exec_ogp_module()
{
    global $db;
    global $view;

    $home_id = $_REQUEST['home_id'];
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);
		
    if ( $home_info == FALSE )
    {
        print_failure(get_lang('no_rights_to_start_server'));
        echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $_REQUEST['ip'] . "-" . $_REQUEST['port'] . "'><< ".get_lang('back')."</a></td></tr></table>";
        return;
    }

    $mod_id = $_REQUEST['mod_id'];

    if ( !array_key_exists($mod_id,$home_info['mods']) )
    {
        print_failure("Unable to retrieve mod information from database.");
        return;
    }

    echo "<h2>";
    echo empty($home_info['home_name']) ? get_lang('not_available') : htmlentities($home_info['home_name']);
    echo "</h2>";

    require_once('includes/lib_remote.php');
    $remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);

    $server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

    if ( !$server_xml )
    {
        echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $_REQUEST['ip'] . "-" . $_REQUEST['port'] . "'><< ".get_lang('back')."</a></td></tr></table>";
        return;
    }

	// It compares ip and port on POST with the pair on DB for security reasons (URL HACKING)	
	$home_id = $home_info['home_id'];
	
	$ip_info = $db->getHomeIpPorts($home_id);
	
	foreach ( $ip_info as $ip_ports_row )

	{
	
		if($ip_ports_row['ip'] == $_REQUEST['ip'] && $ip_ports_row['port'] == $_REQUEST['port']) 
		
		{
		
			$ip = $_REQUEST['ip'];
			
			$port = $ip_ports_row['port'];
			
		}
		
	}
	
	If (!isset($ip) OR !isset($port)) 
	
	{
	
		echo "<h2>" . get_lang_f('ip_port_pair_not_owned') . "</h2>";
		
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=$home_id-$mod_id-$ip-$port'><< ".get_lang('back')."</a></td></tr></table>";
		
		return;
		
	}
	
	if( isset( $server_xml->console_log ) )
	{
		$log_path = preg_replace("/%mod%/i", $home_info['mods'][$mod_id]['mod_key'], $server_xml->console_log);
		$log_retval = $remote->remote_readfile( $home_info['home_path'].'/'.$log_path, $home_log );
	}
	else
	{
		$log_retval = $remote->get_log(OGP_SCREEN_TYPE_HOME,
			$home_info['home_id'],
			clean_path($home_info['home_path']."/".$server_xml->exe_location),
			$home_log);
	}
	
	function getLastLines($string, $n = 1) {
		$lines = explode("\n", $string);
		$lines = array_slice($lines, -$n);
		return implode("\n", $lines);
	}
	
	$home_log = getLastLines($home_log, 40);
	
	if ($log_retval > 0)
	{
		if ( $log_retval == 2 )
			print_failure(get_lang('server_not_running_log_found'));	
		echo "<pre style='background:black;color:white;'>".$home_log."</pre>";
		if ($log_retval == 2)
			return;
	}
	else
	{
		print_failure(get_lang_f('unable_to_get_log',$log_retval));
	}
	
	// If game is not supported by lgsl we skip the lgsl checks and
	// assume successfull start.
	if ( $home_info['use_nat'] == 1 )
		$query_ip = $home_info['agent_ip'];
	else
		$query_ip = $ip;

	$running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_info['home_id']);
	
	if ( $server_xml->lgsl_query_name )
	{
		require('protocol/lgsl/lgsl_protocol.php');
		$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");

		//Connection port
		$c_port = $get_q_and_s['0'];
		//query port
		$q_port = $get_q_and_s['1'];
		//software port
		$s_port = $get_q_and_s['2'];
				
		$data = lgsl_query_live((string)$server_xml->lgsl_query_name, $query_ip, $c_port, $q_port, $s_port, "sa");

		if ( $data['b']['status'] == "0"  )
		{
			$running = FALSE;
		}
	}
	elseif ( $server_xml->gameq_query_name )
	{
		require('protocol/GameQ/GameQ.php');
		
		$query_port = get_query_port($server_xml, $port);
		
		$servers = array(
			array(
				'id' => 'server',
				'type' => (string)$server_xml->gameq_query_name,
				'host' => $query_ip . ":" . $query_port,
			)
		);
		$gq = new GameQ();
		$gq->addServers($servers);
		$gq->setOption('timeout', 4);
		$gq->setOption('debug', FALSE);
		$gq->setFilter('normalise');
		$game = $gq->requestData();
				
		if ( ! $game['server']['gq_online'] )
		{
			$running = FALSE;
		}
	}
	
	if( ! $running )
	{
		if (!isset($_GET['retry']))
			$retry = 0;
		else
			$retry = $_GET['retry'];
			
		if ($retry >= 5)
		{
			echo "<p>".get_lang('server_running_not_responding').
				 "<a href='?m=gamemanager&amp;p=stop&amp;home_id=$home_id&amp;mod_id=$mod_id&amp;ip=$ip&amp;port=$port' >".
				 get_lang('already_running_stop_server').".</a></p>".
				 "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=$home_id-$mod_id-$ip-$port'><< ".
				 get_lang('back')."</a></td></tr></table>";
		}
		
		echo "</b>Retry #".$retry.".</b>";
		$retry++;
		print("<p class='note'>".get_lang('starting_server')."</p>");
		$view->refresh("?m=gamemanager&amp;p=start&amp;refresh&amp;ip=$ip&amp;port=$port&amp;home_id=$home_id&amp;mod_id=$mod_id&amp;retry=".$retry,3);
		return;
	}
	
	print_success(get_lang('server_started'));
	$ip_id = $db->getIpIdByIp($ip);
	$db->delServerStatusCache($ip_id,$port);
	$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=$home_id-$mod_id-$ip-$port" );
	return;
}
?>
