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

define('configured_mysql_hosts', "Konfigurierte MySQL-Hosts");
define('add_new_mysql_host', "MySQL-Host hinzufügen");
define('enter_mysql_ip', "Geben Sie MySQL IP ein.");
define('enter_valid_port', "Geben Sie einen gültigen Port ein.");
define('enter_mysql_root_password', "Geben Sie MySQL root password ein.");
define('enter_mysql_name', "Geben Sie den MySQL namen ein.");
define('could_not_add_mysql_server', "MySQL Server konnte nicht hinzugefügt werden.");
define('game_server_name_info', "Der Servername hilft Benutzern, Ihre Server zu identifizieren.");
define('note_mysql_host', "Hinweis: mit einer \"direkten Verbindung\" muss der Server externe Verbindungen annehmen, damit die Server eine Remoteverbindung herstellen können, wohingegen eine Verbindung über einen Remoteserver hergestellt wird, die gerade als lokale Verbindung verwendet wird.");
define('direct_connection', "Direkte Verbindung");
define('connection_through_remote_server_named', "Verbindung über Remoteserver mit dem Namen %s");
define('add_mysql_server', "MySQL Server hinzufügen");
define('mysql_online', "MySQL online");
define('mysql_offline', "MySQL offline");
define('encryption_key_mismatch', "Nichtübereinstimmung der Verschlüsselungsschlüssel");
define('unknown_error', "Unbekannter Fehler");
define('remove', "Löschen");
define('assign_db', "Datenbank zuweisen
");
define('mysql_server_name', "MySQL server name");
define('server_status', "Server status");
define('mysql_ip_port', "MySQL IP:port");
define('mysql_root_passwd', "MySQL root passwort");
define('connection_method', "Verbindungsmethode");
define('user_privilegies', "Benutzerberechtigungen");
define('current_dbs', "Aktuelle Datenbanken");
define('mysql_name', "MySQL server name");
define('mysql_ip', "MySQL IP");
define('mysql_port', "MySQL port");
define('privilegies', "privilegien");
define('all', "Alle");
define('custom', "Benutzerdefiniert");
define('server_added', "Server hinzugefügt.");
define('sql_alter', "ÄNDERN");
define('sql_create', "ERSTELLEN");
define('sql_create_temporary_tables', "TEMPORÄRE TABELLEN ERSTELLEN");
define('sql_drop', "VERWERFEN");
define('sql_index', "INDEX");
define('sql_insert', "EINFÜGEN");
define('sql_lock_tables', "TABELLE SPERREN");
define('sql_select', "AUSWÄHLEN");
define('sql_grant_option', "RECHTE OPTIONEN");
define('sql_update', "AKTUALISIEREN");
define('sql_delete', "LÖSCHEN");
define('sql_alter_info', "<B>Aktiviert die Verwendung von TABELLE ÄNDERN.</ B>");	
define('sql_create_info', "<B>Aktiviert die Verwendung von TABELLE ERSTELLEN.</ B>");	
define('sql_create_temporary_tables_info', "<B>Aktiviert die Verwendung von TABELLE VERWERFEN.</ B>");
define('sql_delete_info', "<b>Aktiviert die Verwendung von LÖSCHEN.</b>");
define('sql_drop_info', "<b>Aktiviert die Verwendung LÖSCHEN.</b>");	
define('sql_index_info', "<b>Aktiviert die Verwendung INDEX ERSTELLEN und INDEX VERWERFEN.</b>");	
define('sql_insert_info', "<b>Aktiviert die Verwendung EINFÜGEN.</b>");	
define('sql_lock_tables_info', "<b>Aktiviert die Verwendung TABELLE SPERREN Auf Tabellen, für die du das SELECT Berechtigung hast.</b>");	
define('sql_select_info', "<b>Enables use of AUSWÄHLEN.</b>");
define('sql_update_info', "<b>Enables use of AKTUALISIEREN.</b>");	
define('sql_grant_option_info', "<b>Ermöglicht die Erteilung von Berechtigungen.</b>");
define('select_game_server', "Spielserver auswählen");
define('invalid_mysql_server_id', "Ungültige MySQL Server ID.");
define('there_is_another_db_named_or_user_named', "Es gibt eine andere Datenbank mit dem Namen <b>%s</ b> oder einen anderen Benutzer mit dem Namen <b>%s</ b>.");
define('db_added_for_home_id', "Datenbank für Heim ID <b>%s</b> wurde hinzugefügt.");
define('could_not_remove_db', "Die ausgewählte Datenbank konnte nicht entfernt werden.");
define('db_removed_successfully_from_mysql_server_named', "Die Datenbank wurde vom Server %s entfernt.");
define('areyousure_remove_mysql_server', "Sind Sie sicher, dass Sie den MySQL Server mit dem Namen <b>%s</ b> entfernen möchten?");
define('db_changed_successfully', "Die Datenbank %s wurde erfolgreich geändert.");
define('error_while_remove', "Fehler beim Entfernen.");
define('mysql_server_removed', "Der MySQL Server mit dem Namen <b>%s</ b> wurde erfolgreich entfernt.");
define('unable_to_set_changes_to', "Kann nicht auf MySQL Server mit dem Namen <b>%s</ b> setzen.");
define('mysql_server_settings_changed', "Kann nicht auf MySQL Server mit dem Namen <b>%s</ b> setzen.");
define('editing_mysql_server', "Bearbeiten des MySQL Servers mit dem Namen <b>%s</ b>.");
define('save_settings', "Einstellungen speichern");
define('mysql_dbs_for', "Datenbanken für Server %s");
define('edit_dbs', "Datenbanken bearbeiten");
define('edit_db_settings', "Datenbankeinstellungen bearbeiten");
define('remove_db', "Datenbank entfernen");
define('save_db_changes', "Datenbankänderungen speichern");
define('add_db', "Datenbank hinzufügen");
define('select_db', "Datenbank auswählen");
define('db_user', "DB Nutzer");
define('db_passwd', "DB Passwort");
define('db_name', "DB Name");
define('enabled', "Aktiviert");
define('game_server', "Spielserver");
define('there_are_no_databases_assigned_for', "Es sind keine Datenbanken für <b>%s</ b> zugeordnet.");
define('unable_to_connect_to_mysql_server_as', "Kann nicht mit dem MySQL Server als %s verbunden werden.");
define('unable_to_create_db', "Datenbank kann nicht erstellt werden.");
define('unable_to_select_db', "Datenbank %s kann nicht ausgewählt werden.");
define('db_info', "Datenbankinformationen");
define('db_tables', "Datenbanktabellen");
define('db_backup', "DB Sicherung");
define('download_db_backup', "DB Sicherung herunterladen");
define('restore_db_backup', "DB Sicherung wiederherstellen");
define('sql_file', "datei(.sql)");
?>