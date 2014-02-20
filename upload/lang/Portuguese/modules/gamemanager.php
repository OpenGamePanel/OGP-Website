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
$lang['status'] = "Status";

// game_manager.php
$lang['fail_no_mods'] = "No mods enabled for this game! You need to ask your OGP admin to add mod(s) for the game assigned for you.";
$lang['no_game_homes_assigned'] = "No game servers assigned for you. You need to ask your OGP admin to assign games for you.";
$lang['select_game_home_to_configure'] = "Select a game server that you want to configure";
$lang['file_manager'] = "File Manager";
$lang['configure_mods'] = "Configure mods";
$lang['install_update_steam'] = "Install/Update via Steam";
$lang['install_update_manual'] = "Install/Update manually";
$lang['assign_game_homes'] = "Assign game servers";
$lang['user'] = "User";
$lang['group'] = "Group";
$lang['addons'] = "Addons";

// start_game.php
$lang['ogp_agent_ip'] = "OGP Agent IP";
$lang['max_players'] = "Max Players";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP and Port";
$lang['available_maps'] = "Available Maps";
$lang['map_path'] = "Map Path";
$lang['available_parameters'] = "Available Parameters";
$lang['start_server'] = "Start Server";
$lang['start_wait_note'] = "The server startup might take a while, please wait without closing your browser.";
$lang['game_type'] = "Game Type";
$lang['map'] = "Map";
$lang['starting_server'] = "Starting server, please wait...";
$lang['starting_server_settings'] = "Starting server with following settings";
$lang['startup_params'] = "Startup parameters";
$lang['startup_cpu'] = "CPU the server is running on";
$lang['startup_nice'] = "Nice value of the server";
$lang['game_home'] = "game server";
$lang['server_started'] = "Server started successfully.";
$lang['no_parameter_access'] = "You do not have access to paramters.";
$lang['extra_parameters'] = "Extra Parameters";
$lang['no_extra_param_access'] = "You do not have access to extra parameters.";
$lang['extra_parameters_info'] = "These parameters are put to the end of the command line when the game is started.";
$lang['game_exec_not_found'] = "The game executable %s was not found from the remote server.";
$lang['select_params_and_start'] = "Select the startup parameters for the server and press '%s'.";
$lang['no_ip_port_pairs_assigned'] = "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.";
$lang['unable_to_get_log'] = "Unable to get log, retval %s.";
$lang['server_binary_not_executable'] = "Server binary is not executable. Check you have proper permissions in the server home directory.";
$lang['server_not_running_log_found'] = "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.";
$lang['ip_port_pair_not_owned'] = "IP:PORT pair not owned.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Unsuitable maxplayers value, maximum reachable number of slots has been set.";
$lang['server_running_not_responding'] = "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ";

// update_game.php
$lang['update_started'] = "Update started, please wait...";
$lang['failed_to_start_steam_update'] = "Failed to start Steam update. See agent log.";
$lang['failed_to_start_rsync_update'] = "Failed to start Rsync update. See agent log.";
$lang['update_completed'] = "Update completed successfully.";
$lang['update_in_progress'] = "Update in progress, please wait...";
$lang['refresh_steam_status'] = "Refresh steam status";
$lang['refresh_rsync_status'] = "Refresh rsync status";
$lang['server_running_cant_update'] = "Server running so update is not possible. Stop the server before update.";
$lang['xml_steam_error'] = "Selected server type does not support steam install/update.";
$lang['mod_key_not_found_from_xml'] = "Mod key '%s' not found from the XML file.";
$lang['stop_update'] = "Pare de atualizar";

// game_monitor.php
$lang['statistics'] = "Statistics";
$lang['servers'] = "Servers";
$lang['players'] = "Players";
$lang['current_map'] = "Current Map";
$lang['stop_server'] = "Stop Server";
$lang['server_ip_port'] = "Server IP:Port";
$lang['port'] = "Port";
$lang['server_name'] = "Server Name";
$lang['player_name'] = "Player Name";
$lang['score'] = "Score";
$lang['time'] = "Time";
$lang['no_rights_to_stop_server'] = "You do not have rights to stop this server.";
$lang['no_ogp_lgsl_support'] = "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.";
$lang['server_status'] = "Server on %s is %s.";
$lang['server_stopped'] = "Server '%s' has been stopped.";
$lang['if_want_to_start_homes'] = "If you want to start game servers go to %s.";
$lang['view_log'] = "Logs";
$lang['if_want_manage'] = "Se você deseja gerenciar seus jogos você pode fazê-lo na";
$lang['columns'] = "colunas";
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
?>
