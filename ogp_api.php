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

function runSteamAutoUpdate(){
	global $settings, $db, $remote, $server_xml, $mod_xml, $server_home, $mod_key, $mod_id, $appId, $home_ip_ports;
	
	$installer_name = isset($mod_xml->installer_name) ? $mod_xml->installer_name : $mod_key;

	$modname = $installer_name == '90' ? $mod_key : '';
	$betaname = isset($mod_xml->betaname) ? $mod_xml->betaname : '';
	$betapwd = isset($mod_xml->betapwd) ? $mod_xml->betapwd : '';
	$login = $mod_xml->installer_login ? $mod_xml->installer_login : $settings['steam_user'];
	$pass = $mod_xml->installer_login ? '' : $settings['steam_pass'];
	$exec_folder_path = $server_xml->exe_location;
	$exec_path = $server_xml->server_exec_name;

	$precmd = $server_home['mods'][$mod_id]['precmd'] == "" ? ($server_home['mods'][$mod_id]['def_precmd'] == "" ? $server_xml->pre_install : $server_home['mods'][$mod_id]['def_precmd'] ) : $server_home['mods'][$mod_id]['precmd'];
	$postcmd = $server_home['mods'][$mod_id]['postcmd'] == "" ? ($server_home['mods'][$mod_id]['def_postcmd'] == "" ? $server_xml->post_install : $server_home['mods'][$mod_id]['def_precmd'] ) : $server_home['mods'][$mod_id]['postcmd'];
	$cfg_os = preg_match('/win32|win64/', $server_xml->game_key) ? 'windows' : 'linux';
	$lockFiles = !empty($server_xml->lock_files) ? trim($server_xml->lock_files) : '';
	$preStart = !empty($server_xml->pre_start) ? trim($server_xml->pre_start) : '';
	$envVars = !empty($server_xml->environment_variables) ? trim($server_xml->environment_variables) : '';
	$startup_cmd = get_start_cmd($remote, $server_xml, $server_home, $mod_id, $home_ip_ports['ip'], $home_ip_ports['port'], $remote->what_os());
	
	// Make the update call
	$update = $remote->automatic_steam_update(
		//generic
		$homeId, $server_home['home_path'], $home_ip_ports['ip'], $home_ip_ports['port'], $exec_path, $exec_folder_path,
							 
		//stop
		$server_xml->control_protocol, $server_home['control_password'], $server_xml->control_type,

		//update
		$appId, $modname, $betaname, $betapwd, $login, $pass, $settings['steam_guard'], $precmd, $postcmd, $cfg_os, $lockFiles,
							  
		//start
		$startup_cmd, $server_home['mods'][$mod_id]['cpu_affinity'], $server_home['mods'][$mod_id]['nice'], $preStart, $envVars
	);

	if($update == 1){
		return true;
	}else if(hasValue($update, true)){
		return $update;
	}
	
	return false;
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
if(isset($_REQUEST["action"])){
	$action = $_REQUEST["action"];
	switch($action){
		case "autoUpdateSteamHome":
			$homeId = $_REQUEST["homeid"];
			$controlPass = $_REQUEST["controlpass"];
			if(hasValue($homeId) && hasValue($controlPass) && is_numeric($homeId)){
				$server_home = $db->getGameHome($homeId);
				if(hasValue($server_home) && is_array($server_home) && count($server_home) > 0){
					if(trim($server_home["control_password"]) == trim(strip_tags($controlPass))){
						// Key matches what is stored in the database.
						$home_ip_ports = $db->getHomeIpPorts($homeId)[0];
						$server_xml = read_server_config(SERVER_CONFIG_LOCATION . '/' . $server_home['home_cfg_file']);
						if($server_xml->installer == 'steamcmd') {
							$remote = new OGPRemoteLibrary($server_home['agent_ip'], $server_home['agent_port'], $server_home['encryption_key'], $server_home['timeout']);
							$appId = (int)$server_xml->mods->mod->installer_name;
							$mod_id = key($server_home['mods']);
							$mod_key = $server_home['mods'][$mod_id]['mod_key'];
							$mod_xml = xml_get_mod($server_xml, $mod_key);

							if($remote->rfile_exists($server_home['home_path'] . '/steamapps/appmanifest_' . $appId . '.acf') === 1)
							{
								if($mod_xml !== false){
									$ourVersion = $remote->installed_steam_version($server_home['home_path'], $appId, 0);
									$steamVersion = $remote->fetch_steam_version($appId, 0);
									if($ourVersion != $steamVersion){
										$success = runSteamAutoUpdate($server_xml, $mod_xml, $server_home, $mod_key);
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
									$resultOp["message"] = "Problem retrieving server mod XML.";
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
			break;
	}
	
	// Output JSON
	if(hasValue($resultOp["message"]) && hasValue($resultOp["success"], true)){
		outPutJSON($resultOp);
	}
}

exit();

?>
