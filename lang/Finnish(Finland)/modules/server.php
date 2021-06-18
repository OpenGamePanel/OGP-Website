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

define('OGP_LANG_add_new_remote_host', "Lisää etäisäntä");
define('OGP_LANG_configured_remote_hosts', "Määritetty etäisäntä");
define('OGP_LANG_remote_host', "Etäisäntä");
define('OGP_LANG_remote_host_info', "Etäisännän on oltava pingattava isäntänimi!");
define('OGP_LANG_remote_host_port', "Etäisäntäportti");
define('OGP_LANG_remote_host_port_info', "Portti, jota OGP-agentti kuuntelee etäisännässä. Oletus: 12679.");
define('OGP_LANG_remote_host_name', "Etäisäntänimi");
define('OGP_LANG_ogp_user', "OGP-agentin käyttäjätunnus");
define('OGP_LANG_remote_host_name_info', "Etäisäntänimi auttaa käyttäjiä tunnistamaan palvelimiaan.");
define('OGP_LANG_add_remote_host', "Lisää etäisäntä");
define('OGP_LANG_remote_encryption_key', "Etäsalausavain");
define('OGP_LANG_remote_encryption_key_info', "Etäsalausavainta käytetään panelin ja agentin tietojen salaamiseen. Tämän avaimen on oltava sama molemmilla puolilla.");
define('OGP_LANG_server_name', "Palvelimen nimi");
define('OGP_LANG_agent_ip_port', "Agentti IP:Portti");
define('OGP_LANG_agent_status', "Agentin tila");
define('OGP_LANG_ips', "IP:t");
define('OGP_LANG_add_more_ips', "Jos haluat syöttää enemmän IP-osoitteita, paina 'Aseta IP:t', kun kaikki kentät ovat täynnä ja tyhjä kenttä tulee näkyviin.");
define('OGP_LANG_encryption_key_mismatch', "Salausavain ei täsmää Agentin kanssa. Tarkista Agentin määritykset uudelleen.");
define('OGP_LANG_no_ip_for_remote_host', "Sinun on lisättävä vähintään yksi (1) IP-osoite kullekin etäisännälle.");
define('OGP_LANG_note_remote_host', "Etäisäntä on palvelin, jossa OGP-agentti on käynnissä. Jokaisella isännällä voi olla useita IP-osoitteita, joihin käyttäjät voivat sitoa palvelimia.");
define('OGP_LANG_ip_administration', "Palvelin &amp; IP-hallinta :: Open Game Panel");
define('OGP_LANG_unknown_error', "Tuntematon virhe - status_chk palautettu");
define('OGP_LANG_remote_host_user_name', "UNIX-käyttäjä");
define('OGP_LANG_remote_host_user_name_info', "Käyttäjätunnus, jossa agentti on käynnissä. Esimerkki: Jari");
define('OGP_LANG_remote_host_ftp_ip', "FTP IP-osoite");
define('OGP_LANG_remote_host_ftp_ip_info', "Nykyisen Agentin FTP-palvelimen <b>IP-osoite</b>.");
define('OGP_LANG_remote_host_ftp_port', "FTP-portti");
define('OGP_LANG_remote_host_ftp_port_info', "Nykyisen Agentin FTP-palvelimen <b>portti</b>.");
define('OGP_LANG_view_log', "Näytä loki");
define('OGP_LANG_status', "Tila");
define('OGP_LANG_stop_firewall', "Pysäytä palomuuri");
define('OGP_LANG_start_firewall', "Käynnistä palomuuri");
define('OGP_LANG_seconds', "Sekuntia");
define('OGP_LANG_reboot', "Etäpalvelimen uudelleenkäynnistys");
define('OGP_LANG_restart', "Uudelleenkäynnistä agentti");
define('OGP_LANG_confirm_reboot', "Oletko varma, että haluat etänä uudelleenkäynnistää koko fyysisen palvelimen nimeltä '%s'?");
define('OGP_LANG_confirm_restart', "Haluatko varmasti uudelleenkäynnistää agentin nimeltä '%s'?");
define('OGP_LANG_restarting', "Uudelleenäynnistetään agentti... Odota hetki..");
define('OGP_LANG_restarted', "Agentti käynnistettiin uudelleen.");
define('OGP_LANG_reboot_success', "Palvelin nimeltä '%s' käynnistettiin uudelleen. Et voi käyttää palvelinta, ennen kuin se on onnistuneesti käynnistynyt.");
define('OGP_LANG_invalid_remote_host_id', "Virheellinen etäisäntä-ID '%s' annettu.");
define('OGP_LANG_remote_host_removed', "Etäisäntä nimeltä '%s' poistettu.");
define('OGP_LANG_editing_remote_server', "Muokataan etäisäntää nimeltä '%s'");
define('OGP_LANG_remote_server_settings_changed', "Asetusten muuttaminen etäpalvelimeen '%s' onnistui.");
define('OGP_LANG_save_settings', "Tallenna asetukset");
define('OGP_LANG_set_ips', "Aseta IP:t");
define('OGP_LANG_remote_ip', "Etä IP");
define('OGP_LANG_remote_ips_for', "Agent-palvelimella '%s' käytettävien pelipalvelimien IP-osoitteet");
define('OGP_LANG_ips_set_for_server', "IP-osoitteet asetettiin palvelimelle nimeltä '%s' onnistuneesti.");
define('OGP_LANG_could_not_remove_ip', "Vanhoja IP-osoitteita ei voitu poistaa tietokannasta.");
define('OGP_LANG_could_add_ip', "Voisi lisätä etäpalvelimen IP-osoitteen tietokantaan.");
define('OGP_LANG_areyousure_removeagent', "Haluatko varmasti poistaa agentin nimeltä");
define('OGP_LANG_areyousure_removeagent2', "ja kaikki siihen liittyvät kodit ogp-tietokannasta?");
define('OGP_LANG_error_while_remove', "Etäpalvelinta poistettaessa tapahtui virhe.");
define('OGP_LANG_add_ip', "Lisää IP");
define('OGP_LANG_remove_ip', "Poista IP");
define('OGP_LANG_edit_ip', "Muokkaa IP");
define('OGP_LANG_wrote_changes', "Muutokset tallennettu onnistuneesti.");
define('OGP_LANG_there_are_servers_running_on_this_ip', "Tällä IP-osoitteella on palvelimia.");
define('OGP_LANG_enter_ip_host', "Sinun on annettava etäisännän IP-osoite.");
define('OGP_LANG_enter_valid_ip', "Sinun on annettava kelvollinen portti etäisännälle. Portin arvo voi olla välillä 0 - 65535, mutta suositus on välillä 1024 - 65535.");
define('OGP_LANG_could_not_add_server', "Palvelinta ei voitu lisätä");
define('OGP_LANG_to_db', "tietokantaan.");
define('OGP_LANG_added_server', "Lisätty palvelin");
define('OGP_LANG_with_port', "portilla");
define('OGP_LANG_to_db_succesfully', "tietokantaan onnistuneesti.");
define('OGP_LANG_unable_discover', "IP-osoitteiden automaattinen löytäminen ei onnistu");
define('OGP_LANG_set_ip_manually', "Sinun on asetettava ne manuaalisesti.");
define('OGP_LANG_found_ips', "Löydetyt IP-osoitteet");
define('OGP_LANG_for_remote_server', "etäpalvelimelle.");
define('OGP_LANG_failed_add_ip', "IP-osoitteen lisääminen epäonnistui");
define('OGP_LANG_timeout', "Aikakatkaisu");
define('OGP_LANG_timeout_info', "Aikaraja sekunneissa saada vastauksen tästä agentista.");
define('OGP_LANG_use_nat', "Käytä NATtia");
define('OGP_LANG_use_nat_info', "Ota käyttöön, jos etäpalvelimesi käyttää NAT-sääntöjä. Käytä tätä asetusta, jos pelipalvelimesi käyvät sisäisillä yksityisillä LAN-IP-osoitteilla, jotta paneeli käyttää todellista IP-etäosoitettasi pelipalvelimien kyselyyn.");
define('OGP_LANG_arrange_ports', "Järjestä portit");
define('OGP_LANG_assign_new_ports_range_for_ip', "Määritä uusi porttialue IP:lle %s");
define('OGP_LANG_assigned_port_ranges_for_ip', "Määritetyt porttialueet IP:lle %s");
define('OGP_LANG_assigned_ports_for_ip', "Määritetyt portit IP:lle %s");
define('OGP_LANG_unspecified_game_types', "Määrittelemättömät pelityypit");
define('OGP_LANG_start_port', "Aloitusportti:");
define('OGP_LANG_end_port', "Lopetusportti:");
define('OGP_LANG_port_increment', "Porttien lisäys:");
define('OGP_LANG_total_assignable_ports', "Määritettäviä portteja yhteensä:");
define('OGP_LANG_available_range_ports', "Saatavilla oleva porttialue:");
define('OGP_LANG_assign_range', "Määritä alue");
define('OGP_LANG_edit_range', "Muokkaa aluetta");
define('OGP_LANG_delete_range', "Poista alue");
define('OGP_LANG_home_id', "Kodin ID");
define('OGP_LANG_home_path', "Kodin polku");
define('OGP_LANG_game_type', "Pelin tyyppi");
define('OGP_LANG_port', "Portti");
define('OGP_LANG_invalid_values', "Virheelliset arvot.");
define('OGP_LANG_ports_in_range_already_arranged', "Alueen portit on jo järjestetty.");
define('OGP_LANG_ports_range_already_configured_for', "Porttialue on jo määritetty kohteelle %s.");
define('OGP_LANG_ports_range_added_successfull_for', "Porttialue lisättiin onnistuneesti kohteelle %s.");
define('OGP_LANG_ports_range_deleted_successfull', "Porttialue poistettu.");
define('OGP_LANG_ports_range_edited_successfull_for', "Porttialueiden muokkaus onnistui kohteelle %s.");
define('OGP_LANG_editing_firewall_for_remote_server', "Palomuurin muokkaaminen etäpalvelimelle nimeltä '%s'");
define('OGP_LANG_default_allowed', "Sallittu oletuksena");
define('OGP_LANG_allow_port_command', "Salli porttikomento");
define('OGP_LANG_deny_port_command', "Hylkää porttikomento");
define('OGP_LANG_allow_ip_port_command', "Salli IP:portti-komento");
define('OGP_LANG_deny_ip_port_command', "Estä IP:portti-komento");
define('OGP_LANG_enable_firewall_command', "Ota käyttöön palomuurikomento");
define('OGP_LANG_disable_firewall_command', "Poista käytöstä palomuurikomento");
define('OGP_LANG_get_firewall_status_command', "Hanki palomuurin tilakomento");
define('OGP_LANG_reset_firewall_command', "Nollaa palomuurikomento");
define('OGP_LANG_firewall_status', "Palomuurin tila");
define('OGP_LANG_save_firewall_settings', "Tallenna palomuuriasetukset");
define('OGP_LANG_reset_firewall', "Nollaa palomuuri");
define('OGP_LANG_firewall_settings', "Palomuuriasetukset");
define('OGP_LANG_display_public_ip', "Näytä julkinen IP-osoite");
define('OGP_LANG_ips_can_be_internal_external', "Anna käyttökelpoiset IP-osoitteet.&nbsp; Julkisia IP-osoitteita ja sisäisiä LAN-IP-osoitteita (NAT-asetuksia varten) voidaan käyttää.");
?>
