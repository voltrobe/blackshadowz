<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	 session_start();//session_start()
date_default_timezone_set('Asia/Kolkata');
$link=mysql_connect('localhost','root','');
//$link=mysql_connect('mysql.hostinger.in','u538443006_shadu','tavor007');
if(!$link)
{die("failed connection");}
//$db=mysql_select_db('u538443006_shado');
$db=mysql_select_db('shadow');
if(!$db)
{die("unable to select database");}
?>