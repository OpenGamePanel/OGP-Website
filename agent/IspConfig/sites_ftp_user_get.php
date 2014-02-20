<?php
//error_reporting(0);
require('soap_config.php');
$client = new SoapClient(null, array('location' => $soap_location,
                                     'uri'      => $soap_uri,
									 'trace' => 1,
									 'exceptions' => 1));
$session_id = $client->login($username,$password);
chdir('ftp_users');
$username = $_GET['username'];
$ftp_user_id = file_get_contents($username);
$ftp_user_record = $client->sites_ftp_user_get($session_id, $ftp_user_id);
if(isset($_GET['type']) AND $_GET['type'] == "detail")
{
	foreach($ftp_user_record as $key => $value)
	{
		echo $key." : ".$value."\n";
	}
}
else
{
	echo $ftp_user_record['username']."\t".$ftp_user_record['dir']."/./\n";
}
?>
