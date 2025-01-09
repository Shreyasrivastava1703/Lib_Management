<?php
include("dataClass.php");
$deleteUser=$_GET['userid'];

$obj=new data;
$obj->setConnection();
$obj->deleteUserData($deleteUser);

?>