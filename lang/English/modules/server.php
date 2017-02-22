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

define('add_new_remote_host', "Add New Remote Host");
define('configured_remote_hosts', "Configured Remote Host");
define('remote_host', "Remote Host");
define('remote_host_info', "The remote host must be a pingable hostname!");
define('remote_host_port', "Remote Host Port");
define('remote_host_port_info', "The port that is listened by the OGP agent on remote host. Default: 12679.");
define('remote_host_name', "Remote Host Name");
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "Remote host name is used to help users to identify their servers.");
define('add_remote_host', "Add Remote Host");
define('remote_encryption_key', "Remote Encryption Key");
define('remote_encryption_key_info', "Remote encryption key is used to encrypt the data between the Panel and Agent. This key must be same in both sides.");
define('server_name', "Server Name");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent Status");
define('ips', "IPs");
define('add_more_ips', "If you want to enter more IPs press 'Set IPs' when all fields are full and an empty field will appear.");
define('encryption_key_mismatch', "Encryption key does not match with the Agent. Please recheck your Agent configuration.");
define('no_ip_for_remote_host', "You need to add at least one (1) IP address for each remote host.");
define('note_remote_host', "A remote host is a server where the OGP agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Unknown error - status_chk returned");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "Username where the Agent is running. Example: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current agent.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "The FTP server <b>port</b> for the current agent.");
define('view_log', "View log");
define('status', "Status");
define('stop_firewall', "Stop Firewall");
define('start_firewall', "Start Firewall");
define('seconds', "Seconds");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('remote_host_removed', "Remote host called '%s' removed successfully.");
define('editing_remote_server', "Editing remote server called '%s'");
define('remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('save_settings', "Save Settings");
define('set_ips', "Set IPs");
define('remote_ip', "Remote IP");
define('remote_ips_for', "Remote IPs for server called '%s'");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('could_not_remove_ip', "Could not remove old IP's from database.");
define('could_add_ip', "Could add remote server IP to database.");
define('areyousure_removeagent', "Are you sure you want to remove the agent called");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Error occurred while removing remote server.");
define('add_ip', "Add IP");
define('remove_ip', "Remove IP");
define('edit_ip', "Edit IP");
define('wrote_changes', "Changes saved successfully.");
define('there_are_servers_running_on_this_ip', "There are servers running on this IP address.");
define('enter_ip_host', "You must enter IP for the remote host.");
define('enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('could_not_add_server', "Could not add server");
define('to_db', "to the database.");
define('added_server', "Added server");
define('with_port', "with port");
define('to_db_succesfully', "to the database successfully.");
define('unable_discover', "Unable to auto discover IPs on");
define('set_ip_manually', "You'll have to set them manually.");
define('found_ips', "Found IPs");
define('for_remote_server', "for the remote server.");
define('failed_add_ip', "Failed to add IP");
define('timeout', "Time Out");
define('timeout_info', "Seconds. The time limit to get response from this agent.");
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
define('home_path', "Home path");
define('game_type', "Game type");
define('port', "Port");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfully.");
define('ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
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