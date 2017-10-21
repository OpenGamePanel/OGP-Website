<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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

define('add_mods_note', "Hozzáadás után mod-ot is hozzá kell adni a szerverhez. Ez a szerver szerkesztésével lehetséges.");
define('game_servers', "Játék szerverek");
define('game_path', "Játék útvonal");
define('game_path_info', "A szerver abszolút elérési útja. Példa: /home/ogpbot/OGP_User_Files/My_Server");
define('game_server_name_info', "Szerver neve segít a felhasználóknak beazonosítani a szervereiket.");
define('control_password', "Vezérlő jelszó");
define('control_password_info', "Ez a jelszó a szerver vezérléséhez használandó, mint például az RCON jelszó. Ha a jelszó üres, akkor más eszközöket használnak.");
define('add_game_home', "Játék szerver hozzáadása");
define('game_path_empty', "Játék elérési útja nem lehet üres.");
define('game_home_added', "A játékszerver sikeresen hozzáadva. Átirányítás a szerkesztési oldalra.");
define('failed_to_add_home_to_db', "Nem sikerült a szerver hozzáadása az adatbázisba. Hiba: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Vigyázat!</b> Az Agent nem elérhető, nem kapható meg az operációs rendszer típusa és architektúrája,<br> A szerverek bemutatása az összes platformhoz:");
define('select_remote_server', "Válassz távoli szervert");
define('no_remote_servers_configured', "Nincs távoli szerver az Open Game Panelhoz.<br>Adj hozzá távoli szervert mielőtt játékszervereket adnál a felhasználóknak.");
define('no_game_configurations_found', "Nem található játék konfiguráció. Hozzá kell adnod a játék konfigurációkat a");
define('game_configurations', ">játék konfigurációs oldal");
define('add_remote_server', "Szerver hozzáadása.");
define('wine_games', "Wine játékok");
define('home_path', "Szerver elérési útja");
define('change_home_info', "A telepített játék szerver elérési útvonala. Példa: /home/ogp/szerverem/");
define('game_server_name', "Játék szerver neve");
define('change_name_info', "A szerver neve ami segít a felhasználóknak az azonosításukban.");
define('game_control_password', "Játékvezérlő jelszó");
define('change_control_password_info', "Vezérlő jelszó, mint például az RCON jelszó.");
define('available_mods', "Elérhető modok");
define('note_no_mods', "Nincsenek elérhető mod(ok) ehhez a játékhoz.");
define('change_home', "Útvonal megváltoztatása");
define('change_control_password', "Vezérlő jelszó megváltoztatása");
define('change_name', "Név megváltoztatása");
define('add_mod', "Mod hozzáadása");
define('set_ip', "IP beállítása");
define('ips_and_ports', "IP-k és Portok");
define('mod_name', "Mod név");
define('max_players', "Max. játékos");
define('extra_cmd_line_args', "Extra parancssori paraméterek");
define('extra_cmd_line_info', "Az extra parancssori paramétert megadva a szerver indulásakor megadhatsz extra paramétereket.");
define('cpu_affinity', "CPU affinitás");
define('nice_level', "Nice Szint");
define('set_options', "Beállítások beállítása");
define('remove_mod', "Mod eltávolítása");
define('mods', "Modok");
define('ip', "IP");
define('port', "Port");
define('no_ip_ports_assigned', "Legalább egy IP:Port párost hozzá kell csatolni a játék szerverhez.");
define('successfully_assigned_ip_port', "sikeresen hozzácsatoltad az IP:Port párt a játék szerverhez.");
define('port_range_error', "A portnak 0 és 65535 között kell lennie.");
define('failed_to_assing_mod_to_home', "Nem sikerült hozzáadni a modot %d azonosítóval a szerverhez.");
define('successfully_assigned_mod_to_home', "Mod sikeresen hozzárendelve %d azonosítóval a szerverhez.");
define('successfully_modified_mod', "A mod információk sikeresen módosítva.");
define('back_to_game_monitor', "Vissza a Játékfigyelőbe");
define('back_to_game_servers', "Vissza a játék szerverekhez");
define('user_id_main', "Fő tulajdonos");
define('change_user_id_main', "Fő tulajdonos váltás");
define('change_user_id_main_info', "The main server home owner.");
define('server_ftp_password', "FTP jelszó");
define('change_ftp_password', "FTP jelszó megváltoztatása");
define('change_ftp_password_info', "Ez az a jelszó, hogy belépni az FTP szerver a játék szerver.");
define('Delete_old_user_assigned_homes', "Távolítsa el a szerver az aktuális felhasználó");
define('editing_home_called', "Editing home called");
define('control_password_updated_successfully', "A vezérlő jelszó sikeresen frissítve.");
define('control_password_update_failed', "A vezérlő jelszó frissítése sikertelen");
define('successfully_changed_game_server', "A játék szervert sikeresen megváltoztattuk.");
define('error_ocurred_on_remote_server', "Hiba történt a távoli szerveren,");
define('ftp_password_can_not_be_changed', "Az FTP jelszavát nem lehet megváltoztatni.");
define('ftp_can_not_be_switched_on', "Az FTPt lehet bekapcsolni.");
define('ftp_can_not_be_switched_off', "Az FTPt nem lehet kikapcsolni.");
define('invalid_home_id_entered', "Invalid home id entered.");
define('ip_port_already_in_use', "Az %s:%s már használatban van. Válassz másikat.");
define('successfully_assigned_ip_port_to_server_id', "Successfully assigned %s:%s to home with ID %s.");
define('no_ip_addresses_configured', "Your game server does not have any IP-addresses configured to it. You can configure them from ");
define('server_page', "szerver oldal");
define('successfully_removed_mod', "A játékmód sikeresen eltávolítva.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Figyelem - Az Agent nem elérhető, defaulting CPU count to 1.");
define('mod_install_cmds', "Mod telepítési parancsok");
define('cmds_for', "Parancsok a");
define('preinstall_cmds', "Előtelepítési parancsok");
define('postinstall_cmds', "Utótelepítési parancsok");
define('edit_preinstall_cmds', "Előtelepítési parancsok szerkesztése");
define('edit_postinstall_cmds', "Utótelepítési parancsok szerkesztése");
define('save_as_default_for_this_mod', "Mentés alapértelmezettnek ehhez a modhoz");
define('empty', "üres");
define('master_server_for_clon_update', "Mester szerver a helyi frissítéshez");
define('set_as_master_server', "Beállítás mester szerverként");
define('set_as_master_server_for_local_clon_update', "Beállítás mester szervernek a helyi frissítéshez.");
define('only_available_for', "Only available for '%s' hosted on the remote server named '%s'.");
define('ftp_on', "FTP engedélyezése");
define('ftp_off', "FTP letiltása");
define('change_ftp_account_status', "FTP fiók állapot negváltoztatása");
define('change_ftp_account_status_info', "Ha egy FTP fiók engedélyezve vagy tiltva van, akkor az hozzáadásra vagy eltávolításra kerül az FTP adatbázisából.");
define('server_ftp_login', "Szerver FTP bejelentkezés");
define('change_ftp_login_info', "Az FTP bejelentkezés megváltoztatása egy személyre szabottra.");
define('change_ftp_login', "FTP bejelentkezés megváltoztatása");
define('ftp_login_can_not_be_changed', "Nem lehet megváltoztatni az FTP bejelentkezést.");
define('server_is_running_change_addresses_not_available', "A szerver jelenleg fut, az IPt nem lehet megváltoztatni.");
define('change_game_type', "Játék típusának megváltoztatása");
define('change_game_type_info', "A játék típus megváltoztatásával a jelenlegi modok konfigurációja törlésre kerül.");
define('force_mod_on_this_address', "Mód kényszerítése ezen a címen");
define('successfully_assigned_mod_to_address', "A mod sikeresen hozzárendelve a címhez");
define('switch_mods', "Módok váltása");
define('switch_mod_for_address', "Mód váltása a(z) %s címhez");
define('invalid_path', "Érvénytelen útvonal");
define('add_new_game_home', "Új játék szerver hozzáadása");
define('no_game_homes_found', "Nem találhatóak játék szerverek");
define('available_game_homes', "Elérhető játék szerverek");
define('home_id', "Azonosító");
define('game_server', "Játék szerver");
define('game_type', "Játék típus");
define('game_home', "Szerver elérési útja");
define('game_home_name', "Játék szerver neve");
define('clone', "Klónozás");
define('unassign', "Eltávolítás");
define('access_rights', "Hozzáférési jogok");
define('assigned_homes', "Társított játék szerverek");
define('assign', "Hozzárendelés");
define('allow_updates', "Játék frissítés engedélyezése");
define('allow_updates_info', "Engedélyezi a felhasználónak, hogy frissítse a játék telepítését, ha az lehetséges.");
define('allow_file_management', "Fájlkezelés engedélyezése");
define('allow_file_management_info', "Engedélyezi a felhasználónak, hogy hozzáférjen a játék szerverhez a fájlkezelő modullal.");
define('allow_parameter_usage', "Paraméter használat engedélyezése");
define('allow_parameter_usage_info', "Engedélyezi a felhasználónak, hogy megváltoztathassa az elérhető parancssori paramétereket.");
define('allow_extra_params', "Extra paraméterek engedélyezése");
define('allow_extra_params_info', "Engedélyezi a felhasználónak, hogy módosítsa az extra parancssori paramétereket.");
define('allow_ftp', "FTP engedélyezése");
define('allow_ftp_info', "Mutasd az FTP hozzáférési információkat a felhasználónak.");
define('allow_custom_fields', "Egyéni mezők engedélyezése");
define('allow_custom_fields_info', "Engedélyezi a felhasználónak, hogy hozzáférjen a játék szerver egyedi mezőihez, ha van ilyen.");
define('select_home', "Válaszd ki a társítani kívánt szervert");
define('assign_new_home_to_user', "Assign New Home to user %s");
define('assign_new_home_to_group', "Assign New Home to group %s");
define('assigned_home_to_user', "Sikeresen hozzáadott szerver (azonosító: %d) %s felhasználóhoz.");
define('assigned_home_to_group', "Successfully assigned home (ID: %d) to group %s.");
define('unassigned_home_from_user', "Sikeresen eltávolítva a játék szerver (azonosító: %d) %s felhasználótól.");
define('unassigned_home_from_group', "Successfully unassigned home (ID: %d) from group %s.");
define('no_homes_assigned_to_user', "No homes assigned for user %s.");
define('no_homes_assigned_to_group', "No homes assigned for group %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "No more homes available that can be assigned for this user");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "No more homes available that can be assigned for this group");
define('you_can_add_a_new_game_server_from', "Új játék szervert a %s-ban tudsz hozzáadni.");
define('no_remote_servers_available_please_add_at_least_one', "Nincsenek elérhető távoli szerverek, kérlek, adj meg legalább egyet!");
define('cloning_of_home_failed', "Cloning of home with id '%s' failed.");
define('no_mods_to_clone', "Nincsen mód engedélyezve ehhez a játék szerverhez még. Semmi se lesz klónozva.");
define('failed_to_add_mod', "Failed to add mod with id '%s' to home with id '%s'.");
define('failed_to_update_mod_settings', "Failed to update mod settings for home with id '%s'.");
define('successfully_cloned_mods', "Successfully cloned mods for home with id '%s'.");
define('successfully_copied_home_database', "Successfully copied home database.");
define('copying_home_remotely', "Copying the home on remote server from '%s' to '%s'.");
define('cloning_home', "Cloning home called '%s'");
define('current_home_path', "Az aktuális szerver elérési útja");
define('current_home_path_info', "The current location of the copied home on remote server.");
define('clone_home', "Szerver klónozása");
define('new_home_name', "Új szerver név");
define('new_home_path', "Új elérési útja a szervernek");
define('agent_ip', "Agent IP");
define('game_server_copy_is_running', "A játék szerver másolás folyamatban...");
define('game_server_copy_was_successful', "A játék szerver sikeresen átmásolva");
define('game_server_copy_failed_with_return_code', "Játékszerver másolása sikertelen a(z) %s visszatérési kóddal.");
define('clone_mods', "Modok klónozása");
define('game_server_owner', "Játékszerver tulajdonos");
define('the_name_of_the_server_to_help_users_to_identify_it', "A szerver neve segít a felhasználóknak a szerver azonosításában.");
define('ips_and_ports_used_in_this_home', "Az IP-k és portok ehhez a szerverhez használva");
define('note_ips_and_ports_are_not_cloned', "Megjegyzés - az IPk és a portok nincsenek klónozva");
define('mods_and_settings_for_this_game_server', "Modok és beállítások ehhez a játékszerverhez");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Biztosan törölni akarod a játékszervert (ID: %s) a(z) %s szerverről és a(z) %s mappából.");
define('yes_and_delete_the_files', "Igen és töröld a fájlokat");
define('failed_to_remove_gamehome_from_database', "Failed to remove gamehome from database.");
define('successfully_deleted_game_server_with_id', "Sikeresen törölt játékkiszolgáló %s IDvel.");
define('failed_to_remove_ftp_account_from_remote_server', "Nem sikerült eltávolítani az FTP fiókot a távoli szerverről.");
define('remove_it_anyway', "Szeretnéd ezt egyébként eltávolítani?");
define('sucessfully_deleted', "A(z) %s sikeresen törölve.");
define('the_agent_had_a_problem_deleting', "Az Agentnek problémája volt a(z) %s törlése közben. Kérlek, ellenőrizd az Agent naplóját.");
define('connection_timeout_or_problems_reaching_the_agent', "Kapcsolat időtúllépés vagy problémák az Agent elérésével");
define('does_not_exist_yet', "Még nem létezik.");
define('go_to_custom_fields', "Tovább az egyéni mezőkhöz");
define('back_to_edit_server', "Vissza a szerver szerkesztéshez");
define('update_settings', "Beállítások frissítése");
define('settings_updated', "Beállítások frissítve.");
define('selected_path_already_in_use', "A kiválasztott útvonal már használatban van.");
define('browse', "Tallózás");
define('cancel', "Mégse");
define('set_this_path', "Állítsd be ezt az útvonalat");
define('select_home_path', "Szerver elérési útjának a kiválasztása");
define('folder', "Mappa");
define('owner', "Tulajdonos");
define('group', "Csoport");
define('level_up', "Szintlépés");
define('level_up_info', "Vissza az előző mappához.");
define('add_folder', "Mappa hozzáadása");
define('add_folder_info', "Írd le a nevét az új mappának, majd kattints az ikonra.");
define('valid_user', "Kérlek, határozz meg egy érvényes felhasználót.");
define('valid_group', "Kérlek, határozz meg egy érvényes csoportot.");
define('set_affinity', "Szerver affinitás beállítása");
define('cpu_affinity_info', "Válaszd ki a játékszerverhez hozzárendelni kívánt CPU magot(magokat).");
define('expiration_date_changed', "Expiration date for selected home has been changed.");
define('expiration_date_could_not_be_changed', "Expiration date for selected home could not be changed.");
define('search', "Keresés");
?>