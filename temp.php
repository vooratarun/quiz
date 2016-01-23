<?php
session_start();
$_SESSION['imagesno']=$_GET['noq'];
echo $_SESSION['imagesno'];

?>
