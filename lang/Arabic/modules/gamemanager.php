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

define('OGP_LANG_no_games_to_monitor', "ليس لديك أي ألعاب مخصصة لك يمكنك مراقبتها.");
define('OGP_LANG_status', "الحالة");
define('OGP_LANG_fail_no_mods', "لا يوجد مودات مفعلة لهذه اللعبة! يجب أن تطلب من المشرف أو مدير لوحة التحكم إضافة مودات للعبة المخصصة لك.");
define('OGP_LANG_no_game_homes_assigned', "لا يوجد أي خوادم تم تعيينها لحسابك.");
define('OGP_LANG_select_game_home_to_configure', "حدد خادم اللعبة الذي تريد تكوينه");
define('OGP_LANG_file_manager', "مدير الملفات");
define('OGP_LANG_configure_mods', "تهيئة الـمودات");
define('OGP_LANG_install_update_steam', "تثبيت / تحديث عن طريق Steam");
define('OGP_LANG_install_update_manual', "تثبيت / تحديث يدويا");
define('OGP_LANG_assign_game_homes', "تعيين خوادم اللعبة");
define('OGP_LANG_user', "المستخدم");
define('OGP_LANG_group', "مجموعة");
define('OGP_LANG_start', "تشغيل");
define('OGP_LANG_ogp_agent_ip', "اي بي خادم OGP");
define('OGP_LANG_max_players', "الحد الأقصى للاعبين");
define('OGP_LANG_max', "الحد الأقصى");
define('OGP_LANG_ip_and_port', "ايبي و البورت");
define('OGP_LANG_available_maps', "الخرائط المتاحة");
define('OGP_LANG_map_path', "مسار الخريطة");
define('OGP_LANG_available_parameters', "المعلمات المتاحة");
define('OGP_LANG_start_server', "تشغيل السيرفر");
define('OGP_LANG_start_wait_note', "عملية تشغيل السيرفر قد تأخذ وقتاً أطول من المعتاد، الرجاء الإبقاء على المتصفح مفتوحاً.");
define('OGP_LANG_game_type', "نوع اللعبة");
define('OGP_LANG_map', "خريطة");
define('OGP_LANG_starting_server', "جار تشغيل السيرفر، الرجاء الانتظار ...");
define('OGP_LANG_starting_server_settings', "تشغيل السيرفر مع الإعدادات التالية");
define('OGP_LANG_startup_params', "معلمات البدء");
define('OGP_LANG_startup_cpu', "المعالج الذي سيعمل عليه السيرفر");
define('OGP_LANG_startup_nice', "قيمة nice للخادم");
define('OGP_LANG_game_home', "المسار الأساسي");
define('OGP_LANG_server_started', "تم تشغيل السيرفر بنجاح.");
define('OGP_LANG_no_parameter_access', "ليس لديك إمكانية الوصول إلى المعلمات.");
define('OGP_LANG_extra_parameters', "معلمات اضافية");
define('OGP_LANG_no_extra_param_access', "ليس لديك إمكانية الوصول إلى المعلمات الإضافية.");
define('OGP_LANG_extra_parameters_info', "يتم وضع هذه المعلمات في نهاية سطر الأوامر عند بدء السيرفر.");
define('OGP_LANG_game_exec_not_found', "الملف التنفيذي للعبة %s لم يتم العثور عليه في السيرفر.");
define('OGP_LANG_select_params_and_start', "اختر معاملات بدء التشغيل الخاصة بالسيرفر ثم اضغط '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "لم يتم تعيين عنوان IP أو بورت لهذا المسار. إذا كنت لا تستطيع الوصول إلى خيارات تعديل المسار الأساسي عليك بالإتصال بمدير لوحة التحكم.");
define('OGP_LANG_unable_to_get_log', "غير قادر على الحصول على السجل ، retval %s.");
define('OGP_LANG_server_binary_not_executable', "ملف تشغيل السيرفر لا يمكن تنفيذه. عليك بالتحقق من أنه لديك الصلاحيات اللازمة الخاصة بالمجلد الرئيسي للسيرفر.");
define('OGP_LANG_server_not_running_log_found', "السيرفر ليس قيد التشغيل، ولكن السجل موجود. ملاحظة: هذا السجل يمكن أن لا يكون مرتبطاً بآخر عملية تشغيل للسيرفر.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT زوج غير مملوك.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "قيمة maxplayers غير مناسبة، لقد قمت بتعيين أقصى قيمة لعدد اللاعبين.");
define('OGP_LANG_server_running_not_responding', "السيرفر قيد التشغيل، ولكنه لا يستجيب. <br>يمكن أن يكون بسبب مشكلة ما وانت تريد أن");
define('OGP_LANG_update_started', "بدأ التحديث، يرجى الانتظار ...");
define('OGP_LANG_failed_to_start_steam_update', "فشل بدء تحديث Steam. انظر سجل الوكيل.");
define('OGP_LANG_failed_to_start_rsync_update', "فشل بدء تحديث Rsync. انظر سجل الوكيل.");
define('OGP_LANG_update_completed', "اكتمل التحديث بنجاح.");
define('OGP_LANG_update_in_progress', "جار التحديث، يرجى الانتظار ...");
define('OGP_LANG_refresh_steam_status', "تحديث حالة Steam");
define('OGP_LANG_refresh_rsync_status', "تحديث حالة Rsync");
define('OGP_LANG_server_running_cant_update', "الخادم شغال إذا التحديث ليس معقول. أوقف الخادم قبل التحديث.");
define('OGP_LANG_xml_steam_error', "نوع الخادم المحدد لا يدعم التثبيت / التحديث Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "مفتاح التعديل '%s' لم يتم العثور عليه من ملف XML.");
define('OGP_LANG_stop_update', "إيقاف التحديث");
define('OGP_LANG_statistics', "الإحصاءات");
define('OGP_LANG_servers', "سيرفرات");
define('OGP_LANG_players', "لاعبين");
define('OGP_LANG_current_map', "الخريطة الحالية");
define('OGP_LANG_stop_server', "إيقاف السيرفر");
define('OGP_LANG_server_ip_port', "سيرفر ايبي:بورت");
define('OGP_LANG_server_name', "إسم السيرفر");
define('OGP_LANG_server_id', "معرف السيرفر");
define('OGP_LANG_player_name', "إسم اللاعب");
define('OGP_LANG_score', "النقاط");
define('OGP_LANG_time', "الوقت");
define('OGP_LANG_no_rights_to_stop_server', "ليس لديك حقوق لإيقاف هذا السيرفر.");
define('OGP_LANG_no_ogp_lgsl_support', "هذا السيرفر (يعمل: %s) لا يملك دعم LGSL في OGP وبالتالي لا يمكن عرض إحصائياته او بياناته.");
define('OGP_LANG_server_status', "الخادم على %s هو %s.");
define('OGP_LANG_server_stopped', "تم إيقاف السيرفر '%s' .");
define('OGP_LANG_if_want_to_start_homes', "إذا كنت ترغب في بدء تشغيل سيرفرات الألعاب اذهب إلى %s.");
define('OGP_LANG_view_log', "سجل المشاهد");
define('OGP_LANG_if_want_manage', "إذا كنت ترغب في إدارة الألعاب الخاصة بك يمكنك القيام بذلك في");
define('OGP_LANG_columns', "أعمدة");
define('OGP_LANG_group_users', "مستخدمو المجموعة:");
define('OGP_LANG_assigned_to', "مخصص ل:");
define('OGP_LANG_restart_server', "إعادة تشغيل السيرفر");
define('OGP_LANG_restarting_server', "جار إعادة تشغيل السيرفر، يرجى الانتظار ...");
define('OGP_LANG_server_restarted', "تمت إعادة تشغيل الخادم '%s'.");
define('OGP_LANG_server_not_running', "الخادم ليس قيد التشغيل.");
define('OGP_LANG_address', "العنوان");
define('OGP_LANG_owner', "الصاحب");
define('OGP_LANG_operations', "عمليات");
define('OGP_LANG_search', "بحث");
define('OGP_LANG_maps_read_from', "قراءة الخرائط من");
define('OGP_LANG_file', "ملف");
define('OGP_LANG_folder', "مجلد");
define('OGP_LANG_unable_retrieve_mod_info', "لا يمكن استجلاب معلومات التعديل mod من قاعدة البيانات.");
define('OGP_LANG_unexpected_result_libremote', "نتيجة غير متوقعة من libremote، الرجاء إعلام المطورين.");
define('OGP_LANG_unable_get_info', "لا يمكن الحصول على معلومات بدء التشغيل. سيتم الإيقاف.");
define('OGP_LANG_server_already_running', "السيرفر يعمل بالفعل. إذا كنت لا ترى السيرفر في نافذة مراقبة اللعبة، يمكن أن يكون هناك خطأ ما، وقد تريد أن");
define('OGP_LANG_already_running_stop_server', "إيقاف السيرفر.");
define('OGP_LANG_error_server_already_running', "خطأ: الخادم يعمل بالفعل على port");
define('OGP_LANG_failed_start_server_code', "فشل بدء تشغيل السيرفر المتحكم. رمز الخطأ: %s");
define('OGP_LANG_disabled', "معطل");
define('OGP_LANG_not_found_server', "لا يمكن العثور على السيرفر بالهوية");
define('OGP_LANG_rcon_command_title', "أمر RCON");
define('OGP_LANG_has_sent_to', "تم إرسالها إلى");
define('OGP_LANG_need_set_remote_pass', "عليك بتعيين كلمة المرور الخاصة بالتحكم عن بعد");
define('OGP_LANG_before_sending_rcon_com', "قبل إرسال أمر rcon");
define('OGP_LANG_retry', "إعادة المحاولة");
define('OGP_LANG_page', "صفحة");
define('OGP_LANG_server_cant_start', "لا يمكن تشغيل السيرفر");
define('OGP_LANG_server_cant_stop', "لا يمكن إيقاف السيرفر");
define('OGP_LANG_error_occured_remote_host', "خطأ في المستضيف");
define('OGP_LANG_follow_server_status', "يمكنك متابعة حالة السيرفر من");
define('OGP_LANG_addons', "إضافات");
define('OGP_LANG_hostname', "اسم المضيف");
define('OGP_LANG_rsync_install', "[Rsync Install]");
define('OGP_LANG_ping', "بينغ");
define('OGP_LANG_team', "فريق");
define('OGP_LANG_deaths', "Deaths");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "الخبرة");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "لاعب");
define('OGP_LANG_port', "بورت");
define('OGP_LANG_rcon_presets', "إعدادات RCON المسبقة");
define('OGP_LANG_update_from_local_master_server', "التحديث من السيرفر المحلي الرئيسي");
define('OGP_LANG_update_from_selected_rsync_server', "التحديث من سيرفر Rsync المحدد");
define('OGP_LANG_execute_selected_server_operations', "تنفيذ عمليات السيرفر المحددة");
define('OGP_LANG_execute_operations', "تنفيذ العمليات");
define('OGP_LANG_account_expiration', "انتهاء صلاحية الحساب");
define('OGP_LANG_mysql_databases', "قواعد بيانات MySQL");
define('OGP_LANG_failed_querying_server', "* فشل الاستعلام عن السيرفر.");
define('OGP_LANG_query_protocol_not_supported', "* لا يوجد بروتوكول استعلام في OGP يمكنه دعم هذا السيرفر.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "تم تعطيل الاستعلامات من خلال الإعداد: تعطيل طلبات البحث بعد: %s, بما لديك %s خادم.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('OGP_LANG_name', "الاسم");
define('OGP_LANG_command', "RCON&nbsp;Command");
define('OGP_LANG_add_preset', "أضف مسبقا");
define('OGP_LANG_edit_presets', "تحرير الإعدادات المسبقة");
define('OGP_LANG_del_preset', "حذف");
define('OGP_LANG_change_preset', "تغيير");
define('OGP_LANG_send_command', "إرسال الأمر");
define('OGP_LANG_starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('OGP_LANG_starting_sync_with', "Starting sync with %s...");
define('OGP_LANG_refresh_interval', "فترة تحديث السجل");
define('OGP_LANG_finished_manual_update', "انتهى التحديث اليدوي.");
define('OGP_LANG_failed_to_start_file_download', "فشل بدء تحميل الملف");
define('OGP_LANG_game_name', "إسم اللعبة");
define('OGP_LANG_dest_dir', "دليل الوجهة");
define('OGP_LANG_remote_server', "السيرفر المتحكم");
define('OGP_LANG_file_url', "رابط الملف");
define('OGP_LANG_file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('OGP_LANG_dest_filename', "وجهة اسم الملف");
define('OGP_LANG_dest_filename_info', "اسم الملف للملف الوجهة.");
define('OGP_LANG_update_server', "تحديث السيرفر");
define('OGP_LANG_unavailable', "غير متوفره");
define('OGP_LANG_upload_map_image', "رفع صورة الخريطة");
define('OGP_LANG_upload_image', "رفع صورة");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "يجب أن تكون الصورة بتنسيق jpg أو gif أو png وأقل من 1 ميغابايت.");
define('OGP_LANG_check_dev_console', "خطأ أثناء رفع الملف ، يرجى التحقق من وحدة تحكم مطور المتصفح.");
define('OGP_LANG_uploaded_successfully', "تم الرفع بنجاح.");
define('OGP_LANG_cant_create_folder', "لا يمكن إنشاء مجلد:<br> <b>%s</b>");
define('OGP_LANG_cant_write_file', "لا يمكن كتابة الملف:<br> <b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "تم تجاوز أمر PHP .<br> <b>%s</b>.");
define('OGP_LANG_unknown_errors', "أخطاء غير معروفة.");
define('OGP_LANG_directory', "الدليل");
define('OGP_LANG_view_player_commands', "عرض أوامر لاعب");
define('OGP_LANG_hide_player_commands', "إخفاء أوامر اللاعب");
define('OGP_LANG_no_online_players', "لا يوجد لاعبين متواجدين.");
define('OGP_LANG_invalid_game_mod_id', "Invalid Game/Mod ID specified.");
define('OGP_LANG_auto_update_title_popup', "رابط تحديث تلقائي لSteam");
define('OGP_LANG_auto_update_popup_html', "<p>استخدم الرابط أدناه للتحقق من خادم اللعبة وتحديثه تلقائيًا عبر Steam إذا لزم الأمر.&nbsp; يمكنك الاستعلام عنها باستخدام cronjob أو بدء العملية يدويًا.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "نسخ");
define('OGP_LANG_auto_update_copy_me_success', "تم النسخ!");
define('OGP_LANG_auto_update_copy_me_fail', "فشل النسخ. يرجى نسخ الرابط يدويًا.");
define('OGP_LANG_get_steam_autoupdate_api_link', "رابط التحديث التلقائي");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "روابط واجهة برمجة التطبيقات");
define('OGP_LANG_update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('OGP_LANG_cannot_update_from_own_self', "قد لا يعمل تحديث الخادم المحلي على الخادم رئيسي.");
define('OGP_LANG_show_server_id', "إظهار معرفات الخادم");
define('OGP_LANG_hide_server_id', "إخفاء معرفات الخادم");
define('OGP_LANG_edit_configuration_files', "تعديل ملفات التكوين");
define('OGP_LANG_admin', "مشرف");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "وهمي");
define('OGP_LANG_sec', "ثواني");
define('OGP_LANG_unknown_rsync_mirror', "لقد حاولت بدء تحديث من مرآة غير موجودة.");
define('OGP_LANG_custom_fields', "الحقول المخصصة");
?>
