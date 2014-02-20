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
$lang['add_new_remote_host'] = "Tilføj Ny Fjernvært";
$lang['configured_remote_hosts'] = "Konfigurer Fjernvært";
$lang['remote_host'] = "Fjernvært";
$lang['remote_host_info'] = "Fjernhost skal være et pingable værtsnavn!";
$lang['remote_host_port'] = "Fjernvært Port";
$lang['remote_host_port_info'] = "Denne port, bliver lyttet af OGP Agent til fjernværten. Standard: 12679.";
$lang['remote_host_name'] = "Fjernværtens Navn";
$lang['remote_host_name_info'] = "Fjernværtens navn er brugt til, at hjælpe brugere til at identificere deres servere.";
$lang['add_remote_host'] = "Tilføj Fjernværten";
$lang['offline'] = "Slukket";
$lang['online'] = "Tændt";
$lang['remote_encryption_key'] = "Fjernværtens Krypterings nøgle";
$lang['remote_encryption_key_info'] = "Fjern kryptering, er brugt til at kryptere data mellem hjemmesider og agenten. Denne nøgle skal være ens begge steder.";
$lang['server_name'] = "Server Navn";
$lang['agent_ip_port'] = "Agent IP:Port";
$lang['encryption_key'] = "Krypterings Nøgle";
$lang['agent_status'] = "Agent Status";
$lang['ips'] = "IPs";
$lang['add_more_ips'] = "Hvis du ønsker at tilføje flere IPs tryk 'Vælg IPs' når alle felter er udfyldt, ville et ny tomt felt komme frem.";
$lang['encryption_key_mismatch'] = "Krypterings nøgle passer ikke sammen med agenten. Dobbelttjek din konfigurations filer.";
$lang['no_ip_for_remote_host'] = "Du er nødtil at filføje mindst en (1) IP addresse , for hver fjernvært.";
$lang['note_remote_host'] = "Fjernværten er en server, hvor OGP agenten kører på. Hver vært ka få tilføjet flere ip adresser, hvilket gør det muligt for brugere, at kan binde sig til serveren.";
$lang['ip_administration'] = "Server &amp; IP Administration :: Open Game Panel";
$lang['unknown_error'] = "Ukendt fejl - status_chk retueret";
$lang['remote_host_user_name'] = "UNIX bruger";
$lang['remote_host_user_name_info'] = "Brugernavn, hvor agenten kører fra. Eksempel: Jonhy";
$lang['ogp_user'] = $lang['remote_host_user_name'];
$lang['ogp_user_info'] = $lang['remote_host_user_name_info'];
$lang['remote_host_ftp_ip'] = "FTP IP";
$lang['remote_host_ftp_ip_info'] = "FTP serveren <b>IP</b> for den nuværrende agent.";
$lang['remote_host_ftp_port'] = "FTP port";
$lang['remote_host_ftp_port_info'] = "FTP serveren <b>port</b> for den nuværrende agent.";
$lang['view_log'] = "Se log";
$lang['ufw'] = "UFW";
$lang['status'] = "Status";
$lang['stop_firewall'] = "Stop Firewall";
$lang['start_firewall'] = "Start Firewall";
$lang['seconds'] = "Sekunder";

// edit_server.php
$lang['invalid_remote_host_id'] = "Ugyldig fjernvært id '%s' givet.";
$lang['remote_host_removed'] = "Fjernværten kaldet '%s' fjernet succesfuldt.";
$lang['editing_remote_server'] = "Regidere fjern server kaldet '%s'";
$lang['remote_server_settings_changed'] = "Skift indstillinger på fjern server '%s' succesfuldt.";
$lang['save_settings'] = "Gem Indstilinger";
$lang['set_ips'] = "Set IPs";
$lang['remote_ip'] = "Fjern IP";
$lang['remote_ips_for'] = "Fjern IPs til server kaldet '%s'";
$lang['ips_set_for_server'] = "IPs er sat for server kaldet '%s' successfully.";
$lang['could_not_remove_ip'] = "Kunne ikke fjerne gamle IP's fra database.";
$lang['could_add_ip'] = "Kunne ikke tilføje fjern server IP til database.";
$lang['areyousure_removeagent'] = "Er du sikker på, at du ville fjerne agenten kaldet";
$lang['areyousure_removeagent2'] = "og alle dets hjem, som er til den server, fra ogp database?";
$lang['error_while_remove'] = "Fejl opstod, ved fjernelse af fjern server.";
$lang['add_ip'] = "Tilføj IP";
$lang['remove_ip'] = "Fjern IP";
$lang['edit_ip'] = "Redigere IP";
$lang['wrote_changes'] = "Skrev ændringer succesfuldt.";
$lang['there_are_servers_running_on_this_ip'] = "Der er servere der kører på denne IP addresse.";

// add_server.php
$lang['enter_ip_host'] = "Du må skrive IP til fjernværten.";
$lang['enter_valid_ip'] = "Du må indtaste en aktiv port til fjernværten. Portens værdi, skal være mellem 0 og 65535, dog anbefales det, at sætte den mellem 1024 og 65535.";
$lang['could_not_add_server'] = "Kunne ikke filføje server";
$lang['to_db'] = "til databasen.";
$lang['added_server'] = "Tilføj server";
$lang['with_port'] = "med port";
$lang['to_db_succesfully'] = "til databasen succesfuldt.";
$lang['unable_discover'] = "ikke muligt at automatisere IPs til";
$lang['set_ip_manually'] = "Du er nødtil at sætte dem manuelt.";
$lang['found_ips'] = "Fundet IPs";
$lang['for_remote_server'] = "til fjernserveren.";
$lang['failed_add_ip'] = "Fejlet I at tilføje IP";
$lang['timeout'] = "Tiden Udløb";
$lang['timeout_info'] = "Sekunder. Tids grænse for at få svar fra denne agent.";
$lang['seconds'] = "sekunder";
$lang['use_nat'] = "Brug NAT";
$lang['use_nat_info'] = "Aktivere hvis din fjernserver bruger NAT regler.";

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
