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
    $ftp_pass = trim($_GET['password']);
}

if (!isset($ftp_username) || !isset($ftp_pass)) {
    $errorCount++;
    $errors[] = "No FTP accounts could be modified! Updated username and password were not sent by the OGP upload functions.";
} else {
    
    if ($errorCount == 0) {

        // Security checks
        $ftp_password_db = mysql_real_escape_string($ftp_pass);
        $ftp_username_db = mysql_real_escape_string($ftp_username);
        $SQL = "SELECT * FROM ftpaccounts WHERE ftpusername = '$ftp_username_db'";
        $Result = mysql_query($SQL, $connection);
        
        if ($Result !== FALSE) {
            $count = mysql_num_rows($Result);
            
            if ($count != 1) {
                $errorCount++;
                $errors[] = "The account information was not updated because the FTP username $ftp_old_username never existed in the first place and cannot be modified";
            } else {
                
                if ($row = mysql_fetch_assoc($Result)) {
                    $recordID = $row['id'];
                }

                // Update user's password data into DB:
                $SQL = "UPDATE ftpaccounts SET password=password('$ftp_password_db') WHERE ftpusername='$ftp_username_db'";
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
