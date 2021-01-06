<?php

session_start();

$con=new mysqli("localhost","root","","gproject");
$st=$con->prepare
     ("delete from messenger where messageID=?");

$st->bind_param("i", $_GET["id"]);
$st->execute();

header("Location:view_message.php");