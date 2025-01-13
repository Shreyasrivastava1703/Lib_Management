<?php

include("dataClass.php");

$book=$_POST['book'];
$user= $_POST['user'];
$getdate= date("d/m/Y");
$days= $_POST['days'];

$returnDate=date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setConnection();
$obj = new data();
$obj->setConnection();

/*if (!$obj->connection) {
    die("Database connection failed!");
}
else{
    echo "connection done";
}*/

$obj->issuebook($book,$user,$days,$getdate,$returnDate);
?>