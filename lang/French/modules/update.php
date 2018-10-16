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
define('OGP_LANG_curl_needed', "Cette page requiert le module PHP curl.");
define('OGP_LANG_no_access', "Vous devez avoir les droits d'administration pour accéder à cette page.");
define('OGP_LANG_dwl_update', "Téléchargement de la mise à jour...");
define('OGP_LANG_dwl_complete', "Téléchargement complété");
define('OGP_LANG_install_update', "Mise à jour en cours...");
define('OGP_LANG_update_complete', "Mise à jour effectuée avec succès");
define('OGP_LANG_ignored_files', "%s fichier(s) ignoré(s).");
define('OGP_LANG_not_updated_files_blacklisted', "Fichiers non mis à jour/installés (Blacklistés):<br>%s");
define('OGP_LANG_latest_version', "Dernière version");
define('OGP_LANG_panel_version', "Version du Panneau");
define('OGP_LANG_update_now', "Mettre à jour maintenant");
define('OGP_LANG_the_panel_is_up_to_date', "Le Panneau est à jour.");
define('OGP_LANG_files_overwritten', "%s fichiers remplacés");
define('OGP_LANG_files_not_overwritten', "%s fichiers NON remplacés à cause de la liste noire");
define('OGP_LANG_can_not_update_non_writable_files', "Impossible de mettre à jour car les fichiers/dossiers suivants ne peuvent pas être modifiés");
define('OGP_LANG_dwl_failed', "L'URL de téléchargement n'est pas accessible : \"%s\".<br>Réessayer plus tard.");
define('OGP_LANG_temp_folder_not_writable', "Le téléchargement ne peut démarré car le serveur Web n'a pas la permission d'écrire dans le dossier temporaire système (%s).");
define('OGP_LANG_base_dir_not_writable', "Le panneau ne peut être mis à jour car le serveur Web n'a pas les droits d'écriture sur le dossier \"%s\".");
define('OGP_LANG_new_files', "%s nouveaux fichiers.");
define('OGP_LANG_updated_files', "Fichiers mis à jour:<br>%s");
define('OGP_LANG_select_mirror', "Sélectionner le mirroir");
define('OGP_LANG_view_changes', "Voir les changements");
define('OGP_LANG_updating_modules', "Mise à jour des modules");
define('OGP_LANG_updating_finished', "Mise à jour terminée");
define('OGP_LANG_updated_module', "Module mis à jour: '%s'.");
define('OGP_LANG_blacklist_files', "Liste Noire des fichiers");
define('OGP_LANG_blacklist_files_info', "Tous les fichiers marqués ne seront pas mis à jour.");
define('OGP_LANG_save_to_blacklist', "Enregistrer dans la Liste Noire");
define('OGP_LANG_no_new_updates', "Pas de nouvelles mises à jour");
define('OGP_LANG_module_file_missing', "Le fichier module.php est manquant dans le dossier.");
define('OGP_LANG_query_failed', "Impossible d’exécuter la requête");
define('OGP_LANG_query_failed_2', "sur la base de données.");
define('OGP_LANG_missing_zip_extension', "L'extension php-zip n'est pas chargée. Veuillez l'activer pour utiliser le module de mise à jour.");
?>