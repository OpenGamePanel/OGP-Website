<?php

// General
$lang['error'] = "erreur";
$lang['title'] = "Interface web TeamSpeak 3";
$lang['login'] = 'Se connecter';

$lang['update_available'] = '<h3>Attention : Une nouvelle version (v%1) de ce logiciel est disponible : <a href="%2" target="_blank">%2</a>.</h3>';

// Head
$lang['head_logout'] = "Se déconnecter";
$lang['head_vserver_switch'] = "Changer vServeur";
$lang['head_vserver_overview'] = "Vue d'ensemble vServer";
$lang['head_vserver_token'] = "Gestion des tokens";
$lang['head_vserver_liveview'] = "Vue en direct";

// Errors
$lang['e_fill_out'] = "Veuillez remplir tous les champs requis.";
$lang['e_upload_failed'] = "Erreur lors de l'upload.";
$lang['e_server_responded'] = "Le serveur a répondu : ";
$lang['e_conn_serverquery'] = "Impossible de créer l'accès ServerQuery.";
$lang['e_conn_vserver'] = "Impossible de choisir le serveur virtuel.";
$lang['e_session_timedout'] = "Session expirée.";


$lang['js_error'] = "Erreur";
$lang['js_ajax_error'] = "Une erreur AJAX est survenue. %1";
$lang['js_confirm_server_stop'] = "Voulez-vous vraiment arrêter le serveur #%1 ?";
$lang['js_confirm_server_delete'] = "Voulez-vous vraiment SUPPRIMER le serveur #%1 ?";
$lang['js_notice_server_deleted'] = "Le serveur %1 a été supprimé avec succès.\nLa vue d'ensemble va être rechargée maintenant.";
$lang['js_prompt_banduration'] = "Durée en heures (0 = illimitée) : ";
$lang['js_prompt_banreason'] = "Raison (optionel) : ";
$lang['js_prompt_msg_to'] = "Message texte à %1 #%2 : ";
$lang['js_prompt_poke_to'] = "Pokemessage au client #%1 : ";
$lang['js_prompt_new_propvalue'] = "Nouvelle valeur pour '%1' : ";


// Notices
$lang['n_server_responded'] = "Le serveur a répondu : ";

// Login
$lang['login_serverquery'] = "Connexion ServerQuery";
$lang['login_name'] = "Nom d'utilisateur";
$lang['login_password'] = "Mot de passe";
$lang['login_submit'] = "Se connecter";

// Select vServer page
$lang['vsselect_headline'] = "Sélection vServer";
$lang['vsselect_id'] = "ID #";
$lang['vsselect_name'] = "Nom";
$lang['vsselect_ip'] = "IP";
$lang['vsselect_port'] = "Port";
$lang['vsselect_state'] = "Statut";
$lang['vsselect_clients'] = "Clients";
$lang['vsselect_uptime'] = "Uptime";
$lang['vsselect_choose'] = "sélectionner";
$lang['vsselect_start'] = "démarrer";
$lang['vsselect_stop'] = "arrêter";
$lang['vsselect_delete'] = "SUPPRIMER";

$lang['vsselect_new_headline'] = "Créer un nouveau serveur virtuel";
$lang['vsselect_new_servername'] = "Nom du serveur";
$lang['vsselect_new_slots'] = "Slots de client";
$lang['vsselect_new_create'] = "Créer";

$lang['vsselect_new_added_ok'] = "vServer <span class=\"online\">%1</span> a été créé avec succès.";
$lang['vsselect_new_added_generated'] = "Le token généré est :";

// VDS overview
$lang['vsoverview_virtualserver'] = "Serveur virtuel";
$lang['vsoverview_information_head'] = "Information";
$lang['vsoverview_connection_head'] = "Connexion";
$lang['vsoverview_info_general_head'] = "Paramètres généraux";

$lang['vsoverview_info_servername'] = "Nom du serveur";
$lang['vsoverview_info_host'] = "Hôte";
$lang['vsoverview_info_state'] = "Statut";
$lang['vsoverview_info_state_port'] = "Port";
$lang['vsoverview_info_uptime'] = "Uptime";
$lang['vsoverview_info_welcomemsg'] = "Message de<br />bienvenue";
$lang['vsoverview_info_hostmsg'] = "Message d'hôte";
$lang['vsoverview_info_hostmsg_mode_output'] = "sortie";
$lang['vsoverview_info_hostmsg_mode_0'] = "aucune";
$lang['vsoverview_info_hostmsg_mode_1'] = "dans le log du chat";
$lang['vsoverview_info_hostmsg_mode_2'] = "fenêtre";
$lang['vsoverview_info_hostmsg_mode_3'] = "Fenêtre + Déconnexion";
$lang['vsoverview_info_req_security'] = "Niveau de sécurité";
$lang['vsoverview_info_req_securitylvl'] = "obligatoire";
$lang['vsoverview_info_hostbanner_head'] = "Bannière d'hôte";
$lang['vsoverview_info_hostbanner_url'] = "URL";
$lang['vsoverview_info_hostbanner_imgurl'] = "Adresse de l'image";
$lang['vsoverview_info_hostbanner_buttonurl'] = "URL de la bannière d'hôte";
$lang['vsoverview_info_antiflood_head'] = "Anti-Flood";
$lang['vsoverview_info_antiflood_warning'] = "Avertissement activé";
$lang['vsoverview_info_antiflood_kick'] = "Kick activé";
$lang['vsoverview_info_antiflood_ban'] = "Ban activé";
$lang['vsoverview_info_antiflood_banduration'] = "Durée du ban";
$lang['vsoverview_info_antiflood_decrease'] = "réduire";
$lang['vsoverview_info_antiflood_points'] = "points";
$lang['vsoverview_info_antiflood_in_seconds'] = "secondes";
$lang['vsoverview_info_antiflood_points_per_tick'] = "Point par tick";
$lang['vsoverview_conn_total_head'] = "Total";
$lang['vsoverview_conn_total_packets'] = "paquets";
$lang['vsoverview_conn_total_bytes'] = "bytes";
$lang['vsoverview_conn_total_send'] = "envoyés";
$lang['vsoverview_conn_total_received'] = "reçus";
$lang['vsoverview_conn_bandwidth_head'] = "Bande passane";
$lang['vsoverview_conn_bandwidth_last'] = "dernière";
$lang['vsoverview_conn_bandwidth_second'] = "seconde";
$lang['vsoverview_conn_bandwidth_minute'] = "minute";
$lang['vsoverview_conn_bandwidth_send'] = "envoyée";
$lang['vsoverview_conn_bandwidth_received'] = "reçue";


// vServer Token
$lang['vstoken_token_virtualserver'] = "Serveur virtuel";
$lang['vstoken_token_head'] = "Token";
$lang['vstoken_token_type'] = "Type de groupe";
$lang['vstoken_token_id1'] = "Serveurgroupe/<br />Channelgroupe";
$lang['vstoken_token_id2'] = "(Channel)";
$lang['vstoken_token_tokencode'] = "Tokencode";
$lang['vstoken_token_delete'] = "supprimer";

$lang['vstoken_new_head'] = "Créer un nouveau token";
$lang['vstoken_new_create'] = "Générer";
$lang['vstoken_new_tokentype'] = "Type de token :";
$lang['vstoken_new_servergroup'] = "Groupe serveur";
$lang['vstoken_new_channelgroup'] = "Groupe channel";
$lang['vstoken_new_select_group'] = "Serveurgroupe";
$lang['vstoken_new_select_channelgroup'] = "Channelgroupe";
$lang['vstoken_new_select_channel'] = "Channel";

$lang['vstoken_new_tokentype_0'] = "Serveur";
$lang['vstoken_new_tokentype_1'] = "Channel";

$lang['vstoken_new_added_ok'] = "Le token a été généré avec succès.";


// vServer Liveview
$lang['vsliveview_server_virtualserver'] = "Serveur virtuel";
$lang['vsliveview_server_head'] = "vue en direct";

$lang['vsliveview_liveview_enable_autorefresh'] = "Rafraîchissement auto";

$lang['vsliveview_liveview_tooltip_to_channel'] = "vers channel #";
$lang['vsliveview_liveview_tooltip_switch'] = "Changer";
$lang['vsliveview_liveview_tooltip_send_msg'] = "Envoyer Message";
$lang['vsliveview_liveview_tooltip_poke'] = "Poke";
$lang['vsliveview_liveview_tooltip_kick'] = "Kick";
$lang['vsliveview_liveview_tooltip_ban'] = "Ban";

$lang['vsoverview_banlist_head'] = "Liste des bans";
$lang['vsoverview_banlist_id'] = "ID #";
$lang['vsoverview_banlist_ip'] = "IP";
$lang['vsoverview_banlist_name'] = "Nom";
$lang['vsoverview_banlist_uid'] = "UniqueID";
$lang['vsoverview_banlist_reason'] = "Raison";
$lang['vsoverview_banlist_created'] = "créé";
$lang['vsoverview_banlist_duration'] = "Durée";
$lang['vsoverview_banlist_end'] = "fin";
$lang['vsoverview_banlist_unlimited'] = "illimitée";
$lang['vsoverview_banlist_never'] = "jamais";

$lang['vsoverview_banlist_new_head'] = "Créer un nouveau ban";
$lang['vsoverview_banlist_new_create'] = "créer";

$lang['vsliveview_channelbackup_head'] = "Channelbackup";
$lang['vsliveview_channelbackup_get'] = "Créer et télécharger";
$lang['vsliveview_channelbackup_load'] = "Upload un Channelbackup";
$lang['vsliveview_channelbackup_load_submit'] = "recréer";

$lang['vsliveview_channelbackup_new_added_ok'] = "Channelbackup succès.";



// Counter
$lang['time_day']     = "jour";
$lang['time_days']    = "jours";
$lang['time_hour']    = "heure";
$lang['time_hours']   = "heures";
$lang['time_minute']  = "minute";
$lang['time_minutes'] = "minutes";
$lang['time_second']  = "seconde";
$lang['time_seconds'] = "secondes";



// Error numbers
$lang['e_2568'] = "Vous n'avez pas les droits suffisants.";
$lang['temp_folder_not_writable'] = "The templates folder (%s) is not writable.";
?>