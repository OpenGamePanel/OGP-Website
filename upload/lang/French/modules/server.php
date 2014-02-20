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

// servers.php
$lang['add_new_remote_host'] = "Ajouter un nouveau hôte distant";
$lang['configured_remote_hosts'] = "Hôte distant configuré";
$lang['remote_host'] = "Hôte distant";
$lang['remote_host_info'] = "L'hôte distant doit avoir un nom d'hôte (hostname) pingable !";
$lang['remote_host_port'] = "Port de l'hôte distant";
$lang['remote_host_port_info'] = "Le port depuis lequel l'agent OGP écoute sur l'hôte distant. Défaut: 12679.";
$lang['remote_host_name'] = "Nom de l'hôte distant";
$lang['remote_host_name_info'] = "Le nom de l'hôte distant sera utiliser pour faciliter sa reconnaissance dans tout le panneau.";
$lang['add_remote_host'] = "Ajouter un hôte distant";
$lang['offline'] = "Hors ligne";
$lang['online'] = "En ligne";
$lang['remote_encryption_key'] = "Clé de chiffrement distante";
$lang['remote_encryption_key_info'] = "La clé de chiffrement distante est utilisé pour crypter les données entre le panneau et l'hôte distant.<br>Cette clé doit être la même sur les deux machines.";
$lang['server_name'] = "Nom du serveur";
$lang['agent_ip_port'] = "IP:Port de l'agent";
$lang['encryption_key'] = "Clé de chiffrement";
$lang['agent_status'] = "Statut de l'agent";
$lang['ips'] = "IPs";
$lang['add_more_ips'] = "Si vous voulez entrer plus d'IPs, cliquez sur 'Définir IPs' quand tous les champs sont remplis et un champ vide apparaîtra.";
$lang['encryption_key_mismatch'] = "La clé de chiffrement ne correspond pas à celle de l'agent. Vérifiez vos fichiers de configuration.";
$lang['no_ip_for_remote_host'] = "Vous devez ajouter au moins une (1) adresse IP pour chaque hôte distant.";
$lang['note_remote_host'] = "Un hôte distant est un serveur où l'agent OGP tourne. Chaque hôte peut avoir plusieurs adresses IPs que les utilisateurs utiliserons pour leurs serveurs de jeux";
$lang['ip_administration'] = "Serveur &amp; IP Administration :: Open Game Panel";
$lang['unknown_error'] = "Erreur inconnue - status_chk a retourné";
$lang['remote_host_user_name'] = "Utilisateur UNIX";
$lang['remote_host_user_name_info'] = "Utilisateur qui fait tourner l'agent. Exemple: Jonhy";
$lang['ogp_user'] = $lang['remote_host_user_name'];
$lang['ogp_user_info'] = $lang['remote_host_user_name_info'];
$lang['remote_host_ftp_ip'] = "IP FTP";
$lang['remote_host_ftp_ip_info'] = "Le <b>IP</b> du serveur FTP pour cet agent.";
$lang['remote_host_ftp_port'] = "Port FTP";
$lang['remote_host_ftp_port_info'] = "Le <b>port</b> du serveur FTP pour cet agent.";
$lang['view_log'] = "Voir le log";
$lang['ufw'] = "UFW";
$lang['status'] = "Statut";
$lang['stop_firewall'] = "Arrêter le pare-feu (firewall)";
$lang['start_firewall'] = "Démarrer le pare-feu (firewall)";
$lang['seconds'] = "Secondes";

// edit_server.php
$lang['invalid_remote_host_id'] = "ID '%s' de l'hôte distant invalide.";
$lang['remote_host_removed'] = "Hôte distant '%s' supprimé avec succès.";
$lang['editing_remote_server'] = "Edition de l'hôte distant '%s'";
$lang['remote_server_settings_changed'] = "Changement des paramètres pour le serveur distant '%s' effectué avec succès.";
$lang['save_settings'] = "Sauvegarder les paramètres";
$lang['set_ips'] = "Définir IPs";
$lang['remote_ip'] = "IP distante";
$lang['remote_ips_for'] = "IPs distantes pour le serveur '%s'";
$lang['ips_set_for_server'] = "IPs pour le serveur '%s' définies avec succès.";
$lang['could_not_remove_ip'] = "Impossible de supprimer l'IP de la base de données.";
$lang['could_add_ip'] = "Peut ajouter l'IP du serveur distant à la base de données.";
$lang['areyousure_removeagent'] = "Etes-vous sûr de vouloir supprimer l'agent";
$lang['areyousure_removeagent2'] = "et tous les serveurs qui lui sont reliés dans la base de données OGP ?";
$lang['error_while_remove'] = "Erreur lors de la suppresion du serveur distant.";
$lang['add_ip'] = "Ajouer IP";
$lang['remove_ip'] = "Supprimer IP";
$lang['edit_ip'] = "Editer IP";
$lang['wrote_changes'] = "Changement effectué avec succès.";
$lang['there_are_servers_running_on_this_ip'] = "Il y a des serveurs démarrés avec cette adresse IP.";

// add_server.php
$lang['enter_ip_host'] = "Vous devez entrer une IP pour l'hôte distant.";
$lang['enter_valid_ip'] = "Vous devez entrer un port valide pour l'hôte distant. La valeur du port peut être comprise entre 0 et 65535, cependant les valeurs recommandées sont celles comprises entre 1024 et 65535.";
$lang['could_not_add_server'] = "Impossible d'ajouter le serveur";
$lang['to_db'] = "à la base de données.";
$lang['added_server'] = "Serveur ajouté";
$lang['with_port'] = "avec le port";
$lang['to_db_succesfully'] = "dans la base de données avec succès.";
$lang['unable_discover'] = "Impossible de découvrir automatiquement les IPs sur";
$lang['set_ip_manually'] = "Vous devez les entrer manuellement.";
$lang['found_ips'] = "IPs trouvés";
$lang['for_remote_server'] = "pour le serveur distant.";
$lang['failed_add_ip'] = "Impossible d'ajouter l'IP";
$lang['timeout'] = "Time Out";
$lang['timeout_info'] = "Secondes. La limite de temps pour avoir une réponse de l'agent.";
$lang['seconds'] = "secondes";
$lang['use_nat'] = "Utiliser le NAT";
$lang['use_nat_info'] = "Activez le si votre serveur distant utlise les règles NAT.";

// arrange_servers.php
$lang['arrange_ports'] = "Arrange ports";
$lang['assign_new_ports_range_for_ip'] = "Assign new ports range for IP %s";
$lang['assigned_port_ranges_for_ip'] = "Assigned port ranges for IP %s";
$lang['assigned_ports_for_ip'] = "Assigned ports for IP %s";
$lang['unspecified_game_types'] = "Unspecified game types";
$lang['start_port'] = "Start port:";
$lang['end_port'] = "End port:";
$lang['port_increment'] = "Port increment:";
$lang['total_assignable_ports'] = "Total assignable ports:";
$lang['available_range_ports'] = "Available range ports:";
$lang['assign_range'] = "Assign range";
$lang['edit_range'] = "Edit range";
$lang['delete_range'] = "Delete range";
$lang['home_id'] = "Home ID";
$lang['seconds'] = "seconds";
$lang['home_path'] = "Home path";
$lang['game_type'] = "Game type";
$lang['port'] = "Port";
$lang['invalid_values'] = "Invalid values.";
$lang['ports_in_range_already_arranged'] = "Ports in range already arranged.";
$lang['ports_range_already_configured_for'] = "Ports range already configured for %s.";
$lang['ports_range_added_successfull_for'] = "Ports range added successfull for %s.";
$lang['ports_range_deleted_successfull'] = "Ports range deleted successfull.";
$lang['ports_range_edited_successfull_for'] = "Ports range edited successfull for %s.";

?>