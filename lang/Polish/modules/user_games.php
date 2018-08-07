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

define('OGP_LANG_add_mods_note', "Trzeba dodać mody po dodaniu serwera do użytkownika. Można to zrobić poprzez edycję serwera..");
define('OGP_LANG_game_servers', "Game Servers");
define('OGP_LANG_game_path', "Game Path");
define('OGP_LANG_game_path_info', "An absolute server path. Example: /home/ogpbot/OGP_User_Files/My_Server");
define('OGP_LANG_game_server_name_info', "Nazwa serwera ułatwia użytkownikom do jednoznacznej identyfikacji swoich serwerów.");
define('OGP_LANG_control_password', "Hasło Control");
define('OGP_LANG_control_password_info', "To hasło jest używane do kontroli serwera, takich jak hasła RCON. Jeśli hasło jest puste to w inny sposób są wykorzystywane.");
define('OGP_LANG_add_game_home', "Dodaj dom gry");
define('OGP_LANG_game_path_empty', "Gra ścieżka nie może być puste.");
define('OGP_LANG_game_home_added', "Strona główna Game pomyślnie dodana. Przekierowanie do domu edycji strony");
define('OGP_LANG_failed_to_add_home_to_db', "Nie można dodać do domu do bazy danych. Błąd: %s");
define('OGP_LANG_caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Caution!</b> The Agent is offline, can not get OS type and architecture,<br> Showing servers for all platforms:");
define('OGP_LANG_select_remote_server', "Select Remote Server");
define('OGP_LANG_no_remote_servers_configured', "No remote servers configured to the Open Game Panel.<br>You need to add remote servers before you can add servers for the users.");
define('OGP_LANG_no_game_configurations_found', "No game configuration found. You need to add game configurations from the");
define('OGP_LANG_game_configurations', ">game configuration page");
define('OGP_LANG_add_remote_server', "Add a server.");
define('OGP_LANG_wine_games', "Wine Games");
define('OGP_LANG_home_path', "główna ścieżka:");
define('OGP_LANG_change_home_info', "Położenie zainstalowanych serwerów. Przykład: / home / OGP / nazwa_hosta /");
define('OGP_LANG_game_server_name', "Nazwa serwera gry");
define('OGP_LANG_change_name_info', "nazwę serwera, aby pomóc użytkownikom, aby zidentyfikować go.");
define('OGP_LANG_game_control_password', "Hasło kontrola gry");
define('OGP_LANG_change_control_password_info', "Control jest hasło rcon password przykład.");
define('OGP_LANG_available_mods', "Dostępne mody");
define('OGP_LANG_note_no_mods', "Nr aktywny mod (y) dla tej gry. Musisz włączyć mod (y) przed użytkownicy mogą rozpocząć korzystanie z serwera.");
define('OGP_LANG_change_home', "Change Home");
define('OGP_LANG_change_control_password', "Zmień hasło kontrolne");
define('OGP_LANG_change_name', "Zmień nazwe");
define('OGP_LANG_add_mod', "Dodaj Mod");
define('OGP_LANG_set_ip', "Zmień IP");
define('OGP_LANG_ips_and_ports', "IPs i Ports");
define('OGP_LANG_mod_name', "Nazwa Mod ");
define('OGP_LANG_max_players', "Max Players");
define('OGP_LANG_extra_cmd_line_args', "Dodatkowe argumenty linii poleceń");
define('OGP_LANG_extra_cmd_line_info', "Dodatkowe argumenty wiersza poleceń to sposób, aby wprowadzić dodatkowe argumenty do polecenia gra, gdy jest uruchamiany.");
define('OGP_LANG_cpu_affinity', "Działa na Procesorze");
define('OGP_LANG_nice_level', "Nice Level");
define('OGP_LANG_set_options', "Zmień Ustawienia");
define('OGP_LANG_remove_mod', "Usuń Mod");
define('OGP_LANG_mods', "Mody");
define('OGP_LANG_ip', "IP");
define('OGP_LANG_port', "Port");
define('OGP_LANG_no_ip_ports_assigned', "Przynajmniej jeden IP: para Port musi być przypisany do domu.");
define('OGP_LANG_successfully_assigned_ip_port', "Pomyślnie przypisane IP: Port parę do domu.");
define('OGP_LANG_port_range_error', "Port musi być pomiędzy 0 a 65535 zakresie.");
define('OGP_LANG_failed_to_assing_mod_to_home', "Nie udało się przypisać mod z id %d do domu");
define('OGP_LANG_successfully_assigned_mod_to_home', "Prawidłowo ustawione mod z id %d do domu.");
define('OGP_LANG_successfully_modified_mod', "Pomyślnie zmodyfikowane informacje mod.");
define('OGP_LANG_back_to_game_monitor', "z powrotem do Game Monitor");
define('OGP_LANG_back_to_game_servers', "z powrotem do Game Servers");
define('OGP_LANG_user_id_main', "Główny właściciel");
define('OGP_LANG_change_user_id_main', "Zmiana głównego właściciela");
define('OGP_LANG_change_user_id_main_info', "Głównym właścicielem domu serwer.");
define('OGP_LANG_server_ftp_password', "FTP hasło");
define('OGP_LANG_change_ftp_password', "Zmień hasło FTP");
define('OGP_LANG_change_ftp_password_info', "To jest hasło do logowania do serwera FTP do tego domu.");
define('OGP_LANG_Delete_old_user_assigned_homes', "Cofanie serwer gry do obecnych użytkowników.");
define('OGP_LANG_editing_home_called', "Editing home called");
define('OGP_LANG_control_password_updated_successfully', "Control password updated successfully.");
define('OGP_LANG_control_password_update_failed', "Control password update failed");
define('OGP_LANG_successfully_changed_game_server', "Successfully changed game server.");
define('OGP_LANG_error_ocurred_on_remote_server', "Error ocurred on remote server,");
define('OGP_LANG_ftp_password_can_not_be_changed', "FTP password can not be changed.");
define('OGP_LANG_ftp_can_not_be_switched_on', "FTP can not be switched ON.");
define('OGP_LANG_ftp_can_not_be_switched_off', "FTP can not be switched OFF.");
define('OGP_LANG_invalid_home_id_entered', "Invalid home id entered.");
define('OGP_LANG_ip_port_already_in_use', "The %s:%s is already in use. Choose another one.");
define('OGP_LANG_successfully_assigned_ip_port_to_server_id', "Successfully assigned %s:%s to home with ID %s.");
define('OGP_LANG_no_ip_addresses_configured', "Your game server does not have any IP-addresses configured to it. You can configure them from ");
define('OGP_LANG_server_page', "server page");
define('OGP_LANG_successfully_removed_mod', "Successfully removed game mod.");
define('OGP_LANG_warning_agent_offline_defaulting_CPU_count_to_1', "Warning - Agent offline, defaulting CPU count to 1.");
define('OGP_LANG_mod_install_cmds', "Mod Install CMDs");
define('OGP_LANG_cmds_for', "Commands for");
define('OGP_LANG_preinstall_cmds', "Preinstall Commands");
define('OGP_LANG_postinstall_cmds', "Postinstall Commands");
define('OGP_LANG_edit_preinstall_cmds', "Edit Preinstall Commands");
define('OGP_LANG_edit_postinstall_cmds', "Edit Postinstall Commands");
define('OGP_LANG_save_as_default_for_this_mod', "Save as default for this mod");
define('OGP_LANG_empty', "empty");
define('OGP_LANG_master_server_for_clon_update', "Master server for local update");
define('OGP_LANG_set_as_master_server', "Set as master server");
define('OGP_LANG_set_as_master_server_for_local_clon_update', "Set as master server for local update.");
define('OGP_LANG_only_available_for', "Only available for '%s' hosted on the remote server named '%s'.");
define('OGP_LANG_ftp_on', "Enable FTP");
define('OGP_LANG_ftp_off', "Disable FTP");
define('OGP_LANG_change_ftp_account_status', "Change FTP account status");
define('OGP_LANG_change_ftp_account_status_info', "Once a FTP account is enabled or disabled, it is added or removed from the FTP's database.");
define('OGP_LANG_server_ftp_login', "Server FTP Login");
define('OGP_LANG_change_ftp_login_info', "Change the FTP Login with a customized one.");
define('OGP_LANG_change_ftp_login', "Change FTP Login");
define('OGP_LANG_ftp_login_can_not_be_changed', "Can not change FTP Login.");
define('OGP_LANG_server_is_running_change_addresses_not_available', "The server is actually running, the IP cannot be changed.");
define('OGP_LANG_change_game_type', "Change Game Type");
define('OGP_LANG_change_game_type_info', "By changing the game type the current the mods configuration will be deleted.");
define('OGP_LANG_force_mod_on_this_address', "Force mod on this address");
define('OGP_LANG_successfully_assigned_mod_to_address', "Successfully assigned mod to address");
define('OGP_LANG_switch_mods', "Switch mods");
define('OGP_LANG_switch_mod_for_address', "Switch mod for address %s");
define('OGP_LANG_invalid_path', "Invalid Path");
define('OGP_LANG_add_new_game_home', "Dodaj nowe gry");
define('OGP_LANG_no_game_homes_found', "Nie znaleziono gry");
define('OGP_LANG_available_game_homes', "Dostępne Gry");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_game_server', "Game Server");
define('OGP_LANG_game_type', "Game Type");
define('OGP_LANG_game_home', "Home Path");
define('OGP_LANG_game_home_name', "Game Server Name");
define('OGP_LANG_clone', "Sklonuj");
define('OGP_LANG_unassign', "Unassign");
define('OGP_LANG_access_rights', "Access Rights");
define('OGP_LANG_assigned_homes', "Currently Assigned Homes");
define('OGP_LANG_assign', "Assign");
define('OGP_LANG_allow_updates', "Allow Game Updates");
define('OGP_LANG_allow_updates_info', "Pozwala użytkownikowi na aktualizację instalacji gry jeżeli jest to możliwe.");
define('OGP_LANG_allow_file_management', "Allow File Management");
define('OGP_LANG_allow_file_management_info', "Pozwala użytkownikowi na dostęp do domu gry z modułów do zarządzania plikami.");
define('OGP_LANG_allow_parameter_usage', "Pozwól Użycie parametru");
define('OGP_LANG_allow_parameter_usage_info', "Pozwala użytkownikowi zmienić dostępne parametry wiersza polecenia.");
define('OGP_LANG_allow_extra_params', "Pozwól parametry Extra");
define('OGP_LANG_allow_extra_params_info', "Pozwala użytkownikowi na modyfikowanie dodatkowych parametrów linii poleceń.");
define('OGP_LANG_allow_ftp', "Dostęp FTP");
define('OGP_LANG_allow_ftp_info', "Pokaż dostęp do FTP dla użytkownika.");
define('OGP_LANG_allow_custom_fields', "Allow Custom Fields");
define('OGP_LANG_allow_custom_fields_info', "Allows user to access custom fields of the game server if any.");
define('OGP_LANG_select_home', "Strona główna wybrać, aby przypisać");
define('OGP_LANG_assign_new_home_to_user', "Przypisywanie do użytkownika Nowy Dom %s");
define('OGP_LANG_assign_new_home_to_group', "Przypisz do grupy New Home %s");
define('OGP_LANG_assigned_home_to_user', "Pomyślnie przydzielony do domu (ID: %d) do gracza %s.");
define('OGP_LANG_failed_to_assign_home_to_user', "Failed to assign home (ID: %d) to user %s.");
define('OGP_LANG_assigned_home_to_group', "Pomyślnie przydzielony do domu (ID: %d) do grupy %s.");
define('OGP_LANG_unassigned_home_from_user', "Pomyślnie przydzielony do domu (ID: %d) z graczem %s.");
define('OGP_LANG_unassigned_home_from_group', "Pomyślnie przydzielony do domu (ID: %d) z grupą %s.");
define('OGP_LANG_no_homes_assigned_to_user', "Nr mieszkania przeznaczone dla użytkownika %s.");
define('OGP_LANG_no_homes_assigned_to_group', "Nr mieszkania przeznaczone dla grupy %s.");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_user', "No more homes available that can be assigned for this user");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_group', "No more homes available that can be assigned for this group");
define('OGP_LANG_you_can_add_a_new_game_server_from', "You can add a new game server from %s.");
define('OGP_LANG_no_remote_servers_available_please_add_at_least_one', "There are no remote servers available, please add at least one!");
define('OGP_LANG_cloning_of_home_failed', "Cloning of home with id '%s' failed.");
define('OGP_LANG_no_mods_to_clone', "No enabled mod(s) for this game yet. None will be cloned.");
define('OGP_LANG_failed_to_add_mod', "Failed to add mod with id '%s' to home with id '%s'.");
define('OGP_LANG_failed_to_update_mod_settings', "Failed to update mod settings for home with id '%s'.");
define('OGP_LANG_successfully_cloned_mods', "Successfully cloned mods for home with id '%s'.");
define('OGP_LANG_successfully_copied_home_database', "Successfully copied home database.");
define('OGP_LANG_copying_home_remotely', "Copying the home on remote server from '%s' to '%s'.");
define('OGP_LANG_cloning_home', "Cloning home called '%s'");
define('OGP_LANG_current_home_path', "Current home path");
define('OGP_LANG_current_home_path_info', "The current location of the copied home on remote server.");
define('OGP_LANG_clone_home', "Clone Home");
define('OGP_LANG_new_home_name', "New Home Name");
define('OGP_LANG_new_home_path', "New Home Path");
define('OGP_LANG_agent_ip', "Agent IP");
define('OGP_LANG_game_server_copy_is_running', "Game server copy is running...");
define('OGP_LANG_game_server_copy_was_successful', "Game server copy was successful");
define('OGP_LANG_game_server_copy_failed_with_return_code', "Game server copy failed with return code %s");
define('OGP_LANG_clone_mods', "Clone Mods");
define('OGP_LANG_game_server_owner', "Game server owner");
define('OGP_LANG_the_name_of_the_server_to_help_users_to_identify_it', "The name of the server to help users to identify it.");
define('OGP_LANG_ips_and_ports_used_in_this_home', "IPs and Ports used in this home");
define('OGP_LANG_note_ips_and_ports_are_not_cloned', "Note - IPs and Ports are not cloned");
define('OGP_LANG_mods_and_settings_for_this_game_server', "Mods and settings for this game server");
define('OGP_LANG_sure_to_delete_serverid_from_remoteip_and_directory', "Are you sure you want to delete game server (ID: %s) from server %s and is in directory %s");
define('OGP_LANG_yes_and_delete_the_files', "Yes and Delete the files");
define('OGP_LANG_failed_to_remove_gamehome_from_database', "Failed to remove gamehome from database.");
define('OGP_LANG_successfully_deleted_game_server_with_id', "Successfully deleted game server with ID %s.");
define('OGP_LANG_failed_to_remove_ftp_account_from_remote_server', "Failed to remove FTP account from remote server.");
define('OGP_LANG_remove_it_anyway', "Would you like to remove it anyway?");
define('OGP_LANG_sucessfully_deleted', "Sucessfully deleted %s");
define('OGP_LANG_the_agent_had_a_problem_deleting', "The Agent had a problem while deleting %s. Please, check the Agent's log.");
define('OGP_LANG_connection_timeout_or_problems_reaching_the_agent', "Connection timeout or problems with reaching the Agent");
define('OGP_LANG_does_not_exist_yet', "Does not exist yet.");
define('OGP_LANG_update_settings', "Update settings");
define('OGP_LANG_settings_updated', "Settings updated.");
define('OGP_LANG_selected_path_already_in_use', "Wybrana ścieżka jest już w użyciu.");
define('OGP_LANG_browse', "Przeglądaj");
define('OGP_LANG_cancel', "Anuluj");
define('OGP_LANG_set_this_path', "Ustaw tę ścieżkę");
define('OGP_LANG_select_home_path', "Wybierz ścieżkę domową");
define('OGP_LANG_folder', "Folder");
define('OGP_LANG_owner', "Owner");
define('OGP_LANG_group', "Group");
define('OGP_LANG_level_up', "Do góry");
define('OGP_LANG_level_up_info', "Powrót do poprzedniego folderu.");
define('OGP_LANG_add_folder', "Dodaj Folder");
define('OGP_LANG_add_folder_info', "Wpisz nazwę nowego folderu, a następnie kliknij na ikonę.");
define('OGP_LANG_valid_user', "Please specify a valid user.");
define('OGP_LANG_valid_group', "Please specify a valid group.");
define('OGP_LANG_set_affinity', "Set Server Affinity");
define('OGP_LANG_cpu_affinity_info', "Select the CPU core(s) you want to assign to the game server.");
define('OGP_LANG_expiration_date_changed', "Expiration date for selected home has been changed.");
define('OGP_LANG_expiration_date_could_not_be_changed', "Expiration date for selected home could not be changed.");
define('OGP_LANG_search', "Search");
define('OGP_LANG_ftp_account_username_too_long', "FTP username is too long. Try a shorter username no longer than 20 characters.");
define('OGP_LANG_ftp_account_password_too_long', "FTP password is too long. Try a shorter password no longer than 20 characters.");
define('OGP_LANG_other_servers_exist_with_path_please_change', "Other homes exist with the same path. It is recommended (but not required) that you change this path to something unique. You may have problems if you do NOT.");
define('OGP_LANG_change_access_rights_for_selected_servers', "Change access rights for selected servers");
?>