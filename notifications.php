<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>
<script>
	
</script>
</head>
<body><table>
<?php
@include "db.php";
$gogo=mysql_query("SELECT * FROM quiz_notifications WHERE postto='notificationarea'") or die(mysql_error());

if(mysql_num_rows($gogo)>0)
	{
	while($row=mysql_fetch_array($gogo))
		{
		echo "<marquee direction='up' scrollAmount=1  style='color:WHITE;padding-left:5%;' onmouseout='this.start()' onmouseover='this.stop()'>
".ucfirst($row['msgtitle'])."&nbsp;&nbsp;:<sub><font color=Yellow>".$row['poby']."</font></sub>";
		}
	}

?>


</marquee>


</body>
</html>
