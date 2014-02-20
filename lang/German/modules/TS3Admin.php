<?php

// General
$lang['error'] = "error";
$lang['title'] = "TeamSpeak 3 Web Interface";
$lang['login'] = 'Login';

$lang['update_available'] = '<h3>Attention: A new version (v%1) of this software is available under <a href="%2" target="_blank">%2</a>.</h3>';

// Head
$lang['head_logout'] = "Logout";
$lang['head_vserver_switch'] = "Change vServer";
$lang['head_vserver_overview'] = "vServer Overview";
$lang['head_vserver_token'] = "Token management";
$lang['head_vserver_liveview'] = "Liveview";

// Errors
$lang['e_fill_out'] = "Please fill out all required fields.";
$lang['e_upload_failed'] = "Upload unsuccessfull.";
$lang['e_server_responded'] = "The server responded: ";
$lang['e_conn_serverquery'] = "Could not create ServerQuery access.";
$lang['e_conn_vserver'] = "Could not choose virtual server.";
$lang['e_session_timedout'] = "Session expired.";


$lang['js_error'] = "Error";
$lang['js_ajax_error'] = "An AJAX error has occurred. %1";
$lang['js_confirm_server_stop'] = "Do you really want to stop server #%1?";
$lang['js_confirm_server_delete'] = "Do you really want to DELETE server #%1?";
$lang['js_notice_server_deleted'] = "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.";
$lang['js_prompt_banduration'] = "Duration in hours (0=unlimited): ";
$lang['js_prompt_banreason'] = "Reason (optional): ";
$lang['js_prompt_msg_to'] = "Textmessage to %1 #%2: ";
$lang['js_prompt_poke_to'] = "Pokemessage to Client #%1: ";
$lang['js_prompt_new_propvalue'] = "New value for '%1': ";


// Notices
$lang['n_server_responded'] = "The server responded: ";

// Login
$lang['login_serverquery'] = "ServerQuery Login";
$lang['login_name'] = "Username";
$lang['login_password'] = "Passwort";
$lang['login_submit'] = "Login";

// Select vServer page
$lang['vsselect_headline'] = "vServer selection";
$lang['vsselect_id'] = "ID #";
$lang['vsselect_name'] = "Name";
$lang['vsselect_ip'] = "IP";
$lang['vsselect_port'] = "Port";
$lang['vsselect_state'] = "Status";
$lang['vsselect_clients'] = "Clients";
$lang['vsselect_uptime'] = "Uptime";
$lang['vsselect_choose'] = "select";
$lang['vsselect_start'] = "start";
$lang['vsselect_stop'] = "stop";
$lang['vsselect_delete'] = "DELETE";

$lang['vsselect_new_headline'] = "Create a new virtual server";
$lang['vsselect_new_servername'] = "Server Name";
$lang['vsselect_new_slots'] = "Client slots";
$lang['vsselect_new_create'] = "Create";

$lang['vsselect_new_added_ok'] = "vServer <span class=\"online\">%1</span> was created successfully.";
$lang['vsselect_new_added_generated'] = "The generated token is:";

// VDS overview
$lang['vsoverview_virtualserver'] = "Virtual Server";
$lang['vsoverview_information_head'] = "Information";
$lang['vsoverview_connection_head'] = "Connection";
$lang['vsoverview_info_general_head'] = "General settings";

$lang['vsoverview_info_servername'] = "Server Name";
$lang['vsoverview_info_host'] = "Host";
$lang['vsoverview_info_state'] = "Status";
$lang['vsoverview_info_state_port'] = "Port";
$lang['vsoverview_info_uptime'] = "Uptime";
$lang['vsoverview_info_welcomemsg'] = "Welcome<br />message";
$lang['vsoverview_info_hostmsg'] = "Host message";
$lang['vsoverview_info_hostmsg_mode_output'] = "output";
$lang['vsoverview_info_hostmsg_mode_0'] = "none";
$lang['vsoverview_info_hostmsg_mode_1'] = "in the chat log";
$lang['vsoverview_info_hostmsg_mode_2'] = "window";
$lang['vsoverview_info_hostmsg_mode_3'] = "Window + Disconnect";
$lang['vsoverview_info_req_security'] = "Security level";
$lang['vsoverview_info_req_securitylvl'] = "required";
$lang['vsoverview_info_hostbanner_head'] = "Hostbanner";
$lang['vsoverview_info_hostbanner_url'] = "URL";
$lang['vsoverview_info_hostbanner_imgurl'] = "Image address";
$lang['vsoverview_info_hostbanner_buttonurl'] = "Hostbutton URL";
$lang['vsoverview_info_antiflood_head'] = "Anti-Flood";
$lang['vsoverview_info_antiflood_warning'] = "Warning on";
$lang['vsoverview_info_antiflood_kick'] = "Kick on";
$lang['vsoverview_info_antiflood_ban'] = "Ban on";
$lang['vsoverview_info_antiflood_banduration'] = "Ban length";
$lang['vsoverview_info_antiflood_decrease'] = "decrease";
$lang['vsoverview_info_antiflood_points'] = "points";
$lang['vsoverview_info_antiflood_in_seconds'] = "seconds";
$lang['vsoverview_info_antiflood_points_per_tick'] = "Points per tick";
$lang['vsoverview_conn_total_head'] = "Total";
$lang['vsoverview_conn_total_packets'] = "packages";
$lang['vsoverview_conn_total_bytes'] = "bytes";
$lang['vsoverview_conn_total_send'] = "sent";
$lang['vsoverview_conn_total_received'] = "received";
$lang['vsoverview_conn_bandwidth_head'] = "Bandwidth";
$lang['vsoverview_conn_bandwidth_last'] = "last";
$lang['vsoverview_conn_bandwidth_second'] = "second";
$lang['vsoverview_conn_bandwidth_minute'] = "minute";
$lang['vsoverview_conn_bandwidth_send'] = "sent";
$lang['vsoverview_conn_bandwidth_received'] = "received";


// vServer Token
$lang['vstoken_token_virtualserver'] = "Virtual Server";
$lang['vstoken_token_head'] = "Token";
$lang['vstoken_token_type'] = "Group type";
$lang['vstoken_token_id1'] = "Servergroup/<br />Channelgroup";
$lang['vstoken_token_id2'] = "(Channel)";
$lang['vstoken_token_tokencode'] = "Tokencode";
$lang['vstoken_token_delete'] = "delete";

$lang['vstoken_new_head'] = "Create a new token";
$lang['vstoken_new_create'] = "Generate";
$lang['vstoken_new_tokentype'] = "Token type:";
$lang['vstoken_new_servergroup'] = "Server Group";
$lang['vstoken_new_channelgroup'] = "Channel Group";
$lang['vstoken_new_select_group'] = "Servergroup";
$lang['vstoken_new_select_channelgroup'] = "Channelgroup";
$lang['vstoken_new_select_channel'] = "Channel";

$lang['vstoken_new_tokentype_0'] = "Server";
$lang['vstoken_new_tokentype_1'] = "Channel";

$lang['vstoken_new_added_ok'] = "Token was generated successfully.";


// vServer Liveview
$lang['vsliveview_server_virtualserver'] = "Virtual Server";
$lang['vsliveview_server_head'] = "live view";

$lang['vsliveview_liveview_enable_autorefresh'] = "Auto refresh";

$lang['vsliveview_liveview_tooltip_to_channel'] = "to channel #";
$lang['vsliveview_liveview_tooltip_switch'] = "Switch";
$lang['vsliveview_liveview_tooltip_send_msg'] = "Send Message";
$lang['vsliveview_liveview_tooltip_poke'] = "Poke";
$lang['vsliveview_liveview_tooltip_kick'] = "Kick";
$lang['vsliveview_liveview_tooltip_ban'] = "Ban";

$lang['vsoverview_banlist_head'] = "Ban list";
$lang['vsoverview_banlist_id'] = "ID #";
$lang['vsoverview_banlist_ip'] = "IP";
$lang['vsoverview_banlist_name'] = "Name";
$lang['vsoverview_banlist_uid'] = "UniqueID";
$lang['vsoverview_banlist_reason'] = "Reason";
$lang['vsoverview_banlist_created'] = "created";
$lang['vsoverview_banlist_duration'] = "Duration";
$lang['vsoverview_banlist_end'] = "ends";
$lang['vsoverview_banlist_unlimited'] = "unlimited";
$lang['vsoverview_banlist_never'] = "never";

$lang['vsoverview_banlist_new_head'] = "Create new ban";
$lang['vsoverview_banlist_new_create'] = "create";

$lang['vsliveview_channelbackup_head'] = "Channelbackup";
$lang['vsliveview_channelbackup_get'] = "create and download";
$lang['vsliveview_channelbackup_load'] = "Upload Channelbackup";
$lang['vsliveview_channelbackup_load_submit'] = "recreate";

$lang['vsliveview_channelbackup_new_added_ok'] = "Channelbackup successfull.";



// Counter
$lang['time_day']     = "day";
$lang['time_days']    = "days";
$lang['time_hour']    = "hour";
$lang['time_hours']   = "hours";
$lang['time_minute']  = "minute";
$lang['time_minutes'] = "minutes";
$lang['time_second']  = "second";
$lang['time_seconds'] = "seconds";



// Error numbers
$lang['e_2568'] = "You do not have sufficient rights.";
$lang['temp_folder_not_writable'] = "The templates folder (%s) is not writable.";
?>