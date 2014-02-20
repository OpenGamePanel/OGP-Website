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

$lang['curl_needed'] = "Esta pagina necesita el modulo Curl de PHP.";
$lang['no_access'] = "Necesitas derechos de administrador para entrar en esta pagina.";
$lang['dwl_update'] = "Descargando la actualización...";
$lang['dwl_complete'] = "Descarga completa";
$lang['install_update'] = "Instalando actualización...";
$lang['update_complete'] = "<b>Actualización completa.</b>";

// update.php
$lang['no_new_updates'] = "No hay actualizaciones disponibles.";
$lang['latest_version'] = "Ultima version";
$lang['panel_version'] = "Version del panel";
$lang['update_now'] = "Actualizar Ahora";
$lang['the_panel_is_up_to_date'] = "El panel esta actualizado.";
$lang['files_overwritten'] = "%s archivos sobreescritos.";
$lang['can_not_update_non_writable_files'] = "No se puede actualizar porque los siguientes archivos/carpetas no se pueden sobreescribir";
$lang['dwl_failed'] = "El sistema no puede acceder a la url de la descarga: \"%s\".<br>Intentelo de nuevo mas tarde.";
$lang['temp_folder_not_writable'] = "La descarga no pudo completarse porque Apache no tiene permisos de escritura en la carpeta de archivos temporales del sistema(%s).";
$lang['base_dir_not_writable'] = "El panel no puede actualizarse porque Apache no tiene permisos de escritura en la carpeta \"%s\".";
$lang['new_files'] = "%s archivos nuevos.";
$lang['updated_files'] = "Archivos actualizados:<br>%s";
$lang['view_changes'] = "Ver cambios";
$lang['get_x_revison_messages_may_take_some_time'] = "Obtener %s mensajes de revisión puede tardar algún tiempo.";

// Update modules
$lang["updated_module"] = "Modulo %s actualizado.";
$lang["updating_modules"] = "Actualizando Modulos";
$lang["updating_finished"] = "Actualización Completa";
$lang['select_mirror'] = "Seleccione un servidor de descarga";

//blacklist.php
$lang['blacklist_files'] = "Lista negra de archivos";
$lang['blacklist_files_info'] = "Todos los archivos marcados no serán actualizados.";
$lang['save_to_blacklist'] = "Guardar en la lista negra";
include('litefm.php');
?>
