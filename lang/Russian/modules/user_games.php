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

define('add_mods_note', "Вам нужно добавить конфигурации для сервера. Это можно сделать в настройках сервера.");
define('game_servers', "Игровые Сервера");
define('game_path', "Путь");
define('game_path_info', "Полный и абсолютный путь к серверу. Пример /home/ogpbot/OGP_User_Files/My_Server");
define('game_server_name_info', "Название может помочь определить сервер.");
define('control_password', "Пароль управления");
define('control_password_info', "Пароль используется для управления сервером, как RCON например. Если оставить пустым, то будут использоваться другие методы.");
define('add_game_home', "Добавить игровой сервер");
define('game_path_empty', "Путь к серверу не может быть пустым.");
define('game_home_added', "Сервер добавлен успешно. Перенаправление на страницу редактирования...");
define('failed_to_add_home_to_db', "Ошибка добавления сервера в базу данных. Ошибка: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Внимание!</b> Агент в автономном режиме не может получить тип ОС и архитектуры,<br> Показаны серверы для всех платформ:");
define('select_remote_server', "Выберите удаленный хост");
define('no_remote_servers_configured', "Не добавлено ни одного физического сервера");
define('no_game_configurations_found', "Файлы конфигурации не найдены");
define('game_configurations', "Установка конфигураций игры");
define('add_remote_server', "Добавить физический сервер");
define('wine_games', "Wine Games");
define('home_path', "Путь к серверу");
define('change_home_info', "Путь установленного сервера. Например: /home/ogp/my_server/");
define('game_server_name', "Название игрового сервера");
define('change_name_info', "Название может помочь определить сервер.");
define('game_control_password', "Пароль управления");
define('change_control_password_info', "Пароль используется для управления сервером, как RCON например.");
define('available_mods', "Доступные конфигурации");
define('note_no_mods', "Вы не выбрали ни одной конфигурации. Установите конфигурацию, прежде чем пользователи смогут использовать сервер.");
define('change_home', "Сохранить путь");
define('change_control_password', "Сохранить пароль управления");
define('change_name', "Сохранить название");
define('add_mod', "Добавить конфигурацию");
define('set_ip', "Сохранить IP");
define('ips_and_ports', "IP и порты");
define('mod_name', "Название конфига");
define('max_players', "Лимит игроков");
define('extra_cmd_line_args', "Дополнительные команды");
define('extra_cmd_line_info', "Дополнительные команды позволяют вам вводить любые значения, которые будут прописаны при запуске сервера.");
define('cpu_affinity', "Ядро процессора");
define('nice_level', "Приоритет сервера");
define('set_options', "Сохранить");
define('remove_mod', "Удалить конфигурацию");
define('mods', "Конфигурация");
define('ip', "IP");
define('port', "Порт");
define('no_ip_ports_assigned', "Как минимум один IP:Порт должны быть привязаны к серверу.");
define('successfully_assigned_ip_port', "IP:Port Удачно привязаны к серверу.");
define('port_range_error', "Значение порта должно быть между 0 и 65535.");
define('failed_to_assing_mod_to_home', "Не удалось привязать конфигурацию с id %d к серверу.");
define('successfully_assigned_mod_to_home', "Конфигурация была удачно привязана к id %d серверу.");
define('successfully_modified_mod', "Конфигурация сохранена успешно.");
define('back_to_game_monitor', "Назад к Мониторингу");
define('back_to_game_servers', "Перейти к Игровым Серверам");
define('user_id_main', "Основные владельцы");
define('change_user_id_main', "Сменить основного владельца");
define('change_user_id_main_info', "Основные владельцы сервера.");
define('server_ftp_password', "FTP-пароли");
define('change_ftp_password', "Сохранить пароля FTP");
define('change_ftp_password_info', "Это пароль для входа на FTP-сервер для этого игрового сервера.");
define('Delete_old_user_assigned_homes', "Удалить привязку сервера для всех текущих пользователей.");
define('editing_home_called', "Редактирование сервера");
define('control_password_updated_successfully', "Пароль управления успешно обновлен");
define('control_password_update_failed', "Не удалось обновить Пароль управления");
define('successfully_changed_game_server', "Игровой сервер успешно изменен");
define('error_ocurred_on_remote_server', "Ошибка на удаленном сервере,");
define('ftp_password_can_not_be_changed', "FTP пароль не возможно изменить");
define('ftp_can_not_be_switched_on', "FTP не возможно перевести в режим ON");
define('ftp_can_not_be_switched_off', "FTP не возможно перевести в режим OFF");
define('invalid_home_id_entered', "Не верно введен home id");
define('ip_port_already_in_use', "%s:%sуже используется. Выберите другой.");
define('successfully_assigned_ip_port_to_server_id', "IP-порт успешно назначены для сервера %s:%s c ID - %s");
define('no_ip_addresses_configured', "На Вашем игровом сервер нет настроенных IP-адресов. Вы можете настроить их из ");
define('server_page', "Станица серверов");
define('successfully_removed_mod', "Игровой мод успешно удален.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Предупреждение - Агент Выключен, Значение CPU по умолчанию - 1.");
define('mod_install_cmds', "Установка мода CMDs");
define('cmds_for', "Команды для");
define('preinstall_cmds', "Команды предустановкы");
define('postinstall_cmds', "Команды после установки");
define('edit_preinstall_cmds', "Редактировать Команды предустановкы");
define('edit_postinstall_cmds', "Редактировать Команды после установки");
define('save_as_default_for_this_mod', "Сохранить по умолчанию для этого мода");
define('empty', "пусто");
define('master_server_for_clon_update', "Мастер-сервер для локального обновления");
define('set_as_master_server', "Установить как Мастер-сервер");
define('set_as_master_server_for_local_clon_update', "Установить как Мастер-сервер для локального обновления");
define('only_available_for', "Доступно только для '%s' размещенный на удаленном сервере '%s'.");
define('ftp_on', "Включить FTP");
define('ftp_off', "Выключить FTP");
define('change_ftp_account_status', "Изменение статуса FTP аккаунта");
define('change_ftp_account_status_info', "Как только учетная запись FTP включена или отключена, Он добавляется или удаляется из базы данных FTP.");
define('server_ftp_login', "FTP Логин");
define('change_ftp_login_info', "Измените FTP Логин вписав в поле свой.");
define('change_ftp_login', "Изменить FTP Логин");
define('ftp_login_can_not_be_changed', "Невозможно изменить FTP Логин");
define('server_is_running_change_addresses_not_available', "Сервер сейчас запущен, не возможно сменить IP.");
define('change_game_type', "Изменить тип игры");
define('change_game_type_info', "Изменяя тип игры, текущая конфигурация мода будет удалена.");
define('force_mod_on_this_address', "Force mod on this address");
define('successfully_assigned_mod_to_address', "Мод был удачно привязан к адресу");
define('switch_mods', "Переключить мод");
define('switch_mod_for_address', "Изменить мод для адреса %s");
define('invalid_path', "Неверный Путь");
define('add_new_game_home', "Добавить новый сервер");
define('no_game_homes_found', "Игровых серверов не обнаружено");
define('available_game_homes', "Доступные игровые сервера");
define('home_id', "ID Сервера");
define('game_server', "Игровой сервер");
define('game_type', "Игра");
define('game_home', "Путь к серверу");
define('game_home_name', "Название игрового сервера");
define('clone', "Копировать");
define('unassign', "Отменить");
define('access_rights', "Права доступа");
define('assigned_homes', "Уже назначенные сервера");
define('assign', "Назначить");
define('allow_updates', "Разрешить обновление игры");
define('allow_updates_info', "Разрешить пользователю обновлять игу, если это доступно.");
define('allow_file_management', "Доступ к файлам");
define('allow_file_management_info', "Разрешить пользователю доступ к файлам сервера через модуль.");
define('allow_parameter_usage', "Разрешить использование параметров запуска");
define('allow_parameter_usage_info', "Разрешить пользователю использовать заданные параметры запуска.");
define('allow_extra_params', "Разрешить дополнительные параметры");
define('allow_extra_params_info', "Разрешить пользователю использовать дополнительные параметры запуска.");
define('allow_ftp', "Разрешить FTP");
define('allow_ftp_info', "Показывать информацию о доступе к FTP пользователю.");
define('allow_custom_fields', "Разрешить дополнительные команды");
define('allow_custom_fields_info', "Позволяет пользователю получать доступ к дополнительным командам игрового сервера, если таковые имеются.");
define('select_home', "Выбрать сервер для назначения");
define('assign_new_home_to_user', "Назначить новый сервер пользователю  %s");
define('assign_new_home_to_group', "Назначить новый сервер группе %s");
define('assigned_home_to_user', "Сервер привязан (ID: %d) к пользователю %s.");
define('assigned_home_to_group', "Сервер привязан(ID: %d) к группе %s.");
define('unassigned_home_from_user', "Назначение сервера (ID: %d) отменено для пользователя%s.");
define('unassigned_home_from_group', "Назначение сервера (ID: %d) отменено для группы %s.");
define('no_homes_assigned_to_user', "Привязанных серверов для пользователя %s нет.");
define('no_homes_assigned_to_group', "Привязанных серверов для группы %s нет.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "Нет больше серверов, которые можно привязать к данному пользователю");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "Нет больше серверов, которые можно привязать к данной группе");
define('you_can_add_a_new_game_server_from', "Вы можете добавить новый игровой сервер через ");
define('no_remote_servers_available_please_add_at_least_one', "Нет доступных удаленных серверов, добавьте хотя бы один!");
define('cloning_of_home_failed', "Ошибка при копировании сервера '%s'.");
define('no_mods_to_clone', "Нет настроенных конфигураций для этого сервера. Он копирован не будет.");
define('failed_to_add_mod', "Ошибка при добавлении конфигурации ID '%s' к серверу  id '%s'.");
define('failed_to_update_mod_settings', "Ошибка при обновлении конфигураций сервера '%s'.");
define('successfully_cloned_mods', "Удачно копированы конфигурации для сервера '%s'.");
define('successfully_copied_home_database', "Удачно скопирована база данных сервера.");
define('copying_home_remotely', "Копирование сервера на удалённом хосте из '%s' в '%s'.");
define('cloning_home', "Копирование отменено '%s'");
define('current_home_path', "Текущая директория сервера");
define('current_home_path_info', "Текущий путь копируемого сервера.");
define('clone_home', "Копировать сервер");
define('new_home_name', "Новое имя сервера");
define('new_home_path', "Новый путь к серверу");
define('agent_ip', "Ip агента");
define('game_server_copy_is_running', "Выполняется копия игрового сервера ...");
define('game_server_copy_was_successful', "Копирование игрового сервера выполнено успешно.");
define('game_server_copy_failed_with_return_code', "Ошибка копирования серверного сервера, код %s");
define('clone_mods', "Клонировать мод");
define('game_server_owner', "Владелец игрового сервера");
define('the_name_of_the_server_to_help_users_to_identify_it', "Название может помочь определить сервер.");
define('ips_and_ports_used_in_this_home', "IP и порты используемые тут");
define('note_ips_and_ports_are_not_cloned', "Заметка - IP и порт не будут скопированы");
define('mods_and_settings_for_this_game_server', "Моды и настройки для этого игрового сервера");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Уверены что хотите удалить сервер из базы данных? Пользователь %s ip %s путь %s ");
define('yes_and_delete_the_files', "Да и удалить все файлы");
define('failed_to_remove_gamehome_from_database', "Не удалось удалить игровой сервер из базы данных.");
define('successfully_deleted_game_server_with_id', "Игровой сервер с ID %s успешно удален.");
define('failed_to_remove_ftp_account_from_remote_server', "Ну удалось удалить FTP аккаунт из удаленного сервера.");
define('remove_it_anyway', "Вы все равно хотите его удалить?");
define('sucessfully_deleted', "Успешное удаление %s");
define('the_agent_had_a_problem_deleting', "У агента возникла проблема с удалением %s, посмотрите логи Агента");
define('connection_timeout_or_problems_reaching_the_agent', "Время соединения вышло или проблемы связи с Агентом");
define('does_not_exist_yet', "Пока не существует.");
define('go_to_custom_fields', "Перейти к настраиваемым поля");
define('back_to_edit_server', "Вернутся к редактированию сервера");
define('update_settings', "Обновить настройки");
define('settings_updated', "Настройки обновлены");
define('selected_path_already_in_use', "Выбранный путь уже используется");
define('browse', "Обзор");
define('cancel', "Отмена");
define('set_this_path', "Установить этот путь");
define('select_home_path', "Выбрать домашний путь-каталог");
define('folder', "Папка");
define('owner', "Владелец");
define('group', "Группа");
define('level_up', "На уровень вверх");
define('level_up_info', "Назад к предыдущей папке.");
define('add_folder', "Добавить папку");
define('add_folder_info', "Напишите имя для новой папки, затем щелкните на значок.");
define('valid_user', "Укажите действительного пользователя.");
define('valid_group', "Укажите действительную группу.");
define('set_affinity', "Установить привязку сервера");
define('cpu_affinity_info', "Выберите Ядро (Ядра) процессора, которое вы хотите назначить этому игровому серверу.");
define('expiration_date_changed', "Дата истечения срока действия для выбранного сервера была изменена.");
define('expiration_date_could_not_be_changed', "Дата истечения срока действия для выбранного дома не может быть изменена.");
define('search', "Поиск");
?>