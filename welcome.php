<?php
session_start();
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    echo 'Welcome, ' . $username . '!';
} else {
    echo 'Not logged in.';
}
