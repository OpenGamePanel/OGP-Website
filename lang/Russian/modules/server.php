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

define('add_new_remote_host', "Добавить удаленный хост");
define('configured_remote_hosts', "Настроенные удаленные хосты");
define('remote_host', "Удаленный хост");
define('remote_host_info', "Удаленный хост должен пинговаться!");
define('remote_host_port', "Порт удаленного хоста");
define('remote_host_port_info', "Порт, прослушиваемый OGP агентом на удалённом хосте. По умолчанию: 12679.");
define('remote_host_name', "Название удаленного хоста");
define('ogp_user', "Пользователь OGP Агента");
define('remote_host_name_info', "Название удаленного хоста используется, чтобы помочь пользователям идентифицировать свои сервера.");
define('add_remote_host', "Добавить удаленный сервер");
define('remote_encryption_key', "Зашифрованный ключ на удаленной машине");
define('remote_encryption_key_info', "Зашифрованный ключ на удаленной машине, используется для шифрования данных между веб-панелью и агентом. Этот ключ должен быть одинаковым с обеих сторон");
define('server_name', "Название сервера");
define('agent_ip_port', "IP:Порт Агента");
define('agent_status', "Статус агента");
define('ips', "IP-адрес");
define('add_more_ips', "Если вы хотите ввести больше IP-адресов, введите ниже в поле 'Удаленный IP:' еще один IP и нажмите 'Добавить IP'");
define('encryption_key_mismatch', "Зашифрованный ключ не совпадает с ключем Агента. Пожалуйста проверти правильность ввода ключа и ключа Агента.");
define('no_ip_for_remote_host', "Вам нужно добавить хотя бы один (1) IP-адрес для каждого удаленного хоста.");
define('note_remote_host', "Удаленный хост сервера, где запущен OGP агент. Каждый хост может иметь несколько IP адресов, к которым пользователи будут привязывать сервера.");
define('ip_administration', "Сервер &amp; IP Администрации :: Open Game Panel");
define('unknown_error', "Неизвестная ошибка - status_chk возвращен");
define('remote_host_user_name', "UNIX пользователь");
define('remote_host_user_name_info', "Имя пользователя, под которым запущен агент.");
define('remote_host_ftp_ip', "FTP-IP");
define('remote_host_ftp_ip_info', "FTP-<b>IP</b> сервера для текущего агента.");
define('remote_host_ftp_port', "FTP-порт");
define('remote_host_ftp_port_info', "FTP-<b>порт</b> сервера для текущего агента.");
define('view_log', "Просмотр лога");
define('status', "Статус");
define('stop_firewall', "Остановить Firewall");
define('start_firewall', "Запустить Firewall");
define('seconds', "Секунд");
define('reboot', "Перезагрузить Удаленный Сервер");
define('restart', "Перезапустить Агента");
define('confirm_reboot', "Вы действительно хотите перезагрузить удаленный сервер '%s' ???");
define('confirm_restart', "Вы действительно хотите перезапустить Агента на '%s' ???");
define('restarting', "Перезапуск Агента.... Пожалуйста подождите.");
define('restarted', "Агент Успешно перезапущен.");
define('reboot_success', "Сервер '%s' перезагружаеться. Вы не сможете получить доступ к серверу до тех пор, пока он не будет успешно загружен.");
define('invalid_remote_host_id', "Не верный host id '%s' given.");
define('remote_host_removed', "Удаленный хост: '%s' успешно удален.");
define('editing_remote_server', "Редактирование удаленного сервера: '%s'");
define('remote_server_settings_changed', "Изменены параметры для удаленного сервера '%s' успешно.");
define('save_settings', "Сохранить настройки");
define('set_ips', "Настроить IP-адреса");
define('remote_ip', "Удаленный IP");
define('remote_ips_for', "Удаленные IP-адреса '%s'");
define('ips_set_for_server', "IP-адреса, для сервера '%s'  установлены успешно.");
define('could_not_remove_ip', "Не удалось удалить старый IP-адрес из базы данных.");
define('could_add_ip', "Вы можете добавить IP-адрес удаленного сервера в базу данных.");
define('areyousure_removeagent', "Вы действительно хотите удалить свой агент?");
define('areyousure_removeagent2', "и все сервера привязаные к нему их базы данных OGP?");
define('error_while_remove', "Ошибка при удалении сервера.");
define('add_ip', "Добавить IP");
define('remove_ip', "Удалить IP");
define('edit_ip', "Изменить IP");
define('wrote_changes', "Изменения записаны успешно.");
define('there_are_servers_running_on_this_ip', "IP в настоящее время используется.");
define('enter_ip_host', "Вы должны ввести IP удаленного хоста.");
define('enter_valid_ip', "Вы должны ввести верный порт на удалённом хосте. Это значение может быть между 0 и 65535, в любом случае мы рекомендуем ставить его между 1024 и 65535 во избежание дальнейших проблем.");
define('could_not_add_server', "Не удалось добавить сервер");
define('to_db', "в базу данных.");
define('added_server', "Сервер добавлен");
define('with_port', "с поротом");
define('to_db_succesfully', "в базу данных удачно.");
define('unable_discover', "Не удалось автоматически определить IP адрес на");
define('set_ip_manually', "Вам придётся выставить его вручную.");
define('found_ips', "Найденые IP");
define('for_remote_server', "для удалённого хоста.");
define('failed_add_ip', "Ошибка при добавлении IP");
define('timeout', "Тайм-аут");
define('timeout_info', "Срок для получения ответа от агента. В секундах");
define('use_nat', "Использовать NAT");
define('use_nat_info', "Включить, если удаленный сервер использует NAT правила");
define('arrange_ports', "Управление портами");
define('assign_new_ports_range_for_ip', "Назначьте новый диапазон портов для IP %s");
define('assigned_port_ranges_for_ip', "Назначенные диапазоны портов для IP %s");
define('assigned_ports_for_ip', "Назначенные порты для IP %s");
define('unspecified_game_types', "Неопределенный тип игр");
define('start_port', "Начальный порт:");
define('end_port', "Конечный порт:");
define('port_increment', "Шаг увеличение порта");
define('total_assignable_ports', "Всего назначаемых портов:");
define('available_range_ports', "Доступные диапазоны портов:");
define('assign_range', "Назначить диапазон");
define('edit_range', "Изменить диапазон");
define('delete_range', "Удалить диапазон");
define('home_id', "ID Сервера");
define('home_path', "Путь к серверу");
define('game_type', "Игра");
define('port', "Порт");
define('invalid_values', "Недопустимые значения.");
define('ports_in_range_already_arranged', "Диапазон портов уже назначен!");
define('ports_range_already_configured_for', "Диапазон портов, уже настроенный для %s.");
define('ports_range_added_successfull_for', "Диапазон портов, успешно Добавлен для %s.");
define('ports_range_deleted_successfull', "Диапазон портов, успешно Удален.");
define('ports_range_edited_successfull_for', "Диапазон портов, успешно отредактирован для %s.");
define('editing_firewall_for_remote_server', "Редактирование Firewall для удаленного сервер '%s'");
define('default_allowed', "По умолчанию разрешено");
define('allow_port_command', "Разрешение на порт - команда:");
define('deny_port_command', "Запрет на порт - команда:");
define('allow_ip_port_command', "Разрешение на IP и порт - команда:");
define('deny_ip_port_command', "Запрет на IP и порт - команда:");
define('enable_firewall_command', "Включение Firewall - команда:");
define('disable_firewall_command', "Выключение Firewall - команда:");
define('get_firewall_status_command', "Статус Firewall - команда:");
define('reset_firewall_command', "Сбросить Firewall - команда:");
define('firewall_status', "Статус Firewall");
define('save_firewall_settings', "Сохранить настройки Firewall");
define('reset_firewall', "Сбросить Firewall");
define('firewall_settings', "Настройки Firewall");
define('display_public_ip', "Внешний IP-адрес");
?>