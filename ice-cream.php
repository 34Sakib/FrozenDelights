<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Ice Cream</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .menu-header {
            background-color: var(--light-blue);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .menu-header h1 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }
        
        .menu-header p {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .menu-categories {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }
        
        .category-btn {
            padding: 8px 20px;
            background-color: var(--white);
            border: 2px solid var(--primary-color);
            color: var(--dark-gray);
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .category-btn.active,
        .category-btn:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem 5%;
        }
    </style>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="ice-cream.php" class="active">Ice Cream</a></li>
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
        <section class="menu-header">
            <h1>Ice Cream Menu</h1>
            <p>Explore our delicious selection of handcrafted ice creams made with premium ingredients. From classic flavors to unique creations, there's something for everyone.</p>
            
            <div class="menu-categories">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="classic">Classic</button>
                <button class="category-btn" data-category="specialty">Specialty</button>
                <button class="category-btn" data-category="vegan">Vegan</button>
                <button class="category-btn" data-category="seasonal">Seasonal</button>
            </div>
        </section>

        <section class="menu-grid">
            <!-- Classic Flavors -->
            <div class="product-card" data-category="classic">
                <div class="product-image">
                    <img src="images/vanilla-ice-cream.png" alt="Vanilla Ice Cream">
                </div>
                <div class="product-info">
                    <h3>Classic Vanilla</h3>
                    <p>Rich and creamy vanilla bean ice cream</p>
                    <div class="product-price">$3.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="classic">
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
            <div class="product-card" data-category="classic">
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
            
            <!-- Specialty Flavors -->
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/mint-chocolate-chip.png" alt="Mint Chocolate Chip">
                </div>
                <div class="product-info">
                    <h3>Mint Chocolate Chip</h3>
                    <p>Refreshing mint ice cream with chocolate chips</p>
                    <div class="product-price">$4.75</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/caramel-swirl.png" alt="Caramel Swirl">
                </div>
                <div class="product-info">
                    <h3>Caramel Swirl</h3>
                    <p>Vanilla ice cream with caramel swirls and toffee pieces</p>
                    <div class="product-price">$4.99</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/cookie-dough.png" alt="Cookie Dough">
                </div>
                <div class="product-info">
                    <h3>Cookie Dough</h3>
                    <p>Vanilla ice cream loaded with chunks of cookie dough</p>
                    <div class="product-price">$5.25</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <!-- Vegan Flavors -->
            <div class="product-card" data-category="vegan">
                <div class="product-image">
                    <img src="images/vegan-chocolate.png" alt="Vegan Chocolate">
                </div>
                <div class="product-info">
                    <h3>Vegan Chocolate</h3>
                    <p>Rich chocolate dairy-free ice cream made with coconut milk</p>
                    <div class="product-price">$5.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="vegan">
                <div class="product-image">
                    <img src="images/berry-swirl.png" alt="Vegan Berry Swirl">
                </div>
                <div class="product-info">
                    <h3>Berry Swirl</h3>
                    <p>Creamy coconut ice cream with mixed berry swirls</p>
                    <div class="product-price">$5.75</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <!-- Seasonal Flavors -->
            <div class="product-card" data-category="seasonal">
                <div class="product-image">
                    <img src="images/pumpkin-spice.png" alt="Pumpkin Spice">
                </div>
                <div class="product-info">
                    <h3>Pumpkin Spice</h3>
                    <p>Creamy pumpkin ice cream with autumn spices</p>
                    <div class="product-price">$5.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="seasonal">
                <div class="product-image">
                    <img src="images/summer-berry.png" alt="Summer Berry">
                </div>
                <div class="product-info">
                    <h3>Summer Berry</h3>
                    <p>Refreshing berry ice cream perfect for hot summer days</p>
                    <div class="product-price">$5.25</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
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
        // Filter ice cream products by category
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const productCards = document.querySelectorAll('.product-card');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const category = this.dataset.category;
                    
                    // Show all products if 'all' category is selected
                    if (category === 'all') {
                        productCards.forEach(card => {
                            card.style.display = 'block';
                        });
                    } else {
                        // Filter products by category
                        productCards.forEach(card => {
                            if (card.dataset.category === category) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>