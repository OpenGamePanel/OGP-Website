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

define('OGP_LANG_maintenance_mode', "Обслуживание");
define('OGP_LANG_maintenance_mode_info', "Отключить панель для обычных пользователей.. Только администраторы могут получить к нему доступ во время обслуживания.");
define('OGP_LANG_maintenance_title', "Заголовок обслуживания");
define('OGP_LANG_maintenance_title_info', "Название, которое отображается для обычных пользователей во время обслуживания.");
define('OGP_LANG_maintenance_message', "Сообщение");
define('OGP_LANG_maintenance_message_info', "Это сообщение будет показано обычным пользователям во время обслуживания.");
define('OGP_LANG_update_settings', "Обновить настройки");
define('OGP_LANG_settings_updated', "Настройки удачно обновлены");
define('OGP_LANG_panel_language', "Язык");
define('OGP_LANG_panel_language_info', "Выбранный язык будет установлен всем пользователям по умолчанию, но они смогут его сменить в настройках своего профиля");
define('OGP_LANG_page_auto_refresh', "Автообновление страниц");
define('OGP_LANG_page_auto_refresh_info', "Отключение этого может помочь при отладке. Желательно его включить.");
define('OGP_LANG_smtp_server', "Сервер исходящей почты");
define('OGP_LANG_smtp_server_info', "SMTP сервер исходящей почты, обычно используется для того чтобы посылать забытые пароли пользователям, localhost по умолчанию.");
define('OGP_LANG_panel_email_address', "Исходящий адрес почты");
define('OGP_LANG_panel_email_address_info', "Адрес откуда будет высылаться почта.");
define('OGP_LANG_panel_name', "Название панели");
define('OGP_LANG_panel_name_info', "Название Панели которое будет показано в Заголовке. ");
define('OGP_LANG_feed_enable', "Включить LGSL Feed");
define('OGP_LANG_feed_enable_info', "Если на вашем веб-хостинге есть брандмауэр, который блокирует query порт, тогда вам следует открыть данный порт вручную.");
define('OGP_LANG_feed_url', "URL канала");
define('OGP_LANG_feed_url_info', "GrayCube.com распространяет LGSL feed через URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Пользователь Steam");
define('OGP_LANG_steam_user_info', "Этот пользователь необходим для входа в Steam для загрузки некоторых новых игр, таких как CS:GO.");
define('OGP_LANG_steam_pass', "Пароль Steam");
define('OGP_LANG_steam_pass_info', "Впишите сюда пароль от учетной записи Steam");
define('OGP_LANG_steam_guard', "Защита Steam");
define('OGP_LANG_steam_guard_info', "Некоторые пользователи активируют защиту паролем для защиты своих учетных записей от хакеров,<br>Этот код отправляется в электронную почту учетной записи при запуске первого обновления.");
define('OGP_LANG_smtp_port', "SMTP-порт");
define('OGP_LANG_smtp_port_info', "Если SMTP-порт не по умолчанию (25) тогда введите здесь SMTP-порт.");
define('OGP_LANG_smtp_login', "SMTP-пользователь");
define('OGP_LANG_smtp_login_info', "Если Ваш SMTP-сервер требует авторизации, тогда введите здесь пользователя.");
define('OGP_LANG_smtp_passw', "SMTP-пароль");
define('OGP_LANG_smtp_passw_info', "Если вы не установите пароль, авторизации SMTP будет отключена.");
define('OGP_LANG_smtp_secure', "SMTP Безопасность");
define('OGP_LANG_smtp_secure_info', "Использовать SSL/TLS для подключения к SMTP-серверу");
define('OGP_LANG_time_zone', "Временная зона");
define('OGP_LANG_time_zone_info', "Устанавливает часовой пояс по умолчанию, используемый всеми функциями Дата/Время.");
define('OGP_LANG_query_cache_life', "Срок жизни кэша запросов");
define('OGP_LANG_query_cache_life_info', "Установите тайм-аут в секундах, для обновления состояния сервера.");
define('OGP_LANG_query_num_servers_stop', "Отключить запросы к Игровым Серверам после ");
define('OGP_LANG_query_num_servers_stop_info', "Используйте этот параметр, чтобы отключить запросы к серверам, если пользователю принадлежит больше игровых серверов, чем указанно тут, чтобы ускорить загрузку панели.");
define('OGP_LANG_editable_email', "Возможность редактировать E-Mail пользователем");
define('OGP_LANG_editable_email_info', "Разрешает редактировать пользователям свой e-mail адрес");
define('OGP_LANG_old_dashboard_behavior', "Старый вид Главной страница OGP");
define('OGP_LANG_old_dashboard_behavior_info', "Старая панель мониторинга работает медленнее, но отображает больше информации о сервере (например, текущие игроки, карту и т.д.).");
define('OGP_LANG_rsync_available', "Доступные сервера Rsync");
define('OGP_LANG_rsync_available_info', "Выберите список серверов, который будет показан в установке rsync.");
define('OGP_LANG_all_available_servers', "Все доступные серверы ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Только удаленные сервера ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Только локальные сервер ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Код в Header");
define('OGP_LANG_header_code_info', "Здесь вы можете написать собственный код заголовка (например, HTML-код, код встроенного кода и т.д.) Без редактирования кода темы.");
define('OGP_LANG_support_widget_title', "Название виджета поддержки");
define('OGP_LANG_support_widget_title_info', "Пользовательский заголовок для виджета поддержки в панели.");
define('OGP_LANG_support_widget_content', "Содержимое виджета поддержки");
define('OGP_LANG_support_widget_content_info', "Содержимое виджета поддержки  (HTML-код разрешено использовать).");
define('OGP_LANG_support_widget_link', "Ссылка на виджет поддержки");
define('OGP_LANG_support_widget_link_info', "URL вашего сайта поддержки.");
define('OGP_LANG_recaptcha_site_key', "Ключ - Recaptcha Site Key");
define('OGP_LANG_recaptcha_site_key_info', "Ключ сайта - Site Key , предоставленный вам от Google.");
define('OGP_LANG_recaptcha_secret_key', "Ключ - Recaptcha Secret Key");
define('OGP_LANG_recaptcha_secret_key_info', "Секретный ключ - secret key , предоставленный вам от Google.");
define('OGP_LANG_recaptcha_use_login', "Использовать Recaptcha при Входе");
define('OGP_LANG_recaptcha_use_login_info', "Если включено, то при входа в систему пользователи должны будут вводить еще и Recaptcha.");
define('OGP_LANG_login_attempts_before_banned', "Количество неудачных попыток входа в систему до того, как пользователь будет заблокирован.");
define('OGP_LANG_login_attempts_before_banned_info', "Если пользователь пытается войти в систему с недопустимыми учетными данными больше, чем установлено, пользователь будет временно заблокирован панелью.");
define('OGP_LANG_custom_github_update_username', "Имя пользователя для обновления с GitHub");
define('OGP_LANG_custom_github_update_username_info', "Введите свое имя пользователя GitHub ТОЛЬКО для использования ваших собственных разветвленных репозиториев для обновления OGP. Это должно быть изменено только разработчиками, которые хотят использовать свои собственные репозитории для разработки, а не проверять возможный кода ошибки в основной ветке.");
define('OGP_LANG_remote_query', "Удаленный запрос");
define('OGP_LANG_remote_query_info', "Используйте удаленный сервер (Агент), чтобы делать запросы на игровые серверы (только для GameQ и LGSL).");
define('OGP_LANG_check_expiry_by', "Проверка срока действия");
define('OGP_LANG_check_expiry_by_info', "Если установлено значение 'После входа в систему', назначенные игровые сервера пользователя будут автоматически удалены, если прошло время истечения срока действия. Если установлено 'Задание в Сron', вам нужно будет создать задачу в cron, используя модуль cron, чтобы проверить дату истечения срока с заданным интервалом.");
define('OGP_LANG_once_logged_in', "После входа в систему");
define('OGP_LANG_cron_job', "Задание в Сron");
define('OGP_LANG_theme_settings', "Настройки темы");
define('OGP_LANG_theme', "Тема");
define('OGP_LANG_theme_info', "Выбранная тема будет установлена всем пользователям по умолчанию, но они смогут ее сменить в настройках своего профиля.");
define('OGP_LANG_welcome_title', "Приветственное Сообщение");
define('OGP_LANG_welcome_title_info', "Включает заголовок, который отображается в верхней части панели инструментов.");
define('OGP_LANG_welcome_title_message', "Тело приветственное Сообщение");
define('OGP_LANG_welcome_title_message_info', "Заголовок, отображаемый в верхней части панели инструментов (разрешен HTML-код).");
define('OGP_LANG_logo_link', "Ссылка на логотип");
define('OGP_LANG_logo_link_info', "Ссылка на логотип. <b style='font-size:10px; font-weight:normal;'>(Если оставить пустым, то будет отображен логотип OGP)</b>");
define('OGP_LANG_custom_tab', "Настраиваемые вкладки меню");
define('OGP_LANG_custom_tab_info', "Добавляет настраиваемые вкладки в конце меню. <b style='font-size:10px; font-weight:normal;'>(Примените и обновите страницу, чтобы редактировать параметры вкладок меню)</b>");
define('OGP_LANG_custom_tab_name', "Название настраиваемой вкладки меню");
define('OGP_LANG_custom_tab_name_info', "Отображаемое название вкладки меню.");
define('OGP_LANG_custom_tab_link', "Ссылка вкладки меню");
define('OGP_LANG_custom_tab_link_info', "Ссылка на вкладки меню.");
define('OGP_LANG_custom_tab_sub', "Настраиваемые вкладки под-меню");
define('OGP_LANG_custom_tab_sub_info', "Добавление настраиваемых вкладки под-меню при наведении курсора на 'Настраиваемые вкладки меню'.");
define('OGP_LANG_custom_tab_sub_name', "Под-меню #1 Название");
define('OGP_LANG_custom_tab_sub_link', "Под-меню #1 Ссылка");
define('OGP_LANG_custom_tab_sub_name2', "Под-меню #2 Название");
define('OGP_LANG_custom_tab_sub_link2', "Под-меню #2 Ссылка");
define('OGP_LANG_custom_tab_sub_name3', "Под-меню #3 Название");
define('OGP_LANG_custom_tab_sub_link3', "Под-меню #3 Ссылка");
define('OGP_LANG_custom_tab_sub_name4', "Под-меню #4 Название");
define('OGP_LANG_custom_tab_sub_link4', "Под-меню #4 Ссылка");
define('OGP_LANG_custom_tab_target_blank', "Метод открытия вкладки меню");
define('OGP_LANG_custom_tab_target_blank_info', "Установка для всех вкладок. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Открывает ссылку на одной странице. New_Page  =  Открывает ссылку на новую вкладку.)</b>");
define('OGP_LANG_bg_wrapper', "Задний фон");
define('OGP_LANG_bg_wrapper_info', "Картинка заднего фона. <b style='font-size:10px; font-weight:normal;'>(Только для темы Revolution.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Показывать ID сервера на странице Игрового Мониторинга");
define('OGP_LANG_show_server_id_game_monitor_info', "Показывает ID Игрового сервер на странице Мониторинга для сопоставления созданных файлов Агентом на Актуальном Игровом сервере.");
define('OGP_LANG_default_game_server_home_path_prefix', "Префикс домашней директории игрового сервера по умолчанию");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Введите префикс пути для  домашнего пути игрового сервера  по умолчанию. Вы можете использовать \"{USERNAME}\" в пути, который будет заменен на имя пользователя OGP, которому назначен игровой сервер. Вы можете использовать  \"{GAMEKEY}\" в пути, который будет заменен дружественным строчным именем. Вы можете использовать \"{SKIPID}\" в любом месте пути, чтобы пропустить добавление домашнего идентификатора к пути. Пример: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} станет / ogp / games / username / arkse /. Пример 2:  /ogp/games will become /ogp/games/1, где 1 - идентификатор игровых серверов.");
define('OGP_LANG_use_authorized_hosts', "Limit API to Defined Authorized Hosts");
define('OGP_LANG_use_authorized_hosts_info', "Enable this setting to only allow API calls from pre-defined and approved IP addresses.&nbsp; Approved addresses can be set on this page once the setting has been enabled.&nbsp; If this setting is disabled, a user using a valid key will have access to the API from any IP address.&nbsp; Users using a valid key will be able to use the API to manage any game server they have permissions to administrate.");
define('OGP_LANG_setup_api_authorized_hosts', "Настройка API авторизованных хостов");
define('OGP_LANG_autohorized_hosts', "Авторизованные хосты");
define('OGP_LANG_add', "Добавить");
define('OGP_LANG_remove', "Удалить");
define('OGP_LANG_default_trusted_hosts', "Доверенные хосты по умолчанию");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Доверенные хосты или прокси (адреса IPv4 / IPv6 или CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Доверенные переадресованные IP-адреса (адреса IPv4 / IPv6 или CIDR)");
define('OGP_LANG_reset_game_server_order', "Reset Game Server Ordering");
define('OGP_LANG_reset_game_server_order_info', "Resets game server ordering back to the default of using the server ID");


?>
