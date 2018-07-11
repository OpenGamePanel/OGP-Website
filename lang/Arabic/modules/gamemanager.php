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

define('OGP_LANG_game_manager', "مدير اللعبة");
define('OGP_LANG_no_games_to_monitor', "لم يكن لديك أي ألعاب تكوين لك التي يمكن رصدها.");
define('OGP_LANG_status', "الحالة");
define('OGP_LANG_fail_no_mods', "لا يوجد وحدات لهذه اللعبة! يجب أن تطلب من مشرف أوغب إضافة وحدة (وحدات) مود للعبة المخصصة لك.");
define('OGP_LANG_no_game_homes_assigned', "لا خوادم لعبة مخصصة بالنسبة لك. يجب أن تطلب من مشرفك تعيين الألعاب لك.");
define('OGP_LANG_select_game_home_to_configure', "حدد خادم لعبة تريد تكوينه");
define('OGP_LANG_file_manager', "مدير الملفات");
define('OGP_LANG_configure_mods', "Configure mods");
define('OGP_LANG_install_update_steam', "تثبيت / تحديث عن طريق Steam");
define('OGP_LANG_install_update_manual', "تثبيت / تحديث يدويا");
define('OGP_LANG_assign_game_homes', "تعيين خوادم اللعبة");
define('OGP_LANG_user', "المستعمل");
define('OGP_LANG_group', "مجموعة");
define('OGP_LANG_start', "تشغيل");
define('OGP_LANG_ogp_agent_ip', "ايبي وكيل OGP");
define('OGP_LANG_max_players', "الحد الأقصى للاعبين");
define('OGP_LANG_max', "الحد الأقصى");
define('OGP_LANG_ip_and_port', "ايبي و بورت");
define('OGP_LANG_available_maps', "الخرائط المتاحة");
define('OGP_LANG_map_path', "مسار الخريطة");
define('OGP_LANG_available_parameters', "المعلمات المتاحة");
define('OGP_LANG_start_server', "تشغيل السيرفر");
define('OGP_LANG_start_wait_note', "The server startup might take a while. Please wait without closing your browser.");
define('OGP_LANG_game_type', "نوع اللعبة");
define('OGP_LANG_map', "خريطة");
define('OGP_LANG_starting_server', "جار تشغيل السيرفر، الرجاء الانتظار ...");
define('OGP_LANG_starting_server_settings', "تشفيل السيرفر مع الإعدادات التالية");
define('OGP_LANG_startup_params', "معلمات البدء");
define('OGP_LANG_startup_cpu', "CPU the server is running on");
define('OGP_LANG_startup_nice', "قيمة جميلة من الخادم");
define('OGP_LANG_game_home', "Home Path");
define('OGP_LANG_server_started', "تم تشغيل السيرفر بنجاح.");
define('OGP_LANG_no_parameter_access', "ليس لديك إمكانية الوصول إلى المعلمات.");
define('OGP_LANG_extra_parameters', "معلمات اضافية");
define('OGP_LANG_no_extra_param_access', "ليس لديك إمكانية الوصول إلى المعلمات الإضافية.");
define('OGP_LANG_extra_parameters_info', "These parameters are put to the end of the command line when the game is started.");
define('OGP_LANG_game_exec_not_found', "The game executable %s was not found from the remote server.");
define('OGP_LANG_select_params_and_start', "Select the startup parameters for the server and press '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "No IP Port pairs assigned for this home. If you do not have access to home editing contact your admin.");
define('OGP_LANG_unable_to_get_log', "غير قادر على الحصول على السجل ، retval %s.");
define('OGP_LANG_server_binary_not_executable', "Server binary is not executable. Check you have proper permissions in the server home directory.");
define('OGP_LANG_server_not_running_log_found', "Server is not running, but log is found. NOTE: This log might not be related to the last server startup.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT زوج غير مملوك.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Unsuitable maxplayers value, maximum reachable number of slots has been set.");
define('OGP_LANG_server_running_not_responding', "Server is running, but its not responding,<br>there might be a some kind of problem and you might want to ");
define('OGP_LANG_update_started', "بدأ التحديث، يرجى الانتظار ...");
define('OGP_LANG_failed_to_start_steam_update', "فشل بدء تحديث Steam. انظر سجل الوكيل.");
define('OGP_LANG_failed_to_start_rsync_update', "فشل بدء تحديث Rsync. انظر سجل الوكيل.");
define('OGP_LANG_update_completed', "اكتمل التحديث بنجاح.");
define('OGP_LANG_update_in_progress', "جار التحديث، يرجى الانتظار ...");
define('OGP_LANG_refresh_steam_status', "تحديث حالة steam");
define('OGP_LANG_refresh_rsync_status', "تحديث حالة rsync");
define('OGP_LANG_server_running_cant_update', "الخادم شغال إذا التحديث ليس معقول. أوقف الخادم قبل التحديث.");
define('OGP_LANG_xml_steam_error', "نوع الخادم المحدد لا يدعم التثبيت / التحديث Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Mod key '%s' not found from the XML file.");
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
define('OGP_LANG_no_ogp_lgsl_support', "This server (running: %s) does not have LGSL support in OGP and its statistics can not be shown.");
define('OGP_LANG_server_status', "الخادم على %s هو %s.");
define('OGP_LANG_server_stopped', "تم إيقاف السيرفر '%s' .");
define('OGP_LANG_if_want_to_start_homes', "إذا كنت ترغب في بدء تشغيل سيرفرات الألعاب اذهب إلى %s.");
define('OGP_LANG_view_log', "سجل المشاهد");
define('OGP_LANG_if_want_manage', "إذا كنت ترغب في إدارة الألعاب الخاصة بك يمكنك القيام بذلك في");
define('OGP_LANG_columns', "columns");
define('OGP_LANG_group_users', "مستخدمو المجموعة:");
define('OGP_LANG_assigned_to', "مخصص ل:");
define('OGP_LANG_restart_server', "إعادة تشغيل السيرفر");
define('OGP_LANG_restarting_server', "جار إعادة تشغيل السيرفر، يرجى الانتظار ...");
define('OGP_LANG_server_restarted', "تمت إعادة تشغيل الخادم '%s'.");
define('OGP_LANG_server_not_running', "الخادم ليس قيد التشغيل.");
define('OGP_LANG_address', "العنوان");
define('OGP_LANG_owner', "الصاحب");
define('OGP_LANG_operations', "Operations");
define('OGP_LANG_search', "بحث");
define('OGP_LANG_maps_read_from', "Maps read from ");
define('OGP_LANG_file', "ملف");
define('OGP_LANG_folder', "مجلد");
define('OGP_LANG_unable_retrieve_mod_info', "Unable to retrieve mod information from database.");
define('OGP_LANG_unexpected_result_libremote', "Unexpected result from libremote, please inform developers.");
define('OGP_LANG_unable_get_info', "Unable to get the required information for startup, blocking startup.");
define('OGP_LANG_server_already_running', "Server already running. If you do not see the server in the Game Monitor, there might be a somekind of problem and you might want to");
define('OGP_LANG_already_running_stop_server', "إيقاف السيرفر.");
define('OGP_LANG_error_server_already_running', "خطأ: الخادم يعمل بالفعل على port");
define('OGP_LANG_failed_start_server_code', "Failed to start the remote server. Error code: %s");
define('OGP_LANG_disabled', "معطل");
define('OGP_LANG_not_found_server', "Could not find the remote server with ID");
define('OGP_LANG_rcon_command_title', "RCON Command");
define('OGP_LANG_has_sent_to', "تم إرسالها إلى");
define('OGP_LANG_need_set_remote_pass', "You need to set the remote control password on");
define('OGP_LANG_before_sending_rcon_com', "before sending rcon commands to it.");
define('OGP_LANG_retry', "إعادة المحاولة");
define('OGP_LANG_page', "صفحة");
define('OGP_LANG_server_cant_start', "لا يمكن تشغيل السيرفر");
define('OGP_LANG_server_cant_stop', "لا يمكن إيقاف السيرفر");
define('OGP_LANG_error_occured_remote_host', "Error occurred on the remote host");
define('OGP_LANG_follow_server_status', "You can follow the server status from");
define('OGP_LANG_addons', "إضافات");
define('OGP_LANG_hostname', "اسم المضيف");
define('OGP_LANG_rsync_install', "[Rsync Install]");
define('OGP_LANG_ping', "بينغ");
define('OGP_LANG_team', "فريق");
define('OGP_LANG_deaths', "Deaths");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "لاعب");
define('OGP_LANG_port', "بورت");
define('OGP_LANG_rcon_presets', "RCON presets");
define('OGP_LANG_update_from_local_master_server', "Update from local Master Server");
define('OGP_LANG_update_from_selected_rsync_server', "Update from selected Rsync server");
define('OGP_LANG_execute_selected_server_operations', "Execute selected server operations");
define('OGP_LANG_execute_operations', "Execute operations");
define('OGP_LANG_account_expiration', "Account expiration");
define('OGP_LANG_mysql_databases', "قواعد بيانات MySQL");
define('OGP_LANG_failed_querying_server', "* فشل الاستعلام عن السيرفر.");
define('OGP_LANG_query_protocol_not_supported', "* لا يوجد بروتوكول استعلام في OGP يمكنه دعم هذا السيرفر.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON presets for %s and mod %s");
define('OGP_LANG_name', "الاسم");
define('OGP_LANG_command', "RCON&nbsp;Command");
define('OGP_LANG_add_preset', "Add preset");
define('OGP_LANG_edit_presets', "Edit presets");
define('OGP_LANG_del_preset', "حذف");
define('OGP_LANG_change_preset', "تغيير");
define('OGP_LANG_send_command', "إرسال الأمر");
define('OGP_LANG_starting_copy_with_master_server_named', "Starting copy with master server named '%s'...");
define('OGP_LANG_starting_sync_with', "Starting sync with %s...");
define('OGP_LANG_refresh_interval', "Log refreshing interval");
define('OGP_LANG_finished_manual_update', "Finished manual update.");
define('OGP_LANG_failed_to_start_file_download', "فشل بدء تحميل الملف");
define('OGP_LANG_game_name', "إسم اللعبة");
define('OGP_LANG_dest_dir', "Destination directory");
define('OGP_LANG_remote_server', "السيرفر المتحكم");
define('OGP_LANG_file_url', "رابط الملف");
define('OGP_LANG_file_url_info', "The URL of the file that is uploaded and uncompressed to the directory.");
define('OGP_LANG_dest_filename', "Destination Filename");
define('OGP_LANG_dest_filename_info', "The filename for the destination file.");
define('OGP_LANG_update_server', "تحديث السيرفر");
define('OGP_LANG_unavailable', "غير متوفره");
define('OGP_LANG_upload_map_image', "رفع صورة الخريطة");
define('OGP_LANG_upload_image', "رفع صورة");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "The image must be jpg, gif or png and less than 1 MB.");
define('OGP_LANG_check_dev_console', "Error during uploading file, please check the browser developer console.");
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
define('OGP_LANG_auto_update_copy_me', "نسخ");
define('OGP_LANG_auto_update_copy_me_success', "تم النسخ!");
define('OGP_LANG_auto_update_copy_me_fail', "فشل النسخ. يرجى نسخ الرابط يدويًا.");
define('OGP_LANG_get_steam_autoupdate_api_link', "رابط التحديث التلقائي");
define('OGP_LANG_update_attempt_from_nonmaster_server', "User %s attempted to update home_id %d from a non-master server. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "You are attempting to update this server from a non-master server.");
define('OGP_LANG_cannot_update_from_own_self', "Local server update may not run on a Master server.");
define('OGP_LANG_show_server_id', "Show Server IDs");
define('OGP_LANG_hide_server_id', "Hide Server IDs");
define('OGP_LANG_edit_configuration_files', "Edit Configuration Files");
define('OGP_LANG_admin', "مشرف");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "ثواني");
define('OGP_LANG_unknown_rsync_mirror', "لقد حاولت بدء تحديث من مرآة غير موجودة.");
define('OGP_LANG_custom_fields', "الحقول المخصصة");
?>