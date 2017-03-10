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

define('game_manager', "Spil Manager");
define('no_games_to_monitor', "Du har ikke konfigureret nogen spil, som du ka iagttage.");
define('status', "Status");
define('fail_no_mods', "Ingen mods er aktiveret til dette spil! Spørg en OGP admin om hjælp, for at få tildelt nogle mod(s) til det spil, som er tildelt til dig.");
define('no_game_homes_assigned', "Ingen spil server, er bleven tildelt til dig. Du må spørge en OGP admin om hjælp, for at få tildelt nogle spil.");
define('select_game_home_to_configure', "Vælg den spil server, som du vil konfigurer");
define('file_manager', "Fil Håndtering");
define('configure_mods', "Konfigure mods");
define('install_update_steam', "Installere/Opdatere via Steam");
define('install_update_manual', "Installere/Opdatere manualt");
define('assign_game_homes', "Tildel spil server");
define('user', "Bruger");
define('group', "Gruppe");
define('start', "Start");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max Spillere");
define('max', "Max");
define('ip_and_port', "IP og Port");
define('available_maps', "Tilgængelig Maps");
define('map_path', "Kort Sti");
define('available_parameters', "Tilgængelig Parametere");
define('start_server', "Start Server");
define('start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
define('game_type', "Spil Type");
define('map', "Kort");
define('starting_server', "Starter server, vent venligst...");
define('starting_server_settings', "Starter serveren med følgende opsætning");
define('startup_params', "Start parametere");
define('startup_cpu', "CPU som serveren kører med");
define('startup_nice', "God værdi af serveren");
define('game_home', "spil server");
define('server_started', "Server startet korrekt.");
define('no_parameter_access', "Du har ikke rettigheder til parameter.");
define('extra_parameters', "Ekstra Parameter");
define('no_extra_param_access', "Du har ikke rettigheder til ekstra parameter.");
define('extra_parameters_info', "Disse parameter bliver tilføjet i enden af kommandoen linjen, når spillet starter.");
define('game_exec_not_found', "Spillets eksekvebar %s blev ikke fundet på fjern serveren.");
define('select_params_and_start', "Vælg de start parametere til serveren og tryk '%s'.");
define('no_ip_port_pairs_assigned', "Ingen IP Porte tildelt assigned til dette hjem. Hvis du ikke har rettigheder for at editere hjem, kontakt venligst din administrator.");
define('unable_to_get_log', "Ikke muligt at få fat på loggen, interval %s.");
define('server_binary_not_executable', "Server binær er ikke eksekverbar. Tjek are du har de korrekte tilladelser til server home mappen.");
define('server_not_running_log_found', "Server kører ikke, men log er fundet. NOTE: Denne log, er måske ikke relateret til serveren sidste opstart.");
define('ip_port_pair_not_owned', "IP:PORT tildeling ejes ikke.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Upassende maxspiller værdi, maximum antal numre af slots er bleven tildelt.");
define('server_running_not_responding', "Serveren kører, men svarer ikke,<br>det er muligt, at der er en form for problem, og at det måske skulle");
define('update_started', "Opdatering startet, vent venligst...");
define('failed_to_start_steam_update', "Fejlet I at starte steam opdatering. Se agent log.");
define('failed_to_start_rsync_update', "Failed to start Rsync update. See agent log.");
define('update_completed', "Opdatering færdiggjort succesfuldt.");
define('update_in_progress', "Opdatering er igang, vent venligst...");
define('refresh_steam_status', "Genopfrisk steam status");
define('refresh_rsync_status', "Genopfrisk rsync status");
define('server_running_cant_update', "Serveren kører, så updatering er ikke mulig. Stop serveren før opdatering.");
define('xml_steam_error', "Den valgte server type, supportere ikke steam installering/opdatering.");
define('mod_key_not_found_from_xml', "Mod nøgle '%s' ikke fundet på XML fil.");
define('stop_update', "Stop opdatering");
define('statistics', "Statestikker");
define('servers', "Servere");
define('players', "Spillere");
define('current_map', "Nuværrende kort");
define('stop_server', "Stop Server");
define('server_ip_port', "Server IP:Port");
define('server_name', "Server Navn");
define('player_name', "Spiller Navn");
define('score', "Score");
define('time', "Tid");
define('no_rights_to_stop_server', "Du har ikke rettigheder, til at stoppe denne server.");
define('no_ogp_lgsl_support', "Denne server (kører: %s) og har ikke LGSL support i OGP, og det statestikker, kan ikke blive vist.");
define('server_status', "Server on %s is %s.");
define('server_stopped', "Serveren '%s' er bleven stoppet.");
define('if_want_to_start_homes', "Hvis du vil starte spille servere, gå til %s.");
define('view_log', "Se log");
define('if_want_manage', "Hvis du vil håndtere dine spil, kan du gøre dette I");
define('columns', "kolonner");
define('group_users', "Gruppe:");
define('assigned_to', "Tildelt:");
define('restart_server', "Genstart Server");
define('restarting_server', "Genstartning af server, vent venligst...");
define('server_restarted', "Server '%s' er bleven genstartet.");
define('server_not_running', "Denne server kører ikke.");
define('address', "Addresse");
define('owner', "Ejer");
define('operations', "Operationer");
define('search', "Søg");
define('maps_read_from', "Korte læses fra ");
define('file', "fil");
define('folder', "mappe");
define('unable_retrieve_mod_info', "Ude af stand til, at modtage mod informationer fra databasen.");
define('unexpected_result_libremote', "Uventet resultat fra libremote, venlig informere udviklerne.");
define('unable_get_info', "Ude af stand til, at hente krævende information til opstart, blokere opstart.");
define('server_already_running', "Server kører allerede. Hvis du ikke ser serveren I spille monitoren, kan det skyldes et eller andet problem, som du nok ville");
define('already_running_stop_server', "Stop server.");
define('error_server_already_running', "FEJL: Server kører allerede på port");
define('failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('disabled', "Slået fra ");
define('not_found_server', "Kunne ikke finde fjernserveren med ID");
define('rcon_command_title', "RCON Kommando");
define('has_sent_to', "er bleven sendt til");
define('need_set_remote_pass', "Du er nødtil at sætte fjern kontrol adgangskode på");
define('before_sending_rcon_com', "før der sendes rcon kommandoer til det.");
define('retry', "Forsøg igen");
define('page', "side");
define('server_cant_start', "server kan ikke starte");
define('server_cant_stop', "server kan ikke stoppe");
define('error_occured_remote_host', "Fejl opstod på fjern værten");
define('follow_server_status', "Du ka følge serverens status fra");
define('addons', "Addons");
define('hostname', "Værtsnavn");
define('rsync_install', "[Rsync Installalering]");
define('ping', "Ping");
define('team', "Hold");
define('deaths', "Døde");
define('pid', "PID");
define('skill', "Evne");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "Spiller");
define('port', "Port");
define('rcon_presets', "RCON standard indstillinger");
define('update_from_local_master_server', "Updatering fra lokal mester server");
define('update_from_selected_rsync_server', "Updatering fra valgt rsync server");
define('execute_selected_server_operations', "Udfør valgte server operation");
define('execute_operations', "Udfør operationer");
define('account_expiration', "Account expiration");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Failed querying the server.");
define('query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('presets_for_game_and_mod', "RCON standard indstillinger for %s og mod %s");
define('name', "Navn");
define('command', "RCON&nbsp;Kommando");
define('add_preset', "Tilføj standard indstillinger");
define('edit_presets', "Edit standard indstillinger");
define('del_preset', "Slet");
define('change_preset', "Vælg");
define('send_command', "Send kommando");
define('starting_copy_with_master_server_named', "Start kopi af mester server navn '%s'...");
define('starting_sync_with', "Start synkronisering med %s...");
define('refresh_interval', "Log genopfrisker interval");
define('finished_manual_update', "Manual opdatering færdiggjort.");
define('failed_to_start_file_download', "Fejlet i at starte fil download.");
define('game_name', "Spille navn");
define('dest_dir', "Mappe destinations");
define('remote_server', "Fjern Server");
define('file_url', "Fil URL");
define('file_url_info', "URL af den fil, der er uploadet og pakket ud til mappen.");
define('dest_filename', "Destinations Fil navn");
define('dest_filename_info', "Et filnavn for destinations fil.");
define('update_server', "Updatere server");
define('unavailable', "Utilgængelig");
define('upload_map_image', "Upload map image");
define('upload_image', "Upload image");
define('jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('check_dev_console', "Error during uploading file, please check the browser developer console.");
define('uploaded_successfully', "Uploaded successfully.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unknown errors.");
define('directory', "Mappe Sti");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('auto_update_copy_me', "Copy");
define('auto_update_copy_me_success', "Copied!");
define('auto_update_copy_me_fail', "Failed to copy. Please manually copy the link.");
define('get_steam_autoupdate_api_link', "Auto Update Link");
?>
