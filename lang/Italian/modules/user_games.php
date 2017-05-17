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

define('add_mods_note', "You need to add mods after adding server to user. This can be done by editing the server.");
define('game_servers', "Game Servers");
define('game_path', "Game Path");
define('game_path_info', "An absolute server path. Example: /home/ogp/my_server/");
define('game_server_name_info', "Server name helps users to identify their servers.");
define('control_password', "Control password");
define('control_password_info', "This password is used for server control, such as RCON password. If the password is empty then other means are used.");
define('add_game_home', "Add game server");
define('game_path_empty', "Game path can not be empty.");
define('game_home_added', "Game server added successfully. Redirecting to home edit page.");
define('failed_to_add_home_to_db', "Failed to add home to database. Error: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Caution!</b> The Agent is offline, can not get OS type and architecture,<br> Showing servers for all platforms:");
define('select_remote_server', "Select Remote Server");
define('no_remote_servers_configured', "No remote servers configured to the Open Game Panel.<br>You need to add remote servers before you can add servers for the users.");
define('no_game_configurations_found', "No game configuration found. You need to add game configurations from the");
define('game_configurations', ">game configuration page");
define('add_remote_server', "Add a server.");
define('wine_games', "Wine Games");
define('home_path', "Home path");
define('change_home_info', "The location of the installed game server. Example: /home/ogp/my_server/");
define('game_server_name', "Game server name");
define('change_name_info', "The name of the server to help users to identify it.");
define('game_control_password', "Game control password");
define('change_control_password_info', "Control password is for example rcon password.");
define('available_mods', "Available mods");
define('note_no_mods', "No mod(s) available for this game.");
define('change_home', "Change Home");
define('change_control_password', "Change Control Password");
define('change_name', "Change Name");
define('add_mod', "Add Mod");
define('set_ip', "Set IP");
define('ips_and_ports', "IPs and Ports");
define('mod_name', "Mod Name");
define('max_players', "Max Players");
define('extra_cmd_line_args', "Extra Command Line Args");
define('extra_cmd_line_info', "The Extra command line args provides a way to enter extra arguments to the game command line when it is started.");
define('cpu_affinity', "CPU Affinity");
define('nice_level', "Nice Level");
define('set_options', "Set Options");
define('remove_mod', "Remove Mod");
define('mods', "Mods");
define('ip', "IP");
define('port', "Port");
define('no_ip_ports_assigned', "At least one IP:Port pair must be assigned to the home.");
define('successfully_assigned_ip_port', "Successfully assigned IP:Port pair to home.");
define('port_range_error', "Port needs to be between range 0 and 65535.");
define('failed_to_assing_mod_to_home', "Failed to assing mod with id %d to home.");
define('successfully_assigned_mod_to_home', "Successfully assigned mod with id %d to home.");
define('successfully_modified_mod', "Successfully modified mod information.");
define('back_to_game_monitor', "Back to Game Monitor");
define('back_to_game_servers', "Back to Game Servers");
define('user_id_main', "Main owner");
define('change_user_id_main', "Change main owner");
define('change_user_id_main_info', "The main server home owner.");
define('server_ftp_password', "FTP password");
define('change_ftp_password', "Change FTP password");
define('change_ftp_password_info', "This is the password to login to FTP server for this home.");
define('Delete_old_user_assigned_homes', "Unassign home to current users.");
define('editing_home_called', "Editing home called");
define('control_password_updated_successfully', "Control password updated successfully.");
define('control_password_update_failed', "Control password update failed");
define('successfully_changed_game_server', "Successfully changed game server.");
define('error_ocurred_on_remote_server', "Error ocurred on remote server,");
define('ftp_password_can_not_be_changed', "FTP password can not be changed.");
define('ftp_can_not_be_switched_on', "FTP can not be switched ON.");
define('ftp_can_not_be_switched_off', "FTP can not be switched OFF.");
define('invalid_home_id_entered', "Invalid home id entered.");
define('ip_port_already_in_use', "The %s:%s is already in use. Choose another one.");
define('successfully_assigned_ip_port_to_server_id', "Successfully assigned %s:%s to home with ID %s.");
define('no_ip_addresses_configured', "Your game server does not have any IP-addresses configured to it. You can configure them from ");
define('server_page', "server page");
define('successfully_removed_mod', "Successfully removed game mod.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Warning - Agent offline, defaulting CPU count to 1.");
define('mod_install_cmds', "Mod Install CMDs");
define('cmds_for', "Commands for");
define('preinstall_cmds', "Preinstall Commands");
define('postinstall_cmds', "Postinstall Commands");
define('edit_preinstall_cmds', "Edit Preinstall Commands");
define('edit_postinstall_cmds', "Edit Postinstall Commands");
define('save_as_default_for_this_mod', "Save as default for this mod");
define('empty', "empty");
define('master_server_for_clon_update', "Master server for local update");
define('set_as_master_server', "Set as master server");
define('set_as_master_server_for_local_clon_update', "Set as master server for local update.");
define('only_available_for', "Only available for '%s' hosted on the remote server named '%s'.");
define('ftp_on', "Enable FTP");
define('ftp_off', "Disable FTP");
define('change_ftp_account_status', "Change FTP account status");
define('change_ftp_account_status_info', "Once a FTP account is enabled or disabled, it is added or removed from the FTP's database.");
define('server_ftp_login', "Server FTP Login");
define('change_ftp_login_info', "Change the FTP Login with a customized one.");
define('change_ftp_login', "Change FTP Login");
define('ftp_login_can_not_be_changed', "Can not change FTP Login.");
define('server_is_running_change_addresses_not_available', "The server is actually running, the IP cannot be changed.");
define('change_game_type', "Change Game Type");
define('change_game_type_info', "By changing the game type the current the mods configuration will be deleted.");
define('force_mod_on_this_address', "Force mod on this address");
define('successfully_assigned_mod_to_address', "Successfully assigned mod to address");
define('switch_mods', "Switch mods");
define('switch_mod_for_address', "Switch mod for address %s");
define('invalid_path', "Invalid Path");
define('add_new_game_home', "Add new game server");
define('no_game_homes_found', "No game servers found");
define('available_game_homes', "Available game servers");
define('home_id', "Home ID");
define('game_server', "Game Server");
define('game_type', "Game Type");
define('game_home', "game server");
define('game_home_name', "game server Name");
define('clone', "Clone");
define('unassign', "Unassign");
define('access_rights', "Access Rights");
define('assigned_homes', "Currently Assigned Homes");
define('assign', "Assign");
define('allow_updates', "Allow Game Updates");
define('allow_updates_info', "Allows user to update the game installation if that is possible.");
define('allow_file_management', "File Management");
define('allow_file_management_info', "Allows user to access the game server with file management modules.");
define('allow_parameter_usage', "Allow Parameter Usage");
define('allow_parameter_usage_info', "Allows user to change available command line parameters.");
define('allow_extra_params', "Allow Extra parametrs");
define('allow_extra_params_info', "Allows user to modify extra command line parameters.");
define('allow_ftp', "Allow FTP");
define('allow_ftp_info', "Show the FTP access information to the user.");
define('allow_custom_fields', "Allow Custom Fields");
define('allow_custom_fields_info', "Allows user to access custom fields of the game server if any.");
define('select_home', "Select Home to Assign");
define('assign_new_home_to_user', "Assign New Home to user %s");
define('assign_new_home_to_group', "Assign New Home to group %s");
define('assigned_home_to_user', "Successfully assigned home (ID: %d) to user %s.");
define('assigned_home_to_group', "Successfully assigned home (ID: %d) to group %s.");
define('unassigned_home_from_user', "Successfully unassigned home (ID: %d) from user %s.");
define('unassigned_home_from_group', "Successfully unassigned home (ID: %d) from group %s.");
define('no_homes_assigned_to_user', "No homes assigned for user %s.");
define('no_homes_assigned_to_group', "No homes assigned for group %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "No more homes available that can be assigned for this user");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "No more homes available that can be assigned for this group");
define('you_can_add_a_new_game_server_from', "You can add a new game server from %s.");
define('no_remote_servers_available_please_add_at_least_one', "There are no remote servers available, please add at least one!");
define('cloning_of_home_failed', "Cloning of home with id '%s' failed.");
define('no_mods_to_clone', "No enabled mod(s) for this game yet. None will be cloned.");
define('failed_to_add_mod', "Failed to add mod with id '%s' to home with id '%s'.");
define('failed_to_update_mod_settings', "Failed to update mod settings for home with id '%s'.");
define('successfully_cloned_mods', "Successfully cloned mods for home with id '%s'.");
define('successfully_copied_home_database', "Successfully copied home database.");
define('copying_home_remotely', "Copying the home on remote server from '%s' to '%s'.");
define('cloning_home', "Cloning home called '%s'");
define('current_home_path', "Current home path");
define('current_home_path_info', "The current location of the copied home on remote server.");
define('clone_home', "Clone Home");
define('new_home_name', "New Home Name");
define('new_home_path', "New Home Path");
define('agent_ip', "Agent IP");
define('game_server_copy_is_running', "Game server copy is running...");
define('game_server_copy_was_successful', "Game server copy was successful");
define('game_server_copy_failed_with_return_code', "Game server copy failed with return code %s");
define('clone_mods', "Clone Mods");
define('game_server_owner', "Game server owner");
define('the_name_of_the_server_to_help_users_to_identify_it', "The name of the server to help users to identify it.");
define('ips_and_ports_used_in_this_home', "IPs and Ports used in this home");
define('note_ips_and_ports_are_not_cloned', "Note - IPs and Ports are not cloned");
define('mods_and_settings_for_this_game_server', "Mods and settings for this game server");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Are you sure you want to delete game server (ID: %s) from server %s and is in directory %s");
define('yes_and_delete_the_files', "Yes and Delete the files");
define('failed_to_remove_gamehome_from_database', "Failed to remove gamehome from database.");
define('successfully_deleted_game_server_with_id', "Successfully deleted game server with ID %s.");
define('failed_to_remove_ftp_account_from_remote_server', "Failed to remove FTP account from remote server.");
define('remove_it_anyway', "Would you like to remove it anyway?");
define('sucessfully_deleted', "Sucessfully deleted %s");
define('the_agent_had_a_problem_deleting', "The agent had a problem deleting %s, check the agent log");
define('connection_timeout_or_problems_reaching_the_agent', "Connection timeout or problems reaching the agent");
define('does_not_exist_yet', "Does not exist yet.");
define('go_to_custom_fields', "Go to Custom Fields");
define('back_to_edit_server', "Back to edit server");
define('update_settings', "Update settings");
define('settings_updated', "Settings updated.");
define('selected_path_already_in_use', "The selected path is already in use.");
define('browse', "Browse");
define('cancel', "Cancel");
define('set_this_path', "Set this path");
define('select_home_path', "Select home path");
define('folder', "Folder");
define('owner', "Owner");
define('group', "Group");
define('level_up', "Level up");
define('level_up_info', "Back to the previous folder.");
define('add_folder', "Add folder");
define('add_folder_info', "Write the name for the new folder, then click on the icon.");
define('valid_user', "Please specify a valid user.");
define('valid_group', "Please specify a valid group.");
define('set_affinity', "Set Server Affinity");
define('cpu_affinity_info', "Select the CPU core(s) you want to assign to the game server.");
?>
