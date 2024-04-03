<?php
// auth.php

session_start();

// Assume you have a login mechanism that sets the user details in session
// Replace the following with your actual login logic
$loggedIn = true; // Replace with the actual login check logic
$isAdmin = false; // Replace with the actual admin check logic

if ($loggedIn) {
    // User is logged in
    if ($isAdmin) {
        // Admin user
        $_SESSION['user'] = ['username' => 'admin'];
        // Add more admin details as needed
    } else {
        // Regular user
        $_SESSION['user'] = ['username' => 'user'];
        // Add more user details as needed
    }
} else {
    // User is not logged in, clear user details from the session
    unset($_SESSION['user']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>

<body>
    <?php
    // Now, you can check if the user is logged in and display a welcome message
    if ($loggedIn) {
        echo 'Welcome, ' . $_SESSION['user']['username'] . '!';
    } else {
        echo 'Your login logic here...';
    }
    ?>
</body>

</html>
