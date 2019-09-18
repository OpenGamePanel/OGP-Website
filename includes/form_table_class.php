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

 ?>
<style>
.tip{
	display:none;
}
.image-tip:hover .tip, .tip:hover{
	font-weight:bold;
	display:block;
	padding: 4px 8px;
	color: #333;
	position: absolute;
	margin-left:16px;
	margin-top:-22px;
	z-index: 20;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0px 0px 4px #222;
	-webkit-box-shadow: 0px 0px 4px #222;
	box-shadow: 0px 0px 4px #222;
	background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
	background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #eeeeee),color-stop(1, #cccccc));
	background-image: -webkit-linear-gradient(top, #eeeeee, #cccccc);
	background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
	background-image: -ms-linear-gradient(top, #eeeeee, #cccccc);
	background-image: -o-linear-gradient(top, #eeeeee, #cccccc);
	text-align:left !important;
}
.center{
	margin-left:auto;
	margin-right:auto;
	text-align:center !important;
}
</style>
<?php

class FormTable {

	
	public function __construct()
	{
		$this->i = 0;
	}

	public function start_form($action, $method = "post", $extra = "")
	{
		echo "<div align='center'>";
		echo "<form action='".$action."' method='".$method."' $extra >";
	}

	public function start_table()
	{
		echo "<table class='center'>";
	}

	public function add_field_hidden($name, $value)
	{
		echo "<input type='hidden' name='".$name."' value='".@$value."'/>";
	}

	public function add_field($type, $name, $value, $size = 50, $extra = "")
	{
		echo "<tr><td align='right'><label for='".$name."'>".get_lang($name).":</label></td>";
		echo "<td align='left'>";
		if ($type === "string")
		{
			echo "<input type='text' id='".$name."' name='".$name."' value='".@$value."' size=".$size." $extra />";
		}
		else if ($type === "on_off")
		{
			echo "<select id='".$name."' name='".$name."' $extra >";
			echo "<option value='0' ";

			if ( @$value == 0 )
				echo "selected='selected'";

			echo ">". get_lang("off") ."</option>";
			echo "<option value='1' ";

			if ( @$value == 1 )
				echo "selected='selected'";

			echo ">". get_lang("on") ."</option></select>";
		}
		else if ($type === "checkbox")
		{
			echo "<input type='checkbox' id='".$name."' name='".$name."' value='1' $extra ";
			if ( @$value == 1 )
				echo "selected='selected'";
			echo ">";
		}
		else if ($type === "text")
		{
			echo "<textarea id='".$name."' name='".$name."' cols='".$size."' rows='3' $extra />";

			if (isset($value))
				echo $value;

			echo "</textarea>";
		}
		else if ($type === "password")
		{
			echo "<input id='".$name."' type='password' name='".$name."' value='".$value."' size='".$size."' $extra />";
		}
		else
		{
			print_failure(get_lang_f('invalid_setting_type',$type));
		}

		if ( defined("OGP_LANG_".$name."_info") )
		{
			echo "</td><td><div class='image-tip' id='".$this->i."' ><img src='images/icon_help_small.gif' ><span class='tip' id='".$this->i."' >".str_replace("'",'"',get_lang($name."_info"))."</span></div></td></tr>";
			$this->i++;
		}
		else
		{
			echo "</td><td></td></tr>\n";
		}
	}

	public function add_custom_field($name,$data,$td_extra = "")
	{
		echo "<tr><td align='right' $td_extra><label for='".$name."'>".get_lang($name).":</label></td>";
		echo "<td align='left'>".$data."</td>\n";

		if ( defined($name."_info") )
		{
			echo "<td><div class='image-tip' id='".$this->i."' ><img src='images/icon_help_small.gif' ><span class='tip' id='".$this->i."' >".str_replace("'",'"',get_lang($name."_info"))."</span></div></td>\n</tr>\n";
			$this->i++;
		}
		else
		{
			echo "</tr>\n";
		}
	}

	public function end_table()
	{
		echo "</table>";
	}

	public function add_button($type,$name,$value)
	{
		echo "<p class='center'><input type='$type' name='$name' value='$value' /></p>";
	}

	public function end_form()
	{
		echo "</form>";
		echo "</div>";
		echo "<br />";
	}

}
?>
