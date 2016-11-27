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

define('add_new_remote_host', "Új távoli kiszolgáló hozzáadása");
define('configured_remote_hosts', "Beállított távoli kiszolgáló");
define('remote_host', "Távoli kiszolgáló");
define('remote_host_info', "A távoli kiszolgálónak pingelheto címmel kell rendelkeznie!");
define('remote_host_port', "távoli kiszolgáló portja");
define('remote_host_port_info', "A port amin a távoli kiszolgáló OGP kliense figyel. Alapbeállítás: 12679.");
define('remote_host_name', "Távoli hoszt név");
define('remote_host_name_info', "Távoli hoszt neve segít azonosítani a felhasználóknak a szervereiket.");
define('add_remote_host', "Távoli kiszolgáló hozzáadása");
define('remote_encryption_key', "Távoli kiszolgáló kódoló kulcsa (Encryption Key)");
define('remote_encryption_key_info', "Kódoló kulcs alapján kódolódik a távoli szerver és a weboldal közötti kommunikáció. A kódoló kulcsnak meg kell egyeznie a kiszolgálón és a weboldalon is.");
define('server_name', "Szerver név");
define('agent_ip_port', "Kiszolgáló IP:Port");
define('agent_status', "Kiszolgáló státusza");
define('ips', "IP-k");
define('add_more_ips', "Ha több IP-t akarsz megadni akkor kattints az 'IP-k beállítása' gombra miután minden mezot kitöltöttél, ezután megjelenik egy üres mezo a kövezkeo IP hozzáadásához.");
define('encryption_key_mismatch', "A megadott kódoló kulcs nem egyezik a kiszolgálón megadottal. Ellenorizd a beállításokat.");
define('no_ip_for_remote_host', "Legalább 1 IP-t meg kell adnod minden egyes távoli kiszolgálóhoz.");
define('note_remote_host', "A remote host is a server where the OGP agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Unknown error - status_chk returned");
define('remote_host_user_name', "UNIX felhasználó");
define('remote_host_user_name_info', "Felhasználó neve, ahol ügynök fut. Példa: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "Az FTP szerver <b>IP</b> az aktuális agent.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "Az FTP szerver <b>port</b> az aktuális agent.");
define('view_log', "Log nézése");
define('status', "Status");
define('stop_firewall', "Tűzfal leállítása");
define('start_firewall', "Tűzfal elindítása");
define('seconds', "Másodperc");
define('reboot', "Újraindítás szerveren");
define('restart', "Újraindítás ügynök");
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
define('remote_ip', "Távoli IP");
define('remote_ips_for', "Remote IPs for server called '%s'");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('could_not_remove_ip', "Could not remove old IP's from database.");
define('could_add_ip', "Could add remote server IP to database.");
define('areyousure_removeagent', "Are you sure you want to remove the agent called");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Error occurred while removing remote server.");
define('add_ip', "IP hozzáadá");
define('remove_ip', "IP törlés");
define('edit_ip', "IP szerkesztés");
define('wrote_changes', "Wrote changes successfully.");
define('there_are_servers_running_on_this_ip', "Vannak szerverek ami fut az IP-címen.");
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
define('timeout', "Időtúllépés");
define('timeout_info', "Másodperc. A határidőt kap választ az ügynök.");
define('use_nat', "NAT használta");
define('use_nat_info', "engedélyezése, ha a távoli szerver NAT mögött.");
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
define('home_id', "Azonosító");
define('home_path', "Elérési útvonal");
define('game_type', "Játék típus");
define('port', "Port");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfull for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfull.");
define('ports_range_edited_successfull_for', "Ports range edited successfull for %s.");
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