<?php

session_start();

$host="localhost";
$dbname="acoeoco_stands2016";
$user="acoeoco_ad_stand";
$pass="AdminE2016";
 
$connection = mysql_connect($host,$user,$pass);

$db = mysql_select_db($dbname, $connection);

$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select username from USERS where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];

if(!isset($login_session)){
	mysql_close($connection);
	header('Location: ../index.php');
}
?>