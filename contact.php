<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrozenDelights | Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .contact-header {
            background-color: var(--light-blue);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .contact-header h1 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }
        
        .contact-header p {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .contact-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .info-card {
            background-color: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .info-card i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .info-card h3 {
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
        }
        
        .contact-form {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 94, 132, 0.3);
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }
        
        .submit-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .submit-btn:hover {
            background-color: #e44570;
        }
        
        .map-container {
            margin-top: 3rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
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
                <li><a href="contact.php" class="active">Contact</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Cart <span class="cart-count">0</span></a>
                <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="contact-header">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out to us.</p>
        </section>

        <section class="contact-container">
            <div class="contact-info">
                <div class="info-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Visit Us</h3>
                    <p>Kuril,Dhaka</p>
                    <p>Iceville, CA 90210</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Call Us</h3>
                    <p>Phone: 01641655173</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Email Us</h3>
                    <p>Sakibalmahamud34@gmail.com</p>
                    <p>support@frozendelights.com</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-clock"></i>
                    <h3>Opening Hours</h3>
                    <p>Monday - Friday: 10am - 9pm</p>
                    <p>Saturday - Sunday: 11am - 10pm</p>
                </div>
            </div>
            
            <div class="contact-form">
                <h2 class="section-title">Send us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="form-control" placeholder="Enter subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" placeholder="Type your message here..." required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
        
        <section class="map-container">
            <!-- This would be a real map in a production environment -->
            <div style="background-color: #e9ecef; height: 400px; display: flex; justify-content: center; align-items: center;">
                <div style="text-align: center;">
                    <i class="fas fa-map-marked-alt" style="font-size: 4rem; color: var(--dark-blue); margin-bottom: 1rem;"></i>
                    <h3>Map Location</h3>
                    <p>Interactive map would be displayed here in a production environment</p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                const message = document.getElementById('message').value;
                
                // In a real application, you would send this to a server
                console.log('Contact Form Submission:', { name, email, subject, message });
                
                // Show success message
                alert('Thank you for your message! We will get back to you shortly.');
                
                // Reset form
                contactForm.reset();
            });
        });
    </script>
</body>
</html>