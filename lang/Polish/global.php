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
#####################################################################
# Polish language variables
#
#####################################################################

define('lang_charset', "UTF-8");
define('already_logged_in_redirecting_to_dashboard', "Jesteś już zalogowany, przekierowanie do Strony Głównej");
define('logging_in', "Logowanie");
define('redirecting_in', "Przekierowanie");
define('refresh_page', "Odśwież Stronę");
define('no_rights', "Nie masz praw dostępu do tej strony.");
define('welcome', "Witamy");
define('logout', "Wyloguj");
define('logout_message', "Zostałeś wylogowany.");
define('support', "Pomoc");
define('password', "Hasło");
define('login', "Login");
define('login_button', "Zaloguj");
define('solve_captcha', "Human Check");
define('lost_passwd', "Nie pamiętasz hasła?");
define('no_db_connection', "Nie można połączyć się z bazą danych.");
define('bad_login', "Nieprawidłowy login lub hasło.");
define('not_logged_in', "Nie jesteś zalogowany");
define('remove_install', "Proszę usunąć plik install.php ze względów bezpieczeństwa.");
define('agent_offline', "Agent który kontroluje serwer jest offline.");
define('logged_in', "Jesteś zalogowany jako");
define('delete', "Usuń");
define('actions', "Akcje");
define('invalid_subpage', "Nieprawidłowa podstrona.");
define('invalid_home_id', "Nieprawidłowy identyfikator.");
define('note', "UWAGA");
define('hint', "WSKAZÓWKA");
define('yes', "TAK");
define('no', "NIE");
define('on', "Włączony");
define('off', "Wyłączony");

// datase vars.
define('db_error_invalid_host', "Nieprawidłowy host bazy danych.");
define('db_error_invalid_user_and_pass', "Nieprawidłowa nazwa użytkownika bazy danych lub hasło.");
define('db_error_invalid_database', "Nieprawidłowa baza danych.");
define('db_unknown_error', "Nieznany bład bazy danych.");


// home.php
define('invalid_login_information', "Niepoprawnie wprowadzone dane logowania.");
define('failed_to_read_config', "Nie można odczytać pliku konfiguracyjnego.");
define('account_expired', "Konto wygasło.");
define('contact_admin_to_enable_account', "Skontaktuj się z administratorem, aby ponownie uaktywnić konto.");
define('maintenance_mode_on', "Tryb Techniczny AKTYWNY");
define('logging_out_10', "Wylogowanie za 10sec");
define('invalid_redirect', "Przekierowanie");

// index.php
define('login_title', "Logowanie do panelu");
define('lang', "Język");

// includes/navig.php
define('module_not_installed', "Moduł nie jest zainstalowany.");

// Common
define('no_access_to_home', "Nie masz dostępu.");
define('not_available', "N/A");
define('offline', "Offline");
define('online', "Online");
define('invalid_url', "Nieprawidłowy URL");

// User Menu
define('gamemanager', "Manager Gier");
define('game_monitor', "Monitor Gier");
define('dashboard', "Strona Główna");
define('user_addons', "Dodatki");
define('ftp', "FTP");
define('shop', "Sklep");

// Admin Menu
define('administration', "Administracja");
define('config_games', "Gry/Mody Konfiguracja");
define('modulemanager', "Moduły");
define('server', "Serwery Hosta");
define('settings', "Panel Sterowania");
define('themes', "Ustawienia wyglądu");
define('user_admin', "Użytkownik");
define('sub_users', "Sub-Użytkownicy");
define('show_groups', "Grupy");
define('user_games', "Serwery Gier");
define('addons_manager', "Manager Dodatków");
define('ftp_admin', "Użytkownicy FTP");
define('orders', "Zamówienia");
define('services', "Usługi");
define('shop_settings', "Ustawienia Sklepu");
define('update', "Aktualizacje Panelu");
define('extras', "Dodatki");
define('cur_theme', "%s Styl");
define('watch_logger', "Logowania Konta");

// Server Selector
define('show', "Pokaż");
define('show_all', "Pokaż wszystkie serwery");

// Get home path size
define('get_size', "Pokaż Rozmiar");
define('total_size', "Całkowity Rozmiar");
define('edit', 'Edit');
define('db_error_module_missing', 'Db error module missing');
define('db_error_invalid_db_type', 'Db error invalid db type');
define('xml_file_not_valid', 'Xml file not valid');
define('unable_to_load_xml', 'Unable to load xml');
define('TS3Admin', 'TS3Admin');
define('copyright', 'Copyright');
define('all_rights_reserved', 'All rights reserved');
define('queries_executed', 'Queries executed');
define('lgsl', 'Lgsl');
define('lgsl_admin', 'Lgsl admin');
define('rcon', 'Rcon');
define('litefm_settings', "LiteFM Settings");
define('assign_expiration_date', 'Assign expiration date');
define('assign_expiration_date_info', 'Once it expires the server is unassigned but not removed.');
define('server_expiration_date', 'Server expiration date');
define('server_expiration_date_info', 'Once it expires the server is removed (database and files).');
define('set_expiration_date', 'Set expiration date');
?>
