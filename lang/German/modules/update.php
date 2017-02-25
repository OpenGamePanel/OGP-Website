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
define('curl_needed', "Diese Seite erfordert das PHP-Curl Modul.");
define('no_access', "Sie benötigen Administratorrechte um auf diese Seite zuzugreifen.");
define('dwl_update', "Update herunterladen...");
define('dwl_complete', "Download abgeschlossen");
define('install_update', "Update wird installiert...");
define('update_complete', "Aktualisierung abgeschlossen");
define('ignored_files', "%s Dateien ignoriert.");
define('not_updated_files_blacklisted', "Nicht aktualisierte/installierte Dateien (Ausgeschlossen):<br>%s");
define('latest_version', "Neueste version");
define('panel_version', "Panel Version");
define('update_now', "Jetzt aktualisieren");
define('the_panel_is_up_to_date', "The Panel is up-to-date.");
define('files_overwritten', "%s Dateien überschrieben.");
define('can_not_update_non_writable_files', "Kann nicht aktualisiert werden, da die folgenden Dateien/Ordner nicht beschreibbar sind");
define('dwl_failed', "Der Download-Link ist nicht verfügbar: \"%s\".<br>Versuchen Sie es später erneut.");
define('temp_folder_not_writable', "Der Download kann nicht platziert werden, da Apache im Temporärern Systemordner (%s) keine Schreibberechtigung hat.");
define('base_dir_not_writable', "Das Panel kann nicht aktualisiert werden, weil Apache keine Schreibrechte hat im Ordner \"%s\".");
define('new_files', "%s neue Dateien.");
define('updated_files', "Aktualisierte Dateien:<br>%s");
define('select_mirror', "Mirror wählen");
define('view_changes', "Änderungen anzeigen");
define('get_x_revison_messages_may_take_some_time', "Hole %s Revisionsnachrichten. Dies kann einige Zeit dauern.");
define('updating_modules', "Aktualisierung der Module");
define('updating_finished', "Aktualisierung abgeschlossen");
define('updated_module', "Aktualisierte Module: '%s'.");
define('blacklist_files', "Ausgeschlossene Dateien");
define('blacklist_files_info', "Alle markierten Dateien werden nicht aktualisiert.");
define('save_to_blacklist', "Zur Blacklist speichern");
define('no_new_updates', "Keine neuen updates");
?>