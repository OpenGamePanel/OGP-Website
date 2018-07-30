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

define('OGP_LANG_maintenance_mode', "Wartungsmodus");
define('OGP_LANG_maintenance_mode_info', "Deaktiviert das Panel für Normale Benutzer. Nur Administratoren können während der Wartung darauf zugreifen.");
define('OGP_LANG_maintenance_title', "Wartungsmodus Titel");
define('OGP_LANG_maintenance_title_info', "Der Titel, der während der Wartung für normale Benutzer angezeigt wird.");
define('OGP_LANG_maintenance_message', "Wartungsmodus Nachricht");
define('OGP_LANG_maintenance_message_info', "Die Meldung, die normale Benutzer während der Wartung angezeigt wird.");
define('OGP_LANG_update_settings', "Einstellungen speichern");
define('OGP_LANG_settings_updated', "Einstellungen erfolgreich aktualisiert.");
define('OGP_LANG_panel_language', "Panel Sprache");
define('OGP_LANG_panel_language_info', "Diese Sprache ist die Standart Sprache des Panels. Benutzer können Ihre eigene Sprache in Ihren Profil Einstellungen ändern.");
define('OGP_LANG_page_auto_refresh', "Seite automatisch neuladen");
define('OGP_LANG_page_auto_refresh_info', "Page Auto Refresh settings is mainly used in panel debugging. In normal usage this should be set to On.");
define('OGP_LANG_smtp_server', "Ausgehender E-Mail Server");
define('OGP_LANG_smtp_server_info', "This is the outgoing mail server (SMTP server) that is used, for example, to sent forgotten passwords to users, localhost by default.");
define('OGP_LANG_panel_email_address', "Ausgehende E-Mail Adresse");
define('OGP_LANG_panel_email_address_info', "This is the e-mail address that is in from field when passwords are sent to users.");
define('OGP_LANG_panel_name', "Panel Name");
define('OGP_LANG_panel_name_info', "Name of the Panel that is shown in the page title. This value will overrule all page titles, if it's not empty.");
define('OGP_LANG_feed_enable', "LGSL Feed aktivieren");
define('OGP_LANG_feed_enable_info', "If your webhost has a firewall which is blocking the query port, then you need to open the port manually.");
define('OGP_LANG_feed_url', "Feed URL");
define('OGP_LANG_feed_url_info', "GrayCube.com teilt einen LGSL-Feed auf der URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_charset', "Zeichenkodierung");
define('OGP_LANG_charset_info', "UTF8, ISO, ASCII, etc... Overrides the character encoding defined in language files. Leave it blank to use language default.");
define('OGP_LANG_steam_user', "Steam Nutzer");
define('OGP_LANG_steam_user_info', "This user is needed to log in to steam for download some new games like CS:GO.");
define('OGP_LANG_steam_pass', "Steam Passwort");
define('OGP_LANG_steam_pass_info', "Legen Sie hier das Kennwort für das Steam-Account fest.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('OGP_LANG_smtp_port', "SMTP Port");
define('OGP_LANG_smtp_port_info', "If SMTP port is not the default port (25) Enter the SMTP port here.");
define('OGP_LANG_smtp_login', "SMTP Nutzer");
define('OGP_LANG_smtp_login_info', "If your SMTP server requires authentication, enter your user name here.");
define('OGP_LANG_smtp_passw', "SMTP Passwort");
define('OGP_LANG_smtp_passw_info', "Wenn Sie kein Passwort setzen, wird die SMTP-Authentifizierung deaktiviert.");
define('OGP_LANG_smtp_secure', "SMTP Sicherheit");
define('OGP_LANG_smtp_secure_info', "Verwenden Sie SSL/TLS, um eine Verbindung zum SMTP Server herzustellen");
define('OGP_LANG_time_zone', "Zeitzone");
define('OGP_LANG_time_zone_info', "Sets the default timezone used by all date/time functions.");
define('OGP_LANG_query_cache_life', "Query cache life");
define('OGP_LANG_query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('OGP_LANG_query_num_servers_stop', "Disable Game Server Queries After");
define('OGP_LANG_query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('OGP_LANG_editable_email', "Editable E-Mail Address");
define('OGP_LANG_editable_email_info', "Select if users can edit their e-mail address or not.");
define('OGP_LANG_old_dashboard_behavior', "Old Dashboard behavior");
define('OGP_LANG_old_dashboard_behavior_info', "The old Dashboard was running slower, but shows more server informations (e.g. current players and maps).");
define('OGP_LANG_rsync_available', "Verfügbare Rsync Server");
define('OGP_LANG_rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('OGP_LANG_all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Only remote servers ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Only local servers ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Header code");
define('OGP_LANG_header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('OGP_LANG_support_widget_title', "Support widget title");
define('OGP_LANG_support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('OGP_LANG_support_widget_content', "Support widget content");
define('OGP_LANG_support_widget_content_info', "The content of the support widget (HTML code allowed).");
define('OGP_LANG_support_widget_link', "Support widget link");
define('OGP_LANG_support_widget_link_info', "The URL of your support site.");
define('OGP_LANG_recaptcha_site_key', "Recaptcha Site Key");
define('OGP_LANG_recaptcha_site_key_info', "The site key provided to you by Google.");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha Secret Key");
define('OGP_LANG_recaptcha_secret_key_info', "The secret key provided to you by Google.");
define('OGP_LANG_recaptcha_use_login', "Use Recaptcha on Login");
define('OGP_LANG_recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('OGP_LANG_login_attempts_before_banned', "Number of failed login attempts before user is banned");
define('OGP_LANG_login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('OGP_LANG_custom_github_update_username', "GitHub update Nutzername");
define('OGP_LANG_custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('OGP_LANG_remote_query', "Remote query");
define('OGP_LANG_remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('OGP_LANG_check_expiry_by', "Check expiration using");
define('OGP_LANG_check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('OGP_LANG_once_logged_in', "Once Logged In");
define('OGP_LANG_cron_job', "Cronjob");
define('OGP_LANG_theme_settings', "Theme Einstellungen");
define('OGP_LANG_theme', "Theme");
define('OGP_LANG_theme_info', "Theme selected here will be the default theme for all users. Users can change their theme from their profile page.");
define('OGP_LANG_welcome_title', "Welcome Title");
define('OGP_LANG_welcome_title_info', "Enables the title that is displayed at the top of the Dashboard.");
define('OGP_LANG_welcome_title_message', "Welcome Title Message");
define('OGP_LANG_welcome_title_message_info', "The title message that is displayed at the top of the Dashboard (HTML code allowed).");
define('OGP_LANG_logo_link', "Logos Link");
define('OGP_LANG_logo_link_info', "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>");
define('OGP_LANG_custom_tab', "Custom Tab");
define('OGP_LANG_custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('OGP_LANG_custom_tab_name', "Custom Tab Name");
define('OGP_LANG_custom_tab_name_info', "The tabs display name.");
define('OGP_LANG_custom_tab_link', "Custom Tab Link");
define('OGP_LANG_custom_tab_link_info', "The tabs hyperlink.");
define('OGP_LANG_custom_tab_sub', "Custom Sub-Tabs");
define('OGP_LANG_custom_tab_sub_info', "Adds customisable sub-tabs when hovering over the 'Custom Tab'.");
define('OGP_LANG_custom_tab_sub_name', "Sub-Tab #1 Name");
define('OGP_LANG_custom_tab_sub_link', "Sub-Tab #1 Link");
define('OGP_LANG_custom_tab_sub_name2', "Sub-Tab #2 Name");
define('OGP_LANG_custom_tab_sub_link2', "Sub-Tab #2 Link");
define('OGP_LANG_custom_tab_sub_name3', "Sub-Tab #3 Name");
define('OGP_LANG_custom_tab_sub_link3', "Sub-Tab #3 Link");
define('OGP_LANG_custom_tab_sub_name4', "Sub-Tab #4 Name");
define('OGP_LANG_custom_tab_sub_link4', "Sub-Tab #4 Link");
define('OGP_LANG_custom_tab_target_blank', "Custom Tabs Target");
define('OGP_LANG_custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Opens link on same page. New_Page  =  Opens link on new tab.)</b>");
define('OGP_LANG_bg_wrapper', "Wrapper Hintergrund");
define('OGP_LANG_bg_wrapper_info', "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on some themes.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Show Server IDs on Game Monitor page");
define('OGP_LANG_show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
define('OGP_LANG_default_game_server_home_path_prefix', "Default game server home directory prefix");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Enter a path prefix for where you want game server homes to be created by default. You can use \"{USERNAME}\" in the path which will be replaced with the OGP username the game server is being assigned to.  You can use \"{GAMEKEY}\" in the path which will be replaced with a friendly lowercase name.  You can use \"{SKIPID}\" anywhere in the path to skip appending the home ID to the path.  Example: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} will become /ogp/games/username/arkse/.  Example 2:  /ogp/games will become /ogp/games/1 where 1 is the game servers ID.");
define('OGP_LANG_setup_api_authorized_hosts', "Setup API authorized hosts");
define('OGP_LANG_autohorized_hosts', "Authorized hosts");
define('OGP_LANG_add_host', "Add host");
define('OGP_LANG_remove_hosts', "Remove hosts");
define('OGP_LANG_default_hosts', "Default hosts");
define('OGP_LANG_custom_hosts', "Custom hosts");

?>
