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

define('game_manager', "Játék kezelő");
define('no_games_to_monitor', "Nincs egyetlen játék sem konfigurálva neked, amit felügyelhetnél.");
define('status', "Státusz");
define('fail_no_mods', "Nincs mod engedélyezve ehhez a játékhoz! Meg kell kérned az adminisztrátort, hogy legalább egy játék modot engedélyezzen a számodra.");
define('no_game_homes_assigned', "Nincsenek játék szerverek hozzád rendelve. Meg kell kérdned az OGP Admint, hogy rendeljen játékot hozzád.");
define('select_game_home_to_configure', "Válassz ki egy szervert amit konfigurálni akarsz");
define('file_manager', "Fájlkezelő");
define('configure_mods', "Modok beállítása");
define('install_update_steam', "Telepítés/Frissítés Steam-en keresztül");
define('install_update_manual', "Telepítés/Frissítés manuálisan");
define('assign_game_homes', "Játék szerver hozzárendelése");
define('user', "Felhasználó");
define('group', "Csoport");
define('start', "Elindítás");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Max. játékos");
define('max', "Max.");
define('ip_and_port', "IP és Port");
define('available_maps', "Elérhető pályák");
define('map_path', "Pálya útvonal");
define('available_parameters', "Elérhető paraméterek");
define('start_server', "Szerver elindítása");
define('start_wait_note', "A szerver elindítása eltarthat egy ideig. Kérlek, várj mielőtt bezárod a böngésződet.");
define('game_type', "Játék típus");
define('map', "Pálya");
define('starting_server', "Szerver indítása, kérlek várj...");
define('starting_server_settings', "Szerver indítása a következő beállításokkal");
define('startup_params', "Indítási paraméterek");
define('startup_cpu', "CPU amelyen a szerver fut");
define('startup_nice', "Nice értéke a szervernek");
define('game_home', "játék szerver");
define('server_started', "Szerver sikeresen elindult.");
define('no_parameter_access', "Nincs hozzáférésed a paraméterekhez.");
define('extra_parameters', "Extra paraméterek");
define('no_extra_param_access', "Nincs hozzáférésed az extra paraméterekhez.");
define('extra_parameters_info', "Ezek a paraméterek az indítóparancs végére kerülnek a játék szerver indításakor.");
define('game_exec_not_found', "A játék indítófájla %s helyen nem található.");
define('select_params_and_start', "Kiválasztott paraméterekkel szerver indítás");
define('no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('unable_to_get_log', "Nem lehet megkapni a naplót, a retval %s.");
define('server_binary_not_executable', "A szerver bináris nem futtatható. Ellenőrizd, hogy megfelelő engedélyek vannak e a szerver mappában.");
define('server_not_running_log_found', "A szerver nem fut, de napló található. MEGJEGYZÉS: ez a napló esetleg nem kapcsolódik az utolsó szerver indításához.");
define('ip_port_pair_not_owned', "IP:PORT páros nincs birtokolva.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Alkalmatlan maxplayers érték maximum elérheto számú slot van állítva.");
define('server_running_not_responding', "Szerver fut, de nem válaszol,<br>előfordulhat, hogy valamilyen hibát ejtett, ezért érdemes átnézni a konfigurációt");
define('update_started', "Frissítés elkezdődött, kérlek várj...");
define('failed_to_start_steam_update', "A Steam frissítés elindítása sikertelen. Nézd meg az Agent naplóját.");
define('failed_to_start_rsync_update', "Az Rsync frissítés elindítása sikertelen. Nézd meg az Agent naplóját.");
define('update_completed', "Frissítés sikeresen befejezve.");
define('update_in_progress', "Frissítés folyamatban, kérlek várj...");
define('refresh_steam_status', "Steam állapot frissítése");
define('refresh_rsync_status', "Rsync állapot frissítése");
define('server_running_cant_update', "Szerver fut, így a frissítés nem lehetséges. Állítsd le a szervert frissítés előtt.");
define('xml_steam_error', "A kiválasztott szerver típus nem támogatja a Steam telepítést/frissítést.");
define('mod_key_not_found_from_xml', "A(z) '%s' mod kulcs nem található az XML fájlban.");
define('stop_update', "Frissítés leállítása");
define('statistics', "Statisztika");
define('servers', "Szerverek");
define('players', "Játékosok");
define('current_map', "Aktuális pálya");
define('stop_server', "Szerver leállítása");
define('server_ip_port', "Szerver IP:Port");
define('server_name', "Szerver neve");
define('server_id', "Szerver ID");
define('player_name', "Játékos név");
define('score', "Pontszám");
define('time', "Idő");
define('no_rights_to_stop_server', "Nincs engedélyed, hogy leállítsd ezt a szervert.");
define('no_ogp_lgsl_support', "Ehhez a játék szerverhez (%s) nincs LGSL támogatás az OGP-ben és ezért nem jelenítheto meg hozzá a statisztika.");
define('server_status', "Szerver státusz");
define('server_stopped', "Szerver leállítása sikeres.");
define('if_want_to_start_homes', "Ha játék szervereket akarsz elindítani, menj a %sba.");
define('view_log', "Naplók");
define('if_want_manage', "Ha szeretné kezelni a játékokat meg tudod csinálni a");
define('columns', "oszlopok");
define('group_users', "Csoport felhasználók:");
define('assigned_to', "Hozzárendelve:");
define('restart_server', "Szerver újraindítása");
define('restarting_server', "Szerver újraindítása, kérlek várj...");
define('server_restarted', "A(z) '%s' szerver újraindítva.");
define('server_not_running', "A szerver nem fut.");
define('address', "Cím");
define('owner', "Tulajdonos");
define('operations', "Műveletek");
define('search', "Keresés");
define('maps_read_from', "Pálya olvasható ");
define('file', "fájl");
define('folder', "könyvtár");
define('unable_retrieve_mod_info', "Nem sikerült lekérdezni a mod információt az adatbázisból.");
define('unexpected_result_libremote', "Váratlan eredmény a libremote-val, kérlek, tájékoztasd a fejlesztőket.");
define('unable_get_info', "Nem sikerült megkapni a szükséges információt az indításhoz, az indítás blokkolása.");
define('server_already_running', "A szerver már fut. Ha nem látod a szervert a Szerver felügyeletben, előfordulhat, hogy valamilyen probléma merült fel és");
define('already_running_stop_server', "Szerver leállítása.");
define('error_server_already_running', "HIBA: már fut szerver ezen a porton");
define('failed_start_server_code', "Nem sikerült elindítani a távoli szervert. Hibakód: %s");
define('disabled', "tiltva");
define('not_found_server', "Nem található távoli szerver az ID-vel");
define('rcon_command_title', "RCON parancs");
define('has_sent_to', "küldtünk");
define('need_set_remote_pass', "Be kell állítanod a távoli vezérlő jelszót");
define('before_sending_rcon_com', "mielőtt elküldjük az RCON parancsot neki.");
define('retry', "Újra");
define('page', "oldal");
define('server_cant_start', "a szerver nem tud elindulni");
define('server_cant_stop', "a szerver nem tud leállni");
define('error_occured_remote_host', "Hiba történt a távoli kiszolgálón");
define('follow_server_status', "A szerver státuszt követheted a");
define('addons', "Kiegészítők");
define('hostname', "Állomásnév");
define('rsync_install', "[Rsync telepítés]");
define('ping', "Ping");
define('team', "Csapat");
define('deaths', "Halálok");
define('pid', "PID");
define('skill', "Képesség");
define('AIBot', "AIBot");
define('steamid', "Steam azonosító");
define('player', "Játékos");
define('port', "Port");
define('rcon_presets', "Rcon parancs előre beállított");
define('update_from_local_master_server', "Frissítés a helyi mester szerverről");
define('update_from_selected_rsync_server', "Frissítés a kiválasztott Rsync szerverről");
define('execute_selected_server_operations', "A kiválasztott szerver műveletek végrehajtása");
define('execute_operations', "Műveletek végrehajtása");
define('account_expiration', "Fiók lejárat");
define('mysql_databases', "MySQL adatbázis");
define('failed_querying_server', "* Nem sikerült lekérdezni a szervert.");
define('query_protocol_not_supported', "* Nincs lekérdezési protokoll az OGP-ben, ami támogatná ezt a szervert.");
define('queries_disabled_by_setting_disable_queries_after', "Lekérdezések letiltható beállításával: Letiltása lekérdezések után: %s, mert van %s szerver.<br>");
define('presets_for_game_and_mod', "RCON előre beállított parancs a játékhoz: %s és a modhoz: %s");
define('name', "Név");
define('command', "RCON&nbsp;parancs");
define('add_preset', "Új előre beállítás");
define('edit_presets', "Beállításkészlet szerkesztése");
define('del_preset', "Törlés");
define('change_preset', "Megváltoztatás");
define('send_command', "Parancs küldés");
define('starting_copy_with_master_server_named', "Kezdve másolatot master szerver neve '%s'...");
define('starting_sync_with', "Szinkronizálás elkezdése a(z) %s-vel...");
define('refresh_interval', "Napló frissítési intervallum");
define('finished_manual_update', "Befejezve a manuális frissítés.");
define('failed_to_start_file_download', "Nem sikerült elindítani a fájl letöltést");
define('game_name', "Játék neve");
define('dest_dir', "Cél könyvtár");
define('remote_server', "Távoli szerver");
define('file_url', "Fájl URL");
define('file_url_info', "Az URL a fájl feltöltve és kicsomagolva a könyvtárba.");
define('dest_filename', "Cél fájlnév");
define('dest_filename_info', "A célfájl fájlneve.");
define('update_server', "Szerver frissítés");
define('unavailable', "Nem elérhető");
define('upload_map_image', "Pálya kép feltöltés");
define('upload_image', "Kép feltöltése");
define('jpg_gif_png_less_than_1mb', "A kép legyen jpg, gif vagy png és kevesebb mint 1 MB.");
define('check_dev_console', "Hiba a fájl feltöltése során, kérlek, ellenőrizd a böngésző fejlesztői konzolját.");
define('uploaded_successfully', "Sikeres feltöltés.");
define('cant_create_folder', "Nem hozható létre a(z) <br><b>%s</b> mappa.");
define('cant_write_file', "Nem írható a <br>%s<br> fájl.");
define('exceeded_php_directive', "PHP direktíva túllépve.<br><b>%s</b>.");
define('unknown_errors', "Ismeretlen hibák.");
define('directory', "Könyvtár");
define('view_player_commands', "Játékos parancsok mutatása");
define('hide_player_commands', "Játékos parancsok elrejtése");
define('no_online_players', "Nincsenek online játékosok.");
define('invalid_game_mod_id', "Érvénytelen játék/mod ID meghatározva.");
define('auto_update_title_popup', "Steam automatikus frissítési link");
define('auto_update_popup_html', "<p>Használd az alábbi linket az ellenőrzéshez és az automatikus frissítéshez a játékszerveredhez a Steamen keresztül, ha szükséges.&nbsp; A cronjob segítségével lekérdezheted vagy manuálisan is elindíthatod a folyamatot.</p>");
define('auto_update_copy_me', "Másolás");
define('auto_update_copy_me_success', "Másolva!");
define('auto_update_copy_me_fail', "Sikertelen a másolás. Kérlek másold a linket manuálisan.");
define('get_steam_autoupdate_api_link', "Automatikus frissítési link");
define('update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('attempting_nonmaster_update', "Megpróbálod frissíteni ezt a szervert egy nem mester szerverről.");
define('cannot_update_from_own_self', "Előfordulhat, hogy a helyi szerver frissítés nem működik mester szerveren.");
define('show_server_id', "Szerver ID mutatása");
define('hide_server_id', "Szerver ID elrejtése");
?>
