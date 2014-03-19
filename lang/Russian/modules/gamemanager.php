<?php

$lang['game_monitor'] = "Мониторинг";
$lang['game_manager'] = "Менеджер серверов";
$lang['no_games_to_monitor'] = "У вас еще нету настроенных серверов, которые могли бы быть просмотрены.";
$lang['status'] = "Статус";

// server_manager.php
$lang['fail_no_mods'] = "Конфигурация не была установлена для данной игры. Обратитесь к администратору для решения этой проблемы.";
$lang['no_game_homes_assigned'] = "У вас нету привязанных . Обратитесь к администратору для решения этой проблемы.";
$lang['select_game_home_to_configure'] = "Выберите сервер который вы хотите настроить.";
$lang['file_manager'] = "Файлы";
$lang['configure_mods'] = "Настройка конфигураций";
$lang['install_update_steam'] = "Установить/Обновить через Steam";
$lang['install_update_manual'] = "Установить/Обновить вручную";
$lang['assign_game_homes'] = "Назначить игровой сервер";
$lang['user'] = "Пользователь";
$lang['group'] = "Группа";
$lang['start'] = "Запуск";

// start_game.php
$lang['ogp_agent_ip'] = "OGP Agent IP";
$lang['max_players'] = "Макс. кол-во игроков";
$lang['max'] = "Макс.";
$lang['ip_and_port'] = "IP и порт";
$lang['available_maps'] = "Доступные карты";
$lang['map_path'] = "Адрес карты";
$lang['available_parameters'] = "Доступные параметры";
$lang['start_server'] = "Запуск сервера";
$lang['start_wait_note'] = "Запуск сервера может занять некоторое время, пожалуйста, подождите немного, не закрывая окно браузера.";
$lang['game_type'] = "Игра";
$lang['map'] = "Карта";
$lang['starting_server'] = "Запуск сервера, пожалуйста, подождите...";
$lang['starting_server_settings'] = "Запуск сервера со следующими параметрами";
$lang['startup_params'] = "Параметры запуска";
$lang['startup_cpu'] = "Ядро процессора, на котором будет запущен сервер";
$lang['startup_nice'] = "Приоритетное значение сервера";
$lang['game_home'] = "Сервер";
$lang['server_started'] = "Сервер запущен успешно.";
$lang['no_parameter_access'] = "У Вас нет доступа к этим параметрам.";
$lang['extra_parameters'] = "Дополнительные параметры";
$lang['no_extra_param_access'] = "У Вас нет доступа к дополнительным параметрам.";
$lang['extra_parameters_info'] = "Эти параметры будут прописаны в конце, после запуска сервера.";
$lang['game_exec_not_found'] = "Файл запуска сервера %s не был найден.";
$lang['select_params_and_start'] = "Выберите параметры запуска и нажмите '%s'.";
$lang['no_ip_port_pairs_assigned'] = "Для этого сервера не были привязаны IP и порт. Если у Вас нет доступа к конфигурации сервера то обратитесь к администратору за помощью.";
$lang['unable_to_get_log'] = "Невозможно получить лог, retval %s.";
$lang['server_binary_not_executable'] = "Файл запуска сервера не доступен. Проверьте права доступа к файлу.";
$lang['server_not_running_log_found'] = "Сервер НЕ запущен, но лог файл найден. Примечание: логи могли остаться после прошлого запуска сервера.";
$lang['server_running_not_responding'] = "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ";

// update_game.php
$lang['update_started'] = "Обновление начато, пожалуйста подождите...";
$lang['failed_to_start_steam_update'] = "Ошибка при обновлении через steam, подробности смотрите в логе.";
$lang['failed_to_start_rsync_update'] = "Ошибка при обновлении через Rsync, подробности смотрите в логе.";
$lang['update_completed'] = "Обновление прошло успешно.";
$lang['update_in_progress'] = "Обновление в процессе, пожалуйста подождите...";
$lang['refresh_steam_status'] = "Обновить статус steam";
$lang['refresh_rsync_status'] = "Обновить статус rsync";
$lang['server_running_cant_update'] = "При запущеном сервере обновление невозможно. Остановите его прежде чем запускать обновление.";
$lang['xml_steam_error'] = "Выбранный сервер не поддерживает установку/обновление через steam.";
$lang['mod_key_not_found_from_xml'] = "Ключ '%s' не найден в XML файле.";
$lang['stop_update'] = "Остановить обновление";

// game_monitor.php
$lang['statistics'] = "Статистика";
$lang['servers'] = "Сервера";
$lang['players'] = "Игроки";
$lang['current_map'] = "Текущая карта";
$lang['stop_server'] = "Остановить сервер";
$lang['server_ip_port'] = "IP:Port сервера";
$lang['port'] = "Port";
$lang['server_name'] = "Название сервера";
$lang['player_name'] = "Имя игрока";
$lang['score'] = "Счет";
$lang['time'] = "Время";
$lang['no_rights_to_stop_server'] = "У вас не достаточно прав для остановки этого сервера.";
$lang['no_ogp_lgsl_support'] = "Этот сервер (%s)не поддерживает LGSL и статистика не может быть показана.";
$lang['server_status'] = "Сервер %s сейчас %s.";
$lang['server_stopped'] = "Сервер '%s' был остановлен.";
$lang['if_want_to_start_homes'] = "Запускайте сервера из %s.";
$lang['view_log'] = "Консоль";
$lang['if_want_manage'] = "Настроить сервера можно здесь";
$lang['columns'] = "столбцов";
$lang['group_users'] = "Группа пользователей:";
$lang['restart_server'] = "Перезапустить сервер";
$lang['restarting_server'] = "Перезапуск сервера, пожалуйста подождите...";
$lang['server_restarted'] = "Сервер '%s' перезапущен.";
$lang['server_not_running'] = "Сервер не запущен.";
$lang['address'] = "Ip адрес";
$lang['owner'] = "Владелец";
$lang['operations'] = "Операции";
$lang['search'] = "Поиск";
$lang['maps_read_from'] = "Карты считываются с ";
$lang['file'] = "файла";
$lang['folder'] = "папка";
$lang['rcon_command_title'] = "RCON команда";
$lang['rcon_presets'] = "RCON команды";
$lang['account_expiration'] = "Account expiration";
$lang['mysql_databases'] = "MySQL Databases";
$lang['failed_querying_server'] = "* Failed querying the server.";
$lang['query_protocol_not_supported'] = "* There is no query protocol in OGP that can support this server.";
$lang['queries_disabled_by_setting_disable_queries_after'] = "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>";

$lang['execute_selected_server_operations'] = "Выполнить операции на выбранных серверах";
$lang['execute_operations'] = "Выполнение операций";
$lang["ip_port_pair_not_owned"] = "IP:PORT не принадлежат вам";
$lang["unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set"] = "Неудовлетворительные значения maxplayers. Максимально доступное количество слотов было установлено.";
$lang["unable_retrieve_mod_info"] = "Не удалось получить информацию о моде из БД";
$lang["unexpected_result_libremote"] = "Неожиданный результат libremote, пожалуйста, сообщите разработчикам.";
$lang["unable_get_info"] = "Не удается получить необходимую информацию для запуска. Блокировка запуска.";
$lang["server_already_running"] = "Сервер уже запущен. Если вы не видите сервер в Мониторинге, это может быть связано с...";
$lang["already_running_stop_server"] = "Остановка сервера";
$lang["error_server_already_running"] = "Ошибка: сервер уже запущен на данном порту";
$lang["failed_start_server_code"] = "Не удалось запустить удалённый сервер. Ошибка:";
$lang["disabled"] = "отключён";
$lang["not_found_server"] = "сервер не найден";
$lang["has_sent_to"] = "отправил в";
$lang["need_set_remote_pass"] = "требуется установить удалённый пароль";
$lang["before_sending_rcon_com"] = "перед отправкой RCON команды";
$lang["agent_offline"] = "agent отключён";
$lang["retry"] = "повтор";
$lang["page"] = "страница";
$lang["server_cant_start"] = "сервер не может быть запущен";
$lang["server_cant_stop"] = "сервер не может быть остановлен";
$lang["error_occured_remote_host"] = "Ошибка удалённого сервера";
$lang["follow_server_status"] = "следить за состоянием сервера";
$lang["addons"] = "аддоны";
$lang["hostname"] = "Название сервера";
$lang["rsync_install"] = "установить rsync";
$lang["ping"] = "пинг";
$lang["team"] = "команда";
$lang["deaths"] = "смертей";
$lang["pid"] = "pid";
$lang["skill"] = "скилл";
$lang["AIBot"] = "AIBot";
$lang["steamid"] = "Steam ID";
$lang["player"] = "игрок";
$lang['update_from_local_master_server'] = "Обовить с локального мастер сервера.";

// rcon_presets.php
$lang['presets_for_game_and_mod'] = "RCON команды для %s и мода %s";
$lang['name'] = "Название";
$lang['command'] = "RCON&nbsp;команда";

$lang['add_preset'] = "Добавить команду";
$lang['edit_presets'] = "Реадктировать команды";
$lang['del_preset'] = "Удалить";
$lang['change_preset'] = "Изменить";
$lang["send_command"] = "Послать команду";

//rsync_install.php
$lang['starting_copy_with_master_server_named'] = "Начато копирование с мастер сервером '%s'...";
$lang['starting_sync_with'] = "Начало синхронизации с %s...";
$lang['refresh_interval'] = "Интервал обновления консоли";

// update_server_manual.php
$lang['finished_manual_update'] = "Готовые обновление вручную.";
$lang['failed_to_start_file_download'] = "Не удалось запустить загрузку файлов";
$lang['game_name'] = "Название игры";
$lang['dest_dir'] = "Назначение каталога";
$lang['remote_server'] = "Удаленный сервер";
$lang['file_url'] = "Файл URL";
$lang['file_url_info'] = "URL файла, в который будет загружен, и для несжатых в каталог.";
$lang['one_dir_down'] = "Перейти Сжимать вниз перед извлечением";
$lang['dest_filename'] = "имя файла назначения";
$lang['dest_filename_info'] = "имя файла для конечного файла.";
$lang['update_server'] = "Обновление сервера";
$lang['unavailable'] = "Недоступен";

?>