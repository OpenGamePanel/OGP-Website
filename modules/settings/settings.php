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

function exec_ogp_module()
{
    require_once('includes/form_table_class.php');
    global $db,$view;

    if ( isset($_REQUEST['update_settings']) )
    {
        $settings = array("panel_name" => $_REQUEST['panel_name'],
			"header_code" => $_REQUEST['header_code'],
			"maintenance_mode" => $_REQUEST['maintenance_mode'],
			"maintenance_title" => $_REQUEST['maintenance_title'],
            "maintenance_message" => $_REQUEST['maintenance_message'],
            "panel_language" => $_REQUEST['panel_language'],
			"time_zone" => $_REQUEST['time_zone'],
			"charset" => $_REQUEST['charset'],
            "page_auto_refresh" => $_REQUEST['page_auto_refresh'],
            "smtp_server" => $_REQUEST['smtp_server'],
			"smtp_port" => $_REQUEST['smtp_port'],
			"smtp_login" => $_REQUEST['smtp_login'],
			"smtp_passw" => $_REQUEST['smtp_passw'],
			"smtp_ssl" => $_REQUEST['smtp_ssl'],
            "panel_email_address" => $_REQUEST['panel_email_address'],
			"feed_enable" => $_REQUEST['feed_enable'],
            "feed_url" => $_REQUEST['feed_url'],
			"query_cache_life" => $_REQUEST['query_cache_life'],
			"query_num_servers_stop" => $_REQUEST['query_num_servers_stop'],
			"steam_user" => $_REQUEST['steam_user'],
            "steam_pass" => $_REQUEST['steam_pass'],
			"steam_guard" => $_REQUEST['steam_guard'],
			"editable_email" => $_REQUEST['editable_email'],
			"old_dashboard_behavior" => $_REQUEST['old_dashboard_behavior'],
			"rsync_available" => $_REQUEST['rsync_available']);
		
        $db->setSettings($settings);
		echo "<h2>".get_lang('settings')."</h2>";
        print_success(get_lang('settings_updated'));
        $view->refresh("?m=settings");
        return;
    }
	
	function formatOffset($offset) {
		$hours = $offset / 3600;
		$remainder = $offset % 3600;
		$sign = $hours > 0 ? '+' : '-';
		$hour = (int) abs($hours);
		$minutes = (int) abs($remainder / 60);

		if ($hour == 0 AND $minutes == 0) {
			$sign = ' ';
		}
		return $sign . str_pad($hour, 2, '0', STR_PAD_LEFT) .':'. str_pad($minutes,2, '0');
	}

	$utc = new DateTimeZone('UTC');
	$dt = new DateTime('now', $utc);
	if( ! method_exists($dt, 'getTimestamp') )
	{
		$dt = new DateTime_52('now', $utc);
	}

	foreach(DateTimeZone::listIdentifiers() as $tz) {
		$current_tz = new DateTimeZone($tz);
		$offset =  $current_tz->getOffset($dt);
		$transition =  $current_tz->getTransitions($dt->getTimestamp(), $dt->getTimestamp());
		$abbr = $transition[0]['abbr'];
		$zones["$tz"] = $tz . '[' . $abbr . ' ' . formatOffset($offset) . ']';
	}
	
	$rsync_options = array("1" => get_lang('all_available_servers'), "2" => get_lang('only_remote_servers'), "3" => get_lang('only_local_servers'));

    echo "<h2>".get_lang('settings')."</h2>";

    $row = $db->getSettings();
    $ft = new FormTable();
    $ft->start_form("?m=settings", "post", "autocomplete=\"off\"");
    $ft->start_table();
	$ft->add_field('string','panel_name',@$row['panel_name']);
    $locale_files = makefilelist("lang/", ".|..|.svn", true, "folders");
	$locale_files = array('' => "-") + $locale_files;
    $ft->add_custom_field('panel_language',
        create_drop_box_from_array($locale_files,"panel_language",@$row['panel_language']));
	$zones = array('' => "-") + $zones;
	$ft->add_custom_field('time_zone',
        create_drop_box_from_array($zones,"time_zone",@$row['time_zone'],false));
	$ft->add_field('string','charset',@$row['charset']);
	$ft->add_field('text','header_code',@$row['header_code']);
    $ft->add_field('on_off','maintenance_mode',@$row['maintenance_mode']);
	$ft->add_field('string','maintenance_title',@$row['maintenance_title']);
    $ft->add_field('text','maintenance_message',@$row['maintenance_message']);
    $ft->add_field('on_off','page_auto_refresh',@$row['page_auto_refresh']);
    $ft->add_field('string','panel_email_address',@$row['panel_email_address']);
	$ft->add_field('string','smtp_server',@$row['smtp_server']);
	$ft->add_field('string','smtp_port',@$row['smtp_port']);
	$ft->add_field('on_off','smtp_ssl',@$row['smtp_ssl']);
	$ft->add_field('string','smtp_login',@$row['smtp_login']);
	$ft->add_field('string','smtp_passw',@$row['smtp_passw']);
	$ft->add_field('on_off','feed_enable',@$row['feed_enable']);
    $ft->add_field('string','feed_url',@$row['feed_url']);
	$query_cache_life = (isset($row['query_cache_life']) and $row['query_cache_life'] != "" )? $row['query_cache_life'] : "30";
	$ft->add_field('string','query_cache_life',$query_cache_life);
	$query_num_servers_stop = (isset($row['query_num_servers_stop']) and $row['query_num_servers_stop'] != "" )? $row['query_num_servers_stop'] : "15";
	$ft->add_field('string','query_num_servers_stop',$query_num_servers_stop);
	$ft->add_field('string','steam_user',@$row['steam_user']);
	$ft->add_field('password','steam_pass',@$row['steam_pass']);
	$ft->add_field('password','steam_guard',@$row['steam_guard']);
	$mail_setting = isset($row['editable_email']) ? $row['editable_email'] : "1";
	$ft->add_field('on_off','editable_email',$mail_setting);
	$ft->add_field('on_off','old_dashboard_behavior',@$row['old_dashboard_behavior']);
	$ft->add_custom_field('rsync_available',
        create_drop_box_from_array($rsync_options,"rsync_available",@$row['rsync_available'],false));
    $ft->end_table();
    $ft->add_button("submit","update_settings",get_lang('update_settings'));
    $ft->end_form();
}
?>
