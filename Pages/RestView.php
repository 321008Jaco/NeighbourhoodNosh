<?php
session_start();
include '../Config.php';

// Check if RestaurantID is provided
if (!isset($_GET['RestaurantID'])) {
    echo "Invalid request. No Restaurant ID provided.";
    exit;
}

$restaurantID = $_GET['RestaurantID'];

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Rating'], $_POST['Comment'])) {
    $rating = $_POST['Rating'];
    $comment = $_POST['Comment'];
    $userID = $_SESSION['UserID']; // Assuming there's a UserID stored in the session

    // Insert the review into the database
    $sql_insert_review = "INSERT INTO review (RestaurantID, UserID, Rating, Comment, Timestamp) VALUES (?, ?, ?, ?, NOW())";
    $stmt_insert_review = $conn->prepare($sql_insert_review);
    $stmt_insert_review->bind_param("iiis", $restaurantID, $userID, $rating, $comment);
    $stmt_insert_review->execute();
    $stmt_insert_review->close();
}

// Fetch restaurant details
$sql = "SELECT * FROM restaurants WHERE RestaurantID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $restaurantID);
$stmt->execute();
$restaurant = $stmt->get_result()->fetch_assoc();

// Fetch reviews for the restaurant
$sql_reviews = "SELECT * FROM review WHERE RestaurantID = ? ORDER BY Timestamp DESC";
$stmt_reviews = $conn->prepare($sql_reviews);
$stmt_reviews->bind_param("i", $restaurantID);
$stmt_reviews->execute();
$reviews = $stmt_reviews->get_result();

// Fetch menu items for the restaurant
$sql_menu = "SELECT * FROM restaurantsmenu WHERE RestaurantID = ?";
$stmt_menu = $conn->prepare($sql_menu);
$stmt_menu->bind_param("i", $restaurantID);
$stmt_menu->execute();
$dishes_result = $stmt_menu->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($restaurant['ResName']); ?> - Details</title>
    <link rel="stylesheet" href="RestView.css">
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
            <li><a href="../Pages/Contact.php">Contact Us</a></li>
            
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

<section class="hero"></section>

<div class="restaurant-details">
    <h1><?php echo htmlspecialchars($restaurant['ResName']); ?></h1>
    <img src="<?php echo htmlspecialchars($restaurant['RestaurantImg']); ?>" alt="<?php echo htmlspecialchars($restaurant['ResName']); ?>">
    <p><strong>Location:</strong> <?php echo htmlspecialchars($restaurant['ResLocation']); ?></p>
    <p><strong>Contact Info:</strong> <?php echo htmlspecialchars($restaurant['ContactInfo']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($restaurant['Description']); ?></p>
</div>

<!-- Review Section -->
<div class="review-section">
    <h2>Reviews</h2>
    
    <?php if ($reviews->num_rows > 0): ?>
        <?php while ($review = $reviews->fetch_assoc()): ?>
            <div class="review">
                <p><strong>Rating:</strong> <?php echo $review['Rating']; ?>/5</p>
                <p><?php echo htmlspecialchars($review['Comment']); ?></p>
                <p><small><?php echo htmlspecialchars($review['Timestamp']); ?></small></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No reviews yet. Be the first to leave a review!</p>
    <?php endif; ?>

    <!-- Add a new review form -->
    <h3>Leave a Review</h3>
    <form method="POST">
        <input type="hidden" name="RestaurantID" value="<?php echo $restaurantID; ?>">
        <label for="rating">Rating:</label>
        <select name="Rating" id="rating" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Good</option>
            <option value="3">3 - Average</option>
            <option value="2">2 - Poor</option>
            <option value="1">1 - Terrible</option>
        </select>
        
        <label for="comment">Comment:</label>
        <textarea name="Comment" id="comment" rows="3" required></textarea>
        
        <button type="submit">Submit Review</button>
    </form>
</div>

<div class="dishes">
    <h2>Menu</h2>
    <?php if ($dishes_result->num_rows > 0): ?>
        <div class="dishes-grid">
            <?php while ($dish = $dishes_result->fetch_assoc()): ?>
                <div class="dish-item">
                    <img src="<?php echo htmlspecialchars($dish['MenuImg']); ?>" alt="<?php echo htmlspecialchars($dish['ItemName']); ?>">
                    <h3><?php echo htmlspecialchars($dish['ItemName']); ?></h3>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($dish['Categories']); ?></p>
                    <p><strong>Price:</strong> R<?php echo htmlspecialchars($dish['Price']); ?></p>
                    <p><?php echo htmlspecialchars($dish['Description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No dishes available for this restaurant.</p>
    <?php endif; ?>
</div>

<?php
$stmt->close();
$stmt_reviews->close();
$stmt_menu->close();
$conn->close();
?>

<script>
    const navbar = document.querySelector('header');
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        navbar.style.top = scrollTop === 0 ? "0" : "-100px";
    });
</script>

</body>
</html>
