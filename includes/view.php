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

define("DEFAULT_REFRESH_TIME","2");

class OGPView {

    private $meta;
    private $title;

    private $refreshTime;
    private $refreshUrl;

    function __construct() {
        ob_start();
		$this->logo = "home.php?m=dashboard&p=dashboard";
		$this->bg_wrapper = "";
        $this->title = "Open Game Panel";
		$this->charset = "utf-8";
        $this->refreshTime = DEFAULT_REFRESH_TIME;
    }

    function __destruct() {

    }

	function menu(){}
	
    function printView($cleared = false, $dataType = "html") {
        global $db, $OGPLangPre;

        if ( is_object($db) && array_key_exists( "OGPDatabase", class_parents($db) ) ) {
            $panel_settings = $db->getSettings();
        }
        
        // Our global CSS goes first so that themes can override
        $this->header_code = '<link rel="stylesheet" href="css/global.css">' . "\n";
		if(function_exists("getThemePath")){
			$path = getThemePath();
		}else{
			$path = 'themes/Revolution/';
		}

		$page = file_get_contents($path.'layout.html');
		@$top = file_get_contents($path.'top.html');
		@$bottom = file_get_contents($path.'bottom.html');
		@$topbody = file_get_contents($path.'topbody.html');
		@$botbody = file_get_contents($path.'botbody.html');
		
		if ( isset($panel_settings['logo_link']) &&
            !empty($panel_settings['logo_link']))
            $this->logo = $panel_settings['logo_link'];
		
		if ( isset($panel_settings['bg_wrapper']) &&
            !empty($panel_settings['bg_wrapper']))
            $this->bg_wrapper = $panel_settings['bg_wrapper'];
		
		if ( isset($panel_settings['time_zone']) &&
            !empty($panel_settings['time_zone']))
        {
            $this->time_zone = $panel_settings['time_zone'];
			ini_set('date.timezone', $panel_settings['time_zone']);
        }
		
		if ( isset($panel_settings['panel_name']) &&
            !empty($panel_settings['panel_name']))
			$this->title = $panel_settings['panel_name'];
		
		if ( isset($panel_settings['header_code']) &&
            !empty($panel_settings['header_code']))  
			$this->header_code .= $panel_settings['header_code']."\n";
				
		$module_name = isset($_GET['m']) ? get_lang($_GET['m']) : "";
		$page_name = isset($_GET['p']) ? get_lang($_GET['p']) : "";
		$title = $page_name == "" ? $module_name : "$module_name - $page_name";
		$title = str_replace("_", " ", $title);
		$this->title = $title == "" ? $this->title : $this->title . " [$title]";
		
		// Dump defined constants to json (for language javascript)
		$jsonStrConsts = getOGPLangConstantsJSON();
		if($jsonStrConsts !== false){
			$this->header_code .= '<script type="text/javascript">var langConsts = ' . $jsonStrConsts . ';' . "\n" . 'var langConstPrefix = "' . $OGPLangPre . '";</script>' . "\n";
		}
				
		// Include jQuery, jQuery UI, and our global CSS file in the header code
		$stylesheet = '<link rel="stylesheet" href="js/jquery/ui/jquery-ui.min.css">' . "\n";
		$javascript = '<script type="text/javascript" src="js/jquery/jquery.min.js"></script>' . "\n" .
					  '<script type="text/javascript" src="js/jquery/ui/jquery-ui.min.js"></script>' . "\n";
		
		// Include magnific popup
		$javascript .= '<script type="text/javascript" src="js/magnific/magnific.js"></script>' . "\n";
		$stylesheet .= '<link rel="stylesheet" href="js/magnific/magnific.css">' . "\n";
		
		// Include tablesorter, table collapse, and quick search
		$javascript .= '<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.collapsible.js"></script>' . "\n" .
					   '<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.min.js"></script>' . "\n" .
					   '<script type="text/javascript" src="js/jquery/plugins/jquery.quicksearch.js"></script>' . "\n";
		
		// Include our global JS
		$javascript .= '<script type="text/javascript" src="js/global.js"></script>' . "\n";
		
		// Set some useful variables
		$javascript .= '<script type="text/javascript">';
		if(array_key_exists("users_api_key", $_SESSION) && !empty($_SESSION['users_api_key'])){
			$javascript .= 'var userAPIKey = "' . $_SESSION['users_api_key'] . '";';
		}
		$javascript .= '</script>' . "\n";
		
		// Include global JS for modules
		if(is_object($db) && array_key_exists("OGPDatabase", class_parents($db))){
			foreach($db->getInstalledModules() as $m)
			{
				$global_js_file = 'js/' . MODULES . "{$m['folder']}_global.js";
				if(is_readable($path . $global_js_file)) // Priority to the theme's js
					$javascript .= "<script type=\"text/javascript\" src=\"${path}${global_js_file}\"></script>\n";
				elseif(is_readable($global_js_file))
					$javascript .= "<script type=\"text/javascript\" src=\"${global_js_file}\"></script>\n";
			}
		}
		
		// Include CSS and JS for the current module page
		if(isset($_GET['m']) and !empty($_GET['m']))
		{
			$subpage = (isset($_GET['p']) and !empty($_GET['p']))?$_GET['p']:$_GET['m'];
			$fc = array(
				$path . MODULES . "{$_GET['m']}/${subpage}.css",
				$path . MODULES . "{$_GET['m']}/{$_GET['m']}.css",
				MODULES . "{$_GET['m']}/${subpage}.css",
				MODULES . "{$_GET['m']}/{$_GET['m']}.css"
			);
			
			foreach($fc as $file_check){
				if(is_readable($file_check)){
					$stylesheet .= "<link rel=\"stylesheet\" href=\"${file_check}\">\n";
					break;
				}
			}
			
			$fc = array(
				$path . MODULES . "{$_GET['m']}/{$subpage}.js",
				$path . MODULES . "{$_GET['m']}/{$_GET['m']}.js"
			);
			
			foreach($fc as $file_check){
				if(is_readable($file_check)){
					$javascript .= "<script type=\"text/javascript\" src=\"${file_check}\"></script>\n";
					break;
				}
			}
		}
		
		$this->header_code .= $stylesheet.$javascript;
		
        $buffer = ob_get_contents();
        ob_end_clean();
		
		if ( !empty($this->refreshUrl) )
        {
            if ( $panel_settings['page_auto_refresh'] == "1" )
            {		
                $topbody .= "<div id='refresh-manual'>";
                if($this->refreshUrl != "{CURRENT_PAGE}"){                
					$topbody .= "<a href='".$this->refreshUrl."' class='redirectLink'>".get_lang('redirecting_in')." ".$this->refreshTime."s.</a>";
				}else{
					$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
					$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
					$topbody .= "<a href='" . $escaped_url . "' class='redirectLink'>".get_lang('redirecting_in')." ".$this->refreshTime."s.</a>";
				}
				$topbody .= "</div>";
				
				$this->meta .= "<meta http-equiv='refresh' content='".$this->refreshTime.";";
				if($this->refreshUrl != "{CURRENT_PAGE}"){
					$this->meta .= "url=".$this->refreshUrl;
				}
				$this->meta .= "' />";
            }
            else
            {
                $topbody .= "<div id='refresh-manual'>";
				 
				if($this->refreshUrl != "{CURRENT_PAGE}"){
					$topbody .= "<a href='" . $this->refreshUrl . "'>".get_lang('refresh_page')."</a>";
				}else{
					$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
					$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
					$topbody .= "<a href='" . $escaped_url . "'>".get_lang('refresh_page')."</a>";
				}
				 $topbody .= "</div>";
            }
        }
				
        $footer = "";

        if ( is_object($db) && array_key_exists( "OGPDatabase", class_parents($db) ) ) {
            $footer .= "<div class=\"footer center\">";
            $footer .= get_lang_f('cur_theme', !empty($_SESSION['users_theme']) ? $_SESSION['users_theme'] : @$panel_settings['theme']) . " - " . $db->getNbOfQueries()." ".get_lang('queries_executed');
            $footer .= "<br />".get_lang('copyright')." &copy; <a href=\"http://www.opengamepanel.org\">Open Game Panel</a> " . date("Y") . " - ".get_lang('all_rights_reserved')." - <span class='versionInfo'>".get_lang('show_version')."</span><br /><div class='inline-block OGPVersionArea'><span class='version hide'>" . get_lang('version') . ":</span>&nbsp; <span class='hide versionNumber'>".@$panel_settings['ogp_version']."</span> <span class='copyVersionResult' lang='" . get_lang('copied') . "'></span></div></div>";
        }
        else
        {
            $footer .= "<div class='footer center'>".get_lang('copyright')." &copy; <a href=\"http://www.opengamepanel.org\">Open Game Panel</a> " . date("Y") . " - ".get_lang('all_rights_reserved').".</div>";
        }
        
        // Add our magnific popup holder to the page (hidden element):
        $footer .= '<div class="mangificWrapper hide"><div class="white-popup"><div class="magnificTitle"></div><div class="magnificSubTitle"></div><div class="magnificContentsDiv"></div><button title="Close (Esc)" type="button" class="mfp-close">&times;</button></div></div>';
		
		if (!isset($_GET['action']))
		{
			$filename = 'install.php';
			if ( !empty($_SESSION['users_theme']) ) $theme = $_SESSION['users_theme'];
			else $theme = $panel_settings['theme'];
			
			// Attempt to automatically delete the install file only if an admin user has already been created and exists
			if(is_object($db)){
				$admins = $db->getAdmins();
				if (is_readable($filename) && is_array($admins) && !empty($admins)) {
					unlink($filename);
				}
			}
			
			if (is_readable($filename))
			{
				if (is_readable($filename) AND $theme == "Modern")
				{
					$top = "<h4 class='failure'>".get_lang('remove_install')."</h4>".$top;
				}
				else
				{
					$topbody = "<h4 class='failure'>".get_lang('remove_install')."</h4>".$topbody;
				}
			}
		}
		
		if ( isset($panel_settings['maintenance_mode']) && $panel_settings['maintenance_mode'] == "1" )
		{
			if ( !empty($_SESSION['users_theme']) ) $theme = $_SESSION['users_theme'];
			else $theme = $panel_settings['theme'];
			
			if (@$_SESSION['users_group'] == "admin" AND $theme == "Modern")
			{
				$top = "<h4 class='failure'>".get_lang('maintenance_mode_on')."!</b></h4>".$top;
			}
			elseif (@$_SESSION['users_group'] == "admin")
			{
				$topbody = "<h4 class='failure'>".get_lang('maintenance_mode_on')."!</b></h4>".$topbody;
			}
		}
		
		if($cleared){
			$page = $buffer;
		}
		else
		{
			$page = str_replace("%meta%",$this->meta,$page);
			$top = str_replace("%logo%",$this->logo,$top);
			$topbody = str_replace("%bg_wrapper%",$this->bg_wrapper,$topbody);
			if ( !empty($_SESSION['users_theme']) ) 
				$theme = $_SESSION['users_theme'];
			else 
				$theme = @$panel_settings['theme'];
					
			$page = str_replace("%bg_wrapper%",$this->bg_wrapper,$page);
        	$page = str_replace("%title%",$this->title,$page);
        	$page = str_replace("%header_code%",$this->header_code,$page);
			$page = str_replace("%charset%",$this->charset,$page);
        	$page = str_replace("%body%",$buffer,$page);
			$page = str_replace("%top%",$top,$page);
			$page = str_replace("%topbody%",$topbody,$page);
			$page = str_replace("%botbody%",$botbody,$page);
			$page = str_replace("%bottom%",$bottom,$page);
			$page = str_replace("%footer%",$footer,$page);
			$page = str_replace("%notifications%",@$notifications,$page);
		}
		
		// Set the content-type header as this is needed by older browsers
        if($dataType == "html"){
			header("Content-type: text/html; charset=" . $this->charset);
		}else if($dataType == "json"){
			header("Content-type: application/json; charset=" . $this->charset);
		}
		
		// Print everything for the template.
        print $page;
    }

    function refresh($url,$time = "")
    {
        if ( !empty($time) || $time === 0 )
            $this->refreshTime = $time;
        $this->refreshUrl = $url;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }
	
	function setCharset($charset)
    {
        $this->charset = $charset;
		ini_set('default_charset', $charset);
    }
	
	function setTimeZone($time_zone)
    {
		$time_zone = (!isset($time_zone) or $time_zone == "") ? "America/Chicago" : $time_zone;
		$this->time_zone = $time_zone;
		ini_set('date.timezone', $time_zone);
		$_SESSION['time_zone'] = $time_zone;
    }
}
?>
