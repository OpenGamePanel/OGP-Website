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
define('remote_host_info', "A távoli kiszolgálónak pingelhető állomásnévnek kell lennie!");
define('remote_host_port', "Távoli kiszolgáló port");
define('remote_host_port_info', "A port amit az OGP Agent figyel a távoli kiszolgálón. Alapértelmezett: 12679.");
define('remote_host_name', "Távoli kiszolgáló név");
define('remote_host_name_info', "Távoli állomásnév szokott segíteni a felhasználóknak beazonosítani a szervereiket.");
define('add_remote_host', "Távoli kiszolgáló hozzáadása");
define('remote_encryption_key', "Távoli titkosítási kulcs");
define('remote_encryption_key_info', "A távoli titkosítási kulcs a Panel és az Agent közötti adatok titkosításához használandó. Ennek a kulcsnak egyformának kell lennie mindkét oldalon.");
define('server_name', "Szerver név");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent státusz");
define('ips', "IP-k");
define('add_more_ips', "Ha több IP-t akarsz megadni akkor kattints az 'IP-k beállítása' gombra miután minden mezot kitöltöttél, ezután megjelenik egy üres mezo a kövezkeo IP hozzáadásához.");
define('encryption_key_mismatch', "A titkosítási kulcs nem egyezik az Agentel. Kérlek, ellenőrizd újra az Agent konfigurációját.");
define('no_ip_for_remote_host', "Legalább 1 IP-t meg kell adnod minden egyes távoli kiszolgálóhoz.");
define('note_remote_host', "A remote host is a server where the OGP agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Unknown error - status_chk returned");
define('remote_host_user_name', "UNIX felhasználó");
define('remote_host_user_name_info', "Felhasználó neve, ahol az Agent fut. Példa: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "Az FTP szerver <b>IPje</b> a jelenlegi Agentnek.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "Az FTP szerver <b>port</b> az aktuális agent.");
define('view_log', "Napló megtekintése");
define('status', "Állapot");
define('stop_firewall', "Tűzfal leállítása");
define('start_firewall', "Tűzfal elindítása");
define('seconds', "Másodpercek");
define('reboot', "Távoli szerver újraindítása");
define('restart', "Agent újraindítása");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Biztos vagy benne, hogy újra akarod indítani a(z) %s nevű Agentet?");
define('restarting', "Agent újraindítása... Kérlek várj.");
define('restarted', "Agent sikeresen újraindítva.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('remote_host_removed', "A(z) %s nevű távoli kiszolgálót sikeresen eltávolítottuk.");
define('editing_remote_server', "Az úgynevezett '%s' távoli szerver szerkesztése");
define('remote_server_settings_changed', "Changed settings for remote server '%s' successfully.");
define('save_settings', "Beállítások mentése");
define('set_ips', "IPk beállítása");
define('remote_ip', "Távoli IP");
define('remote_ips_for', "Távoli IPk a(z) '%s' nevü szerverhez");
define('ips_set_for_server', "IPs set for server called '%s' successfully.");
define('could_not_remove_ip', "Could not remove old IP's from database.");
define('could_add_ip', "Could add remote server IP to database.");
define('areyousure_removeagent', "Are you sure you want to remove the agent called");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Hiba történt a távoli szerver eltávolítása közben.");
define('add_ip', "IP hozzáadása");
define('remove_ip', "IP eltávolítása");
define('edit_ip', "IP szerkesztése");
define('wrote_changes', "Változások sikeresen mentve.");
define('there_are_servers_running_on_this_ip', "Vannak szerverek ami fut az IP-címen.");
define('enter_ip_host', "Meg kell adnod az IPt a távoli kiszolgálóhoz.");
define('enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('could_not_add_server', "Could not add server");
define('to_db', "to the database.");
define('added_server', "Szerver hozzáadva");
define('with_port', "porttal");
define('to_db_succesfully', "to the database successfully.");
define('unable_discover', "Unable to auto discover IPs on");
define('set_ip_manually', "You'll have to set them manually.");
define('found_ips', "Talált IPk");
define('for_remote_server', "for the remote server.");
define('failed_add_ip', "Nem sikerült az IP hozzáadása");
define('timeout', "Időtúllépés");
define('timeout_info', "Másodperc. A határidőt kap választ az ügynök.");
define('use_nat', "NAT használta");
define('use_nat_info', "engedélyezése, ha a távoli szerver NAT mögött.");
define('arrange_ports', "Portok elrendezése");
define('assign_new_ports_range_for_ip', "Új port tartomány hozzárendelése a(z) %s IPhez");
define('assigned_port_ranges_for_ip', "Port tartományok hozzárendelve a(z) %s IPhez");
define('assigned_ports_for_ip', "Hozzárendelt portok a(z) %s IPhez");
define('unspecified_game_types', "Meghatározhatatlan játék típusok");
define('start_port', "Kezdő port:");
define('end_port', "Befejező port:");
define('port_increment', "Port növekedés");
define('total_assignable_ports', "Összes hozzárendelhető port:");
define('available_range_ports', "Elérthető port tartományok:");
define('assign_range', "Tartomány hozzárendelése");
define('edit_range', "Tartomány szerkesztése");
define('delete_range', "Tartomány törlése");
define('home_id', "Azonosító");
define('home_path', "Elérési útvonal");
define('game_type', "Játék típus");
define('port', "Port");
define('invalid_values', "Érvénytelen értékek.");
define('ports_in_range_already_arranged', "Portok a tartományban már e vannak rendezve.");
define('ports_range_already_configured_for', "Portok tartománya már konfigurálva ehhez %s.");
define('ports_range_added_successfull_for', "Portok tartományának a hozzáadása sikeres ehhez %s.");
define('ports_range_deleted_successfull', "Portok tartományának törlése sikeres.");
define('ports_range_edited_successfull_for', "A(z) %s portok tartománya szerkesztése sikeres.");
define('editing_firewall_for_remote_server', "Tűzfal szerkesztése a(z) '%s' nevű távoli szerveren.");
define('default_allowed', "Alapértelmezetten engedélyezve");
define('allow_port_command', "Port engedélyezése parancs");
define('deny_port_command', "Port tiltása parancs");
define('allow_ip_port_command', "IP:Port engedélyezése parancs");
define('deny_ip_port_command', "IP:Port tiltása parancs");
define('enable_firewall_command', "Tűzfal engedélyezése parancs");
define('disable_firewall_command', "Tűzfal tiltása parancs");
define('get_firewall_status_command', "Tűzfal állapot lekérése parancs");
define('reset_firewall_command', "Tűzfal újraindítása parancs");
define('firewall_status', "Tűzfal állapota");
define('save_firewall_settings', "Tűzfal beállítások mentése");
define('reset_firewall', "Tűzfal visszaállítása");
define('firewall_settings', "Tűzfal beállítások");
?>