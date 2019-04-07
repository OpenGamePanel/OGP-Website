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

include('litefm.php');
define('OGP_LANG_curl_needed', "Esta pagina necesita el modulo Curl de PHP.");
define('OGP_LANG_no_access', "Necesitas derechos de administrador para entrar en esta pagina.");
define('OGP_LANG_dwl_update', "Descargando la actualización...");
define('OGP_LANG_dwl_complete', "Descarga completa");
define('OGP_LANG_install_update', "Instalando actualización...");
define('OGP_LANG_update_complete', "<b>Actualización completa.</b>");
define('OGP_LANG_ignored_files', "%s archivo(s) ignorado(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Archivos no actualizados/instalados (en la lista negra): <br>%s");
define('OGP_LANG_latest_version', "Última versión");
define('OGP_LANG_panel_version', "Versión del panel");
define('OGP_LANG_update_now', "Actualizar Ahora");
define('OGP_LANG_the_panel_is_up_to_date', "El panel está actualizado.");
define('OGP_LANG_files_overwritten', "%s Archivos sobrescritos.");
define('OGP_LANG_files_not_overwritten', "%s los archivos NO se sobrescriben debido a la lista negra");
define('OGP_LANG_can_not_update_non_writable_files', "No se puede actualizar porque los siguientes archivos/carpetas no se pueden sobreescribir");
define('OGP_LANG_dwl_failed', "El sistema no puede acceder a la url de la descarga: \"%s\".<br>Intentelo de nuevo mas tarde.");
define('OGP_LANG_temp_folder_not_writable', "La descarga no se puede realizar porque Apache no tiene permiso de escritura en la carpeta temporal del sistema (%s).");
define('OGP_LANG_base_dir_not_writable', "El Panel no puede ser actualizado, debido a que Apache no tiene permisos de escritura en la carpeta \"%s\".");
define('OGP_LANG_new_files', "%s archivos nuevos.");
define('OGP_LANG_updated_files', "Archivos actualizados:<br>%s");
define('OGP_LANG_select_mirror', "Seleccione un servidor de descarga");
define('OGP_LANG_view_changes', "Ver cambios");
define('OGP_LANG_updating_modules', "Actualizando Modulos");
define('OGP_LANG_updating_finished', "Actualización Completa");
define('OGP_LANG_updated_module', "Modulo %s actualizado.");
define('OGP_LANG_blacklist_files', "Lista negra de archivos");
define('OGP_LANG_blacklist_files_info', "Todos los archivos marcados no serán actualizados.");
define('OGP_LANG_save_to_blacklist', "Guardar en la lista negra");
define('OGP_LANG_no_new_updates', "No hay actualizaciones disponibles.");
define('OGP_LANG_module_file_missing', "directorio falta el archivo module.php.");
define('OGP_LANG_query_failed', "Error al ejecutar la consulta");
define('OGP_LANG_query_failed_2', "a la base de datos.");
define('OGP_LANG_missing_zip_extension', "La extensión php-zip no está cargada. Por favor, habilite el uso del módulo de Actualización.");
?>