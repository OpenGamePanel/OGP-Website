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

define('OGP_LANG_maintenance_mode', "Wartungsmodus");
define('OGP_LANG_maintenance_mode_info', "Deaktiviert das Panel für Normale Benutzer. Nur Administratoren können während der Wartung darauf zugreifen.");
define('OGP_LANG_maintenance_title', "Wartungsmodus Titel");
define('OGP_LANG_maintenance_title_info', "Der Titel, der während der Wartung für normale Benutzer angezeigt wird.");
define('OGP_LANG_maintenance_message', "Wartungsmodus Nachricht");
define('OGP_LANG_maintenance_message_info', "Die Meldung, die normale Benutzer während der Wartung angezeigt wird.");
define('OGP_LANG_update_settings', "Einstellungen speichern");
define('OGP_LANG_settings_updated', "Einstellungen erfolgreich aktualisiert.");
define('OGP_LANG_panel_language', "Panel Sprache");
define('OGP_LANG_panel_language_info', "Diese Sprache ist die Standart Sprache des Panels. Benutzer können Ihre eigene Sprache in Ihren Profil Einstellungen ändern.");
define('OGP_LANG_page_auto_refresh', "Seite automatisch neuladen");
define('OGP_LANG_page_auto_refresh_info', "Die Einstellungen für das automatische Aktualisieren von Seiten werden hauptsächlich beim Debuggen von Fenstern verwendet. Im normalen Gebrauch sollte dies auf Ein gestellt sein.");
define('OGP_LANG_smtp_server', "Ausgehender E-Mail Server");
define('OGP_LANG_smtp_server_info', "Dies ist der Postausgangsserver (SMTP-Server), mit dem beispielsweise vergessene Kennwörter an Benutzer gesendet werden standardmäßig localhost.");
define('OGP_LANG_panel_email_address', "Ausgehende E-Mail Adresse");
define('OGP_LANG_panel_email_address_info', "Dies ist die E-Mail-Adresse, in der das Kennwort eingegeben wird, wenn der Benutzer es vergessen hat.");
define('OGP_LANG_panel_name', "Panel Name");
define('OGP_LANG_panel_name_info', "Name des Bereichs, der im Seitentitel angezeigt wird. Dieser Wert überschreibt alle Seitentitel, wenn sie nicht leer sind.");
define('OGP_LANG_feed_enable', "LGSL Feed aktivieren");
define('OGP_LANG_feed_enable_info', "Wenn Ihr Webhost über eine Firewall verfügt, die den Abfrageport blockiert, müssen Sie den Port manuell öffnen.");
define('OGP_LANG_feed_url', "Info URL");
define('OGP_LANG_feed_url_info', "GrayCube.com teilt einen LGSL-Feed auf der URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Steam Nutzer");
define('OGP_LANG_steam_user_info', "Dieser Benutzer muss sich bei Steam anmelden, um einige neue Spiele wie CS:GO herunterzuladen.");
define('OGP_LANG_steam_pass', "Steam Passwort");
define('OGP_LANG_steam_pass_info', "Legen Sie hier das Kennwort für das Steamkonto fest.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Einige Benutzer haben Steam Guard aktiviert, um ihre Konten vor Hackern zu schützen,<br> dieser Code wird an die Konto-E-Mail gesendet, wenn das erste Steam-Update gestartet wird.");
define('OGP_LANG_smtp_port', "SMTP Port");
define('OGP_LANG_smtp_port_info', "Wenn der SMTP-Port nicht der Standardport ist (25) Geben Sie hier den SMTP-Port ein.");
define('OGP_LANG_smtp_login', "SMTP Nutzer");
define('OGP_LANG_smtp_login_info', "Wenn Ihr SMTP-Server eine Authentifizierung erfordert, geben Sie hier Ihren Benutzernamen ein.");
define('OGP_LANG_smtp_passw', "SMTP Passwort");
define('OGP_LANG_smtp_passw_info', "Wenn Sie kein Passwort setzen, wird die SMTP-Authentifizierung deaktiviert.");
define('OGP_LANG_smtp_secure', "SMTP Sicherheit");
define('OGP_LANG_smtp_secure_info', "Verwenden Sie SSL/TLS, um eine Verbindung zum SMTP Server herzustellen");
define('OGP_LANG_time_zone', "Zeitzone");
define('OGP_LANG_time_zone_info', "Legt die Standardzeitzone fest, die von allen Datums- / Uhrzeitfunktionen verwendet wird.");
define('OGP_LANG_query_cache_life', "Cache-Lebensdauer abfragen");
define('OGP_LANG_query_cache_life_info', "Legt das Zeitlimit in Sekunden fest, bevor der Serverstatus aktualisiert wird.");
define('OGP_LANG_query_num_servers_stop', "Deaktivieren Sie Game Server-Abfragen nach");
define('OGP_LANG_query_num_servers_stop_info', "Verwenden Sie diese Einstellung, um Abfragen zu deaktivieren, wenn ein Benutzer mehr Spieleserver als die angegebene Anzahl besitzt, um das Laden der Anzeigen zu beschleunigen.");
define('OGP_LANG_editable_email', "Bearbeitbare E-Mail-Adresse");
define('OGP_LANG_editable_email_info', "Wählen Sie aus, ob Benutzer ihre E-Mail-Adresse bearbeiten können oder nicht.");
define('OGP_LANG_old_dashboard_behavior', "Altes Dashboard-Verhalten");
define('OGP_LANG_old_dashboard_behavior_info', "Das alte Dashboard lief langsamer, zeigt jedoch mehr Serverinformationen (z. B. aktuelle Spieler und Karten).");
define('OGP_LANG_rsync_available', "Verfügbare Rsync Server");
define('OGP_LANG_rsync_available_info', "Wählen Sie aus, welche Serverliste in der rsync-Installation angezeigt wird.");
define('OGP_LANG_all_available_servers', "Alle verfügbaren Server  ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Nur Remote Server ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Nur lokale Server ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Header-Code");
define('OGP_LANG_header_code_info', "Hier können Sie Ihren eigenen Header-Code (wie HTML-Code, Embed-Code usw.) schreiben, ohne das Design-Layout zu ändern.");
define('OGP_LANG_support_widget_title', "Support-Widget-Titel");
define('OGP_LANG_support_widget_title_info', "Ein benutzerdefinierter Titel für das Support-Widget im Dashboard.");
define('OGP_LANG_support_widget_content', "Support-Widget inhalt");
define('OGP_LANG_support_widget_content_info', "Der Inhalt des Support-Widgets (HTML-Code erlaubt).");
define('OGP_LANG_support_widget_link', "Support-Widget-Link");
define('OGP_LANG_support_widget_link_info', "Die URL Ihrer Support-Site.");
define('OGP_LANG_recaptcha_site_key', "Recaptcha Websiteschlüssel");
define('OGP_LANG_recaptcha_site_key_info', "Der von Google bereitgestellte Websiteschlüssel.");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha Geheimschlüssel");
define('OGP_LANG_recaptcha_secret_key_info', "Der von Google bereitgestellte geheime Schlüssel.");
define('OGP_LANG_recaptcha_use_login', "Recaptcha beim Login verwenden");
define('OGP_LANG_recaptcha_use_login_info', "Wenn aktiviert, müssen Benutzer das \"Ich bin kein Roboter\" Recaptcha benutzen, wenn Sie sich anmelden.");
define('OGP_LANG_login_attempts_before_banned', "Anzahl der fehlgeschlagenen Anmeldeversuche, bevor der Benutzer gesperrt wird");
define('OGP_LANG_login_attempts_before_banned_info', "Wenn ein Benutzer mehrmals versucht, sich mit ungültigen Anmeldeinformationen anzumelden, wird er vorübergehend vom Panel gebannt.");
define('OGP_LANG_custom_github_update_username', "GitHub update Nutzername");
define('OGP_LANG_custom_github_update_username_info', "Geben Sie NUR Ihren GitHub-Benutzernamen ein, um Ihre eigenen verzweigten Repositorys zum Aktualisieren von OGP zu verwenden. Dies sollte nur von Entwicklern geändert werden, die ihre eigenen Repos für die Entwicklung verwenden möchten, anstatt möglicherweise fehlerhaften Code im Hauptzweig einzuchecken.");
define('OGP_LANG_remote_query', "Abfrage query");
define('OGP_LANG_remote_query_info', "Verwenden Sie den Remote-Server (Agent), um Abfragen an die Spieleserver (Nur GameQ und LGSL) zu stellen.");
define('OGP_LANG_check_expiry_by', "Überprüfen Sie den Ablauf");
define('OGP_LANG_check_expiry_by_info', "Bei der Einstellung \"Once_logged_in\" werden die Spieleserver-Zuweisungen des Benutzers nach Ablauf des Ablaufdatums automatisch gelöscht. Bei Auswahl von cron_job müssen Sie eine cron-Aufgabe mit dem cron-Modul erstellen, um das Ablaufdatum in einem konfigurierten Intervall zu überprüfen.");
define('OGP_LANG_once_logged_in', "Einmal angemeldet");
define('OGP_LANG_cron_job', "Cronjob");
define('OGP_LANG_theme_settings', "Theme Einstellungen");
define('OGP_LANG_theme', "Theme");
define('OGP_LANG_theme_info', "Das hier ausgewählte Design ist das Standarddesign für alle Benutzer. Benutzer können ihr Thema von ihrer Profilseite aus ändern.");
define('OGP_LANG_welcome_title', "Begrüßungstitel");
define('OGP_LANG_welcome_title_info', "Aktiviert den Titel, der oben im Dashboard angezeigt wird.");
define('OGP_LANG_welcome_title_message', "Begrüßungstext");
define('OGP_LANG_welcome_title_message_info', "Die Titelnachricht, die oben im Dashboard angezeigt wird (HTML-Code zulässig).");
define('OGP_LANG_logo_link', "Logo Link");
define('OGP_LANG_logo_link_info', "Der Hyperlink für Logos. <b style='font-size:10px; font-weight:normal;'>(Wenn Sie das Feld leer lassen, wird es mit dem Dashboard verknüpft.)</b>");
define('OGP_LANG_custom_tab', "Benutzerdefinierte Registerkarte");
define('OGP_LANG_custom_tab_info', "Fügt am Ende des Menüs eine anpassbare Registerkarte hinzu. <b style='font-size:10px; font-weight:normal;'>(Anwenden und Aktualisieren dieser Seite zum Bearbeiten der Registerkarteneinstellungen.)</b>");
define('OGP_LANG_custom_tab_name', "Name der benutzerdefinierten Registerkarte");
define('OGP_LANG_custom_tab_name_info', "Der Name der Registerkarten.");
define('OGP_LANG_custom_tab_link', "Link für benutzerdefinierte Registerkarten");
define('OGP_LANG_custom_tab_link_info', "Der Hyperlink der Registerkarten.");
define('OGP_LANG_custom_tab_sub', "Benutzerdefinierte Unterregisterkarten");
define('OGP_LANG_custom_tab_sub_info', "Fügt anpassbare Unterregisterkarten hinzu, wenn Sie sich über der 'Benutzerdefinierten Registerkarte' befinden.");
define('OGP_LANG_custom_tab_sub_name', "Unter-Tab #1 Name");
define('OGP_LANG_custom_tab_sub_link', "Unter-Tab #1 Link");
define('OGP_LANG_custom_tab_sub_name2', "Unter-Tab #2 Name");
define('OGP_LANG_custom_tab_sub_link2', "Unter-Tab #2 Link");
define('OGP_LANG_custom_tab_sub_name3', "Unter-Tab #3 Name");
define('OGP_LANG_custom_tab_sub_link3', "Unter-Tab #3 Link");
define('OGP_LANG_custom_tab_sub_name4', "Unter-Tab #4 Name");
define('OGP_LANG_custom_tab_sub_link4', "Unter-Tab #4 Link");
define('OGP_LANG_custom_tab_target_blank', "Benutzerdefiniertes Tab-Ziel");
define('OGP_LANG_custom_tab_target_blank_info', "Legt alle Tab-Ziele fest. <b style='font-size:10px; font-weight:normal;'>(Eigene Seite = Öffnet den Link auf derselben Seite. Neue Seite = Öffnet den Link auf der neuen Registerkarte.)</b>");
define('OGP_LANG_bg_wrapper', "Wrapper Hintergrund");
define('OGP_LANG_bg_wrapper_info', "Das Hintergrundbild der umrandung. <b style='font-size:10px; font-weight:normal;'>(Nur für einige Themen verfügbar.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Server-IDs auf der Seite Game Monitor anzeigen");
define('OGP_LANG_show_server_id_game_monitor_info', "Zeigen Sie die Game Server ID-Spalte im Game Monitor an, um die vom Agenten erstellten Dateien mit dem tatsächlichen Game Server abzugleichen.");
define('OGP_LANG_default_game_server_home_path_prefix', "Standard-Präfix für das Home-Verzeichnis des Game-Servers");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Geben Sie ein Pfadpräfix ein, in dem die Game Server das Verzeichnis standardmäßig erstellt werden sollen. Sie können \"{USERNAME}\" in dem Pfad verwenden, der durch den OGP-Benutzernamen ersetzt wird, dem der Spieleserver zugewiesen wird. Sie können \"{GAMEKEY}\" im Pfad verwenden, der durch einen freundlichen Kleinbuchstaben ersetzt wird. Sie können \"{SKIPID}\" an beliebiger Stelle im Pfad verwenden, um das Anhängen der Verzeichnis-ID an den Pfad zu überspringen. Beispiel:  /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} will become /ogp/games/username/arkse/.. Beispiel 2: /ogp/games will become /ogp/games/1 where 1 is the game servers ID.");
define('OGP_LANG_use_authorized_hosts', "Limit API to Defined Authorized Hosts");
define('OGP_LANG_use_authorized_hosts_info', "Enable this setting to only allow API calls from pre-defined and approved IP addresses.&nbsp; Approved addresses can be set on this page once the setting has been enabled.&nbsp; If this setting is disabled, a user using a valid key will have access to the API from any IP address.&nbsp; Users using a valid key will be able to use the API to manage any game server they have permissions to administrate.");
define('OGP_LANG_setup_api_authorized_hosts', "Autorisierte Hosts für die API einrichten");
define('OGP_LANG_autohorized_hosts', "Autorisierte Hosts");
define('OGP_LANG_add', "Hinzufügen");
define('OGP_LANG_remove', "Entfernen");
define('OGP_LANG_default_trusted_hosts', "Vertrauenswürdige Standardhosts");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Vertrauenswürdige Hosts oder Proxies (IPv4 / IPv6-Adressen oder CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Vertrauenswürdige weitergeleitete IPs (IPv4 / IPv6-Adressen oder CIDR)");
define('OGP_LANG_reset_game_server_order', "Reset Game Server Ordering");
define('OGP_LANG_reset_game_server_order_info', "Resets game server ordering back to the default of using the server ID");


?>
