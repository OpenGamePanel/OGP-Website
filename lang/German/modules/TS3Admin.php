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

define('error', "Fehler");
define('title', "TeamSpeak 3 Web Interface");
define('update_available', "<h3>Achtung: Eine neue Version (v%1) dieser Software ist verfügbar unter <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('head_logout', "Ausloggen");
define('head_vserver_switch', "vServer ändern");
define('head_vserver_overview', "vServer Übersicht");
define('head_vserver_token', "Tokan Verwaltung");
define('head_vserver_liveview', "Live Ansicht");
define('e_fill_out', "Bitte füllen Sie alle Pflichtfelder.");
define('e_upload_failed', "Upload fehlgeschlagen.");
define('e_server_responded', "Der Server hat geantwortet: ");
define('e_conn_serverquery', "ServerQuery Zugriff konnte nicht erstellt werden.");
define('e_conn_vserver', "Der virtuelle Server konnte nicht ausgewählt werden.");
define('e_session_timedout', "Sitzung abgelaufen.");
define('js_error', "Fehler");
define('js_ajax_error', "An AJAX error has occurred: %1.");
define('js_confirm_server_stop', "Möchten Sie Server #%1 wirklich beenden?");
define('js_confirm_server_delete', "Wollen Sie den Server #%1 wirklich LÖSCHEN?");
define('js_notice_server_deleted', "Server %1 wurde erfolgreich gelöscht.\nDie Übersichtsseite wird jetzt neu geladen.");
define('js_prompt_banduration', "Dauer in Stunden (0=unbegrenzt): ");
define('js_prompt_banreason', "Grund (optional):");
define('js_prompt_msg_to', "Textnachricht an %1 #%2: ");
define('js_prompt_poke_to', "stupznachricht an Client #%1: ");
define('js_prompt_new_propvalue', "Neuen Wert für '%1': ");
define('n_server_responded', "Der Server antwortete: ");
define('login_serverquery', "ServerQuery Login");
define('login_name', "Benutzername");
define('login_password', "Passwort");
define('login_submit', "Anmelden");
define('vsselect_headline', "vServer Auswahl");
define('vsselect_id', "ID #");
define('vsselect_name', "Name");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Status");
define('vsselect_clients', "Kunden");
define('vsselect_uptime', "Betriebszeit");
define('vsselect_choose', "Auswählen");
define('vsselect_start', "Start");
define('vsselect_stop', "Stop");
define('vsselect_delete', "LÖSCHEN");
define('vsselect_new_headline', "Neuen virtuellen Server erstellen");
define('vsselect_new_servername', "Server Name");
define('vsselect_new_slots', "Client slots");
define('vsselect_new_create', "Erstellen");
define('vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> wurde erfolgreich erstellt.");
define('vsselect_new_added_generated', "Das erzeugte Token ist:");
define('vsoverview_virtualserver', "Virtueller Server");
define('vsoverview_information_head', "Information");
define('vsoverview_connection_head', "Verbindung");
define('vsoverview_info_general_head', "Allgemeine Einstellungen");
define('vsoverview_info_servername', "Server Name");
define('vsoverview_info_host', "Host");
define('vsoverview_info_state', "Status");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Betriebszeit");
define('vsoverview_info_welcomemsg', "Willkommen<br />nachricht");
define('vsoverview_info_hostmsg', "Host nachricht");
define('vsoverview_info_hostmsg_mode_output', "ausgabe");
define('vsoverview_info_hostmsg_mode_0', "nichts");
define('vsoverview_info_hostmsg_mode_1', "Im Chat-Protokoll");
define('vsoverview_info_hostmsg_mode_2', "fenster");
define('vsoverview_info_hostmsg_mode_3', "Fenster + Trennen");
define('vsoverview_info_req_security', "Sicherheitsstufe");
define('vsoverview_info_req_securitylvl', "Erforderlich");
define('vsoverview_info_hostbanner_head', "Hostbanner");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Bildadresse");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Warnen an");
define('vsoverview_info_antiflood_kick', "Kicken an");
define('vsoverview_info_antiflood_ban', "Bannen an");
define('vsoverview_info_antiflood_banduration', "Bann länge");
define('vsoverview_info_antiflood_decrease', "verringern");
define('vsoverview_info_antiflood_points', "punkte");
define('vsoverview_info_antiflood_in_seconds', "sekunden");
define('vsoverview_info_antiflood_points_per_tick', "Punkte pro tick");
define('vsoverview_conn_total_head', "Insgesamt");
define('vsoverview_conn_total_packets', "pakete");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "senden");
define('vsoverview_conn_total_received', "empfangen");
define('vsoverview_conn_bandwidth_head', "Bandbreite");
define('vsoverview_conn_bandwidth_last', "letzte");
define('vsoverview_conn_bandwidth_second', "sekunden");
define('vsoverview_conn_bandwidth_minute', "minuten");
define('vsoverview_conn_bandwidth_send', "senden");
define('vsoverview_conn_bandwidth_received', "empfangen");
define('vstoken_token_virtualserver', "Virtueller Server");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Gruppentyp");
define('vstoken_token_id1', "Server Gruppe/<br />Channel Gruppe");
define('vstoken_token_id2', "(Channel)");
define('vstoken_token_tokencode', "Token-Code");
define('vstoken_token_delete', "löschen");
define('vstoken_new_head', "Neuen token erstellen");
define('vstoken_new_create', "Generieren");
define('vstoken_new_tokentype', "Token typ:");
define('vstoken_new_servergroup', "Server Gruppe");
define('vstoken_new_channelgroup', "Channel Gruppe");
define('vstoken_new_select_group', "Servergruppe");
define('vstoken_new_select_channelgroup', "Channelgruppe");
define('vstoken_new_select_channel', "Channel");
define('vstoken_new_tokentype_0', "Server");
define('vstoken_new_tokentype_1', "Channel");
define('vstoken_new_added_ok', "Token wurde erfolgreich generiert.");
define('vsliveview_server_virtualserver', "Virtueller Server");
define('vsliveview_server_head', "Live Ansicht");
define('vsliveview_liveview_enable_autorefresh', "Automatische Aktualisierung");
define('vsliveview_liveview_tooltip_to_channel', "zu channel #");
define('vsliveview_liveview_tooltip_switch', "Wechsel");
define('vsliveview_liveview_tooltip_send_msg', "Nachricht senden");
define('vsliveview_liveview_tooltip_poke', "Anstupsen");
define('vsliveview_liveview_tooltip_kick', "Kicken");
define('vsliveview_liveview_tooltip_ban', "Bannen");
define('vsoverview_banlist_head', "Ban Liste");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Name");
define('vsoverview_banlist_uid', "Eindeutige ID");
define('vsoverview_banlist_reason', "Grund");
define('vsoverview_banlist_created', "Erstellt");
define('vsoverview_banlist_duration', "Dauer");
define('vsoverview_banlist_end', "Endet");
define('vsoverview_banlist_unlimited', "unbegrenzt");
define('vsoverview_banlist_never', "niemals");
define('vsoverview_banlist_new_head', "Neues ban erstellen");
define('vsoverview_banlist_new_create', "erstellen");
define('vsliveview_channelbackup_head', "Channel Backup");
define('vsliveview_channelbackup_get', "Erstellen und Herunterladen");
define('vsliveview_channelbackup_load', "Channel Backup Hochladen");
define('vsliveview_channelbackup_load_submit', "Neu erstellen");
define('vsliveview_channelbackup_new_added_ok', "Channel Backup erfolgreich.");
define('time_day', "tag");
define('time_days', "tage");
define('time_hour', "stunde");
define('time_hours', "stunden");
define('time_minute', "minute");
define('time_minutes', "minuten");
define('time_second', "sekunde");
define('time_seconds', "sekunden");
define('e_2568', "Sie haben nicht genügend Rechte.");
define('temp_folder_not_writable', "Der Vorlagenordner (%s) ist nicht beschreibbar.");
define('unassign_from_subuser', "Zuweisung vom subuser entziehen.");
define('assign_to_subuser', "An subuser zuweisen.");
define('select_subuser', "Subuser auswählen");
define('no_ts3_servers_assigned_to_account', "Sie haben keine Server, die Ihrem Konto zugeordnet sind.");
define('change_virtual_server', "Virtuellen Server ändern");
define('change_remote_server', "Entfernten Server ändern");
?>
