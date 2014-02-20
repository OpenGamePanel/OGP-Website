<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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

$lang['game_monitor'] = "Monitor";
$lang['game_manager'] = "Gestion";
$lang['no_games_to_monitor'] = "No hay ningun juego que monitorear.";

// game_manager.php
$lang['fail_no_mods'] = "No hay ningun mod asignado en su cuenta.";
$lang['no_game_homes_assigned'] = "No hay ninguna home asignada a su cuenta.";
$lang['select_game_home_to_configure'] = "Seleccione el juego que desee configurar";
$lang['file_manager'] = "Editar texto";
$lang['configure_mods'] = "Configurar mods";
$lang['install_update_steam'] = "Instalar/Actualizar via Steam";
$lang['install_update_manual'] = "Instalar/Actualizar manualmente";
$lang['assign_game_homes'] = "Asignar home";
$lang['user'] = "Usuario";
$lang['group'] = "Grupo";

// start_game.php
$lang['ogp_agent_ip'] = "IP del agente OGP";
$lang['max_players'] = "Maximo de jugadores";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP y Puerto";
$lang['available_maps'] = "Mapas disponibles";
$lang['map_path'] = "Ruta de mapas";
$lang['available_parameters'] = "Parametros disponibles";
$lang['start_server'] = "Iniciar servidor";
$lang['start_wait_note'] = "El inicio del servidor se puede demorar, no cierre el navegador hasta que termine el proceso.";
$lang['game_type'] = "Tipo de juego";
$lang['map'] = "Map";
$lang['starting_server'] = "Iniciando el servidor, por favor espere...";
$lang['starting_server_settings'] = "Iniciando con los parametros de ";
$lang['startup_params'] = "Parametros de arranque";
$lang['startup_cpu'] = "CPU en la que corre el servidor";
$lang['startup_nice'] = "Valor de NICE";
$lang['game_home'] = "Home";
$lang['server_started'] = "Servidor iniciado.";
$lang['no_parameter_access'] = "No tiene acceso a parametros.";
$lang['extra_parameters'] = "Parametros Extra";
$lang['no_extra_param_access'] = "No tiene acceso a parametros extra.";
$lang['extra_parameters_info'] = "Estos paramentros se incluiran al final de la linea de comandos de arranque del servidor.";
$lang['game_exec_not_found'] = "El ejecutable %s no se pudo encontrar en el servidor remoto.";
$lang['select_params_and_start'] = "Selecciona los parametros y presiona '%s'.";
$lang['no_ip_port_pairs_assigned'] = "No hay ningun puerto para la ip asignada al servidor. Contacte con el administrador.";
$lang['unable_to_get_log'] = "Imposible capturar los logs, reintento en %s.";
$lang['ip_port_pair_not_owned'] = "El par IP:PUERTO no es de su propiedad.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Valor maxplayers inadecuado, el número máximo alcanzable de slots se ha establecido.";
$lang['server_running_not_responding'] = "El servidor esta en marcha, pero no responde,<br>podria haber algún tipo de problema y quiza useted quiera ";
$lang['failed_querying_server'] = "* Falló la petición al servidor.";
$lang['query_protocol_not_supported'] = "* No hay ningún protocolo de peticiones en OGP que pueda soportar este servidor.";
$lang['queries_disabled_by_setting_disable_queries_after'] = "Peticiones desactivadas por opción: Desactivar peticiones a los servidores si son mas de: %s, desde que tiene %s servidores.<br>";

// update_game.php
$lang['update_started'] = "Actualización iniciada, espere...";
$lang['failed_to_start_steam_update'] = "Fallo la actualización de Steam. Compruebe los logs.";
$lang['failed_to_start_rsync_update'] = "Fallo la actualización de Rsync. Compruebe los logs.";
$lang['update_completed'] = "Actualización completa.";
$lang['update_in_progress'] = "Actualización en progreso, espere...";
$lang['refresh_steam_status'] = "Refrescar estado de Steam";
$lang['refresh_rsync_status'] = "Refrescar estado de Rsync";
$lang['stop_update'] = "Parar actualización";
$lang[''] = "";
$lang[''] = "";

// game_monitor.php
$lang['statistics'] = "Estadísticas";
$lang['servers'] = "Servidores";
$lang['players'] = "Jugadores";
$lang['current_map'] = "Mapa actual";
$lang['stop_server'] = "Parar servidor";
$lang['server_ip_port'] = "IP:Puerto";
$lang['port'] = "Puerto";
$lang['server_name'] = "Nombre del servidor";
$lang['player_name'] = "Nombre del jugador";
$lang['score'] = "Puntuacion";
$lang['time'] = "Tiempo";
$lang['no_rights_to_stop_server'] = "No tiene permisos para parar el servidor.";
$lang['no_ogp_lgsl_support'] = "Este servidor (Corriendo: %s) no tiene soporte LGSL  en OGP y sus estadisticas no se pueden mostrar.";
$lang['server_status'] = "Servidor en %s esta %s.";
$lang['status'] = "Estado";
$lang['server_stopped'] = "El servidor '%s' fue detenido.";
$lang['if_want_to_start_homes'] = "Sí desea iniciar el servidor vaya a %s.";
$lang['view_log'] = "Logs";
$lang['start'] = "Iniciar Servidor";
$lang['server_running_cant_update'] = "No se puede actualizar el juego mientras esté en marcha.";
$lang['if_want_manage'] = "Sí desea administrar sus juegos se puede hacer en el";
$lang['columns'] = "columnas";
$lang['group_users'] = "Usuarios del grupo:";
$lang['restart_server'] = "Reiniciar Servidor";
$lang['restarting_server'] = "Reiniciando el servidor, por favor espere...";
$lang['server_restarted'] = "El servidor '%s' fue reiniciado.";
$lang['server_not_running'] = "El servidor no está en marcha.";
$lang['address'] = "Direccion";
$lang['owner'] = "Propietario";
$lang['operations'] = "Operaciones";
$lang['search'] = "Busqueda";
$lang['maps_read_from'] = "Mapas leidos desde ";
$lang['file'] = "el archivo";
$lang['folder'] = "la carpeta";
$lang['addons'] = "Añadidos";
$lang['update_from_local_master_server'] = "Actualizar desde servidor maestro local.";
$lang['directory'] = "la carpeta";
$lang['execute_selected_server_operations'] = "Ejecutar operaciones del servidor seleccionadas";
$lang['execute_operations'] = "Ejecutar operaciones";
$lang['account_expiration'] = "Caducidad de su cuenta";
$lang['mysql_databases'] = "MySQL Databases";

$lang["server_binary_not_executable"] = "El archivo binario no es ejecutable.";
$lang["server_not_running_log_found"] = "No se encontro el log.";
$lang["xml_steam_error"] = "error XML de steam";
$lang["mod_key_not_found_from_xml"] = "No se encontro mod_key en el XML";
$lang["unable_retrieve_mod_info"] = "Imposible recuperar la informacion sobre el mod.";
$lang["unexpected_result_libremote"] = "Respuesta inesperada del servidor remoto.";
$lang["unable_get_info"] = "Imposible recuperar la informacion";
$lang["server_already_running"] = "El servidor esta en marcha.";
$lang["already_running_stop_server"] = "Parar el servidor.";
$lang["error_server_already_running"] = "Error, el servidor esta en marcha.";
$lang["failed_start_server_code"] = "Fallo al arrancar el servidor, codigo %s";
$lang["disabled"] = "Deshabilitado";
$lang["not_found_server"] = "Servidor no encontrado";
$lang["rcon_command_title"] = "Comandos RCON";
$lang["has_sent_to"] = "se envió a";
$lang["need_set_remote_pass"] = "Necesita configurar el password RCON";
$lang["before_sending_rcon_com"] = "antes de enviar comandos RCON";
$lang["agent_offline"] = "Agente fuera de servicio.";
$lang["retry"] = "Reintento";
$lang["page"] = "Pagina";
$lang["server_cant_start"] = "El servidor no pudo iniciarse.";
$lang["server_cant_stop"] = "El servidor no pudo detenerse.";
$lang["error_occured_remote_host"] = "Ocurrio un error en el servidor remoto.";
$lang["follow_server_status"] = "Seguir el estado del servidor"; 
$lang["hostname"] = "Nombre";
$lang["rsync_install"] = "[Instalación Rsync]"; 
$lang["ping"] = "ping";
$lang["team"] = "equipo";
$lang["deaths"] = "muertes";
$lang["pid"] = "pid";
$lang["skill"] = "nivel";
$lang["AIBot"] = "AIBot";
$lang["player"] = "jugador";
$lang['rcon_presets'] = "RCON preestablecidas";
$lang['update_from_local_master_server'] = "Actualizar desde servidor maestro local.";

// rcon_presets.php
$lang["presets_for_game_and_mod"] = "Comandos RCON para %s con mod %s";
$lang["name"] = "Nombre";
$lang["command"] = "Comando&nbsp;RCON";
$lang["add_preset"] = "Añadir comando";
$lang['edit_presets'] = "Editar comandos preestablecidos";
$lang["del_preset"] = "Borrar";
$lang["change_preset"] = "Cambiar";
$lang["send_command"] = "Enviar comando";

//rsync_install.php
$lang['starting_copy_with_master_server_named'] = "Iniciando la copia de archivos desde el servidor maestro llamado '%s'...";
$lang['starting_sync_with'] = "Iniciando sincronización de archivos con %s...";
$lang['refresh_interval'] = "Intervalo de refresco";

//update_server_manual.php
$lang['finished_manual_update'] = "Actualización manual terminada.";
$lang['failed_to_start_file_download'] = "Fallo al iniciar la descarga.";
$lang['game_name'] = "Nombre de juego";
$lang['dest_dir'] = "directorio de destino";
$lang['remote_server'] = "Servidor remoto";
$lang['file_url'] = "URL del archivo";
$lang['file_url_info'] = "La direccion URL del archivo a descargar y descomprimir en el directorio.";
$lang['one_dir_down'] = "Bajar una carpeta antes de extraer";
$lang['dest_filename'] = "Nombre del archivo de destino";
$lang['dest_filename_info'] = "Nombre completo con el que se va a guardar el archivo.";
$lang['update_server'] = "Actualizar servidor";
$lang['unavailable'] = "No disponible";
?>