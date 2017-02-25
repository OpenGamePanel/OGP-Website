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
define('status', "Status");
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
define('start', "Start");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max Players");
define('max', "Max");
define('ip_and_port', "IP i Port");
define('available_maps', "Dostępne mapy");
define('map_path', "Ścieżka Map");
define('available_parameters', "Dostępne paramentry");
define('start_server', "Start Serwera");
define('start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
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
define('unable_to_get_log', "Unable to get log, retval %s.");
define('server_binary_not_executable', "Server binary is not executable. Check you have proper permissions in the server home directory.");
define('server_not_running_log_found', "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.");
define('ip_port_pair_not_owned', "IP:PORT par nie jesteś włascielem.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nieodpowiednie wartość maxplayers, maksymalne, osiągalne liczba slotów została ustawiona.");
define('server_running_not_responding', "Serwer jest uruchomiony, ale nie odpowiada, <br>może być jakiś problem, a może chcesz ");
define('update_started', "Aktualizacje rozpoczęte, proszę czekać ...");
define('failed_to_start_steam_update', "Nie udało się uruchomić update Steam. Zobacz Log Agenta.");
define('failed_to_start_rsync_update', "Nie udało się uruchomić update Rsync. Zobacz Log Agenta.");
define('update_completed', "Aktualizacja została zakończona pomyślnie.");
define('update_in_progress', "Aktualizacja w toku, proszę czekać ...");
define('refresh_steam_status', "Odśwież status Steam");
define('refresh_rsync_status', "Odśwież status rsync");
define('server_running_cant_update', "Server running so update is not possible. Stop the server before update.");
define('xml_steam_error', "Selected server type does not support steam install/update.");
define('mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
define('stop_update', "Zatrzymaj aktualizacje");
define('statistics', "Statystyki");
define('servers', "Serwery");
define('players', "Gracze");
define('current_map', "Aktualna mapa");
define('stop_server', "Stop Server");
define('server_ip_port', "Server IP:Port");
define('server_name', "Nazwa Serwera");
define('player_name', "Nazwa Gracza");
define('score', "Pkt");
define('time', "Czas");
define('no_rights_to_stop_server', "Nie masz uprawnień, aby zatrzymać ten serwer..");
define('no_ogp_lgsl_support', "Ten serwer. (działa: %s) nie ma LGSL wsparcia w OGP i jego statystyki nie mogą być pokazane.");
define('server_status', "Serwer na %s jest %s.");
define('server_stopped', "Server '%s' został zatrzymany.");
define('if_want_to_start_homes', "Jeśli chcesz rozpocząć grę przejdź do %s.");
define('view_log', "Logs");
define('if_want_manage', "Jeśli chcesz zarządzać grą możesz to zrobić w");
define('columns', "kolumny");
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
define('unable_retrieve_mod_info', "Unable to retrieve mod information from database.");
define('unexpected_result_libremote', "Unexpected result from libremote, please inform developers.");
define('unable_get_info', "Unable to get the required information for startup, blocking startup.");
define('server_already_running', "Server already running. If you do not see the server in the Game Monitor, there might be a somekind of problem and you might want to");
define('already_running_stop_server', "Stop server.");
define('error_server_already_running', "ERROR: Server already running on port");
define('failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('disabled', "disabled ");
define('not_found_server', "Could not find the remote server with ID");
define('rcon_command_title', "RCON Command");
define('has_sent_to', "has been sent to");
define('need_set_remote_pass', "You need to set the remote control password on");
define('before_sending_rcon_com', "before sending rcon commands to it.");
define('retry', "Retry");
define('page', "page");
define('server_cant_start', "server can not start");
define('server_cant_stop', "server can not stop");
define('error_occured_remote_host', "Error occurred on the remote host");
define('follow_server_status', "You can follow the server status from");
define('addons', "Dodatku");
define('hostname', "Hostname");
define('rsync_install', "[Rsync Install]");
define('ping', "Ping");
define('team', "Team");
define('deaths', "Deaths");
define('pid', "PID");
define('skill', "Skill");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "Player");
define('port', "Port");
define('rcon_presets', "RCON presets");
define('update_from_local_master_server', "Update from local master server");
define('update_from_selected_rsync_server', "Update from selected rsync server");
define('execute_selected_server_operations', "Execute selected server operations");
define('execute_operations', "Execute operations");
define('account_expiration', "Account expiration");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Failed querying the server.");
define('query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('name', "Name");
define('command', "RCON&nbsp;Command");
define('add_preset', "Add preset");
define('edit_presets', "Edit presets");
define('del_preset', "Delete");
define('change_preset', "Change");
define('send_command', "Send command");
define('starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('starting_sync_with', "Starting sync with %s...");
define('refresh_interval', "Log refreshing interval");
define('finished_manual_update', "Finished manual update.");
define('failed_to_start_file_download', "Failed to start file download");
define('game_name', "Nazwa Gry");
define('dest_dir', "Destination directory");
define('remote_server', "Serwer Zdalny");
define('file_url', "File URL");
define('file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('dest_filename', "Destination Filename");
define('dest_filename_info', "The filename for the destination file.");
define('update_server', "Update server");
define('unavailable', "Unavailable");
define('upload_map_image', "Upload map image");
define('upload_image', "Upload image");
define('jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('check_dev_console', "Error during uploading file, please check the browser developer console.");
define('uploaded_successfully', "Uploaded successfully.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unknown errors.");
define('directory', "ĹšcieĹĽka katalogu");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
?>