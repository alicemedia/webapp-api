<?
//Database Information
include "dbConfig.php";
include "injection.php";
//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$data = file_get_contents("php://input");
$data_array = json_decode($data, true);
$passager = $data_array['id'];
$latitude = $data_array['position']['latitude'];
$longitude = $data_array['position']['longitude'];
$date = Date("d/m/Y H:i:s");
$query_add = "INSERT INTO `hov_app`.`passager_position` (passager, lati, longi, time) VALUES('$passager', '$latitude', '$longitude', '$date')";
mysql_query($query_add) or die(mysql_error());

exit;
?>