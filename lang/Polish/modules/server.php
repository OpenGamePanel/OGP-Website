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

define('add_new_remote_host', "Dodaj Nowego Hosta");
define('configured_remote_hosts', "Skonfigurowane Hosty");
define('remote_host', "Adres Hosta");
define('remote_host_info', "Adres Hosta lub Domena która wskazuje na dany Adres IP");
define('remote_host_port', "Port Hosta");
define('remote_host_port_info', "Port, który jest słuchany przez podmiot OGP na zdalnym hoście. Domyślnie: 12.679.");
define('remote_host_name', "Nazwa Hosta");
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "Nazwa zdalnego komputera jest używana, aby pomóc użytkownikom w określeniu ich serwerów.");
define('add_remote_host', "Dodaj Hosta");
define('remote_encryption_key', "Klucz Szyfrowania Hosta");
define('remote_encryption_key_info', "Klucza szyfrowania Remote służy do szyfrowania danych między stron internetowych i agencji. Ten klucz musi być jakiś na obu końcach.");
define('server_name', "Nazwa Serwera");
define('agent_ip_port', "IP:PORT Agenta");
define('agent_status', "Status Agenta");
define('ips', "IP");
define('add_more_ips', "Jeśli chcesz, aby wprowadzić więcej prasy IPs Set IP, gdy wszystkie pola są pełne i puste pole pojawi się.");
define('encryption_key_mismatch', "Klucz szyfrowania nie pasuje do agenta. Sprawdź ponownie konfigurację Agenta.");
define('no_ip_for_remote_host', "Należy dodać co najmniej jednego (1) adres IP dla każdego zdalnego komputera.");
define('note_remote_host', "Zdalny host to serwer, na którym działa agent OGP. Każdy host może mieć wiele adresów IP, na których użytkownicy mogą tworzyć swoje serwery.");
define('ip_administration', "Serwer &amp; IP Administracja :: Open Game Panel");
define('unknown_error', "Nieznany błąd - status_chk returned");
define('remote_host_user_name', "UNIX user");
define('remote_host_user_name_info', "Nazwa użytkownika, w którym działa Agent. Przykład: Matthew");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "Serwer FTP <b>IP</b> dla obecnego agenta.");
define('remote_host_ftp_port', "Port FTP");
define('remote_host_ftp_port_info', "Serwer FTP <b>Port</b> dla obecnego agenta.");
define('view_log', "Pokaż logi");
define('status', "Status");
define('stop_firewall', "Zatrzymaj zaporę");
define('start_firewall', "Uruchom zaporę");
define('seconds', "Sekundy");
define('reboot', "Restart Serwera Hosta");
define('restart', "Zrestartuj Agenta");
define('confirm_reboot', "Czy na pewno chcesz wykonać restart serwera Hosta o nazwie '%s'?");
define('confirm_restart', "Czy na pewno chcesz zrestartować agenta o nazwie '%s'?");
define('restarting', "Restartowanie agenta... Proszę czekać.");
define('restarted', "Agent zrestartowany pomyślnie.");
define('reboot_success', "Serwer o nazwie '%s' został zrestartowany. Nie będzie można uzyskać dostępu do serwera, dopóki nie zostanie pomyślnie uruchomiony.");
define('invalid_remote_host_id', "Nieprawidłowy id '%s' Hosta");
define('remote_host_removed', "Usunięto Hosta o nazwie '%s'.");
define('editing_remote_server', "Edytuj serwer hosta '%s'");
define('remote_server_settings_changed', "Zmiana ustawień dla hosta '%s' wykonana pomyślnie.");
define('save_settings', "Zapisz Ustawienia");
define('set_ips', "Ustaw IP");
define('remote_ip', "IP Hosta");
define('remote_ips_for', "Adresy IP dla serwera Hosta o nazwie '%s'");
define('ips_set_for_server', "IP zostało pomyślnie ustawione dla Hosta '%s'");
define('could_not_remove_ip', "Nie można usunąć starych adresów IP z bazy danych.");
define('could_add_ip', "Możliwość dodania zdalnego serwera IP do bazy danych.");
define('areyousure_removeagent', "Czy jesteś pewny że chcesz usunąć agenta");
define('areyousure_removeagent2', "i wszystkich serwerów z nią związanych z bazy danych?");
define('error_while_remove', "Podczas usuwania zdalnego serwera wystąpił błąd.");
define('add_ip', "Dodaj IP");
define('remove_ip', "Usuń IP");
define('edit_ip', "Edytuj IP");
define('wrote_changes', "Zmiany zapisane pomyślnie.");
define('there_are_servers_running_on_this_ip', "Na Adresie IP są uruchomione serwery.");
define('enter_ip_host', "Musisz wpisać IP dla serwera Hosta.");
define('enter_valid_ip', "Musisz wprowadzić prawidłowy port dla Hosta. Wartość portu może wynosić od 0 do 65535, jednak zalecam od 1024 do 65535.");
define('could_not_add_server', "Nie można dodać serwera");
define('to_db', "do bazy danych.");
define('added_server', "Dodaj serwer");
define('with_port', "z portem");
define('to_db_succesfully', "pomyślnie do bazy danych.");
define('unable_discover', "Nie można automatycznie wykryć adresów IP");
define('set_ip_manually', "Musisz ustawić ręcznie Adres IP.");
define('found_ips', "Znaleziono IP");
define('for_remote_server', "dla serwera hosta.");
define('failed_add_ip', "Błąd przy dodawaniu IP");
define('timeout', "Time Out");
define('timeout_info', "Sekund.Termin, aby uzyskać odpowiedź od tego agenta.");
define('use_nat', "Użyj NAT");
define('use_nat_info', "Włącz, jeśli zdalny serwer używa reguły NAT.");
define('arrange_ports', "Arrange ports");
define('assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('assigned_ports_for_ip', "Assigned ports for IP %s");
define('unspecified_game_types', "Nieokreślone typy gier");
define('start_port', "Początkowy port:");
define('end_port', "Końcowy port:");
define('port_increment', "Port increment:");
define('total_assignable_ports', "Total assignable ports:");
define('available_range_ports', "Dozwolony zakres portów:");
define('assign_range', "Assign range");
define('edit_range', "Edytuj zakres");
define('delete_range', "Usuń zakres");
define('home_id', "ID Serwera");
define('home_path', "główna ścieżka:");
define('game_type', "Typ Gry");
define('port', "Port");
define('invalid_values', "Nieprawidłowe wartości.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfully.");
define('ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('default_allowed', "Domyślnie dozwolone");
define('allow_port_command', "Allow port command");
define('deny_port_command', "Deny port command");
define('allow_ip_port_command', "Allow IP:port command");
define('deny_ip_port_command', "Deny IP:port command");
define('enable_firewall_command', "Włącz komendy zapory");
define('disable_firewall_command', "Wyłącz komendy zapory");
define('get_firewall_status_command', "Pobierz status komend zapory");
define('reset_firewall_command', "Reset firewall command");
define('firewall_status', "Status zapory");
define('save_firewall_settings', "Zapisz ustawienia zapory");
define('reset_firewall', "Restart zapory");
define('firewall_settings', "Ustawienia Zapory");
define('display_public_ip', "Display Public IP");
?>