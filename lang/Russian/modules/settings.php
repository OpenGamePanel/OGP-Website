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

define('maintenance_mode', "Обслуживание");
define('maintenance_mode_info', "Disable the Panel for normal users. Only administrators can access it during maintenance.");
define('maintenance_title', "Заголовок обслуживания");
define('maintenance_title_info', "Название, которое отображается для обычных пользователей во время обслуживания.");
define('maintenance_message', "Сообщение");
define('maintenance_message_info', "Это сообщение будет показано обычным пользователям во время обслуживания.");
define('update_settings', "Update Settings");
define('settings_updated', "Settings successfully updated.");
define('panel_language', "Язык");
define('panel_language_info', "Выбранный язык будет установлен всем пользователям по умолчанию, но они смогут его сменить в настройках своего профиля");
define('page_auto_refresh', "Автообновление страниц");
define('page_auto_refresh_info', "Отключение этого может помочь при отладке. Желательно его включить.");
define('smtp_server', "Сервер исходящей почты");
define('smtp_server_info', "SMTP сервер исходящей почты, обычно используется для того чтобы посылать забытые пароли пользователям, localhost по умолчанию.");
define('panel_email_address', "Исходящий адрес почты");
define('panel_email_address_info', "Адрес откуда будет высылаться почта.");
define('panel_name', "Название панели");
define('panel_name_info', "Название которое будет показывается в названии страницы.");
define('feed_enable', "Включить LGSL Feed");
define('feed_enable_info', "Если ваш брандмауэр блокирует query port вам надо разрешить его.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com распространяет LGSL feed через URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Кодировка текста");
define('charset_info', "UTF8, ISO, ASCII, etc... Leave it blank to use ISO encoding.");
define('steam_user', "Steam User");
define('steam_user_info', "This user is needed to log in to steam for download some new games like CS:GO.");
define('steam_pass', "Steam Password");
define('steam_pass_info', "Set here the steam account password.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Some users have steam guard activated to protect their accounts from hackers,<br>this code is sent to the account email when the first steam update is started.");
define('smtp_port', "SMTP Port");
define('smtp_port_info', "If SMTP port is not the default port (25) Enter the SMTP port here.");
define('smtp_login', "SMTP User");
define('smtp_login_info', "If your SMTP server requires authentication, enter your user name here.");
define('smtp_passw', "SMTP Password");
define('smtp_passw_info', "If you do not set a password the SMTP authentication will be disabled.");
define('smtp_secure', "SMTP Secure");
define('smtp_secure_info', "Use SSL/TLS to connect to the SMTP server");
define('time_zone', "Time Zone");
define('time_zone_info', "Sets the default timezone used by all date/time functions.");
define('query_cache_life', "Query cache life");
define('query_cache_life_info', "Sets the timeout in seconds before the server status is refreshed.");
define('query_num_servers_stop', "Disable Game Server Queries After");
define('query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('editable_email', "Editable E-Mail Address");
define('editable_email_info', "Select if users can edit their e-mail address or not.");
define('old_dashboard_behavior', "Old Dashboard behavior");
define('old_dashboard_behavior_info', "The old Dashboard was running slower but shows more server information, current players and map.");
define('rsync_available', "Available rsync servers");
define('rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Only remote servers ( rsync_sites.list )");
define('only_local_servers', "Only local servers ( rsync_sites_local.list )");
define('header_code', "Header code");
define('header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('support_widget_title', "Support widget title");
define('support_widget_title_info', "A custom title for the support widget in the Dashboard.");
define('support_widget_content', "Support widget content");
define('support_widget_content_info', "The content of the support widget, you can use HTML code.");
define('support_widget_link', "Support widget link");
define('support_widget_link_info', "The URL of your support site.");
define('recaptcha_site_key', "Recaptcha Site Key");
define('recaptcha_site_key_info', "The site key provided to you by Google.");
define('recaptcha_secret_key', "Recaptcha Secret Key");
define('recaptcha_secret_key_info', "The secret key provided to you by Google.");
define('recaptcha_use_login', "Use Recaptcha on Login");
define('recaptcha_use_login_info', "If enabled, users will have to solve the Not a Robot Recaptcha when attempting to login.");
define('login_attempts_before_banned', "Number of failed login attempts before user is banned");
define('login_attempts_before_banned_info', "If a user tries to login with invalid credentials more than this many times, the user will be banned temporarily by the panel.");
define('custom_github_update_username', "GitHub update username");
define('custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('remote_query', "Remote query");
define('remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('check_expiry_by', "Check expiration using");
define('check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('once_logged_in', "Once Logged In");
define('cron_job', "Cron Job");
define('theme_settings', "Настройки темы");
define('theme', "Тема");
define('theme_info', "Выбранная тема будет установлена всем пользователям по умолчанию, но они смогут ее сменить в настройках своего профиля.");
define('welcome_title', "Добро пожаловать Название");
define('welcome_title_info', "Включает заголовок, который отображается в верхней части приборной панели.");
define('welcome_title_message', "Здравствуйте, Тема Сообщение");
define('welcome_title_message_info', "Заголовок сообщения, которое отображается в верхней части приборной панели (HTML запрещено).");
define('logo_link', "Ссылка на логотип");
define('logo_link_info', "Ссылка на логотип. <b style='font-size:10px; font-weight:normal;'>(Если оставить пустым, то будет отображен логотип OGP)</b>");
define('custom_tab', "Пользовательские вкладки");
define('custom_tab_info', "Добавляет настраиваемые вкладки в конце меню. <b style='font-size:10px; font-weight:normal;'>(Примените и обновите страницу, чтобы редактировать параметры вкладки)</b>");
define('custom_tab_name', "Название вкладки");
define('custom_tab_name_info', "Отображаемое название вкладки.");
define('custom_tab_link', "Ссылка вкладки");
define('custom_tab_link_info', "Ссылка на вкладку.");
define('custom_tab_sub', "Пользовательские суб-вкладки");
define('custom_tab_sub_info', "Добавление настраиваемых суб-вкладок при наведении курсора на 'Пользовательскую вкладку'.");
define('custom_tab_sub_name', "Суб-вкладка #1 Название");
define('custom_tab_sub_link', "Суб-вкладка #1 Ссылка");
define('custom_tab_sub_name2', "Суб-вкладка #2 Название");
define('custom_tab_sub_link2', "Суб-вкладка #2 Ссылка");
define('custom_tab_sub_name3', "Суб-вкладка #3 Название");
define('custom_tab_sub_link3', "Суб-вкладка #3 Ссылка");
define('custom_tab_sub_name4', "Суб-вкладка #4 Название");
define('custom_tab_sub_link4', "Суб-вкладка #4 Ссылка");
define('custom_tab_target_blank', "Цель пользовательской вкладки");
define('custom_tab_target_blank_info', "Устанавливает цель всех вкладок. <b style='font-size:10px; font-weight:normal;'>('_self' = Открывает ссылку на одной странице. '_blank'  =  Открывает ссылку на новой странице.)</b>");
define('bg_wrapper', "Задний фон");
define('bg_wrapper_info', "Картинка заднего фона. <b style='font-size:10px; font-weight:normal;'>(Только для темы Revolution.)</b>");
define('show_server_id_game_monitor', "Show Server IDs on Game Monitor page");
define('show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
?>