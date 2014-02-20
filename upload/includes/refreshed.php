<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
#	Open Game Panel refreshed Class
#	Wrote by: Nirock
#	Sample Setup:
/*
	// Using the refreshed class
	require_once("includes/refreshed.php");
	$refresh = new refreshed();
	$pos = $refresh->add("home.php?m=gamemanager&p=log2&type=pop&home_id=5",5000);
	echo $refresh->getdiv($pos,"height:500px;overflow : auto;");
	//Build: 
	?><script type="text/javascript">$(document).ready(function(){ <?php echo $refresh->build(); ?>} ); </script><?php
*/

class refreshed
{
	private $url;
	private $pos;
	
	public function refreshed()
	{
		$this->url = array();
		$this->pos = 0;
	}
	
	public function add($url)
	{
		$this->url[$this->pos] = $url;
		$this->pos++;
		return $this->pos-1;
	}
	
	public function getdiv($pos,$style = "")
	{
		return "<div id='refreshed-".$pos."' style='".$style."'></div>"; 
	}
	
	public function build($time = "4000")
	{
		$first = "";
		$second = "";
		
		for($i=0;$i<$this->pos;$i++)
		{
			$ref = '#refreshed-'.$i;
			$first .= "\n$('".$ref."').load('".$this->url[$i]."');$('".$ref."').animate({ scrollTop: $('".$ref."').prop('scrollHeight')*3}, 3000);";
			$second .= "\n$('".$ref."').load('".$this->url[$i]."');$('".$ref."').animate({ scrollTop: 9999});";
		}
		return $first."
			var refreshId = setInterval(function() { 
				 ".$second."
			}, $time); 
			$.ajaxSetup({ cache: false });";
	}
}	

?>