<?php
/*
*
* Copyright (C) 2008 OGP Team
* 
* www.opengamepanel.org
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
*/

// updating.php
$lang['curl_needed'] = "This page requires PHP curl module.";
$lang['no_access'] = "You need admin rights to access this page.";
$lang['dwl_update'] = "Downloading update...";
$lang['dwl_complete'] = "Download complete";
$lang['install_update'] = "Installing update...";
$lang['update_complete'] = "Update complete";

// update.php
$lang['latest_version'] = "Latest version";
$lang['panel_version'] = "Panel version";
$lang['update_now'] = "Update Now";
$lang['the_panel_is_up_to_date'] = "The panel is up to date.";
$lang['files_overwritten'] = "%s files overwritten.";
$lang['can_not_update_non_writable_files'] = "Can not update because the following files/folders are not writable";
$lang['dwl_failed'] = "The download URL is not available: \"%s\".<br>Try again later.";
$lang['temp_folder_not_writable'] = "The download can not be placed because Apache does not have write permision at the system temporary folder(%s).";
$lang['base_dir_not_writable'] = "The panel can not update because Apache does not have write permision at folder \"%s\".";
$lang['new_files'] = "%s new files.";
$lang['updated_files'] = "Updated files:<br>%s";
$lang['view_changes'] = "View changes";
$lang['get_x_revison_messages_may_take_some_time'] = "Get %s revison messages may take some time.";

//updating_modules.php
$lang['updating_modules'] = "Updating Modules";
$lang['updating_finished'] = "Updating Finished";
$lang['updated_module'] = "Updated module: '%s'.";
$lang['select_mirror'] = "Select mirror";

//blacklist.php
$lang['blacklist_files'] = "Blacklist files";
$lang['blacklist_files_info'] = "All marked files will not be updated.";
$lang['save_to_blacklist'] = "Save to blacklist";
include('litefm.php');
?>