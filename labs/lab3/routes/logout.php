<?php

/*

    Start the session

    If the loggedIn session variable is set, unset the session variable and destroy the session

    Redirect the user to the index page

*/

// Start the session
session_start();

// Check if the loggedIn session variable is set
if(isset($_SESSION['loggedIn'])) {
    // Unset the session variable
    unset($_SESSION['loggedIn']);
    
    // Destroy the session
    session_destroy();
}

// Redirect the user to the index page
header("Location: index.php");
exit; // Ensure hat script execution stops after redirection


?>