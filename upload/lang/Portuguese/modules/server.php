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
$lang['add_new_remote_host'] = "Add New Remote Host";
$lang['configured_remote_hosts'] = "Configured Remote Hosts";
$lang['remote_host'] = "Remote Host";
$lang['remote_host_info'] = "The remote host must be a pingable hostname!";
$lang['remote_host_port'] = "Remote Host Port";
$lang['remote_host_port_info'] = "The port that is listened by the OGP agent on remote host. Default: 12679.";
$lang['remote_host_name'] = "Remote Host Name";
$lang['remote_host_name_info'] = "Remote host name is used to help users to identify their servers.";
$lang['add_remote_host'] = "Add Remote Host";
$lang['offline'] = "Offline";
$lang['online'] = "Online";
$lang['remote_encryption_key'] = "Remote Encryption Key";
$lang['remote_encryption_key_info'] = "Remote encryption key is used to encrypt the data between the webpages and the agent. This key must be some in both ends.";
$lang['server_name'] = "Server Name";
$lang['agent_ip_port'] = "Agent IP:Port";
$lang['encryption_key'] = "Encryption Key";
$lang['agent_status'] = "Agent Status";
$lang['ips'] = "IPs";
$lang['add_more_ips'] = "If you want to enter more IPs press 'Set IPs' when all fields are full and an empty field will appear.";
$lang['encryption_key_mismatch'] = "Encryption key does not match with the agent. Recheck your configuration files.";
$lang['no_ip_for_remote_host'] = "You need to add at least one (1) IP address for each remote host.";
$lang['note_remote_host'] = "A remote host is a server where the OGP agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.";
$lang['remote_host_user_name'] = "UNIX user";
$lang['remote_host_user_name_info'] = "User name where agent is running. Example: Jonhy";
$lang['ogp_user'] = $lang['remote_host_user_name'];
$lang['ogp_user_info'] = $lang['remote_host_user_name_info'];
$lang['view_log'] = "Mostrar log";
$lang['ufw'] = "UFW";
$lang['status'] = "Status:";
$lang['stop_firewall'] = "Stop Firewall";
$lang['start_firewall'] = "Start Firewall";
$lang['seconds'] = "Seconds";

// edit_server.php
$lang['invalid_remote_host_id'] = "Invalid remote host id '%s' given.";
$lang['remote_host_removed'] = "Remote host called '%s' removed successfully.";
$lang['editing_remote_server'] = "Editing remote server called '%s'";
$lang['remote_server_settings_changed'] = "Changed settings for remote server '%s' successfully.";
$lang['save_settings'] = "Save Settings";
$lang['set_ips'] = "Set IPs";
$lang['remote_ips'] = "Remote IP";
$lang['remote_ips_for'] = "Remote IPs for server called '%s'";
$lang['ips_set_for_server'] = "IPs set for server called '%s' successfully.";
$lang['add_ip'] = "Add IP";
$lang['remove_ip'] = "Remove IP";
$lang['edit_ip'] = "Edit IP";
$lang['remote_host_ftp_ip'] = "FTP IP";
$lang['remote_host_ftp_ip_info'] = "The FTP server <b>IP</b> for the current agent.";
$lang['remote_host_ftp_port'] = "FTP port";
$lang['remote_host_ftp_port_info'] = "The FTP server <b>port</b> for the current agent.";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang['timeout'] = "TimeOut";
$lang['timeout_info'] = "Limitar em segundos em que o agente responde.";
$lang['use_nat'] = "Usar NAT";
$lang['use_nat_info'] = "Activate se o servidor remoto está usando regras de NAT.";
$lang['wrote_changes'] = "Wrote changes successfully.";
$lang['there_are_servers_running_on_this_ip'] = "There are servers running on this IP address.";

// arrange_servers.php
$lang['arrange_ports'] = "Arrange ports";
$lang['assign_new_ports_range_for_ip'] = "Assign new ports range for IP %s";
$lang['assigned_port_ranges_for_ip'] = "Assigned port ranges for IP %s";
$lang['assigned_ports_for_ip'] = "Assigned ports for IP %s";
$lang['unspecified_game_types'] = "Unspecified game types";
$lang['start_port'] = "Start port:";
$lang['end_port'] = "End port:";
$lang['port_increment'] = "Port increment:";
$lang['total_assignable_ports'] = "Total assignable ports:";
$lang['available_range_ports'] = "Available range ports:";
$lang['assign_range'] = "Assign range";
$lang['edit_range'] = "Edit range";
$lang['delete_range'] = "Delete range";
$lang['home_id'] = "Home ID";
$lang['seconds'] = "seconds";
$lang['home_path'] = "Home path";
$lang['game_type'] = "Game type";
$lang['port'] = "Port";
$lang['invalid_values'] = "Invalid values.";
$lang['ports_in_range_already_arranged'] = "Ports in range already arranged.";
$lang['ports_range_already_configured_for'] = "Ports range already configured for %s.";
$lang['ports_range_added_successfull_for'] = "Ports range added successfull for %s.";
$lang['ports_range_deleted_successfull'] = "Ports range deleted successfull.";
$lang['ports_range_edited_successfull_for'] = "Ports range edited successfull for %s.";

?>
