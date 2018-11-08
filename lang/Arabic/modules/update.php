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

include('litefm.php');
define('OGP_LANG_curl_needed', "هذه الصفحة تتطلب PHP curl module .");
define('OGP_LANG_no_access', "أنت بحاجة إلى صلاحيات الأدمن للدخول إلى هذه الصفحة.");
define('OGP_LANG_dwl_update', "تحميل التحديث...");
define('OGP_LANG_dwl_complete', "تم التحميل");
define('OGP_LANG_install_update', "تثبيت التحديث...");
define('OGP_LANG_update_complete', "تم التحديث");
define('OGP_LANG_ignored_files', "%s ملفات تم تجاهلها");
define('OGP_LANG_not_updated_files_blacklisted', "لم يتم تحديث / تثبيت الملفات (القائمة السوداء):<br>%s");
define('OGP_LANG_latest_version', "احدث اصدار");
define('OGP_LANG_panel_version', "نسخة اللوحة");
define('OGP_LANG_update_now', "تحديث الان");
define('OGP_LANG_the_panel_is_up_to_date', "اللوحة محدثة لاخر إصدار.");
define('OGP_LANG_files_overwritten', "%s ملف استبدل");
define('OGP_LANG_files_not_overwritten', "%s لا يتم الكتابة فوق الملفات بسبب القائمة السوداء");
define('OGP_LANG_can_not_update_non_writable_files', "لايمكن تحديث الملفات/المجلدات التالية لانها غير قابلة لإستبدال");
define('OGP_LANG_dwl_failed', "رابط التحميل غير متوفر: \"%s\".<br>جرب مجدداً في وقت لاحق.");
define('OGP_LANG_temp_folder_not_writable', "لا يمكن وضع التنزيل، لأن أباتشي ليس لديه إذن كتابة في المجلد المؤقت للنظام (%s).");
define('OGP_LANG_base_dir_not_writable', "لا يمكن تحديث اللوحة، لأن أباتشي ليس لديه إذن الكتابة على مجلد \"%s\".");
define('OGP_LANG_new_files', "%s ملف جديد");
define('OGP_LANG_updated_files', "تحديث الملفات:<br>%s");
define('OGP_LANG_select_mirror', "إختر مرآه");
define('OGP_LANG_view_changes', "شاهد التغيرات");
define('OGP_LANG_updating_modules', "تحديث الموديولات");
define('OGP_LANG_updating_finished', "انتهى التحديث");
define('OGP_LANG_updated_module', "تحديث الموديول : '%s'.");
define('OGP_LANG_blacklist_files', "ملفات القائمة السوداء");
define('OGP_LANG_blacklist_files_info', "لن يتم تحديث كافة الملفات المعلمة.");
define('OGP_LANG_save_to_blacklist', "حفظ إلى القائمة السوداء");
define('OGP_LANG_no_new_updates', "لا توجد تحديثات جديدة");
define('OGP_LANG_module_file_missing', "الدليل مفقود في ملف module.php.");
define('OGP_LANG_query_failed', "أخفق تنفيذ طلب البحث");
define('OGP_LANG_query_failed_2', "إلى قاعدة البيانات.");
define('OGP_LANG_missing_zip_extension', "لم يتم تحميل ملحق php-zip. الرجاء تفعيله لتمكينه من استخدام وحدة التحديث.");
?>