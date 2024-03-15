<?php

function removeFromCart($productName) {
    // Get the cart from the cookie
    if(isset($_COOKIE['cart'])) {
        // Explode the cookie into an array of items
        $cartItems = explode(',', $_COOKIE['cart']);
    } else {
        // If the cart is empty, set the cartItems to an empty array
        $cartItems = array();
    }

    // Use array_filter() to remove the product from the cartItems array
    $cartItems = array_filter($cartItems, function($item) use ($productName) {
        // Check if the product name is not equal to the current item
        return strpos($item, $productName . ':') !== 0;
    });

    // Set the cart cookie with the updated cart items
    setcookie('cart', implode(',', $cartItems), time() + (86400 * 30), "/");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {                             
    // Check if the product-name is set
    if(isset($_POST['product-name'])) {
        // Call the removeFromCart function with the product-name as the argument
        removeFromCart($_POST['product-name']);

        // Redirect the user to the cart page
        header("Location: ../cart.php");
        exit; // Ensure that script execution stops after redirection
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // debug?
}

?>