<?php

include("dataClass.php");


$request=$_GET['reqid'];
$book=$_GET['book'];
$userselect= $_GET['userselect'];
$getdate= date("d/m/Y");
$days= $_GET['days'];

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setConnection();
$obj->issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$request);
?>
