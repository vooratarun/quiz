<span style='padding-left:78%;' id='gobackbtn' ><button  onclick='goback()' style='position:fixed;'>Back</button></span>
<?php
session_start();
$quizkey=$_GET['quizkey'];

echo "<Br>";
@include "db.php";
if(isset($_SESSION['quiz_login_id']))
	$id=$_SESSION['quiz_login_id'];
if(isset($_SESSION['quiz_login_id']))
{
$q1=mysql_query("SELECT * FROM quiz_db WHERE qname='$quizkey' ORDER BY lvlflag ASC") or die(mysql_error());
if(mysql_num_rows($q1)>0)
{
$i=1;
while($row=mysql_fetch_array($q1))
	{
	$tmp=$row['cmpltedids'];
	if(substr_count($tmp,$id)>0)
		echo "<table border=0 ><tr><td></td></tr>
	<tr onclick=\"alert('You Already Finished this Exam');\" style='cursor:pointer;'><td width=20%></td><td width=70%><font color=FF00CC>Level-".$i++."</td><td><img src='images/inactive.png' style='width:15px;height;10px;'/></td></tr>";
		
	else
		{
		$leveltmp=$i++;
		echo "<table border=0 ><tr><td></td></tr>
	<tr onclick=\"loadquiz('".$row['qno']."','".$row['qname']."','".$row['noq']."','".$row['timedur']."','".$row['mode']."','".$row['coff']."','Level-".$leveltmp."');\" style='cursor:pointer;'><td width=20%></td><td width=70%><font color=FF00CC>Level-".$leveltmp."</td><td><img src='images/active.png' style='width:15px;height;10px;'/></td></tr>";
		}
		}




}
else
	echo "<font color=red><br><Br><Br><br><Br><Br><center><B>No Levels Available</b></center></font>";

}
else
	echo "<font color=red><br><Br><Br><br><center><B>Login to View Levels</b></center></font>";
?>
