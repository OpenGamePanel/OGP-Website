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

define('add_mods_note', "Du er nødtil at tilføje mods efter en server er tildelt en bruger. Dette ka gøres, ved at redigere serveren.");
define('game_servers', "Spil Servere");
define('game_path', "Spil Sti");
define('game_path_info', "An absolute server path. Example: /home/ogpbot/OGP_User_Files/My_Server");
define('game_server_name_info', "Server navn hjælper brugere til at genkende deres servere.");
define('control_password', "Kontrol kodeord");
define('control_password_info', "Denne adgangskode bliver brugt til server kontrol, så som RCON kodeord. Hvis feltet hvor adgangskoden er tom, er der andre muligheder.");
define('add_game_home', "Tilføj spil server");
define('game_path_empty', "Spil sti, må ikke stå tom.");
define('game_home_added', "Spil serveer tilføjet successfuldt. Omadressere til hjem redigerings side.");
define('failed_to_add_home_to_db', "Fejlet i, at tilføje hjem til databasen. Fejl: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Advarsel!</b> Agenten er offline, kan ikke få OS type og arkitektur,<br> Viser servere fra alle platforme:");
define('select_remote_server', "Vælg Fjern Server");
define('no_remote_servers_configured', "Ingen fjern server konfigureret til Open Game Panel.<br>Du er nødtil at tilføje fjern servere, før du ka til servere til brugere.");
define('no_game_configurations_found', "Ingen spille konfiguration fundet. Du er nødtil at tilføje spil konfiguration fra");
define('game_configurations', ">spil konfigurations siden");
define('add_remote_server', "tilføj en server.");
define('wine_games', "Wine Spil");
define('home_path', "Hjemme sti");
define('change_home_info', "Stedet hvor spil server er installeret. Eksempel: /home/ogp/my_server/");
define('game_server_name', "Spil server navn");
define('change_name_info', "Navnet på serveren, er for at hjælpe brugeren til at identificere den.");
define('game_control_password', "Spil kontrol adgangskode");
define('change_control_password_info', "Kontrol adgangskode er feksempel rcon kodeord.");
define('available_mods', "Tilgængelige mods");
define('note_no_mods', "Ingen mod(s) tilgængelig til dette spil.");
define('change_home', "Ændre Hjem");
define('change_control_password', "Skift Kontrol adgangskode");
define('change_name', "Skift Navn");
define('add_mod', "Tilføj Mod");
define('set_ip', "Set IP");
define('ips_and_ports', "IPs og Porte");
define('mod_name', "Mod Navn");
define('max_players', "Max Spillere");
define('extra_cmd_line_args', "Ekstra Kommando Linje argu");
define('extra_cmd_line_info', "Den ekstra kommando linje argu, tilbyder en mulighed for at, tilføje ekstra argumenter til spillet kommando linje, når det startes.");
define('cpu_affinity', "CPU Affinity");
define('nice_level', "Nice Level");
define('set_options', "Vælg Mulighed");
define('remove_mod', "Fjern Mod");
define('mods', "Mods");
define('ip', "IP");
define('port', "Port");
define('no_ip_ports_assigned', "Mindst en IP:Port par, skal være tildelt til et hjem.");
define('successfully_assigned_ip_port', "Tilføjet successfuldt IP:Port par til hjem.");
define('port_range_error', "Port er nødtil at være mellem 0 og 65535.");
define('failed_to_assing_mod_to_home', "Fejlet i at tilføje mod med id %d til hjem.");
define('successfully_assigned_mod_to_home', "Tilføjet successfuldt mod med id %d til hjem.");
define('successfully_modified_mod', "Modificeret mod information successfuldt.");
define('back_to_game_monitor', "Tilbage til Spil Oversigt");
define('back_to_game_servers', "Tilbage til Spil Servere");
define('user_id_main', "Hoved Ejer");
define('change_user_id_main', "Skift Hoved Ejer");
define('change_user_id_main_info', "Hoved hjemme server.");
define('server_ftp_password', "FTP adgangskode");
define('change_ftp_password', "Skift FTP adgangskode");
define('change_ftp_password_info', "Dette er kodeord til at kunne logge ind på FTP server, til dette hjem.");
define('Delete_old_user_assigned_homes', "Fjern hjem fra nuværrende brugere.");
define('editing_home_called', "Redigere hjem kaldet");
define('control_password_updated_successfully', "Kontrol kodeord opdateret successfuldt.");
define('control_password_update_failed', "Kontrol kodeord opdatereting fejlet");
define('successfully_changed_game_server', "Skiftede spil server successfuldt.");
define('error_ocurred_on_remote_server', "Fejl opstod på fjern server,");
define('ftp_password_can_not_be_changed', "FTP adgangskode kan ikke ændres.");
define('ftp_can_not_be_switched_on', "FTP kan ikke blive slået til.");
define('ftp_can_not_be_switched_off', "FTP kan ikke blive slået fra.");
define('invalid_home_id_entered', "Invalid hjemme id indtastet.");
define('ip_port_already_in_use', "Denne %s:%s er allerede i brug. Vælg en anden.");
define('successfully_assigned_ip_port_to_server_id', "Tildelt successfuldt %s:%s til hjem med ID %s.");
define('no_ip_addresses_configured', "Din spil server, har ikke nogen ip-adresse konfigureret til den. Du kan konfigurere den fra ");
define('server_page', "server side");
define('successfully_removed_mod', "Fjernede spil mod successfuldt.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Advarsel - Agenten er offline, standard CPU tal til 1.");
define('mod_install_cmds', "Mod Installere CMDs");
define('cmds_for', "Kommando til");
define('preinstall_cmds', "Preinstalleret Kommando");
define('postinstall_cmds', "Postinstalleret Kommandoer");
define('edit_preinstall_cmds', "Redigere Preinstalleret Kommandoer");
define('edit_postinstall_cmds', "Redigere Postinstalleret Kommandoer");
define('save_as_default_for_this_mod', "Gem som standard, til dette mod");
define('empty', "tom");
define('master_server_for_clon_update', "Master server er sat til lokal opdatering");
define('set_as_master_server', "Sæt denne som master server");
define('set_as_master_server_for_local_clon_update', "Sæt som Master server, til lokal opdatering.");
define('only_available_for', "Kun tilgængelig for '%s' hostes på fjern server navngivet som '%s'.");
define('ftp_on', "Tænd FTP");
define('ftp_off', "Sluk FTP");
define('change_ftp_account_status', "Skift FTP konto status");
define('change_ftp_account_status_info', "Once a FTP account is enabled or disabled, it is added or removed from the FTP's database.");
define('server_ftp_login', "Server FTP Log ind");
define('change_ftp_login_info', "Skift FTP Log ind ved tilpasse en.");
define('change_ftp_login', "Skift FTP Log ind");
define('ftp_login_can_not_be_changed', "Kan ikke skifte FTP log ind.");
define('server_is_running_change_addresses_not_available', "Serveren kører allerede, så det er ikke muligt at skifte IP.");
define('change_game_type', "Change Game Type");
define('change_game_type_info', "By changing the game type the current the mods configuration will be deleted.");
define('force_mod_on_this_address', "Force mod on this address");
define('successfully_assigned_mod_to_address', "Successfully assigned mod to address");
define('switch_mods', "Switch mods");
define('switch_mod_for_address', "Switch mod for address %s");
define('invalid_path', "Invalid Path");
define('add_new_game_home', "Tilføj Ny Spil Server");
define('no_game_homes_found', "Ingen spil server fundet");
define('available_game_homes', "Tilgængelige spil servere");
define('home_id', "Hjemme ID");
define('game_server', "Spil Server");
define('game_type', "Spil Type");
define('game_home', "Home Path");
define('game_home_name', "Game Server Name");
define('clone', "Klone");
define('unassign', "Fjern");
define('access_rights', "Adgangs Rettigheder");
define('assigned_homes', "Nuværrende Hjem tildelt");
define('assign', "Tildel");
define('allow_updates', "Tillad Spil opdateringer");
define('allow_updates_info', "Giv brugeren tilladelse til at opdatere spil installtions, hvis det er muligt.");
define('allow_file_management', "Allow File Management");
define('allow_file_management_info', "Giver brugeren tilladelse til, at tilgå spil server, med filhåndtering moduler.");
define('allow_parameter_usage', "Tillad Parameter brug");
define('allow_parameter_usage_info', "Tillader bruger til at ændre tilgængelig kommando linje parameter.");
define('allow_extra_params', "Tillad ekstra parameter");
define('allow_extra_params_info', "Tillader bruger, til at ændre ekstra kommando linje parameter.");
define('allow_ftp', "Tillad FTP");
define('allow_ftp_info', "Vis FTP adgangs informationer til bruger.");
define('allow_custom_fields', "Allow Custom Fields");
define('allow_custom_fields_info', "Allows user to access custom fields of the game server if any.");
define('select_home', "Vælg Hjem til tildeling");
define('assign_new_home_to_user', "Tildel Ny Hjem til bruger %s");
define('assign_new_home_to_group', "Tildel Ny Hjem til gruppe %s");
define('assigned_home_to_user', "Tildelt hjem successfuldt (ID: %d) til bruger %s.");
define('failed_to_assign_home_to_user', "Failed to assign home (ID: %d) to user %s.");
define('assigned_home_to_group', "Tildelt hjem successfuldt (ID: %d) til gruppe %s.");
define('unassigned_home_from_user', "Fjernet hjem successfuldt (ID: %d) fra bruger %s.");
define('unassigned_home_from_group', "Fjernet hjem successfuldtS (ID: %d) fra gruppe %s.");
define('no_homes_assigned_to_user', "Ingen hjem tildelt til bruger %s.");
define('no_homes_assigned_to_group', "Ingen hjem tildelt til gruppe %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "Ikke flere hjem tilgængelig, som ka blive tildelt til brugeren");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "Ikke flere hjem tilgængelig, som ka blive tildelt til gruppe");
define('you_can_add_a_new_game_server_from', "Du ka tilføje en ny spil server fra %s.");
define('no_remote_servers_available_please_add_at_least_one', "Der er ikke nogen fjern server tilgængelig, venligst tilføj en!");
define('cloning_of_home_failed', "Kloning af hjem med id '%s' fejlet.");
define('no_mods_to_clone', "Ingen aktiveret mod(s) til dette spil endnu, intet vil blive klonet.");
define('failed_to_add_mod', "Fejlet I at tilføje mod med id '%s' til hjem med id '%s'.");
define('failed_to_update_mod_settings', "Fejlet at opdatere mod indstillinger til hjem med id '%s'.");
define('successfully_cloned_mods', "Succesfuldt klonet mods til hjem med id '%s'.");
define('successfully_copied_home_database', "Kopieret hjemme databasen successfuldt.");
define('copying_home_remotely', "Koipere hjem på fjern server fra '%s' til '%s'.");
define('cloning_home', "Kloning hjem kaldet '%s'");
define('current_home_path', "Nuværrende hjemme sti");
define('current_home_path_info', "Den nuværrende destination af det kopieret hjem på fjern server.");
define('clone_home', "Klon Hjem");
define('new_home_name', "Ny Hjemme Navn");
define('new_home_path', "Ny Hjemme Sti");
define('agent_ip', "Agent IP");
define('game_server_copy_is_running', "Kopi af Spil server er kørende...");
define('game_server_copy_was_successful', "Kopi af spil server, gjort successfuldt");
define('game_server_copy_failed_with_return_code', "Kopi af spil server, fejlet med en fejlkode %s");
define('clone_mods', "Klon Mods");
define('game_server_owner', "Spil server ejer");
define('the_name_of_the_server_to_help_users_to_identify_it', "Navnet på serveren, hjælper bruger til at identificere den.");
define('ips_and_ports_used_in_this_home', "IPs og Porte bruges in dette hjem");
define('note_ips_and_ports_are_not_cloned', "Note - IPs og Porte er ikke klonet");
define('mods_and_settings_for_this_game_server', "Mods og indstillinger til denne spil server");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Er du sikker på, at du ville slette spil server (ID: %s) fra server %s og dets mappe %s");
define('yes_and_delete_the_files', "Ja, og slet filer");
define('failed_to_remove_gamehome_from_database', "Fejlet I at fjerne spillehjem fra databasen.");
define('successfully_deleted_game_server_with_id', "Succesfuldt slettet spil server med ID %s.");
define('failed_to_remove_ftp_account_from_remote_server', "Fejlet I at fjerne FTP konto fra fjern server.");
define('remove_it_anyway', "Vil du gerne fjerne det alligevel?");
define('sucessfully_deleted', "Slettet successfuldt %s");
define('the_agent_had_a_problem_deleting', "The Agent had a problem while deleting %s. Please, check the Agent's log.");
define('connection_timeout_or_problems_reaching_the_agent', "Connection timeout or problems with reaching the Agent");
define('does_not_exist_yet', "Does not exist yet.");
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
define('expiration_date_changed', "Expiration date for selected home has been changed.");
define('expiration_date_could_not_be_changed', "Expiration date for selected home could not be changed.");
define('search', "Search");
define('ftp_account_username_too_long', "FTP username is too long. Try a shorter username no longer than 20 characters.");
define('ftp_account_password_too_long', "FTP password is too long. Try a shorter password no longer than 20 characters.");
define('other_servers_exist_with_path_please_change', "Other homes exist with the same path. It is recommended (but not required) that you change this path to something unique. You may have problems if you do NOT.");
 ?>