<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	 session_start();
date_default_timezone_set('Asia/Kolkata');
$link=mysql_connect('localhost','root','');
if(!$link)
{
die("failed connection");
}
$db=mysql_select_db('shadow');
if(!$db)
{
die("unable to select database");
}
//session_start();

if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
//-------------For checking pass , while changing it ---///
if(isset($_GET['userid']) || isset($_GET['pass']))
{
$userid=$_GET['userid'];
$encrpass=md5($_GET['pass']);
$q=mysql_query("SELECT * FROM login_info WHERE id=$userid and encrpass='$encrpass'");
$num=mysql_num_rows($q);
 if($num > 0)
	echo 1;
 else echo 0;
}
function active($pageurl){
	 $pagename=explode('/',strrev($_SERVER['PHP_SELF']));
	 $page = strrev($pagename[0]);
	 //echo $page;
	 if($pageurl==$page)
	 	echo "active";
}
?>