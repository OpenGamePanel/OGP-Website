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

define('error', "Error");
define('title', "TeamSpeak 3 Web Interface");
define('update_available', "<h3>Atención: Una nueva version (v%1) de este software esta disponible en <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('head_logout', "Salir");
define('head_vserver_switch', "Cambiar");
define('head_vserver_overview', "Configurar");
define('head_vserver_token', "Token Management");
define('head_vserver_liveview', "Monitorizar");
define('e_fill_out', "Rellene los campos.");
define('e_upload_failed', "Fallo al subir el archivo.");
define('e_server_responded', "El servidor a respondido: ");
define('e_conn_serverquery', "No se pudo obtener acceso al servicio de peticiones.");
define('e_conn_vserver', "No se puede elegir el servido virtual.");
define('e_session_timedout', "Sesión caducada.");
define('js_error', "Error");
define('js_ajax_error', "Error de Ajax. %1");
define('js_confirm_server_stop', "Seguro que quieres parar el servidor #%1?");
define('js_confirm_server_delete', "Seguro que quiere eliminar el servidor #%1?");
define('js_notice_server_deleted', "El servidor %1 ha sido eliminado.");
define('js_prompt_banduration', "Duración en horas (0=ilimitado): ");
define('js_prompt_banreason', "Razón (opcional): ");
define('js_prompt_msg_to', "Mensaje de texto para %1 #%2: ");
define('js_prompt_poke_to', "Mensaje Poke al cliente #%1: ");
define('js_prompt_new_propvalue', "Nuevo valor para '%1': ");
define('n_server_responded', "El servidor a respondido: ");
define('login_serverquery', "Ususario del Servidor de peticiones");
define('login_name', "Nombre de usuario");
define('login_password', "contraseña");
define('login_submit', "Entrar");
define('vsselect_headline', "Selección de servidor");
define('vsselect_id', "ID #");
define('vsselect_name', "Nombre");
define('vsselect_ip', "IP");
define('vsselect_port', "Puerto");
define('vsselect_state', "Estado");
define('vsselect_clients', "Clientes");
define('vsselect_uptime', "Tiempo en linea");
define('vsselect_choose', "Select");
define('vsselect_start', "Start");
define('vsselect_stop', "Stop");
define('vsselect_delete', "ELIMINAR");
define('vsselect_new_headline', "Crear un nuevo servidor virtual");
define('vsselect_new_servername', "Nombre del servidor");
define('vsselect_new_slots', "Client slots");
define('vsselect_new_create', "Crear");
define('vsselect_new_added_ok', "servidor <span class=\"online\">%1</span> se ha creado.");
define('vsselect_new_added_generated', "El token generado es:");
define('vsoverview_virtualserver', "Servidor Virtual");
define('vsoverview_information_head', "Información");
define('vsoverview_connection_head', "Conexión");
define('vsoverview_info_general_head', "Configuración General");
define('vsoverview_info_servername', "Nombre de servidor");
define('vsoverview_info_host', "Host");
define('vsoverview_info_state', "Estado");
define('vsoverview_info_state_port', "Puerto");
define('vsoverview_info_uptime', "Tiempo en linea");
define('vsoverview_info_welcomemsg', "Mensaje<br />Bienvenida");
define('vsoverview_info_hostmsg', "Mensaje del Host");
define('vsoverview_info_hostmsg_mode_output', "Consola");
define('vsoverview_info_hostmsg_mode_0', "Ninguna");
define('vsoverview_info_hostmsg_mode_1', "en el log del chat");
define('vsoverview_info_hostmsg_mode_2', "Ventana");
define('vsoverview_info_hostmsg_mode_3', "Ventana + Desconectar");
define('vsoverview_info_req_security', "Nivel de seguridad");
define('vsoverview_info_req_securitylvl', "Requerido");
define('vsoverview_info_hostbanner_head', "Cabecera Host");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "URL de imagen");
define('vsoverview_info_hostbanner_buttonurl', "URL boton del host");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Aviso Activado");
define('vsoverview_info_antiflood_kick', "Kick Activado");
define('vsoverview_info_antiflood_ban', "Ban Activado");
define('vsoverview_info_antiflood_banduration', "Duración Ban");
define('vsoverview_info_antiflood_decrease', "decrementar");
define('vsoverview_info_antiflood_points', "puntos");
define('vsoverview_info_antiflood_in_seconds', "segundos");
define('vsoverview_info_antiflood_points_per_tick', "Puntos por tick");
define('vsoverview_conn_total_head', "Total");
define('vsoverview_conn_total_packets', "paquetes");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "enviados");
define('vsoverview_conn_total_received', "recividos");
define('vsoverview_conn_bandwidth_head', "Ancho de banda");
define('vsoverview_conn_bandwidth_last', "último");
define('vsoverview_conn_bandwidth_second', "segundo");
define('vsoverview_conn_bandwidth_minute', "minuto");
define('vsoverview_conn_bandwidth_send', "enviados");
define('vsoverview_conn_bandwidth_received', "recividos");
define('vstoken_token_virtualserver', "Servidor Virtual");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Tipo de grupo");
define('vstoken_token_id1', "Server Group/<br />Channel Group");
define('vstoken_token_id2', "(Canal)");
define('vstoken_token_tokencode', "Token Code");
define('vstoken_token_delete', "Eliminar");
define('vstoken_new_head', "Crear nuevo token");
define('vstoken_new_create', "Generar");
define('vstoken_new_tokentype', "Tipo de token:");
define('vstoken_new_servergroup', "Grupo del servidor");
define('vstoken_new_channelgroup', "Grupo del Canal");
define('vstoken_new_select_group', "Selección de grupo");
define('vstoken_new_select_channelgroup', "Selección del canal de grupo");
define('vstoken_new_select_channel', "Canal");
define('vstoken_new_tokentype_0', "Servidor");
define('vstoken_new_tokentype_1', "Canal");
define('vstoken_new_added_ok', "Token generado.");
define('vsliveview_server_virtualserver', "Servidor virtual");
define('vsliveview_server_head', "Live View");
define('vsliveview_liveview_enable_autorefresh', "Autorefrescar");
define('vsliveview_liveview_tooltip_to_channel', "al canal #");
define('vsliveview_liveview_tooltip_switch', "Mover");
define('vsliveview_liveview_tooltip_send_msg', "Enviar mensaje");
define('vsliveview_liveview_tooltip_poke', "Poke");
define('vsliveview_liveview_tooltip_kick', "Kick");
define('vsliveview_liveview_tooltip_ban', "Ban");
define('vsoverview_banlist_head', "Lista de Baneados");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Nombre");
define('vsoverview_banlist_uid', "ID único");
define('vsoverview_banlist_reason', "Razon");
define('vsoverview_banlist_created', "Created");
define('vsoverview_banlist_duration', "Duración");
define('vsoverview_banlist_end', "Ends");
define('vsoverview_banlist_unlimited', "ilimitado");
define('vsoverview_banlist_never', "Nunca");
define('vsoverview_banlist_new_head', "Crear ban");
define('vsoverview_banlist_new_create', "crear");
define('vsliveview_channelbackup_head', "Channel Backup");
define('vsliveview_channelbackup_get', "Create and Download");
define('vsliveview_channelbackup_load', "Upload Channel Backup");
define('vsliveview_channelbackup_load_submit', "Recreate");
define('vsliveview_channelbackup_new_added_ok', "Channel Backup successful.");
define('time_day', "dia");
define('time_days', "dias");
define('time_hour', "hora");
define('time_hours', "horas");
define('time_minute', "minuto");
define('time_minutes', "minutos");
define('time_second', "segundo");
define('time_seconds', "segundos");
define('e_2568', "No tienes permisos suficientes.");
define('temp_folder_not_writable', "La descarga no pudo completarse porque Apache no tiene permisos de escritura en la carpeta de archivos temporales del sistema(%s).");
define('unassign_from_subuser', "Desasignar del subusuario.");
define('assign_to_subuser', "Asignar al subusuario.");
define('select_subuser', "Selecciona subusuario.");
?>