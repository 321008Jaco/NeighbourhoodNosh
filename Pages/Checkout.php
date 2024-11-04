<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalAmount = array_reduce($cart, function($total, $item) {
    return $total + ($item['price'] * $item['quantity']);
}, 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - LocalBite</title>
    <link rel="stylesheet" href="Checkout.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="checkout-container">
    <h1>Payment Details</h1>
    <p>Complete your purchase by providing your payment details.</p>
    
    <!-- Payment Method Section -->
    <section class="payment-method">
        <h2>Payment Method</h2>
        <div class="payment-options">
            <div class="card active">Mastercard **5544</div>
            <div class="card">Visa **6677</div>
            <div class="card">Mastercard **1321</div>
            <button class="add-card-btn">+ New Card</button>
        </div>
        <p class="extra-discount">Get an extra -25% discount <a href="#">Learn more</a></p>
    </section>
    
    <!-- Method of Receipt Section -->
    <section class="method-of-receipt">
        <h2>Method of Receipt</h2>
        <div class="receipt-options">
            <div class="option">Courier delivery<br><span class="subtext">John Vorster Drive & Nellmapius Drive, Southdowns, Irene, Centurion, 0062, South Africa</span></div>
            <div class="option">Contact Person: The Open Window Institute<br><span class="subtext">info@openwindow.co.za</span></div>
            <div class="option">Comment to the courier<br><input type="text" placeholder="Don't ring the doorbell" class="courier-comment"></div>
        </div>
    </section>
    
    <!-- Order Summary Section -->
    <section class="order-summary">
        <h2>Total</h2>
        <div class="summary-item">
            <span>Items</span>
            <span><?php echo count($cart); ?></span>
        </div>
        <div class="summary-item">
            <span>Discount</span>
            <span>-R3.50</span>
        </div>
        <div class="summary-item">
            <span>Shipping Cost</span>
            <span>Free</span>
        </div>
        <div class="grand-total">
            <span>Total</span>
            <span>R<?php echo number_format($totalAmount, 2); ?></span>
        </div>
        <button class="checkout-btn" onclick="processPayment()">Pay R<?php echo number_format($totalAmount, 2); ?></button>
    </section>
</div>

<!-- Modal for loading and success message -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <div id="loadingIcon" class="loader"></div>
        <p id="successMessage" style="display: none;">Success! Your order is being processed.</p>
    </div>
</div>

<script>
function processPayment() {
    // Show the modal and loading icon
    document.getElementById('paymentModal').style.display = 'block';
    document.getElementById('loadingIcon').style.display = 'block';
    document.getElementById('successMessage').style.display = 'none';

    // Simulate a 2-second delay
    setTimeout(function() {
        document.getElementById('loadingIcon').style.display = 'none';
        document.getElementById('successMessage').style.display = 'block';
    }, 2000);
}

// Close the modal when clicked outside of the modal content
window.onclick = function(event) {
    const modal = document.getElementById('paymentModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};
</script>

</body>
</html>
