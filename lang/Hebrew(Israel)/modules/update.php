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
define('OGP_LANG_curl_needed', "דף זה מצריך מודול curl PHP.");
define('OGP_LANG_no_access', "אתה צריך גישות מנהל בשביל לגשת לדף זה.");
define('OGP_LANG_dwl_update', "מוריד עדכון...");
define('OGP_LANG_dwl_complete', "הורדה הושלמה");
define('OGP_LANG_install_update', "מתקן עדכון...");
define('OGP_LANG_update_complete', "עדכון הושלם");
define('OGP_LANG_ignored_files', "%s קבצים() התעלמו");
define('OGP_LANG_not_updated_files_blacklisted', "קבצים לא מעודכנים/מותקנים (רשימה שחורה): <br>%s");
define('OGP_LANG_latest_version', "גרסה הכי עדכנית");
define('OGP_LANG_panel_version', "גרסאת פאנל");
define('OGP_LANG_update_now', "עדכן עכשיו");
define('OGP_LANG_the_panel_is_up_to_date', "הפאנל מעודכן");
define('OGP_LANG_files_overwritten', "%s נכתבו מעל");
define('OGP_LANG_files_not_overwritten', "%s קבצים לא נכתבו מעל בגלל רשימה שחורה");
define('OGP_LANG_can_not_update_non_writable_files', "לא יכול לעדכן בגלל שקבצים/תקיות אלו לא ניתנים לכתיבה");
define('OGP_LANG_dwl_failed', "קישור ההורדה לא זמין: \"%s\".<br> נסה שנית מאוחר יותר.");
define('OGP_LANG_temp_folder_not_writable', "ההורדה לא יכולה להיות מוצבת, מכיוון ש ל apache אין אישורי כתיבה במערכת תיקייה זמנית (%s).");
define('OGP_LANG_base_dir_not_writable', "פאנל לא יכול לעדכן, בגלל ש ל apache אין אישורי כתיבה בתיקיית \"%s\".");
define('OGP_LANG_new_files', "%s קבצים חדשים.");
define('OGP_LANG_updated_files', "עדכן קבצים:<br>%s");
define('OGP_LANG_select_mirror', "בחר מראה");
define('OGP_LANG_view_changes', "הצג שינויים");
define('OGP_LANG_updating_modules', "מעדכן מודולים");
define('OGP_LANG_updating_finished', "עדכון הושלם");
define('OGP_LANG_updated_module', "מודול: '%s' מעודכן.");
define('OGP_LANG_blacklist_files', "קבצים ברשימה שחורה");
define('OGP_LANG_blacklist_files_info', "כל הקבצים המסומנים לא יעודכנו.");
define('OGP_LANG_save_to_blacklist', "שמור אל רשימה שחורה");
define('OGP_LANG_no_new_updates', "אין עדכונים חדשים");
define('OGP_LANG_module_file_missing', "קובץ module.php חסר בתיקייה.");
define('OGP_LANG_query_failed', "נכשל בביצוע שאילתה");
define('OGP_LANG_query_failed_2', "אל מאגר הנתונים.");
define('OGP_LANG_missing_zip_extension', "הרחבת ה php-zip לא טעונה. אנה, הפעל אותה בשביל להשתמש במודול העדכון.");
?>