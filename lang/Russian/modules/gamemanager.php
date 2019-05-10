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

define('OGP_LANG_no_games_to_monitor', "У вас еще нету настроенных серверов, которые могли бы быть просмотрены.");
define('OGP_LANG_status', "Статус");
define('OGP_LANG_fail_no_mods', "Конфигурация не была установлена для данной игры. Обратитесь к администратору для решения этой проблемы.");
define('OGP_LANG_no_game_homes_assigned', "У вас нет серверов назначенных специально для вашего аккаунта.");
define('OGP_LANG_select_game_home_to_configure', "Выберите сервер который вы хотите настроить.");
define('OGP_LANG_file_manager', "Файлы");
define('OGP_LANG_configure_mods', "Настройка конфигураций");
define('OGP_LANG_install_update_steam', "Установить/Обновить через Steam");
define('OGP_LANG_install_update_manual', "Установить/Обновить вручную");
define('OGP_LANG_assign_game_homes', "Назначить игровой сервер");
define('OGP_LANG_user', "Пользователь");
define('OGP_LANG_group', "Группа");
define('OGP_LANG_start', "Запуск");
define('OGP_LANG_ogp_agent_ip', "IP Агента OGP");
define('OGP_LANG_max_players', "Макс. кол-во игроков");
define('OGP_LANG_max', "Макс.");
define('OGP_LANG_ip_and_port', "IP и порт");
define('OGP_LANG_available_maps', "Доступные карты");
define('OGP_LANG_map_path', "Адрес карты");
define('OGP_LANG_available_parameters', "Доступные параметры");
define('OGP_LANG_start_server', "Запуск сервера");
define('OGP_LANG_start_wait_note', "Запуск сервера может занять некоторое время. Ждите, не закрывайте браузер.");
define('OGP_LANG_game_type', "Игра");
define('OGP_LANG_map', "Карта");
define('OGP_LANG_starting_server', "Запуск сервера, пожалуйста, подождите...");
define('OGP_LANG_starting_server_settings', "Запуск сервера со следующими параметрами");
define('OGP_LANG_startup_params', "Параметры запуска");
define('OGP_LANG_startup_cpu', "Ядро процессора, на котором будет запущен сервер");
define('OGP_LANG_startup_nice', "Приоритетное значение сервера");
define('OGP_LANG_game_home', "Путь к серверу");
define('OGP_LANG_server_started', "Сервер запущен успешно.");
define('OGP_LANG_no_parameter_access', "У Вас нет доступа к этим параметрам.");
define('OGP_LANG_extra_parameters', "Дополнительные параметры");
define('OGP_LANG_no_extra_param_access', "У Вас нет доступа к дополнительным параметрам.");
define('OGP_LANG_extra_parameters_info', "Эти параметры будут прописаны в конце, после запуска сервера.");
define('OGP_LANG_game_exec_not_found', "Файл запуска сервера %s не был найден.");
define('OGP_LANG_select_params_and_start', "Выберите параметры запуска и нажмите '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Для этого сервера не были привязаны IP и порт. Если у Вас нет доступа к конфигурации сервера то обратитесь к администратору за помощью.");
define('OGP_LANG_unable_to_get_log', "Невозможно получить лог, retval %s.");
define('OGP_LANG_server_binary_not_executable', "Файл запуска сервера не доступен. Проверьте права доступа к файлу.");
define('OGP_LANG_server_not_running_log_found', "Сервер НЕ запущен, но лог файл найден. Примечание: логи могли остаться после прошлого запуска сервера.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT не принадлежат вам");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Неудовлетворительные значения maxplayers. Максимально доступное количество слотов было установлено.");
define('OGP_LANG_server_running_not_responding', "Сервер запущен, но не отвечает, <br> может возникла какая-то проблема, и вы хотите выполнить - ");
define('OGP_LANG_update_started', "Обновление начато, пожалуйста подождите...");
define('OGP_LANG_failed_to_start_steam_update', "Ошибка при обновлении через steam, подробности смотрите в логе.");
define('OGP_LANG_failed_to_start_rsync_update', "Ошибка при обновлении через Rsync, подробности смотрите в логе.");
define('OGP_LANG_update_completed', "Обновление прошло успешно.");
define('OGP_LANG_update_in_progress', "Обновление в процессе, пожалуйста подождите...");
define('OGP_LANG_refresh_steam_status', "Обновить статус steam");
define('OGP_LANG_refresh_rsync_status', "Обновить статус Rsync");
define('OGP_LANG_server_running_cant_update', "При запущеном сервере обновление невозможно. Остановите его прежде чем запускать обновление.");
define('OGP_LANG_xml_steam_error', "Выбранный сервер не поддерживает установку/обновление через steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Ключ '%s' не найден в XML файле.");
define('OGP_LANG_stop_update', "Остановить обновление");
define('OGP_LANG_statistics', "Статистика");
define('OGP_LANG_servers', "Серверы");
define('OGP_LANG_players', "Игроки");
define('OGP_LANG_current_map', "Текущая карта");
define('OGP_LANG_stop_server', "Остановить сервер");
define('OGP_LANG_server_ip_port', "IP:Port сервера");
define('OGP_LANG_server_name', "Название сервера");
define('OGP_LANG_server_id', "ID сервера");
define('OGP_LANG_player_name', "Имя игрока");
define('OGP_LANG_score', "Счет");
define('OGP_LANG_time', "Время");
define('OGP_LANG_no_rights_to_stop_server', "У вас не достаточно прав для остановки этого сервера.");
define('OGP_LANG_no_ogp_lgsl_support', "Этот сервер (%s)не поддерживает LGSL и статистика не может быть показана.");
define('OGP_LANG_server_status', "Статус сервера");
define('OGP_LANG_server_stopped', "Сервер '%s' был остановлен.");
define('OGP_LANG_if_want_to_start_homes', "Запускайте сервера из %s.");
define('OGP_LANG_view_log', "Просмотр журнала");
define('OGP_LANG_if_want_manage', "Настроить сервера можно здесь");
define('OGP_LANG_columns', "столбцов");
define('OGP_LANG_group_users', "Группа:");
define('OGP_LANG_assigned_to', "Назначен:");
define('OGP_LANG_restart_server', "Перезапустить сервер");
define('OGP_LANG_restarting_server', "Перезапуск сервера, пожалуйста подождите...");
define('OGP_LANG_server_restarted', "Сервер '%s' перезапущен.");
define('OGP_LANG_server_not_running', "Сервер не запущен.");
define('OGP_LANG_address', "IP-адрес");
define('OGP_LANG_owner', "Владелец");
define('OGP_LANG_operations', "Операции");
define('OGP_LANG_search', "Поиск");
define('OGP_LANG_maps_read_from', "Карты считываются с ");
define('OGP_LANG_file', "файла");
define('OGP_LANG_folder', "папка");
define('OGP_LANG_unable_retrieve_mod_info', "Не удалось получить информацию о моде из БД");
define('OGP_LANG_unexpected_result_libremote', "Неожиданный результат libremote, пожалуйста, сообщите разработчикам.");
define('OGP_LANG_unable_get_info', "Не удается получить необходимую информацию для запуска. Блокировка запуска.");
define('OGP_LANG_server_already_running', "Сервер уже запущен. Если вы не видите сервер в Мониторинге, это может быть связано с...");
define('OGP_LANG_already_running_stop_server', "Остановка сервера");
define('OGP_LANG_error_server_already_running', "Ошибка: сервер уже запущен на данном порту");
define('OGP_LANG_failed_start_server_code', "Ошибка запуска удаленного сервер. Код ошибки: %s");
define('OGP_LANG_disabled', "отключён");
define('OGP_LANG_not_found_server', "Не удалось найти сервер с таким ID");
define('OGP_LANG_rcon_command_title', "RCON команда");
define('OGP_LANG_has_sent_to', "отправил в");
define('OGP_LANG_need_set_remote_pass', "требуется установить удалённый пароль");
define('OGP_LANG_before_sending_rcon_com', "перед отправкой RCON команды");
define('OGP_LANG_retry', "Повтор");
define('OGP_LANG_page', "страница");
define('OGP_LANG_server_cant_start', "сервер не может быть запущен");
define('OGP_LANG_server_cant_stop', "сервер не может быть остановлен");
define('OGP_LANG_error_occured_remote_host', "Ошибка удалённого сервера");
define('OGP_LANG_follow_server_status', "Вы можете следить за состоянием сервера из");
define('OGP_LANG_addons', "Аддоны");
define('OGP_LANG_hostname', "Название сервера");
define('OGP_LANG_rsync_install', "[Установить rsync]");
define('OGP_LANG_ping', "пинг");
define('OGP_LANG_team', "Команда");
define('OGP_LANG_deaths', "Смертей");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Скилл");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "игрок");
define('OGP_LANG_port', "Порт");
define('OGP_LANG_rcon_presets', "RCON команды");
define('OGP_LANG_update_from_local_master_server', "Обновление с локального Мастер Сервера");
define('OGP_LANG_update_from_selected_rsync_server', "Обновление с выбранного сервера-rsync");
define('OGP_LANG_execute_selected_server_operations', "Выполнить операции на выбранных серверах");
define('OGP_LANG_execute_operations', "Выполнение операций");
define('OGP_LANG_account_expiration', "Истечение срока действия учетной записи");
define('OGP_LANG_mysql_databases', "База Данных MySQL");
define('OGP_LANG_failed_querying_server', "* Не удалось выполнить запрос к серверу.");
define('OGP_LANG_query_protocol_not_supported', "* В OGP нет протокола запросов, который может поддерживать этот сервер.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Запросы отключены в настройках: Запросы отключены после: %s, потому что есть %s сервера. <br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON команды для %s и мода %s");
define('OGP_LANG_name', "Название");
define('OGP_LANG_command', "RCON&nbsp;команда");
define('OGP_LANG_add_preset', "Добавить команду");
define('OGP_LANG_edit_presets', "Редактировать команды");
define('OGP_LANG_del_preset', "Удалить");
define('OGP_LANG_change_preset', "Изменить");
define('OGP_LANG_send_command', "Послать команду");
define('OGP_LANG_starting_copy_with_master_server_named', "Начато копирование с мастер сервером '%s'...");
define('OGP_LANG_starting_sync_with', "Начало синхронизации с %s...");
define('OGP_LANG_refresh_interval', "Интервал обновления консоли");
define('OGP_LANG_finished_manual_update', "Готовые обновление вручную.");
define('OGP_LANG_failed_to_start_file_download', "Не удалось начать закачку файла.");
define('OGP_LANG_game_name', "Название игры");
define('OGP_LANG_dest_dir', "Назначение каталога");
define('OGP_LANG_remote_server', "Удалённый сервер");
define('OGP_LANG_file_url', "Файл URL");
define('OGP_LANG_file_url_info', "URL файла, в который будет загружен, и для несжатых в каталог.");
define('OGP_LANG_dest_filename', "имя файла назначения");
define('OGP_LANG_dest_filename_info', "имя файла для конечного файла.");
define('OGP_LANG_update_server', "Обновление сервера");
define('OGP_LANG_unavailable', "Недоступен");
define('OGP_LANG_upload_map_image', "Загрузить картинку карты");
define('OGP_LANG_upload_image', "Загрузить картинку");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Картинка должна быть jpg, gif или png и не больше 1 MB.");
define('OGP_LANG_check_dev_console', "Ошибка при загрузке файла, пожалуйста посмотрите консоль разработчика браузера.");
define('OGP_LANG_uploaded_successfully', "Загрузка завершена.");
define('OGP_LANG_cant_create_folder', "Не удается создать папку: <br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Не удается записать файл: <br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Превышена директива PHP. <br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Неизвестная ошибка.");
define('OGP_LANG_directory', "Путь к каталогу");
define('OGP_LANG_view_player_commands', "Показать игроков 'status'");
define('OGP_LANG_hide_player_commands', "Скрыть игроков");
define('OGP_LANG_no_online_players', "Нит ни одного игрока online");
define('OGP_LANG_invalid_game_mod_id', "Не правильный ID Игры или Мода");
define('OGP_LANG_auto_update_title_popup', "Ссылка для автоматического обновления Steam");
define('OGP_LANG_auto_update_popup_html', "<p>Используйте приведенную ниже ссылку, чтобы проверить и автоматически обновить игровой сервер через Steam, если необходимо.&nbsp; Вы можете это сделать через планировщик задач-cron или вручную выполнив это. </p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Копировать");
define('OGP_LANG_auto_update_copy_me_success', "Скопировано!");
define('OGP_LANG_auto_update_copy_me_fail', "Ошибка копирования. Пожалуйста, скопируйте линк вручную.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Ссылка на автообновление");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Пользователь %sпопытался обновить home_id %dс сервер,  не являющегося мастером. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Вы пытаетесь обновить этот сервер с не мастера сервера.");
define('OGP_LANG_cannot_update_from_own_self', "Обновление с локального сервера не может выполняться на мастер-сервере.");
define('OGP_LANG_show_server_id', "Показать ID серверов");
define('OGP_LANG_hide_server_id', "Скрыть ID серверов");
define('OGP_LANG_edit_configuration_files', "Редактировать конфигурационный файл");
define('OGP_LANG_admin', "Админ");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Фантом");
define('OGP_LANG_sec', "Секунд");
define('OGP_LANG_unknown_rsync_mirror', "Вы попытались запустить обновление с зеркала, которого не существует.");
define('OGP_LANG_custom_fields', "Кастомные поля");
?>
