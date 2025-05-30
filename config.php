<?php
// config.php
session_start();
require_once 'database.php';

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Get current user data
function getCurrentUser() {
    global $db;
    if (isLoggedIn()) {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

// Add item to cart (session-based)
function addToCart($product) {
    if (!isLoggedIn()) return false;
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Check if product already in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] == $product['name']) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        $product['quantity'] = 1;
        // Ensure image is set
        if (!isset($product['image'])) {
            $product['image'] = 'images/homepage-banner.png';
        }
        $_SESSION['cart'][] = $product;
    }
    
    return true;
}

// Get cart items
function getCartItems() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

// Calculate cart total
function getCartTotal() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $price = (float)str_replace('$', '', $item['price']);
            $total += $price * $item['quantity'];
        }
    }
    return $total;
}

// Clear cart
function clearCart() {
    unset($_SESSION['cart']);
}
?>