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
define('maintenance_mode_info', "Отключить панель для обычных пользователей.. Только администраторы могут получить к нему доступ во время обслуживания.");
define('maintenance_title', "Заголовок обслуживания");
define('maintenance_title_info', "Название, которое отображается для обычных пользователей во время обслуживания.");
define('maintenance_message', "Сообщение");
define('maintenance_message_info', "Это сообщение будет показано обычным пользователям во время обслуживания.");
define('update_settings', "Обновить настройки");
define('settings_updated', "Настройки удачно обновлены");
define('panel_language', "Язык");
define('panel_language_info', "Выбранный язык будет установлен всем пользователям по умолчанию, но они смогут его сменить в настройках своего профиля");
define('page_auto_refresh', "Автообновление страниц");
define('page_auto_refresh_info', "Отключение этого может помочь при отладке. Желательно его включить.");
define('smtp_server', "Сервер исходящей почты");
define('smtp_server_info', "SMTP сервер исходящей почты, обычно используется для того чтобы посылать забытые пароли пользователям, localhost по умолчанию.");
define('panel_email_address', "Исходящий адрес почты");
define('panel_email_address_info', "Адрес откуда будет высылаться почта.");
define('panel_name', "Название панели");
define('panel_name_info', "Название Панели которое будет показано в Заголовке. ");
define('feed_enable', "Включить LGSL Feed");
define('feed_enable_info', "If your webhost has a firewall which is blocking the query port, then you need to open the port manually.");
define('feed_url', "Feed URL");
define('feed_url_info', "GrayCube.com распространяет LGSL feed через URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Кодировка текста");
define('charset_info', "UTF8, ISO, ASCII, etc... Оставьте поле пустым, чтобы использовать кодировку ISO.");
define('steam_user', "Пользователь Steam");
define('steam_user_info', "Этот пользователь необходим для входа в Steam для загрузки некоторых новых игр, таких как CS:GO.");
define('steam_pass', "Пароль Steam");
define('steam_pass_info', "Впишите сюда пароль от учетной записи Steam");
define('steam_guard', "Защита Steam");
define('steam_guard_info', "Некоторые пользователи активируют защиту паролем для защиты своих учетных записей от хакеров,<br>Этот код отправляется в электронную почту учетной записи при запуске первого обновления.");
define('smtp_port', "SMTP-порт");
define('smtp_port_info', "Если SMTP-порт не по умолчанию (25) тогда введите здесь SMTP-порт.");
define('smtp_login', "SMTP-пользователь");
define('smtp_login_info', "Если Ваш SMTP-сервер требует авторизации, тогда введите здесь пользователя.");
define('smtp_passw', "SMTP-пароль");
define('smtp_passw_info', "Если вы не установите пароль, авторизации SMTP будет отключена.");
define('smtp_secure', "SMTP Безопасность");
define('smtp_secure_info', "Использовать SSL/TLS для подключения к SMTP-серверу");
define('time_zone', "Временная зона");
define('time_zone_info', "Устанавливает часовой пояс по умолчанию, используемый всеми функциями Дата/Время.");
define('query_cache_life', "Срок жизни кэша запросов");
define('query_cache_life_info', "Установите тайм-аут в секундах, для обновления состояния сервера.");
define('query_num_servers_stop', "Отключить запросы к Игровым Серверам после ");
define('query_num_servers_stop_info', "Используйте этот параметр, чтобы отключить запросы к серверам, если пользователю принадлежит больше игровых серверов, чем указанно тут, чтобы ускорить загрузку панели.");
define('editable_email', "Возможность редактировать E-Mail пользователем");
define('editable_email_info', "Разрешает редактировать пользователям свой e-mail адрес");
define('old_dashboard_behavior', "Старый вид Главной страница OGP");
define('old_dashboard_behavior_info', "Если включить старый вид, он будет медленней, так как он будет выводить на главную страницу по мимо Названия сервер и IP с портом еще и количество игроков на каждом сервер, карту и Пользователь в сети");
define('rsync_available', "Возможность rsync серверов");
define('rsync_available_info', "Выберите список серверов, который будет показан в установке rsync.");
define('all_available_servers', "Все доступные серверы ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Только удаленные сервера ( rsync_sites.list )");
define('only_local_servers', "Только локальные сервер ( rsync_sites_local.list )");
define('header_code', "Код в Header");
define('header_code_info', "Здесь вы можете написать собственный код заголовка (например, HTML-код, код встроенного кода и т.д.) Без редактирования кода темы.");
define('support_widget_title', "Название виджета поддержки");
define('support_widget_title_info', "Пользовательский заголовок для виджета поддержки в панели.");
define('support_widget_content', "Содержимое виджета поддержки");
define('support_widget_content_info', "Содержимое виджета поддержки, дает возможность использовать в HTML-код.");
define('support_widget_link', "Ссылка на виджет поддержки");
define('support_widget_link_info', "URL вашего сайта поддержки.");
define('recaptcha_site_key', "Ключ - Recaptcha Site Key");
define('recaptcha_site_key_info', "Ключ сайта - Site Key , предоставленный вам от Google.");
define('recaptcha_secret_key', "Ключ - Recaptcha Secret Key");
define('recaptcha_secret_key_info', "Секретный ключ - secret key , предоставленный вам от Google.");
define('recaptcha_use_login', "Использовать Recaptcha при Входе");
define('recaptcha_use_login_info', "Если включено, то при входа в систему пользователи должны будут вводить еще и Recaptcha.");
define('login_attempts_before_banned', "Количество неудачных попыток входа в систему до того, как пользователь будет заблокирован.");
define('login_attempts_before_banned_info', "Если пользователь пытается войти в систему с недопустимыми учетными данными больше, чем установлено, пользователь будет временно заблокирован панелью.");
define('custom_github_update_username', "Имя пользователя для обновления с GitHub");
define('custom_github_update_username_info', "Введите свое имя пользователя GitHub ТОЛЬКО для использования ваших собственных разветвленных репозиториев для обновления OGP. Это должно быть изменено только разработчиками, которые хотят использовать свои собственные репозитории для разработки, а не проверять возможный кода ошибки в основной ветке.");
define('remote_query', "Удаленный запрос");
define('remote_query_info', "Используйте удаленный сервер (Агент), чтобы делать запросы на игровые серверы (только для GameQ и LGSL).");
define('check_expiry_by', "Проверка срока действия");
define('check_expiry_by_info', "Если установлено значение 'После входа в систему', назначенные игровые сервера пользователя будут автоматически удалены, если прошло время истечения срока действия. Если установлено 'Задание в Сron', вам нужно будет создать задачу в cron, используя модуль cron, чтобы проверить дату истечения срока с заданным интервалом.");
define('once_logged_in', "После входа в систему");
define('cron_job', "Задание в Сron");
define('theme_settings', "Настройки темы");
define('theme', "Тема");
define('theme_info', "Выбранная тема будет установлена всем пользователям по умолчанию, но они смогут ее сменить в настройках своего профиля.");
define('welcome_title', "Приветственное Сообщение");
define('welcome_title_info', "Включает заголовок, который отображается в верхней части приборной панели.");
define('welcome_title_message', "Тело приветственное Сообщение");
define('welcome_title_message_info', "Заголовок сообщения, которое отображается в верхней части приборной панели (HTML разрешен).");
define('logo_link', "Ссылка на логотип");
define('logo_link_info', "Ссылка на логотип. <b style='font-size:10px; font-weight:normal;'>(Если оставить пустым, то будет отображен логотип OGP)</b>");
define('custom_tab', "Настраиваемые вкладки меню");
define('custom_tab_info', "Добавляет настраиваемые вкладки в конце меню. <b style='font-size:10px; font-weight:normal;'>(Примените и обновите страницу, чтобы редактировать параметры вкладок меню)</b>");
define('custom_tab_name', "Название настраиваемой вкладки меню");
define('custom_tab_name_info', "Отображаемое название вкладки меню.");
define('custom_tab_link', "Ссылка вкладки меню");
define('custom_tab_link_info', "Ссылка на вкладки меню.");
define('custom_tab_sub', "Настраиваемые вкладки под-меню");
define('custom_tab_sub_info', "Добавление настраиваемых вкладки под-меню при наведении курсора на 'Настраиваемые вкладки меню'.");
define('custom_tab_sub_name', "Под-меню #1 Название");
define('custom_tab_sub_link', "Под-меню #1 Ссылка");
define('custom_tab_sub_name2', "Под-меню #2 Название");
define('custom_tab_sub_link2', "Под-меню #2 Ссылка");
define('custom_tab_sub_name3', "Под-меню #3 Название");
define('custom_tab_sub_link3', "Под-меню #3 Ссылка");
define('custom_tab_sub_name4', "Под-меню #4 Название");
define('custom_tab_sub_link4', "Под-меню #4 Ссылка");
define('custom_tab_target_blank', "Метод открытия вкладки меню");
define('custom_tab_target_blank_info', "Установка для всех вкладок. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Открывает ссылку на одной странице. New_Page  =  Открывает ссылку на новую вкладку.)</b>");
define('bg_wrapper', "Задний фон");
define('bg_wrapper_info', "Картинка заднего фона. <b style='font-size:10px; font-weight:normal;'>(Только для темы Revolution.)</b>");
define('show_server_id_game_monitor', "Показывать ID сервера на странице Игрового Мониторинга");
define('show_server_id_game_monitor_info', "Показывает ID Игрового сервер на странице Мониторинга для сопоставления созданных файлов Агентом на Актуальном Игровом сервере.");
?>
