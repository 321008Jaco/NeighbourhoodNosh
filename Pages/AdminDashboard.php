<?php
session_start();
include '../Config.php';

// Handle form submission to add a new restaurant
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_restaurant'])) {
    $resName = $_POST['ResName'];
    $resLocation = $_POST['ResLocation'];
    $contactInfo = $_POST['ContactInfo'];
    $description = $_POST['Description'];
    $restaurantImg = $_POST['RestaurantImg'];

    $sql = "INSERT INTO restaurants (ResName, ResLocation, ContactInfo, Description, RestaurantImg) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $resName, $resLocation, $contactInfo, $description, $restaurantImg);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Restaurant added successfully!</p>";
    } else {
        echo "<p class='error-message'>Error adding restaurant: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Handle form submission to add a new dish
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_dish'])) {
    $restaurantID = $_POST['restaurantID'];
    $itemName = $_POST['ItemName'];
    $categories = $_POST['Categories'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $menuImg = $_POST['MenuImg'];

    $sql = "INSERT INTO restaurantsmenu (restaurantID, ItemName, Categories, Price, Description, MenuImg) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdss", $restaurantID, $itemName, $categories, $price, $description, $menuImg);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Dish added successfully!</p>";
    } else {
        echo "<p class='error-message'>Error adding dish: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - LocalBite</title>
    <link rel="stylesheet" href="AdminDashboard.css">
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
            <li><a href="#">Home</a></li>
            <li><a href="./Pages/Providers.php">Find Food</a></li>
            <li><a href="./Pages/About.php">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            
            <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] === 'admin'): ?>
                <li><a href="./Pages/AdminDashboard.php">Admin Dashboard</a></li>
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

<!-- Hero Section -->
<section class="hero"></section>

<div class="dashboard-container">
    <h1>Admin Dashboard</h1>

    <!-- Tab Buttons -->
    <div class="tab-buttons">
        <button class="tab-button active" onclick="showTab('restaurant')">Restaurant</button>
        <button class="tab-button" onclick="showTab('dishes')">Dishes</button>
    </div>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Restaurant Tab -->
        <div id="restaurant" class="tab-pane active">
            <h2>Manage Restaurants</h2>

            <!-- Add New Restaurant Form -->
            <form action="AdminDashboard.php" method="POST" class="add-restaurant-form">
                <label for="ResName">Restaurant Name:</label>
                <input type="text" name="ResName" id="ResName" required>

                <label for="ResLocation">Location:</label>
                <input type="text" name="ResLocation" id="ResLocation" required>

                <label for="ContactInfo">Contact Info:</label>
                <input type="text" name="ContactInfo" id="ContactInfo" required>

                <label for="Description">Description:</label>
                <textarea name="Description" id="Description" rows="3" required></textarea>

                <label for="RestaurantImg">Image URL:</label>
                <input type="text" name="RestaurantImg" id="RestaurantImg" required>

                <button type="submit" name="add_restaurant" class="submit-btn">Add Restaurant</button>
            </form>
        </div>

        <!-- Dishes Tab -->
        <div id="dishes" class="tab-pane">
            <h2>Manage Dishes</h2>

            <!-- Add New Dish Form -->
            <form action="AdminDashboard.php" method="POST" class="add-dish-form">
                <label for="restaurantID">Restaurant ID:</label>
                <input type="number" name="restaurantID" id="restaurantID" required>

                <label for="ItemName">Dish Name:</label>
                <input type="text" name="ItemName" id="ItemName" required>

                <label for="Categories">Category:</label>
                <input type="text" name="Categories" id="Categories" required>

                <label for="Price">Price:</label>
                <input type="number" step="0.01" name="Price" id="Price" required>

                <label for="Description">Description:</label>
                <textarea name="Description" id="Description" rows="3" required></textarea>

                <label for="MenuImg">Image URL:</label>
                <input type="text" name="MenuImg" id="MenuImg" required>

                <button type="submit" name="add_dish" class="submit-btn">Add Dish</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
        document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active'));

        document.getElementById(tabId).classList.add('active');
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
    }

    const navbar = document.querySelector('header');
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        navbar.style.top = scrollTop === 0 ? "0" : "-100px";
    });

</script>

</body>
</html>
