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

// server.php
define('configured_mysql_hosts', "Hôtes MySQL configurés");
define('add_new_mysql_host', "Ajouter un hôte MySQL");
define('enter_mysql_ip', "Entrer l'IP MySQL.");
define('enter_valid_port', "Entrer un port valide.");
define('enter_mysql_root_password', "Entrer le mot de passe root MySQL.");
define('enter_mysql_name', "Entrer le nom MySQL.");
define('could_not_add_mysql_server', "Impossible d'ajouter le serveur MySQL.");
define('game_server_name_info', "Serveur ajouté.");
define('note_mysql_host', "Note: En utilisant la 'Connexion directe' le serveur doit accepter les connexions externes pour que les serveurs puissent se connecter à distance, tandis qu'en utilisant la connexion par serveur distant cela sera considéré comme une connexion locale.");
define('direct_connection', "Connexion directe");
define('connection_through_remote_server_named', "Connexion par serveur distant nommé %s");
define('add_mysql_server', "Ajouter le serveur MySQL");
define('mysql_online', "MySQL  en ligne");
define('mysql_offline', "MySQL hors ligne");
define("encryption_key_mismatch", "La clé de chiffrement ne correspond pas");
define("unknown_error", "Erreur inconnue");
define("remove", "Supprimer");
define("assign_db", "Assigner  une Base de Données");
define("mysql_server_name", "Nom du serveur MySQL");
define("server_status", "Status du serveur");
define('mysql_ip_port', "MySQL IP:port");
define('mysql_root_passwd', "Mot de passe root MySQL");
define('connection_method', "Méthode de connexion");
define('user_privilegies', "Privilèges utilisateur");
define('current_dbs', "Bases de Données actuelles");
define('mysql_name', "Nom du serveur MySQL");
define('mysql_ip', "IP MySQL");
define('mysql_port', "Port MySQL");
define('privilegies', "privilèges");
define('all', "Tous");
define('custom', "Personnalisé");
define('server_added', "Serveur ajouté.");

//privileges
define('alter', "ALTER");
define('create', "CREATE");
define('create_temporary_tables', "CREATE TEMPORARY TABLES");
define('drop', "DROP");
define('index', "INDEX");
define('insert', "INSERT");
define('lock_tables', "LOCK TABLES");
define('select', "SELECT");
define('grant_option', "GRANT OPTION");

//privileges descriptions
define('alter_info', "<b>Autorise l'utilisation de ALTER TABLE.</b>");	
define('create_info', "<b>Autorise l'utilisation de CREATE TABLE.</b>");	
define('create_temporary_tables_info', "<b>Autorise l'utilisation de CREATE TEMPORARY TABLE.</b>");
define('delete_info', "<b>Autorise l'utilisation de DELETE.</b>");
define('drop_info', "<b>Autorise l'utilisation de DROP TABLE.</b>");	
define('index_info', "<b>Autorise l'utilisation de CREATE INDEX et DROP INDEX.</b>");	
define('insert_info', "<b>Autorise l'utilisation de INSERT.</b>");	
define('lock_tables_info', "<b>Autorise l'utilisation de LOCK TABLES sur les tables pour lesquelles on a les privilèges SELECT.</b>");	
define('select_info', "<b>Autorise l'utilisation de SELECT.</b>");
define('update_info', "<b>Autorise l'utilisation de UPDATE.</b>");	
define('grant_option_info', "<b>Permet d'accorder des privilèges.</b>");

// edit_server.php
define('select_game_server', "Sélectionner serveur de jeu");
define('invalid_mysql_server_id', "ID serveur MySQL invalide.");
define('there_is_another_db_named_or_user_named', "Il y a une autre base de données nommée <b>%s</b> ou un autre utilisateur appelé <b>%s</b>.");
define('db_added_for_home_id', "Base de Données ajoutée pour le home ID <b>%s</b>.");
define('could_not_remove_db', "La base de données sélectionnée ne peut pas être supprimée.");
define('db_removed_successfully_from_mysql_server_named', "La base de données a été supprimée du serveur %s.");
define('areyousure_remove_mysql_server', "Etes-vous sûr de vouloir supprimer le serveur MySQL nommé <b>%s</b>?");
define('db_changed_successfully', "La base de données nommée %s a été modifiée avec succès.");
define('error_while_remove', "Erreur lors de la suppression.");
define('mysql_server_removed', "Le serveur MySQL nommé <b>%s</b> a été supprimé avec succès.");
define('unable_to_set_changes_to', "Impossible d'appliquer les changements au serveur MySQL nommé <b>%s</b>.");
define('mysql_server_settings_changed', "Le serveur MySQL nommé <b>%s</b> a été modifié avec succès.");
define('editing_mysql_server', "Edition du serveur MySQL nommé <b>%s</b>.");
define('save_settings', "Enregistrer les paramètres");
define('mysql_dbs_for', "Bases de données pour le serveur %s");
define('edit_dbs', "Editer les bases de données");
define('edit_db_settings', "Editer les paramètres de la base de données");
define('remove_db', "Supprimer la base de données");
define('save_db_changes', "Sauvegarder les modifications de base de données.");
define('add_db', "Ajouter base de données");
define('select_db', "Sélectionner base de données");
define('db_user', "Utilisateur BDD");
define('db_passwd', "Mot de passe BDD");
define('db_name', "Nom de la BDD");
define('enabled', "Activée");
define('game_server', "Serveur de jeu");

// user_db.php
define('there_are_no_databases_assigned_for', "Il n'y a pas de bases de données assignées pour <b>%s</b>.");
define('unable_to_connect_to_mysql_server_as', "Impossible de se connecter au serveur MySQL en tant que %s.");
define('unable_to_create_db', "Impossible de créer la base de données.");
define('unable_to_select_db', "Impossible de sélectionner la base de données %s.");
define('db_info', "Information Base de Données");
define('db_tables', "Tables de la base de données");
define('db_backup', "Sauvegarde de la Base De Données");
define('download_db_backup', "Télécharger la sauvegarde de la BDD");
define('restore_db_backup', "Restaurer la sauvegarde de la BDD");
define('sql_file', "fichier(.sql)");
?>