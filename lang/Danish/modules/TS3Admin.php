<?php

// General
$lang['error'] = "Fejl";
$lang['title'] = "Teamspeak 3 Hjemmeside Interface";
$lang['login'] = 'Log ind';

$lang['update_available'] = '<h3>OBS OBS OBS: En new version (v%1) af dette software, er muligt at hente her<a href="%2" target="_blank">%2</a>.</h3>';

// Head
$lang['head_logout'] = "Log ud";
$lang['head_vserver_switch'] = "Skift vServer";
$lang['head_vserver_overview'] = "vServer Oversigt";
$lang['head_vserver_token'] = "Token håndtering";
$lang['head_vserver_liveview'] = "Liveview";

// Errors
$lang['e_fill_out'] = "Venligst udfyld alle påkrævet felter.";
$lang['e_upload_failed'] = "Upload var ikke successfuldt.";
$lang['e_server_responded'] = "Serveren svarede: ";
$lang['e_conn_serverquery'] = "Kunne ikke oprette ServerQuery adgang.";
$lang['e_conn_vserver'] = "Kunne ikke vælge virtual server.";
$lang['e_session_timedout'] = "Session udløb.";


$lang['js_error'] = "Fejl";
$lang['js_ajax_error'] = "En AJAX fejl er opstået. %1";
$lang['js_confirm_server_stop'] = "Vil du virkelig stoppe serveren #%1?";
$lang['js_confirm_server_delete'] = "Vil du virkelig slette serveren #%1?";
$lang['js_notice_server_deleted'] = "Server %1 blev slettet successfuldt.\nSelve oversigts siden, bliver genindlæst nu.";
$lang['js_prompt_banduration'] = "Duration in hours (0=unlimited): ";
$lang['js_prompt_banreason'] = "Grund (optional): ";
$lang['js_prompt_msg_to'] = "Tekstbesked til %1 #%2: ";
$lang['js_prompt_poke_to'] = "Pokebesked til Klient #%1: ";
$lang['js_prompt_new_propvalue'] = "Ny værdi til '%1': ";


// Notices
$lang['n_server_responded'] = "Serveren svarede: ";

// Login
$lang['login_serverquery'] = "ServerQuery Log ind";
$lang['login_name'] = "Brugernavn";
$lang['login_password'] = "Kodeord";
$lang['login_submit'] = "Log ind";

// Select vServer page
$lang['vsselect_headline'] = "vServer udvalg";
$lang['vsselect_id'] = "ID #";
$lang['vsselect_name'] = "Navn";
$lang['vsselect_ip'] = "IP";
$lang['vsselect_port'] = "Port";
$lang['vsselect_state'] = "Status";
$lang['vsselect_clients'] = "Kienter";
$lang['vsselect_uptime'] = "Uptid";
$lang['vsselect_choose'] = "vælg";
$lang['vsselect_start'] = "start";
$lang['vsselect_stop'] = "stop";
$lang['vsselect_delete'] = "SLET";

$lang['vsselect_new_headline'] = "Opret en ny vituel server";
$lang['vsselect_new_servername'] = "Server Navn";
$lang['vsselect_new_slots'] = "Klient slots";
$lang['vsselect_new_create'] = "Opret";

$lang['vsselect_new_added_ok'] = "vServer <span class=\"online\">%1</span> blev oprettet successfuldt.";
$lang['vsselect_new_added_generated'] = "Det genereret token er:";

// VDS overview
$lang['vsoverview_virtualserver'] = "Virtuel Server";
$lang['vsoverview_information_head'] = "Information";
$lang['vsoverview_connection_head'] = "Tilsluttet";
$lang['vsoverview_info_general_head'] = "Generalle indstillinger";

$lang['vsoverview_info_servername'] = "Server Navn";
$lang['vsoverview_info_host'] = "Vært";
$lang['vsoverview_info_state'] = "Status";
$lang['vsoverview_info_state_port'] = "Port";
$lang['vsoverview_info_uptime'] = "Optid";
$lang['vsoverview_info_welcomemsg'] = "Velkommen<br />besked";
$lang['vsoverview_info_hostmsg'] = "Vært besked";
$lang['vsoverview_info_hostmsg_mode_output'] = "output";
$lang['vsoverview_info_hostmsg_mode_0'] = "ingen";
$lang['vsoverview_info_hostmsg_mode_1'] = "I chat loggen";
$lang['vsoverview_info_hostmsg_mode_2'] = "vindue";
$lang['vsoverview_info_hostmsg_mode_3'] = "Vindue + Disconnect";
$lang['vsoverview_info_req_security'] = "Sikkerhes level";
$lang['vsoverview_info_req_securitylvl'] = "påkrævet";
$lang['vsoverview_info_hostbanner_head'] = "Værtsbanner";
$lang['vsoverview_info_hostbanner_url'] = "URL";
$lang['vsoverview_info_hostbanner_imgurl'] = "Billed address";
$lang['vsoverview_info_hostbanner_buttonurl'] = "Værtsknap URL";
$lang['vsoverview_info_antiflood_head'] = "Anti-Flood";
$lang['vsoverview_info_antiflood_warning'] = "Advarsels på";
$lang['vsoverview_info_antiflood_kick'] = "Spark slået til";
$lang['vsoverview_info_antiflood_ban'] = "Banning slået til";
$lang['vsoverview_info_antiflood_banduration'] = "Ban længde";
$lang['vsoverview_info_antiflood_decrease'] = "reducere";
$lang['vsoverview_info_antiflood_points'] = "point";
$lang['vsoverview_info_antiflood_in_seconds'] = "sekunder";
$lang['vsoverview_info_antiflood_points_per_tick'] = "point pr tik";
$lang['vsoverview_conn_total_head'] = "Total";
$lang['vsoverview_conn_total_packets'] = "pakker";
$lang['vsoverview_conn_total_bytes'] = "bytes";
$lang['vsoverview_conn_total_send'] = "sendt";
$lang['vsoverview_conn_total_received'] = "modtaget";
$lang['vsoverview_conn_bandwidth_head'] = "Båndbredde";
$lang['vsoverview_conn_bandwidth_last'] = "sidst";
$lang['vsoverview_conn_bandwidth_second'] = "sekund";
$lang['vsoverview_conn_bandwidth_minute'] = "minut";
$lang['vsoverview_conn_bandwidth_send'] = "sendt";
$lang['vsoverview_conn_bandwidth_received'] = "modtaget";


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

$lang['vstoken_new_added_ok'] = "Token blev genereret succesfuldt.";


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