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
define('curl_needed', "This page requires PHP curl module.");
define('no_access', "You need admin rights to access this page.");
define('dwl_update', "Downloading update...");
define('dwl_complete', "Download complete");
define('install_update', "Installing update...");
define('update_complete', "Update complete");
define('ignored_files', "%s ignored files.");
define('not_updated_files_blacklisted', "Not updated/installed files (Blacklisted):<br>%s");
define('latest_version', "Latest version");
define('panel_version', "Panel version");
define('update_now', "Update Now");
define('the_panel_is_up_to_date', "The Panel is up-to-date.");
define('files_overwritten', "%s files overwritten");
define('files_not_overwritten', "%s files NOT overwritten due to blacklist");
define('can_not_update_non_writable_files', "Can not update because the following files/folders are not writable");
define('dwl_failed', "The download link is not available: \"%s\".<br>Try again later.");
define('temp_folder_not_writable', "The download can not be placed, because Apache does not have write permision at the system temporary folder(%s).");
define('base_dir_not_writable', "The Panel can not update, because Apache does not have write permission on \"%s\" folder.");
define('new_files', "%s new files.");
define('updated_files', "Updated files:<br>%s");
define('select_mirror', "Select mirror");
define('view_changes', "View changes");
define('get_x_revison_messages_may_take_some_time', "Get %s revison messages may take some time.");
define('updating_modules', "Updating Modules");
define('updating_finished', "Updating Finished");
define('updated_module', "Updated module: '%s'.");
define('blacklist_files', "Blacklist files");
define('blacklist_files_info', "All marked files will not be updated.");
define('save_to_blacklist', "Save to blacklist");
define('no_new_updates', "No new updates");
?>
