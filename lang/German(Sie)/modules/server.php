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

define('OGP_LANG_add_new_remote_host', "Neuen entfernten Host hinzufügen");
define('OGP_LANG_configured_remote_hosts', "Entfernter Host konfiguriert");
define('OGP_LANG_remote_host', "Entfernter Host");
define('OGP_LANG_remote_host_info', "Der entfernte Host muss pingbar sein!");
define('OGP_LANG_remote_host_port', "Entfernter Host Port");
define('OGP_LANG_remote_host_port_info', "Der Port, der vom OGP-Agent auf dem Remote-Host überwacht wird. Standard: 12679.");
define('OGP_LANG_remote_host_name', "Entfernter Host Name");
define('OGP_LANG_ogp_user', "OGP Agent Nutzername");
define('OGP_LANG_remote_host_name_info', "Der entfernte Hostname wird verwendet, um Benutzern zu helfen, ihre Server zu identifizieren.");
define('OGP_LANG_add_remote_host', "Entfernten Host hinzufügen");
define('OGP_LANG_remote_encryption_key', "Entfernter Verschlüsselungs-Schlüssel");
define('OGP_LANG_remote_encryption_key_info', "Der entfernte Verschlüsselungs-Schlüssel wird verwendet um die Daten zwischen Panel und Agent zu verschlüsseln. Er muss auf beiden Seiten gleich sein.");
define('OGP_LANG_server_name', "Servername");
define('OGP_LANG_agent_ip_port', "Agent IP:Port");
define('OGP_LANG_agent_status', "Agent Status");
define('OGP_LANG_ips', "IPs");
define('OGP_LANG_add_more_ips', "Wenn Sie mehr als eine IP eingeben möchten drücken Sie bitte 'IPs setzen', wenn alle Felder ausgefüllt sind.  Ein neues Feld wird erscheinen.");
define('OGP_LANG_encryption_key_mismatch', "Der Verschlüsselungsschlüssel stimmt nicht mit dem Agenten überein. Bitte überprüfen Sie die Agentenkonfiguration.
");
define('OGP_LANG_no_ip_for_remote_host', "Sie müssen mindestens eine (1) IP Adresse für jeden Remotehost hinzufügen.");
define('OGP_LANG_note_remote_host', "Ein Remote-Host ist ein Server, auf dem der OGP-Agent ausgeführt wird. Jeder Host kann mehrere IP-Adressen haben, an die Benutzer Server binden können.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "Unbekanter Fehler - status_chk returned");
define('OGP_LANG_remote_host_user_name', "UNIX Benutzer");
define('OGP_LANG_remote_host_user_name_info', "Benutzername, in dem der Agent läuft. Beispiel: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "Der FTP-Server <b>IP</b> für den aktuellen Agenten.");
define('OGP_LANG_remote_host_ftp_port', "FTP Port");
define('OGP_LANG_remote_host_ftp_port_info', "Der FTP-Server <b>port</b> für den aktuellen Agenten.");
define('OGP_LANG_view_log', "Protokoll anzeigen");
define('OGP_LANG_status', "Status");
define('OGP_LANG_stop_firewall', "Firewall anhalten");
define('OGP_LANG_start_firewall', "Firewall starten");
define('OGP_LANG_seconds', "Sekunden");
define('OGP_LANG_reboot', "Entfernten Server neu starten");
define('OGP_LANG_restart', "Agent neu starten");
define('OGP_LANG_confirm_reboot', "Sind Sie sicher, dass Sie den gesamten physischen Server mit dem Namen '%s' neu starten möchten ?");
define('OGP_LANG_confirm_restart', "Sind Sie sicher, dass Sie den Agenten mit dem Namen '%s' neu starten möchten ?");
define('OGP_LANG_restarting', "Agent Startet neu... Bitte warten.");
define('OGP_LANG_restarted', "Agent wurde erfolgreich neu gestartet.");
define('OGP_LANG_reboot_success', "Server '%s' wurde erfolgreich neu gestartet. Es besteht kein Zugriff , bis der Server wieder vollständig hochgefahren ist.");
define('OGP_LANG_invalid_remote_host_id', "Ungültige Remote-Host-ID '%s' angegeben.");
define('OGP_LANG_remote_host_removed', "Remote-Host namens '%s' wurde erfolgreich entfernt.");
define('OGP_LANG_editing_remote_server', "Bearbeiten des Remote-Servers namens '%s'");
define('OGP_LANG_remote_server_settings_changed', "Einstellungen für Remote-Server '%s' erfolgreich geändert.");
define('OGP_LANG_save_settings', "Einstellungen speichern");
define('OGP_LANG_set_ips', "IPs setzen");
define('OGP_LANG_remote_ip', "Entfernte IP");
define('OGP_LANG_remote_ips_for', "IPs für Gameserver zur Verwendung auf dem Agentenserver '%s'");
define('OGP_LANG_ips_set_for_server', "IPs für den Server '%s' erfolgreich gesetzt.");
define('OGP_LANG_could_not_remove_ip', "Konnte alte IPs nicht aus der Datenbank entfernen.");
define('OGP_LANG_could_add_ip', "Könnte die IP des Remote-Servers zur Datenbank hinzufügen.");
define('OGP_LANG_areyousure_removeagent', "Möchten Sie den angerufenen Agenten wirklich entfernen ?");
define('OGP_LANG_areyousure_removeagent2', "und alle damit verbundenen homes aus der OGP-Datenbank ?
");
define('OGP_LANG_error_while_remove', "Beim Entfernen des Remoteservers ist ein Fehler aufgetreten.");
define('OGP_LANG_add_ip', "IP hinzufügen");
define('OGP_LANG_remove_ip', "IP entfernen");
define('OGP_LANG_edit_ip', "IP bearbeiten");
define('OGP_LANG_wrote_changes', "Änderungen erfolgreich gespeichert.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Auf dieser IP-Adresse laufen Server.");
define('OGP_LANG_enter_ip_host', "Sie müssen eine IP Adresse für den entfernten Server angeben.");
define('OGP_LANG_enter_valid_ip', "Sie müssen einen gültigen Port für den Remote-Host eingeben. Der Portwert kann zwischen 0 und 65535 liegen, die Empfehlung liegt jedoch zwischen 1024 und 65535.");
define('OGP_LANG_could_not_add_server', "Konnte Server nicht hinzufügen");
define('OGP_LANG_to_db', "Zur Datenbank.");
define('OGP_LANG_added_server', "Server");
define('OGP_LANG_with_port', "mit port");
define('OGP_LANG_to_db_succesfully', "erfolgreich in die Datenbank eingefügt.");
define('OGP_LANG_unable_discover', "IPs können nicht automatisch erkannt werden");
define('OGP_LANG_set_ip_manually', "Sie müssen sie manuell einstellen.");
define('OGP_LANG_found_ips', "Gefundene IPs");
define('OGP_LANG_for_remote_server', "für den Remote-Server.");
define('OGP_LANG_failed_add_ip', "IP konnte nicht hinzugefügt werden");
define('OGP_LANG_timeout', "Zeitüberschreitung");
define('OGP_LANG_timeout_info', "Das Zeitlimit in Sekunden, um eine Antwort von diesem Agenten zu erhalten.");
define('OGP_LANG_use_nat', "Nutze NAT");
define('OGP_LANG_use_nat_info', "Aktivieren Sie diese Option, wenn Ihr Remoteserver NAT-Regeln verwendet. Verwenden Sie diese Einstellung, wenn Ihre Gameserver auf internen privaten LAN-IP-Adressen laufen, damit das Panel Ihre echte Remote-IP-Adresse verwendet, um die Gameserver abzufragen.
");
define('OGP_LANG_arrange_ports', "Zuweisbare Ports");
define('OGP_LANG_assign_new_ports_range_for_ip', "Neuen Portbereich für IP %s anlegen.");
define('OGP_LANG_assigned_port_ranges_for_ip', "Portbereich für IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Zugewiesene Ports für IP %s");
define('OGP_LANG_unspecified_game_types', "Unbekannter Spiele Typ");
define('OGP_LANG_start_port', "Erster Port:");
define('OGP_LANG_end_port', "Letzter Port:");
define('OGP_LANG_port_increment', "Port increment:");
define('OGP_LANG_total_assignable_ports', "Insgesamt zuweisbare Ports:");
define('OGP_LANG_available_range_ports', "Verfügbare zuweisbare Ports:");
define('OGP_LANG_assign_range', "Zuweisung");
define('OGP_LANG_edit_range', "Bearbeite Zuweisung");
define('OGP_LANG_delete_range', "Lösche Zuweisung");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Home Pfad");
define('OGP_LANG_game_type', "Game Typ");
define('OGP_LANG_port', "Port");
define('OGP_LANG_invalid_values', "Fehlerhafter Wert.");
define('OGP_LANG_ports_in_range_already_arranged', "Ports in range already arranged.");
define('OGP_LANG_ports_range_already_configured_for', "Ports range already configured for %s.");
define('OGP_LANG_ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Ports range deleted successfully.");
define('OGP_LANG_ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('OGP_LANG_default_allowed', "Allowed by default");
define('OGP_LANG_allow_port_command', "Allow port command");
define('OGP_LANG_deny_port_command', "Deny port command");
define('OGP_LANG_allow_ip_port_command', "Allow IP:port command");
define('OGP_LANG_deny_ip_port_command', "Deny IP:port command");
define('OGP_LANG_enable_firewall_command', "Firewall aktivieren command");
define('OGP_LANG_disable_firewall_command', "Firewall deaktivieren command");
define('OGP_LANG_get_firewall_status_command', "Firewall Status command");
define('OGP_LANG_reset_firewall_command', "Firewall zurücksetzen command");
define('OGP_LANG_firewall_status', "Firewall Status");
define('OGP_LANG_save_firewall_settings', "Speichere Firewall Einstellungen");
define('OGP_LANG_reset_firewall', "Firewall zurücksetzen");
define('OGP_LANG_firewall_settings', "Firewall EInstellungen");
define('OGP_LANG_display_public_ip', "Zeige Öffentliche IP");
define('OGP_LANG_ips_can_be_internal_external', "Enter usable IP addresses.&nbsp; Public IP addresses and internal LAN IP addresses (for NAT setups) can be used.");
?>
