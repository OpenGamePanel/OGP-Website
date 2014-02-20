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
		
	$mod_gt = $query_name == "callofduty" ? "cod" : $mod_gt;
	$mod_gt = $query_name == "callofduty2" ? "cod2" : $mod_gt;
	$mod_gt = $query_name == "callofduty4" ? "cod4" : $mod_gt;
	
	$map_paths= array("protocol/lgsl/maps/$query_name/$mod/$map.jpg",
				 "protocol/lgsl/maps/$query_name/$mod/$map.gif",
				 "protocol/lgsl/maps/$query_name/$mod/$map.png",
				 "protocol/lgsl/maps/$query_name/$map.jpg",
				 "protocol/lgsl/maps/$query_name/$map.gif",
				 "protocol/lgsl/maps/$query_name/$map.png",
				 "http://image.www.gametracker.com/images/maps/160x120/$mod_gt/$map.jpg",
				 "http://image.www.gametracker.com/images/maps/160x120/$query_name/$map.jpg",
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
			echo "<option value='". $server_home['home_id'] . "' $selected >" . $server_home['home_name'] . "</option>\n";
		}
		echo "</select>\n";
		echo "</form>";
	}
}

function create_home_selector_address($module, $subpage, $server_homes) {
	if( isset($_GET['home_id-mod_id-ip-port']) and $_GET['home_id-mod_id-ip-port'] != "" )
	{
		$pieces = explode( "-", $_GET['home_id-mod_id-ip-port'] );
		$post_home_id = $pieces[0];
		$post_mod_id = $pieces[1];
		$post_ip = $pieces[2];
		$post_port = $pieces[3];
	}
	echo "<form method='GET' name='select' action=''>\n";
	echo "<input type='hidden' name='m' value='".$module."' />\n";
	if( $subpage ) echo "<input type='hidden' name='p' value='".$subpage."' />\n";
	echo "<select onchange=".'"this.form.submit()"'." name='home_id-mod_id-ip-port'>\n";
	echo "<option></option>\n";
	
	foreach ($server_homes as $key => $row) {
		$home_name[$key] = $row['home_name'];
		$home_id[$key] = $row['home_id'];
		$mod_id[$key] = $row['home_id'];
		$ip[$key] = $row['ip'];
		$port[$key] = $row['port'];
		
	}

	array_multisort($home_name, $ip, $port, $mod_id, $home_id, SORT_DESC, $server_homes);
	
	foreach ( $server_homes as $server_home )
	{
		if(isset($_GET['home_id-mod_id-ip-port']) and $post_home_id == $server_home['home_id'] and $post_mod_id == $server_home['mod_id'] and $post_ip == $server_home['ip'] and $post_port == $server_home['port'])
			$selected = 'selected="selected"';
		else
			$selected = '';
		echo "<option value='". $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' $selected >" . $server_home['home_name'] . " - " . $server_home['ip'] . ":" . $server_home['port'] . "</option>\n";
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

function mymail($email_address, $subject, $message, $panel_settings, $reply_to_sender = FALSE){
		
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
		$mail->SMTPDebug  = 0;                    // enables SMTP debug information (for testing)
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
		
		if (isset($panel_settings['smtp_login']) and !empty($panel_settings['smtp_login']))
		{
			// SMTP username
			$mail->Username = $panel_settings['smtp_login'];
			
			if (isset($panel_settings['smtp_passw']) and !empty($panel_settings['smtp_passw']))
			{
				// SMTP password
				$mail->Password = $panel_settings['smtp_passw'];
				// enable SMTP authentication
				$mail->SMTPAuth = true;
			}
		}
		
		$email_addresses = explode( ",", $email_address );
		
		foreach ( $email_addresses as $address ) 
		{
			$mail->AddAddress($address);
		}
		
		if(empty($panel_settings['panel_email_address'])){
			$panel_email = "noreply@opengamepanel.org";
		}else{
			$panel_email = $panel_settings['panel_email_address'];
		}
		
		if(!$reply_to_sender)
		{
			$mail->SetFrom($panel_email,$panel_name);
			$mail->AddReplyTo($panel_email,$panel_name);
		}
		else
		{
			$mail->SetFrom($email_address,$reply_to_sender);
			$mail->AddReplyTo($email_address,$reply_to_sender);
		}
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

$utc = new DateTimeZone('UTC');
$dt = new DateTime('now', $utc);
if( !method_exists($dt, 'getTimestamp') )
{
	require('includes/datetime_52.class.php');
}
?>

