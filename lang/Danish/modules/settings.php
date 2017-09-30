<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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

define('maintenance_mode', "Vedligeholdelse");
define('maintenance_mode_info', "Disable the Panel for normal users. Only administrators can access it during maintenance.");
define('maintenance_title', "Vedligeholdes Title");
define('maintenance_title_info', "Denne title bliver vist, til normale brugere, under vedligeholdes.");
define('maintenance_message', "Vedligeholde Besked");
define('maintenance_message_info', "Denne besked bliver vist til almindelige brugere imens vedligeholde fortages.");
define('update_settings', "Opdatere Indstillinger");
define('settings_updated', "Indstillinger opdateret");
define('panel_language', "Panel Sprog");
define('panel_language_info', "Dette sprog er standard sprog for panel. Brugere ka det, til deres eget sprog, fra redigere profil.");
define('page_auto_refresh', "Siden genopfrisker automatisk");
define('page_auto_refresh_info', "Automatisk genopfrisk sidens indehold, bliver primært brugt til panel fejlfinding. Under normal brug, burde den været sat til aktiveret.");
define('smtp_server', "Udgående E-Mail Server");
define('smtp_server_info', "Dette er en udgående mail server (SMTP server), som bliver brugt til, f.eks, til at sende glemte adgangskoder til brugere, lokalvært er som standard.");
define('panel_email_address', "Udgående E-Mail Addresse");
define('panel_email_address_info', "Dette er e-mail adressen, som er fra feltet, hvor adgangskoder bliver sendt til brugerne.");
define('panel_name', "Panel navn");
define('panel_name_info', "Name of the Panel that is shown in the page title. This value will overrule all page titles, if it's not empty.");
define('feed_enable', "Aktivere LGSL Feed");
define('feed_enable_info', "If your webhost has a firewall which is blocking the query port, then you need to open the port manually.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com deler LGSL feed lin til:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Character Encoding");
define('charset_info', "UTF8, ISO, ASCII, etc... Leave it blank to use ISO encoding.");
define('steam_user', "Steam Bruger");
define('steam_user_info', "Denne bruger bruges til at logge ind på steam, for at downloade nogle nye spil, så som CS: GO.");
define('steam_pass', "Steam Adgangskode");
define('steam_pass_info', "Skriv din steam adgangskode her.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Nogle brugere har steam guard aktiveret, for at beskyttet deres konto mod hackning,<br>denne kode er sent til steam konto's email, når den første steam opdatering starter.");
define('smtp_port', "SMTP Port");
define('smtp_port_info', "Hvis SMTP porten ikke er sat standard port (25) Så skriv SMTP porten her.");
define('smtp_login', "SMTP Bruger");
define('smtp_login_info', "Hvis din SMTP server behøver godkendelse, så skriv din brugernavn her.");
define('smtp_passw', "SMTP Kodeord");
define('smtp_passw_info', "Hvis du ikke har sat et kodeord, vil SMTP godkendelse blive slået fra.");
define('smtp_secure', "SMTP Secure");
define('smtp_secure_info', "Brug SSL/TLS til at forbinde med SMTP server");
define('time_zone', "Tids Zone");
define('time_zone_info', "Sætter den standarde tidszone, bruges af alle dato/tids funktioner.");
define('query_cache_life', "Query cache liv");
define('query_cache_life_info', "Indstil timeout i sekunder, før serveren status bliver genopfrisket.");
define('query_num_servers_stop', "Disable Game Server Queries After");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Editable E-Mail Address");
define('editable_email_info', "Select if users can edit their e-mail address or not.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Available rsync servers");
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
define('login_attempts_before_banned', "Number of failed login attempts before user is banned");
define('login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('custom_github_update_username', "GitHub update username");
define('custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Check expiration using");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron Job");
define('theme_settings', "Tema Indstillinger");
define('theme', "Tema");
define('theme_info', "Dette tema, ville være det standarde tema for alle brugere. Brugere kan ændre deres tema, fra profil siden.");
define('welcome_title', "Velkommenst Titel");
define('welcome_title_info', "Aktivere titel, til at vise det I toppen af instrumentpanel.");
define('welcome_title_message', "Velkomst Titel besked");
define('welcome_title_message_info', "Titel besked, som bliver vist I toppen af instrumentpanelet (html tilladt).");
define('logo_link', "Logo Links");
define('logo_link_info', "Diverse logo links. <b style='font-size:10px; font-weight:normal;'>(Lad den stå blank, ville linke det til instrumentpanel)</b>");
define('custom_tab', "Tilpas Faneblad");
define('custom_tab_info', "Tilføjer tilpasset faneblad, for enden af menuen. <b style='font-size:10px; font-weight:normal;'>(Anvend og genfrisk side for at redigere indstillinger)</b>");
define('custom_tab_name', "Tilpasset Faneblad Navn");
define('custom_tab_name_info', "Faneblad vis navn.");
define('custom_tab_link', "Tilpasset Faneblad Link");
define('custom_tab_link_info', "Faneblads hyperlink.");
define('custom_tab_sub', "Tilpasset Under-Faner");
define('custom_tab_sub_info', "Tilføjer tilpasset under-faner, når musen føres over 'Tilpas Fanblad'.");
define('custom_tab_sub_name', "Under-Fane #1 Name");
define('custom_tab_sub_link', "Under-Fane #1 Link");
define('custom_tab_sub_name2', "Under-Fane #2 Name");
define('custom_tab_sub_link2', "Under-Fane #2 Link");
define('custom_tab_sub_name3', "Under-Fane #3 Name");
define('custom_tab_sub_link3', "Under-Fane #3 Link");
define('custom_tab_sub_name4', "Under-Fane #4 Name");
define('custom_tab_sub_link4', "Under-Fane #4 Link");
define('custom_tab_target_blank', "Tilpasset Fane-blade henvisning");
define('custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Opens link on same page. New_Page  =  Opens link on new tab.)</b>");
define('bg_wrapper', "Indpaknings Baggrund");
define('bg_wrapper_info', "Indpaknings baggrunds billed. <b style='font-size:10px; font-weight:normal;'>(Fungere kun på nogle temaer.)</b>");
define('show_server_id_game_monitor', "Show Server IDs on Game Monitor page");
define('show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
?>
