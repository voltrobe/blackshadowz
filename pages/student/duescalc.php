<?php
require_once('../include/connect.php');
	if(isset($_GET['studid'])){
	$id=trim($_GET['studid']," ");
	$q=mysql_query("select * from student_info where id=".$id);
	$rowy=mysql_fetch_row($q);
	$finalamt=$rowy[7]+trim($_GET['paidamt']," ");
	$dues=$rowy[6]-$finalamt;
	mysql_query("update student_info set feespaid=".$finalamt." where id=".$id);
	echo $finalamt."|".$dues;}
?>