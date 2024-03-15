<?php
// Start the session
session_start();

// Check if the loggedIn session variable is not set
if(!isset($_SESSION['loggedIn'])) {
    // Redirect the user to the index page
    header("Location: index.php");
    exit; // Ensure that script execution stops after redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazong</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="index">
    <header>
        <!-- include() the markup from ./includes/header.php -->
        <?php include('includes/header.php'); ?>
    </header>
    <main>
        <h1>Previous orders:</h1>
        <div id="cart-contents">
            <div class="cart-item">
                <h2>Shower Steamers</h2>
                <h3>Quantity: 10</h3>
                <h3>Order Total: $159.90</h3>
            </div>
        </div>
    </main>
</body>
