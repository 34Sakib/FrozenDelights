<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | About Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .about-header {
            background-color: var(--light-blue);
            padding: 5rem 5%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .about-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(var(--dark-blue) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.1;
            z-index: 1;
        }
        
        .about-header h1 {
            font-size: 3rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        
        .about-header p {
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            font-size: 1.1rem;
        }
        
        .about-section {
            padding: 5rem 5%;
        }
        
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .our-story {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 5rem;
        }
        
        @media (max-width: 992px) {
            .our-story {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
        
        .our-story-content h2 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 1.5rem;
        }
        
        .our-story-content p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
            line-height: 1.7;
        }
        
        .our-story-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .values-section {
            background-color: var(--light-gray);
            padding: 5rem 5%;
            text-align: center;
        }
        
        .values-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .values-container > h2 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 3rem;
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .value-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }
        
        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .value-card i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }
        
        .value-card h3 {
            font-size: 1.5rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }
        
        .team-section {
            padding: 5rem 5%;
            text-align: center;
        }
        
        .team-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .team-container > h2 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 3rem;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .team-member {
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }
        
        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .team-img {
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
        
        .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .team-member:hover .team-img img {
            transform: scale(1.1);
        }
        
        .team-info {
            padding: 1.5rem;
        }
        
        .team-info h3 {
            font-size: 1.3rem;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
        }
        
        .team-info p {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .team-social {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
        }
        
        .team-social a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            background-color: var(--light-gray);
            border-radius: 50%;
            color: var(--dark-blue);
            transition: var(--transition);
        }
        
        .team-social a:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }
        
        .testimonials-section {
            background-color: var(--light-blue);
            padding: 5rem 5%;
            text-align: center;
        }
        
        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .testimonials-container > h2 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 3rem;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .testimonial-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: left;
            transition: var(--transition);
            position: relative;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-card::before {
            content: '\201C';
            font-size: 5rem;
            color: var(--light-gray);
            position: absolute;
            top: 10px;
            left: 20px;
            font-family: serif;
            line-height: 1;
            opacity: 0.3;
        }
        
        .testimonial-card p {
            margin-bottom: 1.5rem;
            font-style: italic;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 1.1rem;
            color: var(--dark-blue);
            margin-bottom: 0.2rem;
        }
        
        .author-info span {
            font-size: 0.9rem;
            color: var(--dark-gray);
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
                <li><a href="about.php" class="active">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Cart <span class="cart-count">0</span></a>
                <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="about-header">
            <h1>Our Story</h1>
            <p>Learn about FrozenDelights, our mission, values, and the passionate team behind our delicious treats.</p>
        </section>

        <section class="about-section">
            <div class="about-container">
                <div class="our-story">
                    <div class="our-story-content">
                        <h2>How It All Started</h2>
                        <p>FrozenDelights began in 2024 when founders Sakib Al Mahamud and Shadman Bhuiyan turned their passion for crafting premium ice cream and beverages into a business. What started as a small cart serving homemade ice cream in local farmers' markets has grown into a beloved chain with locations across the country.</p>
                        <p>Our commitment to quality remains unchanged since day one. We use only the finest ingredients, sourcing local produce whenever possible, and crafting each flavor with care and attention to detail. Every scoop of ice cream and every refreshing beverage is made to deliver an exceptional experience.</p>
                        <p>Today, FrozenDelights has become a community fixture, a place where families gather, friends meet, and everyone can enjoy a moment of pure delight. While we've grown, we remain true to our original mission: bringing happiness through delicious, handcrafted frozen treats.</p>
                    </div>
                    <div class="our-story-image">
                        <img src="images/homepage-banner.png" alt="FrozenDelights founders">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="values-section">
            <div class="values-container">
                <h2>Our Core Values</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <i class="fas fa-medal"></i>
                        <h3>Quality</h3>
                        <p>We never compromise on quality. From sourcing the finest ingredients to perfecting our recipes, excellence is our standard.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-seedling"></i>
                        <h3>Sustainability</h3>
                        <p>We're committed to sustainable practices, from eco-friendly packaging to supporting local farmers and reducing our environmental footprint.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-heart"></i>
                        <h3>Community</h3>
                        <p>We believe in giving back to the communities we serve through partnerships, events, and charitable initiatives.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-lightbulb"></i>
                        <h3>Innovation</h3>
                        <p>We're constantly innovating, experimenting with new flavors and techniques to bring you exciting and unique treats.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="team-section">
            <div class="team-container">
                <h2>Meet Our Team</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/Sakib.jpeg" alt="Sakib Al Mahamud">
                        </div>
                        <div class="team-info">
                            <h3>Sakib Al Mahamud</h3>
                            <p>Co-Founder & CEO</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/Shadman.png" alt="Shadman Bhuiyan">
                        </div>
                        <div class="team-info">
                            <h3>ShadMan Bhuiyan</h3>
                            <p>Co-Founder & Head Chef</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/Sifat.jpg" alt="Safayat Chowdhury">
                        </div>
                        <div class="team-info">
                            <h3>Safayat Chowdhury</h3>
                            <p>Master Flavor Creator</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/Alif.jpg" alt="Fayaz Alif">
                        </div>
                        <div class="team-info">
                            <h3>Fayaz Alif</h3>
                            <p>Operations Manager</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="testimonials-section">
            <div class="testimonials-container">
                <h2>What Our Customers Say</h2>
                <div class="testimonial-grid">
                    <div class="testimonial-card">
                        <p>FrozenDelights has the best ice cream I've ever tasted! The flavors are incredible and you can really taste the quality of the ingredients. It's our family's favorite weekend treat spot.</p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Shawon</h4>
                                <span>Loyal Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p>I'm obsessed with their frozen beverages! The Orange Freeze is my go-to during summer, so refreshing and made with real fruit. Definitely worth every penny!</p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Mostofa</h4>
                                <span>Regular Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p>As someone with dietary restrictions, I really appreciate that FrozenDelights offers delicious vegan options. Their Berry Swirl is incredible, and you'd never know it's dairy-free!</p>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4>Adnan</h4>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
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