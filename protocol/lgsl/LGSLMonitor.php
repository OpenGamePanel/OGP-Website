<?php
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
	require_once("protocol/lgsl/lgsl_protocol.php");
	$ip_id = $db->getIpIdByIp($server_home['ip']);
	$statusCache = $db->getServerStatusCache($ip_id,$port);
	$query_cache_life = ( isset($settings['query_cache_life']) and is_numeric($settings['query_cache_life']) )? $settings['query_cache_life'] : 30;
	if( !empty($statusCache) AND date('YmdHis',$statusCache['date_timestamp'] + $query_cache_life) >= date('YmdHis') )
	{
		$data = $statusCache;
	}
	else
	{
		if ( $server_home['use_nat'] == 1 )
			$internal_query_ip = $server_home['agent_ip'];
		else
			$internal_query_ip = $server_home['ip'];
		$port = $server_home['port'];		
		$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
		//Connection port
		$c_port = $get_q_and_s['0'];
		//query port
		$q_port = $get_q_and_s['1'];
		//software port
		$s_port = $get_q_and_s['2'];
		$data = lgsl_query_live((string)$server_xml->lgsl_query_name, $internal_query_ip, $c_port, $q_port, $s_port, "sp");
		$data['link'] = "<a href='" . lgsl_software_link((string)$server_xml->lgsl_query_name, $internal_query_ip, $c_port, $q_port, $s_port) . "'>".$ip.":".$port."</a>";
		//-----------------------------------+
		$data['s']['game'] = preg_replace("/[^A-Za-z0-9 \_\-]/",
			"_", strtolower($data['s']['game']));

		//-----------------------------------+
		if( $data['b']['status'] == "1" )
		{
			if( !isset( $data['s']['password']) )
			{
				$data['status']   = "ONLINE";
			}
			else
			{
				$data['status']   = "ONLINE WITH PASSWORD";
			}
		}
		$db->saveServerStatusCache($ip_id,$port,$data);
	}

	if($data['status'] == 'ONLINE' OR $data['status'] == 'ONLINE WITH PASSWORD')
	{
		$status = "online";
		$stats_players += $data['s']['players'];       // COUNT VISIBLE NUMBER OF PLAYERS
		$stats_maxplayers += $data['s']['playersmax']; // COUNT VISIBLE NUMBER OF SLOTS
		$players = $data['s']['players'];
		$playersmax= $data['s']['playersmax'];
		$name = $data['s']['name'];
		$map  = preg_replace("/[^a-z0-9_]/", "_", strtolower($data['s']['map']));
		$mapRaw = $data['s']['map'];
		$address = $data['link'];
		
		if ( $data['s']['players'] > 0 )
			$player_list = print_player_list($data['p'],$players,$playersmax);
			
		$playersList = $data['p'];
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
