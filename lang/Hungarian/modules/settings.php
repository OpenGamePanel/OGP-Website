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

define('maintenance_mode', "Karbantartás");
define('maintenance_mode_info', "A Panel kikapcsolása a normál felhasználók számára. Csak rendszergazdák férhetnek hozzá a karbantartás alatt.");
define('maintenance_title', "Karbantartás címe");
define('maintenance_title_info', "A cím, amely megjelenik a normál felhasználók számára a karbantartás során.");
define('maintenance_message', "Karbantartási üzenet");
define('maintenance_message_info', "Az üzenet, ami megjelenik a rendes felhasználóknak a karbantartás alatt.");
define('update_settings', "Frissítési beállítások");
define('settings_updated', "A beállítások sikeresen frissítve.");
define('panel_language', "Panel nyelve");
define('panel_language_info', "Ez a nyelv az alapértelmezett nyelve a Panelnak. A felhasználók meg tudják változtatni a saját nyelvükre a profiljuk szerkesztési oldalában.");
define('page_auto_refresh', "Oldal automatikus frissítése");
define('page_auto_refresh_info', "Az oldal automatikus frissítése kikapcsolható debuggolási célból. Normál használat esetén érdemes bekapcsolni.");
define('smtp_server', "Kimenő e-mail szerver");
define('smtp_server_info', "Ez a kimenő levelek (SMTP) szervere használt, például az elfelejtett jelszavak kiküldéséhez, localhost alapértelmezés szerint.");
define('panel_email_address', "Kimenő e-mail címe");
define('panel_email_address_info', "Ez az email cím lesz használva a kimeno levelek küldojeként.");
define('panel_name', "Panel neve");
define('panel_name_info', "A Panel neve, amely az oldal címében látható. Ez az érték felülbírálja az összes oldal címét, ha nem üres.");
define('feed_enable', "LGSL Feed engedélyezése");
define('feed_enable_info', "If your webhost has a firewall blocking the query port you need enable it.");
define('feed_url', "Feed link");
define('feed_url_info', "GrayCube.com megosztja a LGSL feed URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Karakterkódolás");
define('charset_info', "UTF8, ISO, ASCII, stb... Hagyd üresen az ISO kódolás használatához.");
define('steam_user', "Steam felhasználó");
define('steam_user_info', "This user is needed to log in to steam for download some new games like CS:GO.");
define('steam_pass', "Steam jelszó");
define('steam_pass_info', "Állítsd be itt a Steam fiók jelszavát.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('smtp_port', "SMTP port");
define('smtp_port_info', "Ha az SMTP port nem az alapértelmezett port (25), akkor add meg az SMTP portot itt.");
define('smtp_login', "SMTP felhasználó");
define('smtp_login_info', "Ha az SMTP szervered hitelesítést igényel, akkor add meg a felhasználónevet itt.");
define('smtp_passw', "SMTP jelszó");
define('smtp_passw_info', "Ha nem állítasz be jelszót, akkor az SMTP hitelesítés le lesz tiltva.");
define('smtp_secure', "Biztonságos SMTP");
define('smtp_secure_info', "SSL/TSL használata az SMTP szerver kapcsolódáshoz");
define('time_zone', "Időzóna");
define('time_zone_info', "Sets the default timezone used by all date/time functions.");
define('query_cache_life', "Lekérdezési gyorsítótár élettartama");
define('query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('query_num_servers_stop', "A játék szerver lekérdezés tiltása ennyi után");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Szerkeszthető e-mail cím");
define('editable_email_info', "Válaszd ki, hogy a felhasználók szerkeszthetik a saját e-mail címüket vagy nem.");
define('old_dashboard_behavior', "Régi műszerfal viselkedés");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Elérhető Rsync szerverek");
define('rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('all_available_servers', "Összes elérhető szerverek (rsync_sites.list és rsync_sites_local.list)");
define('only_remote_servers', "Csak távoli szerverek (rsync_sites.list)");
define('only_local_servers', "Csak helyi szerverek (rsync_sites_local.list)");
define('header_code', "Fejléckód");
define('header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "A támogatási oldalad linkje.");
define('recaptcha_site_key', "Recaptcha oldal kulcs");
define('recaptcha_site_key_info', "A webhely kulcsát a Google biztosítja neked.");
define('recaptcha_secret_key', "Recaptcha titkos kulcs");
define('recaptcha_secret_key_info', "A titkos kulcsot a Google biztosítja neked.");
define('recaptcha_use_login', "Recaptcha használata a bejelentkezéshez");
define('recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('login_attempts_before_banned', "Sikertelen bejelentkezések száma mielőtt a felhasználó kitiltva lesz");
define('login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('custom_github_update_username', "GitHub frissítés felhasználónév");
define('custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('remote_query', "Távoli lekérdezés");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Ellenőrizze a használat lejáratát");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron feladat");
define('theme_settings', "Téma beállítások");
define('theme', "Téma");
define('theme_info', "A kiválasztott kinézet lesz az alapbeállítás minden felhasználónak. A felhasználók meg tudják változtatni ezt a beállítást a profil oldalukon.");
define('welcome_title', "Üdvözöljük címe");
define('welcome_title_info', "Lehetové teszi, hogy a cím jelenik meg a muszerfalra.");
define('welcome_title_message', "Üdvözöljük cím üzenet");
define('welcome_title_message_info', "A cím üzenet jelenik meg a muszerfalra (HTML nem engedélyezett).");
define('logo_link', "Logo linkje");
define('logo_link_info', "A logó linkje. <b style='font-size:10px; font-weight:normal;'>(Üresen hagyva a vezérlőpultra irányít át)</b>");
define('custom_tab', "Custom Tab");
define('custom_tab_info', "Adds a customisable tab at the end of the menu. <b style='font-size:10px; font-weight:normal;'>(Apply and refresh this page to edit tab settings)</b>");
define('custom_tab_name', "Egyéni lap neve");
define('custom_tab_name_info', "Az allap neve.");
define('custom_tab_link', "Egyéni lap linkje");
define('custom_tab_link_info', "Az allap hivatkozása.");
define('custom_tab_sub', "Egyéni allap neve");
define('custom_tab_sub_info', "Adds customisable sub-tabs when hovering over the 'Custom Tab'.");
define('custom_tab_sub_name', "#1 Allap neve");
define('custom_tab_sub_link', "#1 Allap linkje");
define('custom_tab_sub_name2', "#2 Allap neve");
define('custom_tab_sub_link2', "#2 Allap linkje");
define('custom_tab_sub_name3', "#3 Allap neve");
define('custom_tab_sub_link3', "#3 Allap linkje");
define('custom_tab_sub_name4', "#4 Allap neve");
define('custom_tab_sub_link4', "#4 Allap linkje");
define('custom_tab_target_blank', "Egyéni lapok célpontja");
define('custom_tab_target_blank_info', "Sets all the tabs target. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Opens link on same page. New_Page  =  Opens link on new tab.)</b>");
define('bg_wrapper', "Borítólap háttér");
define('bg_wrapper_info', "A borítólap háttérképe. (Csak egyes témákban érhető el.)");
define('show_server_id_game_monitor', "Szerver IDk mutatása a Játékfigyelő oldalon");
define('show_server_id_game_monitor_info', "Mutassa a játékszerver azonosító oszlopát a Játékfigyelőben az Agent által létrehozott fájlok egyeztetéséhez az aktuális játék szerverhez.");
?>
