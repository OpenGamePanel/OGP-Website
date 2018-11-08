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
define('OGP_LANG_curl_needed', "این صفحه نیاز به ماژول PHP cURL دارد.");
define('OGP_LANG_no_access', "حساب کاربری شما باید \"مدیر\" باشد تا بتوانید به این صفحه دسترسی داشته باشید.");
define('OGP_LANG_dwl_update', "بروزرسانی درحال دانلود است...");
define('OGP_LANG_dwl_complete', "دانلود به پایان رسید");
define('OGP_LANG_install_update', "بروزرسانی در حال نصب است...");
define('OGP_LANG_update_complete', "بروزرسانی به پایان رسید");
define('OGP_LANG_ignored_files', "%s ignored file(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Not updated/installed files (blacklisted):<br>%s");
define('OGP_LANG_latest_version', "نسخه آخر");
define('OGP_LANG_panel_version', "نسخه پنل");
define('OGP_LANG_update_now', "بروزرسانی");
define('OGP_LANG_the_panel_is_up_to_date', "پنل به روز است.");
define('OGP_LANG_files_overwritten', "%s فایل Overwrite شدند.");
define('OGP_LANG_files_not_overwritten', "%s files are NOT overwritten due to blacklist");
define('OGP_LANG_can_not_update_non_writable_files', "امکان به روزرسانی وجود ندارد، فایل ها یا دایرکتوری های مورد نظر Writable نیستند.");
define('OGP_LANG_dwl_failed', "لینک دانلود درحال حاضر در دسترس نیست: \"%s\".<br> بعدا سعی کنید.");
define('OGP_LANG_temp_folder_not_writable', "The download can not be placed, because Apache does not have write permission at the system temporary folder (%s).");
define('OGP_LANG_base_dir_not_writable', "پنل نمیتواند به روزرسانی شود، Apache دست رسی Write کردن بر روی \"%s\" را ندارد.");
define('OGP_LANG_new_files', "%s فایل جدید.");
define('OGP_LANG_updated_files', "فایل های به روز شده:<br>%s");
define('OGP_LANG_select_mirror', "انتخاب میرور");
define('OGP_LANG_view_changes', "مشاهده تغییرا");
define('OGP_LANG_updating_modules', "به روزرسانی ماژول ها");
define('OGP_LANG_updating_finished', "به روزرسانی به پایان رسید");
define('OGP_LANG_updated_module', "ماژول \"%s\" به روزرسانی شد.");
define('OGP_LANG_blacklist_files', "فایل های لیست سیاه");
define('OGP_LANG_blacklist_files_info', "تمام فایل های نشان شده، به روزرسانی نمی شوند.");
define('OGP_LANG_save_to_blacklist', "ذخیره در لیست سیاه");
define('OGP_LANG_no_new_updates', "به روزرسانی جدیدی موجود نیست");
define('OGP_LANG_module_file_missing', "دایرکتوری فایل module.php را پیدا نمی کند.");
define('OGP_LANG_query_failed', "اجرای Query با شکست مواجه شد");
define('OGP_LANG_query_failed_2', "به پایگاه داده.");
define('OGP_LANG_missing_zip_extension', "The php-zip extension is not loaded. Please, enable it to use the Update module.");
?>