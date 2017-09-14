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

define('add_new_remote_host', "Neue entfernten Host hinzufügen");
define('configured_remote_hosts', "Entfernter Host konfiguriert");
define('remote_host', "Entfernter Host");
define('remote_host_info', "Der entfernte Host muss pingbar sein!");
define('remote_host_port', "Entfernter Host Port");
define('remote_host_port_info', "The port that is listened by the OGP Agent on remote host. Default: 12679.");
define('remote_host_name', "Entfernter Host Name");
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "Der entfernte Hostname wird verwendet, um Benutzern zu helfen, ihre Server zu identifizieren.");
define('add_remote_host', "Entfernten Host hinzufügen");
define('remote_encryption_key', "Entfernter Verschlüsselungs-Schlüssel");
define('remote_encryption_key_info', "Der entfernte Verschlüsselungs-Schlüssel wird verwendet um die Daten zwischen Panel und Agent zu verschlüsseln. Er muss auf beiden Seiten gleich sein.");
define('server_name', "Servername");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent Status");
define('ips', "IPs");
define('add_more_ips', "Wenn Sie mehr als eine IP eingeben möchten drücken Sie bitte 'IPs setzen', wenn alle Felder ausgefüllt sind.  Ein neues Feld wird erscheinen.");
define('encryption_key_mismatch', "Der Verschlüsselungsschlüssel stimmt nicht mit dem Agenten überein. Bitte überprüfen Sie die Agentenkonfiguration.
");
define('no_ip_for_remote_host', "Sie müssen mindestens eine (1) IP Adresse für jeden Remotehost hinzufügen.");
define('note_remote_host', "A remote host is a server where the OGP Agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Unknown error - status_chk returned");
define('remote_host_user_name', "UNIX Benutzer");
define('remote_host_user_name_info', "Benutzername, in dem der Agent läuft. Beispiel: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current Agent.");
define('remote_host_ftp_port', "FTP Port");
define('remote_host_ftp_port_info', "The FTP server <b>port</b> for the current Agent.");
define('view_log', "Protokoll anzeigen");
define('status', "Status");
define('stop_firewall', "Firewall anhalten");
define('start_firewall', "Firewall starten");
define('seconds', "Sekunden");
define('reboot', "Remote Server Reboot");
define('restart', "Agent neu starten");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the Agent named '%s'?");
define('restarting', "Restarting Agent... Please wait.");
define('restarted', "Agent wurde erfolgreich neu gestartet.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('remote_host_removed', "Remote host called '%s' removed successfully.");
define('editing_remote_server', "Editing remote server called '%s'");
define('remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('save_settings', "Einstellungen speichern");
define('set_ips', "IPs setzen");
define('remote_ip', "Remote IP");
define('remote_ips_for', "Remote IPs for server called '%s'");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('could_not_remove_ip', "Could not remove old IP's from database.");
define('could_add_ip', "Could add remote server IP to database.");
define('areyousure_removeagent', "Are you sure you want to remove the Agent called");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Error occurred while removing remote server.");
define('add_ip', "IP hinzufügen");
define('remove_ip', "IP entfernen");
define('edit_ip', "IP bearbeiten");
define('wrote_changes', "Changes saved successfully.");
define('there_are_servers_running_on_this_ip', "There are servers running on this IP address.");
define('enter_ip_host', "You must enter IP for the remote host.");
define('enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('could_not_add_server', "Could not add server");
define('to_db', "Zur Datenbank.");
define('added_server', "Added server");
define('with_port', "mit port");
define('to_db_succesfully', "to the database successfully.");
define('unable_discover', "Unable to auto discover IPs on");
define('set_ip_manually', "You'll have to set them manually.");
define('found_ips', "Found IPs");
define('for_remote_server', "for the remote server.");
define('failed_add_ip', "Failed to add IP");
define('timeout', "Time Out");
define('timeout_info', "The time limit in seconds to get response from this Agent.");
define('use_nat', "Use NAT");
define('use_nat_info', "Activate if your remote server is using NAT rules.");
define('arrange_ports', "Arrange ports");
define('assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('assigned_ports_for_ip', "Assigned ports for IP %s");
define('unspecified_game_types', "Unspecified game types");
define('start_port', "Start port:");
define('end_port', "End port:");
define('port_increment', "Port increment:");
define('total_assignable_ports', "Total assignable ports:");
define('available_range_ports', "Available range ports:");
define('assign_range', "Assign range");
define('edit_range', "Edit range");
define('delete_range', "Delete range");
define('home_id', "Home ID");
define('home_path', "Home Pfad");
define('game_type', "Game Typ");
define('port', "Port");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfully.");
define('ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('default_allowed', "Allowed by default");
define('allow_port_command', "Allow port command");
define('deny_port_command', "Deny port command");
define('allow_ip_port_command', "Allow IP:port command");
define('deny_ip_port_command', "Deny IP:port command");
define('enable_firewall_command', "Enable firewall command");
define('disable_firewall_command', "Disable firewall command");
define('get_firewall_status_command', "Get firewall status command");
define('reset_firewall_command', "Reset firewall command");
define('firewall_status', "Firewall status");
define('save_firewall_settings', "Save firewall settings");
define('reset_firewall', "Reset Firewall");
define('firewall_settings', "Firewall Settings");
define('display_public_ip', "Display Public IP");
?>