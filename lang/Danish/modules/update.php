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
define('OGP_LANG_curl_needed', "Den side påkræver PHP curl modul.");
define('OGP_LANG_no_access', "Du har brug for admin rettigheder, for at få adgang til siden.");
define('OGP_LANG_dwl_update', "Downloader opdatering...");
define('OGP_LANG_dwl_complete', "Download Færdiggjort");
define('OGP_LANG_install_update', "Installere opdatering...");
define('OGP_LANG_update_complete', "Opdatering Færdig");
define('OGP_LANG_ignored_files', "%s ignored file(s)");
define('OGP_LANG_not_updated_files_blacklisted', "Not updated/installed files (blacklisted):<br>%s");
define('OGP_LANG_latest_version', "Seneste version");
define('OGP_LANG_panel_version', "Panel version");
define('OGP_LANG_update_now', "Opdatere Nu");
define('OGP_LANG_the_panel_is_up_to_date', "The Panel is up-to-date.");
define('OGP_LANG_files_overwritten', "%s files overwritten");
define('OGP_LANG_files_not_overwritten', "%s files are NOT overwritten due to blacklist");
define('OGP_LANG_can_not_update_non_writable_files', "Kan ikke opdatere, på grund af følgende filer/mapper ikke er har skriverettigheder");
define('OGP_LANG_dwl_failed', "Den download URL er ikke tilgængelig: \"%s\".<br>Prøv igen senere.");
define('OGP_LANG_temp_folder_not_writable', "The download can not be placed, because Apache does not have write permission at the system temporary folder (%s).");
define('OGP_LANG_base_dir_not_writable', "The Panel can not update, because Apache does not have write permission on \"%s\" folder.");
define('OGP_LANG_new_files', "%s nye filer.");
define('OGP_LANG_updated_files', "Opdateret filer:<br>%s");
define('OGP_LANG_select_mirror', "Select mirror");
define('OGP_LANG_view_changes', "View changes");
define('OGP_LANG_updating_modules', "Opdatere moduler");
define('OGP_LANG_updating_finished', "Opdatering Færdig");
define('OGP_LANG_updated_module', "Opdatere modul: '%s'.");
define('OGP_LANG_blacklist_files', "Blacklist files");
define('OGP_LANG_blacklist_files_info', "All marked files will not be updated.");
define('OGP_LANG_save_to_blacklist', "Save to blacklist");
define('OGP_LANG_no_new_updates', "No new updates");
define('OGP_LANG_module_file_missing', "directory is missing the module.php file.");
define('OGP_LANG_query_failed', "Failed to execute query");
define('OGP_LANG_query_failed_2', "to database.");
define('OGP_LANG_missing_zip_extension', "The php-zip extension is not loaded. Please, enable it to use the Update module.");
?>