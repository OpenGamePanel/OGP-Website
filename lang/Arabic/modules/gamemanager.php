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

define('game_manager', "مدير اللعبة");
define('no_games_to_monitor', "You do not have any games configured to you that can be monitored.");
define('status', "الحالة");
define('fail_no_mods', "No mods enabled for this game! You need to ask your OGP admin to add mod(s) for the game assigned for you.");
define('no_game_homes_assigned', "No game servers assigned for you. You need to ask your OGP admin to assign games for you.");
define('select_game_home_to_configure', "Select a game server that you want to configure");
define('file_manager', "مدير الملفات");
define('configure_mods', "Configure mods");
define('install_update_steam', "Install/Update via Steam");
define('install_update_manual', "Install/Update manually");
define('assign_game_homes', "Assign game servers");
define('user', "User");
define('group', "مجموعة");
define('start', "Start");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max Players");
define('max', "Max");
define('ip_and_port', "IP and Port");
define('available_maps', "Available Maps");
define('map_path', "Map Path");
define('available_parameters', "Available Parameters");
define('start_server', "Start Server");
define('start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
define('game_type', "Game Type");
define('map', "Map");
define('starting_server', "Starting server, please wait...");
define('starting_server_settings', "Starting server with following settings");
define('startup_params', "Startup parameters");
define('startup_cpu', "CPU the server is running on");
define('startup_nice', "Nice value of the server");
define('game_home', "game server");
define('server_started', "Server started successfully.");
define('no_parameter_access', "You do not have access to parameters.");
define('extra_parameters', "Extra Parameters");
define('no_extra_param_access', "You do not have access to extra parameters.");
define('extra_parameters_info', "These parameters are put to the end of the command line when the game is started.");
define('game_exec_not_found', "The game executable %s was not found from the remote server.");
define('select_params_and_start', "Select the startup parameters for the server and press '%s'.");
define('no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('unable_to_get_log', "Unable to get log, retval %s.");
define('server_binary_not_executable', "Server binary is not executable. Check you have proper permissions in the server home directory.");
define('server_not_running_log_found', "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.");
define('ip_port_pair_not_owned', "IP:PORT pair not owned.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Unsuitable maxplayers value, maximum reachable number of slots has been set.");
define('server_running_not_responding', "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ");
define('update_started', "Update started, please wait...");
define('failed_to_start_steam_update', "Failed to start Steam update. See agent log.");
define('failed_to_start_rsync_update', "Failed to start Rsync update. See agent log.");
define('update_completed', "Update completed successfully.");
define('update_in_progress', "Update in progress, please wait...");
define('refresh_steam_status', "Refresh steam status");
define('refresh_rsync_status', "Refresh rsync status");
define('server_running_cant_update', "Server running so update is not possible. Stop the server before update.");
define('xml_steam_error', "Selected server type does not support steam install/update.");
define('mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
define('stop_update', "Stop update");
define('statistics', "Statistics");
define('servers', "Servers");
define('players', "Players");
define('current_map', "Current Map");
define('stop_server', "Stop Server");
define('server_ip_port', "Server IP:Port");
define('server_name', "Server Name");
define('server_id', "Server ID");
define('player_name', "Player Name");
define('score', "Score");
define('time', "Time");
define('no_rights_to_stop_server', "You do not have rights to stop this server.");
define('no_ogp_lgsl_support', "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.");
define('server_status', "Server on %s is %s.");
define('server_stopped', "Server '%s' has been stopped.");
define('if_want_to_start_homes', "If you want to start game servers go to %s.");
define('view_log', "Logs");
define('if_want_manage', "If you want to manage your games you can do it in the");
define('columns', "columns");
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
define('addons', "Addons");
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
define('game_name', "Game name");
define('dest_dir', "Destination directory");
define('remote_server', "Remote Server");
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
define('directory', "Directory");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('auto_update_copy_me', "Copy");
define('auto_update_copy_me_success', "Copied!");
define('auto_update_copy_me_fail', "Failed to copy. Please manually copy the link.");
define('get_steam_autoupdate_api_link', "Auto Update Link");
define('update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('cannot_update_from_own_self', "Local Server Update may not run on a master server.");
define('show_server_id', "Show Server IDs");
define('hide_server_id', "Hide Server IDs");
?>
