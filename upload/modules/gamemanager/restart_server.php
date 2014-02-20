<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
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

require_once('home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module() {

    global $view,$db;

    
    $ip = $_REQUEST['ip'];
    $port = $_REQUEST['port'];
    $home_id = $_REQUEST['home_id'];
    $user_id = $_SESSION['user_id'];

    $home_id = $_REQUEST['home_id'];
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);
	
	require_once('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);
	
	$mod_id = $_REQUEST['mod_id'];

    if ( $home_info === FALSE )
    {
        print_failure(get_lang('no_rights_to_stop_server'));
        return;
    }

    echo "<h2>";
    echo empty($home_info['home_name']) ? get_lang('not_available') : $home_info['home_name'];
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
		if (isset($_REQUEST['refresh']))
		{			
			if( isset( $server_xml->console_log ) )
			{
				$log_retval = $remote->remote_readfile( $home_info['home_path'].'/'.$server_xml->console_log, $home_log );
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
					<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$home_info['home_id'].
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
			print_success(get_lang_f('server_restarted',$home_info['home_name']));
			$ip_id = $db->getIpIdByIp($ip);
			$db->delServerStatusCache($ip_id,$port);
			$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $_REQUEST['ip'] . "-" . $_REQUEST['port']);
			echo "<p>".get_lang('follow_server_status')." <a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=".
			$home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $_REQUEST['ip'] . "-" . $_REQUEST['port'] . "'>".get_lang('game_monitor')."</a> ".get_lang('page').".</p>";

			return;
		}
		else
		{		
			if( $server_xml->replace_texts )
			{
				$server_home = $home_info;
				if(	isset($server_xml->lgsl_query_name) )
					require_once('protocol/lgsl/lgsl_protocol.php');
				require_once("modules/gamemanager/cfg_text_replace.php");
			}
			
			$control_type = isset($server_xml->control_protocol_type) ? $server_xml->control_protocol_type : "";
			$run_dir = isset($server_xml->exe_location) ? $server_xml->exe_location : "";
			
			$last_param = json_decode($home_info['last_param'], True);
			
			$cli_param_data['GAME_TYPE'] = $home_info['mods'][$mod_id]['mod_key'];
			$cli_param_data['IP'] = $ip;
			$cli_param_data['PORT'] = $port;
			$cli_param_data['HOSTNAME'] = $home_info['home_name'];
			$cli_param_data['PID_FILE'] = "ogp_game_startup.pid";
			
			$os = $remote->what_os();
			// Linux
			if( preg_match("/Linux/", $os) )
			{
				$cli_param_data['BASE_PATH'] = $home_info['home_path'];
				$cli_param_data['HOME_PATH'] = $home_info['home_path'];
				$cli_param_data['SAVE_PATH'] = $home_info['home_path'];
				$cli_param_data['OUTPUT_PATH'] = $home_info['home_path'];
				$cli_param_data['USER_PATH'] = $home_info['home_path'];
			}
			// Windows
			elseif( preg_match("/CYGWIN/", $os) )
			{
				$home_path_win = $remote->exec("cygpath -w ".$home_info['home_path']);
				$home_path_win = str_replace("\\","\\\\", $home_path_win);
				$home_path_win = trim($home_path_win);
				$cli_param_data['BASE_PATH'] = $home_path_win;
				$cli_param_data['HOME_PATH'] = $home_path_win;
				$cli_param_data['SAVE_PATH'] = $home_path_win;
				$cli_param_data['OUTPUT_PATH'] = $home_path_win;
				$cli_param_data['USER_PATH'] = $home_path_win;
			}
			
			if ($server_xml->protocol == "gameq")
			{
				$cli_param_data['QUERY_PORT'] = get_query_port ($server_xml, $port);
			}
			elseif ($server_xml->protocol == "lgsl")
			{
				require('protocol/lgsl/lgsl_protocol.php');
				$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
				$cli_param_data['QUERY_PORT'] = $get_ports['1'];
			}
			elseif ($server_xml->protocol == "teamspeak3")
			{
				$cli_param_data['QUERY_PORT'] = "10011";
			}
			
			$cli_param_data['MAP'] = empty($last_param['map']) ?  "" : $last_param['map'];
			$cli_param_data['PLAYERS'] = empty($last_param['players']) ? $home_info['mods'][$mod_id]['max_players'] : $last_param['players'];
				
			
			$start_cmd = "";
			// If the template is empty then these are not needed.
			if ( $server_xml->cli_template )
			{
				$start_cmd = $server_xml->cli_template;
				if ( $server_xml->cli_params )
				{
					foreach ( $server_xml->cli_params->cli_param as $cli )
					{
						// If s is found the param is seperated with space
						$add_space = preg_match( "/s/", $cli['options'] ) > 0 ? " " : "";
						$cli_value = $cli_param_data[(string) $cli['id'] ];
						// If q is found we add quotes around the value.
						if ( preg_match( "/q/", $cli['options'] ) > 0 )
						{
							$cli_value = "\"".$cli_value."\"";
						}
						$start_cmd = preg_replace( "/%".$cli['id']."%/",
							$cli['cli_string'].$add_space.$cli_value, $start_cmd );
					}
				}
			}
			
			if ( $isAdmin )
			{
				$home_info['access_rights'] = "ufpet";
			}
						
			$param_access_enabled = preg_match("/p/",$home_info['access_rights']) > 0 ? TRUE : FALSE;
						
			if ( $param_access_enabled && isset($last_param) )
			{
				foreach($server_xml->server_params->param as $param)
				{						
					foreach ($last_param as $paramKey => $paramValue)
					{
						if (!isset($paramValue))
							$paramValue = (string)$param->default;
						
						if ($param['key'] == $paramKey)
						{	
							if (0 == strlen($paramValue))
								continue;
							if ($param['key'] == $paramValue) // it's a checkbox
								$new_param = $paramKey;
							elseif($param->option == "ns" or $param->options == "ns")
								$new_param = $paramKey.$paramValue;
							else
								$new_param = $paramKey.' "'.$paramValue.'"';
						  
							if ($param['id'] == NULL || $param['id'] == "")
								$start_cmd .= ' '.$new_param;
							else
								$start_cmd = preg_replace( "/%".$param['id']."%/", $new_param, $start_cmd );
						}			  
					}
					$start_cmd = preg_replace( "/%".$param['id']."%/", '', $start_cmd );
				} 
			}

			$extra_param_access_enabled = preg_match("/e/",$home_info['access_rights']) > 0 ? TRUE:FALSE;
			
			if ( array_key_exists('extra', $last_param) && $extra_param_access_enabled )
				$extra_default = $last_param['extra'];
			else
				$extra_default = $home_info['mods'][$mod_id]['extra_params'];

			$start_cmd .= " ".$extra_default;
						
			$remote_retval = $remote->remote_restart_server($home_info['home_id'],$ip,$port,$server_xml->control_protocol,
															$home_info['control_password'],$control_type,$home_info['home_path'],
															$server_xml->server_exec_name,$run_dir,$start_cmd,
															$home_info['cpu_affinity'],$home_info['nice']);
			
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
				$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $ip . "-" . $port,3);
			}
			else if ( $remote_retval === -2 )
			{
				print_failure(get_lang('server_cant_stop'));
				$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $ip . "-" . $port,3);
			}
			else
			{
				$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_info['home_id']);
				if ( $screen_running == 1 )
				{
					print("<p class='note'>".get_lang('restarting_server')."</p>");
					$view->refresh("?m=gamemanager&amp;p=restart&amp;refresh&amp;ip=$ip&amp;port=$port&amp;home_id=$home_id&amp;mod_id=$mod_id",3);
					return;
				}
				else
				{
					print_failure("".get_lang('error_occured_remote_host').".$remote_retval");
					$view->refresh("?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_info['home_id'] . "-". $home_info['mod_id'] . "-" . $ip . "-" . $port,3);
				}
			}
		}
    }
}
?>
