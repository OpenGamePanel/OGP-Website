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
 
#functions go here

//read_expire() converts a time stamp to a human readable form
//Used as a count down to when the user's account expires
//Example would be User's account expires in 200 days, 20 hours, 18 minutes
function read_expire($endtime)
{
	#Feed the user's expire time stamp to this, and it returns a human readable date
	if($endtime == 'X')
	{
		$timediff = 'X';
		return $timediff;
	}

	//Thanks to manhon824 at gmail dot com - found on http://us2.php.net/manual/en/function.mktime.php
	$starttime=time();
	// the start time can change to =strtotime($endtime);
	//$endtime=strtotime($expires);
	// $endtime = $expires;
	//$endtime can be any format as well as it can be converted to secs

	$timediff = $endtime-$starttime;
	$days=intval($timediff/86400);
	$remain=$timediff%86400;
	$hours=intval($remain/3600);
	$remain=$remain%3600;
	$mins=intval($remain/60);
	$secs=$remain%60;

	//this code is copied from the other note!thx to that guy!
	$stampdiff = $timediff;
	$timediff=$days.' days '.$hours.' hr '.$mins.' min ';
	return $timediff;
}

function genRandomString($length) {
	$characters = "0123456789abcdefghijklmnopqrstuvwxyz";
	$string = "";	
	for ($p = 0; $p < $length; $p++) {
		$string .= $characters[mt_rand(0, strlen($characters)-1)];
	}
	return $string;
}

function get_map_path($query_name,$mod,$map) {
	
	$mod_gt = $mod;
	
	if($mod == "cstrike")
	{
		if ($query_name == "halflife")
			$mod_gt = "cs";
		elseif($query_name == "source")
			$mod_gt = "css";
	}
	if($mod == "tf")
	{
		if ($query_name == "halflife")
			$mod_gt = "tf";
		elseif($query_name == "source")
			$mod_gt = "tf2";
	}
	
	$mod_gt = $mod == "fof" ? "hl2dm" : $mod_gt;
	$mod_gt = $mod == "insurgency" ? "ins" : $mod_gt;
	$mod_gt = $mod == "redorchestra2" ? "ro2" : $mod_gt;
	$mod_gt = $mod == "killingfloor2" ? "kf2" : $mod_gt;
	$mod_gt = $query_name == "7dtd" ? "7daystodie" : $mod_gt;
	$mod_gt = $query_name == "callofduty" ? "cod" : $mod_gt;
	$mod_gt = $query_name == "callofdutyuo" ? "uo" : $mod_gt;
	$mod_gt = $query_name == "callofduty2" ? "cod2" : $mod_gt;
	$mod_gt = $query_name == "callofduty4mw" ? "cod4" : $mod_gt;
	$mod_gt = $query_name == "callofdutywaw" ? "codww" : $mod_gt;
	$mod_gt = $query_name == "callofdutymw3" ? "mw3" : $mod_gt;
	$mod_gt = $query_name == "conanexiles" ? "conan" : $mod_gt;

	$map_paths= array(
		"https://image.gametracker.com/images/maps/160x120/$mod_gt/$map.jpg",
		"https://image.gametracker.com/images/maps/160x120/$query_name/$map.jpg",
		"protocol/lgsl/maps/$query_name/$mod/$map.jpg",
		"protocol/lgsl/maps/$query_name/$mod/$map.gif",
		"protocol/lgsl/maps/$query_name/$mod/$map.png",
		"protocol/lgsl/maps/$query_name/$map.jpg",
		"protocol/lgsl/maps/$query_name/$map.gif",
		"protocol/lgsl/maps/$query_name/$map.png",
		"images/online_big.png"
	);

	return get_first_existing_file($map_paths, 'http://gametracker.com', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0');
}

// Thanks adjo (http://opengamepanel.org/forum/viewthread.php?thread_id=5209#post_25073)
function curlCacheImage($cachePath, $resource){
   if(preg_match('/^(https?:\/\/)/', $resource)){
      $map = explode('/', $resource);
      
      if(!file_exists($cachePath . '/cache/' . end($map))){
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0');
         curl_setopt($ch, CURLOPT_REFERER, 'http://gametracker.com');
         curl_setopt($ch, CURLOPT_URL, $resource);
         $result = curl_exec($ch);
         curl_close($ch);
         
         file_put_contents($cachePath . '/cache/' . end($map), $result);
      }
      
      return $cachePath . '/cache/' . end($map);
   }
   
   return $resource;
}

//Refreshed Div:


//Below is under construction:
// Usage: $data .= PopupData($id);
// PopupBuild($data);
function PopupTrigger($id){
	return "<a href='#' class='ex".$id."trigger'></a>";
}

function PopupData($id,$link){//Trigger: ex($id)trigger
	return "$('#ex".$id."').jqm({ajax: '$link', trigger: 'a.ex".$id."trigger'});";
}

function PopupBuild($data){
	return "<script type='text/javascript'>$(document).ready(function()\{".$data."\});</script>";
}

function create_home_selector($module, $subpage, $server_homes) {	
	if ($server_homes == "show_all")
	{
		echo "<form method='GET' action=''>\n";
		echo "<input type='hidden' name='m' value='".$module."' />\n";
		if( $subpage ) echo "<input type='hidden' name='p' value='".$subpage."' />\n";
		echo "<input type='SUBMIT' value='" . get_lang('show_all') . "'/>\n";
		echo "</form>\n";
	}
	else
	{
		foreach ($server_homes as $key => $row) {
			$home_name[$key] = $row['home_name'];
			$home_id[$key] = $row['home_id'];
			$mod_id[$key] = $row['home_id'];
			$ip[$key] = $row['ip'];
			$port[$key] = $row['port'];
		}
		
		array_multisort($home_name, $ip, $port, $mod_id, $home_id, SORT_DESC, $server_homes);
		
		echo "<form method='GET' name='select' action=''>\n";
		echo "<input type='hidden' name='m' value='".$module."' />\n";
		if( $subpage ) echo "<input type='hidden' name='p' value='".$subpage."' />\n";
		echo "<select onchange=".'"this.form.submit()"'." name='home_id'>\n";
		echo "<option></option>\n";
		foreach ( $server_homes as $server_home )
		{
			if( isset( $_GET['home_id'] ) and $_GET['home_id'] == $server_home['home_id'] )
				$selected = 'selected="selected"';
			else
				$selected = '';
			echo "<option value='". $server_home['home_id'] . "' $selected >" . htmlentities($server_home['home_name']) . "</option>\n";
		}
		echo "</select>\n";
		echo "</form>";
	}
}

function create_home_selector_address($module, $subpage, $server_homes, $extra_inputs = FALSE, $method = "GET") {
	if( isset($_GET['home_id-mod_id-ip-port']) and $_GET['home_id-mod_id-ip-port'] != "" )
	{
		list($get_home_id,
			 $get_mod_id,
			 $get_ip,
			 $get_port) = explode( "-", $_GET['home_id-mod_id-ip-port'] );
	}
	echo "<form method='$method' name='select' action=''>\n";
	echo "<input type='hidden' name='m' value='$module' />\n";
	if( $subpage ) echo "<input type='hidden' name='p' value='".$subpage."' />\n";
	if($extra_inputs)
	{
		foreach($extra_inputs as $input)
		{
			echo "<input type='$input[type]' name='$input[name]' value='$input[value]' />\n";
		}
	}
	echo "<select onchange=\"this.form.submit();\" name='home_id-mod_id-ip-port'>\n";
	echo "<option></option>\n";
	foreach ($server_homes as $key => $row) {
		if( !isset($row['ip']) or !isset($row['mod_id']) )
		{
			unset($server_homes[$key]);
			continue;
		}
		$home_name[$key] = $row['home_name'];
		$home_id[$key] = $row['home_id'];
		$mod_id[$key] = $row['home_id'];
		$ip[$key] = $row['ip'];
		$port[$key] = $row['port'];
	}
	array_multisort($home_name, $ip, $port, $mod_id, 
					$home_id, SORT_DESC, $server_homes);
	foreach ( $server_homes as $server_home )
	{
		$display_ip = checkDisplayPublicIP($server_home['display_public_ip'],$server_home['ip'] != $server_home['agent_ip'] ? $server_home['ip'] : $server_home['agent_ip']);

		if(isset($_GET['home_id-mod_id-ip-port']) and 
		   $get_home_id == $server_home['home_id'] and 
		   $get_mod_id == $server_home['mod_id'] and 
		   $get_ip == $server_home['ip'] and 
		   $get_port == $server_home['port'])
			$selected = 'selected="selected"';
		else
			$selected = '';
		echo "<option value='". $server_home['home_id'] .
			 "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . 
			 "-" . $server_home['port'] . "' $selected >" . 
			 htmlentities($server_home['home_name']) . " - " . $display_ip .
			 ":" . $server_home['port'] . "</option>\n";
	}
	echo "</select>\n";
	echo "</form>";	
}

function create_home_selector_game_type($module, $subpage, $server_homes) {
	echo "<form method='GET' name='select' action=''>\n".
		 "<input type='hidden' name='m' value='".$module."' />\n";
	if( $subpage != "" ) echo "<input type='hidden' name='p' value='".$subpage."' />\n";
	echo "<select onchange=".'"this.form.submit()"'." name='home_cfg_id'>\n".
		 "<option>".get_lang('game_type')."</option>\n";
	
	$servers_by_game_name = array();
	foreach( $server_homes as $server_home )
	{
		if( !isset($server_home['ip']) or !isset($server_home['mod_id']) )
			continue;
		$servers_by_game_name["$server_home[game_name]"] = $server_home['home_cfg_id'];
	}
	ksort($servers_by_game_name);
	
	foreach( $servers_by_game_name as $game_name => $home_cfg_id )
	{
		$selected = (isset($_GET['home_cfg_id']) and $_GET['home_cfg_id'] == $home_cfg_id) ? 'selected="selected"' : "";
		echo "<option value='". $home_cfg_id . "' $selected >" . $game_name . "</option>\n";
	}
	echo "</select>\n</form>\n";
}

function mymail($email_address, $subject, $message, $panel_settings, $user_to_panel = FALSE){
	global $view;
	if( empty( $panel_settings['panel_name'] ) )
		$panel_name = "Open Game Panel";
	else
		$panel_name = $panel_settings['panel_name'];
	
	// PHP Mailer
	require_once("PHPMailer/class.phpmailer.php");
	require_once("PHPMailer/class.smtp.php");
	
	// Create the mail object using the Mail::factory method
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

	$mail->IsSMTP(); // telling the class to use SMTP
	
	$mymail = TRUE;
	
	try 
	{
		$mail->SMTPDebug  = 0;					// enables SMTP debug information (for testing)
												  // 1 = errors and messages
												  // 2 = messages only
		// SMTP server
		if (isset($panel_settings['smtp_server']) and !empty($panel_settings['smtp_server']))
			$mail->Host = $panel_settings['smtp_server'];
		else
			$mail->Host = 'localhost';
		  
		// set the SMTP port
		if (isset($panel_settings['smtp_port']) and !empty($panel_settings['smtp_port']))
			$mail->Port = $panel_settings['smtp_port'];
		else
			$mail->Port = 25;
		
		// sets the prefix to the servier
		if (isset($panel_settings['smtp_ssl']) and $panel_settings['smtp_ssl'] == 1)
			$mail->SMTPSecure = "ssl";
		elseif (isset($panel_settings['smtp_tls']) and $panel_settings['smtp_tls'] == 1)
			$mail->SMTPSecure = "tls";
		if (isset($panel_settings['smtp_login']) and !empty($panel_settings['smtp_login']))
		{
			// enable SMTP authentication
			$mail->SMTPAuth = true;
			// SMTP username
			$mail->Username = $panel_settings['smtp_login'];
			if (isset($panel_settings['smtp_passw']) and !empty($panel_settings['smtp_passw']))
			{
				// SMTP password
				$mail->Password = $panel_settings['smtp_passw'];
			}
		}
		
		if(empty($panel_settings['panel_email_address'])){
			$panel_email = "noreply@opengamepanel.org";
		}else{
			$panel_email = $panel_settings['panel_email_address'];
		}
		
		$email_addresses = explode( ",", $email_address );	
				
		if( $user_to_panel )
		{
			$mail->AddAddress($panel_email);
			$user_to_panel = is_bool($user_to_panel) ? "" : $user_to_panel; // True boolean or user name string
			foreach ( $email_addresses as $address ) 
			{
				$mail->SetFrom($address,$user_to_panel);
				$mail->AddReplyTo($address,$user_to_panel);
			}
		}
		else // panel to user
		{
			foreach ( $email_addresses as $address ) 
			{
				$mail->AddAddress($address);
			}
			$mail->SetFrom($panel_email,$panel_name);
			$mail->AddReplyTo($panel_email,$panel_name);
		}
		
		$mail->CharSet = $view->charset;
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
        );
		$mail->Send();
		
	}
	catch (phpmailerException $e) 
	{
		$mymail = FALSE;
		echo $e->errorMessage(); //Pretty error messages from PHPMailer
	}
	catch (Exception $e) 
	{
		$mymail = FALSE;
		echo $e->getMessage(); //Boring error messages from anything else!
	}
		
	return $mymail;
}

if( !function_exists("sys_get_temp_dir") )
{
	function sys_get_temp_dir(){
		if ($temp = getenv('TMP') ) {
			if (file_exists($temp)) { return realpath($temp); }
		}
		if ($temp = getenv('TEMP') ) {
			if (file_exists($temp)) { return realpath($temp); }
		}
		if ($temp = getenv('TMPDIR') ) {
			if (file_exists($temp)) { return realpath($temp); }
		}

		// trick for creating a file in system's temporary dir
		// without knowing the path of the system's temporary dir
		$temp = tempnam(__FILE__, '');
		if (file_exists($temp)) {
			unlink($temp);
			return realpath(dirname($temp));
		}

		return null;
	}	
}

function set_firewall($remote, $firewall_settings, $action, $port, $ip = FALSE)
{
	if($action == "allow" or $action == "deny")
	{
		if($ip)
			$command = str_replace("%IP%",$ip,str_replace("%PORT%",$port,$firewall_settings[$action.'_ip_port_command']));
		else
			$command = str_replace("%PORT%",$port,$firewall_settings[$action.'_port_command']);
	}
	if(isset($command))
		return $remote->sudo_exec($command);
	else 
		return FALSE;
}

function strip_real_escape_string($text)
{
	$search = array('\"', "\'", "\\r", "\\n","\\\\");
	$replace = array('"', "'", "\r", "\n", '\\');
	$text = str_replace($search, $replace, $text);
	return $text;
}

function get_true_boolean($bool)
{
	if ( (int) $bool > 0 )
		$ret = true;
	else
	{
		$lowered_bool = strtolower($bool); // that could be 'True' or 'true' or 'TRUE', etc...
		if( $lowered_bool === "true" || $lowered_bool === "on" || $lowered_bool === "yes" )
			$ret = true;
		else
			$ret = false;
	}
	return $ret;
}

function get_temp_dir($curdir)
{
	$temp = sys_get_temp_dir();
	if( ini_get('open_basedir') )
	{
		$dirs = preg_split( "/:|;/", ini_get('open_basedir') , -1, PREG_SPLIT_NO_EMPTY );
		if( !in_array($temp, $dirs) )
			$temp = $curdir  . DIRECTORY_SEPARATOR . 'temp';
	}
	if( $temp == null )
		$temp = $curdir  . DIRECTORY_SEPARATOR . 'temp';
	if( !file_exists($temp) )
		if( is_writable( dirname($temp) ) ) mkdir($temp);
	return $temp;
}

// ### Escape some characters that could break the server startup or make the user capable to run other programs. ###
// \ (backslash) ->  At the end of the string, can scape the next quote, 
// 	                 and is commonly used to create Windows paths, must be escaped.
// " (quote) -> Not escaped quote, without an ending quote, would break the startup command.
// ' (single quote) -> same than quote.
// | (pipe) -> Not escaped pipe would break the startup command and could use the next argument as new command.
// & (ampersand) -> Same than pipe. If double ampersand is used it would run the command (if any) once the server process ends.
// ; (semicolon) -> Same than double ampersand.
// > (greater than) -> Could redirect the server output and ignore the next arguments.
// < (lower than) -> Could send the content of a file to the server executable and ignore the the next arguments.
// ` (apostrophe) -> Could get the return value of a given (system) command or variable.
// $ (¿sigil?) -> Same than apostrophe.
// ( and ) (parenthesis) -> starts or ends a bash/batch statement, could break the server startup
// [ and ] (test) -> test is part of bash language, could break the server startup
function clean_server_param_value($value, $cli_allow_chars) {
	$value = strip_real_escape_string($value);
	$escape_chars = array("\\", "\"", "'", "|", "&", ";", ">", "<", "`", "$", "(", ")", "[", "]");
	if($cli_allow_chars)
	{
		$cli_allow_chars = str_split($cli_allow_chars);
		$escape_chars = array_diff($escape_chars, $cli_allow_chars);
	}
	$find = array();
	$repl = array();
	foreach($escape_chars as $char)
	{
		$find[] = '%'.preg_quote($char).'%';
		$char = $char == '\\' ? preg_quote('\\\\') : $char;
		$repl[] = '\\'.$char;
	}
	return preg_replace($find, $repl, $value);
}

// ### Validate FTP user/password and control_protocol_password. ###
function validate_login($value) {
	$value = strip_real_escape_string($value);
	$value = trim($value);
	$find = '%\\\\|"|\||&|;|>|<|`|\$|\s%';
	return preg_match($find, $value) ? FALSE : $value;
}

// Order a multidimensional array by keys. Source http://php.net/manual/es/function.array-multisort.php#100534
function array_orderby()
{
	$args = func_get_args();
	$data = array_shift($args);
	foreach ($args as $n => $field)
	{
		if (is_string($field))
		{
			$tmp = array();
			foreach ($data as $key => $row)
				$tmp[$key] = $row[$field];
			$args[$n] = $tmp;
		}
	}
	$args[] = &$data;
	call_user_func_array('array_multisort', $args);
	return array_pop($args);
}

// Escape a single quote or multiple single quotes 
// in a string that is passed to bash 
// and this string is single quoted
function esc_squote($str)
{
	return preg_replace("#('+)#", "'\"\${1}\"'", $str);
}

function get_game_selector($os, $game_cfgs, $home_cfg_id = FALSE)
{
	if(preg_match("/64/", $os))
	{
		$arch_64_bit = true;
	}
	if(preg_match("/linux/i", $os))
	{
		if(preg_match("/wine/i", $os))
		{
			$os_match = $arch_64_bit ? '/(win|linux)(32|64)?$/i' : '/(win|linux)(32)?$/i';
		}
		else
		{
			$os_match = $arch_64_bit ? '/(linux)(32|64)?$/i' : '/(linux)(32)?$/i';
		}
	}
	elseif(preg_match("/cygwin/i", $os))
	{
		$os_match = $arch_64_bit ? '/(win)(32|64)?$/i' : '/(win)(32)?$/i';
	}
	else
	{
		$os_match = '/(win|linux)(32|64)?$/i';
	}
	
	$selector = "";
	foreach ( $game_cfgs as $row )
	{
		if ( preg_match($os_match, $row['game_key'], $matches) )
		{ 
			$selector .= "<option value='".$row['home_cfg_id']."' ".
						 ($home_cfg_id == $row['home_cfg_id'] ? 'selected="selected"' : "").
						 ">".$row['game_name'].
						 (preg_match('/^linux$/i', $matches[1]) ? " (Linux" : " (Windows").
						 ((isset($matches[2]) and $matches[2] == '64') ? " 64bit)" : ")").
						 "</option>\n";
		}
	}
	
	return $selector;
}

function getClientIPAddress(){
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP']) && !empty($_SERVER['HTTP_CF_CONNECTING_IP'])){
		return $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else if(isset($_SERVER['HTTP_X_REAL_IP']) && !empty($_SERVER['HTTP_X_REAL_IP'])){
		return $_SERVER['HTTP_X_REAL_IP'];
	}else{
		return $_SERVER['REMOTE_ADDR'];
	}
}

function getOGPSiteURL(){
	$url = '';
	$scheme = ( isset($_SERVER['HTTPS']) and get_true_boolean($_SERVER['HTTPS']) ) ? "https://" : "http://";
	$url .= $scheme;
	
	if(strtolower($_SERVER['HTTP_HOST']) == "localhost"){
		$ip = getRemoteIPAddressFromSite('http://grabip.tk/');
		if(!hasValue($ip)){
			if(cURLEnabled()){
				$ipOfServer = get_headers_curl("http://grabip.tk/", $referrer, $agent);
				if(hasValue($ipOfServer) && is_array($ipOfServer)){
					$ipOfServer = $ipOfServer[0];
					if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $ipOfServer, $ip_match)) {
						$ipStr = $ip_match[0];
						if(isValidIP($ipStr) && !isPrivateIp($ipStr)){
							$ip = $ipStr;
						}
					}

				}
			}
		}
	}
	
	if(isset($ip) and !empty($ip)){
		$url .= $ip;
	}else{
		$url .= $_SERVER['HTTP_HOST'];
	}
	
	if(!empty($_SERVER['REQUEST_URI'])){
		$lastSlash = strrpos($_SERVER['REQUEST_URI'], "/");
		if($lastSlash !== false){
			$url .= substr($_SERVER['REQUEST_URI'], 0, $lastSlash);
		}
	}	
	
	if(!empty($url)){
		return $url;
	}
	
	return false;
}

function getRemoteIPAddressFromSite($site){
	$str = "";
	if(isset($site) && !empty($site)){
		$str=trim(file_get_contents($site));
		// Look for an IP
		if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $str, $ip_match)) {
			$ip = $ip_match[0];
			if(isValidIP($ip) && !isPrivateIp($ip)){
				$str = $ip;
			}
		}
	}
	return $str;
}

function isValidIP($ip){
	if(preg_match( "/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/", $ip)){
		return True;
	}else{
		return False;
	}
}

function isPrivateIp($ip){
	if(is_array($ip)) {
		$ret=false;
		foreach($ip as $i)
			$ret=$ret or isPrivateIp($i);
		return $ret;
	}
	return (substr($ip,0,7)=='192.168' or substr($ip,0,6)=='172.16' or substr($ip,0,3)=='10.');
}

function hasValue($val, $zeroAllowed = false){
	if(isset($val) && !empty($val)){
		return true;
	}else{
		if($zeroAllowed == true && $val == 0){
			return true;
		}else{
			return false;
		}
	}
}

function paginationPages($pageResults, $currentPage, $perPage, $pageUri, $pagesShown, $classPrefix) {
	$pagination = '<div id="pagination">';

	if ($pageResults > $perPage) {

		$totalPages = ceil($pageResults/$perPage);
		$pageStart = (($currentPage - $pagesShown) > 0) ? $currentPage - $pagesShown : 1;
		$pageEnd = (($currentPage + $pagesShown) < $totalPages) ? $currentPage + $pagesShown : $totalPages;
		
		if ($pageStart > 1) {
			$pagination .= '<span class="'.$classPrefix.'_paginationStart">
				<a href="'.$pageUri . ($currentPage-1) .'" class="'.$classPrefix.'_previousPageLink">&laquo;</a>
				<a href="'.$pageUri .'1" class="'.$classPrefix.'_firstPageLink">1</a>
				<span class='.$classPrefix.'_divider">&hellip;</span>
			</span>';
		}

		$pagination .= '<span class="'.$classPrefix.'_paginationPages">';

		for ($i=$pageStart; $i<=$pageEnd; ++$i) {
		
			if ($currentPage == $i) {
				$pagination .= '<a href="'.$pageUri . $i .'" class="'.$classPrefix.'_currentPageLink">['.$i.']</a>';
			} else {
				$pagination .= '<a href="'.$pageUri . $i .'" class="'.$classPrefix.'_pageLinks">'.$i.'</a>';
			}
		
				$pagination .= ($i < $pageEnd) ? ', ' : ' ';
		}

		$pagination .= '</span>';

		if ($pageEnd < $totalPages) {
			$pagination .= '<span class="'.$classPrefix.'_paginationEnd">
				<span class='.$classPrefix.'_divider">&hellip;</span>
				<a href="'.$pageUri . $totalPages .'" class="'.$classPrefix.'_lastPageLink">'.$totalPages.'</a>
				<a href="'.$pageUri . ($currentPage+1) .'" class="'.$classPrefix.'_nextPageLink">&raquo;</a>
			</span>';
		}

	}

	$pagination .= '</div>';
	return $pagination;

}

function checkDisplayPublicIP($display_public_ip,$internal_ip){

	// Set Cache Timer in Seconds
	$cache_timer = 600;
	
	// Exit Function when External IP is Internal IP or when Display Public IP is not set
	if($display_public_ip==$internal_ip || empty($display_public_ip)){
		return $internal_ip;
	}

	if(!isset($_SESSION['gethostbyname_cache'])){
		$_SESSION['gethostbyname_cache'] = array();
	}
	
	if(filter_var($display_public_ip, FILTER_VALIDATE_IP)){
		return $display_public_ip;
	}else{
		if(!array_key_exists($display_public_ip, $_SESSION['gethostbyname_cache'])){
			$_SESSION['gethostbyname_cache'][$display_public_ip] = array();
			$dns_check = dns_get_record($display_public_ip, DNS_A);
			$ipcheck = isset($dns_check[0]['ip']) ? $dns_check[0]['ip'] : $internal_ip;
			if($ipcheck!=$display_public_ip){
				$_SESSION['gethostbyname_cache'][$display_public_ip]['ip'] = $ipcheck;
				$_SESSION['gethostbyname_cache'][$display_public_ip]['stamp'] = time();
			}else{
				unset($_SESSION['gethostbyname_cache'][$display_public_ip]);
				return $internal_ip;
			}
		}else{
			if((time()-$_SESSION['gethostbyname_cache'][$display_public_ip]['stamp'])>=$cache_timer){
				$dns_check = dns_get_record($display_public_ip, DNS_A);
				$ipcheck = isset($dns_check[0]['ip']) ? $dns_check[0]['ip'] : $internal_ip;
				if($ipcheck!=$display_public_ip){
					$_SESSION['gethostbyname_cache'][$display_public_ip]['ip'] = $ipcheck;
					$_SESSION['gethostbyname_cache'][$display_public_ip]['stamp'] = time();
				}else{
					unset($_SESSION['gethostbyname_cache'][$display_public_ip]);
					return $internal_ip;
				}
			}
		}
		if(filter_var($_SESSION['gethostbyname_cache'][$display_public_ip]['ip'], FILTER_VALIDATE_IP)){
			return $_SESSION['gethostbyname_cache'][$display_public_ip]['ip'];
		}
	}
	return $internal_ip;
}

function startsWith($haystack, $needle) {
	// search backwards starting from haystack length characters from the end
	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
	// search forward starting from end minus needle length characters
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

// Super ingenious function from https://stackoverflow.com/questions/5519630/php-preg-replace-x-occurence#answer-17047405
function preg_replace_nth($pattern, $replacement, $subject, $nth=1) {
    return preg_replace_callback($pattern,
        function($found) use (&$pattern, &$replacement, &$nth) {
                $nth--;
                if ($nth==0) return preg_replace($pattern, $replacement, reset($found) );
                return reset($found);
        }, $subject,$nth);
}

// https://stackoverflow.com/questions/12559878/multidimensional-array-find-item-and-move-to-the-top
function customShift($array, $keyToMoveOn, $valueToMoveOn){
    foreach($array as $key => $val){
        if($val[$keyToMoveOn] == $valueToMoveOn){
            unset($array[$key]); 
            array_unshift($array, $val); 
            return $array;               
        }
    }
    
    return $array;
}

function getURLParam($param, $url){
	if(stripos($url, $param) !== false){
		
		$param = substr($url, stripos($url, $param) + strlen($param));
		if(stripos($param, "&")){
			$param = substr($param, 0, stripos($param, "&"));
		}
	
		return $param;
	}
	
	return false;
}

function utf8ize($d, $htmlEntities = true) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v, $htmlEntities);
        }
    } else if (is_string ($d)) {
		if($htmlEntities){
			$d = htmlentities($d);
		}
        return utf8_encode($d);
    }
    return $d;
}

function preReqInstalled($prereq){
	if (($prereq['type'] === "f" && function_exists($prereq['value'])) || ($prereq['type'] === "c" && class_exists($prereq['value'])) || ($prereq['type'] === "x" && extension_loaded($prereq['value']))){
		return true;
	}
	return false;
}

if (!function_exists('boolval')) {
	function boolval($val) {
		return (bool) $val;
	}
}

function getThemePath()
{
	global $settings;
	$path = "";
	if ( isset($_SESSION['users_theme']) &&
		!empty($_SESSION['users_theme']) &&
		is_dir( 'themes/'.$_SESSION['users_theme'] ) &&
		is_file( 'themes/'.$_SESSION['users_theme'].'/layout.html') )
	{
		$path = 'themes/'.$_SESSION['users_theme'].'/';
	}
	// Using default theme if there is not one selected.
	else if ( !isset($settings['theme']) )
	{
		$path = 'themes/Revolution/';
	}
	else if ( is_dir( 'themes/'.$settings['theme'] ) &&
		is_file( 'themes/'.$settings['theme'].'/layout.html') )
	{
		$path = 'themes/'.$settings['theme'].'/';
	}
	// In case the theme that was selected is invalid print error and use default.
	else
	{
		$path = 'themes/Revolution/';
	}
	return $path;
}

function updateAllPanelModules(){
	global $db;
	if(file_exists('modules/modulemanager/module_handling.php')){
		require_once('modules/modulemanager/module_handling.php');

		$modules = $db->getInstalledModules();
		// update module manager first
		foreach ( $modules as $row )
		{
			if($row['folder'] == 'modulemanager')
			{
				update_module($db, $row['id'], $row['folder']);
				break;
			}
		}
		
		foreach ( $modules as $row )
		{
			if($row['folder'] == 'modulemanager')//already updated
				continue;
			update_module($db, $row['id'], $row['folder']);
		}
	}
}

function getRemoteContent($url, $timeout = 5, $referrer = ""){
	$useCURL = false;
	$agent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0';
	
	try{
		$currentTimeout = ini_get('default_socket_timeout');
		ini_set('default_socket_timeout', $timeout); // Timeout in seconds
			
		$streamOptions = array(
			'http' => array(
				'method' => 'GET',
				'user_agent' => $agent,
				'timeout' => ($timeout + 3) // https://stackoverflow.com/questions/10236166/does-file-get-contents-have-a-timeout-setting#answer-10236480
			),
			'ssl'=> array(
				'verify_peer' => false,
				'verify_peer_name' => false,
			)
		);
		
		if(!empty($referrer)){
			$streamOptions['header'] = array("Referer: $referer\r\n");
		}
		
		stream_context_set_default($streamOptions);
		
		$content = file_get_contents($url);
		if(empty($content) || strlen($content) <=5){
			$useCURL = true;
		}else{
			ini_set('default_socket_timeout', $currentTimeout); // Set it back to the original
			return $content;
		}
	}catch (Exception $e) {
		$useCURL = true;
	}
	
	if($useCURL && cURLEnabled()){
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_TIMEOUT, ($timeout + 3));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			if(!empty($referrer)){
				curl_setopt($ch, CURLOPT_REFERER, $referrer);
			}
			$data = curl_exec($ch);
			curl_close($ch);
			if(!empty($data)){
				return $data;
			}
		} catch (Exception $e) {
				
		}
	}
	
	return false;
}
?>
