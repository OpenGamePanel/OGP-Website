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

require_once('includes/lib_remote.php');
function pretty_text_ttf($im, $fontsize, $angle, $x, $y, $color, $font, $string, $outline = false) {
	$black  = imagecolorallocate($bgImg, 0, 0, 0);

	// Black outline
	if($outline){
		imagettftext($im, $fontsize, $angle, $x - 1, $y - 1, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x - 1, $y, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x - 1, $y + 1, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x, $y - 1, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x, $y + 1, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x + 1, $y - 1, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x + 1, $y, $black, $font, $string);
		imagettftext($im, $fontsize, $angle, $x + 1, $y + 1, $black, $font, $string);
	}

	// Your text
	imagettftext($im, $fontsize, $angle, $x, $y, $color, $font, $string);
	return $im;
}

function dsi_make_img($im = false, $cache_on = false, $cache_data = false, $force_cached = false, $format = false){
	header("Content-type: image/png");
	
	if($cache_on && $cache_data["file"]){
		$expire = gmdate("D, d M Y H:i:s", $cache_data["cache_expire"])." GMT";
		//$last = gmdate("D, d M Y H:i:s", filemtime($cache_data["file"]))." GMT";
		
		header("Expires: ".$expire);
		
		if(!$force_cached){ imagepng($im, $cache_data["file"], 9); }
		readfile($cache_data["file"]);
	}
	else{ imagepng($im, null, 9); }
	
	imagedestroy($im);
	exit;
}

function exec_ogp_module() {
	global $db;
	$remote_server = $db->getRemoteServer($_GET['remote_server_id']);

	$remote = new OGPRemoteLibrary( $remote_server['agent_ip'], $remote_server['agent_port'],
									$remote_server['encryption_key'], $remote_server['timeout'] );
	
	$stats = $remote->mon_stats();	
	$im = imagecreatefrompng("images/term.png");
	$stats_lines_array = explode("\n", $stats);
	$text_color = ImageColorAllocate($im,225,225,225);
	$text_font = "includes/fonts/TIMES_SQ.TTF";
	$i = 40;
	foreach ($stats_lines_array as $stats_line)
	{
		pretty_text_ttf($im,11,0,5,$i,$text_color,$text_font,utf8_decode($stats_line), true); // Servername
		$i = $i+20;
	}
	dsi_make_img($im, true);
	return;
}