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
function numbersFormatting($bytes){
	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
}

function exec_ogp_module()
{
	global $db;
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
		echo '<div id="column4" style="font-size:12pt;width:59%;float:left;margin-left:1%;" >
			   <div class="dragbox bloc rounded" >
			   <h4>System Uptime</h4>
			    <div class="dragbox-content">
				<center>
				<b>Up&nbsp;Time&nbsp;&nbsp;: ' . @$indexuptime . '<br>
			    Up&nbsp;Since&nbsp;: ' . @$indexuptimesince . '
				</b></center>
			    </div>
			   </div>
			  </div>';
	}
	if ($modulecpu == "1" and $nocpushow != "1") 
	{
		echo '<div id="column4" style="width:49.5%;float:right;margin-top:1%;" >
			   <div class="dragbox bloc rounded">
			   <h4>CPU Usage</h4>
			   <div class="dragbox-content">';
		ksort($cores);
		foreach($cores as $cpu => $percent)
		{		 
			echo '<b>CPU' . $cpu . ' Load: ' . $percent . ' %</b><br>
				  <img src="modules/status/include/bar.php?rating=' . $percent . '" style="width:100%;border:1px solid tranparent;" />';
		}
	
		echo '</div>
			  </div>
			 </div>';
	}
	if ($modulememory == "1") {
		echo '<div id="column4" style="width:49.5%;float:left;margin-top:1%;" >
		    <div class="dragbox bloc rounded" >
		    <h4>RAM Usage</h4>
		     <div class="dragbox-content">
		     <b>Memory Used: ' . $ramusage . '<br></b>
		     <img src="modules/status/include/bar.php?rating=' . $rampercent . '" style="width:100%;border:1px solid tranparent;">
		     </div>
		    </div></div>';
	}
	if ($modulestorage == "1") 
	{
		echo '<div id="column4" style="width:100%;float:left;margin-top:1%;" >
			   <div class="dragbox bloc rounded" >
			   <h4>Storage Space</h4>
			    <div class="dragbox-content">
			    <b>Disk Space: ' . $diskspace . '<br>
			    In Use: ' . $diskinuse . '<br>
			    <img src="modules/status/include/bar.php?rating=' . $hddbarusage . '" style="width:100%;border:1px solid tranparent;"><br>
			    Free Space: ' . $hddfreespace . '</b>
			    </div>
			   </div>
			  </div>';
	}
	if($modulesystemtasks == "1"){
		echo '<div id="column4" style="width:100%;float:left;margin-top:1%;" >
				<div class="dragbox bloc rounded" >
					<h4>Process Monitor</h4>
					<div class="dragbox-content">';
		if(isset($taskoutput) && is_array($taskoutput) && isset($taskoutput["task"]) && !empty($taskoutput["task"])){
			echo "<pre>" . $taskoutput["task"] . "</pre>";
		}

		echo '		</div>
				</div>
			  </div>';
	}
}

?>
