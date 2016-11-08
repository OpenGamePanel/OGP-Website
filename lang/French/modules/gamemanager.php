<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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

define('no_games_to_monitor', "Vous n'avez aucun serveur de jeux à administrer.");
define('status', "Statut");

// server_manager.php
define('fail_no_mods', "Aucun mod activé pour ce jeu ! Vous devez demadner à votre administrateur OGP de rajouter des mods pour ce jeu.");
define('no_game_homes_assigned', "Aucun serveur de jeux vous est assigné. Vous devez demander à votre administrateur OGP de vous assigner un serveur.");
define('select_game_home_to_configure', "Sélectionnez un serveur de jeux à configurer");
define('file_manager', "Gestionnaire de fichiers");
define('configure_mods', "Configurer les mods");
define('install_update_steam', "Installation/Mise à jour via Steam");
define('install_update_manual', "Installation/Mise à jour manuelle");
define('assign_game_homes', "Assigner un serveur de jeux");
define('user', "Utilisateur");
define('group', "Groupe");
define('start', "Démarrer");


// start_game.php
define('ogp_agent_ip', "IP de l'Agent OGP");
define('max_players', "Joueurs max");
define('max', "Max");
define('ip_and_port', "IP et Port");
define('available_maps', "Cartes disponibles");
define('map_path', "Chemin vers les cartes");
define('available_parameters', "Paramètres disponibles");
define('start_server', "Démarrer");
define('start_wait_note', "Le démarrage du serveur prends du temps, ne fermez pas votre navigateur.");
define('game_type', "Type de jeu");
define('map', "Carte");
define('starting_server', "Démarrage du serveur, patientez svp...");
define('starting_server_settings', "Démarrage du serveur avec les paramètres suivants");
define('startup_params', "Paramètres de démarrage");
define('startup_cpu', "CPU assigné au serveur de jeux");
define('startup_nice', "Priorité (nice) assignée au serveur de jeux");
define('game_home', "Serveur de jeux");
define('server_started', "Serveur démarré avec succès.");
define('no_parameter_access', "Vous n'avez pas accès aux paramètres.");
define('extra_parameters', "Paramètres supplémentaires");
define('no_extra_param_access', "Vous n'avez pas accès aux paramètres supplémentaires.");
define('extra_parameters_info', "Ces paramètres sont placés à la fin de la ligne de commande lorsque le jeu est lancé.");
define('game_exec_not_found', "L'exécutable de jeu %s n'a pas été trouvé sur le serveur distant.");
define('select_params_and_start', "Sélectionnez les paramètres de démarrage pour le serveur et appuyez sur '%s'.");
define('no_ip_port_pairs_assigned', "Pas d'IP et port attribués pour ce serveur. Si vous ne pouvez pas les définir, contactez l'administrateur.");
define('unable_to_get_log', "Impossible d'obtenir le log, valeur de retour %s.");
define('server_binary_not_executable', "Le binaire n'est pas exécutable. Vérifiez que vous disposez des bonnes permissions sur le répertoire.");
define('server_not_running_log_found', "Le serveur ne démarre pas, mais il existe un log. NOTE : Ce log pourrait ne pas être lié à ce démarrage.");
define('ip_port_pair_not_owned', "IP:port ne vous appartient pas.");
define('unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Nombre de joueurs max impossible. Au dessus de la limite définie.");
define('server_running_not_responding', "Le serveur est démarré mais ne répond pas, <br>il doit y avoir un problème et vous voudrez peut-être ");

// update_game.php
define('update_started', "Mise à jour démarrée, patientez svp...");
define('failed_to_start_steam_update', "Impossible de démarrer la mise à jour via Steam. Regardez le log.");
define('failed_to_start_rsync_update', "Impossible de démarrer la mise à jour via Rsync. Regardez le log.");
define('update_completed', "Mise à jour effectuée avec succès.");
define('update_in_progress', "Mise à jour en cours, patientez svp...");
define('refresh_steam_status', "Rafraîchir le statut Steam");
define('refresh_rsync_status', "Refraîchir le statut Rsync");
define('server_running_cant_update', "Serveur démarré donc mise à jour impossible. Stoppez le serveur avant la mise à jour.");
define('xml_steam_error', "Le type de serveur sélectionné ne supporte pas l'installation/la mise à jour via Steam.");
define('mod_key_not_found_from_xml', "Clé du mod '%s' non trouvée dans le fichier XML.");
define('stop_update', "Arrêter la mise à jour");

// game_monitor.php
define('statistics', "Statistiques");
define('servers', "Serveurs");
define('players', "Joueurs");
define('current_map', "Carte actuelle");
define('stop_server', "Arrêter le serveur");
define('server_ip_port', "Serveur IP:Port");
define('server_name', "Nom du serveur");
define('player_name', "Nom du joueur");
define('score', "Score");
define('time', "Temps");
define('no_rights_to_stop_server', "Vous n'avez pas les droits pour arrêter ce serveur.");
define('no_ogp_lgsl_support', "Ce serveur (sous : %s) n'a pas de support LGSL dans OGP et ses statistiques ne peuvent pas être affichées.");
define('server_status', "Serveur sur %s est %s.");
define('server_stopped', "Serveur '%s' a été arrêté.");
define('if_want_to_start_homes', "Si vous voulez démarrer un serveur, allez sur %s.");
define('view_log', "Logs");
define('if_want_manage', "Si vous voulez gérer vos jeux, vous pouvez le faire dans les");
define('columns', "colonnes");
define('group_users', "Groupe:");
define('assigned_to', "Attribué:");
define('restart_server', "Redémarrer le serveur");
define('restarting_server', "Redémarrage du serveur, patientez svp...");
define('server_restarted', "Serveur '%s' a été redémarré.");
define('server_not_running', "Ce serveur n'est pas démarré.");
define('address', "Adresse");
define('owner', "Propriétaire");
define('operations', "Opérations");
define('search', "Recherche");
define('maps_read_from', "Cartes lues depuis ");
define('file', "fichier");
define('folder', "dossier");
define('unable_retrieve_mod_info', "Impossible de trouver les informations du mod dans la base de données.");
define('unexpected_result_libremote', "Résultats inatendue de la libremote, informez-en les développeurs.");
define('unable_get_info', "Impossible de récupérer les informations pour le démarrage. Démarrage annulé.");
define('server_already_running', "Le serveur est déjà démarré. Si vous ne le voyez pas sur la Gestion des serveurs, il doit y avoir un problème et vous pouvez ");
define('already_running_stop_server', "Arrêter le serveur.");
define('error_server_already_running', "ERREUR : Un serveur est déjà démarré avec ce port");
define('failed_start_server_code', "Impossible de démarrer le serveur distant. Code d'erreur : ");
define('disabled', "désactivé ");
define('not_found_server', "Impossible de trouver le serveur distant avec l'ID");
define('rcon_command_title', "Commande RCON");
define('has_sent_to', "a été envoyée à");
define('need_set_remote_pass', "Vous devez rentrer le mot de passe");
define('before_sending_rcon_com', "avant d'envoyer des commandes rcon.");
define('retry', "Réessayer");
define('page', "page");
define('server_cant_start', "serveur ne peut pas démarrer");
define('server_cant_stop', "serveur ne peut pas s'arrêter");
define('error_occured_remote_host', "Une erreur s'est produite sur l'hôte distant");
define('follow_server_status', "Vous pouvez suivre le statut du serveur depuis");
define('addons', "Addons");
define('hostname', "Nom d'hôte (hostname)");
define('rsync_install', "[Installation Rsync]");
define('ping', "Ping");
define('team', "Equipe");
define('deaths', "Morts");
define('pid', "PID");
define('skill', "Skill");
define("AIBot", "Bot IA");
define("steamid", "Steam ID");
define('player', "Joueur");
define('port', "Port");
define('rcon_presets', "RCON prédéfinis");
define('update_from_local_master_server', "Mise à jour depuis le serveur maître local");
define('update_from_selected_rsync_server', "Mise à jour depuis le serveur Rsync sélectionné");
define('execute_selected_server_operations', "Exécuter les opérations sélectionnées sur les serveurs");
define('execute_operations', "Exécuter les opérations");
define('account_expiration', "Expiration du compte");
define('mysql_databases', "Base de données MySQL");
define('failed_querying_server', "* Impossible d'interroger le serveur.");
define('query_protocol_not_supported', "* Il n'y a pas de protocole d'interrogation dans OGP qui supporte ce serveur.");
define('queries_disabled_by_setting_disable_queries_after', "Interrogations désactivées dans les paramètres: Désactiver interrogation après: %s, vous avez %s serveurs.<br>");

// rcon_presets.php
define('presets_for_game_and_mod', "RCON prédéfinis pour %s et mod %s");
define('name', "Nom");
define('command', "Commande&nbsp;RCON");
define('add_preset', "Ajouter un prédéfini");
define('edit_presets', "Editer les prédéfinis");
define('del_preset', "Supprimer");
define('change_preset', "Editer");
define("send_command", "Envoyer la commande");

//rsync_install.php
define('starting_copy_with_master_server_named', "Démarrage de la copie avec le serveur maître '%s'...");
define('starting_sync_with', "Démarrage de la sync avec %s...");
define('refresh_interval', "Intervalle de rafraîchissement des logs");

//update_server_manual.php
define('finished_manual_update', "Mise à jour manuelle terminée.");
define('failed_to_start_file_download', "Impossible de démarrer le téléchargement du fichier");
define('game_name', "Nom du jeu");
define('dest_dir', "Dossier de destination");
define('remote_server', "Serveur distant");
define('file_url', "URL du fichier");
define('file_url_info', "L'URL du fichier qui va être téléchargé et décompressé dans le dossier.");

define('dest_filename', "Nom du fichier de destination");
define('dest_filename_info', "The nom du fichier pour le fichier de destination.");
define('update_server', "Mise à jour du serveur");
define('unavailable', "Indisponible");

//map image upload
define('upload_map_image', "Uploaded image de la carte");
define('upload_image', "Uploader image");
define('jpg_gif_png_less_than_1mb', "L'image doit être jpg, gif ou png et moins de 1 MB.");
define('check_dev_console', "Erreur lors de l'envoi du fichier, vérifier la console dévelopeur du navigateur.");
define('uploaded_successfully', "Uploadé avec succès.");
define('cant_create_folder', "Impossible de créer le dossier:<br><b>%s</b>");
define('cant_write_file', "Impossible d'écrire le fichier:<br><b>%s</b>");
define('exceeded_php_directive', "Exceeded PHP directive.<br><b>%s</b>.");
define('unknown_errors', "Erreurs inconnues.");
define('game_manager', 'Game manager');
define('directory', 'Directory');

// RCON
define('view_player_commands',"Voir Commandes Joueur");
define('hide_player_commands',"Cacher Commandes Joueur");
define('no_online_players',"Il n'y a pas de joueurs en ligne.");
?>