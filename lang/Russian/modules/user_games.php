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

// add_game_home.php
$lang['add_new_game_home'] = "Добавить новый сервер";
$lang['add_mods_note'] = "Вам нужно добавить конфигурации для сервера. Это можно сделать в настройках сервера.";
$lang['game_server'] = "Сервер";
$lang['game_servers'] = "игровые серверы";
$lang['game_type'] = "Игра";
$lang['game_path'] = "Путь";
$lang['game_path_info'] = "Полный путь к серверу. Пример /home/ogp/my_server/";
$lang['game_server_name'] = "Название игрового сервера";
$lang['game_server_name_info'] = "Название может помочь определить сервер.";
$lang['control_password'] = "Пароль управления";
$lang['control_password_info'] = "Пароль используется для управления сервером, как RCON например. Если оставить пустым, то будут использоваться другие методы.";
$lang['add_game_home'] = "Добавить игровой сервер";
$lang['game_path_empty'] = "Путь к серверу не может быть пустым.";
$lang['game_home_added'] = "Сервер добавлен успешно. Перенаправление на страницу редактирования...";
$lang['failed_to_add_home_to_db'] = "Ошибка добавления сервера в базу данных. Ошибка: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Внимание!</b> Агент в автономном режиме не может получить тип ОС и архитектуры,<br> Показаны серверы для всех платформ:";
$lang['select_remote_server'] = "Выберите удаленный хост";
$lang['no_remote_servers_configured'] = "Не добавлено ни одного физического сервера";
$lang['add_remote_server'] = "Добавить физический сервер";
$lang['no_game_configurations_found'] = "Файлы конфигурации не найдены";
$lang['game_configurations'] = "Установка конфигураций игры";
$lang['successfully_assigned_ip_port_to_server_id'] = "IP-порт успешно назначены для сервера %s:%s пользователь %s";
$lang['ip_port_already_in_use'] = "IP-порт уже используются! %s:%s";

// edit_games.php
$lang['home_path'] = "Путь к серверу";
$lang['change_home_info'] = "Путь установленного сервера. Например: /home/ogp/my_server/";
$lang['game_server_name'] = "Название игрового сервера";
$lang['change_name_info'] = "Название может помочь определить сервер.";
$lang['game_control_password'] = "Пароль управления";
$lang['change_control_password_info'] = "Пароль используется для управления сервером, как RCON например.";
$lang['available_mods'] = "Доступные конфигурации";
$lang['note_no_mods'] = "Вы не выбрали ни одной конфигурации. Установите конфигурацию, прежде чем пользователи смогут использовать сервер.";
$lang['change_home'] = "Сохранить путь";
$lang['change_control_password'] = "Сохранить пароль управления";
$lang['change_name'] = "Сохранить название";
$lang['add_mod'] = "Добавить конфигурацию";
$lang['set_ip'] = "Сохранить IP";
$lang['ips_and_ports'] = "IPs and Ports";
$lang['mod_name'] = "Название конфига";
$lang['max_players'] = "Лимит игроков";
$lang['extra_cmd_line_args'] = "Дополнительные команды";
$lang['extra_cmd_line_info'] = "Дополнительные команды позволяют вам вводить любые значения, которые будут прописаны при запуске сервера.";
$lang['cpu_affinity'] = "Ядро процессора";
$lang['nice_level'] = "Приоритет сервера";
$lang['set_options'] = "Сохранить";
$lang['remove_mod'] = "Удалить конфигурацию";
$lang['mods'] = "Конфигурация";
$lang['ip'] = "IP";
$lang['port'] = "Порт";
$lang['no_ip_ports_assigned'] = "Как минимум один IP:Порт должны быть привязаны к серверу.";
$lang['successfully_assigned_ip_port'] = "IP:Port Удачно привязаны к серверу.";
$lang['port_range_error'] = "Значение порта должно быть между 0 и 65535.";
$lang['failed_to_assing_mod_to_home'] = "Не удалось привязать конфигурацию с id %d к серверу.";
$lang['successfully_assigned_mod_to_home'] = "Конфигурация была удачно привязана к id %d серверу.";
$lang['successfully_modified_mod'] = "Конфигурация сохранена успешно.";
$lang['back_to_gamemanager'] = "Назад к менеджеру серверов";
$lang['back_to_game_servers'] = "Назад к странице мониторинга";
$lang['user_id_main'] = "Основные владельцы";
$lang['change_user_id_main'] = "Сменить основного владельца";
$lang['change_user_id_main_info'] = "Основные владельцы сервера.";
$lang['server_ftp_password'] = "FTP-пароли";
$lang['change_ftp_password'] = "Сохранить пароля FTP";
$lang['change_ftp_password_info'] = "Это пароль для входа на FTP-сервер для этого игрового сервера.";
$lang['Delete_old_user_assigned_homes'] = "Удалить привязку сервера для всех текущих пользователей.";
$lang['editing_home_called'] = "Редактирование сервера";
$lang['sure_to_delete_serverid_from_remoteip_and_directory'] = "Уверены что хотите удалить сервер из базы данных? Пользователь %s ip %s путь %s ";
$lang['yes_and_delete_the_files'] = "Да и удалить все файлы";
$lang['control_password_updated_successfully'] = "Control password updated successfully.";
$lang['control_password_update_failed'] = "Control password update failed";
$lang['successfully_changed_game_server'] = "Successfully changed game server.";
$lang['error_ocurred_on_remote_server'] = "Error ocurred on remote server,";
$lang['ftp_password_can_not_be_changed'] = "FTP password can not be changed.";
$lang['ftp_can_not_be_switched_on'] = "FTP can not be switched ON.";
$lang['ftp_can_not_be_switched_off'] = "FTP can not be switched OFF.";
$lang['invalid_home_id_entered'] = "Invalid home id entered.";
$lang['ip_port_already_in_use'] = "The %s:%s is already in use. Choose another one.";
$lang['successfully_assigned_ip_port_to_server_id'] = "Successfully assigned %s:%s to home with ID %s.";
$lang['no_ip_addresses_configured'] = "Your game server does not have any IP-addresses configured to it. You can configure them from ";
$lang['server_page'] = "server page";
$lang['successfully_removed_mod'] = "Successfully removed game mod.";
$lang['warning_agent_offline_defaulting_CPU_count_to_1'] = "Warning - Agent offline, defaulting CPU count to 1.";
$lang['mod_install_cmds'] = "Mod Install CMDs";
$lang['cmds_for'] = "Commands for";
$lang['preinstall_cmds'] = "Preinstall Commands";
$lang['postinstall_cmds'] = "Postinstall Commands";
$lang['edit_preinstall_cmds'] = "Edit Preinstall Commands";
$lang['edit_postinstall_cmds'] = "Edit Postinstall Commands";
$lang['save_as_default_for_this_mod'] = "Save as default for this mod";
$lang['empty'] = "empty";
$lang['master_server_for_clon_update'] = "Master server for local update";
$lang['set_as_master_server'] = "Set as master server";
$lang['set_as_master_server_for_local_clon_update'] = "Set as master server for local update.";
$lang['only_available_for'] = "Only available for '%s' hosted on the remote server named '%s'.";
$lang['ftp_on'] = "Enable FTP";
$lang['ftp_off'] = "Disable FTP";
$lang['change_ftp_account_status'] = "Change FTP account status";
$lang['change_ftp_account_status_info'] = "Once a FTP account is enbled or disabled, it is added or removed from the PureFTPd's DataBase.";
$lang['server_ftp_login'] = "Server FTP Login";
$lang['change_ftp_login_info'] = "Change the FTP Login with a customized one.";
$lang['change_ftp_login'] = "Change FTP Login";
$lang['ftp_login_can_not_be_changed'] = "Can not change FTP Login.";
$lang['server_is_running_change_addresses_not_available'] = "The server is actually running, the IP cannot be changed.";
$lang['change_game_type'] = "Change Game Type";
$lang['change_game_type_info'] = "By changing the game type the current the mods configuration will be deleted.";
$lang['force_mod_on_this_address'] = "Force mod on this address";
$lang['successfully_assigned_mod_to_address'] = "Successfully assigned mod to address";
$lang['switch_mods'] = "Switch mods";
$lang['switch_mod_for_address'] = "Switch mod for address %s";
$lang[''] = "";

// show_games.php
$lang['add_new_game_home'] = "Добавить новый игровой сервер";
$lang['no_game_homes_found'] = "Игровых серверов не обнаружено";
$lang['available_game_homes'] = "Доступные игровые сервера";
$lang['home_id'] = "ID Сервера";
$lang['game_server'] = "IP адрес сервера";
$lang['game_type'] = "Тип сервера";
$lang['game_home'] = "Путь к директории сервера";
$lang['game_home_name'] = "Имя сервера";
$lang['actions'] = "Действия";
$lang['edit'] = "Настройка";
$lang['clone'] = "Копировать";

// assign_games.php
$lang['unassign'] = "Отменить";
$lang['access_rights'] = "Права доступа";
$lang['assigned_homes'] = "Уже назначенные сервера";
$lang['assign'] = "Назначить";
$lang['allow_updates'] = "Разрешить обновление игры";
$lang['allow_updates_info'] = "Разрешить пользователю обновлять игу, если это доступно.";
$lang['allow_file_management'] = "Доступ к файлам";
$lang['allow_file_management_info'] = "Разрешить пользователю доступ к файлам сервера через модуль.";
$lang['allow_parameter_usage'] = "Разрешить использование параметров запуска";
$lang['allow_parameter_usage_info'] = "Разрешить пользователю использовать заданные параметры запуска.";
$lang['allow_extra_params'] = "Разрешить дополнительные параметры";
$lang['allow_extra_params_info'] = "Разрешить пользователю использовать дополнительные параметры запуска.";
$lang['allow_ftp'] = "Allow FTP";
$lang['allow_ftp_info'] = "Show the FTP access information to the user.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Выбрать сервер для назначения";
$lang['assign_new_home_to_user'] = "Назначить новый сервер пользователю  %s";
$lang['assign_new_home_to_group'] = "Назначить новый сервер группе %s";
$lang['assigned_home_to_user'] = "Сервер привязан (ID: %d) к пользователю %s.";
$lang['assigned_home_to_group'] = "Сервер привязан(ID: %d) к группе %s.";
$lang['unassigned_home_from_user'] = "Назначение сервера (ID: %d) отменено для пользователя%s.";
$lang['unassigned_home_from_group'] = "Назначение сервера (ID: %d) отменено для группы %s.";
$lang['no_homes_assigned_to_user'] = "Привязанных серверов для пользователя %s нет.";
$lang['no_homes_assigned_to_group'] = "Привязанных серверов для группы %s нет.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "Нет больше серверов, которые можно привязать к данному пользователю";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "Нет больше серверов, которые можно привязать к данной группе";
$lang['you_can_add_a_new_game_server_from'] = "Вы можете добавить новый игровой сервер через ";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// clone_home.php
$lang['cloning_of_home_failed'] = "Ошибка при копировании сервера '%s'.";
$lang['no_mods_to_clone'] = "Нет настроенных конфигураций для этого сервера. Он копирован не будет.";
$lang['failed_to_add_mod'] = "Ошибка при добавлении конфигурации ID '%s' к серверу  id '%s'.";
$lang['failed_to_update_mod_settings'] = "Ошибка при обновлении конфигураций сервера '%s'.";
$lang['successfully_cloned_mods'] = "Удачно копированы конфигурации для сервера '%s'.";
$lang['successfully_copied_home_database'] = "Удачно скопирована база данных сервера.";
$lang['copying_home_remotely'] = "Копирование сервера на удалённом хосте из '%s' в '%s'.";
$lang['cloning_home'] = "Копирование отменено '%s'";
$lang['current_home_path'] = "Текущая директория сервера";
$lang['current_home_path_info'] = "Текущий путь копируемого сервера.";
$lang['clone_home'] = "Копировать сервер";
$lang['new_home_name'] = "Новое имя сервера";
$lang['new_home_path'] = "Новый путь к серверу";
$lang['agent_ip'] = "Ip агента";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// get_size.php
$lang['does_not_exist_yet'] = "Does not exist yet.";

// Custom fields
$lang['go_to_custom_fields'] = "Go to Custom Fields";
$lang['back_to_edit_server'] = "Back to edit server";
$lang['update_settings'] = "Update settings";
$lang['settings_updated'] = "Settings updated.";
?>
