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

$lang['game_monitor'] = "Spil Monitor";
$lang['game_manager'] = "Spil Manager";
$lang['no_games_to_monitor'] = "Du har ikke konfigureret nogen spil, som du ka iagttage.";
$lang['status'] = "Status";

// server_manager.php
$lang['fail_no_mods'] = "Ingen mods er aktiveret til dette spil! Spørg en OGP admin om hjælp, for at få tildelt nogle mod(s) til det spil, som er tildelt til dig.";
$lang['no_game_homes_assigned'] = "Ingen spil server, er bleven tildelt til dig. Du må spørge en OGP admin om hjælp, for at få tildelt nogle spil.";
$lang['select_game_home_to_configure'] = "Vælg den spil server, som du vil konfigurer";
$lang['file_manager'] = "Fil Håndtering";
$lang['configure_mods'] = "Konfigure mods";
$lang['install_update_steam'] = "Installere/Opdatere via Steam";
$lang['install_update_manual'] = "Installere/Opdatere manualt";
$lang['assign_game_homes'] = "Tildel spil server";
$lang['user'] = "Bruger";
$lang['group'] = "Grupper";
$lang['start'] = "Start";


// start_game.php
$lang['ogp_agent_ip'] = "OGP Agent IP";
$lang['max_players'] = "Max Spillere";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP og Port";
$lang['available_maps'] = "Tilgængelig Maps";
$lang['map_path'] = "Kort Sti";
$lang['available_parameters'] = "Tilgængelig Parametere";
$lang['start_server'] = "Start Server";
$lang['start_wait_note'] = "Opstarte på serveren ka godt tage lidt tid, vent venligt, og luk ikke din browser.";
$lang['game_type'] = "Spil Type";
$lang['map'] = "Kort";
$lang['starting_server'] = "Starter server, vent venligst...";
$lang['starting_server_settings'] = "Starter serveren med følgende opsætning";
$lang['startup_params'] = "Start parametere";
$lang['startup_cpu'] = "CPU som serveren kører med";
$lang['startup_nice'] = "God værdi af serveren";
$lang['game_home'] = "spil server";
$lang['server_started'] = "Server startet korrekt.";
$lang['no_parameter_access'] = "Du har ikke rettigheder til parameter.";
$lang['extra_parameters'] = "Ekstra Parameter";
$lang['no_extra_param_access'] = "Du har ikke rettigheder til ekstra parameter.";
$lang['extra_parameters_info'] = "Disse parameter bliver tilføjet i enden af kommandoen linjen, når spillet starter.";
$lang['game_exec_not_found'] = "Spillets eksekvebar %s blev ikke fundet på fjern serveren.";
$lang['select_params_and_start'] = "Vælg de start parametere til serveren og tryk '%s'.";
$lang['no_ip_port_pairs_assigned'] = "Ingen IP Porte tildelt assigned til dette hjem. Hvis du ikke har rettigheder for at editere hjem, kontakt venligst din administrator.";
$lang['unable_to_get_log'] = "Ikke muligt at få fat på loggen, interval %s.";
$lang['server_binary_not_executable'] = "Server binær er ikke eksekverbar. Tjek are du har de korrekte tilladelser til server home mappen.";
$lang['server_not_running_log_found'] = "Server kører ikke, men log er fundet. NOTE: Denne log, er måske ikke relateret til serveren sidste opstart.";
$lang['ip_port_pair_not_owned'] = "IP:PORT tildeling ejes ikke.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Upassende maxspiller værdi, maximum antal numre af slots er bleven tildelt.";
$lang['server_running_not_responding'] = "Serveren kører, men svarer ikke,<br>det er muligt, at der er en form for problem, og at det måske skulle";



// update_game.php
$lang['update_started'] = "Opdatering startet, vent venligst...";
$lang['failed_to_start_steam_update'] = "Fejlet I at starte steam opdatering. Se agent log.";
$lang['update_completed'] = "Opdatering færdiggjort succesfuldt.";
$lang['update_in_progress'] = "Opdatering er igang, vent venligst...";
$lang['refresh_steam_status'] = "Genopfrisk steam status";
$lang['refresh_rsync_status'] = "Genopfrisk rsync status";
$lang['server_running_cant_update'] = "Serveren kører, så updatering er ikke mulig. Stop serveren før opdatering.";
$lang['xml_steam_error'] = "Den valgte server type, supportere ikke steam installering/opdatering.";
$lang['mod_key_not_found_from_xml'] = "Mod nøgle '%s' ikke fundet på XML fil.";
$lang['stop_update'] = "Stop opdatering";

// game_monitor.php
$lang['statistics'] = "Statestikker";
$lang['servers'] = "Servers";
$lang['players'] = "Players";
$lang['current_map'] = "Nuværrende kort";
$lang['stop_server'] = "Stop Server";
$lang['server_ip_port'] = "Server IP:Port";
$lang['server_name'] = "Server Navn";
$lang['player_name'] = "Spiller Navn";
$lang['score'] = "Score";
$lang['time'] = "Tid";
$lang['no_rights_to_stop_server'] = "Du har ikke rettigheder, til at stoppe denne server.";
$lang['no_ogp_lgsl_support'] = "Denne server (kører: %s) og har ikke LGSL support i OGP, og det statestikker, kan ikke blive vist.";
$lang['server_status'] = "Serveren på %s er %s.";
$lang['server_stopped'] = "Serveren '%s' er bleven stoppet.";
$lang['if_want_to_start_homes'] = "Hvis du vil starte spille servere, gå til %s.";
$lang['view_log'] = "Se log";
$lang['if_want_manage'] = "Hvis du vil håndtere dine spil, kan du gøre dette I";
$lang['columns'] = "kolonner";
$lang['group_users'] = "Gruppe brugere:";
$lang['restart_server'] = "Genstart Server";
$lang['restarting_server'] = "Genstartning af server, vent venligst...";
$lang['server_restarted'] = "Server '%s' er bleven genstartet.";
$lang['server_not_running'] = "Denne server kører ikke.";
$lang['address'] = "Addresse";
$lang['owner'] = "Ejer";
$lang['operations'] = "Operationer";
$lang['search'] = "Søg";
$lang['maps_read_from'] = "Korte læses fra ";
$lang['file'] = "fil";
$lang['folder'] = "mappe";
$lang['unable_retrieve_mod_info'] = "Ude af stand til, at modtage mod informationer fra databasen.";
$lang['unexpected_result_libremote'] = "Uventet resultat fra libremote, venlig informere udviklerne.";
$lang['unable_get_info'] = "Ude af stand til, at hente krævende information til opstart, blokere opstart.";
$lang['server_already_running'] = "Server kører allerede. Hvis du ikke ser serveren I spille monitoren, kan det skyldes et eller andet problem, som du nok ville";
$lang['already_running_stop_server'] = "Stop server.";
$lang['error_server_already_running'] = "FEJL: Server kører allerede på port";
$lang['failed_start_server_code'] = "Fejlet I, at starte fjern server. Fejl kode: ";
$lang['disabled'] = "Slået fra ";
$lang['not_found_server'] = "Kunne ikke finde fjernserveren med ID";
$lang['rcon_command_title'] = "RCON Kommando";
$lang['has_sent_to'] = "er bleven sendt til";
$lang['need_set_remote_pass'] = "Du er nødtil at sætte fjern kontrol adgangskode på";
$lang['before_sending_rcon_com'] = "før der sendes rcon kommandoer til det.";
$lang['agent_offline'] = "Agent er Offline";
$lang['retry'] = "Forsøg igen";
$lang['page'] = "side";
$lang['server_cant_start'] = "server kan ikke starte";
$lang['server_cant_stop'] = "server kan ikke stoppe";
$lang['error_occured_remote_host'] = "Fejl opstod på fjern værten";
$lang['follow_server_status'] = "Du ka følge serverens status fra";
$lang['addons'] = "Addons";
$lang['hostname'] = "Værtsnavn";
$lang['rsync_install'] = "[Rsync Installalering]";
$lang['ping'] = "Ping";
$lang['team'] = "Hold";
$lang['deaths'] = "Døde";
$lang['pid'] = "PID";
$lang['skill'] = "Evne";
$lang["AIBot"] = "AIBot";
$lang["steamid"] = "Steam ID";
$lang['player'] = "Spiller";
$lang['port'] = "Port";
$lang['rcon_presets'] = "RCON standard indstillinger";
$lang['update_from_local_master_server'] = "Updatering fra lokal Mester server.";
$lang['execute_selected_server_operations'] = "Udfør valgte server operation";
$lang['execute_operations'] = "Udfør operationer";
$lang['account_expiration'] = "Account expiration";
$lang['mysql_databases'] = "MySQL Databases";
$lang['failed_querying_server'] = "* Failed querying the server.";
$lang['query_protocol_not_supported'] = "* There is no query protocol in OGP that can support this server.";
$lang['queries_disabled_by_setting_disable_queries_after'] = "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>";

// rcon_presets.php
$lang['presets_for_game_and_mod'] = "RCON standard indstillinger for %s og mod %s";
$lang['name'] = "Navn";
$lang['command'] = "RCON&nbsp;Kommando";
$lang['add_preset'] = "Tilføj standard indstillinger";
$lang['edit_presets'] = "Edit standard indstillinger";
$lang['del_preset'] = "Slet";
$lang['change_preset'] = "Vælg";
$lang["send_command"] = "Send kommando";

//rsync_install.php
$lang['starting_copy_with_master_server_named'] = "Start kopi af mester server navn '%s'...";
$lang['starting_sync_with'] = "Start synkronisering med %s...";
$lang['refresh_interval'] = "Log genopfrisker interval";

//update_server_manual.php
$lang['finished_manual_update'] = "Manual opdatering færdiggjort.";
$lang['failed_to_start_file_download'] = "Fejlet I at starte fil download";
$lang['game_name'] = "Spille navn";
$lang['dest_dir'] = "Mappe destinations";
$lang['remote_server'] = "Fjern Server";
$lang['file_url'] = "Fil URL";
$lang['file_url_info'] = "URL af den fil, der er uploadet og pakket ud til mappen.";
$lang['one_dir_down'] = "Gå en mappe tilbage, før udpakning";
$lang['dest_filename'] = "Destinations Fil navn";
$lang['dest_filename_info'] = "Et filnavn for destinations fil.";
$lang['update_server'] = "Updatere server";
$lang['unavailable'] = "Utilgængelig";

?>
