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

define('OGP_LANG_error', "Chyba");
define('OGP_LANG_title', "Webové rozhraní TeamSpeak 3");
define('OGP_LANG_update_available', "<h3>Pozor: nová verze (v% 1) tohoto softwaru je dostupná pod<a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "Odhlásit se");
define('OGP_LANG_head_vserver_switch', "Změňte vServer");
define('OGP_LANG_head_vserver_overview', "Přehled serveru vServer");
define('OGP_LANG_head_vserver_token', "Správa Token");
define('OGP_LANG_head_vserver_liveview', "Live View");
define('OGP_LANG_e_fill_out', "Vyplňte prosím všechna povinná pole.");
define('OGP_LANG_e_upload_failed', "Nahrání neuspěšné");
define('OGP_LANG_e_server_responded', "Server odpověděl:");
define('OGP_LANG_e_conn_serverquery', "Nelze vytvořit přístup ke službě ServerQuery.");
define('OGP_LANG_e_conn_vserver', "Nelze vybrat virtuální server.");
define('OGP_LANG_e_session_timedout', "Relace vypršela.");
define('OGP_LANG_js_error', "Chyba");
define('OGP_LANG_js_ajax_error', "An AJAX error has occurred: %1.");
define('OGP_LANG_js_confirm_server_stop', "Do you really want to stop server #%1?");
define('OGP_LANG_js_confirm_server_delete', "Do you really want to DELETE server #%1?");
define('OGP_LANG_js_notice_server_deleted', "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.");
define('OGP_LANG_js_prompt_banduration', "Duration in hours (0=unlimited): ");
define('OGP_LANG_js_prompt_banreason', "Reason (optional): ");
define('OGP_LANG_js_prompt_msg_to', "Text Message to %1 #%2: ");
define('OGP_LANG_js_prompt_poke_to', "Poke Message to Client #%1: ");
define('OGP_LANG_js_prompt_new_propvalue', "New value for '%1': ");
define('OGP_LANG_n_server_responded', "The server responded: ");
define('OGP_LANG_login_serverquery', "ServerQuery Login");
define('OGP_LANG_login_name', "Username");
define('OGP_LANG_login_password', "Password");
define('OGP_LANG_login_submit', "Login");
define('OGP_LANG_vsselect_headline', "vServer selection");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "Název");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Port");
define('OGP_LANG_vsselect_state', "Status");
define('OGP_LANG_vsselect_clients', "Clients");
define('OGP_LANG_vsselect_uptime', "Uptime");
define('OGP_LANG_vsselect_choose', "Select");
define('OGP_LANG_vsselect_start', "Zapnout");
define('OGP_LANG_vsselect_stop', "Vypnout");
define('OGP_LANG_vsselect_delete', "VYMAZAT");
define('OGP_LANG_vsselect_new_headline', "Create a new virtual server");
define('OGP_LANG_vsselect_new_servername', "Název Serveru");
define('OGP_LANG_vsselect_new_slots', "Klientské sloty");
define('OGP_LANG_vsselect_new_create', "Vytvořit");
define('OGP_LANG_vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> was created successfully.");
define('OGP_LANG_vsselect_new_added_generated', "Generovaný token je:");
define('OGP_LANG_vsoverview_virtualserver', "Virtuální server");
define('OGP_LANG_vsoverview_information_head', "Information");
define('OGP_LANG_vsoverview_connection_head', "Connection");
define('OGP_LANG_vsoverview_info_general_head', "General settings");
define('OGP_LANG_vsoverview_info_servername', "Server Name");
define('OGP_LANG_vsoverview_info_host', "Host");
define('OGP_LANG_vsoverview_info_state', "Status");
define('OGP_LANG_vsoverview_info_state_port', "Port");
define('OGP_LANG_vsoverview_info_uptime', "Uptime");
define('OGP_LANG_vsoverview_info_welcomemsg', "Welcome<br />message");
define('OGP_LANG_vsoverview_info_hostmsg', "Host message");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "output");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "none");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "in the chat log");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "window");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "Window + Disconnect");
define('OGP_LANG_vsoverview_info_req_security', "Security level");
define('OGP_LANG_vsoverview_info_req_securitylvl', "required");
define('OGP_LANG_vsoverview_info_hostbanner_head', "Hostbanner");
define('OGP_LANG_vsoverview_info_hostbanner_url', "URL");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "Image address");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('OGP_LANG_vsoverview_info_antiflood_head', "Anti-Flood");
define('OGP_LANG_vsoverview_info_antiflood_warning', "Warning on");
define('OGP_LANG_vsoverview_info_antiflood_kick', "Kick on");
define('OGP_LANG_vsoverview_info_antiflood_ban', "Ban on");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "Ban length");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "Decrease");
define('OGP_LANG_vsoverview_info_antiflood_points', "points");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "seconds");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('OGP_LANG_vsoverview_conn_total_head', "Total");
define('OGP_LANG_vsoverview_conn_total_packets', "packages");
define('OGP_LANG_vsoverview_conn_total_bytes', "bytes");
define('OGP_LANG_vsoverview_conn_total_send', "sent");
define('OGP_LANG_vsoverview_conn_total_received', "received");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "Bandwidth");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "last");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "second");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "minute");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "sent");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "received");
define('OGP_LANG_vstoken_token_virtualserver', "Virtual Server");
define('OGP_LANG_vstoken_token_head', "Token");
define('OGP_LANG_vstoken_token_type', "Group type");
define('OGP_LANG_vstoken_token_id1', "Server Group/<br />Channel Group");
define('OGP_LANG_vstoken_token_id2', "(Channel)");
define('OGP_LANG_vstoken_token_tokencode', "Token Code");
define('OGP_LANG_vstoken_token_delete', "Delete");
define('OGP_LANG_vstoken_new_head', "Create a new token");
define('OGP_LANG_vstoken_new_create', "Generate");
define('OGP_LANG_vstoken_new_tokentype', "Token type:");
define('OGP_LANG_vstoken_new_servergroup', "Server Group");
define('OGP_LANG_vstoken_new_channelgroup', "Channel Group");
define('OGP_LANG_vstoken_new_select_group', "Servergroup");
define('OGP_LANG_vstoken_new_select_channelgroup', "Channelgroup");
define('OGP_LANG_vstoken_new_select_channel', "Channel");
define('OGP_LANG_vstoken_new_tokentype_0', "Server");
define('OGP_LANG_vstoken_new_tokentype_1', "Channel");
define('OGP_LANG_vstoken_new_added_ok', "Token was generated successfully.");
define('OGP_LANG_vsliveview_server_virtualserver', "Virtual Server");
define('OGP_LANG_vsliveview_server_head', "Live View");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "Auto refresh");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "to channel #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "Switch");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "Send Message");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "Poke");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "Kick");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "Ban");
define('OGP_LANG_vsoverview_banlist_head', "Ban list");
define('OGP_LANG_vsoverview_banlist_id', "ID #");
define('OGP_LANG_vsoverview_banlist_ip', "IP");
define('OGP_LANG_vsoverview_banlist_name', "Name");
define('OGP_LANG_vsoverview_banlist_uid', "UniqueID");
define('OGP_LANG_vsoverview_banlist_reason', "Reason");
define('OGP_LANG_vsoverview_banlist_created', "Created");
define('OGP_LANG_vsoverview_banlist_duration', "Duration");
define('OGP_LANG_vsoverview_banlist_end', "Ends");
define('OGP_LANG_vsoverview_banlist_unlimited', "unlimited");
define('OGP_LANG_vsoverview_banlist_never', "never");
define('OGP_LANG_vsoverview_banlist_new_head', "Create new ban");
define('OGP_LANG_vsoverview_banlist_new_create', "Vytvořit");
define('OGP_LANG_vsliveview_channelbackup_head', "Záloha kanálu");
define('OGP_LANG_vsliveview_channelbackup_get', "Vytvořit a stáhnout");
define('OGP_LANG_vsliveview_channelbackup_load', "Nahrát zálohu kanálu");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "obnovte");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "Záloha kanálu úspěšná.");
define('OGP_LANG_time_day', "den");
define('OGP_LANG_time_days', "dnů");
define('OGP_LANG_time_hour', "hodina");
define('OGP_LANG_time_hours', "hodin");
define('OGP_LANG_time_minute', "minuta");
define('OGP_LANG_time_minutes', "minuty");
define('OGP_LANG_time_second', "druhý");
define('OGP_LANG_time_seconds', "sekundy");
define('OGP_LANG_e_2568', "Nemáte dostatečná práva.");
define('OGP_LANG_temp_folder_not_writable', "Složka šablon (%s) nelze zapisovat.");
define('OGP_LANG_unassign_from_subuser', "Odpojit od uživatele.");
define('OGP_LANG_assign_to_subuser', "Přiřadit uživatele .");
define('OGP_LANG_select_subuser', "Vyberte uživatele .");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "Na váš účet nejsou přiřazeny žádné servery.");
define('OGP_LANG_change_virtual_server', "Změna Virtuálního Serveru");
define('OGP_LANG_change_remote_server', "Změnit Vzdálený Server");
?>