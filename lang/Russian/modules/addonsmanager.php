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
define('install_plugin', "Установить плагин/мод");
define('install_mappack', "Установить карты");
define('install_config', "Установить конфиг");
define('game_name', "Название игры");
define('directory', "Путь к каталогу");
define('remote_server', "Удалённый сервер");
define('select_addon', "Выберите аддон");
define('install', "Установить");
define('failed_to_start_file_download', "Не удалось начать закачку файла.");
define('no_games_servers_available', "Эти игровые сервера не доступны на вашем аккаунте.");
define('addon_installed_successfully', "Аддон успешно установлен.");
define('path', "Путь");
define('wait_while_decompressing', "Подождите, пока файл распаковывается %s.");

// Admin Addons
define('addon_name', "Название аддона");
define('url', "URL-адрес");
define('select_game_type', "Выберите Тип игры");
define('plugin', "Плагин");
define('mappack', "Карты");
define('config', "Конфиг");
define('type', "Тип аддона");
define('game', "Игра");
define('show_all_addons', "Показать все аддоны");
define('show_addons_for_selected_type', "Показать все аддоны для выбранного типа");
define('show_addons_for_selected_game', "Показать все аддоны для выбранной игры");
define('linux_games', "Linux Игры:");
define('windows_games', "Windows Игры:");
define('create_addon', "Создать аддон");
define('addons_db', "База данных всех аддонов");
define('addon_has_been_created', "Аддон %s был создан успешно.");
define('remove_addon', "Удалить аддон");
define('fill_the_url_address_to_a_compressed_file', "Пожалуйста, заполните URL-адрес для сжатых файлов.");
define('fill_the_addon_name', "Пожалуйста, введите имя для аддона.");
define('select_an_addon_type', "Пожалуйста, выберите тип аддона.");
define('select_a_game_type', "Пожалуйста, выберите тип игры.");
define('edit_addon', "Редактировать аддон");
define('post-script', "После установки сценария(bash)");
define('replacements', "Замены:");
define('addon_name_info', "Enter a name for this addon, this is the name that the user sees.");
define('url_info', "Enter a web address that contains a file to download, if compressed in zip or tar.gz will be unpacked in the root directory of the server or on the path given below.");
define('path_info', "The path must be relative to the server folder and contain no slashes at the beginning or end, eg: cstrike/cfg. If left blank will use the server root path.");
define('post-script_info', "Enter Bash language code, this will be executed as a script, you can use text replacements to customize the installation, they will be replaced by data ".
						   "from the server on which you install the addon. The script will start from the root folder of the server or the specified path.");
?>