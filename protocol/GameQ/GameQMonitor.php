<?php
error_reporting(0);
global $settings;
// Skip server queries if there are too many total servers
if(isset($_SESSION))
	$num_of_servers = $db->getNumberOfOwnedServersPerUser( $_SESSION['user_id'] );
else
	$num_of_servers = 0;
	
if(isset($settings['query_num_servers_stop']) && is_numeric($settings['query_num_servers_stop']))
	$numberservers_to_skip_query = $settings['query_num_servers_stop'];
else
	$numberservers_to_skip_query = 15;

if($num_of_servers < $numberservers_to_skip_query)
{		
	$query_cache_life = ( isset($settings['query_cache_life']) and is_numeric($settings['query_cache_life']) )? $settings['query_cache_life'] : 30;
	$ip_id = $server_home['ip_id'];
	$statusCache = $db->getServerStatusCache($ip_id,$port);
	
	if( !empty($statusCache) AND date('YmdHis',$statusCache['date_timestamp'] + $query_cache_life) >= date('YmdHis') )
	{
		$results = $statusCache;
	}
	else
	{
		require_once 'protocol/GameQ/GameQ.php';
		
		$port = $server_home['port'];
		if ( $server_home['use_nat'] == 1 )
			$ip = $server_home['agent_ip'];
		else
			$ip = $server_home['ip'];
		
		$query_port = get_query_port ($server_xml, $port);
		
		$gq = new GameQ();
		
		$servers = array(
						array(
							'id' => 'server',
							'type' => (string)$server_xml->gameq_query_name,
							'host' => $ip . ":" . $query_port,
						)
					);

		$gq->addServers($servers);
		$gq->setOption('timeout', 4);
		$gq->setOption('debug', FALSE);
		$gq->setFilter('normalise');
		$results = $gq->requestData();
		$db->saveServerStatusCache($ip_id,$port,$results);
	}

	if($results['server']['gq_online'] == 1)
	{
		$xml_mod = xml_get_mod($server_xml,$results['server']['gq_mod']);
		$status = "online";
		// Some functions to print the results
		$players = $results['server']['gq_numplayers'];
		$playersmax = $results['server']['gq_maxplayers'];
		$name = $results['server']['gq_hostname'];
		$map  = preg_replace("/[^a-z0-9_]/", "_", strtolower($results['server']['gq_mapname']));
		$mod = preg_replace("/[^a-z0-9_]/", "_", strtolower($results['server']['gq_mod']));
		
		//----------+ patches for voice servers (ts2, ts3, ventrilo)

		if(!$mod)$mod = $results['server']['gq_type'];
		if(!$mod)$mod = $mod = $server_xml->mods->mod['key'];
		if(!$map)$map = $results['server']['gq_type'];
		if(!$players)$players = 0;

		@$stats_players += $players;       // COUNT VISIBLE NUMBER OF PLAYERS
		@$stats_maxplayers += $playersmax;    // COUNT VISIBLE NUMBER OF SLOTS

		if ( $results['server']['gq_numplayers'] > 0 )
			$player_list = print_player_list_gameq($results['server']['players'],$players,$playersmax);
		if($server_xml->installer == 'steamcmd')
			$address = "<a href='steam://connect/$ip:$port'>$ip:$port</a>";
		else
			$address = "$ip:$port";
		$playersList = $results['server']['players'];
		$maplocation = get_map_path($query_name,$mod,$map);
	}
	else 
		$status = "half";
}
else
{
	$status = "half";
	$notifications = get_lang_f('queries_disabled_by_setting_disable_queries_after',$numberservers_to_skip_query,$num_of_servers);
}

?>
