<?php
session_start();

// Database connection
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $item['ItemName']; ?> - LocalBite</title>
    <link rel="stylesheet" href="Order.css">
</head>
<body>

<a href="javascript:history.back()" class="back-button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path d="M15 19l-7-7 7-7" stroke="#00403D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    </svg>
    Back
</a>

<div class="order-container">
    <div class="order-image">
        <img src="<?php echo $item['MenuImg']; ?>" alt="<?php echo $item['ItemName']; ?>">
    </div>

    <div class="order-details">
        <h1><?php echo $item['ItemName']; ?></h1>
        <div class="price" id="price">R <?php echo $item['Price']; ?></div>
        <p><?php echo $item['Description']; ?></p>

        <form action="Cart.php" method="POST">
    <input type="hidden" name="menu_id" value="<?php echo $item['MenuID']; ?>">
    <input type="hidden" name="item_name" value="<?php echo $item['ItemName']; ?>">
    <input type="hidden" name="price" value="<?php echo $item['Price']; ?>">
    <input type="hidden" name="image_url" value="<?php echo $item['MenuImg']; ?>"> <!-- Make sure this is included -->
    
    <label>Choose your spice level</label>
    <input type="radio" name="spice_level" value="Mild"> Mild
    <input type="radio" name="spice_level" value="Medium"> Medium
    <input type="radio" name="spice_level" value="Hot"> Hot

    <label>Special Instructions</label>
    <textarea name="instructions"></textarea>

    <label for="quantity">Quantity</label>
    <select id="quantity" name="quantity">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
    </select>

    <button type="submit" class="add-to-order-btn">Add to Cart</button>
</form>
    </div>
</div>

<script>
    function updatePrice(basePrice) {
        const quantity = document.getElementById("quantity").value;
        const totalPrice = basePrice * quantity;
        document.getElementById("totalPrice").innerText = totalPrice.toFixed(2);
        document.getElementById("hiddenPrice").value = totalPrice;
    }
</script>

</body>
</html>
