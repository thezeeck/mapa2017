<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Usuario o password invalido";
		} else {

			$username=$_POST['username'];
			$password=$_POST['password'];

			$host="localhost";
			$dbname="acoeoco_stands2016";
			$user="acoeoco_ad_stand";
			$pass="AdminE2016";

			$connection = mysql_connect($host,$user,$pass);

			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			$db = mysql_select_db($dbname, $connection);

			$query = "select role from USERS where password='$password' AND username='$username'";
			$result = mysql_query($query, $connection);
			$rows = mysql_num_rows($result);

			if ($rows == 1) {
				$_SESSION['login_user']=$username;

				$row = mysql_fetch_assoc($result);

				$_SESSION['role_user'] = $row['role'];

				header("location: profile.php");
			} else {
				$error = "Usuario o password invalido";
			}
			mysql_close($connection);
		}
}

include('../lib/login.html');

?>
