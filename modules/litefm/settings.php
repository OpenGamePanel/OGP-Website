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

require_once(MODULES."/litefm/functions.php");
function exec_ogp_module()
{
	require_once('includes/form_table_class.php');
	global $db;
	echo "<h2>".get_lang('litefm_settings')."</h2>";
	
	// Get File Operations Keys
	$fo_keys = get_file_operations_keys();

	if ( isset($_REQUEST['update_settings']) )
	{
		$file_operations = array();
		foreach($fo_keys as $key)
		{
			$file_operations[$key] = $_POST[$key];
		}
		$lfm_file_operations = json_encode($file_operations);
		
		$litefm_settings = array(
			"lfm_file_operations" => $lfm_file_operations,
		);
		
		$db->setSettings($litefm_settings);
		print_success(get_lang('settings_updated'));
	}

	$settings = $db->getSettings();
	// Get File Operations Settings
	$fo = get_fo_settings($settings,$fo_keys);

	$ft = new FormTable();
	$ft->start_form("?m=litefm&amp;p=litefm_settings", "post", "autocomplete=\"off\"");
	$ft->start_table();
	foreach($fo_keys as $key)
	{
		$ft->add_field('on_off',$key,$fo[$key]);
	}
	$ft->end_table();
	$ft->add_button("submit","update_settings",get_lang('update_settings'));
	$ft->end_form();
}
?>