<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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
define('curl_needed', "هذه الصفحة تتطلب PHP curl module .");
define('no_access', "أنت بحاجة إلى صلاحيات الأدمن للدخول إلى هذه الصفحة.");
define('dwl_update', "تحميل التحديث...");
define('dwl_complete', "تم التحميل");
define('install_update', "تثبيت التحديث...");
define('update_complete', "تم التحديث");
define('ignored_files', "%s ملف تم تجاهله");
define('not_updated_files_blacklisted', "لم يتم تحديث / تثبيت ملفات (القائمة السوداء):<br>%s");
define('latest_version', "احدث اصدار");
define('panel_version', "نسخة اللوحة");
define('update_now', "تحديث الان");
define('the_panel_is_up_to_date', "اللوحة محدثة لاخر إصدار.");
define('files_overwritten', "%s ملف استبدل");
define('files_not_overwritten', "%s لم يتم استبداله لانه بالقائمة السوداء");
define('can_not_update_non_writable_files', "لايمكن تحديث الملفات/المجلدات التالية لانها غير قابلة لإستبدال");
define('dwl_failed', "The download link is not available: \"%s\".<br>Try again later.");
define('temp_folder_not_writable', "The download can not be placed because Apache does not have write permision at the system temporary folder(%s).");
define('base_dir_not_writable', "The panel can not update because Apache does not have write permision at folder \"%s\".");
define('new_files', "%s new files.");
define('updated_files', "Updated files:<br>%s");
define('select_mirror', "Select mirror");
define('view_changes', "View changes");
define('get_x_revison_messages_may_take_some_time', "Get %s revison messages may take some time.");
define('updating_modules', "Updating Modules");
define('updating_finished', "Updating Finished");
define('updated_module', "تحديث الموديول : '%s'.");
define('blacklist_files', "ملفات القائمة السوداء");
define('blacklist_files_info', "لن يتم تحديث كافة الملفات المعلمة.");
define('save_to_blacklist', "حفظ إلى القائمة السوداء");
define('no_new_updates', "لا توجد تحديثات جديدة");
?>
