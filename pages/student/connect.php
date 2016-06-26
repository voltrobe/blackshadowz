<?php
$link=mysql_connect('localhost','root','');
if(!$link)
{
die("failed connection");
}
$db=mysql_select_db('blackshadows');
if(!$db)
{
die("unable to select database");
}

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