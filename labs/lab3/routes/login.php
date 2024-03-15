<?php


/*
    Start the session

    If the username and password are set, check if the username is "admin" and the password is "admin"

    If the username and password are correct, set the loggedIn session variable to true and redirect the user to the account page

    If the username and password are incorrect, redirect the user to the index page

*/

session_start();

// Check if the username and password are set
if(isset($_POST['username']) && isset($_POST['password'])) {
    // Check if the username is "admin" and the password is "admin"
    if($_POST['username'] === "admin" && $_POST['password'] === "admin") {
        // Set the loggedIn session variable to true
        $_SESSION['loggedIn'] = true;
        
        // Redirect the user to the account page
        header("Location: ../account.php");
        exit; // Ensure that script execution stops after redirection
    } else {
        // If the username and password are incorrect, redirect the user to the index page
        header("Location: ../index.php");
        exit; // Ensure that script execution stops after redirection
    }
}

?>