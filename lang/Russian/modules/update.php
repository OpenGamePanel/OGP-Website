<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2017 The OGP Development Team
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
define('curl_needed', "Для отображения этой страницы требуется модуль PHP curl.");
define('no_access', "У вас не достаточно прав для отображения этой страницы.");
define('dwl_update', "Загрузка обновления...");
define('dwl_complete', "Загрузка завершена");
define('install_update', "Установка обновления...");
define('update_complete', "Обновление установлено");
define('ignored_files', "Исключенных файлов - %s");
define('not_updated_files_blacklisted', "Установленные файлы/Не обновляются (Черный список): <br>%s");
define('latest_version', "Последняя версия");
define('panel_version', "Версия панели");
define('update_now', "Обновить сейчас");
define('the_panel_is_up_to_date', "Панель обновлена!");
define('files_overwritten', "Перезаписано %s файлов");
define('files_not_overwritten', "%sфайл НЕ перезаписан, так как он в черном списке");
define('can_not_update_non_writable_files', "Не возможно выполнить Обновление так как файл/папка не доступны для записи");
define('dwl_failed', "Ссылка для скачивания недоступна.: \"%s\".<br> Попробуйте позже. ");
define('temp_folder_not_writable', "Не возможно выполнить загрузку, потому что Apache не имеет права на запись во временную директорию(%s).");
define('base_dir_not_writable', "Панель не обновлена, потому что Apache не имеет права на запись в папку \"%s\".");
define('new_files', "Новых файлов %s");
define('updated_files', "Обновленные файлы:<br>%s");
define('select_mirror', "Выбор зеркала");
define('view_changes', "Посмотреть изменения");
define('get_x_revison_messages_may_take_some_time', "Получение %sможет занять некоторое время");
define('updating_modules', "Обновление модулей");
define('updating_finished', "Обновление завершено");
define('updated_module', "Модуль обовлён: '%s'.");
define('blacklist_files', "Черный списки файлов");
define('blacklist_files_info', "Все отмеченные файлы не будут обновляться.");
define('save_to_blacklist', "Сохранить Черный список");
define('no_new_updates', "Обновлений не обнаружено.");
define('module_file_missing', "В каталоге отсутствует файл module.php.");
define('query_failed', "Не удалось выполнить запрос");
define('query_failed_2', "к Базе Данных.");
define('missing_zip_extension', "Расширение php-zip не установлено. Пожалуйста включите его что бы использовать модуль обновления.");
?>