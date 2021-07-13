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

include('litefm.php');
define('OGP_LANG_curl_needed', "Tämä sivu vaatii PHP-curl-moduulin.");
define('OGP_LANG_no_access', "Tarvitset järjestelmänvalvojan oikeudet käyttääksesi tätä sivua.");
define('OGP_LANG_dwl_update', "Ladataan päivitystä...");
define('OGP_LANG_dwl_complete', "Lataus valmis");
define('OGP_LANG_install_update', "Asennetaan päivitystä...");
define('OGP_LANG_update_complete', "Päivitys valmis.");
define('OGP_LANG_ignored_files', "%s ohitettu tiedosto(t)");
define('OGP_LANG_not_updated_files_blacklisted', "Ei päivitetyt/asennetut tiedostot (mustalistatut): <br>%s");
define('OGP_LANG_latest_version', "Viimeisin versio");
define('OGP_LANG_panel_version', "Panelin versio");
define('OGP_LANG_update_now', "Päivitä nyt");
define('OGP_LANG_the_panel_is_up_to_date', "Panel on ajan tasalla.");
define('OGP_LANG_files_overwritten', "%stiedostoa ylikirjoitettu");
define('OGP_LANG_files_not_overwritten', "%s tiedostoja EI korvata mustan listan takia");
define('OGP_LANG_can_not_update_non_writable_files', "Ei voi päivittää, koska seuraavia tiedostoja/kansioita ei voi kirjoittaa");
define('OGP_LANG_dwl_failed', "Latauslinkki ei ole käytettävissä: \"%s\" .<br>Yritä myöhemmin uudelleen.");
define('OGP_LANG_temp_folder_not_writable', "Latausta ei voi sijoittaa, koska Apachella ei ole kirjoitusoikeuksia järjestelmän väliaikaisessa kansiossa (%s).");
define('OGP_LANG_base_dir_not_writable', "Paneelia ei voi päivittää, koska Apachella ei ole kirjoitusoikeuksia kansioon \"%s\".");
define('OGP_LANG_new_files', "%suudet tiedostot.");
define('OGP_LANG_updated_files', "Päivitetyt tiedostot:<br>%s");
define('OGP_LANG_select_mirror', "Valitse peili");
define('OGP_LANG_view_changes', "Katso muutokset");
define('OGP_LANG_updating_modules', "Päivitetään moduulit");
define('OGP_LANG_updating_finished', "Päivitys valmis");
define('OGP_LANG_updated_module', "Päivitetyt moduulit: '%s'.");
define('OGP_LANG_blacklist_files', "Mustalistatut tiedostot");
define('OGP_LANG_blacklist_files_info', "Kaikkia merkittyjä tiedostoja ei päivitetä.");
define('OGP_LANG_save_to_blacklist', "Tallenna mustalle listalle");
define('OGP_LANG_no_new_updates', "Ei uusia päivityksiä");
define('OGP_LANG_module_file_missing', "hakemistosta puuttuu module.php-tiedosto.");
define('OGP_LANG_query_failed', "Kyselyn suorittaminen epäonnistui");
define('OGP_LANG_query_failed_2', "tietokantaan.");
define('OGP_LANG_missing_zip_extension', "Php-zip-laajennusta ei ole ladattu. Ota se käyttöön Päivitä moduuli-avulla.");
?>