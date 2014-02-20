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

// settings.php

$lang['settings'] = "Panel Einstellungen";
$lang['maintenance_mode'] = "Wartungsmodus";
$lang['maintenance_mode_info'] = "The message that is dispayed to normal users during maintenance.";
$lang['maintenance_title'] = "Wartungsmodus Titel";
$lang['maintenance_title_info'] = "The title that is displayed to normal users during maintenance.";
$lang['maintenance_message'] = "Wartungsmodus Nachricht";
$lang['maintenance_message_info'] = "The message that is dispayed to normal users during maintenance.";
$lang['update_settings'] = "Einstellungen speichern";
$lang['settings_updated'] = "Settings successfully updated.";
$lang['panel_language'] = "Panel Sprache";
$lang['panel_language_info'] = "This language is the default language of the panel. Users can change their own language from their profile editing page.";
$lang['page_auto_refresh'] = "Page Auto Refresh";
$lang['page_auto_refresh_info'] = "Page Auto Refresh settings is mainly used in panel debugging. In normal usage this should be set to On.";
$lang['smtp_server'] = "Ausgehender E-Mail Server";
$lang['smtp_server_info'] = "This is the outgoing mail server (SMTP server) that is used, for example, to sent forgotten passwords to users, localhost by default..";
$lang['panel_email_address'] = "Ausgehende E-Mail Adresse";
$lang['panel_email_address_info'] = "This is the e-mail address that is in from field when passwords are sent to users.";
$lang['panel_name'] = "Panel name";
$lang['panel_name_info'] = "Name of the panel that is shown in the page title. This value will overrule all page titles, if not empty.";
$lang['feed_enable'] = "LGSL Feed aktivieren";
$lang['feed_enable_info'] = "If your webhost has a firewall blocking the query port you need enable it.";
$lang['feed_url'] = "Feed URL";
$lang['feed_url_info'] = "GrayCube.com is sharing a LGSL feed on the URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>";
$lang['charset'] = "Zeichenkodierung";
$lang['charset_info'] = "UTF8, ISO, ASCII, usw... Leer lassen um ISO Kodierung zu nutzen.";
$lang['steam_user'] = "Steam User";
$lang['steam_user_info'] = "This user is needed to log in to steam for download some new games like CS:GO.";
$lang['steam_pass'] = "Steam Password";
$lang['steam_pass_info'] = "Set here the steam account password.";
$lang['steam_guard'] = "Steam Guard Code";
$lang['steam_guard_info'] = "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.";
$lang['smtp_port'] = "SMTP Port";
$lang['smtp_port_info'] = "If SMTP port is not the default port (25) Enter the SMTP port here.";
$lang['smtp_login'] = "SMTP User";
$lang['smtp_login_info'] = "If your SMTP server requires authentication, enter your user name here.";
$lang['smtp_passw'] = "SMTP Password";
$lang['smtp_passw_info'] = "If you do not set a password the SMTP authentication will be disabled.";
$lang['smtp_ssl'] = "SMTP SSL";
$lang['smtp_ssl_info'] = "Use SSL to connect to the SMTP server";
$lang['time_zone'] = "Time Zone";
$lang['time_zone_info'] = "Sets the default timezone used by all date/time functions.";
$lang['query_cache_life'] = "Query cache life";
$lang['query_cache_life_info'] = "Sets the timeout in seconds before the server status is refreshed.";
$lang['query_num_servers_stop'] = "Disable Game Server Queries After";
$lang['query_num_servers_stop_info'] = "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.";
$lang['editable_email'] = "Editable E-Mail Address";
$lang['editable_email_info'] = "Select if users can edit their e-mail address or not.";
$lang['old_dashboard_behavior'] = "Old Dashboard behavior";
$lang['old_dashboard_behavior_info'] = "The old Dashboard was running slower but shows more server information, current players and map.";
$lang['rsync_available'] = "Available rsync servers";
$lang['rsync_available_info'] = "Select what servers list will be shown in the rsync installation.";
$lang['all_available_servers'] = "All available servers ( rsync_sites.list + rsync_sites_local.list )";
$lang['only_remote_servers'] = "Only remote servers ( rsync_sites.list )";
$lang['only_local_servers'] = "Only local servers ( rsync_sites_local.list )";
$lang['header_code'] = "Header code";
$lang['header_code_info'] = "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.";
$lang[''] = "";

// Theme settings
$lang['theme_settings'] = "Theme Einstellungen";
$lang['themes'] = "Theme Einstellungen";
$lang['theme'] = "Theme";
$lang['theme_info'] = "Theme selected here will be the default theme for all users. Users can change their theme from their profile page.";
$lang['welcome_title'] = "Welcome Title";
$lang['welcome_title_info'] = "Enables the title that is displayed at the top of the dashboard.";
$lang['welcome_title_message'] = "Welcome Title Message";
$lang['welcome_title_message_info'] = "The title message that is displayed at the top of the dashboard (html allowed).";
$lang['logo_link'] = "Logos Link";
$lang['logo_link_info'] = "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>";
$lang['custom_tab'] = "Custom Tab";
$lang['custom_tab_info'] = "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>";
$lang['custom_tab_name'] = "Custom Tab Name";
$lang['custom_tab_name_info'] = "The tabs display name.";
$lang['custom_tab_link'] = "Custom Tab Link";
$lang['custom_tab_link_info'] = "The tabs hyperlink.";
$lang['custom_tab_sub'] = "Custom Sub-Tabs";
$lang['custom_tab_sub_info'] = "Adds customisable sub-tabs when hovering over the 'Custom Tab'.";
$lang['custom_tab_sub_name'] = "Sub-Tab #1 Name";
$lang['custom_tab_sub_link'] = "Sub-Tab #1 Link";
$lang['custom_tab_sub_name2'] = "Sub-Tab #2 Name";
$lang['custom_tab_sub_link2'] = "Sub-Tab #2 Link";
$lang['custom_tab_sub_name3'] = "Sub-Tab #3 Name";
$lang['custom_tab_sub_link3'] = "Sub-Tab #3 Link";
$lang['custom_tab_sub_name4'] = "Sub-Tab #4 Name";
$lang['custom_tab_sub_link4'] = "Sub-Tab #4 Link";
$lang['custom_tab_target_blank'] = "Custom Tabs Target";
$lang['custom_tab_target_blank_info'] = "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>('_self' = Opens link on same page. '_blank'  =  Opens link on new tab.)</b>";
$lang['bg_wrapper'] = "Wrapper Hintergrund";
$lang['bg_wrapper_info'] = "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on some themes.)</b>";

?>
