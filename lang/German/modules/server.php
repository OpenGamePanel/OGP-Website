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

define('OGP_LANG_add_new_remote_host', "Neue entfernten Host hinzufügen");
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
define('OGP_LANG_note_remote_host', "A remote host is a server where the OGP Agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('OGP_LANG_ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('OGP_LANG_unknown_error', "Unknown error - status_chk returned");
define('OGP_LANG_remote_host_user_name', "UNIX Benutzer");
define('OGP_LANG_remote_host_user_name_info', "Benutzername, in dem der Agent läuft. Beispiel: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current Agent.");
define('OGP_LANG_remote_host_ftp_port', "FTP Port");
define('OGP_LANG_remote_host_ftp_port_info', "The FTP server <b>port</b> for the current Agent.");
define('OGP_LANG_view_log', "Protokoll anzeigen");
define('OGP_LANG_status', "Status");
define('OGP_LANG_stop_firewall', "Firewall anhalten");
define('OGP_LANG_start_firewall', "Firewall starten");
define('OGP_LANG_seconds', "Sekunden");
define('OGP_LANG_reboot', "Entfernten Server neu starten");
define('OGP_LANG_restart', "Agent neu starten");
define('OGP_LANG_confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('OGP_LANG_confirm_restart', "Are you sure you want to restart the Agent named '%s'?");
define('OGP_LANG_restarting', "Agent Startet neu... Bitte warten.");
define('OGP_LANG_restarted', "Agent wurde erfolgreich neu gestartet.");
define('OGP_LANG_reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('OGP_LANG_invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('OGP_LANG_remote_host_removed', "Remote host called '%s' removed successfully.");
define('OGP_LANG_editing_remote_server', "Editing remote server called '%s'");
define('OGP_LANG_remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('OGP_LANG_save_settings', "Einstellungen speichern");
define('OGP_LANG_set_ips', "IPs setzen");
define('OGP_LANG_remote_ip', "Entfernte IP");
define('OGP_LANG_remote_ips_for', "IPs for Game Servers To Use on Agent Server '%s'");
define('OGP_LANG_ips_set_for_server', "IPs für den Server '%s' erfolgreich gesetzt.");
define('OGP_LANG_could_not_remove_ip', "Konnte alte IPs nicht aus der Datenbank entfernen.");
define('OGP_LANG_could_add_ip', "Could add remote server IP to database.");
define('OGP_LANG_areyousure_removeagent', "Are you sure you want to remove the Agent called");
define('OGP_LANG_areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('OGP_LANG_error_while_remove', "Error occurred while removing remote server.");
define('OGP_LANG_add_ip', "IP hinzufügen");
define('OGP_LANG_remove_ip', "IP entfernen");
define('OGP_LANG_edit_ip', "IP bearbeiten");
define('OGP_LANG_wrote_changes', "Änderungen erfolgreich gespeichert.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "There are servers running on this IP address.");
define('OGP_LANG_enter_ip_host', "Du musst eine IP Adresse für den entfernten Server angeben.");
define('OGP_LANG_enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('OGP_LANG_could_not_add_server', "Konnte Server nicht hinzufügen");
define('OGP_LANG_to_db', "Zur Datenbank.");
define('OGP_LANG_added_server', "Server");
define('OGP_LANG_with_port', "mit port");
define('OGP_LANG_to_db_succesfully', "erfolgreich in die Datenbank eingefügt.");
define('OGP_LANG_unable_discover', "Unable to auto discover IPs on");
define('OGP_LANG_set_ip_manually', "You'll have to set them manually.");
define('OGP_LANG_found_ips', "Gefundene IPs");
define('OGP_LANG_for_remote_server', "for the remote server.");
define('OGP_LANG_failed_add_ip', "Failed to add IP");
define('OGP_LANG_timeout', "Time Out");
define('OGP_LANG_timeout_info', "The time limit in seconds to get response from this Agent.");
define('OGP_LANG_use_nat', "Use NAT");
define('OGP_LANG_use_nat_info', "Enable if your remote server is using NAT rules. Use this setting if your game servers are running on internal private LAN IP addresses so that the panel will use your real remote IP address to query the game servers.");
define('OGP_LANG_arrange_ports', "Arrange ports");
define('OGP_LANG_assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Assigned ports for IP %s");
define('OGP_LANG_unspecified_game_types', "Unspecified game types");
define('OGP_LANG_start_port', "Start port:");
define('OGP_LANG_end_port', "End port:");
define('OGP_LANG_port_increment', "Port increment:");
define('OGP_LANG_total_assignable_ports', "Total assignable ports:");
define('OGP_LANG_available_range_ports', "Available range ports:");
define('OGP_LANG_assign_range', "Assign range");
define('OGP_LANG_edit_range', "Edit range");
define('OGP_LANG_delete_range', "Delete range");
define('OGP_LANG_home_id', "Home ID");
define('OGP_LANG_home_path', "Home Pfad");
define('OGP_LANG_game_type', "Game Typ");
define('OGP_LANG_port', "Port");
define('OGP_LANG_invalid_values', "Invalid values.");
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
