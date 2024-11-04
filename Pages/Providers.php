<?php
session_start();
?>

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
            <li><a href="../Pages/Contact.php">Contact Us</a></li>
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

<section class="hero">
    <div class="hero-content">
        <h2>Browse our food and restaurants.</h2>
    </div>
</section>

<section class="search-section">
    <input type="text" id="search-bar" placeholder="Search for food or restaurants..." onkeyup="searchItems()">
</section>

<section class="categories">
    <div class="category-scroll">
        <button class="category-btn" onclick="filterCategory('All')">All</button>
        <?php
        $categories = ['Burgers', 'Pizza', 'Seafood', 'Steak and Meat', 'Pasta and Italian', 'Curries and Bowls', 'Appetizers and Small Plates', 'Desserts', 'Sandwiches and Wraps', 'Grill and Barbecue'];
        foreach ($categories as $category) {
            echo "<button class='category-btn' onclick='filterCategory(\"$category\")'>$category</button>";
        }
        ?>
    </div>
</section>

<section class="available-food">
    <h2>Available Options</h2>
    <div class="food-grid" id="food-grid">
        <?php
        $conn = new mysqli("localhost", "root", "", "localbite");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT MenuID, ItemName, Description, Price, MenuImg, Categories FROM restaurantsmenu ORDER BY RAND() LIMIT 8";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='food-item' data-category='{$row["Categories"]}'>";
                echo "<img src='{$row["MenuImg"]}' alt='{$row["ItemName"]}'>";
                echo "<h4>{$row["ItemName"]}</h4>";
                echo "<p>{$row["Description"]}</p>";
                echo "<p>Price: R{$row["Price"]}</p>";
                echo "<a href='Order.php?MenuID={$row["MenuID"]}'>Order Now</a>";
                
                // Display edit button only for admin users
                if (isset($_SESSION['UserType']) && $_SESSION['UserType'] === 'admin') {
                    echo "<a href='DishEdit.php?MenuID={$row["MenuID"]}' class='edit-btn'>Edit</a>";
                }
                
                echo "</div>";
            }
        } else {
            echo "No items found.";
        }
        $conn->close();
        ?>
    </div>
</section>

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
            <li><a href="https://www.instagram.com/openwindowinstitute?utm_source=ig_web_button_share_sheet&igshid=ZDNlZDc0MzIxNw==">Instagram</a></li>
            <li><a href="https://www.facebook.com/theopenwindow">Facebook</a></li>
            <li><a href="https://x.com/open_window_">Twitter</a></li>
            <li><a href="https://www.youtube.com/@theopenwindowschool">YouTube</a></li>
        </ul>
        <p>&copy; 2024 Open Window. All Rights Reserved.</p>
    </div>
</footer>

<script>
    function filterCategory(category) {
        const foodItems = document.querySelectorAll('.food-item');
        foodItems.forEach(item => {
            item.style.display = category === 'All' || item.getAttribute('data-category') === category ? 'block' : 'none';
        });
    }

    function searchItems() {
        const searchInput = document.getElementById('search-bar').value.toLowerCase();
        const foodItems = document.querySelectorAll('.food-item');
        foodItems.forEach(item => {
            const itemName = item.getAttribute('data-name').toLowerCase();
            const itemDescription = item.getAttribute('data-description').toLowerCase();
            item.style.display = itemName.includes(searchInput) || itemDescription.includes(searchInput) ? 'block' : 'none';
        });
    }

    const navbar = document.querySelector('header');
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        navbar.style.top = scrollTop === 0 ? "0" : "-100px";
    });

</script>

</body>
</html>
