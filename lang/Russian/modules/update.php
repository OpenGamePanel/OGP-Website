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
define('OGP_LANG_curl_needed', "Для отображения этой страницы требуется модуль PHP curl.");
define('OGP_LANG_no_access', "У вас не достаточно прав для отображения этой страницы.");
define('OGP_LANG_dwl_update', "Загрузка обновления...");
define('OGP_LANG_dwl_complete', "Загрузка завершена");
define('OGP_LANG_install_update', "Установка обновления...");
define('OGP_LANG_update_complete', "Обновление установлено");
define('OGP_LANG_ignored_files', "%s ignored file(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Файлы которые не будут обновляться (Черный список): <br>%s");
define('OGP_LANG_latest_version', "Последняя версия");
define('OGP_LANG_panel_version', "Версия панели");
define('OGP_LANG_update_now', "Обновить сейчас");
define('OGP_LANG_the_panel_is_up_to_date', "Панель обновлена!");
define('OGP_LANG_files_overwritten', "Перезаписано файлов - %s");
define('OGP_LANG_files_not_overwritten', "%sфайл НЕ перезаписан, так как он в черном списке");
define('OGP_LANG_can_not_update_non_writable_files', "Не возможно выполнить Обновление так как файл/папка не доступны для записи");
define('OGP_LANG_dwl_failed', "Ссылка для скачивания недоступна.: \"%s\".<br> Попробуйте позже. ");
define('OGP_LANG_temp_folder_not_writable', "Не возможно выполнить загрузку сюда, потому что Apache не имеет права на запись во временную директорию(%s).");
define('OGP_LANG_base_dir_not_writable', "Панель не обновлена, потому что Apache не имеет права на запись в папку \"%s\".");
define('OGP_LANG_new_files', "Новых файлов %s");
define('OGP_LANG_updated_files', "Обновленные файлы:<br>%s");
define('OGP_LANG_select_mirror', "Выбор зеркала");
define('OGP_LANG_view_changes', "Посмотреть изменения");
define('OGP_LANG_updating_modules', "Обновление модулей");
define('OGP_LANG_updating_finished', "Обновление завершено");
define('OGP_LANG_updated_module', "Модуль обовлён: '%s'.");
define('OGP_LANG_blacklist_files', "Черный список файлов");
define('OGP_LANG_blacklist_files_info', "Все отмеченные файлы не будут обновляться.");
define('OGP_LANG_save_to_blacklist', "Сохранить Черный список");
define('OGP_LANG_no_new_updates', "Обновлений не обнаружено.");
define('OGP_LANG_module_file_missing', "В каталоге отсутствует файл module.php.");
define('OGP_LANG_query_failed', "Не удалось выполнить запрос");
define('OGP_LANG_query_failed_2', "к Базе Данных.");
define('OGP_LANG_missing_zip_extension', "Расширение php-zip не установлено. Пожалуйста включите его что бы использовать модуль обновления.");
?>