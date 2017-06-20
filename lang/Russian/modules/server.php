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
define('ogp_user', "OGP Agent Username");
define('remote_host_name_info', "Название удаленного хоста используется, чтобы помочь пользователям идентифицировать свои сервера.");
define('add_remote_host', "Добавить удаленный сервер");
define('remote_encryption_key', "Зашифрованный ключ на удаленной машине");
define('remote_encryption_key_info', "Зашифрованный ключ на удаленной машине, используется для шифрования данных между веб-панелью и агентом. Этот ключ должен быть одинаковым с обеих сторон");
define('server_name', "Название сервера");
define('agent_ip_port', "IP агента:Порт");
define('agent_status', "Статус агента");
define('ips', "IP-адрес");
define('add_more_ips', "If you want to enter more IPs press 'Set IPs' when all fields are full and an empty field will appear.");
define('encryption_key_mismatch', "Encryption key does not match with the Agent. Please recheck your Agent configuration.");
define('no_ip_for_remote_host', "Вам нужно добавить хотя бы один (1) IP-адрес для каждого удаленного хоста.");
define('note_remote_host', "Удаленный хост сервера, где запущен OGP агент. Каждый хост может иметь несколько IP адресов, к которым пользователи будут привязывать сервера.");
define('ip_administration', "Сервер &amp; IP Администрации :: Open Game Panel");
define('unknown_error', "Неизвестная ошибка - status_chk возвращен");
define('remote_host_user_name', "UNIX пользователь");
define('remote_host_user_name_info', "Имя пользователя, под которым запущен агент.");
define('remote_host_ftp_ip', "FTP IP");
define('remote_host_ftp_ip_info', "FTP <b>IP</b> сервера для текущего агента.");
define('remote_host_ftp_port', "FTP порт");
define('remote_host_ftp_port_info', "FTP <b>порт</b> сервера для текущего агента.");
define('view_log', "Просмотр лога");
define('status', "Статус");
define('stop_firewall', "Stop Firewall");
define('start_firewall', "Start Firewall");
define('seconds', "Seconds");
define('reboot', "Remote Server Reboot");
define('restart', "Restart Agent");
define('confirm_reboot', "Are you sure you want to remotely reboot the entire physical server named '%s'?");
define('confirm_restart', "Are you sure you want to restart the agent named '%s'?");
define('restarting', "Restarting agent... Please wait.");
define('restarted', "Agent successfully restarted.");
define('reboot_success', "Server named '%s' was successfully rebooted. You will not be able to access the server until it has successfully booted.");
define('invalid_remote_host_id', "Не верный host id '%s' given.");
define('remote_host_removed', "Удаленный хост: '%s' успешно удален.");
define('editing_remote_server', "Редактирование удаленного сервера: '%s'");
define('remote_server_settings_changed', "Изменены параметры для удаленного сервера '%s' успешно.");
define('save_settings', "Сохранить настройки");
define('set_ips', "Настроить IP-адреса");
define('remote_ip', "Удаленный IP");
define('remote_ips_for', "Удаленные IP-адреса '%s'");
define('ips_set_for_server', "Набор IP-адресов для сервера '%s' успешно.");
define('could_not_remove_ip', "Не удалось удалить старый IP-адрес из базы данных.");
define('could_add_ip', "Вы можете добавить IP-адрес удаленного сервера в базу данных.");
define('areyousure_removeagent', "Вы действительно хотите удалить свой агент?");
define('areyousure_removeagent2', "и все сервера привязаные к нему их базы данных OGP?");
define('error_while_remove', "Ошибка при удалении сервера.");
define('add_ip', "Добавить IP");
define('remove_ip', "Удалить IP");
define('edit_ip', "Изменить IP");
define('wrote_changes', "Changes saved successfully.");
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
define('timeout_info', "Секунды. Срок для получения ответа от агента.");
define('use_nat', "Использовать NAT");
define('use_nat_info', "Включить, если удаленный сервер использует NAT правила");
define('arrange_ports', "Arrange ports");
define('assign_new_ports_range_for_ip', "Assign new ports range for IP %s");
define('assigned_port_ranges_for_ip', "Assigned port ranges for IP %s");
define('assigned_ports_for_ip', "Assigned ports for IP %s");
define('unspecified_game_types', "Unspecified game types");
define('start_port', "Start port:");
define('end_port', "End port:");
define('port_increment', "Port increment:");
define('total_assignable_ports', "Total assignable ports:");
define('available_range_ports', "Available range ports:");
define('assign_range', "Assign range");
define('edit_range', "Edit range");
define('delete_range', "Delete range");
define('home_id', "ID Сервера");
define('home_path', "Путь к серверу");
define('game_type', "Игра");
define('port', "Порт");
define('invalid_values', "Invalid values.");
define('ports_in_range_already_arranged', "Ports in range already arranged.");
define('ports_range_already_configured_for', "Ports range already configured for %s.");
define('ports_range_added_successfull_for', "Ports range added successfully for %s.");
define('ports_range_deleted_successfull', "Ports range deleted successfully.");
define('ports_range_edited_successfull_for', "Ports range edited successfully for %s.");
define('editing_firewall_for_remote_server', "Editing Firewall for remote server named '%s'");
define('default_allowed', "Default allowed");
define('allow_port_command', "Allow port command");
define('deny_port_command', "Deny port command");
define('allow_ip_port_command', "Allow IP:port command");
define('deny_ip_port_command', "Deny IP:port command");
define('enable_firewall_command', "Enable firewall command");
define('disable_firewall_command', "Disable firewall command");
define('get_firewall_status_command', "Get firewall status command");
define('reset_firewall_command', "Reset firewall command");
define('firewall_status', "Firewall status");
define('save_firewall_settings', "Save firewall settings");
define('reset_firewall', "Reset Firewall");
define('firewall_settings', "Firewall Settings");
define('default_public_ip', "Default Public IP");
define('display_public_ip', "Display Public IP");
?>