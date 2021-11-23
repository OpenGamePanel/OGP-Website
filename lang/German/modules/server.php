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

define('OGP_LANG_add_new_remote_host', "Neuen Remote-Host hinzufügen");
define('OGP_LANG_configured_remote_hosts', "Remote-Host konfiguriert");
define('OGP_LANG_remote_host', "Remote-Host");
define('OGP_LANG_remote_host_info', "Der Remote-Host benötigt einen gültigen Hostnamen !");
define('OGP_LANG_remote_host_port', "Remote-Host Port");
define('OGP_LANG_remote_host_port_info', "Der Port, der vom OGP-Agent auf dem Remote-Host überwacht wird. Standard: 12679.");
define('OGP_LANG_remote_host_name', "Remote-Hostname");
define('OGP_LANG_ogp_user', "OGP-Agent Nutzername");
define('OGP_LANG_remote_host_name_info', "Der Remote-Hostname wird verwendet, um Benutzern zu helfen, ihre Server zu identifizieren.");
define('OGP_LANG_add_remote_host', "Remote-Host hinzufügen");
define('OGP_LANG_remote_encryption_key', "Remote Encryption-Key");
define('OGP_LANG_remote_encryption_key_info', "Der Encryption-Key wird verwendet um die Daten zwischen Panel und Agent zu verschlüsseln. Der Key im Panel muss mit dem vom Agent identisch sein.");
define('OGP_LANG_server_name', "Servername");
define('OGP_LANG_agent_ip_port', "Agent IP:Port");
define('OGP_LANG_agent_status', "Agent Status");
define('OGP_LANG_ips', "IPs");
define('OGP_LANG_add_more_ips', "Wenn alle Felder ausgefüllt sind, klicken Sie auf 'IP hinzufügen'. Danach erscheint ein leeres Eingabefeld, in das Sie die neue IP eingeben können.");
define('OGP_LANG_encryption_key_mismatch', "Der Encryption-Key stimmt nicht mit dem Key vom Agenten überein. Bitte überprüfen Sie die Agent-Config.");
define('OGP_LANG_no_ip_for_remote_host', "Sie müssen mindestens eine (1) IP Adresse für jeden Remote-Host angeben.");
define('OGP_LANG_note_remote_host', "Ein Remote-Host ist ein Server, auf dem der OGP-Agent ausgeführt wird. Jeder Host kann mehrere IP-Adressen haben, an die Benutzer Server binden können.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "Unbekannter Fehler - status_chk zurückgegeben");
define('OGP_LANG_remote_host_user_name', "UNIX Benutzer");
define('OGP_LANG_remote_host_user_name_info', "Benutzername, in dem der Agent läuft. Beispiel: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "Die FTP Server <b>IP</b> für den aktuellen Agent.");
define('OGP_LANG_remote_host_ftp_port', "FTP Port");
define('OGP_LANG_remote_host_ftp_port_info', "Der FTP Server <b>port</b> für den aktuellen Agent.");
define('OGP_LANG_view_log', "Protokoll anzeigen");
define('OGP_LANG_status', "Status");
define('OGP_LANG_stop_firewall', "Firewall stoppen");
define('OGP_LANG_start_firewall', "Firewall starten");
define('OGP_LANG_seconds', "Sekunden");
define('OGP_LANG_reboot', "Entfernten Server neu starten");
define('OGP_LANG_restart', "Agent neu starten");
define('OGP_LANG_confirm_reboot', "Möchten Sie den physischen Server mit dem Namen '%s' wirklich neu starten ?");
define('OGP_LANG_confirm_restart', "Sind Sie sicher das Sie den Agent '%s' neu starten möchten?");
define('OGP_LANG_restarting', "Agent Startet neu... Bitte warten.");
define('OGP_LANG_restarted', "Agent wurde erfolgreich neu gestartet.");
define('OGP_LANG_reboot_success', "Der Server '%s'  wurde erfolgreich neu gestartet. 
Sie können nicht auf den Server zugreifen, bis er vollständig gebootet wurde.");
define('OGP_LANG_invalid_remote_host_id', "Ungültige Remote-Host id '%s' angegeben.");
define('OGP_LANG_remote_host_removed', "Der Remote-Host mit dem Namen '%s' wurde erfolgreich entfernt.");
define('OGP_LANG_editing_remote_server', "Der Remote-Host mit dem Namen '%s' wird bearbeitet.");
define('OGP_LANG_remote_server_settings_changed', "Remote-Server Einstellungen für '%s'erfolgreich bearbeitet.");
define('OGP_LANG_save_settings', "Einstellungen speichern");
define('OGP_LANG_set_ips', "IPs setzen");
define('OGP_LANG_remote_ip', "Entfernte IP");
define('OGP_LANG_remote_ips_for', "Verfügbare Gameserver IP`s für den Agent '%s'.");
define('OGP_LANG_ips_set_for_server', "IP für den Server '%s' erfolgreich hinzugefügt.");
define('OGP_LANG_could_not_remove_ip', "Die alten IP's konnten nicht aus der Datenbank entfernen.");
define('OGP_LANG_could_add_ip', "Die IP des Remote-Servers konnte zur Datenbank hinzugefügt werden.");
define('OGP_LANG_areyousure_removeagent', "Möchten Sie den Agenten wirklich entfernen?");
define('OGP_LANG_areyousure_removeagent2', "und alle damit verbundenen Einträge aus der OGP-Datenbank?");
define('OGP_LANG_error_while_remove', "Fehler beim entfernen des Remote-Servers.");
define('OGP_LANG_add_ip', "IP hinzufügen");
define('OGP_LANG_remove_ip', "IP entfernen");
define('OGP_LANG_edit_ip', "IP bearbeiten");
define('OGP_LANG_wrote_changes', "Änderungen erfolgreich gespeichert.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Auf dieser IP-Adresse befinden sich aktive Server.");
define('OGP_LANG_enter_ip_host', "Du musst eine IP Adresse für den Remote-Server angeben.");
define('OGP_LANG_enter_valid_ip', "Sie müssen einen gültigen Port für den Remote-Host eingeben. Der Wert kann zwischen 0 und 65535 liegen, empfohlen wird jedoch ein Wert zwischen 1024 und 65535.");
define('OGP_LANG_could_not_add_server', "Server konnte nicht hinzugefügt werden.");
define('OGP_LANG_to_db', "Zur Datenbank.");
define('OGP_LANG_added_server', "Server");
define('OGP_LANG_with_port', "mit port");
define('OGP_LANG_to_db_succesfully', "erfolgreich zur Datenbank hinzugefügt.");
define('OGP_LANG_unable_discover', "IP's konnten nicht automatisch erkannt werden");
define('OGP_LANG_set_ip_manually', "Sie müssen sie manuell einstellen.");
define('OGP_LANG_found_ips', "Automatisch ermittelte IP's");
define('OGP_LANG_for_remote_server', "für den Remote-Host.");
define('OGP_LANG_failed_add_ip', "Hinzufügen der IP fehlgeschlagen.");
define('OGP_LANG_timeout', "Verbindung unterbrochen.");
define('OGP_LANG_timeout_info', "Das Zeitlimit in Sekunden, um eine Antwort vom Agent zu erhalten.");
define('OGP_LANG_use_nat', "Verwende NAT");
define('OGP_LANG_use_nat_info', "Aktivieren Sie diese Option, wenn Ihr Remote-Server NAT-Regeln verwendet. Verwenden Sie diese Einstellung, wenn Ihre Server auf internen privaten LAN-IP-Adressen laufen, damit das Panel Ihre echte Remote-IP-Adresse zur Abfrage der Server verwendet.");
define('OGP_LANG_arrange_ports', "Ports anordnen");
define('OGP_LANG_assign_new_ports_range_for_ip', "Neuen Anschlussbereich für IP %s zuweisen.");
define('OGP_LANG_assigned_port_ranges_for_ip', "Zugewiesener Anschlussbereich für IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Zugewiesener Port für IP %s");
define('OGP_LANG_unspecified_game_types', "Nicht spezifizierte Spieltypen.");
define('OGP_LANG_start_port', "Startport:");
define('OGP_LANG_end_port', "Endport");
define('OGP_LANG_port_increment', "Port Eingabe:");
define('OGP_LANG_total_assignable_ports', "Verfügbare Ports insgesamt:");
define('OGP_LANG_available_range_ports', "Verfügbare Ports im Bereich:");
define('OGP_LANG_assign_range', "Portbereich zuweisen");
define('OGP_LANG_edit_range', "Portbereich bearbeiten");
define('OGP_LANG_delete_range', "Portbereich entfernt.");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Home Pfad");
define('OGP_LANG_game_type', "Game Typ");
define('OGP_LANG_port', "Port");
define('OGP_LANG_invalid_values', "Ungültiger Wert");
define('OGP_LANG_ports_in_range_already_arranged', "Ports im Bereich bereits eingerichtet.");
define('OGP_LANG_ports_range_already_configured_for', "Portbereich für %s bereits konfiguriert.");
define('OGP_LANG_ports_range_added_successfull_for', "Portbereich für %s erfolgreich hinzugefügt.");
define('OGP_LANG_ports_range_deleted_successfull', "Portbereich erfolgreich gelöscht.");
define('OGP_LANG_ports_range_edited_successfull_for', "Portbereich für %s erfolgreich bearbeitet.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editieren der Firewall für den Remote-Server '%s'");
define('OGP_LANG_default_allowed', "Standart: erlaubt.");
define('OGP_LANG_allow_port_command', "Port-Befehl zulassen");
define('OGP_LANG_deny_port_command', "Port-Befehl verweigern");
define('OGP_LANG_allow_ip_port_command', "Befehl IP:port zulassen");
define('OGP_LANG_deny_ip_port_command', "Befehl IP:port verweigern");
define('OGP_LANG_enable_firewall_command', "Firewall aktivieren command");
define('OGP_LANG_disable_firewall_command', "Firewall deaktivieren command");
define('OGP_LANG_get_firewall_status_command', "Firewall Status command");
define('OGP_LANG_reset_firewall_command', "Firewall zurücksetzen command");
define('OGP_LANG_firewall_status', "Firewall Status");
define('OGP_LANG_save_firewall_settings', "Speichere Firewall Einstellungen");
define('OGP_LANG_reset_firewall', "Firewall zurücksetzen");
define('OGP_LANG_firewall_settings', "Firewall EInstellungen");
define('OGP_LANG_display_public_ip', "Zeige Öffentliche IP");
define('OGP_LANG_ips_can_be_internal_external', "Geben Sie gültige IP-Adressen ein.&nbsp; Es können öffentliche IP-Adressen und interne LAN-IP-Adressen (für NAT-Einrichtungen) verwendet werden.");
?>
