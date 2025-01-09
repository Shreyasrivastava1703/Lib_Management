<?php
include("dataClass.php");

$userid=$_GET['userId'];
$bookid=$_GET['bookId'];



$obj=new data();
$obj->setConnection();
$obj->requestbook($userid,$bookid);

?>