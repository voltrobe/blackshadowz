<?php
require_once('dbconfig.php');
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
//-----For checking pass , while changing in admin section ---///
if(isset($_GET['userid']) || isset($_GET['pass']))
{
$userid=$_GET['userid'];
$encrpass=md5($_GET['pass']);
$q=mysql_query("SELECT * FROM login_info WHERE id=$userid and encrpass='$encrpass'");
$num=mysql_num_rows($q);
 if($num > 0)
	echo 1;
 else echo 0;}
// Function to highlight selected links in menu
function active($pageurl){
	 $pagename=explode('/',strrev($_SERVER['PHP_SELF']));
	 $page = strrev($pagename[0]);
	 //echo $page;
	 if($pageurl==$page)
	 	echo "active";}
?>