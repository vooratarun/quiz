<?php
session_start();

$_SESSION['qzid']=$_GET['qzmno'];
$_SESSION['qname']=$_GET['qzname'];
$_SESSION['noq']=$_GET['noq'];
$_SESSION['tlimit']=$_GET['tlimit'];
$_SESSION['oflag']=$_GET['onlineflag'];
$_SESSION['coff']=$_GET['cutoff'];
$_SESSION['mode']=$_GET['mode'];
$_SESSION['qlevel']=$_GET['qlevel'];

?>
