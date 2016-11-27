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
define('title', "TeamSpeak 3 Web Interface");
define('update_available', 'Frissítés elérhető');
define('head_logout', "Kijelentkezés");
define('head_vserver_switch', "Change vServer");
define('head_vserver_overview', "vServer Overview");
define('head_vserver_token', "Token management");
define('head_vserver_liveview', "Liveview");
define('e_fill_out', "Please fill out all required fields.");
define('e_upload_failed', "Upload unsuccessfull.");
define('e_server_responded', "The server responded: ");
define('e_conn_serverquery', "Could not create ServerQuery access.");
define('e_conn_vserver', "Could not choose virtual server.");
define('e_session_timedout', "Session expired.");
define('js_error', "Error");
define('js_ajax_error', "An AJAX error has occurred. %1");
define('js_confirm_server_stop', "Do you really want to stop server #%1?");
define('js_confirm_server_delete', "Do you really want to DELETE server #%1?");
define('js_notice_server_deleted', "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.");
define('js_prompt_banduration', "Duration in hours (0=unlimited): ");
define('js_prompt_banreason', "Reason (optional): ");
define('js_prompt_msg_to', "Textmessage to %1 #%2: ");
define('js_prompt_poke_to', "Pokemessage to Client #%1: ");
define('js_prompt_new_propvalue', "New value for '%1': ");
define('n_server_responded', "The server responded: ");
define('login_serverquery', "ServerQuery Login");
define('login_name', "Felhasználónév");
define('login_password', "Password");
define('login_submit', "Login");
define('vsselect_headline', "vServer selection");
define('vsselect_id', "ID #");
define('vsselect_name', "Name");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Status");
define('vsselect_clients', "Clients");
define('vsselect_uptime', "Uptime");
define('vsselect_choose', "select");
define('vsselect_start', "start");
define('vsselect_stop', "stop");
define('vsselect_delete', "DELETE");
define('vsselect_new_headline', "Create a new virtual server");
define('vsselect_new_servername', "Server Name");
define('vsselect_new_slots', "Client slots");
define('vsselect_new_create', "Create");
define('vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> was created successfully.");
define('vsselect_new_added_generated', "The generated token is:");
define('vsoverview_virtualserver', "Virtual Server");
define('vsoverview_information_head', "Information");
define('vsoverview_connection_head', "Connection");
define('vsoverview_info_general_head', "General settings");
define('vsoverview_info_servername', "Server Name");
define('vsoverview_info_host', "Host");
define('vsoverview_info_state', "Status");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Uptime");
define('vsoverview_info_welcomemsg', "Welcome<br />message");
define('vsoverview_info_hostmsg', "Host message");
define('vsoverview_info_hostmsg_mode_output', "output");
define('vsoverview_info_hostmsg_mode_0', "none");
define('vsoverview_info_hostmsg_mode_1', "in the chat log");
define('vsoverview_info_hostmsg_mode_2', "window");
define('vsoverview_info_hostmsg_mode_3', "Window + Disconnect");
define('vsoverview_info_req_security', "Security level");
define('vsoverview_info_req_securitylvl', "required");
define('vsoverview_info_hostbanner_head', "Hostbanner");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Image address");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Warning on");
define('vsoverview_info_antiflood_kick', "Kick on");
define('vsoverview_info_antiflood_ban', "Ban on");
define('vsoverview_info_antiflood_banduration', "Ban length");
define('vsoverview_info_antiflood_decrease', "decrease");
define('vsoverview_info_antiflood_points', "points");
define('vsoverview_info_antiflood_in_seconds', "seconds");
define('vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('vsoverview_conn_total_head', "Total");
define('vsoverview_conn_total_packets', "packages");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "sent");
define('vsoverview_conn_total_received', "received");
define('vsoverview_conn_bandwidth_head', "Bandwidth");
define('vsoverview_conn_bandwidth_last', "last");
define('vsoverview_conn_bandwidth_second', "second");
define('vsoverview_conn_bandwidth_minute', "minute");
define('vsoverview_conn_bandwidth_send', "sent");
define('vsoverview_conn_bandwidth_received', "received");
define('vstoken_token_virtualserver', "Virtual Server");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Group type");
define('vstoken_token_id1', "Servergroup/<br />Channelgroup");
define('vstoken_token_id2', "(Channel)");
define('vstoken_token_tokencode', "Tokencode");
define('vstoken_token_delete', "delete");
define('vstoken_new_head', "Create a new token");
define('vstoken_new_create', "Generate");
define('vstoken_new_tokentype', "Token type:");
define('vstoken_new_servergroup', "Server Group");
define('vstoken_new_channelgroup', "Channel Group");
define('vstoken_new_select_group', "Servergroup");
define('vstoken_new_select_channelgroup', "Channelgroup");
define('vstoken_new_select_channel', "Channel");
define('vstoken_new_tokentype_0', "Server");
define('vstoken_new_tokentype_1', "Channel");
define('vstoken_new_added_ok', "Token was generated successfully.");
define('vsliveview_server_virtualserver', "Virtual Server");
define('vsliveview_server_head', "live view");
define('vsliveview_liveview_enable_autorefresh', "Auto refresh");
define('vsliveview_liveview_tooltip_to_channel', "to channel #");
define('vsliveview_liveview_tooltip_switch', "Switch");
define('vsliveview_liveview_tooltip_send_msg', "Send Message");
define('vsliveview_liveview_tooltip_poke', "Poke");
define('vsliveview_liveview_tooltip_kick', "Kick");
define('vsliveview_liveview_tooltip_ban', "Ban");
define('vsoverview_banlist_head', "Ban list");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Name");
define('vsoverview_banlist_uid', "UniqueID");
define('vsoverview_banlist_reason', "Reason");
define('vsoverview_banlist_created', "created");
define('vsoverview_banlist_duration', "Duration");
define('vsoverview_banlist_end', "ends");
define('vsoverview_banlist_unlimited', "unlimited");
define('vsoverview_banlist_never', "never");
define('vsoverview_banlist_new_head', "Create new ban");
define('vsoverview_banlist_new_create', "create");
define('vsliveview_channelbackup_head', "Channelbackup");
define('vsliveview_channelbackup_get', "create and download");
define('vsliveview_channelbackup_load', "Upload Channelbackup");
define('vsliveview_channelbackup_load_submit', "recreate");
define('vsliveview_channelbackup_new_added_ok', "Channelbackup successfull.");
define('time_day', "day");
define('time_days', "days");
define('time_hour', "hour");
define('time_hours', "hours");
define('time_minute', "minute");
define('time_minutes', "minutes");
define('time_second', "second");
define('time_seconds', "seconds");
define('e_2568', "You do not have sufficient rights.");
define('temp_folder_not_writable', "The templates folder (%s) is not writable.");
define('unassign_from_subuser', "Unassign from subuser.");
define('assign_to_subuser', "Assign to subuser.");
define('select_subuser', "Select subuser.");
?>