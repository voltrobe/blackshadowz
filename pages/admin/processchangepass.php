<?php
session_start();
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>

<?php

$email=$_SESSION['email'];

include '../student/connect.php';

if(isset($_POST['pass2']))

//$pass=$_POST['pass'];
//$pass1=$_POST['pass1'];

$pass2=$_POST['pass2'];

//if(strcmp($pass1,$pass2)==0)

$password = $pass2;
$encrpass = md5($password);
$query=mysql_query("UPDATE login_info SET password='$password',encrpass='$encrpass' WHERE email='$email'");

if($query>0)
{

   ?>
   <script>
      alert("Update success");
   window.location.href="changepass.php";

   </script>
   <?php


 }
 else
 {

   ?>
   <script>
    alert("unable to update");
 window.location.href="changepass.php";

  </script>
  <?php


 }
 ?>