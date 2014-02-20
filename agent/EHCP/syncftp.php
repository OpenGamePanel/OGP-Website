<?php
$curDir = getcwd();

if(chdir("/var/www/new/ehcp/")){
	require ("classapp.php");
	$app = new Application();
	$app->connectTodb(); # fill config.php with db user/pass for things to work..

	$app->addDaemonOp('syncftp', '', '', '', 'sync ftp for nonstandard homes');
}

chdir($curDir);

?>
