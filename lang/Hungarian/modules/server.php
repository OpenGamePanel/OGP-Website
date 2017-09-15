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

define('add_new_remote_host', "Új távoli kiszolgáló hozzáadása");
define('configured_remote_hosts', "Beállított távoli kiszolgáló");
define('remote_host', "Távoli kiszolgáló");
define('remote_host_info', "A távoli kiszolgálónak pingelhető állomásnévnek kell lennie!");
define('remote_host_port', "Távoli kiszolgáló port");
define('remote_host_port_info', "A port amit az OGP Agent figyel a távoli kiszolgálón. Alapértelmezett: 12679.");
define('remote_host_name', "Távoli kiszolgáló név");
define('ogp_user', "OGP Agent felhasználó");
define('remote_host_name_info', "Távoli állomásnév szokott segíteni a felhasználóknak beazonosítani a szervereiket.");
define('add_remote_host', "Távoli kiszolgáló hozzáadása");
define('remote_encryption_key', "Távoli titkosítási kulcs");
define('remote_encryption_key_info', "A távoli titkosítási kulcs a Panel és az Agent közötti adatok titkosításához használandó. Ennek a kulcsnak egyformának kell lennie mindkét oldalon.");
define('server_name', "Szerver név");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent státusz");
define('ips', "IP-k");
define('add_more_ips', "Ha több IP-t akarsz megadni akkor kattints az 'IP-k beállítása' gombra miután minden mezot kitöltöttél, ezután megjelenik egy üres mezo a kövezkeo IP hozzáadásához.");
define('encryption_key_mismatch', "A titkosítási kulcs nem egyezik meg az Agentel. Kérlek, ellenőrizd az Agented konfigurációját.");
define('no_ip_for_remote_host', "Minden egyes távoli állomáshoz legalább egy (1) IP címet kell megadnod.");
define('note_remote_host', "A távoli kiszolgáló egy olyan szerver, ahol az OGP Agent fut. Minden kiszolgálónak több IP-címe is lehet, amelyen a felhasználók a szerverekhez kötődhetnek.");
define('ip_administration', "Szerver és IP adminisztráció :: Open Game Panel");
define('unknown_error', "Ismeretlen hiba - status_chk visszaérkezett");
define('remote_host_user_name', "UNIX felhasználó");
define('remote_host_user_name_info', "Felhasználó neve, ahol az Agent fut. Példa: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "Az FTP szerver <b>IPje</b> a jelenlegi Agentnek.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "Az FTP szerver <b>portja</b> a jelenlegi Agentnek.");
define('view_log', "Napló megtekintése");
define('status', "Állapot");
define('stop_firewall', "Tűzfal leállítása");
define('start_firewall', "Tűzfal elindítása");
define('seconds', "Másodpercek");
define('reboot', "Távoli szerver újraindítása");
define('restart', "Agent újraindítása");
define('confirm_reboot', "Biztos vagy benne, hogy távolról újra akarod indítani az egész fizikai szervert '%s'?");
define('confirm_restart', "Biztos vagy benne, hogy újra akarod indítani a(z) %s nevű Agentet?");
define('restarting', "Az Agent újraindítása... Kérlek várj.");
define('restarted', "Agent sikeresen újraindítva.");
define('reboot_success', "A(z) %s nevű szerver sikeresen újraindítva. Nem férhetsz hozzá a szerverhez, amíg az sikeresen fel nem áll.");
define('invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('remote_host_removed', "A(z) %s nevű távoli kiszolgálót sikeresen eltávolítottuk.");
define('editing_remote_server', "Az úgynevezett '%s' távoli szerver szerkesztése");
define('remote_server_settings_changed', "Beállítások sikeresen megváltoztatva a(z) '%s' távoli szerverhez.");
define('save_settings', "Beállítások mentése");
define('set_ips', "IPk beállítása");
define('remote_ip', "Távoli IP");
define('remote_ips_for', "Távoli IPk a(z) '%s' nevü szerverhez");
define('ips_set_for_server', "Az IP(k) a(z) '%s' nevű szerverhez  sikeresen beállítva.");
define('could_not_remove_ip', "Nem sikerült eltávolítani a régi IPket az adatbázisból.");
define('could_add_ip', "Nem sikerült hozzáadni a távoli szerver IP-t az adatbázishoz.");
define('areyousure_removeagent', "Biztos vagy benne, hogy el akarod távolítani a(z) Agentet");
define('areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('error_while_remove', "Hiba történt a távoli szerver eltávolítása közben.");
define('add_ip', "IP hozzáadása");
define('remove_ip', "IP eltávolítása");
define('edit_ip', "IP szerkesztése");
define('wrote_changes', "Változások mentése sikeres.");
define('there_are_servers_running_on_this_ip', "Ezen az IP-címen futnak szerverek.");
define('enter_ip_host', "Meg kell adnod az IPt a távoli kiszolgálóhoz.");
define('enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('could_not_add_server', "Nem sikerült hozzáadni a szervert");
define('to_db', "az adatbázisba.");
define('added_server', "Szerver hozzáadva");
define('with_port', "porttal");
define('to_db_succesfully', "az adatbázisba sikeresen.");
define('unable_discover', "Unable to auto discover IPs on");
define('set_ip_manually', "Manuálisan kell beállítanod.");
define('found_ips', "Talált IPk");
define('for_remote_server', "a távoli szerverhez.");
define('failed_add_ip', "Nem sikerült az IP hozzáadása");
define('timeout', "Időtúllépés");
define('timeout_info', "A határidő másodpercben, hogy megkapja az Agent válaszát.");
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
define('home_path', "Szerver elérési útja");
define('game_type', "Játék típus");
define('port', "Port");
define('invalid_values', "Érvénytelen értékek.");
define('ports_in_range_already_arranged', "Portok a tartományban már e vannak rendezve.");
define('ports_range_already_configured_for', "Portok tartománya már konfigurálva ehhez %s.");
define('ports_range_added_successfull_for', "A(z) %s portok tartományának a hozzáadása sikeres.");
define('ports_range_deleted_successfull', "Portok tartományának törlése sikeres.");
define('ports_range_edited_successfull_for', "A(z) %s portok tartománya szerkesztése sikeres.");
define('editing_firewall_for_remote_server', "Tűzfal szerkesztése a(z) '%s' nevű távoli szerveren.");
define('default_allowed', "Alapértelmezés szerint engedélyezett");
define('allow_port_command', "Port engedélyezése parancs");
define('deny_port_command', "Port tiltása parancs");
define('allow_ip_port_command', "IP:Port engedélyezésének a parancsa");
define('deny_ip_port_command', "IP:Port tiltásának a parancsa");
define('enable_firewall_command', "Tűzfal engedélyezése parancs");
define('disable_firewall_command', "Tűzfal tiltása parancs");
define('get_firewall_status_command', "Tűzfal állapot lekérése parancs");
define('reset_firewall_command', "Tűzfal újraindítása parancs");
define('firewall_status', "Tűzfal állapota");
define('save_firewall_settings', "Tűzfal beállítások mentése");
define('reset_firewall', "Tűzfal visszaállítása");
define('firewall_settings', "Tűzfal beállítások");
define('display_public_ip', "Nyilvános IP megjelenítése");
?>