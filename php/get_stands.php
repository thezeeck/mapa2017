<?php

$host="localhost";
$dbname="acoeoco_stands2017";
$user="acoeoco_ad_stand";
$pass="AdminE2016";

$connection = mysql_connect($host,$user,$pass);

$db = mysql_select_db($dbname, $connection);

$result=mysql_query("select id,status,client from STANDS order by id asc", $connection);
$num_rows = mysql_num_rows($result);

if($num_rows > 0){
	$stands = array();
	$index = 0;
	while ($row = mysql_fetch_assoc($result)){

		$stand = array();

		$stand["id"] = $row["id"];
		$stand["status"] = $row["status"];
		$stand["client"] = $row["client"];

		$stands[$index++] = $stand;
	}
}
mysql_close($connection);

?>

<script type="text/javascript">
	var places = <?php echo json_encode($stands); ?>;
</script>
