<?php
require_once('dbconfig.php');
$email=$_POST['email'];
$pass=$_POST['password'];
$encrpass=md5($pass);
//echo $encrpass;
$q=mysql_query("SELECT * FROM login_info WHERE email='$email' and encrpass='$encrpass'");
$num=mysql_num_rows($q);
if($num > 0){
$row=mysql_fetch_row($q);
//session_start();
$_SESSION['userid']=$row[0];
$_SESSION['name']=$row[1];
$_SESSION['email']=$row[2];
echo 1;}
else{
echo 0;}
?>