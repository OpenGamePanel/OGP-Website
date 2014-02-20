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
$lang['curl_needed'] = "Cette page requiert le module PHP curl.";
$lang['no_access'] = "Vous devez avoir les droits d'administration pour accéder à cette page.";
$lang['dwl_update'] = "Téléchargement de la mise à jour...";
$lang['dwl_complete'] = "Téléchargement complété";
$lang['install_update'] = "Mise à jour en cours...";
$lang['update_complete'] = "Mise à jour effectuée avec succès";

// update.php
$lang['latest_version'] = "Dernière version";
$lang['panel_version'] = "Version du panneau";
$lang['update_now'] = "Mettre à jour maintenant";
$lang['the_panel_is_up_to_date'] = "Le panneau est à jour.";
$lang['files_overwritten'] = "%s fichiers écrasés.";
$lang['can_not_update_non_writable_files'] = "Impossible de mettre à jour car les fichiers/dossiers suivants ne peuvent pas être modifiés";
$lang['dwl_failed'] = "L'URL de téléchargement n'est pas accessible : \"%s\".<br>Réessayer plus tard.";
$lang['temp_folder_not_writable'] = "Le téléchargement ne peut démarré car Apache n'a pas la permission d'écrire dans le dossier temporaire(%s).";
$lang['base_dir_not_writable'] = "Le panneau ne peut être mis à jour car Apache n'a pas les droits d'écriture sur le dossier \"%s\".";
$lang['new_files'] = "%s nouveaux fichiers.";
$lang['updated_files'] = "Fichiers mis à jour :<br>%s";
$lang['view_changes'] = "View changes";
$lang['get_x_revison_messages_may_take_some_time'] = "Get %s revison messages may take some time.";

//updating_modules.php
$lang['updating_modules'] = "Mise à jour des modules";
$lang['updating_finished'] = "Mise à jour terminée";
$lang['updated_module'] = "Module mis à jour : '%s'.";
$lang['select_mirror'] = "Select mirror";

//blacklist.php
$lang['blacklist_files'] = "Blacklist files";
$lang['blacklist_files_info'] = "All marked files will not be updated.";
$lang['save_to_blacklist'] = "Save to blacklist";
include('litefm.php');
?>
