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

define('OGP_LANG_no_games_to_monitor', "Vous n'avez aucun serveur de jeu à administrer.");
define('OGP_LANG_status', "Statut");
define('OGP_LANG_fail_no_mods', "Aucun mod activé pour ce jeu! Vous devez demander à votre Administrateur de rajouter un/des mod(s) pour ce jeu.");
define('OGP_LANG_no_game_homes_assigned', "Vous n'avez aucun serveur affecté à votre compte.");
define('OGP_LANG_select_game_home_to_configure', "Sélectionnez un serveur de jeu à configurer");
define('OGP_LANG_file_manager', "Gestionnaire de Fichiers");
define('OGP_LANG_configure_mods', "Configurer les mods");
define('OGP_LANG_install_update_steam', "Installation/Mise à jour via Steam");
define('OGP_LANG_install_update_manual', "Installation/Mise à jour manuelle");
define('OGP_LANG_assign_game_homes', "Assigner des serveurs de jeux");
define('OGP_LANG_user', "Utilisateur");
define('OGP_LANG_group', "Groupe");
define('OGP_LANG_start', "Démarrer");
define('OGP_LANG_ogp_agent_ip', "IP de l'Agent OGP");
define('OGP_LANG_max_players', "Joueurs max");
define('OGP_LANG_max', "Max");
define('OGP_LANG_ip_and_port', "IP et Port");
define('OGP_LANG_available_maps', "Cartes disponibles");
define('OGP_LANG_map_path', "Chemin vers les cartes");
define('OGP_LANG_available_parameters', "Paramètres disponibles");
define('OGP_LANG_start_server', "Démarrer le serveur");
define('OGP_LANG_start_wait_note', "Le démarrage du serveur peut prendre du temps. Veuillez patienter sans fermer votre navigateur.");
define('OGP_LANG_game_type', "Type de Jeu");
define('OGP_LANG_map', "Carte");
define('OGP_LANG_starting_server', "Démarrage du serveur, veuillez patienter...");
define('OGP_LANG_starting_server_settings', "Démarrage du serveur avec les paramètres suivants");
define('OGP_LANG_startup_params', "Paramètres de démarrage");
define('OGP_LANG_startup_cpu', "CPU assigné au serveur de jeu");
define('OGP_LANG_startup_nice', "Priorité (niceness) assignée au serveur de jeu");
define('OGP_LANG_game_home', "Chemin du serveur");
define('OGP_LANG_server_started', "Serveur démarré avec succès.");
define('OGP_LANG_no_parameter_access', "Vous n'avez pas accès aux paramètres.");
define('OGP_LANG_extra_parameters', "Paramètres Supplémentaires");
define('OGP_LANG_no_extra_param_access', "Vous n'avez pas accès aux Paramètres Supplémentaires.");
define('OGP_LANG_extra_parameters_info', "Ces paramètres sont placés à la fin de la ligne de commande lorsque le jeu est lancé.");
define('OGP_LANG_game_exec_not_found', "L'exécutable de jeu %s n'a pas été trouvé sur le serveur distant.");
define('OGP_LANG_select_params_and_start', "Sélectionnez les paramètres de démarrage pour le serveur et appuyez sur '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Pas d'IP et Port attribués pour ce serveur. Si vous ne pouvez pas les définir, contactez l'Administrateur.");
define('OGP_LANG_unable_to_get_log', "Impossible d'obtenir le log, valeur de retour %s.");
define('OGP_LANG_server_binary_not_executable', "Le binaire du serveur n'est pas exécutable. Vérifiez que vous disposez des bonnes permissions sur le répertoire.");
define('OGP_LANG_server_not_running_log_found', "Le serveur ne démarre pas, mais il existe un log. NOTE: Ce log pourrait ne pas être lié à ce démarrage.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT ne vous appartient pas.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nombre de joueurs max impossible. Au dessus de la limite définie.");
define('OGP_LANG_server_running_not_responding', "Le serveur est démarré mais ne répond pas, <br>il pourrait y avoir un problème et vous voudrez peut-être ");
define('OGP_LANG_update_started', "Mise à jour démarrée, veuillez patienter...");
define('OGP_LANG_failed_to_start_steam_update', "Impossible de démarrer la mise à jour via Steam. Regardez le log de l'Agent.");
define('OGP_LANG_failed_to_start_rsync_update', "Impossible de démarrer la mise à jour via Rsync. Regardez le log de l'Agent.");
define('OGP_LANG_update_completed', "Mise à jour effectuée avec succès.");
define('OGP_LANG_update_in_progress', "Mise à jour en cours, veuillez patienter...");
define('OGP_LANG_refresh_steam_status', "Actualiser l'état de Steam");
define('OGP_LANG_refresh_rsync_status', "Rafraîchir le statut Rsync");
define('OGP_LANG_server_running_cant_update', "Serveur démarré donc mise à jour impossible. Stoppez le serveur avant la mise à jour.");
define('OGP_LANG_xml_steam_error', "Le type de serveur sélectionné ne supporte pas l'installation ou la mise à jour via Steam.");
define('OGP_LANG_mod_key_not_found_from_xml', "Clé du mod '%s' non trouvée dans le fichier XML.");
define('OGP_LANG_stop_update', "Arrêter la mise à jour");
define('OGP_LANG_statistics', "Statistiques");
define('OGP_LANG_servers', "Serveurs");
define('OGP_LANG_players', "Joueurs");
define('OGP_LANG_current_map', "Carte actuelle");
define('OGP_LANG_stop_server', "Arrêter le serveur");
define('OGP_LANG_server_ip_port', "Serveur IP:Port");
define('OGP_LANG_server_name', "Nom du serveur");
define('OGP_LANG_server_id', "ID du Serveur");
define('OGP_LANG_player_name', "Nom du joueur");
define('OGP_LANG_score', "Score");
define('OGP_LANG_time', "Temps");
define('OGP_LANG_no_rights_to_stop_server', "Vous n'avez pas les droits pour arrêter ce serveur.");
define('OGP_LANG_no_ogp_lgsl_support', "Ce serveur (sous: %s) n'a pas de support LGSL dans OGP et ses statistiques ne peuvent pas être affichées.");
define('OGP_LANG_server_status', "Serveur sur %s est %s.");
define('OGP_LANG_server_stopped', "Serveur '%s' a été arrêté.");
define('OGP_LANG_if_want_to_start_homes', "Si vous voulez démarrer un serveur, allez sur %s.");
define('OGP_LANG_view_log', "Logs");
define('OGP_LANG_if_want_manage', "Si vous voulez gérer vos jeux, vous pouvez le faire dans les");
define('OGP_LANG_columns', "colonnes");
define('OGP_LANG_group_users', "Groupe:");
define('OGP_LANG_assigned_to', "Attribué à:");
define('OGP_LANG_restart_server', "Relancer le serveur");
define('OGP_LANG_restarting_server', "Redémarrage du serveur, veuillez patienter...");
define('OGP_LANG_server_restarted', "Serveur '%s' a été redémarré.");
define('OGP_LANG_server_not_running', "Ce serveur n'est pas démarré.");
define('OGP_LANG_address', "Adresse");
define('OGP_LANG_owner', "Propriétaire");
define('OGP_LANG_operations', "Opérations");
define('OGP_LANG_search', "Rechercher");
define('OGP_LANG_maps_read_from', "Cartes lues depuis ");
define('OGP_LANG_file', "Fichier");
define('OGP_LANG_folder', "Dossier");
define('OGP_LANG_unable_retrieve_mod_info', "Impossible de trouver les informations du mod dans la base de données.");
define('OGP_LANG_unexpected_result_libremote', "Résultats inatendue de la libremote, informez-en les développeurs.");
define('OGP_LANG_unable_get_info', "Impossible de récupérer les informations pour le démarrage. Démarrage annulé.");
define('OGP_LANG_server_already_running', "Le serveur est déjà démarré. Si vous ne le voyez pas sur la Gestion des Serveurs, il doit y avoir un problème et vous pouvez ");
define('OGP_LANG_already_running_stop_server', "Arrêter le serveur.");
define('OGP_LANG_error_server_already_running', "ERREUR: Un serveur est déjà démarré avec ce port");
define('OGP_LANG_failed_start_server_code', "Échec du démarrage du serveur. Code d'erreur: %s");
define('OGP_LANG_disabled', "désactivé ");
define('OGP_LANG_not_found_server', "Impossible de trouver le serveur distant avec l'ID");
define('OGP_LANG_rcon_command_title', "Commande RCON");
define('OGP_LANG_has_sent_to', "a été envoyée à");
define('OGP_LANG_need_set_remote_pass', "Vous devez rentrer le mot de passe");
define('OGP_LANG_before_sending_rcon_com', "avant d'envoyer des commandes RCON.");
define('OGP_LANG_retry', "Réessayer");
define('OGP_LANG_page', "page");
define('OGP_LANG_server_cant_start', "Le serveur ne peut pas démarrer");
define('OGP_LANG_server_cant_stop', "Le serveur ne peut pas s'arrêter");
define('OGP_LANG_error_occured_remote_host', "Une erreur s'est produite sur l'hôte distant");
define('OGP_LANG_follow_server_status', "Vous pouvez suivre le statut du serveur depuis");
define('OGP_LANG_addons', "Addons");
define('OGP_LANG_hostname', "Nom d'hôte");
define('OGP_LANG_rsync_install', "[Installation Rsync]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Equipe");
define('OGP_LANG_deaths', "Morts");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skill");
define('OGP_LANG_AIBot', "Bot IA");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Joueur");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "RCON prédéfinis");
define('OGP_LANG_update_from_local_master_server', "Mettre à jour à partir du Serveur Maitre local");
define('OGP_LANG_update_from_selected_rsync_server', "Mettre à jour à partir du serveur Rsync sélectionné");
define('OGP_LANG_execute_selected_server_operations', "Exécuter les opérations sélectionnées sur les serveurs");
define('OGP_LANG_execute_operations', "Exécuter les opérations");
define('OGP_LANG_account_expiration', "Expiration du compte");
define('OGP_LANG_mysql_databases', "Base de données MySQL");
define('OGP_LANG_failed_querying_server', "* Impossible d'interroger le serveur.");
define('OGP_LANG_query_protocol_not_supported', "* Il n’existe aucun protocole de requête dans OGP pouvant prendre en charge ce serveur.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Interrogations désactivées dans les paramètres: Désactiver interrogation après: %s, et vous avez %s serveurs.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON prédéfinis pour %s et mod %s");
define('OGP_LANG_name', "Nom");
define('OGP_LANG_command', "Commande&nbsp;RCON");
define('OGP_LANG_add_preset', "Ajouter un prédéfini");
define('OGP_LANG_edit_presets', "Editer les prédéfinis");
define('OGP_LANG_del_preset', "Supprimer");
define('OGP_LANG_change_preset', "Editer");
define('OGP_LANG_send_command', "Envoyer la commande");
define('OGP_LANG_starting_copy_with_master_server_named', "Démarrage de la copie avec le serveur maître '%s'...");
define('OGP_LANG_starting_sync_with', "Démarrage de la synchro avec %s...");
define('OGP_LANG_refresh_interval', "Intervalle de rafraîchissement des logs");
define('OGP_LANG_finished_manual_update', "Mise à jour manuelle terminée.");
define('OGP_LANG_failed_to_start_file_download', "Impossible de démarrer le téléchargement.");
define('OGP_LANG_game_name', "Nom du jeu");
define('OGP_LANG_dest_dir', "Dossier de destination");
define('OGP_LANG_remote_server', "Serveur Distant");
define('OGP_LANG_file_url', "URL du fichier");
define('OGP_LANG_file_url_info', "L'URL du fichier qui va être téléchargé et décompressé dans le dossier.");
define('OGP_LANG_dest_filename', "Nom du fichier de destination");
define('OGP_LANG_dest_filename_info', "Le nom du fichier pour le fichier de destination.");
define('OGP_LANG_update_server', "Mise à jour du serveur");
define('OGP_LANG_unavailable', "Indisponible");
define('OGP_LANG_upload_map_image', "Image de carte");
define('OGP_LANG_upload_image', "Uploader une image");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "L&apos;image doit être au format jpg, gif ou png et faire moins de 1 MO.");
define('OGP_LANG_check_dev_console', "Erreur lors de léapos;envoi du fichier, vérifier la console dévelopeur du navigateur.");
define('OGP_LANG_uploaded_successfully', "Uploadé avec succès.");
define('OGP_LANG_cant_create_folder', "Impossible de créer le dossier:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Impossible d&apos;écrire le fichier:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Dépassement des directives PHP.<br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Erreurs inconnues.");
define('OGP_LANG_directory', "Directory");
define('OGP_LANG_view_player_commands', "Voir Commandes Joueur");
define('OGP_LANG_hide_player_commands', "Cacher Commandes Joueur");
define('OGP_LANG_no_online_players', "Il n'y a pas de joueurs en ligne.");
define('OGP_LANG_invalid_game_mod_id', "ID de Jeu/Mod spécifié invalide.");
define('OGP_LANG_auto_update_title_popup', "Lien de Mise à Jour Steam Automatique");
define('OGP_LANG_auto_update_popup_html', "<p>Veuillez utiliser le lien suivant pour vérifier et mettre à jour automatiquement le serveur de jeu par Steam si besoin.&nbsp; Vous pouvez l&apos;utiliser avec un cronjob ou initier manuellement le processus.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Sélectionner une action que vous voulez que l&apos;API exécute pour ce serveur de jeu.&nbsp; Ensuite, utiliser le lien pour mettre à exécution l&apos;action. &nbsp; Vous pouvez exécuter l&apos;action voulue en utilisant un cronjob ou en faisant appel directement au lien.</p>");
define('OGP_LANG_auto_update_copy_me', "Copier");
define('OGP_LANG_auto_update_copy_me_success', "Copié!");
define('OGP_LANG_auto_update_copy_me_fail', "Erreur de copie. Veuillez copier le lien manuellement.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Lien de Mise à Jour");
define('OGP_LANG_show_api_actions', "Voir les Actions de l&apos;API");
define('OGP_LANG_api_links', "Liens de l'API");
define('OGP_LANG_update_attempt_from_nonmaster_server', "L'utilisateur %s a tenté une mise à jour sur le serveur avec le home_id %d à partir d'une serveur non maître. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Vous tentez de mettre à jour ce serveur à partir d'un serveur non maître.");
define('OGP_LANG_cannot_update_from_own_self', "La mise à jour à partir du Serveur Maître local ne peut s'effectuer sur un Serveur Maître.");
define('OGP_LANG_show_server_id', "Voir les IDs des Serveurs");
define('OGP_LANG_hide_server_id', "Cacher les IDs des Serveurs");
define('OGP_LANG_edit_configuration_files', "Editer les Fichiers de Configuration");
define('OGP_LANG_admin', "Admin");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Phantom");
define('OGP_LANG_sec', "Seconds");
define('OGP_LANG_unknown_rsync_mirror', "Vous avez tenté de faire une mise à jour à partir d'un miroir qui n'existe pas.");
define('OGP_LANG_custom_fields', "Champs Personnalisés");
?>
