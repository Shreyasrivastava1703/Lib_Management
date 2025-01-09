<?php

include("dataClass.php");

// Get login credentials from the URL parameters
$loginEmail = $_GET['email'];
$loginPassword = $_GET['password'];

// Check if email or password is empty
if ($loginEmail == null || $loginPassword == null) {
    $emailMsg = $loginEmail == null ? "Email is required" : "";
    $passMsg = $loginPassword == null ? "Password is required" : "";

    // Redirect back to login page with error messages
    header("Location: login.php?emailMsg=$emailMsg&passMsg=$passMsg");
    exit();
} else {
    // Initialize the database connection
    $obj = new data();
    $obj->setconnection();

    // Check in the admin table
    $isAdmin = $obj->check("admin", $loginEmail, $loginPassword);
    if ($isAdmin) {
        // Redirect to admin dashboard
        header("Location: adminDashboard.php?email=$loginEmail");
        exit();
    }

    // Check in the user table
    $isUser = $obj->check("userdata", $loginEmail, $loginPassword);
    if ($isUser) {
        // Redirect to user dashboard
        header("Location: userDashboard.php?email=$loginEmail");
        exit();
    }

    // Invalid credentials
    $errorMsg = "Invalid email or password";
    header("Location: login.php?errorMsg=$errorMsg");
    exit();
}
?>
