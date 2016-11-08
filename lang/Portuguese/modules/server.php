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
define('add_new_remote_host', "Add New Remote Host");
define('configured_remote_hosts', "Configured Remote Hosts");
define('remote_host', "Remote Host");
define('remote_host_info', "The remote host must be a pingable hostname!");
define('remote_host_port', "Remote Host Port");
define('remote_host_port_info', "The port that is listened by the OGP agent on remote host. Default: 12679.");
define('remote_host_name', "Remote Host Name");
define('remote_host_name_info', "Remote host name is used to help users to identify their servers.");
define('add_remote_host', "Add Remote Host");
define('remote_encryption_key', "Remote Encryption Key");
define('remote_encryption_key_info', "Remote encryption key is used to encrypt the data between the webpages and the agent. This key must be some in both ends.");
define('server_name', "Server Name");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent Status");
define('ips', "IPs");
define('add_more_ips', "If you want to enter more IPs press 'Set IPs' when all fields are full and an empty field will appear.");
define('encryption_key_mismatch', "Encryption key does not match with the agent. Recheck your configuration files.");
define('no_ip_for_remote_host', "You need to add at least one (1) IP address for each remote host.");
define('note_remote_host', "A remote host is a server where the OGP agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "User name where agent is running. Example: Jonhy");
define('ogp_user', remote_host_user_name);
define('ogp_user_info', remote_host_user_name_info);
define('view_log', "Mostrar log");
define('status', "Status:");
define('stop_firewall', "Stop Firewall");
define('start_firewall', "Start Firewall");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");

// edit_server.php
define('invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('remote_host_removed', "Remote host called '%s' removed successfully.");
define('editing_remote_server', "Editing remote server called '%s'");
define('remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('save_settings', "Save Settings");
define('set_ips', "Set IPs");
define('remote_ips_for', "Remote IPs for server called '%s'");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('add_ip', "Add IP");
define('remove_ip', "Remove IP");
define('edit_ip', "Edit IP");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current agent.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "The FTP server <b>port</b> for the current agent.");
define('timeout', "TimeOut");
define('timeout_info', "Limitar em segundos em que o agente responde.");
define('use_nat', "Usar NAT");
define('use_nat_info', "Activate se o servidor remoto está usando regras de NAT.");
define('wrote_changes', "Wrote changes successfully.");
define('there_are_servers_running_on_this_ip', "There are servers running on this IP address.");

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
define('ip_administration', 'Ip administration');
define('unknown_error', 'Unknown error');
define('remote_ip', 'Remote ip');
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

// Firewall
define('editing_firewall_for_remote_server', 'Editing Firewall for remote server named "%s"');
define('default_allowed', 'Default allowed');
define('allow_port_command', 'Allow port command');
define('deny_port_command', 'Deny port command');
define('allow_ip_port_command', 'Allow IP:port command');
define('deny_ip_port_command', 'Deny IP:port command');
define('enable_firewall_command', 'Enable firewall command');
define('disable_firewall_command', 'Disable firewall command');
define('get_firewall_status_command', 'Get firewall status command');
define('reset_firewall_command', 'Reset firewall command');
define('firewall_status', 'Firewall status');
define('save_firewall_settings', 'Save firewall settings');
define('reset_firewall', 'Reset Firewall');
define('firewall_settings', 'Firewall Settings');
?>