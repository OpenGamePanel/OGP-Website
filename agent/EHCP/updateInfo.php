<?php

if (file_exists("config.php")) {
    include 'config.php';
} else {
    die("config.php must exist within the installation root folder!");
}

// Updates ftpuser's password
$success = 0;
$errorCount = 0;

if (isset($errors)) {
    unset($errors);
}

if (isset($_GET['username'])) {
    $ftp_username = $_GET['username'];
}

if (isset($_GET['password'])) {
    $arrOfVals = trim($_GET['password']);
}

if (isset($arrOfVals) && !empty($arrOfVals)) {
    $arrOfVals = explode("\n", $arrOfVals);
    $arrOfVals = array_filter($arrOfVals);
    
    foreach ($arrOfVals as $passIn) {
        $passIn = trim($passIn);

        // Replace all tabs or spaces
        $pattern = '/\s+/';
        $passIn = preg_replace($pattern, ' ', $passIn);
        $keyAndVal = explode(' ', $passIn);
        
        if (count($keyAndVal) == 2) {
            $arr[$keyAndVal[0]] = $keyAndVal[1];
        }
        
        if (isset($arr['new_password']) && !empty($arr['new_password'])) {
            $ftp_pass = $arr['new_password'];
        }
        
        if (isset($arr['Directory']) && !empty($arr['Directory'])) {
            $update_dir = $arr['Directory'];
        }
        
        if (isset($arr['orig_user']) && !empty($arr['orig_user'])) {
            $ftp_old_username = $arr['orig_user'];
        }
        
        if (isset($arr['Username']) && !empty($arr['Username'])) {
            $ftp_username = $arr['Username'];
        }
    }
}

if (!isset($ftp_username) || !isset($update_dir)) {
    $errorCount++;
    $errors[] = "No FTP accounts could be modified! Updated username and homedir were not sent by the panel.";
} else {
    
    if (substr_count($update_dir, '/') < 2) {
        $errorCount++;
        $errors[] = "In order to prevent security risks, users cannot be granted access to the main directories in the root file system of the server.&nbsp; You must go down two directory levels!&nbsp; Example:  /games/user1!";
    }
    
    if (stripos($update_dir, "/") === FALSE || stripos($update_dir, "/") != 0) {
        $errorCount++;
        $errors[] = "You have not chosen a valid directory!";
    }
    
    if ($update_dir === "/var/www/" || stripos($update_dir, "/var/www/") !== FALSE) {
        $errorCount++;
        $errors[] = "You may not create ftp accounts into the protected EHCP directories using this program.&nbsp; Create these accounts using EHCP software.";
    }
    
    if (stripos($update_dir, "\\")) {
        $errorCount++;
        $errors[] = "This is not a Windows machine... use the correct slash character for path...";
    }

    // If the last character in the path is a slash (/) - Remove it from the string
    
    if (substr_count($update_dir, '/') > 2 && $update_dir[strlen($update_dir) - 1] == "/") {
        $end = strlen($update_dir) - 2;
        $update_dir = substr($update_dir, 0, $end);
    }
    
    if ($errorCount == 0) {

        // Security checks
        
        if (isset($ftp_pass)) {
            $ftp_password_db = mysql_real_escape_string($ftp_pass);
        }
        $ftp_username_db = mysql_real_escape_string($ftp_username);
        $SQL = "SELECT * FROM ftpaccounts WHERE ftpusername = '$ftp_username_db'";
        $Result = mysql_query($SQL, $connection);
        
        if ($Result !== FALSE) {
            $count = mysql_num_rows($Result);
            
            if ($count != 1) {
                $errorCount++;
                $errors[] = "FTP User " . $ftp_username . " does not exist in the database. Account information cannot be updated";
            } else {

                // Update user's password data into DB:
                $SQL = "UPDATE ftpaccounts SET ";
                
                if (isset($ftp_password_db)) {
                    $SQL.= "password=password('$ftp_password_db'), ";
                }
                $SQL.= "homedir='$update_dir' WHERE ftpusername='$ftp_username_db'";
                $Result = mysql_query($SQL, $connection);
                
                if ($Result !== FALSE) {
                    $success = 1;
                } else {
                    $errorCount++;
                    $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
                }
            }
        } else {
            $errorCount++;
            $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
        }
    }
}

// Log errors

if ($errorCount > 0) {
    addToLog($errors);
}

// Return value:
echo $success;

?>
