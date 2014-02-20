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

$home_id = $server_home['home_id'];
$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
if($isAdmin) 
	$home_info = $db->getGameHome($home_id);
else
	$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);

if ( $home_info == FALSE )
{
	print_failure(get_lang('no_rights_to_start_server'));
	return;
}

$mod_id = $server_home['mod_id'];

if ( !array_key_exists($mod_id,$home_info['mods']) )
{
	print_failure(get_lang('unable_retrieve_mod_info'));
	return;
}

require_once('includes/lib_remote.php');
$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);

$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

if ( !$server_xml )
{
	return;
}

$param_access_enabled = preg_match("/p/",$home_info['access_rights']) > 0 ? TRUE : FALSE;
$extra_param_access_enabled = preg_match("/e/",$home_info['access_rights']) > 0 ? TRUE:FALSE;

if( !isset( $_POST['start_server'] ) )
{
	$server_exec = clean_path($home_info['home_path']."/".$server_xml->exe_location."/".$server_xml->server_exec_name);
	$r = $remote->rfile_exists($server_exec);
	if($r === 0)
	{
		print_failure(get_lang_f('game_exec_not_found',$server_exec));
		return;
	}
	else if($r === -1)
	{
		print_failure(get_lang("agent_offline"));
		return;
	}
	// If the result is something else than 1 here then there unexpected retval was received.
	else if ($r !== 1 )
	{
		print_failure(get_lang('unexpected_result_libremote'));
		return;
	}

	$ip_info = $db->getHomeIpPorts($home_id);

	if ( empty($ip_info) )
	{
		print_failure(get_lang('no_ip_port_pairs_assigned'));
		return;
	}

	echo get_lang_f('select_params_and_start', get_lang('start_server'));

	echo "<form action='home.php?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $home_id . "-". $mod_id . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' method='post'>\n
		<input type='hidden' name='mod_id' value='$mod_id' />\n
		<input type='hidden' name='home_id' value='$home_id' />\n
		<input type='hidden' name='remote_server_id' value='".$home_info['remote_server_id']."' />\n
		<table style='width:400px'>
		<tr><td class='right'>".get_lang('ogp_agent_ip').
		":</td><td class='left'>".$home_info['agent_ip']."</td></tr>";

	$last_param = json_decode($db->getLastParam($home_id), True);
	$max_players = $home_info['mods'][$mod_id]['max_players'];

	if ( $max_players > 0 )
	{
		echo "<tr><td class='right'>".get_lang('max_players').
			":</td><td class='left'>";
		
		for($i = $max_players; $i > 0; $i--)
		{
			$players["$i"]="$i";
		}
		
		echo create_drop_box_from_array($players,'max_players',$last_param['players']);
		
		echo "<span class='info'>(".get_lang('max').": ".
			$max_players.")</span></td></tr>\n";
	}
	echo "<tr><td class='right'>".get_lang('ip_and_port').
		":</td><td class='left'>".$server_home['ip'] . ":" . $server_home['port']."<input name='ip_port' type='hidden' value='".$server_home['ip'] . ":" . $server_home['port']."'/></td></tr>";

	list($list_type,) = explode(":", $server_xml->map_list);

	$map_array = -5;

	$maps_found = FALSE;

	// use maplist file as primary map location.
	if ( $server_xml->map_list )
	{
		$mapfile = $home_info['home_path']."/".
			preg_replace("/mod/",$home_info['mods'][$mod_id]['mod_key'],$server_xml->map_list);
		$read_status = $remote->remote_readfile($mapfile,$map_array);

		// If file was found and read successfully then lets seperate the maps.
		if ( $read_status == 1 )
		{
			$map_array = preg_split("/\n/",$map_array);
			$maps_found = "FILE";
		}
		// Otherwise we have error situation...
		else
		{
			$map_array = $read_status;
		}
	}

	// If we could not find maps from the maps file lets try directory listing
	// if possible.
	if ( $maps_found === FALSE && $server_xml->maps_location )
	{
		// replace mod with the modname if nessessary.
		$map_path = $home_info['home_path']."/".
			preg_replace("/mod/",$home_info['mods'][$mod_id]['mod_key'],$server_xml->maps_location);

		// Then we use the directory.
		$map_array = $remote->remote_dirlist($map_path);

		// If it is array then we successfully read maps.
		if ( is_array($map_array) )
		{
			$map_array = cleanFilenames($map_array);
			$maps_found = "DIR";
		}
	}

	$check_ok = TRUE;

	// If there is map list or location defined we should have maps available.
	if ( $server_xml->map_list || $server_xml->maps_location )
	{
		if ( is_array($map_array) )
		{
			echo "<tr><td class='right'>".get_lang('available_maps').":</td><td class='left'>\n";

			// We remove all lines that start with // because we
			// expect those lines to be comments.
			$comments = preg_grep( "/^\s*\/\//",$map_array );
			$map_array = array_diff( $map_array,$comments );
			sort($map_array);
			echo create_drop_box_from_array($map_array,'map',$last_param['map']);
			echo "</td></tr>";

			echo "<tr><td colspan='2' class='info'>".get_lang('maps_read_from')." ";
			if ( $maps_found == "DIR" )
			{
				echo get_lang('directory')." ".clean_path($map_path).".";
			}
			else
			{
				echo get_lang('file')." ".clean_path($mapfile).".";
			}
			echo "</td></tr>\n";
		}
		else
		{
			echo "<tr><td>";
			print_failure(get_lang('failed_to_read_maps_error_code').": $map_array");
			echo "</td></tr>";
			$check_ok = FALSE;
		}
	}
	
	// Print params if there are any.
	if($server_xml->server_params)
	{
		// echo "<tr><td><h3>".get_lang('available_parameters')."</h3>";

		if (!$param_access_enabled)
			echo "<span class='failure info'>".get_lang('no_parameter_access')."</span>";

		foreach($server_xml->server_params->param as $param)
		{
			renderParam($param, $param_access_enabled, $server_home['home_id']);
		}
		foreach($server_xml->server_params->group as $group)
		{
			echo "<tr><td><table>";
			echo "<tr><th><b>".$group['name']."</b></th></tr>";
			foreach($group->param as $param)
			{
				renderParam($param, $param_access_enabled, $server_home['home_id']);
			}
			echo "</table></td></tr>";
		}
	}

	if (isset($home_info['mods'][$mod_id]['extra_params']))
	{
		echo "<tr><td colspan='2'><h3>".get_lang('extra_parameters')."</h3>";
		if (!$extra_param_access_enabled)
			echo "<span class='failure info'>".get_lang('no_extra_param_access')."</span>";

		echo "</td></tr>\n";

		//get last used param or get default
	$last_param = json_decode($db->getLastParam($home_id), True);
	if (array_key_exists('extra', $last_param))
		$extra_default = $last_param['extra'];
	else
		$extra_default = $home_info['mods'][$mod_id]['extra_params'];

		echo "<tr><td colspan='2'><input name='extra_params' value='".$extra_default."' ";

		if (!$extra_param_access_enabled)
			echo get_lang('disabled');

		echo " size='60' /></td></tr>";
		echo "<tr><td colspan='2' class='info'>".get_lang('extra_parameters_info')."</td></tr>";
	}

	echo "</table>";
	echo get_lang('start_wait_note');

	if ( $check_ok )
	{
		echo "<p><input type='submit' name='start_server' value='".
			get_lang('start_server')."' /></p>\n";
	}
	else
	{
		print_failure(get_lang('unable_get_info'));
	}

	echo "</form>";
	return;
}

// Starting the server
elseif($server_home['home_id'] == $_POST['home_id'])
{
	// Maxplayers on POST compares with maxplayers on DB for security reasons (FORM HACKING)
	$max_players = $home_info['mods'][$mod_id]['max_players'];
	if( isset( $_POST['max_players'] ) )
	{
		if ( $_POST['max_players'] <= $max_players )
		{

			$cli_param_data['PLAYERS'] = $_POST['max_players'];
			
		}
		else
		{

			echo "<p>" . get_lang_f('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set') . "</p>";
			
			$cli_param_data['PLAYERS'] = $max_players;
			
		}
	}
	
	if ( $server_xml->map_list OR $server_xml->maps_location ) 
	    $cli_param_data['MAP'] = $_POST['map']; 
 	else 
 	    $cli_param_data['MAP'] = ""; 

	$ip_port = $_POST['ip_port'];
	list($ip, $port) = explode(":", $ip_port);
	
	// It compares ip and port on POST with the pair on DB for security reasons (FORM HACKING)
	
	$home_id = $home_info['home_id'];
	
	$ip_info = $db->getHomeIpPorts($home_id);
	
	foreach ( $ip_info as $ip_ports_row )

	{
	
		if($ip_ports_row['ip'] == $ip && $ip_ports_row['port'] == $port) 
		
		{
		
			$cli_param_data['IP'] = $ip_ports_row['ip'];
			
			$cli_param_data['PORT'] = $ip_ports_row['port'];
			
		}
		
	}
	
	If ( !isset($cli_param_data['IP']) OR !isset($cli_param_data['PORT']) )
	
	{
	
		echo "<h2>" . get_lang_f('ip_port_pair_not_owned') . "</h2>";
		
		return;
		
	}
		
	
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
	
	// We do this check because sometimes server does not answer to lgsl check
	// done below and is still running.
	if ( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_id) === 1 )
	{
		echo "<p>".get_lang_f('server_already_running')."<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$home_id.
			"&amp;ip=".$ip."&amp;port=".
			$port.">".get_lang_f('already_running_stop_server')."</a></p>";
		return;
	}
		
	if (isset($server_home['ufw_status']) and $server_home['ufw_status'] == "enable")
	{		
		$ip_ports = $db->getHomeIpPorts($home_id);
		foreach ($ip_ports as $ip_port)
		{
			if ($server_xml->protocol == "gameq")
			{
				$query_port = get_query_port ($server_xml, $ip_port['port']);
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
			
			$remote->sudo_exec("ufw allow ".$ip_port['port']);
			
			if(isset($query_port))
			{
				$remote->sudo_exec("ufw allow ".$query_port);
			}
		}
	}
	
	if ($server_xml->protocol == "gameq")
	{
		$query_port = get_query_port ($server_xml, $port);
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
	
	$cli_param_data['QUERY_PORT'] = $query_port;
	
	// Check if the game is supported by lgsl or not.
	if ( $server_xml->lgsl_query_name )
	{
		//error_reporting(E_ERROR);
		$data = lgsl_query_live((string)$server_xml->lgsl_query_name, $ip, $port, $query_port, $port, "s");
		//error_reporting(E_ALL);

		if($data['b']['status'] == '1')
		{
			print_failure("".get_lang_f('error_server_already_running')." <b>$port</b>.");
			return;
		}
	}

	$cli_param_data['GAME_TYPE'] = $home_info['mods'][$mod_id]['mod_key'];

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
	
	$save_param = array();
	
	if ( $param_access_enabled && isset($_REQUEST['params']) )
	{
		foreach($server_xml->server_params->param as $param)
		{		
			foreach ( $_REQUEST['params'] as $paramKey => $paramValue )
			{
				if ($param['key'] == $paramKey)
				{
					if (0 == strlen($paramValue))
						continue;
					if ($paramKey == $paramValue) // it's a checkbox
					{
						$new_param = $paramKey;
						$save_param[$paramKey] = True;
					}
					elseif($param->option == "ns" or $param->options == "ns")
					{
						$new_param = $paramKey.$paramValue;
						$save_param[$paramKey] = $paramValue;
					}
					else
					{
						$new_param = $paramKey.' "'.$paramValue.'"';
						$save_param[$paramKey] = $paramValue;
					}
				  
					if ($param['id'] == NULL || $param['id'] == "")
					{
						$start_cmd .= ' '.$new_param;
					}
					else
					{
						$start_cmd = preg_replace( "/%".$param['id']."%/", $new_param, $start_cmd );
					}
				}			  
			}
			$start_cmd = preg_replace( "/%".$param['id']."%/", '', $start_cmd );
		} 
	}
	elseif( !$param_access_enabled )
	{
		foreach($server_xml->server_params->param as $param)
		{
			$last_param = json_decode($db->getLastParam($home_id), True);
			foreach ( $last_param as $paramKey => $paramValue )
			{
				if ($param['key'] == $paramKey)
				{
					if (0 == strlen($paramValue))
						continue;
					if ($paramKey == $paramValue) // it's a checkbox
					{
						$new_param = $paramKey;
						$save_param[$paramKey] = True;
					}
					elseif($param->option == "ns" or $param->options == "ns")
					{
						$new_param = $paramKey.$paramValue;
						$save_param[$paramKey] = $paramValue;
					}
					else
					{
						$new_param = $paramKey.' "'.$paramValue.'"';
						$save_param[$paramKey] = $paramValue;
					}
				  
					if ($param['id'] == NULL || $param['id'] == "")
					{
						$start_cmd .= ' '.$new_param;
					}
					else
					{
						$start_cmd = preg_replace( "/%".$param['id']."%/", $new_param, $start_cmd );
					}
				}			  
			}
			$start_cmd = preg_replace( "/%".$param['id']."%/", '', $start_cmd );
		} 
	}

	$save_param['map'] = $cli_param_data['MAP'];
	$save_param['players'] = $cli_param_data['PLAYERS'];
	if ( $extra_param_access_enabled && !empty($_REQUEST['extra_params']))
	{
		$start_cmd .= " ".$_REQUEST['extra_params'];
		$save_param['extra'] = $_REQUEST['extra_params'];
	}
	else
	{
		// If user does not have access to modify extra params then we use
		// the default set by admins.
		$start_cmd .= " ".$home_info['mods'][$mod_id]['extra_params'];
	}
	//Save the param used to the database
	$db->changeLastParam($home_info['home_id'],json_encode($save_param)); 

	echo "<table style='width:400px'>";
	echo "<tr><td width='150' class='right'>".get_lang('ogp_agent_ip').
		":</td><td class='left'>".$home_info['agent_ip']."</td></tr>\n";
	echo "<tr><td class='right'>".get_lang('game_home').
		":</td><td class='left'>".$home_info['home_path']."</td></tr>";
	echo "<tr><td class='right'>".get_lang('startup_cpu').
		":</td><td class='left'>".$home_info['mods'][$mod_id]['cpu_affinity']."</td></tr>\n";
	echo "<tr><td class='right'>".get_lang('startup_nice').
		":</td><td class='left'>".$home_info['mods'][$mod_id]['nice']."</td></tr>";
	echo "<tr><td class='right'>".get_lang('startup_params').
		":</td><td colspan='2' style='word-wrap: break-word'>".$start_cmd."</td></tr>";
	echo "</table>";
	
	if($server_xml->replace_texts OR $server_xml->custom_fields)
		require_once("modules/gamemanager/cfg_text_replace.php");
	
	$start_retval = $remote->universal_start($home_info['home_id'],
		$home_info['home_path'],
		$server_xml->server_exec_name, $server_xml->exe_location,
		$start_cmd, $port, $ip,
		$home_info['mods'][$mod_id]['cpu_affinity'],
		$home_info['mods'][$mod_id]['nice']);
	$db->logger( get_lang('server_started') . " (".$home_info['home_name']." $ip:$port)" );
	if ( $start_retval == AGENT_ERROR_NOT_EXECUTABLE )
	{
		print_failure(get_lang("server_binary_not_executable"));
		return;
	}

	else if ( $start_retval <= 0 )
	{
		if( $start_retval == -14 )
		{
			echo "<p>".get_lang_f('server_already_running')."<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$home_id.
				"&amp;ip=".$ip."&amp;port=".
				$port.">".get_lang_f('already_running_stop_server')."</a></p>";
			return;
		}
		else
		{
			print_failure(get_lang_f('failed_start_server_code',$start_retval));
			return;
		}
	}

	echo "<h3>".get_lang('starting_server_settings').":</h3>";
	echo "<table class='list_table'>";
	if (isset($server_xml->lgsl_query_name) || isset($server_xml->gameq_query_name))
	{
		if(isset($server_xml->lgsl_query_name))$query_name = $server_xml->lgsl_query_name;
		else $query_name = $server_xml->gameq_query_name;
	}
	else $query_name = $server_xml->mods->mod['key'];
	
	if ( $server_xml->map_list || $server_xml->maps_location )
	{
		$map_lc = preg_replace("/[^a-z0-9_]/", "_", strtolower($cli_param_data['MAP']));
	//----------+ getting the maps image location.
		$maplocation = get_map_path($query_name,$server_xml->mods->mod['key'],$map_lc);
		echo "<tr><td rowspan='6'><img src='".$maplocation."' /></td><td class='right'>".get_lang('map').
			":</td><td class='left'>".$cli_param_data['MAP']."</td></tr>";
	}
	else
	{
		$icon_paths = array("images/icons/".$server_xml->mods->mod['key'].".png",
							"images/icons/$query_name.png",
							"protocol/lgsl/other/icon_unknown.gif");  // USE UKNOWN ICON
		$icon_path = get_first_existing_file($icon_paths);
		echo "<tr><td rowspan='6'><img src='".$icon_path."' /></td>";
	}
	if ( isset($cli_param_data['PLAYERS']) )
	{
		echo "<tr><td class='right'>".get_lang('max_players').
			":</td><td class='left'>".$cli_param_data['PLAYERS']."</td></tr>";
	}
	echo "<tr><td class='right'>".get_lang('server_ip_port').
		":</td><td class='left'>$ip:$port</td></tr>";
	echo "<tr><td class='right'>".get_lang('game_type').
		":</td><td class='left'>".$server_xml->mods->mod['key']."</td></tr>";
	echo "</table>";

	print("<p class='note'>".get_lang('starting_server')."</p>");
	global $view;
	$view->refresh("?m=gamemanager&amp;p=start&amp;refresh&amp;home_id=".$home_id."&amp;ip=".$ip."&amp;port=".$port."&amp;mod_id=".$mod_id,3);
	return;
}
?>