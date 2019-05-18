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

define('OGP_LANG_no_games_to_monitor', "You do not have any games configured to you that can be monitored.");
define('OGP_LANG_status', "Status");
define('OGP_LANG_fail_no_mods', "No mods enabled for this game! You need to ask your OGP admin to add mod(s) for the game assigned for you.");
define('OGP_LANG_no_game_homes_assigned', "You don't have any servers assigned to your account.");
define('OGP_LANG_select_game_home_to_configure', "Select a game server that you want to configure");
define('OGP_LANG_file_manager', "File Manager");
define('OGP_LANG_configure_mods', "Configure mods");
define('OGP_LANG_install_update_steam', "Install/Update via Steam");
define('OGP_LANG_install_update_manual', "Install/Update manually");
define('OGP_LANG_assign_game_homes', "Assign game servers");
define('OGP_LANG_user', "User");
define('OGP_LANG_group', "Group");
define('OGP_LANG_start', "Start");
define('OGP_LANG_ogp_agent_ip', "OGP Agent IP");
define('OGP_LANG_max_players', "Max Players");
define('OGP_LANG_max', "Max");
define('OGP_LANG_ip_and_port', "IP and Port");
define('OGP_LANG_available_maps', "Available Maps");
define('OGP_LANG_map_path', "Map Path");
define('OGP_LANG_available_parameters', "Available Parameters");
define('OGP_LANG_start_server', "Start Server");
define('OGP_LANG_start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
define('OGP_LANG_game_type', "Game Type");
define('OGP_LANG_map', "Map");
define('OGP_LANG_starting_server', "Starting server, please wait...");
define('OGP_LANG_starting_server_settings', "Starting server with following settings");
define('OGP_LANG_startup_params', "Startup parameters");
define('OGP_LANG_startup_cpu', "CPU the server is running on");
define('OGP_LANG_startup_nice', "Nice value of the server");
define('OGP_LANG_game_home', "Home Path");
define('OGP_LANG_server_started', "Server started successfully.");
define('OGP_LANG_no_parameter_access', "You do not have access to parameters.");
define('OGP_LANG_extra_parameters', "Extra Parameters");
define('OGP_LANG_no_extra_param_access', "You do not have access to extra parameters.");
define('OGP_LANG_extra_parameters_info', "These parameters are put to the end of the command line when the game is started.");
define('OGP_LANG_game_exec_not_found', "The game executable %s was not found from the remote server.");
define('OGP_LANG_select_params_and_start', "Select the startup parameters for the server and press '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('OGP_LANG_unable_to_get_log', "Unable to get log, retval %s.");
define('OGP_LANG_server_binary_not_executable', "Server binary is not executable. Check you have proper permissions in the server home directory.");
define('OGP_LANG_server_not_running_log_found', "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT pair not owned.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Unsuitable maxplayers value, maximum reachable number of slots has been set.");
define('OGP_LANG_server_running_not_responding', "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ");
define('OGP_LANG_update_started', "Update started, please wait...");
define('OGP_LANG_failed_to_start_steam_update', "Failed to start Steam update. See agent log.");
define('OGP_LANG_failed_to_start_rsync_update', "Failed to start Rsync update. See agent log.");
define('OGP_LANG_update_completed', "Update completed successfully.");
define('OGP_LANG_update_in_progress', "Update in progress, please wait...");
define('OGP_LANG_refresh_steam_status', "Refresh Steam status");
define('OGP_LANG_refresh_rsync_status', "Refresh Rsync status");
define('OGP_LANG_server_running_cant_update', "Server running so update is not possible. Stop the server before update.");
define('OGP_LANG_xml_steam_error', "Selected server type does not support steam install/update.");
define('OGP_LANG_mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
define('OGP_LANG_stop_update', "Stop update");
define('OGP_LANG_statistics', "Statistics");
define('OGP_LANG_servers', "Servers");
define('OGP_LANG_players', "Players");
define('OGP_LANG_current_map', "Current Map");
define('OGP_LANG_stop_server', "Stop Server");
define('OGP_LANG_server_ip_port', "Server IP:Port");
define('OGP_LANG_server_name', "Server Name");
define('OGP_LANG_server_id', "Server ID");
define('OGP_LANG_player_name', "Player Name");
define('OGP_LANG_score', "Score");
define('OGP_LANG_time', "Time");
define('OGP_LANG_no_rights_to_stop_server', "You do not have rights to stop this server.");
define('OGP_LANG_no_ogp_lgsl_support', "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.");
define('OGP_LANG_server_status', "Server on %s is %s.");
define('OGP_LANG_server_stopped', "Server '%s' has been stopped.");
define('OGP_LANG_if_want_to_start_homes', "If you want to start game servers go to %s.");
define('OGP_LANG_view_log', "Log Viewer");
define('OGP_LANG_if_want_manage', "If you want to manage your games you can do it in the");
define('OGP_LANG_columns', "columns");
define('OGP_LANG_group_users', "Group users:");
define('OGP_LANG_assigned_to', "Assigned to:");
define('OGP_LANG_restart_server', "Restart Server");
define('OGP_LANG_restarting_server', "Restarting server, please wait...");
define('OGP_LANG_server_restarted', "Server '%s' has been restarted.");
define('OGP_LANG_server_not_running', "The server is not running.");
define('OGP_LANG_address', "Address");
define('OGP_LANG_owner', "Owner");
define('OGP_LANG_operations', "Operations");
define('OGP_LANG_search', "Search");
define('OGP_LANG_maps_read_from', "Maps read from ");
define('OGP_LANG_file', "file");
define('OGP_LANG_folder', "folder");
define('OGP_LANG_unable_retrieve_mod_info', "Unable to retrieve mod information from database.");
define('OGP_LANG_unexpected_result_libremote', "Unexpected result from libremote, please inform developers.");
define('OGP_LANG_unable_get_info', "Unable to get the required information for startup, blocking startup.");
define('OGP_LANG_server_already_running', "Server already running. If you do not see the server in the Game Monitor, there might be a somekind of problem and you might want to");
define('OGP_LANG_already_running_stop_server', "Stop server.");
define('OGP_LANG_error_server_already_running', "ERROR: Server already running on port");
define('OGP_LANG_failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('OGP_LANG_disabled', "disabled ");
define('OGP_LANG_not_found_server', "Could not find the remote server with ID");
define('OGP_LANG_rcon_command_title', "RCON Command");
define('OGP_LANG_has_sent_to', "has been sent to");
define('OGP_LANG_need_set_remote_pass', "You need to set the remote control password on");
define('OGP_LANG_before_sending_rcon_com', "before sending rcon commands to it.");
define('OGP_LANG_retry', "Retry");
define('OGP_LANG_page', "page");
define('OGP_LANG_server_cant_start', "server can not start");
define('OGP_LANG_server_cant_stop', "server can not stop");
define('OGP_LANG_error_occured_remote_host', "Error occurred on the remote host");
define('OGP_LANG_follow_server_status', "You can follow the server status from");
define('OGP_LANG_addons', "Addons");
define('OGP_LANG_hostname', "Hostname");
define('OGP_LANG_rsync_install', "[Rsync Install]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Team");
define('OGP_LANG_deaths', "Deaths");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Player");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "RCON presets");
define('OGP_LANG_update_from_local_master_server', "Update from local Master Server");
define('OGP_LANG_update_from_selected_rsync_server', "Update from selected Rsync server");
define('OGP_LANG_execute_selected_server_operations', "Execute selected server operations");
define('OGP_LANG_execute_operations', "Execute operations");
define('OGP_LANG_account_expiration', "Account expiration");
define('OGP_LANG_mysql_databases', "MySQL Databases");
define('OGP_LANG_failed_querying_server', "* Failed querying the server.");
define('OGP_LANG_query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('OGP_LANG_name', "Name");
define('OGP_LANG_command', "RCON&nbsp;Command");
define('OGP_LANG_add_preset', "Add preset");
define('OGP_LANG_edit_presets', "Edit presets");
define('OGP_LANG_del_preset', "Delete");
define('OGP_LANG_change_preset', "Change");
define('OGP_LANG_send_command', "Send command");
define('OGP_LANG_starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('OGP_LANG_starting_sync_with', "Starting sync with %s...");
define('OGP_LANG_refresh_interval', "Log refreshing interval");
define('OGP_LANG_finished_manual_update', "Finished manual update.");
define('OGP_LANG_failed_to_start_file_download', "Failed to start file download");
define('OGP_LANG_game_name', "Game name");
define('OGP_LANG_dest_dir', "Destination directory");
define('OGP_LANG_remote_server', "Remote Server");
define('OGP_LANG_file_url', "File URL");
define('OGP_LANG_file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('OGP_LANG_dest_filename', "Destination Filename");
define('OGP_LANG_dest_filename_info', "The filename for the destination file.");
define('OGP_LANG_update_server', "Update server");
define('OGP_LANG_unavailable', "Unavailable");
define('OGP_LANG_upload_map_image', "Upload map image");
define('OGP_LANG_upload_image', "Upload image");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('OGP_LANG_check_dev_console', "Error during uploading file, please check the browser developer console.");
define('OGP_LANG_uploaded_successfully', "Uploaded successfully.");
define('OGP_LANG_cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Can't write file:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Unknown errors.");
define('OGP_LANG_directory', "Directory");
define('OGP_LANG_view_player_commands', "View Player Commands");
define('OGP_LANG_hide_player_commands', "Hide Player Commands");
define('OGP_LANG_no_online_players', "There are no online players.");
define('OGP_LANG_invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('OGP_LANG_auto_update_title_popup', "Steam Auto Update Link");
define('OGP_LANG_auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Copy");
define('OGP_LANG_auto_update_copy_me_success', "Copied!");
define('OGP_LANG_auto_update_copy_me_fail', "Failed to copy. Please, manually copy the link.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Auto Update Link");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('OGP_LANG_cannot_update_from_own_self', "Local server update may not run on a Master server.");
define('OGP_LANG_show_server_id', "Show Server IDs");
define('OGP_LANG_hide_server_id', "Hide Server IDs");
define('OGP_LANG_edit_configuration_files', "Edit Configuration Files");
define('OGP_LANG_admin', "Admin");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "Seconds");
define('OGP_LANG_unknown_rsync_mirror', "You attempted to start an update from a mirror which doesn't exist.");
define('OGP_LANG_custom_fields', "Custom Fields");
?>
