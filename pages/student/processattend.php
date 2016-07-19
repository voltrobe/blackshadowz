<?php
date_default_timezone_set('Asia/Kolkata');
require_once('../include/connect.php');
// ..............For updating attendance
if(isset($_GET['id'])){
	//echo date('j m y',time());
$id=$_GET['id'];
$attend=$_GET['attend'];
$result=mysql_query("select name,batch from student_info where id=$id");
$row=mysql_fetch_row($result);
$rslt=mysql_query("select * from attendance where studid=".$id."");
if(mysql_num_rows($rslt)){
	$rw=mysql_fetch_row($rslt);
if(strcmp(date('j m y',$rw[4]),date('j m y',time()))===0){
	mysql_query("update attendance set attendance='".$attend."',attenddate=".time()." where studid=$id");
}
else goto aim;
}
else{aim: mysql_query("insert into attendance values($id,'".$row[0]."','".$row[1]."','".$attend."',".time()." ) ");}
}	//isset endss
// .............For Intialiasing Attendance Switch
if(isset($_GET['init'])){
	$init=$_GET['init'];
$result=mysql_query("select attendance from attendance where studid=$init");
if(mysql_num_rows($result)){

	$row=mysql_fetch_row($result);
echo (strcmp($row[0],"present")==0)?1:0;}
else
echo 0;}
?>