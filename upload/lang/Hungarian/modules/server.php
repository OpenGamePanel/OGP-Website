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
$lang['add_new_remote_host'] = "Távoli kiszolgáló hozzáadása";
$lang['configured_remote_hosts'] = "Beállított távoli kiszolgálók";
$lang['remote_host'] = "Távoli kiszolgáló";
$lang['remote_host_info'] = "A távoli kiszolgálónak pingelheto címmel kell rendelkeznie!";
$lang['remote_host_port'] = "távoli kiszolgáló portja";
$lang['remote_host_port_info'] = "A port amin a távoli kiszolgáló OGP kliense figyel. Alapbeállítás: 12679.";
$lang['remote_host_name'] = "Távoli hoszt név";
$lang['remote_host_name_info'] = "Távoli hoszt neve segít azonosítani a felhasználóknak a szervereiket.";
$lang['add_remote_host'] = "Távoli kiszolgáló hozzáadása";
$lang['offline'] = "Offline";
$lang['online'] = "Online";
$lang['remote_encryption_key'] = "Távoli kiszolgáló kódoló kulcsa (Encryption Key)";
$lang['remote_encryption_key_info'] = "Kódoló kulcs alapján kódolódik a távoli szerver és a weboldal közötti kommunikáció. A kódoló kulcsnak meg kell egyeznie a kiszolgálón és a weboldalon is.";
$lang['server_name'] = "Szerver neve";
$lang['agent_ip_port'] = "Kiszolgáló IP:Port";
$lang['encryption_key'] = "Kódoló kulcs";
$lang['agent_status'] = "Kiszolgáló státusza";
$lang['ips'] = "IP-k";
$lang['add_more_ips'] = "Ha több IP-t akarsz megadni akkor kattints az 'IP-k beállítása' gombra miután minden mezot kitöltöttél, ezután megjelenik egy üres mezo a kövezkeo IP hozzáadásához.";
$lang['encryption_key_mismatch'] = "A megadott kódoló kulcs nem egyezik a kiszolgálón megadottal. Ellenorizd a beállításokat.";
$lang['no_ip_for_remote_host'] = "Legalább 1 IP-t meg kell adnod minden egyes távoli kiszolgálóhoz.";
$lang['remote_host_user_name'] = "UNIX user";
$lang['remote_host_user_name_info'] = "User name where agent is running. Example: Jonhy";
$lang['ogp_user'] = $lang['remote_host_user_name'];
$lang['ogp_user_info'] = $lang['remote_host_user_name_info'];
$lang['add_ip'] = "Add IP";
$lang['remove_ip'] = "Remove IP";
$lang['edit_ip'] = "Edit IP";
$lang['remote_ip'] = "Remote IP";
$lang['remote_host_ftp_ip'] = "FTP IP";
$lang['remote_host_ftp_ip_info'] = "Az FTP szerver <b>IP</b> az aktuális agent.";
$lang['remote_host_ftp_port'] = "FTP port";
$lang['remote_host_ftp_port_info'] = "Az FTP szerver <b>port</b> az aktuális agent.";
$lang['view_log'] = "logs";
$lang['timeout'] = "TimeOut";
$lang['timeout_info'] = "Másodperc. A határidot kap választ az ügynök.";
$lang['use_nat'] = "Use NAT";
$lang['use_nat_info'] = "engedélyezése, ha a távoli szerver NAT mögött.";
$lang['ufw'] = "UFW";
$lang['status'] = "Status:";
$lang['stop_firewall'] = "Stop Firewall";
$lang['start_firewall'] = "Start Firewall";
$lang['seconds'] = "Seconds";
$lang['wrote_changes'] = "Wrote changes successfully.";
$lang['there_are_servers_running_on_this_ip'] = "There are servers running on this IP address.";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

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
