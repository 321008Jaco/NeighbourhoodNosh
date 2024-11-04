<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// If an item is added to the cart, store it in the session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu_id = $_POST['menu_id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $spice_level = isset($_POST['spice_level']) ? $_POST['spice_level'] : '';
    $instructions = isset($_POST['instructions']) ? $_POST['instructions'] : '';
    $image_url = $_POST['image_url'];

    // Check if item already exists in cart to update quantity
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['menu_id'] == $menu_id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item);

    // If item not found in cart, add as new entry
    if (!$found) {
        $_SESSION['cart'][] = [
            'menu_id' => $menu_id,
            'item_name' => $item_name,
            'quantity' => $quantity,
            'price' => $price,
            'spice_level' => $spice_level,
            'instructions' => $instructions,
            'image_url' => $image_url
        ];
    }
}

// Remove individual item functionality
if (isset($_GET['remove_id'])) {
    $menu_id = $_GET['remove_id'];
    // Filter out the item from the cart session array
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($menu_id) {
        return $item['menu_id'] != $menu_id;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart - LocalBite</title>
    <link rel="stylesheet" href="Cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="cart-page">
    <h1>Shopping Cart.</h1>

    <div class="cart-content">
        <div class="cart-items">
            <?php if (empty($_SESSION['cart'])): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>">
                                        <div>
                                            <h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
                                            <?php if (!empty($item['spice_level'])): ?>
                                                <p>Spice Level: <?php echo htmlspecialchars($item['spice_level']); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($item['instructions'])): ?>
                                                <p>Instructions: <?php echo htmlspecialchars($item['instructions']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="quantity-control">
                                        <button class="decrement" data-index="<?php echo $index; ?>">-</button>
                                        <input type="text" value="<?php echo htmlspecialchars($item['quantity']); ?>" readonly class="quantity-input" data-index="<?php echo $index; ?>">
                                        <button class="increment" data-index="<?php echo $index; ?>">+</button>
                                    </div>
                                </td>
                                <td>R<span class="total-price" data-index="<?php echo $index; ?>"><?php echo number_format($item['price'] * $item['quantity'], 2); ?></span></td>
                                <td>
                                <a href="Cart.php?remove_id=<?php echo $item['menu_id']; ?>" class="remove-item">X</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="cart-total">
                <a href="Cart.php?clear=true" class="clear-cart-btn">Clear Cart</a>
                    <h3>Total: R<span id="grandTotal"><?php echo number_format(array_sum(array_map(function($item) {
                        return $item['price'] * $item['quantity'];
                    }, $_SESSION['cart'])), 2); ?></span></h3>
                    <a href="Checkout.php" class="checkout-btn">Proceed to Checkout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Handle quantity increment
    $('.increment').on('click', function () {
        const index = $(this).data('index');
        updateQuantity(index, 1);
    });

    // Handle quantity decrement
    $('.decrement').on('click', function () {
        const index = $(this).data('index');
        updateQuantity(index, -1);
    });

    // Function to update quantity via AJAX
    function updateQuantity(index, change) {
        const quantityInput = $('.quantity-input[data-index="' + index + '"]');
        let quantity = parseInt(quantityInput.val());

        // Prevent quantity from going below 1
        if (quantity + change < 1) return;

        quantity += change;
        quantityInput.val(quantity);

        // Send AJAX request to update cart
        $.ajax({
            url: 'update_cart.php',
            method: 'POST',
            data: {
                index: index,
                quantity: quantity
            },
            success: function (response) {
                const data = JSON.parse(response);
                // Update total price for the item
                $('.total-price[data-index="' + index + '"]').text(data.itemTotal.toFixed(2));
                // Update grand total
                $('#grandTotal').text(data.grandTotal.toFixed(2));
            }
        });
    }
});
</script>

</body>
</html>
