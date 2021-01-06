<?php

session_start();

$con=new mysqli("localhost","root","","gproject");
$st=$con->prepare
     ("delete from book where bookID=?");

$st->bind_param("i", $_GET["id"]);
$st->execute();

header("Location:viewbook.php");