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
define('OGP_LANG_curl_needed', "Ova stranica zahtijeva PHP curl modul.");
define('OGP_LANG_no_access', "Trebate administratorska prava za pristup ovoj stranici.");
define('OGP_LANG_dwl_update', "Preuzimanje ažuriranja ...");
define('OGP_LANG_dwl_complete', "Skidanje dovršeno");
define('OGP_LANG_install_update', "Instaliranje ažuriranja ...");
define('OGP_LANG_update_complete', "Ažuriranje je dovršeno");
define('OGP_LANG_ignored_files', "%s ignorirana datoteka(e)");
define('OGP_LANG_not_updated_files_blacklisted', "Nije ažurirana/instalirana datoteka (na crnoj listi):<br>%s");
define('OGP_LANG_latest_version', "Najnovija verzija");
define('OGP_LANG_panel_version', "Verzija Panela");
define('OGP_LANG_update_now', "Ažurirati sada");
define('OGP_LANG_the_panel_is_up_to_date', "Panel je ažuriran");
define('OGP_LANG_files_overwritten', "%s datoteke su prepisane");
define('OGP_LANG_files_not_overwritten', "%s datoteke NISU prepisane zbog crnog lista");
define('OGP_LANG_can_not_update_non_writable_files', "Nije moguće ažurirati jer sljedeće datoteke/mape nisu pisane");
define('OGP_LANG_dwl_failed', "Veza za preuzimanje nije dostupna: \"%s\" .<br>Pokušajte ponovo kasnije.");
define('OGP_LANG_temp_folder_not_writable', "Preuzimanje nije moguće postaviti jer Apache nema dozvolu za pisanje u privremenoj mapi sustava (%s).");
define('OGP_LANG_base_dir_not_writable', "Panel ne može ažurirati jer Apache nema dozvolu za pisanje na mapi \"%s\".");
define('OGP_LANG_new_files', "%s nove datoteke.");
define('OGP_LANG_updated_files', "Ažurirane datoteke:<br>%s");
define('OGP_LANG_select_mirror', "Odaberite");
define('OGP_LANG_view_changes', "Prikaz promjena");
define('OGP_LANG_updating_modules', "Ažuriranje modula");
define('OGP_LANG_updating_finished', "Ažuriranje dovršeno");
define('OGP_LANG_updated_module', "Ažurirani modul: '%s'.");
define('OGP_LANG_blacklist_files', "Dodaj datoteke na crnoj listi");
define('OGP_LANG_blacklist_files_info', "Sve označene datoteke neće biti ažurirane.");
define('OGP_LANG_save_to_blacklist', "Spremiti na crnoj listi");
define('OGP_LANG_no_new_updates', "Nema novih ažuriranja");
define('OGP_LANG_module_file_missing', "u direktoriju fali modul.php datoteka");
define('OGP_LANG_query_failed', "Nije uspjelo izvršavanje upita");
define('OGP_LANG_query_failed_2', "do baze podataka.");
define('OGP_LANG_missing_zip_extension', "PHP-zip ekstenzija nije učitana. Omogućite da upotrijebi Ažuriraj Modul.");
?>