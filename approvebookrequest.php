<?php

include("dataClass.php");


$request=$_GET['reqid'];
$bookid=$_GET['book'];
$userid= $_GET['userselect'];
$getdate= date("d/m/Y");
$days= $_GET['days'];

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->issuebookapprove($bookid,$userid,$days,$getdate,$returnDate,$request);
?>
