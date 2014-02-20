<?php

if (file_exists("config.php")) {
    include 'config.php';
} else {
    die("config.php must exist within the installation root folder!");
}

// Deletes passed in user account from database

// Unless the actual delete command fails, success should be 1... we don't care if the account doesn't exist.
$success = 1;
$errorCount = 0;

if (isset($errors)) {
    unset($errors);
}

if (isset($_GET['username'])) {
    $userToDelete = $_GET['username'];
}

if (!isset($userToDelete)) {
    $errorCount++;
    $errors[] = "No username was passed to the form.";
} else {
    $SQL = "SELECT ftpusername FROM ftpaccounts WHERE ftpusername = '$userToDelete'";
    $Result = mysql_query($SQL, $connection);
    
    if ($Result !== FALSE) {
        $row = mysql_fetch_row($Result);
        $unameDeleted = $row[0];
    }
    
    if (isset($unameDeleted)) {
        $SQL = "DELETE FROM ftpaccounts WHERE ftpusername = '$userToDelete'";
        $Result = mysql_query($SQL, $connection);
        
        if ($Result !== FALSE) {
            
            if ($unameDeleted === "none") {
                $errorCount++;
                $errors[] = "The specified user $userToDelete does not exist within the databse. No actions were taken!";
            } else {
                $success = 1;
            }
        } else {
            $errorCount++;
            $errors[] = "Error code " . mysql_errno($connection) . ": " . mysql_error($connection);
            $success = 0;
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
