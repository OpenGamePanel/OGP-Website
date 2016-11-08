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
// updating.php
define('curl_needed', "Для отображения этой страницы требуется модуль PHP curl.");
define('no_access', "У вас не достаточно прав для отображения этой страницы.");
define('dwl_update', "Загрузка обновления...");
define('dwl_complete', "Загрузка завершена");
define('install_update', "Установка обновления...");
define('update_complete', "Обновление установлено");
define('ignored_files', "%s ignored files.");
define('not_updated_files_blacklisted', "Not updated/installed files (Blacklisted):<br>%s");

// update.php
define('no_new_updates', "Обновлений не обнаружено.");
define('latest_version', "Последняя версия");
define('panel_version', "Версия панели");
define('update_now', "Обновить сейчас");
define('the_panel_is_up_to_date', "Панель находится в актуальном состоянии.");
define('files_overwritten', "%s files overwritten.");
define('can_not_update_non_writable_files', "Can not update because the following files/folders are not writable");
define('dwl_failed', "The download URL is not available: \"%s\".<br>Try again later.");
define('temp_folder_not_writable', "The download can not be placed because Apache does not have write permision at the system temporary folder(%s).");
define('base_dir_not_writable', "The panel can not update because Apache does not have write permision at folder \"%s\".");
define('new_files', "%s new files.");
define('updated_files', "Updated files:<br>%s");
define('view_changes', "View changes");
define('get_x_revison_messages_may_take_some_time', "Get %s revison messages may take some time.");

//updating_modules.php
define('updating_modules', "Updating Modules");
define('updating_finished', "Updating Finished");
define('updated_module', "Updated module: '%s'.");
define('select_mirror', "Select mirror");

//blacklist.php
define('blacklist_files', "Blacklist files");
define('blacklist_files_info', "All marked files will not be updated.");
define('save_to_blacklist', "Save to blacklist");

?>