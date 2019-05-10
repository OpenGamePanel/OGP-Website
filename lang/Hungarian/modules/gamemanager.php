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

define('OGP_LANG_no_games_to_monitor', "Nincs egyetlen játék sem konfigurálva neked, amit felügyelhetnél.");
define('OGP_LANG_status', "Állapot");
define('OGP_LANG_fail_no_mods', "Nincs mod engedélyezve ehhez a játékhoz! Meg kell kérned az adminisztrátort, hogy legalább egy játék modot engedélyezzen a számodra.");
define('OGP_LANG_no_game_homes_assigned', "Nincsenek szerverek hozzárendelve a fiókodhoz.");
define('OGP_LANG_select_game_home_to_configure', "Válasszd ki a konfigurálni kívánt szervert");
define('OGP_LANG_file_manager', "Fájlkezelő");
define('OGP_LANG_configure_mods', "Modok beállítása");
define('OGP_LANG_install_update_steam', "Telepítés/Frissítés Steamon keresztül");
define('OGP_LANG_install_update_manual', "Telepítés/Frissítés manuálisan");
define('OGP_LANG_assign_game_homes', "Játékszerverek hozzárendelése");
define('OGP_LANG_user', "Felhasználó");
define('OGP_LANG_group', "Csoport");
define('OGP_LANG_start', "Elindítás");
define('OGP_LANG_ogp_agent_ip', "OGP Agent IP");
define('OGP_LANG_max_players', "Max. játékos");
define('OGP_LANG_max', "Max.");
define('OGP_LANG_ip_and_port', "IP és Port");
define('OGP_LANG_available_maps', "Elérhető pályák");
define('OGP_LANG_map_path', "Pálya útvonal");
define('OGP_LANG_available_parameters', "Elérhető paraméterek");
define('OGP_LANG_start_server', "Szerver elindítása");
define('OGP_LANG_start_wait_note', "A szerver elindítása eltarthat egy ideig. Kérlek, várj mielőtt bezárod a böngésződet.");
define('OGP_LANG_game_type', "Játék típusa");
define('OGP_LANG_map', "Pálya");
define('OGP_LANG_starting_server', "Szerver indítása, kérlek várj...");
define('OGP_LANG_starting_server_settings', "Szerver indítása a következő beállításokkal");
define('OGP_LANG_startup_params', "Indítási paraméterek");
define('OGP_LANG_startup_cpu', "CPU amelyen a szerver fut");
define('OGP_LANG_startup_nice', "Nice értéke a szervernek");
define('OGP_LANG_game_home', "Szerver elérési útja");
define('OGP_LANG_server_started', "Szerver sikeresen elindult.");
define('OGP_LANG_no_parameter_access', "Nincs hozzáférésed a paraméterekhez.");
define('OGP_LANG_extra_parameters', "Extra paraméterek");
define('OGP_LANG_no_extra_param_access', "Nincs hozzáférésed az extra paraméterekhez.");
define('OGP_LANG_extra_parameters_info', "Ezek a paraméterek az indítóparancs végére kerülnek, amikor a játék szerver elindult.");
define('OGP_LANG_game_exec_not_found', "A játék indítófájla %s helyen nem található.");
define('OGP_LANG_select_params_and_start', "Válaszd ki az indítási paramétereket a szerver számára és nyomj '%s'-t.");
define('OGP_LANG_no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('OGP_LANG_unable_to_get_log', "Nem lehet megkapni a naplót, a retval %s.");
define('OGP_LANG_server_binary_not_executable', "A szerver bináris nem futtatható. Ellenőrizd, hogy megfelelő engedélyek vannak e a szerver mappában.");
define('OGP_LANG_server_not_running_log_found', "A szerver nem fut, de napló található. MEGJEGYZÉS: ez a napló esetleg nem kapcsolódik az utolsó szerver indításához.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT páros nincs birtokolva.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Alkalmatlan maxplayers érték maximum elérheto számú slot van állítva.");
define('OGP_LANG_server_running_not_responding', "Szerver fut, de nem válaszol,<br>előfordulhat, hogy valamilyen hibát ejtett, ezért érdemes átnézni a konfigurációt");
define('OGP_LANG_update_started', "Frissítés elkezdődött, kérlek várj...");
define('OGP_LANG_failed_to_start_steam_update', "A Steam frissítés elindítása sikertelen. Nézd meg az Agent naplóját.");
define('OGP_LANG_failed_to_start_rsync_update', "Az Rsync frissítés elindítása sikertelen. Nézd meg az Agent naplóját.");
define('OGP_LANG_update_completed', "Frissítés sikeresen befejezve.");
define('OGP_LANG_update_in_progress', "Frissítés folyamatban, kérlek várj...");
define('OGP_LANG_refresh_steam_status', "Steam állapot frissítése");
define('OGP_LANG_refresh_rsync_status', "Refresh Rsync status");
define('OGP_LANG_server_running_cant_update', "Szerver fut, így a frissítés nem lehetséges. Állítsd le a szervert frissítés előtt.");
define('OGP_LANG_xml_steam_error', "A kiválasztott szerver típus nem támogatja a Steam telepítést/frissítést.");
define('OGP_LANG_mod_key_not_found_from_xml', "A(z) '%s' mod kulcs nem található az XML fájlban.");
define('OGP_LANG_stop_update', "Frissítés leállítása");
define('OGP_LANG_statistics', "Statisztika");
define('OGP_LANG_servers', "Szerverek");
define('OGP_LANG_players', "Játékosok");
define('OGP_LANG_current_map', "Aktuális pálya");
define('OGP_LANG_stop_server', "Szerver leállítása");
define('OGP_LANG_server_ip_port', "Szerver IP:Port");
define('OGP_LANG_server_name', "Szerver neve");
define('OGP_LANG_server_id', "Szerver ID");
define('OGP_LANG_player_name', "Játékos név");
define('OGP_LANG_score', "Pontszám");
define('OGP_LANG_time', "Idő");
define('OGP_LANG_no_rights_to_stop_server', "Nincs engedélyed, hogy leállítsd ezt a szervert.");
define('OGP_LANG_no_ogp_lgsl_support', "Ehhez a játék szerverhez (%s) nincs LGSL támogatás az OGP-ben és ezért nem jelenítheto meg hozzá a statisztika.");
define('OGP_LANG_server_status', "Szerver státusz");
define('OGP_LANG_server_stopped', "A(z) '%s' szerver leállt.");
define('OGP_LANG_if_want_to_start_homes', "Ha játék szervereket akarsz elindítani, akkor menj a %s-ba.");
define('OGP_LANG_view_log', "Naplónéző");
define('OGP_LANG_if_want_manage', "Ha szeretné kezelni a játékokat meg tudod csinálni a");
define('OGP_LANG_columns', "oszlopok");
define('OGP_LANG_group_users', "Csoport felhasználók:");
define('OGP_LANG_assigned_to', "Hozzárendelve:");
define('OGP_LANG_restart_server', "Szerver újraindítása");
define('OGP_LANG_restarting_server', "Szerver újraindítása, kérlek várj...");
define('OGP_LANG_server_restarted', "A(z) '%s' szerver újraindítva.");
define('OGP_LANG_server_not_running', "A szerver nem fut.");
define('OGP_LANG_address', "Cím");
define('OGP_LANG_owner', "Tulajdonos");
define('OGP_LANG_operations', "Műveletek");
define('OGP_LANG_search', "Keresés");
define('OGP_LANG_maps_read_from', "A pályák olvasódnak a");
define('OGP_LANG_file', "fájl");
define('OGP_LANG_folder', "mappa");
define('OGP_LANG_unable_retrieve_mod_info', "Nem sikerült lekérni a mod információt az adatbázisból.");
define('OGP_LANG_unexpected_result_libremote', "Váratlan eredmény a libremote-val, kérlek, tájékoztasd a fejlesztőket.");
define('OGP_LANG_unable_get_info', "Nem sikerült megkapni a szükséges információt az indításhoz, az indítás blokkolása.");
define('OGP_LANG_server_already_running', "A szerver már fut. Ha nem látod a szervert a Játékfigyelőben, előfordulhat, hogy valamilyen probléma merült fel és");
define('OGP_LANG_already_running_stop_server', "Szerver leállítása.");
define('OGP_LANG_error_server_already_running', "HIBA: már fut szerver ezen a porton");
define('OGP_LANG_failed_start_server_code', "Nem sikerült elindítani a távoli szervert. Hibakód: %s");
define('OGP_LANG_disabled', "tiltva");
define('OGP_LANG_not_found_server', "Nem található távoli szerver az ID-vel");
define('OGP_LANG_rcon_command_title', "RCON parancs");
define('OGP_LANG_has_sent_to', "küldtünk");
define('OGP_LANG_need_set_remote_pass', "Be kell állítanod a távoli vezérlő jelszót");
define('OGP_LANG_before_sending_rcon_com', "mielőtt elküldjük az RCON parancsot neki.");
define('OGP_LANG_retry', "Újra");
define('OGP_LANG_page', "oldal");
define('OGP_LANG_server_cant_start', "a szerver nem tud elindulni");
define('OGP_LANG_server_cant_stop', "a szerver nem tud leállni");
define('OGP_LANG_error_occured_remote_host', "Hiba történt a távoli kiszolgálón");
define('OGP_LANG_follow_server_status', "A szerver státuszt követheted a");
define('OGP_LANG_addons', "Kiegészítők");
define('OGP_LANG_hostname', "Állomásnév");
define('OGP_LANG_rsync_install', "[Rsync telepítés]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Csapat");
define('OGP_LANG_deaths', "Halálok");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Képesség");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam azonosító");
define('OGP_LANG_player', "Játékos");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "Előre beállított RCON");
define('OGP_LANG_update_from_local_master_server', "Frissítés a helyi Mester szerverről");
define('OGP_LANG_update_from_selected_rsync_server', "Frissítés a kiválasztott Rsync szerverről");
define('OGP_LANG_execute_selected_server_operations', "A kiválasztott szerver műveletek végrehajtása");
define('OGP_LANG_execute_operations', "Műveletek végrehajtása");
define('OGP_LANG_account_expiration', "Fiók lejárat");
define('OGP_LANG_mysql_databases', "MySQL adatbázis");
define('OGP_LANG_failed_querying_server', "* Nem sikerült lekérdezni a szervert.");
define('OGP_LANG_query_protocol_not_supported', "* Nincs lekérdezési protokoll az OGP-ben, ami támogatná ezt a szervert.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Lekérdezések letiltható beállításával: Letiltása lekérdezések után: %s, mert van %s szerver.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON előre beállított parancs a játékhoz: %s és a modhoz: %s");
define('OGP_LANG_name', "Név");
define('OGP_LANG_command', "RCON&nbsp;parancs");
define('OGP_LANG_add_preset', "Új előre beállítás");
define('OGP_LANG_edit_presets', "Beállításkészlet szerkesztése");
define('OGP_LANG_del_preset', "Törlés");
define('OGP_LANG_change_preset', "Megváltoztatás");
define('OGP_LANG_send_command', "Parancs küldés");
define('OGP_LANG_starting_copy_with_master_server_named', "Kezdve másolatot master szerver neve '%s'...");
define('OGP_LANG_starting_sync_with', "Szinkronizálás elkezdése a(z) %s-vel...");
define('OGP_LANG_refresh_interval', "Napló frissítési intervallum");
define('OGP_LANG_finished_manual_update', "Befejezve a manuális frissítés.");
define('OGP_LANG_failed_to_start_file_download', "Nem sikerült elindítani a fájl letöltést");
define('OGP_LANG_game_name', "Játék neve");
define('OGP_LANG_dest_dir', "Cél könyvtár");
define('OGP_LANG_remote_server', "Távoli szerver");
define('OGP_LANG_file_url', "Fájl URL");
define('OGP_LANG_file_url_info', "A feltöltött és tömörítetlen fájl URL-címe a könyvtárhoz.");
define('OGP_LANG_dest_filename', "Célfájlnév");
define('OGP_LANG_dest_filename_info', "A célfájl fájlneve.");
define('OGP_LANG_update_server', "Szerver frissítés");
define('OGP_LANG_unavailable', "Nem elérhető");
define('OGP_LANG_upload_map_image', "Pálya kép feltöltése");
define('OGP_LANG_upload_image', "Kép feltöltése");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "A kép legyen jpg, gif vagy png és kevesebb mint 1 MB.");
define('OGP_LANG_check_dev_console', "Hiba a fájl feltöltése során, kérlek, ellenőrizd a böngésző fejlesztői konzolját.");
define('OGP_LANG_uploaded_successfully', "Sikeres feltöltés.");
define('OGP_LANG_cant_create_folder', "Nem hozható létre a(z) <br><b>%s</b> mappa.");
define('OGP_LANG_cant_write_file', "Nem írható a <br>%s<br> fájl.");
define('OGP_LANG_exceeded_php_directive', "PHP direktíva túllépve.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Ismeretlen hibák.");
define('OGP_LANG_directory', "könyvtárból");
define('OGP_LANG_view_player_commands', "Játékos parancsok mutatása");
define('OGP_LANG_hide_player_commands', "Játékos parancsok elrejtése");
define('OGP_LANG_no_online_players', "Nincsenek online játékosok.");
define('OGP_LANG_invalid_game_mod_id', "Érvénytelen játék/mod ID meghatározva.");
define('OGP_LANG_auto_update_title_popup', "Steam automatikus frissítési link");
define('OGP_LANG_auto_update_popup_html', "<p>Használd az alábbi linket az ellenőrzéshez és az automatikus frissítéshez a játékszerveredhez a Steamen keresztül, ha szükséges.&nbsp; A cronjob segítségével lekérdezheted vagy manuálisan is elindíthatod a folyamatot.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Másolás");
define('OGP_LANG_auto_update_copy_me_success', "Másolva!");
define('OGP_LANG_auto_update_copy_me_fail', "Nem sikerült másolni. Kérlek, másold át manuálisan a linket.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Automatikus frissítési link");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Megpróbálod frissíteni ezt a szervert egy nem Mester szerverről.");
define('OGP_LANG_cannot_update_from_own_self', "A helyi szerver frissítés nem működik Mester szerveren.");
define('OGP_LANG_show_server_id', "Szerver ID mutatása");
define('OGP_LANG_hide_server_id', "Szerver ID elrejtése");
define('OGP_LANG_edit_configuration_files', "Konfigurációs fájlok szerkesztése");
define('OGP_LANG_admin', "Adminisztrátor");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Fantom");
define('OGP_LANG_sec', "Másodpercek");
define('OGP_LANG_unknown_rsync_mirror', "You attempted to start an update from a mirror which doesn't exist.");
define('OGP_LANG_custom_fields', "Egyéni mezők");
?>
