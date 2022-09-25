<?
//Database Information
include "dbConfig.php";
include "injection.php";
//Connect to database

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

if(isset($_GET['driver']) && ($_GET['driver'] != "")) {
$driver = $_GET['driver'];
$query = mysql_query("SELECT * FROM `hov_app`.`vehicule` WHERE driver = '$driver' LIMIT 10");
}
else { 
echo "missing field error";
 }
$query_check=mysql_num_rows($query);
		if ($query_check != 0) { 
		echo "[";
	while($userlist = mysql_fetch_array($query))
		{
		$make = $userlist['make'];
		$model = $userlist['model'];
		$color = $userlist['color'];
		$license = $userlist['license'];
		$vin = $userlist['vin'];
		$picture = $userlist['picture'];
		
		
		if(isset($_GET['driver']) && ($_GET['driver'] != "")) {
		echo "{\"driver\":\"" . $driver . "\",  
      \"make\":\"" . $make . "\",
      \"model\":\"" . $model . "\",
      \"color\":\"" . $color . "\",
      \"license\":\"" . $license . "\",
      \"vin\":\"" . $vin . "\",
      \"picture\":\"" . $picture . "\"	
  },";
		}		
		}
		echo "]";
		}
		else{
		echo "driver invalid";
		}
exit;
?>