<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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

define('maintenance_mode', "Karbantartás");
define('maintenance_mode_info', "Egy üzenet lesz megjelenítve a normál felhasználóknak a karbantartás alatt.");
define('maintenance_title', "Karbantartás címe");
define('maintenance_title_info', "The title that is displayed to normal users during maintenance.");
define('maintenance_message', "Karbantartási üzenet");
define('maintenance_message_info', "Ez az üzenet lesz megjelenítve a felhasználóknak a karbantartás alatt.");
define('update_settings', "Frissítési beállítások");
define('settings_updated', "A beállítások sikeresen frissítve.");
define('panel_language', "Panel nyelve");
define('panel_language_info', "A panel alapértelmezett nyelve. A felhasználók meg tudják változtatni a saját nyelvükre a profil beállításokban.");
define('page_auto_refresh', "Oldal automatikus frissítése");
define('page_auto_refresh_info', "Az oldal automatikus frissítése kikapcsolható debuggolási célból. Normál használat esetén érdemes bekapcsolni.");
define('smtp_server', "Kimenő e-mail szerver");
define('smtp_server_info', "Ez a szerver lesz használva a kimeno leveleknek (SMTP szerver), például az elfelejtett jelszavak kiküldéséhez, localhost alapértelmezés szerint.");
define('panel_email_address', "Kimenő e-mail címe");
define('panel_email_address_info', "Ez az email cím lesz használva a kimeno levelek küldojeként.");
define('panel_name', "Panel neve");
define('panel_name_info', "Name of the panel that is shown in the page title. This value will overrule all page titles, if not empty.");
define('feed_enable', "Enable LGSL Feed");
define('feed_enable_info', "If your webhost has a firewall blocking the query port you need enable it.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com megosztja a LGSL feed URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Karakterkódolás");
define('charset_info', "UTF8, ISO, ASCII, stb .. hagyta üresen az ISO kódolást.");
define('steam_user', "Steam felhasználó");
define('steam_user_info', "This user is needed to log in to steam for download some new games like CS:GO.");
define('steam_pass', "Steam jelszó");
define('steam_pass_info', "Állítsd be itt a Steam fiók jelszavát.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('smtp_port', "SMTP port");
define('smtp_port_info', "If SMTP port is not the default port (25) Enter the SMTP port here.");
define('smtp_login', "SMTP felhasználó");
define('smtp_login_info', "If your SMTP server requires authentication, enter your user name here.");
define('smtp_passw', "SMTP jelszó");
define('smtp_passw_info', "If you do not set a password the SMTP authentication will be disabled.");
define('smtp_secure', "SMTP Secure");
define('smtp_secure_info', "Use SSL/TLS to connect to the SMTP server");
define('time_zone', "Időzóna");
define('time_zone_info', "Sets the default timezone used by all date/time functions.");
define('query_cache_life', "Query cache life");
define('query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('query_num_servers_stop', "Disable Game Server Queries After");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Szerkeszthető e-mail cím");
define('editable_email_info', "Select if users can edit their e-mail address or not.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Elérhető Rsync szerverek");
define('rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Only remote servers ( rsync_sites.list )");
define('only_local_servers', "Only local servers ( rsync_sites_local.list )");
define('header_code', "Header code");
define('header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "The URL of your support site.");
define('recaptcha_site_key', "Recaptcha Site Key");
define('recaptcha_site_key_info', "The site key provided to you by Google.");
define('recaptcha_secret_key', "Recaptcha Secret Key");
define('recaptcha_secret_key_info', "The secret key provided to you by Google.");
define('recaptcha_use_login', "Use Recaptcha on Login");
define('recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Check expiration using");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron Job");
define('theme_settings', "Téma beállítások");
define('theme', "Téma");
define('theme_info', "A kiválasztott kinézet lesz az alapbeállítás minden felhasználónak. A felhasználók meg tudják változtatni ezt a beállítást a profil oldalukon.");
define('welcome_title', "Üdvözöljük címe");
define('welcome_title_info', "Lehetové teszi, hogy a cím jelenik meg a muszerfalra.");
define('welcome_title_message', "Üdvözöljük Cím Üzenet");
define('welcome_title_message_info', "A cím üzenet jelenik meg a muszerfalra (HTML nem engedélyezett).");
define('logo_link', "Logos Link");
define('logo_link_info', "The logos hyperlink. <b style='font-size:10px; font-weight:normal;'>(Leaving it blank will link it to the Dashboard)</b>");
define('custom_tab', "Custom Tab");
define('custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('custom_tab_name', "Custom Tab Name");
define('custom_tab_name_info', "The tabs display name.");
define('custom_tab_link', "Custom Tab Link");
define('custom_tab_link_info', "The tabs hyperlink.");
define('custom_tab_sub', "Custom Sub-Tabs");
define('custom_tab_sub_info', "Adds customisable sub-tabs when hovering over the 'Custom Tab'.");
define('custom_tab_sub_name', "Sub-Tab #1 Name");
define('custom_tab_sub_link', "Sub-Tab #1 Link");
define('custom_tab_sub_name2', "Sub-Tab #2 Name");
define('custom_tab_sub_link2', "Sub-Tab #2 Link");
define('custom_tab_sub_name3', "Sub-Tab #3 Name");
define('custom_tab_sub_link3', "Sub-Tab #3 Link");
define('custom_tab_sub_name4', "Sub-Tab #4 Name");
define('custom_tab_sub_link4', "Sub-Tab #4 Link");
define('custom_tab_target_blank', "Custom Tabs Target");
define('custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>('_self' = Opens link on same page. '_blank'  =  Opens link on new tab.)</b>");
define('bg_wrapper', "Wrapper Background");
define('bg_wrapper_info', "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on some themes.)</b>");
?>