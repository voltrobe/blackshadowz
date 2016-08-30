<?php
date_default_timezone_set('Asia/Kolkata');
require_once('../include/connect.php');
// ..............For updating attendance

if(isset($_GET['id']) and isset($_GET['attend']) and isset($_GET['dateselect']))
{
	$id     = $_GET['id'];
	$attend = $_GET['attend'];
	$dateselect = isset($_GET['dateselect'])? trim($_GET['dateselect']," "):date('d/m/y');
	$result = mysql_query("select name,batch from student_info where id=".$id);
	$row    = mysql_fetch_row($result); // Collect all data of specified id
	
	$rslt   = mysql_query("select * from attendance where studid=".$id." and attenddate LIKE '".$dateselect."'"); //check for existing entry of specified id in attendance table
	if(mysql_num_rows($rslt))
	{ 
//	echo "bol";
		//$rw = mysql_fetch_row($rslt); //if(($rw[4]== date('d/m/y')))
			mysql_query("update attendance set attendance='".$attend."' where attenddate='".$dateselect."' and studid=".$id);
		//} //else goto aim;
	}
	else
	{	//echo 'yoyo';
		aim: mysql_query("insert into attendance values(".$id.",'".$row[0]."','".$row[1]."','".$attend."','".$dateselect."' ) ");
	}
}	//isset endss
// .............For Intialiasing Attendance Switch onPageLoad
if(isset($_GET['init']))
{
	$init   = $_GET['init'];
	$dateinit=$_GET['dateinit'];
	$result = mysql_query("select attendance from attendance where studid=".$init." and attenddate='".$dateinit."'");
	if(mysql_num_rows($result))
	{
		$row = mysql_fetch_row($result);
		echo (strcmp($row[0],"present") == 0)?1:0;
	}
	else
	echo 0;
}
?>