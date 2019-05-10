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

define('OGP_LANG_no_games_to_monitor', "Nie masz żadnych gier, które mogą być monitorowane.");
define('OGP_LANG_status', "Status");
define('OGP_LANG_fail_no_mods', "Brak aktywnych modów do tej gry! Musisz zwrócić się do admin OGP by dodać mod dla wybranej dla ciebie gry.");
define('OGP_LANG_no_game_homes_assigned', "Nie posiadasz żadnych serwerów przypisanych do Twojego konta.");
define('OGP_LANG_select_game_home_to_configure', "Wybierz serwer gry, który chcesz skonfigurować");
define('OGP_LANG_file_manager', "Manager Plików");
define('OGP_LANG_configure_mods', "Konfiguruj Mody");
define('OGP_LANG_install_update_steam', "Instaluj/Aktualizuj przez SteamCMD");
define('OGP_LANG_install_update_manual', "Instaluj/Aktualizuj Ręcznie");
define('OGP_LANG_assign_game_homes', "Przypisywanie serwerów gier");
define('OGP_LANG_user', "Użytkownik");
define('OGP_LANG_group', "Grupa");
define('OGP_LANG_start', "Start");
define('OGP_LANG_ogp_agent_ip', "IP Agenta OGP");
define('OGP_LANG_max_players', "Maks Graczy");
define('OGP_LANG_max', "Maks");
define('OGP_LANG_ip_and_port', "IP i Port");
define('OGP_LANG_available_maps', "Dostępne mapy");
define('OGP_LANG_map_path', "Ścieżka Map");
define('OGP_LANG_available_parameters', "Dostępne paramentry");
define('OGP_LANG_start_server', "Start");
define('OGP_LANG_start_wait_note', "Uruchomienie serwera może trochę potrwać. Proszę nie zamykaj przeglądarki.");
define('OGP_LANG_game_type', "Rodzaj gry");
define('OGP_LANG_map', "Mapa");
define('OGP_LANG_starting_server', "Uruchamianie serwera, proszę czekać...");
define('OGP_LANG_starting_server_settings', "Uruchamianie serwera z następującymi ustawieniami");
define('OGP_LANG_startup_params', "Parametry startowe");
define('OGP_LANG_startup_cpu', "CPU na którym uruchomiony jest serwer");
define('OGP_LANG_startup_nice', "Priorytet serwera");
define('OGP_LANG_game_home', "Ścieżka domowa");
define('OGP_LANG_server_started', "Serwer został uruchomiony pomyślnie.");
define('OGP_LANG_no_parameter_access', "Nie masz dostępu do ustawień.");
define('OGP_LANG_extra_parameters', "Parametry dodatkowe");
define('OGP_LANG_no_extra_param_access', "Nie masz dostępu do dodatkowych parametrów.");
define('OGP_LANG_extra_parameters_info', "Parametry te są wprowadzane do końca linii poleceń podczas uruchamiania gry.");
define('OGP_LANG_game_exec_not_found', "plik gry wykonywalny %s nie znależiono w katalogu gry");
define('OGP_LANG_select_params_and_start', "Wybierz parametry uruchomienia serwera i naciśnij '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Nr IP par Port przypisane do tego hosta. Jeśli nie masz dostępu do edycji hosta skontaktuj się z administratorem..");
define('OGP_LANG_unable_to_get_log', "Nie można uzyskać logu, retval %s.");
define('OGP_LANG_server_binary_not_executable', "Plik binarny nie jest wykonywalny. Proszę sprawdzić uprawnienia chmod w katalogu serwera.");
define('OGP_LANG_server_not_running_log_found', "Serwer nie działa, ale znaleziono logi serwera. INFO: Może to oznaczać że logi pochodzą z poprzedniego uruchomienia serwera.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT par nie jesteś włascielem.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nieodpowiednie wartość maxplayers, maksymalne, osiągalne liczba slotów została ustawiona.");
define('OGP_LANG_server_running_not_responding', "Serwer jest uruchomiony, ale nie odpowiada, <br>może być jakiś problem, a może chcesz ");
define('OGP_LANG_update_started', "Aktualizacje rozpoczęte, proszę czekać ...");
define('OGP_LANG_failed_to_start_steam_update', "Nie udało się uruchomić update Steam. Zobacz Log Agenta.");
define('OGP_LANG_failed_to_start_rsync_update', "Nie udało się uruchomić update Rsync. Zobacz Log Agenta.");
define('OGP_LANG_update_completed', "Aktualizacja została zakończona pomyślnie.");
define('OGP_LANG_update_in_progress', "Aktualizacja w toku, proszę czekać ...");
define('OGP_LANG_refresh_steam_status', "Odśwież status Steam");
define('OGP_LANG_refresh_rsync_status', "Refresh Rsync status");
define('OGP_LANG_server_running_cant_update', "Aktualizacja serwera nie jest możliwa. Zatrzymaj serwer przed aktualizacją.");
define('OGP_LANG_xml_steam_error', "Wybrany serwer nie obsługuje instalacji/aktualizacji przez Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Mod klucz '%s' nie znaleziony w pliku XML.");
define('OGP_LANG_stop_update', "Zatrzymaj aktualizacje");
define('OGP_LANG_statistics', "Statystyki");
define('OGP_LANG_servers', "Serwery");
define('OGP_LANG_players', "Gracze");
define('OGP_LANG_current_map', "Aktualna mapa");
define('OGP_LANG_stop_server', "Zatrzymaj");
define('OGP_LANG_server_ip_port', "IP:Port Serwera");
define('OGP_LANG_server_name', "Nazwa Serwera");
define('OGP_LANG_server_id', "id");
define('OGP_LANG_player_name', "Nazwa Gracza");
define('OGP_LANG_score', "Pkt");
define('OGP_LANG_time', "Czas");
define('OGP_LANG_no_rights_to_stop_server', "Nie masz uprawnień, aby zatrzymać ten serwer..");
define('OGP_LANG_no_ogp_lgsl_support', "Ten serwer. (działa: %s) nie ma LGSL wsparcia w OGP i jego statystyki nie mogą być pokazane.");
define('OGP_LANG_server_status', "Serwer na %s jest %s.");
define('OGP_LANG_server_stopped', "Server '%s' został zatrzymany.");
define('OGP_LANG_if_want_to_start_homes', "Jeśli chcesz rozpocząć grę przejdź do %s.");
define('OGP_LANG_view_log', "Log Viewer");
define('OGP_LANG_if_want_manage', "Jeśli chcesz zarządzać grą możesz to zrobić w");
define('OGP_LANG_columns', "kolumny");
define('OGP_LANG_group_users', "Grupa użytkowników:");
define('OGP_LANG_assigned_to', "Przypisany do:");
define('OGP_LANG_restart_server', "Restart");
define('OGP_LANG_restarting_server', "Restartowanie serwera, proszę czekać...");
define('OGP_LANG_server_restarted', "Serwer '%s' został zrestartowany.");
define('OGP_LANG_server_not_running', "Serwer nie jest uruchomiony.");
define('OGP_LANG_address', "Adres");
define('OGP_LANG_owner', "Właściciel");
define('OGP_LANG_operations', "Operator");
define('OGP_LANG_search', "Szukaj");
define('OGP_LANG_maps_read_from', "Mapy wczytane z");
define('OGP_LANG_file', "plik");
define('OGP_LANG_folder', "katalog");
define('OGP_LANG_unable_retrieve_mod_info', "Nie można pobrać informacji moda z bazy danych.");
define('OGP_LANG_unexpected_result_libremote', "Niespodziewany wynik libremote, proszę poinformować administratora.");
define('OGP_LANG_unable_get_info', "Nie można uzyskać wymaganych informacji dotyczących uruchamiania, blokowania uruchamiania.");
define('OGP_LANG_server_already_running', "Serwer jest już uruchomiony. Jeśli nie widzisz serwera w Statusie Serwerów, może to oznaczać problem, może chcesz");
define('OGP_LANG_already_running_stop_server', "Zatrzymaj");
define('OGP_LANG_error_server_already_running', "BŁĄD: Serwer już działa w porcie");
define('OGP_LANG_failed_start_server_code', "Nie można uruchomić zdalnego serwera. Kod Błędu: %s");
define('OGP_LANG_disabled', "wyłączony");
define('OGP_LANG_not_found_server', "Nie można znaleźć zdalnego serwera z ID");
define('OGP_LANG_rcon_command_title', "Komenda RCON");
define('OGP_LANG_has_sent_to', "został wysłany do");
define('OGP_LANG_need_set_remote_pass', "Musisz ustawić hasło RCON");
define('OGP_LANG_before_sending_rcon_com', "przed wysłaniem do niego poleceń rcon.");
define('OGP_LANG_retry', "Powtórz");
define('OGP_LANG_page', "strona");
define('OGP_LANG_server_cant_start', "nie można uruchomić serwera");
define('OGP_LANG_server_cant_stop', "nie można zatrzymać serwera");
define('OGP_LANG_error_occured_remote_host', "Wystąpił błąd zdalnego hosta");
define('OGP_LANG_follow_server_status', "Możesz śledzić stan serwera z");
define('OGP_LANG_addons', "Dodatki");
define('OGP_LANG_hostname', "Nazwa hosta");
define('OGP_LANG_rsync_install', "[Instalacja Rsync]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Team");
define('OGP_LANG_deaths', "Zgony");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "BOT");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Gracz");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "Konsola RCON");
define('OGP_LANG_update_from_local_master_server', "Update from local Master Server");
define('OGP_LANG_update_from_selected_rsync_server', "Update from selected Rsync server");
define('OGP_LANG_execute_selected_server_operations', "Wykonaj wybrane operacje serwera");
define('OGP_LANG_execute_operations', "Wykonaj operacje");
define('OGP_LANG_account_expiration', "Konto wygaśnie");
define('OGP_LANG_mysql_databases', "Bazy MySQL");
define('OGP_LANG_failed_querying_server', "* Nie udało się zapytać serwera.");
define('OGP_LANG_query_protocol_not_supported', "* W OGP nie ma protokołu zapytania, który może obsługiwać ten serwer.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Zapytania wyłączone przez ustawienie: Wyłącz zapytania po: %s, ponieważ posiadasz %s serwerów.<br>");
define('OGP_LANG_presets_for_game_and_mod', "Konsola RCON dla gry %s mod %s");
define('OGP_LANG_name', "Nazwa");
define('OGP_LANG_command', "Komenda&nbsp;RCON");
define('OGP_LANG_add_preset', "Dodaj preset");
define('OGP_LANG_edit_presets', "Edytuj presets");
define('OGP_LANG_del_preset', "Usuń");
define('OGP_LANG_change_preset', "Zmień");
define('OGP_LANG_send_command', "Wyślij komendę");
define('OGP_LANG_starting_copy_with_master_server_named', "Uruchamianie kopii z nazwą serwera głównego '%s'...");
define('OGP_LANG_starting_sync_with', "Uruchamianie synchronizacji z %s...");
define('OGP_LANG_refresh_interval', "Czas odświeżania logów");
define('OGP_LANG_finished_manual_update', "Ręczna aktualizacja ukończona.");
define('OGP_LANG_failed_to_start_file_download', "Nie udało się rozpocząć pobierania pliku");
define('OGP_LANG_game_name', "Nazwa Gry");
define('OGP_LANG_dest_dir', "Katalog docelowy");
define('OGP_LANG_remote_server', "Serwer Zdalny");
define('OGP_LANG_file_url', "Adres Pliku");
define('OGP_LANG_file_url_info', "Adres URL pliku przesłanego i nieskompresowanego do katalogu.");
define('OGP_LANG_dest_filename', "Docelowa nazwa pliku");
define('OGP_LANG_dest_filename_info', "Nazwa pliku docelowego.");
define('OGP_LANG_update_server', "Aktualizuj Serwer");
define('OGP_LANG_unavailable', "Niedostępne");
define('OGP_LANG_upload_map_image', "Wyślij obrazek mapy");
define('OGP_LANG_upload_image', "Wyślij obrazek");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Zapisywanie obrazu w formacie jpg, gif lub png oraz rozmiar < 1MB");
define('OGP_LANG_check_dev_console', "Błąd podczas przesyłania pliku sprawdź w konsoli programisty przeglądarki.");
define('OGP_LANG_uploaded_successfully', "Wysyłanie kompletne.");
define('OGP_LANG_cant_create_folder', "Nie można utworzyć folderu:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Nie można zapisać pliku:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Przekroczono dyrektywę PHP.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Nieznane błędy.");
define('OGP_LANG_directory', "Ścieżka katalogu");
define('OGP_LANG_view_player_commands', "Pokaż Komendy Gracza");
define('OGP_LANG_hide_player_commands', "Ukryj Komendy Gracza");
define('OGP_LANG_no_online_players', "Brak graczy online.");
define('OGP_LANG_invalid_game_mod_id', "Nieprawidłowa identyfikator gry/mod.");
define('OGP_LANG_auto_update_title_popup', "Auto Aktualizacja Steam Link");
define('OGP_LANG_auto_update_popup_html', "<p>Skorzystaj z poniższego linku, aby sprawdzić i automatycznie aktualizować serwer gry poprzez Steam, jeśli to konieczne.&nbsp; Można ją zapytać przy użyciu narzędzia CRON lub ręcznie zainicjować proces.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Kopiuj");
define('OGP_LANG_auto_update_copy_me_success', "Skopiowano!");
define('OGP_LANG_auto_update_copy_me_fail', "Nie udało się skopiować. Proszę ręcznie skopiować link.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Auto Aktualizacja Link");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Użytkownik %s próbował zaktualizować home_id %d z serwera innego niż serwer źródłowy. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Próbujesz zaktualizować ten serwer z serwera innego niż źródłowy.");
define('OGP_LANG_cannot_update_from_own_self', "Aktualizacja lokalnego serwera może nie działać na serwerze głównym.");
define('OGP_LANG_show_server_id', "Pokaż ID Serwerów");
define('OGP_LANG_hide_server_id', "Ukryj ID Serwerów");
define('OGP_LANG_edit_configuration_files', "Edytuj pliki konfiguracyjne");
define('OGP_LANG_admin', "Administrator");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "Sekundy");
define('OGP_LANG_unknown_rsync_mirror', "Podjęto próbę uruchomienia aktualizacji z nieistniejącego serwera lustrzanego.");
define('OGP_LANG_custom_fields', "Pola niestandardowe");
?>
