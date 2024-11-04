<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LocalBite</title>
    <link rel="stylesheet" href="Contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <img src="../Assets/Logo1.png" alt="LocalBite Logo">
        </div>
        <div class="line">
            <hr>
        </div>
        <ul class="nav-links">
            <li><a href="../Index.php">Home</a></li>
            <li><a href="../Pages/Providers.php">Find Food</a></li>
            <li><a href="../Pages/About.php">About Us</a></li>
            <li><a href="#">Contact Us</a></li>

                        <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] === 'admin'): ?>
                <li><a href="../Pages/AdminDashboard.php">Admin Dashboard</a></li>
            <?php endif; ?>
        </ul>
        <div class="nav-extras">
            <span class="phone-number">+27 123456789</span>
            <a href="#" class="account">Account</a>
            <a href="cart.php" class="cart-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#00403D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" width="24" height="24">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2 13h13l3-8H6"></path>
                </svg>
            </a>
        </div>
    </nav>
</header>

<main>
    <section class="contact-section">
        <div class="container">
            <h1>Contact Us</h1>
            <p>If you have any questions or inquiries, feel free to reach out to us via the form or contact details below.</p>

            <div class="contact-wrapper">
                <!-- Left side form -->
                <div class="contact-form">
                    <h2>Get In Touch</h2>
                    <form method="POST" action="Contact.php">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email" required>

                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" required>

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Your message" required></textarea>

                        <button type="submit">Send Now</button>
                    </form>
                </div>

                <!-- Right side contact info -->
                <div class="contact-info">
                    <div class="info-box-group">
                        <div class="info-box">
                            <i class="fas fa-phone-alt"></i>
                            <h3>Phone Number</h3>
                            <p>+27 123 456 789</p>
                        </div>
                        <div class="info-box">
                            <i class="fas fa-envelope"></i>
                            <h3>Email Address</h3>
                            <p>example@email.com</p>
                        </div>
                    </div>

                    <div class="info-box-group">
                        <div class="info-box">
                            <i class="fab fa-whatsapp"></i>
                            <h3>WhatsApp</h3>
                            <p>+27 678 123 456</p>
                        </div>
                        <div class="info-box">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Our Office</h3>
                            <p>The Open Window Institute<br> John Vorster Drive & Nellmapius Drive<br> Southdowns, Irene<br> Centurion, 0062<br> South Africa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<section class="hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions or inquiries, feel free to reach out to us via the form or contact details below.</p>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <p>The Open Window Institute <br> John Vorster Drive & Nellmapius Drive <br> Southdowns, Irene <br> Centurion, 0062 <br> South Africa</p>
        <div class="contact-us">
            <p>Contact Us</p>
        </div>
        <p>Admissions Office <br> Tel: +27 12 648 9200 <br> Email: info@openwindow.co.za</p>
    </div>
    <div class="footer-logo">
        <img src="../Assets/Open-Window.png" alt="Open Window Logo">
    </div>
    <div class="footer-bottom">
        <ul class="social-links">
            <li><a href="https://www.instagram.com/openwindowinstitute?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a></li>
            <li><a href="https://www.facebook.com/theopenwindow">Facebook</a></li>
            <li><a href="https://x.com/open_window_">Twitter</a></li>
            <li><a href="https://www.youtube.com/@theopenwindowschool">YouTube</a></li>
        </ul>
        <p>&copy; 2024 Open Window. All Rights Reserved.</p>
    </div>
</footer>

<script>
    const navbar = document.querySelector('header');

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop === 0) {
            navbar.style.top = "0";
        } else {
            navbar.style.top = "-100px"; 
        }
    });
</script>

</body>
</html>