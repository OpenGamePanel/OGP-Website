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

define('game_manager', "Manager Gier");
define('no_games_to_monitor', "Nie masz żadnych gier, które mogą być monitorowane.");

// game_manager.php
define('fail_no_mods', "Brak aktywnych modów do tej gry! Musisz zwrócić się do admin OGP by dodać mod dla wybranej dla ciebie gry.");
define('no_game_homes_assigned', "Brak serwerów gry przeznaczonych dla Ciebie. Musisz zwrócić się do admin OGP by przypisać dla Ciebie serwery.");
define('select_game_home_to_configure', "Wybierz serwer gry, który chcesz skonfigurować");
define('file_manager', "Manager Plików");
define('configure_mods', "Konfiguruj Mody");
define('install_update_steam', "Instaluj/Aktualizuj przez SteamCMD");
define('install_update_manual', "Instaluj/Aktualizuj Ręcznie");
define('assign_game_homes', "Przypisywanie serwerów gier");
define('user', "Użytkownik");
define('group', "Grupa");
define('addons', "Dodatku");

// start_game.php
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max graczy");
define('max', "Max");
define('ip_and_port', "IP i Port");
define('available_maps', "Dostępne mapy");
define('map_path', "Ścieżka Map");
define('available_parameters', "Dostępne paramentry");
define('start_server', "Start Serwera");
define('start_wait_note', "start serwera może trochę potrwać, proszę czekać nie zamykając przeglądarki.");
define('game_type', "Rodzaj gry");
define('map', "Map");
define('starting_server', "Uruchamianie serwera, proszę czekać...");
define('starting_server_settings', "Uruchamianie serwera z następującymi ustawieniami");
define('startup_params', "Parametry startowe");
define('startup_cpu', "Serwer jest uruchomiony na CPU");
define('startup_nice', "NICE wartość serwera");
define('game_home', "Strona główna gry");
define('server_started', "Serwer został uruchomiony pomyślnie.");
define('no_parameter_access', "Nie masz dostępu do ustawień.");
define('extra_parameters', "Parametry dodatkowe");
define('no_extra_param_access', "Nie masz dostępu do dodatkowych parametrów.");
define('extra_parameters_info', "Parametry te są wprowadzane do końca linii poleceń podczas uruchamiania gry.");
define('game_exec_not_found', "plik gry wykonywalny %s nie znależiono w katalogu gry");
define('select_params_and_start', "Wybierz parametry uruchomienia serwera i naciśnij '%s'.");
define('no_ip_port_pairs_assigned', "Nr IP par Port przypisane do tego hosta. Jeśli nie masz dostępu do edycji hosta skontaktuj się z administratorem..");
define('ip_port_pair_not_owned', "IP:PORT par nie jesteś włascielem.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nieodpowiednie wartość maxplayers, maksymalne, osiągalne liczba slotów została ustawiona.");
define('server_running_not_responding', "Serwer jest uruchomiony, ale nie odpowiada, <br>może być jakiś problem, a może chcesz ");

// update_game.php
define('update_started', "Aktualizacje rozpoczęte, proszę czekać ...");
define('failed_to_start_steam_update', "Nie udało się uruchomić update Steam. Zobacz Log Agenta.");
define('failed_to_start_rsync_update', "Nie udało się uruchomić update Rsync. Zobacz Log Agenta.");
define('update_completed', "Aktualizacja została zakończona pomyślnie.");
define('refresh_rsync_status', "Odśwież status rsync");
define('update_in_progress', "Aktualizacja w toku, proszę czekać ...");
define('refresh_steam_status', "Odśwież status Steam");
define('stop_update', "Zatrzymaj aktualizacje");

// game_monitor.php
define('statistics', "Statystyki");
define('servers', "Serwery");
define('players', "Gracze");
define('current_map', "Aktualna mapa");
define('stop_server', "Stop serwer");
define('server_ip_port', "Server IP:Port");
define('port', "Port");
define('server_name', "Nazwa Serwera");
define('player_name', "Nazwa Gracza");
define('score', "Pkt");
define('time', "Czas");
define('no_rights_to_stop_server', "Nie masz uprawnień, aby zatrzymać ten serwer..");
define('no_ogp_lgsl_support', "Ten serwer. (działa: %s) nie ma LGSL wsparcia w OGP i jego statystyki nie mogą być pokazane.");
define('server_status', "Serwer na %s jest %s.");
define('server_stopped', "Server '%s' został zatrzymany.");
define('if_want_to_start_homes', "Jeśli chcesz rozpocząć grę przejdź do %s.");
define('if_want_manage', "Jeśli chcesz zarządzać grą możesz to zrobić w");
define('columns', "kolumny");
define('view_log', "Logs");
define('group_users', "Group users:");
define('assigned_to', "Assigned to:");
define('restart_server', "Restart Server");
define('restarting_server', "Restarting server, please wait...");
define('server_restarted', "Server '%s' has been restarted.");
define('server_not_running', "The server is not running.");
define('address', "Address");
define('owner', "Owner");
define('operations', "Operations");
define('search', "Search");
define('maps_read_from', "Maps read from ");
define('file', "file");
define('folder', "folder");
define('update_from_local_master_server', "Update from local master server");
define('update_from_selected_rsync_server', "Update from selected rsync server");
define('execute_selected_server_operations', "Execute selected server operations");
define('execute_operations', "Execute operations");
define('account_expiration', "Account expiration");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Failed querying the server.");
define('query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");

// rcon_presets.php
define('presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('name', "Name");
define('command', "RCON&nbsp;Command");
define('add_preset', "Add preset");
define('edit_presets', "Edit presets");
define('del_preset', "Delete");
define('change_preset', "Change");
define("send_command", "Send command");

//rsync_install.php
define('starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('starting_sync_with', "Starting sync with %s...");
define('refresh_interval', "Log refreshing interval");

//update_server_manual.php
define('finished_manual_update', "Finished manual update.");
define('failed_to_start_file_download', "Failed to start file download");
define('game_name', "Game name");
define('dest_dir', "Destination directory");
define('remote_server', "Remote Server");
define('file_url', "File URL");
define('file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('dest_filename', "Destination Filename");
define('dest_filename_info', "The filename for the destination file.");
define('update_server', "Update server");
define('unavailable', "Unavailable");
define('ping', "Ping");
define('team', "Team");
define('deaths', "Deaths");
define('pid', "PID");
define('skill', "Skill");
define("AIBot", "AIBot");
define("steamid", "Steam ID");
define('player', "Player");

//map image upload
define('upload_map_image', "Upload map image");
define('upload_image', "Upload image");
define('jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('check_dev_console', "Error uploading file, check the browser developer console.");
define('uploaded_successfully', "Uploaded successfully.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unknown errors.");
define('status', 'Status');
define('start', 'Start');
define('unable_to_get_log', 'Unable to get log');
define('server_binary_not_executable', 'Server binary not executable');
define('server_not_running_log_found', 'Server not running log found');
define('server_running_cant_update', 'Server running cant update');
define('xml_steam_error', 'Xml steam error');
define('mod_key_not_found_from_xml', 'Mod key not found from xml');
define('unable_retrieve_mod_info', 'Unable retrieve mod info');
define('unexpected_result_libremote', 'Unexpected result libremote');
define('unable_get_info', 'Unable get info');
define('server_already_running', 'Server already running');
define('already_running_stop_server', 'Already running stop server');
define('error_server_already_running', 'Error server already running');
define('failed_start_server_code', 'Failed start server code');
define('disabled', 'Disabled');
define('not_found_server', 'Not found server');
define('rcon_command_title', 'Rcon command title');
define('has_sent_to', 'Has sent to');
define('need_set_remote_pass', 'Need set remote pass');
define('before_sending_rcon_com', 'Before sending rcon com');
define('retry', 'Retry');
define('page', 'Page');
define('server_cant_start', 'Server cant start');
define('server_cant_stop', 'Server cant stop');
define('error_occured_remote_host', 'Error occured remote host');
define('follow_server_status', 'Follow server status');
define('hostname', 'Hostname');
define('rsync_install', 'Rsync install');
define('rcon_presets', 'Rcon presets');
define('directory', 'Directory');

// RCON
define('view_player_commands',"View Player Commands");
define('hide_player_commands',"Hide Player Commands");
define('no_online_players',"There are no online players.");
?>