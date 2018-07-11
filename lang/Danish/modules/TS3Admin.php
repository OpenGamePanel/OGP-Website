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

define('OGP_LANG_error', "Fejl");
define('OGP_LANG_title', "Teamspeak 3 Hjemmeside Interface");
define('OGP_LANG_update_available', "<h3>OBS OBS OBS: En new version (v%1) af dette software, er muligt at hente her<a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "Log ud");
define('OGP_LANG_head_vserver_switch', "Skift vServer");
define('OGP_LANG_head_vserver_overview', "vServer Oversigt");
define('OGP_LANG_head_vserver_token', "Token Management");
define('OGP_LANG_head_vserver_liveview', "Live View");
define('OGP_LANG_e_fill_out', "Venligst udfyld alle påkrævet felter.");
define('OGP_LANG_e_upload_failed', "Upload var ikke successfuldt.");
define('OGP_LANG_e_server_responded', "Serveren svarede: ");
define('OGP_LANG_e_conn_serverquery', "Kunne ikke oprette ServerQuery adgang.");
define('OGP_LANG_e_conn_vserver', "Kunne ikke vælge virtual server.");
define('OGP_LANG_e_session_timedout', "Session udløb.");
define('OGP_LANG_js_error', "Fejl");
define('OGP_LANG_js_ajax_error', "An AJAX error has occurred: %1.");
define('OGP_LANG_js_confirm_server_stop', "Vil du virkelig stoppe serveren #%1?");
define('OGP_LANG_js_confirm_server_delete', "Vil du virkelig slette serveren #%1?");
define('OGP_LANG_js_notice_server_deleted', "Server %1 blev slettet successfuldt.\nSelve oversigts siden, bliver genindlæst nu.");
define('OGP_LANG_js_prompt_banduration', "Duration in hours (0=unlimited): ");
define('OGP_LANG_js_prompt_banreason', "Grund (optional): ");
define('OGP_LANG_js_prompt_msg_to', "Text Message to %1 #%2: ");
define('OGP_LANG_js_prompt_poke_to', "Poke Message to Client #%1: ");
define('OGP_LANG_js_prompt_new_propvalue', "Ny værdi til '%1': ");
define('OGP_LANG_n_server_responded', "Serveren svarede: ");
define('OGP_LANG_login_serverquery', "ServerQuery Log ind");
define('OGP_LANG_login_name', "Brugerens navn");
define('OGP_LANG_login_password', "Kodeord");
define('OGP_LANG_login_submit', "Log ind");
define('OGP_LANG_vsselect_headline', "vServer udvalg");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "Navn");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Port");
define('OGP_LANG_vsselect_state', "Status");
define('OGP_LANG_vsselect_clients', "Kienter");
define('OGP_LANG_vsselect_uptime', "Uptid");
define('OGP_LANG_vsselect_choose', "Select");
define('OGP_LANG_vsselect_start', "Start");
define('OGP_LANG_vsselect_stop', "Stop");
define('OGP_LANG_vsselect_delete', "SLET");
define('OGP_LANG_vsselect_new_headline', "Opret en ny vituel server");
define('OGP_LANG_vsselect_new_servername', "Server Navn");
define('OGP_LANG_vsselect_new_slots', "Klient slots");
define('OGP_LANG_vsselect_new_create', "Opret");
define('OGP_LANG_vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> blev oprettet successfuldt.");
define('OGP_LANG_vsselect_new_added_generated', "Det genereret token er:");
define('OGP_LANG_vsoverview_virtualserver', "Virtual Server");
define('OGP_LANG_vsoverview_information_head', "Information");
define('OGP_LANG_vsoverview_connection_head', "Tilsluttet");
define('OGP_LANG_vsoverview_info_general_head', "Generalle indstillinger");
define('OGP_LANG_vsoverview_info_servername', "Server Navn");
define('OGP_LANG_vsoverview_info_host', "Vært");
define('OGP_LANG_vsoverview_info_state', "Status");
define('OGP_LANG_vsoverview_info_state_port', "Port");
define('OGP_LANG_vsoverview_info_uptime', "Optid");
define('OGP_LANG_vsoverview_info_welcomemsg', "Velkommen<br />besked");
define('OGP_LANG_vsoverview_info_hostmsg', "Vært besked");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "output");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "ingen");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "I chat loggen");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "vindue");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "Vindue + Disconnect");
define('OGP_LANG_vsoverview_info_req_security', "Sikkerhes level");
define('OGP_LANG_vsoverview_info_req_securitylvl', "påkrævet");
define('OGP_LANG_vsoverview_info_hostbanner_head', "Værtsbanner");
define('OGP_LANG_vsoverview_info_hostbanner_url', "URL");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "Billed address");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "Værtsknap URL");
define('OGP_LANG_vsoverview_info_antiflood_head', "Anti-Flood");
define('OGP_LANG_vsoverview_info_antiflood_warning', "Advarsels på");
define('OGP_LANG_vsoverview_info_antiflood_kick', "Spark slået til");
define('OGP_LANG_vsoverview_info_antiflood_ban', "Banning slået til");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "Ban længde");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "Decrease");
define('OGP_LANG_vsoverview_info_antiflood_points', "point");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "sekunder");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "point pr tik");
define('OGP_LANG_vsoverview_conn_total_head', "Total");
define('OGP_LANG_vsoverview_conn_total_packets', "pakker");
define('OGP_LANG_vsoverview_conn_total_bytes', "bytes");
define('OGP_LANG_vsoverview_conn_total_send', "sendt");
define('OGP_LANG_vsoverview_conn_total_received', "modtaget");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "Båndbredde");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "sidst");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "sekund");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "minut");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "sendt");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "modtaget");
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
define('OGP_LANG_vstoken_new_added_ok', "Token blev genereret succesfuldt.");
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
define('OGP_LANG_temp_folder_not_writable', "Download kan ikke placeres, pga Apache ikke har nogen skrive tilladelse, på systemets midlertidig mappe(%s).");
define('OGP_LANG_unassign_from_subuser', "Unassign from subuser.");
define('OGP_LANG_assign_to_subuser', "Assign to subuser.");
define('OGP_LANG_select_subuser', "Select subuser.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "You have no servers assigned to your account.");
define('OGP_LANG_change_virtual_server', "Change Virtual Server");
define('OGP_LANG_change_remote_server', "Change Remote Server");
?>