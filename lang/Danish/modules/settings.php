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

define('OGP_LANG_maintenance_mode', "Vedligeholdelse");
define('OGP_LANG_maintenance_mode_info', "Disable the Panel for normal users. Only administrators can access it during maintenance.");
define('OGP_LANG_maintenance_title', "Vedligeholdes Title");
define('OGP_LANG_maintenance_title_info', "Denne title bliver vist, til normale brugere, under vedligeholdes.");
define('OGP_LANG_maintenance_message', "Vedligeholde Besked");
define('OGP_LANG_maintenance_message_info', "Denne besked bliver vist til almindelige brugere imens vedligeholde fortages.");
define('OGP_LANG_update_settings', "Opdatere Indstillinger");
define('OGP_LANG_settings_updated', "Indstillinger opdateret");
define('OGP_LANG_panel_language', "Panel Sprog");
define('OGP_LANG_panel_language_info', "Dette sprog er standard sprog for panel. Brugere ka det, til deres eget sprog, fra redigere profil.");
define('OGP_LANG_page_auto_refresh', "Siden genopfrisker automatisk");
define('OGP_LANG_page_auto_refresh_info', "Automatisk genopfrisk sidens indehold, bliver primært brugt til panel fejlfinding. Under normal brug, burde den været sat til aktiveret.");
define('OGP_LANG_smtp_server', "Udgående E-Mail Server");
define('OGP_LANG_smtp_server_info', "Dette er en udgående mail server (SMTP server), som bliver brugt til, f.eks, til at sende glemte adgangskoder til brugere, lokalvært er som standard.");
define('OGP_LANG_panel_email_address', "Udgående E-Mail Addresse");
define('OGP_LANG_panel_email_address_info', "Dette er e-mail adressen, som er fra feltet, hvor adgangskoder bliver sendt til brugerne.");
define('OGP_LANG_panel_name', "Panel navn");
define('OGP_LANG_panel_name_info', "Name of the Panel that is shown in the page title. This value will overrule all page titles, if it's not empty.");
define('OGP_LANG_feed_enable', "Aktivere LGSL Feed");
define('OGP_LANG_feed_enable_info', "If your webhost has a firewall which is blocking the query port, then you need to open the port manually.");
define('OGP_LANG_feed_url', "Feed URL");
define('OGP_LANG_feed_url_info', "GrayCube.com deler LGSL feed lin til:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_charset', "Character Encoding");
define('OGP_LANG_charset_info', "UTF8, ISO, ASCII, etc... Overrides the character encoding defined in language files. Leave it blank to use language default.");
define('OGP_LANG_steam_user', "Steam Bruger");
define('OGP_LANG_steam_user_info', "Denne bruger bruges til at logge ind på steam, for at downloade nogle nye spil, så som CS: GO.");
define('OGP_LANG_steam_pass', "Steam Adgangskode");
define('OGP_LANG_steam_pass_info', "Skriv din steam adgangskode her.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Nogle brugere har steam guard aktiveret, for at beskyttet deres konto mod hackning,<br>denne kode er sent til steam konto's email, når den første steam opdatering starter.");
define('OGP_LANG_smtp_port', "SMTP Port");
define('OGP_LANG_smtp_port_info', "Hvis SMTP porten ikke er sat standard port (25) Så skriv SMTP porten her.");
define('OGP_LANG_smtp_login', "SMTP Bruger");
define('OGP_LANG_smtp_login_info', "Hvis din SMTP server behøver godkendelse, så skriv din brugernavn her.");
define('OGP_LANG_smtp_passw', "SMTP Kodeord");
define('OGP_LANG_smtp_passw_info', "Hvis du ikke har sat et kodeord, vil SMTP godkendelse blive slået fra.");
define('OGP_LANG_smtp_secure', "SMTP Secure");
define('OGP_LANG_smtp_secure_info', "Brug SSL/TLS til at forbinde med SMTP server");
define('OGP_LANG_time_zone', "Tids Zone");
define('OGP_LANG_time_zone_info', "Sætter den standarde tidszone, bruges af alle dato/tids funktioner.");
define('OGP_LANG_query_cache_life', "Query cache liv");
define('OGP_LANG_query_cache_life_info', "Indstil timeout i sekunder, før serveren status bliver genopfrisket.");
define('OGP_LANG_query_num_servers_stop', "Disable Game Server Queries After");
define('OGP_LANG_query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('OGP_LANG_editable_email', "Editable E-Mail Address");
define('OGP_LANG_editable_email_info', "Select if users can edit their e-mail address or not.");
define('OGP_LANG_old_dashboard_behavior', "Old Dashboard behavior");
define('OGP_LANG_old_dashboard_behavior_info', "The old Dashboard was running slower, but shows more server informations (e.g. current players and maps).");
define('OGP_LANG_rsync_available', "Available Rsync servers");
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
define('OGP_LANG_custom_github_update_username', "GitHub update username");
define('OGP_LANG_custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('OGP_LANG_remote_query', "Remote query");
define('OGP_LANG_remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('OGP_LANG_check_expiry_by', "Check expiration using");
define('OGP_LANG_check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('OGP_LANG_once_logged_in', "Once Logged In");
define('OGP_LANG_cron_job', "Cron Job");
define('OGP_LANG_theme_settings', "Tema Indstillinger");
define('OGP_LANG_theme', "Tema");
define('OGP_LANG_theme_info', "Dette tema, ville være det standarde tema for alle brugere. Brugere kan ændre deres tema, fra profil siden.");
define('OGP_LANG_welcome_title', "Velkommenst Titel");
define('OGP_LANG_welcome_title_info', "Enables the title that is displayed at the top of the Dashboard.");
define('OGP_LANG_welcome_title_message', "Velkomst Titel besked");
define('OGP_LANG_welcome_title_message_info', "The title message that is displayed at the top of the Dashboard (HTML code allowed).");
define('OGP_LANG_logo_link', "Logos Link");
define('OGP_LANG_logo_link_info', "Diverse logo links. <b style='font-size:10px; font-weight:normal;'>(Lad den stå blank, ville linke det til instrumentpanel)</b>");
define('OGP_LANG_custom_tab', "Tilpas Faneblad");
define('OGP_LANG_custom_tab_info', "Tilføjer tilpasset faneblad, for enden af menuen. <b style='font-size:10px; font-weight:normal;'>(Anvend og genfrisk side for at redigere indstillinger)</b>");
define('OGP_LANG_custom_tab_name', "Tilpasset Faneblad Navn");
define('OGP_LANG_custom_tab_name_info', "Faneblad vis navn.");
define('OGP_LANG_custom_tab_link', "Tilpasset Faneblad Link");
define('OGP_LANG_custom_tab_link_info', "Faneblads hyperlink.");
define('OGP_LANG_custom_tab_sub', "Tilpasset Under-Faner");
define('OGP_LANG_custom_tab_sub_info', "Tilføjer tilpasset under-faner, når musen føres over 'Tilpas Fanblad'.");
define('OGP_LANG_custom_tab_sub_name', "Under-Fane #1 Name");
define('OGP_LANG_custom_tab_sub_link', "Under-Fane #1 Link");
define('OGP_LANG_custom_tab_sub_name2', "Under-Fane #2 Name");
define('OGP_LANG_custom_tab_sub_link2', "Under-Fane #2 Link");
define('OGP_LANG_custom_tab_sub_name3', "Under-Fane #3 Name");
define('OGP_LANG_custom_tab_sub_link3', "Under-Fane #3 Link");
define('OGP_LANG_custom_tab_sub_name4', "Under-Fane #4 Name");
define('OGP_LANG_custom_tab_sub_link4', "Under-Fane #4 Link");
define('OGP_LANG_custom_tab_target_blank', "Tilpasset Fane-blade henvisning");
define('OGP_LANG_custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Opens link on same page. New_Page  =  Opens link on new tab.)</b>");
define('OGP_LANG_bg_wrapper', "Indpaknings Baggrund");
define('OGP_LANG_bg_wrapper_info', "Indpaknings baggrunds billed. <b style='font-size:10px; font-weight:normal;'>(Fungere kun på nogle temaer.)</b>");
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
