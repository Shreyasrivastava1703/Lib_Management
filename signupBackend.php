<?php
include("dataClass.php");


$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];
$confirmPassword = $_GET['confirm_password'];
$type = $_GET['user_type'];



if ($password !== $confirmPassword) {
    $errorMsg = "Passwords do not match!";
    header("Location: signup.php?errorMsg=$errorMsg");
    exit();
}

$obj = new data();
$obj->setConnection();


$msg = $obj->addnewuser($name, $email, $password, $type);

echo $msg;
?>
