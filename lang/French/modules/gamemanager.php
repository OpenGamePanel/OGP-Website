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

define('game_manager', "Game Manager");
define('no_games_to_monitor', "Vous n'avez aucun serveur de jeu à administrer.");
define('status', "Statut");
define('fail_no_mods', "Aucun mod activé pour ce jeu! Vous devez demander à votre Administrateur de rajouter un/des mod(s) pour ce jeu.");
define('no_game_homes_assigned', "Aucun serveur de jeu ne vous est assigné. Vous devez demander à votre Administrateur de vous en assigner un.");
define('select_game_home_to_configure', "Sélectionnez un serveur de jeu à configurer");
define('file_manager', "Gestionnaire de Fichiers");
define('configure_mods', "Configurer les mods");
define('install_update_steam', "Installation/Mise à jour via Steam");
define('install_update_manual', "Installation/Mise à jour manuelle");
define('assign_game_homes', "Assigner des serveurs de jeux");
define('user', "Utilisateur");
define('group', "Groupe");
define('start', "Démarrer");
define('ogp_agent_ip', "IP de l'Agent OGP");
define('max_players', "Joueurs max");
define('max', "Max");
define('ip_and_port', "IP et Port");
define('available_maps', "Cartes disponibles");
define('map_path', "Chemin vers les cartes");
define('available_parameters', "Paramètres disponibles");
define('start_server', "Démarrer");
define('start_wait_note', "Le démarrage du serveur peut prendre du temps. Veuillez patienter sans fermer votre navigateur.");
define('game_type', "Type de Jeu");
define('map', "Carte");
define('starting_server', "Démarrage du serveur, veuillez patienter...");
define('starting_server_settings', "Démarrage du serveur avec les paramètres suivants");
define('startup_params', "Paramètres de démarrage");
define('startup_cpu', "CPU assigné au serveur de jeu");
define('startup_nice', "Priorité (nice) assignée au serveur de jeu");
define('game_home', "Chemin du serveur");
define('server_started', "Serveur démarré avec succès.");
define('no_parameter_access', "Vous n'avez pas accès aux paramètres.");
define('extra_parameters', "Paramètres Supplémentaires");
define('no_extra_param_access', "Vous n'avez pas accès aux Paramètres Supplémentaires.");
define('extra_parameters_info', "Ces paramètres sont placés à la fin de la ligne de commande lorsque le jeu est lancé.");
define('game_exec_not_found', "L'exécutable de jeu %s n'a pas été trouvé sur le serveur distant.");
define('select_params_and_start', "Sélectionnez les paramètres de démarrage pour le serveur et appuyez sur '%s'.");
define('no_ip_port_pairs_assigned', "Pas d'IP et Port attribués pour ce serveur. Si vous ne pouvez pas les définir, contactez l'Administrateur.");
define('unable_to_get_log', "Impossible d'obtenir le log, valeur de retour %s.");
define('server_binary_not_executable', "Le binaire du serveur n'est pas exécutable. Vérifiez que vous disposez des bonnes permissions sur le répertoire.");
define('server_not_running_log_found', "Le serveur ne démarre pas, mais il existe un log. NOTE: Ce log pourrait ne pas être lié à ce démarrage.");
define('ip_port_pair_not_owned', "IP:PORT ne vous appartient pas.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nombre de joueurs max impossible. Au dessus de la limite définie.");
define('server_running_not_responding', "Le serveur est démarré mais ne répond pas, <br>il pourrait y avoir un problème et vous voudrez peut-être ");
define('update_started', "Mise à jour démarrée, veuillez patienter...");
define('failed_to_start_steam_update', "Impossible de démarrer la mise à jour via Steam. Regardez le log de l'Agent.");
define('failed_to_start_rsync_update', "Impossible de démarrer la mise à jour via Rsync. Regardez le log de l'Agent.");
define('update_completed', "Mise à jour effectuée avec succès.");
define('update_in_progress', "Mise à jour en cours, veuillez patienter...");
define('refresh_steam_status', "Rafraîchir le statut Steam");
define('refresh_rsync_status', "Refraîchir le statut Rsync");
define('server_running_cant_update', "Serveur démarré donc mise à jour impossible. Stoppez le serveur avant la mise à jour.");
define('xml_steam_error', "Le type de serveur sélectionné ne supporte pas l'installation ou la mise à jour via Steam.");
define('mod_key_not_found_from_xml', "Clé du mod '%s' non trouvée dans le fichier XML.");
define('stop_update', "Arrêter la mise à jour");
define('statistics', "Statistiques");
define('servers', "Serveurs");
define('players', "Joueurs");
define('current_map', "Carte actuelle");
define('stop_server', "Arrêter le serveur");
define('server_ip_port', "Serveur IP:Port");
define('server_name', "Nom du serveur");
define('server_id', "ID du Serveur");
define('player_name', "Nom du joueur");
define('score', "Score");
define('time', "Temps");
define('no_rights_to_stop_server', "Vous n'avez pas les droits pour arrêter ce serveur.");
define('no_ogp_lgsl_support', "Ce serveur (sous: %s) n'a pas de support LGSL dans OGP et ses statistiques ne peuvent pas être affichées.");
define('server_status', "Serveur sur %s est %s.");
define('server_stopped', "Serveur '%s' a été arrêté.");
define('if_want_to_start_homes', "Si vous voulez démarrer un serveur, allez sur %s.");
define('view_log', "Logs");
define('if_want_manage', "Si vous voulez gérer vos jeux, vous pouvez le faire dans les");
define('columns', "colonnes");
define('group_users', "Groupe:");
define('assigned_to', "Attribué à:");
define('restart_server', "Relancer le serveur");
define('restarting_server', "Redémarrage du serveur, veuillez patienter...");
define('server_restarted', "Serveur '%s' a été redémarré.");
define('server_not_running', "Ce serveur n'est pas démarré.");
define('address', "Adresse");
define('owner', "Propriétaire");
define('operations', "Opérations");
define('search', "Rechercher");
define('maps_read_from', "Cartes lues depuis ");
define('file', "Fichier");
define('folder', "Dossier");
define('unable_retrieve_mod_info', "Impossible de trouver les informations du mod dans la base de données.");
define('unexpected_result_libremote', "Résultats inatendue de la libremote, informez-en les développeurs.");
define('unable_get_info', "Impossible de récupérer les informations pour le démarrage. Démarrage annulé.");
define('server_already_running', "Le serveur est déjà démarré. Si vous ne le voyez pas sur la Gestion des Serveurs, il doit y avoir un problème et vous pouvez ");
define('already_running_stop_server', "Arrêter le serveur.");
define('error_server_already_running', "ERREUR: Un serveur est déjà démarré avec ce port");
define('failed_start_server_code', "Échec du démarrage du serveur. Code d'erreur: %s");
define('disabled', "désactivé ");
define('not_found_server', "Impossible de trouver le serveur distant avec l'ID");
define('rcon_command_title', "Commande RCON");
define('has_sent_to', "a été envoyée à");
define('need_set_remote_pass', "Vous devez rentrer le mot de passe");
define('before_sending_rcon_com', "avant d'envoyer des commandes RCON.");
define('retry', "Réessayer");
define('page', "page");
define('server_cant_start', "Le serveur ne peut pas démarrer");
define('server_cant_stop', "Le serveur ne peut pas s'arrêter");
define('error_occured_remote_host', "Une erreur s'est produite sur l'hôte distant");
define('follow_server_status', "Vous pouvez suivre le statut du serveur depuis");
define('addons', "Addons");
define('hostname', "Nom d'hôte");
define('rsync_install', "[Installation Rsync]");
define('ping', "Ping");
define('team', "Equipe");
define('deaths', "Morts");
define('pid', "PID");
define('skill', "Skill");
define('AIBot', "Bot IA");
define('steamid', "Steam ID");
define('player', "Joueur");
define('port', "Port");
define('rcon_presets', "RCON prédéfinis");
define('update_from_local_master_server', "Mettre à jour à partir du Serveur Maitre local");
define('update_from_selected_rsync_server', "Mettre à jour à partir du serveur Rsync sélectionné");
define('execute_selected_server_operations', "Exécuter les opérations sélectionnées sur les serveurs");
define('execute_operations', "Exécuter les opérations");
define('account_expiration', "Expiration du compte");
define('mysql_databases', "Base de données MySQL");
define('failed_querying_server', "* Impossible d'interroger le serveur.");
define('query_protocol_not_supported', "* Il n'y a pas de protocole d'interrogation dans OGP qui supporte ce serveur.");
define('queries_disabled_by_setting_disable_queries_after', "Interrogations désactivées dans les paramètres: Désactiver interrogation après: %s, et vous avez %s serveurs.<br>");
define('presets_for_game_and_mod', "RCON prédéfinis pour %s et mod %s");
define('name', "Nom");
define('command', "Commande&nbsp;RCON");
define('add_preset', "Ajouter un prédéfini");
define('edit_presets', "Editer les prédéfinis");
define('del_preset', "Supprimer");
define('change_preset', "Editer");
define('send_command', "Envoyer la commande");
define('starting_copy_with_master_server_named', "Démarrage de la copie avec le serveur maître '%s'...");
define('starting_sync_with', "Démarrage de la synchro avec %s...");
define('refresh_interval', "Intervalle de rafraîchissement des logs");
define('finished_manual_update', "Mise à jour manuelle terminée.");
define('failed_to_start_file_download', "Impossible de démarrer le téléchargement.");
define('game_name', "Nom du jeu");
define('dest_dir', "Dossier de destination");
define('remote_server', "Serveur Distant");
define('file_url', "URL du fichier");
define('file_url_info', "L'URL du fichier qui va être téléchargé et décompressé dans le dossier.");
define('dest_filename', "Nom du fichier de destination");
define('dest_filename_info', "Le nom du fichier pour le fichier de destination.");
define('update_server', "Mise à jour du serveur");
define('unavailable', "Indisponible");
define('upload_map_image', "Image de carte");
define('upload_image', "Uploader une image");
define('jpg_gif_png_less_than_1mb', "L&apos;image doit être au format jpg, gif ou png et faire moins de 1 MO.");
define('check_dev_console', "Erreur lors de léapos;envoi du fichier, vérifier la console dévelopeur du navigateur.");
define('uploaded_successfully', "Uploadé avec succès.");
define('cant_create_folder', "Impossible de créer le dossier:<br><b>%s</b>");
define('cant_write_file', "Impossible d&apos;écrire le fichier:<br><b>%s</b>");
define('exceeded_php_directive', "Dépassement des directives PHP.<br><b>%s</b>.");
define('unknown_errors', "Erreurs inconnues.");
define('directory', "Directory");
define('view_player_commands', "Voir Commandes Joueur");
define('hide_player_commands', "Cacher Commandes Joueur");
define('no_online_players', "Il n'y a pas de joueurs en ligne.");
define('invalid_game_mod_id', "ID de Jeu/Mod spécifié invalide.");
define('auto_update_title_popup', "Lien de Mise à Jour Steam Automatique");
define('auto_update_popup_html', "<p>Veuillez utiliser le lien suivant pour vérifier et mettre à jour automatiquement le serveur de jeu par Steam si besoin.&nbsp; Vous pouvez l&apos;utiliser avec un cronjob ou initier manuellement le processus.</p>");
define('auto_update_copy_me', "Copier");
define('auto_update_copy_me_success', "Copié!");
define('auto_update_copy_me_fail', "Erreur de copie. Veuillez copier le lien manuellement.");
define('get_steam_autoupdate_api_link', "Lien de Mise à Jour");
define('update_attempt_from_nonmaster_server', "L'utilisateur %s a tenté une mise à jour sur le serveur avec le home_id %d à partir d'une serveur non maître. (Home ID: %d)");
define('attempting_nonmaster_update', "Vous tentez de mettre à jour ce serveur à partir d'un serveur non maître.");
define('cannot_update_from_own_self', "La mise à jour à partir du Serveur Maître local ne peut s'effectuer sur un Serveur Maître.");
define('show_server_id', "Voir les IDs des Serveurs");
define('hide_server_id', "Cacher les IDs des Serveurs");
define('edit_configuration_files', "Editer les Fichiers de Configuration");
?>