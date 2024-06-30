<?php
// logout.php

// Include necessary classes and header
include_once('includes/header.php');
include_once('classes/User.php');

// Initialize User class
$user = new User();

// Logout user
$user->logout();

// Redirect to index.php after logout
header('Location: index.php');
exit;
?>
