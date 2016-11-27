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

define('maintenance_mode', "Maintenance");
define('maintenance_mode_info', "Désactive le site pour que seuls les Administrateurs puissent s&apos;y connecter.");
define('maintenance_title', "Titre pour la maintenance");
define('maintenance_title_info', "Le titre qui est affiché aux utilisateurs durant la maintenance.");
define('maintenance_message', "Message de la Maintenance");
define('maintenance_message_info', "Le message qui est affiché aux utilisateurs durant la maintenance.");
define('update_settings', "Mettre à jour les paramètres");
define('settings_updated', "Paramètres mis à jour avec succès.");
define('panel_language', "Langue du Panneau");
define('panel_language_info', "La langue définie ici est la langue par défaut du Panneau. Les utilisateurs peuvent la changer depuis leur page de profil.");
define('page_auto_refresh', "Rafraîchissement automatique des pages");
define('page_auto_refresh_info', "Le rafraîchissement automatique des pages est surtout utilisé dans les pages de logs. Il est préférable de l&aposactiver.");
define('smtp_server', "Serveur e-mail sortant");
define('smtp_server_info', "C&apos;est le serveur sortant pour les e-mails (serveur SMTP) qui est utilisé pour, par exemple, envoyer les mots de passe aux utilisateurs.<br>'localhost' par défaut.");
define('panel_email_address', "Adresse e-mail sortante");
define('panel_email_address_info', "C&apos;est l&apos;adresse e-mail qui est utilisée pour envoyer les e-mails.");
define('panel_name', "Nom du Panneau");
define('panel_name_info', "Le nom du Panneau qui est affiché dans le titre des pages. Cette valeur écrase les titres des pages si elle est définie.");
define('feed_enable', "Activer LGSL Feed");
define('feed_enable_info', "Si votre hébergement web a un pare-feu (firewall) bloquant les requêtes sur les ports, vous devez l&apos;activer.");
define('feed_url', "URL de Feed");
define('feed_url_info', "GrayCube.com partage un 'LGSL Feed' depuis l&apos;URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('charset', "Encodage des caractères");
define('charset_info', "UTF8, ISO, ASCII, etc... Laissez vide pour utiliser l&apos;encodage ISO.");
define('steam_user', "Nom d'utilisateur Steam");
define('steam_user_info', "Ce nom d&apos;utilisateur est utilisé pour se connecter à Steam et télécharger les serveurs de jeux comme CS:GO.");
define('steam_pass', "Mot de passe Steam");
define('steam_pass_info', "Le mot de passe pour le compte Steam utilisé.");
define('steam_guard', "Steam Guard");
define('steam_guard_info', "Des utilisateurs ont Steam Guard activé pour protéger leur compte des pirates,<br>ce code est envoyé par e-mail lors de la première installation par Steam.");
define('smtp_port', "Port SMTP");
define('smtp_port_info', "Si le port SMTP n&apos;est pas celui par défaut (25), entrez le ici.");
define('smtp_login', "Utilisateur SMTP");
define('smtp_login_info', "Si le serveur SMTP requiert une authentification, entrez votre nom d&apos;utilisateur ici.");
define('smtp_passw', "Mot de passe SMTP");
define('smtp_passw_info', "Si vous ne mettez pas de mot de passe, l&apos;authentification STMP sera désactivée.");
define('smtp_secure', "Sécurisation SMTP");
define('smtp_secure_info', "Utilisez-vous le SSL/TLS pour vous connecter à votre serveur SMTP?");
define('time_zone', "Fuseau horaire");
define('time_zone_info', "Définissez le fuseau horaire utilisé par défaut pour toutes les dates et horaires.");
define('query_cache_life', "Temps de vie du cache des requêtes");
define('query_cache_life_info', "Définissez le délai en secondes avant que le statut du serveur ne soit rafraîchi.");
define('query_num_servers_stop', "Désactiver l&apos;interrogation du Serveur de Jeu après");
define('query_num_servers_stop_info', "Utiliser ce paramètre pour désactiver l&apos;interrogation du serveur si l&apos;utilisateur possède plus de serveurs que la valeur spécifiée pour accélérer le chargement de Panneau.");
define('editable_email', "Adresse e-mail éditable");
define('editable_email_info', "Choisissez si l&apos;utilisateur peut modifier son adresse e-mail.");
define('old_dashboard_behavior', "Ancien comportement du Tableau de Bord");
define('old_dashboard_behavior_info', "L&apos;ancien Tableau de Bord était plus lent mais montrait plus d&apos;informations sur le serveur, les joueurs et la carte.");
define('rsync_available', "Serveurs Rsync disponibles");
define('rsync_available_info', "Choisissez quelle liste de serveurs sera visible à l&apos;installation Rsync.");
define('all_available_servers', "Tous serveurs disponibles ( rsync_sites.list + rsync_sites_local.list )");
define('only_remote_servers', "Seulement les serveurs distants ( rsync_sites.list )");
define('only_local_servers', "Seulement les serveurs locaux ( rsync_sites_local.list )");
define('header_code', "Code Header");
define('header_code_info', "Ici vous pouvez écrire votre propre code Header (comme du code HTML, du code intégré, etc.) sans éditer la structure du thème.");
define('support_widget_title', "Titre du widget Assistance");
define('support_widget_title_info', "Un titre personnalisé pour le widget Assistance dans le Tableau de Bord.");
define('support_widget_content', "Contenu du widget Assistance");
define('support_widget_content_info', "Le contenu du widget Assistance, vous pouvez utiliser du code HTML.");
define('support_widget_link', "Lien du widget Assistance");
define('support_widget_link_info', "L&apos;URL de votre site d&apos;Assistance.");
define('recaptcha_site_key', "Clé de Site Recaptcha");
define('recaptcha_site_key_info', "La clé de site fournie par Google.");
define('recaptcha_secret_key', "Clé Secrète Recaptcha");
define('recaptcha_secret_key_info', "La clé secrète fournie par Google.");
define('recaptcha_use_login', "Utiliser Recaptcha à l'Authentification");
define('recaptcha_use_login_info', "Si activé, l&apos;utilisateur devra résoudre le Recaptcha 'Je ne suis pas un Robot' lors de l&apos;authentification.");
define('remote_query', "Interrogation à distance");
define('remote_query_info', "Utiliser le serveur distant (Agent) pour interroger les serveurs de jeu (seulement GameQ et LGSL).");
define('check_expiry_by', "Vérifier l'expiration en utilisant");
define('check_expiry_by_info', "Si mis sur Once Logged In, l&apos;attribution de serveur de jeu de l&apos;utilisateur sera automatiquement supprimée si la date d&apos;expiration est dépassée. Si mis sur CRON Job, vous devrez créer une tâche CRON en utilisant le module CRON pour vérifier la date d&apos;expiration à un intervalle déterminé.");
define('once_logged_in', "Once Logged In");
define('cron_job', "CRON Job");
define('theme_settings', "Paramètres du thème");
define('theme', "Thème");
define('theme_info', "Le thème sélectionné sera le thème par défaut de tous les utilisateurs. Ils pourront le changer depuis leur page de profil.");
define('welcome_title', "Titre de bienvenue");
define('welcome_title_info', "Active le titre qui s&apos;affiche en haut du Tableau de Bord.");
define('welcome_title_message', "Message du titre de bienvenue");
define('welcome_title_message_info', "Le message du titre de bienvenue affiché en haut du Tableau de Bord (HTML autorisé).");
define('logo_link', "Lien du logo");
define('logo_link_info', "Le lien vers où on est redirigé si on clique sur le logo. <b style='font-size:10px; font-weight:normal;'>(Laissez vide si vous voulez que ça redirige vers le Tableau de Bord)</b>");
define('custom_tab', "Onglet personnalisé");
define('custom_tab_info', "Permet d&apos;ajouter un onglet à la fin du menu. <b style='font-size:10px; font-weight:normal;'>(Activez-le puis validez pour le paramétrer)</b>");
define('custom_tab_name', "Nom de l'onglet personnalisé");
define('custom_tab_name_info', "Le nom sur l&apos;onglet personnalisé.");
define('custom_tab_link', "Lien de l'onglet personnalisé");
define('custom_tab_link_info', "Le lien sur lequel on est redirigé si on clique sur l&apos;onglet personnalisé.");
define('custom_tab_sub', "Sous-onglet personnalisé");
define('custom_tab_sub_info', "Ajoute plusieurs sous-onglets personnalisés en dessous de l&apos;onglet personnalisé.");
define('custom_tab_sub_name', "Nom du sous-onglet #1");
define('custom_tab_sub_link', "Lien du sous-onglet #1");
define('custom_tab_sub_name2', "Nom du sous-onglet #2");
define('custom_tab_sub_link2', "Lien du sous-onglet #2");
define('custom_tab_sub_name3', "Nom du sous-onglet #3");
define('custom_tab_sub_link3', "Lien du sous-onglet #3");
define('custom_tab_sub_name4', "Nom du sous-onglet #4");
define('custom_tab_sub_link4', "Lien du sous-onglet #4");
define('custom_tab_target_blank', "Cible des sous-onglets personnalisés");
define('custom_tab_target_blank_info', "Définit la cible de tous les onglets. <b style='font-size:10px; font-weight:normal;'>('_self' = le lien s&apos;ouvre dans la même page. '_blank'  =  le lien s&apos;ouvre dans un nouvel onglet.)</b>");
define('bg_wrapper', "Image de fond du Panneau");
define('bg_wrapper_info', "L&apos;image de fond du Panneau. <b style='font-size:10px; font-weight:normal;'>(Pas disponible sur tous les thèmes.)</b>");
?>