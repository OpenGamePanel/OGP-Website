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
 ?>
<style>
#content p {
	text-align:center;
}
</style>
<?php
class FormTable {

    function FormTable()
    {
    }

    function start_form($action, $method = "post", $extra = "")
    {
		echo "<div align='center'>";
        echo "<form action='".$action."' method='".$method."' $extra >";
    }
    function start_table()
    {
        echo "<table class='center'>";
    }

    function add_field_hidden($name, $value)
    {
        echo "<input type='hidden' name='".$name."' value='".@$value."'/>";
    }

    function add_field($type, $name, $value, $size = 50, $extra = "")
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

            echo ">".get_lang('off')."</option>";
            echo "<option value='1' ";

            if ( @$value == 1 )
                echo "selected='selected'";

            echo ">".get_lang('on')."</option></select>";
        }
		else if ($type === "target_self_blank")
        {
            echo "<select id='".$name."' name='".$name."' $extra >";
            echo "<option value='_self' ";

            if ( @$value == "_self" )
                echo "selected='selected'";

            echo ">_self</option>";
            echo "<option value='_blank' ";

            if ( @$value == "_blank" )
                echo "selected='selected'";

            echo ">_blank</option></select>";
        }
		else if ($type === "bg_wrapper")
        {
            echo "<select id='".$name."' name='".$name."'>";
            echo "<option value='' ";

            if ( @$value == "" )
                echo "selected='selected'";

            echo ">Default</option>";
            echo "<option value='url(images/bg/connect.png);' ";

            if ( @$value == "url(images/bg/connect.png);" )
                echo "selected='selected'";

            echo ">Connect</option>";
			echo "<option value='url(images/bg/foggy_birds.png);' ";

            if ( @$value == "url(images/bg/foggy_birds.png);" )
                echo "selected='selected'";

            echo ">Foggy Birds</option>";
			echo "<option value='url(images/bg/handmadepaper.png);' ";

            if ( @$value == "url(images/bg/handmadepaper.png);" )
                echo "selected='selected'";

            echo ">Handmade Paper</option>";
			echo "<option value='url(images/bg/tvlines.png);' ";

            if ( @$value == "url(images/bg/tvlines.png);" )
                echo "selected='selected'";

            echo ">TV Lines</option>";
			echo "<option value='url(images/bg/graycells.png);' ";

            if ( @$value == "url(images/bg/graycells.png);" )
                echo "selected='selected'";

            echo ">Gray Cells</option>";
			echo "<option value='url(images/bg/coated.png);' ";

            if ( @$value == "url(images/bg/coated.png);" )
                echo "selected='selected'";

            echo ">Coated</option>";
			echo "</select>";
        }
        else if ($type === "text")
        {
            echo "<textarea id='".$name."' name='".$name."' cols='38' rows='3' $extra >";

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
        echo "</td></tr>\n";
        global $lang;

        if ( isset($lang[$name."_info"]) )
        {
            echo "<tr><td colspan='2' class='info'>".get_lang($name."_info")."</td></tr>";
        }
    }

    function add_custom_field($name,$data)
    {
        echo "<tr><td align='right'><label for='".$name."'>".get_lang($name).":</label></td>";
        echo "<td align='left'>".$data."</td></tr>\n";
        global $lang;

        if ( isset($lang[$name."_info"]) )
        {
            echo "<tr><td colspan='2' class='info'>".get_lang($name."_info")."</td></tr>";
        }
    }

    function end_table()
    {
        echo "</table>";
    }

    function add_button($type,$name,$value)
    {
        echo "<p class='center'><input type='$type' name='$name' value='$value' /></p>";
    }

    function end_form()
    {
        echo "</form>";
		echo "</div>";
		echo "<br />";
    }

}
