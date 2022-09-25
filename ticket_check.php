<?
//Database Information
include "dbConfig.php";


if(isset($_GET['tickets']) && ($_GET['tickets'] != "")) {
$tickets = $_GET['tickets'];

//Table tickets fields
$result = $conn->prepare("SELECT * FROM `fortuite`.`tickets` WHERE ticket_id =:tickets");
$result->execute([':tickets' => $tickets]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$ticketlist = $result->fetch();
}
else { 
echo "missing field error";
 }

		echo "[";

$status = $ticketlist['status'];
$ticket_date = $ticketlist['ticket_date'];
	//reference for table followers
$member_id = $ticketlist['member_id'];
	//reference for table events
$event_id = $ticketlist['event_id'];
		
	
		
		
		
		
//Table followers fields
$result = $conn->prepare("SELECT * FROM `fortuite`.`followers` WHERE id =:member_id");
$result->execute([':member_id' => $member_id]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$followerlist = $result->fetch();

$name = $followerlist['name'];
$last_name = $followerlist['last_name'];
$email = $followerlist['email'];		
		
		
		
//Table event (using $name_event because name already exist followers)	
$result = $conn->prepare("SELECT * FROM `fortuite`.`events` WHERE id =:event_id");
$result->execute([':event_id' => $event_id]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$eventlist = $result->fetch();

$date = $eventlist['date'];
$time= $eventlist['time'];
$name_event = utf8_encode($eventlist['name']);		
$location = $eventlist['location'];		
$price = $eventlist['price'];		


		
		
		
		
		if(isset($_GET['tickets']) && ($_GET['tickets'] != "")) {
		echo "{\"tickets\":\"" . $tickets . "\", 
      \"status\":\"" . $status . "\",
      \"ticket_date\":\"" . $ticket_date . "\",
      \"name\":\"" . $name . "\",
      \"last_name\":\"" . $last_name . "\",
	   \"email\":\"" . $email . "\",
      \"date\":\"" . $date . "\",
	   \"time\":\"" . $time . "\",
      \"name\":\"" . $name_event . "\",
	   \"location\":\"" . $location . "\",
      \"price\":\"" . $price . "\",
	        
  },";
		}		
		
		echo "]";
		


		
exit;
?>