<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalBite - Fresh, Local Food Delivered</title>

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="About.css">
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
            <li><a href="../Pages/Contact.php">Contact Us</a></li>
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

<section class="hero">
    <div class="container">
        <h1>About Us</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt ligula sit amet justo dapibus, in vestibulum odio vehicula.</p>
    </div>
</section>

<section class="content-section">
    <div class="hero-images">
        <img src="../Assets/About1.jpeg" alt="Team Image 1">
        <img src="../Assets/About2.jpeg" alt="Team Image 2">
        <img src="../Assets/About3.jpeg" alt="Team Image 3">
        <img src="../Assets/About4.jpeg" alt="Team Image 4">
    </div>
    <div class="container">
        <h2>Delivering Fresh, Local Food Right to Your Door</h2>
        <div class="paragraphs">
            <p>At LocalBite, we are committed to providing you with the freshest, locally-sourced food from trusted suppliers. Whether you're looking for fruits, vegetables, or artisanal products, we ensure that all our deliveries come straight from the farm to your table.</p>
            <p>We believe in supporting local farmers and producers, ensuring that every bite you take not only tastes great but supports your local community. Our efficient delivery system guarantees that your food arrives fresh and on time, every time.</p>
        </div>
    </div>
</section>

<section class="content-section alternate">
    <div class="container">
        <h2>We Empower Small Business Owners</h2>
        <div class="empower-section">
            <img src="../Assets/SmallBus.jpeg" alt="Empowering Small Business" class="empower-img">
            <p>At LocalBite, we believe in the power of small businesses. By partnering with local food producers, we give them the platform to reach more customers and grow their operations. We help small business owners compete in today’s fast-paced market by providing them with the tools and resources they need to succeed, from delivery logistics to customer management.</p>
        </div>
    </div>
</section>

<section class="growth-section">
    <div class="container">
        <h2>We help local food vendors grow faster and reach more customers</h2>
        <p>At LocalBite, we are committed to providing local food vendors with the tools and resources they need to expand their business. By connecting them to customers who are seeking fresh, local produce, we help vendors increase their visibility and sales.</p>
        <div class="growth-cards">
            <div class="growth-card">
                <i class="fas fa-users"></i> <!-- Icon for Professional Team -->
                <h3>Professional Team</h3>
                <p>Our team works closely with vendors to ensure they are well-prepared and able to meet customer demands, ensuring a smooth experience for everyone.</p>
            </div>
            <div class="growth-card">
                <i class="fas fa-bullseye"></i> <!-- Icon for Target-Oriented -->
                <h3>Target-Oriented</h3>
                <p>We tailor our platform to meet the needs of our customers, ensuring local food vendors get the exposure they need to grow their businesses quickly.</p>
            </div>
            <div class="growth-card">
                <i class="fas fa-check-circle"></i> <!-- Icon for Success Guarantee -->
                <h3>Success Guarantee</h3>
                <p>Our system is designed to guarantee success by providing vendors with constant access to a growing customer base that values fresh, local food.</p>
            </div>
        </div>
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
