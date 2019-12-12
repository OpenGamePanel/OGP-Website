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

define('OGP_LANG_maintenance_mode', "Održavanje");
define('OGP_LANG_maintenance_mode_info', "Onemogućite Panel za obične korisnike. Samo administratori mogu pristupiti tijekom održavanja.");
define('OGP_LANG_maintenance_title', "Naslov održavanja");
define('OGP_LANG_maintenance_title_info', "Naslov koji se običnim korisnicima prikazuje tijekom održavanja.");
define('OGP_LANG_maintenance_message', "Poruka o održavanju");
define('OGP_LANG_maintenance_message_info', "Poruka koja se prikazuje običnim korisnicima tijekom održavanja.");
define('OGP_LANG_update_settings', "Ažurirati postavke");
define('OGP_LANG_settings_updated', "Postavke su uspješno ažurirane.");
define('OGP_LANG_panel_language', "Jezik Panela");
define('OGP_LANG_panel_language_info', "Ovaj jezik je zadani jezik Panela. Korisnici mogu promijeniti svoj jezik na stranici za uređivanje profila.");
define('OGP_LANG_page_auto_refresh', "Automatsko Osvježavanje Stranice");
define('OGP_LANG_page_auto_refresh_info', "Postavke automatskog osvježavanja stranice uglavnom se upotrebljavaju u debugu ploče. U normalnoj upotrebi to bi trebalo biti postavljeno na Uključeno.");
define('OGP_LANG_smtp_server', "Poslužitelj za odlazne e-pošte");
define('OGP_LANG_smtp_server_info', "Ovo je poslužitelj odlazne pošte (SMTP poslužitelj) koji se koristi, na primjer, za slanje zaboravljenih zaporki korisnicima, lokalni host prema zadanim postavkama.");
define('OGP_LANG_panel_email_address', "Odlazna e-pošta");
define('OGP_LANG_panel_email_address_info', "Ovo je adresa e-pošte koja je u polju kada se lozinke šalju korisnicima.");
define('OGP_LANG_panel_name', "Naziv Panela");
define('OGP_LANG_panel_name_info', "Naziv Panela prikazanog u naslovu stranice. Ova će vrijednost odbiti sve naslove stranica, ako nije prazna.");
define('OGP_LANG_feed_enable', "Omogući LGSL feed");
define('OGP_LANG_feed_enable_info', "Ako vaš webhost ima vatrozid koji blokira port upita, onda ručno ga morate otvoriti port.");
define('OGP_LANG_feed_url', "URL feeda");
define('OGP_LANG_feed_url_info', "GrayCube.com dijeli LGSL feed na URL:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Steam Korisnik");
define('OGP_LANG_steam_user_info', "Ovaj korisnik je potreban za prijavu u Steam-u za preuzimanje nekih novih igara poput CS: GO.");
define('OGP_LANG_steam_pass', "Steam Lozinka");
define('OGP_LANG_steam_pass_info', "Ovdje napišite lozinku za Steam račun.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Neki korisnici imaju aktivirano Steam Guard kako bi zaštitili svoje račune od hakera,<br>ovaj kôd šalje se e-pošti računa kada započne prvo ažuriranje Steam-a.");
define('OGP_LANG_smtp_port', "SMTP Port");
define('OGP_LANG_smtp_port_info', "Ako SMTP port nije zadani port (25) Ovdje unesite SMTP port.");
define('OGP_LANG_smtp_login', "SMTP Korisnik");
define('OGP_LANG_smtp_login_info', "Ako vaš SMTP poslužitelj zahtijeva provjeru autentičnosti, ovdje unesite korisničko ime.");
define('OGP_LANG_smtp_passw', "SMTP Lozinka");
define('OGP_LANG_smtp_passw_info', "Ako ne postavite lozinku, SMTP autentikacija će biti onemogućena.");
define('OGP_LANG_smtp_secure', "SMTP Sigurnost");
define('OGP_LANG_smtp_secure_info', "Koristite SSL/TLS za povezivanje sa SMTP poslužiteljem");
define('OGP_LANG_time_zone', "Vremenska Zona");
define('OGP_LANG_time_zone_info', "Postavlja zadanu vremensku zonu koju upotrebljavaju sve funkcije datuma vremena.");
define('OGP_LANG_query_cache_life', "Život predmemorije");
define('OGP_LANG_query_cache_life_info', "Postavlja vremensko ograničenje u sekundama prije osvježavanja statusa poslužitelja.");
define('OGP_LANG_query_num_servers_stop', "Onemogući upite igara nakon");
define('OGP_LANG_query_num_servers_stop_info', "Pomoću ove postavke onemogućite upite ako korisnik posjeduje više igrica od navedenog iznosa kako bi se ubrzao učitavanje panela.");
define('OGP_LANG_editable_email', "E-pošta za uređivanje");
define('OGP_LANG_editable_email_info', "Odaberite ako korisnici mogu urediti svoju adresu e-pošte ili ne.");
define('OGP_LANG_old_dashboard_behavior', "Prikaz stare verzije Nadzorne Ploče");
define('OGP_LANG_old_dashboard_behavior_info', "Stara nadzorna ploča je dosta sporija, ali prikazuje više informacija o serveru (npr. Trenutni igrači i karte).");
define('OGP_LANG_rsync_available', "Dostupni Rsync poslužitelji");
define('OGP_LANG_rsync_available_info', "Odaberite koji će poslužitelj biti prikazan u rsync instalaciji.");
define('OGP_LANG_all_available_servers', "Svi dostupni poslužitelji ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Samo udaljeni poslužitelji ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Samo lokalni poslužitelji (rsync_sites_local.list )");
define('OGP_LANG_header_code', "Šifra zaglavlja");
define('OGP_LANG_header_code_info', "Ovdje možete napisati vlastiti kôd zaglavlja (poput HTML koda, Embed Code itd.) Bez uređivanja izgleda tema.");
define('OGP_LANG_support_widget_title', "Naslov widgeta korisničke podrške");
define('OGP_LANG_support_widget_title_info', "Prilagođeni naslov widgeta za podršku na nadzornoj ploči.");
define('OGP_LANG_support_widget_content', "Sadržaj  widgeta za Podršku");
define('OGP_LANG_support_widget_content_info', "Sadržaj widgeta za podršku (dopušten HTML kôd).");
define('OGP_LANG_support_widget_link', "Poveznica widgeta za Podršku");
define('OGP_LANG_support_widget_link_info', "URL vaše stranice za podršku.");
define('OGP_LANG_recaptcha_site_key', "Ključ Recaptcha Stranice");
define('OGP_LANG_recaptcha_site_key_info', "Ključ stranice koji vam je Google pružio.");
define('OGP_LANG_recaptcha_secret_key', "Recaptcha Tajni Ključ");
define('OGP_LANG_recaptcha_secret_key_info', "Tajni ključ koji vam Google pruža.");
define('OGP_LANG_recaptcha_use_login', "Upotrijebiti Recaptcha kada se korisnici prijave");
define('OGP_LANG_recaptcha_use_login_info', "Ako je omogućeno, korisnici će morati riješiti Nisam Robot Recaptcha prilikom pokušaja prijave.");
define('OGP_LANG_login_attempts_before_banned', "Broj neuspjelih pokušaja prijave prije nego što korisnik dobije zabranu");
define('OGP_LANG_login_attempts_before_banned_info', "Ako se korisnik više puta pokuša prijaviti s nevažećim detaljima za prijavu, Panel će privremeno zabraniti korisnika.");
define('OGP_LANG_custom_github_update_username', "Korisničko Ime za GitHub ažuriranje");
define('OGP_LANG_custom_github_update_username_info', "Unesite GitHub korisničko ime SAMO za korištenje vlastitih repozitoriji za ažuriranje OGP-a. To bi trebalo mijenjati samo razvojni programeri koji žele koristiti vlastiti repozitorij za razvoj, umjesto da provjere eventualno pogrešan kod u glavnu granu.");
define('OGP_LANG_remote_query', "Udaljeni upit");
define('OGP_LANG_remote_query_info', "Upotrijebite udaljeni poslužitelj (agent) za upite na igre (samo GameQ i LGSL).");
define('OGP_LANG_check_expiry_by', "Provjerite istek");
define('OGP_LANG_check_expiry_by_info', "Ako je postavljeno na once_logged_in, igre koje su dodjeljenje korisnicma automatski će se izbrisati nakon isteka datuma. Ako je postavljeno na cron_job, trebat ćete napraviti cron zadatak pomoću cron modula kako biste provjerili datum isteka u konfiguriranom intervalu.");
define('OGP_LANG_once_logged_in', "Kada se prijavi");
define('OGP_LANG_cron_job', "Cron Zadatak");
define('OGP_LANG_theme_settings', "Postavke teme");
define('OGP_LANG_theme', "Tema");
define('OGP_LANG_theme_info', "Tema odabrana ovdje bit će zadana tema za sve korisnike. Korisnici mogu promijeniti temu s njihove stranice profila.");
define('OGP_LANG_welcome_title', "Naslov Dobrodošlice");
define('OGP_LANG_welcome_title_info', "Omogućuje naslov koji se prikazuje na vrhu Nadzorne ploče.");
define('OGP_LANG_welcome_title_message', "Poruka za Naslov Dobrodošlice");
define('OGP_LANG_welcome_title_message_info', "Naslovna poruka koja se prikazuje na vrhu Nadzorne ploče (dopušteni HTML kôd).");
define('OGP_LANG_logo_link', "Link za Logotip");
define('OGP_LANG_logo_link_info', "Hyperlink logotipa. <b style='font-size:10px; font-weight:normal;'>(Ostavljajući ga prazno povezat će ga s nadzornom pločom)</b>");
define('OGP_LANG_custom_tab', "Prilagođena kartica");
define('OGP_LANG_custom_tab_info', "Na kraju izbornika dodaje se prilagodljiva kartica. <b style='font-size:10px; font-weight:normal;'>(Primijeni i osvježite ovu stranicu da biste uredili postavke kartica)</b>");
define('OGP_LANG_custom_tab_name', "Naziv Prilagođene Kartice");
define('OGP_LANG_custom_tab_name_info', "Naziv koji če se prikazati za priagođene kartice.");
define('OGP_LANG_custom_tab_link', "Poveznica Prilagođene Kartice");
define('OGP_LANG_custom_tab_link_info', "Hiperlinkovi kartica.");
define('OGP_LANG_custom_tab_sub', "Prilagođene podkartice");
define('OGP_LANG_custom_tab_sub_info', "Dodavanje prilagodljivih podkartica ispod \"Prilagođene kartice\".");
define('OGP_LANG_custom_tab_sub_name', "Podkartica #1 Naziv");
define('OGP_LANG_custom_tab_sub_link', "Podkartica #1 Poveznica");
define('OGP_LANG_custom_tab_sub_name2', "Podkartica #2 Naziv");
define('OGP_LANG_custom_tab_sub_link2', "Podkartica #2 Poveznica");
define('OGP_LANG_custom_tab_sub_name3', "Podkartica #3 Naziv");
define('OGP_LANG_custom_tab_sub_link3', "Podkartica #3 Poveznica");
define('OGP_LANG_custom_tab_sub_name4', "Podkartica #4 Naziv");
define('OGP_LANG_custom_tab_sub_link4', "Podkartica #4 Poveznica");
define('OGP_LANG_custom_tab_target_blank', "Opcija Otvaranja Prilagođene Kartice");
define('OGP_LANG_custom_tab_target_blank_info', "Opcija otvaranja prilagođene stranice. <b style='font-size:10px; font-weight:normal;'>(Ista_Stranica = otvara vezu na istoj stranici. Nova_Stranica = otvara vezu na novoj kartici.)</b>");
define('OGP_LANG_bg_wrapper', "Pozadinska slika Wrappera");
define('OGP_LANG_bg_wrapper_info', "Pozadinska slika wrappera. <b style='font-size:10px; font-weight:normal;'>(Dostupno samo za neke teme.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Prikaži ID servera na stranici Monitor igara");
define('OGP_LANG_show_server_id_game_monitor_info', "Pokažite stupac ID servera na Monitor Igara za podudaranje datoteka stvorenih od strane Agenta na aktualnom serveru.");
define('OGP_LANG_default_game_server_home_path_prefix', "Zadani prefiks Home direktorija za server");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Unesite prefiks putanja za mjesto na kojem želite da Home direktoriji servera budu izrađeni prema zadanim postavkama. Možete upotrebljavati \"{USERNAME}\" na putu koji će biti zamijenjen korisničkim imenom OGP-a kojem se dodjeljuje server. Možete koristiti \"{GAMEKEY}\" na putu koji će biti zamijenjen imenom sa malim slovima. Možete upotrebljavati \"{SKIPID}\" bilo gdje na putu da preskočite dodavanje Home ID-a na putnju. Primjer: /ogp/games/{USERNAME}/{GAMEKEY}{SKIPID} će postati /ogp/games/username/arkse/. Primjer 2: /ogp/games će postati /ogp/games/1 gdje je 1 ID servera.");
define('OGP_LANG_use_authorized_hosts', "Ograničite API na Definirane ovlaštene hostove");
define('OGP_LANG_use_authorized_hosts_info', "Omogućite ovu postavku da biste dozvolili samo API pozive s unaprijed definiranih i odobrenih IP adresa.&nbsp; Odobrene adrese možete postaviti na ovoj stranici nakon što je postavka omogućena.&nbsp; Ako je ova postavka onemogućena, korisnik koji koristi važeći ključ imat će pristup API-ju s bilo koje IP adrese.&nbsp; Korisnici koji koriste valjani ključ moći će koristiti API za upravljanje bilo kojim poslužiteljem za igre koje imaju dozvole za administriranje.");
define('OGP_LANG_setup_api_authorized_hosts', "Postavke API za autorizaciju poslužitelja");
define('OGP_LANG_autohorized_hosts', "Ovlašteni poslužitelji");
define('OGP_LANG_add', "Dodati");
define('OGP_LANG_remove', "Ukloniti");
define('OGP_LANG_default_trusted_hosts', "Zadani Pouzdani Poslužitelji");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Pouzdani Poslužitelji ili Proxy (IPv4/IPv6 Adrese ili CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Pouzdani prosljeđeni IP-ovi (IPv4/IPv6 Addresses or CIDR)");
define('OGP_LANG_reset_game_server_order', "Resetiranje redoslijeda poslužitelja igara");
define('OGP_LANG_reset_game_server_order_info', "Poništava naredbu redoslijeda igara na zadane postavke ID poslužitelja");


?>
