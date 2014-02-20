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
$lang['add_new_game_home'] = "Játék szerver hozzáadása";
$lang['add_mods_note'] = "Hozzáadás után mod-ot is hozzá kell adni a szerverhez. Ez a szerver szerkesztésével lehetséges.";
$lang['game_server'] = "Játék szerver";
$lang['game_servers'] = "Game Servers";
$lang['game_type'] = "Játék típusa";
$lang['game_path'] = "Elérési útvonal";
$lang['game_path_info'] = "Teljes elérési út. Például: /home/ogp/szervered/";
$lang['game_server_name'] = "Játék szerver neve";
$lang['game_server_name_info'] = "Szerver neve segít megkülönböztetni a felhasználók szervereit.";
$lang['control_password'] = "Beállítási jelszó";
$lang['control_password_info'] = "Ezt a jelszót használhatod a szerver beállításához, úgy mint az RCON jelszót. Ha megadod ez lesz használva.";
$lang['add_game_home'] = "Játék szerver hozzáadása";
$lang['game_path_empty'] = "Játék szerver elérési út.";
$lang['game_home_added'] = "Játék szerver hozzáadás sikeres. Átirányítás a szerkesztés oldalra.";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Caution!</b> The Agent is offline, can not get OS type and architecture,<br> Showing servers for all platforms:";
$lang['select_remote_server'] = "Select Remote Server";

// edit_games.php
$lang['home_path'] = "Elérési útvonal";
$lang['change_home_info'] = "Az installált szerver elérési útvonala. Például: /home/ogp/szervered/";
$lang['game_server_name'] = "Játék szerver neve";
$lang['change_name_info'] = "A játék szerver neve segít megkülönböztetni a játékszervereket.";
$lang['game_control_password'] = "Szerver beállítási jelszó";
$lang['change_control_password_info'] = "Szerver beállítási jelszó, például az RCON jelszó.";
$lang['available_mods'] = "Elérheto modok";
$lang['note_no_mods'] = "Nincs engedélyezett mod ehhez a játék szerverhez jelenleg. Legalább egy modot engedélyezned kell, hogy a felhasználó el tudja indítani a szervert..";
$lang['change_home'] = "Útvonal megváltoztatása";
$lang['change_control_password'] = "Jelszó megváltoztatása";
$lang['change_name'] = "Név megváltoztatása";
$lang['add_mod'] = "Mod hozzáadása";
$lang['set_ip'] = "IP beállítása";
$lang['ips_and_ports'] = "IP-k és Portok";
$lang['mod_name'] = "Mod neve";
$lang['max_players'] = "Max játékos";
$lang['extra_cmd_line_args'] = "Extra parancssori paraméter";
$lang['extra_cmd_line_info'] = "Az extra parancssori paramétert megadva a szerver indulásakor megadhatsz extra paramétereket.";
$lang['cpu_affinity'] = "CPU-hoz társítás";
$lang['nice_level'] = "Nice Szint";
$lang['set_options'] = "Beállít";
$lang['remove_mod'] = "Mod eltávolítása";
$lang['mods'] = "Modok";
$lang['ip'] = "IP";
$lang['port'] = "Port";
$lang['no_ip_ports_assigned'] = "Legalább egy IP:Port párost hozzá kell csatolni a játék szerverhez.";
$lang['successfully_assigned_ip_port'] = "sikeresen hozzácsatoltad az IP:Port párt a játék szerverhez.";
$lang['port_range_error'] = "A portnak 0 és 65535 között kell lennie.";
$lang['failed_to_assing_mod_to_home'] = "Nem sikerült hozzáadni a modot %d azonosítóval a szerverhez.";
$lang['successfully_assigned_mod_to_home'] = "Mod sikeresen hozzárendelve %d azonosítóval a szerverhez.";
$lang['successfully_modified_mod'] = "Mod információk sikeresen módosítva.";
$lang['back_to_game_monitor'] = "Vissza a Game Monitor";
$lang['back_to_game_servers'] = "Vissza a Game Servers";
$lang['user_id_main'] = "Fo tulajdonosa";
$lang['change_user_id_main'] = "Változás fo tulajdonosa";
$lang['change_user_id_main_info'] = "Fo játék szerver tulajdonosa.";
$lang['server_ftp_password'] = "FTP jelszó";
$lang['change_ftp_password'] = "FTP jelszó";
$lang['change_ftp_password_info'] = "Ez az a jelszó, hogy belépni az FTP szerver a játék szerver.";
$lang['Delete_old_user_assigned_homes'] = "Távolítsa el a szerver az aktuális felhasználó";
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
$lang['add_new_game_home'] = "Játék szerver hozzáadása";
$lang['no_game_homes_found'] = "Nincs játék szerver";
$lang['available_game_homes'] = "Elérheto játék szerverek";
$lang['home_id'] = "Azonosító";
$lang['game_server'] = "Játék szerver";
$lang['game_type'] = "Játék típus";
$lang['game_home'] = "Játék helye";
$lang['game_home_name'] = "Játék szerver neve";
$lang['actions'] = "Muveletek";
$lang['edit'] = "Szerkesztés";
$lang['clone'] = "Klónozás";

// assign_games.php
$lang['unassign'] = "Eltávolít";
$lang['access_rights'] = "Hozzáférési jogok";
$lang['assigned_homes'] = "Társított játék szerverek";
$lang['assign'] = "Társítás";
$lang['allow_updates'] = "Frissítés engedélyezése";
$lang['allow_updates_info'] = "Engedélyezi a felhasználónak a játék szerver frissítését ha lehetséges.";
$lang['allow_file_management'] = "Fájl Menedzsment";
$lang['allow_file_management_info'] = "Engedélyezi a felhasználónak hogy hozzáférjen a játék szerver fájlaihoz a fájl menedzsment modulon keresztül.";
$lang['allow_parameter_usage'] = "Paraméter használat engedélyezése";
$lang['allow_parameter_usage_info'] = "Engedélyezi a felhasználónak, hogy megváltoztassa a parancssori paramétereket.";
$lang['allow_extra_params'] = "Extra paraméterek engedélyezése";
$lang['allow_extra_params_info'] = "Engedélyezi a felhasználónak, hogy módosítsa a parancssori paramétereket.";
$lang['allow_ftp'] = "Allow FTP";
$lang['allow_ftp_info'] = "Show the FTP access information to the user.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Válaszd ki a társítani kívánt szervert";
$lang['assign_new_home'] = "Új szerver társítása";
$lang['no_user_id'] = "Felhasználói azonosító nem volt megadva.";
$lang['assigned_home_to_user'] = "Sikeresen hozzáadott szerver (azonosító: %d) %s felhasználóhoz.";
$lang['unassigned_home_from_user'] = "Sikeresen eltávolítva a játék szerver (azonosító: %d) %s felhasználótól.";
$lang['no_homes_for_user'] = "Nincs játék szerver hozzáadva %s felhasználóhoz.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "No more homes available that can be assigned for this user";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "No more homes available that can be assigned for this group";
$lang['you_can_add_a_new_game_server_from'] = "You can add a new game server from ";
$lang[''] = "";
$lang[''] = "";
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
