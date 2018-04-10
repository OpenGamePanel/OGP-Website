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

require_once('includes/helpers.php');

navigation();

function navigation() {

    global $db;

    if ( isset($_REQUEST['m']) )
    {
        if ( preg_match('[/|\\|;|\.]',$_REQUEST['m']) !== 0 )
        {
            // Unallowed characters found.
            print_failure("Unallowed characters found from m.");
            return;
        }
        // If module is not installed we must not allow access.
        if ( $db->isModuleInstalled($_REQUEST['m']) === FALSE )
        {
            print_failure(get_lang('module_not_installed'));
            return;
        }
        // If module dir does not exist there has been some error...
        if ( !is_dir( MODULES.$_REQUEST['m'] ) )
        {
            print_failure("Invalid module ".$_REQUEST['m'].".");
            return;
        }
        // There is navigation.xml file lets parse the information.
        if ( is_file( MODULES.$_REQUEST['m'].'/navigation.xml') )
        {
            $xml_navig = simplexml_load_file( MODULES.$_REQUEST['m'].'/navigation.xml' );
            if ( $xml_navig === FALSE )
            {
                print_failure("Invalid XML navigation file.");
                return;
            }

            // If the subpage is not defined we use the default page.
            $wanted_page = isset($_REQUEST['p']) ? $_REQUEST['p'] : "default";
            
            foreach ( $xml_navig->page as $page )
            {
                if ( $page["key"] != $wanted_page )
                    continue;

                $access_groups = explode(",",$page['access']);

                if ( basename($_SERVER['PHP_SELF']) != "index.php"  )
                {
                    if( array_search($_SESSION['users_group'], $access_groups) === FALSE )
					{
						print_failure(get_lang('no_rights') );
						return;
					}
                }
				else
				{
                    if( array_search("guest", $access_groups) === FALSE )
					{
						print_failure(get_lang('no_rights') );
						return;
					}
                }

                $include_file = MODULES.$_REQUEST['m'].'/'.$page['file'];

                if ( !is_file( $include_file ) )
                {
                    print_failure("File (".$include_file.") missing from module.");
                    return;
                }

                include_once( $include_file );

                if ( !function_exists( 'exec_ogp_module' ) )
                {
                    print_failure("Missing module execute function.");
                    return;
                }

                exec_ogp_module();
                return;
            }
            print_failure("Invalid subpage given.");
            return;
        }
        // If no navigation file then we load file with same filename than the module.
        else if ( is_file( MODULES.$_REQUEST['m'].'/'.$_REQUEST['m'].'.php') )
        {
            include( MODULES.$_REQUEST['m'].'/'.$_REQUEST['m'].'.php');
            if ( !function_exists( 'exec_ogp_module' ) )
            {
                print_failure("Missing module execute function.");
                return;
            }
            exec_ogp_module();
        }
        // If files above are not found then we print an error.
        else
        {
            print_failure("Invalid module ".$_REQUEST['m'].".");
            return;
        }
    }
}
?>