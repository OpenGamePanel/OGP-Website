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

define('OGP_LANG_maintenance_mode', "Karbantartás");
define('OGP_LANG_maintenance_mode_info', "A Panel kikapcsolása a normál felhasználók számára. Csak rendszergazdák férhetnek hozzá a karbantartás alatt.");
define('OGP_LANG_maintenance_title', "Karbantartási cím");
define('OGP_LANG_maintenance_title_info', "A cím, amely megjelenik a normál felhasználók számára a karbantartás során.");
define('OGP_LANG_maintenance_message', "Karbantartási üzenet");
define('OGP_LANG_maintenance_message_info', "Az üzenet, ami megjelenik a rendes felhasználóknak a karbantartás alatt.");
define('OGP_LANG_update_settings', "Beállítások frissítése");
define('OGP_LANG_settings_updated', "A beállítások sikeresen frissültek.");
define('OGP_LANG_panel_language', "Alapértelmezett nyelv");
define('OGP_LANG_panel_language_info', "Ez a nyelv az alapértelmezett nyelve a Panelnak. A felhasználók meg tudják változtatni a saját nyelvükre a profiljuk szerkesztési oldalában.");
define('OGP_LANG_page_auto_refresh', "Oldal automatikus frissítése");
define('OGP_LANG_page_auto_refresh_info', "Az oldal automatikus frissítése kikapcsolható debuggolási célból. Normál használat esetén érdemes bekapcsolni.");
define('OGP_LANG_smtp_server', "Kimenő e-mail szerver");
define('OGP_LANG_smtp_server_info', "Ez a kimenő levelek (SMTP) szervere használt, például az elfelejtett jelszavak kiküldéséhez, localhost alapértelmezés szerint.");
define('OGP_LANG_panel_email_address', "Kimenő e-mail címe");
define('OGP_LANG_panel_email_address_info', "Ez az e-mail cím lesz használva a kimenő levelek küldőjeként.");
define('OGP_LANG_panel_name', "Panel neve");
define('OGP_LANG_panel_name_info', "A Panel neve, amely az oldal címében látható. Ez az érték felülbírálja az összes oldal címét, ha nem üres.");
define('OGP_LANG_feed_enable', "LGSL Feed engedélyezése");
define('OGP_LANG_feed_enable_info', "Ha a webtárhelyednek van tűzfala ami blokkolja a lekérdező portot, akkor meg kell nyitnod manuálisan.");
define('OGP_LANG_feed_url', "Feed URL");
define('OGP_LANG_feed_url_info', "GrayCube.com megosztja a LGSL feed URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Steam felhasználó");
define('OGP_LANG_steam_user_info', "Ennek a felhasználónak be kell jelentkeznie a Steam letölteni néhány új játékot pl. CS:GO.");
define('OGP_LANG_steam_pass', "Steam jelszó");
define('OGP_LANG_steam_pass_info', "Állítsd be itt a Steam fiók jelszavát.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('OGP_LANG_smtp_port', "SMTP port");
define('OGP_LANG_smtp_port_info', "Ha az SMTP port nem az alapértelmezett port (25), akkor add meg az SMTP portot itt.");
define('OGP_LANG_smtp_login', "SMTP felhasználó");
define('OGP_LANG_smtp_login_info', "Ha az SMTP szervered hitelesítést igényel, akkor add meg a felhasználónevet itt.");
define('OGP_LANG_smtp_passw', "SMTP jelszó");
define('OGP_LANG_smtp_passw_info', "Ha nem állítasz be jelszót, akkor az SMTP hitelesítés le lesz tiltva.");
define('OGP_LANG_smtp_secure', "Biztonságos SMTP");
define('OGP_LANG_smtp_secure_info', "SSL/TSL használata az SMTP szerver kapcsolódáshoz");
define('OGP_LANG_time_zone', "Időzóna");
define('OGP_LANG_time_zone_info', "Az alapértelmezett időzóna beállítása az összes dátum/idő funkcióknak.");
define('OGP_LANG_query_cache_life', "Lekérdezési gyorsítótár élettartama");
define('OGP_LANG_query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('OGP_LANG_query_num_servers_stop', "A játék szerver lekérdezés tiltása ennyi után");
define('OGP_LANG_query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('OGP_LANG_editable_email', "Szerkeszthető e-mail cím");
define('OGP_LANG_editable_email_info', "Válaszd ki, hogy a felhasználók szerkeszthetik a saját e-mail címüket vagy nem.");
define('OGP_LANG_old_dashboard_behavior', "Régi Irányítópult viselkedés");
define('OGP_LANG_old_dashboard_behavior_info', "A régi Irányítópult lassabban futott, de több szerver információt mutat (pl. aktuális játékosokat és pályákat).");
define('OGP_LANG_rsync_available', "Elérhető Rsync szerverek");
define('OGP_LANG_rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('OGP_LANG_all_available_servers', "Összes elérhető szerverek (rsync_sites.list és rsync_sites_local.list)");
define('OGP_LANG_only_remote_servers', "Csak távoli szerverek (rsync_sites.list)");
define('OGP_LANG_only_local_servers', "Csak helyi szerverek (rsync_sites_local.list)");
define('OGP_LANG_header_code', "Fejléckód");
define('OGP_LANG_header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('OGP_LANG_support_widget_title', "Támogatási widget címe");
define('OGP_LANG_support_widget_title_info', "Egy egyedi cím a támogatási widgetnek az Irányítópultban.");
define('OGP_LANG_support_widget_content', "Támogatási widget tartalma");
define('OGP_LANG_support_widget_content_info', "A támogatási widget tartalma (HTML kód engedélyezett).");
define('OGP_LANG_support_widget_link', "Támogatási widget link");
define('OGP_LANG_support_widget_link_info', "A támogatási oldalad linkje.");
define('OGP_LANG_recaptcha_site_key', "Recaptcha oldal kulcs");
define('OGP_LANG_recaptcha_site_key_info', "A webhely kulcsát a Google biztosítja neked.");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha titkos kulcs");
define('OGP_LANG_recaptcha_secret_key_info', "A titkos kulcsot a Google biztosítja neked.");
define('OGP_LANG_recaptcha_use_login', "Recaptcha használata a bejelentkezéshez");
define('OGP_LANG_recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('OGP_LANG_login_attempts_before_banned', "Sikertelen bejelentkezések száma mielőtt a felhasználó kitiltva lesz");
define('OGP_LANG_login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('OGP_LANG_custom_github_update_username', "GitHub frissítési felhasználónév");
define('OGP_LANG_custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('OGP_LANG_remote_query', "Távoli lekérdezés");
define('OGP_LANG_remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('OGP_LANG_check_expiry_by', "Ellenőrizze a használat lejáratát");
define('OGP_LANG_check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('OGP_LANG_once_logged_in', "Once Logged In");
define('OGP_LANG_cron_job', "Cron feladat");
define('OGP_LANG_theme_settings', "Téma beállítások");
define('OGP_LANG_theme', "Téma");
define('OGP_LANG_theme_info', "A kiválasztott kinézet lesz az alapbeállítás minden felhasználónak. A felhasználók meg tudják változtatni ezt a beállítást a profil oldalukon.");
define('OGP_LANG_welcome_title', "Üdvözlő felirat");
define('OGP_LANG_welcome_title_info', "Engedélyezi az Irányítópult tetején megjelenő címet.");
define('OGP_LANG_welcome_title_message', "Üdvözlő felirat üzenete");
define('OGP_LANG_welcome_title_message_info', "Az Irányítópult tetején megjelenő címszó (HTML kód engedélyezett).");
define('OGP_LANG_logo_link', "Logo linkje");
define('OGP_LANG_logo_link_info', "A logó hiperhivatkozása. <b style='font-size:10px; font-weight:normal;'>(Üresen hagyva, az Irányítópulthoz irányít át)</b>");
define('OGP_LANG_custom_tab', "Egyéni lap");
define('OGP_LANG_custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('OGP_LANG_custom_tab_name', "Egyéni lap neve");
define('OGP_LANG_custom_tab_name_info', "Az allap neve.");
define('OGP_LANG_custom_tab_link', "Egyéni lap linkje");
define('OGP_LANG_custom_tab_link_info', "Az allap hivatkozása.");
define('OGP_LANG_custom_tab_sub', "Egyéni allap neve");
define('OGP_LANG_custom_tab_sub_info', "Testreszabható al-lap(ok) hozzáadása, amikor lebeg az \"Egyéni lap\" felett.");
define('OGP_LANG_custom_tab_sub_name', "#1 Allap neve");
define('OGP_LANG_custom_tab_sub_link', "#1 Allap linkje");
define('OGP_LANG_custom_tab_sub_name2', "#2 Allap neve");
define('OGP_LANG_custom_tab_sub_link2', "#2 Allap linkje");
define('OGP_LANG_custom_tab_sub_name3', "#3 Allap neve");
define('OGP_LANG_custom_tab_sub_link3', "#3 Allap linkje");
define('OGP_LANG_custom_tab_sub_name4', "#4 Allap neve");
define('OGP_LANG_custom_tab_sub_link4', "#4 Allap linkje");
define('OGP_LANG_custom_tab_target_blank', "Egyéni lapok célpontja");
define('OGP_LANG_custom_tab_target_blank_info', "Beállítja az összes fül célpontját. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Ugyanazon az oldalon nyitja meg a linket. New_Page  =  Új lapon nyitja meg a linket.)</b>");
define('OGP_LANG_bg_wrapper', "Borítólap háttér");
define('OGP_LANG_bg_wrapper_info', "A borítólap háttérképe. (Csak egyes témákban érhető el.)");
define('OGP_LANG_show_server_id_game_monitor', "A szerver azonosítók mutatása a Játékfigyelő oldalon");
define('OGP_LANG_show_server_id_game_monitor_info', "Mutassa a játékszerver azonosító oszlopát a Játékfigyelőben az Agent által létrehozott fájlok egyeztetéséhez az aktuális játék szerverhez.");
define('OGP_LANG_default_game_server_home_path_prefix', "Default game server home directory prefix");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Enter a path prefix for where you want game server homes to be created by default. You can use \"{USERNAME}\" in the path which will be replaced with the OGP username the game server is being assigned to.  You can use \"{GAMEKEY}\" in the path which will be replaced with a friendly lowercase name.  You can use \"{SKIPID}\" anywhere in the path to skip appending the home ID to the path.  Example: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} will become /ogp/games/username/arkse/.  Example 2:  /ogp/games will become /ogp/games/1 where 1 is the game servers ID.");
define('OGP_LANG_use_authorized_hosts', "Limit API to Defined Authorized Hosts");
define('OGP_LANG_use_authorized_hosts_info', "Enable this setting to only allow API calls from pre-defined and approved IP addresses.&nbsp; Approved addresses can be set on this page once the setting has been enabled.&nbsp; If this setting is disabled, a user using a valid key will have access to the API from any IP address.&nbsp; Users using a valid key will be able to use the API to manage any game server they have permissions to administrate.");
define('OGP_LANG_setup_api_authorized_hosts', "Setup API authorized hosts");
define('OGP_LANG_autohorized_hosts', "Authorized hosts");
define('OGP_LANG_add', "Add");
define('OGP_LANG_remove', "Remove");
define('OGP_LANG_default_trusted_hosts', "Default Trusted Hosts");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Trusted Hosts or Proxies (IPv4/IPv6 Addresses or CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Trusted Forwarded IPs (IPv4/IPv6 Addresses or CIDR)");
define('OGP_LANG_reset_game_server_order', "Reset Game Server Ordering");
define('OGP_LANG_reset_game_server_order_info', "Resets game server ordering back to the default of using the server ID");


?>
