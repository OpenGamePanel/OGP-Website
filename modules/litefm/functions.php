<?php
function return_bytes($val) {
	$val = trim($val);
	$last = strtolower($val[strlen($val)-1]);
	$val = str_replace($val[strlen($val)-1], '', $val);
	switch($last) {
		// El modificador 'G' está disponble desde PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return $val;
}

function codeToMessage($code,$file)
{ 
	switch ($code) { 
		case UPLOAD_ERR_INI_SIZE: 
			$message = "The file \"$file\" exceeds the upload_max_filesize directive in php.ini."; 
			break; 
		case UPLOAD_ERR_FORM_SIZE: 
			$message = "The file \"$file\" exceeds the MAX_FILE_SIZE directive that was specified in the HTML form."; 
			break; 
		case UPLOAD_ERR_PARTIAL: 
			$message = "The file \"$file\" was only partially uploaded."; 
			break; 
		case UPLOAD_ERR_NO_FILE: 
			$message = "The file \"$file\" wasn't uploaded."; 
			break; 
		case UPLOAD_ERR_NO_TMP_DIR: 
			$message = "The temporary folder is missing."; 
			break; 
		case UPLOAD_ERR_CANT_WRITE: 
			$message = "Failed to write file \"$file\" to disk."; 
			break; 
		case UPLOAD_ERR_EXTENSION: 
			$message = "File \"$file\", stopped by extension."; 
			break; 

		default: 
			$message = "The upload for the file \"$file\" was reported an unknown upload error"; 
			break; 
	} 
	return $message; 
}

// Get File Options keys
function get_file_operations_keys()
{
	return array("remove",
				 "rename",
				 "move",
				 "copy",
				 "compress",
				 "uncompress",
				 "create_file",
				 "create_folder",
				 "upload",
				 "send_by_email"); 
}

// Get File Operation Settings
function get_fo_settings($settings,$fo_keys)
{
	$fo = isset($settings['lfm_file_operations']) ? json_decode($settings['lfm_file_operations'],1) : array();
	$fo_keys_obd = array("send_by_email"); // values "Off" By Default
	foreach($fo_keys as $key)
	{
		if(in_array($key,$fo_keys_obd) and !isset($fo[$key]))
			$fo[$key] = "0";
		if(!isset($fo[$key]))
			$fo[$key] = "1";
	}
	return $fo;
}
?>