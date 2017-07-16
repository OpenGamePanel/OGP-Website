<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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

define('configured_mysql_hosts', "Servidores remotos instalados");
define('add_new_mysql_host', "Añadir alojamineto MySQL");
define('enter_mysql_ip', "Introduzca la IP de MySQL.");
define('enter_valid_port', "Introduzca un puerto valido.");
define('enter_mysql_root_password', "Introduzca la contraseña MySQL de root.");
define('enter_mysql_name', "Asigne un nombre para este servidor MySQL.");
define('could_not_add_mysql_server', "No se pudo añadir el servidor de MySQL.");
define('game_server_name_info', "Ayuda a identificar el servidor.");
define('note_mysql_host', "Nota: Al usar 'Conexión directa' el servidor de MySQL debe aceptar conexiones externas para que los servidores de juegos puedan conectarse remotamente, sin embargo conectandose mediante un servidor remto este será usado solo como una conexion local.");
define('direct_connection', "Conexión directa");
define('connection_through_remote_server_named', "Conexión mediante el servidor remoto llamado %s");
define('add_mysql_server', "Añadir servidor MySQL");
define('mysql_online', "MySQL en linea");
define('mysql_offline', "MySQL sin conexión");
define('encryption_key_mismatch', "La clave de cifrado no coincide con el agente. Vuelva a revisar sus archivos de configuración.");
define('unknown_error', "Error desconocido.");
define('remove', "Borrar");
define('assign_db', "Asignar base de datos");
define('mysql_server_name', "Nombre del servidor MySQL");
define('server_status', "Estado del Servidor");
define('mysql_ip_port', "IP:puerto MySQL");
define('mysql_root_passwd', "Contraseña root de MySQL");
define('connection_method', "Metodo de conexión");
define('user_privilegies', "Privilegios del usuario");
define('current_dbs', "Bases de datos actuales");
define('mysql_name', "Nombre del servidor MySQL");
define('mysql_ip', "IP de MySQL");
define('mysql_port', "puerto de MySQL");
define('privilegies', "Privilegios");
define('all', "Todos");
define('custom', "Personalizado");
define('server_added', "Servidor añadido.");
define('sql_alter', "ALTERAR");
define('sql_create', "CREAR");
define('sql_create_temporary_tables', "CREAR TABLAS TEMPORALES");
define('sql_drop', "DESCARTAR");
define('sql_index', "INDIZAR");
define('sql_insert', "INSERTAR");
define('sql_lock_tables', "BLOQUEAR TABLAS");
define('sql_select', "SELECCIONAR");
define('sql_grant_option', "CONCEDER OPCIÓN");
define('sql_update', "ACTUALIZAR");
define('sql_delete', "ELIMINAR");
define('sql_alter_info', "<b>Activa el uso de ALTER TABLE.</b>");	
define('sql_create_info', "<b>Activa el uso de CREATE TABLE.</b>");	
define('sql_create_temporary_tables_info', "<b>Activa el uso de CREATE TEMPORARY TABLE.</b>");
define('sql_delete_info', "<b>Activa el uso de DELETE.</b>");
define('sql_drop_info', "<b>Activa el uso de DROP TABLE.</b>");	
define('sql_index_info', "<b>Activa el uso de CREATE INDEX y DROP INDEX.</b>");	
define('sql_insert_info', "<b>Activa el uso de INSERT.</b>");	
define('sql_lock_tables_info', "<b>Activa el uso de LOCK TABLES en las tablas para las cuales usted tiene el privilegio SELECT.</b>");	
define('sql_select_info', "<b>Activa el uso de SELECT.</b>");
define('sql_update_info', "<b>Activa el uso de UPDATE.</b>");	
define('sql_grant_option_info', "<b>Permite conceder privilegios.</b>");
define('select_game_server', "Seleccione un servidor de juegos");
define('invalid_mysql_server_id', "ID de servidor MySQL no valido.");
define('there_is_another_db_named_or_user_named', "Hay otra base de datos llamada <b>%s</b> u otro usuario llamado <b>%s</b>.");
define('db_added_for_home_id', "Añadida la base de datos para el servidor con ID <b>%s</b>.");
define('could_not_remove_db', "La base de datos seleccionada no pudo ser eliminada.");
define('db_removed_successfully_from_mysql_server_named', "La base de datos se elimino del servidor llamado %s correctamente.");
define('areyousure_remove_mysql_server', "Está seguro de que quiere eliminar el servidor MySQL llamado <b>%s</b>?");
define('db_changed_successfully', "La base de datos llamada %s se modificó correctamente.");
define('error_while_remove', "Error al intentar eliminar.");
define('mysql_server_removed', "El servidor de MySQL llamado <b>%s</b> ha sido eliminado con exito.");
define('unable_to_set_changes_to', "Imposible cambiar la configuración del servidor de MySQL llamado <b>%s</b>.");
define('mysql_server_settings_changed', "El servidor de MySQL llamado <b>%s</b> se modificó con exito.");
define('editing_mysql_server', "Editando el servidor de MySQL llamado <b>%s</b>.");
define('save_settings', "Guardar cambios");
define('mysql_dbs_for', "Bases de datos para %s");
define('edit_dbs', "Editar bases de datos");
define('edit_db_settings', "Editar configuraciones de la base de datos");
define('remove_db', "Eliminar base de datos");
define('save_db_changes', "Guardar cambios de la base de datos.");
define('add_db', "Añadir base de datos");
define('select_db', "Seleccionar base de datos");
define('db_user', "Ususario BD");
define('db_passwd', "Contraseña BD");
define('db_name', "Nombre BD");
define('enabled', "Habilitado");
define('game_server', "Servidor");
define('there_are_no_databases_assigned_for', "No hay bases de datos assignadas para <b>%s</b>.");
define('unable_to_connect_to_mysql_server_as', "Imposible conectar al servidor de MySQL como %s.");
define('unable_to_create_db', "No se pudo crear la base de datos.");
define('unable_to_select_db', "Imposible seleccionar la base de datos %s.");
define('db_info', "Información sobre la base de datos");
define('db_tables', "Tablas de la base de datos");
define('db_backup', "Copia de seguridad de la base de datos");
define('download_db_backup', "Descargar copia de seguridad");
define('restore_db_backup', "Restaurar copia de seguridad");
define('sql_file', "Archivo(.sql)");
?>