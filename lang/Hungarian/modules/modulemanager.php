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

// modulemanager.php
define('module_id', "Modul azonosító");
define('module_name', "Modul neve");
define('module_folder', "Modul mappája");
define('module_version', "Modul verziója");
define('db_version', "Adatbázis verzió");
define('modules_available_for_install', "Az alábbi modulok telepíthetőek");
define('install', "Telepít");
define('modules', "Modulok");
define('update_modules', "Modul frissítése");
define('no_installed_modules', "Nem található installált modul.");
define('not_complete', "The delete/install feature is not complete and might not work properly. WARNING: Data from ogp database might be lost!");
define('core_mods_installed', "Core Modules Installed:");
define('custom_mods_installed', "Custom Modules Installed:");

// add_module.php
define('installing_module', "Installing module '%s'");
define('successfully_installed_module', "A(z) %s modul sikeresen telepítve.");
define('failed_to_install_module', "A(z) %s modul telepítse sikertelen.");
define('adding_module', "Adding module called '%s'.");
define('module_already_installed', "Module called '%s' is already installed.");

// del_module.php
define('uninstalling_module', "Uninstalling module '%s'");
define('successfully_uninstalled_module', "A(z) %s modul sikeresen eltávolítva.");
define('failed_to_uninstall_module', "A(z) %s modul installálása sikertelen.");

// module_handeling.php
define('module_file_missing', "directory is missing the module.php file.");
define('module_file_missing_info', "is missing the required information.");
define('query_failed', "Failed to execute query");
define('query_failed_2', "to database.");
define('failed_del_db', "Failed to delete module from database.");
define('updated_module', "Frissített modul: '%s'.");

//updating_modules.php
define('updating_modules', "Modul frissítés");
define('updating_finished', "Frissítés sikeres");
?>