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
define('OGP_LANG_curl_needed', "Ehhez az oldalhoz PHP cURL modul szükséges.");
define('OGP_LANG_no_access', "Adminisztrátori jog szükséges az oldal eléréséhez.");
define('OGP_LANG_dwl_update', "Frissítés letöltése...");
define('OGP_LANG_dwl_complete', "A letöltés kész");
define('OGP_LANG_install_update', "Frissítés telepítése...");
define('OGP_LANG_update_complete', "A frissítés befejeződött");
define('OGP_LANG_ignored_files', "%s figyelmen kívül hagyott fájl");
define('OGP_LANG_not_updated_files_blacklisted', "Nem frissített/telepített fájlok (feketelistás):<br>%s");
define('OGP_LANG_latest_version', "Legújabb verzió");
define('OGP_LANG_panel_version', "Panel verzió");
define('OGP_LANG_update_now', "Frissíts most");
define('OGP_LANG_the_panel_is_up_to_date', "A Panel naprakész.");
define('OGP_LANG_files_overwritten', "%s fájl felülíródott");
define('OGP_LANG_files_not_overwritten', "%s fájl NEM került felülírásra a feketelista miatt");
define('OGP_LANG_can_not_update_non_writable_files', "Nem lehet frissíteni, mert az alábbi fájlok/mappák nem írhatóak");
define('OGP_LANG_dwl_failed', "A letöltési link nem elérhető: \"%s\".<br>Próbáld újra később.");
define('OGP_LANG_temp_folder_not_writable', "A letöltést nem lehet elhelyezni, mert az Apachenak nincs írási engedélye a rendszer ideiglenes mappájába (%s).");
define('OGP_LANG_base_dir_not_writable', "A Panel nem frissíthető, mert az Apache nem rendelkezik írási jogosultsággal a(z) \"%s\" mappán.");
define('OGP_LANG_new_files', "%s új fájlok.");
define('OGP_LANG_updated_files', "Frissített fájlok:<br>%s");
define('OGP_LANG_select_mirror', "Válassz tükröt");
define('OGP_LANG_view_changes', "Változások megtekintése");
define('OGP_LANG_updating_modules', "Modulok frissítése");
define('OGP_LANG_updating_finished', "A frissítés befejezve");
define('OGP_LANG_updated_module', "Frissített modul: '%s'.");
define('OGP_LANG_blacklist_files', "Feketelistás fájlok");
define('OGP_LANG_blacklist_files_info', "Az összes megjelölt fájl nem kerül frissítésre.");
define('OGP_LANG_save_to_blacklist', "Mentés a feketelistába");
define('OGP_LANG_no_new_updates', "Nincsenek új frissítések");
define('OGP_LANG_module_file_missing', "könyvtárban hiányzik a module.php fájl.");
define('OGP_LANG_query_failed', "Sikertelen a lekérdezések végrehajtása");
define('OGP_LANG_query_failed_2', "az adatbázisba.");
define('OGP_LANG_missing_zip_extension', "A php-zip kiterjesztés nincs betöltve. Kérlek, engedélyezd, mert az Update modulnak szüksége van rá.");
?>