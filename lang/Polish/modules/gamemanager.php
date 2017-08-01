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

define('game_manager', "Manager Gier");
define('no_games_to_monitor', "Nie masz żadnych gier, które mogą być monitorowane.");
define('status', "Status");
define('fail_no_mods', "Brak aktywnych modów do tej gry! Musisz zwrócić się do admin OGP by dodać mod dla wybranej dla ciebie gry.");
define('no_game_homes_assigned', "Brak serwerów gry przeznaczonych dla Ciebie. Musisz zwrócić się do admin OGP by przypisać dla Ciebie serwery.");
define('select_game_home_to_configure', "Wybierz serwer gry, który chcesz skonfigurować");
define('file_manager', "Manager Plików");
define('configure_mods', "Konfiguruj Mody");
define('install_update_steam', "Instaluj/Aktualizuj przez SteamCMD");
define('install_update_manual', "Instaluj/Aktualizuj Ręcznie");
define('assign_game_homes', "Przypisywanie serwerów gier");
define('user', "Użytkownik");
define('group', "Grupa");
define('start', "Start");
define('ogp_agent_ip', "IP Agenta OGP");
define('max_players', "Maks Graczy");
define('max', "Maks");
define('ip_and_port', "IP i Port");
define('available_maps', "Dostępne mapy");
define('map_path', "Ścieżka Map");
define('available_parameters', "Dostępne paramentry");
define('start_server', "Start");
define('start_wait_note', "Uruchomienie serwera może trochę potrwać. Proszę nie zamykaj przeglądarki.");
define('game_type', "Rodzaj gry");
define('map', "Mapa");
define('starting_server', "Uruchamianie serwera, proszę czekać...");
define('starting_server_settings', "Uruchamianie serwera z następującymi ustawieniami");
define('startup_params', "Parametry startowe");
define('startup_cpu', "CPU na którym uruchomiony jest serwer");
define('startup_nice', "NICE wartość serwera");
define('game_home', "Strona główna gry");
define('server_started', "Serwer został uruchomiony pomyślnie.");
define('no_parameter_access', "Nie masz dostępu do ustawień.");
define('extra_parameters', "Parametry dodatkowe");
define('no_extra_param_access', "Nie masz dostępu do dodatkowych parametrów.");
define('extra_parameters_info', "Parametry te są wprowadzane do końca linii poleceń podczas uruchamiania gry.");
define('game_exec_not_found', "plik gry wykonywalny %s nie znależiono w katalogu gry");
define('select_params_and_start', "Wybierz parametry uruchomienia serwera i naciśnij '%s'.");
define('no_ip_port_pairs_assigned', "Nr IP par Port przypisane do tego hosta. Jeśli nie masz dostępu do edycji hosta skontaktuj się z administratorem..");
define('unable_to_get_log', "Nie można uzyskać logu, retval %s.");
define('server_binary_not_executable', "Plik binarny nie jest wykonywalny. Proszę sprawdzić uprawnienia chmod w katalogu serwera.");
define('server_not_running_log_found', "Serwer nie działa, ale znaleziono logi serwera. INFO: Może to oznaczać że logi pochodzą z poprzedniego uruchomienia serwera.");
define('ip_port_pair_not_owned', "IP:PORT par nie jesteś włascielem.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nieodpowiednie wartość maxplayers, maksymalne, osiągalne liczba slotów została ustawiona.");
define('server_running_not_responding', "Serwer jest uruchomiony, ale nie odpowiada, <br>może być jakiś problem, a może chcesz ");
define('update_started', "Aktualizacje rozpoczęte, proszę czekać ...");
define('failed_to_start_steam_update', "Nie udało się uruchomić update Steam. Zobacz Log Agenta.");
define('failed_to_start_rsync_update', "Nie udało się uruchomić update Rsync. Zobacz Log Agenta.");
define('update_completed', "Aktualizacja została zakończona pomyślnie.");
define('update_in_progress', "Aktualizacja w toku, proszę czekać ...");
define('refresh_steam_status', "Odśwież status Steam");
define('refresh_rsync_status', "Odśwież status rsync");
define('server_running_cant_update', "Aktualizacja serwera nie jest możliwa. Zatrzymaj serwer przed aktualizacją.");
define('xml_steam_error', "Wybrany serwer nie obsługuje instalacji/aktualizacji przez Steam.");
define('mod_key_not_found_from_xml', "Mod klucz '%s' nie znaleziony w pliku XML.");
define('stop_update', "Zatrzymaj aktualizacje");
define('statistics', "Statystyki");
define('servers', "Serwery");
define('players', "Gracze");
define('current_map', "Aktualna mapa");
define('stop_server', "Zatrzymaj");
define('server_ip_port', "IP:Port Serwera");
define('server_name', "Nazwa Serwera");
define('server_id', "id");
define('player_name', "Nazwa Gracza");
define('score', "Pkt");
define('time', "Czas");
define('no_rights_to_stop_server', "Nie masz uprawnień, aby zatrzymać ten serwer..");
define('no_ogp_lgsl_support', "Ten serwer. (działa: %s) nie ma LGSL wsparcia w OGP i jego statystyki nie mogą być pokazane.");
define('server_status', "Serwer na %s jest %s.");
define('server_stopped', "Server '%s' został zatrzymany.");
define('if_want_to_start_homes', "Jeśli chcesz rozpocząć grę przejdź do %s.");
define('view_log', "Logi");
define('if_want_manage', "Jeśli chcesz zarządzać grą możesz to zrobić w");
define('columns', "kolumny");
define('group_users', "Grupa użytkowników:");
define('assigned_to', "Przypisany do:");
define('restart_server', "Restart");
define('restarting_server', "Restartowanie serwera, proszę czekać...");
define('server_restarted', "Serwer '%s' został zrestartowany.");
define('server_not_running', "Serwer nie jest uruchomiony.");
define('address', "Adres");
define('owner', "Właściciel");
define('operations', "Operator");
define('search', "Szukaj");
define('maps_read_from', "Mapy wczytane z");
define('file', "plik");
define('folder', "katalog");
define('unable_retrieve_mod_info', "Nie można pobrać informacji moda z bazy danych.");
define('unexpected_result_libremote', "Niespodziewany wynik libremote, proszę poinformować administratora.");
define('unable_get_info', "Nie można uzyskać wymaganych informacji dotyczących uruchamiania, blokowania uruchamiania.");
define('server_already_running', "Serwer jest już uruchomiony. Jeśli nie widzisz serwera w Statusie Serwerów, może to oznaczać problem, może chcesz");
define('already_running_stop_server', "Zatrzymaj");
define('error_server_already_running', "BŁĄD: Serwer już działa w porcie");
define('failed_start_server_code', "Nie można uruchomić zdalnego serwera. Kod Błędu: %s");
define('disabled', "wyłączony");
define('not_found_server', "Nie można znaleźć zdalnego serwera z ID");
define('rcon_command_title', "Komenda RCON");
define('has_sent_to', "został wysłany do");
define('need_set_remote_pass', "Musisz ustawić hasło RCON");
define('before_sending_rcon_com', "przed wysłaniem do niego poleceń rcon.");
define('retry', "Powtórz");
define('page', "strona");
define('server_cant_start', "nie można uruchomić serwera");
define('server_cant_stop', "nie można zatrzymać serwera");
define('error_occured_remote_host', "Wystąpił błąd zdalnego hosta");
define('follow_server_status', "Możesz śledzić stan serwera z");
define('addons', "Dodatki");
define('hostname', "Nazwa hosta");
define('rsync_install', "[Instalacja Rsync]");
define('ping', "Ping");
define('team', "Team");
define('deaths', "Zgony");
define('pid', "PID");
define('skill', "Skill");
define('AIBot', "BOT");
define('steamid', "Steam ID");
define('player', "Gracz");
define('port', "Port");
define('rcon_presets', "Konsola RCON");
define('update_from_local_master_server', "Update from local Master Server");
define('update_from_selected_rsync_server', "Update from selected Rsync server");
define('execute_selected_server_operations', "Wykonaj wybrane operacje serwera");
define('execute_operations', "Wykonaj operacje");
define('account_expiration', "Konto wygaśnie");
define('mysql_databases', "Bazy MySQL");
define('failed_querying_server', "* Nie udało się zapytać serwera.");
define('query_protocol_not_supported', "* W OGP nie ma protokołu zapytania, który może obsługiwać ten serwer.");
define('queries_disabled_by_setting_disable_queries_after', "Zapytania wyłączone przez ustawienie: Wyłącz zapytania po: %s, ponieważ posiadasz %s serwerów.<br>");
define('presets_for_game_and_mod', "Konsola RCON dla gry %s mod %s");
define('name', "Nazwa");
define('command', "Komenda&nbsp;RCON");
define('add_preset', "Dodaj preset");
define('edit_presets', "Edytuj presets");
define('del_preset', "Usuń");
define('change_preset', "Zmień");
define('send_command', "Wyślij komendę");
define('starting_copy_with_master_server_named', "Uruchamianie kopii z nazwą serwera głównego '%s'...");
define('starting_sync_with', "Uruchamianie synchronizacji z %s...");
define('refresh_interval', "Czas odświeżania logów");
define('finished_manual_update', "Ręczna aktualizacja ukończona.");
define('failed_to_start_file_download', "Nie udało się rozpocząć pobierania pliku");
define('game_name', "Nazwa Gry");
define('dest_dir', "Katalog docelowy");
define('remote_server', "Serwer Zdalny");
define('file_url', "Adres Pliku");
define('file_url_info', "Adres URL pliku przesłanego i nieskompresowanego do katalogu.");
define('dest_filename', "Docelowa nazwa pliku");
define('dest_filename_info', "Nazwa pliku docelowego.");
define('update_server', "Aktualizuj Serwer");
define('unavailable', "Niedostępne");
define('upload_map_image', "Wyślij obrazek mapy");
define('upload_image', "Wyślij obrazek");
define('jpg_gif_png_less_than_1mb', "Zapisywanie obrazu w formacie jpg, gif lub png oraz rozmiar < 1MB");
define('check_dev_console', "Błąd podczas przesyłania pliku sprawdź w konsoli programisty przeglądarki.");
define('uploaded_successfully', "Wysyłanie kompletne.");
define('cant_create_folder', "Nie można utworzyć folderu:<br><b>%s</b>");
define('cant_write_file', "Nie można zapisać pliku:<br><b>%s</b>");
define('exceeded_php_directive', "Przekroczono dyrektywę PHP.<br><b>%s</b>.");
define('unknown_errors', "Nieznane błędy.");
define('directory', "Ścieżka katalogu");
define('view_player_commands', "Pokaż Komendy Gracza");
define('hide_player_commands', "Ukryj Komendy Gracza");
define('no_online_players', "Brak graczy online.");
define('invalid_game_mod_id', "Nieprawidłowa identyfikator gry/mod.");
define('auto_update_title_popup', "Auto Aktualizacja Steam Link");
define('auto_update_popup_html', "<p>Skorzystaj z poniższego linku, aby sprawdzić i automatycznie aktualizować serwer gry poprzez Steam, jeśli to konieczne.&nbsp; Można ją zapytać przy użyciu narzędzia CRON lub ręcznie zainicjować proces.</p>");
define('auto_update_copy_me', "Kopiuj");
define('auto_update_copy_me_success', "Skopiowano!");
define('auto_update_copy_me_fail', "Błąd kopiowania. Proszę skopiuj link ręcznie.");
define('get_steam_autoupdate_api_link', "Auto Aktualizacja Link");
define('update_attempt_from_nonmaster_server', "Użytkownik %s próbował zaktualizować home_id %d z serwera innego niż serwer źródłowy. (Home ID: %d)");
define('attempting_nonmaster_update', "Próbujesz zaktualizować ten serwer z serwera innego niż źródłowy.");
define('cannot_update_from_own_self', "Lokalna aktualizacja serwera może nie działać na źródłowym serwerze.");
define('show_server_id', "Pokaż ID Serwerów");
define('hide_server_id', "Ukryj ID Serwerów");
?>