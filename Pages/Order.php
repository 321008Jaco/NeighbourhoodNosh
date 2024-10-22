<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now - LocalBite</title>
    <link rel="stylesheet" href="Order.css">
    <script>
        // JavaScript for filtering/searching the restaurant list
        function searchRestaurants() {
            let input = document.getElementById('search-input').value.toLowerCase();
            let restaurantCards = document.getElementsByClassName('restaurant-card');

            for (let i = 0; i < restaurantCards.length; i++) {
                let card = restaurantCards[i];
                let restaurantName = card.getElementsByTagName('h4')[0].innerText.toLowerCase();
                if (restaurantName.includes(input)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            }
        }
    </script>
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">
                <h1>LocalBite</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="providers.php">Providers</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="order.php">Order Now</a></li>
            </ul>
        </nav>
    </header>

    <!-- Order Now Hero Section -->
    <section class="order-hero">
        <div class="order-content">
            <h2>Order Now</h2>
            <p>Find local fast food or restaurants in your area and place your order!</p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="search-section">
        <input type="text" id="search-input" placeholder="Search for restaurants..." onkeyup="searchRestaurants()">
    </section>

    <section class="filter-section">
    <select id="cuisine-filter" onchange="filterByCuisine()">
        <option value="all">All Cuisines</option>
        <option value="burgers">Burgers</option>
        <option value="sushi">Sushi</option>
        <option value="pizza">Pizza</option>
        <option value="mexican">Mexican</option>
        <option value="vegetarian">Vegetarian</option>
    </select>
</section>

<!-- JavaScript for Filtering by Cuisine -->
<script>
    function filterByCuisine() {
        const filter = document.getElementById('cuisine-filter').value;
        const restaurantCards = document.getElementsByClassName('restaurant-card');
        for (let i = 0; i < restaurantCards.length; i++) {
            const card = restaurantCards[i];
            const cuisine = card.getAttribute('data-cuisine');
            card.style.display = (filter === 'all' || filter === cuisine) ? 'block' : 'none';
        }
    }
</script>


    <!-- Restaurant Listings -->
    <section class="restaurant-list">
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300x200" alt="Restaurant 1">
            <h4>Joe's Burgers</h4>
            <p>Classic American burgers and fries, made fresh to order.</p>
            <a href="#" class="btn">Order Now</a>
        </div>
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300x200" alt="Restaurant 2">
            <h4>Sushi Delight</h4>
            <p>Fresh sushi rolls and Japanese cuisine delivered to your door.</p>
            <a href="#" class="btn">Order Now</a>
        </div>
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300x200" alt="Restaurant 3">
            <h4>Pizza Palace</h4>
            <p>Delicious hand-tossed pizzas with a variety of toppings.</p>
            <a href="#" class="btn">Order Now</a>
        </div>
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300x200" alt="Restaurant 4">
            <h4>Taco Fiesta</h4>
            <p>Authentic Mexican tacos, burritos, and more.</p>
            <a href="#" class="btn">Order Now</a>
        </div>
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300x200" alt="Restaurant 5">
            <h4>Green Bowl</h4>
            <p>Healthy salads, smoothie bowls, and vegetarian options.</p>
            <a href="#" class="btn">Order Now</a>
        </div>
        <!-- Add more restaurant cards as needed -->
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 LocalBite. All Rights Reserved.</p>
    </footer>

</body>
</html>
