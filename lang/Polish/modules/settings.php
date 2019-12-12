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

define('OGP_LANG_maintenance_mode', "Przerwa Techniczna");
define('OGP_LANG_maintenance_mode_info', "Wyłącz Panel dla zwykłych użytkowników. Tylko administratorzy mogą uzyskać dostęp do niego podczas konserwacji.");
define('OGP_LANG_maintenance_title', "Tytuł przerwy technicznej");
define('OGP_LANG_maintenance_title_info', "Tytuł wyświetlany zwykłym użytkownikom podczas konserwacji.");
define('OGP_LANG_maintenance_message', "Prezentowane Wiadomość");
define('OGP_LANG_maintenance_message_info', "Komunikat, który jest wyświetlany zwykłym użytkownikom podczas konserwacji.");
define('OGP_LANG_update_settings', "Aktualizuj Ustawienia");
define('OGP_LANG_settings_updated', "Ustawienia zostały zaktualizowane.");
define('OGP_LANG_panel_language', "Język");
define('OGP_LANG_panel_language_info', "Ten język jest językiem domyślnym panelu. Użytkownicy mogą zmieniać język w edycji profilu.");
define('OGP_LANG_page_auto_refresh', "Automatycznie odświeżenie strony");
define('OGP_LANG_page_auto_refresh_info', "Ustawienia Automatycznego odświeżania strony są głównie stosowane w debugowaniu panelu. Podczas normalnego używania należy ustawić opcję Włącz.");
define('OGP_LANG_smtp_server', "Serwer SMTP");
define('OGP_LANG_smtp_server_info', "This is the outgoing mail server (SMTP server) that is used, for example, to sent forgotten passwords to users, localhost by default.");
define('OGP_LANG_panel_email_address', "Email Panelu");
define('OGP_LANG_panel_email_address_info', "Jest to adres e-mail, który jest w polu, podczas kontaktu z użytkownikami.");
define('OGP_LANG_panel_name', "Nazwa Panelu");
define('OGP_LANG_panel_name_info', "Name of the Panel that is shown in the page title. This value will overrule all page titles, if it's not empty.");
define('OGP_LANG_feed_enable', "Enable LGSL Feed");
define('OGP_LANG_feed_enable_info', "If your webhost has a firewall which is blocking the query port, then you need to open the port manually.");
define('OGP_LANG_feed_url', "Feed URL");
define('OGP_LANG_feed_url_info', "GrayCube.com dzieli LGSL paszy na adres:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Użytkownik Steam");
define('OGP_LANG_steam_user_info', "Użytkownik jest potrzebny, aby pobrać pliki serwera gdy tego wymagają.");
define('OGP_LANG_steam_pass', "Hasło Steam");
define('OGP_LANG_steam_pass_info', "Ustaw tutaj hasło konta Steam.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Niektórzy użytkownicy mają włączoną ochronę GUARD, aby chronić konta przed hakerami,<br>kod jest wysyłany do konta e-mail, gdy rozpoczyna się pierwsza aktualizacja.");
define('OGP_LANG_smtp_port', "Port SMTP");
define('OGP_LANG_smtp_port_info', "Tak SMTP port nie jest domyślny port (25) Wpisz numer portu SMTP.");
define('OGP_LANG_smtp_login', "Użytkownik SMTP");
define('OGP_LANG_smtp_login_info', "Jeśli serwer SMTP wymaga uwierzytelniania, wpisz nazwę użytkownika.");
define('OGP_LANG_smtp_passw', "Hasło SMTP");
define('OGP_LANG_smtp_passw_info', "Jeśli nie ustawić hasło nie używane uwierzytelnianie SMTP");
define('OGP_LANG_smtp_secure', "Bezpieczeństwo SMTP");
define('OGP_LANG_smtp_secure_info', "Użyj SSL/TLS do połączenia z serwerem SMTP");
define('OGP_LANG_time_zone', "Strefa Czasu");
define('OGP_LANG_time_zone_info', "Ustawia domyślną strefę czasową używaną przez wszystkie data / czas funkcji.");
define('OGP_LANG_query_cache_life', "Żywotność cache odświeżania serwera");
define('OGP_LANG_query_cache_life_info', "Ustawia limit czasu w sekundach, zanim stan serwera zostanie odświeżony.");
define('OGP_LANG_query_num_servers_stop', "Wyłącz odpytywanie serwera po");
define('OGP_LANG_query_num_servers_stop_info', "Użyj tego ustawienia, aby wyłączyć zapytania, jeśli użytkownik ma więcej serwerów gier niż określona ilość, aby przyspieszyć ładowanie panelu.");
define('OGP_LANG_editable_email', "Zmiana emaila przez użytkowników");
define('OGP_LANG_editable_email_info', "Wybierz, jeśli użytkownicy mogą edytować swój adres e-mail lub nie.");
define('OGP_LANG_old_dashboard_behavior', "Old Dashboard behavior");
define('OGP_LANG_old_dashboard_behavior_info', "The old Dashboard was running slower, but shows more server informations (e.g. current players and maps).");
define('OGP_LANG_rsync_available', "Available Rsync servers");
define('OGP_LANG_rsync_available_info', "Wybierz listę serwerów rsync, które zostaną wyświetlone w instalacji.");
define('OGP_LANG_all_available_servers', "Wszystkie dostępne serwery ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Tylko serwery hosta ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Tylko lokalnie serwery ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Kod nagłówka");
define('OGP_LANG_header_code_info', "Tutaj możesz wpisać własny kod nagłówka (jak HTML itd...) bez konieczności edycji szablonu stylu.");
define('OGP_LANG_support_widget_title', "Tytuł widgetu pomocy technicznej");
define('OGP_LANG_support_widget_title_info', "Niestandardowy tytuł widgetu pomocy technicznej w panelu.");
define('OGP_LANG_support_widget_content', "Pomoc Techniczna, zawartość widgetu.");
define('OGP_LANG_support_widget_content_info', "The content of the support widget (HTML code allowed).");
define('OGP_LANG_support_widget_link', "Link do widgetu Pomocy Technicznej");
define('OGP_LANG_support_widget_link_info', "Link do widgetu Pomocy Technicznej");
define('OGP_LANG_recaptcha_site_key', "Recaptcha Site Key");
define('OGP_LANG_recaptcha_site_key_info', "Klucz witryny dostarczony przez Google.");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha Secret Key");
define('OGP_LANG_recaptcha_secret_key_info', "Unikalny klucz dostarczony przez Google.");
define('OGP_LANG_recaptcha_use_login', "Use Recaptcha on Login");
define('OGP_LANG_recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('OGP_LANG_login_attempts_before_banned', "Ilość nieprawidłowych logowań");
define('OGP_LANG_login_attempts_before_banned_info', "Liczba nieudanych prób zalogowania się zanim użytkownik zostanie zbanowany.");
define('OGP_LANG_custom_github_update_username', "Nazwa użytkownika GitHub");
define('OGP_LANG_custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('OGP_LANG_remote_query', "Remote query");
define('OGP_LANG_remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('OGP_LANG_check_expiry_by', "Sprawdź wygaśnięcie używając");
define('OGP_LANG_check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('OGP_LANG_once_logged_in', "Przez Zalogowanie");
define('OGP_LANG_cron_job', "Przez Crona");
define('OGP_LANG_theme_settings', "Ustawienia tematyczne");
define('OGP_LANG_theme', "Skórka");
define('OGP_LANG_theme_info', "Motyw wybrany tutaj będzie domyślnym dla wszystkich użytkowników. Użytkownicy mogą zmieniać motyw w edycji profilu.");
define('OGP_LANG_welcome_title', "Tytuł Powitania");
define('OGP_LANG_welcome_title_info', "Enables the title that is displayed at the top of the Dashboard.");
define('OGP_LANG_welcome_title_message', "Wiadomość Powitalna");
define('OGP_LANG_welcome_title_message_info', "The title message that is displayed at the top of the Dashboard (HTML code allowed).");
define('OGP_LANG_logo_link', "Link do logo");
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
define('OGP_LANG_bg_wrapper', "Wrapper Background");
define('OGP_LANG_bg_wrapper_info', "The wrappers background image. <b style='font-size:10px; font-weight:normal;'>(Only available on some themes.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Pokaż id serwera na stronie Monitor Gier");
define('OGP_LANG_show_server_id_game_monitor_info', "Dodaje kolumnę w liście serwerów z aktualnym id serwera. Pomaga to w zidentyfikowaniu serwera.");
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
