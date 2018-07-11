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

function exec_ogp_module() {
	?>
	<h2>XML Config Creator</h2>
	 <table BORDER=1>
	 <tr>
	 <td>
	  Query protocol
	 </td> 
	 <form action="" method="POST">
	 <td>
	   <select name="protocol" onchange="this.form.submit()">
		<option value="">None</option>
		<option value="lgsl" <?php if(isset($_POST['protocol']) && $_POST['protocol'] == "lgsl") echo 'selected="selected"';?>>LGSL</option>
		<option value="gameq" <?php if(isset($_POST['protocol']) && $_POST['protocol'] == "gameq") echo 'selected="selected"';?>>GameQ</option>
	   </select>
	 </td>
	 </form>
	</tr>
	<form action='home.php?m=config_games&p=cli-params&type=cleared' method='POST' name='xml_creator'>
	<?php
	if(isset($_POST['protocol']))
	{
	echo "
	<tr>
	 <td>
	  <input type='hidden' name='protocol' value='".$_POST['protocol']."'/>
	";	
	 if($_POST['protocol'] == "lgsl")
	 {
	   echo "LGSL Query Name</td><td><select name='query_name'>";
	   require('protocol/lgsl/lgsl_protocol.php');
	   $lgsl_type_list = lgsl_type_list(); 
	   asort($lgsl_type_list);
	   foreach ($lgsl_type_list as $type => $description)
	   {
		 echo "<option value='$type'>$description</option>";
	   }
	 }
	 elseif($_POST['protocol'] == "gameq")
	 {
	  require 'protocol/GameQ/GameQ.php';

	  // Define the protocols path
	  $protocols_path = "protocol/GameQ/gameq/protocols/";

	  // Grab the dir with all the classes available
	  $dir = dir($protocols_path);

	  $protocols = array();

	  // Now lets loop the directories
	  while (false !== ($entry = $dir->read()))
	  {
		if(!is_file($protocols_path.$entry))
		{
			continue;
		}

		// Figure out the class name
		$class_name = 'GameQ_Protocols_'.ucfirst(pathinfo($entry, PATHINFO_FILENAME));

		// Lets get some info on the class
		$reflection = new ReflectionClass($class_name);

		// Check to make sure we can actually load the class
		if(!$reflection->IsInstantiable())
		{
			continue;
		}

		// Load up the class so we can get info
		$class = new $class_name;

		// Add it to the list
		$protocols[$class->name()] = array(
			'name' => $class->name_long(),
			'port' => $class->port(),
			'state' => $class->state(),
		);

		// Unset the class
		unset($class);
	  }

	  // Close the directory
	  unset($dir);

	  ksort($protocols);
	  
	  echo "GameQ Query Name</td><td><select name='query_name'>";
	  
	  foreach ($protocols AS $gameq => $info)
	  {
		echo "<option value='".$gameq."'>".htmlentities($info['name'])."</option>";
	  }
	 }
	 echo "
	  </select>
	 </td>
	</tr>";
	}
	else
	?>
	<tr>
	 <td>
	  OS:
	 </td>
	 <td>
	  <select name="os">
	   <option value="linux">Linux</option>
	   <option value="win">Windows</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Architecture
	 </td>
	 <td>
	  <select name="arch">
	   <option value="32">32bit</option>
	   <option value="64">64bit</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Installer
	 </td>
	 <td>
	  <select name="installer">
	   <option value="">None</option>
	   <option value="steam">HLDSUpdateTool</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	 <input name="main" type="submit"/>
	 </form>
	 </td>
	</tr>
	</table>
<?php
}

