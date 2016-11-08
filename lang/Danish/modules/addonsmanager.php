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

// Addons
define('install_plugin', "Installere Plugin");
define('install_mappack', "Installere Mappepakke");
define('install_config', "Installere Config");
define('game_name', "Spil Navn");
define('directory', "Mappe Sti");
define('remote_server', "Fjern Server");
define('select_addon', "Vælg Addon");
define('install', "Installere");
define('failed_to_start_file_download', "Fejlet i at starte fil download.");
define('no_games_servers_available', "Der er ikke nogen spil servere tilgængelig, på din konto.");
define('addon_installed_successfully', "Addon installeret successfully");
define('path', "Sti");
define('wait_while_decompressing', "Vent mens filen %s er dekomprimeret.");

// Admin Addons
define('addon_name', "Addon Navn");
define('url', "URL");
define('select_game_type', "Vælg Spil Type");
define('plugin', "Plugin");
define('mappack', "MapPakke");
define('config', "Config");
define('type', "Addon Type");
define('game', "Spil");
define('show_all_addons', "Vis Alle Addons");
define('show_addons_for_selected_type', "Vis Addons For Valgte Type");
define('show_addons_for_selected_game', "Vis Addons For Valgte Spil");
define('linux_games', "Linux Spil:");
define('windows_games', "Windows Spil:");
define('create_addon', "Opret Addon");
define('addons_db', "Addons DataBase");
define('addon_has_been_created', "Addon %s er bleven oprettet.");
define('remove_addon', "Fjern Addon");
define('fill_the_url_address_to_a_compressed_file', "Vær venlig, at indsætte URL addresse for komprimeret fil.");
define('fill_the_addon_name', "Vær venlige, at indsætte navn til addon pakke.");
define('select_an_addon_type', "Vælg venligst en addon type.");
define('select_a_game_type', "Vælg venlligst en spil type.");
define('edit_addon', "Redigere Addon");
define('post-script', "Post-install script(bash)");
define('replacements', "Replacements:");
define('addon_name_info', "Enter a name for this addon, this is the name that the user sees.");
define('url_info', "Enter a web address that contains a file to download, if compressed in zip or tar.gz will be unpacked in the root directory of the server or on the path given below.");
define('path_info', "The path must be relative to the server folder and contain no slashes at the beginning or end, eg: cstrike/cfg. If left blank will use the server root path.");
define('post-script_info', "Enter Bash language code, this will be executed as a script, you can use text replacements to customize the installation, they will be replaced by data ".
						   "from the server on which you install the addon. The script will start from the root folder of the server or the specified path.");
?>