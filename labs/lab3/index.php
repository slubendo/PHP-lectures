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
        <div id="products">
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="neck gaiter">
                    <input type="hidden" name="product-price" value="15.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image">
                    <img src="images/gaiter.jpg">
                </div>
                <h2>Neck Gaiter</h2>
                <h3>$15.99</h3>
            </div>
        
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="hard drive">
                    <input type="hidden" name="product-price" value="299.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image"> 
                    <img src="images/harddrive.jpg">
                </div>
                <h2>Portable Hard Drive</h2>
                <h3>$299.99</h3>
            </div>
        
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="face masks">
                    <input type="hidden" name="product-price" value="49.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image">
                    <img src="images/masks.jpg">
                </div>
                <h2>Face Masks</h2>
                <h3>$49.99</h3>
            </div>
        
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="number blocks">
                    <input type="hidden" name="product-price" value="69.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image">
                    <img src="images/number-blocks.jpg">
                </div>
                <h2>Number Blocks</h2>
                <h3>$69.99</h3>
            </div>
        
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="shower steamers">
                    <input type="hidden" name="product-price" value="24.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image">
                    <img src="images/shower-steamers.jpg">
                </div>
                <h2>Shower Steamers</h2>
                <h3>$24.99</h3>
            </div>
        
            <div class="product">
                <form class="product-modal" action="routes/add.php" method="POST">
                    <input type="hidden" name="product-name" value="socks">
                    <input type="hidden" name="product-price" value="9.99">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
                <div class="product-image">
                    <img src="images/socks.jpg">
                </div>
                <h2>Socks</h2>
                <h3>$9.99</h3>
            </div>
        </div>
    </main>
</body>
</html>