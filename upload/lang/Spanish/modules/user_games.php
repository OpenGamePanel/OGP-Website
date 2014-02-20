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

// add_game_home.php
$lang['add_new_game_home'] = "Crear nueva Home";
$lang['add_mods_note'] = "Usted necesita agregar mods después de agregar el servidor al usuario.<br>Esto se puede hacer mediante la edición del servidor.";
$lang['game_server'] = "Servidor";
$lang['game_servers'] = "Servirdores de Juegos";
$lang['game_type'] = "Tipo de juego";
$lang['game_path'] = "Carpeta del juego";
$lang['game_path_info'] = "Ejemplo: /home/ogp/my_server/";
$lang['game_server_name'] = "Nombre del servidor de juegos";
$lang['game_server_name_info'] = "Ayuda a identificar el servidor.";
$lang['control_password'] = "RCON";
$lang['control_password_info'] = "RCON password";
$lang['add_game_home'] = "Agregar Home";
$lang['game_path_empty'] = "La direccion de la carpeta del juego no puede dejarse en blanco.";
$lang['game_home_added'] = "Home agregada, redireccionando a edicion de home.";
$lang['failed_to_add_home_to_db'] = "Error al agregar el home a la base de datos. Error: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Peligro!</b> El agente esta inaccesible, no se pude detectar el SO ni la arquitectura,<br> Mostrando los servidores para todas las plataformas:";
$lang['select_remote_server'] = "Seleccione Servidor Remoto:";
$lang["no_remote_servers_configured"] = "No hay servidores remotos configurados";
$lang["no_game_configurations_found"] = "No se encontraron configuraciones XML";
$lang["game_configurations"] = "Configuraciones de juegos";
$lang["add_remote_server"] = "Agregar Servidor remoto";
$lang["wine_games"] = "Juegos Wine";
$lang[''] = "";
$lang[''] = "";

// edit_games.php
$lang['home_path'] = "Carpeta Home";
$lang['change_home_info'] = "Example: /home/ogp/my_server/";
$lang['game_server_name'] = "Nombre del servidor";
$lang['change_name_info'] = "Este nombre ayuda a identificar el servidor.";
$lang['game_control_password'] = "RCON";
$lang['change_control_password_info'] = "rcon password.";
$lang['available_mods'] = "Mods disponibles";
$lang['note_no_mods'] = "Este home no tiene mods asignados.";
$lang['change_home'] = "Cambiar Home";
$lang['change_control_password'] = "Cambiar RCON";
$lang['change_name'] = "Cambiar nombre";
$lang['add_mod'] = "Agregar Mod";
$lang['set_ip'] = "Asignar IP";
$lang['ips_and_ports'] = "IPs y Puertos";
$lang['mod_name'] = "Nombre del Mod";
$lang['max_players'] = "Max Players";
$lang['extra_cmd_line_args'] = "Comandos de lanzamiento extra";
$lang['extra_cmd_line_info'] = "Permite añadir comandos nuevos a la linea de comandos de arranque.";
$lang['cpu_affinity'] = "Afinidad de CPU";
$lang['nice_level'] = "Nivel de Nice";
$lang['set_options'] = "Cambiar opciones";
$lang['remove_mod'] = "Borrar";
$lang['mods'] = "Mods";
$lang['ip'] = "IP";
$lang['port'] = "Puerto";
$lang['no_ip_ports_assigned'] = "Se deben asignar una IP y un puerto como minimo.";
$lang['successfully_assigned_ip_port'] = "Asignados IP:Puerto al home.";
$lang['port_range_error'] = "Puert entre 0 y 65535.";
$lang['failed_to_assing_mod_to_home'] = "No se pudo asignar el mod %d al home.";
$lang['successfully_assigned_mod_to_home'] = "Se asigno el mod con id %d al home.";
$lang['successfully_modified_mod'] = "La informacion del mod a sido modificada correctamente.";
$lang['back_to_game_monitor'] = "Volver a Monitor";
$lang['back_to_game_servers'] = "Volver a Servirdores de Juegos";
$lang['user_id_main'] = "Propietário principal";
$lang['change_user_id_main'] = "Cambiar propietário principal";
$lang['change_user_id_main_info'] = "Propietario principal del servidor de juegos.";
$lang['server_ftp_password'] = "Contraseña FTP";
$lang['change_ftp_password'] = "Cambiar la contraseña FTP";
$lang['change_ftp_password_info'] = "Esta es la contraseña para entrar al servidor FTP de este servidor de juegos.";
$lang['Delete_old_user_assigned_homes'] = "Quitar el servidor a los usuarios actuales.";
$lang['editing_home_called'] = "Editando el servidor llamado";
$lang["control_password_updated_successfully"] = "password RCON actualizado correctamente.";
$lang["control_password_update_failed"] = "No se pudo cambiar la RCON";
$lang["successfully_changed_game_server"] = "Opciones cambiadas correctamente.";
$lang["error_ocurred_on_remote_server"] = "Ocurrio un error en el servidor remoto.";
$lang["ftp_password_can_not_be_changed"] = "No se pudo cambiar el password FTP.";
$lang["ftp_can_not_be_switched_on"] = "No se pudo activar el FTP.";
$lang["ftp_can_not_be_switched_off"] = "No se pudo desactivar el FTP.";
$lang["invalid_home_id_entered"] = "Introdujo un identificador incorrecto";
$lang["ip_port_already_in_use"] = "El par de IP y puerto esta en uso.";
$lang["successfully_assigned_ip_port_to_server_id"] = "Se asigno el par IP:Puerto %s:%s al servidor ID %s.";
$lang["no_ip_addresses_configured"] = "No hay direcciones IP assignadas.";
$lang["server_page"] = "Pagina del servidor";
$lang["successfully_removed_mod"] = "Mod eliminado.";
$lang["warning_agent_offline_defaulting_CPU_count_to_1"] = "Peligro, Agente inaccesible, el computo de CPU's se ajusto a 1.";
$lang['mod_install_cmds'] = "Comandos de instalación";
$lang['cmds_for'] = "Comandos para";
$lang['preinstall_cmds'] = "Comandos preinstalación";
$lang['postinstall_cmds'] = "Comandos postinstalación";
$lang['edit_preinstall_cmds'] = "Editar comandos de preinstalación";
$lang['edit_postinstall_cmds'] = "Editar comandos de postinstalación";
$lang['save_as_default_for_this_mod'] = "Guardar por defecto para este mod";
$lang['empty'] = "vacío";
$lang['master_server_for_clon_update'] = "Servidor maestro para actualización local";
$lang['set_as_master_server'] = "Asignar como servidor maestro";
$lang['set_as_master_server_for_local_clon_update'] = "Configurar como servidor maestro para actualización local.";
$lang['only_available_for'] = "Solo estará disponible para servidores de '%s' alojados en el servidor remoto llamado '%s'.";
$lang['ftp_on'] = "Activar FTP";
$lang['ftp_off'] = "Desactivar FTP";
$lang['change_ftp_account_status'] = "Cambiar estado del FTP";
$lang['change_ftp_account_status_info'] = "Al activar o desactivar la cuenta esta es añadida o eliminada de la base de datos de Pure-FTPd.";
$lang['server_ftp_login'] = "Usuário FTP";
$lang['change_ftp_login_info'] = "Cambie el nombre de usuário FTP por uno a su elección.";
$lang['change_ftp_login'] = "Cambiar usuário FTP";
$lang['ftp_login_can_not_be_changed'] = "No se pudo cambiar el usuário FTP.";
$lang['server_is_running_change_addresses_not_available'] = "El servidor está en marcha, la IP no puede ser cambiada.";
$lang['change_game_type'] = "Cambiar tipo de juego";
$lang['change_game_type_info'] = "Al cambiar el tipo de juego actual se eliminará la configuración de los mods.";
$lang['force_mod_on_this_address'] = "Forzar mod en esta dirección";
$lang['successfully_assigned_mod_to_address'] = "Asignado mod a la dirección correctamente";
$lang['switch_mods'] = "Cambiar mods";
$lang['switch_mod_for_address'] = "Cambiar mod para la dirección %s";
$lang[''] = "";

// show_games.php
$lang['add_new_game_home'] = "Generar un nuevo home";
$lang['no_game_homes_found'] = "No se encontraron Homes";
$lang['available_game_homes'] = "Homes disponibles";
$lang['home_id'] = "Home ID";
$lang['game_server'] = "Servidor";
$lang['game_type'] = "Tipo de Juego";
$lang['game_home'] = "Home";
$lang['game_home_name'] = "Nombre del Home";
$lang['actions'] = "Acciones";
$lang['edit'] = "Editar";
$lang['clone'] = "Clonar";

// assign_games.php
$lang['unassign'] = "Quitar";
$lang['access_rights'] = "Derechos de acceso";
$lang['assigned_homes'] = "Homes asignadas actualmente";
$lang['assign'] = "Asignar";
$lang['allow_updates'] = "Permitir actualizar";
$lang['allow_updates_info'] = "Permite al usuario lanzar una actualizacion si cabe.";
$lang['allow_file_management'] = "Permitir explorar archivos";
$lang['allow_file_management_info'] = "Permite que el usuario modifique archivos a traves del modulo de gestion de archivos";
$lang['allow_parameter_usage'] = "Permitir comandos personalizados";
$lang['allow_parameter_usage_info'] = "Permite el uso de comandos personalizados en el arranque.";
$lang['allow_extra_params'] = "Permite parametros extra";
$lang['allow_extra_params_info'] = "Permite incorporar parameteros extra.";
$lang['allow_ftp'] = "Permite FTP";
$lang['allow_ftp_info'] = "Muestra al usuario el acceso al FTP.";
$lang['allow_custom_fields'] = "Permite campos personalizados";
$lang['allow_custom_fields_info'] = "Permite que el usuario pueda editar los campos personalizados.";
$lang['select_home'] = "Seleccionar Home para asignar";
$lang['assign_new_home_to_user'] = "Asignar nueva Home al usuario %s";
$lang['assign_new_home_to_group'] = "Asignar nueva Home al grupo %s";
$lang['assigned_home_to_user'] = "Asignado el home (ID: %d) al usuario %s.";
$lang['assigned_home_to_group'] = "Asignado el home (ID: %d) al grupo %s.";
$lang['unassigned_home_from_user'] = "Quitado el home (ID: %d) del usuario %s.";
$lang['unassigned_home_from_group'] = "Quitado el home (ID: %d) del grupo %s.";
$lang['no_homes_assigned_to_user'] = "No se asigno home al usuario %s.";
$lang['no_homes_assigned_to_group'] = "No se asigno home al grupo %s.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "No hay mas servidores disponibles para asignar a este usuario";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "No hay mas servidores disponibles para asignar a este grupo";
$lang['you_can_add_a_new_game_server_from'] = "Puede añadir mas servidores desde %s";
$lang["no_remote_servers_available_please_add_at_least_one"] = "Por favor, agregue almenos un servidor remoto.";
$lang[''] = "";
$lang[''] = "";


// clone_home.php
$lang['cloning_of_home_failed'] = "Error clonando el home con id '%s'.";
$lang['no_mods_to_clone'] = "No tiene mod(s) para este juego aun. Ninguno sera clonado.";
$lang['failed_to_add_mod'] = "Error al agregar mod con id '%s' al home con id '%s'.";
$lang['failed_to_update_mod_settings'] = "Error al actualizar las opciones del mod para el home con id '%s'.";
$lang['successfully_cloned_mods'] = "Mods correctamente clonados para el home con id '%s'.";
$lang['successfully_copied_home_database'] = "Base de datos copiada correctamente.";
$lang['copying_home_remotely'] = "Copiando el home en el servidor remoto '%s' a '%s'.";
$lang['cloning_home'] = "Clonando el mod llamado '%s'";
$lang['current_home_path'] = "Carpeta del home original";
$lang['current_home_path_info'] = "La carpeta actual del home a copiar al servidor remoto.";
$lang['clone_home'] = "Clonar Home";
$lang['new_home_name'] = "Nombre del Home de destino";
$lang['new_home_path'] = "Carpeta del Home de destino";
$lang['agent_ip'] = "IP del servidor de destino";
$lang["game_server_copy_is_running"] = "La copia esta en marcha.";
$lang['game_server_copy_was_successful'] = "La copia esta se completo satisfactoriamente.";
$lang["game_server_copy_failed_with_return_code"] = "La copia fallo y el codigo de error fue: %s";
$lang["clone_mods"] = "Clonar Mods.";
$lang["game_server_owner"] = "DueÃ±o del servidor.";
$lang["the_name_of_the_server_to_help_users_to_identify_it"] = "El nombre del servidor para ayudar a identificarlo.";
$lang["ips_and_ports_used_in_this_home"] = "Pares de IP:puerto usados en esta servidor";
$lang["note_ips_and_ports_are_not_cloned"] = "Nota: Las direcciones IP no se copiaran.";
$lang["mods_and_settings_for_this_game_server"] = "Mods y configuraciones para este servidor";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// del_home.php
$lang["sure_to_delete_serverid_from_remoteip_and_directory"] = "Esta seguro de eliminar el servidor con ID %s del servidor remoto en %s y en el directorio %s";
$lang["yes_and_delete_the_files"] = "Si, y eliminar los archivos y directorios tambien.";
$lang["failed_to_remove_gamehome_from_database"] = "No se pudo eliminar el servidor de la base de datos.";
$lang["successfully_deleted_game_server_with_id"] = "Se elimino el servidor con ID %s.";
$lang["failed_to_remove_ftp_account_from_remote_server"] = "No se pudo eliminar la cuenta FTP del servidor remoto.";
$lang["remove_it_anyway"] = "Eliminar de todos modos";
$lang["sucessfully_deleted"] = "Eliminado correctamente.";
$lang["the_agent_had_a_problem_deleting"] = "El agente tuvo un problema al eliminar.";
$lang["connection_timeout_or_problems_reaching_the_agent"] = "Tiempo de espera agotado o problemas conectando con el agente.";
$lang[''] = "";
$lang[''] = "";

// get_size.php
$lang['does_not_exist_yet'] = "No existe todavia.";

// Custom fields
$lang['go_to_custom_fields'] = "Ir a campos personalizados";
$lang['back_to_edit_server'] = "Volver a edición del servidor";
$lang['update_settings'] = "Actualizar configuración";
$lang['settings_updated'] = "Configuración actualizada.";
?>
