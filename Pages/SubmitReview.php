<?php
session_start();
include '../Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $restaurantID = $_POST['RestaurantID'];
    $rating = $_POST['Rating'];
    $comment = $_POST['Comment'];
    $userID = $_SESSION['userID'];  // Assuming you store user ID in session

    $sql = "INSERT INTO review (RestaurantID, UserID, Rating, Comment, Timestamp) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $restaurantID, $userID, $rating, $comment);

    if ($stmt->execute()) {
        header("Location: RestView.php?RestaurantID=$restaurantID");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
