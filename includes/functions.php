<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2014 The OGP Development Team
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
	$mod_gt = $query_name == "callofduty" ? "cod" : $mod_gt;
	$mod_gt = $query_name == "callofduty2" ? "cod2" : $mod_gt;
	$mod_gt = $query_name == "callofduty4" ? "cod4" : $mod_gt;
	$mod_gt = $query_name == "killingfloor" ? "killingfloor" : $mod_gt;

	$map_paths= array(
		"http://image.www.gametracker.com/images/maps/160x120/$mod_gt/$map.jpg",
		"http://image.www.gametracker.com/images/maps/160x120/$query_name/$map.jpg",
		"protocol/lgsl/maps/$query_name/$mod/$map.jpg",
		"protocol/lgsl/maps/$query_name/$mod/$map.gif",
		"protocol/lgsl/maps/$query_name/$mod/$map.png",
		"protocol/lgsl/maps/$query_name/$map.jpg",
		"protocol/lgsl/maps/$query_name/$map.gif",
		"protocol/lgsl/maps/$query_name/$map.png",
		"images/online_big.png"
	);

	return get_first_existing_file($map_paths);
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
			 htmlentities($server_home['home_name']) . " - " . $server_home['ip'] .
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
		
	include('PHPMailer/class.phpmailer.php');
		
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
?>
