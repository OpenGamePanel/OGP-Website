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

function numbersFormatting($bytes){
	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
}

function exec_ogp_module()
{
	global $db;
	include_once ("modules/status/include/status_functions.php");
	include_once ("modules/status/config.php");
	include_once ("modules/status/include/os.php");
	//CPU Usage
	if ($modulecpu == "1") {
		include_once ("modules/status/include/cpu.php");
	}
	//RAM Usage
	if ($modulememory == "1") {
		include_once ("modules/status/include/ram.php");
	}
	//HDD Space
	if ($modulestorage == "1") {
		include_once ("modules/status/include/hdd.php");
	}
	//System Uptime
	if ($modulesystemuptime == "1") 
	{
		include_once ("modules/status/include/uptime.php");
	}
	// System task information snapshot
	if ($modulesystemtasks == "1") 
	{
		include_once ("modules/status/include/task.php");
	}
	
	if ($modulesystemuptime == "1") 
	{
		echo "<div id=\"column4\" style=\"font-size:12pt;width:59%;float:left;margin-left:1%;\" >
			   <div class=\"dragbox bloc rounded\" >
			   <h4>".get_lang('system_uptime')."</h4>
			    <div class=\"dragbox-content\">
				<center>
				<b>".get_lang('system_up_time').": " . @$indexuptime . "<br>
			    ".get_lang('system_up_since').": " . @$indexuptimesince . "
				</b></center>
			    </div>
			   </div>
			  </div>";
	}

	if (extension_loaded('gd')) {

		if ($modulecpu == "1" and $nocpushow != "1") 
		{
			echo "<div id=\"column4\" style=\"width:49.5%;float:right;margin-top:1%;\" >
				   <div class=\"dragbox bloc rounded\">
				   <h4>".get_lang('cpu_usage')."</h4>
				   <div class=\"dragbox-content\">";
			ksort($cores);
			foreach($cores as $cpu => $percent)
			{		 
				echo "<b>CPU" . $cpu . " ".get_lang('cpu_load').": " . $percent . " %</b><br>";
				drawBarDiv($percent, "CPU" . $cpu);
			}
		
			echo '</div>
				  </div>
				 </div>';
		}
		if ($modulememory == "1") {
			echo "<div id=\"column4\" style=\"width:49.5%;float:left;margin-top:1%;\" >
			    <div class=\"dragbox bloc rounded\" >
			    <h4>".get_lang('ram_usage')."</h4>
			     <div class=\"dragbox-content\">
			     <b>".get_lang('ram_used').": " . $ramusage . "<br></b>";
			drawBarDiv($rampercent, "RAM");
			echo "
			     </div>
			    </div></div>";
		}
		if ($modulestorage == "1") 
		{
			echo "<div id=\"column4\" style=\"width:100%;float:left;margin-top:1%;\" >
				   <div class=\"dragbox bloc rounded\" >
				   <h4>".get_lang('storage_space')."</h4>
				    <div class=\"dragbox-content\">
				    <b>".get_lang('storage_total').": " . $diskspace . "<br>
				    ".get_lang('storage_used').": " . $diskinuse . "<br>";
				    
				    drawBarDiv($hddbarusage, "HDD");
				    
				    echo get_lang('storage_free').": " . $hddfreespace . "</b>
				    </div>
				   </div>
				  </div>";
		}

	} else {
		echo "<div id=\"column4\" style=\"width:100%;float:left;margin-top:1%;\"
			<div class=\"dragbox bloc rounded\">
				<h4>".get_lang('status_extension_required')."</h4>
				<div class=\"dragbox-content\"><center><b>".get_lang('gd_info')."</b></center></div>
			</div>
		</div>";
	}

	if($modulesystemtasks == "1"){
		echo "<div id=\"column4\" style=\"width:100%;float:left;margin-top:1%;\" >
				<div class=\"dragbox bloc rounded\" >
					<h4>".get_lang('process_monitor')."</h4>
					<div class=\"dragbox-content\">";
		if(isset($taskoutput) && is_array($taskoutput) && isset($taskoutput["task"]) && !empty($taskoutput["task"])){
			echo "<pre>" . htmlentities($taskoutput["task"]) . "</pre>";
		}

		echo '		</div>
				</div>
			  </div>';
	}
}

?>