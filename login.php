<?
//Database Information
include "dbConfig.php";
include "injection.php";
//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$data = file_get_contents("php://input");
$data_array = json_decode($data, true);
$email = $data_array['email'];
$password = $data_array['password'];
$sql="SELECT * FROM `hov_app`.`driver` WHERE email='$email' and password='$password'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
if($count == 1) {
// If result matched $username and $password, table row must be 1 row
$row = mysql_fetch_row($result);
$driver = $row[0];
$key = md5(uniqid(rand(), TRUE));
$date = Date("d/m/Y H:i:s");
$query_add = "INSERT INTO `hov_app`.`driver_login` (driver, time) VALUES('$driver', '$date')";
mysql_query($query_add) or die(mysql_error());
//echo "[\"$email\":{
//      \"id\":" . $driver . ",
//      \"key\":" . $unique_key . "
//    }
//  ]";
echo "{\"id\":" . $driver . "}";
exit;
}
else {
echo "error";
}
?>