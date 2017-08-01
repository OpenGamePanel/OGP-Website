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
define('curl_needed', "Cette page requiert le module PHP curl.");
define('no_access', "Vous devez avoir les droits d'administration pour accéder à cette page.");
define('dwl_update', "Téléchargement de la mise à jour...");
define('dwl_complete', "Téléchargement complété");
define('install_update', "Mise à jour en cours...");
define('update_complete', "Mise à jour effectuée avec succès");
define('ignored_files', "%s fichiers ignorés.");
define('not_updated_files_blacklisted', "Fichiers non mis à jour/installés (Blacklistés):<br>%s");
define('latest_version', "Dernière version");
define('panel_version', "Version du Panneau");
define('update_now', "Mettre à jour maintenant");
define('the_panel_is_up_to_date', "Le Panneau est à jour.");
define('files_overwritten', "%s fichiers remplacés");
define('files_not_overwritten', "%s fichiers NON remplacés à cause de la liste noire");
define('can_not_update_non_writable_files', "Impossible de mettre à jour car les fichiers/dossiers suivants ne peuvent pas être modifiés");
define('dwl_failed', "L'URL de téléchargement n'est pas accessible : \"%s\".<br>Réessayer plus tard.");
define('temp_folder_not_writable', "The download can not be placed, because Apache does not have write permission at the system temporary folder (%s).");
define('base_dir_not_writable', "Le panneau ne peut être mis à jour car le serveur Web n'a pas les droits d'écriture sur le dossier \"%s\".");
define('new_files', "%s nouveaux fichiers.");
define('updated_files', "Fichiers mis à jour:<br>%s");
define('select_mirror', "Sélectionner le mirroir");
define('view_changes', "Voir les changements");
define('get_x_revison_messages_may_take_some_time', "Récupérer %s messages de révision peut prendre du temps.");
define('updating_modules', "Mise à jour des modules");
define('updating_finished', "Mise à jour terminée");
define('updated_module', "Module mis à jour: '%s'.");
define('blacklist_files', "Liste Noire des fichiers");
define('blacklist_files_info', "Tous les fichiers marqués ne seront pas mis à jour.");
define('save_to_blacklist', "Enregistrer dans la Liste Noire");
define('no_new_updates', "Pas de nouvelles mises à jour");
define('module_file_missing', "Le fichier module.php est manquant dans le dossier.");
define('query_failed', "Impossible d’exécuter la requête");
define('query_failed_2', "sur la base de données.");
define('missing_zip_extension', "L'extension php-zip n'est pas chargée. Veuillez l'activer pour utiliser le module de mise à jour.");
?>