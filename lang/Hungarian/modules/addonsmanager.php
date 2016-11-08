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

// Addons
define('install_plugin', "Pluginok telepítése");
define('install_mappack', "Pályák telepítése");
define('install_config', "Beállítások telepítése");
define('game_name', "Játék típusa");
define('directory', "Könyvtár útvonal");
define('remote_server', "Távoli gép");
define('select_addon', "Kiegészítő kiválasztás");
define('install', "Telepítés");
define('failed_to_start_file_download', "Nem sikerült elindítani a fájl letöltést.");
define('no_games_servers_available', "There are no game servers available in your account.");
define('addon_installed_successfully', "Kiegészítő sikeressen települt.");
define('path', "Path");
define('wait_while_decompressing', "Wait while the file %s is decompressed.");

// Admin Addons
define('addon_name', "Kiegészítő neve");
define('url', "Cím");
define('select_game_type', "Válaszd ki a játék típusát");
define('plugin', "Plugin");
define('mappack', "Pályapack");
define('config', "Konfig");
define('type', "Tipus");
define('game', "Játék");
define('show_all_addons', "Show All Addons");
define('show_addons_for_selected_type', "Show Addons For Selected Type");
define('show_addons_for_selected_game', "Show Addons For Selected Game");
define('linux_games', "Linux játék:");
define('windows_games', "Windows játék:");
define('create_addon', "Új kiegészítő készítés");
define('addons_db', "Kiegészítő adatbázis");
define('addon_has_been_created', "The addon %s has been created.");
define('remove_addon', "Kiegészítő törlés");
define('fill_the_url_address_to_a_compressed_file', "Please, Fill an URL address for a compressed file.");
define('fill_the_addon_name', "Please, fill a name for the addon package.");
define('select_an_addon_type', "Please, select an addon type.");
define('select_a_game_type', "Please, select a game type.");
define('edit_addon', "Kiegészítő szerkesztés");
define('post-script', "Post-install script(bash)");
define('replacements', "Replacements:");
define('addon_name_info', "Enter a name for this addon, this is the name that the user sees.");
define('url_info', "Enter a web address that contains a file to download, if compressed in zip or tar.gz will be unpacked in the root directory of the server or on the path given below.");
define('path_info', "The path must be relative to the server folder and contain no slashes at the beginning or end, eg: cstrike/cfg. If left blank will use the server root path.");
define('post-script_info', "Enter Bash language code, this will be executed as a script, you can use text replacements to customize the installation, they will be replaced by data ".
						   "from the server on which you install the addon. The script will start from the root folder of the server or the specified path.");
?>