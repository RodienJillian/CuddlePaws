<?php
session_start();

// Ensure the cart exists in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get the incoming product data
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $productExists = false;

    // Loop through the cart to check if the product already exists
    foreach ($_SESSION['cart'] as &$product) {
        if ($product['name'] === $data['name']) {
            // If the product exists, update its quantity
            $product['quantity'] += $data['quantity'];
            $productExists = true;
            break;
        }
    }

    // If the product does not exist, add it to the cart
    if (!$productExists) {
        $_SESSION['cart'][] = [
            'name' => $data['name'],
            'price' => $data['price'],
            'image' => $data['image'],
            'quantity' => $data['quantity']
        ];
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

?>