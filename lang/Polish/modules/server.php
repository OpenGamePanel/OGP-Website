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

define('OGP_LANG_add_new_remote_host', "Dodaj Nowego Hosta");
define('OGP_LANG_configured_remote_hosts', "Skonfigurowane Hosty");
define('OGP_LANG_remote_host', "Adres Hosta");
define('OGP_LANG_remote_host_info', "Adres Hosta lub Domena która wskazuje na dany Adres IP");
define('OGP_LANG_remote_host_port', "Port Hosta");
define('OGP_LANG_remote_host_port_info', "The port that is listened by the OGP Agent on remote host. Default: 12679.");
define('OGP_LANG_remote_host_name', "Nazwa Hosta");
define('OGP_LANG_ogp_user', "OGP Agent Username");
define('OGP_LANG_remote_host_name_info', "Nazwa zdalnego komputera jest używana, aby pomóc użytkownikom w określeniu ich serwerów.");
define('OGP_LANG_add_remote_host', "Dodaj Hosta");
define('OGP_LANG_remote_encryption_key', "Klucz Szyfrowania Hosta");
define('OGP_LANG_remote_encryption_key_info', "Klucza szyfrowania Remote służy do szyfrowania danych między stron internetowych i agencji. Ten klucz musi być jakiś na obu końcach.");
define('OGP_LANG_server_name', "Nazwa Serwera");
define('OGP_LANG_agent_ip_port', "IP:PORT Agenta");
define('OGP_LANG_agent_status', "Status Agenta");
define('OGP_LANG_ips', "IP");
define('OGP_LANG_add_more_ips', "Jeśli chcesz, aby wprowadzić więcej prasy IPs Set IP, gdy wszystkie pola są pełne i puste pole pojawi się.");
define('OGP_LANG_encryption_key_mismatch', "Klucz szyfrowania nie pasuje do agenta. Sprawdź ponownie konfigurację Agenta.");
define('OGP_LANG_no_ip_for_remote_host', "Należy dodać co najmniej jednego (1) adres IP dla każdego zdalnego komputera.");
define('OGP_LANG_note_remote_host', "A remote host is a server where the OGP Agent is running on. Each host can have multiple number of IP addresses on which users can bind servers to.");
define('OGP_LANG_ip_administration', "Serwer &amp; IP Administracja :: Open Game Panel");
define('OGP_LANG_unknown_error', "Nieznany błąd - status_chk returned");
define('OGP_LANG_remote_host_user_name', "UNIX user");
define('OGP_LANG_remote_host_user_name_info', "Nazwa użytkownika, w którym działa Agent. Przykład: Matthew");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP");
define('OGP_LANG_remote_host_ftp_ip_info', "The FTP server <b>IP</b> for the current Agent.");
define('OGP_LANG_remote_host_ftp_port', "FTP Port");
define('OGP_LANG_remote_host_ftp_port_info', "The FTP server <b>port</b> for the current Agent.");
define('OGP_LANG_view_log', "View Log");
define('OGP_LANG_status', "Status");
define('OGP_LANG_stop_firewall', "Zatrzymaj zaporę");
define('OGP_LANG_start_firewall', "Uruchom zaporę");
define('OGP_LANG_seconds', "Sekundy");
define('OGP_LANG_reboot', "Restart Serwera Hosta");
define('OGP_LANG_restart', "Zrestartuj Agenta");
define('OGP_LANG_confirm_reboot', "Czy na pewno chcesz wykonać restart serwera Hosta o nazwie '%s'?");
define('OGP_LANG_confirm_restart', "Are you sure you want to restart the Agent named '%s'?");
define('OGP_LANG_restarting', "Restarting Agent... Please wait.");
define('OGP_LANG_restarted', "Agent zrestartowany pomyślnie.");
define('OGP_LANG_reboot_success', "Serwer o nazwie '%s' został zrestartowany. Nie będzie można uzyskać dostępu do serwera, dopóki nie zostanie pomyślnie uruchomiony.");
define('OGP_LANG_invalid_remote_host_id', "Nieprawidłowy id '%s' Hosta");
define('OGP_LANG_remote_host_removed', "Usunięto Hosta o nazwie '%s'.");
define('OGP_LANG_editing_remote_server', "Edytuj serwer hosta '%s'");
define('OGP_LANG_remote_server_settings_changed', "Zmiana ustawień dla hosta '%s' wykonana pomyślnie.");
define('OGP_LANG_save_settings', "Zapisz Ustawienia");
define('OGP_LANG_set_ips', "Ustaw IP");
define('OGP_LANG_remote_ip', "IP Hosta");
define('OGP_LANG_remote_ips_for', "IPs for Game Servers To Use on Agent Server '%s'");
define('OGP_LANG_ips_set_for_server', "IP zostało pomyślnie ustawione dla Hosta '%s'");
define('OGP_LANG_could_not_remove_ip', "Nie można usunąć starych adresów IP z bazy danych.");
define('OGP_LANG_could_add_ip', "Możliwość dodania zdalnego serwera IP do bazy danych.");
define('OGP_LANG_areyousure_removeagent', "Are you sure you want to remove the Agent called");
define('OGP_LANG_areyousure_removeagent2', "i wszystkich serwerów z nią związanych z bazy danych?");
define('OGP_LANG_error_while_remove', "Podczas usuwania zdalnego serwera wystąpił błąd.");
define('OGP_LANG_add_ip', "Dodaj IP");
define('OGP_LANG_remove_ip', "Usuń IP");
define('OGP_LANG_edit_ip', "Edytuj IP");
define('OGP_LANG_wrote_changes', "Zmiany zapisane pomyślnie.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Na Adresie IP są uruchomione serwery.");
define('OGP_LANG_enter_ip_host', "Musisz wpisać IP dla serwera Hosta.");
define('OGP_LANG_enter_valid_ip', "Musisz wprowadzić prawidłowy port dla Hosta. Wartość portu może wynosić od 0 do 65535, jednak zalecam od 1024 do 65535.");
define('OGP_LANG_could_not_add_server', "Nie można dodać serwera");
define('OGP_LANG_to_db', "do bazy danych.");
define('OGP_LANG_added_server', "Dodaj serwer");
define('OGP_LANG_with_port', "z portem");
define('OGP_LANG_to_db_succesfully', "pomyślnie do bazy danych.");
define('OGP_LANG_unable_discover', "Nie można automatycznie wykryć adresów IP");
define('OGP_LANG_set_ip_manually', "Musisz ustawić ręcznie Adres IP.");
define('OGP_LANG_found_ips', "Znaleziono IP");
define('OGP_LANG_for_remote_server', "dla serwera hosta.");
define('OGP_LANG_failed_add_ip', "Błąd przy dodawaniu IP");
define('OGP_LANG_timeout', "Time Out");
define('OGP_LANG_timeout_info', "The time limit in seconds to get response from this Agent.");
define('OGP_LANG_use_nat', "Użyj NAT");
define('OGP_LANG_use_nat_info', "Enable if your remote server is using NAT rules. Use this setting if your game servers are running on internal private LAN IP addresses so that the panel will use your real remote IP address to query the game servers.");
define('OGP_LANG_arrange_ports', "Arrange ports");
define('OGP_LANG_assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('OGP_LANG_assigned_ports_for_ip', "Assigned ports for IP %s");
define('OGP_LANG_unspecified_game_types', "Nieokreślone typy gier");
define('OGP_LANG_start_port', "Początkowy port:");
define('OGP_LANG_end_port', "Końcowy port:");
define('OGP_LANG_port_increment', "Port increment:");
define('OGP_LANG_total_assignable_ports', "Total assignable ports:");
define('OGP_LANG_available_range_ports', "Dozwolony zakres portów:");
define('OGP_LANG_assign_range', "Assign range");
define('OGP_LANG_edit_range', "Edytuj zakres");
define('OGP_LANG_delete_range', "Usuń zakres");
define('OGP_LANG_home_id', "ID Serwera");
define('OGP_LANG_home_path', "główna ścieżka:");
define('OGP_LANG_game_type', "Typ Gry");
define('OGP_LANG_port', "Port");
define('OGP_LANG_invalid_values', "Nieprawidłowe wartości.");
define('OGP_LANG_ports_in_range_already_arranged', "Ports in range already arranged.");
define('OGP_LANG_ports_range_already_configured_for', "Ports range already configured for %s.");
define('OGP_LANG_ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Ports range deleted successfully.");
define('OGP_LANG_ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('OGP_LANG_default_allowed', "Allowed by default");
define('OGP_LANG_allow_port_command', "Allow port command");
define('OGP_LANG_deny_port_command', "Deny port command");
define('OGP_LANG_allow_ip_port_command', "Allow IP:port command");
define('OGP_LANG_deny_ip_port_command', "Deny IP:port command");
define('OGP_LANG_enable_firewall_command', "Włącz komendy zapory");
define('OGP_LANG_disable_firewall_command', "Wyłącz komendy zapory");
define('OGP_LANG_get_firewall_status_command', "Pobierz status komend zapory");
define('OGP_LANG_reset_firewall_command', "Reset firewall command");
define('OGP_LANG_firewall_status', "Status zapory");
define('OGP_LANG_save_firewall_settings', "Zapisz ustawienia zapory");
define('OGP_LANG_reset_firewall', "Restart zapory");
define('OGP_LANG_firewall_settings', "Ustawienia Zapory");
define('OGP_LANG_display_public_ip', "Display Public IP");
define('OGP_LANG_ips_can_be_internal_external', "Enter usable IP addresses.&nbsp; Public IP addresses and internal LAN IP addresses (for NAT setups) can be used.");
?>
