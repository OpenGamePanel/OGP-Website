<?php
error_reporting(0);
require('soap_config.php');
$client = new SoapClient(null, array('location' => $soap_location,
                                     'uri'      => $soap_uri,
									 'trace' => 1,
									 'exceptions' => 1));
$session_id = $client->login($username,$password);
$client_id = 0;
$username = $_GET['username'];
$password = $_GET['password'];
$dir = $_GET['dir'];
$uid = $_GET['uid'];
$gid = $_GET['gid'];
$params = array(
		'server_id' => 1,
		'parent_domain_id' => 1,
		'username' => $username,
		'password' => $password,
		'quota_size' => -1,
		'active' => 'y',
		'uid' => $uid,
		'gid' => $gid,
		'dir' => $dir,
		'quota_files' => -1,
		'ul_ratio' => -1,
		'dl_ratio' => -1,
		'ul_bandwidth' => -1,
		'dl_bandwidth' => -1
		);
$ftp_id = $client->sites_ftp_user_add($session_id, $client_id, $params);
$client->logout($session_id);
if(!file_exists('ftp_users')) mkdir('ftp_users');
chdir('ftp_users');
file_put_contents($username, $ftp_id);
?>
