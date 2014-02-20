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

$lang['game_monitor'] = "Szerver státusz";
$lang['no_games_to_monitor'] = "Nincs beállítva egy játék szerver se aminek megnézhetnéd a státuszát.";

// game_manager.php
$lang['fail_no_mods'] = "Nincs engedélyezve mod ehhez a játékhoz! Meg kell kérned az adminisztrátort, hogy legalább egy játék modot engedélyezzen a számodra.";
$lang['no_game_homes_assigned'] = "Nincs játék hozzád rendelve. Meg kell kérdned az adminisztrátort, hogy adjon hozzá játékot a profilodhoz.";
$lang['select_game_home_to_configure'] = "Válaszd ki a konfigurálni kívánt játék szervert.";
$lang['file_manager'] = "Fájl Menedzser";
$lang['configure_mods'] = "Modok beállítása";
$lang['install_update_steam'] = "Telepítés/Frissítés Steam-en keresztül";
$lang['install_update_manual'] = "Telepítés/Frissítés manuálisan";
$lang['assign_game_homes'] = "Játék szerver hozzárendelése";
$lang['addons'] = "Addons";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// start_game.php
$lang['ogp_agent_ip'] = "OGP Kliens IP";
$lang['max_players'] = "Max játékos";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP és Port";
$lang['available_maps'] = "Elérheto pályák";
$lang['map_path'] = "Pálya útvonal";
$lang['map_selection_no_supported'] = "Pálya választás ezen a panelen ehhez a játékhoz még nem lehetséges.";
$lang['available_parameters'] = "Elérheto paraméterek";
$lang['start_server'] = "Szerver indítása";
$lang['start_wait_note'] = "A szerver indulása eltarthat egy ideig, böngészo bezárása nélkül várd meg míg elindul.";
$lang['game_type'] = "Játék típusa";
$lang['map'] = "Pálya";
$lang['starting_server'] = "Szerver indítása, kérlek várj...";
$lang['starting_server_settings'] = "Szerver indítása a következo beállításokkal";
$lang['startup_params'] = "Indítási paraméterek";
$lang['startup_cpu'] = "CPU amelyen a szerver fut";
$lang['startup_nice'] = "Nice értéke a szervernek";
$lang['game_home'] = "Játék helye";
$lang['server_started'] = "Szerver indítása sikeres.";
$lang['no_parameter_access'] = "Nem férsz hozzá a paraméterekhez.";
$lang['extra_parameters'] = "Extra Paraméterek";
$lang['no_extra_param_access'] = "Nincs hozzáférésed az extra paraméterekhez.";
$lang['extra_parameters_info'] = "Ezek a paraméterek az indítóparancs végére kerülnek a játék szerver indításakor.";
$lang['game_exec_not_found'] = "A játék indítófájla %s helyen nem található.";
$lang['ip_port_pair_not_owned'] = "IP:PORT pár tulajdona.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Alkalmatlan maxplayers érték maximum elérheto számú slot van állítva.";
$lang['server_running_not_responding'] = "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ";


// update_game.php
$lang['update_started'] = "Frissítés elkezdodött, kérlek várj...";
$lang['failed_to_start_steam_update'] = "Steam-es frissítés indítása sikertelen. Nézd meg az OGP kliens logját.";
$lang['failed_to_start_rsync_update'] = "Rsync-es frissítés indítása sikertelen. Nézd meg az OGP kliens logját.";
$lang['update_completed'] = "Frissítés elkészült.";
$lang['update_in_progress'] = "Frissítés folyamatban, kérlek várj...";
$lang['refresh_steam_status'] = "Frissítése status Steam";
$lang['refresh_rsync_status'] = "Frissítése status Rsync";
$lang['stop_update'] = "Frissítésének leállítása";
$lang[''] = "";
$lang[''] = "";

// game_monitor.php
$lang['statistics'] = "Statisztika";
$lang['servers'] = "Szerverek";
$lang['players'] = "Játékosok";
$lang['current_map'] = "Jelenlegi pálya";
$lang['stop_server'] = "Szerver leállítása";
$lang['server_ip_port'] = "Szerver IP:Port";
$lang['server_name'] = "Szerver Neve";
$lang['player_name'] = "Játékos Neve";
$lang['score'] = "Pontszám";
$lang['time'] = "Ido";
$lang['no_rights_to_stop_server'] = "Nincs jogod ezen szerver leállításához.";
$lang['no_ogp_lgsl_support'] = "Ehhez a játék szerverhez (%s) nincs LGSL támogatás az OGP-ben és ezért nem jelenítheto meg hozzá a statisztika.";
$lang['if_want_manage'] = "Ha szeretné kezelni a játékokat meg tudod csinálni a";
$lang['columns'] = "oszlopok";
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
$lang['port'] = "Port";
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

?>
