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

// server.php
$lang['add_new_mysql_host'] = "Añadir alojamineto MySQL";
$lang['enter_mysql_ip'] = "Introduzca la IP de MySQL.";
$lang['enter_valid_port'] = "Introduzca un puerto valido.";
$lang['enter_mysql_root_password'] = "Introduzca la contraseña MySQL de root.";
$lang['enter_mysql_name'] = "Asigne un nombre para este servidor MySQL.";
$lang['could_not_add_mysql_server'] = "No se pudo añadir el servidor de MySQL.";
$lang['game_server_name_info'] = "Servidor MySQL añadido correctamente.";
$lang['note_mysql_host'] = "Nota: Al usar 'Conexión directa' el servidor de MySQL debe aceptar conexiones externas para que los servidores de juegos puedan conectarse remotamente, sin embargo conectandose mediante un servidor remto este será usado solo como una conexion local.";
$lang['direct_connection'] = "Conexión directa";
$lang['connection_through_remote_server_named'] = "Conexión mediante el servidor remoto llamado %s";
$lang['add_mysql_server'] = "Añadir servidor MySQL";
$lang['offline'] = "Desconectado";
$lang['online'] = "Conectado";
$lang['mysql_online'] = "MySQL en linea";
$lang['mysql_offline'] = "MySQL sin conexión";
$lang["encryption_key_mismatch"] = "Clave de encriptación erronea";
$lang["unknown_error"] = "Error desconocido";
$lang["remove"] = "Eliminar";
$lang["assign_db"] = "Asignar base de datos";
$lang["mysql_server_name"] = "Nombre del servidor MySQL";
$lang["server_status"] = "Estado del servidor";
$lang['mysql_ip_port'] = "IP:puerto MySQL";
$lang['mysql_root_passwd'] = "Contraseña root de MySQL";
$lang['connection_method'] = "Metodo de conexión";
$lang['user_privilegies'] = "Privilegios del usuario";
$lang['current_dbs'] = "Bases de datos actuales";
$lang['mysql_name'] = "Nombre del servidor MySQL";
$lang['mysql_ip'] = "IP de MySQL";
$lang['mysql_port'] = "puerto de MySQL";
$lang['privilegies'] = "Privilegios";
$lang['all'] = "Todos";
$lang['custom'] = "Personalizado";
$lang['server_added'] = "Servidor añadido.";

//privileges
$lang['alter'] = "ALTERAR";	
$lang['create'] = "CREAR";	
$lang['create_temporary_tables'] = "CREAR TABLAS TEMPORALES";
$lang['delete'] = "ELIMINAR";
$lang['drop'] = "DESCARTAR";	
$lang['index'] = "INDIZAR";	
$lang['insert'] = "INSERTAR";	
$lang['lock_tables'] = "BLOQUEAR TABLAS";	
$lang['select'] = "SELECCIONAR";	
$lang['update'] = "ACTUALIZAR";	
$lang['grant_option'] = "CONCEDER OPCIÓN";
//privileges descriptions
$lang['alter_info'] = "<b>Activa el uso de ALTER TABLE.</b>";	
$lang['create_info'] = "<b>Activa el uso de CREATE TABLE.</b>";	
$lang['create_temporary_tables_info'] = "<b>Activa el uso de CREATE TEMPORARY TABLE.</b>";
$lang['delete_info'] = "<b>Activa el uso de DELETE.</b>";
$lang['drop_info'] = "<b>Activa el uso de DROP TABLE.</b>";	
$lang['index_info'] = "<b>Activa el uso de CREATE INDEX y DROP INDEX.</b>";	
$lang['insert_info'] = "<b>Activa el uso de INSERT.</b>";	
$lang['lock_tables_info'] = "<b>Activa el uso de LOCK TABLES en las tablas para las cuales usted tiene el privilegio SELECT.</b>";	
$lang['select_info'] = "<b>Activa el uso de SELECT.</b>";	
$lang['update_info'] = "<b>Activa el uso de UPDATE.</b>";
$lang['grant_option_info'] = "<b>Permite conceder privilegios.</b>";


// edit_server.php
$lang['select_game_server'] = "Seleccione un servidor de juegos";
$lang['invalid_mysql_server_id'] = "ID de servidor MySQL no valido.";
$lang['there_is_another_db_named_or_user_named'] = "Hay otra base de datos llamada <b>%s</b> u otro usuario llamado <b>%s</b>.";
$lang['db_added_for_home_id'] = "Añadida la base de datos para el servidor con ID <b>%s</b>.";
$lang['could_not_remove_db'] = "La base de datos seleccionada no pudo ser eliminada.";
$lang['db_removed_successfully_from_mysql_server_named'] = "La base de datos se elimino del servidor llamado %s correctamente.";
$lang['areyousure_remove_mysql_server'] = "Está seguro de que quiere eliminar el servidor MySQL llamado <b>%s</b>?";
$lang['db_changed_successfully'] = "La base de datos llamada %s se modificó correctamente.";
$lang['error_while_remove'] = "Error mientras se eliminaba.";
$lang['mysql_server_removed'] = "El servidor de MySQL llamado <b>%s</b> ha sido eliminado con exito.";
$lang['unable_to_set_changes_to'] = "Imposible cambiar la configuración del servidor de MySQL llamado <b>%s</b>.";
$lang['mysql_server_settings_changed'] = "El servidor de MySQL llamado <b>%s</b> se modificó con exito.";
$lang['editing_mysql_server'] = "Editando el servidor de MySQL llamado <b>%s</b>.";
$lang['save_settings'] = "Guardar cambios";
$lang['mysql_dbs_for'] = "Bases de datos para %s";
$lang['edit_dbs'] = "Editar bases de datos";
$lang['edit_db_settings'] = "Editar configuraciones de la base de datos";
$lang['remove_db'] = "Eliminar base de datos";
$lang['save_db_changes'] = "Guardar cambios de la base de datos.";
$lang['add_db'] = "Añadir base de datos";
$lang['select_db'] = "Seleccionar base de datos";
$lang['db_user'] = "Ususario BD";
$lang['db_passwd'] = "Contraseña BD";
$lang['db_name'] = "Nombre BD";
$lang['enabled'] = "Activada";
$lang['game_server'] = "Servidor de juegos";


// user_db.php
$lang['there_are_no_databases_assigned_for'] = "No hay bases de datos assignadas para <b>%s</b>.";
$lang['unable_to_connect_to_mysql_server_as'] = "Imposible conectar al servidor de MySQL como %s.";
$lang['unable_to_create_db'] = "Imposible crear una base de datos.";
$lang['unable_to_select_db'] = "Imposible seleccionar la base de datos %s.";
$lang['db_info'] = "Información sobre la base de datos";
$lang['db_tables'] = "Tablas de la base de datos";
$lang['db_backup'] = "Copia de seguridad de la base de datos";
$lang['download_db_backup'] = "Descargar copia de seguridad";
$lang['restore_db_backup'] = "Restaurar copia de seguridad";
$lang['sql_file'] = "Archivo(.sql)";
?>