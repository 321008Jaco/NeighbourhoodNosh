<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LocalBite</title>
    <link rel="stylesheet" href="Contact.css">
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <div class="logo">
                <h1>LocalBite</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="providers.php">Providers</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../Pages/Order.php">Order Now</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-content">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Fill out the form below and we will get back to you as soon as possible.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="form-container">
            <h3>Get in Touch</h3>
            <form action="contact.php" method="POST">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Your Full Name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 LocalBite. All Rights Reserved.</p>
    </footer>

</body>
</html>
