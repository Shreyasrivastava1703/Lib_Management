<?php

include("dataClass.php");

$book=$_POST['book'];
$user= $_POST['user'];
$getdate= date("d/m/Y");
$days= $_POST['days'];

$returnDate=date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->issuebook($book,$user,$days,$getdate,$returnDate);