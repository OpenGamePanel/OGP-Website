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

define('OGP_LANG_maintenance_mode', "اعمال صيانة");
define('OGP_LANG_maintenance_mode_info', "تعطيل لوحة للمستخدمين العاديين. يمكن للمشرفين فقط الوصول إليه أثناء الصيانة.");
define('OGP_LANG_maintenance_title', "عنوان الصيانة");
define('OGP_LANG_maintenance_title_info', "العنوان الذي يتم عرضه للمستخدمين العاديين أثناء الصيانة.");
define('OGP_LANG_maintenance_message', "رسالة الصيانة");
define('OGP_LANG_maintenance_message_info', "الرسالة التي يتم عرضها للمستخدمين العاديين أثناء الصيانة.");
define('OGP_LANG_update_settings', "إعدادات التحديث");
define('OGP_LANG_settings_updated', "تم تحديث الإعدادات بنجاح.");
define('OGP_LANG_panel_language', "لغة اللوحة");
define('OGP_LANG_panel_language_info', "هذه اللغة هي اللغة الافتراضية للوحة. يمكن للمستخدمين تغيير لغتهم من صفحة تعديل ملفاتهم الشخصية.");
define('OGP_LANG_page_auto_refresh', "تحديث تلقائي للصفحة");
define('OGP_LANG_page_auto_refresh_info', "يتم استخدام إعدادات التحديث التلقائي للصفحة بشكل أساسي في تصحيح أخطاء اللوحة. في الاستخدام العادي ، يجب ضبط هذا على تشغيل.");
define('OGP_LANG_smtp_server', "خادم البريد الإلكتروني الصادر");
define('OGP_LANG_smtp_server_info', "هذا هو خادم البريد الصادر (خادم SMTP) المستخدم ، على سبيل المثال ، لإرسال كلمات المرور المنسية للمستخدمين ، localhost بشكل افتراضي.");
define('OGP_LANG_panel_email_address', "عنوان البريد الإلكتروني الصادر");
define('OGP_LANG_panel_email_address_info', "هذا هو عنوان البريد الإلكتروني الموجود في الحقل عند إرسال كلمات المرور إلى المستخدمين.");
define('OGP_LANG_panel_name', "اسم اللوحة");
define('OGP_LANG_panel_name_info', "اسم اللوحة التي تظهر في عنوان الصفحة. ستؤدي هذه القيمة إلى تجاوز جميع عناوين الصفحات ، إذا لم تكن فارغة.");
define('OGP_LANG_feed_enable', "تفغيل خلاصة LGSL");
define('OGP_LANG_feed_enable_info', "إذا كان مضيف الويب الخاص بك يحتوي على جدار حماية يحظر منفذ الاستعلام ، فأنت بحاجة إلى فتح المنفذ يدويًا.");
define('OGP_LANG_feed_url', "Feed URL");
define('OGP_LANG_feed_url_info', "يشارك GreyCube.com موجز LGSL على العنوان:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "إسم مستخدم الSteam");
define('OGP_LANG_steam_user_info', "هذا المستخدم مطلوب لتسجيل الدخول إلى steam لتنزيل بعض الألعاب الجديدة مثل CS:GO.");
define('OGP_LANG_steam_pass', "كلمة سر الSteam");
define('OGP_LANG_steam_pass_info', "قم بتعيين كلمة مرور حساب الSteam هنا.");
define('OGP_LANG_steam_guard', "حامي الSteam");
define('OGP_LANG_steam_guard_info', "بعض المستخدمين قاموا بتنشيط حارس Steam لحماية حساباتهم من القراصنة،<br>يتم إرسال هذا الرمز إلى البريد الإلكتروني للحساب عند بدء تحديث Steam الأول.");
define('OGP_LANG_smtp_port', "منفذ بروتوكول نقل البريد البسيط (SMTP)");
define('OGP_LANG_smtp_port_info', "If SMTP port is not the default port (25) Enter the SMTP port here.");
define('OGP_LANG_smtp_login', "مستخدم بروتوكول نقل البريد البسيط (SMTP)");
define('OGP_LANG_smtp_login_info', "If your SMTP server requires authentication, enter your user name here.");
define('OGP_LANG_smtp_passw', "SMTP Password");
define('OGP_LANG_smtp_passw_info', "If you do not set a password the SMTP authentication will be disabled.");
define('OGP_LANG_smtp_secure', "SMTP Secure");
define('OGP_LANG_smtp_secure_info', "Use SSL/TLS to connect to the SMTP server");
define('OGP_LANG_time_zone', "الوحدة زمنية");
define('OGP_LANG_time_zone_info', "Sets the default timezone used by all date/time functions.");
define('OGP_LANG_query_cache_life', "Query cache life");
define('OGP_LANG_query_cache_life_info', "يضبط المهلة بالثواني قبل تحديث حالة الخادم.");
define('OGP_LANG_query_num_servers_stop', "تعطيل استعلامات خادم اللعبة بعد");
define('OGP_LANG_query_num_servers_stop_info', "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.");
define('OGP_LANG_editable_email', "عنوان البريد الإلكتروني قابل للتعديل");
define('OGP_LANG_editable_email_info', "حدد ما إذا كان يمكن للمستخدمين تعديل عنوان بريدهم الإلكتروني أم لا.");
define('OGP_LANG_old_dashboard_behavior', "لوحة القيادة القديمة");
define('OGP_LANG_old_dashboard_behavior_info', "كانت لوحة التحكم القديمة تعمل بشكل أبطأ ، ولكنها تعرض المزيد من معلومات الخادم (مثل اللاعبين والخرائط الحالية).");
define('OGP_LANG_rsync_available', "Available Rsync servers");
define('OGP_LANG_rsync_available_info', "Select what servers list will be shown in the rsync installation.");
define('OGP_LANG_all_available_servers', "All available servers ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "الخوادم البعيدة فقط ( rsync_sites_local.list )");
define('OGP_LANG_only_local_servers', "الخوادم المحلية فقط ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Header code");
define('OGP_LANG_header_code_info', "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.");
define('OGP_LANG_support_widget_title', "عنوان قطعة الدعم");
define('OGP_LANG_support_widget_title_info', "عنوان مخصص لعنصر الدعم في لوحة القيادة.");
define('OGP_LANG_support_widget_content', "محتوى قطعة الدعم");
define('OGP_LANG_support_widget_content_info', "The content of the support widget (HTML code allowed).");
define('OGP_LANG_support_widget_link', "رابط قطعة الدعم");
define('OGP_LANG_support_widget_link_info', "عنوان URL لموقع الدعم الخاص بك.");
define('OGP_LANG_recaptcha_site_key', "مفتاح موقع Recaptcha");
define('OGP_LANG_recaptcha_site_key_info', "مفتاح الموقع الذي تقدمه لك Google.");
define('OGP_LANG_recaptcha_secret_key', "مفتاح Recaptcha السري");
define('OGP_LANG_recaptcha_secret_key_info', "المفتاح السري الذي تقدمه لك Google.");
define('OGP_LANG_recaptcha_use_login', "استخدم Recaptcha عند تسجيل الدخول");
define('OGP_LANG_recaptcha_use_login_info', "إذا كانت مفعلة ، سيتعين على المستخدمين حل لست روبوت Recaptcha عند محاولة تسجيل الدخول.");
define('OGP_LANG_login_attempts_before_banned', "عدد محاولات تسجيل الدخول الفاشلة قبل حظر المستخدم");
define('OGP_LANG_login_attempts_before_banned_info', "إذا حاول مستخدم تسجيل الدخول باستخدام بيانات اعتماد غير صالحة أكثر من ذلك عدة مرات ، فسيتم حظر المستخدم مؤقتًا من قبل اللوحة.");
define('OGP_LANG_custom_github_update_username', "GitHub update username");
define('OGP_LANG_custom_github_update_username_info', "Enter your GitHub username ONLY to use your own forked repositories to update OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.");
define('OGP_LANG_custom_github_update_branch_name', "GitHub branch name");
define('OGP_LANG_custom_github_update_branch_name_info', "Enter the branch name you want to use for updating OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.&nbsp; Leave this field blank to default to \"master\"");

define('OGP_LANG_remote_query', "Remote query");
define('OGP_LANG_remote_query_info', "Use the remote server (agent) to make queries to the game servers (Only GameQ and LGSL).");
define('OGP_LANG_check_expiry_by', "Check expiration using");
define('OGP_LANG_check_expiry_by_info', "If set to once_logged_in, the user's game server assignments will be automatically deleted if past the expiration date. If set to cron_job, you will need to create a cron task using the cron module to check for the expiration date at a configured interval.");
define('OGP_LANG_once_logged_in', "بمجرد تسجيل الدخول");
define('OGP_LANG_cron_job', "Cron Job");
define('OGP_LANG_theme_settings', "Theme Settings");
define('OGP_LANG_theme', "القالب");
define('OGP_LANG_theme_info', "سيكون المظهر المحدد هنا هو المظهر الافتراضي لجميع المستخدمين. يمكن للمستخدمين تغيير المظهر من صفحة ملفهم الشخصي.");
define('OGP_LANG_welcome_title', "عنوان الترحيب");
define('OGP_LANG_welcome_title_info', "تفعيل العنوان المعروض أعلى لوحة البيانات.");
define('OGP_LANG_welcome_title_message', "رسالة عنوان الترحيب");
define('OGP_LANG_welcome_title_message_info', "رسالة العنوان التي يتم عرضها أعلى لوحة البيانات (يُسمح برمز HTML).");
define('OGP_LANG_logo_link', "رابط الشعارات");
define('OGP_LANG_logo_link_info', "الارتباط التشعبي بالشعارات. <b style='font-size:10px; font-weight:normal;'>(سيؤدي تركه فارغًا إلى ربطه بلوحة التحكم الرئيسية)</b>");
define('OGP_LANG_custom_tab', "علامة تبويب مخصصة");
define('OGP_LANG_custom_tab_info', "يضيف علامة تبويب قابلة للتخصيص في نهاية القائمة. <b style='font-size:10px; font-weight:normal;'>(تطبيق وتحديث هذه الصفحة لتحرير إعدادات علامة التبويب)</b>");
define('OGP_LANG_custom_tab_name', "اسم علامة التبويب المخصصة");
define('OGP_LANG_custom_tab_name_info', "اسم عرض علامات التبويب.");
define('OGP_LANG_custom_tab_link', "رابط التبويب المخصص");
define('OGP_LANG_custom_tab_link_info', "الارتباط التشعبي لعلامات التبويب.");
define('OGP_LANG_custom_tab_sub', "علامات تبويب فرعية مخصصة");
define('OGP_LANG_custom_tab_sub_info', "يضيف علامات تبويب فرعية قابلة للتخصيص عند التمرير فوق 'علامة التبويب المخصصة'.");
define('OGP_LANG_custom_tab_sub_name', "اسم علامة التبويب الفرعية #1");
define('OGP_LANG_custom_tab_sub_link', "رابط علامة التبويب الفرعية #1");
define('OGP_LANG_custom_tab_sub_name2', "اسم علامة التبويب الفرعية #2");
define('OGP_LANG_custom_tab_sub_link2', "رابط علامة التبويب الفرعية #2");
define('OGP_LANG_custom_tab_sub_name3', "اسم علامة التبويب الفرعية #3");
define('OGP_LANG_custom_tab_sub_link3', "رابط علامة التبويب الفرعية #3");
define('OGP_LANG_custom_tab_sub_name4', "اسم علامة التبويب الفرعية #4");
define('OGP_LANG_custom_tab_sub_link4', "رابط علامة التبويب الفرعية #4");
define('OGP_LANG_custom_tab_target_blank', "هدف علامات التبويب المخصصة");
define('OGP_LANG_custom_tab_target_blank_info', "تعيّن جميع علامات التبويب المستهدفة. <b style='font-size:10px; font-weight:normal;'>(Self_Page = يفتح الارتباط في نفس الصفحة. New_Page = يفتح الارتباط في علامة تبويب جديدة.)</b>");
define('OGP_LANG_bg_wrapper', "غلاف الخلفية");
define('OGP_LANG_bg_wrapper_info', "أغلفة صورة الخلفية. <b style='font-size:10px; font-weight:normal;'>(متوفر فقط في بعض المظاهر.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "عرض معرفات الخادم في صفحة مراقب اللعبة");
define('OGP_LANG_show_server_id_game_monitor_info', "Show the game server ID column on the Game Monitor for matching up files created by the Agent to the actual game server.");
define('OGP_LANG_default_game_server_home_path_prefix', "البادئة الرئيسية لخادم اللعبة الافتراضي");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Enter a path prefix for where you want game server homes to be created by default. You can use \"{USERNAME}\" in the path which will be replaced with the OGP username the game server is being assigned to.  You can use \"{GAMEKEY}\" in the path which will be replaced with a friendly lowercase name.  You can use \"{SKIPID}\" anywhere in the path to skip appending the home ID to the path.  Example: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} will become /ogp/games/username/arkse/.  Example 2:  /ogp/games will become /ogp/games/1 where 1 is the game servers ID.");
define('OGP_LANG_use_authorized_hosts', "تقييد API للمضيفين المخولين المحددين");
define('OGP_LANG_use_authorized_hosts_info', "Enable this setting to only allow API calls from pre-defined and approved IP addresses.&nbsp; Approved addresses can be set on this page once the setting has been enabled.&nbsp; If this setting is disabled, a user using a valid key will have access to the API from any IP address.&nbsp; Users using a valid key will be able to use the API to manage any game server they have permissions to administrate.");
define('OGP_LANG_allow_setting_cpu_affinity', "السماح بإعداد التخصيص الأساسي لوحدة المعالجة المركزية لخوادم الألعاب");
define('OGP_LANG_allow_setting_cpu_affinity_info', "If enabled, the admin creating a game home will be shown CPU affinity (core assignment) options for the game server.");
define('OGP_LANG_setup_api_authorized_hosts', "إعداد الأجهزة المضيفة المعتمدة لواجهة برمجة التطبيقات");
define('OGP_LANG_autohorized_hosts', "المضيفون المعتمدون");
define('OGP_LANG_add', "أضف");
define('OGP_LANG_remove', "حذف");
define('OGP_LANG_default_trusted_hosts', "المضيفون الموثوق بهم الافتراضيون");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "المضيفون أو الوكلاء الموثوق بهم (عناوين IPv4/IPv6 أو CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "عناوين IP المعاد توجيهها الموثوقة (عناوين IPv4/IPv6 أو CIDR)");
define('OGP_LANG_reset_game_server_order', "إعادة ترتيب سيرفر اللعبة");
define('OGP_LANG_reset_game_server_order_info', "إعادة ترتيب سيرفر اللعبة للرجوع إلى الافتراضي باستخدام معرف الخادم");
define('OGP_LANG_regex_invalid_file_name_chars', "أحرف اسم الملف غير صالحة Regex");
define('OGP_LANG_regex_invalid_file_name_chars_info', "قم بتغيير نمط regex هذا إذا كنت تريد السماح بمجموعة مختلفة من الأحرف في أسماء الملفات.");
define('OGP_LANG_login_ban_time', "فشل وقت حظر تسجيل الدخول (ثواني)");
define('OGP_LANG_login_ban_time_info', "الوقت بالثواني الذي يتم فيه حظر عنوان IP من محاولة تسجيل الدخول إلى اللوحة بعد عدد محدد من محاولات تسجيل الدخول الفاشلة.");
?>
