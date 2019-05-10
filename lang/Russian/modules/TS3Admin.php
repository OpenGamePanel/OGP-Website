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

define('OGP_LANG_error', "Ошибка");
define('OGP_LANG_title', "TeamSpeak 3 Веб-панель");
define('OGP_LANG_update_available', "<h3>Внимание: новая версия (v%1)  программного обеспечения <a href=\"%2\" target=\"_blank\">%2</a>.</h3>");
define('OGP_LANG_head_logout', "Выйти");
define('OGP_LANG_head_vserver_switch', "Изменить виртСервер");
define('OGP_LANG_head_vserver_overview', "Обзор виртуального сервера.");
define('OGP_LANG_head_vserver_token', "Управление токеном");
define('OGP_LANG_head_vserver_liveview', "Live View");
define('OGP_LANG_e_fill_out', "Please fill out all required fields.");
define('OGP_LANG_e_upload_failed', "Не удачная загрузка");
define('OGP_LANG_e_server_responded', "The server responded: ");
define('OGP_LANG_e_conn_serverquery', "Could not create ServerQuery access.");
define('OGP_LANG_e_conn_vserver', "Could not choose virtual server.");
define('OGP_LANG_e_session_timedout', " Сессия истекла.");
define('OGP_LANG_js_error', "Ошибка");
define('OGP_LANG_js_ajax_error', "Произошла ошибка AJAX: %1.");
define('OGP_LANG_js_confirm_server_stop', "Do you really want to stop server #%1?");
define('OGP_LANG_js_confirm_server_delete', "Do you really want to DELETE server #%1?");
define('OGP_LANG_js_notice_server_deleted', "Server %1 was deleted successfully.\nThe overview page will be getting reloaded now.");
define('OGP_LANG_js_prompt_banduration', "Продолжительность в часах (0=неограниченно):");
define('OGP_LANG_js_prompt_banreason', "Причина (необязательно):");
define('OGP_LANG_js_prompt_msg_to', "Текстовое сообщение для %1 #%2: ");
define('OGP_LANG_js_prompt_poke_to', "Отправить сообщение клиенту #%1: ");
define('OGP_LANG_js_prompt_new_propvalue', "Новое значение для '%1':");
define('OGP_LANG_n_server_responded', "The server responded: ");
define('OGP_LANG_login_serverquery', "ServerQuery Login");
define('OGP_LANG_login_name', "Имя пользователя");
define('OGP_LANG_login_password', "Пароль");
define('OGP_LANG_login_submit', "Логин");
define('OGP_LANG_vsselect_headline', "vServer selection");
define('OGP_LANG_vsselect_id', "ID #");
define('OGP_LANG_vsselect_name', "Название");
define('OGP_LANG_vsselect_ip', "IP");
define('OGP_LANG_vsselect_port', "Порт");
define('OGP_LANG_vsselect_state', "Статус");
define('OGP_LANG_vsselect_clients', "Клиенты");
define('OGP_LANG_vsselect_uptime', "Время работы");
define('OGP_LANG_vsselect_choose', "Выбрать");
define('OGP_LANG_vsselect_start', "Старт");
define('OGP_LANG_vsselect_stop', "Стоп");
define('OGP_LANG_vsselect_delete', "УДАЛИТЬ");
define('OGP_LANG_vsselect_new_headline', "Создать новый виртуальный сервер");
define('OGP_LANG_vsselect_new_servername', "Название сервера");
define('OGP_LANG_vsselect_new_slots', "Клиентские слоты");
define('OGP_LANG_vsselect_new_create', "Создать");
define('OGP_LANG_vsselect_new_added_ok', "Вирт.Сервер <span class=\"online\">%1</span>успешно создан.");
define('OGP_LANG_vsselect_new_added_generated', "Сгенерированный токен:");
define('OGP_LANG_vsoverview_virtualserver', "Виртуальный Сервер");
define('OGP_LANG_vsoverview_information_head', "Информация");
define('OGP_LANG_vsoverview_connection_head', "Соединение");
define('OGP_LANG_vsoverview_info_general_head', "Общие настройки");
define('OGP_LANG_vsoverview_info_servername', "Название сервера");
define('OGP_LANG_vsoverview_info_host', "Хост");
define('OGP_LANG_vsoverview_info_state', "Статус");
define('OGP_LANG_vsoverview_info_state_port', "Порт");
define('OGP_LANG_vsoverview_info_uptime', "Время работы");
define('OGP_LANG_vsoverview_info_welcomemsg', "Приветственное сообщение");
define('OGP_LANG_vsoverview_info_hostmsg', "Сообщение хоста");
define('OGP_LANG_vsoverview_info_hostmsg_mode_output', "вывод");
define('OGP_LANG_vsoverview_info_hostmsg_mode_0', "none");
define('OGP_LANG_vsoverview_info_hostmsg_mode_1', "в лог чата");
define('OGP_LANG_vsoverview_info_hostmsg_mode_2', "окошко");
define('OGP_LANG_vsoverview_info_hostmsg_mode_3', "Окно + Отключить");
define('OGP_LANG_vsoverview_info_req_security', "Уровень безопасности");
define('OGP_LANG_vsoverview_info_req_securitylvl', "обязательный");
define('OGP_LANG_vsoverview_info_hostbanner_head', "Баннер хоста");
define('OGP_LANG_vsoverview_info_hostbanner_url', "URL");
define('OGP_LANG_vsoverview_info_hostbanner_imgurl', "Адрес изображения");
define('OGP_LANG_vsoverview_info_hostbanner_buttonurl', "Hostbutton URL");
define('OGP_LANG_vsoverview_info_antiflood_head', "Анти-флуд");
define('OGP_LANG_vsoverview_info_antiflood_warning', "Предупреждение о");
define('OGP_LANG_vsoverview_info_antiflood_kick', "Kick on");
define('OGP_LANG_vsoverview_info_antiflood_ban', "Ban on");
define('OGP_LANG_vsoverview_info_antiflood_banduration', "Продолжительность Бана");
define('OGP_LANG_vsoverview_info_antiflood_decrease', "Decrease");
define('OGP_LANG_vsoverview_info_antiflood_points', "points");
define('OGP_LANG_vsoverview_info_antiflood_in_seconds', "секунды");
define('OGP_LANG_vsoverview_info_antiflood_points_per_tick', "Points per tick");
define('OGP_LANG_vsoverview_conn_total_head', "Всего");
define('OGP_LANG_vsoverview_conn_total_packets', "пакеты");
define('OGP_LANG_vsoverview_conn_total_bytes', "байты");
define('OGP_LANG_vsoverview_conn_total_send', "послано");
define('OGP_LANG_vsoverview_conn_total_received', "получено");
define('OGP_LANG_vsoverview_conn_bandwidth_head', "Пропускная способность");
define('OGP_LANG_vsoverview_conn_bandwidth_last', "последний");
define('OGP_LANG_vsoverview_conn_bandwidth_second', "секунды");
define('OGP_LANG_vsoverview_conn_bandwidth_minute', "минуты");
define('OGP_LANG_vsoverview_conn_bandwidth_send', "послано");
define('OGP_LANG_vsoverview_conn_bandwidth_received', "получено");
define('OGP_LANG_vstoken_token_virtualserver', "Виртуальный Сервер");
define('OGP_LANG_vstoken_token_head', "Токен");
define('OGP_LANG_vstoken_token_type', "Тип группы");
define('OGP_LANG_vstoken_token_id1', "Группа серверов/<br />Группа каналов");
define('OGP_LANG_vstoken_token_id2', "(Канал)");
define('OGP_LANG_vstoken_token_tokencode', "Код токена");
define('OGP_LANG_vstoken_token_delete', "Delete");
define('OGP_LANG_vstoken_new_head', "Создать новый Токен");
define('OGP_LANG_vstoken_new_create', "Сгенерировать");
define('OGP_LANG_vstoken_new_tokentype', "Тип токена:");
define('OGP_LANG_vstoken_new_servergroup', "Группа серверов");
define('OGP_LANG_vstoken_new_channelgroup', "Группа каналов");
define('OGP_LANG_vstoken_new_select_group', "Servergroup");
define('OGP_LANG_vstoken_new_select_channelgroup', "Channelgroup");
define('OGP_LANG_vstoken_new_select_channel', "Канал");
define('OGP_LANG_vstoken_new_tokentype_0', "Сервер");
define('OGP_LANG_vstoken_new_tokentype_1', "Канал");
define('OGP_LANG_vstoken_new_added_ok', "Токен был сгенерирован успешно.");
define('OGP_LANG_vsliveview_server_virtualserver', "Виртуальный Сервер");
define('OGP_LANG_vsliveview_server_head', "Live View");
define('OGP_LANG_vsliveview_liveview_enable_autorefresh', "Автообновление");
define('OGP_LANG_vsliveview_liveview_tooltip_to_channel', "на канал #");
define('OGP_LANG_vsliveview_liveview_tooltip_switch', "Переключить");
define('OGP_LANG_vsliveview_liveview_tooltip_send_msg', "Отправить Сообщение");
define('OGP_LANG_vsliveview_liveview_tooltip_poke', "Poke");
define('OGP_LANG_vsliveview_liveview_tooltip_kick', "Выкинуть");
define('OGP_LANG_vsliveview_liveview_tooltip_ban', "Забанить");
define('OGP_LANG_vsoverview_banlist_head', "Бан Лист");
define('OGP_LANG_vsoverview_banlist_id', "ID #");
define('OGP_LANG_vsoverview_banlist_ip', "IP");
define('OGP_LANG_vsoverview_banlist_name', "Имя");
define('OGP_LANG_vsoverview_banlist_uid', "Уникальный ID");
define('OGP_LANG_vsoverview_banlist_reason', "Причина");
define('OGP_LANG_vsoverview_banlist_created', "Создан");
define('OGP_LANG_vsoverview_banlist_duration', "Продолжительность");
define('OGP_LANG_vsoverview_banlist_end', "Окончание");
define('OGP_LANG_vsoverview_banlist_unlimited', "неограниченный");
define('OGP_LANG_vsoverview_banlist_never', "никогда");
define('OGP_LANG_vsoverview_banlist_new_head', "Создать новый Бан");
define('OGP_LANG_vsoverview_banlist_new_create', "Создать");
define('OGP_LANG_vsliveview_channelbackup_head', "Резервирование каналов");
define('OGP_LANG_vsliveview_channelbackup_get', "Создание и загрузка");
define('OGP_LANG_vsliveview_channelbackup_load', "Загрузка резервной копии канала");
define('OGP_LANG_vsliveview_channelbackup_load_submit', "Пересоздать");
define('OGP_LANG_vsliveview_channelbackup_new_added_ok', "Успешное резервирование канала.");
define('OGP_LANG_time_day', "день");
define('OGP_LANG_time_days', "дни");
define('OGP_LANG_time_hour', "час");
define('OGP_LANG_time_hours', "часов");
define('OGP_LANG_time_minute', "минуты");
define('OGP_LANG_time_minutes', "минут");
define('OGP_LANG_time_second', "секунды");
define('OGP_LANG_time_seconds', "секунд");
define('OGP_LANG_e_2568', "У вас недостаточно прав.");
define('OGP_LANG_temp_folder_not_writable', "Папка шаблонов (%s) не доступен для записи.");
define('OGP_LANG_unassign_from_subuser', "Отменить назначение от суб-пользователя.");
define('OGP_LANG_assign_to_subuser', "Назначить суб-пользователю.");
define('OGP_LANG_select_subuser', "Выбрать суб-пользователя.");
define('OGP_LANG_no_ts3_servers_assigned_to_account', "У вас нет серверов, назначенных для вашей учетной записи.");
define('OGP_LANG_change_virtual_server', "Изменить виртуальный сервер");
define('OGP_LANG_change_remote_server', "Изменить удаленный сервер");
?>