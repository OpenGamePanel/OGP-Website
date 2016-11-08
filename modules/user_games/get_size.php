<?php
function numbersFormatting($bytes){
	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
}

function exec_ogp_module()
{
	global $db;
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	require_once('includes/lib_remote.php');
	if(isset($_GET['home_id']) and $_GET['home_id'] != "total")
	{
		if( $isAdmin )
			$game_home = $db->getGameHome($_GET['home_id']);
		else
			$game_home = $db->getUserGameHome($_SESSION['user_id'],$_GET['home_id']);
		if ( ! $game_home and ! $isAdmin )
			return;

		$remote = new OGPRemoteLibrary($game_home['agent_ip'], $game_home['agent_port'], $game_home['encryption_key'], $game_home['timeout']);
		$r = $remote->rfile_exists($game_home['home_path']);
		if($r == 1)
		{
			$home_path = preg_replace("/('+)/", "'\"$1\"'", $game_home['home_path']);
			$size = $remote->shell_action('size', $home_path);
			if(isset($_GET['bytes']))
				echo $size;
			else
				echo numbersFormatting($size);
		}
		else
		{
			echo get_lang("does_not_exist_yet");
		}
	}
	elseif( $isAdmin )
	{
		$game_homes = $db->getGameHomes();
		$total_size = 0;
		foreach($game_homes as $game_home)
		{
			$remote = new OGPRemoteLibrary($game_home['agent_ip'], $game_home['agent_port'], $game_home['encryption_key'], $game_home['timeout']);
			$r = $remote->rfile_exists($game_home['home_path']);
			if($r == 1)
			{
				$home_path = preg_replace("/('+)/", "'\"$1\"'", $game_home['home_path']);
				$kilobytes = $remote->shell_action('size', $home_path);
				$total_size += $kilobytes;
			}		
		}
		echo numbersFormatting($total_size);
	}
}
?>