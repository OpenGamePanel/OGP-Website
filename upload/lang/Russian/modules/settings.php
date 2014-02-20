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

// settings.php

$lang['settings'] = "Настройки панели";
$lang['maintenance_mode'] = "Обслуживание";
$lang['maintenance_mode_info'] = "Это сообщение будет показано обычным пользователям.";
$lang['maintenance_title'] = "Заголовок обслуживания";
$lang['maintenance_title_info'] = "Название, которое отображается для обычных пользователей во время обслуживания.";
$lang['maintenance_message'] = "Сообщение";
$lang['maintenance_message_info'] = "Это сообщение будет показано обычным пользователям во время обслуживания.";
$lang['update_settings'] = "Сохранить настройки";
$lang['settings_updated'] = "Настройки успешно сохранены!";
$lang['panel_language'] = "Язык";
$lang['panel_language_info'] = "Выбранный язык будет установлен всем пользователям по умолчанию, но они смогут его сменить в настройках своего профиля";
$lang['page_auto_refresh'] = "Автообновление страниц";
$lang['page_auto_refresh_info'] = "Отключение этого может помочь при отладке. Желательно его включить.";
$lang['smtp_server'] = "Сервер исходящей почты";
$lang['smtp_server_info'] = "SMTP сервер исходящей почты, обычно используется для того чтобы посылать забытые пароли пользователям, localhost по умолчанию.";
$lang['panel_email_address'] = "Исходящий адрес почты";
$lang['panel_email_address_info'] = "Адрес откуда будет высылаться почта.";
$lang['panel_name'] = "Название панели";
$lang['panel_name_info'] = "Название которое будет показывается в названии страницы.";
$lang['feed_enable'] = "Включить LGSL Feed";
$lang['feed_enable_info'] = "Если ваш брандмауэр блокирует query port вам надо разрешить его.";
$lang['feed_url'] = "Feed URL";
$lang['feed_url_info'] = "GrayCube.com распространяет LGSL feed через URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>";
$lang['charset'] = "Кодировка текста";
$lang['charset_info'] = "UTF-8, ISO, ASCII, etc... Оставить бланк пустым для ISO кодировки.";
$lang['steam_user'] = "Steam User";
$lang['steam_user_info'] = "This user is needed to log in to steam for download some new games like CS:GO.";
$lang['steam_pass'] = "Steam Password";
$lang['steam_pass_info'] = "Set here the steam account password.";
$lang['steam_guard'] = "Steam Guard Code";
$lang['steam_guard_info'] = "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.";
$lang['smtp_port'] = "SMTP Port";
$lang['smtp_port_info'] = "If SMTP port is not the default port (25) Enter the SMTP port here.";
$lang['smtp_login'] = "SMTP User";
$lang['smtp_login_info'] = "If your SMTP server requires authentication, enter your user name here.";
$lang['smtp_passw'] = "SMTP Password";
$lang['smtp_passw_info'] = "If you do not set a password the SMTP authentication will be disabled.";
$lang['smtp_ssl'] = "SMTP SSL";
$lang['smtp_ssl_info'] = "Use SSL to connect to the SMTP server";
$lang['time_zone'] = "Time Zone";
$lang['time_zone_info'] = "Sets the default timezone used by all date/time functions.";
$lang['query_cache_life'] = "Query cache life";
$lang['query_cache_life_info'] = "Sets the timeout in seconds before the server status is refreshed.";
$lang['query_num_servers_stop'] = "Disable Game Server Queries After";
$lang['query_num_servers_stop_info'] = "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.";
$lang['editable_email'] = "Editable E-Mail Address";
$lang['editable_email_info'] = "Select if users can edit their e-mail address or not.";
$lang['old_dashboard_behavior'] = "Old Dashboard behavior";
$lang['old_dashboard_behavior_info'] = "The old Dashboard was running slower but shows more server information, current players and map.";
$lang['rsync_available'] = "Available rsync servers";
$lang['rsync_available_info'] = "Select what servers list will be shown in the rsync installation.";
$lang['all_available_servers'] = "All available servers ( rsync_sites.list + rsync_sites_local.list )";
$lang['only_remote_servers'] = "Only remote servers ( rsync_sites.list )";
$lang['only_local_servers'] = "Only local servers ( rsync_sites_local.list )";
$lang['header_code'] = "Header code";
$lang['header_code_info'] = "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.";
$lang[''] = "";

// Theme settings
$lang['theme_settings'] = "Настройки темы";
$lang['themes'] = "Настройки темы";
$lang['theme'] = "Тема";
$lang['theme_info'] = "Выбранная тема будет установлена всем пользователям по умолчанию, но они смогут ее сменить в настройках своего профиля.";
$lang['welcome_title'] = "Добро пожаловать Название";
$lang['welcome_title_info'] = "Включает заголовок, который отображается в верхней части приборной панели.";
$lang['welcome_title_message'] = "Здравствуйте, Тема Сообщение";
$lang['welcome_title_message_info'] = "Заголовок сообщения, которое отображается в верхней части приборной панели (HTML запрещено).";
$lang['logo_link'] = "Ссылка на логотип";
$lang['logo_link_info'] = "Ссылка на логотип. <b style='font-size:10px; font-weight:normal;'>(Если оставить пустым, то будет отображен логотип OGP)</b>";
$lang['custom_tab'] = "Пользовательские вкладки";
$lang['custom_tab_info'] = "Добавляет настраиваемые вкладки в конце меню. <b style='font-size:10px; font-weight:normal;'>(Примените и обновите страницу, чтобы редактировать параметры вкладки)</b>";
$lang['custom_tab_name'] = "Название вкладки";
$lang['custom_tab_name_info'] = "Отображаемое название вкладки.";
$lang['custom_tab_link'] = "Ссылка вкладки";
$lang['custom_tab_link_info'] = "Ссылка на вкладку.";
$lang['custom_tab_sub'] = "Пользовательские суб-вкладки";
$lang['custom_tab_sub_info'] = "Добавление настраиваемых суб-вкладок при наведении курсора на 'Пользовательскую вкладку'.";
$lang['custom_tab_sub_name'] = "Суб-вкладка #1 Название";
$lang['custom_tab_sub_link'] = "Суб-вкладка #1 Ссылка";
$lang['custom_tab_sub_name2'] = "Суб-вкладка #2 Название";
$lang['custom_tab_sub_link2'] = "Суб-вкладка #2 Ссылка";
$lang['custom_tab_sub_name3'] = "Суб-вкладка #3 Название";
$lang['custom_tab_sub_link3'] = "Суб-вкладка #3 Ссылка";
$lang['custom_tab_sub_name4'] = "Суб-вкладка #4 Название";
$lang['custom_tab_sub_link4'] = "Суб-вкладка #4 Ссылка";
$lang['custom_tab_target_blank'] = "Цель пользовательской вкладки";
$lang['custom_tab_target_blank_info'] = "Устанавливает цель всех вкладок. <b style='font-size:10px; font-weight:normal;'>('_self' = Открывает ссылку на одной странице. '_blank'  =  Открывает ссылку на новой странице.)</b>";
$lang['bg_wrapper'] = "Задний фон";
$lang['bg_wrapper_info'] = "Картинка заднего фона. <b style='font-size:10px; font-weight:normal;'>(Только для темы Revolution.)</b>";

?>
