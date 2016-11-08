<?php

// General
define('error', "erreur");
define('title', "Interface web TeamSpeak 3");
define('update_available', '<h3>Attention : Une nouvelle version (v%1) de ce logiciel est disponible : <a href="%2" target="_blank">%2</a>.</h3>');

// Head
define('head_logout', "Se déconnecter");
define('head_vserver_switch', "Changer vServeur");
define('head_vserver_overview', "Vue d'ensemble vServer");
define('head_vserver_token', "Gestion des tokens");
define('head_vserver_liveview', "Vue en direct");

// Errors
define('e_fill_out', "Veuillez remplir tous les champs requis.");
define('e_upload_failed', "Erreur lors de l'upload.");
define('e_server_responded', "Le serveur a répondu : ");
define('e_conn_serverquery', "Impossible de créer l'accès ServerQuery.");
define('e_conn_vserver', "Impossible de choisir le serveur virtuel.");
define('e_session_timedout', "Session expirée.");
define('js_error', "Erreur");
define('js_ajax_error', "Une erreur AJAX est survenue. %1");
define('js_confirm_server_stop', "Voulez-vous vraiment arrêter le serveur #%1 ?");
define('js_confirm_server_delete', "Voulez-vous vraiment SUPPRIMER le serveur #%1 ?");
define('js_notice_server_deleted', "Le serveur %1 a été supprimé avec succès.\nLa vue d'ensemble va être rechargée maintenant.");
define('js_prompt_banduration', "Durée en heures (0 = illimitée) : ");
define('js_prompt_banreason', "Raison (optionel) : ");
define('js_prompt_msg_to', "Message texte à %1 #%2 : ");
define('js_prompt_poke_to', "Pokemessage au client #%1 : ");
define('js_prompt_new_propvalue', "Nouvelle valeur pour '%1' : ");

// Notices
define('n_server_responded', "Le serveur a répondu : ");

// Login
define('login_serverquery', "Connexion ServerQuery");
define('login_name', "Nom d'utilisateur");
define('login_password', "Mot de passe");
define('login_submit', "Se connecter");

// Select vServer page
define('vsselect_headline', "Sélection vServer");
define('vsselect_id', "ID #");
define('vsselect_name', "Nom");
define('vsselect_ip', "IP");
define('vsselect_port', "Port");
define('vsselect_state', "Statut");
define('vsselect_clients', "Clients");
define('vsselect_uptime', "Uptime");
define('vsselect_choose', "sélectionner");
define('vsselect_start', "démarrer");
define('vsselect_stop', "arrêter");
define('vsselect_delete', "SUPPRIMER");
define('vsselect_new_headline', "Créer un nouveau serveur virtuel");
define('vsselect_new_servername', "Nom du serveur");
define('vsselect_new_slots', "Slots de client");
define('vsselect_new_create', "Créer");
define('vsselect_new_added_ok', "vServer <span class=\"online\">%1</span> a été créé avec succès.");
define('vsselect_new_added_generated', "Le token généré est :");

// VDS overview
define('vsoverview_virtualserver', "Serveur virtuel");
define('vsoverview_information_head', "Information");
define('vsoverview_connection_head', "Connexion");
define('vsoverview_info_general_head', "Paramètres généraux");
define('vsoverview_info_servername', "Nom du serveur");
define('vsoverview_info_host', "Hôte");
define('vsoverview_info_state', "Statut");
define('vsoverview_info_state_port', "Port");
define('vsoverview_info_uptime', "Uptime");
define('vsoverview_info_welcomemsg', "Message de<br />bienvenue");
define('vsoverview_info_hostmsg', "Message d'hôte");
define('vsoverview_info_hostmsg_mode_output', "sortie");
define('vsoverview_info_hostmsg_mode_0', "aucune");
define('vsoverview_info_hostmsg_mode_1', "dans le log du chat");
define('vsoverview_info_hostmsg_mode_2', "fenêtre");
define('vsoverview_info_hostmsg_mode_3', "Fenêtre + Déconnexion");
define('vsoverview_info_req_security', "Niveau de sécurité");
define('vsoverview_info_req_securitylvl', "obligatoire");
define('vsoverview_info_hostbanner_head', "Bannière d'hôte");
define('vsoverview_info_hostbanner_url', "URL");
define('vsoverview_info_hostbanner_imgurl', "Adresse de l'image");
define('vsoverview_info_hostbanner_buttonurl', "URL de la bannière d'hôte");
define('vsoverview_info_antiflood_head', "Anti-Flood");
define('vsoverview_info_antiflood_warning', "Avertissement activé");
define('vsoverview_info_antiflood_kick', "Kick activé");
define('vsoverview_info_antiflood_ban', "Ban activé");
define('vsoverview_info_antiflood_banduration', "Durée du ban");
define('vsoverview_info_antiflood_decrease', "réduire");
define('vsoverview_info_antiflood_points', "points");
define('vsoverview_info_antiflood_in_seconds', "secondes");
define('vsoverview_info_antiflood_points_per_tick', "Point par tick");
define('vsoverview_conn_total_head', "Total");
define('vsoverview_conn_total_packets', "paquets");
define('vsoverview_conn_total_bytes', "bytes");
define('vsoverview_conn_total_send', "envoyés");
define('vsoverview_conn_total_received', "reçus");
define('vsoverview_conn_bandwidth_head', "Bande passane");
define('vsoverview_conn_bandwidth_last', "dernière");
define('vsoverview_conn_bandwidth_second', "seconde");
define('vsoverview_conn_bandwidth_minute', "minute");
define('vsoverview_conn_bandwidth_send', "envoyée");
define('vsoverview_conn_bandwidth_received', "reçue");

// vServer Token
define('vstoken_token_virtualserver', "Serveur virtuel");
define('vstoken_token_head', "Token");
define('vstoken_token_type', "Type de groupe");
define('vstoken_token_id1', "Serveurgroupe/<br />Channelgroupe");
define('vstoken_token_id2', "(Channel)");
define('vstoken_token_tokencode', "Tokencode");
define('vstoken_token_delete', "supprimer");
define('vstoken_new_head', "Créer un nouveau token");
define('vstoken_new_create', "Générer");
define('vstoken_new_tokentype', "Type de token :");
define('vstoken_new_servergroup', "Groupe serveur");
define('vstoken_new_channelgroup', "Groupe channel");
define('vstoken_new_select_group', "Serveurgroupe");
define('vstoken_new_select_channelgroup', "Channelgroupe");
define('vstoken_new_select_channel', "Channel");
define('vstoken_new_tokentype_0', "Serveur");
define('vstoken_new_tokentype_1', "Channel");
define('vstoken_new_added_ok', "Le token a été généré avec succès.");

// vServer Liveview
define('vsliveview_server_virtualserver', "Serveur virtuel");
define('vsliveview_server_head', "vue en direct");
define('vsliveview_liveview_enable_autorefresh', "Rafraîchissement auto");
define('vsliveview_liveview_tooltip_to_channel', "vers channel #");
define('vsliveview_liveview_tooltip_switch', "Changer");
define('vsliveview_liveview_tooltip_send_msg', "Envoyer Message");
define('vsliveview_liveview_tooltip_poke', "Poke");
define('vsliveview_liveview_tooltip_kick', "Kick");
define('vsliveview_liveview_tooltip_ban', "Ban");
define('vsoverview_banlist_head', "Liste des bans");
define('vsoverview_banlist_id', "ID #");
define('vsoverview_banlist_ip', "IP");
define('vsoverview_banlist_name', "Nom");
define('vsoverview_banlist_uid', "UniqueID");
define('vsoverview_banlist_reason', "Raison");
define('vsoverview_banlist_created', "créé");
define('vsoverview_banlist_duration', "Durée");
define('vsoverview_banlist_end', "fin");
define('vsoverview_banlist_unlimited', "illimitée");
define('vsoverview_banlist_never', "jamais");
define('vsoverview_banlist_new_head', "Créer un nouveau ban");
define('vsoverview_banlist_new_create', "créer");
define('vsliveview_channelbackup_head', "Channelbackup");
define('vsliveview_channelbackup_get', "Créer et télécharger");
define('vsliveview_channelbackup_load', "Upload un Channelbackup");
define('vsliveview_channelbackup_load_submit', "recréer");
define('vsliveview_channelbackup_new_added_ok', "Channelbackup succès.");

// Counter
define('time_day', "jour");
define('time_days', "jours");
define('time_hour', "heure");
define('time_hours', "heures");
define('time_minute', "minute");
define('time_minutes', "minutes");
define('time_second', "seconde");
define('time_seconds', "secondes");

// Error numbers
define('e_2568', "Vous n'avez pas les droits suffisants.");
define('temp_folder_not_writable', "Le dossier (%s) n'est pas inscriptible.");

// Subusers
define('unassign_from_subuser', "Désattribuer du sous utilisateur.");
define('assign_to_subuser', "Attribuer au sous utilisateur.");
define('select_subuser', "Selectionner sous utilisateur.");
?>