<?php
session_start();
include '../Config.php';

// Check if a removal request has been made
if (isset($_GET['remove_id'])) {
    $removeID = $_GET['remove_id'];

    // SQL to delete item by MenuID
    $deleteSql = "DELETE FROM restaurantsmenu WHERE MenuID = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $removeID);
    
    if ($stmt->execute()) {
        echo "<p class='success-message'>Item removed successfully!</p>";
    } else {
        echo "<p class='error-message'>Error removing item: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

// Fetch item details for editing
if (isset($_GET['MenuID'])) {
    $menuID = $_GET['MenuID'];
    $sql = "SELECT * FROM restaurantsmenu WHERE MenuID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menuID);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Dish - LocalBite</title>
    <link rel="stylesheet" href="DishEdit.css">
</head>
<body>

<div class="edit-container">
    <h1>Edit Dish</h1>

    <?php if (isset($item)): ?>
        <form action="DishEdit.php?MenuID=<?php echo $menuID; ?>" method="POST">
            <label for="ItemName">Dish Name:</label>
            <input type="text" name="ItemName" id="ItemName" value="<?php echo htmlspecialchars($item['ItemName']); ?>" required>

            <label for="Description">Description:</label>
            <textarea name="Description" id="Description" rows="3" required><?php echo htmlspecialchars($item['Description']); ?></textarea>

            <label for="Price">Price:</label>
            <input type="text" name="Price" id="Price" value="<?php echo htmlspecialchars($item['Price']); ?>" required>

            <label for="MenuImg">Image URL:</label>
            <input type="text" name="MenuImg" id="MenuImg" value="<?php echo htmlspecialchars($item['MenuImg']); ?>" required>

            <button type="submit" name="update_dish" class="submit-btn">Update Dish</button>
            <button type="button" class="remove-btn" onclick="showRemoveModal('<?php echo htmlspecialchars($item['ItemName']); ?>', <?php echo $item['MenuID']; ?>)">Remove</button>
        </form>
    <?php else: ?>
        <p>Dish not found.</p>
    <?php endif; ?>
</div>

<!-- Modal Structure -->
<div id="removeModal" class="modal">
    <div class="modal-content">
        <p id="modal-text">Are you sure you want to remove this item?</p>
        <div class="modal-buttons">
            <button id="confirmRemove" class="modal-confirm-btn">Yes</button>
            <button onclick="closeModal()" class="modal-cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<script>
    let currentMenuID;

    function showRemoveModal(itemName, menuID) {
        document.getElementById("modal-text").innerText = `Are you sure you want to remove ${itemName}?`;
        currentMenuID = menuID;
        document.getElementById("removeModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("removeModal").style.display = "none";
    }

    document.getElementById("confirmRemove").addEventListener("click", function() {
        window.location.href = `DishEdit.php?remove_id=${currentMenuID}`;
    });
</script>

</body>
</html>
