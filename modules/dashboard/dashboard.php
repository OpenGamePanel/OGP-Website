<script type="text/javascript" src="js/jquery/plugins/jquery.json-2.3.min.js"></script>
<script type="text/javascript" src="js/modules/dashboard.js"></script>
<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

require('includes/lib_remote.php');


function exec_ogp_module() 
{
	global $db, $settings, $loggedInUserInfo;
	
	$isAdmin = $db->isAdmin($_SESSION['user_id']);

	$page_user = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1; // thanks for Adjokip
	$limit_user = isset($_GET['limit']) ? $_GET['limit'] : 10;
	
	if(hasValue($loggedInUserInfo) && is_array($loggedInUserInfo) && $loggedInUserInfo["users_page_limit"] && !(isset($_GET['limit']) and !empty($_GET['limit']))){
 		$limit_user = $loggedInUserInfo["users_page_limit"];
 	}	
	
	$OnlineServers = "";
	$OnlineServersTitle = "";
	
	if( isset($settings['welcome_title']) && $settings['welcome_title'] == "1" )
	{
		if( isset($settings['welcome_title_message']) && !empty($settings['welcome_title_message'] ))
		{
			echo "<div>" . $settings['welcome_title_message'] . "</div>";
		}
	}

	$OnlineServersTitle .= get_lang('online_servers');
	$player_list = "";
	
	if ( $isAdmin )
	{
		$server_homes = $db->getIpPorts_limit(0, $page_user, $limit_user);
	}
	else
	{
		$OnlineServersTitle = "Open Game Panel";
		$OnlineServers .= "<p>" . get_lang("welcome_text") . "</p><br><b>".get_lang('online_servers').":</b><br><br>";
		$server_homes = $db->getIpPortsForUser_limit($_SESSION['user_id'],$page_user,$limit_user);
	}

	require_once("includes/refreshed.php");
	$refresh = new refreshed();
	
	if ( !$server_homes )
	{
		$OnlineServers .= "<p class='failure'>".get_lang('no_games_to_monitor')."</p>";
		if ( $isAdmin )
			$OnlineServers .= "<p class='note'>".get_lang_f("add_games_in","<a href='?m=user_games&amp;p=add'>".get_lang('game_servers')."</a>")."</p>";
	}
	else
	{
		$player_list = "";
		$stats_servers = 0;
		$stats_servers_online = 0;
		if(isset($settings['old_dashboard_behavior']) and $settings['old_dashboard_behavior'] == 1)
		{
			$_SESSION['player_statistics']['players'] = 0;
			$_SESSION['player_statistics']['playersmax'] = 0;
			$OnlineServers .= "<table style='width:100%;' class='online_servers' id='ref'>";
			foreach( $server_homes as $server_home )
			{
				// Count the number of servers.
				$stats_servers++;
				$remote = new OGPRemoteLibrary( $server_home['agent_ip'], $server_home['agent_port'],
												$server_home['encryption_key'], $server_home['timeout'] );
				// Check if the screen running the server is running.
				if( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1 )
				{
					$stats_servers_online++;
					$server_key = 'server_'.$server_home['ip'].'_'.$server_home['port'];
					$_SESSION[$server_key] = $server_home;
					if( isset($_SESSION[$server_key]['server_playersmax']) )
						unset($_SESSION[$server_key]['server_players'],
							  $_SESSION[$server_key]['server_playersmax']);
					$OnlineServers .= '<tr><td>'.$refresh->getdiv($refresh->add("home.php?m=dashboard&p=query_ref&type=cleared&ip=".$server_home['ip']."&port=".$server_home['port']),'width:100%;').'</td></tr>';
					$player_list .= $refresh->getdiv($refresh->add("home.php?m=dashboard&p=query_ref&show=players&type=cleared&ip=".$server_home['ip']."&port=".$server_home['port']));
				}
			}

			$OnlineServers .= "</table><br>";
			
			if ($isAdmin) {			
				$count_homes = $db->getIpPorts_count('admin',$_SESSION['user_id']);
			} else {
				$isSubUser = $db->isSubUser($_SESSION['user_id']);
				
				if ($isSubUser) {
					$count_homes = $db->getIpPorts_count('subuser',$_SESSION['user_id']);
				} else {
					$count_homes = $db->getIpPorts_count('user_and_group',$_SESSION['user_id']);
				}
			}

			$uri = '?m=dashboard&p=dashboard&limit='.$limit_user.'&page=';
			$OnlineServers .= paginationPages($count_homes[0]['total'], $page_user, $limit_user, $uri, 3, 'dashboardHomes');
	
			$OnlineServers .= "<center>" . statistics . ":<br>$stats_servers_online/$stats_servers " . servers . "<br>" . 
				$refresh->getdiv($refresh->add("home.php?m=dashboard&p=query_ref&show=player_statistics&type=cleared&ip=" .
				$server_home['ip']."&port=".$server_home['port'])) . "</center>";
		}
		else
		{
			$OnlineServers .= "<table style='width:100%;' class='online_servers' id='noref'>";
			require("protocol/lgsl/lgsl_protocol.php");
			foreach( $server_homes as $server_home )
			{
				// Count the number of servers.
				$stats_servers++;
				$remote = new OGPRemoteLibrary( $server_home['agent_ip'],$server_home['agent_port'],
												$server_home['encryption_key'],$server_home['timeout'] );
				// Check if the screen running the server is running.
				if ( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1  )
				{
					require_once("modules/config_games/server_config_parser.php");
					$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
					
					$ip = $server_home['ip'];
					$ip = checkDisplayPublicIP($server_home['display_public_ip'],$ip);

					$port = $server_home['port'];

					if($server_xml->protocol == "lgsl")
					{
						$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
						//Connection port
						$c_port = $get_q_and_s['0'];
						//query port
						$q_port = $get_q_and_s['1'];
						//software port
						$s_port = $get_q_and_s['2'];
						$address = "<a href='" . lgsl_software_link($server_xml->lgsl_query_name, $ip, $c_port, $q_port, $s_port) . "'>".$ip.":".$port."</a>";
					}
					elseif($server_xml->protocol == "teamspeak3") 
						$address = "<a href='ts3server://$ip:$port'>$ip:$port</a>";
					elseif($server_xml->installer == "steamcmd")
						$address = "<a href='steam://connect/$ip:$port'>$ip:$port</a>"; 
					else
						$address = "$ip:$port";

					$OnlineServers .= "<tr><td><div class='name' ><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=" . $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/>" . htmlentities($server_home['home_name']) . "</a></div> | ";
					$OnlineServers .= "<div id='gamelink' >$address</div>"; 
					$OnlineServers .= "</td></tr>";
					$stats_servers_online++;
				}
			}
			$OnlineServers .= "</table>";
			$OnlineServers .= "<center>".get_lang('statistics').
							  ":<br>$stats_servers_online/$stats_servers ".
							  get_lang('online_servers')."</center>";
		}
	}
	?>
	<div style="margin-top:20px;">
	<?php 
	//$title[$id] = "The Title";
	//$content[$id] = "Content of the Widget";
	$title = array();
	$content = array();
	$href = array();
	// Game Monitor
	$title[1] = get_lang('game_monitor');
	$content[1] = '<img src="themes/' . $settings['theme'] . '/images/icons/game_monitor.png" style="width:48px;float:right;margin:0 0 0 8px" />' . get_lang('dashboard_game_monitor_text');
	$href[1] = 'home.php?m=gamemanager&p=game_monitor';
	// Online Server
	$title[2] = $OnlineServersTitle;
	$content[2] = $OnlineServers;
	$href[2] = null;
	// Currently Online
	$title[3] = get_lang('currently_online');
	$content[3] = $player_list; 
	$href[3] = null;
	
	// Commented out per https://github.com/OpenGamePanel/OGP-Website/issues/407
	// FTP
	// $title[4] = get_lang('login');
	// $content[4] = '<img src="themes/' . $settings['theme'] . '/images/icons/folder.png" style="width:48px;float:right;margin:0 0 0 8px" />' . get_lang('welcome_text');
	// $href[4] = 'home.php?m=user_admin&p=edit_user&user_id='.$_SESSION['user_id'];
	
	// Support
	$title[5] = (isset($settings['support_widget_title']) && $settings['support_widget_title'] != "") ?
				 $settings['support_widget_title'] : get_lang('support');
	$content[5] = (isset($settings['support_widget_content']) && $settings['support_widget_content'] != "") ?
				   $settings['support_widget_content'] : '<img src="themes/' . $settings['theme'] .
				   '/images/icons/support.png" style="width:48px;float:right;margin:0 0 0 8px" />' . get_lang('dashboard_support_text');
	$href[5] = (isset($settings['support_widget_link']) && $settings['support_widget_link'] != "") ?
				$settings['support_widget_link'] : 'http://www.opengamepanel.org/forum';

	$widgets = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXwidgets_users WHERE user_id='".$_SESSION['user_id']."' ORDER BY sort_no");
	
	if(!$widgets)
	{
		if($db->createUserWidgets($_SESSION['user_id']))
			$widgets = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXwidgets_users WHERE user_id='".$_SESSION['user_id']."' ORDER BY sort_no");
	}
	
	if($widgets)
	{
		$colhtml[1] = '<div class="column one_fourth" id="column1" >';
		$colhtml[2] = '<div class="column one_two" id="column2" >';
		$colhtml[3] = '<div class="column one_fourth" id="column3" >';
		foreach($widgets as $widget)
		{
			if(array_key_exists($widget["widget_id"], $title)){
				if( (!isset($settings['old_dashboard_behavior']) or $settings['old_dashboard_behavior'] == 0) AND $widget['widget_id'] == "3" )
					continue;
				$colhtml[$widget['column_id']] .= '<div class="dragbox bloc rounded" id="item'.$widget['widget_id'].'">'.
												  '<h4><span class="configure"></span>';
				if(!is_null($title[$widget['widget_id']]))
					$colhtml[$widget['column_id']] .= $title[$widget['widget_id']];
				
				$colhtml[$widget['column_id']] .= '</h4><div class="dragbox-content" '; 
				if(!is_null($href[$widget['widget_id']]))
				{
					$colhtml[$widget['column_id']] .= "onclick=\"location.href='". $href[$widget['widget_id']] . "'\" style=\"cursor:pointer;";
					if($widget['collapsed']==1)  
						$colhtml[$widget['column_id']] .= 'display:none;';
					$colhtml[$widget['column_id']] .= '"';
				}
				elseif($widget['collapsed']==1)  
					$colhtml[$widget['column_id']] .= 'style="display:none;"';

				$colhtml[$widget['column_id']] .= '>';

				if(!is_null($content[$widget['widget_id']]))
					$colhtml[$widget['column_id']] .= $content[$widget['widget_id']];

				$colhtml[$widget['column_id']] .= '</div></div>'; 
			}
		}
		foreach($colhtml as $html )
			echo $html.'</div>';
	}
	if( $isAdmin AND $db->isModuleInstalled('status') )
	{
		echo "<h0>".get_lang('server_status')."</h0><br>";
		$servers = $db->getRemoteServers();
		
		echo "<div id='column4' style='float:left;width:40%;' >
			   <div class='bloc rounded' >
			   <h4>".get_lang('select_remote_server')."</h4>
				<div>
				<br>
				<center>
				<form action='' method='GET'>
				<input type='hidden' name='m' value='".$_GET['m']."'/>
				<input type='hidden' name='p' value='".$_GET['p']."'/>
				<select name='remote_server_id' onchange=".'"this.form.submit()"'.">\n";
		
		$agents_ips = array();
		foreach ( $servers as $server_row )
		{
			$agents_ips[$server_row['remote_server_id']] = gethostbyname($server_row['agent_ip']);
			if( !empty( $server_row['remote_server_id'] ) and !isset( $_GET['remote_server_id'] ) OR !empty( $server_row['remote_server_id'] ) and empty( $_GET['remote_server_id'] ) ) 
			{
				$_GET['remote_server_id'] = $server_row['remote_server_id'];
			}

			if( isset($_GET['remote_server_id']) AND $_GET['remote_server_id'] == $server_row['remote_server_id'] )
			{
				$remote = new OGPRemoteLibrary( $server_row['agent_ip'], $server_row['agent_port'], 
												$server_row['encryption_key'], $server_row['timeout'] );
				$host_stat = $remote->status_chk();
				if( $host_stat === 1 )
				{
					$checked = "selected='selected'";
				}
				else
				{
					$checked = '';
					$_GET['remote_server_id'] = 'webhost';
				}
			}
			else
			{
				$checked = '';
			}
			echo "<option value='".$server_row['remote_server_id']."' $checked >".$server_row['remote_server_name']."</option>\n";
		}

		if ( function_exists('exec') )
		{
			$host_ip = isset($_SERVER['LOCAL_ADDR']) ? $_SERVER['LOCAL_ADDR'] : $_SERVER['SERVER_ADDR'];
			$remote_server_id = array_search($host_ip,$agents_ips);
			$show_webhost = true;
			if($remote_server_id)
			{
				$remote_server = $db->getRemoteServer($remote_server_id);
				$remote = new OGPRemoteLibrary( $remote_server['agent_ip'], $remote_server['agent_port'], 
												$remote_server['encryption_key'], $remote_server['timeout'] );
				$host_stat = $remote->status_chk();
				if( $host_stat === 1 )
					$show_webhost = false;
			}
			if($show_webhost)
			{
				$checked = ( isset($_GET['remote_server_id']) AND $_GET['remote_server_id'] == 'webhost' ) ? "selected='selected'" : "";
				echo "<option value='webhost' $checked >Webhost Status</option>";
			}
		}

		echo "	</select>
				</form>
				</center>
				<br><br>
				</div>
			   </div>
			  </div>\n";

		if( isset($_GET['remote_server_id']) AND ( $_GET['remote_server_id'] == "webhost" or $_GET['remote_server_id'] == "" ) )
			unset($_GET['remote_server_id']);
		
		if( isset($_GET['remote_server_id']) )
			$remote_server = "&remote_server_id=".$_GET['remote_server_id'];
		else
			$remote_server = "";
		
		if( isset($_GET['remote_server_id']) OR function_exists('exec') )
			echo $refresh->getdiv($refresh->add("home.php?m=status&type=cleared".$remote_server));
	}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
	<?php echo $refresh->build(isset($settings['query_cache_life']) ? $settings['query_cache_life'] * 2000 : 60000); ?>
});
</script>
<?php
}
?>
