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

define('add_new_remote_host', "Tilføj Ny Fjernvært");
define('configured_remote_hosts', "Konfigurer Fjernvært");
define('remote_host', "Fjernvært");
define('remote_host_info', "Fjernhost skal være et pingable værtsnavn!");
define('remote_host_port', "Fjernvært Port");
define('remote_host_port_info', "Denne port, bliver lyttet af OGP Agent til fjernværten. Standard: 12679.");
define('remote_host_name', "Fjernværtens Navn");
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "Fjernværtens navn er brugt til, at hjælpe brugere til at identificere deres servere.");
define('add_remote_host', "Tilføj Fjernværten");
define('remote_encryption_key', "Fjernværtens Krypterings nøgle");
define('remote_encryption_key_info', "Fjern kryptering, er brugt til at kryptere data mellem hjemmesider og agenten. Denne nøgle skal være ens begge steder.");
define('server_name', "Server Navn");
define('agent_ip_port', "Agent IP:Port");
define('agent_status', "Agent Status");
define('ips', "IPs");
define('add_more_ips', "Hvis du ønsker at tilføje flere IPs tryk 'Vælg IPs' når alle felter er udfyldt, ville et ny tomt felt komme frem.");
define('encryption_key_mismatch', "Encryption key does not match with the Agent. Please recheck your Agent configuration.");
define('no_ip_for_remote_host', "Du er nødtil at filføje mindst en (1) IP addresse , for hver fjernvært.");
define('note_remote_host', "Fjernværten er en server, hvor OGP agenten kører på. Hver vært ka få tilføjet flere ip adresser, hvilket gør det muligt for brugere, at kan binde sig til serveren.");
define('ip_administration', "Server &amp; IP Administration :: Open Game Panel");
define('unknown_error', "Ukendt fejl - status_chk retueret");
define('remote_host_user_name', "UNIX bruger");
define('remote_host_user_name_info', "Brugernavn, hvor agenten kører fra. Eksempel: Jonhy");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "FTP serveren <b>IP</b> for den nuværrende agent.");
define('remote_host_ftp_port', "FTP port");
define('remote_host_ftp_port_info', "FTP serveren <b>port</b> for den nuværrende agent.");
define('view_log', "Se log");
define('status', "Status");
define('stop_firewall', "Stop Firewall");
define('start_firewall', "Start Firewall");
define('seconds', "Sekunder");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('invalid_remote_host_id', "Ugyldig fjernvært id '%s' givet.");
define('remote_host_removed', "Fjernværten kaldet '%s' fjernet succesfuldt.");
define('editing_remote_server', "Regidere fjern server kaldet '%s'");
define('remote_server_settings_changed', "Skift indstillinger på fjern server '%s' succesfuldt.");
define('save_settings', "Gem Indstilinger");
define('set_ips', "Set IPs");
define('remote_ip', "Fjern IP");
define('remote_ips_for', "Fjern IPs til server kaldet '%s'");
define('ips_set_for_server', "IPs er sat for server kaldet '%s' successfully.");
define('could_not_remove_ip', "Kunne ikke fjerne gamle IP's fra database.");
define('could_add_ip', "Kunne ikke tilføje fjern server IP til database.");
define('areyousure_removeagent', "Er du sikker på, at du ville fjerne agenten kaldet");
define('areyousure_removeagent2', "og alle dets hjem, som er til den server, fra ogp database?");
define('error_while_remove', "Fejl opstod, ved fjernelse af fjern server.");
define('add_ip', "Tilføj IP");
define('remove_ip', "Fjern IP");
define('edit_ip', "Redigere IP");
define('wrote_changes', "Changes saved successfully.");
define('there_are_servers_running_on_this_ip', "Der er servere der kører på denne IP addresse.");
define('enter_ip_host', "Du må skrive IP til fjernværten.");
define('enter_valid_ip', "Du må indtaste en aktiv port til fjernværten. Portens værdi, skal være mellem 0 og 65535, dog anbefales det, at sætte den mellem 1024 og 65535.");
define('could_not_add_server', "Kunne ikke filføje server");
define('to_db', "til databasen.");
define('added_server', "Tilføj server");
define('with_port', "med port");
define('to_db_succesfully', "til databasen succesfuldt.");
define('unable_discover', "ikke muligt at automatisere IPs til");
define('set_ip_manually', "Du er nødtil at sætte dem manuelt.");
define('found_ips', "Fundet IPs");
define('for_remote_server', "til fjernserveren.");
define('failed_add_ip', "Fejlet I at tilføje IP");
define('timeout', "Tiden Udløb");
define('timeout_info', "Sekunder. Tids grænse for at få svar fra denne agent.");
define('use_nat', "Brug NAT");
define('use_nat_info', "Aktivere hvis din fjernserver bruger NAT regler.");
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
define('home_id', "Hjemme ID");
define('home_path', "Hjemme sti");
define('game_type', "Spil Type");
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
define('default_public_ip', "Default Public IP");
define('display_public_ip', "Display Public IP");
?>