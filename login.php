<?php
// auth.php

session_start();

// Assume you have a login mechanism that sets the user details in session
// Replace the following with your actual login logic
$loggedIn = false; // Replace with the actual login check logic
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