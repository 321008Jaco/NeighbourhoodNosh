<?php
session_start();
include '../Config.php';

// Check if ResID is provided in the URL
if (isset($_GET['ResID'])) {
    $resID = $_GET['ResID'];

    // Fetch restaurant details based on ResID
    $sql = "SELECT * FROM restaurants WHERE ResID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $resID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $restaurant = $result->fetch_assoc();
    } else {
        echo "<p class='error-message'>Restaurant not found.</p>";
        exit;
    }
} else {
    echo "<p class='error-message'>Invalid request. No Restaurant ID provided.</p>";
    exit;
}

// Handle update submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_restaurant'])) {
    $resName = $_POST['ResName'];
    $resLocation = $_POST['ResLocation'];
    $contactInfo = $_POST['ContactInfo'];
    $description = $_POST['Description'];
    $restaurantImg = $_POST['RestaurantImg'];

    $updateSql = "UPDATE restaurants SET ResName = ?, ResLocation = ?, ContactInfo = ?, Description = ?, RestaurantImg = ? WHERE ResID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sssssi", $resName, $resLocation, $contactInfo, $description, $restaurantImg, $resID);

    if ($updateStmt->execute()) {
        echo "<p class='success-message'>Restaurant updated successfully!</p>";
        // Refresh restaurant data after update
        $restaurant = ['ResName' => $resName, 'ResLocation' => $resLocation, 'ContactInfo' => $contactInfo, 'Description' => $description, 'RestaurantImg' => $restaurantImg];
    } else {
        echo "<p class='error-message'>Error updating restaurant: " . $updateStmt->error . "</p>";
    }
}

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_restaurant'])) {
    $deleteSql = "DELETE FROM restaurants WHERE ResID = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $resID);

    if ($deleteStmt->execute()) {
        echo "<p class='success-message'>Restaurant deleted successfully!</p>";
        header("Location: ../Index.php"); // Redirect after deletion
        exit;
    } else {
        echo "<p class='error-message'>Error deleting restaurant: " . $deleteStmt->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Restaurant - LocalBite</title>
    <link rel="stylesheet" href="ResEdit.css">
</head>
<body>
<div class="edit-container">
    <h1>Edit Restaurant</h1>
    <form action="ResEdit.php?ResID=<?php echo $resID; ?>" method="POST" class="edit-form">
        <label for="ResName">Restaurant Name:</label>
        <input type="text" name="ResName" id="ResName" value="<?php echo htmlspecialchars($restaurant['ResName']); ?>" required>

        <label for="ResLocation">Location:</label>
        <input type="text" name="ResLocation" id="ResLocation" value="<?php echo htmlspecialchars($restaurant['ResLocation']); ?>" required>

        <label for="ContactInfo">Contact Info:</label>
        <input type="text" name="ContactInfo" id="ContactInfo" value="<?php echo htmlspecialchars($restaurant['ContactInfo']); ?>" required>

        <label for="Description">Description:</label>
        <textarea name="Description" id="Description" rows="3" required><?php echo htmlspecialchars($restaurant['Description']); ?></textarea>

        <label for="RestaurantImg">Image URL:</label>
        <input type="text" name="RestaurantImg" id="RestaurantImg" value="<?php echo htmlspecialchars($restaurant['RestaurantImg']); ?>" required>

        <button type="submit" name="update_restaurant" class="update-btn">Update Restaurant</button>
    </form>

    <button class="delete-btn" onclick="showDeleteModal()">Delete Restaurant</button>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($restaurant['ResName']); ?></strong>?</p>
            <form action="ResEdit.php?ResID=<?php echo $resID; ?>" method="POST">
                <button type="submit" name="delete_restaurant" class="confirm-delete-btn">Yes</button>
                <button type="button" class="cancel-btn" onclick="hideDeleteModal()">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
function showDeleteModal() {
    document.getElementById("deleteModal").style.display = "block";
}

function hideDeleteModal() {
    document.getElementById("deleteModal").style.display = "none";
}
</script>

</body>
</html>
