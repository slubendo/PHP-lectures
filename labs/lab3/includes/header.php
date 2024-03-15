<?php
// Check if cart cookie is set
if(isset($_COOKIE['cart'])) {
    // Explode the cart string into an array of cart items
    $cartItems = explode(',', $_COOKIE['cart']);
    // Initialize a variable to store the total quantity
    $totalQuantity = 0;
    // Loop through the array of cart items
    foreach($cartItems as $item) {
        // Explode each cart item (string) into its constituent parts
        $itemDetails = explode(':', $item);
        // Add the quantity to the total quantity
        $totalQuantity += intval($itemDetails[1]);
    }
} else {
    // If cart cookie is not set, total quantity is 0
    $totalQuantity = 0;
}
?>

<nav>
    <h1><a href="index.php">g</a></h1>
    <div id="search"></div>
    <div id="account">
        <?php
        // Check if the 'loggedIn' session variable is set
        if(isset($_SESSION['loggedIn'])) {
            // If logged in, display account link and logout button
            echo '<p><a href="account.php">Account</a></p>';
            echo '<form action="routes/logout.php" method="POST">';
            echo '<button class="logout">Logout</button>';
            echo '</form>';
        } else {
            // If not logged in, display login form
            echo '<form action="routes/login.php" method="POST">';
            echo '<input type="text" name="username" placeholder="Username">';
            echo '<input type="password" name="password" placeholder="Password">';
            echo '<button class="login">Login</button>';
            echo '</form>';
        }
        ?>
    </div>
    <div id="cart">
        <!-- Output the total quantity inside the span with id 'cart-count' -->
        <span id="cart-count"><?php echo $totalQuantity; ?></span>
        <div id="cart-icon"><a href="cart.php"></a></div>
    </div>
</nav>
