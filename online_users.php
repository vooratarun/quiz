
<?php
session_start();
@include "db.php";
$onuser=$_SESSION['quiz_login_id'];
if(isset($_SESSION['oflag']))
	{
	if($_SESSION['oflag']=='1')
		{
			mysql_query("INSERT INTO `sdcac_database`.`quiz_online` (`id`, `name`) VALUES ('$onuser', '')");
		}

	}

$p=mysql_query("SELECT * FROM quiz_online");
while($ro=mysql_fetch_array($p))
	{
		echo "<span style='padding-left:20%;'><font color=yellow>".$ro['id']."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/active.png' style='width:15px;height;10px;'/></span><br>";
	}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>
</head>
<body>


