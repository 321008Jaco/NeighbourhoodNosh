<?php
// Include the database configuration file
include 'config.php';

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to check if the email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Password matches, set session variables and redirect to the index page
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['FullName'] = $row['FullName'];
            $_SESSION['UserType'] = $row['UserType'];

            // Redirect to the index page after login
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email address!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>

<div class="container">
    <!-- Image Section -->
    <div class="image-section">
        <a href="SignUp.php">
            <p>SIGN UP</p>
        </a>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <h5>LOG</br>IN</h5>
        <form method="POST" action="Login.php" id="login-form">
            <label for="email">E-MAIL</label>
            <input type="email" id="email" name="email" placeholder="Your email goes here" required>

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="Your password goes here" required minlength="6">

            <div class="terms">
                <input type="checkbox" id="agree">
                <label for="agree">Remember Me</label>
            </div>

            <button type="submit">LOG IN</button>
            <p id="error-message"></p>
            <p><a href="#">Forgot Password?</a></p>
        </form>
    </div>
</div>

</body>
</html>
