<?php

session_start();

$con=new mysqli("localhost","root","","gproject");
$st=$con->prepare
     ("delete from periadical where periodicalID=?");

$st->bind_param("i", $_GET["id"]);
$st->execute();

header("Location:viewPeriodical.php");
