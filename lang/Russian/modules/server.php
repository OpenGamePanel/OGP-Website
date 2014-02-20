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

// servers.php
$lang['add_new_remote_host'] = "Добавить удаленный хост";
$lang['configured_remote_hosts'] = "Настроенные удаленные хосты";
$lang['remote_host'] = "Удаленный хост";
$lang['remote_host_info'] = "Удаленный хост должен пинговаться!";
$lang['remote_host_port'] = "Порт удаленного хоста";
$lang['remote_host_port_info'] = "Порт, прослушиваемый OGP агентом на удалённом хосте. По умолчанию: 12679.";
$lang['remote_host_name'] = "Название удаленного хоста";
$lang['remote_host_name_info'] = "Название удаленного хоста используется, чтобы помочь пользователям идентифицировать свои сервера.";
$lang['add_remote_host'] = "Добавить удаленный сервер";
$lang['offline'] = "Offline";
$lang['online'] = "Online";
$lang['remote_encryption_key'] = "Зашифрованный ключ на удаленной машине";
$lang['remote_encryption_key_info'] = "Зашифрованный ключ на удаленной машине, используется для шифрования данных между веб-панелью и агентом. Этот ключ должен быть одинаковым с обеих сторон";
$lang['server_name'] = "Название сервера";
$lang['agent_ip_port'] = "IP агента:Порт";
$lang['encryption_key'] = "Ключ шифрования";
$lang['agent_status'] = "Статус агента";
$lang['ips'] = "IP-адрес";
$lang['add_more_ips'] = "";
$lang['encryption_key_mismatch'] = "Зашифрованный ключ на удаленной машине не совпадает с ключем агента. Пересмотрите ваши файлы конфигурации.";
$lang['no_ip_for_remote_host'] = "Вам нужно добавить хотя бы один (1) IP-адрес для каждого удаленного хоста.";
$lang['note_remote_host'] = "Удаленный хост сервера, где запущен OGP агент. Каждый хост может иметь несколько IP адресов, к которым пользователи будут привязывать сервера.";
$lang['ip_administration'] = "Сервер &amp; IP Администрации :: Open Game Panel";
$lang['unknown_error'] = "Неизвестная ошибка - status_chk возвращен";
$lang['remote_host_user_name'] = "UNIX пользователь";
$lang['remote_host_user_name_info'] = "Имя пользователя, под которым запущен агент.";
$lang['ogp_user'] = $lang['remote_host_user_name'];
$lang['ogp_user_info'] = $lang['remote_host_user_name_info'];
$lang['remote_host_ftp_ip'] = "FTP IP";
$lang['remote_host_ftp_ip_info'] = "FTP <b>IP</b> сервера для текущего агента.";
$lang['remote_host_ftp_port'] = "FTP порт";
$lang['remote_host_ftp_port_info'] = "FTP <b>порт</b> сервера для текущего агента.";
$lang['view_log'] = "Просмотр лога";
$lang['ufw'] = "UFW";
$lang['status'] = "Status:";
$lang['stop_firewall'] = "Stop Firewall";
$lang['start_firewall'] = "Start Firewall";
$lang['seconds'] = "Seconds";

// edit_server.php
$lang['invalid_remote_host_id'] = "Не верный host id '%s' given.";
$lang['remote_host_removed'] = "Удаленный хост: '%s' успешно удален.";
$lang['editing_remote_server'] = "Редактирование удаленного сервера: '%s'";
$lang['remote_server_settings_changed'] = "Изменены параметры для удаленного сервера '%s' успешно.";
$lang['save_settings'] = "Сохранить настройки";
$lang['set_ips'] = "Настроить IP-адреса";
$lang['remote_ip'] = "Удаленный IP";
$lang['remote_ips_for'] = "Удаленные IP-адреса '%s'";
$lang['ips_set_for_server'] = "Набор IP-адресов для сервера '%s' успешно.";
$lang['could_not_remove_ip'] = "Не удалось удалить старый IP-адрес из базы данных.";
$lang['could_add_ip'] = "Вы можете добавить IP-адрес удаленного сервера в базу данных.";
$lang['areyousure_removeagent'] = "Вы действительно хотите удалить свой агент?";
$lang['areyousure_removeagent2'] = "и все сервера привязаные к нему их базы данных OGP?";
$lang['error_while_remove'] = "Ошибка при удалении сервера.";
$lang['add_ip'] = "Добавить IP";
$lang['remove_ip'] = "Удалить IP";
$lang['edit_ip'] = "Изменить IP";
$lang['there_are_servers_running_on_this_ip'] = "IP в настоящее время используется.";

// add_server.php
$lang['enter_ip_host'] = "Вы должны ввести IP удаленного хоста.";
$lang['enter_valid_ip'] = "Вы должны ввести верный порт на удалённом хосте. Это значение может быть между 0 и 65535, в любом случае мы рекомендуем ставить его между 1024 и 65535 во избежание дальнейших проблем.";
$lang['could not_add_server'] = "Не удалось добавить сервер";
$lang['to_db'] = "в базу данных.";
$lang['added_server'] = "Сервер добавлен";
$lang['with_port'] = "с поротом";
$lang['to_db_succesfully'] = "в базу данных удачно.";
$lang['unable_discover'] = "Не удалось автоматически определить IP адрес на";
$lang['set_ip_manually'] = "Вам придётся выставить его вручную.";
$lang['found_ips'] = "Найденые IP";
$lang['for_remote_server'] = "для удалённого хоста.";
$lang['failed_add_ip'] = "Ошибка при добавлении IP";
$lang['timeout'] = "Тайм-аут";
$lang['timeout_info'] = "Секунды. Срок для получения ответа от агента.";
$lang['enter_unix_user_name'] = "Введите имя UNIX пользователя";
$lang['use_nat'] = "Использовать NAT";
$lang['use_nat_info'] = "Включить, если удаленный сервер использует NAT правила";
$lang['wrote_changes'] = "Изменения записаны успешно.";
$lang["could_not_add_server"] = "could not add server";

// arrange_servers.php
$lang['arrange_ports'] = "Arrange ports";
$lang['assign_new_ports_range_for_ip'] = "Assign new ports range for IP %s";
$lang['assigned_port_ranges_for_ip'] = "Assigned port ranges for IP %s";
$lang['assigned_ports_for_ip'] = "Assigned ports for IP %s";
$lang['unspecified_game_types'] = "Unspecified game types";
$lang['start_port'] = "Start port:";
$lang['end_port'] = "End port:";
$lang['port_increment'] = "Port increment:";
$lang['total_assignable_ports'] = "Total assignable ports:";
$lang['available_range_ports'] = "Available range ports:";
$lang['assign_range'] = "Assign range";
$lang['edit_range'] = "Edit range";
$lang['delete_range'] = "Delete range";
$lang['home_id'] = "Home ID";
$lang['seconds'] = "seconds";
$lang['home_path'] = "Home path";
$lang['game_type'] = "Game type";
$lang['port'] = "Port";
$lang['invalid_values'] = "Invalid values.";
$lang['ports_in_range_already_arranged'] = "Ports in range already arranged.";
$lang['ports_range_already_configured_for'] = "Ports range already configured for %s.";
$lang['ports_range_added_successfull_for'] = "Ports range added successfull for %s.";
$lang['ports_range_deleted_successfull'] = "Ports range deleted successfull.";
$lang['ports_range_edited_successfull_for'] = "Ports range edited successfull for %s.";

?>