<?
//Database Information
include "dbConfig.php";


if(isset($_GET['event']) && ($_GET['event'] != "")) {
$event = $_GET['event'];
$result = $conn->prepare("SELECT * FROM `fortuite`.`events` WHERE event_id =:event");
$result->execute([':event' => $event]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$userlist = $result->fetch();
}
else { 
echo "missing field error";
 }

		echo "[";

		$event = $userlist['event_id'];
		$date = $userlist['date'];
		$name = $userlist['name'];
		$location = $userlist['location'];
		$price = $userlist['price'];
		$influencer = $userlist['influencer'];
		
		
//Table influencers		
$result = $conn->prepare("SELECT * FROM `fortuite`.`influencers` WHERE uid =:influencer");
$result->execute([':influencer' => $influencer]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$influencerlist = $result->fetch();
		
		$alias = $influencerlist['alias'];
		
		
		if(isset($_GET['event']) && ($_GET['event'] != "")) {
		echo "{\"event\":\"" . $event . "\",  
      \"date\":\"" . $date . "\",
      \"name\":\"" . $name . "\",
      \"location\":\"" . $location . "\",
      \"price\":\"" . $price . "\",
	  \"influencer\":\"" . $alias . "\",
      
  },";
		}		
		
		echo "]";
		


		
exit;
?>