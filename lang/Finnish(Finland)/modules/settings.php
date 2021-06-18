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

define('OGP_LANG_maintenance_mode', "Huolto");
define('OGP_LANG_maintenance_mode_info', "Poista Paneli käytöstä normaalikäyttäjille. Vain järjestelmänvalvojat voivat käyttää sitä huollon aikana.");
define('OGP_LANG_maintenance_title', "Huollon nimike");
define('OGP_LANG_maintenance_title_info', "Otsikko, joka näytetään normaalille käyttäjälle huollon aikana.");
define('OGP_LANG_maintenance_message', "Huollon viesti");
define('OGP_LANG_maintenance_message_info', "Viesti, joka näytetään normaalille käyttäjälle huollon aikana.");
define('OGP_LANG_update_settings', "Päivitä asetukset");
define('OGP_LANG_settings_updated', "Asetusten päivitys onnistui.");
define('OGP_LANG_panel_language', "Panelin kieli");
define('OGP_LANG_panel_language_info', "Tämä kieli on panelin oletuskieli. Käyttäjät voivat vaihtaa omaa kieltään profiilin muokkaussivulta.");
define('OGP_LANG_page_auto_refresh', "Sivun automaattinen päivitys");
define('OGP_LANG_page_auto_refresh_info', "Sivun automaattisen päivityksen asetuksia käytetään pääasiassa panelin virheenkorjauksessa. Normaalikäytössä tämän tulisi olla päällä.");
define('OGP_LANG_smtp_server', "Lähtevä sähköpostipalvelin");
define('OGP_LANG_smtp_server_info', "Tätä lähtevää postipalvelinta (SMTP-palvelinta) käytetään esimerkiksi unohtuneiden salasanojen lähettämiseen käyttäjille, on oletusarvoisesti localhost.");
define('OGP_LANG_panel_email_address', "Lähtevä sähköpostiosoite");
define('OGP_LANG_panel_email_address_info', "Tämä on sähköpostiosoite, joka on kentässä, kun salasanoja lähetetään käyttäjille.");
define('OGP_LANG_panel_name', "Panelin nimi");
define('OGP_LANG_panel_name_info', "Sivun otsikossa näkyvän Panelin nimi. Tämä arvo ohittaa kaikki sivun otsikot, jos se ei ole tyhjä.");
define('OGP_LANG_feed_enable', "Ota käyttöön LGSL-syöte");
define('OGP_LANG_feed_enable_info', "Jos verkkopalvelimessasi on palomuuri, joka estää kyselyportin, sinun on avattava portti manuaalisesti.");
define('OGP_LANG_feed_url', "Syötteen URL");
define('OGP_LANG_feed_url_info', "GrayCube.com jakaa LGSL-syötteen URL-osoitteessa:<br><b> http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>");
define('OGP_LANG_steam_user', "Steam käyttäjä");
define('OGP_LANG_steam_user_info', "Tätä käyttäjää tarvitaan Steamin sisäänkirjautumiseen, jotta voidaan ladata uusia pelejä, kuten CS:GO.");
define('OGP_LANG_steam_pass', "Steam salasana");
define('OGP_LANG_steam_pass_info', "Aseta tähän Steam-tilin salasana.");
define('OGP_LANG_steam_guard', "Steam Guard");
define('OGP_LANG_steam_guard_info', "Joillakin käyttäjillä on Steam Guard aktivoitu suojaamaan tilinsä hakkereilta, <br>tämä koodi lähetetään tilin sähköpostiosoitteeseen, kun ensimmäimen Steam päivitys on alkanut.");
define('OGP_LANG_smtp_port', "SMTP-portti");
define('OGP_LANG_smtp_port_info', "Jos SMTP-portti ei ole oletusportti (25), syötä SMTP-portti tähän.");
define('OGP_LANG_smtp_login', "SMTP-käyttäjä");
define('OGP_LANG_smtp_login_info', "Jos SMTP-palvelimesi vaatii todennusta, kirjoita käyttäjänimesi tähän.");
define('OGP_LANG_smtp_passw', "SMTP salasana");
define('OGP_LANG_smtp_passw_info', "Jos et määritä salasanaa, SMTP-todennus poistetaan käytöstä.");
define('OGP_LANG_smtp_secure', "SMTP suojaus");
define('OGP_LANG_smtp_secure_info', "Käytä SSL/TLS-yhteyttä muodostaaksesi yhteyden SMTP-palvelimeen");
define('OGP_LANG_time_zone', "Aikavyöhyke");
define('OGP_LANG_time_zone_info', "Asettaa oletusaikavyöhykkeen, jota käytetään kaikissa päivämäärä- ja aikatoiminnoissa.");
define('OGP_LANG_query_cache_life', "Kyselyn välimuistin käyttöikä");
define('OGP_LANG_query_cache_life_info', "Asettaa aikakatkaisun sekunteina, ennen palvelimen tilan päivittämistä.");
define('OGP_LANG_query_num_servers_stop', "Poista käytöstä pelipalvelimeen kyselyt jälkeen");
define('OGP_LANG_query_num_servers_stop_info', "Käytä tätä asetusta kyselyjen poistamiseen käytöstä, jos käyttäjä omistaa enemmän pelipalvelimia kuin tämä on määritetty panelin lataamisen nopeuttamiseksi.");
define('OGP_LANG_editable_email', "Muokattava sähköpostiosoite");
define('OGP_LANG_editable_email_info', "Valitse, voivatko käyttäjät muokata sähköpostiosoitettaan vai eivät.");
define('OGP_LANG_old_dashboard_behavior', "Vanha hallintapaneelin toiminta");
define('OGP_LANG_old_dashboard_behavior_info', "Vanha hallintapaneeli toimi hitaammin, mutta näyttää enemmän palvelintietoja (esim. nykyiset pelaajat ja kartat).");
define('OGP_LANG_rsync_available', "Käytettävissä olevat Rsync-palvelimet");
define('OGP_LANG_rsync_available_info', "Valitse palvelinluettelo, joka näytetään rsync-asennuksessa.");
define('OGP_LANG_all_available_servers', "Kaikki käytettävissä olevat palvelimet ( rsync_sites.list + rsync_sites_local.list )");
define('OGP_LANG_only_remote_servers', "Vain etäpalvelimet ( rsync_sites.list )");
define('OGP_LANG_only_local_servers', "Vain paikalliset palvelimet ( rsync_sites_local.list )");
define('OGP_LANG_header_code', "Otsikkokoodi");
define('OGP_LANG_header_code_info', "Täällä voit kirjoittaa oman otsikkokoodisi (kuten HTML-koodi, upotuskoodi jne.) muokkaamatta teema-asettelua.");
define('OGP_LANG_support_widget_title', "Tuki-widgetin otsikko");
define('OGP_LANG_support_widget_title_info', "Mukautettu otsikko tuki-widgetille hallintapaneelin.");
define('OGP_LANG_support_widget_content', "Tuki-widgetin sisältö");
define('OGP_LANG_support_widget_content_info', "Tuki-widgetin sisältö (HTML-koodi sallittu).");
define('OGP_LANG_support_widget_link', "Tuki-widgetin linkki");
define('OGP_LANG_support_widget_link_info', "Tukisivustosi URL-osoite.");
define('OGP_LANG_recaptcha_site_key', "Recaptcha-sivustoavain");
define('OGP_LANG_recaptcha_site_key_info', "Googlen toimittama sivustoavain.");
define('OGP_LANG_recaptcha_secret_key', "Recaptchan salainen avain");
define('OGP_LANG_recaptcha_secret_key_info', "Googlen toimittama salainen avain.");
define('OGP_LANG_recaptcha_use_login', "Käytä Recaptchaa kirjautumisen yhteydessä");
define('OGP_LANG_recaptcha_use_login_info', "Jos tämä on käytössä, käyttäjien on ratkaistava bottitarkistus Recaptcha yritettäessä kirjautua sisään.");
define('OGP_LANG_login_attempts_before_banned', "Epäonnistuneiden kirjautumisyritysten määrä ennen käyttäjän estämistä");
define('OGP_LANG_login_attempts_before_banned_info', "Jos käyttäjä yrittää kirjautua virheellisillä tunnistetiedoilla tätä useammin kuin monta kertaa, paneli estää käyttäjän väliaikaisesti.");
define('OGP_LANG_custom_github_update_username', "GitHub päivitä käyttäjänimi");
define('OGP_LANG_custom_github_update_username_info', "Syötä GITHub-käyttäjänimesi VAIN, jotta voit käyttää omia haaroitettuja arkistojasi OGP:n päivittämiseen. Tätä pitäisi muuttaa vain kehittäjien, jotka haluavat käyttää omia repojaan kehitykseen sen sijaan, että tarkistaisivat mahdollisesti bugista koodia päähaarassa.");
define('OGP_LANG_custom_github_update_branch_name', "GitHub branch name");
define('OGP_LANG_custom_github_update_branch_name_info', "Enter the branch name you want to use for updating OGP. This should only be changed by developers who wish to use their own repos for development rather than checking in possibly buggy code into the main branch.&nbsp; Leave this field blank to default to \"master\"");
define('OGP_LANG_remote_query', "Etäkysely");
define('OGP_LANG_remote_query_info', "Käytä etäpalvelinta (agentti) kyselyihin pelipalvelimille (Vain GameQ ja LGSL).");
define('OGP_LANG_check_expiry_by', "Tarkista vanheneminen");
define('OGP_LANG_check_expiry_by_info', "Jos asetuksena on once_logged_in, käyttäjän pelipalvelinmääritykset poistetaan automaattisesti, jos ne ovat vanhentuneet. Jos asetuksena on cron_job, sinun on luotava cron-tehtävä cron-moduulin avulla tarkistamaan viimeinen voimassaolopäivä määritetyllä aikavälillä.");
define('OGP_LANG_once_logged_in', "Kun kirjautuu sisään");
define('OGP_LANG_cron_job', "Cron-tehtävä");
define('OGP_LANG_theme_settings', "Teema Asetukset");
define('OGP_LANG_theme', "Teema");
define('OGP_LANG_theme_info', "Tässä valittu teema on kaikkien käyttäjien oletusteema. Käyttäjät voivat vaihtaa teemaansa profiilisivulta.");
define('OGP_LANG_welcome_title', "Tervetuloa-otsikko");
define('OGP_LANG_welcome_title_info', "Ottaa käyttöön otsikon, joka näkyy hallintapaneelin yläosassa.");
define('OGP_LANG_welcome_title_message', "Tervetuloa-otsikkoviesti");
define('OGP_LANG_welcome_title_message_info', "Hallintapaneelin yläosassa näkyvä otsikkoviesti (HTML-koodi sallittu).");
define('OGP_LANG_logo_link', "Logon linkki");
define('OGP_LANG_logo_link_info', "Logon hyperlinkki. <b style='font-size:10px; font-weight:normal;'>(Jos jätät sen tyhjäksi, se linkitetään hallintapaneeliin)</b>");
define('OGP_LANG_custom_tab', "Mukautettu-välilehti");
define('OGP_LANG_custom_tab_info', "Lisää mukautettavan välilehden valikon loppuun. <b style='font-size:10px; font-weight:normal;'>(Käytä ja päivitä tämä sivu muokataksesi välilehden asetuksia)</b>");
define('OGP_LANG_custom_tab_name', "Mukautetun välilehden nimi");
define('OGP_LANG_custom_tab_name_info', "Välilehden näyttönimi.");
define('OGP_LANG_custom_tab_link', "Mukautettu-välilehden linkki");
define('OGP_LANG_custom_tab_link_info', "Välilehden hyperlinkki.");
define('OGP_LANG_custom_tab_sub', "Mukautetut alivälilehdet");
define('OGP_LANG_custom_tab_sub_info', "Lisää mukautettavia alivälilehtiä, kun viet hiiren osoittimen Mukautettu-välilehden päälle.");
define('OGP_LANG_custom_tab_sub_name', "Alivälilehden #1 nimi");
define('OGP_LANG_custom_tab_sub_link', "Alivälilehden #1 linkki");
define('OGP_LANG_custom_tab_sub_name2', "Alivälilehden #2 nimi");
define('OGP_LANG_custom_tab_sub_link2', "Alivälilehden #2 linkki");
define('OGP_LANG_custom_tab_sub_name3', "Alivälilehden #3 nimi");
define('OGP_LANG_custom_tab_sub_link3', "Alivälilehden #3 linkki");
define('OGP_LANG_custom_tab_sub_name4', "Alivälilehden #4 nimi");
define('OGP_LANG_custom_tab_sub_link4', "Alivälilehden #4 linkki");
define('OGP_LANG_custom_tab_target_blank', "Mukautettujen välilehtien kohde");
define('OGP_LANG_custom_tab_target_blank_info', "Asettaa kaikki välilehdet. <b style='font-size:10px; font-weight:normal;'>(Self_Page = Avaa linkin samalla sivulla. New_Page = Avaa linkin uudella välilehdellä.)</b>");
define('OGP_LANG_bg_wrapper', "Taustakääre");
define('OGP_LANG_bg_wrapper_info', "Kääreiden taustakuva. <b style='font-size:10px; font-weight:normal;'>(Saatavilla vain joillakin teemoilla.)</b>");
define('OGP_LANG_show_server_id_game_monitor', "Näytä palvelin ID:t Pelimonitori-sivulla");
define('OGP_LANG_show_server_id_game_monitor_info', "Näytä pelipalvelimen ID sarake Pelimonitorissa, jotta Agentin luomat tiedostot vastaavat todellista pelipalvelinta.");
define('OGP_LANG_default_game_server_home_path_prefix', "Oletus pelipalvelimen kotihakemiston etuliite");
define('OGP_LANG_default_game_server_home_path_prefix_info', "Anna polun etuliite, mihin haluat, että pelipalvelimen koti luodaan oletuksena. Voit käyttää \"{USERNAME}\" polkua, joka korvataan pelipalvelimelle määritetyllä OGP-käyttäjänimellä. Voit käyttää \"{GAMEKEY}\" polussa, joka korvataan pienellä kirjoitetulla nimellä. Voit käyttää \"{SKIPID}\" -kohtaa missä tahansa polussa ohittaaksesi koti ID:n liittämisen polkuun. Esimerkki: /ogp/games/{KÄYTTÄJÄNIMI}/{GAMEKEY}{SKIPID} tulee /ogp/games/username/arkse/. Esimerkki 2: /ogp/games tulee /ogp/games/1, jossa 1 on pelipalvelimen ID.");
define('OGP_LANG_use_authorized_hosts', "Rajoita API määriteltyihin valtuutettuihin osoitteisiin");
define('OGP_LANG_use_authorized_hosts_info', "Ota tämä asetus käyttöön, jos haluat sallia API-kutsut vain ennalta määritetyistä ja hyväksytyistä IP-osoitteista.&nbsp; Hyväksytyt osoitteet voidaan asettaa tälle sivulle, kun asetus on otettu käyttöön. &nbsp; Jos tämä asetus ei ole käytössä, kelvollista avainta käyttävällä käyttäjällä on pääsy API:in mistä tahansa IP-osoitteesta. &nbsp; Kelvollista avainta käyttävät käyttäjät voivat käyttää API:a halliten mitä tahansa pelipalvelinta, jonka hallintaan heillä on oikeudet.");
define('OGP_LANG_allow_setting_cpu_affinity', "Salli CPU:n ydinmäärityksen asettamisen pelipalvelimille");
define('OGP_LANG_allow_setting_cpu_affinity_info', "Jos tämä on käytössä, pelikotia luovalle järjestelmänvalvojalle näytetään CPU-affiniteetti (ydinmääritys) pelipalvelimelle.");
define('OGP_LANG_setup_api_authorized_hosts', "Asenna API-valtuutetut osoitteet");
define('OGP_LANG_autohorized_hosts', "Valtuutetut osoitteet");
define('OGP_LANG_add', "Lisää");
define('OGP_LANG_remove', "Poista");
define('OGP_LANG_default_trusted_hosts', "Oletus luotetut osoitteet");
define('OGP_LANG_trusted_host_or_proxy_addresses_or_cidr', "Luotetut osoitteet tai välityspalvelimet (IPv4/IPv6-osoitteet tai CIDR)");
define('OGP_LANG_trusted_forwarded_ip_addresses_or_cidr', "Luotetut välitetyt IP-osoitteet (IPv4/IPv6-osoitteet tai CIDR)");
define('OGP_LANG_reset_game_server_order', "Nollaa pelipalvelimen järjestäminen");
define('OGP_LANG_reset_game_server_order_info', "Palauttaa pelipalvelimien järjestyksen takaisin oletusasetukseen, joka on pelipalvelimen ID");
define('OGP_LANG_regex_invalid_file_name_chars', "Virheelliset tiedostonimen merkit Regex");
define('OGP_LANG_regex_invalid_file_name_chars_info', "Muuta tätä regex-mallia, jos haluat sallia erilaiset merkit tiedostojen nimissä.");
define('OGP_LANG_login_ban_time', "Epäonnistuneen kirjautumisen estoaika (Sekuntia)");
define('OGP_LANG_login_ban_time_info', "Aika sekunteina, jolloin IP-osoite on kielletty kirjautumasta paneeliin määritetyn määrän epäonnistuneiden kirjautumisyritysten jälkeen.");
?>
