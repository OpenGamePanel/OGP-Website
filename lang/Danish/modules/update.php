<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
// updating.php
$lang['curl_needed'] = "Den side påkræver PHP curl modul.";
$lang['no_access'] = "Du har brug for admin rettigheder, for at få adgang til siden.";
$lang['dwl_update'] = "Downloader opdatering...";
$lang['dwl_complete'] = "Download Færdiggjort";
$lang['install_update'] = "Installere opdatering...";
$lang['update_complete'] = "Opdatering Færdig";

// update.php
$lang['latest_version'] = "Seneste version";
$lang['panel_version'] = "Panel version";
$lang['update_now'] = "Opdatere Nu";
$lang['the_panel_is_up_to_date'] = "Dette Panel bruger nyeste version.";
$lang['files_overwritten'] = "%s filer overskrives.";
$lang['can_not_update_non_writable_files'] = "Kan ikke opdatere, på grund af følgende filer/mapper ikke er har skriverettigheder";
$lang['dwl_failed'] = "Den download URL er ikke tilgængelig: \"%s\".<br>Prøv igen senere.";
$lang['temp_folder_not_writable'] = "Download kan ikke placeres, pga Apache ikke har nogen skrive tilladelse, på systemets midlertidig mappe(%s).";
$lang['base_dir_not_writable'] = "Panelet kan ikke opdateres pga Apache ikke har skrive tilladelse til mappen\"%s\".";
$lang['new_files'] = "%s nye filer.";
$lang['updated_files'] = "Opdateret filer:<br>%s";
$lang['view_changes'] = "View changes";
$lang['get_x_revison_messages_may_take_some_time'] = "Get %s revison messages may take some time.";

//updating_modules.php
$lang['updating_modules'] = "Opdateret moduler";
$lang['updating_finished'] = "Opdatering færdigjort";
$lang['updated_module'] = "Opdateret modul: '%s'.";
$lang['select_mirror'] = "Select mirror";

//blacklist.php
$lang['blacklist_files'] = "Blacklist files";
$lang['blacklist_files_info'] = "All marked files will not be updated.";
$lang['save_to_blacklist'] = "Save to blacklist";
include('litefm.php');
?>
