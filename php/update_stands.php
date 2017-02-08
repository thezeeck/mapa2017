<?php
include('session.php');
$places = explode(',', $_POST['places']);
$client = $_POST['client'];
$action_button = $_POST['action_button'];

$role_user = $_SESSION['role_user'];
$login_user = $_SESSION['login_user'];

$host="localhost";
$dbname="acoeoco_stands2016";
$user="acoeoco_ad_stand";
$pass="AdminE2016";

$connection = mysql_connect($host,$user,$pass);

$db = mysql_select_db($dbname, $connection);

$permission = mysql_query("select sold,available,reserved FROM PERMISSION where role='$role_user'", $connection);
$num_rows =  mysql_num_rows($permission);

if($num_rows == 1){
	$row = mysql_fetch_assoc($permission);

	$stand = array();

	$stand['sold'] = $row['sold'];
	$stand['available'] = $row['available'];
	$stand['reserved'] = $row['reserved'];

	if($stand[$action_button] == '1'){

		$client = $action_button != 'available' ? $client : '';

		foreach ($places as $place) {
		    mysql_query("update STANDS set status='$action_button',client='$client' WHERE id='$place'", $connection);
		}
	}
}
mysql_close($connection);
header("location: profile.php");
?>
<script type="text/javascript">
	console.log(<?php echo json_encode($_POST['places']); ?>);
</script>
