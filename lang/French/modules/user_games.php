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

define('OGP_LANG_add_mods_note', "Vous devez ajouter des mods après avoir assigné le serveur à un utilisateur. Cela peut être fait en éditant le serveur.");
define('OGP_LANG_game_servers', "Serveurs de Jeux");
define('OGP_LANG_game_path', "Chemin du Serveur de Jeu");
define('OGP_LANG_game_path_info', "Le chemin absolu du serveur. Exemple: /home/ogp_agent/OGP_User_Files/my_server/");
define('OGP_LANG_game_server_name_info', "Le nom du serveur aide les utilisateurs à identifier leurs serveurs.");
define('OGP_LANG_control_password', "Mot de passe de contrôle");
define('OGP_LANG_control_password_info', "Ce mot de passe est utilisé pour le contrôle du serveur, comme le RCON. Si le mot de passe est vide, d'autres moyens seront utilisés.");
define('OGP_LANG_add_game_home', "Ajouter un Serveur de Jeu");
define('OGP_LANG_game_path_empty', "Le chemin du Serveur de Jeu ne peut être vide.");
define('OGP_LANG_game_home_added', "Serveur de Jeu ajouté avec succès. Redirection vers la page d'édition du serveur.");
define('OGP_LANG_failed_to_add_home_to_db', "Impossible d'ajouter le serveur à la base de données. Erreur: %s");
define('OGP_LANG_caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Attention!</b> L'Agent est hors ligne, impossible de connaître l'OS et l'architecture,<br> Serveurs pour toutes les plateformes:");
define('OGP_LANG_select_remote_server', "Sélectionner le Serveur Distant");
define('OGP_LANG_no_remote_servers_configured', "Aucun serveur distant configuré sous Open Game Panel.<br>Vous devez ajouter un Serveur Distant avant de pouvoir ajouter des serveurs de jeux pour l'utilisateur.");
define('OGP_LANG_no_game_configurations_found', "Aucune configuration de jeux trouvée. Vous devez ajouter des configurations depuis la");
define('OGP_LANG_game_configurations', "page de configuration du Jeu");
define('OGP_LANG_add_remote_server', "Ajouter un serveur.");
define('OGP_LANG_wine_games', "Jeux sous WINE");
define('OGP_LANG_home_path', "Chemin du serveur");
define('OGP_LANG_change_home_info', "L'emplacement du serveur de jeu installé. Exemple: /home/ogp_agent/OGP_User_Files/my_server/");
define('OGP_LANG_game_server_name', "Nom du serveur de jeu");
define('OGP_LANG_change_name_info', "Le nom du serveur pour aider les utilisateurs à l'identifier.");
define('OGP_LANG_game_control_password', "Mot de passe de contrôle du jeu");
define('OGP_LANG_change_control_password_info', "Le mot de passe de contrôle est par exemple le RCON.");
define('OGP_LANG_available_mods', "Mods disponibles");
define('OGP_LANG_note_no_mods', "Aucun mod(s) disponible(s) pour ce jeu.");
define('OGP_LANG_change_home', "Changer le chemin");
define('OGP_LANG_change_control_password', "Changer le mot de passe de contrôle");
define('OGP_LANG_change_name', "Changer le nom");
define('OGP_LANG_add_mod', "Ajouter un mod");
define('OGP_LANG_set_ip', "Définir l&apos;IP");
define('OGP_LANG_ips_and_ports', "IPs et Ports");
define('OGP_LANG_mod_name', "Nom du mod");
define('OGP_LANG_max_players', "Joueurs max");
define('OGP_LANG_extra_cmd_line_args', "Arguments supplémentaires");
define('OGP_LANG_extra_cmd_line_info', "Les arguments supplémentaires de la ligne de commande permettent de rajouter des arguments à la ligne de commande de démarrage.");
define('OGP_LANG_cpu_affinity', "Affinité du CPU");
define('OGP_LANG_nice_level', "Niveau de priorité (nice)");
define('OGP_LANG_set_options', "Définir les options");
define('OGP_LANG_remove_mod', "Supprimer le mod");
define('OGP_LANG_mods', "Mods");
define('OGP_LANG_ip', "IP");
define('OGP_LANG_port', "Port");
define('OGP_LANG_no_ip_ports_assigned', "Au moins une IP:Port doit être assignée au serveur.");
define('OGP_LANG_successfully_assigned_ip_port', "IP:Port assignée au serveur avec succès.");
define('OGP_LANG_port_range_error', "Le port doit être compris entre 0 et 65535.");
define('OGP_LANG_failed_to_assing_mod_to_home', "Impossible d'assigner le mod id %d au serveur.");
define('OGP_LANG_successfully_assigned_mod_to_home', "Mod avec l'ID %d assigné au serveur avec succès.");
define('OGP_LANG_successfully_modified_mod', "Informations du mod modifiées avec succès.");
define('OGP_LANG_back_to_game_monitor', "Revenir à la Gestion des Serveurs");
define('OGP_LANG_back_to_game_servers', "Revenir aux Serveurs de Jeux");
define('OGP_LANG_user_id_main', "Propriétaire");
define('OGP_LANG_change_user_id_main', "Changer le propriétaire");
define('OGP_LANG_change_user_id_main_info', "Le propriétaire du serveur.");
define('OGP_LANG_server_ftp_password', "Mot de passe FTP");
define('OGP_LANG_change_ftp_password', "Changer le mot de passe FTP");
define('OGP_LANG_change_ftp_password_info', "Le mot de passe FTP pour ce serveur.");
define('OGP_LANG_Delete_old_user_assigned_homes', "Désassigner l'utilisateur du serveur.");
define('OGP_LANG_editing_home_called', "Editer le serveur nommé");
define('OGP_LANG_control_password_updated_successfully', "Mot de passe de contrôle mis à jour avec succès.");
define('OGP_LANG_control_password_update_failed', "Mise à jour du mot de passe de contrôle impossible");
define('OGP_LANG_successfully_changed_game_server', "Serveur de jeu modifié avec succès.");
define('OGP_LANG_error_ocurred_on_remote_server', "Erreur sur le serveur distant,");
define('OGP_LANG_ftp_password_can_not_be_changed', "le mot de passe FTP ne peut être changé.");
define('OGP_LANG_ftp_can_not_be_switched_on', "le FTP ne peut être activé.");
define('OGP_LANG_ftp_can_not_be_switched_off', "le FTP ne peut être désactivé.");
define('OGP_LANG_invalid_home_id_entered', "ID du serveur invalide.");
define('OGP_LANG_ip_port_already_in_use', "L'adresse %s:%s est déjà utilisée. Choisissez-en une autre.");
define('OGP_LANG_successfully_assigned_ip_port_to_server_id', "Adresse %s:%s assignée au serveur avec l'ID %s avec succès.");
define('OGP_LANG_no_ip_addresses_configured', "Votre serveur de jeu n'a aucune adresse IP configurée. Vous pouvez en configurer une depuis ");
define('OGP_LANG_server_page', "la page serveur");
define('OGP_LANG_successfully_removed_mod', "Mod du jeu supprimé avec succès.");
define('OGP_LANG_warning_agent_offline_defaulting_CPU_count_to_1', "Attention - L'Agent est hors ligne, CPU mis à 1.");
define('OGP_LANG_mod_install_cmds', "CMDs installation mod");
define('OGP_LANG_cmds_for', "Commandes pour");
define('OGP_LANG_preinstall_cmds', "Commandes de pré-installation");
define('OGP_LANG_postinstall_cmds', "Commandes de post-installation");
define('OGP_LANG_edit_preinstall_cmds', "Editer les commandes de pré-installation");
define('OGP_LANG_edit_postinstall_cmds', "Editer les commandes de post-installation");
define('OGP_LANG_save_as_default_for_this_mod', "Mettre par défaut à ce mod");
define('OGP_LANG_empty', "vide");
define('OGP_LANG_master_server_for_clon_update', "Serveur maître pour mises à jour locales");
define('OGP_LANG_set_as_master_server', "Définir comme serveur maître");
define('OGP_LANG_set_as_master_server_for_local_clon_update', "Définir comme serveur maître pour les mises à jour locales.");
define('OGP_LANG_only_available_for', "Seulement disponible pour '%s' hébergé sur le Serveur Distant '%s'.");
define('OGP_LANG_ftp_on', "Activer FTP");
define('OGP_LANG_ftp_off', "Désactiver FTP");
define('OGP_LANG_change_ftp_account_status', "Changer le statut du compte FTP");
define('OGP_LANG_change_ftp_account_status_info', "Une fois que le compte FTP est activé ou désactivé, il est ajouté ou supprimé de la base de données du serveur FTP.");
define('OGP_LANG_server_ftp_login', "Nom d'utilisateur du serveur FTP");
define('OGP_LANG_change_ftp_login_info', "Le nom d'utilisateur FTP pour ce serveur.");
define('OGP_LANG_change_ftp_login', "Changer le nom d&apos;utilisateur FTP");
define('OGP_LANG_ftp_login_can_not_be_changed', "Impossible de changer le nom d'utilisateur FTP.");
define('OGP_LANG_server_is_running_change_addresses_not_available', "Le serveur est démarré. L'IP ne peut donc pas être changée.");
define('OGP_LANG_change_game_type', "Changer le Type de Jeu");
define('OGP_LANG_change_game_type_info', "En changeant le Type de Jeu la configuration actuelle des mods va être supprimée.");
define('OGP_LANG_force_mod_on_this_address', "Forcer le mod sur cette adresse");
define('OGP_LANG_successfully_assigned_mod_to_address', "Mod assigné à cette adresse avec succès");
define('OGP_LANG_switch_mods', "Changer les mods");
define('OGP_LANG_switch_mod_for_address', "Changer le mod pour l'adresse %s");
define('OGP_LANG_invalid_path', "Chemin Invalide");
define('OGP_LANG_add_new_game_home', "Ajouter un nouveau serveur de jeu");
define('OGP_LANG_no_game_homes_found', "Aucun serveur de jeu trouvé");
define('OGP_LANG_available_game_homes', "Serveurs de jeux disponibles");
define('OGP_LANG_home_id', "ID Serveur");
define('OGP_LANG_game_server', "Machine de Jeu");
define('OGP_LANG_game_type', "Type de Jeu");
define('OGP_LANG_game_home', "Chemin du serveur");
define('OGP_LANG_game_home_name', "Nom du serveur");
define('OGP_LANG_clone', "Cloner");
define('OGP_LANG_unassign', "Désassigner");
define('OGP_LANG_access_rights', "Droits d'accès");
define('OGP_LANG_assigned_homes', "Serveurs déjà assignés");
define('OGP_LANG_assign', "Assigner");
define('OGP_LANG_allow_updates', "Autoriser les mises à jour");
define('OGP_LANG_allow_updates_info', "Autorise l'utilisateur à mettre à jour le serveur de jeu.");
define('OGP_LANG_allow_file_management', "Autoriser le Gestionnaire de Fichiers");
define('OGP_LANG_allow_file_management_info', "Donne l'accès à l'utilisateur au gestionnaire de fichiers.");
define('OGP_LANG_allow_parameter_usage', "Autoriser l'usage des Paramètres");
define('OGP_LANG_allow_parameter_usage_info', "Autorise l'utilisateur à changer les paramètres de la ligne de commande.");
define('OGP_LANG_allow_extra_params', "Autoriser les Paramètres Supplémentaires");
define('OGP_LANG_allow_extra_params_info', "Autorise l'utilisateur à modifier les paramètres supplémentaires de la ligne de commande.");
define('OGP_LANG_allow_ftp', "Autoriser le FTP");
define('OGP_LANG_allow_ftp_info', "Autorise l'utilisateur à accéder à son compte FTP et modifier ses informations.");
define('OGP_LANG_allow_custom_fields', "Autoriser les Champs Personnalisés");
define('OGP_LANG_allow_custom_fields_info', "Autorise l'utilisateur à accéder aux champs personnalisés pour le jeu s'il y en a.");
define('OGP_LANG_select_home', "Sélectionner un serveur à assigner");
define('OGP_LANG_assign_new_home_to_user', "Assigner un nouveau serveur à l'Utilisateur %s");
define('OGP_LANG_assign_new_home_to_group', "Assigner un nouveau serveur au Groupe %s");
define('OGP_LANG_assigned_home_to_user', "Serveur (ID %d) assigné à l'Utilisateur %s avec succès.");
define('OGP_LANG_failed_to_assign_home_to_user', "Impossible d'assigner le serveur (ID: %d) à l'utilisateur %s.");
define('OGP_LANG_assigned_home_to_group', "Serveur (ID %d) assigné au Groupe %s avec succès.");
define('OGP_LANG_unassigned_home_from_user', "Serveur (ID %d) désassigné de l'Utilisateur %s avec succès.");
define('OGP_LANG_unassigned_home_from_group', "Serveur (ID %d) désassigné du Groupe %s avec succès.");
define('OGP_LANG_no_homes_assigned_to_user', "Aucun serveur assigné à l'utilisateur %s.");
define('OGP_LANG_no_homes_assigned_to_group', "Aucun serveur assigné au groupe %s.");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_user', "Il n'y a plus de serveur disponible pour cet utilisateur");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_group', "Il n'y a plus de serveur disponible pour ce groupe");
define('OGP_LANG_you_can_add_a_new_game_server_from', "Vous pouvez ajouter un nouveau serveur de jeu depuis %s.");
define('OGP_LANG_no_remote_servers_available_please_add_at_least_one', "Il n'y a pas de serveur distant disponible, rajoutez-en au moins un!");
define('OGP_LANG_cloning_of_home_failed', "Clonage du serveur avec l'ID '%s' impossible.");
define('OGP_LANG_no_mods_to_clone', "Aucun mod activé pour ce jeu. Impossible de cloner.");
define('OGP_LANG_failed_to_add_mod', "Impossible de rajouter le mod avec l'ID '%s' au serveur avec l'ID '%s'.");
define('OGP_LANG_failed_to_update_mod_settings', "Impossible de mettre à jour les paramètres du mod pour le serveur avec l'ID '%s'.");
define('OGP_LANG_successfully_cloned_mods', "Mods clonés avec succès pour le serveur avec l'ID '%s'.");
define('OGP_LANG_successfully_copied_home_database', "Serveur copié avec succès.");
define('OGP_LANG_copying_home_remotely', "Copie du serveur sur le Serveur Distant de '%s' vers '%s'.");
define('OGP_LANG_cloning_home', "Clonage du serveur '%s'");
define('OGP_LANG_current_home_path', "Chemin du serveur actuel");
define('OGP_LANG_current_home_path_info', "L'emplacement actuel du serveur qui doit être copié sur le serveur distant.");
define('OGP_LANG_clone_home', "Cloner serveur");
define('OGP_LANG_new_home_name', "Nom du nouveau serveur");
define('OGP_LANG_new_home_path', "Chemin du nouveau serveur");
define('OGP_LANG_agent_ip', "IP de l'Agent");
define('OGP_LANG_game_server_copy_is_running', "Copie du serveur de jeu en cours...");
define('OGP_LANG_game_server_copy_was_successful', "Copie du serveur de jeu effectuée avec succès");
define('OGP_LANG_game_server_copy_failed_with_return_code', "Copie du serveur de jeu impossible. Erreur %s");
define('OGP_LANG_clone_mods', "Cloner les Mods");
define('OGP_LANG_game_server_owner', "Propriétaire du serveur de jeu");
define('OGP_LANG_the_name_of_the_server_to_help_users_to_identify_it', "Le nom du serveur pour aider les utilisateurs à l'identifier.");
define('OGP_LANG_ips_and_ports_used_in_this_home', "IPs et Ports utilisés pour ce serveur");
define('OGP_LANG_note_ips_and_ports_are_not_cloned', "Note - Les IPs et les Ports ne sont pas clonés");
define('OGP_LANG_mods_and_settings_for_this_game_server', "Les mods et les paramètres pour ce serveur de jeu");
define('OGP_LANG_sure_to_delete_serverid_from_remoteip_and_directory', "Etes-vous sûr de vouloir supprimer le serveur de jeu (ID: %s) du serveur %s et son répertoire %s");
define('OGP_LANG_yes_and_delete_the_files', "Oui et Supprimer tous les fichiers");
define('OGP_LANG_failed_to_remove_gamehome_from_database', "Impossible de supprimer le serveur de jeu de la base de données.");
define('OGP_LANG_successfully_deleted_game_server_with_id', "Serveur de jeu (ID: %s) supprimé avec succès.");
define('OGP_LANG_failed_to_remove_ftp_account_from_remote_server', "Impossible de supprimer le compte FTP sur le serveur distant.");
define('OGP_LANG_remove_it_anyway', "Voulez-vous le supprimer quand même?");
define('OGP_LANG_sucessfully_deleted', "%s supprimé avec succès");
define('OGP_LANG_the_agent_had_a_problem_deleting', "L'Agent a eu un problème en supprimant %s, vérifiez le log de l'Agent");
define('OGP_LANG_connection_timeout_or_problems_reaching_the_agent', "Délai dépassé lors de la connexion ou problèmes en se connectant à l'Agent");
define('OGP_LANG_does_not_exist_yet', "N'existe pas encore.");
define('OGP_LANG_update_settings', "Enregistrer les paramètres");
define('OGP_LANG_settings_updated', "Paramètres mis à jour.");
define('OGP_LANG_selected_path_already_in_use', "Le chemin spécifié est déjà utilisé.");
define('OGP_LANG_browse', "Parcourir");
define('OGP_LANG_cancel', "Annuler");
define('OGP_LANG_set_this_path', "Choisir ce chemin");
define('OGP_LANG_select_home_path', "Sélectionner le chemin");
define('OGP_LANG_folder', "Dossier");
define('OGP_LANG_owner', "Propriétaire");
define('OGP_LANG_group', "Groupe");
define('OGP_LANG_level_up', "^ Dossier parent ^");
define('OGP_LANG_level_up_info', "Retour au dossier précédent.");
define('OGP_LANG_add_folder', "Créer un dossier");
define('OGP_LANG_add_folder_info', "Écrire le nom du nouveau dossier, puis cliquer sur l'icône.");
define('OGP_LANG_valid_user', "Veuillez spécifier un utilisateur valide.");
define('OGP_LANG_valid_group', "Veuillez spécifier un groupe valide.");
define('OGP_LANG_set_affinity', "Définir l'affinité du CPU");
define('OGP_LANG_cpu_affinity_info', "Sélectionnez le(s) cœur(s) de CPU à assigner au serveur de jeu.");
define('OGP_LANG_expiration_date_changed', "La date d&apos;expiration pour ce serveur a bien été changée.");
define('OGP_LANG_expiration_date_could_not_be_changed', "La date d&apos;expiration pour ce serveur n&apos;a pas pu être changée.");
define('OGP_LANG_search', "Rechercher");
define('OGP_LANG_ftp_account_username_too_long', "Le nom d'utilisateur FTP est trop long. Veuillez entrer un nom d'utilisateur de 20 caractères maximum.");
define('OGP_LANG_ftp_account_password_too_long', "Le mot de passe FTP est trop long. Veuillez entrer un mot de passe de 20 caractères maximum.");
define('OGP_LANG_other_servers_exist_with_path_please_change', "Un autre serveur existe avec le même chemin. Il est fortement recommandé (mais pas requis) que vous changiez le chemin pour quelque chose d'unique. Vous pourrez avoir des problèmes si vous ne le faites PAS.");
define('OGP_LANG_change_access_rights_for_selected_servers', "Changer les droits d&apos;accès pour les serveurs sélectionnés");
?>