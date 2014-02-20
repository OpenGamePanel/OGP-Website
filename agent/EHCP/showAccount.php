<?php

// Returns the information of ONE custom ftpuser

// Only custom users are setup when tying into the EHCP FTP API

$countNotNull = 0;
$user_details = "";
$success = 0;
$errorCount = 0;

if (isset($errors)) {
    unset($errors);
}

if (!isset($connection)) {
    include "config.php";
}

if (isset($_GET['username'])) {
    $ftp_account = $_GET['username'];
}

if (!isset($connection)) {
    die("Problem setting up connection!");
} else
if (isset($ftp_account)) {
    $SQL = "SELECT ftpusername, homedir FROM ftpaccounts WHERE ftpusername = '$ftp_account'";
    $Result = mysql_query($SQL, $connection);
    
    if ($Result !== FALSE) {
        $count = mysql_num_rows($Result);
        
        if ($count == 1) {
            
            if ($row = mysql_fetch_assoc($Result)) {

                // Only show custom entries... do not allow to modify EHCP accounts.
                
                if (!empty($row['homedir'])) {
                    $countNotNull++;
                    $username = $row['ftpusername'];
                    $dir = $row['homedir'];
                    $user_details.= "Username" . " : " . $username . "\n";
                    $user_details.= "Directory" . " : " . $dir . "\n";
                }
            }
            
            if ($countNotNull == 0) {
                $errorCount++;
                $errors[] = "There are no custom FTP accounts yet in the EHCP database!";
            }
        } else {
            $errorCount++;
            $errors[] = "No FTP accounts exist with the given username of $ftp_account";
        }
    } else {
        $errorCount++;
        $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
    }

    // Log errors
    
    if ($errorCount > 0) {
        addToLog($errors);
    }
}

// Return the user list
echo $user_details;

?>
