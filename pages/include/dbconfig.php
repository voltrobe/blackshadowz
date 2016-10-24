<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	 session_start();//session_start()
date_default_timezone_set('Asia/Kolkata');
//$link=mysql_connect('localhost','root','');
$link=mysql_connect('localhost','blackksh_shadowu','tavor007');
if(!$link)
{die("failed connection");}
$db=mysql_select_db('blackksh_shadow');
//$db=mysql_select_db('shadow');
if(!$db)
{die("unable to select database");}
?>