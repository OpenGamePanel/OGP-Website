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

define('OGP_LANG_no_games_to_monitor', "Es gibt derzeit keine Gameserver die online/offline sind");
define('OGP_LANG_status', "Status");
define('OGP_LANG_fail_no_mods', "Keine Mods für dieses Spiel aktiviert! Sie müssen einen OGP Admin bitten, Mods für das Spiel hinzuzufügen, das Ihnen zugeteilt wird.");
define('OGP_LANG_no_game_homes_assigned', "Ihrem Konto sind keine Server zugewiesen.");
define('OGP_LANG_select_game_home_to_configure', "Wählen Sie einen Gameserver aus, den Sie konfigurieren möchten");
define('OGP_LANG_file_manager', "Dateimanager");
define('OGP_LANG_configure_mods', "Mods verwalten");
define('OGP_LANG_install_update_steam', "Installation/Aktualisierung via Steam");
define('OGP_LANG_install_update_manual', "Manuelle Installation/Aktualisierung");
define('OGP_LANG_assign_game_homes', "Spielserver zuweisen
");
define('OGP_LANG_user', "Benutzer");
define('OGP_LANG_group', "Gruppe");
define('OGP_LANG_start', "Start");
define('OGP_LANG_ogp_agent_ip', "OGP Agent IP");
define('OGP_LANG_max_players', "Max Spieler");
define('OGP_LANG_max', "Max");
define('OGP_LANG_ip_and_port', "IP und Port");
define('OGP_LANG_available_maps', "Verfügbare Maps");
define('OGP_LANG_map_path', "Map Pfad");
define('OGP_LANG_available_parameters', "Verfügbare Parameter");
define('OGP_LANG_start_server', "Server starten");
define('OGP_LANG_start_wait_note', "Der Server start kann eine Weile dauern. Bitte warten Sie, ohne Ihren Browser zu schließen.");
define('OGP_LANG_game_type', "Game Typ");
define('OGP_LANG_map', "Karte");
define('OGP_LANG_starting_server', "Starte Server, bitte warten...");
define('OGP_LANG_starting_server_settings', "Starte Server mit den folgenden Einstellungen");
define('OGP_LANG_startup_params', "Startparameter");
define('OGP_LANG_startup_cpu', "CPU auf dem der Server läuft");
define('OGP_LANG_startup_nice', "Nice Wert des Servers
");
define('OGP_LANG_game_home', "Game Pfad");
define('OGP_LANG_server_started', "Server erfolgreich gestartet.");
define('OGP_LANG_no_parameter_access', "Sie haben keinen Zugriff auf die Parameter.");
define('OGP_LANG_extra_parameters', "Zusätzliche Parameter");
define('OGP_LANG_no_extra_param_access', "Sie haben keinen Zugriff auf die zusätzlichen Parameter.");
define('OGP_LANG_extra_parameters_info', "Diese Parameter werden am Ende der Befehlszeile gesetzt, wenn das Spiel gestartet wird.");
define('OGP_LANG_game_exec_not_found', "Die ausführbare Datei %s wurde vom Remoteserver nicht gefunden.");
define('OGP_LANG_select_params_and_start', "Wählen Sie die start parameter für den Server aus und drücken Sie '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Diesem home wurde keine IP und kein Port zugewiesen. Wenn du keinen Zugriff auf die Bearbeitung eines Homes hast, kontaktiere einen Admin");
define('OGP_LANG_unable_to_get_log', "Log konnte nicht abgerufen werden, retval %s.");
define('OGP_LANG_server_binary_not_executable', "Server-Binärdatei ist nicht ausführbar.
Prüfe deine Rechte für das home Verzeichnis.");
define('OGP_LANG_server_not_running_log_found', "Server wurde nicht gestartet, ein Protokoll wurde erstellt. HINWEIS: Das Protokoll wurde möglicherweise seit dem letzten Serverstart nicht erstellt.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT Port möglicherweise geschlossen");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Ungültiger maxplayers Wert, maximal mögliche Anzahl von Slots wurde gesetzt.");
define('OGP_LANG_server_running_not_responding', "Server wurde gestartet aber antwortet nicht.<br>Es besteht möglicherweise ein bekanntes Problem.");
define('OGP_LANG_update_started', "Update gestartet, bitte warten...");
define('OGP_LANG_failed_to_start_steam_update', "Steam update ist fehlgeschlagen. Siehe Agenten Log.");
define('OGP_LANG_failed_to_start_rsync_update', "Rsync update ist fehlgeschlagen. Siehe Agenten Log.");
define('OGP_LANG_update_completed', "Update erfolgreich abgeschlossen.
");
define('OGP_LANG_update_in_progress', "Update im Gange, bitte warten...");
define('OGP_LANG_refresh_steam_status', "Steam-Status aktualisieren");
define('OGP_LANG_refresh_rsync_status', "Aktualisiere Rsync-Status");
define('OGP_LANG_server_running_cant_update', "Ein Update ist nicht möglich, da der Server derzeit läuft. Stoppe den Server bevor du ihn updatest.");
define('OGP_LANG_xml_steam_error', "Der ausgewählte Servertyp unterstützt die Installation / Aktualisierung von Steam nicht.");
define('OGP_LANG_mod_key_not_found_from_xml', "Mod key '%s' wurde von der XML Datei nicht gefunden.");
define('OGP_LANG_stop_update', "Update stoppen");
define('OGP_LANG_statistics', "Statistik");
define('OGP_LANG_servers', "Servers");
define('OGP_LANG_players', "Spieler");
define('OGP_LANG_current_map', "Aktuelle Map");
define('OGP_LANG_stop_server', "Server stoppen");
define('OGP_LANG_server_ip_port', "Server-IP: Port");
define('OGP_LANG_server_name', "Server Name");
define('OGP_LANG_server_id', "Server-ID");
define('OGP_LANG_player_name', "Spielername");
define('OGP_LANG_score', "Punkte");
define('OGP_LANG_time', "Zeit");
define('OGP_LANG_no_rights_to_stop_server', "Du hast nicht die Berechtigung den Server zu stoppen.");
define('OGP_LANG_no_ogp_lgsl_support', "Dieser Server ( %s ) hat keine LGSL-Unterstützung in OGP und seine Statistiken können nicht angezeigt werden.");
define('OGP_LANG_server_status', "Server auf %s ist %s.");
define('OGP_LANG_server_stopped', "Server '%s' wurde gestoppt.
");
define('OGP_LANG_if_want_to_start_homes', "Wenn du Spieleserver starten willst, gehtst zu %s.");
define('OGP_LANG_view_log', "Log");
define('OGP_LANG_if_want_manage', "Wenn du deine Spiele verwalten möchtest kannst du das in der");
define('OGP_LANG_columns', "Spalten");
define('OGP_LANG_group_users', "Gruppenbenutzer: ");
define('OGP_LANG_assigned_to', "Zugewiesen an:");
define('OGP_LANG_restart_server', "Server neustarten");
define('OGP_LANG_restarting_server', "Server wird neugestartet, bitte warten...");
define('OGP_LANG_server_restarted', "Server '%s' wurde neugestartet.");
define('OGP_LANG_server_not_running', "Der Server läuft nicht.");
define('OGP_LANG_address', "Adresse");
define('OGP_LANG_owner', "Besitzer");
define('OGP_LANG_operations', "Aktionen");
define('OGP_LANG_search', "Suche");
define('OGP_LANG_maps_read_from', "Karten lesen aus");
define('OGP_LANG_file', "Datei");
define('OGP_LANG_folder', "Ordner");
define('OGP_LANG_unable_retrieve_mod_info', "Konnte mod Informationen nicht aus der Datenbank abrufen.");
define('OGP_LANG_unexpected_result_libremote', "Unerwartetes Ergebnis von libremote, bitte informiere den Entwickler.");
define('OGP_LANG_unable_get_info', "Die erforderlichen Informationen für den Start konnten nicht abgerufen werden, wodurch der Startvorgang blockiert wurde.");
define('OGP_LANG_server_already_running', "Server läuft bereits. Wenn du den Server nicht im Spielemonitor sehen kannst, besteht möglicherweise ein Problem, das du selbst beheben kannst.");
define('OGP_LANG_already_running_stop_server', "Server stoppen.");
define('OGP_LANG_error_server_already_running', "FEHLER: Der Server läuft bereits auf Port");
define('OGP_LANG_failed_start_server_code', "Der Remoteserver konnte nicht gestartet werden. Fehlercode: %s");
define('OGP_LANG_disabled', "deaktiviert");
define('OGP_LANG_not_found_server', "Konnte Remoteserver nicht finden. ID ");
define('OGP_LANG_rcon_command_title', "RCON Befehle");
define('OGP_LANG_has_sent_to', "Wurde gesendet zu");
define('OGP_LANG_need_set_remote_pass', "Das remote control Passwort muss aktiviert werden");
define('OGP_LANG_before_sending_rcon_com', "bevor du rcon Befehle sendest.");
define('OGP_LANG_retry', "Wiederholen");
define('OGP_LANG_page', "seite");
define('OGP_LANG_server_cant_start', "Server kann nicht starten");
define('OGP_LANG_server_cant_stop', "Server kann nicht stoppen");
define('OGP_LANG_error_occured_remote_host', "Auf dem entfernten Host ist Fehler aufgetreten");
define('OGP_LANG_follow_server_status', "Sie können dem Serverstatus folgen von");
define('OGP_LANG_addons', "Addons");
define('OGP_LANG_hostname', "Hostnamen");
define('OGP_LANG_rsync_install', "[Rsync Install]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Team");
define('OGP_LANG_deaths', "Tote");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "AiBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Spieler");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "RCON Voreinstellungen
");
define('OGP_LANG_update_from_local_master_server', "Update von lokalen Hauptserver");
define('OGP_LANG_update_from_selected_rsync_server', "Update von gewählten Rsync Server");
define('OGP_LANG_execute_selected_server_operations', "Führe ausgewählte Serveroperationen aus");
define('OGP_LANG_execute_operations', "Operationen ausführen");
define('OGP_LANG_account_expiration', "Kontoablauf");
define('OGP_LANG_mysql_databases', "MySQL Datenbank");
define('OGP_LANG_failed_querying_server', "* Fehler beim Abfragen des Servers.");
define('OGP_LANG_query_protocol_not_supported', "* Es gibt kein Abfrageprotokoll in OGP, das diesen Server unterstützen kann.
");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Abfragen durch Einstellung abgeschaltet: Abfragen nach %s abgeschaltet, da sie %s Server haben.");
define('OGP_LANG_presets_for_game_and_mod', "RCON Voreinstellungen für %s und mod %s");
define('OGP_LANG_name', "Name");
define('OGP_LANG_command', "RCON&nbsp;Command");
define('OGP_LANG_add_preset', "Voreinstellung hinzufügen");
define('OGP_LANG_edit_presets', "Voreinstellungen bearbeiten");
define('OGP_LANG_del_preset', "Löschen");
define('OGP_LANG_change_preset', "Ändern");
define('OGP_LANG_send_command', "Befehl senden");
define('OGP_LANG_starting_copy_with_master_server_named', "Starte Kopie mit Masterserver '%s'...");
define('OGP_LANG_starting_sync_with', "Starte sync mit %s...");
define('OGP_LANG_refresh_interval', "Aktualisierungsrate des Logs");
define('OGP_LANG_finished_manual_update', "Manuelle Aktualisierung beendet.");
define('OGP_LANG_failed_to_start_file_download', "Konnte Datei-Download nicht starten.");
define('OGP_LANG_game_name', "Spiel name");
define('OGP_LANG_dest_dir', "Zielverzeichnis");
define('OGP_LANG_remote_server', "Remote-Server");
define('OGP_LANG_file_url', "Datei-URL");
define('OGP_LANG_file_url_info', "Die URL der Datei, die in das Verzeichnis hochgeladen wurde wird nicht komprimiert.");
define('OGP_LANG_dest_filename', "Ziel Dateiname");
define('OGP_LANG_dest_filename_info', "Dateiname der Zieldatei.");
define('OGP_LANG_update_server', "Server aktualisieren");
define('OGP_LANG_unavailable', "Nicht verfügbar");
define('OGP_LANG_upload_map_image', "Kartenbild hochladen");
define('OGP_LANG_upload_image', "Bild hochladen");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Das Bild muss jpg, gif oder png und weniger als 1 MB sein.");
define('OGP_LANG_check_dev_console', "Fehler beim Hochladen der Datei, überprüfen Sie die Browser-Entwicklerkonsole.");
define('OGP_LANG_uploaded_successfully', "Erfolgreich hochgeladen.");
define('OGP_LANG_cant_create_folder', "Ordner konnte nicht erstellt werden: <br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Datei konnte nicht erstellst werden: <br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "PHP-Direktive überschritten. <br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Unbekannte Fehler.");
define('OGP_LANG_directory', "Ordner-Pfad");
define('OGP_LANG_view_player_commands', "Befehle für Spieler anzeigen");
define('OGP_LANG_hide_player_commands', "Befehle für Spieler verstecken");
define('OGP_LANG_no_online_players', "Es sind keine Spieler online.");
define('OGP_LANG_invalid_game_mod_id', "Ungültige Spiel/Mod ID angegeben.");
define('OGP_LANG_auto_update_title_popup', "Steam Auto Update Link");
define('OGP_LANG_auto_update_popup_html', "<p>Verwenden Sie den Link unten, um Ihren Spieleserver bei Bedarf zu überprüfen und automatisch über Steam zu aktualisieren. &Nbsp; Sie können es mit einem Cron-Job abfragen oder den Prozess manuell einleiten.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Kopieren");
define('OGP_LANG_auto_update_copy_me_success', "Kopiert!");
define('OGP_LANG_auto_update_copy_me_fail', "Kopieren fehlgeschlagen. Bitte kopieren Sie den Link von Hand");
define('OGP_LANG_get_steam_autoupdate_api_link', "Auto Update Link");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Benutzer %s hat versucht, home_id %d zu aktualisieren von einem Nicht-Master-Server.
(Verzeichnis ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Sie versuchen, diesen Server von einem Nicht-Master-Server zu aktualisieren.");
define('OGP_LANG_cannot_update_from_own_self', "Das lokale Serverupdate wird möglicherweise nicht auf einem Masterserver ausgeführt.");
define('OGP_LANG_show_server_id', "Zeige Server-IDs");
define('OGP_LANG_hide_server_id', "Verstecke Server-IDs");
define('OGP_LANG_edit_configuration_files', "Konfigurationsdateien bearbeiten");
define('OGP_LANG_admin', "Admin");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "Sekunden");
define('OGP_LANG_unknown_rsync_mirror', "Sie haben versucht, ein Update von einem nicht vorhandenen Backup zu starten.");
define('OGP_LANG_custom_fields', "Benutzerdefinierte Felder");
?>
