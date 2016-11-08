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

include('litefm.php');
define('curl_needed', "Esta pagina necesita el modulo Curl de PHP.");
define('no_access', "Necesitas derechos de administrador para entrar en esta pagina.");
define('dwl_update', "Descargando la actualización...");
define('dwl_complete', "Descarga completa");
define('install_update', "Instalando actualización...");
define('update_complete', "<b>Actualización completa.</b>");
define('ignored_files', "%s archivos ignorados.");
define('not_updated_files_blacklisted', "Archivos no actualizados/instalados (En la lista negra):<br>%s");

// update.php
define('no_new_updates', "No hay actualizaciones disponibles.");
define('latest_version', "Ultima version");
define('panel_version', "Version del panel");
define('update_now', "Actualizar Ahora");
define('the_panel_is_up_to_date', "El panel esta actualizado.");
define('files_overwritten', "%s archivos sobreescritos.");
define('can_not_update_non_writable_files', "No se puede actualizar porque los siguientes archivos/carpetas no se pueden sobreescribir");
define('dwl_failed', "El sistema no puede acceder a la url de la descarga: \"%s\".<br>Intentelo de nuevo mas tarde.");
define('temp_folder_not_writable', "La descarga no pudo completarse porque Apache no tiene permisos de escritura en la carpeta de archivos temporales del sistema(%s).");
define('base_dir_not_writable', "El panel no puede actualizarse porque Apache no tiene permisos de escritura en la carpeta \"%s\".");
define('new_files', "%s archivos nuevos.");
define('updated_files', "Archivos actualizados:<br>%s");
define('view_changes', "Ver cambios");
define('get_x_revison_messages_may_take_some_time', "Obtener %s mensajes de revisión puede tardar algún tiempo.");

// Update modules
define("updated_module", "Modulo %s actualizado.");
define("updating_modules", "Actualizando Modulos");
define("updating_finished", "Actualización Completa");
define('select_mirror', "Seleccione un servidor de descarga");

//blacklist.php
define('blacklist_files', "Lista negra de archivos");
define('blacklist_files_info', "Todos los archivos marcados no serán actualizados.");
define('save_to_blacklist', "Guardar en la lista negra");
?>