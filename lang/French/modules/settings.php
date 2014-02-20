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

// settings.php

$lang['settings'] = "Paramètres du panneau";
$lang['maintenance_mode'] = "Maintenance";
$lang['maintenance_mode_info'] = "Désactive le site pour que seuls les administrateurs puissent s'y connecter.";
$lang['maintenance_title'] = "Titre pour la maintenance";
$lang['maintenance_title_info'] = "Le titre qui est affiché aux utilisateurs durant la maintenance.";
$lang['maintenance_message'] = "Message de la maintenance";
$lang['maintenance_message_info'] = "Le message qui est affiché aux utilisateurs durant la maintenance.";
$lang['update_settings'] = "Mettre à jour les paramètres";
$lang['settings_updated'] = "Paramètres mis à jour avec succès.";
$lang['panel_language'] = "Langue du panneau";
$lang['panel_language_info'] = "La langue définie ici est la langue par défaut du panneau. Les utilisateurs peuvent la changer depuis leur page de profil.";
$lang['page_auto_refresh'] = "Rafraîchissement automatique des pages";
$lang['page_auto_refresh_info'] = "Le rafraîchissement automatique des pages est surtout utilisé dans les pages de logs. Il est préférable de l'activer.";
$lang['smtp_server'] = "Serveur sortant mail";
$lang['smtp_server_info'] = "C'est le serveur sortant pour e-mails (serveur SMTP) utilisé pour, par exemple, envoyer les mots de passes aux utilisateurs.<br>'localhost' est par défaut.";
$lang['panel_email_address'] = "Adresse e-mail sortante";
$lang['panel_email_address_info'] = "C'est l'adresse e-mail qui est utilisée pour envoyer les mails.";
$lang['panel_name'] = "Nom du panneau";
$lang['panel_name_info'] = "Le nom du panneau qui est affiché dans le titre des pages. Cette valeur écrase les titres des pages si elle est définie.";
$lang['feed_enable'] = "Activer LGSL Feed";
$lang['feed_enable_info'] = "Si votre hébergement web a un pare-feu (firewall) bloquant les requêtes sur les ports, vous devez l'activer.";
$lang['feed_url'] = "Feed URL";
$lang['feed_url_info'] = "GrayCube.com partage un 'LGSL feed' depuis l'URL :<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>";
$lang['charset'] = "Encodage des caractères";
$lang['charset_info'] = "UTF8, ISO, ASCII, etc... Laissez vide pour utiliser l'encodage ISO.";
$lang['steam_user'] = "Nom d'utilisateur Steam";
$lang['steam_user_info'] = "Ce nom d'utilisateur est utilisé pour se connecter à Steam et télécharger les jeux comme CS:GO.";
$lang['steam_pass'] = "Mot de passe Steam";
$lang['steam_pass_info'] = "Le mot de passe pour le compte Steam utilisé.";
$lang['steam_guard'] = "Steam Guard";
$lang['steam_guard_info'] = "Des utilisateurs ont Steam Guard activés pour protéger leur compte des pirates,<br>ce code est envoyé par e-mail lors de la première installation.";
$lang['smtp_port'] = "Port SMTP";
$lang['smtp_port_info'] = "Si le port SMTP n'est pas celui par défaut (25), entrez le ici.";
$lang['smtp_login'] = "Utilisateur SMTP";
$lang['smtp_login_info'] = "Si le serveur SMTP requiert une authentification, entrez votre nom d'utilisateur ici.";
$lang['smtp_passw'] = "Mot de passe SMTP";
$lang['smtp_passw_info'] = "Si vous ne mettez pas de mot de passe, l'authentification STMP sera désactivée.";
$lang['smtp_ssl'] = "SMTP SSL";
$lang['smtp_ssl_info'] = "Utilisez-vous le SSL pour vous connecter à votre serveur SMTP ?";
$lang['time_zone'] = "Fuseau horaire";
$lang['time_zone_info'] = "Définissez le fuseau horaire par défaut utiliser pour toutes les dates et les temps.";
$lang['query_cache_life'] = "Temps de vie du cache des requêtes";
$lang['query_cache_life_info'] = "Définissez le timeout en seconde avant que le statut du serveur ne soit rafraîchi.";
$lang['query_num_servers_stop'] = "Disable Game Server Queries After";
$lang['query_num_servers_stop_info'] = "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.";
$lang['editable_email'] = "Editable E-Mail Address";
$lang['editable_email_info'] = "Select if users can edit their e-mail address or not.";
$lang['old_dashboard_behavior'] = "Old Dashboard behavior";
$lang['old_dashboard_behavior_info'] = "The old Dashboard was running slower but shows more server information, current players and map.";
$lang['rsync_available'] = "Available rsync servers";
$lang['rsync_available_info'] = "Select what servers list will be shown in the rsync installation.";
$lang['all_available_servers'] = "All available servers ( rsync_sites.list + rsync_sites_local.list )";
$lang['only_remote_servers'] = "Only remote servers ( rsync_sites.list )";
$lang['only_local_servers'] = "Only local servers ( rsync_sites_local.list )";
$lang['header_code'] = "Header code";
$lang['header_code_info'] = "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.";
$lang[''] = "";

// Theme settings
$lang['theme_settings'] = "Paramètres du thème";
$lang['themes'] = "Paramètres du thème";
$lang['theme'] = "Thème";
$lang['theme_info'] = "Le thème sélectionné sera le thème par défaut de tous les utilisateurs. Ils pourront changer depuis leur page de profil.";
$lang['welcome_title'] = "Titre de bienvenue";
$lang['welcome_title_info'] = "Active le titre qui s'affiche en haut du Tableau de bord.";
$lang['welcome_title_message'] = "Message du titre de bienvenue";
$lang['welcome_title_message_info'] = "Le message du titre de bienvenue affiché en haut du Tableau de bord (html autorisé).";
$lang['logo_link'] = "Lien du logo";
$lang['logo_link_info'] = "Le lien vers où on est redirigé si on clique sur le logo. <b style='font-size:10px; font-weight:normal;'>(Laissez vide si vous voulez que ça redirige vers le Tableau de bord)</b>";
$lang['custom_tab'] = "Onglet personnalisé";
$lang['custom_tab_info'] = "Permet d'ajouter un onglet à la fin du menu. <b style='font-size:10px; font-weight:normal;'>(Activez-le puis validez pour le paramétrer)</b>";
$lang['custom_tab_name'] = "Nom de l'onglet personnalisé";
$lang['custom_tab_name_info'] = "Le nom sur l'onglet personnalisé.";
$lang['custom_tab_link'] = "Lien de l'onglet personnalisé";
$lang['custom_tab_link_info'] = "Le lien sur lequel on est redirigé si on clique sur l'onglet personnalisé.";
$lang['custom_tab_sub'] = "Sous-onglet personnalisé";
$lang['custom_tab_sub_info'] = "Ajoute plusieurs sous-onglets personnalisés en dessous de l'onglet personnalisé.";
$lang['custom_tab_sub_name'] = "Nom du sous-onglet #1";
$lang['custom_tab_sub_link'] = "Lien du sous-onglet #1";
$lang['custom_tab_sub_name2'] = "Nom du sous-onglet #2";
$lang['custom_tab_sub_link2'] = "Lien du sous-onglet #2";
$lang['custom_tab_sub_name3'] = "Nom du sous-onglet #3";
$lang['custom_tab_sub_link3'] = "Lien du sous-onglet #3";
$lang['custom_tab_sub_name4'] = "Nom du sous-onglet #4";
$lang['custom_tab_sub_link4'] = "Lien du sous-onglet #4";
$lang['custom_tab_target_blank'] = "Cible des (sous-)onglets personnalisés";
$lang['custom_tab_target_blank_info'] = "Définit la cible de tous les onglets. <b style='font-size:10px; font-weight:normal;'>('_self' = le lien s'ouvre dans la même page. '_blank'  =  le lien s'ouvre dans un nouvel onglet.)</b>";
$lang['bg_wrapper'] = "Fond d'écran du panneau";
$lang['bg_wrapper_info'] = "L'image fond d'écran du panneau. <b style='font-size:10px; font-weight:normal;'>(Pas disponible sur tous les thèmes.)</b>";

?>
