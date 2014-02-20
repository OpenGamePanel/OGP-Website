<?php

// General
$lang['error'] = "error";
$lang['title'] = "TeamSpeak 3 Web Interface";
$lang['login'] = 'Entrar';

$lang['update_available'] = '<h3>Attention: A new version (v%1) of this software is available under <a href="%2" target="_blank">%2</a>.</h3>';

// Head
$lang['head_logout'] = "Salir";
$lang['head_vserver_switch'] = "Cambiar";
$lang['head_vserver_overview'] = "Configurar";
$lang['head_vserver_token'] = "Lista de Tokens";
$lang['head_vserver_liveview'] = "Monitorizar";

// Errors
$lang['e_fill_out'] = "Rellene los campos.";
$lang['e_upload_failed'] = "Fallo al subir el archivo.";
$lang['e_server_responded'] = "El servidor a respondido: ";
$lang['e_conn_serverquery'] = "No se pudo obtener acceso.";
$lang['e_conn_vserver'] = "Imposible seleccionar servidor.";
$lang['e_session_timedout'] = "Sesión caducada.";


$lang['js_error'] = "Error";
$lang['js_ajax_error'] = "Error de Ajax. %1";
$lang['js_confirm_server_stop'] = "Seguro que quieres parar el servidor #%1?";
$lang['js_confirm_server_delete'] = "Seguro que quiere eliminar el servidor #%1?";
$lang['js_notice_server_deleted'] = "El servidor %1 ha sido eliminado.";
$lang['js_prompt_banduration'] = "Duración en horas (0=ilimitado): ";
$lang['js_prompt_banreason'] = "Razón (opcional): ";
$lang['js_prompt_msg_to'] = "Mensaje de texto para %1 #%2: ";
$lang['js_prompt_poke_to'] = "Mensaje Poke al cliente #%1: ";
$lang['js_prompt_new_propvalue'] = "Nuevo valor para '%1': ";


// Notices
$lang['n_server_responded'] = "El servidor a respondido: ";

// Login
$lang['login_serverquery'] = "Ususario del Servidor de peticiones";
$lang['login_name'] = "Ususário";
$lang['login_password'] = "contraseña";
$lang['login_submit'] = "Entrar";

// Select vServer page
$lang['vsselect_headline'] = "Selección de servidor";
$lang['vsselect_id'] = "ID #";
$lang['vsselect_name'] = "Nombre";
$lang['vsselect_ip'] = "IP";
$lang['vsselect_port'] = "Puerto";
$lang['vsselect_state'] = "Estado";
$lang['vsselect_clients'] = "Clientes";
$lang['vsselect_uptime'] = "Tiempo en linea";
$lang['vsselect_choose'] = "Selección";
$lang['vsselect_start'] = "Iniciar";
$lang['vsselect_stop'] = "Parar";
$lang['vsselect_delete'] = "ELIMINAR";

$lang['vsselect_new_headline'] = "Crear un nuevo servidor virtual";
$lang['vsselect_new_servername'] = "Nombre del servidor";
$lang['vsselect_new_slots'] = "Slots";
$lang['vsselect_new_create'] = "Crear";

$lang['vsselect_new_added_ok'] = "servidor <span class=\"online\">%1</span> se ha creado.";
$lang['vsselect_new_added_generated'] = "El token generado es:";

// VDS overview
$lang['vsoverview_virtualserver'] = "Servidor Virtual";
$lang['vsoverview_information_head'] = "Información";
$lang['vsoverview_connection_head'] = "Conexión";
$lang['vsoverview_info_general_head'] = "Configuración General";

$lang['vsoverview_info_servername'] = "Nombre de servidor";
$lang['vsoverview_info_host'] = "Host";
$lang['vsoverview_info_state'] = "Estado";
$lang['vsoverview_info_state_port'] = "Puerto";
$lang['vsoverview_info_uptime'] = "Tiempo en linea";
$lang['vsoverview_info_welcomemsg'] = "Mensaje<br />Bienvenida";
$lang['vsoverview_info_hostmsg'] = "Mensaje del Host";
$lang['vsoverview_info_hostmsg_mode_output'] = "Consola";
$lang['vsoverview_info_hostmsg_mode_0'] = "Ninguna";
$lang['vsoverview_info_hostmsg_mode_1'] = "en el log del chat";
$lang['vsoverview_info_hostmsg_mode_2'] = "Ventana";
$lang['vsoverview_info_hostmsg_mode_3'] = "Ventana + Desconectar";
$lang['vsoverview_info_req_security'] = "Nivel de seguridad";
$lang['vsoverview_info_req_securitylvl'] = "Requerido";
$lang['vsoverview_info_hostbanner_head'] = "Cabecera Host";
$lang['vsoverview_info_hostbanner_url'] = "URL";
$lang['vsoverview_info_hostbanner_imgurl'] = "URL de imagen";
$lang['vsoverview_info_hostbanner_buttonurl'] = "URL boton del host";
$lang['vsoverview_info_antiflood_head'] = "Anti-Flood";
$lang['vsoverview_info_antiflood_warning'] = "Aviso Activado";
$lang['vsoverview_info_antiflood_kick'] = "Kick Activado";
$lang['vsoverview_info_antiflood_ban'] = "Ban Activado";
$lang['vsoverview_info_antiflood_banduration'] = "Duración Ban";
$lang['vsoverview_info_antiflood_decrease'] = "decrementar";
$lang['vsoverview_info_antiflood_points'] = "puntos";
$lang['vsoverview_info_antiflood_in_seconds'] = "segundos";
$lang['vsoverview_info_antiflood_points_per_tick'] = "Puntos por tick";
$lang['vsoverview_conn_total_head'] = "Total";
$lang['vsoverview_conn_total_packets'] = "paquetes";
$lang['vsoverview_conn_total_bytes'] = "bytes";
$lang['vsoverview_conn_total_send'] = "enviados";
$lang['vsoverview_conn_total_received'] = "recividos";
$lang['vsoverview_conn_bandwidth_head'] = "Ancho de banda";
$lang['vsoverview_conn_bandwidth_last'] = "último";
$lang['vsoverview_conn_bandwidth_second'] = "segundo";
$lang['vsoverview_conn_bandwidth_minute'] = "minuto";
$lang['vsoverview_conn_bandwidth_send'] = "enviados";
$lang['vsoverview_conn_bandwidth_received'] = "recividos";


// vServer Token
$lang['vstoken_token_virtualserver'] = "Servidor Virtual";
$lang['vstoken_token_head'] = "Token";
$lang['vstoken_token_type'] = "Tipo de grupo";
$lang['vstoken_token_id1'] = "Grupo del servidor/<br />Grupo del canal";
$lang['vstoken_token_id2'] = "(Canal)";
$lang['vstoken_token_tokencode'] = "Codigo Token";
$lang['vstoken_token_delete'] = "Eliminar";

$lang['vstoken_new_head'] = "Crear nuevo token";
$lang['vstoken_new_create'] = "Generar";
$lang['vstoken_new_tokentype'] = "Tipo de token:";
$lang['vstoken_new_servergroup'] = "Grupo del servidor";
$lang['vstoken_new_channelgroup'] = "Grupo del Canal";
$lang['vstoken_new_select_group'] = "Selección de grupo";
$lang['vstoken_new_select_channelgroup'] = "Selección del canal de grupo";
$lang['vstoken_new_select_channel'] = "Canal";

$lang['vstoken_new_tokentype_0'] = "Servidor";
$lang['vstoken_new_tokentype_1'] = "Canal";

$lang['vstoken_new_added_ok'] = "Token generado.";


// vServer Liveview
$lang['vsliveview_server_virtualserver'] = "Servidor virtual";
$lang['vsliveview_server_head'] = "Vista en linea";

$lang['vsliveview_liveview_enable_autorefresh'] = "Autorefrescar";

$lang['vsliveview_liveview_tooltip_to_channel'] = "al canal #";
$lang['vsliveview_liveview_tooltip_switch'] = "Mover";
$lang['vsliveview_liveview_tooltip_send_msg'] = "Enviar mensaje";
$lang['vsliveview_liveview_tooltip_poke'] = "Poke";
$lang['vsliveview_liveview_tooltip_kick'] = "Kick";
$lang['vsliveview_liveview_tooltip_ban'] = "Ban";

$lang['vsoverview_banlist_head'] = "Lista de Baneados";
$lang['vsoverview_banlist_id'] = "ID #";
$lang['vsoverview_banlist_ip'] = "IP";
$lang['vsoverview_banlist_name'] = "Nombre";
$lang['vsoverview_banlist_uid'] = "ID único";
$lang['vsoverview_banlist_reason'] = "Razon";
$lang['vsoverview_banlist_created'] = "creado";
$lang['vsoverview_banlist_duration'] = "Duración";
$lang['vsoverview_banlist_end'] = "termina";
$lang['vsoverview_banlist_unlimited'] = "ilimitado";
$lang['vsoverview_banlist_never'] = "Nunca";

$lang['vsoverview_banlist_new_head'] = "Crear ban";
$lang['vsoverview_banlist_new_create'] = "crear";

$lang['vsliveview_channelbackup_head'] = "Copia seguridad";
$lang['vsliveview_channelbackup_get'] = "Crear y descargar";
$lang['vsliveview_channelbackup_load'] = "Subir copia de seguridad";
$lang['vsliveview_channelbackup_load_submit'] = "Regenerar";

$lang['vsliveview_channelbackup_new_added_ok'] = "Copia de seguridad regenerada correctamente.";



// Counter
$lang['time_day']     = "dia";
$lang['time_days']    = "dias";
$lang['time_hour']    = "hora";
$lang['time_hours']   = "horas";
$lang['time_minute']  = "minuto";
$lang['time_minutes'] = "minutos";
$lang['time_second']  = "segundo";
$lang['time_seconds'] = "segundos";



// Error numbers
$lang['e_2568'] = "No tienes permisos suficientes.";
$lang['temp_folder_not_writable'] = "La carpeta de plantillas (%s) no tiene permisos de escritura.";
?>