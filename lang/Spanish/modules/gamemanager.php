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

define('game_manager', "Gestión de Servidores");
define('no_games_to_monitor', "Actualmente no hay servidores de juegos instalados.");
define('status', "Estado");
define('fail_no_mods', "No hay ningún mod para este juego. Habla con el administrador del panel para que añada mod(s) para este juego");
define('no_game_homes_assigned', "No hay ninguna home asignada a su cuenta.");
define('select_game_home_to_configure', "Seleccione el juego que desee configurar");
define('file_manager', "Editar texto");
define('configure_mods', "Configurar mods");
define('install_update_steam', "Instalar/Actualizar via Steam");
define('install_update_manual', "Instalar/Actualizar manualmente");
define('assign_game_homes', "Asignar home");
define('user', "Usuario");
define('group', "Grupo");
define('start', "Iniciar");
define('ogp_agent_ip', "IP del Agente OGP");
define('max_players', "Jugadores máximos");
define('max', "Máximo");
define('ip_and_port', "IP y Puerto");
define('available_maps', "Mapas disponibles");
define('map_path', "Ruta de mapas");
define('available_parameters', "Parámetros disponibles");
define('start_server', "Iniciar servidor");
define('start_wait_note', "El encendido del servidor puede tomar un tiempo. Por favor, espere sin cerrar el navegador.");
define('game_type', "Tipo de juego");
define('map', "Mapa");
define('starting_server', "Iniciando el servidor, por favor espere...");
define('starting_server_settings', "Iniciando con los siguientes parámetros");
define('startup_params', "Parámetros de arranque");
define('startup_cpu', "CPU en la que corre el servidor");
define('startup_nice', "Valor de NICE");
define('game_home', "Servidor de Juego");
define('server_started', "Servidor iniciado correctamente.");
define('no_parameter_access', "No tienes acceso a parámetros");
define('extra_parameters', "Parámetros Extra");
define('no_extra_param_access', "No tiene acceso a parámetros extra.");
define('extra_parameters_info', "Estos parámetros se incluirán al final de la línea de comandos de arranque del servidor.");
define('game_exec_not_found', "El ejecutable %s no se pudo encontrar en el servidor remoto.");
define('select_params_and_start', "Selecciona los parámetros de inicio y presiona '%s'.");
define('no_ip_port_pairs_assigned', "No hay ningun puerto para la ip asignada al servidor. Contacte con el administrador.");
define('unable_to_get_log', "Imposible capturar los logs, reintento en %s.");
define('server_binary_not_executable', "El archivo binario no es ejecutable.");
define('server_not_running_log_found', "No se encontro el log.");
define('ip_port_pair_not_owned', "El par IP:PUERTO no es de su propiedad.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Valor maxplayers inadecuado, el número máximo alcanzable de slots se ha establecido.");
define('server_running_not_responding', "El servidor esta en marcha, pero no responde,<br>podría haber algún tipo de problema y quizá usted quiera ");
define('update_started', "Actualización iniciada, espere...");
define('failed_to_start_steam_update', "Fallo la actualización de Steam. Compruebe los logs.");
define('failed_to_start_rsync_update', "Fallo la actualización de Rsync. Compruebe los logs.");
define('update_completed', "Actualización completa.");
define('update_in_progress', "Actualización en progreso, espere...");
define('refresh_steam_status', "Refrescar estado de Steam");
define('refresh_rsync_status', "Refrescar estado de Rsync");
define('server_running_cant_update', "No se puede actualizar el juego mientras esté en marcha.");
define('xml_steam_error', "El juego seleccionado no soporta instalación/actualización de Steam");
define('mod_key_not_found_from_xml', "No se encontro mod_key en el XML");
define('stop_update', "Parar actualización");
define('statistics', "Estadisticas");
define('servers', "Servidores");
define('players', "Jugadores");
define('current_map', "Mapa actual");
define('stop_server', "Parar servidor");
define('server_ip_port', "IP:Puerto");
define('server_name', "Nombre del servidor");
define('player_name', "Nombre del jugador");
define('score', "Puntuacion");
define('time', "Tiempo");
define('no_rights_to_stop_server', "No tiene permisos para parar el servidor.");
define('no_ogp_lgsl_support', "Este servidor (Corriendo: %s) no tiene soporte LGSL  en OGP y sus estadisticas no se pueden mostrar.");
define('server_status', "Estado del Servidor");
define('server_stopped', "El servidor '%s' fue detenido.");
define('if_want_to_start_homes', "Sí desea iniciar el servidor vaya a %s.");
define('view_log', "Consola");
define('if_want_manage', "Sí desea administrar sus juegos lo puede hacer en el");
define('columns', "columnas");
define('group_users', "Grupo:");
define('assigned_to', "Asignado a:");
define('restart_server', "Reiniciar Servidor");
define('restarting_server', "Reiniciando el servidor, por favor espere...");
define('server_restarted', "El servidor '%s' fue reiniciado.");
define('server_not_running', "El servidor no está en marcha.");
define('address', "Dirección");
define('owner', "Propietario");
define('operations', "Operaciones");
define('search', "Búsqueda");
define('maps_read_from', "Mapas leidos desde ");
define('file', "el archivo");
define('folder', "Carpeta");
define('unable_retrieve_mod_info', "Imposible recuperar la informacion sobre el mod.");
define('unexpected_result_libremote', "Respuesta inesperada del servidor remoto.");
define('unable_get_info', "Imposible recuperar la informacion");
define('server_already_running', "El servidor está en marcha.");
define('already_running_stop_server', "Parar el servidor.");
define('error_server_already_running', "Error, el servidor está en marcha.");
define('failed_start_server_code', "Fallo al iniciar el servidor remoto. Código de error: %s");
define('disabled', "Deshabilitado");
define('not_found_server', "Servidor remoto no encontrado");
define('rcon_command_title', "Comandos RCON");
define('has_sent_to', "se envió a");
define('need_set_remote_pass', "Necesita configurar la contraseña RCON");
define('before_sending_rcon_com', "antes de enviar comandos RCON al servidor");
define('retry', "Reintentar");
define('page', "Página");
define('server_cant_start', "El servidor no pudo iniciarse.");
define('server_cant_stop', "El servidor no pudo detenerse.");
define('error_occured_remote_host', "Ocurrio un error en el servidor remoto.");
define('follow_server_status', "Puedes seguir el estado del servidor desde");
define('addons', "Añadidos");
define('hostname', "Nombre");
define('rsync_install', "[Instalación Rsync]");
define('ping', "Ping");
define('team', "Equipo");
define('deaths', "Muertes");
define('pid', "PID");
define('skill', "Habilidad");
define('AIBot', "Bot IA");
define('steamid', "Steam ID");
define('player', "Jugador");
define('port', "Puerto");
define('rcon_presets', "RCON preestablecidas");
define('update_from_local_master_server', "Actualizar desde servidor maestro local");
define('update_from_selected_rsync_server', "Actualizar desde el servidor rsync seleccionado");
define('execute_selected_server_operations', "Ejecutar operaciones del servidor seleccionadas");
define('execute_operations', "Ejecutar operaciones");
define('account_expiration', "Caducidad de su cuenta");
define('mysql_databases', "Bases de Datos MySQL");
define('failed_querying_server', "* Falló la petición al servidor.");
define('query_protocol_not_supported', "* No hay ningún protocolo de peticiones en OGP que pueda soportar este servidor.");
define('queries_disabled_by_setting_disable_queries_after', "Peticiones desactivadas por opción: Desactivar peticiones a los servidores si son mas de: %s, desde que tiene %s servidores.<br>");
define('presets_for_game_and_mod', "Comandos RCON para %s con mod %s");
define('name', "Nombre");
define('command', "Comando&nbsp;RCON");
define('add_preset', "Añadir comando");
define('edit_presets', "Editar comandos preestablecidos");
define('del_preset', "Borrar");
define('change_preset', "Cambiar");
define('send_command', "Enviar comando");
define('starting_copy_with_master_server_named', "Iniciando la copia de archivos desde el servidor maestro llamado '%s'...");
define('starting_sync_with', "Iniciando sincronización de archivos con %s...");
define('refresh_interval', "Intervalo de refresco");
define('finished_manual_update', "Actualización manual terminada.");
define('failed_to_start_file_download', "Falló la descarga.");
define('game_name', "Nombre del juego");
define('dest_dir', "Directorio de destino");
define('remote_server', "Servidor Remoto");
define('file_url', "URL del archivo");
define('file_url_info', "La direccion URL del archivo a descargar y descomprimir en el directorio.");
define('dest_filename', "Nombre del archivo de destino");
define('dest_filename_info', "Nombre completo con el que se va a guardar el archivo.");
define('update_server', "Actualizar servidor");
define('unavailable', "No disponible");
define('upload_map_image', "Subir imagen del mapa");
define('upload_image', "Subir imagen");
define('jpg_gif_png_less_than_1mb', "La imagen tiene que ser jpg, gif o png y menor de 1 MB.");
define('check_dev_console', "Error subiendo el archivo, comprueba la consola de desarrollador del navegador.");
define('uploaded_successfully', "Subido correctamente.");
define('cant_create_folder', "No se puede crear la carpeta:<br><b>%s</b>");
define('cant_write_file', "No se puede escribir el archivo:<br><b>%s</b>");
define('exceeded_php_directive', "Excede la directiva PHP.<br><b>%s</b>.");
define('unknown_errors', "Error desconocido.");
define('directory', "Directorio");
define('view_player_commands', "Ver comandos para jugadores");
define('hide_player_commands', "Ocultar comandos para jugadores");
define('no_online_players', "No hay jugadores en linea.");
define('invalid_game_mod_id', "ID de Juego/Mod inválido.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Usa el link de abajo para comprobar y actualizar automáticamente tu servidor vía Steam si es necesario.&nbsp; Puedes hacerlo usando un cronjob o iniciando el proceso manualmente.</p>");
define('auto_update_copy_me', "Copiar");
define('auto_update_copy_me_success', "Copiado!");
define('auto_update_copy_me_fail', "Fallo al copiar. Por favor copie manualmente el link");
define('get_steam_autoupdate_api_link', "Auto Update Link");
define('update_attempt_from_nonmaster_server', "El usuario %s intentó actualizar home_id %d desde un servidor no maestro. (ID Home: %d)");
define('attempting_nonmaster_update', "Está intentando actualizar este servidor desde un servidor no maestro.");
define('cannot_update_from_own_self', "La Actualización de servidor local no se puede ejecutar en un servidor maestro.");

?>
