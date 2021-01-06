



  
   <?php

session_start();

$con=new mysqli("localhost","root","","gproject");
$st=$con->prepare
     ("delete from bookborrow where borrowID=?");

$st->bind_param("i", $_GET['borrowID']);
$st->execute();

header("Location:index.php");


