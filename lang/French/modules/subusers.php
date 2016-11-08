<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2013 The OGP Development Team
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

define('login_name', "Nom d'utilisateur");
define('first_name', "Prénom");
define('last_name', "Nom");
define('phone_number', "Numéro de téléphone");
define('email_address', "E-mail");
define('register_a_new_user', "Enregistrer un nouveau utilisateur");
define('password_mismatch', "Les mots de passe ne correspondent pas");
define('confirm_password', "Confirmez le mot de passe");
define('subuser_password', "Mot de passe de l'utilisateur secondaire");
define('subuser_man', "Gestion de l'utilisateur secondaire");
define('successfull', "Succès");
define('click_here', "Cliquez ici");
define('to_login', "pour vous connecter");
define('registered_on', "Enregistré le");
define('register_message', "Bonjour,
		 Votre compte a été créé.

		 Nom d'utilisateur: %s
		 Mot de passe: %s

		 Vous pouvez changer votre mot de passe depuis votre compte.

		 Merci,
		 L'administrateur

		 Ceci est un message automatisé, n'y répondez pas !");

//Errors feedback
define('err_password', "Le mot de passe ne peut pas être vide");
define('err_confirm_password', "La vérification mot de passe ne peut pas être vide");
define('err_password_mismatch', "Les mots de passe ne correspondent pas");
define('err_captcha', "Captcha incorrect.");
define('err_login_name', "Nom d'utilisateur vide ou déjà utilisé.");
define('err_first_name', "Vous n'avez pas saisi votre prénom.");
define('err_last_name', "Vous n'avez pas saisi votre nom.");
define('err_phone_number', "Vous n'avez pas saisi votre numéro de téléphone.");
define('err_email_address', "Vous n'avez pas saisi votre e-mail.");
define('err_users_parent', "Les utilisateurs secondaires ne peuvent pas créer d'autres utilisateurs.");
define('err_parent_user', "L'ID de l'utilisateur parent doit être un l'ID d'un utilisateur valide.");
define('err_email_address_already_in_use_by', "L'adresse e-mail est déjà utilisée par <b>%s</b>.");
define('user_registration', "Enregistrement de l'utilisateur");
define('your_account_details_has_been_sent_by_email_to', "Les détails de votre compte ont été envoyés par e-mail à <b>%s</b>.");
define('subject', "Bonjour %s, bienvenue sur %s.");
define('sub_user', "Utilisateurs secondaires");
define('create_sub_user', "Ajouter un utilisateur secondaire");
define('listdel_sub_user', "Lister ou supprimer un utilisateur secondaire");
define('delete_sub_user', "Supprimer un utilisateur secondaire");
define('del_subuser_conf', "Etes-vous sûr de vouloir supprimer ce compte :");
define('no_subusers', "Aucun utilisateur secondaire n'a encore été créé pour votre compte !");
define('subuser_deleted', "L'utilisateur secondaire %s a été supprimé de la base de données avec succès !");
define('subuser_added', "L'utilisateur secondaire %s a été créé avec succès et ajouté à la base de donnés !");
define('your_subusers', "Mes utilsateurs secondaires");
?>
