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

define('game_manager', "Spiel Manager");
define('no_games_to_monitor', "Es gibt derzeit keine Gameserver die online/offline sind");
define('status', "Status");
define('fail_no_mods', "Keine Mods für dieses Spiel aktiviert! Sie müssen einen OGP Admin bitten, Mods für das Spiel hinzuzufügen, das Ihnen zugeteilt wird.");
define('no_game_homes_assigned', "Keine Spielserver für Sie zugewiesen. Sie müssen ihre OGP admin bitten, Spiele für Sie zuzuweisen.");
define('select_game_home_to_configure', "Wählen Sie einen Gameserver aus, den Sie konfigurieren möchten");
define('file_manager', "Dateimanager");
define('configure_mods', "Mods verwalten");
define('install_update_steam', "Installation/Aktualisierung via Steam");
define('install_update_manual', "Manuelle Installation/Aktualisierung");
define('assign_game_homes', "Spielserver zuweisen
");
define('user', "Benutzer");
define('group', "Gruppe");
define('start', "Start");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max Spieler");
define('max', "Max");
define('ip_and_port', "IP und Port");
define('available_maps', "Verfügbare Maps");
define('map_path', "Map Pfad");
define('available_parameters', "Verfügbare Parameter");
define('start_server', "Server starten");
define('start_wait_note', "Der Server start kann eine Weile dauern. Bitte warten Sie, ohne Ihren Browser zu schließen.");
define('game_type', "Game Typ");
define('map', "Karte");
define('starting_server', "Starte Server, bitte warten...");
define('starting_server_settings', "Starte Server mit den folgenden Einstellungen");
define('startup_params', "Startparameter");
define('startup_cpu', "CPU auf dem der Server läuft");
define('startup_nice', "Nice Wert des Servers
");
define('game_home', "Spielserver");
define('server_started', "Server erfolgreich gestartet.");
define('no_parameter_access', "Sie haben keinen Zugriff auf die Parameter.");
define('extra_parameters', "Zusätzliche Parameter");
define('no_extra_param_access', "Sie haben keinen Zugriff auf die zusätzlichen Parameter.");
define('extra_parameters_info', "Diese Parameter werden am Ende der Befehlszeile gesetzt, wenn das Spiel gestartet wird.");
define('game_exec_not_found', "Die ausführbare Datei %s wurde vom Remoteserver nicht gefunden.");
define('select_params_and_start', "Wählen Sie die start parameter für den Server aus und drücken Sie '%s'.");
define('no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('unable_to_get_log', "Log konnte nicht abgerufen werden, retval %s.");
define('server_binary_not_executable', "Server binary is not executable. Check you have proper permissions in the server home directory.");
define('server_not_running_log_found', "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.");
define('ip_port_pair_not_owned', "IP:PORT pair not owned.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Unsuitable maxplayers value, maximum reachable number of slots has been set.");
define('server_running_not_responding', "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ");
define('update_started', "Update gestartet, bitte warten...");
define('failed_to_start_steam_update', "Failed to start Steam update. See agent log.");
define('failed_to_start_rsync_update', "Failed to start Rsync update. See agent log.");
define('update_completed', "Update erfolgreich abgeschlossen.
");
define('update_in_progress', "Update im Gange, bitte warten...");
define('refresh_steam_status', "Steam status aktualisieren
");
define('refresh_rsync_status', "Rsync status aktualisieren
");
define('server_running_cant_update', "Server running so update is not possible. Stop the server before update.");
define('xml_steam_error', "Selected server type does not support steam install/update.");
define('mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
define('stop_update', "Update stoppen");
define('statistics', "Statistik");
define('servers', "Servers");
define('players', "Spieler");
define('current_map', "Aktuelle Map");
define('stop_server', "Server stoppen");
define('server_ip_port', "Server-IP: Port");
define('server_name', "Server Name");
define('server_id', "Server ID");
define('player_name', "Spielername");
define('score', "Punkte");
define('time', "Zeit");
define('no_rights_to_stop_server', "You do not have rights to stop this server.");
define('no_ogp_lgsl_support', "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.");
define('server_status', "Server auf %s ist %s.");
define('server_stopped', "Server '%s' wurde gestoppt.
");
define('if_want_to_start_homes', "Wenn du Spieleserver starten willst, gehtst zu %s.");
define('view_log', "Logs");
define('if_want_manage', "If you want to manage your games you can do it in the");
define('columns', "Spalten");
define('group_users', "Gruppenbenutzer: ");
define('assigned_to', "Zugewiesen an:");
define('restart_server', "Server neustarten");
define('restarting_server', "Server wird neugestartet, bitte warten...");
define('server_restarted', "Server '%s' wurde neugestartet.");
define('server_not_running', "Der Server läuft nicht.");
define('address', "Adresse");
define('owner', "Besitzer");
define('operations', "Aktionen");
define('search', "Suche");
define('maps_read_from', "Karten lesen aus");
define('file', "Datei");
define('folder', "Ordner");
define('unable_retrieve_mod_info', "Unable to retrieve mod information from database.");
define('unexpected_result_libremote', "Unexpected result from libremote, please inform developers.");
define('unable_get_info', "Unable to get the required information for startup, blocking startup.");
define('server_already_running', "Server already running. If you do not see the server in the Game Monitor, there might be a somekind of problem and you might want to");
define('already_running_stop_server', "Server stoppen.");
define('error_server_already_running', "ERROR: Server already running on port");
define('failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('disabled', "deaktiviert");
define('not_found_server', "Could not find the remote server with ID");
define('rcon_command_title', "RCON Befehle");
define('has_sent_to', "Wurde gesendet zu");
define('need_set_remote_pass', "You need to set the remote control password on");
define('before_sending_rcon_com', "before sending rcon commands to it.");
define('retry', "Wiederholen");
define('page', "seite");
define('server_cant_start', "Server kann nicht starten");
define('server_cant_stop', "Server kann nicht stoppen");
define('error_occured_remote_host', "Auf dem entfernten Host ist Fehler aufgetreten");
define('follow_server_status', "Sie können dem Serverstatus folgen von");
define('addons', "Addons");
define('hostname', "Hostnamen");
define('rsync_install', "[Rsync Install]");
define('ping', "Ping");
define('team', "Team");
define('deaths', "Tote");
define('pid', "PID");
define('skill', "Skill");
define('AIBot', "AiBot");
define('steamid', "Steam ID");
define('player', "Spieler");
define('port', "Port");
define('rcon_presets', "RCON Voreinstellungen
");
define('update_from_local_master_server', "Update from local master server");
define('update_from_selected_rsync_server', "Update from selected rsync server");
define('execute_selected_server_operations', "Execute selected server operations");
define('execute_operations', "Operationen ausführen");
define('account_expiration', "Kontoablauf");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Fehler beim Abfragen des Servers.");
define('query_protocol_not_supported', "* Es gibt kein Abfrageprotokoll in OGP, das diesen Server unterstützen kann.
");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('presets_for_game_and_mod', "RCON Voreinstellungen für %s und mod %s");
define('name', "Name");
define('command', "RCON&nbsp;Command");
define('add_preset', "Voreinstellung hinzufügen");
define('edit_presets', "Voreinstellungen bearbeiten");
define('del_preset', "Löschen");
define('change_preset', "Ändern");
define('send_command', "Befehl senden");
define('starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('starting_sync_with', "Starting sync with %s...");
define('refresh_interval', "Log refreshing interval");
define('finished_manual_update', "Finished manual update.");
define('failed_to_start_file_download', "Konnte Datei-Download nicht starten.");
define('game_name', "Spiel name");
define('dest_dir', "Zielverzeichnis");
define('remote_server', "Remote Server");
define('file_url', "File URL");
define('file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('dest_filename', "Ziel Dateiname");
define('dest_filename_info', "The filename for the destination file.");
define('update_server', "Server aktualisieren");
define('unavailable', "Nicht verfügbar");
define('upload_map_image', "Upload map image");
define('upload_image', "Bild hochladen");
define('jpg_gif_png_less_than_1mb', "Das Bild muss jpg, gif oder png und weniger als 1 MB sein.");
define('check_dev_console', "Error during uploading file, please check the browser developer console.");
define('uploaded_successfully', "Erfolgreich hochgeladen.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unbekannte Fehler.");
define('directory', "Ordner-Pfad");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('auto_update_copy_me', "Kopieren");
define('auto_update_copy_me_success', "Kopiert!");
define('auto_update_copy_me_fail', "Failed to copy. Please manually copy the link.");
define('get_steam_autoupdate_api_link', "Auto Update Link");
define('update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('cannot_update_from_own_self', "Local Server Update may not run on a master server.");
define('show_server_id', "Show Server IDs");
define('hide_server_id', "Hide Server IDs");
?>