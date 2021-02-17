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

define('OGP_LANG_no_games_to_monitor', "Nemáte nakonfigurované žádné hry, které by bylo možné monitorovat.");
define('OGP_LANG_status', "Stav");
define('OGP_LANG_fail_no_mods', "Pro tuto hru nejsou povoleny žádné mody! Musíte požádat Admina OGP, aby přidal mody pro hru kterou potřebujete.");
define('OGP_LANG_no_game_homes_assigned', "K vašemu účtu nejsou přiřazeny žádné servery.");
define('OGP_LANG_select_game_home_to_configure', "Vyberte herní server, který chcete konfigurovat");
define('OGP_LANG_file_manager', "Správce souborů");
define('OGP_LANG_configure_mods', "Konfigurovat mody");
define('OGP_LANG_install_update_steam', "Install/Update  přes Steam");
define('OGP_LANG_install_update_manual', "Install/Update Ručně");
define('OGP_LANG_assign_game_homes', "Přiřaďte herní servery");
define('OGP_LANG_user', "Uživatel");
define('OGP_LANG_group', "Skupina");
define('OGP_LANG_start', "Start");
define('OGP_LANG_ogp_agent_ip', "OGP Agent IP");
define('OGP_LANG_max_players', "Maximální počet hráčů");
define('OGP_LANG_max', "Max");
define('OGP_LANG_ip_and_port', "IP a Port");
define('OGP_LANG_available_maps', "Dostupné mapy");
define('OGP_LANG_map_path', "Cesta k Mapám");
define('OGP_LANG_available_parameters', "Dostupné parametry");
define('OGP_LANG_start_server', "Start Server");
define('OGP_LANG_start_wait_note', "Spuštění serveru může chvíli trvat. Počkejte prosím (a nevypínejte prohlížeče).");
define('OGP_LANG_game_type', "Druh Hry");
define('OGP_LANG_map', "Mapa");
define('OGP_LANG_starting_server', "Spouštění serveru, čekejte prosím ...");
define('OGP_LANG_starting_server_settings', "Spouštění serveru s následujícím nastavením");
define('OGP_LANG_startup_params', "Parametry spuštění");
define('OGP_LANG_startup_cpu', "CPU, na kterém běží server");
define('OGP_LANG_startup_nice', "Pěkná hodnota serveru");
define('OGP_LANG_game_home', "Domácí cesta");
define('OGP_LANG_server_started', "Server byl úspěšně spuštěn.");
define('OGP_LANG_no_parameter_access', "Nemáte přístup k parametrům.");
define('OGP_LANG_extra_parameters', "Další parametry");
define('OGP_LANG_no_extra_param_access', "K dalším parametrům nemáte přístup.");
define('OGP_LANG_extra_parameters_info', "Tyto parametry se při spuštění hry umístí na konec příkazového řádku.");
define('OGP_LANG_game_exec_not_found', "Spustitelný soubor hry %s nebyl naleze na serveru.");
define('OGP_LANG_select_params_and_start', "Vyberte spouštěcí parametry serveru a stiskněte klávesu '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Nebyl přirazen žádný Port k IP, pokud k tomuto nemáte přístup kontaktujte Admina.");
define('OGP_LANG_unable_to_get_log', "Nelze získat protokol, návratová hodnota: %s");
define('OGP_LANG_server_binary_not_executable', "Binární soubor serveru nelze spustit. Zkontrolujte, zda máte správná oprávnění v domovském adresáři serveru.");
define('OGP_LANG_server_not_running_log_found', "Server není spuštěn, ale protokol je nalezen. POZNÁMKA: Tento protokol nemusí souviset s posledním spuštěním serveru.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT pár nevlastní.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Byla nastavena nevhodná hodnota maximálního početu hráčů, maximální dosažitelný počet slotů.");
define('OGP_LANG_server_running_not_responding', "Server je spuštěný, ale neodpovídá, <br> může dojít k nějakému problému a možná budete chtít ");
define('OGP_LANG_update_started', "Aktualizace spuštěna, čekejte prosím ...");
define('OGP_LANG_failed_to_start_steam_update', "Nepodařilo se spustit aktualizaci Steam. Viz protokol agenta.");
define('OGP_LANG_failed_to_start_rsync_update', "Nepodařilo se spustit aktualizaci Rsync. Viz protokol agenta.");
define('OGP_LANG_update_completed', "Aktualizace byla úspěšně dokončena.");
define('OGP_LANG_update_in_progress', "Probíhá aktualizace, čekejte prosím ...");
define('OGP_LANG_refresh_steam_status', "Obnovit stav Steam");
define('OGP_LANG_refresh_rsync_status', "Obnovit stav Rsync");
define('OGP_LANG_server_running_cant_update', "Server běží, takže aktualizace není možná. Před aktualizací zastavte server.");
define('OGP_LANG_xml_steam_error', "Vybraný typ serveru nepodporuje instalaci/aktualizaci služby Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Mod klíč '%s' nebyl nalezen ze souboru XML.");
define('OGP_LANG_stop_update', "Zastavit aktualizaci");
define('OGP_LANG_statistics', "Statistika");
define('OGP_LANG_servers', "Servery");
define('OGP_LANG_players', "Hráči");
define('OGP_LANG_current_map', "Aktuální mapa");
define('OGP_LANG_stop_server', "Zastavit server");
define('OGP_LANG_server_ip_port', "Server IP:Port");
define('OGP_LANG_server_name', "Název serveru");
define('OGP_LANG_server_id', "Server ID");
define('OGP_LANG_player_name', "Jméno hráče");
define('OGP_LANG_score', "Score");
define('OGP_LANG_time', "Čas");
define('OGP_LANG_no_rights_to_stop_server', "Nemáte práva zastavit tento server.");
define('OGP_LANG_no_ogp_lgsl_support', "Tento server (běží: %s) nemá podporu LGSL v OGP a jeho statistiky nelze zobrazit.");
define('OGP_LANG_server_status', "Server na %s je %s.");
define('OGP_LANG_server_stopped', "Server '%s' has been stopped.");
define('OGP_LANG_if_want_to_start_homes', "Pokud chcete spustit herní servery, přejděte na %s.");
define('OGP_LANG_view_log', "Log");
define('OGP_LANG_if_want_manage', "Pokud chcete spravovat své hry, můžete to udělat v");
define('OGP_LANG_columns', "sloupce");
define('OGP_LANG_group_users', "Skupina uživatelů:");
define('OGP_LANG_assigned_to', "Přiřazen:");
define('OGP_LANG_restart_server', "Restart Server");
define('OGP_LANG_restarting_server', "Restartování serveru, čekejte prosím ...");
define('OGP_LANG_server_restarted', "Server '%s' byl restartován.");
define('OGP_LANG_server_not_running', "Server není spuštěn.");
define('OGP_LANG_address', "Adresa");
define('OGP_LANG_owner', "Majitel");
define('OGP_LANG_operations', "Operace");
define('OGP_LANG_search', "Hledat");
define('OGP_LANG_maps_read_from', "Mapy čtené z ");
define('OGP_LANG_file', "soubor");
define('OGP_LANG_folder', "složka");
define('OGP_LANG_unable_retrieve_mod_info', "Nelze načíst informace o modech z databáze.");
define('OGP_LANG_unexpected_result_libremote', "Neočekávaný výsledek od libremote, informujte prosím vývojáře.");
define('OGP_LANG_unable_get_info', "Nelze získat požadované informace pro spuštění, blokování spuštění.");
define('OGP_LANG_server_already_running', "Server již běží. Pokud nevidíte server v Game Monitoru, může se jednat o problém a možná budete chtít");
define('OGP_LANG_already_running_stop_server', "Zastavit server.");
define('OGP_LANG_error_server_already_running', "CHYBA: Server již běží na portu");
define('OGP_LANG_failed_start_server_code', "Vzdálený server se nepodařilo spustit. Chybový kód: %s");
define('OGP_LANG_disabled', "zakázán ");
define('OGP_LANG_not_found_server', "Nelze najít vzdálený server s ID");
define('OGP_LANG_rcon_command_title', "RCON příkaz");
define('OGP_LANG_has_sent_to', "byl odeslán na");
define('OGP_LANG_need_set_remote_pass', "Musíte nastavit heslo vzdálené správy ");
define('OGP_LANG_before_sending_rcon_com', "před odesláním příkazů rcon.");
define('OGP_LANG_retry', "Zkuste to znovu");
define('OGP_LANG_page', "strana");
define('OGP_LANG_server_cant_start', "server nelze spustit");
define('OGP_LANG_server_cant_stop', "server nelze zastavit");
define('OGP_LANG_error_occured_remote_host', "Na vzdáleném hostiteli došlo k chybě");
define('OGP_LANG_follow_server_status', "Stav serveru můžete sledovat z");
define('OGP_LANG_addons', "Addony");
define('OGP_LANG_hostname', "Hostname");
define('OGP_LANG_rsync_install', "[Rsync Install]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Team");
define('OGP_LANG_deaths', "Deaths");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Player");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "Předvolby RCON");
define('OGP_LANG_update_from_local_master_server', "Aktualizace z místního hlavního serveru");
define('OGP_LANG_update_from_selected_rsync_server', "Aktualizace z vybraného serveru Rsync");
define('OGP_LANG_execute_selected_server_operations', "Proveďte vybrané operace serveru");
define('OGP_LANG_execute_operations', "Provést operace");
define('OGP_LANG_account_expiration', "Vypršení platnosti účtu");
define('OGP_LANG_mysql_databases', "MySQL Databáze");
define('OGP_LANG_failed_querying_server', "* Dotaz na server se nezdařil.");
define('OGP_LANG_query_protocol_not_supported', "* V OGP není žádný dotazovací protokol, který by podporoval tento server.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Dotazy deaktivovány nastavením: Zakázat dotazy po: %s, protože máte %s servery.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON přednastavení pro %s a mody %s");
define('OGP_LANG_name', "Jméno");
define('OGP_LANG_command', "RCON&nbsp;Příkaz");
define('OGP_LANG_add_preset', "Přidat předvolbu");
define('OGP_LANG_edit_presets', "Upravit předvolby");
define('OGP_LANG_del_preset', "Smazat");
define('OGP_LANG_change_preset', "Změnit");
define('OGP_LANG_send_command', "Odeslat příkaz");
define('OGP_LANG_starting_copy_with_master_server_named', "Začít kopírovat se jménem serveru '%s'...");
define('OGP_LANG_starting_sync_with', "Spouštím synchronizaci s %s...");
define('OGP_LANG_refresh_interval', "Interval obnovení Logu");
define('OGP_LANG_finished_manual_update', "Hotová ruční aktualizace.");
define('OGP_LANG_failed_to_start_file_download', "Zahájení stahování souboru se nezdařilo");
define('OGP_LANG_game_name', "Název hry");
define('OGP_LANG_dest_dir', "Cílový adresář");
define('OGP_LANG_remote_server', "Vzdálený server");
define('OGP_LANG_file_url', "URL souboru");
define('OGP_LANG_file_url_info', "URL souboru, který je nahrán a nekomprimován do adresáře.");
define('OGP_LANG_dest_filename', "Název souboru cíle");
define('OGP_LANG_dest_filename_info', "Název souboru cílového souboru.");
define('OGP_LANG_update_server', "Update server");
define('OGP_LANG_unavailable', "Nedostupné");
define('OGP_LANG_upload_map_image', "Nahrát obrázek mapy");
define('OGP_LANG_upload_image', "Nahrát obrázek");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Obrázek musí být ve formátu jpg, gif nebo png a menší než 1 MB.");
define('OGP_LANG_check_dev_console', "Chyba při nahrávání souboru");
define('OGP_LANG_uploaded_successfully', "Nahráno úspěšně.");
define('OGP_LANG_cant_create_folder', "Nelze vytvořit složku:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Nelze zapsat soubor:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Překročena směrnice PHP.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Neznámá chyba.");
define('OGP_LANG_directory', "Adresář");
define('OGP_LANG_view_player_commands', "Zobrazit příkazy hráče");
define('OGP_LANG_hide_player_commands', "Skrýt příkazy hráče");
define('OGP_LANG_no_online_players', "Žádní online hráči.");
define('OGP_LANG_invalid_game_mod_id', "Zadáno neplatné ID hry/modu.");
define('OGP_LANG_auto_update_title_popup', "Steam Auto Update Link");
define('OGP_LANG_auto_update_popup_html', "<p>Pomocí níže uvedeného odkazu můžete v případě potřeby zkontrolovat a automaticky aktualizovat svůj herní server prostřednictvím služby Steam.&nbsp; Můžete to dotazovat pomocí cronjob nebo ručně zahájit proces.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Vyberte akci, kterou chcete provést pomocí OGP API pro tento herní server. &nbsp; Poté pomocí níže uvedeného odkazu proveďte požadovanou akci. &nbsp; Požadovanou akci můžete spustit pomocí cronjob nebo přímým požadavkem.</p>");
define('OGP_LANG_auto_update_copy_me', "Kopírovat");
define('OGP_LANG_auto_update_copy_me_success', "Zkopírováno!");
define('OGP_LANG_auto_update_copy_me_fail', "Kopírování se nezdařilo. Odkaz prosím zkopírujte ručně.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Auto Update Link");
define('OGP_LANG_show_api_actions', "Zobrazit akce API");
define('OGP_LANG_api_links', "Odkazy API");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Uživatel %s se pokusil aktualizovat home_id %d ze serveru jiného než hlavního. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Pokoušíte se aktualizovat tento server z jiného než hlavního serveru.");
define('OGP_LANG_cannot_update_from_own_self', "Aktualizace místního serveru nemusí fungovat na hlavním serveru.");
define('OGP_LANG_show_server_id', "Zobrazit ID serveru");
define('OGP_LANG_hide_server_id', "Skrýt ID serveru");
define('OGP_LANG_edit_configuration_files', "Upravit config");
define('OGP_LANG_admin', "Admin");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "Sekundy");
define('OGP_LANG_unknown_rsync_mirror', "Pokusili jste se spustit aktualizaci z kopie, které neexistuje.");
define('OGP_LANG_custom_fields', "Vlastní pole");
?>
