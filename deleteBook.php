<?php
include("data_class.php");

$deletebookid=$_GET['deletebookid'];


$obj=new data();
$obj->setConnection();
$obj->deletebook($deletebookid);
?>