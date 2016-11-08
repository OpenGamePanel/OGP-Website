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

define('your_profile', "Votre profil");
define('new_password', "Nouveau mot de passe");
define('retype_new_password', "Vérification du nouveau mot de passe");
define('login_name', "Nom d'utilisateur");
define('language', "Langue");
define('first_name', "Prénom");
define('last_name', "Nom");
define('phone_number', "Numéro de téléphone");
define('email_address', "E-mail");
define('city', "Ville");
define('province', "Province");
define('country', "Pays");
define('comment', "Commentaire");
define('expires', "Expire");
define('save_profile', "Sauvegarder le profil");
define('new_password_info', "Quand le champ mot de passe est vide, le mot de passe ne sera pas mis à jour.");
define('theme', "Thème");
define('theme_info', "Si le champ thème est vide, le thème par défaut sera utilisé.");
define('expires_info', "Date à laquelle le compte utilisateur expire. Le compte n'est pas supprimé mais l'utilisateur ne peut plus se connecter.");
define('password_mismatch', "Les mots de passe ne correspondent pas");
define('current_password', "Mot de passe actuel");
define('current_password_info', "Votre mot de passe actuel.");
define('current_password_mismatch', "Votre mot de passe actuel ne correspond pas avec celui de la base de donnés.");

// show_users.php
define('add_new_user', "Ajouter un nouvel utilisateur");
define('edit_user_groups', "Editer un groupe d'utilisateurs");
define('users', "Utilisateurs");
define('user_role', "Rôle utilisateur");
define('full_name', "Nom complet");
define('edit_games', "Editer les jeux");
define('edit_profile', "Editer le profil");


// add_user.php
define('confirm_password', "Confirmez le mot de passe");
define('you_need_to_enter_both_passwords', "Vous devez entrer votre mot de passe deux fois.");
define('passwords_did_not_match', "Les mots de passes ne correspondent pas.");
define('could_not_add_user_because_user_already_exists', "Impossible de rajouter l'utilisateur car l'utilisateur <em>%s</em> existe déjà.");
define('successfully_added_user', "Utilisateur <em>%s</em> ajouté avec succès.");
define('add_a_new_user', "Ajouter un nouvel utilisateur");
define('admin', "Administrateur");
define('user', "Utilisateur");
define('user_with_id_does_not_exist', "Utilisateur avec l'ID %s n'existe pas.");
define('are_you_sure_you_want_to_delete_user', "Etes-vous sûr de vouloir supprimer l'utilisateur <em>%s</em> ?");
define('unable_to_delete_user', "Impossible de supprimer l'utilisateur %s.");
define('successfully_deleted_user', "Suppression de l'utilisateur <b>%s</b> effectuée avec succès.");
define('failed_to_update_user_profile_error', "Impossible de mettre à jour le profil utilisateur. Erreur: %s");
define('profile_of_user_modified_successfully', "Le profil de l'utilisation <b>%s</b> a été modifié avec succès.");

// subuser used in show_groups.php
define('no_subusers', "Aucun utilisateur secondaire n'est disponible pour être assigné à un groupe. Créez des utilisateurs secondaires d'abord.");
define('ownedby', "Compte parent");
define('andSubUsers', " Et tous ces utilisateurs secondaires ?"); 
define('subusers', "Utilisateurs Secondaires"); 
define('show_subusers', "Montrer Utilisateurs Secondaires");
define('hide_subusers', "Cacher Utilisateurs Secondaires");

// *_group.php
define('info_group', "Sur cette page il est possible de gérer les groupes d'utilisateurs. Vous pouvez asssigner un serveur à un groupe pour qu'il soit accessible par tout le groupe.");
define('add_new_group', "Ajouter un nouveau groupe");
define('group_name', "Nom du groupe");
define('add_group', "Ajouter le groupe");
define('no_groups_available', "Aucun groupe disponible.");
define('delete_group', "Supprimer le groupe");
define('add_user_to_group', "Ajouter un utilisateur au groupe");
define('add_user', "Ajouter l'utilisateur");
define('remove_from_group', "Supprimer du groupe");
define('add_server_to_group', "Ajouter un serveur au groupe");
define('add_server', "Ajouter le serveur");
define('no_remote_servers', "Aucun serveur distant disponible.");
define('servers_in_group', "Serveurs du groupe");
define('no_servers_in_group', "Aucun serveur pour le groupe %s.");
define('available_groups', "Groupes disponibles");
define('assign_homes', "Assigner un serveur");

// add_group.php
define('successfully_added_group', "Groupe %s ajouté avec succès.");
define('group_name_empty', "Le nom du groupe ne peut être vide.");
define('failed_to_add_group', "Impossible d'ajouter le groupe %s.");
define('could_not_add_user_to_group', "Impossible d'ajouter l'utilisateur %s au groupe %s car il y est déjà.");
define('successfully_added_to_group', "Utilisateur %s ajouté au groupe <em>%s</em> avec succès.");
define('could_not_add_server_to_group', "Impossible d'ajouter le serveur au groupe %s car il y est déjà.");
define('successfully_added_server_to_group', "Serveur ajouté au groupe <em>%s</em> avec succès.");
define('successfully_removed_from_group', "Utilisateur %s supprimé du groupe <em>%s</em> avec succès.");
define('could_not_delete_server_from_group', "Impossible de supprimer le serveur %s du groupe <em>%s</em>.");
define('successfully_removed_server_from_group', "Serveur %s supprimé du groupe <em>%s</em> avec succès.");
define('group_with_id_does_not_exist', "L'utilisateur avec l'ID %s n'existe pas.");
define('are_you_sure_you_want_to_delete_group', "Etes-vous sûr de vouloir supprimer le groupe <em>%s</em> ?");
define('unable_to_delete_group', "Impossible de supprimer le groupe %s.");
define('successfully_deleted_group', "Groupe <b>%s</b> supprimé avec succès.");

?>
