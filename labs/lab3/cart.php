<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazong</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- include() the markup from ./includes/header.php -->
        <?php include('includes/header.php'); ?>
    </header>
    <main class="cart">
        <h1>Cart</h1>
        <div id="cart-contents">
        <?php
// Check if the cart cookie is set
if(isset($_COOKIE['cart'])) {
    // Explode the cart cookie into an array of items
    echo($_COOKIE['cart']);
    $cartItems = explode(',', $_COOKIE['cart']);
    
    // Loop through each item in the cart
    foreach($cartItems as $item) {
        // Split the item into product name, quantity, and price
        $itemDetails = explode(':', $item);
        $productName = $itemDetails[0];
        $quantity = $itemDetails[1];
        $price = $itemDetails[2];
        // Calculate total price
        $totalPrice = $quantity * $price;
        
        // Display the product name, quantity, and total price
        echo '<div class="cart-item">';
        echo '<h2>' . $productName . '</h2>';
        echo '<h3>Quantity: ' . $quantity . '</h3>';
        echo '<h3>Total Price: $' . $totalPrice . '</h3>';
        // Add form to remove item from cart
        echo '<form action="routes/remove.php" method="post">';
        echo '<input type="hidden" name="product-name" value="' . $productName . '">';
        echo '<button type="submit">Remove</button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    // If the cart cookie is not set, display a message indicating that the cart is empty
    echo '<h2>Your cart is empty</h2>';
}
?>

        </div>
    </main>
</body>
</html>
