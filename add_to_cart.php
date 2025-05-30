<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoggedIn()) {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $image = $_POST['image'] ?? '';
    
    if (!empty($name) && !empty($price) && !empty($image)) {
        addToCart([
            'name' => $name,
            'price' => $price,
            'image' => $image
        ]);
        
        echo json_encode([
            'success' => true,
            'cartCount' => count($_SESSION['cart'])
        ]);
        exit();
    }
}

echo json_encode([
    'success' => false,
    'message' => 'Invalid request or not logged in'
]);