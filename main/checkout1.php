if (isset($_POST['selected-items'])) {
    $selectedIndices = $_POST['selected-items'];
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $selectedItems = [];

    foreach ($selectedIndices as $index) {
        if (isset($cart[$index])) {
            $selectedItems[] = $cart[$index];
        }
    }
} else {
    $selectedItems = [];
}

$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <header>
        <!-- Header code remains unchanged -->
    </header>

    <main>
        <section class="checkout">
            <h1>Check Out</h1>
            <div class="checkout-container">
                <div class="purchase-payment">
                    <div class="purchase-details">
                        <h2>Your Purchase</h2>
                        <?php if (!empty($selectedItems)): ?>
                            <?php foreach ($selectedItems as $item): ?>
                                <?php
                                $price = floatval(preg_replace('/[^\d.]/', '', $item['price']));
                                $totalPrice = $price * $item['quantity'];
                                $subtotal += $totalPrice;
                                ?>
                                <div class="purchase-item">
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="50">
                                    <div>
                                        <p><?= htmlspecialchars($item['name']) ?></p>
                                        <p>(Qty: <?= htmlspecialchars($item['quantity']) ?>)</p>
                                        <p>₱ <?= htmlspecialchars($item['price']) ?> each</p>
                                        <p>Total: ₱ <?= number_format($totalPrice, 2) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No items selected for checkout.</p>
                        <?php endif; ?>
                    </div>
                    <!-- Rest of the checkout page remains unchanged -->
                </div>
            </div>
        </section>
    </main>
</body>
</html>
