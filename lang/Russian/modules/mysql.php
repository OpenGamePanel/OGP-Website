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

define('configured_mysql_hosts', "Настроенные хосты MySQL");
define('add_new_mysql_host', "Добавить хост MySQL");
define('enter_mysql_ip', "Введите IP MySQL.");
define('enter_valid_port', "Введите правильный порт");
define('enter_mysql_root_password', "Введите root пароль для MySQL.");
define('enter_mysql_name', "Введите имя MySQL.");
define('could_not_add_mysql_server', "Не удалось добавить MySQL-сервер");
define('game_server_name_info', "Название может помочь определить сервер.");
define('note_mysql_host', "ПРИМЕЧАНИЕ: Используя 'Прямое соединение', сервер должен принимать внешние подключения, чтобы серверы могли подключаться удаленно. При 'Подключение к удаленному игровому серверу' он будет использоваться как локальное соединение на игровом сервер.");
define('direct_connection', "Прямое подключение");
define('connection_through_remote_server_named', "Подключение к удаленному игровому серверу %s");
define('add_mysql_server', "Добавить MySQL-сервер");
define('mysql_online', "MySQL в сети");
define('mysql_offline', "MySQL не в сети");
define('encryption_key_mismatch', "Зашифрованный ключ на удаленной машине не совпадает с ключем агента. Пересмотрите ваши файлы конфигурации.");
define('unknown_error', "Неизвестная ошибка - status_chk возвращен");
define('remove', "Удалить");
define('assign_db', "Назначить Базу Данных");
define('mysql_server_name', "Имя MySQL-сервер");
define('server_status', "Статус сервера");
define('mysql_ip_port', "MySQL IP:Port");
define('mysql_root_passwd', "MySQL root пароль");
define('connection_method', "Способ подключения");
define('user_privilegies', "Пользовательские привилегии");
define('current_dbs', "Текущие Базы Данных");
define('mysql_name', "Имя MySQL-сервер");
define('mysql_ip', "MySQL IP");
define('mysql_port', "MySQL Порт");
define('privilegies', "привилегии");
define('all', "Все");
define('custom', "Пользовательские");
define('server_added', "Сервер добавлен.");
define('sql_alter', "Изменять 'ALTER'");
define('sql_create', "Создавать 'CREATE'");
define('sql_create_temporary_tables', "Создавать временные таблицы 'CREATE TEMPORARY TABLES'");
define('sql_drop', "Удалять 'DROP'");
define('sql_index', "INDEX");
define('sql_insert', "Вставлять 'INSERT'");
define('sql_lock_tables', "Блокировать 'LOCK TABLES'");
define('sql_select', "Выбирать 'SELECT'");
define('sql_grant_option', "Изменять привилегии 'GRANT OPTION'");
define('sql_update', "Обновлять 'UPDATE'");
define('sql_delete', "Удалять 'DELETE'");
define('sql_alter_info', "<b>Позволяет использовать ALTER TABLE.</b>");	
define('sql_create_info', "<b>Позволяет использовать CREATE TABLE.</b>");	
define('sql_create_temporary_tables_info', "<b>Позволяет использовать CREATE TEMPORARY TABLE.</b>");
define('sql_delete_info', "<b>Позволяет использовать DELETE.</b>");
define('sql_drop_info', "<b>Позволяет использовать DROP TABLE.</b>");	
define('sql_index_info', "<b>Позволяет использовать CREATE INDEX и DROP INDEX.</b>");	
define('sql_insert_info', "<b>Позволяет использовать INSERT.</b>");	
define('sql_lock_tables_info', "<b>Позволяет использовать LOCK TABLES на таблицах, для которых у Вас есть привилегии SELECT.</b>");	
define('sql_select_info', "<b>Позволяет использовать SELECT.</b>");
define('sql_update_info', "<b>Позволяет использовать UPDATE.</b>");	
define('sql_grant_option_info', "<b>Позволяет предоставлять привилегии.</b>");
define('select_game_server', "Выбрать игровой сервер");
define('invalid_mysql_server_id', "Не верный ID сервера MySQL.");
define('there_is_another_db_named_or_user_named', "Существует другая база данных с именем <b>%s</b> или другой пользователь с именем <b>%s</b>.");
define('db_added_for_home_id', "Добавить Базу Данных для home ID <b>%s</b>.");
define('could_not_remove_db', "Выбранная База Данных не может быть удалена.");
define('db_removed_successfully_from_mysql_server_named', "База данных была удалена с сервера%s.");
define('areyousure_remove_mysql_server', "Вы уверены, что хотите удалить MySQL-сервер с именем <b>%s</b>?");
define('db_changed_successfully', "База данных %s был успешно изменен.");
define('error_while_remove', "Ошибка при удалении сервера.");
define('mysql_server_removed', "MySQL-сервер <b>%s</b> успешно УДАЛЕН.");
define('unable_to_set_changes_to', "Не удалось внести изменения на MySQL-сервер <b>%s</b>.");
define('mysql_server_settings_changed', "MySQL-сервер <b>%s</b> был успешно изменен.");
define('editing_mysql_server', "Редактирование MySQL-сервера <b>%s</b>.");
define('save_settings', "Сохранить настройки");
define('mysql_dbs_for', "База Данных для сервер %s");
define('edit_dbs', "Редактирование Базы Данных");
define('edit_db_settings', "Редактировать настройки Базы Данных");
define('remove_db', "Удалить Базу Данных");
define('save_db_changes', "Сохранение изменений в Базе Данных.");
define('add_db', "Добавить Базу Данных");
define('select_db', "Выбрать Базу данных");
define('db_user', "Пользователь БД");
define('db_passwd', "Пароль БД");
define('db_name', "Название БД");
define('enabled', "Включить");
define('game_server', "Игровой сервер");
define('there_are_no_databases_assigned_for', "Нет назначенной Базы Данных для <b>%s</b>.");
define('unable_to_connect_to_mysql_server_as', "Невозможно подключиться к серверу MySQL как %s.");
define('unable_to_create_db', "Не удалось создать базу данных.");
define('unable_to_select_db', "Невозможно выбрать базу данных %s.");
define('db_info', "Информация о базе данных");
define('db_tables', "Таблицы базы данных");
define('db_backup', "Бэкап БД");
define('download_db_backup', "Скачать бэкап БД");
define('restore_db_backup', "Восстановить БД из бэкапа");
define('sql_file', "файл(.sql)");
?>