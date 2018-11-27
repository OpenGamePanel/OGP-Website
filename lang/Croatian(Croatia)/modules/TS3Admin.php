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

define('OGP_LANG_error', "Error");
define('OGP_LANG_title', "TeamSpeak 3 Web Interface");
define('OGP_LANG_update_available', "<h3>Attention: a new version (v%1) of this software is available under <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "Logout");
define('OGP_LANG_head_vserver_switch', "Change vServer");
define('OGP_LANG_head_vserver_overview', "vServer Overview");
define('OGP_LANG_head_vserver_token', "Token Management");
define('OGP_LANG_head_vserver_liveview', "Live View");
define('OGP_LANG_e_fill_out', "Please fill out all required fields.");
define('OGP_LANG_e_upload_failed', "Upload unsuccessfull.");
define('OGP_LANG_e_server_responded', "The server responded: ");
define('OGP_LANG_e_conn_serverquery', "Could not create ServerQuery access.");
define('OGP_LANG_e_conn_vserver', "Could not choose virtual server.");
define('OGP_LANG_e_session_timedout', "Session expired.");
define('OGP_LANG_js_error', "Error");
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
define('OGP_LANG_vsselect_name', "Name");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Port");
define('OGP_LANG_vsselect_state', "Status");
define('OGP_LANG_vsselect_clients', "Clients");
define('OGP_LANG_vsselect_uptime', "Uptime");
define('OGP_LANG_vsselect_choose', "Select");
define('OGP_LANG_vsselect_start', "Start");
define('OGP_LANG_vsselect_stop', "Stop");
define('OGP_LANG_vsselect_delete', "DELETE");
define('OGP_LANG_vsselect_new_headline', "Create a new virtual server");
define('OGP_LANG_vsselect_new_servername', "Server Name");
define('OGP_LANG_vsselect_new_slots', "Client slots");
define('OGP_LANG_vsselect_new_create', "Create");
define('OGP_LANG_vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> was created successfully.");
define('OGP_LANG_vsselect_new_added_generated', "The generated token is:");
define('OGP_LANG_vsoverview_virtualserver', "Virtual Server");
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
define('OGP_LANG_vsoverview_banlist_new_create', "Create");
define('OGP_LANG_vsliveview_channelbackup_head', "Channel Backup");
define('OGP_LANG_vsliveview_channelbackup_get', "Create and Download");
define('OGP_LANG_vsliveview_channelbackup_load', "Upload Channel Backup");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "Recreate");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "Channel Backup successful.");
define('OGP_LANG_time_day', "day");
define('OGP_LANG_time_days', "days");
define('OGP_LANG_time_hour', "hour");
define('OGP_LANG_time_hours', "hours");
define('OGP_LANG_time_minute', "minute");
define('OGP_LANG_time_minutes', "minutes");
define('OGP_LANG_time_second', "second");
define('OGP_LANG_time_seconds', "seconds");
define('OGP_LANG_e_2568', "You do not have sufficient rights.");
define('OGP_LANG_temp_folder_not_writable', "The templates folder (%s) is not writable.");
define('OGP_LANG_unassign_from_subuser', "Unassign from subuser.");
define('OGP_LANG_assign_to_subuser', "Assign to subuser.");
define('OGP_LANG_select_subuser', "Select subuser.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "You have no servers assigned to your account.");
define('OGP_LANG_change_virtual_server', "Change Virtual Server");
define('OGP_LANG_change_remote_server', "Change Remote Server");
?>