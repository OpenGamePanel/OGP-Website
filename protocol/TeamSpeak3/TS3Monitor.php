<?php
if(isset($server_home['control_password']) && $server_home['control_password'] != "")
{
	// Skip server queries if there are too many total servers
	global $settings;
	if(isset($_SESSION))
		$num_of_servers = $db->getNumberOfOwnedServersPerUser( $_SESSION['user_id'] );
	else
		$num_of_servers = 0;
		
	if(isset($settings['query_num_servers_stop']) && is_numeric($settings['query_num_servers_stop'])){
		$numberservers_to_skip_query = $settings['query_num_servers_stop'];
	}else{
		$numberservers_to_skip_query = 15;
	}
	
	if($num_of_servers < $numberservers_to_skip_query)
	{
		$query_cache_life = isset($settings['query_cache_life']) ? $settings['query_cache_life'] : 30;
		$ip_id = $db->getIpIdByIp($server_home['ip']);
		$port = $server_home['port'];
		$statusCache = $db->getServerStatusCache($ip_id,$port);
		
		if( !empty($statusCache) AND date('YmdHis',$statusCache['date_timestamp'] + $query_cache_life) >= date('YmdHis') )
		{
			$ts3 = $statusCache;
			if($ts3['status'] == "half")
				$status = "half";
		}
		else
		{
			require_once("protocol/TeamSpeak3/TeamSpeak3.php");
			$cfg["user"] = "serveradmin";
			$cfg["pass"] = $server_home['control_password'];
			$cfg["voice"] = $server_home['port'];
			$cfg["query"] = 10011;
			require_once('includes/lib_remote.php');
			$remote = new OGPRemoteLibrary($server_home['agent_ip'], $server_home['agent_port'], $server_home['encryption_key'], $server_home['timeout']);
			foreach($db->getHomeIpPorts($server_home['home_id']) as $ts3Port)
			{
				if($remote->rfile_exists( "startups/".$ts3Port['ip']."-".$ts3Port['port'] ) === 1)
					$cfg["query"] = $ts3Port['port'] + 24;
			}
			if ( $server_home['use_nat'] == 1 )
				$cfg["host"] = $server_home['agent_ip'];
			else
				$cfg["host"] = $server_home['ip'];
			
			$internal_query_ip = $cfg["host"];
			$port = $cfg["voice"];
			$status = "online";
			try
			{
				$ts3_ServerInstance = TeamSpeak3::factory("serverquery://" . $cfg["user"] . ":" . $cfg["pass"] . "@" . $cfg["host"] . ":" . $cfg["query"] . "/?server_port=" . $cfg["voice"] . "#no_query_clients");
			}
			catch(TeamSpeak3_Exception $e)
			{
				$status = "half";
			}
			$ts3['status'] = $status;
			if($status != "half")
			{
				try
				{
					$viewer = $ts3_ServerInstance->getViewer(new TeamSpeak3_Viewer_Html("images/viewer/", "images/flags/", "data:image"));
				}
				catch(TeamSpeak3_Exception $e)
				{
					$viewer = "Error code:" . $e->getCode() . " [ " . $e->getMessage() . " ]";
				}
				$ts3['player_list'] = '<div style="width: 100%; height: 100%; overflow: scroll; border: 1px dashed black">' . $viewer . '</div>';
				$ts3['maplocation'] = "protocol/lgsl/maps/ts3/teamspeak3.png";
				$ts3['address'] = "<a href='ts3server://" . $cfg["host"] . ":" . $cfg["voice"]  . "'>" . $cfg["host"] . ":" . $cfg["voice"]  . "</a>";
				$ts3['name'] = $ts3_ServerInstance["virtualserver_name"];
				$ts3['map'] = "teamspeak3";
				$ts3['playersmax'] = $ts3_ServerInstance["virtualserver_maxclients"];
				$ts3['ip'] = $cfg["host"];
				$ts3['port'] = $cfg["voice"];
				$clients = $ts3_ServerInstance->clientList();
				$ts3['players'] = count($clients);
				if( $ts3['players'] >= 1 )
				{
					$i=0;
					foreach($clients as $key => $value)
					{
						/* $playerarray[$i]= */ 
						$ts3['playersList'][$i]['name'] = trim($value);
						$i++;
					}
				}
			}
			$db->saveServerStatusCache($ip_id,$port,$ts3);
		}
		
		if ( $ts3['status'] == "online" )
		{
			$port = $ts3['port'];
			$player_list = $ts3['player_list'];
			$maplocation = $ts3['maplocation'];
			$address = $ts3['address'];
			$name = $ts3['name'];
			$map = $ts3['map'];
			$players = $ts3['players'];
			$playersmax = $ts3['playersmax'];
			$stats_players += $ts3['players'];       // COUNT VISIBLE NUMBER OF PLAYERS
			$stats_maxplayers += $ts3['playersmax']; // COUNT VISIBLE NUMBER OF SLOTS
			if( $players >= 1 )
				$playersList = $ts3['playersList'];
			$status = "online";
		}
	}
	else
	{
		$status = "half";
		$notifications = get_lang_f('queries_disabled_by_setting_disable_queries_after',$numberservers_to_skip_query,$num_of_servers);
	}
}
else
	$status = "half";

?>
