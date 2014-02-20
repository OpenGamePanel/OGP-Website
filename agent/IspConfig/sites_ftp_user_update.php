<?php
error_reporting(0);
require('soap_config.php');
$client = new SoapClient(null, array('location' => $soap_location,
                                     'uri'      => $soap_uri,
									 'trace' => 1,
									 'exceptions' => 1));
$session_id = $client->login($username,$password);
$client_id = 0;
chdir('ftp_users');
$username = $_GET['username'];
$ftp_user_id = file_get_contents($username);
//* Get the ftp user record
$ftp_user_record = $client->sites_ftp_user_get($session_id, $ftp_user_id);
if(isset($_GET['type']) AND $_GET['type'] == "password")
{
	$ftp_user_record['password'] = $_GET['password'];
}
else
{
	$settings = explode("\n",$_GET['password']);
	foreach($settings as $setting)
	{
		list($key,$value) = explode("\t",$setting);
		$ftp_user_record[$key] = $value;
	}
}
	
$client->sites_ftp_user_update($session_id, $client_id, $ftp_user_id, $ftp_user_record);	
$client->logout($session_id);
?>
