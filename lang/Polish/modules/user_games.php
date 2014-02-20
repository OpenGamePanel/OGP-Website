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
$lang['add_new_game_home'] = "Dodaj nowe gry";
$lang['add_mods_note'] = "Trzeba dodać mody po dodaniu serwera do użytkownika. Można to zrobić poprzez edycję serwera..";
$lang['game_server'] = "Game Server";
$lang['game_servers'] = "Game Servers";
$lang['game_type'] = "Game Type";
$lang['game_path'] = "Game Path";
$lang['game_path_info'] = "Ścieżka bezwzględna serwera. Przykład: / home / OGP / nazwa_hosta /";
$lang['game_server_name'] = "Nazwa serwera gry";
$lang['game_server_name_info'] = "Nazwa serwera ułatwia użytkownikom do jednoznacznej identyfikacji swoich serwerów.";
$lang['control_password'] = "Hasło Control";
$lang['control_password_info'] = "To hasło jest używane do kontroli serwera, takich jak hasła RCON. Jeśli hasło jest puste to w inny sposób są wykorzystywane.";
$lang['add_game_home'] = "Dodaj dom gry";
$lang['game_path_empty'] = "Gra ścieżka nie może być puste.";
$lang['game_home_added'] = "Strona główna Game pomyślnie dodana. Przekierowanie do domu edycji strony";
$lang['failed_to_add_home_to_db'] = "Nie można dodać do domu do bazy danych. Błąd: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Caution!</b> The Agent is offline, can not get OS type and architecture,<br> Showing servers for all platforms:";
$lang['select_remote_server'] = "Select Remote Server";

// edit_games.php
$lang['home_path'] = "główna ścieżka:";
$lang['change_home_info'] = "Położenie zainstalowanych serwerów. Przykład: / home / OGP / nazwa_hosta /";
$lang['game_server_name'] = "Nazwa serwera gry";
$lang['change_name_info'] = "nazwę serwera, aby pomóc użytkownikom, aby zidentyfikować go.";
$lang['game_control_password'] = "Hasło kontrola gry";
$lang['change_control_password_info'] = "Control jest hasło rcon password przykład.";
$lang['available_mods'] = "Dostępne mody";
$lang['note_no_mods'] = "Nr aktywny mod (y) dla tej gry. Musisz włączyć mod (y) przed użytkownicy mogą rozpocząć korzystanie z serwera.";
$lang['change_home'] = "Change Home";
$lang['change_control_password'] = "Zmień hasło kontrolne";
$lang['change_name'] = "Zmień nazwe";
$lang['add_mod'] = "Dodaj Mod";
$lang['set_ip'] = "Zmień IP";
$lang['ips_and_ports'] = "IPs i Ports";
$lang['mod_name'] = "Nazwa Mod ";
$lang['max_players'] = "Max Players";
$lang['extra_cmd_line_args'] = "Dodatkowe argumenty linii poleceń";
$lang['extra_cmd_line_info'] = "Dodatkowe argumenty wiersza poleceń to sposób, aby wprowadzić dodatkowe argumenty do polecenia gra, gdy jest uruchamiany.";
$lang['cpu_affinity'] = "Działa na Procesorze";
$lang['nice_level'] = "Nice Level";
$lang['set_options'] = "Zmień Ustawienia";
$lang['remove_mod'] = "Usuń Mod";
$lang['mods'] = "Mody";
$lang['ip'] = "IP";
$lang['port'] = "Port";
$lang['no_ip_ports_assigned'] = "Przynajmniej jeden IP: para Port musi być przypisany do domu.";
$lang['successfully_assigned_ip_port'] = "Pomyślnie przypisane IP: Port parę do domu.";
$lang['port_range_error'] = "Port musi być pomiędzy 0 a 65535 zakresie.";
$lang['failed_to_assing_mod_to_home'] = "Nie udało się przypisać mod z id %d do domu";;
$lang['successfully_assigned_mod_to_home'] = "Prawidłowo ustawione mod z id %d do domu.";
$lang['successfully_modified_mod'] = "Pomyślnie zmodyfikowane informacje mod.";
$lang['back_to_game_monitor'] = "z powrotem do Game Monitor";
$lang['back_to_game_servers'] = "z powrotem do Game Servers";
$lang['user_id_main'] = "Główny właściciel";
$lang['change_user_id_main'] = "Zmiana głównego właściciela";
$lang['change_user_id_main_info'] = "Głównym właścicielem domu serwer.";
$lang['server_ftp_password'] = "FTP hasło";
$lang['change_ftp_password'] = "Zmień hasło FTP";
$lang['change_ftp_password_info'] = "To jest hasło do logowania do serwera FTP do tego domu.";
$lang['Delete_old_user_assigned_homes'] = "Cofanie serwer gry do obecnych użytkowników.";
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
$lang['add_new_game_home'] = "Dodaj nową gre";
$lang['no_game_homes_found'] = "Nie znaleziono gry";
$lang['available_game_homes'] = "Dostępne Gry";
$lang['home_id'] = "Home ID";
$lang['game_server'] = "serwer gry";
$lang['game_type'] = "typ gry";
$lang['game_home'] = "sciezka gry";
$lang['game_home_name'] = "Game server Name";
$lang['actions'] = "Actions";
$lang['edit'] = "edycja";
$lang['clone'] = "skopiuj";

// assign_games.php
$lang['unassign'] = "Unassign";
$lang['access_rights'] = "Access Rights";
$lang['assigned_homes'] = "Currently Assigned Homes";
$lang['assign'] = "Assign";
$lang['allow_updates'] = "Allow Game Updates";
$lang['allow_updates_info'] = "Pozwala użytkownikowi na aktualizację instalacji gry jeżeli jest to możliwe.";
$lang['allow_file_management'] = "File Management";
$lang['allow_file_management_info'] = "Pozwala użytkownikowi na dostęp do domu gry z modułów do zarządzania plikami.";
$lang['allow_parameter_usage'] = "Pozwól Użycie parametru";
$lang['allow_parameter_usage_info'] = "Pozwala użytkownikowi zmienić dostępne parametry wiersza polecenia.";
$lang['allow_extra_params'] = "Pozwól parametry Extra";
$lang['allow_extra_params_info'] = "Pozwala użytkownikowi na modyfikowanie dodatkowych parametrów linii poleceń.";
$lang['allow_ftp'] = "Allow FTP";
$lang['allow_ftp_info'] = "Show the FTP access information to the user.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Strona główna wybrać, aby przypisać";
$lang['assign_new_home_to_user'] = "Przypisywanie do użytkownika Nowy Dom %s";
$lang['assign_new_home_to_group'] = "Przypisz do grupy New Home %s";
$lang['assigned_home_to_user'] = "Pomyślnie przydzielony do domu (ID: %d) do gracza %s.";
$lang['assigned_home_to_group'] = "Pomyślnie przydzielony do domu (ID: %d) do grupy %s.";
$lang['unassigned_home_from_user'] = "Pomyślnie przydzielony do domu (ID: %d) z graczem %s.";
$lang['unassigned_home_from_group'] = "Pomyślnie przydzielony do domu (ID: %d) z grupą %s.";
$lang['no_homes_assigned_to_user'] = "Nr mieszkania przeznaczone dla użytkownika %s.";
$lang['no_homes_assigned_to_group'] = "Nr mieszkania przeznaczone dla grupy %s.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "No more homes available that can be assigned for this user";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "No more homes available that can be assigned for this group";
$lang['you_can_add_a_new_game_server_from'] = "You can add a new game server from ";
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
