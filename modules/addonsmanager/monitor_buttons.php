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
 
$query_groups = "";
if($_SESSION['users_role'] != "admin")
{
	$groups = $db->getUsersGroups($_SESSION['user_id']);
	$query_groups .= " AND (";
	foreach($groups as $group)
		$query_groups .= "group_id=".$group['group_id']." OR ";
	$query_groups .= "group_id=0 OR group_id IS NULL)";
}
$addons = $db->resultQuery("SELECT addon_id FROM OGP_DB_PREFIXaddons WHERE home_cfg_id=".$server_home['home_cfg_id'].$query_groups);
$addons_qty = count($addons);
if($addons and $addons_qty >= 1){
	$module_buttons = array(
		"<a class='monitorbutton' href='?m=addonsmanager&amp;p=user_addons&amp;home_id=".
			$server_home['home_id']."&amp;mod_id=".$server_home['mod_id'].
			"&amp;ip=".$server_home['ip']."&amp;port=".$server_home['port']."'>
			<img src='" . check_theme_image("modules/administration/images/addons_manager.png") . "' title='". get_lang("addons") ."'>
			<span>". get_lang("addons") ." (".$addons_qty.")</span>
		</a>"
	);
}
else
	$module_buttons = array();
?>