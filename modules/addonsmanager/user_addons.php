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

function exec_ogp_module() {
	global $db;
	$home_id = $_GET['home_id'];
	$mod_id = $_GET['mod_id'];
	$ip = $_GET['ip'];
	$port = $_GET['port'];
	$user_id = $_SESSION['user_id'];
	// Check if user has some games.
	$isAdmin = $db->isAdmin( $user_id );
	$query_groups = "";
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
	{
		$home_info = $db->getUserGameHome($user_id,$home_id);
		$groups = $db->getUsersGroups($_SESSION['user_id']);
		$query_groups .= " AND (";
		foreach($groups as $group)
			$query_groups .= "group_id=".$group['group_id']." OR ";
		$query_groups .= "group_id=0 OR group_id IS NULL)";
	}
	if ($home_info)
	{
		$home_cfg_id = $home_info['home_cfg_id'];
		echo "<h2>".get_lang('user_addons').": ".htmlentities($home_info['home_name'])."</h2>\n".
			 "<table class='center' >\n".
			 "<tr><td>\n";
		$plugins = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name ".
									"FROM OGP_DB_PREFIXaddons ".
									"NATURAL JOIN OGP_DB_PREFIXconfig_homes ".
									"WHERE addon_type='plugin' ".
									"AND home_cfg_id=".$home_cfg_id.$query_groups);
		$plugins_qty = count($plugins);
		if($plugins and $plugins_qty >= 1)
			echo "<a href='?m=addonsmanager&amp;p=addons&amp;home_id=".$home_id.
				 "&amp;mod_id=".$mod_id."&amp;addon_type=plugin&amp;ip=".$ip.
				 "&amp;port=".$port."'>".get_lang('install_plugin')."(".$plugins_qty.")</a>\n";
	
		$mappacks = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name ".
									 "FROM OGP_DB_PREFIXaddons ".
									 "NATURAL JOIN OGP_DB_PREFIXconfig_homes ".
									 "WHERE addon_type='mappack' ".
									 "AND home_cfg_id=".$home_cfg_id.$query_groups);
		$mappacks_qty = count($mappacks);
		if($mappacks and $mappacks_qty >= 1){
			echo "</td><td>";
			echo "<a href='?m=addonsmanager&amp;p=addons&amp;home_id=".$home_id.
				 "&amp;mod_id=".$mod_id."&amp;addon_type=mappack&amp;ip=".$ip.
				 "&amp;port=".$port."'>".get_lang('install_mappack')."(".$mappacks_qty.")</a>\n";
		}
		$configs = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name ".
									"FROM OGP_DB_PREFIXaddons ".
									"NATURAL JOIN OGP_DB_PREFIXconfig_homes ".
									"WHERE addon_type='config' ".
									"AND home_cfg_id=".$home_cfg_id.$query_groups);
		$configs_qty = count($configs);
		if($configs and $configs_qty >= 1){
			echo "</td><td>";
			echo "<a href='?m=addonsmanager&amp;p=addons&amp;home_id=".$home_id.
				 "&amp;mod_id=".$mod_id."&amp;addon_type=config&amp;ip=".$ip.
				 "&amp;port=".$port."'>".get_lang('install_config')."(".$configs_qty.")</a>\n";
		}
		echo "</td></tr>\n".
			 "</table>\n".
			 "<form action='?m=gamemanager&amp;p=game_monitor&amp;home_id-mod_id-ip-port=$home_id-$mod_id-$ip-$port' method='POST'>\n".
			 "<input type='submit' value='".get_lang('back')."' />\n".
			 "</form>\n".
			 "<br>\n";
	}
	else
		print_failure(get_lang('no_games_servers_available'));
}
?>
