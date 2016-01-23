<?php
session_start();

if(!isset($_SESSION['quiz_login_id']))
	{
	@include "db.php";
	$uname=addslashes(htmlspecialchars($_GET['uid']));
	$pwd=addslashes(htmlspecialchars($_GET['upass']));
	$q=mysql_query("SELECT * FROM students WHERE ID='$uname'");
	if(mysql_num_rows($q)>0)
		{
		$k=mysql_fetch_array($q);
		if($k['status']!=1)
			{
			if($k['pwd']==$pwd)
				{
				if($uname=="N100704" || $uname=="N100775" )
					{
					echo "<font color=yellow>".$uname."</font>";
					
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['branch']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$uname;
					$_SESSION['branch']=$k['Branch'];
					$_SESSION['name']=$k['Name'];
					$_SESSION['quiz_admin_id']=$uname;
					echo "<script>$('#loginpanel').hide(5000);window.location.reload();</script>";
					}
				else
					{
					echo "<font color=yellow>$uname</font>";
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['branch']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$uname;
					$_SESSION['branch']=$k['Branch'];
					$_SESSION['name']=$k['Name'];
					echo "<script>$('#loginpanel').hide(5000);window.location.reload();</script>";
					}
				}
			else
				echo "<script>$('#loginpanel').hide();alert('Password Wrong');window.location.reload();</script>";
			}
		else
			echo "<script>$('#loginpanel').hide();alert('Try With Another Password');window.location.reload();</script>";
		}
	else
		echo "<script>$('#loginpanel').hide();alert('Wrong Credentials');window.location.reload();</script>";

	
	}

?>