<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($data) {
        return $item['name'] !== $data['name'];
    });
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
