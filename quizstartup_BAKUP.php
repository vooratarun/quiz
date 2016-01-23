<script>
</script>
<?php
session_start();

if(isset($_SESSION['quiz_login_id']))
{
if(isset($_SESSION['tlimit']))
{
echo "<img src='images/back.png' style='cursor:pointer;position:absolute;top:9%;width:70px;height:70px;' onclick='window.location.href=\"index.php\";'>";
$timelimit=$_SESSION['tlimit'];
if(!isset($_SESSION['quizvisitsnumber']))
	{
	@include "db.php";
	$kgid=$_SESSION['quiz_login_id'];
	mysql_query("DELETE FROM `quiz_online` WHERE id='$kgid'");
	$mq=mysql_query("SELECT MAX(no) FROM quiz_visits WHERE id='N100704'");
	$number=mysql_fetch_array($mq);

	if($number[0]>0)
		{
		$number[0]++;
		mysql_query("UPDATE `quiz_visits` SET `no`='$number[0]',`id`='N100704'");
		}
	else
		{
		$number[0]=1;
		mysql_query("UPDATE `quiz_visits` SET `no`='$number[0]',`id`='N100704'");
		}
	}
$qno=$_SESSION['qzid'];
$mode=$_SESSION['mode'];
$qlevel=$_SESSION['qlevel'];
$mqname=$_SESSION['qname'];


?>
<style type='text/css'>
.obtn
	{
	width:25px;
	height:25px;
	color:black;
	background-color:#0080C0;
	}
.obtn:hover
	{
	font-weight:normal;
	width:25px;
	height:25px;
	color:black;
	background-color:white;
	}

</style>


<?php

$conn=mysql_connect("localhost","root","9014734454") or die(mysql_error());
mysql_select_db("sdcac_database",$conn);
function options()
{
$mmode=$_SESSION['qname'];
$num=$_SESSION['noq'];
echo "<table border=0>";
for($i=0;$i<$num;$i++)
	{
	if($mmode=='verbal')
		$optnames=array("a","b","c","d","e");
	else
		$optnames=array("a","b","c","d");
	shuffle($optnames);
	echo "<tr><td width='13%'></td><td >".($i+1)."</td><td>
<button class=obtn id=".($i+1).$optnames[0]." onclick=\"ansthis('".($i+1).$optnames[0]."')\">".strtoupper($optnames[0])."</button>
<button class=obtn id='".($i+1).$optnames[1]."' onclick=\"ansthis('".($i+1).$optnames[1]."')\">".strtoupper($optnames[1])."</button>
<button class=obtn id='".($i+1).$optnames[2]."' onclick=\"ansthis('".($i+1).$optnames[2]."')\">".strtoupper($optnames[2])."</button>
<button class=obtn id='".($i+1).$optnames[3]."' onclick=\"ansthis('".($i+1).$optnames[3]."')\">".strtoupper($optnames[3])."</button>
";
if($mmode=='verbal')
echo "
<button class=obtn id='".($i+1).$optnames[4]."' onclick=\"ansthis('".($i+1).$optnames[4]."')\">".strtoupper($optnames[4])."</button>";
else
"</td></tr><tr><td></td></tr>";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>

<script>

$(document).ready(function(){
$("#onlinemembersdiv").load("online_users.php");
});
</script>
</head>
<body>
<!---Logo Table-->

<table border=1 style='position:absolute;left:5%;top:1%;width:90%;height:14%;'>
<tr><td>&nbsp;&nbsp;<img src='images/head3.png' style='width:;height:80px;'></td></tr>
</table>

<!---countdownTime table--->
<table border=1 style='position:absolute;left:5%;top:16%;width:90%;height:10%;'>
<tr><td width=70%>Questions : <span id='dcount'>0</span> / <?php echo $_SESSION['noq'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button onclick="startthisquiz('<?php echo $timelimit;?>','<?php echo $_SESSION['noq'];?>')" id='squiz' >Start Quiz</button>
<button onclick="quizsubmit('<?php echo $_SESSION['noq'];?>')" id='subquiz'>Submit</button><span id='onlinestatus'></span><span style='float:right;' id='submitstatus'></span></td><td align='center'>
<div id='cdclock'>
<?php
$hh='';
$mm='';
$ss='';
if($timelimit>59 && $timelimit%60==0)
	{
	$hh=$timelimit/60;
	$mm="00";
	$ss="00";
	}
else
	{
	$hh='00';
	$mm=$timelimit;
	$ss="00";
	}


?>
<font size=7><?php echo $hh;?></font><font color=grey size=1>H</font>
:
<font size=7><?php echo $mm;?></font><font color=grey size=1>M</font>
:
<font size=7><?php echo $ss;?></font><font color=grey size=1>Sec</font>
</div>
</td></tr>
</table>

<!---Questions Table--->
<table border=1 style='position:absolute;top:27%;left:5%;width:59%;height:62%;'>

<tr><td ><span style='padding-left:40%;'><u>Questions Display Here</u></span><br><span style='padding-left:33%;' id='hidethis'>Click Start button to Start Your Exam</span><br><div id='quizdisplay' style='height:350px;overflow:scroll;'>

<?php

@include "db.php";
$reqid=$_SESSION['qzid'];
$me2=mysql_query("SELECT * FROM quiz_db WHERE qno='$reqid'") or die(mysql_error());
mysql_query("UPDATE quiz_db SET qlevel='$qlevel' WHERE qno='$reqid'");
$rowf=mysql_fetch_array($me2);
if($mode=='text')
	{
	$qs=explode("~",$rowf['allqst']);
	$qans=explode("~",$rowf['allopts']);
	for($i=0;$i<$rowf['noq'];$i++)
		{
		echo ($i+1)."]&nbsp;&nbsp;".$qs[$i]."<br>";
		for($j=$i;$j<($i+1);$j++)
			{
			$rtmp=explode(":",$qans[$j]);
			$chars=array("A","B","C","D");
			for($x=0;$x<4;$x++)
				{
				echo $chars[$x].".&nbsp;&nbsp;".$rtmp[$x]."&nbsp;&nbsp;";
				}
			echo "<Br><br>";
		
			}
		}
	}
else if($mode=='pdf')
	{
	$filename=$rowf['pdfpath'];
	echo "<script>loadpdf('".$filename."');</script>";
	}
else if($mode=='image')
	{
	$imagequizno=$qno;
	$imgarr=array();
	$imagesdis=$rowf['allimgstr'];
	$imgarr=explode("~",$imagesdis);
	echo "<table>";
	for($e=0;$e<$rowf['noq'];$e++) 
		{
		echo "<center><tr><td>".($e+1)."]</td><Td><img src='".$imgarr[$e]."' width='95%'></center></td></tr><tr><td></td></tr><tr><td></td></tr>";
		}
	echo "</table>";
	}
else
	{
	echo "nisani";
	}



?>




<br>


</div></td></tr>

</table>
</div>



<!---footer--->
<table border=0 style='position:absolute;top:87%;left:80%;width:16%%;height:8%;'>
<tr><td></td></tr><tr><td></td></tr>
<tr><td align='center' id='visitcounter'><?php echo "<h3>0000".$number[0]."</h3";?></td></tr>
</table>


<!---Quiz Taking Members--->
<table border=1 style='position:absolute;top:27%;left:83%;width:16%;height:62%;overflow:scroll;'>
<tr><td ><u><center>Online Members</u>-(43)</center><br><div id='onlinemembersdiv' style='height:350px;overflow:scroll;'>
</div>
</td></tr>
</table>


<!---Answers Table--->
<table border=1 style='position:absolute;top:27%;left:65%;width:17%;height:62%;overflow:scroll;'>
<tr><td ><u><center>Answer Here</center></u><br><div id='multiplechoice' style='height:352px;overflow:scroll;'><?php options();?>
</div></td></tr>
</table>

</body>

</html>


<?php
}
else
	echo "<script>window.location.href='index.php';</script>";
}
else
	echo "<script>window.location.href='index.php';</script>";

?>


