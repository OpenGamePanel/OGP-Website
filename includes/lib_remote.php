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

    function __construct($host,$port,$encryption_key,$timeout = 2)
    {
        $this->host = $host;
        $this->port = $port;
        $this->encryption_key = $encryption_key;
        $this->enc = new Crypt_XXTEA();
        $this->enc->setKey($this->encryption_key);
		$this->timeout = $timeout;
    }

    function __destruct()
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
        $retval = xmlrpc_decode($status);
        return $retval;
    }

    private function encryptParam($param)
    {
        $param = base64_encode($param);
        $param = $this->enc->encrypt($param);
        $param = base64_encode($param);
        return $param;
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

    /// \returns 1 If file exists
    /// \returns 0 If file does not exist
    /// \returns -1 If server not available.
    public function rfile_exists($file)
    {
        $args = $this->encryptParam(trim($file));
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
    public function get_log($screen_type,$home_id,$home_path,&$data,$nb_of_lines = 100)
    {
        $params_array = $this->encrypt_params($screen_type,$home_id,$home_path,$nb_of_lines);
        $request = xmlrpc_encode_request('get_log',$params_array);
        $response = $this->sendRequest($request);
        if ( $response === NULL )
            return 0;

        @list($retval,$data_tmp) = @explode(";",$response);

        // We get log only with positive values.
        if ( $retval > 0 )
        {
            $lines = explode('\n',$data_tmp);
            foreach ($lines as $line)
            {
                $data .= base64_decode($line);
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
        $request = xmlrpc_encode_request("writefile", $params);
        $response = $this->sendRequest($request);

        if ( $response === 1 )
            return 1;
        else if ( $response === 0 )
            return 0;
        else
            return -1;
    }

    /// Updates the mod located in the game home with steam.
    /// \return 1 If update started successfully
    /// \return 0 If error
    /// \return -1 In case of connection error.
    public function steam($home_id,$game_home,$mod,$exec_folder_path,$exec_path,$precmd,$postcmd)
    {
        $params = $this->encrypt_params($home_id,$game_home,$mod,$exec_folder_path,$exec_path,$precmd,$postcmd);
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
    public function steam_cmd($home_id,$game_home,$mod,$modname,$betaname,$betapwd,$user,$pass,$guard,$exec_folder_path,$exec_path,$precmd,$postcmd,$cfg_os)
    {
        $params = $this->encrypt_params($home_id,$game_home,$mod,$modname,$betaname,$betapwd,$user,$pass,$guard,$exec_folder_path,$exec_path,$precmd,$postcmd,$cfg_os);
        $request = xmlrpc_encode_request("steam_cmd", $params);
        $response = $this->sendRequest($request);

        if ( $response === 1 )
            return 1;
        else if ( $response === 0 )
            return 0;
        else
            return -1;
    }
	
	/// Updates the mod located in the game home with master server.
    /// \return 1 If update started successfully
    /// \return 0 If error
    /// \return -1 In case of connection error.
    public function masterServerUpdate($home_id,$home_path,$ms_home_id,$ms_home_path,$exec_folder_path,$exec_path,$precmd,$postcmd)
    {
        $params = $this->encrypt_params($home_id,$home_path,$ms_home_id,$ms_home_path,$exec_folder_path,$exec_path,$precmd,$postcmd);
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
        $game_home = $this->encryptParam($game_home);
        $mod = $this->encryptParam($mod);
        $request = xmlrpc_encode_request("game_update_active", array($game_home, $mod));
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
        $pid = $this->encryptParam($pid);
        $request = xmlrpc_encode_request("is_file_download_in_progress", array($pid));
        $response = $this->sendRequest($request);
        return $response;
    }

    public function uncompress_file($file_location, $destination)
    {
        $params_array = $this->encrypt_params($file_location,$destination);
        $request = xmlrpc_encode_request("uncompress_file",$params_array);
        $response = $this->sendRequest($request);
        return $response;
    }

    /// \return -1 If could not connect to the remote host.
    /// \return -3 In case of unknown error
    /// \todo This function is not complete. Also the agent side requires work.
    public function start_rsync_install($home_id,$home_path,$url,$exec_folder_path,$exec_path,$precmd,$postcmd)
    {
        $params_array = $this->encrypt_params($home_id,$home_path,$url,$exec_folder_path,$exec_path,$precmd,$postcmd);
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
  	$params_array = $this->encrypt_params($home);
        $request = xmlrpc_encode_request("rsync_progress",$params_array);
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
        $request = xmlrpc_encode_request("dirlist", $args);
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
        $request = xmlrpc_encode_request("dirlistfm", $args);
        $response = $this->sendRequest($request);
        if ( $response === NULL )
            return -1;
        if (is_array($response) && xmlrpc_is_fault($response))
            return -3;
        if( $response < 0 )
            return -2;
        if ( $response == "" )
            return array();

        return explode(";", $response);
    }
    /// \returns the number of CPUs on the server
    /// \returns -1 If the server cannot be reached.
    public function cpu_count()
    {
        $request = xmlrpc_encode_request("cpu_count", NULL);
        $status = $this->sendRequest($request);
        if ( empty($status) )
        {
            return -1;
        }
        return $status;
    }

    public function renice_process($home_path, $nice)
    {
        $home_path = $this->encryptParam($home_path);
        $nice = $this->encryptParam($nice);
        $request = xmlrpc_encode_request("renice_process",
            array($home_path,$nice));
        $status = $this->sendRequest($response);
        return $status;
    }

    /// \return 1 If everything ok
    /// \return -1 If connection could not be established.
    /// \return -2 In other errors.
    /// \todo Other return values?
    public function universal_start($home_id, $game_home, $game_binary, $run_dir, $startup_cmd,
        $server_port, $server_ip, $cpu, $nice)
    {
        $params_array = $this->encrypt_params($home_id, $game_home, $game_binary,
            $run_dir, $startup_cmd, $server_port, $server_ip, $cpu, $nice);

        $request = xmlrpc_encode_request("universal_start", $params_array);
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
        $request = xmlrpc_encode_request("what_os", NULL);
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
        $request = xmlrpc_encode_request("discover_ips", $args);
        $status = $this->sendRequest($request);

        if ( $status == 0 )
            return array();

        $retval = explode(",",$status);
        return $retval;
    }

    /// \brief Checks if the server is running.
    /// \return 1 If is
    /// \return 0 If is not
    /// \return -1 If agent could not be reached.
    public function is_screen_running($screen_type,$home_id)
    {
        $params = $this->encrypt_params($screen_type,$home_id);
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
        $game_home_del = $this->encryptParam($game_home_del);
        $request = xmlrpc_encode_request("remove_home", $game_home_del);

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
			$home_path,$server_exe,$run_dir,$cmd,$cpu,$nice)
    {
        $params_array = $this->encrypt_params($home_id,$server_ip,$server_port,
			$control_protocol,$control_password,$control_type,
			$home_path,$server_exe,$run_dir,$cmd,$cpu,$nice);
		
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
	
	public function sudo_exec($update_ftp_users)
    {
        $params_array = $this->encrypt_params($update_ftp_users);
        $request = xmlrpc_encode_request("sudo_exec", $params_array);

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
			return $data;
        }
		return 0;
    }
	
	public function exec($command)
    {
        $params_array = $this->encrypt_params($command);
        $request = xmlrpc_encode_request("exec", $params_array);

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
        $params_array = $this->encrypt_params($path);
        $request = xmlrpc_encode_request("get_chattr", $params_array);

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
        $request = xmlrpc_encode_request("ftp_mgr", $params_array);

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
			return $data;
        }
		return 0;
    }
}
?>
