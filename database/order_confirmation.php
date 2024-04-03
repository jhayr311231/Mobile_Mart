<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="CSS.products\style.css"> <!-- Add the path to your styles.css -->
</head>
<body>
    <h2>Order Confirmation</h2>
    <?php include 'process_order.php'; ?>
    
    <form id="orderConfirmationForm" action="process_order.php" method="post">
        <!-- You can customize the confirmation message as needed -->
        <p>Thank you for your order!</p>

    <!-- Add any additional form fields you need to pass to the PHP script -->
        <!-- For example, you may want to include hidden input fields with order details -->

        <input type="hidden" name="firstname" value="<?php echo htmlspecialchars($fullName); ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <!-- Add more hidden fields as needed -->


        <!-- Submit the form to process the order -->
        <input type="submit" value="Complete Order">
    </form>

    <p><a href="index.html">Back to Home</a></p> <!-- Link back to your homepage or another relevant page -->
</body>
</html>
