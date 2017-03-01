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

define('error', "Hiba");
define('title', "TeamSpeak 3 web felület");
define('update_available', "<h3>Figyelem: elérhető egy új verzió (v%1) ebből a szoftverből a <a href=\"%2\" target=\"_blank\">%2</a> link alatt.</h3>");
define('head_logout', "Kijelentkezés");
define('head_vserver_switch', "vSzerver megváltoztatása");
define('head_vserver_overview', "vSzerver áttekintése");
define('head_vserver_token', "Token kezelés");
define('head_vserver_liveview', "Élő nézet");
define('e_fill_out', "Kérlek, töltsd ki az összes kötelező mezőt.");
define('e_upload_failed', "Feltöltés sikertelen.");
define('e_server_responded', "A szerver válasza:");
define('e_conn_serverquery', "Nem sikerült létrehozni a ServerQuery hozzáférést.");
define('e_conn_vserver', "Nem sikerült választani virtuális szervert.");
define('e_session_timedout', "A munkamenet lejárt.");
define('js_error', "Hiba");
define('js_ajax_error', "Egy AJAX hiba történt. %1");
define('js_confirm_server_stop', "Tényleg le akarod állítani a(z) #%1 szervert?");
define('js_confirm_server_delete', "Tényleg TÖRÖLNI akarod a(z) #%1 szervert?");
define('js_notice_server_deleted', "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.");
define('js_prompt_banduration', "Időtartam órában (0=korlátlan):");
define('js_prompt_banreason', "Ok (opcionális):");
define('js_prompt_msg_to', "Textmessage to %1 #%2: ");
define('js_prompt_poke_to', "Pokemessage to Client #%1: ");
define('js_prompt_new_propvalue', "Új érték a(z) '%1':");
define('n_server_responded', "A szerver válasza:");
define('login_serverquery', "ServerQuery bejelentkezés");
define('login_name', "Felhasználónév");
define('login_password', "Jelszó");
define('login_submit', "Bejelentkezés");
define('vsselect_headline', "vSzerver kiválasztás");
define('vsselect_id', "ID #");
define('vsselect_name', "Név");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Állapot");
define('vsselect_clients', "Ügyfelek");
define('vsselect_uptime', "Üzemidő");
define('vsselect_choose', "Kiválasztás");
define('vsselect_start', "Elindítás");
define('vsselect_stop', "Leállítás");
define('vsselect_delete', "TÖRLÉS");
define('vsselect_new_headline', "Egy új virtuális szerver létrehozása");
define('vsselect_new_servername', "Szerver név");
define('vsselect_new_slots', " Kliens férőhelyek");
define('vsselect_new_create', "Létrehoz");
define('vsselect_new_added_ok', "vSzerver <span class=\"online\">%1</span> sikeresen létrehozva.");
define('vsselect_new_added_generated', "The generated token is:");
define('vsoverview_virtualserver', "Virtuális szerver");
define('vsoverview_information_head', "Információ");
define('vsoverview_connection_head', "Kapcsolat");
define('vsoverview_info_general_head', "Általános beállítások");
define('vsoverview_info_servername', "Szerver név");
define('vsoverview_info_host', "Kiszolgáló");
define('vsoverview_info_state', "Állapot");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Üzemidő");
define('vsoverview_info_welcomemsg', "Üdvözlő<br />üzenet");
define('vsoverview_info_hostmsg', "Kiszolgáló üzenet");
define('vsoverview_info_hostmsg_mode_output', "kimenet");
define('vsoverview_info_hostmsg_mode_0', "semmi");
define('vsoverview_info_hostmsg_mode_1', "a chat naplóban");
define('vsoverview_info_hostmsg_mode_2', "ablak");
define('vsoverview_info_hostmsg_mode_3', "Ablak + lekapcsolódás");
define('vsoverview_info_req_security', "Biztonsági szint");
define('vsoverview_info_req_securitylvl', "required");
define('vsoverview_info_hostbanner_head', "Hostbanner");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Kép címe");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Figyelmeztetés bekapcsolva");
define('vsoverview_info_antiflood_kick', "Kick on");
define('vsoverview_info_antiflood_ban', "Ban on");
define('vsoverview_info_antiflood_banduration', "Kitiltás hossza");
define('vsoverview_info_antiflood_decrease', "csökkenteni");
define('vsoverview_info_antiflood_points', "pontok");
define('vsoverview_info_antiflood_in_seconds', "másodpercek");
define('vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('vsoverview_conn_total_head', "Összes");
define('vsoverview_conn_total_packets', "csomagok");
define('vsoverview_conn_total_bytes', "bájt");
define('vsoverview_conn_total_send', "küldött");
define('vsoverview_conn_total_received', "fogadott");
define('vsoverview_conn_bandwidth_head', "Sávszélesség");
define('vsoverview_conn_bandwidth_last', "utolsó");
define('vsoverview_conn_bandwidth_second', "másodperc");
define('vsoverview_conn_bandwidth_minute', "perc");
define('vsoverview_conn_bandwidth_send', "küldött");
define('vsoverview_conn_bandwidth_received', "fogadott");
define('vstoken_token_virtualserver', "Virtuális szerver");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Csoport típus");
define('vstoken_token_id1', "Szervercsoport/<br />Csatornacsoport");
define('vstoken_token_id2', "(Csatorna)");
define('vstoken_token_tokencode', "Token kód");
define('vstoken_token_delete', "törlés");
define('vstoken_new_head', "Egy új token létrehozása");
define('vstoken_new_create', "Generálni");
define('vstoken_new_tokentype', "Token típus:");
define('vstoken_new_servergroup', "Szerver csoport");
define('vstoken_new_channelgroup', "Csatorna csoport");
define('vstoken_new_select_group', "Szervercsoport");
define('vstoken_new_select_channelgroup', "Csatorna csoport");
define('vstoken_new_select_channel', "Csatorna");
define('vstoken_new_tokentype_0', "Szerver");
define('vstoken_new_tokentype_1', "Csatorna");
define('vstoken_new_added_ok', "Token generálása sikeres.");
define('vsliveview_server_virtualserver', "Virtuális szerver");
define('vsliveview_server_head', "Élő nézet");
define('vsliveview_liveview_enable_autorefresh', "Automatikus frissítés");
define('vsliveview_liveview_tooltip_to_channel', "to channel #");
define('vsliveview_liveview_tooltip_switch', "Átvált");
define('vsliveview_liveview_tooltip_send_msg', "Üzenet küldése");
define('vsliveview_liveview_tooltip_poke', "Bökés");
define('vsliveview_liveview_tooltip_kick', "Kirugás");
define('vsliveview_liveview_tooltip_ban', "Kitiltás");
define('vsoverview_banlist_head', "Kitiltási lista");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Név");
define('vsoverview_banlist_uid', "Egyéni azonosító");
define('vsoverview_banlist_reason', "Ok");
define('vsoverview_banlist_created', "Létrehozva");
define('vsoverview_banlist_duration', "Időtartam");
define('vsoverview_banlist_end', "Véget ér");
define('vsoverview_banlist_unlimited', "korlátlan");
define('vsoverview_banlist_never', "soha");
define('vsoverview_banlist_new_head', "Új kitiltás létrehozása");
define('vsoverview_banlist_new_create', "létrehozni");
define('vsliveview_channelbackup_head', "Csatorna biztonsági mentés");
define('vsliveview_channelbackup_get', "Létrehozás és letöltés");
define('vsliveview_channelbackup_load', "Csatorna biztonsági mentésének a feltöltése");
define('vsliveview_channelbackup_load_submit', "Újraalkotás");
define('vsliveview_channelbackup_new_added_ok', "Csatorna biztonsági mentése sikeres.");
define('time_day', "nap");
define('time_days', "napja");
define('time_hour', "óra");
define('time_hours', "órája");
define('time_minute', "perc");
define('time_minutes', "perce");
define('time_second', "másodperc");
define('time_seconds', "másodperce");
define('e_2568', "Nem rendelkezel megfelelő jogokkal.");
define('temp_folder_not_writable', "A sablonok mappája (%s) nem írható.");
define('unassign_from_subuser', "Eltávolítás az al-felhasználótól.");
define('assign_to_subuser', "Hozzárendelés az al-felhasználóhoz.");
define('select_subuser', "Al-felhasználó kiválasztása.");
?>