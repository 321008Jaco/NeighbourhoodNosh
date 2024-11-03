<?php
$conn = new mysqli("localhost", "root", "", "localbite");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$menuID = $_GET['MenuID'];
$sql = "SELECT * FROM restaurantsmenu WHERE MenuID = $menuID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
} else {
    echo "Item not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - <?php echo $item['ItemName']; ?></title>
    <link rel="stylesheet" href="Order.css">
</head>
<body>

<div class="order-container">
    <div class="order-image">
        <img src="<?php echo $item['MenuImg']; ?>" alt="<?php echo $item['ItemName']; ?>">
    </div>
    <div class="order-details">
        <h1><?php echo $item['ItemName']; ?></h1>
        <p class="price">R <?php echo number_format($item['Price'], 2); ?></p>
        <p class="description"><?php echo $item['Description']; ?></p>

        <div class="options">
            <h3>Choose your spice level</h3>
            <label>
                <input type="radio" name="spice-level" value="Mild"> Mild
            </label>
            <label>
                <input type="radio" name="spice-level" value="Medium"> Medium
            </label>
            <label>
                <input type="radio" name="spice-level" value="Hot"> Hot
            </label>
        </div>

        <div class="special-instructions">
            <h3>Special Instructions</h3>
            <textarea placeholder="Add any notes..."></textarea>
        </div>

        <div class="quantity-section">
            <label for="quantity">Quantity</label>
            <select id="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <button class="add-to-order-btn">Add to Order • R <?php echo number_format($item['Price'], 2); ?></button>
    </div>
</div>

</body>
</html>
