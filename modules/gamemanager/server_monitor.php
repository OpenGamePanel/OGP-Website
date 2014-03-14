<style>
.monitorbutton{
	display:inline;
	width:auto !important;
}
.monitorbutton tr td{
	cursor:pointer;
	color: #323232;
	background-color:#F0F0F6;
	transition: background-color 0.5s;
	-webkit-transition: background-color 0.5s;
	border: 1px solid grey;
	width:145px !important;
	height:72px !important;
	background-color: #F0F0F6 !important;
	vertical-align: middle !important;
}
.monitorbutton tr td:hover {
	background-color:#D9D9D9 !important;
	transition: background-color 0.5s;
	-webkit-transition: background-color 0.5s;
	cursor:pointer;
}
.monitorbutton tr td a:hover {
	text-decoration:none;
}
button:active, button[type="submit"]:active, input[type="submit"]:active, .monitorbutton tr td:active {
	background-color:#0F0 !important;
	transition: background-color 0.25s;
	-webkit-transition: background-color 0.25s;
}
#server_icon{
	display:block;
	float:left;
	overflow:hidden;
	margin:2px;
	margin-right:10px;
	padding-top:1px;
	padding-bottom:2px;
	padding-right:5px;
	border:1px solid gray;
	background:transparent;
	cursor:pointer;
	background-color:white;
	border-radius:3px;
	font-weight:bold;
}

#server_icon div{
	display:inline-block; 
	vertical-align:middle;
}
</style>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.mod.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.collapsible.js"></script>
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

require_once('modules/gamemanager/home_handling_functions.php');
require_once("modules/config_games/server_config_parser.php");

require_once("includes/refreshed.php");
require_once('includes/lib_remote.php');

function renderParam($param, $param_access_enabled, $home_id)
{
	global $db;
	$attributesString = "";
	foreach ($param->attribute as $attribute)
		$attributesString .= $attribute['key']. "='$attribute' ";

	$disabledString = ($param_access_enabled) ? "" : "disabled ";

	//get last used param or get default
	$last_param = json_decode($db->getLastParam($home_id), True);
	if (array_key_exists((string)$param['key'], $last_param))
		$paramValue = (string)$last_param[(string)$param['key']];
	else
		$paramValue = (string)$param->default;
	
	$idString = "id='".clean_id_string($param['key'])."'";
	$nameString = "name='params[".$param['key']."]'";
	$paramType = $param['type'];
	if ($paramType == "select")
	{
		$inputElementString = "<select $idString $nameString>";
		foreach ($param->option as $option)
		{
			$optionValue = (string)($option['value']);
			$selectedString = ($optionValue == $paramValue) ? "selected='selected'" : "";
			$valueString = "value='$optionValue'";
			$inputElementString .= "<option $selectedString $valueString>$option</option>";
		}
		$inputElementString .="</select>";
	} else
		{
			if ($paramType == "checkbox_key_value") {
				if ($paramValue) // convert the XML object to string
					$attributesString .= "checked='checked' ";
				$paramValue = $param['key'];
				$paramType = "checkbox";
			} 
			else if ($paramType == "checkbox")
			{
				if ($paramValue) // convert the XML object to string
					$attributesString .= "checked='checked' ";
			}
			$inputElementString = "<input $idString $nameString ".
				"type='$paramType' value='$paramValue' ".
				"$disabledString $attributesString/>";
		}

	echo "<tr><td class='right'><label for='".clean_id_string($param['key'])."'>".$param['key'].
		":</label></td><td class='left'>$inputElementString<label for='".clean_id_string($param['key'])."'>";

	if ( !empty($param->caption) )
		echo $param->caption;
	if ( !empty($param->desc) )
		echo "<br/><span class='info'>(".$param->desc.")</span>";

	echo "</label></td></tr>\n";
}

function get_sync_name($server_xml)
{
	if( isset($server_xml->lgsl_query_name) )
	{
		$sync_name = $server_xml->lgsl_query_name;
		if($sync_name == "quake3")
		{
			if($server_xml->game_name == "Quake 3")
				$sync_name = "q3";
		}
	}
	elseif( isset($server_xml->gameq_query_name) )
	{
		$sync_name = $server_xml->gameq_query_name;
		if($sync_name == "minecraft")
		{
			if($server_xml->game_name == "Minecraft Tekkit")
				$sync_name = "tekkit";
			elseif($server_xml->game_name == "Minecraft Bukkit")
				$sync_name = "bukkit";
		}
	}
	elseif( isset($server_xml->protocol) )
		$sync_name = $server_xml->protocol;
	else
		$sync_name = $server_xml->mods->mod['key'];
	return $sync_name;
}

foreach($_POST as $key => $value)
{
	if( preg_match( "/^action/", $key ) )
	{
		list($action,$home_id,$mod_id,$ip,$port) = explode("-", $value);
		exec_operation( $action, $home_id, $mod_id, $ip, $port );
	}
}

function exec_ogp_module() {
	global $db;
	echo "<h2>".get_lang('game_monitor')."</h2>";
	$refresh = new refreshed(100000);
	set_time_limit(0);
	$stats_servers_online = 0;
	$stats_servers = 0;
	$stats_players = 0;
	$stats_maxplayers = 0;
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if ( $isAdmin )
		$server_homes = $db->getIpPorts();
	else
		$server_homes = $db->getIpPortsForUser($_SESSION['user_id']);
	
	if( $server_homes === FALSE )
	{
		// If there are no games, then there can not be any mods either.
		print_failure(get_lang('no_game_homes_assigned'));
		if ( $isAdmin )
		{
			echo "<p><a href='?m=user_games&amp;p=assign&amp;user_id=$_SESSION[user_id]'>".
				get_lang('assign_game_homes')."</a></p>";
		}
		return;
	}
	if ( empty( $_GET['home_id-mod_id-ip-port'] ) )
		unset( $_GET['home_id-mod_id-ip-port'] );
	if ( empty( $_GET['home_id'] ) )
		unset( $_GET['home_id'] );
	if ( $_GET['home_cfg_id'] == get_lang('game_type') )
		unset( $_GET['home_cfg_id'] );
	
	create_home_selector_game_type($_GET['m'], $_GET['p'], $server_homes);
	
	if (!isset($_GET['home_id-mod_id-ip-port']) and !isset($_GET['home_id']) and !isset($_GET['home_cfg_id'])) 
	{	
		create_home_selector_address($_GET['m'], $_GET['p'], $server_homes);
		$show_all = TRUE;
	}
	else
	{
		create_home_selector_address($_GET['m'], $_GET['p'], $server_homes);
		create_home_selector($_GET['m'], $_GET['p'], "show_all");
		$show_all = FALSE;
	}
		
	require("protocol/lgsl/lgsl_protocol.php");
	?>
		<form>
			<b><?php print_lang('search'); ?>:</b>
			<input type="text" id="search">
		</form>
	<?php 

	$info = $db->getUser($_SESSION['users_login']);
	$chk_expire = $info['user_expires'];
	$exptime = read_expire($chk_expire);
	$time_to_expire = str_replace('hr', 'hours', $exptime);
	if($exptime != "X")
	{
	?>
		<span style="color:black;font-weight:bold;">
		 <center>
			<?php echo print_lang('account_expiration'); ?>: <span style="color:green;"><?php echo date( "l, F jS, Y, H:i:s", $chk_expire )." ( ".$time_to_expire.")"; ?></span>
		 </center>
		</span>
	<?php
	}	
	?>
		<table id="servermonitor" class="tablesorter">
		<thead> 
		<tr> 
			<th style="width:16px;background-position: center;"></th> 
			<th style="width:16px;background-position: center;"></th> 
			<th><?php print_lang('server_name'); ?></th> 
			<th><?php print_lang('address'); ?></th> 
			<th><?php print_lang('owner'); ?></th> 
			<th>
			  <?php print_lang('operations'); ?>
			  <img style="border:0;height:15px;" id="action-stop" src="images/stop.png"/>
			  <img style="border:0;height:15px;" id="action-restart" src="images/restart.png"/>
			  <img style="border:0;height:15px;" id="action-start" src="images/start.png"/>
			</th>
		</tr> 
		</thead> 
		<tbody> 
	<?php
	foreach( $server_homes as $server_home )
	{
		$stats_servers++;
		//Unset variables.
				
		if( isset( $_GET['home_id-mod_id-ip-port']) )
		{
			$pieces = explode( "-", $_GET['home_id-mod_id-ip-port'] );
			$post_home_id = $pieces[0];
			$post_mod_id = $pieces[1];
			$post_ip = $pieces[2];
			$post_port = $pieces[3];
		}
		
		if( $show_all 
			OR ( isset( $_GET['home_id'] ) and $_GET['home_id'] == $server_home['home_id'] ) 
			OR ( isset( $_GET['home_id-mod_id-ip-port'] ) and $server_home['home_id'] == $post_home_id and $server_home['mod_id'] == $post_mod_id and $post_ip == $server_home['ip'] and $post_port == $server_home['port'] ) 
			OR ( isset( $_GET['home_cfg_id'] ) and $_GET['home_cfg_id'] == $server_home['home_cfg_id'] ) 
		  )
		{
			unset(  
					$map,
					$trclass, 
					$first, 
					$second, 
					$onlineT, 
					$ts3opt, 
					$offlineT, 
					$halfT, 
					$ministart, 
					$player_list, 
					$groupsus, 
					$name,
					$mod_name,
					$SrvCtrl,
					$lite_fm,
					$manager,
					$user,
					$pos,
					$ftp,
					$addonsmanager,
					$ctrlChkBoxes
				  );
			//End
			if ( $isAdmin )
			{
				$server_home['access_rights'] = "ufpet";
			}
			else
			{
				$home_info = $db->getUserGameHome($_SESSION['user_id'],$server_home['home_id']);
				$server_home['access_rights'] = $home_info['access_rights'];
			}
			
			$litefm_installed = $db->isModuleInstalled('litefm');
			$ftp_installed = $db->isModuleInstalled('ftp');
			$addonsmanager_installed = $db->isModuleInstalled('addonsmanager');
			$mysql_installed = $db->isModuleInstalled('mysql');
			
			if ($server_home['mod_name'] == "none" OR $server_home['mod_name'] == "None")
				$mod_name = "";
			elseif($server_home['mod_name'] != $server_home['game_name'])
				$mod_name = " ( ".$server_home['mod_name']." )";
						
			$get_size = "<table align='left' class='monitorbutton' ><tr>".
						"<td align='middle' class='size' id='".$server_home["home_id"]."'>".
						"<img style='border:0;height:40px;vertical-align:middle;' src='images/file_size.png' title='".
						get_lang('get_size')."'/>\n<br /><span style='font-weight:bold;'>".get_lang('get_size')."</span></td></tr></table>";
						
			$manager = "<a href='?m=user_games&amp;p=edit&amp;home_id=".$server_home['home_id']."'>\n".
						"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
						"<img style='border:0;height:40px;vertical-align:middle;' src='images/edit.png' title='".
						get_lang('edit')."'/>\n<br />".get_lang('edit')."\n</td></tr></table></a>";
						

			// Only show the filemanager link when the litefm is installed.
			if ( preg_match("/f/",$server_home['access_rights']) > 0 && $litefm_installed )
			{
				$lite_fm  = "<a href='?m=litefm&amp;home_id=".$server_home['home_id']."'>\n".
							"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
							"<img style='border:0;height:40px;vertical-align:middle;' src='images/txt.png' title='".
							get_lang('file_manager')."'/>\n<br />".get_lang('file_manager')."\n</td></tr></table></a>";
			}
			
			if ( preg_match("/t/",$server_home['access_rights']) > 0 && $ftp_installed )
			{
				$ftp = "<a href='?m=ftp&amp;home_id=".$server_home['home_id']."'>\n".
						"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
						"<img style='border:0;height:40px;vertical-align:middle;' src='images/ftp.png' title='".
						get_lang('ftp')."'/>\n<br>".get_lang('ftp')."\n</td></tr></table></a>";
			}
			if ( $addonsmanager_installed )
			{
				$addons = $db->resultQuery("SELECT DISTINCT addon_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes WHERE home_cfg_id=".$server_home['home_cfg_id']);
				$addons_qty = count($addons);
				if($addons and $addons_qty >= 1){
					$addonsmanager = "<a href='?m=addonsmanager&amp;p=user_addons&amp;home_id=".$server_home['home_id'].
									 "&amp;ip=".$server_home['ip']."&amp;port=".$server_home['port']."'>\n".
									 "<table align='left' class='monitorbutton' ><tr><td align='middle' >".
									 "<img style='border:0;height:40px;vertical-align:middle;' src='modules/administration/images/addons_manager.png' title='".
									 get_lang('addons')."'/>\n<br />".get_lang('addons')."\n<b style='font-size:0.9em' >(".
									 $addons_qty.")</td></tr></table></a>";
				}
			}
			
			if ( $mysql_installed )
			{
				$mysql_dbs = $db->resultQuery("SELECT db_id FROM OGP_DB_PREFIXmysql_databases WHERE enabled=1 AND home_id=".$server_home['home_id']);

				if(!empty($mysql_dbs))
					$mysql = "<a href='?m=mysql&p=user_db&home_id=".$server_home['home_id']."'>\n".
							 "<table align='left' class='monitorbutton' ><tr><td align='middle' >".
							 "<img style='border:0;height:40px;vertical-align:middle;' src='modules/administration/images/mysql_admin.png' title='".
							 get_lang('mysql_databases')."'/>\n<br />".get_lang('mysql_databases')."\n</td></tr></table></a>\n";
			}
							
			$mod_result = $db->getHomeMods($server_home['home_id']);

			if( $mod_result === FALSE )
			{
				print_failure(get_lang('fail_no_mods'));

				if ( $isAdmin )
				{
					$manager .= "<a href='?m=user_games&amp;p=edit&amp;home_id=".$server_home['home_id']."'>".get_lang('configure_mods')."</a>";
				}
				continue;
			}

			$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_home['home_cfg_file']);
			
			$master_server_home_id = $db->getMasterServer( $server_home['remote_server_id'], $server_home['home_cfg_id'] );
			if ( $master_server_home_id != FALSE )
			{
				if ( !$db->getGameHomeWithoutMods($master_server_home_id) )
				{
					$db->setMasterServer("remove", $master_server_home_id, $server_home['home_cfg_id'], $server_home['remote_server_id']);
					$master_server_home_id = FALSE;
				}
			}
			
			if ( $server_xml )
			{
				if (preg_match("/u/",$server_home['access_rights']) > 0)
				{
					// In case game is compatible with steam we offer a way to use steam with the updates.
					if( $server_xml->installer == "steamcmd" )
					{						
						if( $master_server_home_id != FALSE AND $master_server_home_id != $server_home['home_id']  )
						{
							$manager .= "<form name='steam_master_".$server_home['home_id']."_".$server_home['mod_id'].
										"_".str_replace(".","",$server_home['ip'])."_".$server_home['port']."' action='?m=gamemanager&amp;p=update&amp;home_id=".
										$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;update=update' method='POST' >\n".
										"<table align='left' class='monitorbutton' >\n".
										"<tr><td align='middle' onclick='document.steam_master_".$server_home['home_id']."_".
										$server_home['mod_id']."_".str_replace(".","",$server_home['ip'])."_".$server_home['port'].
										".submit()' ><img style='border:0;height:40px;vertical-align:middle;' src='images/master.png' />".
										"<br /><span style='font-weight:bold;'>".get_lang('update_from_local_master_server').
										"</span><input id='master".$server_home['home_id'].
										"' type='hidden' name='master_server_home_id' value='".$master_server_home_id.
										"' /></td></tr>\n</table>\n</form>";
						}
						$manager .= "<form name='steam_".$server_home['home_id']."_".$server_home['mod_id']."_".
									str_replace(".","",$server_home['ip'])."_".$server_home['port']."' action='?m=gamemanager&amp;p=update&amp;home_id=".
									$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;update=update' method='POST' >\n".
									"<table align='left' class='monitorbutton' >\n".
									"<tr><td align='middle' onclick='document.steam_".$server_home['home_id']."_".$server_home['mod_id']."_".str_replace(".","",$server_home['ip']).
									"_".$server_home['port'].".submit()' ><img style='border:0;height:40px;vertical-align:middle;' src='images/steam.png' />".
									"<br /><span style='font-weight:bold;'>".get_lang('install_update_steam').
									"</span></td></tr>\n</table>\n</form>";
					}
					// In other cases manual update is provided.
					else
					{
						$manager .= "<a href='?m=gamemanager&amp;p=update_manual&amp;home_id=".$server_home['home_id'].
									"&amp;mod_id=".$server_home['mod_id']."&amp;update=update'>\n".
									"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
									"<img style='border:0;height:40px;vertical-align:middle;' src='images/install.png' title='".
									get_lang('install_update_manual')."'/>\n<br>".get_lang('install_update_manual')."\n</td></td></table></a>";
						
						$sync_name = get_sync_name($server_xml);
						$sync_list = @file("modules/gamemanager/rsync.list", FILE_IGNORE_NEW_LINES);
						$master_server_home_id = $db->getMasterServer( $server_home['remote_server_id'], $server_home['home_cfg_id'] );
						if ( in_array($sync_name, $sync_list) OR ($master_server_home_id != FALSE and $master_server_home_id != $server_home['home_id']) )
						{
							$manager .= "<a href='?m=gamemanager&amp;p=rsync_install&amp;home_id=".$server_home['home_id'].
										"&amp;mod_id=".$server_home['mod_id']."&amp;update=update'>\n".
										"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
										"<img style='border:0;height:40px;vertical-align:middle;' src='images/rsync.png' title='".
										get_lang('rsync_install')."'/>\n<br />".get_lang('rsync_install')."\n</td></td></table></a>";
						}
					}
				}
			}

			if( $isAdmin )
			{
				if ($server_xml->control_protocol == 'rcon' OR
					$server_xml->control_protocol == 'lcon' OR 
					$server_xml->control_protocol == 'rcon2' OR					
				   @$server_xml->gameq_query_name == 'minecraft')
				{
					$manager .= "<form name='rcon_preset".$server_home['home_id']."' action='home.php?m=gamemanager&amp;p=rcon_presets&amp;home_id=".
								 $server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."' method='POST'>\n".
								 "<table align='left' class='monitorbutton' >\n".
								 "<tr>\n".
								 "<td align='middle' onclick='document.rcon_preset".$server_home['home_id'].
								 ".submit()' ><img style='border:0;height:40px;vertical-align:middle;' src='images/rcon_preset.png' /><br /><span style='font-weight:bold;'>".
								 get_lang('rcon_presets').
								 "</span></td>\n".
								 "</tr>\n".
								 "</table>\n".
								 "</form>";
				}
			}
			
			$xml_installer = $server_xml->installer;
			
			// If query name does not exist use mod key instead.
			if ($server_xml->protocol == "gameq")
				$query_name = $server_xml->gameq_query_name;
			elseif ($server_xml->protocol == "lgsl")
				$query_name = $server_xml->lgsl_query_name;
			elseif ($server_xml->mods->mod['key'] == "none" OR $server_xml->mods->mod['key'] == "None")
				$query_name = "none";
			else
				$query_name = $server_xml->mods->mod['key'];
			
			
			if ($server_xml->mods->mod['key'] == "none" OR $server_xml->mods->mod['key'] == "None")
				$mod = "none";
			else
				$mod = $server_xml->mods->mod['key'];
			
			
			//----------+ getting the lgsl image icon
			$icon_paths = array("images/icons/$mod.png",
								"images/icons/$query_name.png",								
								"protocol/lgsl/other/icon_unknown.gif"); 

			$icon_path = get_first_existing_file($icon_paths);
					
			//Properties for all servers
			if(isset($post_home_id) && $post_home_id == $server_home['home_id'] OR isset($_GET['home_id']) && $_GET['home_id'] == $server_home['home_id'] )
				$trclass = " expandme";

			$groupusers = $db->getGroupUsersByHomeId($server_home['home_id']);
			if($groupusers)
			{
				$groupsus = "<b>".get_lang('group_users')."</b><br>";
				foreach($groupusers as $groupu)
					$groupsus .= $groupu['users_login']."<br>";
			}else
				$groupsus = "";
				
			$view_log = "<a href='?m=gamemanager&amp;p=log&amp;home_id-mod_id-ip-port=".$server_home['home_id']."-".
						$server_home['mod_id']."-".$server_home['ip']."-".$server_home['port']."'>\n".
						"<table align='left' class='monitorbutton' ><tr><td align='middle' >".
						"<img style='border:0;height:40px;vertical-align:middle;' src='images/log.png' title='".
						get_lang('view_log')."'/>\n<br>".get_lang('view_log')."\n</td></tr></table></a>";		
			
			$btns = $view_log.
					@$ftp.
					@$lite_fm.
					@$addonsmanager;
			//End
			
			$remote = new OGPRemoteLibrary($server_home['agent_ip'], $server_home['agent_port'], $server_home['encryption_key'], $server_home['timeout']);
			$host_stat = $remote->status_chk();
			
			if( $host_stat === 1)
			{
				if ( $server_home['use_nat'] == 1 )
					$query_ip = $server_home['agent_ip'];
				else
					$query_ip = $server_home['ip'];
					
				$address = $query_ip . ":" . $server_home['port'];
				$screen_running = $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$server_home['home_id']) === 1;
				$update_in_progress = $remote->is_screen_running(OGP_SCREEN_TYPE_UPDATE,$server_home['home_id']) === 1;
				if($screen_running)
				{					
					// Check if the screen running the server is running.						
					$status = "online";
					$order=1;
					if ($server_xml->protocol == "lgsl")
					{
						$get_q_and_s = lgsl_port_conversion((string)$query_name, $server_home['port'], "", "");
						//Connection port
						$c_port = $get_q_and_s['0'];
						//query port
						$q_port = $get_q_and_s['1'];
						//software port
						$s_port = $get_q_and_s['2'];
						$address = "<a href='" . lgsl_software_link($query_name, $query_ip, $c_port, $q_port, $s_port) . "'>".$query_ip.":".$server_home['port']."</a>";
					}
					if ($server_xml->protocol == "teamspeak3")
					{
						$address = "<a href='ts3server://" . $query_ip . ":" . $server_home['port'] . "'>".$query_ip.":".$server_home['port']."</a>";
					}
					$pos = $refresh->add("home.php?m=gamemanager&p=ref_servermonitor&type=cleared&server_home=". $server_home['home_id'] . "&ip=" . $server_home['ip'] . "&port=" . $server_home['port']);
					if ($server_xml->protocol == "teamspeak3")
					{
						require('protocol/TeamSpeak3/functions.php');
					}
					$startup_file_exists = $remote->rfile_exists( "startups/".$server_home['ip']."-".$server_home['port'] ) === 1;
					$ctrlChkBoxes .= '<div id="server_icon" class="action-stop'.$server_home['home_id'].'" >
									 <div>
									 <input id="action-stop" class="action-stop'.$server_home['home_id'].'" name="action-'.$server_home['home_id'].'" value="stop-'.
									 $server_home['home_id'].'-'.$server_home['mod_id'].'-'.$server_home['ip'].'-'.$server_home['port'].
									 '" type="radio"><img style="border:0;height:15px;" src="images/stop.png"/></div><div>&nbsp;'.
									 get_lang('stop_server').'</div></div>';
					if($startup_file_exists)
					{
						$ctrlChkBoxes .= '<div id="server_icon" class="action-restart'.$server_home['home_id'].'" >
										 <div>
										 <input id="action-restart" class="action-restart'.$server_home['home_id'].'" name="action-'.$server_home['home_id'].'" value="restart-'.
										 $server_home['home_id'].'-'.$server_home['mod_id'].'-'.$server_home['ip'].'-'.$server_home['port'].
										 '" type="radio"><img style="border:0;height:15px;" src="images/restart.png"/></div><div>&nbsp;'
										 .get_lang('restart_server').'</div></div>';
					}
					$stats_servers_online++;
				}
				else
				{
					$status = "offline";
					if ($db->getLastParam($server_home['home_id']) != FALSE)
					{
						if($update_in_progress)
							$ctrlChkBoxes .= '<div id="server_icon" class="action-start'.$server_home['home_id'].'" >&nbsp;'.get_lang('update_in_progress').'</div>';
						else
							$ctrlChkBoxes .= '<div id="server_icon" class="action-start'.$server_home['home_id'].'" >
											 <div>
											 <input id="action-start" class="action-start'.$server_home['home_id'].'" name="action-'.$server_home['home_id'].'" value="start-'.
											 $server_home['home_id'].'-'.$server_home['mod_id'].'-'.$server_home['ip'].'-'.$server_home['port'].
											 '" type="radio"><img style="border:0;height:15px;" src="images/start.png"/></div><div>&nbsp;'.
											 get_lang('start_server').'</div></div>';
					}
					$order = 3;
					ob_start();
					require('modules/gamemanager/mini_start.php');
					$ministart = ob_get_contents();
					ob_end_clean();
					if($update_in_progress)
						$offlineT = '<div id="server_icon" class="action-start'.$server_home['home_id'].'" >&nbsp;'.get_lang('update_in_progress').'</div>';
					else
						$offlineT = $ministart;
				}
			}
			else{
				$status = "offline";
				$order = 3;
				$address = "<span style='color:darkred;font-weight:bold;'>Agent Offline</span>";
			}
			$user = $db->getUserById($server_home['user_id_main']);
			
			// Template
			@$first = "<tr class='maintr$trclass'>";
				$first .= "<td class='collapsible'><span class='hidden'>$order</span><a></a>" . "<img src='images/$status.png' />" . "</td>";
				$first .= "<td>" . "<span class='hidden'>$mod</span><img src='$icon_path' />" . "</td>";
				$first .= "<td class='collapsible'><a></a><b>" . $server_home['home_name'] . "</b>$mod_name</td>";
				$first .= "<td>" . $address . "</td>";
				$first .= "<td>" . $user['users_login'] . "</td>";
				$first .= "<td style='width:328px;padding:0px;'>$ctrlChkBoxes</td>";
			$first .= "</tr>";
			
			$second = "<tr class='expand-child'>";
				@$second .= "<td colspan='4'>" . $refresh->getdiv($pos,"width:100%;") . "$offlineT</td>";
				$second .= "<td width='80'>$groupsus</td>";
				@$second .= "<td>$btns$manager<br>$mysql<br>$get_size<br>$ts3opt</td>";
			$second .= "</tr>";
			//Echo them all
			echo "$first$second";
		}
	}
	echo "</tbody>";
	
	echo "<tfoot style='border:1px solid grey;'>
			<tr>
			  <td colspan='6' >
				<div class='bloc' >
				<img src='images/magnifglass.png' /> ".get_lang('statistics').": $stats_servers_online/$stats_servers ".get_lang('servers')."\n</div>
				<div class='right bloc' >
				  <label>".get_lang('execute_selected_server_operations')."</label>
				  <input id='execute_operations' type='submit' value='".get_lang('execute_operations')."' >\n
				</div>
			  </td>
			</tr>
		  </tfoot>";
	
	echo "</table>";
	?>
	<script type="text/javascript">
			$(document).ready(function() 
				{ 
					<?php echo $refresh->build("8000"); ?>
					$('input#search').quicksearch('table#servermonitor tbody tr.maintr');
					$("#servermonitor")
						.collapsible("td.collapsible", {collapse: true})
						.tablesorter({sortList: [[0,0], [1,0]] , widgets: ['zebra','repeatHeaders']})
						; 
				} 
			);
			
			$("div#server_icon").click(function(){
				var id = $(this).attr('class');
				if($("input[type=radio]."+id).attr('checked') == 'checked')
				{
					$("input[type=radio]."+id).prop('checked', false);
				}
				else
				{
					$("input[type=radio]."+id).prop('checked', true);
				}
			});
						
			$('.size').click(function(){
				var $id = $(this).attr('id');
				$.get( "home.php?m=user_games&type=cleared&p=get_size&home_id="+$id, function( data ) {
					$('#'+$id+".size").text( data );
					$('#'+$id+".size").css("font-size", "16pt");
				});
			});
			
			$('#execute_operations').click(function(){
				var addpost = {};
				$('input[type=radio]:checked').each(function( ){
					var name = $(this).attr('name');
					var value = $(this).val();
					addpost[ name ] = value;
				});
				
				$('.right.bloc').html('<img src="images/loading.gif" />');
				
				$.ajax({
				type: "POST",
				url: "home.php?m=gamemanager&p=game_monitor",
				data: addpost,
				complete: function(){ 
					document.location.reload(); 
				}
				});
			});
			
			$('img#action-stop').click(function(){
				$('input[type=radio]#action-stop').each(function( ){
					if( this.checked )
					{
						$(this).attr('checked', false);
					}
					else
					{
						$(this).attr('checked', true);
					}
				});
			});
			
			$('img#action-restart').click(function(){
				$('input[type=radio]#action-restart').each(function( ){
					if( this.checked )
					{
						$(this).attr('checked', false);
					}
					else
					{
						$(this).attr('checked', true);
					}
				});
			});
			
			$('img#action-start').click(function(){
				$('input[type=radio]#action-start').each(function( ){
					if( this.checked )
					{
						$(this).attr('checked', false);
					}
					else
					{
						$(this).attr('checked', true);
					}
				});
			});
		</script>
	<?php	
}
?>
