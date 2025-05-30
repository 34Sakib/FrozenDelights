<?php
require_once 'config.php';
requireLogin();

// Handle cart actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_item'])) {
        $index = $_POST['remove_item'];
        if (isset($_SESSION['cart'][$index])) {
            array_splice($_SESSION['cart'], $index, 1);
        }
    } elseif (isset($_POST['update_quantity'])) {
        $index = $_POST['index'];
        $quantity = (int)$_POST['quantity'];
        if (isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['quantity'] = max(1, $quantity);
        }
    }
    
    header('Location: cart.php');
    exit();
}

$cartItems = getCartItems();
$subtotal = getCartTotal();
$tax = $subtotal * 0.1;
$total = $subtotal + $tax;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .cart-header {
            background-color: var(--light-blue);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .cart-header h1 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }
        
        .cart-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 5%;
        }
        
        .cart-empty {
            text-align: center;
            padding: 3rem;
            background-color: var(--light-gray);
            border-radius: 10px;
        }
        
        .cart-empty i {
            font-size: 4rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            opacity: 0.3;
        }
        
        .cart-empty p {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            color: var(--dark-gray);
        }
        
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        
        .cart-table th {
            background-color: var(--light-gray);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--dark-blue);
        }
        
        .cart-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .cart-product {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .cart-product img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        
        .cart-quantity {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .cart-quantity button {
            width: 30px;
            height: 30px;
            background-color: var(--light-gray);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: var(--transition);
        }
        
        .cart-quantity button:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .cart-quantity span {
            font-weight: 500;
            width: 30px;
            text-align: center;
        }
        
        .remove-btn {
            background-color: transparent;
            border: none;
            color: #ff3b30;
            cursor: pointer;
            font-size: 1.2rem;
            transition: var(--transition);
        }
        
        .remove-btn:hover {
            transform: scale(1.1);
        }
        
        .cart-summary {
            background-color: var(--light-gray);
            padding: 2rem;
            border-radius: 10px;
        }
        
        .cart-summary h2 {
            margin-bottom: 1.5rem;
            color: var(--dark-blue);
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        
        .summary-row.total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: var(--dark-blue);
            color: var(--white);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1.5rem;
            transition: var(--transition);
        }
        
        .checkout-btn:hover {
            background-color: var(--primary-color);
        }
        
        .update-btn {
            background-color: #ff9800;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 8px 18px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-left: 8px;
            transition: background 0.2s, color 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px rgba(255,152,0,0.12);
        }
        .update-btn:hover {
            background-color: #e65100;
            color: #fff;
            transform: translateY(-2px) scale(1.05);
        }
        
        @media (max-width: 768px) {
            .cart-table thead {
                display: none;
            }
            
            .cart-table, .cart-table tbody, .cart-table tr, .cart-table td {
                display: block;
                width: 100%;
            }
            
            .cart-table tr {
                margin-bottom: 1rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid var(--light-gray);
            }
            
            .cart-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: none;
                padding: 0.5rem 0;
            }
            
            .cart-table td::before {
                content: attr(data-label);
                font-weight: 600;
            }
            
            .cart-product {
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Frozen<span>Delights</span></h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="ice-cream.php">Ice Cream</a></li>
                <li><a href="beverage.php">Beverages</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-buttons">
                <?php if (isLoggedIn()): ?>
                    <a href="logout.php" class="login-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <?php else: ?>
                    <a href="login.php" class="login-btn"><i class="fas fa-user"></i> Login</a>
                <?php endif; ?>
                <a href="cart.php" class="cart-btn active"><i class="fas fa-shopping-cart"></i> Cart <span class="cart-count"><?php echo count($cartItems); ?></span></a>
                <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="cart-header">
            <h1>Your Shopping Cart</h1>
        </section>

        <section class="cart-container">
            <div id="cart-content">
                <?php if (empty($cartItems)): ?>
                    <div class="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <h2>Your cart is empty</h2>
                        <p>Looks like you haven't added any items to your cart yet.</p>
                        <a href="index.php" class="btn primary-btn">Continue Shopping</a>
                    </div>
                <?php else: ?>
                    <form method="POST">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $index => $item): ?>
                                    <?php 
                                    $priceValue = (float)str_replace('$', '', $item['price']);
                                    $itemTotal = $priceValue * $item['quantity'];
                                    ?>
                                    <tr>
                                        <td data-label="Product">
                                            <div class="cart-product">
                                                <img src="<?php echo htmlspecialchars(isset($item['image']) ? $item['image'] : 'images/homepage-banner.png'); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                                <div>
                                                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price"><?php echo htmlspecialchars($item['price']); ?></td>
                                        <td data-label="Quantity">
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input" style="width:60px;">
                                                <button type="submit" name="update_quantity" class="update-btn">Update</button>
                                            </form>
                                        </td>
                                        <td data-label="Total">$<?php echo number_format($itemTotal, 2); ?></td>
                                        <td data-label="Action">
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="remove_item" value="<?php echo $index; ?>">
                                                <button type="submit" class="remove-btn"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                    
                    <div class="cart-summary">
                        <h2>Order Summary</h2>
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>$<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>$0.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax (10%)</span>
                            <span>$<?php echo number_format($tax, 2); ?></span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span>$<?php echo number_format($total, 2); ?></span>
                        </div>
                        <a href="payment.php" class="checkout-btn">Proceed to Checkout</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FrozenDelights</h3>
                <p>Bringing smiles with every scoop and sip since 2024.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="ice-cream.php">Ice Cream</a></li>
                    <li><a href="beverage.php">Beverages</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> Kuril, Dhaka</p>
                <p><i class="fas fa-phone"></i> 01641655173</p>
                <p><i class="fas fa-envelope"></i> Sakibalmahamud34@gmail.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FrozenDelights. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartContent = document.getElementById('cart-content');
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const cartCount = document.querySelector('.cart-count');
            
            // Update cart count
            cartCount.textContent = cartItems.length;
            
            // If cart is empty, display empty cart message (already in HTML)
            if (cartItems.length === 0) {
                return;
            }
            
            // If cart has items, create cart table
            let subtotal = 0;
            let cartHTML = `
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            
            cartItems.forEach((item, index) => {
                // Extract price value from price string (e.g., "$3.99" -> 3.99)
                const priceValue = parseFloat(item.price.replace('$', ''));
                const itemTotal = priceValue * item.quantity;
                subtotal += itemTotal;
                
                cartHTML += `
                    <tr data-index="${index}">
                        <td data-label="Product">
                            <div class="cart-product">
                                <img src="images/homepage-banner.png" alt="${item.name}">
                                <div>
                                    <h3>${item.name}</h3>
                                </div>
                            </div>
                        </td>
                        <td data-label="Price">${item.price}</td>
                        <td data-label="Quantity">
                            <div class="cart-quantity">
                                <button class="decrease-qty"><i class="fas fa-minus"></i></button>
                                <span>${item.quantity}</span>
                                <button class="increase-qty"><i class="fas fa-plus"></i></button>
                            </div>
                        </td>
                        <td data-label="Total">$${itemTotal.toFixed(2)}</td>
                        <td data-label="Action">
                            <button class="remove-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            
            cartHTML += `
                    </tbody>
                </table>
                
                <div class="cart-summary">
                    <h2>Order Summary</h2>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>$${subtotal.toFixed(2)}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax (10%)</span>
                        <span>$${(subtotal * 0.1).toFixed(2)}</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>$${(subtotal * 1.1).toFixed(2)}</span>
                    </div>
                    <a href="payment.php" class="checkout-btn">Proceed to Checkout</a>
                </div>
            `;
            
            cartContent.innerHTML = cartHTML;
            
            // Add event listeners to cart buttons
            const decreaseButtons = document.querySelectorAll('.decrease-qty');
            const increaseButtons = document.querySelectorAll('.increase-qty');
            const removeButtons = document.querySelectorAll('.remove-btn');
            
            decreaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const index = parseInt(row.dataset.index);
                    
                    if (cartItems[index].quantity > 1) {
                        cartItems[index].quantity--;
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        // Reload the page to update cart
                        location.reload();
                    }
                });
            });
            
            increaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const index = parseInt(row.dataset.index);
                    
                    cartItems[index].quantity++;
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    // Reload the page to update cart
                    location.reload();
                });
            });
            
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const index = parseInt(row.dataset.index);
                    
                    cartItems.splice(index, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    localStorage.setItem('cartCount', cartItems.length);
                    // Reload the page to update cart
                    location.reload();
                });
            });
        });
    </script>
</body>
</html>