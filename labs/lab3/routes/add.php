<?php
/*
    Check if the cart cookie exists and if it does, explode() the cookie into an array of items (strings).

    Next, check if the product exists (using the preg_grep() function) in the cart (i.e. the array of strings created above). 
        If the product does not exist in the cart, add the product to the cart with a quantity of 1. A product in the cart is represented as a string in the format "productName:quantity:price".
    
        If the product *does* exist in the cart, increment (using, for example, explode() and implode()) the quantity of the product by 1.

    Finally, set the cart cookie with the updated cart items.
*/

function addToCart($productName, $productPrice) {
    // Initialize $cart_items array
    $cart_items = array();

    // Check if the cart cookie exists
    if(isset($_COOKIE['cart'])) {
        // Explode the cookie into an array of items
        $cart_items = explode(',', $_COOKIE['cart']);
    }

    // Check if the product exists in the cart
    $found = false;
    foreach($cart_items as $key => $item) {
        // Split the item into product name, quantity, and price
        $product_details = explode(':', $item);
        $cart_productName = $product_details[0];
        if($productName === $cart_productName) {
            // If the product exists, increment the quantity of the product by 1
            $quantity = intval($product_details[1]) + 1;
            $product_details[1] = strval($quantity);
            $cart_items[$key] = implode(':', $product_details);
            $found = true;
            break;
        }
    }

    // If the product does not exist, add it to the cart with a quantity of 1
    if(!$found) {
        $cart_items[] = $productName . ":1:" . $productPrice;
    }

    // Set the cart cookie with the updated cart items
    setcookie('cart', implode(',', $cart_items), time() + (86400 * 30), "/");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the product name and price are set in the POST request
        // Call the addToCart() function with the product name and price
        addToCart($_POST['product-name'], $_POST['product-price']);
    
        header("Location: ../cart.php");
        // Redirect the user to the cart page
    
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // debug?
}

?>