<!-- Made for Revolution Theme v2 -->
<style type="text/css">
div.main-content {
	background:transparent;
	border:none;
	padding:0;
	border-radius:0px;
	-moz-border-radius:0px;
}
div #column2 .online_servers div{
	float:left;
	text-align:left;
	height:15px;
	overflow: hidden;
	text-overflow: ellipsis;
	-o-text-overflow: ellipsis;
	-moz-binding: url('assets/xml/ellipsis.xml#ellipsis');
}
div #column2 .online_servers div#gamelink{
	width:35%;
	float:right;
	text-align:right;
}
div #column2 .online_servers div.name{
	width:56%;
}
</style>
<!-- End -->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.json-2.3.min.js"></script>
<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
error_reporting(E_ALL);
require_once('includes/lib_remote.php');
require_once('modules/gamemanager/home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

function print_player_list($player_list,$players,$playersmax,$gamename)
{
    $data =  "<center><table class='currently-online'>
			  <tr>
			  <td style='text-align:left;'>".$gamename." [".$players.'/'.$playersmax."] ".get_lang('players').":
			  <div style='clear:both;width:100%;background-color:#d1d1d1;height:1px;margin-top:10px;margin-bottom:10px;'/></td>
			  </tr>";
	$max = 0;
	foreach($player_list as $id => $player)
	{
		$maxcount = 0;
		foreach($player as $td => $column)
		{
			if($column != null)
			{	
				$sub = substr($td,0,3);
				if($sub == "gq_"){
					$player_list[$id][substr($td,3)] = $column;
					unset($player_list[$id][$td]);
				}
			}
			else
				unset($player_list[$id][$td]);
			if(isset($player_list[$id][$td]))
				$maxcount++;
		}
		if($max < $maxcount)
		{
			$max = $maxcount;
			$maxid = $id;
		}
	}

	foreach ( $player_list as $player ){
		$data .= "<tr>";
		foreach($player_list[$maxid] as $maxtd => $maxcolumn)
		{
			if( isset($player[$maxtd]) and $maxtd == "name" )
				$data .= "<td style='text-align:center;color:#".rand(0,5).rand(0,5).rand(0,5).";' >".$player[$maxtd]."</td>";
		}
		$data .= "</tr>";
    }
    $data .= '</table></center><br /><br />';
	return $data;
}

function print_player_list_gameq($player_list,$players,$playersmax,$gamename)
{
	return print_player_list($player_list,$players,$playersmax,$gamename);
}

function exec_ogp_module() 
{
	global $db, $settings;
	
	$isAdmin = $db->isAdmin($_SESSION['user_id']);

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
		$server_homes = $db->getIpPorts();
	}
	else
	{
		$OnlineServersTitle = "Open Game Panel";
		$OnlineServers .= "<p>" . get_lang("welcome_text") . "</p><br><b>".get_lang('online_servers').":</b><br><br>";
		$server_homes = $db->getIpPortsForUser($_SESSION['user_id']);
	}
	
	require_once("includes/refreshed.php");
	$refresh = new refreshed();
	
	if ( !$server_homes )
	{
		$OnlineServers .= "<p class='failure'>".get_lang('no_games_to_monitor')."</p>";
		if ( $isAdmin )
		{
			//$OnlineServers .= "<p class='note'>".get_lang('add_games_in').
			//"&nbsp;<a href='?m=user_games&amp;p=add'>".get_lang('game_servers')."</a></p>";
			$OnlineServers .= "<p class='note'>".get_lang_f("add_games_in","<a href='?m=user_games&amp;p=add'>".get_lang('game_servers')."</a>")."</p>";
		}
	}
	else
	{
		if(isset($settings['old_dashboard_behavior']) and $settings['old_dashboard_behavior'] == 1)
		{
				$serverslist = $refresh->add("home.php?m=dashboard&p=query_ref&show=servers&type=cleared");
				$playerslist = $refresh->add("home.php?m=dashboard&p=query_ref&show=players&type=cleared");
				$OnlineServers .= $refresh->getdiv($serverslist);
				$player_list .= $refresh->getdiv($playerslist);
		}
		else
		{
			$player_list = "";
			$stats_servers    = 0;
			$stats_servers_online = 0;
			$stats_players    = 0;
			$stats_maxplayers = 0;
			$onlinePlayers = "";

			$OnlineServers .= "<table style='width:100%;' class='online_servers'>";
			require_once("protocol/lgsl/lgsl_protocol.php");
			foreach( $server_homes as $server_home )
			{
				$remote_server_id = $server_home['remote_server_id'];

				$rserver = $db->getRemoteServerById($remote_server_id);
				
				// Count the number of servers.
				$stats_servers++;

				// Remember to clear the old value here.
				$message = "";

				$remote = new OGPRemoteLibrary($server_home['agent_ip'],
				$server_home['agent_port'],$server_home['encryption_key']);
				$host_stat = $remote->status_chk();
				if( $host_stat === 1)
				{
					// Check if the screen running the server is running.
					$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1;

					$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
									
					if ( $screen_running  )
					{
						// Check if the screen running the server is running.

						if ( $server_home['use_nat'] == 1 )
							$ip = $server_home['agent_ip'];
						else
							$ip = $server_home['ip'];
						$port = $server_home['port'];
						
						$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $port, "", "");
						//Connection port
						$c_port = $get_q_and_s['0'];
						//query port
						$q_port = $get_q_and_s['1'];
						//software port
						$s_port = $get_q_and_s['2'];
						
						if($server_xml->protocol == "lgsl")
							$address = "<a href='" . lgsl_software_link($server_xml->lgsl_query_name, $ip, $c_port, $q_port, $s_port) . "'>".$ip.":".$port."</a>";
						if($server_xml->protocol == "teamspeak3") 
							$address = "<a href='ts3server://$ip:$port'>$ip:$port</a>";
						elseif( $server_xml->protocol == "gameq" AND $server_xml->installer == "steam")
							$address = "<a href='steam://connect/$ip:$port'>$ip:$port</a>"; 
						elseif( $server_xml->protocol == "gameq" OR ! isset( $server_xml->protocol ) )
							$address = "$ip:$port"; 
						
						$OnlineServers .= "<tr><td><div class='name' ><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=" . $server_home['home_id'] . "-" . $server_home['mod_id'] . "-" . $server_home['ip'] . "-" . $server_home['port'] . "' ><img style='border:0;height:12px;' src='images/magnifglass.png'/>" . $server_home['home_name'] . "</a></div> | ";
						$OnlineServers .= "<div id='gamelink' >$address</div>"; 
						$OnlineServers .= "</td></tr>";
						$stats_servers_online++;
					}
				}
				unset(  
					$map,
					$player_list, 
					$status,
					$ip,
					$port,
					$players,
					$playersmax,
					$name,
					$map,
					$mod,
					$xml_mod,
					$qport,
					$address,
					$maplocation
				  );
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
	// FTP
	$title[4] = get_lang('ftp');
	$content[4] = '<img src="themes/' . $settings['theme'] . '/images/icons/folder.png" style="width:48px;float:right;margin:0 0 0 8px" />' . get_lang('dashboard_ftp_text');
	$href[4] = 'home.php?m=ftp';
	// Support
	$title[5] = get_lang('support');
	$content[5] = '<img src="themes/' . $settings['theme'] . '/images/icons/support.png" style="width:48px;float:right;margin:0 0 0 8px" />' . get_lang('dashboard_support_text');
	$href[5] = 'http://www.opengamepanel.org/forum';
		
	$columns = array();
	$columns[1]['column_id'] = 1;
	$columns[2]['column_id'] = 2;
	$columns[3]['column_id'] = 3;
	foreach($columns as $column)  
	{   
		echo '<div class="column ';
		if($column['column_id'] == 1)
			echo 'one_fourth';
		else if($column['column_id'] == 2)
			echo 'one_two';
		else if($column['column_id'] == 3)
			echo 'one_fourth';
		echo '" id="column'.$column['column_id'].'" >'; 
		$items=$db->resultQuery("SELECT * FROM OGP_DB_PREFIXwidgets_users WHERE column_id='".$column['column_id']."' AND user_id='".$_SESSION['user_id']."' ORDER BY sort_no"); 
		if($items)
			foreach($items as $widget)
			{  
				if( (!isset($settings['old_dashboard_behavior']) or $settings['old_dashboard_behavior'] == 0) AND $widget['widget_id'] == "3" )
					continue;
				echo ' 
				<div class="dragbox bloc rounded" id="item'.$widget['widget_id'].'"> 
					<h4><span class="configure"></span>';
					if(!is_null($title[$widget['widget_id']]))
						echo $title[$widget['widget_id']];
					echo '</h4> 
						<div class="dragbox-content" '; 

				if(!is_null($href[$widget['widget_id']]))
				{
					echo "onclick=\"location.href='". $href[$widget['widget_id']] . "'\" style=\"cursor:pointer;";
					if($widget['collapsed']==1)  
						echo 'display:none;';
					echo '"';
				}
				elseif($widget['collapsed']==1)  
					echo 'style="display:none;"';
				
				echo '>';
				
				if(!is_null($content[$widget['widget_id']]))
					echo $content[$widget['widget_id']];

				echo ' 
					</div> 
				</div>'; 
				unset($widget);
			}  
		echo '</div>';  
	}
	if( $isAdmin AND $db->isModuleInstalled('status') )
	{
		echo "<h0>Server Status</h0><br>";
		$servers = $db->getRemoteServers();
		
		echo "<div style='float:left;width:40%;' >
			   <div class='bloc rounded' >
			   <h4>Select remote server</h4>
			    <div>
				<br>
				<center>
			    <form action='' method='GET'>
			    <input type='hidden' name='m' value='".$_GET['m']."'/>
			    <input type='hidden' name='p' value='".$_GET['p']."'/>
			    <select name='remote_server_id' onchange=".'"this.form.submit()"'.">\n";
		
		foreach ( $servers as $server_row )
		{
			if( !empty( $server_row['remote_server_id'] ) and !isset( $_GET['remote_server_id'] ) OR !empty( $server_row['remote_server_id'] ) and empty( $_GET['remote_server_id'] ) ) 
			{
				$_GET['remote_server_id'] = $server_row['remote_server_id'];
			}
			
			if( isset($_GET['remote_server_id']) AND $_GET['remote_server_id'] == $server_row['remote_server_id'] )
			{
				$rhost_id = $_GET['remote_server_id'];
				$remote_server = $db->getRemoteServer($rhost_id);
				$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'] );
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
			$checked = ( isset($_GET['remote_server_id']) AND $_GET['remote_server_id'] == 'webhost' ) ? "selected='selected'" : "";
			echo "<option value='webhost' $checked >Webhost Status</option>";
		}
		
		echo "	</select>
			    </form>
				</center>
				<br><br>
			    </div>
			   </div>
			  </div>\n";
			  
		if( isset($_GET['remote_server_id']) AND $_GET['remote_server_id'] == "webhost" )
		{
			unset($_GET['remote_server_id']);
		}
		if( isset( $_GET['remote_server_id'] ) && !empty( $_GET['remote_server_id'] ) ) 
			$remote_server = "&remote_server_id=".$_GET['remote_server_id'];
		else
			$remote_server = "";
			
		if( $isAdmin AND $db->isModuleInstalled('status') AND ( isset($_GET['remote_server_id']) OR function_exists('exec') ) )
		{
			$status = $refresh->add("home.php?m=status&type=cleared".$remote_server);
			echo $refresh->getdiv($status);
		}
	}
?>	
<script type="text/javascript">
var userAgent = navigator.userAgent.toLowerCase(),
	browser   = '',
	version   = 0;

$.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase());

// Is this a version of IE?
if ($.browser.msie) {
  userAgent = $.browser.version;
  userAgent = userAgent.substring(0,userAgent.indexOf('.'));
  version = userAgent;
  browser = "Internet Explorer";
}

// Is this a version of Chrome?
if ($.browser.chrome) {
  userAgent = userAgent.substring(userAgent.indexOf('chrome/') + 7);
  userAgent = userAgent.substring(0,userAgent.indexOf('.'));
  version = userAgent;
  // If it is chrome then jQuery thinks it's safari so we have to tell it it isn't
  $.browser.safari = false;
  browser = "Chrome";
}

// Is this a version of Safari?
if ($.browser.safari) {
  userAgent = userAgent.substring(userAgent.indexOf('safari/') + 7);
  userAgent = userAgent.substring(0,userAgent.indexOf('.'));
  version = userAgent;
  browser = "Safari";
}

// Is this a version of Mozilla?
if ($.browser.mozilla) {
	//Is it Firefox?
	if (navigator.userAgent.toLowerCase().indexOf('firefox') != -1) {
		userAgent = userAgent.substring(userAgent.indexOf('firefox/') + 8);
		userAgent = userAgent.substring(0,userAgent.indexOf('.'));
		version = userAgent;
		browser = "Firefox"
	}
	// If not then it must be another Mozilla
	else {
	  browser = "Mozilla (not Firefox)"
	}
}

// Is this a version of Opera?
if ($.browser.opera) {
	userAgent = userAgent.substring(userAgent.indexOf('version/') + 8);
	userAgent = userAgent.substring(0,userAgent.indexOf('.'));
	version = userAgent;
	browser = "Opera";
}

// Now you have two variables, browser and version
// which have the right info
$(document).ready(
	function(){  
		$('.dragbox')  
		.each(function(){  
			$(this).hover(function(){  
				$(this).find('h4').addClass('collapse'); 
			}, function(){  
			$(this).find('h4').removeClass('collapse');  
			})  
			.find('h4').hover(function(){  
				$(this).find('.configure').css('visibility', 'visible'); 
			}, function(){  
				$(this).find('.configure').css('visibility', 'hidden');  
			})  
			.click(function(){  
				$(this).siblings('.dragbox-content').toggle();  
				//Save state on change of collapse state of panel  
				updateWidgetData();  
			})  
			.end()  
			.find('.configure').css('visibility', 'hidden');  
		});  
	  
		$('.column').sortable({  
			connectWith: '.column',  
			handle: 'h4',  
			cursor: 'move',  
			placeholder: 'placeholder',  
			forcePlaceholderSize: true,  
			opacity: 0.4,   
			start: function(event, ui){
				//Firefox, Safari/Chrome fire click event after drag is complete, fix for that
				if(browser == "Firefox" || browser == "Mozilla (not Firefox)" || browser == "Safari") 
					$(ui.item).find('.dragbox-content').toggle();
			},
			stop: function(){  
				updateWidgetData();  
			}
		})  
		.disableSelection();  
	}  
);
function updateWidgetData(){  
	var items=[];  
	$('.column').each(function(){  
		var columnId=$(this).attr('id');  
		$('.dragbox', this).each(function(i){  
			var collapsed=0;  
			if($(this).find('.dragbox-content').css('display')=="none")  
				collapsed=1;  
			//Create Item object for current panel  
			var item={  
				id: $(this).attr('id'),  
				collapsed: collapsed,  
				order : i,  
				column: columnId  
			};  
			//Push item object into items array  
			items.push(item);  
		});  
	});  
	//Assign items array to sortorder JSON variable  
	var sortorder={ items: items };  
	//Pass sortorder variable to server using ajax to save state  
	$.post('home.php?m=dashboard&p=updateWidgets', 'data='+$.toJSON(sortorder), function(response){ 
		if(response.indexOf("success") < 0){
			$("#console").html('<h0><div class="Failed">Failed to save you\'r operation! Please contact OGP...</div></h0>').hide().fadeIn(1000);  
		}
	});  
}

$(document).ready(function(){ 
	<?php echo $refresh->build("20000"); ?>
});
</script>
<?php
}
?>
