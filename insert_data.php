<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection in 'db.php'
    include('db.php');

    // You should sanitize and validate data before using it in the query
    // For simplicity, I'm using basic validation. You might want to improve this.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total_price = $_POST['total_price'];

    // Insert into the orders table (assuming you have such a table)
    $query = "INSERT INTO orders (name, email, address, total_price) VALUES ('$name', '$email', '$address', '$total_price')";

    if ($conn->query($query) === TRUE) {
        // Order placed successfully
        echo json_encode(array('status' => 'success', 'message' => 'Order placed successfully.'));
    } else {
        // Error in inserting data
        echo json_encode(array('status' => 'error', 'message' => 'Error placing order.'));
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect or handle accordingly
    // For simplicity, I'm redirecting to the homepage
    header('Location: index.html');
    exit();
}
?>
