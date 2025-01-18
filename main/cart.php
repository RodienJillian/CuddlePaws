
<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <?php if (isset($_SESSION['Username'])): ?>
                    <li><a href="account.php">Account</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log In/Sign Up</a></li>
                <?php endif; ?>
            </ul>
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
                <a href="index.php#about-us">Cuddle Paws</a>
            </div>
        </nav>
    </header>

    <!-- Shopping Cart Section -->
    <main>
        <h1>Shopping Cart</h1>
<form action="checkout.php" method="POST">
    <table class="cart-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cart)): ?>
                <?php foreach ($cart as $index => $item): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="selected-items[]" value="<?= htmlspecialchars($index) ?>" style="margin-right: 10px;">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 40px;">
                            <?= htmlspecialchars($item['name']) ?>
                        </td>
                        <td><?= htmlspecialchars($item['price']) ?></td>
                        <td>
                            <input type="number" class="quantity-input" value="<?= htmlspecialchars($item['quantity']) ?>" min="1" data-index="<?= $index ?>">
                        </td>
                        <?php
                        $price = floatval(preg_replace('/[^\d.]/', '', $item['price']));
                        ?>
                        <td><?= "₱ " . number_format($price * $item['quantity'], 2) ?></td>
                        <td>
                            <button class="delete-btn" data-name="<?= htmlspecialchars($item['name']) ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Your cart is empty.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="checkout-section">
        <div class="total-price">
            <span>Total:</span>
            <span class="total-amount">₱ 0.00</span>
        </div>
        <div>
        <button type="submit" class="checkout-btn">
    <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1727873960/Screenshot_2024-10-02_205721-removebg-preview_yhehq0.png" 
         alt="Proceed to Checkout" 
         style="max-width: 100%; height: auto;">
</button>

        </div>
    </div>
</form>
    </main>
    <script src="js/cart.js"></script>
    <script src="js/updatedNav.js"></script>

</body>
</html>
