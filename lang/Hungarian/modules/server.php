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

define('OGP_LANG_add_new_remote_host', "Új távoli állomás hozzáadása");
define('OGP_LANG_configured_remote_hosts', "Beállított távoli állomás");
define('OGP_LANG_remote_host', "Távoli kiszolgáló");
define('OGP_LANG_remote_host_info', "A távoli kiszolgálónak pingelhető állomásnévnek kell lennie!");
define('OGP_LANG_remote_host_port', "Távoli kiszolgáló port");
define('OGP_LANG_remote_host_port_info', "A port amit az OGP Agent figyel a távoli kiszolgálón. Alapértelmezett: 12679.");
define('OGP_LANG_remote_host_name', "Távoli kiszolgáló név");
define('OGP_LANG_ogp_user', "OGP Agent felhasználónév");
define('OGP_LANG_remote_host_name_info', "Távoli állomásnév szokott segíteni a felhasználóknak beazonosítani a szervereiket.");
define('OGP_LANG_add_remote_host', "Távoli kiszolgáló hozzáadása");
define('OGP_LANG_remote_encryption_key', "Távoli titkosítási kulcs");
define('OGP_LANG_remote_encryption_key_info', "A távoli titkosítási kulcs a Panel és az Agent közötti adatok titkosításához használandó. Ennek a kulcsnak egyformának kell lennie mindkét oldalon.");
define('OGP_LANG_server_name', "Szerver név");
define('OGP_LANG_agent_ip_port', "Agent IP:Port");
define('OGP_LANG_agent_status', "Agent állapota");
define('OGP_LANG_ips', "IP-k");
define('OGP_LANG_add_more_ips', "Ha több IP-t akarsz megadni akkor kattints az 'IP-k beállítása' gombra miután minden mezot kitöltöttél, ezután megjelenik egy üres mezo a kövezkeo IP hozzáadásához.");
define('OGP_LANG_encryption_key_mismatch', "A titkosítási kulcs nem egyezik meg az Agentel. Kérlek, ellenőrizd az Agented konfigurációját.");
define('OGP_LANG_no_ip_for_remote_host', "Minden egyes távoli állomáshoz legalább egy (1) IP címet kell megadnod.");
define('OGP_LANG_note_remote_host', "A távoli kiszolgáló egy olyan szerver, ahol az OGP Agent fut. Minden kiszolgálónak több IP-címe is lehet, amelyen a felhasználók a szerverekhez kötődhetnek.");
define('OGP_LANG_ip_administration', "Szerver és IP adminisztráció :: Open Game Panel");
define('OGP_LANG_unknown_error', "Ismeretlen hiba - status_chk visszaérkezett");
define('OGP_LANG_remote_host_user_name', "UNIX felhasználó");
define('OGP_LANG_remote_host_user_name_info', "Felhasználó neve, ahol az Agent fut. Példa: Jonhy");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "Az FTP szerver <b>IPje</b> a jelenlegi Agentnek.");
define('OGP_LANG_remote_host_ftp_port', "FTP port");
define('OGP_LANG_remote_host_ftp_port_info', "Az FTP szerver <b>portja</b> a jelenlegi Agentnek.");
define('OGP_LANG_view_log', "Napló megtekintése");
define('OGP_LANG_status', "Állapot");
define('OGP_LANG_stop_firewall', "Tűzfal leállítása");
define('OGP_LANG_start_firewall', "Tűzfal elindítása");
define('OGP_LANG_seconds', "Másodpercek");
define('OGP_LANG_reboot', "Távoli szerver újraindítása");
define('OGP_LANG_restart', "Agent újraindítása");
define('OGP_LANG_confirm_reboot', "Biztos vagy benne, hogy távolról újra akarod indítani az egész fizikai szervert '%s'?");
define('OGP_LANG_confirm_restart', "Biztos vagy benne, hogy újra akarod indítani a(z) %s nevű Agentet?");
define('OGP_LANG_restarting', "Az Agent újraindítása... Kérlek várj.");
define('OGP_LANG_restarted', "Agent sikeresen újraindítva.");
define('OGP_LANG_reboot_success', "A(z) %s nevű szerver sikeresen újraindítva. Nem férhetsz hozzá a szerverhez, amíg az sikeresen fel nem áll.");
define('OGP_LANG_invalid_remote_host_id', "Invalid remote host id '%s' given.");
define('OGP_LANG_remote_host_removed', "A(z) %s nevű távoli kiszolgálót sikeresen eltávolítottuk.");
define('OGP_LANG_editing_remote_server', "Az úgynevezett '%s' távoli szerver szerkesztése");
define('OGP_LANG_remote_server_settings_changed', "Beállítások sikeresen megváltoztatva a(z) '%s' távoli szerverhez.");
define('OGP_LANG_save_settings', "Beállítások mentése");
define('OGP_LANG_set_ips', "IPk beállítása");
define('OGP_LANG_remote_ip', "Távoli IP");
define('OGP_LANG_remote_ips_for', "IPs for Game Servers To Use on Agent Server '%s'");
define('OGP_LANG_ips_set_for_server', "Az IP(k) a(z) '%s' nevű szerverhez  sikeresen beállítva.");
define('OGP_LANG_could_not_remove_ip', "Nem sikerült eltávolítani a régi IPket az adatbázisból.");
define('OGP_LANG_could_add_ip', "Nem sikerült hozzáadni a távoli szerver IP-t az adatbázishoz.");
define('OGP_LANG_areyousure_removeagent', "Biztos vagy benne, hogy el akarod távolítani a(z) Agentet");
define('OGP_LANG_areyousure_removeagent2', "and all the homes related to it from the ogp database?");
define('OGP_LANG_error_while_remove', "Hiba történt a távoli szerver eltávolítása közben.");
define('OGP_LANG_add_ip', "IP hozzáadása");
define('OGP_LANG_remove_ip', "IP eltávolítása");
define('OGP_LANG_edit_ip', "IP szerkesztése");
define('OGP_LANG_wrote_changes', "Változások mentése sikeres.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Ezen az IP-címen futnak szerverek.");
define('OGP_LANG_enter_ip_host', "Meg kell adnod az IPt a távoli kiszolgálóhoz.");
define('OGP_LANG_enter_valid_ip', "You must enter valid port for the remote host. The port value can be between 0 and 65535, however recommendation is between 1024 and 65535.");
define('OGP_LANG_could_not_add_server', "Nem sikerült hozzáadni a szervert");
define('OGP_LANG_to_db', "az adatbázisba.");
define('OGP_LANG_added_server', "Szerver hozzáadva");
define('OGP_LANG_with_port', "porttal");
define('OGP_LANG_to_db_succesfully', "az adatbázisba sikeresen.");
define('OGP_LANG_unable_discover', "Unable to auto discover IPs on");
define('OGP_LANG_set_ip_manually', "Manuálisan kell beállítanod.");
define('OGP_LANG_found_ips', "Talált IPk");
define('OGP_LANG_for_remote_server', "a távoli szerverhez.");
define('OGP_LANG_failed_add_ip', "Nem sikerült az IP hozzáadása");
define('OGP_LANG_timeout', "Időtúllépés");
define('OGP_LANG_timeout_info', "A határidő másodpercben, hogy megkapja az Agent válaszát.");
define('OGP_LANG_use_nat', "NAT használta");
define('OGP_LANG_use_nat_info', "Enable if your remote server is using NAT rules. Use this setting if your game servers are running on internal private LAN IP addresses so that the panel will use your real remote IP address to query the game servers.");
define('OGP_LANG_arrange_ports', "Portok elrendezése");
define('OGP_LANG_assign_new_ports_range_for_ip', "Új port tartomány hozzárendelése a(z) %s IPhez");
define('OGP_LANG_assigned_port_ranges_for_ip', "Port tartományok hozzárendelve a(z) %s IPhez");
define('OGP_LANG_assigned_ports_for_ip', "Hozzárendelt portok a(z) %s IPhez");
define('OGP_LANG_unspecified_game_types', "Meghatározhatatlan játék típusok");
define('OGP_LANG_start_port', "Kezdő port:");
define('OGP_LANG_end_port', "Befejező port:");
define('OGP_LANG_port_increment', "Port növekedés");
define('OGP_LANG_total_assignable_ports', "Összes hozzárendelhető port:");
define('OGP_LANG_available_range_ports', "Elérthető port tartományok:");
define('OGP_LANG_assign_range', "Tartomány hozzárendelése");
define('OGP_LANG_edit_range', "Tartomány szerkesztése");
define('OGP_LANG_delete_range', "Tartomány törlése");
define('OGP_LANG_home_id', "Szerver azonosító");
define('OGP_LANG_home_path', "Szerver elérési útja");
define('OGP_LANG_game_type', "Játék típus");
define('OGP_LANG_port', "Port");
define('OGP_LANG_invalid_values', "Érvénytelen értékek.");
define('OGP_LANG_ports_in_range_already_arranged', "A portok a tartományban már elrendezve.");
define('OGP_LANG_ports_range_already_configured_for', "A portok tartománya már konfigurálva a(z) %s-hoz.");
define('OGP_LANG_ports_range_added_successfull_for', "A(z) %s portok tartományának a hozzáadása sikeres.");
define('OGP_LANG_ports_range_deleted_successfull', "A portok tartománya sikeresen törölve.");
define('OGP_LANG_ports_range_edited_successfull_for', "A(z) %s portok tartománya szerkesztése sikeres.");
define('OGP_LANG_editing_firewall_for_remote_server', "Tűzfal szerkesztése a(z) '%s' nevű távoli szerveren.");
define('OGP_LANG_default_allowed', "Alapértelmezés szerint engedélyezett");
define('OGP_LANG_allow_port_command', "Port engedélyezése parancs");
define('OGP_LANG_deny_port_command', "Port tiltása parancs");
define('OGP_LANG_allow_ip_port_command', "IP:Port engedélyezésének a parancsa");
define('OGP_LANG_deny_ip_port_command', "IP:Port tiltásának a parancsa");
define('OGP_LANG_enable_firewall_command', "Tűzfal engedélyezése parancs");
define('OGP_LANG_disable_firewall_command', "Tűzfal tiltása parancs");
define('OGP_LANG_get_firewall_status_command', "Tűzfal állapot lekérése parancs");
define('OGP_LANG_reset_firewall_command', "Tűzfal újraindítása parancs");
define('OGP_LANG_firewall_status', "Tűzfal állapota");
define('OGP_LANG_save_firewall_settings', "Tűzfal beállítások mentése");
define('OGP_LANG_reset_firewall', "Tűzfal visszaállítása");
define('OGP_LANG_firewall_settings', "Tűzfal beállítások");
define('OGP_LANG_display_public_ip', "Nyilvános IP megjelenítése");
define('OGP_LANG_ips_can_be_internal_external', "Enter usable IP addresses.&nbsp; Public IP addresses and internal LAN IP addresses (for NAT setups) can be used.");
?>
