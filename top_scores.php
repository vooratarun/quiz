<?php
session_start();
@include "db.php";
$q=mysql_query("SELECT percentage,id,score,noq
FROM quiz_top_scores
WHERE qname='aptitude'
ORDER BY quiz_top_scores.percentage DESC") or die(mysql_error());
$q2=mysql_query("SELECT percentage,id,score,noq
FROM quiz_top_scores
WHERE qname='verbal'
ORDER BY quiz_top_scores.percentage DESC
") or die(mysql_error());
$q3=mysql_query("SELECT percentage,id,score,noq
FROM quiz_top_scores
WHERE qname='reasoning'
ORDER BY quiz_top_scores.percentage DESC
") or die(mysql_error());
$q4=mysql_query("SELECT percentage,id,score,noq
FROM quiz_top_scores
WHERE qname='cpro'
ORDER BY quiz_top_scores.percentage DESC
") or die(mysql_error());
$q5=mysql_query("SELECT percentage,id,score,noq
FROM quiz_top_scores
WHERE qname='javapro'
ORDER BY quiz_top_scores.percentage DESC
") or die(mysql_error());
echo "<table ><tr align='center'><td width=7%>&nbsp;<u><b><font color=FF00CC>Quiz</b></u></td><td width=7%>&nbsp;<u><b><font color=FF00CC>ID</b></u></td><td width=7%><u><b><font color=FF00CC>Score</b></u></td></tr></table>";
echo "<marquee direction=up scrollAmount=3 style='padding-left:5%' onmouseover='this.stop()' onmouseout='this.start()'><font color=white>";
echo "<table style='color:white;'>";
if(mysql_num_rows($q)>0)
{
	$c=0;
	while($kg=mysql_fetch_array($q))
	{
		if ($c==0)
			$top=$kg['percentage'];
		if ($top==$kg['percentage'])
			{echo "<tr align='center'><td width=7%>Aptitude</td><td width=7%>".$kg['id']."</td><td width=7%>".$kg['score']."/".$kg['noq']."</td></tr>";	
	$c=$c+1;}
	}
}
if(mysql_num_rows($q2)>0)
{
	$c=0;
	while($kg=mysql_fetch_array($q2))
	{
		if ($c==0)
			$top=$kg['percentage'];
		if ($top==$kg['percentage'])
			{echo "<tr align='center'><td width=7%>Verbal</td><td width=7%>".$kg['id']."</td><td width=7%>".$kg['score']."/".$kg['noq']."</td></tr>";	
	$c=$c+1;}
	}
}
if(mysql_num_rows($q3)>0)
{
	$c=0;
	while($kg=mysql_fetch_array($q3))
	{
		if ($c==0)
			$top=$kg['percentage'];
		if ($top==$kg['percentage'])
			{echo "<tr align='center'><td width=7%>Reasoning</td><td width=7%>".$kg['id']."</td><td width=7%>".$kg['score']."/".$kg['noq']."</td></tr>";	
	$c=$c+1;}
	}
}
if(mysql_num_rows($q4)>0)
{
	$c=0;
	while($kg=mysql_fetch_array($q4))
	{
		if ($c==0)
			$top=$kg['percentage'];
		if ($top==$kg['percentage'])
			{echo "<tr align='center'><td width=7%>C</td><td width=7%>".$kg['id']."</td><td width=7%>".$kg['score']."/".$kg['noq']."</td></tr>";	
	$c=$c+1;}
	}
}
if(mysql_num_rows($q5)>0)
{
	$c=0;
	while($kg=mysql_fetch_array($q5))
	{
		if ($c==0)
			$top=$kg['percentage'];
		if ($top==$kg['percentage'])
			{echo "<tr align='center'><td width=7%>Java</td><td width=7%>".$kg['id']."</td><td width=7%>".$kg['score']."/".$kg['noq']."</td></tr>";	
	$c=$c+1;}
	}
}
echo "</table>";


?>
