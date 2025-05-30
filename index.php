<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        window.isUserLoggedIn = <?php echo isLoggedIn() ? 'true' : 'false'; ?>;
    </script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Frozen<span>Delights</span></h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="active">Home</a></li>
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
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Cart <?php if (isLoggedIn() && isset($_SESSION['cart'])): ?><span class="cart-count"><?php echo count($_SESSION['cart']); ?></span><?php endif; ?></a>
                <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
    </header>


    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Delicious Treats for Every Mood</h1>
                <p>Explore our wide range of delicious ice creams and refreshing beverages</p>
                <div class="hero-buttons">
                    <a href="ice-cream.php" class="btn primary-btn">Ice Cream Menu</a>
                    <a href="beverage.php" class="btn secondary-btn">Beverage Menu</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="images/homepage-banner.png" alt="Delicious ice creams and beverages">
            </div>
        </section>

        <section class="featured-products">
            <h2 class="section-title">Popular Flavors</h2>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/strawberry-ice-cream.png" alt="Strawberry Ice Cream">
                    </div>
                    <div class="product-info">
                        <h3>Strawberry Delight</h3>
                        <p>Fresh strawberry ice cream with real fruit pieces</p>
                        <div class="product-price">$3.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/chocolate-ice-cream.png" alt="Chocolate Ice Cream">
                    </div>
                    <div class="product-info">
                        <h3>Double Chocolate</h3>
                        <p>Rich chocolate ice cream with chocolate chips</p>
                        <div class="product-price">$4.50</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/frozen-cola.png" alt="Frozen Cola">
                    </div>
                    <div class="product-info">
                        <h3>Frozen Cola</h3>
                        <p>Refreshing frozen cola slushie</p>
                        <div class="product-price">$3.50</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="images/orange-slushie.png" alt="Orange Slushie">
                    </div>
                    <div class="product-info">
                        <h3>Orange Freeze</h3>
                        <p>Tangy orange slushie with real fruit</p>
                        <div class="product-price">$3.75</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-preview">
            <div class="about-content">
                <h2 class="section-title">Our Story</h2>
                <p>At FrozenDelights, we've been crafting delicious ice creams and beverages since 2024. Our mission is to provide high-quality, refreshing treats for all seasons.</p>
                <p>All our products are made with premium ingredients, with no artificial preservatives.</p>
                <a href="about.php" class="btn primary-btn">Learn More</a>
            </div>
            <div class="about-image">
                <img src="images/homepage-banner.png" alt="Our ice cream shop">
            </div>
        </section>

        <section class="newsletter">
            <div class="newsletter-content">
                <h2>Join Our Mailing List</h2>
                <p>Subscribe to receive updates about new flavors, promotions, and events.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit" class="btn primary-btn">Subscribe</button>
                </form>
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
                <p><i class="fas fa-map-marker-alt"></i> Kuril,Dhaka</p>
                <p><i class="fas fa-phone"></i> 01641655173</p>
                <p><i class="fas fa-envelope"></i> Sakibalmahamud34@gmail.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 FrozenDelights. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
