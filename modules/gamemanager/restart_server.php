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

    $ip = $_REQUEST['ip'];
    $port = $_REQUEST['port'];
    $home_id = $_REQUEST['home_id'];
	$mod_id = $_REQUEST['mod_id'];
    $user_id = $_SESSION['user_id'];

	$isAdmin = $db->isAdmin($user_id);
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($user_id,$home_id);
	
	foreach($home_info['mods'][$mod_id] as $key => $value)
	{
		$home_info[$key] = $value;
	}

	require_once('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
	
	$os = $remote->what_os();

    if ( $home_info === FALSE )
    {
        print_failure(get_lang('no_rights_to_stop_server'));
        return;
    }

    echo "<h2>";
    echo empty($home_info['home_name']) ? get_lang('not_available') : htmlentities($home_info['home_name']);
    echo "</h2>";

    $server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

    if ( !$server_xml )
    {
        echo create_back_button("gamemanager","game_monitor");
        return;
    }

    $rserver = $db->getRemoteServerById($home_info['remote_server_id']);

    if ( empty($rserver) )
    {
        print_failure("".get_lang('not_found_server')." ".$home_info['remote_server_id'].".");
    }
    else
    {
		if(isset($_REQUEST['refresh']))
		{			
			if( isset( $server_xml->console_log ) )
			{
				$log_path = preg_replace("/mod/", $home_info['mods'][$mod_id]['mod_key'], $server_xml->console_log);
				$log_retval = $remote->remote_readfile( $home_info['home_path'].'/'.$log_path, $home_log );
			}
			else
			{
				$log_retval = $remote->get_log(OGP_SCREEN_TYPE_HOME,
					$home_id,
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

			$running = TRUE;
			
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
					echo "<p>".get_lang('server_running_not_responding')."
					<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$home_id.
					"&amp;ip=".$ip."&amp;port=".
					$port.">".get_lang('already_running_stop_server').".</a></p>";
					echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=$home_id-$mod_id-$ip-$port'><< ".get_lang('back')."</a></td></tr></table>";
				}
				
				echo "</b>Retry #".$retry.".</b>";
				$retry++;
				print("<p class='note'>".get_lang('starting_server')."</p>");
				$view->refresh("?m=gamemanager&amp;p=start&amp;refresh&amp;ip=$ip&amp;port=$port&amp;home_id=$home_id&amp;mod_id=$mod_id&amp;retry=".$retry,3);
				return;
			}
			print_success(get_lang_f('server_restarted',htmlentities($home_info['home_name'])));
			$ip_id = $db->getIpIdByIp($ip);
			$db->delServerStatusCache($ip_id,$port);
			$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $ip . "-" . $port);
			echo "<p>".get_lang('follow_server_status')." <a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=".
			$home_id . "-". $mod_id . "-" . $ip . "-" . $port . "'>".get_lang('game_monitor')."</a> ".get_lang('page').".</p>";

			return;
		}
		else
		{		
			$server_home = $home_info;
			if( $server_xml->replace_texts )
			{
				if(	isset($server_xml->lgsl_query_name) )
					require_once('protocol/lgsl/lgsl_protocol.php');
				require_once("modules/gamemanager/cfg_text_replace.php");
			}
			
			$control_type = isset($server_xml->control_protocol_type) ? $server_xml->control_protocol_type : "";
			$run_dir = isset($server_xml->exe_location) ? $server_xml->exe_location : "";
			
			$start_cmd = get_start_cmd($remote, $server_xml, $home_info, $mod_id, $ip, $port, $db);
			
			// Run pre-start commands
			if(isset($server_xml->pre_start) && !empty($server_xml->pre_start)){
				$preStart = trim($server_xml->pre_start);
			}else{
				$preStart = "";
			}
				
			// Environment variables
			if(isset($server_xml->environment_variables) && !empty($server_xml->environment_variables)){
				$envVars = trim($server_xml->environment_variables);
			}else{
				$envVars = "";
			}		
			
			// Additional files to lock
			if(isset($server_xml->lock_files) && !empty($server_xml->lock_files)){
				$lockFiles = trim($server_xml->lock_files);
			}else{
				$lockFiles = "";
			}
			
			if(!empty($lockFiles)){
				// Linux only call
				if(preg_match("/Linux/", $os)){
					$lockedFilesStatus = $remote->lock_additional_home_files($home_info['home_path'], $lockFiles, "lock");
				}
			}
						
			$remote_retval = $remote->remote_restart_server($home_id,$ip,$port,$server_xml->control_protocol,
															$home_info['control_password'],$control_type,$home_info['home_path'],
															$server_xml->server_exec_name,$run_dir,$start_cmd,
															$home_info['cpu_affinity'],$home_info['nice'],$preStart,$envVars, $server_xml->game_key, 
															(isset( $server_xml->console_log ) ? $server_xml->console_log : ""));
			
			$db->logger(get_lang_f('server_restarted', $home_info['home_name']) . "($ip:$port)");
				
			if ( $remote_retval === 1 )
			{
                print("<p class='note'>".get_lang('restarting_server')."</p>");
                $view->refresh("?m=gamemanager&amp;p=restart&amp;refresh&amp;ip=$ip&amp;port=$port&amp;home_id=$home_id&amp;mod_id=$mod_id",3);
                return;
            }
			else if ( $remote_retval === -1 )
			{
				print_failure(get_lang('server_cant_start'));
				$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $ip . "-" . $port,3);
			}
			else if ( $remote_retval === -2 )
			{
				print_failure(get_lang('server_cant_stop'));
				$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $ip . "-" . $port,3);
			}
			else
			{
				$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_id);
				if ( $screen_running == 1 )
				{
					print("<p class='note'>".get_lang('restarting_server')."</p>");
					$view->refresh("?m=gamemanager&amp;p=restart&amp;refresh&amp;ip=$ip&amp;port=$port&amp;home_id=$home_id&amp;mod_id=$mod_id",3);
					return;
				}
				else
				{
					print_failure("".get_lang('error_occured_remote_host').".$remote_retval");
					$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $ip . "-" . $port,3);
				}
			}
		}
    }
}
?>
