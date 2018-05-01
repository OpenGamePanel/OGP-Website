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

define("SERVER_CONFIG_LOCATION","modules/config_games/server_configs/");
define("XML_SCHEMA","modules/config_games/schema_server_config.xml");

/// \return FALSE in case of failure in parsing.
/// \return array containing the elements on success.
function read_server_config( $filename )
{
    $dom = new DOMDocument();
    if ( $dom->load($filename) === FALSE )
    {
        print_failure(get_lang_f('unable_to_load_xml',$filename));
        return FALSE;
    }
    if ( $dom->schemaValidate(XML_SCHEMA) != TRUE )
    {
        print_failure(get_lang_f('xml_file_not_valid',$filename,XML_SCHEMA));
        return FALSE;
    }

    $xml = simplexml_load_file($filename);
    if($xml !== false){
		$xml->addChild('home_cfg_file',basename($filename));
		return $xml;
	}
	
	return false;
}

function xml_get_mod( $server_xml, $mod_key )
{
    foreach ( $server_xml->mods->mod as $xml_mod_tmp )
    {
        if ($xml_mod_tmp['key'] == $mod_key)
        {
            return $xml_mod_tmp;
        }
    }
    return FALSE;
}

?>
