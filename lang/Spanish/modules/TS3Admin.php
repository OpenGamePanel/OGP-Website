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
define('OGP_LANG_title', "Interfaz Web del TeamSpeak 3");
define('OGP_LANG_update_available', "<h3>Atención: Una nueva version (v%1) de este software esta disponible en <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "Salir");
define('OGP_LANG_head_vserver_switch', "Cambiar");
define('OGP_LANG_head_vserver_overview', "Configurar");
define('OGP_LANG_head_vserver_token', "Gestiónar Token");
define('OGP_LANG_head_vserver_liveview', "Monitorizar");
define('OGP_LANG_e_fill_out', "Rellene los campos.");
define('OGP_LANG_e_upload_failed', "Fallo al subir el archivo.");
define('OGP_LANG_e_server_responded', "El servidor a respondido: ");
define('OGP_LANG_e_conn_serverquery', "No se pudo obtener acceso al servicio de peticiones.");
define('OGP_LANG_e_conn_vserver', "No se puede elegir el servido virtual.");
define('OGP_LANG_e_session_timedout', "Sesión caducada.");
define('OGP_LANG_js_error', "Error");
define('OGP_LANG_js_ajax_error', "Se ha producido un error AJAX: %1.");
define('OGP_LANG_js_confirm_server_stop', "Seguro que quieres parar el servidor #%1?");
define('OGP_LANG_js_confirm_server_delete', "Seguro que quiere eliminar el servidor #%1?");
define('OGP_LANG_js_notice_server_deleted', "El servidor %1 ha sido eliminado.");
define('OGP_LANG_js_prompt_banduration', "Duración en horas (0=ilimitado): ");
define('OGP_LANG_js_prompt_banreason', "Razón (opcional): ");
define('OGP_LANG_js_prompt_msg_to', "Mensaje de texto a %1 #%2: ");
define('OGP_LANG_js_prompt_poke_to', "Mensaje de Poke al cliente #%1: ");
define('OGP_LANG_js_prompt_new_propvalue', "Nuevo valor para '%1': ");
define('OGP_LANG_n_server_responded', "El servidor a respondido: ");
define('OGP_LANG_login_serverquery', "Ususario del Servidor de peticiones");
define('OGP_LANG_login_name', "Nombre de usuario");
define('OGP_LANG_login_password', "contraseña");
define('OGP_LANG_login_submit', "Entrar");
define('OGP_LANG_vsselect_headline', "Selección de servidor");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "Nombre");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Puerto");
define('OGP_LANG_vsselect_state', "Estado");
define('OGP_LANG_vsselect_clients', "Clientes");
define('OGP_LANG_vsselect_uptime', "Tiempo en linea");
define('OGP_LANG_vsselect_choose', "Seleccionar");
define('OGP_LANG_vsselect_start', "Iniciar");
define('OGP_LANG_vsselect_stop', "Parar");
define('OGP_LANG_vsselect_delete', "ELIMINAR");
define('OGP_LANG_vsselect_new_headline', "Crear un nuevo servidor virtual");
define('OGP_LANG_vsselect_new_servername', "Nombre del servidor");
define('OGP_LANG_vsselect_new_slots', "Slots de clientes");
define('OGP_LANG_vsselect_new_create', "Crear");
define('OGP_LANG_vsselect_new_added_ok', "servidor <span class=\"online\">%1</span> se ha creado.");
define('OGP_LANG_vsselect_new_added_generated', "El token generado es:");
define('OGP_LANG_vsoverview_virtualserver', "Servidor Virtual");
define('OGP_LANG_vsoverview_information_head', "Información");
define('OGP_LANG_vsoverview_connection_head', "Conexión");
define('OGP_LANG_vsoverview_info_general_head', "Configuración General");
define('OGP_LANG_vsoverview_info_servername', "Nombre de servidor");
define('OGP_LANG_vsoverview_info_host', "Host");
define('OGP_LANG_vsoverview_info_state', "Estado");
define('OGP_LANG_vsoverview_info_state_port', "Puerto");
define('OGP_LANG_vsoverview_info_uptime', "Tiempo en linea");
define('OGP_LANG_vsoverview_info_welcomemsg', "Mensaje<br />Bienvenida");
define('OGP_LANG_vsoverview_info_hostmsg', "Mensaje del Host");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "Consola");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "Ninguna");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "en el log del chat");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "Ventana");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "Ventana + Desconectar");
define('OGP_LANG_vsoverview_info_req_security', "Nivel de seguridad");
define('OGP_LANG_vsoverview_info_req_securitylvl', "Requerido");
define('OGP_LANG_vsoverview_info_hostbanner_head', "Cabecera Host");
define('OGP_LANG_vsoverview_info_hostbanner_url', "URL");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "URL de imagen");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "URL boton del host");
define('OGP_LANG_vsoverview_info_antiflood_head', "Anti-Flood");
define('OGP_LANG_vsoverview_info_antiflood_warning', "Aviso Activado");
define('OGP_LANG_vsoverview_info_antiflood_kick', "Kick Activado");
define('OGP_LANG_vsoverview_info_antiflood_ban', "Ban Activado");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "Duración Ban");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "Disminución");
define('OGP_LANG_vsoverview_info_antiflood_points', "puntos");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "segundos");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "Puntos por tick");
define('OGP_LANG_vsoverview_conn_total_head', "Total");
define('OGP_LANG_vsoverview_conn_total_packets', "paquetes");
define('OGP_LANG_vsoverview_conn_total_bytes', "bytes");
define('OGP_LANG_vsoverview_conn_total_send', "enviados");
define('OGP_LANG_vsoverview_conn_total_received', "recividos");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "Ancho de banda");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "último");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "segundo");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "minuto");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "enviados");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "recividos");
define('OGP_LANG_vstoken_token_virtualserver', "Servidor Virtual");
define('OGP_LANG_vstoken_token_head', "Token");
define('OGP_LANG_vstoken_token_type', "Tipo de grupo");
define('OGP_LANG_vstoken_token_id1', "Grupo del servidor/<br />Canal del grupo");
define('OGP_LANG_vstoken_token_id2', "(Canal)");
define('OGP_LANG_vstoken_token_tokencode', "Código Token");
define('OGP_LANG_vstoken_token_delete', "Borrar");
define('OGP_LANG_vstoken_new_head', "Crear nuevo token");
define('OGP_LANG_vstoken_new_create', "Generar");
define('OGP_LANG_vstoken_new_tokentype', "Tipo de token:");
define('OGP_LANG_vstoken_new_servergroup', "Grupo del servidor");
define('OGP_LANG_vstoken_new_channelgroup', "Grupo del Canal");
define('OGP_LANG_vstoken_new_select_group', "Selección de grupo");
define('OGP_LANG_vstoken_new_select_channelgroup', "Selección del canal de grupo");
define('OGP_LANG_vstoken_new_select_channel', "Canal");
define('OGP_LANG_vstoken_new_tokentype_0', "Servidor");
define('OGP_LANG_vstoken_new_tokentype_1', "Canal");
define('OGP_LANG_vstoken_new_added_ok', "Token generado.");
define('OGP_LANG_vsliveview_server_virtualserver', "Servidor virtual");
define('OGP_LANG_vsliveview_server_head', "Vista en Vivo");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "Autorefrescar");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "al canal #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "Mover");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "Enviar mensaje");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "Meter");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "Expulsar");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "Ban");
define('OGP_LANG_vsoverview_banlist_head', "Lista de Baneados");
define('OGP_LANG_vsoverview_banlist_id', "ID #");
define('OGP_LANG_vsoverview_banlist_ip', "IP");
define('OGP_LANG_vsoverview_banlist_name', "Nombre");
define('OGP_LANG_vsoverview_banlist_uid', "ID único");
define('OGP_LANG_vsoverview_banlist_reason', "Razon");
define('OGP_LANG_vsoverview_banlist_created', "Creado");
define('OGP_LANG_vsoverview_banlist_duration', "Duración");
define('OGP_LANG_vsoverview_banlist_end', "Termina");
define('OGP_LANG_vsoverview_banlist_unlimited', "ilimitado");
define('OGP_LANG_vsoverview_banlist_never', "Nunca");
define('OGP_LANG_vsoverview_banlist_new_head', "Crear ban");
define('OGP_LANG_vsoverview_banlist_new_create', "Crear");
define('OGP_LANG_vsliveview_channelbackup_head', "Respaldar Canal");
define('OGP_LANG_vsliveview_channelbackup_get', "Crear y Descargar");
define('OGP_LANG_vsliveview_channelbackup_load', "Subir Respaldo del Canal");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "Recrear");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "Respaldo del canal realizado correctamente.");
define('OGP_LANG_time_day', "dia");
define('OGP_LANG_time_days', "dias");
define('OGP_LANG_time_hour', "hora");
define('OGP_LANG_time_hours', "horas");
define('OGP_LANG_time_minute', "minuto");
define('OGP_LANG_time_minutes', "minutos");
define('OGP_LANG_time_second', "segundo");
define('OGP_LANG_time_seconds', "segundos");
define('OGP_LANG_e_2568', "No tienes permisos suficientes.");
define('OGP_LANG_temp_folder_not_writable', "La descarga no pudo completarse porque Apache no tiene permisos de escritura en la carpeta de archivos temporales del sistema(%s).");
define('OGP_LANG_unassign_from_subuser', "Desasignar del subusuario.");
define('OGP_LANG_assign_to_subuser', "Asignar al subusuario.");
define('OGP_LANG_select_subuser', "Selecciona subusuario.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "No tienes servidores asignados a tu cuenta.");
define('OGP_LANG_change_virtual_server', "Cambiar servidor virtual");
define('OGP_LANG_change_remote_server', "Cambiar servidor remoto");
?>