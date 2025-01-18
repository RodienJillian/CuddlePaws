<?php
session_start(); // Start session to access login state
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <?php if (isset($_SESSION['Username'])): ?>
                    <li><a href="account.php">Account</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log In/Sign Up</a></li>
                <?php endif; ?>
            </ul>
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
                <a href="#about-us">Cuddle Paws</a>
            </div>
        </nav>
    </header>
    
    <main>
        <div id="home" class="hero">
            <div>
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/c_crop,ar_1:1/v1726737020/puppy_and_kitten_xsjakb.jpg" alt="Hero Image">
            </div>
            <div class="hero-text">
                <h1>Welcome to Cuddle Paws!</h1>
                <p>At Cuddle Paws, we know that your pets are more than just animals; they’re family. That’s why we’re dedicated to providing the highest quality pet care supplies to keep your furry, feathered, and finned friends healthy and happy.</p>
                <a href="shop.php"><button class="shop-now">Shop Now</button></a>
            </div>
        </div>

        <section id="about-us" class="about-us">
            <div class="column">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1727339245/paw-print_9152624_yd7kyz.png" class="about-us-logo">
                <h2>About Us</h2>
            </div>
            <p>
                The eCommerce software for Cuddle Paws is a comprehensive software designed to facilitate the online sale of pet care products. This platform enables the efficient management of product catalogs, customer interactions, and transactions, ensuring a seamless shopping experience for pet owners. The software integrates various functionalities to support a robust and scalable online store, with features tailored to the specific needs of the pet care industry.
            </p>
            <br><br>
            <p>
                Cuddle Paws software aims to enhance the company's online presence by facilitating product sales, improving customer experience, and increasing operational efficiency. Its primary goals include enabling online sales to a broader customer base that encompasses business operations such as order management and inventory tracking, and providing a user-friendly platform for customers to browse and purchase pet care products. Specific features include comprehensive product catalog management, order processing, inventory control, customer account management, and integration with payment and shipping providers. Overall, this eCommerce solution is designed to boost revenue, improve customer satisfaction, reduce operational costs, and provide a competitive edge, while also supporting the company's expansion and growth into new markets and regions.
            </p>
        </section>
        
        <h3>Get in Touch</h3>
        <section class="contact">
            <div class="contact-form">
                <form action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="6a0b79db-6e16-40a5-9848-a2c9ae29c11a">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" placeholder="Message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>

    </main>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <p><strong>Email:</strong><br>
                cuddlepawsph@gmail.com</p>
            </div>
            <div class="footer-section">
                <p><strong>Phone:</strong><br>
                (63) 947-703-0508<br>
                (63) 927-704-6513<br>
                (63) 927-283-0230</p>
            </div>
            <div class="footer-section">
                <p><strong>Address:</strong><br>
                Poblacion, Pandi,<br>
                Bulacan, Philippines</p>
            </div>
        </div>
        <p class="footer-bottom">For educational purposes only</p>
        <p class="footer-bottom">&copy;2024 Cuddle Paws. All rights reserved.</p>
    </footer>
    <script src="js/updatedNav.js"></script>

</body>
</html>