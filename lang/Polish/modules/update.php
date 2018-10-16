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
define('OGP_LANG_curl_needed', "Ta strona wymaga modułu PHP Curl.");
define('OGP_LANG_no_access', "Potrzebujesz uprawnień administratora, aby uzyskać dostęp do tej strony.");
define('OGP_LANG_dwl_update', "Pobieranie Aktualizacji...");
define('OGP_LANG_dwl_complete', "Pobieranie zakończone.");
define('OGP_LANG_install_update', "Instalowanie aktualizacji...");
define('OGP_LANG_update_complete', "Aktualizacja zakonczona.");
define('OGP_LANG_ignored_files', "%s ignored file(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Not updated/installed files (blacklisted):<br>%s");
define('OGP_LANG_latest_version', "Najnowsza wersja");
define('OGP_LANG_panel_version', "Wersja panelu");
define('OGP_LANG_update_now', "Aktualizuj Teraz");
define('OGP_LANG_the_panel_is_up_to_date', "Panel jest Aktualny.");
define('OGP_LANG_files_overwritten', "%s nadpisane pliki");
define('OGP_LANG_files_not_overwritten', "%s files are NOT overwritten due to blacklist");
define('OGP_LANG_can_not_update_non_writable_files', "Nie można zaktualizować, ponieważ następujące pliki/foldery nie mają praw do zapisu.");
define('OGP_LANG_dwl_failed', "Adres pobierania nie jest dostepny: \"%s\".<br> Spróbuj ponownie później.");
define('OGP_LANG_temp_folder_not_writable', "The download can not be placed, because Apache does not have write permission at the system temporary folder (%s).");
define('OGP_LANG_base_dir_not_writable', "Panel nie może zostać zaktualizowany, ponieważ Apache nie ma uprawnień do zapisu w folderze \"%s\".");
define('OGP_LANG_new_files', "%s nowych plików.");
define('OGP_LANG_updated_files', "Zaktualizowane pliki:<br>%s");
define('OGP_LANG_select_mirror', "Wybierz żródło");
define('OGP_LANG_view_changes', "Pokaż zmiany");
define('OGP_LANG_updating_modules', "Aktualizacja modułów");
define('OGP_LANG_updating_finished', "Aktualizacja zakończona");
define('OGP_LANG_updated_module', "Zaktualizowany moduł: '%s'.");
define('OGP_LANG_blacklist_files', "<b>Czarna Lista</b>");
define('OGP_LANG_blacklist_files_info', "- wszystkie wybrane pliki nie zostaną zaktualizowane.");
define('OGP_LANG_save_to_blacklist', "Zapisz na czarnej liście");
define('OGP_LANG_no_new_updates', "Brak nowych aktualizacji");
define('OGP_LANG_module_file_missing', "directory is missing the module.php file.");
define('OGP_LANG_query_failed', "Failed to execute query");
define('OGP_LANG_query_failed_2', "to database.");
define('OGP_LANG_missing_zip_extension', "The php-zip extension is not loaded. Please, enable it to use the Update module.");
?>