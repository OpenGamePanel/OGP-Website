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

function exec_ogp_module()
{
	require_once('includes/form_table_class.php');
	global $db,$view;

	if ( isset($_REQUEST['update_settings']) )
	{
		$ssl = (isset($_POST['smtp_secure']) and $_POST['smtp_secure'] == 'ssl') ? 1 : 0;
		$tls = (isset($_POST['smtp_secure']) and $_POST['smtp_secure'] == 'tls') ? 1 : 0;
		$settings = array("panel_name" => $_REQUEST['panel_name'],
			"header_code" => $_REQUEST['header_code'],
			"maintenance_mode" => $_REQUEST['maintenance_mode'],
			"maintenance_title" => $_REQUEST['maintenance_title'],
			"maintenance_message" => $_REQUEST['maintenance_message'],
			"panel_language" => $_REQUEST['panel_language'],
			"time_zone" => $_REQUEST['time_zone'],
			"page_auto_refresh" => $_REQUEST['page_auto_refresh'],
			"smtp_server" => $_REQUEST['smtp_server'],
			"smtp_port" => $_REQUEST['smtp_port'],
			"smtp_login" => $_REQUEST['smtp_login'],
			"smtp_passw" => $_REQUEST['smtp_passw'],
			"smtp_ssl" => $ssl,
			"smtp_tls" => $tls,
			"panel_email_address" => $_REQUEST['panel_email_address'],
			"remote_query" => $_REQUEST['remote_query'],
			"feed_enable" => $_REQUEST['feed_enable'],
			"feed_url" => $_REQUEST['feed_url'],
			"query_cache_life" => $_REQUEST['query_cache_life'],
			"query_num_servers_stop" => $_REQUEST['query_num_servers_stop'],
			"steam_user" => $_REQUEST['steam_user'],
			"steam_pass" => $_REQUEST['steam_pass'],
			"steam_guard" => $_REQUEST['steam_guard'],
			"editable_email" => $_REQUEST['editable_email'],
			"old_dashboard_behavior" => $_REQUEST['old_dashboard_behavior'],
			"rsync_available" => $_REQUEST['rsync_available'],
			"support_widget_title" => $_REQUEST['support_widget_title'],
			"support_widget_content" => $_REQUEST['support_widget_content'],
			"support_widget_link" => $_REQUEST['support_widget_link'],
			"check_expiry_by" => $_REQUEST['check_expiry_by'],
			"recaptcha_site_key" => $_REQUEST['recaptcha_site_key'],
			"recaptcha_secret_key" => $_REQUEST['recaptcha_secret_key'],
			"recaptcha_use_login" => $_REQUEST['recaptcha_use_login'],
			"login_attempts_before_banned" => $_REQUEST['login_attempts_before_banned'],
			"custom_github_update_username" => $_REQUEST['custom_github_update_username'],
			"show_server_id_game_monitor" => $_REQUEST['show_server_id_game_monitor'],
			"default_game_server_home_path_prefix" => $_REQUEST['default_game_server_home_path_prefix'],
			"use_authorized_hosts" => $_REQUEST['use_authorized_hosts'],
		);
		
		$db->setSettings($settings);
		
		if(array_key_exists("reset_game_server_order", $_REQUEST) && $_REQUEST["reset_game_server_order"] == 1){
			$db->resetGameServerOrder();
		}
		
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

	foreach(DateTimeZone::listIdentifiers() as $tz) {
		$current_tz = new DateTimeZone($tz);
		$offset =  $current_tz->getOffset($dt);
		$transition =  $current_tz->getTransitions($dt->getTimestamp(), $dt->getTimestamp());
		$abbr = $transition[0]['abbr'];
		$zones["$tz"] = $tz . '[' . $abbr . ' ' . formatOffset($offset) . ']';
	}
	
	$rsync_options = array("1" => get_lang('all_available_servers'), "2" => get_lang('only_remote_servers'), "3" => get_lang('only_local_servers'));

	$row = $db->getSettings();

	echo "<h2>".get_lang('settings')."</h2>";
	
	if(@$row['use_authorized_hosts']){
		echo "<h4><a href='?m=settings&p=api_hosts'>".get_lang('setup_api_authorized_hosts')."</a></h4>";
	}
	
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
	$ft->add_field('text','header_code',@$row['header_code'], 38);
	$ft->add_field('on_off','maintenance_mode',@$row['maintenance_mode']);
	$ft->add_field('string','maintenance_title',@$row['maintenance_title']);
	$ft->add_field('text','maintenance_message',@$row['maintenance_message'], 38);
	$ft->add_field('on_off','page_auto_refresh',@$row['page_auto_refresh']);
	$ft->add_field('string','panel_email_address',@$row['panel_email_address']);
	$ft->add_field('string','smtp_server',@$row['smtp_server']);
	$ft->add_field('string','smtp_port',@$row['smtp_port']);
	$ssl = (isset($row['smtp_ssl']) and $row['smtp_ssl'] == 1) ? "checked='checked'" : "";
	$tls = (isset($row['smtp_tls']) and $row['smtp_tls'] == 1) ? "checked='checked'" : "";
	$no = (!isset($row['smtp_ssl']) or $row['smtp_ssl'] == 0 AND !isset($row['smtp_tls']) or ( isset($row['smtp_tls']) and $row['smtp_tls'] == 0)) ? "checked='checked'" : "";
	$ft->add_custom_field('smtp_secure','<input type=radio name=smtp_secure value=0 '.$no.
										'>'.get_lang('no').'&nbsp;&nbsp;<input type=radio name=smtp_secure value=ssl '.$ssl.
										'>SSL&nbsp;&nbsp;<input  type=radio name=smtp_secure value=tls '.$tls.'>TLS');
	$ft->add_field('string','smtp_login',@$row['smtp_login']);
	$ft->add_field('password','smtp_passw',@$row['smtp_passw']);
	$ft->add_field('on_off','remote_query',@$row['remote_query']);
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
	$ft->add_field('string','support_widget_title',@$row['support_widget_title']);
	$ft->add_field('text','support_widget_content',@$row['support_widget_content'], 38);
	$ft->add_field('string','support_widget_link',@$row['support_widget_link']);
	$ft->add_custom_field('check_expiry_by',
		create_drop_box_from_array(array('once_logged_in' => get_lang('once_logged_in'), 'cron_job' => get_lang('cron_job')),"check_expiry_by",@$row['check_expiry_by'],false));
	$ft->add_field('string','recaptcha_site_key',@$row['recaptcha_site_key']);
	$ft->add_field('string','recaptcha_secret_key',@$row['recaptcha_secret_key']);
	$ft->add_field('on_off','recaptcha_use_login',@$row['recaptcha_use_login']);
	
	$login_attempts_before_banned = (isset($row['login_attempts_before_banned']) and $row['login_attempts_before_banned'] != "" and is_numeric($row['login_attempts_before_banned']))? $row['login_attempts_before_banned'] : "6";
	$ft->add_field('string','login_attempts_before_banned',$login_attempts_before_banned);
	
	$ft->add_field('string','custom_github_update_username',@$row['custom_github_update_username']);
	
	$ft->add_field('on_off','show_server_id_game_monitor',@$row['show_server_id_game_monitor']);
	
	$ft->add_field('string','default_game_server_home_path_prefix',@$row['default_game_server_home_path_prefix']);
	
	// Use authorized hosts for API - this should be disabled by default since using the KEY alone should be secure enough
	$ft->add_field('on_off','use_authorized_hosts',@$row['use_authorized_hosts']);	
	
	// Add option to reset game server order to default
	$ft->add_field('checkbox','reset_game_server_order','0');	
	
	$ft->end_table();
	$ft->add_button("submit","update_settings",get_lang('update_settings'));
	$ft->end_form();
}
?>
