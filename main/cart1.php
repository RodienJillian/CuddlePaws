<?php
session_start();

// Example session cart data for testing (use actual session data in your application)
// Uncomment the line below if testing without actual cart session data.
// $_SESSION['cart'] = [['name' => 'Item 1', 'price' => '₱100.00', 'quantity' => 2, 'image' => 'path/to/image.jpg']];

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
    <link rel="stylesheet" href="css/index.css">
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
                <a href="#about-us">Cuddle Paws</a>
            </div>
        </nav>
    </header>

<body>
<main>
    <h1>Shopping Cart</h1>
    <form method="POST" action="checkout.php">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cart)): ?>
                    <?php foreach ($cart as $index => $item): ?>
                        <?php
                        $price = floatval(preg_replace('/[^\\d.]/', '', $item['price'])); // Ensure numeric price
                        $total = $price * $item['quantity'];
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected-items[]" value="<?= htmlspecialchars($index) ?>">
                            </td>
                            <td>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 40px;">
                                <?= htmlspecialchars($item['name']) ?>
                            </td>
                            <td>₱<?= number_format($price, 2) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td>₱<?= number_format($total, 2) ?></td>
                            <td>
                                <button class="delete-btn" data-name="<?= htmlspecialchars($item['name']) ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Your cart is empty.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <button type="submit" class="checkout-btn">Proceed to Checkout</button>
    </form>
</main>
</body>
</html>

<a href="checkout.php">
                    <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1727873960/Screenshot_2024-10-02_205721-removebg-preview_yhehq0.png" 
                         class="checkout-btn" 
                         alt="Checkout Button">
                </a>
