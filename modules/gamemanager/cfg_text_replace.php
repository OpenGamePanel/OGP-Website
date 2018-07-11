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

if (empty($server_home["ip"]))
	$server_home["ip"] = $ip;
if (empty($server_home["port"]))
	$server_home["port"] = $port;

$server_home['ip_port'] = $server_home['ip'] . ':' . $server_home['port'];

$server_home["true"] = "";
$last_param = json_decode($db->getLastParam($server_home["home_id"]), True);		
$server_home["max_players"] = isset($cli_param_data['PLAYERS']) ? $cli_param_data['PLAYERS'] : $last_param['players'];
$server_home["webhost_ip"] = $_SERVER['SERVER_ADDR'];
$server_home["incremental"] = $db->incrementalNumByHomeId( $server_home["home_id"], $server_home["mod_cfg_id"], $server_home["remote_server_id"] );
$server_home["map"] = isset($cli_param_data['MAP']) ? $cli_param_data['MAP'] : $last_param['map'];

$isWin = preg_match('/CYGWIN/', $remote->what_os());

if(	isset($server_xml->gameq_query_name) )
{
	$server_home["query_port"] = get_query_port($server_xml, $server_home['port']);
}
elseif(	isset($server_xml->lgsl_query_name) )
{
	$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $server_home['port'], "", "");
	$server_home["query_port"] = $get_q_and_s['1'];
}

$replace_texts = $server_xml->replace_texts->text;
$replace_id = 0;
if($replace_texts)
{
	foreach ($replace_texts as $text => $array )
	{
		$param = (string)$array['key'];
		
		if ($param == 'home_path' && $isWin) {
			$info_param = rtrim($remote->exec('cygpath -w /')) . $server_home[$param];
		} else {
			$info_param = $server_home[$param];
		}
		
		$replacements[$replace_id]['info_param'] = $info_param;
		
		foreach ($array as $key => $value )
		{
			if ($key == "default")
				$replacements[$replace_id]['default'] = (string)$value;
			if ($key == "var")
				$replacements[$replace_id]['var'] = (string)$value;
			if ($key == "filepath")
				$replacements[$replace_id]['filepath'] = (string)$value;
			if ($key == "options")
				$replacements[$replace_id]['options'] = (string)$value;
			if ($key == "occurrence")
				$replacements[$replace_id]['occurrence'] = (string)$value;
		}
		$replace_id++;
	}
}

$custom_fields = json_decode($db->getCustomFields($server_home["home_id"]), True);
$fields = $server_xml->custom_fields->field;
if($fields)
{
	foreach ($fields as $text => $array )
	{
		foreach ($array as $key => $value )
		{			
			if ($key == "default_value")
			{
				if (array_key_exists((string)$array['key'], $custom_fields))
					$replacements[$replace_id]['info_param'] = strip_real_escape_string((string)$custom_fields[(string)$array['key']]);
				else
					$replacements[$replace_id]['info_param'] = (string)$value;
			}
			if ($key == "default")
				$replacements[$replace_id]['default'] = (string)$value;
			if ($key == "var")
				$replacements[$replace_id]['var'] = (string)$value;
			if ($key == "filepath")
				$replacements[$replace_id]['filepath'] = (string)$value;
			if ($key == "options")
				$replacements[$replace_id]['options'] = (string)$value;
			if ($key == "occurrence")
				$replacements[$replace_id]['occurrence'] = (string)$value;
		}
		$replace_id++;
	}
}

foreach($replacements as $key => $replacement)
{	
	$filepath = $replacement['filepath'];
	$file_replacements[$filepath][$key] = $replacement;
}

/* echo "<xmp>";
print_r($file_replacements);
echo "</xmp>"; */

require_once('includes/lib_remote.php');
$remote = new OGPRemoteLibrary($server_home['agent_ip'], $server_home['agent_port'], $server_home['encryption_key'], $server_home['timeout']);

foreach($file_replacements as $filepath => $replacements)
{
	$file_info =  $remote->remote_readfile($server_home['home_path']."/$filepath",$file_content);
		
	if ( $file_info === 0 )
	{
		$remote->exec( "touch ".$server_home['home_path']."/$filepath" );
		$file_info = "";
	}
	
	foreach($replacements as $replacement)
	{	
		$info_param = $replacement['info_param'];
		$default = $replacement['default'];
		$var = $replacement['var'];
		$options = $replacement['options'];
		$occurrence = !isset($replacement['occurrence']) || empty($replacement['occurrence']) || !is_numeric($replacement['occurrence']) || $replacement['occurrence'] < 1 ? false : $replacement['occurrence'];
		
		if( !in_array( $options, array("tags","tagValueByName","sc","sqc") ) )
		{
			$match_found = preg_match("/$default/m", $file_content);
			if($var == "")
			{
				$preg_info_param = preg_quote($info_param, "/");
				if ($options == "s")//separated
					$match_info_param = preg_match("/^\s$preg_info_param/m", $file_content);
				elseif ($options == "q")//quoted
					$match_info_param = preg_match("/^\"$preg_info_param\"/m", $file_content);
				elseif ($options == "sq")//separated & quoted
					$match_info_param = preg_match("/^\s\"$preg_info_param\"/m", $file_content);
				elseif ($options == "")
					$match_info_param = preg_match("/^$preg_info_param/m", $file_content);
					
				if($match_info_param == 1)
					continue;
			}
		}
		else 
			$match_found = 1;
			
		if(!$match_found or $match_found === 0)
		{
			if ($options == "s")//separated
				$file_content .= "\n$var $info_param";
			elseif ($options == "q")//quoted
				$file_content .= "\n$var\"" . str_replace('"', '\"', $info_param) . "\"";
			elseif ($options == "sq")//separated & quoted
				$file_content .= "\n$var \"" . str_replace('"', '\"', $info_param) . "\"";
			elseif ($options == "key-regex")
			{
				$var = str_replace("%key%", $info_param, $var);
				$file_content .= "\n$var";
			}
			elseif ($options == "")
				$file_content .= "\n$var$info_param";
		}
		else
		{
			if ($options == "tags"){
				if($occurrence !== false){
					$file_content = preg_replace_nth("/(<$default$var>)(.*)(<\/$default>)/m", '${1}'.$info_param.'${3}', $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/(<$default$var>)(.*)(<\/$default>)/m", '${1}'.$info_param.'${3}', $file_content, 1);
				}
			}
			elseif ($options == "tagValueByName"){
				if($occurrence !== false){
					$file_content = preg_replace_nth('/('.$default.'.*name="'.$var.'".*value=)(".*")/m', '${1}"' . str_replace('"', '\"', $info_param) . '"', $file_content, $occurrence);
				}else{				
					$file_content = preg_replace('/('.$default.'.*name="'.$var.'".*value=)(".*")/m', '${1}"' . str_replace('"', '\"', $info_param) . '"', $file_content, 1);
				}
			}
			elseif($options == "s"){//separated
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var $info_param", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var $info_param", $file_content, 1);
				}
			}
			elseif ($options == "q"){//quoted
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var\"" . str_replace('"', '\"', $info_param) . "\"", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var\"" . str_replace('"', '\"', $info_param) . "\"", $file_content, 1);
				}
			}
			elseif ($options == "sq"){//separated & quoted
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var \"" . str_replace('"','\"',$info_param) . "\"", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var \"" . str_replace('"','\"',$info_param) . "\"", $file_content, 1);
				}
			}
			elseif ($options == "sc"){//separated & ending with a comma (used in JC2MP Example)
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var $info_param,", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var $info_param,", $file_content, 1);
				}
			}
			elseif ($options == "sqc"){//separated & quoted & ending with a comma
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var \"" . str_replace('"', '\"', $info_param) . "\",", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var \"" . str_replace('"', '\"', $info_param) . "\",", $file_content, 1);
				}
			}
			elseif ($options == "key-regex")//replace %key% in <var> and use a regular expression
			{
				$var = str_replace("%key%", $info_param, $var);
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var", $file_content, 1);
				}
			}
			else{
				if($occurrence !== false){
					$file_content = preg_replace_nth("/$default/m", "$var$info_param", $file_content, $occurrence);
				}else{
					$file_content = preg_replace("/$default/m", "$var$info_param", $file_content, 1);
				}
			}
		}
	
		if ( get_magic_quotes_gpc() )
			$file_content=stripslashes($file_content);
	}
	//echo "<xmp>".$file_content."</xmp>";
	$remote->remote_writefile($server_home['home_path'] . "/" . $filepath, $file_content);
}
?>