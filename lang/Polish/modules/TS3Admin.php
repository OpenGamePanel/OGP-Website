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

define('error', "Bład");
define('title', "TeamSpeak 3 Web Interface");
define('update_available', "Dostępne Aktualizacje");
define('head_logout', "Wyloguj");
define('head_vserver_switch', "Zmień vServer");
define('head_vserver_overview', "vServer Overview");
define('head_vserver_token', "Zarządzaj Tokenami");
define('head_vserver_liveview', "Podgląd");
define('e_fill_out', "Proszę wypełnić wszystkie wymagane pola.");
define('e_upload_failed', "Wysyłanie nieudane.");
define('e_server_responded', "Serwer odpowiedział:");
define('e_conn_serverquery', "Nie można utworzyć dostępu do ServerQuery.");
define('e_conn_vserver', "Nie można wybrać serwera wirtualnego.");
define('e_session_timedout', "Sesja wygasła.");
define('js_error', "Bład");
define('js_ajax_error', "Wystąpił błąd AJAX. %1");
define('js_confirm_server_stop', "Czy naprawdę chcesz zatrzymać serwer #%1?");
define('js_confirm_server_delete', "Czy na pewno chcesz usunąć serwer #% 1?");
define('js_notice_server_deleted', "Serwer %1 został usunięty pomyślnie.\n Ładowanie strony głównej.");
define('js_prompt_banduration', "Czas trwania w godzinach (0 = na zawsze):");
define('js_prompt_banreason', "Powód (opcjonalnie):");
define('js_prompt_msg_to', "Wiadomość tekstowa do %1 #%2:");
define('js_prompt_poke_to', "Wiadomość Poke do Użytkownika #%1:");
define('js_prompt_new_propvalue', "Nowa wartość dla '%1':");
define('n_server_responded', "Serwer odpowiedział:");
define('login_serverquery', "Zaloguj do ServerQuery");
define('login_name', "Nazwa użytkownika");
define('login_password', "Hasło");
define('login_submit', "Zaloguj");
define('vsselect_headline', "wSerwer sekcja");
define('vsselect_id', "id#");
define('vsselect_name', "Nazwa");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Status");
define('vsselect_clients', "Użytkownicy");
define('vsselect_uptime', "Uptime");
define('vsselect_choose', "Wybierz");
define('vsselect_start', "Start");
define('vsselect_stop', "Stop");
define('vsselect_delete', "USUŃ");
define('vsselect_new_headline', "Utwórz nowy serwer wirtualny");
define('vsselect_new_servername', "Nazwa Serwera");
define('vsselect_new_slots', "Sloty użytkowników");
define('vsselect_new_create', "Stwórz");
define('vsselect_new_added_ok', "wSerwer <span class=\"online\">%1</span> został stworzony pomyślnie.");
define('vsselect_new_added_generated', "Wygenerowany token to:");
define('vsoverview_virtualserver', "Wirtualny Server");
define('vsoverview_information_head', "Informacje");
define('vsoverview_connection_head', "Połączenie");
define('vsoverview_info_general_head', "Ustawienia główne");
define('vsoverview_info_servername', "Nazwa Serwera");
define('vsoverview_info_host', "IP");
define('vsoverview_info_state', "Status");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Uptime");
define('vsoverview_info_welcomemsg', "Wiadomość<br />powitalna");
define('vsoverview_info_hostmsg', "Wiadomość hosta");
define('vsoverview_info_hostmsg_mode_output', "wydajność");
define('vsoverview_info_hostmsg_mode_0', "żaden");
define('vsoverview_info_hostmsg_mode_1', "logowanie w czacie");
define('vsoverview_info_hostmsg_mode_2', "okno");
define('vsoverview_info_hostmsg_mode_3', "Okno + Rozłącz");
define('vsoverview_info_req_security', "Poziom Bezpieczeństwa");
define('vsoverview_info_req_securitylvl', "wymagany");
define('vsoverview_info_hostbanner_head', "Banner Hosting");
define('vsoverview_info_hostbanner_url', "Adres URL");
define('vsoverview_info_hostbanner_imgurl', "Adres obrazka");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Ostrzeżenie ");
define('vsoverview_info_antiflood_kick', "Wykop");
define('vsoverview_info_antiflood_ban', "Ban");
define('vsoverview_info_antiflood_banduration', "Długość bana");
define('vsoverview_info_antiflood_decrease', "zmniejsz");
define('vsoverview_info_antiflood_points', "punkty");
define('vsoverview_info_antiflood_in_seconds', "sekundy");
define('vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('vsoverview_conn_total_head', "Razem");
define('vsoverview_conn_total_packets', "pakietów");
define('vsoverview_conn_total_bytes', "bajtów");
define('vsoverview_conn_total_send', "wysłane");
define('vsoverview_conn_total_received', "odebrane");
define('vsoverview_conn_bandwidth_head', "Transfer");
define('vsoverview_conn_bandwidth_last', "ostatnio");
define('vsoverview_conn_bandwidth_second', "sekund");
define('vsoverview_conn_bandwidth_minute', "minut");
define('vsoverview_conn_bandwidth_send', "wyślij");
define('vsoverview_conn_bandwidth_received', "odebrane");
define('vstoken_token_virtualserver', "Wirtualny Serwer");
define('vstoken_token_head', "Kod Token");
define('vstoken_token_type', "Typ grupy");
define('vstoken_token_id1', "Grupa Serwera/<br />Grupa Kanału");
define('vstoken_token_id2', "(Kanał)");
define('vstoken_token_tokencode', "Kod Token");
define('vstoken_token_delete', "usuń");
define('vstoken_new_head', "Stwórz nowy token");
define('vstoken_new_create', "Generuj");
define('vstoken_new_tokentype', "Typ tokenu:");
define('vstoken_new_servergroup', "Grupa Serwera");
define('vstoken_new_channelgroup', "Grupa Kanału");
define('vstoken_new_select_group', "Grupa Serwera");
define('vstoken_new_select_channelgroup', "Grupa kanału");
define('vstoken_new_select_channel', "Kanał");
define('vstoken_new_tokentype_0', "Serwer");
define('vstoken_new_tokentype_1', "Kanał");
define('vstoken_new_added_ok', "Token został wygenerowany z powodzeniem.");
define('vsliveview_server_virtualserver', "Wirtualny Serwer");
define('vsliveview_server_head', "Realny widok");
define('vsliveview_liveview_enable_autorefresh', "Auto odświeżanie");
define('vsliveview_liveview_tooltip_to_channel', "do kanału #");
define('vsliveview_liveview_tooltip_switch', "Zmień");
define('vsliveview_liveview_tooltip_send_msg', "Wyślij wiadomość");
define('vsliveview_liveview_tooltip_poke', "Zaczep");
define('vsliveview_liveview_tooltip_kick', "Wykop");
define('vsliveview_liveview_tooltip_ban', "Zbanuj");
define('vsoverview_banlist_head', "Lista Banów");
define('vsoverview_banlist_id', "id#");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Nazwa");
define('vsoverview_banlist_uid', "Unikalne ID");
define('vsoverview_banlist_reason', "Powód");
define('vsoverview_banlist_created', "Dodany");
define('vsoverview_banlist_duration', "Czas");
define('vsoverview_banlist_end', "Koniec");
define('vsoverview_banlist_unlimited', "bezlimitu");
define('vsoverview_banlist_never', "nigdy");
define('vsoverview_banlist_new_head', "Dodaj bana");
define('vsoverview_banlist_new_create', "stwórz");
define('vsliveview_channelbackup_head', "Kopia zapasowa Kanałów");
define('vsliveview_channelbackup_get', "Stwórz i Pobierz");
define('vsliveview_channelbackup_load', "Wyślij kopię zapasową Kanałów");
define('vsliveview_channelbackup_load_submit', "Wykonaj");
define('vsliveview_channelbackup_new_added_ok', "Kopia zapasowa kanału została zakończona pomyślnie.");
define('time_day', "dzień");
define('time_days', "dni");
define('time_hour', "godzina");
define('time_hours', "godziny");
define('time_minute', "minuta");
define('time_minutes', "minuty");
define('time_second', "sekund");
define('time_seconds', "sekundy");
define('e_2568', "Nie masz wystarczających praw.");
define('temp_folder_not_writable', "Folder szablonów (%s) nie ma praw zapisu.");
define('unassign_from_subuser', "Usuń dla sub-użytkownika.");
define('assign_to_subuser', "Przypisz do sub-użytkownika.");
define('select_subuser', "Wybierz Sub-użytkownika.");
define('no_ts3_servers_assigned_to_account', "Nie masz żadnych serwerów przypisanych do Twojego konta.");
define('change_virtual_server', "Zmień Wirtualny Serwer");
define('change_remote_server', "Zmień Serwer Hosta");
?>