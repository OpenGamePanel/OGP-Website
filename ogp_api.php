<?php
/*
______________ Token Management
ogp_api.php?token/create/{panel_user}/{panel_password}
ogp_api.php?token/test/{token}

______________ Remote Servers
ogp_api.php?server/list						(POST/GET {token})
ogp_api.php?server/status					(POST/GET {token}{remote_server_id})
ogp_api.php?server/restart					(POST/GET {token}{remote_server_id})
ogp_api.php?server/create 					(POST/GET {token}{agent_name}{agent_ip}{agent_port}{agent_user}{encryption_key}{ftp_ip}{ftp_port}{timeout}{use_nat}{display_public_ip})
ogp_api.php?server/remove 					(POST/GET {token}{remote_server_id})
ogp_api.php?server/add_ip					(POST/GET {token}{remote_server_id}{ip})
ogp_api.php?server/remove_ip				(POST/GET {token}{remote_server_id}{ip})
ogp_api.php?server/list_ips					(POST/GET {token}{remote_server_id})
ogp_api.php?server/edit_ip					(POST/GET {token}{remote_server_id}{old_ip}{new_ip})

______________ Game Servers
ogp_api.php?user_games/list_games			(POST/GET {token}{system(windows|linux)}{architecture(32|64)})
ogp_api.php?user_games/list_servers			(POST/GET {token})
ogp_api.php?user_games/create 				(POST/GET {token}{remote_server_id}{server_name}{home_cfg_id}{mod_cfg_id}{ip}{port}{control_password}{enable_ftp}{ftp_password}{slots}{affinity}{nice})
ogp_api.php?user_games/clone 				(POST/GET {token}{origin_home_id}{new_server_name}{new_ip}{new_port}{control_password}{enable_ftp}{ftp_password}{slots}{affinity}{nice})
ogp_api.php?user_games/set_expiration 		(POST/GET {token}{home_id}{timestamp})

______________ Users
ogp_api.php?user_admin/list 				(POST/GET {token})
ogp_api.php?user_admin/get		 			(POST/GET {token}{email})
ogp_api.php?user_admin/create 				(POST/GET {token}{email}{name}{password})
ogp_api.php?user_admin/remove 				(POST/GET {token}{email})
ogp_api.php?user_admin/set_expiration 		(POST/GET {token}{email}{timestamp})
ogp_api.php?user_admin/list_assigned		(POST/GET {token}{email})
ogp_api.php?user_admin/assign 				(POST/GET {token}{email}{home_id}{timestamp})
ogp_api.php?user_admin/remove_assign 		(POST/GET {token}{email}{home_id})

______________ Game Manager
ogp_api.php?gamemanager/start 				(POST/GET {token}{ip}{port}{mod_key})
ogp_api.php?gamemanager/stop 				(POST/GET {token}{ip}{port}{mod_key})
ogp_api.php?gamemanager/restart 			(POST/GET {token}{ip}{port}{mod_key})
ogp_api.php?gamemanager/rcon 				(POST/GET {token}{ip}{port}{mod_key}{command})
ogp_api.php?gamemanager/update 				(POST/GET {token}{ip}{port}{mod_key}{type}{manual_url})

______________ Lite File Manager
ogp_api.php?litefm/list 					(POST/GET {token}{ip}{port}{relative_path})
ogp_api.php?litefm/get 						(POST/GET {token}{ip}{port}{relative_path})
ogp_api.php?litefm/save 					(POST/GET {token}{ip}{port}{relative_path}{contents})
ogp_api.php?litefm/remove 					(POST/GET {token}{ip}{port}{relative_path})

______________ Addons Manager
ogp_api.php?addonsmanager/list				(POST/GET {token})
ogp_api.php?addonsmanager/install			(POST/GET {token}{ip}{port}{mod_key}{addon_id})

______________ Steam Workshop
ogp_api.php?steam_workshop/install 			(POST/GET {token}{ip}{port}{mods_list})

*/
$main_request = key($_GET);
$request = explode('/', $main_request);
unset($_GET["$main_request"]);
if(!empty($_GET))
	$_POST = array_merge($_POST,$_GET);
//Retirieve the function name
$function = 'api_'.$request[0];
//Remove the main function from the request
array_splice($request, 0, 1);

if(function_exists($function))
{
	// Report only critical PHP errors
	error_reporting(E_ERROR);
	
	// Path definitions
	define("INCLUDES", "includes/");
	define("MODULES", "modules/");
	
	// require needed functions
	require_once INCLUDES.'functions.php';
	require_once INCLUDES.'helpers.php';
	require_once INCLUDES.'html_functions.php';
	require_once INCLUDES.'lib_remote.php';
	require_once INCLUDES.'config.inc.php';
	require_once MODULES.'config_games/server_config_parser.php';
	require_once INCLUDES.'api_functions.php';
	
	// API tokens table
	define("API_TABLE", $table_prefix."api_tokens");
	// Connect to the database server and select database.
	$db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);
	$settings = $db->getSettings();
	
	if(!is_authorized())
		outputJSON(array("status" => '401', "message" => 'Unauthorized host'));
	
	$db->checkApiTable();
	$logged_in = false;
	
	if($function != 'api_token')
	{
		if(isset($_POST['token']))
		{
			$token = $_POST['token'];
			$query = "SELECT user_id FROM ".API_TABLE." WHERE `token` = '".$db->real_escape_string($token)."';";
			$result = $db->resultQuery($query);
			if(isset($result[0]['user_id']))
			{
				$user_info = $db->getUserById($result[0]['user_id']);
				if(isset($user_info['users_login']))
					$logged_in = true;
			}
		}
		else
		{
			outputJSON(array("status" => "300", "message" => "No token supplied"));
		}
	}
	
	if($logged_in or $function == 'api_token')
	{
		//call the function and output the returned data as json
		$func_req = str_replace('api_','',$function)."/".$request[0];
		if($main_request == "all")
			outputJSON(array("status" => "400", "message" => "BAD REQUEST"));
		else
			$function_args = get_function_args("$func_req");
		
		if(!$function_args)
			outputJSON(array("status" => "400", "message" => "BAD REQUEST"));
		elseif(!(($func_req == "token/test" and isset($request[1])) OR ($func_req == "token/create" and isset($request[1]) and isset($request[2]))))
		{
			foreach($function_args as $arg => $mandatory)
			{
				if($mandatory and !isset($_POST["$arg"]))
				{
					outputJSON(array("status" => "400", "message" => "BAD REQUEST", "fields_supplied" => $_POST, "fields_required" => $function_args));
					break;
				}
			}
		}
		outputJSON($function());
	}
	else
	{
		outputJSON(array("status" => "301", "message" => "Invalid Token"));
	}
}
else
{
	outputJSON(array("status" => "400", "message" => "BAD REQUEST"));
}

function outputJSON($result){	
	// Send JSON output
	header('Content-Type: application/json');
	echo json_encode($result);
	exit();
}

function isValidTimeStamp($timestamp)//https://stackoverflow.com/questions/2524680/check-whether-the-string-is-a-unix-timestamp
{
    if(is_numeric($timestamp) and strtotime(date('d-m-Y H:i:s',$timestamp)) === (int)$timestamp)
        return true;
	return false;
}

function api_token()
{
	global $request, $db;
	if($request[0] == "test")
	{
		$token = isset($request[1])?$request[1]:$_POST['token'];
		$query = "SELECT user_id FROM ".API_TABLE." WHERE `token` = '".$db->real_escape_string($token)."';";
		$result = $db->resultQuery($query);
		if(isset($result[0]['user_id']))
		{
			$user_info = $db->getUserById($result[0]['user_id']);
			if(isset($user_info['users_login']))
			{
				$status = "200";
				$message = $user_info['users_role'];
			}
			else
			{
				$status = "400";
				$message = "Invalid Token";
			}
		}
		else
		{
			$status = "400";
			$message = "Invalid Token";
		}
	}
	
	if($request[0] == "create")
	{
		$user = isset($request[1])?urldecode($request[1]):$_POST['user'];
		$password = isset($request[2])?urldecode($request[2]):$_POST['password'];
		
		$userInfo = $db->getUser($user);
		
		if(isset($userInfo['users_passwd']) && md5($password) == $userInfo['users_passwd'])
		{
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			$old_token = $db->currentApiToken($userInfo['user_id']);
			// Update cronjob passwords in the URLs
			if($old_token and file_exists('modules/cron/shared_cron_functions.php')){
				require_once('modules/cron/shared_cron_functions.php');
				updateCronJobTokens($old_token, $token);
			}
			$query ="INSERT INTO ".API_TABLE.
					" (user_id, token)".
					" VALUES".
					" ('".$userInfo['user_id']."', '".$db->realEscapeSingle($token)."')".
					" ON DUPLICATE KEY UPDATE".
					" user_id = VALUES(user_id),".
					" token = VALUES(token);";
			if($db->query($query))
			{
				$status = "200";
				$message = $token;
			}
			else
			{
				$status = "500";
				$message = "database failure";
			}
		}
		else
		{
			$status = "400";
			$message = "Invalid login information";
		}
	}
	return array("status" => $status, "message" => $message);
}

function api_server()
{
	global $request, $db, $user_info, $settings;
	
	if($user_info['users_role'] != "admin")
		return array("status" => '350', "message" => "This function is restricted to administrator accounts.");
	
	if($request[0] == "list")
	{
		$status = "200";
		$message = $db->getRemoteServers();
	}
	
	if($request[0] == "status")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$remote_server = $db->getRemoteServer($remote_server_id);
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
		$status = "200";
		$message = $remote->status_chk() == 1?'online':'offline';
	}
	
	if($request[0] == "restart")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$remote_server = $db->getRemoteServer($remote_server_id);
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
		$remote->agent_restart();
		$status = "200";
		$message = "success";
	}
	
	if($request[0] == "create")
	{
		$agent_name = $_POST['agent_name'];
		$agent_ip = $_POST['agent_ip'];
		$agent_port = $_POST['agent_port'];
		$agent_user = $_POST['agent_user'];
		$encryption_key = $_POST['encryption_key'];
		$ftp_ip = $_POST['ftp_ip'];
		$ftp_port = $_POST['ftp_port'];
		$timeout = $_POST['timeout'];
		$use_nat = $_POST['use_nat'];
		$display_public_ip = $_POST['display_public_ip'];
		
		$remote_server_id = $db->addRemoteServer($agent_ip,$agent_name,$agent_user,$agent_port,$ftp_ip,$ftp_port,$encryption_key,$timeout,$use_nat,$display_public_ip);
		
		$status = "200";
		$message = $remote_server_id;
	}
	
	if($request[0] == "remove")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$status = "200";
		$message = $db->removeRemoteServer($remote_server_id);
	}
	
	if($request[0] == "add_ip")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$ip = $_POST['ip'];
		$status = "200";
		$message = $db->addRemoteServerIP($remote_server_id, $ip);
	}
	
	if($request[0] == "remove_ip")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$ip = $_POST['ip'];
		$ip_infos = $db->getRemoteServerIPs($remote_server_id);
		foreach($ip_infos as $ip_info)
		{
			if($ip_info['ip'] == $ip)
			{
				$message = $db->removeRemoteServerIPs($ip_info['ip_id']);
				break;
			}
		}
		$status = "200";
	}
	
	if($request[0] == "list_ips")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$message = $db->getRemoteServerIPs($remote_server_id);
		$status = "200";
	}
	
	if($request[0] == "edit_ip")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$old_ip = $_POST['old_ip'];
		$new_ip = $_POST['new_ip'];
		$ip_infos = $db->getRemoteServerIPs($remote_server_id);
		foreach($ip_infos as $ip_info)
		{
			if($ip_info['ip'] == $old_ip)
			{
				$message = $db->editRemoteServerIPs($ip_info['ip_id'], $new_ip);
				break;
			}
		}
		$status = "200";
	}
	
	return array("status" => $status, "message" => $message);
}

function api_user_games()
{
	global $request, $db, $user_info, $settings;
	
	if($user_info['users_role'] != "admin")
		return array("status" => '350', "message" => "This function is restricted to administrator accounts.");
		
	if($request[0] == "list_games")
	{
		$system = strtolower($_POST['system']);
		if(!preg_match('/^(linux|windows)$/', $system))
		{
			$status = "302";
			$message = "list games: Incorrect system, valid options: windows, linux";
			return array("status" => $status, "message" => $message);
		}
		$architecture = strtolower($_POST['architecture']);
		if(!preg_match('/^(32|64)$/', $architecture))
		{
			$status = "303";
			$message = "list games: Incorrect architecture, valid options: 32, 64";
			return array("status" => $status, "message" => $message);
		}
		$games = $db->getGameCfgs();
		foreach($games as $key => $game)
		{
			$games[$key]['mods'] = $db->getCfgMods($game['home_cfg_id']);
			preg_match("/^([a-z0-9_-]+)_(linux|win)(32|64)?$/i",$game['game_key'],$matches);
			
			if(count($matches) == 4)
				list($game_key, $game_clean, $os, $arch) = $matches;
			else
			{
				list($game_key, $game_clean, $os) = $matches;
				$arch = "32";
			}
			if(strtolower($os) == 'linux')
				$sorted_games['linux'][$arch][] = $games[$key];
			elseif(strtolower($os) == 'win')
				$sorted_games['windows'][$arch][] = $games[$key];
		}
		$status = "200";
		$message = $sorted_games[$system][$architecture];
	}
	
	if($request[0] == "list_servers")
	{	
		$status = "200";
		$message = $db->getGameHomes();
	}
	
	if($request[0] == "create")
	{
		$remote_server_id = $_POST['remote_server_id'];
		$server_name = $_POST['server_name'];
		$home_cfg_id = $_POST['home_cfg_id'];
		$mod_cfg_id = $_POST['mod_cfg_id'];
		$ip = $_POST['ip'];
		$port = $_POST['port'];
		$control_password = $_POST['control_password'];
		$enable_ftp = $_POST['enable_ftp'];
		$ftp_password = $_POST['ftp_password'];
		$slots = $_POST['slots'];
		$affinity = $_POST['affinity'];
		$nice = $_POST['nice'];
		
		$remote_server = $db->getRemoteServer($remote_server_id);
		if($remote_server === FALSE)
			return array("status" => '304', "message" => "Remote Server ID#$remote_server_id does not exists");
		
		$game_cfg = $db->getGameCfg($home_cfg_id);
		if($game_cfg === FALSE)
			return array("status" => '305', "message" => "No game configuration found for home_cfg_id #" . $home_cfg_id . ".");
		
		$cfg_mods = $db->getCfgMods($home_cfg_id);
		$mod_key = FALSE;
		if($cfg_mods === FALSE)
			return array("status" => '306', "message" => "No game mods found for home_cfg_id #" . $home_cfg_id . ".");
		else
		{
			foreach($cfg_mods as $cfg_mod)
			{
				if($cfg_mod['mod_cfg_id'] == $mod_cfg_id)
				{
					$mod_key = $cfg_mod['mod_key'];
					break;
				}
			}
		}
		
		if($mod_key === FALSE)
			return array("status" => '307', "message" => "The mod_cfg_id #" . $mod_cfg_id . " does not belong to the game configuration for home_cfg_id #" . $home_cfg_id . ".");
		
		$ip_info = $db->resultQuery( "SELECT ip,ip_id FROM OGP_DB_PREFIXremote_server_ips WHERE ip='".$db->real_escape_string($ip)."' AND remote_server_id=".$db->real_escape_string($remote_server_id));
		if($ip_info === FALSE)
			return array("status" => '308', "message" => "The given IP address does not belongs to the given remote server.");
		
		$port = (int)(trim($port));
		if(!isPortValid($port))
			return array("status" => '309', "message" => "The given port is not a valid port.");
		
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
		$host_stat = $remote->status_chk();
		if($host_stat !== 1)
			return array("status" => '310', "message" => "The remote server is offline.");
		
		// Game path logic	
		$skipId = false;
		if(hasValue($settings["default_game_server_home_path_prefix"]))
		{
			// Replace some user supported variables with actual value.
			$game_path = str_replace("{USERNAME}", $user_info['users_login'], $settings["default_game_server_home_path_prefix"]);
			if(stripos($game_path, "{SKIPID}") !== false){
				$game_path = str_replace("{SKIPID}", "",  $game_path);
				$skipId = true;
			}
			$game_path = str_replace("{GAMEKEY}", strtolower(substr($game_cfg['game_key'], 0, stripos($game_cfg['game_key'], "_"))), $game_path);
			// Make sure the path ends with forward slash
			if($game_path[strlen($game_path)-1] != "/"){ 
				$game_path .= "/";
			}
		}
		else
			$game_path = "/home/".$remote_server['ogp_user']."/OGP_User_Files/"; // Default
		
		$game_path = clean_path($game_path); // Clean it
		
		$home_id = $db->addGameHome($remote_server_id, $user_info['user_id'], $home_cfg_id, $game_path, $server_name, $control_password, $ftp_password, $skipId);
		if($home_id === FALSE)
			return array("status" => '311', "message" => "Server could not be added to the database.");
		
		if($db->addGameIpPort($home_id, $ip_info[0]['ip_id'], $port) === FALSE)
		{
			$db->deleteGameHome($home_id);
			return array("status" => '312', "message" => "The given IP:Port is already in use.");
		}
		
		if($db->addModToGameHome($home_id, $mod_cfg_id) === FALSE )
		{
			$db->deleteGameHome($home_id);
			return array("status" => '313', "message" => "Failed to assing mod.");
		}
		
		if($db->updateGameModParams($slots, '', $affinity, $nice, $home_id, $mod_cfg_id) === FALSE)
		{
			$db->deleteGameHome($home_id);
			return array("status" => '314', "message" => "Maxplayers, affinity or nice could not be configured.");
		}
				
		// Create new home directory if it doesn't already exist	
		$game_path = $game_path . (!$skipId ? $home_id : "");
		$remote->exec("mkdir -p " . $game_path);
		
		if($enable_ftp == "1")
		{
			$remote->ftp_mgr("useradd", $home_id, $ftp_password, $game_path);
			$db->changeFtpStatus('enabled',$home_id);
		}
		
		$status = "200";
		$message = $home_id;
	}
	
	if($request[0] == "clone")
	{
		$home_id = $_POST['origin_home_id'];
		$server_name = $_POST['new_server_name'];
		$ip = $_POST['new_ip'];
		$port = $_POST['new_port'];
		$control_password = $_POST['control_password'];
		$enable_ftp = $_POST['enable_ftp'];
		$ftp_password = $_POST['ftp_password'];
		$slots = $_POST['slots'];
		$affinity = $_POST['affinity'];
		$nice = $_POST['nice'];
				
		$game_home = $db->getGameHome($home_id);
		if($game_home === FALSE)
			return array("status" => '315', "message" => "There is no game home with home_id #" . $home_id . ".");
		
		$remote = new OGPRemoteLibrary($game_home['agent_ip'],$game_home['agent_port'],$game_home['encryption_key'],$game_home['timeout']);
		$host_stat = $remote->status_chk();
		if($host_stat !== 1)
			return array("status" => '310', "message" => "The remote server is offline.");
		
		$ip_info = $db->resultQuery("SELECT ip,ip_id FROM OGP_DB_PREFIXremote_server_ips WHERE ip='".$db->real_escape_string($ip)."' AND remote_server_id=".$db->real_escape_string($game_home['remote_server_id']));
		if($ip_info === FALSE)
			return array("status" => '308', "message" => "The given IP address does not belongs to the given remote server.");
		
		$port = (int)(trim($port));
		if(!isPortValid($port))
			return array("status" => '309', "message" => "The given port is not a valid port.");
		
		// Game path logic
		$skipId = false;
		if(hasValue($settings["default_game_server_home_path_prefix"]))
		{
			// Replace some user supported variables with actual value.
			$game_path = str_replace("{USERNAME}", $user_info['users_login'], $settings["default_game_server_home_path_prefix"]);
			if(stripos($game_path, "{SKIPID}") !== false){
				$game_path = str_replace("{SKIPID}", "",  $game_path);
				$skipId = true;
			}
			$game_path = str_replace("{GAMEKEY}", strtolower(substr($game_home['game_key'], 0, stripos($game_home['game_key'], "_"))), $game_path);
			// Make sure the path ends with forward slash
			if($game_path[strlen($game_path)-1] != "/"){ 
				$game_path .= "/";
			}
		}
		else
			$game_path = "/home/".$game_home['ogp_user']."/OGP_User_Files/"; // Default
		
		$game_path = clean_path($game_path); // Clean it
		
		$clone_home_id = $db->addGameHome($game_home['remote_server_id'], $game_home['user_id_main'],
			$game_home['home_cfg_id'], $game_path, $server_name, $control_password, $ftp_password, $skipId);
		
		if ($clone_home_id === FALSE)
			return array("status" => '311', "message" => "Server could not be added to the database.");
		
		if($db->addGameIpPort($clone_home_id, $ip_info[0]['ip_id'], $port) === FALSE)
		{
			$db->deleteGameHome($clone_home_id);
			return array("status" => '312', "message" => "The given IP:Port is already in use.");
		}
		
		foreach ($game_home['mods'] as $mod_info)
			if($db->addModToGameHome($clone_home_id, $mod_info['mod_cfg_id']) !== FALSE)
				$db->updateGameModParams($slots, $mod_info['extra_params'], $affinity, $nice, $clone_home_id, $mod_info['mod_cfg_id']);
		
		// Create new home directory if it doesn't already exist	
		$game_path = $game_path . (!$skipId ? $clone_home_id : "");
		$remote->exec("mkdir -p " . $game_path);
		
		if($enable_ftp == "1")
		{
			$remote->ftp_mgr("useradd", $clone_home_id, $ftp_password, $game_path);
			$db->changeFtpStatus('enabled', $clone_home_id);
		}
		
		$user_group = get_user_uid_gid_from_passwd(explode("\n", $remote->sudo_exec('cat /etc/passwd')), $game_home['ogp_user']);
		
		$status = "200";
		$message = array("clone_home_id" => $clone_home_id, "cloning_status" => $remote->clone_home($game_home['home_path'], $game_path, $user_group));
	}
	
	if($request[0] == "set_expiration")
	{
		$home_id = $_POST['home_id'];
		$date = date('d/m/Y H:i:s', $_POST['timestamp']);
		
		if($db->updateExpirationDate($home_id, $date, 'server') === TRUE)
		{
			$status = "200";
			$message = "Expiration date changed";
		}
		else
		{
			$status = "316";
			$message = "Expiration date could not be changed";
		}
	}
	
	return array("status" => $status, "message" => $message);
}

function api_user_admin()
{
	global $request, $db, $user_info, $settings;
	
	if($user_info['users_role'] != "admin")
		return array("status" => '350', "message" => "This function is restricted to administrator accounts.");
		
	if($request[0] == "list")
	{
		$status = "200";
		$message = $db->getUserList();
	}
	
	if($request[0] == "get")
	{
		$email = $_POST['email'];
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "317";
			$message = "There is no account with the given email address.";
		}
		else
		{
			$status = "200";
			$message = $account;
		}
	}	
	
	if($request[0] == "create")
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($db->addUser($name,$password,'user',$email) === FALSE)
		{
			$status = "318";
			$message = "Failed to create account, name or email already in use.";
		}
		else
		{
			$status = "200";
			$message = "Account created";
		}
	}
	
	if($request[0] == "remove")
	{
		$email = $_POST['email'];
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "319";
			$message = "Failed to remove account, there is no account with the given email address ($email).";
		}
		else
		{
			$db->delUser($account['user_id']);
			$status = "200";
			$message = "Account removed successfully";
		}
	}
	
	if($request[0] == "set_expiration")
	{
		$email = $_POST['email'];
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "319";
			$message = "There is no account with the given email address ($email).";
		}
		else
		{
			$date = (strtoupper($_POST['timestamp']) == 'X' or $_POST['timestamp'] == '') ? 'X': $date;
			
			if($date != 'X' and !isValidTimeStamp($_POST['timestamp']))
			{
				$status = "321";
				$message = "The given timestamp is not valid";
			}
			else
			{
				if($date != 'X')
					$date = $_POST['timestamp'];
				
				$account['user_expires'] = $date;
				if ($db->editUser($account, $account['user_id']) == FALSE)
				{
					$status = "316";
					$message = "Expiration date could not be changed";
				}
				else
				{
					$status = "200";
					$message = "Expiration date changed";
				}
			}
		}
	}
	
	if($request[0] == "list_assigned")
	{
		$email = $_POST['email'];
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "319";
			$message = "There is no account with the given email address ($email).";
		}
		else
		{
			$game_homes = $db->getHomesFor('user',$account['user_id']);

			if(empty($game_homes))
			{
				$status = "323";
				$message = "There are no game homes assigned for the given user.";
			}
			else
			{
				$status = "200";
				$message = $game_homes;
			}
		}
	}	
	
	if($request[0] == "assign")
	{
		$email = $_POST['email'];
		$home_id = $_POST['home_id'];
		$access_rights = strtolower($_POST['access_rights']);
		
		$game_home = $db->getGameHome($home_id);
		if($game_home === FALSE)
			return array("status" => '315', "message" => "There is no game home with home_id #" . $home_id . ".");
		
		if(!preg_match("/^u?f?p?e?t?c?$/", $access_rights))
			return array("status" => "324", "message" => "Ivalid string for access rights");
		
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "319";
			$message = "There is no account with the given email address ($email).";
		}
		else
		{
			$date = (strtoupper($_POST['timestamp']) == 'X' or $_POST['timestamp'] == '') ? 'X': $date;
			
			if($date != 'X' and !isValidTimeStamp($_POST['timestamp']))
			{
				$status = "321";
				$message = "The given timestamp is not valid";
			}
			else
			{
				if($date != 'X')
					$date = date('d/m/Y H:i:s', $_POST['timestamp']);
				
				if ( $db->assignHomeTo('user', $account['user_id'], $home_id, $access_rights) === TRUE )
				{
					$db->updateExpirationDate($game_home['home_id'], $date, 'user', $account['user_id']);
					$status = "200";
					$message = "Home assigned successfully";
				}
				else
				{
					$status = "325";
					$message = "Home id#$home_id could not be assigned to $email.";
				}
			}
		}
	}
	
	if($request[0] == "remove_assign")
	{
		$email = $_POST['email'];
		$home_id = $_POST['home_id'];
		
		$game_home = $db->getGameHome($home_id);
		if($game_home === FALSE)
			return array("status" => '315', "message" => "There is no game home with home_id #" . $home_id . ".");
		
		$account = $db->getUserByEmail($email);
		if($account === FALSE)
		{
			$status = "319";
			$message = "There is no account with the given email address ($email).";
		}
		else
		{
			if ($db->unassignHomeFrom("user",$account['user_id'],$game_home['home_id']) === TRUE)
			{
				$status = "200";
				$message = "Home id#$game_home[home_id] has been unnassigned from $email successfully.";
			}
			else
			{
				$status = "326";
				$message = "Home id#$home_id was not assigned to $email.";
			}
		}
	}
	
	return array("status" => $status, "message" => $message);
}

function api_gamemanager_admin()
{
	global $request, $db, $user_info, $settings;
	
	$isAdmin = $db->isAdmin($user_info['user_id']);
	
	if($request[0] == "reorder")
	{
		if($isAdmin){
			$data = json_decode(file_get_contents('php://input'), true);
			if(array_key_exists("order", $data) && is_array($data["order"])){
				$updatedOrder = $db->saveGameServerOrder($data["order"]);
				if($updatedOrder){
					$status = "200";
					$message = "Game server order was successfully saved.";
				}else{
					$status = "335";
					$message = "Game server order was NOT saved.";
				}
			}else{
				$status = "335";
				$message = "Invalid inputs.";
			}
		}else{
			$status = "335";
			$message = "Only admin users can save the game server display order.";
		}
	}
	
	return array("status" => $status, "message" => $message);
}

function api_gamemanager()
{
	global $request, $db, $user_info, $settings;
	
	$ip = trim($_POST['ip']);
	$port = (int) trim($_POST['port']);
	$mod_key = isset($_POST['mod_key'])?trim($_POST['mod_key']):'';
	
	if(!isPortValid($port))
		return array("status" => '309', "message" => "The given port is not a valid port.");
	if(!preg_match("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/",$ip))
		return array("status" => '327', "message" => "The given IP ($ip) is not a valid IP address.");
	
	$home_info = $db->getGameHomeByIP($ip, $port);
	if($home_info === FALSE)
		return array("status" => '328', "message" => "There is no game server with the given address ($ip:$port).");
	
	$mod_id = key($home_info['mods']);
	
	if($mod_key != '')
	{
		foreach($home_info['mods'] as $home_mod)
		{
			if($mod_key == $home_mod['mod_key'])
			{
				$mod_id = $home_mod['mod_id'];
				break;
			}
		}
	}
	
	$isAdmin = $db->isAdmin($user_info['user_id']);
	
	if($isAdmin)
	{
		$access_rights = 'ufpetc';
	}
	else
	{
		$game_home = $db->getUserGameHome($user_info['user_id'], $home_info['home_id']);
		if($game_home === FALSE)
			return array("status" => '329', "message" => "The given address ($ip:$port) does not belong to your account.");
		$access_rights = $game_home['access_rights'];
	}
	
    $server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

    if($server_xml === FALSE)
		return array("status" => '305', "message" => "No game configuration found for home_cfg_id #" . $home_cfg_id . ".");
	
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
	$host_stat = $remote->status_chk();
	if($host_stat !== 1)
		return array("status" => '310', "message" => "The remote server is offline.");
	
	$os = $remote->what_os();
	
	if($request[0] == "start")
	{
		$start_cmd = get_start_cmd($user_info,$remote,$server_xml,$home_info,$mod_id,$ip,$port,$db);
		
		if(isset($server_xml->lgsl_query_name))
			require_once('protocol/lgsl/lgsl_protocol.php');
		
		// Do text replacements in cfg file
		if($server_xml->replace_texts)
		{
			foreach($home_info['mods'][$mod_id] as $key => $value)
			{
				$home_info[$key] = $value;
			}
			$server_home = $home_info;
			require_once(MODULES."gamemanager/cfg_text_replace.php");
		}
		
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
		
		$start_retval = $remote->universal_start($home_info['home_id'],
												 $home_info['home_path'],
												 $server_xml->server_exec_name, 
												 $server_xml->exe_location,
												 $start_cmd, $port, $ip,
												 $home_info['mods'][$mod_id]['cpu_affinity'],
												 $home_info['mods'][$mod_id]['nice'],
												 $preStart,
												 $envVars,
												 $server_xml->game_key,
												 (isset( $server_xml->console_log ) ? $server_xml->console_log : "")
												 );
		
		if( $start_retval == AGENT_ERROR_NOT_EXECUTABLE)
			return array("status" => '330', "message" => "The server executable does not have execution permission.");
		elseif($start_retval <= 0)
			return array("status" => '331', "message" => "The server could not be started, already running.");
		else
		{
			$firewall_settings = $db->getFirewallSettings($home_info['remote_server_id']);
			if ($firewall_settings['status'] == "enable")
			{
				if ($server_xml->protocol == "gameq")
				{
					$query_port = get_query_port($server_xml, $port);
				}
				elseif ($server_xml->protocol == "lgsl")
				{
					$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
					$query_port = $get_ports['1'];
				}
				elseif ($server_xml->protocol == "teamspeak3")
				{
					$query_port = $port + 24;
				}
				set_firewall($remote, $firewall_settings, 'allow', $port, $ip);
				if(isset($query_port) and $query_port != "" and $query_port != $port)
					set_firewall($remote, $firewall_settings, 'allow', $query_port, $ip);
			}
			
			$db->delServerStatusCache($home_info['ip_id'],$port);
			$status = "200";
			$message = "The server has been started.";
		}
	}

	if($request[0] == "stop")
	{
		$remote_retval = $remote->remote_stop_server($home_info['home_id'],
			$ip, $port, $server_xml->control_protocol,
			$home_info['control_password'],$server_xml->control_protocol_type, $home_info['home_path']);
		
		if($remote_retval === -1)
			return array("status" => '332', "message" => "The server could not be stopped.");
		elseif($remote_retval === -2)
			return array("status" => '332', "message" => "The server could not be stopped.");
		else
		{
			$firewall_settings = $db->getFirewallSettings($home_info['remote_server_id']);
			if ($firewall_settings['status'] == "enable")
			{
				if ($server_xml->protocol == "gameq")
				{
					$query_port = get_query_port($server_xml, $port);
				}
				elseif ($server_xml->protocol == "lgsl")
				{
					require('protocol/lgsl/lgsl_protocol.php');
					$get_ports = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
					$query_port = $get_ports['1'];
				}
				elseif ($server_xml->protocol == "teamspeak3")
				{
					$query_port = $port + 24;
				}
				set_firewall($remote, $firewall_settings, 'deny', $port, $ip);
				if(isset($query_port) and $query_port != "" and $query_port != $port)
					set_firewall($remote, $firewall_settings, 'deny', $query_port, $ip);
			}
			$status = "200";
			$message = "The server has been stopped.";
		}
	}

	if($request[0] == "restart")
	{
		$start_cmd = get_start_cmd($user_info,$remote,$server_xml,$home_info,$mod_id,$ip,$port,$db);
		// Do text replacements in cfg file
		if( $server_xml->replace_texts )
		{
			foreach($home_info['mods'][$mod_id] as $key => $value)
			{
				$home_info[$key] = $value;
			}
			$server_home = $home_info;
			if(isset($server_xml->lgsl_query_name))
				require_once('protocol/lgsl/lgsl_protocol.php');
			require_once(MODULES."gamemanager/cfg_text_replace.php");
		}
		
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
		
		$remote_retval = $remote->remote_restart_server($home_info['home_id'],$ip,$port,$server_xml->control_protocol,
														$home_info['control_password'],$server_xml->control_protocol_type,$home_info['home_path'],
														$server_xml->server_exec_name,$server_xml->exe_location,$start_cmd,
														$home_info['mods'][$mod_id]['cpu_affinity'],
														$home_info['mods'][$mod_id]['nice'],
														$preStart,
														$envVars,
														$server_xml->game_key, 
														(isset( $server_xml->console_log ) ? $server_xml->console_log : ""));
		
		if($remote_retval === -1)
			return array("status" => '333', "message" => "The server could not be restarted.");
		elseif($remote_retval === -2)
			return array("status" => '333', "message" => "The server could not be restarted.");
		else
		{
			$ip_id = $db->getIpIdByIp($ip);
			$db->delServerStatusCache($home_info['ip_id'],$port);
			$status = "200";
			$message = "The server has been restarted.";
		}
	}

	if($request[0] == "rcon")
	{
		$command = $_POST['command'];
		$response = send_rcon_command($command, $remote, $server_xml, $home_info, $home_info['home_id'], $ip, $port);
		if($response === FALSE)
		{
			$status = "334";
			$message = "The command could not be sent";
		}
		else
		{
			$status = "200";
			$message = $response;
		}
	}
	
	if($request[0] == "update")
	{
		if(!strstr($access_rights,'u'))
			return array("status" => '352', "message" => "You don't have access right to update the server at $ip:$port.");
		if($_POST['type'] == "steam")
		{
			if($server_xml->installer == "steamcmd")
			{
				$exec_folder_path = clean_path($home_info['home_path'] . "/" . $server_xml->exe_location);
				$exec_path = clean_path($exec_folder_path . "/" . $server_xml->server_exec_name);
				$mod_xml = xml_get_mod($server_xml, $home_info['mods'][$mod_id]['mod_key']);
				$installer_name = $mod_xml->installer_name;
				$modkey = $home_info['mods'][$mod_id]['mod_key'];
				// Some games like L4D2 require anonymous login
				if($mod_xml->installer_login){
					$login = $mod_xml->installer_login;
					$pass = '';
				}else{
					$login = $settings['steam_user'];
					$pass = $settings['steam_pass'];
				}
				$modname = ( $installer_name == '90' and !preg_match("/(cstrike|valve)/", $modkey) ) ? $modkey : '';
				$betaname = isset($mod_xml->betaname) ? $mod_xml->betaname : '';
				$betapwd = isset($mod_xml->betapwd) ? $mod_xml->betapwd : '';
				preg_match("/(win|linux)(32|64)?$/", $server_xml->game_key, $matches);
				$os = strtolower($matches[1]) == 'linux'? 'linux':'windows';
				$arch = isset($matches[2])?$matches[2]:'32';
				
				$preInstallCMD = "";
				if(isset($server_xml->post_install))
					$preInstallCMD .= $server_xml->pre_install;
				
				$postInstallCMD = "";
				if(isset($server_xml->post_install))
					$postInstallCMD .= $server_xml->post_install;
				$postInstallCMD .= "\n{OGP_LOCK_FILE} " . $home_info['home_path'] . "/" . ($server_xml->exe_location ? $server_xml->exe_location . "/" : "") . $server_xml->server_exec_name;
				
				$remote->steam_cmd($home_info['home_id'],$home_info['home_path'],$installer_name,$modname,
								   $betaname,$betapwd,$login,$pass,$settings['steam_guard'],
								   $exec_folder_path,$exec_path,$preInstallCMD,$postInstallCMD,$os,'',$arch);
				$status = "200";
				$message = "Steam installation started";
			}
			else
			{
				$status = "335";
				$message = 'This game is not supported by Steam installation.';
			}
		}
		
		if($_POST['type'] == "rsync")
		{
			if(isset($server_xml->lgsl_query_name))
			{
				$rs_name = $server_xml->lgsl_query_name;
				if($rs_name == "quake3" and $server_xml->game_name == "Quake 3")
					$rs_name = "q3";
			}
			elseif(isset($server_xml->gameq_query_name))
			{
				$rs_name = $server_xml->gameq_query_name;
				if($rs_name == "minecraft")
				{
					if($server_xml->game_name == "Minecraft Tekkit")
						$rs_name = "tekkit";
					elseif($server_xml->game_name == "Minecraft Bukkit")
						$rs_name = "bukkit";
				}
			}
			elseif(isset($server_xml->protocol))
				$rs_name = $server_xml->protocol;
			else
				$rs_name = $server_xml->mods->mod['key'];
			
						
			$rsync_available = isset($settings['rsync_available']) ? $settings['rsync_available'] : "1";
			$remote_sites = MODULES."gamemanager/rsync_sites.list";
			$local_sites = MODULES."gamemanager/rsync_sites_local.list";
			$rsync_sites = array();
			
			switch ($rsync_available) {
				case "0":
					if(file_exists($remote_sites))
					{
						$sites = file($remote_sites);
						if($sites !== FALSE)
							$rsync_sites = array_merge($rsync_sites, $sites);
					}
					
					if(file_exists($local_sites))
					{
						$sites = file($local_sites);
						if($sites !== FALSE)
							$rsync_sites = array_merge($rsync_sites, $sites);
					}
					break;
				case "1":
					if(file_exists($remote_sites))
					{
						$sites = file($remote_sites);
						if($sites !== FALSE)
							$rsync_sites = array_merge($rsync_sites, $sites);
					}
					break;
				case "2":
					if(file_exists($local_sites))
					{
						$sites = file($local_sites);
						if($sites !== FALSE)
							$rsync_sites = array_merge($rsync_sites, $sites);
					}
					break;
			}
			
			if(empty($rsync_sites))
				return array("status" => '336', "message" => "No sync sites found, check the panel settings (Available rsync sites).");
			
			$url = get_faster_rsync($rsync_sites);
			
			$sync_list_file = MODULES."gamemanager/rsync.list";
			
			if(!file_exists($sync_list_file))
				return array("status" => '336', "message" => "The sync list file doesn't exists ($sync_list_file).");
			
			$sync_list = file($sync_list_file, FILE_IGNORE_NEW_LINES);
			if(!$sync_list or empty($sync_list))
				return array("status" => '337', "message" => "Failed to read sync list file ($sync_list_file).");
			
			if(in_array($rs_name, $sync_list)) 
			{
				$exec_folder_path = clean_path($home_info['home_path'] . "/" . $server_xml->exe_location);
				$exec_path = clean_path($exec_folder_path . "/" . $server_xml->server_exec_name);
				preg_match("/(win|linux)(32|64)?$/", $server_xml->game_key, $matches);
				$os = strtolower($matches[1]) == 'linux'? 'linux':'windows';
				$full_url = "$url/ogp_game_installer/$rs_name/$os/";
				
				$preInstallCMD = "";
				if(isset($server_xml->post_install))
					$preInstallCMD .= $server_xml->pre_install;
				
				$postInstallCMD = "";
				if(isset($server_xml->post_install))
					$postInstallCMD .= $server_xml->post_install;
				$postInstallCMD .= "\n{OGP_LOCK_FILE} " . $home_info['home_path'] . "/" . ($server_xml->exe_location ? $server_xml->exe_location . "/" : "") . $server_xml->server_exec_name;
				
				$remote->start_rsync_install($home_id,$home_info['home_path'],"$full_url",$exec_folder_path,$exec_path,$preInstallCMD,$postInstallCMD);
				$status = "200";
				$message = "Rsync installation started";
			}
			else
			{
				$status = "335";
				$message = 'This game is not supported by Rsync installation.';
			}
		}
		
		if($_POST['type'] == "manual")
		{
			$manual_url = trim($_POST['manual_url']);
			$filename = get_download_filename($manual_url);
			
			if($filename)
			{
				$postInstallCMD = "";
				if(isset($server_xml->post_install))
					$postInstallCMD .= $server_xml->post_install;
				$postInstallCMD .= "\n{OGP_LOCK_FILE} " . $home_info['home_path'] . "/" . ($server_xml->exe_location ? $server_xml->exe_location . "/" : "") . $server_xml->server_exec_name;
				$remote->start_file_download($manual_url,$home_info['home_path'],$filename,"uncompress",$postInstallCMD);
				$status = "200";
				$message = "Manual installation started";
			}
			else
			{
				$status = "335";
				$message = 'The URL for manual installation is empty or invalid.';
			}
		}
		
		if($_POST['type'] == "master")
		{
			$ms_home_id = $db->getMasterServer($home_info['remote_server_id'], $home_info['home_cfg_id']);
			if($ms_home_id !== FALSE)
			{
				$exec_folder_path = clean_path($home_info['home_path'] . "/" . $server_xml->exe_location );
				$exec_path = clean_path($exec_folder_path . "/" . $server_xml->server_exec_name );
				$ms_info = $db->getGameHome($ms_home_id);
				
				$preInstallCMD = "";
				if(isset($server_xml->post_install))
					$preInstallCMD .= $server_xml->pre_install;
				
				$postInstallCMD = "";
				if(isset($server_xml->post_install))
					$postInstallCMD .= $server_xml->post_install;
				$postInstallCMD .= "\n{OGP_LOCK_FILE} " . $home_info['home_path'] . "/" . ($server_xml->exe_location ? $server_xml->exe_location . "/" : "") . $server_xml->server_exec_name;
				
				$remote->masterServerUpdate($home_id,$home_info['home_path'],$ms_home_id,$ms_info['home_path'],$exec_folder_path,$exec_path,$preInstallCMD,$postInstallCMD);
				$status = "200";
				$message = "Installation from master server ($home_info[home_name]) started";
			}
			else
			{
				$status = "335";
				$message = 'There is no master server assigned for this game.';
			}
		}
	}
	
	return array("status" => $status, "message" => $message);
}

function api_litefm()
{
	global $request, $db, $user_info, $settings;
	
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	$relative_path = $_POST['relative_path'];
		
	$home_info = $db->getGameHomeByIP($ip, $port);
	if($home_info === FALSE)
		return array("status" => '328', "message" => "There is no game server with the given address ($ip:$port).");
	
	$isAdmin = $db->isAdmin($user_info['user_id']);
	
	if($isAdmin)
	{
		$access_rights = 'ufpetc';
	}
	else
	{
		$game_home = $db->getUserGameHome($user_info['user_id'], $home_info['home_id']);
		if($game_home === FALSE)
			return array("status" => '329', "message" => "The given address ($ip:$port) does not belong to your account.");
		$access_rights = $game_home['access_rights'];
	}
	if(!strstr($access_rights,'f'))
		return array("status" => '351', "message" => "You don't have access right for file management in server at $ip:$port.");
	
    $server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

    if($server_xml === FALSE)
		return array("status" => '305', "message" => "No game configuration found for home_cfg_id #" . $home_cfg_id . ".");
	
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
	$host_stat = $remote->status_chk();
	if($host_stat !== 1)
		return array("status" => '310', "message" => "The remote server is offline.");
	
	$relative_path = preg_replace("/(\.\.)(\\\|\/)+/", '/', $relative_path);
	$path = clean_path($home_info['home_path'].'/'.$relative_path);
	
	if($request[0] != "save" and $remote->rfile_exists($path) === 0)
		return array("status" => '338', "message" => "$path does not exists.");
	
	if($request[0] == "list")
	{
		$status = "200";
		$message = $remote->remote_dirlistfm($path);
	}
	
	if($request[0] == "get")
	{
		$remote->remote_readfile($path, $data);
		$status = "200";
		$message = $data;
	}
	
	if($request[0] == "save")
	{
		$contents = $_POST['contents'];
		if($remote->remote_writefile($path, $contents) === 1)
		{
			$status = "200";
			$message = "File $path written successfully";
		}
		else
		{
			$status = "339";
			$message = "Could not write to the file.";
		}
	}
	
	if($request[0] == "remove")
	{
		$remote->shell_action('remove_recursive', $path);
		if($remote->rfile_exists($path) === 0)
		{
			$status = '200';
			$message = "$path removed successfully.";
		}
		else
		{
			$status = '340';
			$message = "$path could not be removed.";
		}
		
	}
	
	return array("status" => $status, "message" => $message);
}

function api_addonsmanager()
{
	global $request, $db, $user_info;
	
	if($db->isModuleInstalled('addonsmanager') === FALSE)
		return array("status" => '349', "message" => "This function is not available because the module is not installed.");
	
	if($request[0] == "list")
	{
		$addons_rows = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXaddons");
		$status = "200";
		$message = $addons_rows;
	}
	
	if($request[0] == "install")
	{
		$ip = $_POST['ip'];
		$port = (int)$_POST['port'];
		$mod_key = isset($_POST['mod_key'])?trim($_POST['mod_key']):'';
		$addon_id = (int)$_POST['addon_id'];
		
		$home_info = $db->getGameHomeByIP($ip, $port);
		if($home_info === FALSE)
			return array("status" => '328', "message" => "There is no game server with the given address ($ip:$port).");
		
		$isAdmin = $db->isAdmin($user_info['user_id']);
		
		if(!$isAdmin and $db->getUserGameHome($user_info['user_id'], $home_info['home_id']) === FALSE)
			return array("status" => '329', "message" => "The given address ($ip:$port) does not belong to your account.");
		
		$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

		if($server_xml === FALSE)
			return array("status" => '305', "message" => "No game configuration found for home_cfg_id #" . $home_cfg_id . ".");
		
		$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
		$host_stat = $remote->status_chk();
		if($host_stat !== 1)
			return array("status" => '310', "message" => "The remote server is offline.");
		
		$mod_id = key($home_info['mods']);
		
		if($mod_key != '')
		{
			foreach($home_info['mods'] as $home_mod)
			{
				if($mod_key == $home_mod['mod_key'])
				{
					$mod_id = $home_mod['mod_id'];
					break;
				}
			}
		}
		else
			$mod_key = $home_info['mods'][$mod_id]['mod_key'];
		
		$query_groups = "";
		if(!$isAdmin)
		{
			$groups = $db->getUsersGroups($user_info['user_id']);
			$query_groups .= " AND (";
			foreach($groups as $group)
				$query_groups .= "group_id=".$group['group_id']." OR ";
			$query_groups .= "group_id=0 OR group_id IS NULL)";
		}

		$addons_rows = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXaddons WHERE home_cfg_id=".$home_info['home_cfg_id']." AND addon_id=".$addon_id.$query_groups);

		if($addons_rows === FALSE)
			return array("status" => '341', "message" => "Invalid addon id #" . $addon_id . ".");
		
		$addon_info = $addons_rows[0];
		
		$url = $addon_info['url'];
		$filename = basename($url);
		
		if($addon_info['post_script'] != "")
		{
			$addon_info['post_script'] = strip_real_escape_string($addon_info['post_script']);
						
			if(	isset($server_xml->gameq_query_name) )
			{
				$home_info['query_port'] = get_query_port($server_xml, $home_info['port']);
			}
			elseif(	isset($server_xml->lgsl_query_name) )
			{
				require_once('protocol/lgsl/lgsl_protocol.php');
				$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $home_info['port'], "", "");
				$home_info['query_port'] = $get_q_and_s['1'];
			}
			elseif ($server_xml->protocol == "teamspeak3")
			{
				$query_port = $port + 24;
			}
			
			$home_info["incremental"] = $db->incrementalNumByHomeId($home_info['home_id'], $home_info['mods'][$mod_id]['mod_cfg_id'], $home_info['remote_server_id']);
			
			$post_script = preg_replace( "/\%home_path\%/i", $home_info['home_path'], $addon_info['post_script']);
			$post_script = preg_replace( "/\%home_name\%/i", $home_info['home_name'], $post_script);
			$post_script = preg_replace( "/\%control_password\%/i", $home_info['control_password'], $post_script);
			$post_script = preg_replace( "/\%max_players\%/i", $home_info['mods'][$mod_id]['max_players'], $post_script);
			$post_script = preg_replace( "/\%ip\%/i", $home_info['ip'], $post_script);
			$post_script = preg_replace( "/\%port\%/i", $home_info['port'], $post_script);
			$post_script = preg_replace( "/\%query_port\%/i", $home_info['query_port'], $post_script);
			$post_script = preg_replace( "/\%incremental\%/i", $home_info['incremental'], $post_script);
		}

		$pid = $remote->start_file_download($addon_info['url'], $home_info['home_path']."/".$addon_info['path'], $filename, "uncompress", $post_script);
		if($pid > 0)
		{
			$status = "200";
			$message = "Addon installation started with process id #".$pid;
		}
		else
		{
			$status = "342";
			$message = "Addon installation failed, file download could not be started.($retval)";
		}
	}
	
	return array("status" => $status, "message" => $message);
}

function api_steam_workshop()
{
	global $request, $db, $user_info, $settings;
	
	if($db->isModuleInstalled('steam_workshop') === FALSE)
		return array("status" => '349', "message" => "This function is not available because the module is not installed.");
		
	define('CONFIGS', "modules/steam_workshop/game_configs/");
	
	if($request[0] == "install")
	{
		$ip = $_POST['ip'];
		$port = (int)$_POST['port'];
		$mod_key = isset($_POST['mod_key'])?trim($_POST['mod_key']):'';
		$mods_list = $_POST['mods_list'];
		
		$home_info = $db->getGameHomeByIP($ip, $port);
		if($home_info === FALSE)
			return array("status" => '328', "message" => "There is no game server with the given address ($ip:$port).");
		
		$isAdmin = $db->isAdmin($user_info['user_id']);
		
		if(!$isAdmin and $db->getUserGameHome($user_info['user_id'], $home_info['home_id']) === FALSE)
			return array("status" => '329', "message" => "The given address ($ip:$port) does not belong to your account.");
		
		$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);

		if($server_xml === FALSE)
			return array("status" => '305', "message" => "No game configuration found for home_cfg_id #" . $home_cfg_id . ".");
		
		$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
		$host_stat = $remote->status_chk();
		if($host_stat !== 1)
			return array("status" => '310', "message" => "The remote server is offline.");
		
		require_once(MODULES.'steam_workshop/functions.php');
		
		if(preg_match('/^([0-9]+,?)+$/', $mods_list))
		{			
			$mod_id = key($home_info['mods']);
						
			if($mod_key != '')
			{
				foreach($home_info['mods'] as $home_mod)
				{
					if($mod_key == $home_mod['mod_key'])
					{
						$mod_id = $home_mod['mod_id'];
						break;
					}
				}
			}
				
			$mod_xml = xml_get_mod($server_xml, $home_info['mods'][$mod_id]['mod_key']);
			
			if($mod_xml == FALSE)
				return array("status" => '344', "message" => "mod_key not found from game xml.");
			
			preg_match('/(linux|win)(32|64)?/i', $home_info['game_key'], $matches);
			
			if(strtolower($matches[1]) == 'linux')
				$os = "Linux";
			elseif(strtolower($matches[1]) == 'win')
				$os = "Windows";
					
			$xml_file = CONFIGS.$mod_xml->installer_name."_".$os.".xml";
			if(!file_exists($xml_file))
				return array("status" => '344', "message" => "No Steam workshop xml file could be found for the game installed in the given ip:port.");
			
			$dom = new DOMDocument();
			
			if ( @$dom->load($xml_file) === FALSE )
				return array("status" => '345', "message" => "The Steam workshop xml file for this game has bad format.");
					
			$xml = simplexml_load_file($xml_file);
			
			$mod_id_array = explode(',', $mods_list);

			foreach($mod_id_array as $workshop_mod_id)
			{
				$exist = false;
				foreach($xml->mods->mod as $mod)
				{
					if($mod['id'] == $workshop_mod_id)
					{
						$exist = true;
						break;
					}
				}
				
				if(belongs_to_workshop($workshop_mod_id, $xml->workshop_id))
				{
					if(!$exist)
					{
						list($mod_title, $mod_description, $mod_image_url, $download_url, $filename, $file_size) = get_mod_info($workshop_mod_id);
						//add mods to the xml
						$mod = new SimpleXMLElement('<mod/>');
						$mod->addAttribute('id', $workshop_mod_id);
						$mod->addChild('name', $mod_title);
						$mod->addChild('description', base64_encode($mod_description));
						$mod->addChild('image_url', $mod_image_url);
						$mod->addChild('download_url', $download_url);
						$mod->addChild('filename', $filename);
						$mod->addChild('file_size', $file_size);
						$moddom = dom_import_simplexml($mod)->ownerDocument;
						$moddom->formatOutput = true;
						$mod_string = $moddom->saveXML($moddom->documentElement);
						
						$dom = dom_import_simplexml($xml)->ownerDocument;
						$dom->formatOutput = true;
						
						$mods = $dom->getElementsByTagName('mods')->item(0);
						
						$f = $dom->createDocumentFragment();
						$f->appendXML($mod_string."\n");
						$mods->appendChild($f);
										
						
						file_put_contents($xml_file, $dom->saveXML());
						$xml = simplexml_load_file($xml_file);
					}
				}
				else
				{
					break;
					return array("status" => '346', "message" => "Mod $workshop_mod_id does not belong to workshop ".$xml->workshop_id.".");
				}
			}
			
			$config = $xml->config;
			$anonymous_login = $xml->anonymous_login;
			$download_method = $xml->download_method;
			$user = $settings['steam_user'];
			$pass = $settings['steam_pass'];
			$regex = $config->regex;
			$mods_backreference_index = (int)$config->mods_backreference_index;
			$variable = $config->variable;
			$place_after = $config->place_after;
			$mod_string = $config->mod_string;
			$string_separator = $config->string_separator;
			$config_file_path = clean_path($home_info['home_path']."/".$config->filepath);
			$post_install = $xml->post_install;
			$mod_names_list = get_mod_names_list($mods_list, $xml->mods->mod);
			$mods_full_path = clean_path($home_info['home_path'].'/'.$xml->mods_path);
			$workshop_id = $xml->workshop_id;
			
			$url_list = "";
			$filename_list = "";
			if($download_method == "steamapi")
			{
				foreach($mod_id_array as $workshop_mod_id)
				{
					foreach($xml->mods->mod as $mod)
					{
						if($mod['id'] == $workshop_mod_id)
						{
							$separator = $url_list == ""?"":",";
							$url_list .= $separator.$mod->download_url;
							$filename_list .= $separator.$mod->filename;
						}
					}
				}
			}
			
			if($remote->steam_workshop( $home_info['home_id'],$mods_full_path,$workshop_id,$mods_list,$regex,$mods_backreference_index,
										$variable,$place_after,$mod_string,$string_separator,$config_file_path,$post_install, 
										$mod_names_list,$anonymous_login,$user,$pass,$download_method,$url_list,$filename_list ) == 1)
			{
				$status = "200";
				$message = "Mods installation started successfully";
			}
			else
			{
				$status = '347';
				$message = "The installation could not be started on the remote server.";
			}
		}
		else
		{
			$status = '348';
			$message = "The mods list has bad format ($mods_list), must be a list of mod ids separated by coma with no spaces, or only one mod id.";
		}
	}
		
	return array("status" => $status, "message" => $message);
}
?>
