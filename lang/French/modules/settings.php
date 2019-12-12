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

define('OGP_LANG_maintenance_mode', "Maintenance");
define('OGP_LANG_maintenance_mode_info', "Désactive le site pour que seuls les administrateurs puissent s'y connecter.");
define('OGP_LANG_maintenance_title', "Titre pour la maintenance");
define('OGP_LANG_maintenance_title_info', "Le titre qui est affiché aux utilisateurs durant la maintenance.");
define('OGP_LANG_maintenance_message', "Message de la Maintenance");
define('OGP_LANG_maintenance_message_info', "Le message qui est affiché aux utilisateurs durant la maintenance.");
define('OGP_LANG_update_settings', "Mettre à jour les paramètres");
define('OGP_LANG_settings_updated', "Paramètres mis à jour avec succès.");
define('OGP_LANG_panel_language', "Langue du Panneau");
define('OGP_LANG_panel_language_info', "La langue définie ici est la langue par défaut du Panneau. Les utilisateurs peuvent la changer depuis leur page de profil.");
define('OGP_LANG_page_auto_refresh', "Rafraîchissement automatique des pages");
define('OGP_LANG_page_auto_refresh_info', "Le rafraîchissement automatique des pages est surtout utilisé dans les pages de logs. Il est préférable de l&aposactiver.");
define('OGP_LANG_smtp_server', "Serveur e-mail sortant");
define('OGP_LANG_smtp_server_info', "C&apos;est le serveur sortant pour les e-mails (serveur SMTP) qui est utilisé pour, par exemple, envoyer les mots de passe aux utilisateurs.<br>'localhost' par défaut.");
define('OGP_LANG_panel_email_address', "Adresse e-mail sortante");
define('OGP_LANG_panel_email_address_info', "C&apos;est l&apos;adresse e-mail qui est utilisée pour envoyer les e-mails.");
define('OGP_LANG_panel_name', "Nom du Panneau");
define('OGP_LANG_panel_name_info', "Le nom du Panneau qui est affiché dans le titre des pages. Cette valeur écrase les titres des pages si elle est définie.");
define('OGP_LANG_feed_enable', "Activer LGSL Feed");
define('OGP_LANG_feed_enable_info', "Si votre hébergement web a un pare-feu (firewall) bloquant les requêtes sur les ports, vous devez ouvrir le port manuellement.");
define('OGP_LANG_feed_url', "URL de Feed");
define('OGP_LANG_feed_url_info', "GrayCube.com partage un 'LGSL Feed' depuis l&apos;URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Nom d'utilisateur Steam");
define('OGP_LANG_steam_user_info', "Ce nom d&apos;utilisateur est utilisé pour se connecter à Steam et télécharger les serveurs de jeux comme CS:GO.");
define('OGP_LANG_steam_pass', "Mot de passe Steam");
define('OGP_LANG_steam_pass_info', "Le mot de passe pour le compte Steam utilisé.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Des utilisateurs ont Steam Guard activé pour protéger leur compte des pirates,<br>ce code est envoyé par e-mail lors de la première installation par Steam.");
define('OGP_LANG_smtp_port', "Port SMTP");
define('OGP_LANG_smtp_port_info', "Si le port SMTP n&apos;est pas celui par défaut (25), entrez le ici.");
define('OGP_LANG_smtp_login', "Utilisateur SMTP");
define('OGP_LANG_smtp_login_info', "Si le serveur SMTP requiert une authentification, entrez votre nom d&apos;utilisateur ici.");
define('OGP_LANG_smtp_passw', "Mot de passe SMTP");
define('OGP_LANG_smtp_passw_info', "Si vous ne mettez pas de mot de passe, l&apos;authentification STMP sera désactivée.");
define('OGP_LANG_smtp_secure', "Sécurisation SMTP");
define('OGP_LANG_smtp_secure_info', "Utilisez-vous le SSL/TLS pour vous connecter à votre serveur SMTP?");
define('OGP_LANG_time_zone', "Fuseau horaire");
define('OGP_LANG_time_zone_info', "Définissez le fuseau horaire utilisé par défaut pour toutes les dates et horaires.");
define('OGP_LANG_query_cache_life', "Temps de vie du cache des requêtes");
define('OGP_LANG_query_cache_life_info', "Définissez le délai en secondes avant que le statut du serveur ne soit rafraîchi.");
define('OGP_LANG_query_num_servers_stop', "Désactiver l&apos;interrogation du Serveur de Jeu après");
define('OGP_LANG_query_num_servers_stop_info', "Utiliser ce paramètre pour désactiver l&apos;interrogation du serveur si l&apos;utilisateur possède plus de serveurs que la valeur spécifiée pour accélérer le chargement de Panneau.");
define('OGP_LANG_editable_email', "Adresse e-mail éditable");
define('OGP_LANG_editable_email_info', "Choisissez si l&apos;utilisateur peut modifier son adresse e-mail.");
define('OGP_LANG_old_dashboard_behavior', "Ancien comportement du Tableau de Bord");
define('OGP_LANG_old_dashboard_behavior_info', "L&apos;ancien Tableau de Bord était plus lent mais montrait plus d&apos;informations sur le serveur, les joueurs et la carte.");
define('OGP_LANG_rsync_available', "Serveurs Rsync disponibles");
define('OGP_LANG_rsync_available_info', "Choisissez quelle liste de serveurs sera visible à l&apos;installation Rsync.");
define('OGP_LANG_all_available_servers', "Tous serveurs disponibles ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Seulement les serveurs distants ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Seulement les serveurs locaux ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Code Header");
define('OGP_LANG_header_code_info', "Ici vous pouvez écrire votre propre code Header (comme du code HTML, du code intégré, etc.) sans éditer la structure du thème.");
define('OGP_LANG_support_widget_title', "Titre du widget Assistance");
define('OGP_LANG_support_widget_title_info', "Un titre personnalisé pour le widget Assistance dans le Tableau de Bord.");
define('OGP_LANG_support_widget_content', "Contenu du widget Assistance");
define('OGP_LANG_support_widget_content_info', "Le contenu du widget Assistance, vous pouvez utiliser du code HTML.");
define('OGP_LANG_support_widget_link', "Lien du widget Assistance");
define('OGP_LANG_support_widget_link_info', "L&apos;URL de votre site d&apos;Assistance.");
define('OGP_LANG_recaptcha_site_key', "Clé de Site Recaptcha");
define('OGP_LANG_recaptcha_site_key_info', "La clé de site fournie par Google.");
define('OGP_LANG_recaptcha_secret_key', "Clé Secrète Recaptcha");
define('OGP_LANG_recaptcha_secret_key_info', "La clé secrète fournie par Google.");
define('OGP_LANG_recaptcha_use_login', "Utiliser Recaptcha à l'Authentification");
define('OGP_LANG_recaptcha_use_login_info', "Si activé, l&apos;utilisateur devra résoudre le Recaptcha 'Je ne suis pas un Robot' lors de l&apos;authentification.");
define('OGP_LANG_login_attempts_before_banned', "Nombre de tentatives de connexion échouées avant d'être banni");
define('OGP_LANG_login_attempts_before_banned_info', "Si un utilisateur essaye de se connecter avec de mauvaises informations plus de fois que défini ici, l&apos;utilisateur sera banni temporairement par le Panneau.");
define('OGP_LANG_custom_github_update_username', "Nom d'utilisateur GitHub");
define('OGP_LANG_custom_github_update_username_info', "Entrer votre nom d&apos;utilisateur GitHub UNIQUEMENT pour utiliser votre propre dépôt pour mettre à jour OGP. Ceci ne doit être changé seulement par les développeurs qui souhaitent utiliser leur propre dépôt de développement plutôt que tester leur code éventuellement bugué dans la branche principale.");
define('OGP_LANG_remote_query', "Interrogation à distance");
define('OGP_LANG_remote_query_info', "Utiliser le serveur distant (Agent) pour interroger les serveurs de jeu (seulement GameQ et LGSL).");
define('OGP_LANG_check_expiry_by', "Vérifier l'expiration en utilisant");
define('OGP_LANG_check_expiry_by_info', "Si mis sur Once Logged In, l&apos;attribution de serveur de jeu de l&apos;utilisateur sera automatiquement supprimée si la date d&apos;expiration est dépassée. Si mis sur CRON Job, vous devrez créer une tâche CRON en utilisant le module CRON pour vérifier la date d&apos;expiration à un intervalle déterminé.");
define('OGP_LANG_once_logged_in', "Once Logged In");
define('OGP_LANG_cron_job', "CRON Job");
define('OGP_LANG_theme_settings', "Paramètres du thème");
define('OGP_LANG_theme', "Thème");
define('OGP_LANG_theme_info', "Le thème sélectionné sera le thème par défaut de tous les utilisateurs. Ils pourront le changer depuis leur page de profil.");
define('OGP_LANG_welcome_title', "Titre de bienvenue");
define('OGP_LANG_welcome_title_info', "Active le titre qui s&apos;affiche en haut du Tableau de Bord.");
define('OGP_LANG_welcome_title_message', "Message du titre de bienvenue");
define('OGP_LANG_welcome_title_message_info', "Le message du titre de bienvenue affiché en haut du Tableau de Bord (HTML autorisé).");
define('OGP_LANG_logo_link', "Lien du logo");
define('OGP_LANG_logo_link_info', "Le lien vers où on est redirigé si on clique sur le logo. <b style='font-size:10px; font-weight:normal;'>(Laissez vide si vous voulez que ça redirige vers le Tableau de Bord)</b>");
define('OGP_LANG_custom_tab', "Onglet personnalisé");
define('OGP_LANG_custom_tab_info', "Permet d&apos;ajouter un onglet à la fin du menu. <b style='font-size:10px; font-weight:normal;'>(Activez-le puis validez pour le paramétrer)</b>");
define('OGP_LANG_custom_tab_name', "Nom de l'onglet personnalisé");
define('OGP_LANG_custom_tab_name_info', "Le nom sur l&apos;onglet personnalisé.");
define('OGP_LANG_custom_tab_link', "Lien de l'onglet personnalisé");
define('OGP_LANG_custom_tab_link_info', "Le lien sur lequel on est redirigé si on clique sur l&apos;onglet personnalisé.");
define('OGP_LANG_custom_tab_sub', "Sous-onglet personnalisé");
define('OGP_LANG_custom_tab_sub_info', "Ajoute plusieurs sous-onglets personnalisés en dessous de l&apos;onglet personnalisé.");
define('OGP_LANG_custom_tab_sub_name', "Nom du sous-onglet #1");
define('OGP_LANG_custom_tab_sub_link', "Lien du sous-onglet #1");
define('OGP_LANG_custom_tab_sub_name2', "Nom du sous-onglet #2");
define('OGP_LANG_custom_tab_sub_link2', "Lien du sous-onglet #2");
define('OGP_LANG_custom_tab_sub_name3', "Nom du sous-onglet #3");
define('OGP_LANG_custom_tab_sub_link3', "Lien du sous-onglet #3");
define('OGP_LANG_custom_tab_sub_name4', "Nom du sous-onglet #4");
define('OGP_LANG_custom_tab_sub_link4', "Lien du sous-onglet #4");
define('OGP_LANG_custom_tab_target_blank', "Cible des sous-onglets personnalisés");
define('OGP_LANG_custom_tab_target_blank_info', "Définit la cible de tous les onglets. <b style=\"font-size:10px; font-weight:normal;\">(Self_Page = le lien s'ouvre dans la même page. New_Page = le lien s'ouvre dans un nouvel onglet.)</b>");
define('OGP_LANG_bg_wrapper', "Image de fond du Panneau");
define('OGP_LANG_bg_wrapper_info', "L&apos;image de fond du Panneau. <b style='font-size:10px; font-weight:normal;'>(Pas disponible sur tous les thèmes.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Voir les IDs des Serveurs dans la  Gestion des Serveurs");
define('OGP_LANG_show_server_id_game_monitor_info', "Afficher la colonne des IDs des Serveurs dans la page de Gestion des Serveurs qui correspondent aux IDs attribués lors de la création des Serveurs de Jeu.");
define('OGP_LANG_default_game_server_home_path_prefix', "Dossier par défaut des serveurs de jeu");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Entrer un préfixe de chemin où vous souhaitez que les dossiers des serveurs de jeu soient créés.  Vous pouvez utiliser \"{USERNAME}\" dans le chemin qui sera ensuite remplacé par le nom d&apos;utilisateur OGP auquel le serveur est assigné. Vous pouvez utiliser \"{GAMEKEY}\" dans le chemin qui sera ensuite remplacé par un nom de jeu en minuscule.  Vous pouvez utiliser \"{SKIPID}\" n&apos;importe où dans le chemin pour empêcher d&apos;apposer l&apos;ID du serveur de jeu au chemin.  Exemple: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} deviendra /ogp/games/username/arkse/.  Exemple 2:  /ogp/games deviendra /ogp/games/1 où 1 est l&apos;ID du serveur de jeu.");
define('OGP_LANG_use_authorized_hosts', "Limiter l'API aux Hôtes Autorisés");
define('OGP_LANG_use_authorized_hosts_info', "Activer ce paramètre pour seulement autoriser les appels à l&apos;API par les IP des hôtes approuvés.&nbsp; Les adresses approuvées peuvent être définies sur cette page une fois le paramètre activé.&nbsp; Si ce paramètre est désactivé, un utilisateur possédant un clé valide d&apos;API aura accès à l&apos;API à partir de n&apos;importe quelle adresse IP.&nbsp; Des utilisateurs possédant une clé valide pourra utiliser l&apos;API pourra gérer tous les serveurs de jeux pour qu&apos;ils sont autorisés à administrer.");
define('OGP_LANG_setup_api_authorized_hosts', "Paramétrer les hôtes autorisés pour l'API");
define('OGP_LANG_autohorized_hosts', "Hôtes autorisés");
define('OGP_LANG_add', "Ajouter");
define('OGP_LANG_remove', "Supprimer");
define('OGP_LANG_default_trusted_hosts', "Hôtes de confiance par défaut");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Hôtes de confiance ou Proxys (Adresses IPv4/IPv6 ou CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "IPs de confiance transférées (Adresses IPv4/IPv6 ou CIDR)");
define('OGP_LANG_reset_game_server_order', "Réinitialiser l'ordre des serveurs");
define('OGP_LANG_reset_game_server_order_info', "Remettre l&apos;ordre des serveurs par défaut en utilisant l&apos;ID du serveur");


?>
