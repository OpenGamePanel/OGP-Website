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

define('maintenance_mode', "Przerwa Techniczna");
define('maintenance_mode_info', "Wyłącz Panel dla zwykłych użytkowników. Tylko administratorzy mogą uzyskać dostęp do niego podczas konserwacji.");
define('maintenance_title', "Tytuł przerwy technicznej");
define('maintenance_title_info', "Tytuł wyświetlany zwykłym użytkownikom podczas konserwacji.");
define('maintenance_message', "Prezentowane Wiadomość");
define('maintenance_message_info', "Komunikat, który jest wyświetlany zwykłym użytkownikom podczas konserwacji.");
define('update_settings', "Aktualizuj Ustawienia");
define('settings_updated', "Ustawienia zostały zaktualizowane.");
define('panel_language', "Język");
define('panel_language_info', "Ten język jest językiem domyślnym panelu. Użytkownicy mogą zmieniać język w edycji profilu.");
define('page_auto_refresh', "Automatycznie odświeżenie strony");
define('page_auto_refresh_info', "Ustawienia Automatycznego odświeżania strony są głównie stosowane w debugowaniu panelu. Podczas normalnego używania należy ustawić opcję Włącz.");
define('smtp_server', "Serwer SMTP");
define('smtp_server_info', "This is the outgoing mail server (SMTP server) that is used, for example, to sent forgotten passwords to users, localhost by default.");
define('panel_email_address', "Email Panelu");
define('panel_email_address_info', "Jest to adres e-mail, który jest w polu, podczas kontaktu z użytkownikami.");
define('panel_name', "Nazwa Panelu");
define('panel_name_info', "Nazwa panelu wyświetlanego w tytule strony. Ta wartość spowoduje usunięcie wszystkich tytułów stron, jeśli nie jest puste.");
define('feed_enable', "Enable LGSL Feed");
define('feed_enable_info', "Jeśli twój hosting blokuje port query. Włącz tą opcję.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com dzieli LGSL paszy na adres:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Kodowanie znaków");
define('charset_info', "UTF8, ISO, ASCII, itd... Domyślnie ISO.");
define('steam_user', "Użytkownik Steam");
define('steam_user_info', "Użytkownik jest potrzebny, aby pobrać pliki serwera gdy tego wymagają.");
define('steam_pass', "Hasło Steam");
define('steam_pass_info', "Ustaw tutaj hasło konta Steam.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('smtp_port', "Port SMTP");
define('smtp_port_info', "Tak SMTP port nie jest domyślny port (25) Wpisz numer portu SMTP.");
define('smtp_login', "Użytkownik SMTP");
define('smtp_login_info', "Jeśli serwer SMTP wymaga uwierzytelniania, wpisz nazwę użytkownika.");
define('smtp_passw', "Hasło SMTP");
define('smtp_passw_info', "Jeśli nie ustawić hasło nie używane uwierzytelnianie SMTP");
define('smtp_secure', "Bezpieczeństwo SMTP");
define('smtp_secure_info', "Użyj SSL/TLS do połączenia z serwerem SMTP");
define('time_zone', "Strefa Czasu");
define('time_zone_info', "Ustawia domyślną strefę czasową używaną przez wszystkie data / czas funkcji.");
define('query_cache_life', "Query cache life");
define('query_cache_life_info', "Ustawia limit czasu w sekundach, zanim stan serwera zostanie odświeżony.");
define('query_num_servers_stop', "Wyłącz odpytywanie serwera po");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Editable E-Mail Address");
define('editable_email_info', "Wybierz, jeśli użytkownicy mogą edytować swój adres e-mail lub nie.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "Stary Pulpit nawigacyjny działał wolniej, ale pokazuje więcej informacji o serwerze, bieżących grach i mapach.");
define('rsync_available', "Dozwolone serwery rsync");
define('rsync_available_info', "Wybierz listę serwerów rsync, które zostaną wyświetlone w instalacji.");
define('all_available_servers', "Wszystkie dostępne serwery ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Tylko serwery hosta ( rsync_sites.list )");
define('only_local_servers', "Tylko lokalnie serwery ( rsync_sites_local.list )");
define('header_code', "Kod nagłówka");
define('header_code_info', "Tutaj możesz wpisać własny kod nagłówka (jak HTML itd...) bez konieczności edycji szablonu stylu.");
define('support_widget_title', "Tytuł widgetu pomocy technicznej");
define('support_widget_title_info', "Niestandardowy tytuł widgetu pomocy technicznej w panelu.");
define('support_widget_content', "Pomoc Techniczna, zawartość widgetu.");
define('support_widget_content_info', "Zawartość widgetu pomocy technicznej można wykorzystać w kodzie HTML.");
define('support_widget_link', "Link do widgetu Pomocy Technicznej");
define('support_widget_link_info', "Link do widgetu Pomocy Technicznej");
define('recaptcha_site_key', "Recaptcha Site Key");
define('recaptcha_site_key_info', "Klucz witryny dostarczony przez Google.");
define('recaptcha_secret_key', "Recaptcha Secret Key");
define('recaptcha_secret_key_info', "Unikalny klucz dostarczony przez Google.");
define('recaptcha_use_login', "Use Recaptcha on Login");
define('recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('login_attempts_before_banned', "Ilość nieprawidłowych logowań");
define('login_attempts_before_banned_info', "Liczba nieudanych prób zalogowania się zanim użytkownik zostanie zbanowany.");
define('custom_github_update_username', "Nazwa użytkownika GitHub");
define('custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Check expiration using");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron Job");
define('theme_settings', "Ustawienia tematyczne");
define('theme', "Skórka");
define('theme_info', "Motyw wybrany tutaj będzie domyślnym dla wszystkich użytkowników. Użytkownicy mogą zmieniać motyw w edycji profilu.");
define('welcome_title', "Tytuł Powitania");
define('welcome_title_info', "Umożliwia tytuł, który jest wyświetlany w górnej części deski rozdzielczej.");
define('welcome_title_message', "Wiadomość Powitalna");
define('welcome_title_message_info', "Wiadomość, która jest wyświetlana w górnej części strony (HTML dozwolony).");
define('logo_link', "Link do logo");
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
define('show_server_id_game_monitor', "Show Server IDs on Game Monitor page");
define('show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
?>