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

define('install_plugin', "Installer les Plugins");
define('install_mappack', "Installer les Cartes");
define('install_config', "Installer la Configuration");
define('game_name', "Nom du Jeu");
define('directory', "Chemin du Répertoire");
define('remote_server', "Serveur Distant");
define('select_addon', "Sélectionner l'Addon");
define('install', "Installer");
define('failed_to_start_file_download', "Impossible de démarrer le téléchargement.");
define('no_games_servers_available', "Il n'y a pas de serveur de jeu disponible sur votre compte.");
define('addon_installed_successfully', "Addon installé avec succès.");
define('path', "Chemin");
define('wait_while_decompressing', "Attendez que le fichier %s soit décompressé.");
define('addon_name', "Nom de l'Addon");
define('url', "URL");
define('select_game_type', "Sélectionner le Type de Jeu");
define('plugin', "Plugin");
define('mappack', "Pack de Cartes");
define('config', "Configuration");
define('type', "Type d'Addon");
define('game', "Jeu");
define('show_all_addons', "Voir tous les Addons");
define('show_addons_for_selected_type', "Voir les Addons pour le type sélectionné");
define('show_addons_for_selected_game', "Voir les Addons pour le jeu sélectionné");
define('linux_games', "Jeux Linux:");
define('windows_games', "Jeux Windows:");
define('create_addon', "Créer un Addon");
define('addons_db', "Base de données des Addons");
define('addon_has_been_created', "L'Addon %s a été créé.");
define('remove_addon', "Supprimer l'Addon");
define('fill_the_url_address_to_a_compressed_file', "Veuillez entrer une URL d'un fichier compressé.");
define('fill_the_addon_name', "Veuillez entrer un nom à l'Addon.");
define('select_an_addon_type', "Veuillez choisir un type pour l'Addon.");
define('select_a_game_type', "Veuillez choisir un Type de Jeu.");
define('edit_addon', "Editer l'Addon");
define('post-script', "Script de post-installation (bash)");
define('replacements', "Remplacements:");
define('addon_name_info', "Saisissez un nom pour votre Addon, ce sera le nom visible par les utilisateurs.");
define('url_info', "Saisissez l'adresse internet (URL) hébergeant les fichiers à télécharger, si les fichiers sont compressés en zip ou en tar.gz, il seront automatiquement décompressés dans le répertoire racine du serveur ou dans le répertoire indiqué dans la rubrique 'Chemin'.");
define('path_info', "Le répertoire doit être relatif au répertoire du serveur et ne contenir aucun slashes ('/') ni au début ni à la fin, exemple: 'cstrike/cfg'. Si le champ reste vide, le chemin par défaut sera le répertoire racine du serveur.");
define('post-script_info', "Saisissez votre code en langage Bash, il sera exécuté comme un script, vous pouvez utiliser les variables de remplacement pour personnaliser l'installation, elles seront remplacées par les données du serveur pour lequel l'Addon est installé. Le script s'exécutera depuis le répertoire racine du serveur ou depuis le répertoire indiqué dans la rubrique 'Chemin'.");
?>