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

function exec_ogp_module()
{
    global $db;
    global $view;

    print "<h2>".get_lang_f('uninstalling_module',$_REQUEST['module'])."</h2>";

    require_once('modules/modulemanager/module_handling.php');

    if ( isset($_REQUEST['id']) && isset($_REQUEST['module']) &&
        uninstall_module($db, $_REQUEST['id'], $_REQUEST['module']) === TRUE )
        print_success(get_lang_f("successfully_uninstalled_module",$_REQUEST['module']));
    else
        print_failure(get_lang_f("failed_to_uninstall_module",$_REQUEST['module']));

    $view->refresh("?m=modulemanager");
}
?>
