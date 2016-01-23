
<?php
session_start();
if(isset($_SESSION['quiz_login_id']))
	$id=$_SESSION['quiz_login_id'];
?>

<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>
<script>
$(document).ready(function(){
$("#gotobak").click(function(){
window.location.href='index.php';
});
$("#userchartmain").load("1userchart.php");
});
</script>
</head>
<body background='images/background.png'>
<div id='backid'>
<img src='images/header.png' style='position:fixed;top:0%;left:0%;width:100%;height:100px;'>
<tr><td><font color=red>Good</font></td><td></td><td>:</td><td><font color=white>Above Cutoff Marks</td></tr>
<tr><td><font color=red>Avg</font></td><td></td><td>:</td><td><font color=white>Eqal to Cufoff Marks</td></tr>
<tr><td><font color=red>Poor</font></td><td></td><td>:</td><td><font color=white>Below Cutoff Marks</td></tr>



</table>
</td>
</tr>
</table>

<img src='images/note.png' style='cursor:pointer;position:fixed;top:1%;left:84%;width:200px;height:80px;' />
<img src='images/test.jpeg' style='border:0px;position:fixed;top:0%;left:18%;width:62%;height:98px;'>
<img src='images/back.png' style='cursor:pointer;position:fixed;top:20%;left:0%;width:70px;height:70px;' id='gotobak'>


<table border=0 style='position:absolute;left:76%;top:20%;width:23%;height:30%;'>
<tr><td align='center'>
<div id='userchartmain'></div>
</td></tr>
</table>

<table border=3 style='position:absolute;left:5%;top:20%;width:70%;height:5%;'>
<tr><td align='center' width='15%'><b>Test Name</b></td><td align='center' width='10%'><b>Level</b></td><td align='center' width='10%'><b>CutOff</b></td><td align='center' width='15%'><b>Marks Obtained</b></td><td align='center' width='10%'><b>Branch</b></td><td align='center' width='15%'><b>Performance</b></td><td align='center' width='15%'><b>Time</b></td><td align='center' width='15%'><b>IP Address</b></td></tr>
</table>

<table border=0 style='position:absolute;left:5%;top:25%;width:70%;height:1%;'>
<tr><td align='center' width='15%'></td><td align='center' width='10%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td></tr>




<?php
if(isset($_SESSION['quiz_login_id']))
{
@include "db.php";




$q1=mysql_query("SELECT * FROM quiz_top_scores WHERE id='$id'");
if(mysql_num_rows($q1)>0)
	{
	while($krow=mysql_fetch_array($q1))
		{
		echo "<tr><td align='center' width='15%'>".ucfirst($krow['qname'])."</td><td align='center' width='10%'>".$krow['level']."</td><td align='center' width='10%'>".$krow['coff']."</td><td align='center' width='15%'>".$krow['score']."/".$krow['noq']."</td><td align='center' width='10%'>".$_SESSION['branch']."</td><td align='center' width='15%'>".$krow['performance']."</td><td align='center' width='15%'><font size=1>".$krow['time']."</font></td><td align='center' width='15%'>".$krow['ip']."</td></tr>
";
		}
	
	}
else
	echo "<tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><td align='center' width='15%' colspan=10><font color=red size=4>No Results Found For Your ID Number</font></td><td align='center' width='10%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td></tr>
";


}
else
	echo "<tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><Td></td></tr><tr><td align='center' width='15%' colspan=10><font color=red size=4>No Results Found For Your ID Number</font></td><td align='center' width='10%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='10%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td><td align='center' width='15%'></td></tr>
";
?>
</table>
</div>
<title>SDCAC QUIZS</title>
<link rel="icon" href="images/hero.ico" type="image/x-icon">

