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

$param_access_enabled = preg_match("/p/",$server_home['access_rights']) > 0 ? TRUE : FALSE;
$extra_param_access_enabled = preg_match("/e/",$server_home['access_rights']) > 0 ? TRUE:FALSE;
$last_param = json_decode($server_home['last_param'], True);

$isAdmin = $db->isAdmin($_SESSION['user_id']);

if (!function_exists('processParamValue')) {
	function processParamValue(&$param, &$server_xml, $paramKey, $paramValue, &$save_param, &$start_cmd){		
		if (0 == strlen($paramValue))
			return false;
		
		if ($paramKey == $paramValue) // it's a checkbox
		{
			$new_param = $paramKey;
			$save_param[$paramKey] = $paramValue;
		}
		elseif($param->option == "ns" or $param->options == "ns")
		{
			$new_param = $paramKey.clean_server_param_value($paramValue, $server_xml->cli_allow_chars);
			$save_param[$paramKey] = $paramValue;
		}
		elseif($param->option == "q" or $param->options == "q"){
			$new_param = $paramKey . '"' . clean_server_param_value($paramValue, $server_xml->cli_allow_chars) . '"';
			$save_param[$paramKey] = $paramValue;
		}
		elseif($param->option == "s" or $param->options == "s"){
			$new_param = $paramKey . ' ' . clean_server_param_value($paramValue, $server_xml->cli_allow_chars);
			$save_param[$paramKey] = $paramValue;
		}
		else
		{
			$new_param = $paramKey.' "'.clean_server_param_value($paramValue, $server_xml->cli_allow_chars).'"';
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

if( !isset( $_POST['start_server'] ) )
{
	$server_exec = clean_path($server_home['home_path']."/".$server_xml->exe_location."/".$server_xml->server_exec_name);
	$r = $remote->rfile_exists($server_exec);
	if($r === 0)
	{
		print_failure(get_lang_f('game_exec_not_found',$server_exec));
		return;
	}
	else if($r === -1)
	{
		print_failure( get_lang("agent_offline") );
		return;
	}
	// If the result is something else than 1 here then there unexpected retval was received.
	else if ($r !== 1 )
	{
		print_failure( get_lang("unexpected_result_libremote") );
		return;
	}

	$ip_info = $db->getHomeIpPorts($server_home['home_id']);

	if ( empty($ip_info) )
	{
		print_failure( get_lang("no_ip_port_pairs_assigned") );
		return;
	}

	echo get_lang_f('select_params_and_start',  get_lang("start_server") );

	echo "<form action='home.php?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=". $server_home['home_id'] . "-". $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' method='post'>\n
		<input type='hidden' name='mod_id' value='$server_home[mod_id]' />\n
		<input type='hidden' name='home_id' value='$server_home[home_id]' />\n
		<input type='hidden' name='remote_server_id' value='".$server_home['remote_server_id']."' />\n
		<table class='start-server'>
		<tr><td class='right'>". get_lang("ogp_agent_ip") .
		":</td><td class='left'>".$server_home['agent_ip']."</td></tr>";
	
	$max_players = $server_home['max_players'];

	if ( $max_players > 0 )
	{
		echo "<tr><td class='right'>". get_lang("max_players") .
			":</td><td class='left'>";
			
		$players = array();
		for($i = $max_players; $i > 0; $i--)
		{
			$players["$i"]="$i";
		}
		
		echo create_drop_box_from_array($players,'max_players',$last_param['players']);
		
		echo "<span class='info'>(". get_lang("max") .": ".
			$max_players.")</span></td></tr>\n";
	}
	$display_ip = checkDisplayPublicIP($server_home['display_public_ip'],$server_home['ip'] != $server_home['agent_ip'] ? $server_home['ip'] : $server_home['agent_ip']);
	echo "<tr><td class='right'>". get_lang("ip_and_port") .
		":</td><td class='left'>".$display_ip . ":" . $server_home['port']."<input name='ip_port' type='hidden' value='".$server_home['ip'] . ":" . $server_home['port']."'/></td></tr>";

	list($list_type,) = explode(":", $server_xml->map_list);

	$map_array = -5;

	$maps_found = FALSE;

	// use maplist file as primary map location.
	if ( $server_xml->map_list )
	{
		$mapfile = $server_home['home_path']."/".
			preg_replace("/mod/",$server_home['mod_key'],$server_xml->map_list);
		$read_status = $remote->remote_readfile($mapfile,$map_array);

		// If file was found and read successfully then lets seperate the maps.
		if ( $read_status == 1 )
		{
			$map_array = array_filter(preg_split("/\n/",$map_array));
			if(!empty($map_array))
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
		$map_path = $server_home['home_path']."/".
			preg_replace("/mod/",$server_home['mod_key'],$server_xml->maps_location);

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
			echo "<tr><td class='right'>". get_lang("available_maps") .":</td><td class='left'>\n";

			// We remove all lines that start with // because we
			// expect those lines to be comments.
			$comments = preg_grep( "/^\s*\/\//",$map_array );
			$map_array = array_diff( $map_array,$comments );
			sort($map_array);
			echo create_drop_box_from_array($map_array,'map',$last_param['map']);
			echo "</td></tr>";

			echo "<tr><td colspan='2' class='info'>". get_lang("maps_read_from") ." ";
			if ( $maps_found == "DIR" )
			{
				echo get_lang("directory") ." ".clean_path($map_path).".";
			}
			else
			{
				echo  get_lang("file") ." ".clean_path($mapfile).".";
			}
			echo "</td></tr>\n";
		}
		else
		{
			echo "<tr><td colspan='2'>";
			print_failure( get_lang("failed_to_read_maps_error_code") .": $map_array");
			echo "</td></tr>";
			$check_ok = FALSE;
		}
	}
	
	// Print params if there are any.
	if($server_xml->server_params)
	{
		if (!$param_access_enabled)
			echo "<span class='failure info'>". get_lang("no_parameter_access") ."</span>";

		foreach($server_xml->server_params->param as $param)
		{
			renderParam($param, $last_param, $param_access_enabled, $server_home['home_id']);
		}
		foreach($server_xml->server_params->group as $group)
		{
			echo "<tr><td><table>";
			echo "<tr><th><b>".$group['name']."</b></th></tr>";
			foreach($group->param as $param)
			{
				renderParam($param, $last_param, $param_access_enabled, $server_home['home_id']);
			}
			echo "</table></td></tr>";
		}
	}

	if (isset($server_home['extra_params']))
	{
		echo "<tr><td colspan='2'><h3>". get_lang("extra_parameters") ."</h3>";
		if (!$extra_param_access_enabled)
			echo "<span class='failure info'>". get_lang("no_extra_param_access") ."</span>";

		echo "</td></tr>\n";

		//get last used param or get default
		if (array_key_exists('extra', $last_param))
			$extra_default = $last_param['extra'];
		else
			$extra_default = $server_home['extra_params'];

		echo "<tr><td colspan='2'><input name='extra_params' value=\"".str_replace('"', "&quot;", strip_real_escape_string($extra_default))."\" style='width:99%' ";

		if (!$extra_param_access_enabled)
			echo 'disabled';

		echo "/></td></tr>";
		echo "<tr><td colspan='2' class='info'>". get_lang("extra_parameters_info") ."</td></tr>";
	}

	echo "</table>";
	echo  get_lang("start_wait_note");

	if ( $check_ok )
	{
		echo "<div class='submit-start' ><input type='submit' name='start_server' value='".
			 get_lang("start_server") ."' /></div>\n";
	}
	else
	{
		print_failure( get_lang("unable_get_info") );
	}

	echo "</form>";
	return;
}

// Starting the server
elseif($server_home['home_id'] == $_POST['home_id'])
{
	// Maxplayers on POST compares with maxplayers on DB for security reasons (FORM HACKING)
	if( isset( $_POST['max_players'] ) and is_numeric( $_POST['max_players'] ) )
	{
		if ( $_POST['max_players'] <= $server_home['max_players'] )
			$cli_param_data['PLAYERS'] = $_POST['max_players'];
		else
		{
			echo "<p>" . get_lang_f('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set') . "</p>";
			$cli_param_data['PLAYERS'] = $server_home['max_players'];
		}
	}
	
	if ( $server_xml->map_list OR $server_xml->maps_location ) 
	    $cli_param_data['MAP'] = $_POST['map']; 
 	else 
 	    $cli_param_data['MAP'] = ""; 

	$ip_port = $_POST['ip_port'];
	list($ip, $port) = explode(":", $ip_port);
	
	if($server_home['ip'] == $ip && $server_home['port'] == $port) 
	{
		$cli_param_data['IP'] = $ip;
		$cli_param_data['PORT'] = $server_home['port'];
	}
	
	If ( !isset($cli_param_data['IP']) OR !isset($cli_param_data['PORT']) )
	{
		echo "<h2>" . get_lang_f('ip_port_pair_not_owned') . "</h2>";
		return;
	}
		
	
	$cli_param_data['HOSTNAME'] = $server_home['home_name'];
	$cli_param_data['PID_FILE'] = "ogp_game_startup.pid";
	
	$os = $remote->what_os();
	
	if( preg_match("/Linux/", $os) )
	{
		// Wine
		if(preg_match("/_win(32|64)?$/", $server_home['game_key']))
		{
			$home_path_wine = $remote->exec("winepath -w ".$server_home['home_path']);
			$home_path_wine = str_replace("\\","\\\\", $home_path_wine);
			$home_path_wine = trim($home_path_wine);
			$cli_param_data['BASE_PATH'] = $home_path_wine;
			$cli_param_data['HOME_PATH'] = $home_path_wine;
			$cli_param_data['SAVE_PATH'] = $home_path_wine;
			$cli_param_data['OUTPUT_PATH'] = $home_path_wine;
			$cli_param_data['USER_PATH'] = $home_path_wine;
		}
		// Linux
		else
		{
			$cli_param_data['BASE_PATH'] = $server_home['home_path'];
			$cli_param_data['HOME_PATH'] = $server_home['home_path'];
			$cli_param_data['SAVE_PATH'] = $server_home['home_path'];
			$cli_param_data['OUTPUT_PATH'] = $server_home['home_path'];
			$cli_param_data['USER_PATH'] = $server_home['home_path'];
		}
	}
	// Windows
	elseif( preg_match("/CYGWIN/", $os) )
	{
		$home_path_win = $remote->exec("cygpath -w ".$server_home['home_path']);
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
	if ( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1 )
	{
		echo "<p>".get_lang_f('server_already_running')."<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$server_home['home_id'].
			"&amp;ip=".$ip."&amp;port=".
			$port.">".get_lang_f('already_running_stop_server')."</a></p>";
		return;
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

	$cli_param_data['GAME_TYPE'] = $server_home['mod_key'];
	$cli_param_data['CONTROL_PASSWORD'] = $server_home['control_password'];

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
		
		if ( $server_xml->reserve_ports )
		{
			foreach ( $server_xml->reserve_ports->port as $reserve_port )
			{
				// If s is found the param is seperated with space
				$add_space = preg_match( "/s/", $reserve_port['options'] ) > 0 ? " " : "";
				$cli_value = $reserve_port['type'] == "add" ? $server_home['port'] + (string) $reserve_port: 
															  $server_home['port'] - (string) $reserve_port;
				// If q is found we add quotes around the value.
				if ( preg_match( "/q/", $reserve_port['options'] ) > 0 )
				{
					$cli_value = "\"".$cli_value."\"";
				}
				$start_cmd = preg_replace( "/%".$reserve_port['id']."%/",
					$reserve_port['cli_string'].$add_space.$cli_value, $start_cmd );
			}
		}
	}
	
	$save_param = array();
	
	if(isset($server_xml->server_params->param))
	{
		if($param_access_enabled and isset($_POST['params']))
		{
			foreach($server_xml->server_params->param as $param)
			{
				$paramKey = (string)$param['key'];
				$paramType = (string)$param['type'];
				// Get the last saved value of this param or its default value
				if (array_key_exists($paramKey, $last_param))
					$savedValue = (string)$last_param[$paramKey];
				
				$lockedByAdmin = (property_exists($param, 'access') and $param->access == "admin" and !$isAdmin);
				
				// Dependency fields...
				if($paramType == "other_game_server_path" or $paramType == "other_game_server_path_additional")
				{
					$postKey = $paramKey."{DEPENDS:$paramType}";
					if(isset($_POST['params'][$postKey]) and !empty($_POST['params'][$postKey]))
					{
						$dependsSection = strrpos($postKey, "{DEPENDS");
						$realKey = substr($postKey, 0, $dependsSection);
						$dependsSection = substr($postKey, $dependsSection);
						$dependsKey = str_replace("{DEPENDS:", "", $dependsSection);
						$dependsKey = str_replace("}", "", $dependsKey);
						$_POST['params'][$paramKey] = $_POST['params'][$postKey];
						if($dependsKey == "other_game_server_path_additional" and isset($_POST['params'][$dependsKey]))
							$_POST['params'][$paramKey] .= ltrim($_POST['params'][$dependsKey],'/');
					}
				}
				
				if(isset($_POST['params'][$paramKey]))
				{
					$processIt = true;
					$paramValue = $_POST['params'][$paramKey];
					if($lockedByAdmin)
					{
						if(isset($savedValue))
							$paramValue = $savedValue;
						else
							$processIt = false;
					}
					$paramKey = isset($realKey) ? $realKey : $paramKey;
					// Process the param value for the start command and for the save params unless its locked by admin and there's no saved value.
					if($processIt)
						processParamValue($param, $server_xml, $paramKey, $paramValue, $save_param, $start_cmd);			  
				}
				else// If the parameter wasn't posted (because it may have been disabled due to access param or a sneaky user deleted it to circumvent security)
				{
					if($lockedByAdmin and isset($savedValue))
						processParamValue($param, $server_xml, $paramKey, $savedValue, $save_param, $start_cmd);
				}
				
				if ($param['id'] != NULL && $param['id'] != "")
					$start_cmd = preg_replace( "/%".$param['id']."%/", '', $start_cmd );
				
				if(isset($realKey))
					unset($realKey);
				
				if(isset($savedValue))
					unset($savedValue);
			}
		}
		elseif( !$param_access_enabled )
		{
			foreach($server_xml->server_params->param as $param)
			{
				$paramKey = (string)$param['key'];
				if(isset($last_param[$paramKey]) and strlen((string)$last_param[$paramKey]) != 0)
				{
					$paramValue = (string)$last_param[$paramKey];
					
					if ($paramKey == $paramValue) // it's a checkbox
					{
						$new_param = $paramKey;
						$save_param[$paramKey] = $paramValue;
					}
					elseif($param->option == "ns" or $param->options == "ns")
					{
						$new_param = $paramKey.clean_server_param_value($paramValue, $server_xml->cli_allow_chars);
						$save_param[$paramKey] = $paramValue;
					}
					elseif($param->option == "q" or $param->options == "q"){
						$new_param = $paramKey . '"' . clean_server_param_value($paramValue, $server_xml->cli_allow_chars) . '"';
						$save_param[$paramKey] = $paramValue;
					}
					elseif($param->option == "s" or $param->options == "s"){
						$new_param = $paramKey . ' ' . clean_server_param_value($paramValue, $server_xml->cli_allow_chars);
						$save_param[$paramKey] = $paramValue;
					}
					else
					{
						$new_param = $paramKey.' "'.clean_server_param_value($paramValue, $server_xml->cli_allow_chars).'"';
						$save_param[$paramKey] = $paramValue;
					}
				  
					if($param['id'] == NULL or $param['id'] == "")
					{
						$start_cmd .= ' '.$new_param;
					}
					else
					{
						$start_cmd = preg_replace( "/%".$param['id']."%/", $new_param, $start_cmd );
					}			  
				}
				else
				{
					if($param['id'] != NULL and $param['id'] != "")
						$start_cmd = preg_replace( "/%".$param['id']."%/", '', $start_cmd );
				}
			} 
		}
	}

	$save_param['map'] = $cli_param_data['MAP'];
	$save_param['players'] = $cli_param_data['PLAYERS'];
	
	if ( $extra_param_access_enabled )
	{
		if(isset($_REQUEST['extra_params']) and $_REQUEST['extra_params'] != "")
		{
			$start_cmd .= " ".str_replace("\\\\", "\\", clean_server_param_value($_REQUEST['extra_params'], $server_xml->cli_allow_chars));
			$save_param['extra'] = $_REQUEST['extra_params'];
		}
	}
	else
	{
		// If user does not have access to modify extra params then we use
		// the last param or default set by admins.
		$extra = ($last_param !== NULL and array_key_exists('extra', $last_param) and (string)$last_param['extra'] != "") ? 
				  $last_param['extra'] : $server_home['extra_params'];
		
		$start_cmd .= " ".str_replace("\\\\", "\\", clean_server_param_value($extra, $server_xml->cli_allow_chars));
		$save_param['extra'] = $extra;
	}
	//Save the param used to the database
	$db->changeLastParam($server_home['home_id'],json_encode($save_param)); 
	
	echo "<table class='server-starting'>";
	echo "<tr><td class='right'>". get_lang("ogp_agent_ip") .
		":</td><td class='left'>".$server_home['agent_ip']."</td></tr>\n";
	echo "<tr><td class='right'>". get_lang("game_home") .
		":</td><td class='left'>".$server_home['home_path']."</td></tr>";
	echo "<tr><td class='right'>". get_lang("startup_cpu") .
		":</td><td class='left'>".$server_home['cpu_affinity']."</td></tr>\n";
	echo "<tr><td class='right'>". get_lang("startup_nice") .
		":</td><td class='left'>".$server_home['nice']."</td></tr>";
	echo "<tr><td class='right'>". get_lang("startup_params") .
		":</td><td colspan='2' style='word-wrap: break-word'>".strip_real_escape_string($start_cmd)."</td></tr>";
	echo "</table>";
	
	if($server_xml->replace_texts OR $server_xml->custom_fields)
		require_once("modules/gamemanager/cfg_text_replace.php");
	
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
			$lockedFilesStatus = $remote->lock_additional_home_files($server_home['home_path'], $lockFiles, "lock");
		}
	}
	
	$start_retval = $remote->universal_start($server_home['home_id'],
		$server_home['home_path'],
		$server_xml->server_exec_name, 
		$server_xml->exe_location,
		$start_cmd, $port, $ip,
		$server_home['cpu_affinity'],
		$server_home['nice'],
		$preStart,
		$envVars,
		$server_xml->game_key,
		(isset( $server_xml->console_log ) ? $server_xml->console_log : "")
		);
	$db->logger(  get_lang("server_started")  . " (".$server_home['home_name']." $ip:$port)" );
	if ( $start_retval == AGENT_ERROR_NOT_EXECUTABLE )
	{
		print_failure( get_lang("server_binary_not_executable") );
		return;
	}

	else if ( $start_retval <= 0 )
	{
		if( $start_retval == -14 )
		{
			echo "<p>".get_lang_f('server_already_running')."<a href=?m=gamemanager&amp;p=stop&amp;home_id=".$server_home['home_id'].
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
	
	echo "<h3>". get_lang("starting_server_settings") .":</h3>";
	
	$firewall_settings = $db->getFirewallSettings($server_home['remote_server_id']);
	if ($firewall_settings['status'] == "enable")
	{
		$ip_ports = $db->getHomeIpPorts($server_home['home_id']);
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
			set_firewall($remote, $firewall_settings, 'allow', $ip_port['port'], $ip_port['ip']);
			if(isset($query_port) and $query_port != "" and $query_port != $ip_port['port'])
				set_firewall($remote, $firewall_settings, 'allow', $query_port, $ip_port['ip']);
		}
	}
	
	echo "<table class='list_table'>";
	if (isset($server_xml->lgsl_query_name) || isset($server_xml->gameq_query_name))
	{
		if(isset($server_xml->lgsl_query_name))$query_name = $server_xml->lgsl_query_name;
		else $query_name = $server_xml->gameq_query_name;
	} elseif ($server_xml->protocol == "teamspeak3") {
		$query_name = 'ts3';
	} else $query_name = $server_xml->mods->mod['key'];
	
	if ( $server_xml->map_list || $server_xml->maps_location )
	{
		$map_lc = preg_replace("/[^a-z0-9_]/", "_", strtolower($cli_param_data['MAP']));
	//----------+ getting the maps image location.
		$maplocation = get_map_path($query_name,$server_xml->mods->mod['key'],$map_lc);
		echo "<tr><td rowspan='6' style='width:160px;'><img src='".$maplocation."' /></td><td class='right'>". get_lang("map") .
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
		echo "<tr><td class='right'>". get_lang("max_players") .
			":</td><td class='left'>".$cli_param_data['PLAYERS']."</td></tr>";
	}
	echo "<tr><td class='right'>". get_lang("server_ip_port") .
		":</td><td class='left'>$ip:$port</td></tr>";
	echo "<tr><td class='right'>". get_lang("game_type") .
		":</td><td class='left'>".$server_xml->mods->mod['key']."</td></tr>";
	echo "</table>";

	print("<p class='note'>". get_lang("starting_server") ."</p>");
	global $view;
	$view->refresh("?m=gamemanager&amp;p=start&amp;refresh&amp;home_id=".$server_home['home_id']."&amp;ip=".$ip."&amp;port=".$port."&amp;mod_id=".$server_home['mod_id'],3);
	return;
}
?>
