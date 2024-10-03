<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - LocalBite</title>
    <link rel="stylesheet" href="VendorRegistration.css">
</head>
<body>

    <header>
        <nav>
            <div class="logo">
                <h1>LocalBite</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="order.php">Order Now</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="vendor_registration.php">Vendor Registration</a></li>
            </ul>
        </nav>
    </header>

    <section class="vendor-registration-form">
        <div class="form-container">
            <h3>Register Your Business</h3>
            <form action="vendor_registration.php" method="POST" enctype="multipart/form-data">
                <label for="vendor-name">Business Name</label>
                <input type="text" id="vendor-name" name="vendor_name" placeholder="Business Name" required>

                <label for="vendor-email">Business Email</label>
                <input type="email" id="vendor-email" name="vendor_email" placeholder="Business Email" required>

                <label for="vendor-menu">Upload Your Menu</label>
                <input type="file" id="vendor-menu" name="vendor_menu" required>

                <label for="vendor-cuisine">Cuisine Type</label>
                <select id="vendor-cuisine" name="vendor_cuisine" required>
                    <option value="burgers">Burgers</option>
                    <option value="sushi">Sushi</option>
                    <option value="pizza">Pizza</option>
                    <option value="mexican">Mexican</option>
                    <option value="vegetarian">Vegetarian</option>
                </select>

                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 LocalBite. All Rights Reserved.</p>
    </footer>

</body>
</html>
