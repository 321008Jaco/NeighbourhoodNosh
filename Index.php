<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalBite - Fresh, Local Food Delivered</title>
    <link rel="stylesheet" href="Index.css">
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <img src="./Assets/Logo1.png" alt="LocalBite Logo">
        </div>
        <div class="line">
            <hr>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="./Pages/Providers.php">Find Food</a></li>
            <li><a href="./Pages/About.php">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
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

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h2>Discover restaurants that deliver near you.</h2>
        <form class="search-bar">
            <input type="text" placeholder="Enter your delivery address">
            <button type="submit">Go</button>
        </form>
    </div>
</section>

<!-- Features Section -->
<h2 class="cards">Here Are Some restaurant <span>Suggestions!</span></h2>
<div class="view-more">
    <a href="#">View More <span>&rarr;</span></a>
</div>
<section class="features">
    <?php
    // Database connection (replace with your actual connection details)
    $conn = new mysqli("localhost", "root", "", "localbite");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch 3 random restaurants from the table
    $sql = "SELECT ResName, RestaurantImg, ResLocation FROM restaurants ORDER BY RAND() LIMIT 3";
    $result = $conn->query($sql);

    // Display each restaurant as a card
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="feature-box">';
            echo '<img src="' . $row["RestaurantImg"] . '" alt="' . $row["ResName"] . '">';
            echo '<h4>' . $row["ResName"] . '</h4>';
            echo '<p>' . $row["ResLocation"] . '</p>';
            echo '<a href="#">View Now</a>';
            echo '</div>';
        }
    } else {
        echo "No restaurants found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</section>

<!-- Why Us Section -->
<section class="why-us">
    <h2>Why Choose <span>Us?</span></h2>
    <p>When you choose us, you'll feel the benefit of 10 years' experience in food delivery services. We know the industry inside and out, ensuring quality, speed, and reliability for every order.</p>

    <div class="why-us-cards">
        <div class="why-us-card">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#00403D" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7l-10-5zm0 16.27l-7.41-3.7 7.41-3.7 7.41 3.7-7.41 3.7zm7.41-5.47l-7.41-3.7-7.41 3.7V8.15l7.41-3.7 7.41 3.7v4.65z"/></svg>
            <h4>Secure Transactions</h4>
            <p>We use the latest technology to ensure your transactions are secure and safe.</p>
        </div>

        <div class="why-us-card">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#00403D" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.732 4.092 10.452 9.477 11.698L12 22v2h2v-2h-1v-3h-1v-3h-3.803C5.682 17.233 2 13.02 2 8h1c0 4.418 3.582 8 8 8 4.418 0 8-3.582 8-8s-3.582-8-8-8zm0 18c-2.209 0-4-1.791-4-4h1c0 1.656 1.344 3 3 3v1c1.656 0 3-1.344 3-3h1c0 2.209-1.791 4-4 4z"/></svg>
            <h4>Fast Delivery</h4>
            <p>Our delivery services are quick and efficient, ensuring your food arrives on time, every time.</p>
        </div>

        <div class="why-us-card">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#00403D" viewBox="0 0 24 24"><path d="M12 1L3 6v11h2v-9l7-4 7 4v9h2V6l-9-5zm0 2.7L5.15 7 12 10.29 18.85 7 12 3.7zm0 11.3l-7-4V14l7 4 7-4v-3l-7 4z"/></svg>
            <h4>Wide Selection</h4>
            <p>We offer a wide range of food options to satisfy every craving, from pizza to sushi.</p>
        </div>

        <div class="why-us-card">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#00403D" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22c-5.514 0-10-4.486-10-10S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/></svg>
            <h4>24/7 Support</h4>
            <p>We’re always here for you! Our support team is available around the clock.</p>
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
        <img src="./Assets/Open-Window.png" alt="Open Window Logo">
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
        navbar.style.top = scrollTop === 0 ? "0" : "-100px";
    });
</script>

</body>
</html>
