<?php

session_start();

$con=new mysqli("localhost","root","","gproject");
$st=$con->prepare
     ("delete from user where id=?");

$st->bind_param("i", $_GET["id"]);
$st->execute();

header("Location:viewUser.php");