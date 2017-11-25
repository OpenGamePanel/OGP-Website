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

define('game_manager', "Менеджер серверов");
define('no_games_to_monitor', "У вас еще нету настроенных серверов, которые могли бы быть просмотрены.");
define('status', "Статус");
define('fail_no_mods', "Конфигурация не была установлена для данной игры. Обратитесь к администратору для решения этой проблемы.");
define('no_game_homes_assigned', "У Вашей учетной записи вас нет привязанных серверов. Обратитесь к администратору для решения этой проблемы.");
define('select_game_home_to_configure', "Выберите сервер который вы хотите настроить.");
define('file_manager', "Файлы");
define('configure_mods', "Настройка конфигураций");
define('install_update_steam', "Установить/Обновить через Steam");
define('install_update_manual', "Установить/Обновить вручную");
define('assign_game_homes', "Назначить игровой сервер");
define('user', "Пользователь");
define('group', "Группа");
define('start', "Запуск");
define('ogp_agent_ip', "IP Агента OGP");
define('max_players', "Макс. кол-во игроков");
define('max', "Макс.");
define('ip_and_port', "IP и порт");
define('available_maps', "Доступные карты");
define('map_path', "Адрес карты");
define('available_parameters', "Доступные параметры");
define('start_server', "Запуск сервера");
define('start_wait_note', "Запуск сервера может занять некоторое время. Ждите, не закрывайте браузер.");
define('game_type', "Игра");
define('map', "Карта");
define('starting_server', "Запуск сервера, пожалуйста, подождите...");
define('starting_server_settings', "Запуск сервера со следующими параметрами");
define('startup_params', "Параметры запуска");
define('startup_cpu', "Ядро процессора, на котором будет запущен сервер");
define('startup_nice', "Приоритетное значение сервера");
define('game_home', "Путь к серверу");
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
define('server_running_not_responding', "Сервер запущен, но не отвечает, <br> может возникла какая-то проблема, и вы хотите выполнить - ");
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
define('server_id', "ID сервера");
define('player_name', "Имя игрока");
define('score', "Счет");
define('time', "Время");
define('no_rights_to_stop_server', "У вас не достаточно прав для остановки этого сервера.");
define('no_ogp_lgsl_support', "Этот сервер (%s)не поддерживает LGSL и статистика не может быть показана.");
define('server_status', "Статус сервера");
define('server_stopped', "Сервер '%s' был остановлен.");
define('if_want_to_start_homes', "Запускайте сервера из %s.");
define('view_log', "Просмотр журнала");
define('if_want_manage', "Настроить сервера можно здесь");
define('columns', "столбцов");
define('group_users', "Группа:");
define('assigned_to', "Назначен:");
define('restart_server', "Перезапустить сервер");
define('restarting_server', "Перезапуск сервера, пожалуйста подождите...");
define('server_restarted', "Сервер '%s' перезапущен.");
define('server_not_running', "Сервер не запущен.");
define('address', "IP-адрес");
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
define('failed_start_server_code', "Ошибка запуска удаленного сервер. Код ошибки: %s");
define('disabled', "отключён");
define('not_found_server', "Не удалось найти сервер с таким ID");
define('rcon_command_title', "RCON команда");
define('has_sent_to', "отправил в");
define('need_set_remote_pass', "требуется установить удалённый пароль");
define('before_sending_rcon_com', "перед отправкой RCON команды");
define('retry', "Повтор");
define('page', "страница");
define('server_cant_start', "сервер не может быть запущен");
define('server_cant_stop', "сервер не может быть остановлен");
define('error_occured_remote_host', "Ошибка удалённого сервера");
define('follow_server_status', "Вы можете следить за состоянием сервера из");
define('addons', "Аддоны");
define('hostname', "Название сервера");
define('rsync_install', "[Установить rsync]");
define('ping', "пинг");
define('team', "Команда");
define('deaths', "Смертей");
define('pid', "PID");
define('skill', "Скилл");
define('AIBot', "AIBot");
define('steamid', "Steam ID");
define('player', "игрок");
define('port', "Порт");
define('rcon_presets', "RCON команды");
define('update_from_local_master_server', "Обновление с локального Мастер Сервера");
define('update_from_selected_rsync_server', "Обновление с выбранного сервера-rsync");
define('execute_selected_server_operations', "Выполнить операции на выбранных серверах");
define('execute_operations', "Выполнение операций");
define('account_expiration', "Истечение срока действия учетной записи");
define('mysql_databases', "База Данных MySQL");
define('failed_querying_server', "* Не удалось выполнить запрос к серверу.");
define('query_protocol_not_supported', "* В OGP нет протокола запросов, который может поддерживать этот сервер.");
define('queries_disabled_by_setting_disable_queries_after', "Запросы отключены в настройках: Запросы отключены после: %s, потому что есть %s сервера. <br>");
define('presets_for_game_and_mod', "RCON команды для %s и мода %s");
define('name', "Название");
define('command', "RCON&nbsp;команда");
define('add_preset', "Добавить команду");
define('edit_presets', "Редактировать команды");
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
define('upload_map_image', "Загрузить картинку карты");
define('upload_image', "Загрузить картинку");
define('jpg_gif_png_less_than_1mb', "Картинка должна быть jpg, gif или png и не больше 1 MB.");
define('check_dev_console', "Ошибка при загрузке файла, пожалуйста посмотрите консоль разработчика браузера.");
define('uploaded_successfully', "Загрузка завершена.");
define('cant_create_folder', "Не удается создать папку: <br><b>%s</b>");
define('cant_write_file', "Не удается записать файл: <br><b>%s</b>");
define('exceeded_php_directive', "Превышена директива PHP. <br><b>%s</b>.");
define('unknown_errors', "Неизвестная ошибка.");
define('directory', "Путь к каталогу");
define('view_player_commands', "Показать игроков 'status'");
define('hide_player_commands', "Скрыть игроков");
define('no_online_players', "Нит ни одного игрока online");
define('invalid_game_mod_id', "Не правильный ID Игры или Мода");
define('auto_update_title_popup', "Ссылка для автоматического обновления Steam");
define('auto_update_popup_html', "<p>Используйте приведенную ниже ссылку, чтобы проверить и автоматически обновить игровой сервер через Steam, если необходимо.&nbsp; Вы можете это сделать через планировщик задач-cron или вручную выполнив это. </p>");
define('auto_update_copy_me', "Копировать");
define('auto_update_copy_me_success', "Скопировано!");
define('auto_update_copy_me_fail', "Ошибка копирования. Пожалуйста, скопируйте линк вручную.");
define('get_steam_autoupdate_api_link', "Ссылка на автообновление");
define('update_attempt_from_nonmaster_server', "Пользователь %sпопытался обновить home_id %dс сервер,  не являющегося мастером. (Home ID: %d)");
define('attempting_nonmaster_update', "Вы пытаетесь обновить этот сервер с не мастера сервера.");
define('cannot_update_from_own_self', "Обновление с локального сервера не может выполняться на мастер-сервере.");
define('show_server_id', "Показать ID серверов");
define('hide_server_id', "Скрыть ID серверов");
define('edit_configuration_files', "Edit Configuration Files");
define('admin', "Admin");
define('cid', "CID");
define('phan', "Phantom");
define('sec', "Seconds");
define('unknown_rsync_mirror', "You attempted to start an update from a mirror which doesn't exist.");
define('go_to_custom_fields', "Go to Custom Fields");
?>
