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
define('curl_needed', "Den side påkræver PHP curl modul.");
define('no_access', "Du har brug for admin rettigheder, for at få adgang til siden.");
define('dwl_update', "Downloader opdatering...");
define('dwl_complete', "Download Færdiggjort");
define('install_update', "Installere opdatering...");
define('update_complete', "Opdatering Færdig");
define('ignored_files', "%s ignored files.");
define('not_updated_files_blacklisted', "Not updated/installed files (blacklisted):<br>%s");
define('latest_version', "Seneste version");
define('panel_version', "Panel version");
define('update_now', "Opdatere Nu");
define('the_panel_is_up_to_date', "The Panel is up-to-date.");
define('files_overwritten', "%s files overwritten");
define('files_not_overwritten', "%s files are NOT overwritten due to blacklist");
define('can_not_update_non_writable_files', "Kan ikke opdatere, på grund af følgende filer/mapper ikke er har skriverettigheder");
define('dwl_failed', "Den download URL er ikke tilgængelig: \"%s\".<br>Prøv igen senere.");
define('temp_folder_not_writable', "The download can not be placed, because Apache does not have write permission at the system temporary folder (%s).");
define('base_dir_not_writable', "The Panel can not update, because Apache does not have write permission on \"%s\" folder.");
define('new_files', "%s nye filer.");
define('updated_files', "Opdateret filer:<br>%s");
define('select_mirror', "Select mirror");
define('view_changes', "View changes");
define('get_x_revison_messages_may_take_some_time', "Get %s revision message(s) may take some time.");
define('updating_modules', "Opdatere moduler");
define('updating_finished', "Opdatering Færdig");
define('updated_module', "Opdatere modul: '%s'.");
define('blacklist_files', "Blacklist files");
define('blacklist_files_info', "All marked files will not be updated.");
define('save_to_blacklist', "Save to blacklist");
define('no_new_updates', "No new updates");
define('module_file_missing', "directory is missing the module.php file.");
define('query_failed', "Failed to execute query");
define('query_failed_2', "to database.");
define('missing_zip_extension', "The php-zip extension is not loaded. Please, enable it to use the Update module.");
?>