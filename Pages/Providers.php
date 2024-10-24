<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Food - LocalBite</title>
    <link rel="stylesheet" href="Providers.css">
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
            <li><a href="#">Find Food</a></li>
            <li><a href="../Pages/About.php">About Us</a></li>
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
            <h2>Browse our food and restaurants.</h2>
        </div>
    </section>

<!-- Filter Section -->
<section class="filter-section">
    <div class="filter-options">
        <form id="filter-form">
            <select id="food-type" name="food-type">
                <option value="all">All Food</option>
                <option value="pizza">Pizza</option>
                <option value="burgers">Burgers</option>
                <option value="sushi">Sushi</option>
                <option value="pasta">Pasta</option>
            </select>

            <select id="restaurant" name="restaurant">
                <option value="all">All Restaurants</option>
                <option value="marios-pizza">Mario's Pizza</option>
                <option value="sushi-house">Sushi House</option>
                <option value="burger-spot">Burger Spot</option>
                <option value="pasta-palace">Pasta Palace</option>
            </select>

            <input type="text" id="search" name="search" placeholder="Search for food or restaurants...">
        </form>
    </div>
</section>

<!-- Available Food Section -->
<section class="available-food">
    <h2>Available Options</h2>
    <div class="food-grid" id="food-grid">
        <div class="food-item" data-type="pizza" data-restaurant="marios-pizza">
            <img src="./Assets/Pizza.jpeg" alt="Pizza">
            <h4>Pizza</h4>
            <p>From Mario's Pizza</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="burgers" data-restaurant="burger-spot">
            <img src="./Assets/Burger.jpeg" alt="Burger">
            <h4>Burger</h4>
            <p>From Burger Spot</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="sushi" data-restaurant="sushi-house">
            <img src="./Assets/Sushi.jpeg" alt="Sushi">
            <h4>Sushi</h4>
            <p>From Sushi House</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pasta" data-restaurant="pasta-palace">
            <img src="./Assets/Pasta.jpeg" alt="Pasta">
            <h4>Pasta</h4>
            <p>From Pasta Palace</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pizza" data-restaurant="marios-pizza">
            <img src="./Assets/Pizza.jpeg" alt="Pizza">
            <h4>Pizza</h4>
            <p>From Mario's Pizza</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="burgers" data-restaurant="burger-spot">
            <img src="./Assets/Burger.jpeg" alt="Burger">
            <h4>Burger</h4>
            <p>From Burger Spot</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="sushi" data-restaurant="sushi-house">
            <img src="./Assets/Sushi.jpeg" alt="Sushi">
            <h4>Sushi</h4>
            <p>From Sushi House</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pasta" data-restaurant="pasta-palace">
            <img src="./Assets/Pasta.jpeg" alt="Pasta">
            <h4>Pasta</h4>
            <p>From Pasta Palace</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pizza" data-restaurant="marios-pizza">
            <img src="./Assets/Pizza.jpeg" alt="Pizza">
            <h4>Pizza</h4>
            <p>From Mario's Pizza</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="burgers" data-restaurant="burger-spot">
            <img src="./Assets/Burger.jpeg" alt="Burger">
            <h4>Burger</h4>
            <p>From Burger Spot</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="sushi" data-restaurant="sushi-house">
            <img src="./Assets/Sushi.jpeg" alt="Sushi">
            <h4>Sushi</h4>
            <p>From Sushi House</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pasta" data-restaurant="pasta-palace">
            <img src="./Assets/Pasta.jpeg" alt="Pasta">
            <h4>Pasta</h4>
            <p>From Pasta Palace</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pizza" data-restaurant="marios-pizza">
            <img src="./Assets/Pizza.jpeg" alt="Pizza">
            <h4>Pizza</h4>
            <p>From Mario's Pizza</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="burgers" data-restaurant="burger-spot">
            <img src="./Assets/Burger.jpeg" alt="Burger">
            <h4>Burger</h4>
            <p>From Burger Spot</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="sushi" data-restaurant="sushi-house">
            <img src="./Assets/Sushi.jpeg" alt="Sushi">
            <h4>Sushi</h4>
            <p>From Sushi House</p>
            <a href="#">Order Now</a>
        </div>
        <div class="food-item" data-type="pasta" data-restaurant="pasta-palace">
            <img src="./Assets/Pasta.jpeg" alt="Pasta">
            <h4>Pasta</h4>
            <p>From Pasta Palace</p>
            <a href="#">Order Now</a>
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
<script src="Providers.js"></script>
</body>
</html>
