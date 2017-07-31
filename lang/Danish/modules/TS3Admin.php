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

define('error', "Fejl");
define('title', "Teamspeak 3 Hjemmeside Interface");
define('update_available', "<h3>OBS OBS OBS: En new version (v%1) af dette software, er muligt at hente her<a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('head_logout', "Log ud");
define('head_vserver_switch', "Skift vServer");
define('head_vserver_overview', "vServer Oversigt");
define('head_vserver_token', "Token Management");
define('head_vserver_liveview', "Live View");
define('e_fill_out', "Venligst udfyld alle påkrævet felter.");
define('e_upload_failed', "Upload var ikke successfuldt.");
define('e_server_responded', "Serveren svarede: ");
define('e_conn_serverquery', "Kunne ikke oprette ServerQuery adgang.");
define('e_conn_vserver', "Kunne ikke vælge virtual server.");
define('e_session_timedout', "Session udløb.");
define('js_error', "Fejl");
define('js_ajax_error', "An AJAX error has occurred: %1.");
define('js_confirm_server_stop', "Vil du virkelig stoppe serveren #%1?");
define('js_confirm_server_delete', "Vil du virkelig slette serveren #%1?");
define('js_notice_server_deleted', "Server %1 blev slettet successfuldt.\nSelve oversigts siden, bliver genindlæst nu.");
define('js_prompt_banduration', "Duration in hours (0=unlimited): ");
define('js_prompt_banreason', "Grund (optional): ");
define('js_prompt_msg_to', "Tekstbesked til %1 #%2: ");
define('js_prompt_poke_to', "Pokebesked til Klient #%1: ");
define('js_prompt_new_propvalue', "Ny værdi til '%1': ");
define('n_server_responded', "Serveren svarede: ");
define('login_serverquery', "ServerQuery Log ind");
define('login_name', "Brugerens navn");
define('login_password', "Kodeord");
define('login_submit', "Log ind");
define('vsselect_headline', "vServer udvalg");
define('vsselect_id', "ID #");
define('vsselect_name', "Navn");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Status");
define('vsselect_clients', "Kienter");
define('vsselect_uptime', "Uptid");
define('vsselect_choose', "Select");
define('vsselect_start', "Start");
define('vsselect_stop', "Stop");
define('vsselect_delete', "SLET");
define('vsselect_new_headline', "Opret en ny vituel server");
define('vsselect_new_servername', "Server Navn");
define('vsselect_new_slots', "Klient slots");
define('vsselect_new_create', "Opret");
define('vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> blev oprettet successfuldt.");
define('vsselect_new_added_generated', "Det genereret token er:");
define('vsoverview_virtualserver', "Virtuel Server");
define('vsoverview_information_head', "Information");
define('vsoverview_connection_head', "Tilsluttet");
define('vsoverview_info_general_head', "Generalle indstillinger");
define('vsoverview_info_servername', "Server Navn");
define('vsoverview_info_host', "Vært");
define('vsoverview_info_state', "Status");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Optid");
define('vsoverview_info_welcomemsg', "Velkommen<br />besked");
define('vsoverview_info_hostmsg', "Vært besked");
define('vsoverview_info_hostmsg_mode_output', "output");
define('vsoverview_info_hostmsg_mode_0', "ingen");
define('vsoverview_info_hostmsg_mode_1', "I chat loggen");
define('vsoverview_info_hostmsg_mode_2', "vindue");
define('vsoverview_info_hostmsg_mode_3', "Vindue + Disconnect");
define('vsoverview_info_req_security', "Sikkerhes level");
define('vsoverview_info_req_securitylvl', "påkrævet");
define('vsoverview_info_hostbanner_head', "Værtsbanner");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Billed address");
define('vsoverview_info_hostbanner_buttonurl', "Værtsknap URL");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Advarsels på");
define('vsoverview_info_antiflood_kick', "Spark slået til");
define('vsoverview_info_antiflood_ban', "Banning slået til");
define('vsoverview_info_antiflood_banduration', "Ban længde");
define('vsoverview_info_antiflood_decrease', "reducere");
define('vsoverview_info_antiflood_points', "point");
define('vsoverview_info_antiflood_in_seconds', "sekunder");
define('vsoverview_info_antiflood_points_per_tick', "point pr tik");
define('vsoverview_conn_total_head', "Total");
define('vsoverview_conn_total_packets', "pakker");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "sendt");
define('vsoverview_conn_total_received', "modtaget");
define('vsoverview_conn_bandwidth_head', "Båndbredde");
define('vsoverview_conn_bandwidth_last', "sidst");
define('vsoverview_conn_bandwidth_second', "sekund");
define('vsoverview_conn_bandwidth_minute', "minut");
define('vsoverview_conn_bandwidth_send', "sendt");
define('vsoverview_conn_bandwidth_received', "modtaget");
define('vstoken_token_virtualserver', "Virtual Server");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Group type");
define('vstoken_token_id1', "Server Group/<br />Channel Group");
define('vstoken_token_id2', "(Channel)");
define('vstoken_token_tokencode', "Token Code");
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
define('vstoken_new_added_ok', "Token blev genereret succesfuldt.");
define('vsliveview_server_virtualserver', "Virtual Server");
define('vsliveview_server_head', "Live View");
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
define('vsoverview_banlist_created', "Created");
define('vsoverview_banlist_duration', "Duration");
define('vsoverview_banlist_end', "Ends");
define('vsoverview_banlist_unlimited', "unlimited");
define('vsoverview_banlist_never', "never");
define('vsoverview_banlist_new_head', "Create new ban");
define('vsoverview_banlist_new_create', "create");
define('vsliveview_channelbackup_head', "Channel Backup");
define('vsliveview_channelbackup_get', "Create and Download");
define('vsliveview_channelbackup_load', "Upload Channel Backup");
define('vsliveview_channelbackup_load_submit', "Recreate");
define('vsliveview_channelbackup_new_added_ok', "Channel Backup successful.");
define('time_day', "day");
define('time_days', "days");
define('time_hour', "hour");
define('time_hours', "hours");
define('time_minute', "minute");
define('time_minutes', "minutes");
define('time_second', "second");
define('time_seconds', "seconds");
define('e_2568', "You do not have sufficient rights.");
define('temp_folder_not_writable', "Download kan ikke placeres, pga Apache ikke har nogen skrive tilladelse, på systemets midlertidig mappe(%s).");
define('unassign_from_subuser', "Unassign from subuser.");
define('assign_to_subuser', "Assign to subuser.");
define('select_subuser', "Select subuser.");
define('no_ts3_servers_assigned_to_account', "You have no servers assigned to your account.");
define('change_virtual_server', "Change Virtual Server");
define('change_remote_server', "Change Remote Server");
?>
