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

define('OGP_LANG_configured_mysql_hosts', "Servidores remotos instalados");
define('OGP_LANG_add_new_mysql_host', "Añadir alojamineto MySQL");
define('OGP_LANG_enter_mysql_ip', "Introduzca la IP de MySQL.");
define('OGP_LANG_enter_valid_port', "Introduzca un puerto valido.");
define('OGP_LANG_enter_mysql_root_password', "Introduzca la contraseña MySQL de root.");
define('OGP_LANG_enter_mysql_name', "Asigne un nombre para este servidor MySQL.");
define('OGP_LANG_could_not_add_mysql_server', "No se pudo añadir el servidor de MySQL.");
define('OGP_LANG_game_server_name_info', "Ayuda a identificar el servidor.");
define('OGP_LANG_note_mysql_host', "Nota: Al usar 'Conexión directa' el servidor de MySQL debe aceptar conexiones externas para que los servidores de juegos puedan conectarse remotamente, sin embargo conectandose mediante un servidor remto este será usado solo como una conexion local.");
define('OGP_LANG_direct_connection', "Conexión directa");
define('OGP_LANG_connection_through_remote_server_named', "Conexión mediante el servidor remoto llamado %s");
define('OGP_LANG_add_mysql_server', "Añadir servidor MySQL");
define('OGP_LANG_mysql_online', "MySQL en linea");
define('OGP_LANG_mysql_offline', "MySQL sin conexión");
define('OGP_LANG_encryption_key_mismatch', "La clave de cifrado no coincide con el agente. Vuelva a revisar sus archivos de configuración.");
define('OGP_LANG_unknown_error', "Error desconocido.");
define('OGP_LANG_remove', "Borrar");
define('OGP_LANG_assign_db', "Asignar base de datos");
define('OGP_LANG_mysql_server_name', "Nombre del servidor MySQL");
define('OGP_LANG_server_status', "Estado del Servidor");
define('OGP_LANG_mysql_ip_port', "IP:puerto MySQL");
define('OGP_LANG_mysql_root_passwd', "Contraseña root de MySQL");
define('OGP_LANG_connection_method', "Metodo de conexión");
define('OGP_LANG_user_privilegies', "Privilegios del usuario");
define('OGP_LANG_current_dbs', "Bases de datos actuales");
define('OGP_LANG_mysql_name', "Nombre del servidor MySQL");
define('OGP_LANG_mysql_ip', "IP de MySQL");
define('OGP_LANG_mysql_port', "puerto de MySQL");
define('OGP_LANG_privilegies', "Privilegios");
define('OGP_LANG_all', "Todos");
define('OGP_LANG_custom', "Personalizado");
define('OGP_LANG_server_added', "Servidor añadido.");
define('OGP_LANG_sql_alter', "ALTERAR");
define('OGP_LANG_sql_create', "CREAR");
define('OGP_LANG_sql_create_temporary_tables', "CREAR TABLAS TEMPORALES");
define('OGP_LANG_sql_drop', "DESCARTAR");
define('OGP_LANG_sql_index', "INDIZAR");
define('OGP_LANG_sql_insert', "INSERTAR");
define('OGP_LANG_sql_lock_tables', "BLOQUEAR TABLAS");
define('OGP_LANG_sql_select', "SELECCIONAR");
define('OGP_LANG_sql_grant_option', "CONCEDER OPCIÓN");
define('OGP_LANG_sql_update', "ACTUALIZAR");
define('OGP_LANG_sql_delete', "ELIMINAR");
define('OGP_LANG_sql_alter_info', "<b>Activa el uso de ALTER TABLE.</b>");	
define('OGP_LANG_sql_create_info', "<b>Activa el uso de CREATE TABLE.</b>");	
define('OGP_LANG_sql_create_temporary_tables_info', "<b>Activa el uso de CREATE TEMPORARY TABLE.</b>");
define('OGP_LANG_sql_delete_info', "<b>Activa el uso de DELETE.</b>");
define('OGP_LANG_sql_drop_info', "<b>Activa el uso de DROP TABLE.</b>");	
define('OGP_LANG_sql_index_info', "<b>Activa el uso de CREATE INDEX y DROP INDEX.</b>");	
define('OGP_LANG_sql_insert_info', "<b>Activa el uso de INSERT.</b>");	
define('OGP_LANG_sql_lock_tables_info', "<b>Activa el uso de LOCK TABLES en las tablas para las cuales usted tiene el privilegio SELECT.</b>");	
define('OGP_LANG_sql_select_info', "<b>Activa el uso de SELECT.</b>");
define('OGP_LANG_sql_update_info', "<b>Activa el uso de UPDATE.</b>");	
define('OGP_LANG_sql_grant_option_info', "<b>Permite conceder privilegios.</b>");
define('OGP_LANG_select_game_server', "Seleccione un servidor de juegos");
define('OGP_LANG_invalid_mysql_server_id', "ID de servidor MySQL no valido.");
define('OGP_LANG_there_is_another_db_named_or_user_named', "Hay otra base de datos llamada <b>%s</b> u otro usuario llamado <b>%s</b>.");
define('OGP_LANG_db_added_for_home_id', "Añadida la base de datos para el servidor con ID <b>%s</b>.");
define('OGP_LANG_could_not_remove_db', "La base de datos seleccionada no pudo ser eliminada.");
define('OGP_LANG_db_removed_successfully_from_mysql_server_named', "La base de datos se elimino del servidor llamado %s correctamente.");
define('OGP_LANG_areyousure_remove_mysql_server', "Está seguro de que quiere eliminar el servidor MySQL llamado <b>%s</b>?");
define('OGP_LANG_db_changed_successfully', "La base de datos llamada %s se modificó correctamente.");
define('OGP_LANG_error_while_remove', "Error al intentar eliminar.");
define('OGP_LANG_mysql_server_removed', "El servidor de MySQL llamado <b>%s</b> ha sido eliminado con exito.");
define('OGP_LANG_unable_to_set_changes_to', "Imposible cambiar la configuración del servidor de MySQL llamado <b>%s</b>.");
define('OGP_LANG_mysql_server_settings_changed', "El servidor de MySQL llamado <b>%s</b> se modificó con exito.");
define('OGP_LANG_editing_mysql_server', "Editando el servidor de MySQL llamado <b>%s</b>.");
define('OGP_LANG_save_settings', "Guardar cambios");
define('OGP_LANG_mysql_dbs_for', "Bases de datos para %s");
define('OGP_LANG_edit_dbs', "Editar bases de datos");
define('OGP_LANG_edit_db_settings', "Editar configuraciones de la base de datos");
define('OGP_LANG_remove_db', "Eliminar base de datos");
define('OGP_LANG_save_db_changes', "Guardar cambios de la base de datos.");
define('OGP_LANG_add_db', "Añadir base de datos");
define('OGP_LANG_select_db', "Seleccionar base de datos");
define('OGP_LANG_db_user', "Ususario BD");
define('OGP_LANG_db_passwd', "Contraseña BD");
define('OGP_LANG_db_name', "Nombre BD");
define('OGP_LANG_enabled', "Habilitado");
define('OGP_LANG_game_server', "Servidor");
define('OGP_LANG_there_are_no_databases_assigned_for', "No hay bases de datos assignadas para <b>%s</b>.");
define('OGP_LANG_unable_to_connect_to_mysql_server_as', "Imposible conectar al servidor de MySQL como %s.");
define('OGP_LANG_unable_to_create_db', "No se pudo crear la base de datos.");
define('OGP_LANG_unable_to_select_db', "Imposible seleccionar la base de datos %s.");
define('OGP_LANG_db_info', "Información sobre la base de datos");
define('OGP_LANG_db_tables', "Tablas de la base de datos");
define('OGP_LANG_db_backup', "Copia de seguridad de la base de datos");
define('OGP_LANG_download_db_backup', "Descargar copia de seguridad");
define('OGP_LANG_restore_db_backup', "Restaurar copia de seguridad");
define('OGP_LANG_sql_file', "Archivo(.sql)");
?>