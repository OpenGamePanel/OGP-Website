<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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

/******************
 * Functions      *
 * ***************/
 
function outPutJSON($result){
	global $action, $db;
		
	// Send JSON ouput
	header('Content-Type: application/json');
	echo json_encode($result);
	exit();
}

function runRemoteAction($action){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports, $homeId, $resultOp;
	
	// Load XML and server options
	$installer_name = isset($mod_xml->installer_name) ? $mod_xml->installer_name : $mod_key;

	$modname = $installer_name == '90' ? $mod_key : '';
	$betaname = isset($mod_xml->betaname) ? $mod_xml->betaname : '';
	$betapwd = isset($mod_xml->betapwd) ? $mod_xml->betapwd : '';
	$login = $mod_xml->installer_login ? $mod_xml->installer_login : $settings['steam_user'];
	$pass = $mod_xml->installer_login ? '' : $settings['steam_pass'];
	$arch = isset($mod_xml->steam_bitness) ? $mod_xml->steam_bitness : '';
	$exec_folder_path = $server_xml->exe_location;
	$exec_path = $server_xml->server_exec_name;

	$precmd = $server_home['mods'][$mod_id]['precmd'] == "" ? ($server_home['mods'][$mod_id]['def_precmd'] == "" ? $server_xml->pre_install : $server_home['mods'][$mod_id]['def_precmd'] ) : $server_home['mods'][$mod_id]['precmd'];
	$postcmd = $server_home['mods'][$mod_id]['postcmd'] == "" ? ($server_home['mods'][$mod_id]['def_postcmd'] == "" ? $server_xml->post_install : $server_home['mods'][$mod_id]['def_precmd'] ) : $server_home['mods'][$mod_id]['postcmd'];
	$cfg_os = preg_match('/win32|win64/', $server_xml->game_key) ? 'windows' : 'linux';
	$lockFiles = !empty($server_xml->lock_files) ? trim($server_xml->lock_files) : '';
	$preStart = !empty($server_xml->pre_start) ? trim($server_xml->pre_start) : '';
	$envVars = !empty($server_xml->environment_variables) ? trim($server_xml->environment_variables) : '';
	$startup_cmd = get_start_cmd($remote, $server_xml, $server_home, $mod_id, $home_ip_ports['ip'], $home_ip_ports['port'], $db);
	
	switch($action){
		case "steam_auto_update":
	
			// Make the update call
			$remoteResult = $remote->automatic_steam_update(
				//generic
				$homeId, $server_home['home_path'], $home_ip_ports['ip'], $home_ip_ports['port'], $exec_path, $exec_folder_path,
									 
				//stop
				$server_xml->control_protocol, $server_home['control_password'], $server_xml->control_type,

				//update
				$appId, $modname, $betaname, $betapwd, $login, $pass, $settings['steam_guard'], $precmd, $postcmd, $cfg_os, $lockFiles,
									  
				//start
				$startup_cmd, $server_home['mods'][$mod_id]['cpu_affinity'], $server_home['mods'][$mod_id]['nice'], $preStart, $envVars, $server_xml->game_key, $arch
			);
			break;
		case "restart_server":
			$remoteResult = $remote->remote_restart_server($server_home['home_id'],
														$home_ip_ports['ip'],
														$home_ip_ports['port'],
														$server_xml->control_protocol,
														$server_home['control_password'],
														$server_xml->control_protocol_type,
														$server_home['home_path'],
														$server_xml->server_exec_name,
														$server_xml->exe_location,
														$startup_cmd,
														$server_home['mods'][$mod_id]['cpu_affinity'],
														$server_home['mods'][$mod_id]['nice'],
														$preStart,
														$envVars,
														$server_xml->game_key
														);
			break;
		case "stop_server":
			$remoteResult = $remote->remote_stop_server($server_home['home_id'],
														$home_ip_ports['ip'],
														$home_ip_ports['port'],
														$server_xml->control_protocol,
														$server_home['control_password'],
														$server_xml->control_protocol_type,
														$server_home['home_path']
														);
			break;
		case "start_server":
			$remoteResult = $remote->universal_start($server_home['home_id'],
							$server_home['home_path'],
							$server_xml->server_exec_name, 
							$server_xml->exe_location,
							$startup_cmd, 
							$home_ip_ports['port'], 
							$home_ip_ports['ip'],
							$server_home['mods'][$mod_id]['cpu_affinity'],
							$server_home['mods'][$mod_id]['nice'],
							$preStart,
							$envVars,
							$server_xml->game_key);
			break;
		
	}

	if($remoteResult == 1){
		return true;
	}else if(hasValue($remoteResult, true)){
		return $remoteResult;
	}
	
	return false;
}

function callSteamAutoUpdate(){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports, $resultOp;
	
	if($server_xml->installer == 'steamcmd') {
		if($remote->rfile_exists($server_home['home_path'] . '/steamapps/appmanifest_' . $appId . '.acf') === 1){
			$ourVersion = $remote->installed_steam_version($server_home['home_path'], $appId, 0);
			$steamVersion = $remote->fetch_steam_version($appId, 0);
			if($ourVersion != $steamVersion){
				$success = runRemoteAction("steam_auto_update");
				if($success == 1){
					$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" has been successfully auto-updated via SteamCMD and restarted.";
					$resultOp["success"] = true;
				}else if($success == 2){
					$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" has been successfully auto-updated via SteamCMD.";
					$resultOp["success"] = true;
				}else{
					if(is_array($success)){
						$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" failed to auto-update. Agent returned: " . print_r($success, true);
					}else{
						$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" failed to auto-update. Agent returned error code: " . $success;
					}
					$resultOp["success"] = false;
				}
			}else{
				$resultOp["message"] = "Server is already up-to-date.";
				$resultOp["success"] = false;
			}
		}else{
			$resultOp["message"] = "Unable to find appmanifest.";
			$resultOp["success"] = false;
		}	
	}else{
		$resultOp["message"] = "Game server does NOT integrate directly with Steam.";
		$resultOp["success"] = false;
	}
}

function callRestartServer(){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports, $resultOp;
	
	$success = runRemoteAction("restart_server");
	if($success >= 0){
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" has been successfully restarted.";
		$resultOp["success"] = true;
	}else{
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" failed to restart. Agent returned: " . (is_array($success) ? print_r($success, true) : $success);
		$resultOp["success"] = false;
	}
}

function callStartServer(){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports, $resultOp;
	
	$success = runRemoteAction("start_server");
	if($success == 1){
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" has been successfully started.";
		$resultOp["success"] = true;
	}else{
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" failed to start. Agent returned: " . (is_array($success) ? print_r($success, true) : $success);
		$resultOp["success"] = false;
	}
}

function callStopServer(){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports, $resultOp;
	
	$success = runRemoteAction("stop_server");
	if($success == 1){
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" has stopped successfully.";
		$resultOp["success"] = true;
	}else{
		$resultOp["message"] = "Server \"" . $server_home["home_name"] . "\" failed to stop. Agent returned: " . (is_array($success) ? print_r($success, true) : $success);
		$resultOp["success"] = false;
	}
}

/****************** *
*  CODE APP START   *
* ******************/

// Report all PHP errors
error_reporting(E_ERROR);

// Path definitions
define("IMAGES", "images/");
define("INCLUDES", "includes/");
define("MODULES", "modules/");

define("CONFIG_FILE","includes/config.inc.php");

require_once 'includes/functions.php';
require_once 'includes/helpers.php';
require_once 'includes/html_functions.php';
require_once 'modules/config_games/server_config_parser.php';
require_once 'modules/gamemanager/home_handling_functions.php';
require_once 'includes/lib_remote.php';

// Start the session valid for opengamepanel_web only
startSession();

require_once CONFIG_FILE;
// Connect to the database server and select database.
$db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);
$settings = $db->getSettings();
@$GLOBALS['panel_language'] = $settings['panel_language'];

// Handle API Request
if(hasValue($_REQUEST["action"]) && hasValue($_REQUEST["homeid"]) && hasValue($_REQUEST["controlpass"]) && is_numeric($_REQUEST["homeid"])){
	
	// Get the variables we need	
	$action = $_REQUEST["action"];
	$homeId = $_REQUEST["homeid"];
	$controlPass = $_REQUEST["controlpass"];
	
	// Get home information
	$server_home = $db->getGameHome($homeId);
	
	if(hasValue($server_home) && is_array($server_home) && count($server_home) > 0){
		if(trim($server_home["control_password"]) == trim(strip_tags($controlPass))){
			
			// Set command server variables (home server XML, IPs, etc)
			$server_xml = read_server_config(SERVER_CONFIG_LOCATION . '/' . $server_home['home_cfg_file']);
			if($server_xml){
				$getIpPorts = $db->getHomeIpPorts($homeId);
				$home_ip_ports = $getIpPorts[0];
				$remote = new OGPRemoteLibrary($server_home['agent_ip'], $server_home['agent_port'], $server_home['encryption_key'], $server_home['timeout']);
				$appId = (int)$server_xml->mods->mod->installer_name;
				$mod_id = key($server_home['mods']);
				$mod_key = $server_home['mods'][$mod_id]['mod_key'];
				$mod_xml = xml_get_mod($server_xml, $mod_key);
				if($mod_xml !== false){
				
					/****************************************/
					//           Actual API Logic :)         /
					/****************************************/
					
					// Handle API Action
					switch($action){
						case "autoUpdateSteamHome":
							callSteamAutoUpdate();
							break;
						case "restartServer":
							callRestartServer();
							break;
						case "startServer":
							callStartServer();
							break;
						case "stopServer":
							callStopServer();
							break;
						default: 
							$resultOp["message"] = "Invalid action specified.";
							$resultOp["success"] = false;
					}
					
					/****************************************/
					//       End Actual API Logic :)         /
					/****************************************/
					
				}else{
					$resultOp["message"] = "Problem retrieving server mod XML.";
					$resultOp["success"] = false;
				}
			}else{
				$resultOp["message"] = "Failed to read server XML.";
				$resultOp["success"] = false;
			}
		}else{
			$resultOp["message"] = "Server home key does not match stored information.";
			$resultOp["success"] = false;
		}
	}else{
		$resultOp["message"] = "Unable to find game server home.";
		$resultOp["success"] = false;
	}
}else{
	$resultOp["message"] = "Invalid inputs.";
	$resultOp["success"] = false;
}
	
// Output JSON
if(hasValue($resultOp["message"]) && hasValue($resultOp["success"], true)){
	outPutJSON($resultOp);
}

exit();
?>
