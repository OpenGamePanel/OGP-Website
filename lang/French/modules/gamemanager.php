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

$lang['gamemanager'] = "Gestion des jeux";
$lang['game_monitor'] = "Gestion des serveurs";
$lang['no_games_to_monitor'] = "Vous n'avez aucun serveur de jeux à administrer.";
$lang['status'] = "Statut";

// server_manager.php
$lang['fail_no_mods'] = "Aucun mod activé pour ce jeu ! Vous devez demadner à votre administrateur OGP de rajouter des mods pour ce jeu.";
$lang['no_game_homes_assigned'] = "Aucun serveur de jeux vous est assigné. Vous devez demander à votre administrateur OGP de vous assigner un serveur.";
$lang['select_game_home_to_configure'] = "Sélectionnez un serveur de jeux à configurer";
$lang['file_manager'] = "Gestionnaire de fichiers";
$lang['configure_mods'] = "Configurer les mods";
$lang['install_update_steam'] = "Installation/Mise à jour via Steam";
$lang['install_update_manual'] = "Installation/Mise à jour manuelle";
$lang['assign_game_homes'] = "Assigner un serveur de jeux";
$lang['user'] = "Utilisateur";
$lang['group'] = "Groupe";
$lang['start'] = "Démarrer";


// start_game.php
$lang['ogp_agent_ip'] = "IP de l'agent OGP";
$lang['max_players'] = "Joueurs max";
$lang['max'] = "Max";
$lang['ip_and_port'] = "IP et Port";
$lang['available_maps'] = "Cartes disponibles";
$lang['map_path'] = "Chemin vers les cartes";
$lang['available_parameters'] = "Paramètres disponibles";
$lang['start_server'] = "Démarrer";
$lang['start_wait_note'] = "Le démarrage du serveur prends du temps, ne fermez pas votre navigateur.";
$lang['game_type'] = "Type de jeu";
$lang['map'] = "Carte";
$lang['starting_server'] = "Démarrage du serveur, patientez svp...";
$lang['starting_server_settings'] = "Démarrage du serveur avec les paramètres suivants";
$lang['startup_params'] = "Paramètres de démarrage";
$lang['startup_cpu'] = "CPU assigné au serveur de jeux";
$lang['startup_nice'] = "Priorité (nice) assignée au serveur de jeux";
$lang['game_home'] = "Serveur de jeux";
$lang['server_started'] = "Serveur démarré avec succès.";
$lang['no_parameter_access'] = "Vous n'avez pas accès aux paramètres.";
$lang['extra_parameters'] = "Paramètres supplémentaires";
$lang['no_extra_param_access'] = "Vous n'avez pas accès aux paramètres supplémentaires.";
$lang['extra_parameters_info'] = "Ces paramètres sont placés à la fin de la ligne de commande lorsque le jeu est lancé.";
$lang['game_exec_not_found'] = "L'exécutable de jeu %s n'a pas été trouvé sur le serveur distant.";
$lang['select_params_and_start'] = "Sélectionnez les paramètres de démarrage pour le serveur et appuyez sur '%s'.";
$lang['no_ip_port_pairs_assigned'] = "Pas d'IP et port attribués pour ce serveur. Si vous ne pouvez pas les définir, contactez l'administrateur.";
$lang['unable_to_get_log'] = "Impossible d'obtenir le log, valeur de retour %s.";
$lang['server_binary_not_executable'] = "Le binaire n'est pas exécutable. Vérifiez que vous disposez des bonnes permissions sur le répertoire.";
$lang['server_not_running_log_found'] = "Le serveur ne démarre pas, mais il existe un log. NOTE : Ce log pourrait ne pas être lié à ce démarrage.";
$lang['ip_port_pair_not_owned'] = "IP:port ne vous appartient pas.";
$lang['unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set'] = "Nombre de joueurs max impossible. Au dessus de la limite définie.";
$lang['server_running_not_responding'] = "Le serveur est démarré mais ne répond pas, <br>il doit y avoir un problème et vous voudrez peut-être ";



// update_game.php
$lang['update_started'] = "Mise à jour démarrée, patientez svp...";
$lang['failed_to_start_steam_update'] = "Impossible de démarrer la mise à jour via Steam. Regardez le log.";
$lang['failed_to_start_rsync_update'] = "Impossible de démarrer la mise à jour via Rsync. Regardez le log.";
$lang['update_completed'] = "Mise à jour effectuée avec succès.";
$lang['update_in_progress'] = "Mise à jour en cours, patientez svp...";
$lang['refresh_steam_status'] = "Rafraîchir le statut Steam";
$lang['refresh_rsync_status'] = "Refraîchir le statut Rsync";
$lang['server_running_cant_update'] = "Serveur démarré donc mise à jour impossible. Stoppez le serveur avant la mise à jour.";
$lang['xml_steam_error'] = "Le type de serveur sélectionné ne supporte pas l'installation/la mise à jour via Steam.";
$lang['mod_key_not_found_from_xml'] = "Clé du mod '%s' non trouvée dans le fichier XML.";
$lang['stop_update'] = "Arrêter la mise à jour";

// game_monitor.php
$lang['statistics'] = "Statistiques";
$lang['servers'] = "Serveurs";
$lang['players'] = "Joueurs";
$lang['current_map'] = "Carte actuelle";
$lang['stop_server'] = "Arrêter le serveur";
$lang['server_ip_port'] = "Serveur IP:Port";
$lang['server_name'] = "Nom du serveur";
$lang['player_name'] = "Nom du joueur";
$lang['score'] = "Score";
$lang['time'] = "Temps";
$lang['no_rights_to_stop_server'] = "Vous n'avez pas les droits pour arrêter ce serveur.";
$lang['no_ogp_lgsl_support'] = "Ce serveur (sous : $s) n'a pas de support LGSL dans OGP et ses statistiques ne peuvent pas être affichées.";
$lang['server_status'] = "Serveur sur %s est %s.";
$lang['server_stopped'] = "Serveur '%s' a été arrêté.";
$lang['if_want_to_start_homes'] = "Si vous voulez démarrer un serveur, allez sur %s.";
$lang['view_log'] = "Logs";
$lang['if_want_manage'] = "Si vous voulez gérer vos jeux, vous pouvez le faire dans les";
$lang['columns'] = "colonnes";
$lang['group_users'] = "Groupe d'utilisateurs :";
$lang['restart_server'] = "Redémarrer le serveur";
$lang['restarting_server'] = "Redémarrage du serveur, patientez svp...";
$lang['server_restarted'] = "Serveur '%s' a été redémarré.";
$lang['server_not_running'] = "Ce serveur n'est pas démarré.";
$lang['address'] = "Adresse";
$lang['owner'] = "Propriétaire";
$lang['operations'] = "Opérations";
$lang['search'] = "Recherche";
$lang['maps_read_from'] = "Cartes lues depuis ";
$lang['file'] = "fichier";
$lang['folder'] = "dossier";
$lang['unable_retrieve_mod_info'] = "Impossible de trouver les informations du mod dans la base de données.";
$lang['unexpected_result_libremote'] = "Résultats inatendue de la libremote, informez-en les développeurs.";
$lang['unable_get_info'] = "Impossible de récupérer les informations pour le démarrage. Démarrage annulé.";
$lang['server_already_running'] = "Le serveur est déjà démarré. Si vous ne le voyez pas sur la Gestion des serveurs, il doit y avoir un problème et vous pouvez ";
$lang['already_running_stop_server'] = "Arrêter le serveur.";
$lang['error_server_already_running'] = "ERREUR : Un serveur est déjà démarré avec ce port";
$lang['failed_start_server_code'] = "Impossible de démarrer le serveur distant. Code d'erreur : ";
$lang['disabled'] = "désactivé ";
$lang['not_found_server'] = "Impossible de trouver le serveur distant avec l'ID";
$lang['rcon_command_title'] = "Commande RCON";
$lang['has_sent_to'] = "a été envoyée à";
$lang['need_set_remote_pass'] = "Vous devez rentrer le mot de passe";
$lang['before_sending_rcon_com'] = "avant d'envoyer des commandes rcon.";
$lang['agent_offline'] = "Agent hors ligne";
$lang['retry'] = "Réessayer";
$lang['page'] = "page";
$lang['server_cant_start'] = "serveur ne peut pas démarrer";
$lang['server_cant_stop'] = "serveur ne peut pas s'arrêter";
$lang['error_occured_remote_host'] = "Une erreur s'est produite sur l'hôte distant";
$lang['follow_server_status'] = "Vous pouvez suivre le statut du serveur depuis";
$lang['addons'] = "Addons";
$lang['hostname'] = "Nom d'hôte (hostname)";
$lang['rsync_install'] = "[Installation Rsync]";
$lang['ping'] = "Ping";
$lang['team'] = "Equipe";
$lang['deaths'] = "Morts";
$lang['pid'] = "PID";
$lang['skill'] = "Skill";
$lang["AIBot"] = "Bot IA";
$lang["steamid"] = "Steam ID";
$lang['player'] = "Joueur";
$lang['port'] = "Port";
$lang['rcon_presets'] = "RCON prédéfinis";
$lang['update_from_local_master_server'] = "Mise à jour depuis le serveur maître local.";
$lang['execute_selected_server_operations'] = "Exécuter les opérations sélectionnées sur les serveurs";
$lang['execute_operations'] = "Exécuter les opérations";
$lang['account_expiration'] = "Account expiration";
$lang['mysql_databases'] = "MySQL Databases";
$lang['failed_querying_server'] = "* Failed querying the server.";
$lang['query_protocol_not_supported'] = "* There is no query protocol in OGP that can support this server.";
$lang['queries_disabled_by_setting_disable_queries_after'] = "Queries disabled by setting: Disable queries after: %s, since you have %s servers.<br>";

// rcon_presets.php
$lang['presets_for_game_and_mod'] = "RCON prédéfinis pour %s et mod %s";
$lang['name'] = "Nom";
$lang['command'] = "Commande&nbsp;RCON";
$lang['add_preset'] = "Ajouter un prédéfini";
$lang['edit_presets'] = "Editer les prédéfinis";
$lang['del_preset'] = "Supprimer";
$lang['change_preset'] = "Editer";
$lang["send_command"] = "Envoyer la commande";

//rsync_install.php
$lang['starting_copy_with_master_server_named'] = "Démarrage de la copie avec le serveur maître '%s'...";
$lang['starting_sync_with'] = "Démarrage de la sync avec %s...";
$lang['refresh_interval'] = "Intervalle de rafraîchissement des logs";

//update_server_manual.php
$lang['finished_manual_update'] = "Mise à jour manuelle terminée.";
$lang['failed_to_start_file_download'] = "Impossible de démarrer le téléchargement du fichier";
$lang['game_name'] = "Nom du jeu";
$lang['dest_dir'] = "Dossier de destination";
$lang['remote_server'] = "Serveur distant";
$lang['file_url'] = "URL du fichier";
$lang['file_url_info'] = "L'URL du fichier qui va être téléchargé et décompressé dans le dossier.";
$lang['one_dir_down'] = "Aller dans le dossier parent avant d'extraire";
$lang['dest_filename'] = "Nom du fichier de destination";
$lang['dest_filename_info'] = "The nom du fichier pour le fichier de destination.";
$lang['update_server'] = "Mise à jour du serveur";
$lang['unavailable'] = "Indisponible";

?>
