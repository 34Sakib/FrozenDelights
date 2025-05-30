<?php
require_once 'config.php';
requireLogin();
if (isset($_GET['order']) && $_GET['order'] === 'success') {
    // Save order to database before clearing cart
    $user = getCurrentUser();
    if ($user && !empty($_SESSION['cart'])) {
        $orderItems = json_encode($_SESSION['cart']);
        $orderTotal = getCartTotal();
        $userId = $user['id'];
        $orderDate = date('Y-m-d H:i:s');
        global $db;
        $stmt = $db->prepare("INSERT INTO orders (user_id, items, total, order_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $orderItems, $orderTotal, $orderDate]);
    }
    clearCart();
    $cartItems = [];
    $subtotal = 0;
    $tax = 0;
    $total = 0;
    echo '<script>localStorage.removeItem("cartItems"); localStorage.setItem("cartCount", 0);</script>';
} else {
    $cartItems = getCartItems();
    $subtotal = getCartTotal();
    $tax = $subtotal * 0.1;
    $total = $subtotal + $tax;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Checkout</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .checkout-header {
            background-color: var(--light-blue);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .checkout-header h1 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }
        
        .checkout-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }
        
        @media (max-width: 992px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }
        
        .checkout-form {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }
        
        .form-section {
            margin-bottom: 2rem;
        }
        
        .form-section h2 {
            color: var(--dark-blue);
            margin-bottom: 1rem;
            font-size: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(92, 122, 234, 0.3);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        @media (max-width: 576px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        .payment-options {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .payment-option {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .payment-option:hover,
        .payment-option.active {
            border-color: var(--secondary-color);
            background-color: rgba(92, 122, 234, 0.05);
        }
        
        .payment-option i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
        }
        
        .card-icons {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .card-icon {
            width: 40px;
            height: 25px;
            background-color: var(--light-gray);
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
        }
        
        .order-summary {
            background-color: var(--light-gray);
            padding: 2rem;
            border-radius: 10px;
            align-self: start;
        }
        
        .order-summary h2 {
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
        
        .place-order-btn {
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
            transition: var(--transition);
        }
        
        .place-order-btn:hover {
            background-color: var(--primary-color);
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
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Cart <span class="cart-count">0</span></a>
                <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="checkout-header">
            <h1>Checkout</h1>
        </section>

        <section class="checkout-container">
            <div class="checkout-form">
                <div class="form-section">
                    <h2>Contact Information</h2>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                </div>
                
                <div class="form-section">
                    <h2>Shipping Address</h2>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" placeholder="Street address" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" class="form-control" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" class="form-control" placeholder="State" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="zip">ZIP Code</label>
                            <input type="text" id="zip" class="form-control" placeholder="ZIP code" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" class="form-control" placeholder="Country" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h2>Payment Method</h2>
                    <div class="payment-options">
                        <div class="payment-option active">
                            <i class="far fa-credit-card"></i>
                            <div>Credit Card</div>
                        </div>
                        <div class="payment-option">
                            <i class="fab fa-paypal"></i>
                            <div>PayPal</div>
                        </div>
                        <div class="payment-option">
                            <i class="fas fa-money-bill-wave"></i>
                            <div>Cash on Delivery</div>
                        </div>
                    </div>
                    
                    <div id="credit-card-form">
                        <div class="card-icons">
                            <div class="card-icon"><i class="fab fa-cc-visa"></i></div>
                            <div class="card-icon"><i class="fab fa-cc-mastercard"></i></div>
                            <div class="card-icon"><i class="fab fa-cc-amex"></i></div>
                            <div class="card-icon"><i class="fab fa-cc-discover"></i></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="card-number">Card Number</label>
                            <input type="text" id="card-number" class="form-control" placeholder="1234 5678 9012 3456" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="expiry">Expiration Date</label>
                                <input type="text" id="expiry" class="form-control" placeholder="MM/YY" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" class="form-control" placeholder="123" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="card-name">Name on Card</label>
                            <input type="text" id="card-name" class="form-control" placeholder="Enter name on card" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-summary">
                <h2>Order Summary</h2>
                <div id="order-details">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal"><?php echo '$' . number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax (10%)</span>
                        <span id="tax"><?php echo '$' . number_format($tax, 2); ?></span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span id="total"><?php echo '$' . number_format($total, 2); ?></span>
                    </div>
                </div>
                <button type="button" id="place-order-btn" class="place-order-btn">Place Order</button>
                <?php
                if (isset($_GET['order']) && $_GET['order'] === 'success') {
                    clearCart();
                    echo '<script>localStorage.removeItem("cartItems"); localStorage.setItem("cartCount", 0);</script>';
                }
                ?>
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
            // Load cart data
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const cartCount = document.querySelector('.cart-count');
            
            // Update cart count
            cartCount.textContent = cartItems.length;
            
            // Payment option selection
            const paymentOptions = document.querySelectorAll('.payment-option');
            const creditCardForm = document.getElementById('credit-card-form');
            
            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove active class from all options
                    paymentOptions.forEach(opt => opt.classList.remove('active'));
                    // Add active class to clicked option
                    this.classList.add('active');
                    
                    // Show/hide credit card form based on selection
                    if (this.textContent.trim() === 'Credit Card') {
                        creditCardForm.style.display = 'block';
                    } else {
                        creditCardForm.style.display = 'none';
                    }
                });
            });
            
            // Place order button
            const placeOrderBtn = document.getElementById('place-order-btn');
            
            placeOrderBtn.addEventListener('click', function() {
                // Simple validation
                const email = document.getElementById('email').value;
                const fullname = document.getElementById('fullname').value;
                
                if (!email || !fullname) {
                    alert('Please fill in all required fields.');
                    return;
                }
                
                // Clear cart and redirect to confirmation page
                localStorage.removeItem('cartItems');
                localStorage.setItem('cartCount', 0);
                // Also clear PHP session cart by reloading with ?order=success
                window.location.href = window.location.pathname + '?order=success';
            });
        });
    </script>
</body>
</html>