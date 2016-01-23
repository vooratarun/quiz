<?php
session_start();
@include "db.php";
$id=$_SESSION['quiz_login_id'];
mysql_query("DELETE FROM `quiz_online` WHERE id='$id'");

?>
