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

// add_game_home.php
$lang['add_new_game_home'] = "Add New Game server";
$lang['add_mods_note'] = "You need to add mods after adding server to user. This can be done by editing the server.";
$lang['game_server'] = "Game Server";
$lang['game_servers'] = "Game Servers";
$lang['game_type'] = "Game Type";
$lang['game_path'] = "Game Path";
$lang['game_path_info'] = "An absolute server path. Example: /home/ogp/my_server/";
$lang['game_server_name'] = "Game server name";
$lang['game_server_name_info'] = "Server name helps users to indentify their servers.";
$lang['control_password'] = "Control password";
$lang['control_password_info'] = "This password is used for server control, such as RCON password. If the password is empty then other means are used.";
$lang['add_game_home'] = "Add game server";
$lang['game_path_empty'] = "Game path can not be empty.";
$lang['game_home_added'] = "Game server added successfully. Redirecting to home edit page.";
$lang['failed_to_add_home_to_db'] = "Failed to add home to database. Error: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Caution!</b> The Agent is offline, can not get OS type and architecture,<br> Showing servers for all platforms:";
$lang['select_remote_server'] = "Select Remote Server";
$lang['no_remote_servers_configured'] = "No remote servers configured to the Open Game Panel.<br>You need to add remote servers before you can add servers for the users.";
$lang['no_game_configurations_found'] = "No game configuration found. You need to add game configurations from the";
$lang['game_configurations'] = ">game configuration page";
$lang['add_remote_server'] = "Add a server.";
$lang['wine_games'] = "Wine Games";
$lang[''] = "";
$lang[''] = "";

// edit_games.php
$lang['home_path'] = "Home path";
$lang['change_home_info'] = "The location of the installed game server. Example: /home/ogp/my_server/";
$lang['game_server_name'] = "Game server name";
$lang['change_name_info'] = "The name of the server to help users to identify it.";
$lang['game_control_password'] = "Game control password";
$lang['change_control_password_info'] = "Control password is for example rcon password.";
$lang['available_mods'] = "Available mods";
$lang['note_no_mods'] = "No mod(s) available for this game.";
$lang['change_home'] = "Change Home";
$lang['change_control_password'] = "Change Control Password";
$lang['change_name'] = "Change Name";
$lang['add_mod'] = "Add Mod";
$lang['set_ip'] = "Set IP";
$lang['ips_and_ports'] = "IPs and Ports";
$lang['mod_name'] = "Mod Name";
$lang['max_players'] = "Max Players";
$lang['extra_cmd_line_args'] = "Extra Command Line Args";
$lang['extra_cmd_line_info'] = "The Extra command line args provides a way to enter extra arguments to the game command line when it is started.";
$lang['cpu_affinity'] = "CPU Affinity";
$lang['nice_level'] = "Nice Level";
$lang['set_options'] = "Set Options";
$lang['remove_mod'] = "Remove Mod";
$lang['mods'] = "Mods";
$lang['ip'] = "IP";
$lang['port'] = "Port";
$lang['no_ip_ports_assigned'] = "At least one IP:Port pair must be assigned to the home.";
$lang['successfully_assigned_ip_port'] = "Successfully assigned IP:Port pair to home.";
$lang['port_range_error'] = "Port needs to be between range 0 and 65535.";
$lang['failed_to_assing_mod_to_home'] = "Failed to assing mod with id %d to home.";
$lang['successfully_assigned_mod_to_home'] = "Successfully assigned mod with id %d to home.";
$lang['successfully_modified_mod'] = "Successfully modified mod information.";
$lang['back_to_game_monitor'] = "Back to Game Monitor";
$lang['back_to_game_servers'] = "Back to Game Servers";
$lang['user_id_main'] = "Main owner";
$lang['change_user_id_main'] = "Change main owner";
$lang['change_user_id_main_info'] = "The main server home owner.";
$lang['server_ftp_password'] = "FTP password";
$lang['change_ftp_password'] = "Change FTP password";
$lang['change_ftp_password_info'] = "This is the password to login to FTP server for this home.";
$lang['Delete_old_user_assigned_homes'] = "Unassign home to current users.";
$lang['editing_home_called'] = "Editing home called";
$lang['control_password_updated_successfully'] = "Control password updated successfully.";
$lang['control_password_update_failed'] = "Control password update failed";
$lang['successfully_changed_game_server'] = "Successfully changed game server.";
$lang['error_ocurred_on_remote_server'] = "Error ocurred on remote server,";
$lang['ftp_password_can_not_be_changed'] = "FTP password can not be changed.";
$lang['ftp_can_not_be_switched_on'] = "FTP can not be switched ON.";
$lang['ftp_can_not_be_switched_off'] = "FTP can not be switched OFF.";
$lang['invalid_home_id_entered'] = "Invalid home id entered.";
$lang['ip_port_already_in_use'] = "The %s:%s is already in use. Choose another one.";
$lang['successfully_assigned_ip_port_to_server_id'] = "Successfully assigned %s:%s to home with ID %s.";
$lang['no_ip_addresses_configured'] = "Your game server does not have any IP-addresses configured to it. You can configure them from ";
$lang['server_page'] = "server page";
$lang['successfully_removed_mod'] = "Successfully removed game mod.";
$lang['warning_agent_offline_defaulting_CPU_count_to_1'] = "Warning - Agent offline, defaulting CPU count to 1.";
$lang['mod_install_cmds'] = "Mod Install CMDs";
$lang['cmds_for'] = "Commands for";
$lang['preinstall_cmds'] = "Preinstall Commands";
$lang['postinstall_cmds'] = "Postinstall Commands";
$lang['edit_preinstall_cmds'] = "Edit Preinstall Commands";
$lang['edit_postinstall_cmds'] = "Edit Postinstall Commands";
$lang['save_as_default_for_this_mod'] = "Save as default for this mod";
$lang['empty'] = "empty";
$lang['master_server_for_clon_update'] = "Master server for local update";
$lang['set_as_master_server'] = "Set as master server";
$lang['set_as_master_server_for_local_clon_update'] = "Set as master server for local update.";
$lang['only_available_for'] = "Only available for '%s' hosted on the remote server named '%s'.";
$lang['ftp_on'] = "Enable FTP";
$lang['ftp_off'] = "Disable FTP";
$lang['change_ftp_account_status'] = "Change FTP account status";
$lang['change_ftp_account_status_info'] = "Once a FTP account is enbled or disabled, it is added or removed from the PureFTPd's DataBase.";
$lang['server_ftp_login'] = "Server FTP Login";
$lang['change_ftp_login_info'] = "Change the FTP Login with a customized one.";
$lang['change_ftp_login'] = "Change FTP Login";
$lang['ftp_login_can_not_be_changed'] = "Can not change FTP Login.";
$lang['server_is_running_change_addresses_not_available'] = "The server is actually running, the IP cannot be changed.";
$lang['change_game_type'] = "Change Game Type";
$lang['change_game_type_info'] = "By changing the game type the current the mods configuration will be deleted.";
$lang['force_mod_on_this_address'] = "Force mod on this address";
$lang['successfully_assigned_mod_to_address'] = "Successfully assigned mod to address";
$lang['switch_mods'] = "Switch mods";
$lang['switch_mod_for_address'] = "Switch mod for address %s";
$lang[''] = "";

// show_games.php
$lang['add_new_game_home'] = "Add new game server";
$lang['no_game_homes_found'] = "No game servers found";
$lang['available_game_homes'] = "Available game servers";
$lang['home_id'] = "Home ID";
$lang['game_server'] = "Game Server";
$lang['game_type'] = "Game Type";
$lang['game_home'] = "game server";
$lang['game_home_name'] = "game server Name";
$lang['actions'] = "Actions";
$lang['edit'] = "Edit";
$lang['clone'] = "Clone";

// assign_games.php
$lang['unassign'] = "Unassign";
$lang['access_rights'] = "Access Rights";
$lang['assigned_homes'] = "Currently Assigned Homes";
$lang['assign'] = "Assign";
$lang['allow_updates'] = "Allow Game Updates";
$lang['allow_updates_info'] = "Allows user to update the game installation if that is possible.";
$lang['allow_file_management'] = "File Management";
$lang['allow_file_management_info'] = "Allows user to access the game server with file management modules.";
$lang['allow_parameter_usage'] = "Allow Parameter Usage";
$lang['allow_parameter_usage_info'] = "Allows user to change available command line parameters.";
$lang['allow_extra_params'] = "Allow Extra parametrs";
$lang['allow_extra_params_info'] = "Allows user to modify extra command line parameters.";
$lang['allow_ftp'] = "Allow FTP";
$lang['allow_ftp_info'] = "Show the FTP access information to the user.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Select Home to Assign";
$lang['assign_new_home_to_user'] = "Assign New Home to user %s";
$lang['assign_new_home_to_group'] = "Assign New Home to group %s";
$lang['assigned_home_to_user'] = "Successfully assigned home (ID: %d) to user %s.";
$lang['assigned_home_to_group'] = "Successfully assigned home (ID: %d) to group %s.";
$lang['unassigned_home_from_user'] = "Successfully unassigned home (ID: %d) from user %s.";
$lang['unassigned_home_from_group'] = "Successfully unassigned home (ID: %d) from group %s.";
$lang['no_homes_assigned_to_user'] = "No homes assigned for user %s.";
$lang['no_homes_assigned_to_group'] = "No homes assigned for group %s.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "No more homes available that can be assigned for this user";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "No more homes available that can be assigned for this group";
$lang['you_can_add_a_new_game_server_from'] = "You can add a new game server from %s.";
$lang['no_remote_servers_available_please_add_at_least_one'] = "There are no remote servers available, please add at least one!";
$lang[''] = "";
$lang[''] = "";


// clone_home.php
$lang['cloning_of_home_failed'] = "Cloning of home with id '%s' failed.";
$lang['no_mods_to_clone'] = "No enabled mod(s) for this game yet. None will be cloned.";
$lang['failed_to_add_mod'] = "Failed to add mod with id '%s' to home with id '%s'.";
$lang['failed_to_update_mod_settings'] = "Failed to update mod settings for home with id '%s'.";
$lang['successfully_cloned_mods'] = "Successfully cloned mods for home with id '%s'.";
$lang['successfully_copied_home_database'] = "Successfully copied home database.";
$lang['copying_home_remotely'] = "Copying the home on remote server from '%s' to '%s'.";
$lang['cloning_home'] = "Cloning home called '%s'";
$lang['current_home_path'] = "Current home path";
$lang['current_home_path_info'] = "The current location of the copied home on remote server.";
$lang['clone_home'] = "Clone Home";
$lang['new_home_name'] = "New Home Name";
$lang['new_home_path'] = "New Home Path";
$lang['agent_ip'] = "Agent IP";
$lang['game_server_copy_is_running'] = "Game server copy is running...";
$lang['game_server_copy_was_successful'] = "Game server copy was successful";
$lang['game_server_copy_failed_with_return_code'] = "Game server copy failed with return code %s";
$lang['clone_mods'] = "Clone Mods";
$lang['game_server_owner'] = "Game server owner";
$lang['the_name_of_the_server_to_help_users_to_identify_it'] = "The name of the server to help users to identify it.";
$lang['ips_and_ports_used_in_this_home'] = "IPs and Ports used in this home";
$lang['note_ips_and_ports_are_not_cloned'] = "Note - IPs and Ports are not cloned";
$lang['mods_and_settings_for_this_game_server'] = "Mods and settings for this game server";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// del_home.php
$lang['sure_to_delete_serverid_from_remoteip_and_directory'] = "Are you sure you want to delete game server (ID: %s) from server %s and is in directory %s";
$lang['yes_and_delete_the_files'] = "Yes and Delete the files";
$lang['failed_to_remove_gamehome_from_database'] = "Failed to remove gamehome from database.";
$lang['successfully_deleted_game_server_with_id'] = "Successfully deleted game server with ID %s.";
$lang['failed_to_remove_ftp_account_from_remote_server'] = "Failed to remove FTP account from remote server.";
$lang['remove_it_anyway'] = "Would you like to remove it anyway?";
$lang['sucessfully_deleted'] = "Sucessfully deleted %s";
$lang['the_agent_had_a_problem_deleting'] = "The agent had a problem deleting %s, check the agent log";
$lang['connection_timeout_or_problems_reaching_the_agent'] = "Connection timeout or problems reaching the agent";
$lang[''] = "";
$lang[''] = "";

// get_size.php
$lang['does_not_exist_yet'] = "Does not exist yet.";

// Custom fields
$lang['go_to_custom_fields'] = "Go to Custom Fields";
$lang['back_to_edit_server'] = "Back to edit server";
$lang['update_settings'] = "Update settings";
$lang['settings_updated'] = "Settings updated.";
?>
