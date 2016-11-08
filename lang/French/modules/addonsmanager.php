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

// Addons
define('install_plugin', "Installer le pugin");
define('install_mappack', "Installer le pack de maps");
define('install_config', "Installer la configuration");
define('game_name', "Nom du jeu");
define('directory', "Chemin du répertoire");
define('remote_server', "Serveur distant");
define('select_addon', "Selectionner addon");
define('install', "Installer");
define('failed_to_start_file_download', "Impossible de démarrer le téléchargement.");
define('no_games_servers_available', "Il n'y a pas de serveur disponible sur votre compte.");
define('addon_installed_successfully', "Addon installé avec succès.");
define('path', "Chemin");
define('wait_while_decompressing', "Attendez que le fichier %s soit décompressé.");

// Admin Addons
define('addon_name', "Nom de l'addon");
define('url', "URL");
define('select_game_type', "Sélectionner le jeu");
define('plugin', "Plugin");
define('mappack', "Pack de maps");
define('config', "Configuration");
define('type', "Type d'addon");
define('game', "Jeu");
define('show_all_addons', "Voir tous les addons");
define('show_addons_for_selected_type', "Voir les addons pour le type sélectionné");
define('show_addons_for_selected_game', "Voir les addons pour le jeu sélectionné");
define('linux_games', "Jeux Linux :");
define('windows_games', "Jeux Windows :");
define('create_addon', "Créer un addon");
define('addons_db', "Base de données des addons");
define('addon_has_been_created', "L'addon %s a été créé.");
define('remove_addon', "Supprimer addon");
define('fill_the_url_address_to_a_compressed_file', "Veuillez entrer une URL d'un fichier compressé.");
define('fill_the_addon_name', "Veuillez entrer un nom à l'addon.");
define('select_an_addon_type', "Veuillez choisir un type pour l'addon.");
define('select_a_game_type', "Veuillez choisir un jeu.");
define('edit_addon', "Editer addon");
define('post-script', "Script de post-installation (bash)");
define('replacements', "Remplacements :");
define('addon_name_info', "Saisissez un nom pour votre addon, ce sera le nom visible par les utilisateurs.");
define('url_info', "Saisissez l'adresse internet (URL) hébergeant les fichiers à télécharger, si les fichiers sont compressés en zip ou en tar.gz, il seront automatiquement décompressés dans le répertoire root du serveur ou dans le répertoire indiqué dans la rubrique 'Chemin'.");
define('path_info', "Le répertoire doit être relatif au répertoire du serveur et ne contenir aucun slashes ('/') ni début ni à la fin, example: 'cstrike/cfg'. Si le champ reste vide, le chemin par défaut sera le répertoire root du serveur.");
define('post-script_info', "Saisissez votre code en langage Bash, il sera exécuté comme un script, vous pouvez utiliser les variables de remplacement pour personnaliser l'installation. Le script s'exécutera depuis le répertoire root du serveur ou depuis le répertoire indiqué dans la rubrique 'Chemin'.");
?>