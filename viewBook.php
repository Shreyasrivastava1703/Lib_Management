<?php
//detail of one book only
include("dataClass.php");

$viewid=$_GET['viewid'];

$u=new data;
$u->setconnection();
$u->getbookdetail($viewid);
?>