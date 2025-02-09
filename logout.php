<?php
include("dataClas.php");
session_unset();//remove all session variables
session_destroy();//destroy the session
header("location:index.php");
exit();
?>
