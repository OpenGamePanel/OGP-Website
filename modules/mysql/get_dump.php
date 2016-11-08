<?php
require_once('includes/lib_remote.php');
if ( function_exists('mysqli_connect') )
	require_once("modules/mysql/mysqli_database.php");
else
	require_once("modules/mysql/mysql_database.php");

function exec_ogp_module() {

	$modDb = new MySQLModuleDatabase();
	require("includes/config.inc.php");
	$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
	
	global $db;
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );

	if( $isAdmin )
		$game_home = $db->getGameHome($_REQUEST['home_id']);
	else
		$game_home = $db->getUserGameHome($_SESSION['user_id'],$_GET['home_id']);
	if ( ! $game_home and ! $isAdmin )
		return;
		
	$home_dbs = $modDb->getMysqlDBsbyHomeId($game_home['home_id']);
	
	if(empty($home_dbs))
	{
		return;
	}
		
	$db_id = $_REQUEST['db_id'];
	$mysql_db = $modDb->getMysqlHomeDBbyId($game_home['home_id'],$db_id);
		
	if(!$mysql_db)
		return;
	
	$command = 'mysqldump --host='.$mysql_db['mysql_ip'].' --port='.$mysql_db['mysql_port'].' --user='.$mysql_db['db_user'].
			   ' --password='.$mysql_db['db_passwd'].' '.$mysql_db['db_name']/* .'>backup-' . date("d-m-Y") . '.sql && cat backup-' . date("d-m-Y") . '.sql' */;
	
	if($mysql_db['remote_server_id'] != "0")
	{
		$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
		$host_stat = $remote->status_chk();
		if($host_stat === 1 )
		{
			$dump = $remote->exec($command,$output);
		}
	}
	else
	{
		$dump = system($command);
	}
	
	header( "Content-Type: text/plain" );
	header( 'Content-Disposition: attachment; filename="backup-' . $mysql_db['db_name'] . '-' . date("d-m-Y") . '.sql"' );

	echo $dump;
}