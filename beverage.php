<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Beverages</title>
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
            border: 2px solid var(--secondary-color);
            color: var(--dark-gray);
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .category-btn.active,
        .category-btn:hover {
            background-color: var(--secondary-color);
            color: var(--white);
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem 5%;
        }
        
        .product-card[data-category="frozen"] .product-price,
        .product-card[data-category="slushie"] .product-price,
        .product-card[data-category="specialty"] .product-price {
            color: var(--secondary-color);
        }
        
        .product-card[data-category="frozen"] .add-to-cart,
        .product-card[data-category="slushie"] .add-to-cart,
        .product-card[data-category="specialty"] .add-to-cart {
            background-color: var(--secondary-color);
        }
        
        .product-card[data-category="frozen"] .add-to-cart:hover,
        .product-card[data-category="slushie"] .add-to-cart:hover,
        .product-card[data-category="specialty"] .add-to-cart:hover {
            background-color: #4a69d9;
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
                <li><a href="ice-cream.php">Ice Cream</a></li>
                <li><a href="beverage.php" class="active">Beverages</a></li>
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
            <h1>Beverage Menu</h1>
            <p>Quench your thirst with our selection of refreshing frozen beverages. From classic slushies to specialty drinks, we have the perfect treat to cool you down.</p>
            
            <div class="menu-categories">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="frozen">Frozen</button>
                <button class="category-btn" data-category="slushie">Slushies</button>
                <button class="category-btn" data-category="specialty">Specialty</button>
            </div>
        </section>

        <section class="menu-grid">
            <!-- Frozen Beverages -->
            <div class="product-card" data-category="frozen">
                <div class="product-image">
                    <img src="images/frozen-cola.png" alt="Frozen Cola">
                </div>
                <div class="product-info">
                    <h3>Frozen Cola</h3>
                    <p>Classic cola slushie, refreshing and full of flavor</p>
                    <div class="product-price">$3.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="frozen">
                <div class="product-image">
                    <img src="images/frozen-lemonade.png" alt="Frozen Lemonade">
                </div>
                <div class="product-info">
                    <h3>Frozen Lemonade</h3>
                    <p>Tangy and sweet frozen lemonade, perfect for hot days</p>
                    <div class="product-price">$3.75</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="frozen">
                <div class="product-image">
                    <img src="images/frozen-coffee.png" alt="Frozen Coffee">
                </div>
                <div class="product-info">
                    <h3>Frozen Coffee</h3>
                    <p>Rich coffee blended with ice and topped with whipped cream</p>
                    <div class="product-price">$4.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <!-- Slushies -->
            <div class="product-card" data-category="slushie">
                <div class="product-image">
                    <img src="images/blue-raspberry.png" alt="Blue Raspberry Slushie">
                </div>
                <div class="product-info">
                    <h3>Blue Raspberry</h3>
                    <p>Sweet and tangy blue raspberry slushie</p>
                    <div class="product-price">$3.25</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="slushie">
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
            <div class="product-card" data-category="slushie">
                <div class="product-image">
                    <img src="images/cherry-blast.png" alt="Cherry Slushie">
                </div>
                <div class="product-info">
                    <h3>Cherry Blast</h3>
                    <p>Sweet cherry slushie with a burst of flavor</p>
                    <div class="product-price">$3.50</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            
            <!-- Specialty Drinks -->
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/mango-smoothie.png" alt="Mango Smoothie">
                </div>
                <div class="product-info">
                    <h3>Mango Tango</h3>
                    <p>Smooth and creamy mango smoothie with real fruit</p>
                    <div class="product-price">$5.25</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/tropical-blend.png" alt="Tropical Blend">
                </div>
                <div class="product-info">
                    <h3>Tropical Blend</h3>
                    <p>Mix of pineapple, mango, and banana in a refreshing smoothie</p>
                    <div class="product-price">$5.75</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product-card" data-category="specialty">
                <div class="product-image">
                    <img src="images/berry-blast-smoothie.png" alt="Berry Blast">
                </div>
                <div class="product-info">
                    <h3>Berry Blast</h3>
                    <p>Mixed berry smoothie with strawberry, blueberry, and raspberry</p>
                    <div class="product-price">$5.50</div>
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
        // Filter beverage products by category
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