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

define('add_mods_note', "Вам нужно добавить конфигурации для сервера. Это можно сделать в настройках сервера.");
define('game_servers', "игровые серверы");
define('game_path', "Путь");
define('game_path_info', "Полный путь к серверу. Пример /home/ogp/my_server/");
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
define('ips_and_ports', "IPs and Ports");
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
define('back_to_game_monitor', "Back to Game Monitor");
define('back_to_game_servers', "Назад к странице мониторинга");
define('user_id_main', "Основные владельцы");
define('change_user_id_main', "Сменить основного владельца");
define('change_user_id_main_info', "Основные владельцы сервера.");
define('server_ftp_password', "FTP-пароли");
define('change_ftp_password', "Сохранить пароля FTP");
define('change_ftp_password_info', "Это пароль для входа на FTP-сервер для этого игрового сервера.");
define('Delete_old_user_assigned_homes', "Удалить привязку сервера для всех текущих пользователей.");
define('editing_home_called', "Редактирование сервера");
define('control_password_updated_successfully', "Control password updated successfully.");
define('control_password_update_failed', "Control password update failed");
define('successfully_changed_game_server', "Successfully changed game server.");
define('error_ocurred_on_remote_server', "Error ocurred on remote server,");
define('ftp_password_can_not_be_changed', "FTP password can not be changed.");
define('ftp_can_not_be_switched_on', "FTP can not be switched ON.");
define('ftp_can_not_be_switched_off', "FTP can not be switched OFF.");
define('invalid_home_id_entered', "Invalid home id entered.");
define('ip_port_already_in_use', "The %s:%s is already in use. Choose another one.");
define('successfully_assigned_ip_port_to_server_id', "IP-порт успешно назначены для сервера %s:%s пользователь %s");
define('no_ip_addresses_configured', "Your game server does not have any IP-addresses configured to it. You can configure them from ");
define('server_page', "server page");
define('successfully_removed_mod', "Successfully removed game mod.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Warning - Agent offline, defaulting CPU count to 1.");
define('mod_install_cmds', "Mod Install CMDs");
define('cmds_for', "Commands for");
define('preinstall_cmds', "Preinstall Commands");
define('postinstall_cmds', "Postinstall Commands");
define('edit_preinstall_cmds', "Edit Preinstall Commands");
define('edit_postinstall_cmds', "Edit Postinstall Commands");
define('save_as_default_for_this_mod', "Save as default for this mod");
define('empty', "empty");
define('master_server_for_clon_update', "Master server for local update");
define('set_as_master_server', "Set as master server");
define('set_as_master_server_for_local_clon_update', "Set as master server for local update.");
define('only_available_for', "Only available for '%s' hosted on the remote server named '%s'.");
define('ftp_on', "Enable FTP");
define('ftp_off', "Disable FTP");
define('change_ftp_account_status', "Change FTP account status");
define('change_ftp_account_status_info', "Once a FTP account is enabled or disabled, it is added or removed from the FTP's database.");
define('server_ftp_login', "Server FTP Login");
define('change_ftp_login_info', "Change the FTP Login with a customized one.");
define('change_ftp_login', "Change FTP Login");
define('ftp_login_can_not_be_changed', "Can not change FTP Login.");
define('server_is_running_change_addresses_not_available', "The server is actually running, the IP cannot be changed.");
define('change_game_type', "Change Game Type");
define('change_game_type_info', "By changing the game type the current the mods configuration will be deleted.");
define('force_mod_on_this_address', "Force mod on this address");
define('successfully_assigned_mod_to_address', "Successfully assigned mod to address");
define('switch_mods', "Switch mods");
define('switch_mod_for_address', "Switch mod for address %s");
define('invalid_path', "Invalid Path");
define('add_new_game_home', "Добавить новый сервер");
define('no_game_homes_found', "Игровых серверов не обнаружено");
define('available_game_homes', "Доступные игровые сервера");
define('home_id', "ID Сервера");
define('game_server', "Game Server");
define('game_type', "Игра");
define('game_home', "Путь к директории сервера");
define('game_home_name', "Имя сервера");
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
define('allow_ftp', "Allow FTP");
define('allow_ftp_info', "Show the FTP access information to the user.");
define('allow_custom_fields', "Allow Custom Fields");
define('allow_custom_fields_info', "Allows user to access custom fields of the game server if any.");
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
define('no_remote_servers_available_please_add_at_least_one', "There are no remote servers available, please add at least one!");
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
define('game_server_copy_is_running', "Game server copy is running...");
define('game_server_copy_was_successful', "Game server copy was successful");
define('game_server_copy_failed_with_return_code', "Game server copy failed with return code %s");
define('clone_mods', "Clone Mods");
define('game_server_owner', "Game server owner");
define('the_name_of_the_server_to_help_users_to_identify_it', "The name of the server to help users to identify it.");
define('ips_and_ports_used_in_this_home', "IPs and Ports used in this home");
define('note_ips_and_ports_are_not_cloned', "Note - IPs and Ports are not cloned");
define('mods_and_settings_for_this_game_server', "Mods and settings for this game server");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Уверены что хотите удалить сервер из базы данных? Пользователь %s ip %s путь %s ");
define('yes_and_delete_the_files', "Да и удалить все файлы");
define('failed_to_remove_gamehome_from_database', "Failed to remove gamehome from database.");
define('successfully_deleted_game_server_with_id', "Successfully deleted game server with ID %s.");
define('failed_to_remove_ftp_account_from_remote_server', "Failed to remove FTP account from remote server.");
define('remove_it_anyway', "Would you like to remove it anyway?");
define('sucessfully_deleted', "Sucessfully deleted %s");
define('the_agent_had_a_problem_deleting', "The agent had a problem deleting %s, check the agent log");
define('connection_timeout_or_problems_reaching_the_agent', "Connection timeout or problems reaching the agent");
define('does_not_exist_yet', "Does not exist yet.");
define('go_to_custom_fields', "Go to Custom Fields");
define('back_to_edit_server', "Back to edit server");
define('update_settings', "Update settings");
define('settings_updated', "Settings updated.");
define('selected_path_already_in_use', "The selected path is already in use.");
define('browse', "Browse");
define('cancel', "Cancel");
define('set_this_path', "Set this path");
define('select_home_path', "Select home path");
define('folder', "Folder");
define('owner', "Owner");
define('group', "Group");
define('level_up', "Level up");
define('level_up_info', "Back to the previous folder.");
define('add_folder', "Add folder");
define('add_folder_info', "Write the name for the new folder, then click on the icon.");
define('valid_user', "Please specify a valid user.");
define('valid_group', "Please specify a valid group.");
define('set_affinity', "Set Server Affinity");
define('cpu_affinity_info', "Select the CPU core(s) you want to assign to the game server.");
define('expiration_date_changed', "Expiration date for selected home has been changed.");
define('expiration_date_could_not_be_changed', "Expiration date for selected home could not be changed.");
?>