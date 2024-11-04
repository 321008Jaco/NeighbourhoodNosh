<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = (int)$_POST['index'];
    $quantity = (int)$_POST['quantity'];

    // Update quantity in session
    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;

        // Calculate item total and grand total
        $itemTotal = $_SESSION['cart'][$index]['price'] * $quantity;
        $grandTotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $_SESSION['cart']));

        // Return JSON response
        echo json_encode([
            'itemTotal' => $itemTotal,
            'grandTotal' => $grandTotal
        ]);
    }
}
