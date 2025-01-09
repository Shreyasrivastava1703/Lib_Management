<?php
include("dataClass.php");

// Get user inputs from the form
$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];
$confirmPassword = $_GET['confirm_password'];
$type = $_GET['user_type'];


// Check if password and confirm password match
if ($password !== $confirmPassword) {
    $errorMsg = "Passwords do not match!";
    header("Location: signup.php?errorMsg=$errorMsg");
    exit();
}

$obj = new data();
$obj->setConnection();

// Call addUser method to insert the new user
$msg = $obj->addnewuser($name, $email, $password, $type);

// Show the result message (success or error)
echo $msg;
?>
