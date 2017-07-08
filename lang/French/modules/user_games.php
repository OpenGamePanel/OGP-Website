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

define('add_mods_note', "Vous devez ajouter des mods après avoir assigné le serveur à un utilisateur. Cela peut être fait en éditant le serveur.");
define('game_servers', "Serveurs de Jeux");
define('game_path', "Chemin du Jeu");
define('game_path_info', "Le chemin absolu du serveur. Exemple: /home/ogp_agent/OGP_User_Files/my_server/");
define('game_server_name_info', "Le nom du serveur aide les utilisateurs à identifier leurs serveurs.");
define('control_password', "Mot de passe de contrôle");
define('control_password_info', "Ce mot de passe est utilisé pour le contrôle du serveur, comme le RCON. Si le mot de passe est vide, d'autres moyens seront utilisés.");
define('add_game_home', "Ajouter un serveur de jeu");
define('game_path_empty', "Le chemin du Jeu ne peut être vide.");
define('game_home_added', "Serveur de jeu ajouté avec succès. Redirection vers la page d'édition du serveur.");
define('failed_to_add_home_to_db', "Impossible d'ajouter le serveur à la base de données. Erreur: %s");
define('caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Attention!</b> L'Agent est hors ligne, impossible de connaître l'OS et l'architecture,<br> Serveurs pour toutes les plateformes:");
define('select_remote_server', "Sélectionner le Serveur Distant");
define('no_remote_servers_configured', "Aucun serveur distant configuré sous Open Game Panel.<br>Vous devez ajouter un Serveur Distant avant de pouvoir ajouter des serveurs de jeux pour l'utilisateur.");
define('no_game_configurations_found', "Aucune configuration de jeux trouvée. Vous devez ajouter des configurations depuis la");
define('game_configurations', "page de configuration du Jeu");
define('add_remote_server', "Ajouter un serveur.");
define('wine_games', "Jeux sous WINE");
define('home_path', "Chemin du serveur");
define('change_home_info', "L'emplacement du serveur de jeu installé. Exemple: /home/ogp_agent/OGP_User_Files/my_server/");
define('game_server_name', "Nom du serveur de jeu");
define('change_name_info', "Le nom du serveur pour aider les utilisateurs à l'identifier.");
define('game_control_password', "Mot de passe de contrôle du jeu");
define('change_control_password_info', "Le mot de passe de contrôle est par exemple le RCON.");
define('available_mods', "Mods disponibles");
define('note_no_mods', "Aucun mod(s) disponible(s) pour ce jeu.");
define('change_home', "Changer le chemin");
define('change_control_password', "Changer le mot de passe de contrôle");
define('change_name', "Changer le nom");
define('add_mod', "Ajouter un mod");
define('set_ip', "Définir l&apos;IP");
define('ips_and_ports', "IPs et Ports");
define('mod_name', "Nom du mod");
define('max_players', "Joueurs max");
define('extra_cmd_line_args', "Arguments supplémentaires");
define('extra_cmd_line_info', "Les arguments supplémentaires de la ligne de commande permettent de rajouter des arguments à la ligne de commande de démarrage.");
define('cpu_affinity', "Affinité du CPU");
define('nice_level', "Niveau de priorité (nice)");
define('set_options', "Définir les options");
define('remove_mod', "Supprimer le mod");
define('mods', "Mods");
define('ip', "IP");
define('port', "Port");
define('no_ip_ports_assigned', "Au moins une IP:Port doit être assignée au serveur.");
define('successfully_assigned_ip_port', "IP:Port assignée au serveur avec succès.");
define('port_range_error', "Le port doit être compris entre 0 et 65535.");
define('failed_to_assing_mod_to_home', "Impossible d'assigner le mod id %d au serveur.");
define('successfully_assigned_mod_to_home', "Mod avec l'ID %d assigné au serveur avec succès.");
define('successfully_modified_mod', "Informations du mod modifiées avec succès.");
define('back_to_game_monitor', "Revenir à la Gestion des Serveurs");
define('back_to_game_servers', "Revenir aux Serveurs de Jeux");
define('user_id_main', "Propriétaire");
define('change_user_id_main', "Changer le propriétaire");
define('change_user_id_main_info', "Le propriétaire du serveur.");
define('server_ftp_password', "Mot de passe FTP");
define('change_ftp_password', "Changer le mot de passe FTP");
define('change_ftp_password_info', "Le mot de passe FTP pour ce serveur.");
define('Delete_old_user_assigned_homes', "Désassigner l'utilisateur du serveur.");
define('editing_home_called', "Editer le serveur nommé");
define('control_password_updated_successfully', "Mot de passe de contrôle mis à jour avec succès.");
define('control_password_update_failed', "Mise à jour du mot de passe de contrôle impossible");
define('successfully_changed_game_server', "Serveur de jeu modifié avec succès.");
define('error_ocurred_on_remote_server', "Erreur sur le serveur distant,");
define('ftp_password_can_not_be_changed', "le mot de passe FTP ne peut être changé.");
define('ftp_can_not_be_switched_on', "le FTP ne peut être activé.");
define('ftp_can_not_be_switched_off', "le FTP ne peut être désactivé.");
define('invalid_home_id_entered', "ID du serveur invalide.");
define('ip_port_already_in_use', "L'adresse %s:%s est déjà utilisée. Choisissez-en une autre.");
define('successfully_assigned_ip_port_to_server_id', "Adresse %s:%s assignée au serveur avec l'ID %s avec succès.");
define('no_ip_addresses_configured', "Votre serveur de jeu n'a aucune adresse IP configurée. Vous pouvez en configurer une depuis ");
define('server_page', "la page serveur");
define('successfully_removed_mod', "Mod du jeu supprimé avec succès.");
define('warning_agent_offline_defaulting_CPU_count_to_1', "Attention - L'Agent est hors ligne, CPU mis à 1.");
define('mod_install_cmds', "CMDs installation mod");
define('cmds_for', "Commandes pour");
define('preinstall_cmds', "Commandes de pré-installation");
define('postinstall_cmds', "Commandes de post-installation");
define('edit_preinstall_cmds', "Editer les commandes de pré-installation");
define('edit_postinstall_cmds', "Editer les commandes de post-installation");
define('save_as_default_for_this_mod', "Mettre par défaut à ce mod");
define('empty', "vide");
define('master_server_for_clon_update', "Serveur maître pour mises à jour locales");
define('set_as_master_server', "Définir comme serveur maître");
define('set_as_master_server_for_local_clon_update', "Définir comme serveur maître pour les mises à jour locales.");
define('only_available_for', "Seulement disponible pour '%s' hébergé sur le Serveur Distant '%s'.");
define('ftp_on', "Activer FTP");
define('ftp_off', "Désactiver FTP");
define('change_ftp_account_status', "Changer le statut du compte FTP");
define('change_ftp_account_status_info', "Une fois que le compte FTP est activé ou désactivé, il est ajouté ou supprimé de la base de données du serveur FTP.");
define('server_ftp_login', "Nom d'utilisateur du serveur FTP");
define('change_ftp_login_info', "Le nom d'utilisateur FTP pour ce serveur.");
define('change_ftp_login', "Changer le nom d&apos;utilisateur FTP");
define('ftp_login_can_not_be_changed', "Impossible de changer le nom d'utilisateur FTP.");
define('server_is_running_change_addresses_not_available', "Le serveur est démarré. L'IP ne peut donc pas être changée.");
define('change_game_type', "Changer le Type de Jeu");
define('change_game_type_info', "En changeant le Type de Jeu la configuration actuelle des mods va être supprimée.");
define('force_mod_on_this_address', "Forcer le mod sur cette adresse");
define('successfully_assigned_mod_to_address', "Mod assigné à cette adresse avec succès");
define('switch_mods', "Changer les mods");
define('switch_mod_for_address', "Changer le mod pour l'adresse %s");
define('invalid_path', "Chemin Invalide");
define('add_new_game_home', "Ajouter un nouveau serveur de jeu");
define('no_game_homes_found', "Aucun serveur de jeu trouvé");
define('available_game_homes', "Serveurs de jeux disponibles");
define('home_id', "ID Serveur");
define('game_server', "Serveur de Jeu");
define('game_type', "Type de Jeu");
define('game_home', "serveur de jeu");
define('game_home_name', "Nom du serveur de jeu");
define('clone', "Cloner");
define('unassign', "Désassigner");
define('access_rights', "Droits d'accès");
define('assigned_homes', "Serveurs déjà assignés");
define('assign', "Assigner");
define('allow_updates', "Autoriser les mises à jour");
define('allow_updates_info', "Autorise l'utilisateur à mettre à jour le serveur de jeu.");
define('allow_file_management', "Gestionnaire de Fichiers");
define('allow_file_management_info', "Donne l'accès à l'utilisateur au gestionnaire de fichiers.");
define('allow_parameter_usage', "Autoriser l'usage des Paramètres");
define('allow_parameter_usage_info', "Autorise l'utilisateur à changer les paramètres de la ligne de commande.");
define('allow_extra_params', "Autoriser les Paramètres Supplémentaires");
define('allow_extra_params_info', "Autorise l'utilisateur à modifier les paramètres supplémentaires de la ligne de commande.");
define('allow_ftp', "Autoriser le FTP");
define('allow_ftp_info', "Autorise l'utilisateur à accéder à son compte FTP et modifier ses informations.");
define('allow_custom_fields', "Autoriser les Champs Personnalisés");
define('allow_custom_fields_info', "Autorise l'utilisateur à accéder aux champs personnalisés pour le jeu s'il y en a.");
define('select_home', "Sélectionner un serveur à assigner");
define('assign_new_home_to_user', "Assigner un nouveau serveur à l'Utilisateur %s");
define('assign_new_home_to_group', "Assigner un nouveau serveur au Groupe %s");
define('assigned_home_to_user', "Serveur (ID %d) assigné à l'Utilisateur %s avec succès.");
define('assigned_home_to_group', "Serveur (ID %d) assigné au Groupe %s avec succès.");
define('unassigned_home_from_user', "Serveur (ID %d) désassigné de l'Utilisateur %s avec succès.");
define('unassigned_home_from_group', "Serveur (ID %d) désassigné du Groupe %s avec succès.");
define('no_homes_assigned_to_user', "Aucun serveur assigné à l'utilisateur %s.");
define('no_homes_assigned_to_group', "Aucun serveur assigné au groupe %s.");
define('no_more_homes_available_that_can_be_assigned_for_this_user', "Il n'y a plus de serveur disponible pour cet utilisateur");
define('no_more_homes_available_that_can_be_assigned_for_this_group', "Il n'y a plus de serveur disponible pour ce groupe");
define('you_can_add_a_new_game_server_from', "Vous pouvez ajouter un nouveau serveur de jeu depuis %s.");
define('no_remote_servers_available_please_add_at_least_one', "Il n'y a pas de serveur distant disponible, rajoutez-en au moins un!");
define('cloning_of_home_failed', "Clonage du serveur avec l'ID '%s' impossible.");
define('no_mods_to_clone', "Aucun mod activé pour ce jeu. Impossible de cloner.");
define('failed_to_add_mod', "Impossible de rajouter le mod avec l'ID '%s' au serveur avec l'ID '%s'.");
define('failed_to_update_mod_settings', "Impossible de mettre à jour les paramètres du mod pour le serveur avec l'ID '%s'.");
define('successfully_cloned_mods', "Mods clonés avec succès pour le serveur avec l'ID '%s'.");
define('successfully_copied_home_database', "Serveur copié avec succès.");
define('copying_home_remotely', "Copie du serveur sur le Serveur Distant de '%s' vers '%s'.");
define('cloning_home', "Clonage du serveur '%s'");
define('current_home_path', "Chemin du serveur actuel");
define('current_home_path_info', "L'emplacement actuel du serveur qui doit être copié sur le serveur distant.");
define('clone_home', "Cloner serveur");
define('new_home_name', "Nom du nouveau serveur");
define('new_home_path', "Chemin du nouveau serveur");
define('agent_ip', "IP de l'Agent");
define('game_server_copy_is_running', "Copie du serveur de jeu en cours...");
define('game_server_copy_was_successful', "Copie du serveur de jeu effectuée avec succès");
define('game_server_copy_failed_with_return_code', "Copie du serveur de jeu impossible. Erreur %s");
define('clone_mods', "Cloner les Mods");
define('game_server_owner', "Propriétaire du serveur de jeu");
define('the_name_of_the_server_to_help_users_to_identify_it', "Le nom du serveur pour aider les utilisateurs à l'identifier.");
define('ips_and_ports_used_in_this_home', "IPs et Ports utilisés pour ce serveur");
define('note_ips_and_ports_are_not_cloned', "Note - Les IPs et les Ports ne sont pas clonés");
define('mods_and_settings_for_this_game_server', "Les mods et les paramètres pour ce serveur de jeu");
define('sure_to_delete_serverid_from_remoteip_and_directory', "Etes-vous sûr de vouloir supprimer le serveur de jeu (ID: %s) du serveur %s et son répertoire %s");
define('yes_and_delete_the_files', "Oui et Supprimer tous les fichiers");
define('failed_to_remove_gamehome_from_database', "Impossible de supprimer le serveur de jeu de la base de données.");
define('successfully_deleted_game_server_with_id', "Serveur de jeu (ID: %s) supprimé avec succès.");
define('failed_to_remove_ftp_account_from_remote_server', "Impossible de supprimer le compte FTP sur le serveur distant.");
define('remove_it_anyway', "Voulez-vous le supprimer quand même?");
define('sucessfully_deleted', "%s supprimé avec succès");
define('the_agent_had_a_problem_deleting', "L'Agent a eu un problème en supprimant %s, vérifiez le log de l'Agent");
define('connection_timeout_or_problems_reaching_the_agent', "Timeout sur la connexion ou problèmes en se connectant à l'Agent");
define('does_not_exist_yet', "N'existe pas encore.");
define('go_to_custom_fields', "Aller aux Champs Personnalisés");
define('back_to_edit_server', "Retour à l'édition du serveur");
define('update_settings', "Enregistrer les paramètres");
define('settings_updated', "Paramètres mis à jour.");
define('selected_path_already_in_use', "Le chemin spécifié est déjà utilisé.");
define('browse', "Parcourir");
define('cancel', "Annuler");
define('set_this_path', "Choisir ce chemin");
define('select_home_path', "Sélectionner le chemin");
define('folder', "Dossier");
define('owner', "Propriétaire");
define('group', "Groupe");
define('level_up', "^ Dossier parent ^");
define('level_up_info', "Retour au dossier précédent.");
define('add_folder', "Créer un dossier");
define('add_folder_info', "Écrire le nom du nouveau dossier, puis cliquer sur l'icône.");
define('valid_user', "Veuillez spécifier un utilisateur valide.");
define('valid_group', "Veuillez spécifier un groupe valide.");
define('set_affinity', "Définir l'affinité du CPU");
define('cpu_affinity_info', "Sélectionnez le(s) cœur(s) de CPU à assigner au serveur de jeu.");
define('expiration_date_changed', "La date d&apos;expiration pour ce serveur a bien été changée.");
define('expiration_date_could_not_be_changed', "La date d&apos;expiration pour ce serveur n&apos;a pas pu être changée.");
define('search', "Rechercher");
?>