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

define('game_manager', "Gestion");
define('no_games_to_monitor', "No hay ningun juego que monitorear.");

// game_manager.php
define('fail_no_mods', "No hay ningun mod asignado en su cuenta.");
define('no_game_homes_assigned', "No hay ninguna home asignada a su cuenta.");
define('select_game_home_to_configure', "Seleccione el juego que desee configurar");
define('file_manager', "Editar texto");
define('configure_mods', "Configurar mods");
define('install_update_steam', "Instalar/Actualizar via Steam");
define('install_update_manual', "Instalar/Actualizar manualmente");
define('assign_game_homes', "Asignar home");
define('user', "Usuario");
define('group', "Grupo");

// start_game.php
define('ogp_agent_ip', "IP del agente OGP");
define('max_players', "Maximo de jugadores");
define('max', "Max");
define('ip_and_port', "IP y Puerto");
define('available_maps', "Mapas disponibles");
define('map_path', "Ruta de mapas");
define('available_parameters', "Parametros disponibles");
define('start_server', "Iniciar servidor");
define('start_wait_note', "El inicio del servidor se puede demorar, no cierre el navegador hasta que termine el proceso.");
define('game_type', "Tipo de juego");
define('map', "Map");
define('starting_server', "Iniciando el servidor, por favor espere...");
define('starting_server_settings', "Iniciando con los parametros de ");
define('startup_params', "Parametros de arranque");
define('startup_cpu', "CPU en la que corre el servidor");
define('startup_nice', "Valor de NICE");
define('game_home', "Home");
define('server_started', "Servidor iniciado.");
define('no_parameter_access', "No tiene acceso a parametros.");
define('extra_parameters', "Parametros Extra");
define('no_extra_param_access', "No tiene acceso a parametros extra.");
define('extra_parameters_info', "Estos paramentros se incluiran al final de la linea de comandos de arranque del servidor.");
define('game_exec_not_found', "El ejecutable %s no se pudo encontrar en el servidor remoto.");
define('select_params_and_start', "Selecciona los parametros y presiona '%s'.");
define('no_ip_port_pairs_assigned', "No hay ningun puerto para la ip asignada al servidor. Contacte con el administrador.");
define('unable_to_get_log', "Imposible capturar los logs, reintento en %s.");
define('ip_port_pair_not_owned', "El par IP:PUERTO no es de su propiedad.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Valor maxplayers inadecuado, el número máximo alcanzable de slots se ha establecido.");
define('server_running_not_responding', "El servidor esta en marcha, pero no responde,<br>podria haber algún tipo de problema y quiza useted quiera ");
define('failed_querying_server', "* Falló la petición al servidor.");
define('query_protocol_not_supported', "* No hay ningún protocolo de peticiones en OGP que pueda soportar este servidor.");
define('queries_disabled_by_setting_disable_queries_after', "Peticiones desactivadas por opción: Desactivar peticiones a los servidores si son mas de: %s, desde que tiene %s servidores.<br>");

// update_game.php
define('update_started', "Actualización iniciada, espere...");
define('failed_to_start_steam_update', "Fallo la actualización de Steam. Compruebe los logs.");
define('failed_to_start_rsync_update', "Fallo la actualización de Rsync. Compruebe los logs.");
define('update_completed', "Actualización completa.");
define('update_in_progress', "Actualización en progreso, espere...");
define('refresh_steam_status', "Refrescar estado de Steam");
define('refresh_rsync_status', "Refrescar estado de Rsync");
define('stop_update', "Parar actualización");

// game_monitor.php
define('statistics', "Estadísticas");
define('servers', "Servidores");
define('players', "Jugadores");
define('current_map', "Mapa actual");
define('stop_server', "Parar servidor");
define('server_ip_port', "IP:Puerto");
define('port', "Puerto");
define('server_name', "Nombre del servidor");
define('player_name', "Nombre del jugador");
define('score', "Puntuacion");
define('time', "Tiempo");
define('no_rights_to_stop_server', "No tiene permisos para parar el servidor.");
define('no_ogp_lgsl_support', "Este servidor (Corriendo: %s) no tiene soporte LGSL  en OGP y sus estadisticas no se pueden mostrar.");
define('server_status', "Servidor en %s esta %s.");
define('status', "Estado");
define('server_stopped', "El servidor '%s' fue detenido.");
define('if_want_to_start_homes', "Sí desea iniciar el servidor vaya a %s.");
define('view_log', "Logs");
define('start', "Iniciar Servidor");
define('server_running_cant_update', "No se puede actualizar el juego mientras esté en marcha.");
define('if_want_manage', "Sí desea administrar sus juegos se puede hacer en el");
define('columns', "columnas");
define('group_users', "Grupo:");
define('assigned_to', "Asignado:");
define('restart_server', "Reiniciar Servidor");
define('restarting_server', "Reiniciando el servidor, por favor espere...");
define('server_restarted', "El servidor '%s' fue reiniciado.");
define('server_not_running', "El servidor no está en marcha.");
define('address', "Direccion");
define('owner', "Propietario");
define('operations', "Operaciones");
define('search', "Busqueda");
define('maps_read_from', "Mapas leidos desde ");
define('file', "el archivo");
define('folder', "la carpeta");
define('addons', "Añadidos");
define('update_from_local_master_server', "Actualizar desde servidor maestro local");
define('update_from_selected_rsync_server', "Update from selected rsync server");
define('directory', "la carpeta");
define('execute_selected_server_operations', "Ejecutar operaciones del servidor seleccionadas");
define('execute_operations', "Ejecutar operaciones");
define('account_expiration', "Caducidad de su cuenta");
define('mysql_databases', "MySQL Databases");
define("server_binary_not_executable", "El archivo binario no es ejecutable.");
define("server_not_running_log_found", "No se encontro el log.");
define("xml_steam_error", "error XML de steam");
define("mod_key_not_found_from_xml", "No se encontro mod_key en el XML");
define("unable_retrieve_mod_info", "Imposible recuperar la informacion sobre el mod.");
define("unexpected_result_libremote", "Respuesta inesperada del servidor remoto.");
define("unable_get_info", "Imposible recuperar la informacion");
define("server_already_running", "El servidor esta en marcha.");
define("already_running_stop_server", "Parar el servidor.");
define("error_server_already_running", "Error, el servidor esta en marcha.");
define("failed_start_server_code", "Fallo al arrancar el servidor, codigo %s");
define("disabled", "Deshabilitado");
define("not_found_server", "Servidor no encontrado");
define("rcon_command_title", "Comandos RCON");
define("has_sent_to", "se envió a");
define("need_set_remote_pass", "Necesita configurar el password RCON");
define("before_sending_rcon_com", "antes de enviar comandos RCON");
define("retry", "Reintento");
define("page", "Pagina");
define("server_cant_start", "El servidor no pudo iniciarse.");
define("server_cant_stop", "El servidor no pudo detenerse.");
define("error_occured_remote_host", "Ocurrio un error en el servidor remoto.");
define("follow_server_status", "Seguir el estado del servidor"); 
define("hostname", "Nombre");
define("rsync_install", "[Instalación Rsync]"); 
define("ping", "ping");
define("team", "equipo");
define("deaths", "muertes");
define("pid", "pid");
define("skill", "nivel");
define("AIBot", "Bot IA");
define("steamid", "Steam ID");
define("player", "jugador");
define('rcon_presets', "RCON preestablecidas");

// rcon_presets.php
define("presets_for_game_and_mod", "Comandos RCON para %s con mod %s");
define("name", "Nombre");
define("command", "Comando&nbsp;RCON");
define("add_preset", "Añadir comando");
define('edit_presets', "Editar comandos preestablecidos");
define("del_preset", "Borrar");
define("change_preset", "Cambiar");
define("send_command", "Enviar comando");

//rsync_install.php
define('starting_copy_with_master_server_named', "Iniciando la copia de archivos desde el servidor maestro llamado '%s'...");
define('starting_sync_with', "Iniciando sincronización de archivos con %s...");
define('refresh_interval', "Intervalo de refresco");

//update_server_manual.php
define('finished_manual_update', "Actualización manual terminada.");
define('failed_to_start_file_download', "Fallo al iniciar la descarga.");
define('game_name', "Nombre de juego");
define('dest_dir', "directorio de destino");
define('remote_server', "Servidor remoto");
define('file_url', "URL del archivo");
define('file_url_info', "La direccion URL del archivo a descargar y descomprimir en el directorio.");
define('dest_filename', "Nombre del archivo de destino");
define('dest_filename_info', "Nombre completo con el que se va a guardar el archivo.");
define('update_server', "Actualizar servidor");
define('unavailable', "No disponible");

//map image upload
define('upload_map_image', "Subir imagen del mapa");
define('upload_image', "Subir imagen");
define('jpg_gif_png_less_than_1mb', "La imagen tiene que ser jpg, gif o png y menor de 1 MB.");
define('check_dev_console', "Error subiendo el archivo, comprueba la consola de desarrollador del navegador.");
define('uploaded_successfully', "Subido correctamente.");
define('cant_create_folder', "No se puede crear la carpeta:<br><b>%s</b>");
define('cant_write_file', "No se puede escribir el archivo:<br><b>%s</b>");
define('exceeded_php_directive', "Excede la directiva PHP.<br><b>%s</b>.");
define('unknown_errors', "Error desconocido.");

// RCON
define('view_player_commands',"Ver Comandos De Jugadores");
define('hide_player_commands',"Ocultar Comandos De Jugadores");
define('no_online_players',"No hay jugadores en linea.");
?>