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

// servers.php
define('add_new_remote_host', "Dodaj nowe Zdalnego Host");
define('configured_remote_hosts', "Skonfigurowane zdalnych hostach");
define('remote_host', "Zdalnego Host");
define('remote_host_info', "Zdalny host musi być pingable hosta!");
define('remote_host_port', "Port zdalnego komputera");
define('remote_host_port_info', "Port, który jest słuchany przez podmiot OGP na zdalnym hoście. Domyślnie: 12.679.");
define('remote_host_name', "Nazwa zdalnego komputera");
define('remote_host_name_info', "Nazwa zdalnego komputera jest używana, aby pomóc użytkownikom w określeniu ich serwerów.");
define('add_remote_host', "Dodaj Zdalnego Host");
define('remote_encryption_key', "Klucz szyfrowania zdalnego");
define('remote_encryption_key_info', "Klucza szyfrowania Remote służy do szyfrowania danych między stron internetowych i agencji. Ten klucz musi być jakiś na obu końcach.");
define('server_name', "Nazwa Serwera");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent status");
define('ips', "IPs");
define('add_more_ips', "Jeśli chcesz, aby wprowadzić więcej prasy IPs Set IP, gdy wszystkie pola są pełne i puste pole pojawi się.");
define('encryption_key_mismatch', "Klucz szyfrowania nie zgadza się z agentem. Ponownie sprawdzić swoje pliki konfiguracyjne.");
define('no_ip_for_remote_host', "Należy dodać co najmniej jednego (1) adres IP dla każdego zdalnego komputera.");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "User name where agent is running. Example: Jonhy");
define('ogp_user', remote_host_user_name);
define('ogp_user_info', remote_host_user_name_info);
define('add_ip', "Add IP");
define('remove_ip', "Remove IP");
define('edit_ip', "Edit IP");
define('remote_ip', "Remote IP");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "Serwer FTP <b>IP</b> dla obecnego agenta.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "Serwer FTP <b>Port</b> dla obecnego agenta.");
define('view_log', "logs");
define('timeout', "TimeOut");
define('timeout_info', "Sekund.Termin, aby uzyskać odpowiedź od tego agenta.");
define('use_nat', "Użyj NAT");
define('use_nat_info', "Włącz, jeśli zdalny serwer używa reguły NAT.");
define('status', "Status:");
define('stop_firewall', "Stop Firewall");
define('start_firewall', "Start Firewall");
define('wrote_changes', "Wrote changes successfully.");
define('there_are_servers_running_on_this_ip', "There are servers running on this IP address.");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");

// arrange_servers.php
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
define('seconds', "seconds");
define('home_path', "Home path");
define('game_type', "Game type");
define('port', "Port");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfull for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfull.");
define('ports_range_edited_successfull_for', "Ports range edited successfull for %s.");
define('note_remote_host', 'Note remote host');
define('ip_administration', 'Ip administration');
define('unknown_error', 'Unknown error');
define('invalid_remote_host_id', 'Invalid remote host id');
define('remote_host_removed', 'Remote host removed');
define('editing_remote_server', 'Editing remote server');
define('remote_server_settings_changed', 'Remote server settings changed');
define('save_settings', 'Save settings');
define('set_ips', 'Set ips');
define('remote_ips_for', 'Remote ips for');
define('ips_set_for_server', 'Ips set for server');
define('could_not_remove_ip', 'Could not remove ip');
define('could_add_ip', 'Could add ip');
define('areyousure_removeagent', 'Areyousure removeagent');
define('areyousure_removeagent2', 'Areyousure removeagent2');
define('error_while_remove', 'Error while remove');
define('enter_ip_host', 'Enter ip host');
define('enter_valid_ip', 'Enter valid ip');
define('could_not_add_server', 'Could not add server');
define('to_db', 'To db');
define('added_server', 'Added server');
define('with_port', 'With port');
define('to_db_succesfully', 'To db succesfully');
define('unable_discover', 'Unable discover');
define('set_ip_manually', 'Set ip manually');
define('found_ips', 'Found ips');
define('for_remote_server', 'For remote server');
define('failed_add_ip', 'Failed add ip');
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named \"%s\"");
define('default_allowed', "Default allowed");
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
?>