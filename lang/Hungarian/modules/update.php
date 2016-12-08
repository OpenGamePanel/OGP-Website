<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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
define('curl_needed', "Ez az oldal megköveteli a PHP curl modult.");
define('no_access', "Adminisztrátori jog szükséges az oldal eléréséhez.");
define('dwl_update', "Frissítés letöltése...");
define('dwl_complete', "A letöltés befejezve");
define('install_update', "Frissítés telepítése...");
define('update_complete', "Frissítés befejezve");
define('ignored_files', "%s fájl figyelmen kívül hagyva.");
define('not_updated_files_blacklisted', "Nem frissített/telepített fájlok (Feketelistás):<br>%s");
define('latest_version', "Legújabb verzió");
define('panel_version', "Panel verzió");
define('update_now', "Frissítés most");
define('the_panel_is_up_to_date', "A panel naprakész.");
define('files_overwritten', "%s fájl felülírva.");
define('can_not_update_non_writable_files', "Nem lehet frissíteni, mert az alábbi fájlok/mappák nem írhatóak");
define('dwl_failed', "A letöltési link nem elérhető: \"%s\".<br>Próbáld újra később.");
define('temp_folder_not_writable', "The download can not be placed because Apache does not have write permision at the system temporary folder(%s).");
define('base_dir_not_writable', "The panel can not update because Apache does not have write permision at folder \"%s\".");
define('new_files', "%s új fájlok.");
define('updated_files', "Frissített fájlok:<br>%s");
define('select_mirror', "Válassz tükröt");
define('view_changes', "Változások megtekintése");
define('get_x_revison_messages_may_take_some_time', "Get %s revison messages may take some time.");
define('updating_modules', "Modulok frissítése");
define('updating_finished', "A frissítés befejezve");
define('updated_module', "Frissített modul: '%s'.");
define('blacklist_files', "Feketelistás fájlok");
define('blacklist_files_info', "All marked files will not be updated.");
define('save_to_blacklist', "Save to blacklist");
define('no_new_updates', "Nincsenek új frissítések");
?>