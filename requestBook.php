<?php

// requesdt a book 
include("dataClass.php");

$userid=$_GET['userId'];
$bookid=$_GET['bookId'];



$obj=new data();
$obj->requestbook($userid,$bookid);
?>