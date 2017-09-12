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

define('error', "Ошибка");
define('title', "TeamSpeak 3 Веб-панель");
define('update_available', "<h3>Внимание: новая версия (v%1)  программного обеспечения <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('head_logout', "Выйти");
define('head_vserver_switch', "Изменить виртСервер");
define('head_vserver_overview', "vServer Overview");
define('head_vserver_token', "Управление токеном");
define('head_vserver_liveview', "Live View");
define('e_fill_out', "Please fill out all required fields.");
define('e_upload_failed', "Не удачная загрузка");
define('e_server_responded', "The server responded: ");
define('e_conn_serverquery', "Could not create ServerQuery access.");
define('e_conn_vserver', "Could not choose virtual server.");
define('e_session_timedout', "Session expired.");
define('js_error', "Ошибка");
define('js_ajax_error', "An AJAX error has occurred: %1.");
define('js_confirm_server_stop', "Do you really want to stop server #%1?");
define('js_confirm_server_delete', "Do you really want to DELETE server #%1?");
define('js_notice_server_deleted', "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.");
define('js_prompt_banduration', "Duration in hours (0=unlimited): ");
define('js_prompt_banreason', "Reason (optional): ");
define('js_prompt_msg_to', "Textmessage to %1 #%2: ");
define('js_prompt_poke_to', "Pokemessage to Client #%1: ");
define('js_prompt_new_propvalue', "New value for '%1': ");
define('n_server_responded', "The server responded: ");
define('login_serverquery', "ServerQuery Login");
define('login_name', "Имя пользователя");
define('login_password', "Пароль");
define('login_submit', "Логин");
define('vsselect_headline', "vServer selection");
define('vsselect_id', "ID #");
define('vsselect_name', "Название");
define('vsselect_ip', "IP");
define('vsselect_port', "Порт");
define('vsselect_state', "Статус");
define('vsselect_clients', "Клиенты");
define('vsselect_uptime', "Время работы");
define('vsselect_choose', "Выбрать");
define('vsselect_start', "Старт");
define('vsselect_stop', "Стоп");
define('vsselect_delete', "УДАЛИТЬ");
define('vsselect_new_headline', "Создать новый виртуальный сервер");
define('vsselect_new_servername', "Название сервера");
define('vsselect_new_slots', "Клиентские слоты");
define('vsselect_new_create', "Создать");
define('vsselect_new_added_ok', "Вирт.Сервер <span class=\"online\">%1</span>успешно создан.");
define('vsselect_new_added_generated', "Сгенерированный токен:");
define('vsoverview_virtualserver', "Виртуальный Сервер");
define('vsoverview_information_head', "Информация");
define('vsoverview_connection_head', "Соединение");
define('vsoverview_info_general_head', "Общие настройки");
define('vsoverview_info_servername', "Название сервера");
define('vsoverview_info_host', "Хост");
define('vsoverview_info_state', "Статус");
define('vsoverview_info_state_port', "Порт");
define('vsoverview_info_uptime', "Время работы");
define('vsoverview_info_welcomemsg', "Приветственное сообщение");
define('vsoverview_info_hostmsg', "Сообщение хоста");
define('vsoverview_info_hostmsg_mode_output', "вывод");
define('vsoverview_info_hostmsg_mode_0', "none");
define('vsoverview_info_hostmsg_mode_1', "в лог чата");
define('vsoverview_info_hostmsg_mode_2', "окошко");
define('vsoverview_info_hostmsg_mode_3', "Окно + Отключить");
define('vsoverview_info_req_security', "Уровень безопасности");
define('vsoverview_info_req_securitylvl', "обязательный");
define('vsoverview_info_hostbanner_head', "Баннер хоста");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Адрес изображения");
define('vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('vsoverview_info_antiflood_head', "Анти-флуд");
define('vsoverview_info_antiflood_warning', "Предупреждение о");
define('vsoverview_info_antiflood_kick', "Kick on");
define('vsoverview_info_antiflood_ban', "Ban on");
define('vsoverview_info_antiflood_banduration', "Продолжительность Бана");
define('vsoverview_info_antiflood_decrease', "Decrease");
define('vsoverview_info_antiflood_points', "points");
define('vsoverview_info_antiflood_in_seconds', "секунды");
define('vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('vsoverview_conn_total_head', "Всего");
define('vsoverview_conn_total_packets', "пакеты");
define('vsoverview_conn_total_bytes', "байты");
define('vsoverview_conn_total_send', "послано");
define('vsoverview_conn_total_received', "получено");
define('vsoverview_conn_bandwidth_head', "Пропускная способность");
define('vsoverview_conn_bandwidth_last', "последний");
define('vsoverview_conn_bandwidth_second', "секунды");
define('vsoverview_conn_bandwidth_minute', "минуты");
define('vsoverview_conn_bandwidth_send', "послано");
define('vsoverview_conn_bandwidth_received', "получено");
define('vstoken_token_virtualserver', "Виртуальный Сервер");
define('vstoken_token_head', "Токен");
define('vstoken_token_type', "Тип группы");
define('vstoken_token_id1', "Группа серверов/<br />Группа каналов");
define('vstoken_token_id2', "(Канал)");
define('vstoken_token_tokencode', "Код токена");
define('vstoken_token_delete', "Delete");
define('vstoken_new_head', "Создать новый Токен");
define('vstoken_new_create', "Сгенерировать");
define('vstoken_new_tokentype', "Тип токена:");
define('vstoken_new_servergroup', "Группа серверов");
define('vstoken_new_channelgroup', "Группа каналов");
define('vstoken_new_select_group', "Servergroup");
define('vstoken_new_select_channelgroup', "Channelgroup");
define('vstoken_new_select_channel', "Канал");
define('vstoken_new_tokentype_0', "Сервер");
define('vstoken_new_tokentype_1', "Канал");
define('vstoken_new_added_ok', "Токен был сгенерирован успешно.");
define('vsliveview_server_virtualserver', "Виртуальный Сервер");
define('vsliveview_server_head', "Live View");
define('vsliveview_liveview_enable_autorefresh', "Автообновление");
define('vsliveview_liveview_tooltip_to_channel', "на канал #");
define('vsliveview_liveview_tooltip_switch', "Переключить");
define('vsliveview_liveview_tooltip_send_msg', "Отправить Сообщение");
define('vsliveview_liveview_tooltip_poke', "Poke");
define('vsliveview_liveview_tooltip_kick', "Выкинуть");
define('vsliveview_liveview_tooltip_ban', "Забанить");
define('vsoverview_banlist_head', "Бан Лист");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Имя");
define('vsoverview_banlist_uid', "Уникальный ID");
define('vsoverview_banlist_reason', "Причина");
define('vsoverview_banlist_created', "Создан");
define('vsoverview_banlist_duration', "Продолжительность");
define('vsoverview_banlist_end', "Окончание");
define('vsoverview_banlist_unlimited', "неограниченный");
define('vsoverview_banlist_never', "никогда");
define('vsoverview_banlist_new_head', "Создать новый Бан");
define('vsoverview_banlist_new_create', "Create");
define('vsliveview_channelbackup_head', "Резервирование каналов");
define('vsliveview_channelbackup_get', "Создание и загрузка");
define('vsliveview_channelbackup_load', "Загрузка резервной копии канала");
define('vsliveview_channelbackup_load_submit', "Пересоздать");
define('vsliveview_channelbackup_new_added_ok', "Успешное резервирование канала.");
define('time_day', "день");
define('time_days', "дни");
define('time_hour', "час");
define('time_hours', "часов");
define('time_minute', "минуты");
define('time_minutes', "минут");
define('time_second', "секунды");
define('time_seconds', "секунд");
define('e_2568', "У вас недостаточно прав.");
define('temp_folder_not_writable', "Папка шаблонов (%s) не доступен для записи.");
define('unassign_from_subuser', "Отменить назначение от суб-пользователя.");
define('assign_to_subuser', "Назначить суб-пользователю.");
define('select_subuser', "Выбрать суб-пользователя.");
define('no_ts3_servers_assigned_to_account', "У вас нет серверов, назначенных для вашей учетной записи.");
define('change_virtual_server', "Изменить виртуальный сервер");
define('change_remote_server', "Изменить удаленный сервер");
?>