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

require_once("Crypt/XXTEA.php");

// Screen type for servers
define("OGP_SCREEN_TYPE_HOME","HOME");
define("OGP_SCREEN_TYPE_UPDATE","UPDATE");

define("AGENT_ERROR_NOT_EXECUTABLE",-13);

class OGPRemoteLibrary
{
	private $port;
	private $host;
	private $encryption_key;
	private $enc;
	private $timeout;

	public function __construct($host,$port,$encryption_key,$timeout = 5)
	{
		$this->host = $host;
		$this->port = $port;
		$this->encryption_key = $encryption_key;
		$this->enc = new Crypt_XXTEA();
		$this->enc->setKey($this->encryption_key);
		$this->timeout = $timeout;
	}

	public function __destruct()
	{
	}

	private function sendRequest($request)
	{
		$context = stream_context_create
			(array('http' => array
			(
				'method' => "POST",
				'header' => "Content-Type: text/xml",
				'content' => $request,
				'timeout' => $this->timeout
			)));
		
		$status = @file_get_contents("http://".$this->host.":".$this->port."/RPC2", false, $context);
		return xmlrpc_decode($status);
	}

	private function encryptParam($param)
	{
		$param = base64_encode($param);
		$param = $this->enc->encrypt($param);
		return base64_encode($param);
	}

	private function encrypt_params()
	{
		$params_array = array();
		$args = func_get_args();

		foreach ($args as $arg)
		{
			array_push($params_array,$this->encryptParam($arg));
		}
		return $params_array;
	}

	/// \return FALSE If there was problems in the decoding.
	private function decryptParam($param)
	{
		$param_tmp = base64_decode($param_tmp,true);
		$param_tmp = $this->enc->decrypt($param);

		// Lets check in strict mode, so that errors are found.
		$param_tmp = base64_decode($param_tmp,true);

		if ( $param_tmp === FALSE )
			return FALSE;

		$param = $param_tmp;
		return TRUE;
	}
	
	private function add_enc_chk(&$args)
	{
		$param = "Encryption checking OK";
		if(is_array($args))
		{
			array_push($args, $this->encryptParam($param));
		}
		elseif(is_null($args))
		{
			$args = $this->encryptParam($param);
		}
		else
		{
			$args = array($args, $this->encryptParam($param));
		}
	}

	/// \returns 1 If file exists
	/// \returns 0 If file does not exist
	/// \returns -1 If server not available.
	public function rfile_exists($file)
	{
		$args = $this->encryptParam(trim($file));
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("rfile_exists", $args);
		$status = $this->sendRequest($request);
		if ( $status === 0 )
			return 1;
		if ( empty($status) )
			return -1;
		// File does not exist.
		return 0;
	}

	/// \returns 1 If online
	/// \returns 0 If offline
	/// \returns -1 If encryption key mismatch
	public function status_chk()
	{
		$param = "hello";
		$args = $this->encryptParam($param);
		$request = xmlrpc_encode_request("quick_chk", $args);
		$status = $this->sendRequest($request);
		// If 1 is returned then the encryption key did not match.
		if ( $status === 1 )
			return -1;
		// When 0 is returned everythin is OK.
		else if ( $status === 0 )
			return 1;
		// We could not connect to the remote host, offline?.
		else
			return 0;
	}

	/// \returns 0 When server offline / could not be connected.
	/// \returns the log in $data in case the log can be found.
	public function get_log($screen_type,$home_id,$home_path,&$data,$nb_of_lines = 100, $console_log = false)
	{
		$params_array = $this->encrypt_params($screen_type,$home_id,$home_path,$nb_of_lines,$console_log);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request('get_log',$params_array);
		$response = $this->sendRequest($request);
		if ( $response === NULL )
			return 0;

		if ( $response == -10 )
			return 'Agent Returned: -10. Home not found.';
		@list($retval,$data_tmp) = @explode(";",$response);

		// We get log only with positive values.
		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line)."\n";
			}
		}

		return $retval;
	}

	/// \brief Stops remote server.
	/// \return 1 On success.
	/// \return 0 When server offline / could not be connected.
	/// \return -1 When error occurred
	public function remote_stop_server($home_id, $server_ip,
		$server_port, $control_protocol, $control_password, $control_type, $home_path)
	{
		$params_array = $this->encrypt_params($home_id,$server_ip,$server_port,
			$control_protocol,$control_password,$control_type,$home_path);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("stop_server", $params_array);

		$status = $this->sendRequest($request);

		// Error occurred on the remote end.
		if( $status === 1 )
			return -1;
		// Server successfully stopped.
		else if ( $status == 0 )
			return 1;
		// Connection problems.
		else
			return 0;
	}
	
	/// \brief Send a RCON command.
	/// \return 1 On success.

	public function remote_send_rcon_command($home_id, $server_ip,
		$server_port, $control_protocol, $control_password, $control_type, $rconCommand,&$data)
	{
		$params_array = $this->encrypt_params($home_id,$server_ip,$server_port,
			$control_protocol,$control_password,$control_type, $rconCommand);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("send_rcon_command", $params_array);
		
		$response = $this->sendRequest($request);
		
		@list($retval,$data_tmp) = @explode(";",$response);
		
		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
			return 1;
		}
		elseif ( $retval === 0 )
			return 0;
		elseif ( $retval === -10 )
			return -10;
		else
			return -1;
	}
	

	/// \return 1 If success
	/// \return 0 If file does not exist.
	/// \return -1 In case of connection error
	/// \return -2 If failed to read file.
	public function remote_readfile($args,&$data)
	{
		$args = trim($args);
		$args = $this->encryptParam($args);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("readfile", $args);
		$response = $this->sendRequest($request);

		if ( $response === NULL )
			return -1;

		if ( is_array($response) && xmlrpc_is_fault($response))
			return -1;

		@list($retval,$data_tmp) = @explode(";",$response);
		$retval = (integer) $retval;

		if ( $retval === 0 )
			return 0;
		else if ( $retval === -1 )
			return -2;

		$data = base64_decode($data_tmp);
		return 1;
	}

	/// \return 1 If success
	/// \return 0 On failure
	/// \return -1 If agent could not be connected.
	public function remote_writefile($writefile, $content)
	{
		$content = base64_encode($content);
		$params = $this->encrypt_params($writefile,$content);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("writefile", $params);
		$response = $this->sendRequest($request);

		if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		else
			return -1;
	}
	
	/// \return 1 If success
	public function remote_rebootnow()
	{
		// Must have a parameter even if one is not used.
		$args = $this->encryptParam("reboot");
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("rebootnow", $args);
		$response = $this->sendRequest($request);

		if ( $response )
			return 1;
	}

	/// Updates the mod located in the game home with steam.
	/// \return 1 If update started successfully
	/// \return 0 If error
	/// \return -1 In case of connection error.
	public function steam($home_id,$game_home,$mod,$exec_folder_path,$exec_path,$precmd,$postcmd)
	{
		$params = $this->encrypt_params($home_id,$game_home,$mod,$exec_folder_path,$exec_path,$precmd,$postcmd);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("steam", $params);
		$response = $this->sendRequest($request);

		if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		else
			return -1;
	}
	
	/// Updates the mod located in the game home with steamCmd.
	/// \return 1 If update started successfully
	/// \return 0 If error
	/// \return -1 In case of connection error.
	public function steam_cmd($home_id,$game_home,$mod,$modname,$betaname,$betapwd,$user,$pass,$guard,$exec_folder_path,$exec_path,$precmd,$postcmd,$cfg_os,$lockFiles,$archBits)
	{
		$params = $this->encrypt_params($home_id,$game_home,$mod,$modname,$betaname,$betapwd,$user,$pass,$guard,$exec_folder_path,$exec_path,$precmd,$postcmd,$cfg_os,$lockFiles,$archBits);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("steam_cmd", $params);
		$response = $this->sendRequest($request);

		if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		else
			return -1;
	}

	// Returns the latest buildid for $appId
	public function fetch_steam_version($appId, $pureOutput = 0)
	{
		$params = $this->encrypt_params($appId, $pureOutput);
		$this->add_enc_chk($params);

		$request = xmlrpc_encode_request("fetch_steam_version", $params);
		$response = $this->sendRequest($request);

		return $response;
	}

	// Returns -10 if the steamapps/appmanifest file doesn't exist.
	// Returns the version installed otherwise.
	public function installed_steam_version($game_home, $mod, $pureOutput = 0)
	{
		$params = $this->encrypt_params($game_home, $mod, $pureOutput);
		$this->add_enc_chk($params);

		$request = xmlrpc_encode_request("installed_steam_version", $params);
		$response = $this->sendRequest($request);

		return $response;
	}

	// If server is running, stops it. Starts an update. And if the server was running, starts the server upon finishing the update.
	// Returns -10 if an update is currently in place.
	// Returns -9 if the server failed to stop.
	// Returns -8 if the update failed to start.
	// Returns -7 if the server failed to start.
	// Returns 1 on success. (updated, started)
	// Returns 2 if the update was successful, but the server wasn't originally running. So wasn't started.

	// Requires agent timeout to be set to a high value - otherwise return value will be null.
	public function automatic_steam_update(
						$home_id, $home_path, $server_ip, $server_port, $exec_path, $exec_folder_path,
						$control_protocol, $control_password, $control_type,
						$appId, $modname, $betaname, $betapwd, $user, $pass, $guard, $precmd, $postcmd, $cfg_os, $filesToLockUnlock,
						$startup_cmd, $cpu, $nice, $preStart, $envVars, $game_key, $archBits, $console_log = ""
	)
	{
		$params = $this->encrypt_params($home_id, $home_path, $server_ip, $server_port, $exec_path, $exec_folder_path,
						$control_protocol, $control_password, $control_type,
						$appId, $modname, $betaname, $betapwd, $user, $pass, $guard, $precmd, $postcmd, $cfg_os, $filesToLockUnlock,
						$startup_cmd, $cpu, $nice, $preStart, $envVars, $game_key, $archBits, $console_log);

		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("automatic_steam_update", $params);
		$response = $this->sendRequest($request);

		return $response;
	}
	
	/// Updates the mod located in the game home with master server.
	/// \return 1 If update started successfully
	/// \return 0 If error
	/// \return -1 In case of connection error.
	public function masterServerUpdate($home_id,$home_path,$ms_home_id,$ms_home_path,$exec_folder_path,$exec_path,$precmd,$postcmd)
	{
		$params = $this->encrypt_params($home_id,$home_path,$ms_home_id,$ms_home_path,$exec_folder_path,$exec_path,$precmd,$postcmd);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("master_server_update", $params);
		$response = $this->sendRequest($request);

		if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		else
			return -1;
	}

	/// \brief Checks if the game update is running for the certain gamehome.
	/// \return 1 if the update is active
	/// \return 0 if the update is not active
	/// \return -1 If unable to connect to the remote server.
	/// \return -2 In other errors.
	public function game_update_active($game_home,$mod)
	{
		$params = $this->encrypt_params($game_home, $mod);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("game_update_active", $params);
		if(!$response = $this->sendRequest($request) )
			return -1;
		else if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		// other errors.
		else
			return -2;
	}

	/// \return -1 If could not connect to the remote host.
	/// \return -3 In case of unknown error
	/// \todo This function is not complete. Also the agent side requires work.
	public function start_file_download($url, $dest, $filename, $action = "", $post_script = "" )
	{
		$params_array = $this->encrypt_params($url,$dest,$filename,$action,$post_script);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("start_file_download",$params_array);
		$response = $this->sendRequest($request);

		if( !$response )
			return -1;

		if (is_array($response) && xmlrpc_is_fault($response))
			return -3;

		return $response;
	}

	public function is_file_download_in_progress($pid)
	{
		$args = $this->encryptParam($pid);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("is_file_download_in_progress", $args);
		return $this->sendRequest($request);
	}

	public function uncompress_file($file_location, $destination)
	{
		$params_array = $this->encrypt_params($file_location,$destination);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("uncompress_file",$params_array);
		return $this->sendRequest($request);
	}

	/// \return -1 If could not connect to the remote host.
	/// \return -3 In case of unknown error
	/// \todo This function is not complete. Also the agent side requires work.
	public function start_rsync_install($home_id,$home_path,$url,$exec_folder_path,$exec_path,$precmd,$postcmd,$filesToLock="")
	{
		$params_array = $this->encrypt_params($home_id,$home_path,$url,$exec_folder_path,$exec_path,$precmd,$postcmd,$filesToLock);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("start_rsync_install",$params_array);
		$response = $this->sendRequest($request);

		if ( $response === 1 )
			return 1;
		else if ( $response === 0 )
			return 0;
		else
			return -1;
	}

	public function rsync_progress($home)
	{
		$args = $this->encryptParam($home);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("rsync_progress",$args);
		$response = $this->sendRequest($request);

		if( !$response )
			return -1;

		#if (is_array($response) && xmlrpc_is_fault($response))
		 # return -3;

		return $response;
	}
	/// \return array of files in directory, when request success.
	/// \return -1 If unable to connect to the remote server.
	/// \return -2 In case directory was not accessible.
	/// \return -3 Any other error.
	public function remote_dirlist($args)
	{
		$args = $this->encryptParam($args);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("dirlist",$args);
		if( !$response = $this->sendRequest($request))
			return -1;
		if (is_array($response) && xmlrpc_is_fault($response))
			return -3;
		if( $response < 0 )
			return -2;

		return explode(";", $response);
	}

	/// \return array of files and file info (size owner etc) in directory, when request success.
	/// \return -1 If unable to connect to the remote server.
	/// \return -2 In case directory was not accessible.
	/// \return -3 Any other error.
	public function remote_dirlistfm($args)
	{
		$args = $this->encryptParam($args);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("dirlistfm", $args);
		$response = $this->sendRequest($request);
		if ( $response === NULL )
			return -1;
		if (is_array($response) && xmlrpc_is_fault($response))
			return -3;
		if( $response < 0 )
			return -2;
		if ( $response == 1 )
			return array();

		array_walk_recursive($response, function (&$item, $key) {
			if ($key == 'filename')$item = base64_decode($item);
		});
		
		return $response;
	}
	/// \returns the number of CPUs on the server
	/// \returns -1 If the server cannot be reached.
	public function cpu_count()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("cpu_count", $args);
		$status = $this->sendRequest($request);
		if ( empty($status) )
		{
			return -1;
		}
		return $status;
	}

	public function renice_process($home_id, $nice)
	{
		$params_array = $this->encrypt_params($home_id, $nice);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("renice_process",$params_array);
		return $this->sendRequest($response);
	}

	/// \return 1 If everything ok
	/// \return -1 If connection could not be established.
	/// \return -2 In other errors.
	/// \todo Other return values?
	// Starts game server
	public function universal_start($home_id, $game_home, $game_binary, $run_dir, $startup_cmd,
		$server_port, $server_ip, $cpu, $nice, $preStart, $envVars, $game_key, $console_log = "")
	{
		$params_array = $this->encrypt_params($home_id, $game_home, $game_binary,
			$run_dir, $startup_cmd, $server_port, $server_ip, $cpu, $nice, $preStart, $envVars, $game_key, $console_log);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("universal_start", $params_array);
		$response = $this->sendRequest($request);
		if($response === NULL)
			return -1;

		if (is_array($response) && xmlrpc_is_fault($response))
			return -2;

		return $response;
	}
	
	public function lock_additional_home_files($game_home, $filesToLockUnlock, $action)
	{
		$params_array = $this->encrypt_params($game_home, $filesToLockUnlock, $action);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("lock_additional_files", $params_array);
		$response = $this->sendRequest($request);
		if($response === NULL)
			return -1;

		if (is_array($response) && xmlrpc_is_fault($response))
			return -2;

		return $response;
	}

	/// \returns the os of the remote host.
	public function what_os()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("what_os", $args);
		$status = $this->sendRequest($request);
		return "$status";
	}

	/// \return Available IP addresses of the remote host.
	/// \return empty array if no ip's are found.
	/// \return array containing the ip's on success.
	public function discover_ips()
	{
		$args = "chk";
		$args = $this->encryptParam($args);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("discover_ips", $args);
		$status = $this->sendRequest($request);

		if ( $status == 0 )
			return array();
 
		return explode(",",$status);
	}

	/// \brief Checks if the server is running.
	/// \return 1 If is
	/// \return 0 If is not
	/// \return -1 If agent could not be reached.
	public function is_screen_running($screen_type,$home_id)
	{
		$params = $this->encrypt_params($screen_type,$home_id);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("is_screen_running", $params);
		$status = $this->sendRequest($request);
		if ( $status === 1 )
			return 1;
		else if ( $status === 0 )
			return 0;
		else
			return -1;
	}

	public function mon_stats()
	{
		$args = $this->encrypt_params("mon_stats");
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("mon_stats", $args);
		$response = $this->sendRequest($request);

		@list($retval,$data_tmp) = @explode(";",$response);

		$data = NULL;

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
		}

		return $data;
	}

	/// \brief copies a game home on the filesystem.
	/// \return 1 On success.
	/// \return 0 When server offline / could not be connected.
	/// \return -1 When error occurred
	/// Usually a -1 happens because of a connection timeout during the copy.  This is expected
	public function clone_home($source_home, $dest_home, $owner)
	{
		$params_array = $this->encrypt_params($source_home, $dest_home, $owner);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("clone_home", $params_array);
		$status = $this->sendRequest($request);

		// Copy was successful.
		if( $status === 1 )
			return 1;
		// Copy failed.
		else if ( $status === 0 )
			return 0;
		// Connection problems.
		else
			return -1;
	}


	/// \brief removes a game home from the filesystem.
	/// \return 1 On success.
	/// \return 0 When server offline / could not be connected.
	/// \return -1 When error occurred
	public function remove_home($game_home_del)
	{
		$args = $this->encryptParam($game_home_del);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("remove_home", $args);
		$status = $this->sendRequest($request);

		// Delete was successful.
		if( $status === 1 )
			return 1;
		// Delete failed.
		else if ( $status === 0 )
			return 0;
		// Connection problems.
		else
			return -1;
	}

	public function remote_restart_server($home_id,$server_ip,$server_port, 
			$control_protocol,$control_password,$control_type,
			$home_path,$server_exe,$run_dir,$cmd,$cpu,$nice,$preStart, $envVars, $game_key, $console_log = "")
	{
		$params_array = $this->encrypt_params($home_id,$server_ip,$server_port,
			$control_protocol,$control_password,$control_type,
			$home_path,$server_exe,$run_dir,$cmd,$cpu,$nice,$preStart,$envVars, $game_key, $console_log);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("restart_server", $params_array);

		$status = $this->sendRequest($request);

		//  Error server cant stop.
		if( $status === -2 )
			return -2;
		// Error server cant start.
		else if ( $status === -1 )
			return -1;
		//// OK successfully restarted.
		else if ( $status === 1 )
			return 1;
		// Connection problems.
		else
			return 0;
	}
	
	public function sudo_exec($command)
	{
		$args = $this->encryptParam($command);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("sudo_exec", $args);

		$status = $this->sendRequest($request);

		@list($retval,$data_tmp) = @explode(";",$status);

		$data = NULL;

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line)."\n";
			}
			return $data;
		}
		return 0;
	}
	
	public function exec($command)
	{
		$args = $this->encryptParam($command);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("exec", $args);
		$response = $this->sendRequest($request);

		@list($retval,$data_tmp) = @explode(";",$response);

		$data = NULL;

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
		}
		return $data;
	}
	
	public function secure_path($action, $path)
	{
		$params_array = $this->encrypt_params($action, $path);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("secure_path", $params_array);

		$status = $this->sendRequest($request);

		@list($retval,$data_tmp) = @explode(";",$status);

		$data = NULL;

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
		}
		return $data;
	}
	
	public function get_chattr($path)
	{
		$args = $this->encryptParam($path);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("get_chattr", $args);
		$status = $this->sendRequest($request);

		@list($retval,$data_tmp) = @explode(";",$status);

		$data = NULL;

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
		}
		return $data;
	}
	
	public function ftp_mgr($action, $login = "", $password = "", $home_path = "")
	{
		$params_array = $this->encrypt_params($action, $login, $password, $home_path);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("ftp_mgr", $params_array);
		$status = $this->sendRequest($request);
		@list($retval,$data_tmp) = @explode(";",$status);

		$data = '';

		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$decoded_line = base64_decode($line);
				if(!preg_match("/^[\s|\t]*$/", $decoded_line))
					$data .= "$decoded_line\n";
			}
			return $data;
		}
		return 0;
	}
	
	public function compress_files($files,$destination,$archive_name,$archive_type)
	{
		$params_array = $this->encrypt_params($files,$destination,$archive_name,$archive_type);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("compress_files",$params_array);
		return $this->sendRequest($request);
	}
	
	public function stop_fastdl()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("stop_fastdl",$args);
		return $this->sendRequest($request);
	}
	
	public function start_fastdl()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("start_fastdl",$args);
		return $this->sendRequest($request);
	}
	
	public function restart_fastdl()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("restart_fastdl",$args);
		return $this->sendRequest($request);
	}
	
	public function fastdl_status()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("fastdl_status",$args);
		$response = $this->sendRequest($request);
		if($response === -1 or $response === 0)
			return -1;
		return 1;
	}
	
	public function fastdl_get_aliases()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("fastdl_get_aliases",$args);
		$response = $this->sendRequest($request);
		if(!is_array($response) or count($response) == 0)
			return -1;
		return $response;
	}
	
	public function fastdl_add_alias($alias,$home,$match_file_extension,$match_client_ip)
	{
		$params_array = $this->encrypt_params($alias,$home,$match_file_extension,$match_client_ip);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("fastdl_add_alias",$params_array);
		return $this->sendRequest($request);
	}
	
	public function fastdl_del_alias($aliases)
	{
		if(is_array($aliases))
		{
			$params_array = array();
			foreach($aliases as $alias)
			{
				$params_array[] = $this->encryptParam($alias);
			}
		}
		else
			$params_array = array(0 => $this->encryptParam($aliases));

		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("fastdl_del_alias",$params_array);
		return $this->sendRequest($request);
	}
	
	public function fastdl_get_info()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("fastdl_get_info",$args);
		$response = $this->sendRequest($request);
		if($response === -1 or $response == 0)
			return -1;
		return $response;
	}
	
	public function fastdl_create_config($fd_address, $fd_port, $listing, $autostart_on_agent_startup)
	{
		$params_array = $this->encrypt_params($fd_address, $fd_port, $listing, $autostart_on_agent_startup);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("fastdl_create_config",$params_array);
		return $this->sendRequest($request);
	}
	
	public function agent_restart()
	{
		$args = $this->encryptParam('restart');
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("agent_restart", $args);
		$response = $this->sendRequest($request);
		if($response === -1)
			return -1;
		return 1;
	}
	
	public function scheduler_list_tasks()
	{
		$args = NULL;
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("scheduler_list_tasks", $args);
		$response = $this->sendRequest($request);
		if($response === -1 or $response == 0)
			return -1;
		else
		{
			$data = array();
			foreach ($response as $id => $task)
			{
				$task = trim(base64_decode($task));
				$data[$id] = $task;
			}
			ksort($data);
			return $data;
		}
	}
	
	public function scheduler_del_task($id)
	{
		$args = $this->encryptParam($id);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("scheduler_del_task",$args);
		return $this->sendRequest($request);
	}
	
	public function scheduler_add_task($job)
	{
		$args = $this->encryptParam($job);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("scheduler_add_task",$args);
		return $this->sendRequest($request);
	}
	
	public function scheduler_edit_task($job_id, $job)
	{
		$params_array = $this->encrypt_params($job_id, $job);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("scheduler_edit_task",$params_array);
		return $this->sendRequest($request);
	}
	
	public function remote_get_file_part($file, $offset, &$data)
	{
		$params_array = $this->encrypt_params($file, $offset);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("get_file_part",$params_array);
		$response = $this->sendRequest($request);
		
		if ( $response === NULL )
			return -1;

		if ( is_array($response) && xmlrpc_is_fault($response))
			return -1;
		
		if ( $response === -1 )
			return -1;
		
		list($cur_offset,$data_tmp) = explode(";",$response);
		$data = base64_decode($data_tmp);
		return $cur_offset;
	}
	
	public function shell_action($action, $arguments)
	{
		$params_array = $this->encrypt_params($action, $arguments);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("shell_action", $params_array);
		$response = $this->sendRequest($request);
		
		if (is_array($response) && xmlrpc_is_fault($response))
			return NULL;
		
		$data = NULL;
		
		if (is_array($response) and !empty($response))
		{
			$data = array();
			foreach ($response as $key => $value)
			{
				$data[$key] = base64_decode($value);
			}
			return $data;
		}
		
		@list($retval,$data_tmp) = @explode(";",$response);
		
		if ( $retval > 0 )
		{
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				$data .= base64_decode($line);
			}
		}
		return $data;
	}
	
	public function stop_update($home_id)
	{
		$args = $this->encryptParam($home_id);
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("stop_update", $args);
		$response = $this->sendRequest($request);
		
		if ($response === NULL)
			return -1;
		
		if (is_array($response) && xmlrpc_is_fault($response))
			return -1;
		
		if ($response === 1)
			return -1;
		
		return 1;
	}
	
	public function remote_query($protocol, $game_type, $ip, $c_port, $q_port, $s_port)
	{
		$params_array = $this->encrypt_params($protocol, $game_type, $ip, $c_port, $q_port, $s_port);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("remote_query", $params_array);
		$response = $this->sendRequest($request);
		if (is_array($response) && xmlrpc_is_fault($response))
			return NULL;
		if ($response === -1 or $response === 0)
			return NULL;
		return base64_decode($response);
	}
	
	public function send_steam_guard_code($home_id, $sgc)
	{
		$params_array = $this->encrypt_params($home_id, $sgc);
		$this->add_enc_chk($params_array);
		$request = xmlrpc_encode_request("send_steam_guard_code", $params_array);
		$response = $this->sendRequest($request);
		
		if ($response === NULL)
			return -1;
		
		if (is_array($response) && xmlrpc_is_fault($response))
			return -1;
		
		if ($response === 1)
			return -1;
		
		return 1;
	}
	
		/// Updates the mod located in the game home with steamCmd.
	/// \return 1 If update started successfully
	/// \return 0 If error
	/// \return -1 In case of connection error.
	public function steam_workshop($home_id, $mods_full_path,
								   $workshop_id, $mods_list,
								   $regex, $mods_backreference_index,
								   $variable, $place_after, $mod_string, 
								   $string_separator, $config_file_path, 
								   $post_install, $mod_names_list,
								   $anonymous_login, $user, $pass,
								   $download_method, $url_list, $filename_list)
	{
		$params = $this->encrypt_params($home_id, $mods_full_path,
										$workshop_id, $mods_list,
										$regex, $mods_backreference_index,
										$variable, $place_after, $mod_string, 
										$string_separator, $config_file_path, 
										$post_install, $mod_names_list,
										$anonymous_login, $user, $pass,
										$download_method, $url_list, $filename_list);
		$this->add_enc_chk($params);
		$request = xmlrpc_encode_request("steam_workshop", $params);
		$response = $this->sendRequest($request);
		
		// Connection Error
		if ($response === NULL)
			return -3;
		// Subroutine Failure
		if(is_array($response) && xmlrpc_is_fault($response))
			return -2;
		// Error unmet condition
		if ($response === -1)
			return -1;
		//OK
		if($response === 1)
			return 1;
		//Unknown response
		return -4;
	}
	
	public function get_workshop_mods_info(&$data)
	{
		$args = $this->encryptParam("mods_info");
		$this->add_enc_chk($args);
		$request = xmlrpc_encode_request("get_workshop_mods_info", $args);
		$response = $this->sendRequest($request);
		$data = array();
		// Offline
		if ($response === NULL)
			return -3;
		// Failure
		if(is_array($response) && xmlrpc_is_fault($response))
			return -2;
		// mods directory does not exists
		if($response === -1)
			return -1;
		
		if(preg_match("/^1;/", $response))
		{
			list($retval, $data_tmp) = explode(";", $response);
			$lines = explode('\n',$data_tmp);
			foreach ($lines as $line)
			{
				@list($string_name, $mod_title) = explode(':', base64_decode($line), 2);
				if($string_name != "" and $mod_title != "")
					$data["$string_name"] = $mod_title;
			}
			return $retval;
		}
		//Unknown response
		return -4;
	}
}
?>
