<?php

include"dataClass.php";

$loginEmail = $_GET['email'];
$loginPassword = $_GET['password'];

if ($loginEmail == null || $loginPassword == null) {
    $emailMsg = $loginEmail == null ? "Email is required" : "";
    $passMsg = $loginPassword == null ? "Password is required" : "";

    header("Location: login.php?emailMsg=$emailMsg&passMsg=$passMsg");
    exit();
} else {
    $obj = new data();

    $isAdmin = $obj->check("admin", $loginEmail, $loginPassword);
    if ($isAdmin !== false) {
        $_SESSION["adminId"]=$isAdmin;
        header("Location: adminDashboard.php?email=$loginEmail");
        exit();
    }

    $isUser = $obj->check("userdata", $loginEmail, $loginPassword);
    if ($isUser !== false) {
        $_SESSION["userId"] = $isUser;

        header("Location: userDashboard.php?email=$loginEmail");
        exit();
    }

    $errorMsg = "Invalid email or password";
    header("Location: login.php?errorMsg=$errorMsg");
    exit();
}
?>
