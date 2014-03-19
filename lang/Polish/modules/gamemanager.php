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

$lang['game_monitor'] = "Game Monitor";
$lang['game_manager'] = "Game Manager";
$lang['no_games_to_monitor'] = "You do not have any games configured to you that can be monitored.";

// game_manager.php
$lang['fail_no_mods'] = "No mods enabled for this game! You need to ask your OGP admin to add mod(s) for the game assigned for you.";
$lang['no_game_homes_assigned'] = "No game servers assigned for you. You need to ask your OGP admin to assign games for you.";
$lang['select_game_home_to_configure'] = "Select a game server that you want to configure";
$lang['file_manager'] = "File Manager";
$lang['configure_mods'] = "Configure mods";
$lang['install_update_steam'] = "Install/Update via Steam";
$lang['install_update_manual'] = "Install/Update manually";
$lang['assign_game_homes'] = "Assign Game servers";
$lang['user'] = "User";
$lang['group'] = "Group";
$lang['addons'] = "Addons";

// start_game.php
$lang['ogp_agent_ip'] = "GP Agent IP";
$lang['max_players'] = "Max graczy";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP i Port";
$lang['available_maps'] = "Dostępne may";
$lang['map_path'] = "Ścieżka Map";
$lang['map_selection_no_supported'] = "Mapa z OGP wybór nie jest jeszcze obsługiwane z tą grą.";
$lang['available_parameters'] = "Dostępne paramentry";
$lang['start_server'] = "Start Serwera";
$lang['start_wait_note'] = "start serwera może trochę potrwać, proszę czekać nie zamykając przeglądarki.";
$lang['game_type'] = "Rodzaj gry";
$lang['map'] = "Map";
$lang['starting_server'] = "Uruchamianie serwera, proszę czekać ...";
$lang['starting_server_settings'] = "Uruchamianie serwera z następującymi ustawieniami";
$lang['startup_params'] = "Parametry startowe";
$lang['startup_cpu'] = "CPU na serwerze jest uruchomiony na";
$lang['startup_nice'] = "Przyjemna wartość serwer";
$lang['game_home'] = "Strona główna gry";
$lang['server_started'] = "Serwer uruchomiona pomyślnie.";
$lang['no_parameter_access'] = "Nie masz dostępu do ustawień.";
$lang['extra_parameters'] = "Dodatkowe parametry";
$lang['no_extra_param_access'] = "Nie masz dostępu do dodatkowych parametrów.";
$lang['extra_parameters_info'] = "Parametry te są wprowadzane do końca linii poleceń podczas uruchamiania gry.";
$lang['game_exec_not_found'] = "gry plik wykonywalny %s nie stwierdzono ze zdalnego serwera.";
$lang['select_params_and_start'] = "Wybierz parametry uruchomienia serwera i naciśnij '%s'.";
$lang['no_ip_port_pairs_assigned'] = "Nr IP par Port przypisane do tego domu. Jeśli nie masz dostępu do edycji domu skontaktuj się z administratorem..";
$lang['ip_port_pair_not_owned'] = "IP:PORT par nie będących własnością.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Nieodpowiednie wartość maxplayers, maksymalne, osiągalne liczba slotów została ustawiona.";
$lang['server_running_not_responding'] = "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ";
$lang[''] = "";


// update_game.php
$lang['update_started'] = "Aktualizacje rozpoczęte, proszę czekać ...";
$lang['failed_to_start_steam_update'] = "Nie udało się uruchomić update Steam. Zobacz dzienniku agenta.";
$lang['failed_to_start_rsync_update'] = "Nie udało się uruchomić update Rsync. Zobacz dzienniku agenta.";
$lang['update_completed'] = "Została pomyślnie zakończona.";
$lang['refresh_steam_status'] = "Refresh steam status";
$lang['refresh_rsync_status'] = "Refresh rsync status";
$lang['update_in_progress'] = "Aktualizacja w toku, proszę czekać ...";
$lang['refresh_steam_status'] = "Odśwież status steam";
$lang['stop_update'] = "Zatrzymaj aktualizowanie";
$lang[''] = "";
$lang[''] = "";

// game_monitor.php
$lang['statistics'] = "Statystyki";
$lang['servers'] = "Serwery";
$lang['players'] = "Gracze";
$lang['current_map'] = "Aktualna mapa";
$lang['stop_server'] = "Stop serwer";
$lang['server_ip_port'] = "Server IP:Port";
$lang['port'] = "Port";
$lang['server_name'] = "Nazwa Serwera";
$lang['player_name'] = "Nazwa gracza";
$lang['score'] = "Punkty";
$lang['time'] = "Czas";
$lang['no_rights_to_stop_server'] = "Nie masz uprawnień, aby zatrzymać ten serwer..";
$lang['no_ogp_lgsl_support'] = "Ten serwer. (działa: %s) nie ma LGSL wsparcia w OGP i jego statystyki nie mogą być pokazane.";
$lang['server_status'] = "Server on %s is %s.";
$lang['server_stopped'] = "Server '%s' został zatrzymany.";
$lang['if_want_to_start_homes'] = "Jeśli chcesz rozpocząć grę przejdź do domów %s.";
$lang['if_want_manage'] = "Jeśli chcesz zarządzać gry możesz to zrobić w";
$lang['columns'] = "kolumny";
$lang['view_log'] = "Logs";
$lang['group_users'] = "Group users:";
$lang['restart_server'] = "Restart Server";
$lang['restarting_server'] = "Restarting server, please wait...";
$lang['server_restarted'] = "Server '%s' has been restarted.";
$lang['server_not_running'] = "The server is not running.";
$lang['address'] = "Address";
$lang['owner'] = "Owner";
$lang['operations'] = "Operations";
$lang['search'] = "Search";
$lang['maps_read_from'] = "Maps read from ";
$lang['file'] = "file";
$lang['folder'] = "folder";
$lang[''] = "";
$lang['update_from_local_master_server'] = "Update from local master server.";
$lang['execute_selected_server_operations'] = "Execute selected server operations";
$lang['execute_operations'] = "Execute operations";
$lang['account_expiration'] = "Account expiration";
$lang['mysql_databases'] = "MySQL Databases";
$lang['failed_querying_server'] = "* Failed querying the server.";
$lang['query_protocol_not_supported'] = "* There is no query protocol in OGP that can support this server.";
$lang['queries_disabled_by_setting_disable_queries_after'] = "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>";

// rcon_presets.php
$lang['presets_for_game_and_mod'] = "RCON presets for %s and mod %s";
$lang['name'] = "Name";
$lang['command'] = "RCON&nbsp;Command";
$lang['add_preset'] = "Add preset";
$lang['edit_presets'] = "Edit presets";
$lang['del_preset'] = "Delete";
$lang['change_preset'] = "Change";
$lang["send_command"] = "Send command";

//rsync_install.php
$lang['starting_copy_with_master_server_named'] = "Starting copy with master server named '%s'...";
$lang['starting_sync_with'] = "Starting sync with %s...";
$lang['refresh_interval'] = "Log refreshing interval";

//update_server_manual.php
$lang['finished_manual_update'] = "Finished manual update.";
$lang['failed_to_start_file_download'] = "Failed to start file download";
$lang['game_name'] = "Game name";
$lang['dest_dir'] = "Destination directory";
$lang['remote_server'] = "Remote Server";
$lang['file_url'] = "File URL";
$lang['file_url_info'] = "The URL of the file that is uploaded and uncompressed to the directory.";
$lang['one_dir_down'] = "Go one dir down before extracting";
$lang['dest_filename'] = "Destination Filename";
$lang['dest_filename_info'] = "The filename for the destination file.";
$lang['update_server'] = "Update server";
$lang['unavailable'] = "Unavailable";

$lang['ping'] = "Ping";
$lang['team'] = "Team";
$lang['deaths'] = "Deaths";
$lang['pid'] = "PID";
$lang['skill'] = "Skill";
$lang["AIBot"] = "AIBot";
$lang["steamid"] = "Steam ID";
$lang['player'] = "Player";
?>
