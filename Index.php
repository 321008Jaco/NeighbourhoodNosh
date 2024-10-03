<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalBite - Fresh, Local Food Delivered</title>
    <link rel="stylesheet" href="Index.css">
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">
                <h1>LocalBite</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="./Pages/About.php">About</a></li>
                <li><a href="#">Providers</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Order Now</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section with Parallax -->
    <section class="hero parallax" id="hero">
        <div class="hero-content">
            <h2>Fresh & Local</h2>
            <p>Discover delicious meals from small, local food providers. Easy to order, supporting your community.</p>
            <a href="#" class="cta-button">Explore Now</a>
        </div>
    </section>

    <!-- Intro Section with Scroll Animation -->
    <section class="intro" id="intro">
        <h3>Why Choose LocalBite?</h3>
        <p>We bring you fresh, local meals prepared with love by small food providers in your area.</p>
    </section>

    <!-- Features Section with Hover Effect -->
    <section class="features">
        <div class="feature-box" id="box1">
            <h4>Support Local</h4>
            <p>Every order helps small food providers grow and thrive.</p>
        </div>
        <div class="feature-box" id="box2">
            <h4>Fresh Ingredients</h4>
            <p>Sourced locally and prepared with the highest quality ingredients.</p>
        </div>
        <div class="feature-box" id="box3">
            <h4>Simple Ordering</h4>
            <p>Easy to use, making ordering local food a breeze.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 LocalBite. All Rights Reserved.</p>
    </footer>

    <script>
        // Scroll-triggered animations for intro and features sections
        window.addEventListener('scroll', function() {
            const introSection = document.querySelector('.intro');
            const featureBoxes = document.querySelectorAll('.feature-box');
            
            if (window.scrollY > introSection.offsetTop - window.innerHeight / 1.5) {
                introSection.classList.add('show');
            }
            
            featureBoxes.forEach(box => {
                if (window.scrollY > box.offsetTop - window.innerHeight / 1.5) {
                    box.classList.add('show');
                }
            });
        });
    </script>
</body>
</html>
