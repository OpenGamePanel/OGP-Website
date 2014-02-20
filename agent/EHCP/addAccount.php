<?php

// Adds users to the database

// Variables

$success = 0;

if (isset($_GET['username'])) {
    $ftp_username = $_GET['username'];
}

if (isset($_GET['password'])) {
    $ftp_pass = $_GET['password'];
}

if (isset($_GET['dir'])) {
    $rDir = $_GET['dir'];
}

if (isset($errors)) {
    unset($errors);
}

if (file_exists("config.php")) {
    include 'config.php';
    mysql_select_db($dbName, $connection);
} else {
    die("config.php must exist within the installation root folder!");
}

// Did we properly receive the variables from the OGP agent?

if (isset($ftp_username) && isset($ftp_pass) && isset($rDir)) {

    // We received all necessary variables.  Process what we received.
    $errorCount = 0;
    $errorInstallInt = 0;

    // OGP should be doing this validation... but it's not
    
    // Custom directory validation

    
    if (substr_count($rDir, '/') < 2) {
        $errorCount++;
        $errors[] = "In order to prevent security risks, users cannot be granted access to the main directories in the root file system of the server.&nbsp; You must go down two directory levels!&nbsp; Example:  /games/user1!";
    }
    
    if (stripos($rDir, "/") === FALSE || stripos($rDir, "/") != 0) {
        $errorCount++;
        $errors[] = "You have not chosen a valid directory!";
    }
    
    if ($rDir === "/var/www/" || stripos($rDir, "/var/www/") !== FALSE) {
        $errorCount++;
        $errors[] = "You may not create ftp accounts into the protected EHCP directories using this program.&nbsp; Create these accounts using EHCP software.";
    }
    
    if (stripos($rDir, "\\")) {
        $errorCount++;
        $errors[] = "This is not a Windows machine... use the correct slash character for path...";
    }

    // If the last character in the path is a slash (/) - Remove it from the string
    
    if (substr_count($rDir, '/') >= 2 && $rDir[strlen($rDir) - 1] == "/") {
        $end = strlen($rDir) - 2;
        $rDir = substr($rDir, 0, $end);
    }
    
    if ($errorCount == 0) {

        // Security checks
        $ftp_password_db = mysql_real_escape_string($ftp_pass);
        $ftp_username_db = mysql_real_escape_string($ftp_username);
        $rDir = mysql_real_escape_string($rDir);
        $SQL = "SELECT id FROM ftpaccounts WHERE ftpusername = '$ftp_username_db'";
        $Result = mysql_query($SQL, $connection);
        
        if ($Result !== FALSE) {
            $count = mysql_num_rows($Result);
            
            if ($count > 0) {
                $errorCount++;
                $errors[] = "The FTP username supplied already exists!&nbsp; Please enter another unique username!";
            } else {

                // Make sure data enter is unique for homedir
                $SQL = "SELECT id FROM ftpaccounts WHERE homedir = '$rDir'";
                $Result = mysql_query($SQL, $connection);
                
                if ($Result !== FALSE) {
                    $count = mysql_num_rows($Result);

                    // Insert the data into the
                    $SQL = "INSERT INTO ftpaccounts (ftpusername, password, homedir) VALUES ('$ftp_username_db', password('$ftp_password_db'), '$rDir')";
                    $Result = mysql_query($SQL, $connection);
                    
                    if ($Result !== FALSE) {
                        $success = 1;
                    } else {
                        $errorCount++;
                        $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
                    }
                } else {
                    $errorCount++;
                    $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
                }
                
                if ($errorCount > 0 && $success == 0) {
                    unset($_POST['createFTP']);
                    include 'admin/ftpCreateForm.php';
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
