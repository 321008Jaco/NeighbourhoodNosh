<?php
include 'Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $usertype = 'user'; // Default user type

    // Array to store error messages
    $errors = [];

    // Validate form data
    if (empty($fullname)) {
        $errors['fullname'] = 'Full name is required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    if (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters long.';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match!';
    }

    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (FullName, Email, Password, UserType) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $usertype);

        // Execute and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Redirecting to login page...');</script>";
            header("Location: Login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="SignUp.css">
</head>
<body>

<div class="container">
    <!-- Image Section -->
    <div class="image-section">
        <a href="Login.php">
            <p>LOG IN</p>
        </a>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <h5>SIGN</br>UP</h5>
        <form method="POST" action="SignUp.php" id="signup-form">
            <label for="name">FULL NAME</label>
            <input type="text" id="name" name="name" placeholder="Your full name goes here" value="<?= htmlspecialchars($fullname ?? '') ?>" required>
            <?php if (!empty($errors['fullname'])): ?>
                <p class="error-message"><?= $errors['fullname'] ?></p>
            <?php endif; ?>

            <label for="email">E-MAIL</label>
            <input type="email" id="email" name="email" placeholder="Your email goes here" value="<?= htmlspecialchars($email ?? '') ?>" required>
            <?php if (!empty($errors['email'])): ?>
                <p class="error-message"><?= $errors['email'] ?></p>
            <?php endif; ?>

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="Your password goes here" required minlength="6">
            <?php if (!empty($errors['password'])): ?>
                <p class="error-message"><?= $errors['password'] ?></p>
            <?php endif; ?>

            <label for="confirm-password">CONFIRM PASSWORD</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Your password goes here" required>
            <?php if (!empty($errors['confirm_password'])): ?>
                <p class="error-message"><?= $errors['confirm_password'] ?></p>
            <?php endif; ?>

            <div class="terms">
                <input type="checkbox" id="agree" required>
                <label for="agree">I agree to the terms of service</label>
            </div>
            
            <div class="notifications">
                <input type="checkbox" id="notify">
                <label for="notify">Send notifications on latest deals</label>
            </div> 

            <button type="submit">SIGN UP</button>
        </form>
    </div>
</div>

</body>
</html>
