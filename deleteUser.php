<?php
include("dataClass.php");
$deleteUser=$_GET['userid'];

$obj=new data;
$obj->deleteUserData($deleteUser);

?>