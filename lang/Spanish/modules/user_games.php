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

define('add_mods_note', "Usted necesita agregar mods después de agregar el servidor al usuario.<br>Esto se puede hacer mediante la edición del servidor.");
define('game_servers', "Servidores de Juegos");
define('game_path', "Carpeta del juego");
define('game_path_info', "Ejemplo: /home/ogp/my_server/");
define('game_server_name_info', "Ayuda a identificar el servidor.");
define('control_password', "RCON");
define('control_password_info', "Esta contraseña se usa para el control del servidor, en algunos casos se utiliza para RCON, o como contraseña de serveradmin en TS3. Si la contraseña esta vacía algunas funciones podrían no estar disponibles.");
define('add_game_home', "Agregar Home");
define('game_path_empty', "La direccion de la carpeta del juego no puede dejarse en blanco.");
define('game_home_added', "Home agregada, redireccionando a edicion de home.");
define('failed_to_add_home_to_db', "Error al agregar el home a la base de datos. Error: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Peligro!</b> El agente esta inaccesible, no se pude detectar el SO ni la arquitectura,<br> Mostrando los servidores para todas las plataformas:");
define('select_remote_server', "Seleccione Servidor Remoto:");
define('no_remote_servers_configured', "No hay servidores remotos configurados");
define('no_game_configurations_found', "No se encontraron configuraciones XML");
define('game_configurations', "Configuraciones de juegos");
define('add_remote_server', "Agregar Servidor remoto");
define('wine_games', "Juegos Wine");
define('home_path', "Carpeta Home");
define('change_home_info', "Ejemplo: /home/ogp_agent/mi_servidor/");
define('game_server_name', "Nombre del servidor");
define('change_name_info', "Este nombre ayuda a identificar el servidor.");
define('game_control_password', "Contraseña de control");
define('change_control_password_info', "La contraseña de control es por ejemplo rcon password.");
define('available_mods', "Mods disponibles");
define('note_no_mods', "Este home no tiene mods asignados.");
define('change_home', "Cambiar Home");
define('change_control_password', "Cambiar RCON");
define('change_name', "Cambiar nombre");
define('add_mod', "Agregar Mod");
define('set_ip', "Asignar IP");
define('ips_and_ports', "IPs y Puertos");
define('mod_name', "Nombre del Mod");
define('max_players', "Max Jugadores");
define('extra_cmd_line_args', "Comandos de lanzamiento extra");
define('extra_cmd_line_info', "Permite añadir comandos nuevos a la linea de comandos de arranque.");
define('cpu_affinity', "Afinidad de CPU");
define('nice_level', "Nivel de Prioridad");
define('set_options', "Cambiar opciones");
define('remove_mod', "Borrar");
define('mods', "Mods");
define('ip', "IP");
define('port', "Puerto");
define('no_ip_ports_assigned', "Se deben asignar una IP y un puerto como minimo.");
define('successfully_assigned_ip_port', "Asignados IP:Puerto al home.");
define('port_range_error', "Los puertos deben pertenecer al rango entre 0 y 65535. En Linux, solo root puede usar puertos por debajo de 1024, por lo que el agente no será capaz de iniciar ningún servidor que use un puerto inferior a 1024.");
define('failed_to_assing_mod_to_home', "No se pudo asignar el mod %d al home.");
define('successfully_assigned_mod_to_home', "Se asigno el mod con id %d al home.");
define('successfully_modified_mod', "La informacion del mod ha sido modificada correctamente.");
define('back_to_game_monitor', "Volver a Monitor");
define('back_to_game_servers', "Volver a Servirdores de Juegos");
define('user_id_main', "Propietário principal");
define('change_user_id_main', "Cambiar propietário principal");
define('change_user_id_main_info', "Propietario principal del servidor de juegos.");
define('server_ftp_password', "Contraseña FTP");
define('change_ftp_password', "Cambiar la contraseña FTP");
define('change_ftp_password_info', "Esta es la contraseña para entrar al servidor FTP de este servidor de juegos.");
define('Delete_old_user_assigned_homes', "Quitar el servidor a los usuarios actuales.");
define('editing_home_called', "Editando el servidor llamado");
define('control_password_updated_successfully', "password RCON actualizado correctamente.");
define('control_password_update_failed', "No se pudo cambiar la RCON");
define('successfully_changed_game_server', "Opciones cambiadas correctamente.");
define('error_ocurred_on_remote_server', "Ocurrio un error en el servidor remoto.");
define('ftp_password_can_not_be_changed', "No se pudo cambiar el password FTP.");
define('ftp_can_not_be_switched_on', "No se pudo activar el FTP.");
define('ftp_can_not_be_switched_off', "No se pudo desactivar el FTP.");
define('invalid_home_id_entered', "Introdujo un identificador incorrecto");
define('ip_port_already_in_use', "El par de IP y puerto esta en uso.");
define('successfully_assigned_ip_port_to_server_id', "Se asigno el par IP:Puerto %s:%s al servidor ID %s.");
define('no_ip_addresses_configured', "No hay direcciones IP assignadas.");
define('server_page', "Pagina del servidor");
define('successfully_removed_mod', "Mod eliminado.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Peligro, Agente inaccesible, el computo de CPU's se ajusto a 1.");
define('mod_install_cmds', "Comandos de instalación");
define('cmds_for', "Comandos para");
define('preinstall_cmds', "Comandos preinstalación");
define('postinstall_cmds', "Comandos postinstalación");
define('edit_preinstall_cmds', "Editar comandos de preinstalación");
define('edit_postinstall_cmds', "Editar comandos de postinstalación");
define('save_as_default_for_this_mod', "Guardar por defecto para este mod");
define('empty', "vacío");
define('master_server_for_clon_update', "Servidor maestro para actualización local");
define('set_as_master_server', "Asignar como servidor maestro");
define('set_as_master_server_for_local_clon_update', "Configurar como servidor maestro para actualización local.");
define('only_available_for', "Solo estará disponible para servidores de '%s' alojados en el servidor remoto llamado '%s'.");
define('ftp_on', "Activar FTP");
define('ftp_off', "Desactivar FTP");
define('change_ftp_account_status', "Cambiar estado del FTP");
define('change_ftp_account_status_info', "Una vez que una cuenta FTP está habilitada o deshabilitada, se agrega o se elimina de la base de datos del FTP.");
define('server_ftp_login', "Usuário FTP");
define('change_ftp_login_info', "Cambie el nombre de usuário FTP por uno a su elección.");
define('change_ftp_login', "Cambiar usuário FTP");
define('ftp_login_can_not_be_changed', "No se pudo cambiar el usuário FTP.");
define('server_is_running_change_addresses_not_available', "El servidor está en marcha, la IP no puede ser cambiada.");
define('change_game_type', "Cambiar tipo de juego");
define('change_game_type_info', "Al cambiar el tipo de juego actual se eliminará la configuración de los mods.");
define('force_mod_on_this_address', "Forzar mod en esta dirección");
define('successfully_assigned_mod_to_address', "Asignado mod a la dirección correctamente");
define('switch_mods', "Cambiar mods");
define('switch_mod_for_address', "Cambiar mod para la dirección %s");
define('invalid_path', "Ruta no valida");
define('add_new_game_home', "Crear nueva Home");
define('no_game_homes_found', "No se encontraron Homes");
define('available_game_homes', "Homes disponibles");
define('home_id', "Home ID");
define('game_server', "Servidor");
define('game_type', "Tipo de juego");
define('game_home', "Servidor de juego");
define('game_home_name', "Nombre del Home");
define('clone', "Clonar");
define('unassign', "Quitar");
define('access_rights', "Derechos de acceso");
define('assigned_homes', "Homes asignadas actualmente");
define('assign', "Asignar");
define('allow_updates', "Permitir actualizar");
define('allow_updates_info', "Permite al usuario lanzar una actualizacion si cabe.");
define('allow_file_management', "Permitir explorar archivos");
define('allow_file_management_info', "Permite que el usuario modifique archivos a traves del modulo de gestion de archivos");
define('allow_parameter_usage', "Permitir comandos personalizados");
define('allow_parameter_usage_info', "Permite el uso de comandos personalizados en el arranque.");
define('allow_extra_params', "Permite parametros extra");
define('allow_extra_params_info', "Permite incorporar parameteros extra.");
define('allow_ftp', "Permite FTP");
define('allow_ftp_info', "Muestra al usuario el acceso al FTP.");
define('allow_custom_fields', "Permite campos personalizados");
define('allow_custom_fields_info', "Permite que el usuario pueda editar los campos personalizados.");
define('select_home', "Seleccionar Home para asignar");
define('assign_new_home_to_user', "Asignar nueva Home al usuario %s");
define('assign_new_home_to_group', "Asignar nueva Home al grupo %s");
define('assigned_home_to_user', "Asignado el home (ID: %d) al usuario %s.");
define('assigned_home_to_group', "Asignado el home (ID: %d) al grupo %s.");
define('unassigned_home_from_user', "Quitado el home (ID: %d) del usuario %s.");
define('unassigned_home_from_group', "Quitado el home (ID: %d) del grupo %s.");
define('no_homes_assigned_to_user', "No se asigno home al usuario %s.");
define('no_homes_assigned_to_group', "No se asigno home al grupo %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "No hay mas servidores disponibles para asignar a este usuario");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "No hay mas servidores disponibles para asignar a este grupo");
define('you_can_add_a_new_game_server_from', "Puede añadir mas servidores desde %s");
define('no_remote_servers_available_please_add_at_least_one', "Por favor, agregue almenos un servidor remoto.");
define('cloning_of_home_failed', "Error clonando el home con id '%s'.");
define('no_mods_to_clone', "No tiene mod(s) para este juego aun. Ninguno sera clonado.");
define('failed_to_add_mod', "Error al agregar mod con id '%s' al home con id '%s'.");
define('failed_to_update_mod_settings', "Error al actualizar las opciones del mod para el home con id '%s'.");
define('successfully_cloned_mods', "Mods correctamente clonados para el home con id '%s'.");
define('successfully_copied_home_database', "Base de datos copiada correctamente.");
define('copying_home_remotely', "Copiando el home en el servidor remoto '%s' a '%s'.");
define('cloning_home', "Clonando el mod llamado '%s'");
define('current_home_path', "Carpeta del home original");
define('current_home_path_info', "La carpeta actual del home a copiar al servidor remoto.");
define('clone_home', "Clonar Home");
define('new_home_name', "Nombre del Home de destino");
define('new_home_path', "Carpeta del Home de destino");
define('agent_ip', "IP del servidor de destino");
define('game_server_copy_is_running', "La copia esta en marcha.");
define('game_server_copy_was_successful', "La copia esta se completo satisfactoriamente.");
define('game_server_copy_failed_with_return_code', "La copia fallo y el codigo de error fue: %s");
define('clone_mods', "Clonar Mods.");
define('game_server_owner', "DueÃ±o del servidor.");
define('the_name_of_the_server_to_help_users_to_identify_it', "El nombre del servidor para ayudar a identificarlo.");
define('ips_and_ports_used_in_this_home', "Pares de IP:puerto usados en esta servidor");
define('note_ips_and_ports_are_not_cloned', "Nota: Las direcciones IP no se copiaran.");
define('mods_and_settings_for_this_game_server', "Mods y configuraciones para este servidor");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Esta seguro de eliminar el servidor con ID %s del servidor remoto en %s y en el directorio %s");
define('yes_and_delete_the_files', "Si, y eliminar los archivos y directorios tambien.");
define('failed_to_remove_gamehome_from_database', "No se pudo eliminar el servidor de la base de datos.");
define('successfully_deleted_game_server_with_id', "Se elimino el servidor con ID %s.");
define('failed_to_remove_ftp_account_from_remote_server', "No se pudo eliminar la cuenta FTP del servidor remoto.");
define('remove_it_anyway', "Eliminar de todos modos");
define('sucessfully_deleted', "Eliminado correctamente.");
define('the_agent_had_a_problem_deleting', "El agente tuvo un problema al eliminar.");
define('connection_timeout_or_problems_reaching_the_agent', "Tiempo de espera agotado o problemas conectando con el agente.");
define('does_not_exist_yet', "No existe todavia.");
define('go_to_custom_fields', "Ir a campos personalizados");
define('back_to_edit_server', "Volver a edición del servidor");
define('update_settings', "Actualizar configuración");
define('settings_updated', "Configuración actualizada.");
define('selected_path_already_in_use', "La carpeta seleccionada está en uso.");
define('browse', "Explorar");
define('cancel', "Cancelar");
define('set_this_path', "Seleccionar esta carpeta");
define('select_home_path', "Seleccionar carpeta inicial");
define('folder', "Carpeta");
define('owner', "Usuario");
define('group', "Grupo");
define('level_up', "Subir un nivel");
define('level_up_info', "Volver a la carpeta anterior.");
define('add_folder', "Añadir carpeta");
define('add_folder_info', "Escriba aquí el nombre para la nueva carpeta, después haga click sobre el icono.");
define('valid_user', "Por favor especifica un usuario valido.");
define('valid_group', "Por favor especifica un grupo valido.");
define('set_affinity', "Establecer afinidad del servidor");
define('cpu_affinity_info', "Seleccione los núcleo(s) de CPU que quiera asignar al servidor de juego.");
?>
