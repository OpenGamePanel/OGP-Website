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

define('game_manager', "Менеджер серверов");
define('no_games_to_monitor', "У вас еще нету настроенных серверов, которые могли бы быть просмотрены.");
define('status', "Статус");
define('fail_no_mods', "Конфигурация не была установлена для данной игры. Обратитесь к администратору для решения этой проблемы.");
define('no_game_homes_assigned', "У вас нету привязанных . Обратитесь к администратору для решения этой проблемы.");
define('select_game_home_to_configure', "Выберите сервер который вы хотите настроить.");
define('file_manager', "Файлы");
define('configure_mods', "Настройка конфигураций");
define('install_update_steam', "Установить/Обновить через Steam");
define('install_update_manual', "Установить/Обновить вручную");
define('assign_game_homes', "Назначить игровой сервер");
define('user', "Пользователь");
define('group', "Группа");
define('start', "Запуск");
define('ogp_agent_ip', "OGP Agent IP");
define('max_players', "Макс. кол-во игроков");
define('max', "Макс.");
define('ip_and_port', "IP и порт");
define('available_maps', "Доступные карты");
define('map_path', "Адрес карты");
define('available_parameters', "Доступные параметры");
define('start_server', "Запуск сервера");
define('start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
define('game_type', "Игра");
define('map', "Карта");
define('starting_server', "Запуск сервера, пожалуйста, подождите...");
define('starting_server_settings', "Запуск сервера со следующими параметрами");
define('startup_params', "Параметры запуска");
define('startup_cpu', "Ядро процессора, на котором будет запущен сервер");
define('startup_nice', "Приоритетное значение сервера");
define('game_home', "Путь к директории сервера");
define('server_started', "Сервер запущен успешно.");
define('no_parameter_access', "У Вас нет доступа к этим параметрам.");
define('extra_parameters', "Дополнительные параметры");
define('no_extra_param_access', "У Вас нет доступа к дополнительным параметрам.");
define('extra_parameters_info', "Эти параметры будут прописаны в конце, после запуска сервера.");
define('game_exec_not_found', "Файл запуска сервера %s не был найден.");
define('select_params_and_start', "Выберите параметры запуска и нажмите '%s'.");
define('no_ip_port_pairs_assigned', "Для этого сервера не были привязаны IP и порт. Если у Вас нет доступа к конфигурации сервера то обратитесь к администратору за помощью.");
define('unable_to_get_log', "Невозможно получить лог, retval %s.");
define('server_binary_not_executable', "Файл запуска сервера не доступен. Проверьте права доступа к файлу.");
define('server_not_running_log_found', "Сервер НЕ запущен, но лог файл найден. Примечание: логи могли остаться после прошлого запуска сервера.");
define('ip_port_pair_not_owned', "IP:PORT не принадлежат вам");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Неудовлетворительные значения maxplayers. Максимально доступное количество слотов было установлено.");
define('server_running_not_responding', "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ");
define('update_started', "Обновление начато, пожалуйста подождите...");
define('failed_to_start_steam_update', "Ошибка при обновлении через steam, подробности смотрите в логе.");
define('failed_to_start_rsync_update', "Ошибка при обновлении через Rsync, подробности смотрите в логе.");
define('update_completed', "Обновление прошло успешно.");
define('update_in_progress', "Обновление в процессе, пожалуйста подождите...");
define('refresh_steam_status', "Обновить статус steam");
define('refresh_rsync_status', "Обновить статус rsync");
define('server_running_cant_update', "При запущеном сервере обновление невозможно. Остановите его прежде чем запускать обновление.");
define('xml_steam_error', "Выбранный сервер не поддерживает установку/обновление через steam.");
define('mod_key_not_found_from_xml', "Ключ '%s' не найден в XML файле.");
define('stop_update', "Остановить обновление");
define('statistics', "Статистика");
define('servers', "Серверы");
define('players', "Игроки");
define('current_map', "Текущая карта");
define('stop_server', "Остановить сервер");
define('server_ip_port', "IP:Port сервера");
define('server_name', "Название сервера");
define('player_name', "Имя игрока");
define('score', "Счет");
define('time', "Время");
define('no_rights_to_stop_server', "У вас не достаточно прав для остановки этого сервера.");
define('no_ogp_lgsl_support', "Этот сервер (%s)не поддерживает LGSL и статистика не может быть показана.");
define('server_status', "Статус сервера");
define('server_stopped', "Сервер '%s' был остановлен.");
define('if_want_to_start_homes', "Запускайте сервера из %s.");
define('view_log', "Консоль");
define('if_want_manage', "Настроить сервера можно здесь");
define('columns', "столбцов");
define('group_users', "Группа:");
define('assigned_to', "назначен:");
define('restart_server', "Перезапустить сервер");
define('restarting_server', "Перезапуск сервера, пожалуйста подождите...");
define('server_restarted', "Сервер '%s' перезапущен.");
define('server_not_running', "Сервер не запущен.");
define('address', "Ip адрес");
define('owner', "Владелец");
define('operations', "Операции");
define('search', "Поиск");
define('maps_read_from', "Карты считываются с ");
define('file', "файла");
define('folder', "папка");
define('unable_retrieve_mod_info', "Не удалось получить информацию о моде из БД");
define('unexpected_result_libremote', "Неожиданный результат libremote, пожалуйста, сообщите разработчикам.");
define('unable_get_info', "Не удается получить необходимую информацию для запуска. Блокировка запуска.");
define('server_already_running', "Сервер уже запущен. Если вы не видите сервер в Мониторинге, это может быть связано с...");
define('already_running_stop_server', "Остановка сервера");
define('error_server_already_running', "Ошибка: сервер уже запущен на данном порту");
define('failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('disabled', "отключён");
define('not_found_server', "сервер не найден");
define('rcon_command_title', "RCON команда");
define('has_sent_to', "отправил в");
define('need_set_remote_pass', "требуется установить удалённый пароль");
define('before_sending_rcon_com', "перед отправкой RCON команды");
define('retry', "повтор");
define('page', "страница");
define('server_cant_start', "сервер не может быть запущен");
define('server_cant_stop', "сервер не может быть остановлен");
define('error_occured_remote_host', "Ошибка удалённого сервера");
define('follow_server_status', "следить за состоянием сервера");
define('addons', "аддоны");
define('hostname', "Название сервера");
define('rsync_install', "установить rsync");
define('ping', "пинг");
define('team', "команда");
define('deaths', "смертей");
define('pid', "PID");
define('skill', "скилл");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "игрок");
define('port', "Порт");
define('rcon_presets', "RCON команды");
define('update_from_local_master_server', "Обовить с локального мастер сервера");
define('update_from_selected_rsync_server', "Update from selected rsync server");
define('execute_selected_server_operations', "Выполнить операции на выбранных серверах");
define('execute_operations', "Выполнение операций");
define('account_expiration', "Account expiration");
define('mysql_databases', "MySQL Databases");
define('failed_querying_server', "* Failed querying the server.");
define('query_protocol_not_supported', "* There is no query protocol in OGP that can support this server.");
define('queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('presets_for_game_and_mod', "RCON команды для %s и мода %s");
define('name', "Название");
define('command', "RCON&nbsp;команда");
define('add_preset', "Добавить команду");
define('edit_presets', "Реадктировать команды");
define('del_preset', "Удалить");
define('change_preset', "Изменить");
define('send_command', "Послать команду");
define('starting_copy_with_master_server_named', "Начато копирование с мастер сервером '%s'...");
define('starting_sync_with', "Начало синхронизации с %s...");
define('refresh_interval', "Интервал обновления консоли");
define('finished_manual_update', "Готовые обновление вручную.");
define('failed_to_start_file_download', "Не удалось начать закачку файла.");
define('game_name', "Название игры");
define('dest_dir', "Назначение каталога");
define('remote_server', "Удалённый сервер");
define('file_url', "Файл URL");
define('file_url_info', "URL файла, в который будет загружен, и для несжатых в каталог.");
define('dest_filename', "имя файла назначения");
define('dest_filename_info', "имя файла для конечного файла.");
define('update_server', "Обновление сервера");
define('unavailable', "Недоступен");
define('upload_map_image', "Upload map image");
define('upload_image', "Upload image");
define('jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('check_dev_console', "Error during uploading file, please check the browser developer console.");
define('uploaded_successfully', "Uploaded successfully.");
define('cant_create_folder', "Can't create folder:<br><b>%s</b>");
define('cant_write_file', "Can't write file:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Unknown errors.");
define('directory', "Путь к каталогу");
define('view_player_commands', "View Player Commands");
define('hide_player_commands', "Hide Player Commands");
define('no_online_players', "There are no online players.");
define('invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('auto_update_title_popup', "Steam Auto Update Link");
define('auto_update_popup_html', "<p>Use the link below to check and automatically update your game server via Steam if needed.&nbsp; You can query it using a cronjob or manually initiate the process.</p>");
define('auto_update_copy_me', "Copy");
define('auto_update_copy_me_success', "Copied!");
define('auto_update_copy_me_fail', "Failed to copy. Please manually copy the link.");
define('get_steam_autoupdate_api_link', "Auto Update Link");
?>
