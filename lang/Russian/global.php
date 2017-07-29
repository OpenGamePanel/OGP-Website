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

define('lang_charset', "UTF-8");
define('already_logged_in_redirecting_to_dashboard', "Вы уже вошли в систему, перенаправление на главную страницу");
define('logging_in', "Вход в систему");
define('redirecting_in', "Перенаправление через");
define('refresh_page', "Обновить страницу");
define('no_rights', "У Вас недостаточно прав для доступа к этой странице.");
define('welcome', "Добро пожаловать!");
define('logout', "Выйти");
define('logout_message', "Вы успешно вышли.");
define('support', "Поддержка");
define('password', "Пароль");
define('login', "Логин");
define('login_button', "Войти");
define('solve_captcha', "Человек ли Вы");
define('lost_passwd', "Забыли пароль?");
define('no_db_connection', "Не удалось подключиться к базе данных.");
define('bad_login', "Неправильный логин или пароль.");
define('not_logged_in', "Вы не вошли в систему.");
define('remove_install', "Пожалуйста, удалите файл install.php по соображениям безопасности.");
define('agent_offline', "Агент, который управляет этим сервером, выключен или сервер не запущен.");
define('logged_in', "Вы зашли как");
define('delete', "Удалить");
define('edit', "Изменить");
define('actions', "Действия");
define('invalid_subpage', "Неверная страница.");
define('invalid_home_id', "Введен не правильный ID");
define('note', "ПРИМЕЧАНИЕ");
define('hint', "ПОДСКАЗКА");
define('yes', "Да");
define('no', "Нет");
define('on', "Вкл");
define('off', "Выкл");
define('db_error_invalid_host', "Неверно введен хост базы данных.");
define('db_error_invalid_user_and_pass', "Неверное имя пользователя базы данных и/или пароль.");
define('db_error_invalid_database', "Неверная база данных.");
define('db_unknown_error', "Неизвестная ошибка базы данных: %s");
define('db_error_module_missing', "Обязательные модуль PHP  для базы данных отсутствует.");
define('db_error_invalid_db_type', "Неверный тип базы данных в конфигурационном файле.");
define('invalid_login_information', "Неверная регистрационная информация.");
define('failed_to_read_config', "Не удалось прочитать файл конфигурации.");
define('account_expired', "Ваш аккаунт просрочен.");
define('contact_admin_to_enable_account', "Свяжитесь с администратором для восстановления аккаунта.");
define('maintenance_mode_on', "Режим обслуживания");
define('logging_out_10', "Выход через 10 секунд");
define('invalid_redirect', "Перенаправление");
define('login_title', "Вход в панель управления");
define('module_not_installed', "Модуль не установлен");
define('no_access_to_home', "У вас нет доступа для этого действия.");
define('not_available', "Нет данных");
define('offline', "Не в сети");
define('online', "В сети");
define('invalid_url', "Неверный URL");
define('xml_file_not_valid', "XML файл '%s' не может быть проверен с помощью схемы '%s'.");
define('unable_to_load_xml', "Невозможно загрузить XML файл '%s'. Проблема с правами доступа?");
define('gamemanager', "Управление");
define('game_monitor', "Мониторинг");
define('dashboard', "Главная");
define('user_addons', "Аддоны");
define('ftp', "FTP");
define('shop', "Магазин");
define('TS3Admin', "TS3 Админ");
define('administration', "Админка");
define('config_games', "Игры/Моды конфигурация");
define('modulemanager', "Управление Модулями");
define('server', "Управление Физ. серверами");
define('settings', "Настройки Панели");
define('themes', "Настройки Темы");
define('user_admin', "Управление Пользователями");
define('sub_users', "Суб-Пользователь");
define('show_groups', "Управление Группами");
define('user_games', "Игровые Серверы");
define('addons_manager', "Управление Аддонами");
define('ftp_admin', "FTP пользователи");
define('orders', "Магазин - Заказы");
define('services', "Магазин - Услуги");
define('shop_settings', "Магазин - Настройка");
define('update', "Обновление Панели");
define('extras', "Дополнения");
define('show', "Показать");
define('show_all', "Показать все сервера");
define('cur_theme', "%s тема оформления");
define('copyright', "Авторские права");
define('all_rights_reserved', "Все права защищены");
define('version', "Версия");
define('show_version', "Показать версию");
define('queries_executed', "запросов к базе");
define('lang', "Язык");
define('get_size', "Получить размер");
define('total_size', "Общий размер");
define('lgsl', "LGSL");
define('lgsl_admin', "Настройки LGSL");
define('rcon', "RCON команды");
define('watch_logger', "Просмотр логов");
define('litefm_settings', "Настройки LiteFM");
define('assign_expiration_date', "Присвоить дату окончания");
define('assign_expiration_date_info', "По истечении срока действия сервер не назначается, но и не удаляется.");
define('server_expiration_date', "Дата истечения срока действия сервера");
define('server_expiration_date_info', "По истечении срока действия сервера удаляется (База Данных и файлы)");
define('set_expiration_date', "Установить дату окончания");
define('admin_dsi', "Настройки DSi");
define('user_dsi', "DSi");
define('list_dsi', "DSi Список");
define('no_remote_servers', "Нет известных удаленных серверов! Добавьте сервер для использования этой функции.");
define('no_results_found', "Не найдено результатов поиска для %s");
?>