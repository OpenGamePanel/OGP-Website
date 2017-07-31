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

include('litefm.php');
define('curl_needed', "این صفحه نیاز به ماژول PHP cURL دارد.");
define('no_access', "حساب کاربری شما باید \"مدیر\" باشد تا بتوانید به این صفحه دسترسی داشته باشید.");
define('dwl_update', "بروزرسانی درحال دانلود است...");
define('dwl_complete', "دانلود به پایان رسید");
define('install_update', "بروزرسانی در حال نصب است...");
define('update_complete', "بروزرسانی به پایان رسید");
define('ignored_files', "%s نادیده گرفته شدند.");
define('not_updated_files_blacklisted', "فایل های بروزرسانی نشده (لیست سیاه):<br>%s");
define('latest_version', "نسخه آخر");
define('panel_version', "نسخه پنل");
define('update_now', "بروزرسانی");
define('the_panel_is_up_to_date', "پنل به روز است.");
define('files_overwritten', "%s فایل Overwrite شدند.");
define('files_not_overwritten', "%s فایل از لیست سیاه Overwrite نشد.");
define('can_not_update_non_writable_files', "امکان به روزرسانی وجود ندارد، فایل ها یا دایرکتوری های مورد نظر Writable نیستند.");
define('dwl_failed', "لینک دانلود درحال حاضر در دسترس نیست: \"%s\".<br> بعدا سعی کنید.");
define('temp_folder_not_writable', "فایل دانلودی ذخیره نشد، Apache دست رسی Write کردن بر روی (%s) را ندارد.");
define('base_dir_not_writable', "پنل نمیتواند به روزرسانی شود، Apache دست رسی Write کردن بر روی \"%s\" را ندارد.");
define('new_files', "%s فایل جدید.");
define('updated_files', "فایل های به روز شده:<br>%s");
define('select_mirror', "انتخاب میرور");
define('view_changes', "مشاهده تغییرا");
define('get_x_revison_messages_may_take_some_time', "Get %s revison messages may take some time.");
define('updating_modules', "به روزرسانی ماژول ها");
define('updating_finished', "به روزرسانی به پایان رسید");
define('updated_module', "ماژول \"%s\" به روزرسانی شد.");
define('blacklist_files', "فایل های لیست سیاه");
define('blacklist_files_info', "تمام فایل های نشان شده، به روزرسانی نمی شوند.");
define('save_to_blacklist', "ذخیره در لیست سیاه");
define('no_new_updates', "به روزرسانی جدیدی موجود نیست");
define('module_file_missing', "دایرکتوری فایل module.php را پیدا نمی کند.");
define('query_failed', "اجرای Query با شکست مواجه شد");
define('query_failed_2', "به پایگاه داده.");
define('missing_zip_extension', "PHP-Zip بارگذاری نشد، لطفا PHP-Zip را فعال کنید تا ماژول به روزرسانی به درستی کار خود را انجام دهد.");
?>