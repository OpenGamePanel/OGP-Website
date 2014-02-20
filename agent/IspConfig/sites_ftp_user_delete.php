<?php
error_reporting(0);
require('soap_config.php');
$client = new SoapClient(null, array('location' => $soap_location,
                                     'uri'      => $soap_uri,
									 'trace' => 1,
									 'exceptions' => 1));
$session_id = $client->login($username,$password);
chdir('ftp_users');
$username = $_GET['username'];
$ftp_user_id = file_get_contents($username);
$client->sites_ftp_user_delete($session_id, $ftp_user_id);
unlink($username);
$client->logout($session_id);
?>
