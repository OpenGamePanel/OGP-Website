<table>
  <tr>
   <td>
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
$presets = $db->getRconPresets($home_info['home_cfg_id'],$home_info['mod_cfg_id']);
if($presets > 0)
{
	echo '<form action="" method="post">'.
		  get_lang('rcon_presets').':
		  <select onchange="this.form.submit()" name="command" >
		  <option></option>\n';
	foreach ($presets as $preset)
	{
		echo '<option value="'.$preset['command'].'" >'.$preset['name'].'</option>\n';
	}
	echo '</form>';
}
?>
  </td>
 </tr>
</table>
<table class="center" >
 <tr>
  <td>
	<?php echo get_lang('rcon_command_title'); ?></td>
  <td>
	<form action="" method="post">
	<input class="rcon" type="text" name="rcon_command" size="200" style="width:98%;" value="<?php 
	if( isset($_POST['command']) )
		echo $_POST['command'];
	?>" />
  </td>
  <td>
	  <input type="submit" name="remote_send_rcon_command" value="<?php print_lang('send_command'); ?>" />
	</form>
  </td>
 </tr>
</table>
<?php
if(isset($_POST['remote_send_rcon_command']))
{
	$rconCommand = $_POST['rcon_command'];
		
	if(isset($server_xml->control_protocol_type))$control_type = $server_xml->control_protocol_type; else $control_type = "";
	
	if ( isset($server_xml->gameq_query_name) and  $server_xml->gameq_query_name == "minecraft" and !isset($server_xml->control_protocol) )
	{
		include_once("MinecraftRcon.class.php");
		$rcon_port = $port+10;
		$rcon = new MinecraftRcon;
		if( $rcon->Connect($ip, $rcon_port, $home_info['control_password']) )
		{
			$return = $rcon->Command($rconCommand);
			if ($return);
				echo "<div class='bloc' ><h4>".get_lang('rcon_command_title').": [".$rconCommand."] ".
					  get_lang('has_sent_to')." ". $home_info['home_name']."</h4><xmp style='overflow:scroll;' >$return</xmp></div>";
					  
			$rcon->Disconnect();
			
		}
		else
		{
			echo "".get_lang('need_set_remote_pass')." ".$home_info['home_name']." ".get_lang('before_sending_rcon_com')."<br>";
		}
	}
	elseif( isset($server_xml->lgsl_query_name) and  $server_xml->lgsl_query_name == "7dtd" )
	{
		$query_port = $port + 1;
		$return = $remote->exec('exec 3<>/dev/tcp/'.$ip.'/'. $query_port .' && echo -en "'.$rconCommand.'\\nexit\\n" >&3 && cat <&3');

		if(preg_match("/Connected with 7DTD server/",$return))
		{	
			echo "<div class='bloc' ><h4>".get_lang('rcon_command_title').": [".$rconCommand."] ".
				 get_lang('has_sent_to')." ". $home_info['home_name']."</h4><xmp style='overflow:scroll;' >$return</xmp></div>";
		}
	}
	else
	{
		$remote_retval = $remote->remote_send_rcon_command( $home_id, $ip, $port, $server_xml->control_protocol, $home_info['control_password'],$control_type,$rconCommand,$return);
		
		if ( $remote_retval === -1 )
		{
			print_failure(get_lang("agent_offline"));
		}
		elseif ( $remote_retval === 1 )
		{
				echo "<div class='bloc' ><h4>".get_lang('rcon_command_title').": [".$rconCommand."] ".
					  get_lang('has_sent_to')." ". $home_info['home_name']."</h4><xmp style='overflow:scroll;' >$return</xmp></div>";
		}
		elseif ( $remote_retval === -10 )
		{
			echo "".get_lang('need_set_remote_pass')." ".$home_info['home_name']." ".get_lang('before_sending_rcon_com')."<br>";
		}
	}
}
?>