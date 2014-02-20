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
$lang['add_new_game_home'] = "Tilføj Ny Spil Server";
$lang['add_mods_note'] = "Du er nødtil at tilføje mods efter en server er tildelt en bruger. Dette ka gøres, ved at redigere serveren.";
$lang['game_server'] = "Spil Server";
$lang['game_servers'] = "Spil Servere";
$lang['game_type'] = "Spil Type";
$lang['game_path'] = "Spil Sti";
$lang['game_path_info'] = "En fuldstændig server sti. Eksempel: /home/ogp/my_server/";
$lang['game_server_name'] = "Spil server navn";
$lang['game_server_name_info'] = "Server navn hjælper brugere til at genkende deres servere.";
$lang['control_password'] = "Kontrol kodeord";
$lang['control_password_info'] = "Denne adgangskode bliver brugt til server kontrol, så som RCON kodeord. Hvis feltet hvor adgangskoden er tom, er der andre muligheder.";
$lang['add_game_home'] = "Tilføj spil server";
$lang['game_path_empty'] = "Spil sti, må ikke stå tom.";
$lang['game_home_added'] = "Spil serveer tilføjet successfuldt. Omadressere til hjem redigerings side.";
$lang['failed_to_add_home_to_db'] = "Fejlet i, at tilføje hjem til databasen. Fejl: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Advarsel!</b> Agenten er offline, kan ikke få OS type og arkitektur,<br> Viser servere fra alle platforme:";
$lang['select_remote_server'] = "Vælg Fjern Server";
$lang['no_remote_servers_configured'] = "Ingen fjern server konfigureret til Open Game Panel.<br>Du er nødtil at tilføje fjern servere, før du ka til servere til brugere.";
$lang['no_game_configurations_found'] = "Ingen spille konfiguration fundet. Du er nødtil at tilføje spil konfiguration fra";
$lang['game_configurations'] = ">spil konfigurations siden";
$lang['add_remote_server'] = "tilføj en server.";
$lang['wine_games'] = "Wine Spil";
$lang[''] = "";
$lang[''] = "";

// edit_games.php
$lang['home_path'] = "Hjemme sti";
$lang['change_home_info'] = "Stedet hvor spil server er installeret. Eksempel: /home/ogp/my_server/";
$lang['game_server_name'] = "Spil server navn";
$lang['change_name_info'] = "Navnet på serveren, er for at hjælpe brugeren til at identificere den.";
$lang['game_control_password'] = "Spil kontrol adgangskode";
$lang['change_control_password_info'] = "Kontrol adgangskode er feksempel rcon kodeord.";
$lang['available_mods'] = "Tilgængelige mods";
$lang['note_no_mods'] = "Ingen mod(s) tilgængelig til dette spil.";
$lang['change_home'] = "Ændre Hjem";
$lang['change_control_password'] = "Skift Kontrol adgangskode";
$lang['change_name'] = "Skift Navn";
$lang['add_mod'] = "Tilføj Mod";
$lang['set_ip'] = "Set IP";
$lang['ips_and_ports'] = "IPs og Porte";
$lang['mod_name'] = "Mod Navn";
$lang['max_players'] = "Max Spillere";
$lang['extra_cmd_line_args'] = "Ekstra Kommando Linje argu";
$lang['extra_cmd_line_info'] = "Den ekstra kommando linje argu, tilbyder en mulighed for at, tilføje ekstra argumenter til spillet kommando linje, når det startes.";
$lang['cpu_affinity'] = "CPU Affinity";
$lang['nice_level'] = "Nice Level";
$lang['set_options'] = "Vælg Mulighed";
$lang['remove_mod'] = "Fjern Mod";
$lang['mods'] = "Mods";
$lang['ip'] = "IP";
$lang['port'] = "Port";
$lang['no_ip_ports_assigned'] = "Mindst en IP:Port par, skal være tildelt til et hjem.";
$lang['successfully_assigned_ip_port'] = "Tilføjet successfuldt IP:Port par til hjem.";
$lang['port_range_error'] = "Port er nødtil at være mellem 0 og 65535.";
$lang['failed_to_assing_mod_to_home'] = "Fejlet i at tilføje mod med id %d til hjem.";
$lang['successfully_assigned_mod_to_home'] = "Tilføjet successfuldt mod med id %d til hjem.";
$lang['successfully_modified_mod'] = "Modificeret mod information successfuldt.";
$lang['back_to_game_monitor'] = "Tilbage til Spil Oversigt";
$lang['back_to_game_servers'] = "Tilbage til Spil Servere";
$lang['user_id_main'] = "Hoved Ejer";
$lang['change_user_id_main'] = "Skift Hoved Ejer";
$lang['change_user_id_main_info'] = "Hoved hjemme server.";
$lang['server_ftp_password'] = "FTP adgangskode";
$lang['change_ftp_password'] = "Skift FTP adgangskode";
$lang['change_ftp_password_info'] = "Dette er kodeord til at kunne logge ind på FTP server, til dette hjem.";
$lang['Delete_old_user_assigned_homes'] = "Fjern hjem fra nuværrende brugere.";
$lang['editing_home_called'] = "Redigere hjem kaldet";
$lang['control_password_updated_successfully'] = "Kontrol kodeord opdateret successfuldt.";
$lang['control_password_update_failed'] = "Kontrol kodeord opdatereting fejlet";
$lang['successfully_changed_game_server'] = "Skiftede spil server successfuldt.";
$lang['error_ocurred_on_remote_server'] = "Fejl opstod på fjern server,";
$lang['ftp_password_can_not_be_changed'] = "FTP adgangskode kan ikke ændres.";
$lang['ftp_can_not_be_switched_on'] = "FTP kan ikke blive slået til.";
$lang['ftp_can_not_be_switched_off'] = "FTP kan ikke blive slået fra.";
$lang['invalid_home_id_entered'] = "Invalid hjemme id indtastet.";
$lang['ip_port_already_in_use'] = "Denne %s:%s er allerede i brug. Vælg en anden.";
$lang['successfully_assigned_ip_port_to_server_id'] = "Tildelt successfuldt %s:%s til hjem med ID %s.";
$lang['no_ip_addresses_configured'] = "Din spil server, har ikke nogen ip-adresse konfigureret til den. Du kan konfigurere den fra ";
$lang['server_page'] = "server side";
$lang['successfully_removed_mod'] = "Fjernede spil mod successfuldt.";
$lang['warning_agent_offline_defaulting_CPU_count_to_1'] = "Advarsel - Agenten er offline, standard CPU tal til 1.";
$lang['mod_install_cmds'] = "Mod Installere CMDs";
$lang['cmds_for'] = "Kommando til";
$lang['preinstall_cmds'] = "Preinstalleret Kommando";
$lang['postinstall_cmds'] = "Postinstalleret Kommandoer";
$lang['edit_preinstall_cmds'] = "Redigere Preinstalleret Kommandoer";
$lang['edit_postinstall_cmds'] = "Redigere Postinstalleret Kommandoer";
$lang['save_as_default_for_this_mod'] = "Gem som standard, til dette mod";
$lang['empty'] = "tom";
$lang['master_server_for_clon_update'] = "Master server er sat til lokal opdatering";
$lang['set_as_master_server'] = "Sæt denne som master server";
$lang['set_as_master_server_for_local_clon_update'] = "Sæt som Master server, til lokal opdatering.";
$lang['only_available_for'] = "Kun tilgængelig for '%s' hostes på fjern server navngivet som '%s'.";
$lang['ftp_on'] = "Tænd FTP";
$lang['ftp_off'] = "Sluk FTP";
$lang['change_ftp_account_status'] = "Skift FTP konto status";
$lang['change_ftp_account_status_info'] = "Når først en FTP konto, er slået til, eller slået fra, bliver den tilføjet eller fjernet fra PureFTPd's DataBase.";
$lang['server_ftp_login'] = "Server FTP Log ind";
$lang['change_ftp_login_info'] = "Skift FTP Log ind ved tilpasse en.";
$lang['change_ftp_login'] = "Skift FTP Log ind";
$lang['ftp_login_can_not_be_changed'] = "Kan ikke skifte FTP log ind.";
$lang['server_is_running_change_addresses_not_available'] = "Serveren kører allerede, så det er ikke muligt at skifte IP.";
$lang['change_game_type'] = "Change Game Type";
$lang['change_game_type_info'] = "By changing the game type the current the mods configuration will be deleted.";
$lang['force_mod_on_this_address'] = "Force mod on this address";
$lang['successfully_assigned_mod_to_address'] = "Successfully assigned mod to address";
$lang['switch_mods'] = "Switch mods";
$lang['switch_mod_for_address'] = "Switch mod for address %s";
$lang[''] = "";

// show_games.php
$lang['add_new_game_home'] = "Tilføj ny spil server";
$lang['no_game_homes_found'] = "Ingen spil server fundet";
$lang['available_game_homes'] = "Tilgængelige spil servere";
$lang['home_id'] = "Hjemme ID";
$lang['game_server'] = "Spil Server";
$lang['game_type'] = "Spil Type";
$lang['game_home'] = "spil server";
$lang['game_home_name'] = "spil server Navn";
$lang['actions'] = "Handlinger";
$lang['edit'] = "Redigere";
$lang['clone'] = "Klone";

// assign_games.php
$lang['unassign'] = "Fjern";
$lang['access_rights'] = "Adgangs Rettigheder";
$lang['assigned_homes'] = "Nuværrende Hjem tildelt";
$lang['assign'] = "Tildel";
$lang['allow_updates'] = "Tillad Spil opdateringer";
$lang['allow_updates_info'] = "Giv brugeren tilladelse til at opdatere spil installtions, hvis det er muligt.";
$lang['allow_file_management'] = "Filhåndtering";
$lang['allow_file_management_info'] = "Giver brugeren tilladelse til, at tilgå spil server, med filhåndtering moduler.";
$lang['allow_parameter_usage'] = "Tillad Parameter brug";
$lang['allow_parameter_usage_info'] = "Tillader bruger til at ændre tilgængelig kommando linje parameter.";
$lang['allow_extra_params'] = "Tillad ekstra parameter";
$lang['allow_extra_params_info'] = "Tillader bruger, til at ændre ekstra kommando linje parameter.";
$lang['allow_ftp'] = "Tillad FTP";
$lang['allow_ftp_info'] = "Vis FTP adgangs informationer til bruger.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Vælg Hjem til tildeling";
$lang['assign_new_home_to_user'] = "Tildel Ny Hjem til bruger %s";
$lang['assign_new_home_to_group'] = "Tildel Ny Hjem til gruppe %s";
$lang['assigned_home_to_user'] = "Tildelt hjem successfuldt (ID: %d) til bruger %s.";
$lang['assigned_home_to_group'] = "Tildelt hjem successfuldt (ID: %d) til gruppe %s.";
$lang['unassigned_home_from_user'] = "Fjernet hjem successfuldt (ID: %d) fra bruger %s.";
$lang['unassigned_home_from_group'] = "Fjernet hjem successfuldtS (ID: %d) fra gruppe %s.";
$lang['no_homes_assigned_to_user'] = "Ingen hjem tildelt til bruger %s.";
$lang['no_homes_assigned_to_group'] = "Ingen hjem tildelt til gruppe %s.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "Ikke flere hjem tilgængelig, som ka blive tildelt til brugeren";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "Ikke flere hjem tilgængelig, som ka blive tildelt til gruppe";
$lang['you_can_add_a_new_game_server_from'] = "Du ka tilføje en ny spil server fra %s.";
$lang['no_remote_servers_available_please_add_at_least_one'] = "Der er ikke nogen fjern server tilgængelig, venligst tilføj en!";
$lang[''] = "";
$lang[''] = "";


// clone_home.php
$lang['cloning_of_home_failed'] = "Kloning af hjem med id '%s' fejlet.";
$lang['no_mods_to_clone'] = "Ingen aktiveret mod(s) til dette spil endnu, intet vil blive klonet.";
$lang['failed_to_add_mod'] = "Fejlet I at tilføje mod med id '%s' til hjem med id '%s'.";
$lang['failed_to_update_mod_settings'] = "Fejlet at opdatere mod indstillinger til hjem med id '%s'.";
$lang['successfully_cloned_mods'] = "Succesfuldt klonet mods til hjem med id '%s'.";
$lang['successfully_copied_home_database'] = "Kopieret hjemme databasen successfuldt.";
$lang['copying_home_remotely'] = "Koipere hjem på fjern server fra '%s' til '%s'.";
$lang['cloning_home'] = "Kloning hjem kaldet '%s'";
$lang['current_home_path'] = "Nuværrende hjemme sti";
$lang['current_home_path_info'] = "Den nuværrende destination af det kopieret hjem på fjern server.";
$lang['clone_home'] = "Klon Hjem";
$lang['new_home_name'] = "Ny Hjemme Navn";
$lang['new_home_path'] = "Ny Hjemme Sti";
$lang['agent_ip'] = "Agent IP";
$lang['game_server_copy_is_running'] = "Kopi af Spil server er kørende...";
$lang['game_server_copy_was_successful'] = "Kopi af spil server, gjort successfuldt";
$lang['game_server_copy_failed_with_return_code'] = "Kopi af spil server, fejlet med en fejlkode %s";
$lang['clone_mods'] = "Klon Mods";
$lang['game_server_owner'] = "Spil server ejer";
$lang['the_name_of_the_server_to_help_users_to_identify_it'] = "Navnet på serveren, hjælper bruger til at identificere den.";
$lang['ips_and_ports_used_in_this_home'] = "IPs og Porte bruges in dette hjem";
$lang['note_ips_and_ports_are_not_cloned'] = "Note - IPs og Porte er ikke klonet";
$lang['mods_and_settings_for_this_game_server'] = "Mods og indstillinger til denne spil server";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// del_home.php

$lang['sure_to_delete_serverid_from_remoteip_and_directory'] = "Er du sikker på, at du ville slette spil server (ID: %s) fra server %s og dets mappe %s";
$lang['yes_and_delete_the_files'] = "Ja, og slet filer";
$lang['failed_to_remove_gamehome_from_database'] = "Fejlet I at fjerne spillehjem fra databasen.";
$lang['successfully_deleted_game_server_with_id'] = "Succesfuldt slettet spil fra server med ID %s.";
$lang['failed_to_remove_ftp_account_from_remote_server'] = "Fejlet I at fjerne FTP konto fra fjern server.";
$lang['remove_it_anyway'] = "Vil du gerne fjerne det alligevel?";
$lang['successfully_deleted_game_server_with_id'] = "Succesfuldt slettet spil server med ID %s.";
$lang['sucessfully_deleted'] = "Slettet successfuldt %s";
$lang['the_agent_had_a_problem_deleting'] = "Agenten havde problemer med at slette %s, Tjek agent loggen";
$lang['connection_timeout_or_problems_reaching_the_agent'] = "Forbindelse tidsfrist udløb, eller problemet ligger hos agenten";
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
