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

// add_game_home.php
$lang['add_new_game_home'] = "Ajouter un nouveau serveur de jeux";
$lang['add_mods_note'] = "Vous devez ajouter des mods après avoir assigné le serveur à un utilisateur. Cela peut être fait en éditant le serveur.";
$lang['game_server'] = "Serveur de jeux";
$lang['game_servers'] = "Serveurs de jeux";
$lang['game_type'] = "Jeu";
$lang['game_path'] = "Chemin du jeu";
$lang['game_path_info'] = "Le chemin absolu du serveur. Exemple: /home/ogp/my_server/";
$lang['game_server_name'] = "Nom du serveur de jeux";
$lang['game_server_name_info'] = "Le nom du serveur aide les utilisateurs à identifier leurs serveurs.";
$lang['control_password'] = "Mot de passe de contrôle";
$lang['control_password_info'] = "Ce mot de passe est utilisé pour le contrôle du serveur, comme le RCON. Si le mot de passe est vide, d'autres moyens seront utilisés.";
$lang['add_game_home'] = "Ajouter un serveur de jeux";
$lang['game_path_empty'] = "Le chemin du jeu ne peut être vide.";
$lang['game_home_added'] = "Serveur de jeux ajouté avec succès. Redirection vers la page d'édition du serveur.";
$lang['failed_to_add_home_to_db'] = "Impossible d'ajouter le serveur à la base de données. Erreur: %s";
$lang['caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms'] = "<b>Attention !</b> L'agent est hors ligne, impossible de connaître l'OS et l'architecture,<br> Voir les serveur pour toutes les plateformes :";
$lang['select_remote_server'] = "Sélectionner le serveur distant";
$lang['no_remote_servers_configured'] = "Aucun serveur distant configuré sous Open Game Panel.<br>Vous devez ajouter un serveur distant avant de pouvoir ajouer des serveurs de jeux.";
$lang['no_game_configurations_found'] = "Aucune configuration de jeux trouvée. Vous devez ajouter des configurations depuis la";
$lang['game_configurations'] = "page de configuration du jeu";
$lang['add_remote_server'] = "Ajouter un serveur.";
$lang['wine_games'] = "Jeux sous WINE";
$lang[''] = "";
$lang[''] = "";

// edit_games.php
$lang['home_path'] = "Chemin du serveur";
$lang['change_home_info'] = "L'emplacement du serveur de jeux installé. Exemple: /home/ogp/my_server/";
$lang['game_server_name'] = "Nom du serveur de jeux";
$lang['change_name_info'] = "Le nom du serveur pour aider les utilisateurs à l'identifier.";
$lang['game_control_password'] = "Mot de passe de contrôle du jeu";
$lang['change_control_password_info'] = "Le mot de passe de contrôle est par exemple le RCON.";
$lang['available_mods'] = "Mods disponibles";
$lang['note_no_mods'] = "Aucun mods disponible pour ce jeu.";
$lang['change_home'] = "Changer chemin";
$lang['change_control_password'] = "Changer le mot de passe de contrôle";
$lang['change_name'] = "Changer le nom";
$lang['add_mod'] = "Ajouter un mod";
$lang['set_ip'] = "Définir IP";
$lang['ips_and_ports'] = "IPs et ports";
$lang['mod_name'] = "Nom du mod";
$lang['max_players'] = "Joueurs max";
$lang['extra_cmd_line_args'] = "Arguments supplémentaires";
$lang['extra_cmd_line_info'] = "Les arguments supplémentaires de la ligne de commande permettent de rajouter des arguments à la ligne de commande de démarrage.";
$lang['cpu_affinity'] = "Affinité CPU";
$lang['nice_level'] = "Niveau de priorité (nice)";
$lang['set_options'] = "Définir les options";
$lang['remove_mod'] = "Supprimer le mod";
$lang['mods'] = "Mods";
$lang['ip'] = "IP";
$lang['port'] = "Port";
$lang['no_ip_ports_assigned'] = "Au moins une IP:port doit être assignée au serveur.";
$lang['successfully_assigned_ip_port'] = "IP:Port assigné au serveur.";
$lang['port_range_error'] = "Le port doit être compris entre 0 et 65535.";
$lang['failed_to_assing_mod_to_home'] = "Impossible d'assigner le mod id %d au serveur.";
$lang['successfully_assigned_mod_to_home'] = "Mod id %d assigné au serveur avec succès.";
$lang['successfully_modified_mod'] = "Informations du mod modifiées avec succès.";
$lang['back_to_game_monitor'] = "Revenir à la Gestion des serveurs";
$lang['back_to_game_servers'] = "Revenir aux serveurs de jeux";
$lang['user_id_main'] = "Propriétaire";
$lang['change_user_id_main'] = "Changer le propriétaire";
$lang['change_user_id_main_info'] = "Le propriétaire du serveur.";
$lang['server_ftp_password'] = "Mot de passe FTP";
$lang['change_ftp_password'] = "Changer le mot de passe FTP";
$lang['change_ftp_password_info'] = "Le mot de passe FTP pour ce serveur.";
$lang['Delete_old_user_assigned_homes'] = "Enlever l'utilisateur du serveur.";
$lang['editing_home_called'] = "Editer le serveur";
$lang['control_password_updated_successfully'] = "Mot de passe de contrôle mis à jour avec succès.";
$lang['control_password_update_failed'] = "Mise à jour du mot de passe de contrôle impossible";
$lang['successfully_changed_game_server'] = "Serveur de jeux modifié avec succès.";
$lang['error_ocurred_on_remote_server'] = "Erreur sur le serveur distant,";
$lang['ftp_password_can_not_be_changed'] = "le mot de passe FTP ne peut être changé.";
$lang['ftp_can_not_be_switched_on'] = "le FTP ne peut être activé.";
$lang['ftp_can_not_be_switched_off'] = "le FTP ne peut être désactivé.";
$lang['invalid_home_id_entered'] = "ID du serveur est invalide.";
$lang['ip_port_already_in_use'] = "L'adresse %s:%s est déjà utilisée. Choisissez-en une autre.";
$lang['successfully_assigned_ip_port_to_server_id'] = "Adresse %s:%s assigné au serveur ID %s avec succès.";
$lang['no_ip_addresses_configured'] = "Votre serveur de jeu n'a aucune adresse IP configurée. Vous pouvez en configurer une depuis ";
$lang['server_page'] = "la page serveur";
$lang['successfully_removed_mod'] = "Mod du jeu supprimé avec succès.";
$lang['warning_agent_offline_defaulting_CPU_count_to_1'] = "Attention - L'agent est hors ligne, CPU mis à 1.";
$lang['mod_install_cmds'] = "CMDs installation mod";
$lang['cmds_for'] = "Commandes pour";
$lang['preinstall_cmds'] = "Commandes de pré-installation";
$lang['postinstall_cmds'] = "Commandes de post-installation";
$lang['edit_preinstall_cmds'] = "Editer les commandes de pré-installation";
$lang['edit_postinstall_cmds'] = "Editer les commandes de post-installation";
$lang['save_as_default_for_this_mod'] = "Mettre par défaut à ce mod";
$lang['empty'] = "vide";
$lang['master_server_for_clon_update'] = "Serveur maître pour les mises à jour locales";
$lang['set_as_master_server'] = "Définir comme serveur maître";
$lang['set_as_master_server_for_local_clon_update'] = "Définir comme serveur maître pour les mises à jour locales.";
$lang['only_available_for'] = "Seulement disponible pour '%s' hébergé sur le serveur distant '%s'.";
$lang['ftp_on'] = "Activer FTP";
$lang['ftp_off'] = "Désactiver FTP";
$lang['change_ftp_account_status'] = "Changer le statut du compte FTP";
$lang['change_ftp_account_status_info'] = "Une fois que le compte FTP est activé ou désactivé, il est ajouté ou supprimé de la base de données PureFTPd.";
$lang['server_ftp_login'] = "Nom d'utilisateur du serveur FTP";
$lang['change_ftp_login_info'] = "Changer le nom d'utilisateur du FTP.";
$lang['change_ftp_login'] = "Changer le nom d'utilisateur FTP";
$lang['ftp_login_can_not_be_changed'] = "Impossible de changer le nom d'utilisateur FTP.";
$lang['server_is_running_change_addresses_not_available'] = "Le serveur est démarré. L'IP ne peut donc pas être changée.";
$lang['change_game_type'] = "Change Game Type";
$lang['change_game_type_info'] = "By changing the game type the current the mods configuration will be deleted.";
$lang['force_mod_on_this_address'] = "Force mod on this address";
$lang['successfully_assigned_mod_to_address'] = "Successfully assigned mod to address";
$lang['switch_mods'] = "Switch mods";
$lang['switch_mod_for_address'] = "Switch mod for address %s";
$lang[''] = "";

// show_games.php
$lang['add_new_game_home'] = "Ajouter un nouveau serveur de jeux";
$lang['no_game_homes_found'] = "Aucun serveur de jeux trouvé";
$lang['available_game_homes'] = "Serveurs de jeux disponibles";
$lang['home_id'] = "ID Serveur";
$lang['game_server'] = "Serveur de jeux";
$lang['game_type'] = "Type de jeu";
$lang['game_home'] = "serveur de jeux";
$lang['game_home_name'] = "Nom du serveur de jeux";
$lang['actions'] = "Actions";
$lang['edit'] = "Editer";
$lang['clone'] = "Cloner";

// assign_games.php
$lang['unassign'] = "Désassigner";
$lang['access_rights'] = "Droits d'accès";
$lang['assigned_homes'] = "Serveurs déjà assignés";
$lang['assign'] = "Assigner";
$lang['allow_updates'] = "Autoriser les mises à jour";
$lang['allow_updates_info'] = "Autorise l'utilisateur à mettre à jour le serveur de jeux.";
$lang['allow_file_management'] = "Gestionnaire de fichiers";
$lang['allow_file_management_info'] = "Donne l'accès à l'utilisateur au gestionnaire de fichiers.";
$lang['allow_parameter_usage'] = "Autoriser l'usage des paramètres";
$lang['allow_parameter_usage_info'] = "Autorise l'utilisateur à changer les paramètres de la ligne de commande.";
$lang['allow_extra_params'] = "Autoriser les paramètres supplémentaires";
$lang['allow_extra_params_info'] = "Autorise l'utilisateur à modifier les paramètres supplémentaires de la ligne de commande.";
$lang['allow_ftp'] = "Autoriser le FTP";
$lang['allow_ftp_info'] = "Autorise l'utilisateur à accéder à son cmpte FTP et modifier ses informations.";
$lang['allow_custom_fields'] = "Allow Custom Fields";
$lang['allow_custom_fields_info'] = "Allows user to access custom fields of the game server if any.";
$lang['select_home'] = "Sélectionner un serveur à assigner";
$lang['assign_new_home_to_user'] = "Assigner un nouveau serveur à l'utilisateur %s";
$lang['assign_new_home_to_group'] = "Assigner un nouveau serveur au groupe %s";
$lang['assigned_home_to_user'] = "Serveur (ID %d) assigné à l'utilisateur %s avec succès.";
$lang['assigned_home_to_group'] = "Serveur (ID %d) assigné au groupe %s avec succès.";
$lang['unassigned_home_from_user'] = "Serveur (ID %d) désassigné de l'utilisateur %s avec succès.";
$lang['unassigned_home_from_group'] = "Serveur (ID %d) désassigné du groupe %s avec succès.";
$lang['no_homes_assigned_to_user'] = "Aucun serveur assigné à l'utilisateur %s.";
$lang['no_homes_assigned_to_group'] = "Aucun serveur assigné au groupe %s.";
$lang['no_more_homes_available_that_can_be_assigned_for_this_user'] = "Il n'y a plus de serveur disponible pour cet utilisateur";
$lang['no_more_homes_available_that_can_be_assigned_for_this_group'] = "Il n'y a plus de serveur disponible pour cet utilisateur";
$lang['you_can_add_a_new_game_server_from'] = "Vous pouvez ajouter un nouveau serveur de jeux depuis %s.";
$lang['no_remote_servers_available_please_add_at_least_one'] = "Il n'y a pas de serveur distant disponible, rajoutez-en au moins un !";
$lang[''] = "";
$lang[''] = "";


// clone_home.php
$lang['cloning_of_home_failed'] = "Clonage du serveur id '%s' impossible.";
$lang['no_mods_to_clone'] = "Aucun mod activé pour ce jeu. Impossible de cloner.";
$lang['failed_to_add_mod'] = "Impossible de rajouter le mod id '%s' au serveur id '%s'.";
$lang['failed_to_update_mod_settings'] = "Impossible de mettre à jour les paramètres du mod pour le serveur id '%s'.";
$lang['successfully_cloned_mods'] = "Mod cloné avec succès pour le serveur id '%s'.";
$lang['successfully_copied_home_database'] = "Serveur copié avec succès.";
$lang['copying_home_remotely'] = "Copie du serveur sur le serveur distant de '%s' vers '%s'.";
$lang['cloning_home'] = "Cloange du serveur '%s'";
$lang['current_home_path'] = "Chemin du serveur actuel";
$lang['current_home_path_info'] = "L'emplacement actuel du serveur qui doit être copié sur le serveur distant.";
$lang['clone_home'] = "Cloner serveur";
$lang['new_home_name'] = "Nom du nouveau serveur";
$lang['new_home_path'] = "Chemin du nouveau serveur";
$lang['agent_ip'] = "IP de l'agent";
$lang['game_server_copy_is_running'] = "Copie du serveur de jeux en cours...";
$lang['game_server_copy_was_successful'] = "Copie du serveur de jeux effectuée avec succès";
$lang['game_server_copy_failed_with_return_code'] = "Copie du serveur de jeux impossible. Erreur %s";
$lang['clone_mods'] = "Cloner mods";
$lang['game_server_owner'] = "Propriétaire du serveur de jeux";
$lang['the_name_of_the_server_to_help_users_to_identify_it'] = "Le nom du serveur pour aider les utilisateurs à l'identifier.";
$lang['ips_and_ports_used_in_this_home'] = "IPs et Ports utilisés pour ce serveur";
$lang['note_ips_and_ports_are_not_cloned'] = "Note - Les IPs et les ports ne sont pas clonés";
$lang['mods_and_settings_for_this_game_server'] = "Les mods et les paramètres pour ce serveur de jeux";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";
$lang[''] = "";

// del_home.php

$lang['sure_to_delete_serverid_from_remoteip_and_directory'] = "Etes-vous sûr de vouloir supprimer le serveur de jeux (ID : %s) du serveur %s et son répertoire %s";
$lang['yes_and_delete_the_files'] = "Oui et supprimer tous les fichiers";
$lang['failed_to_remove_gamehome_from_database'] = "Impossible de supprimer le serveur de jeux de la base de données.";
$lang['successfully_deleted_game_server_with_id'] = "Serveur de jeux (ID : %s) supprimé avec succès.";
$lang['failed_to_remove_ftp_account_from_remote_server'] = "Impossible de supprimer le compte FTP sur le serveur distant.";
$lang['remove_it_anyway'] = "Voulez-vous le supprimer quand même ?";
$lang['successfully_deleted_game_server_with_id'] = "Serveur de jeux id %s supprimé avec succès.";
$lang['sucessfully_deleted'] = "%s supprimé avec succès";
$lang['the_agent_had_a_problem_deleting'] = "L'agent a eu un problème en supprimant %s, vérifiez le log de l'agent";
$lang['connection_timeout_or_problems_reaching_the_agent'] = "Timeout sur la connexion ou problèmes en se connectant à l'agent";
$lang[''] = "";
$lang[''] = "";

// get_size.php
$lang['does_not_exist_yet'] = "Does not exist yet.";

// Custom fields
$lang['go_to_custom_fields'] = "Go to Custom Fields";
$lang['back_to_edit_server'] = "Back to edit server";
$lang['update_settings'] = "Update settings";
$lang['settings_updated'] = "Settings updated.";
?>
