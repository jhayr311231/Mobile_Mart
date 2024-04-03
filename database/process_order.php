<?php
// process_order.php

// Assuming you have established a database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $cardName = $_POST["cardname"];
    $cardNumber = $_POST["cardnumber"];
    $expMonth = $_POST["expmonth"];
    $expYear = $_POST["expyear"];
    $cvv = $_POST["cvv"];
    
    // Calculate total amount (you may want to retrieve this dynamically from your form)
    $totalAmount = 30.00;

    // Insert order information into orders table
    $insertOrderQuery = "INSERT INTO orders (user_id, total_amount) VALUES (1, :totalAmount)";
    $insertOrderStmt = $pdo->prepare($insertOrderQuery);
    $insertOrderStmt->bindParam(":totalAmount", $totalAmount);
    $insertOrderStmt->execute();

    // Retrieve the ID of the inserted order
    $orderId = $pdo->lastInsertId();

    // Insert order items into order_items table (assuming you have product IDs and quantities)
    $insertOrderItemsQuery = "INSERT INTO order_items (order_id, product_id, quantity, subtotal) VALUES (?, ?, ?, ?)";
    $insertOrderItemsStmt = $pdo->prepare($insertOrderItemsQuery);

    // Sample product IDs and quantities (you should retrieve these dynamically from your form)
    $productIds = [1, 2, 3, 4];
    $quantities = [1, 1, 1, 1];

    // Loop through products and insert into order_items
    for ($i = 0; $i < count($productIds); $i++) {
        $productId = $productIds[$i];
        $quantity = $quantities[$i];

        // Retrieve product price from products table
        $getProductPriceQuery = "SELECT price FROM products WHERE id = ?";
        $getProductPriceStmt = $pdo->prepare($getProductPriceQuery);
        $getProductPriceStmt->execute([$productId]);
        $productPrice = $getProductPriceStmt->fetchColumn();

        // Calculate subtotal
        $subtotal = $productPrice * $quantity;

        // Insert into order_items
        $insertOrderItemsStmt->execute([$orderId, $productId, $quantity, $subtotal]);
    }

    // Perform other necessary actions (e.g., sending confirmation email)

    echo "Order placed successfully!";
} else {
    echo "Invalid request method.";
}
?>
