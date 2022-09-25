<?
//Database Information
include "dbConfig.php";


if(isset($_GET['event']) && ($_GET['event'] != "")) {
$event = $_GET['event'];

//Table events
$result = $conn->prepare("SELECT * FROM `fortuite`.`events` WHERE event_id =:event");
$result->execute([':event' => $event]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$eventlist = $result->fetch();
}
else { 
echo "missing field error";
 }

		echo "[";

$status = $eventlist['status'];
//reference pour la table ticket
$event_number = $eventlist['id'];
			
		
	
//TABLE TICKET
	
$result = $conn->prepare("SELECT * FROM `fortuite`.`tickets` WHERE event_id =:event_number");
$result->execute([':event_number' => $event_number]);
$result->setFetchMode(PDO::FETCH_ASSOC);


//PLUS LOIN, LA LOOP: 


		
		
		if(isset($_GET['event']) && ($_GET['event'] != "")) {
		echo "{\"id\":\" . $event . \", 
      \"status\":\" . $status . \",	  
      \"ticket_id\": {\"";
	  
while($r = $result->fetch()) {	
	echo utf8_encode($r["ticket_id"]) . ", ";
    }
		echo " } }";
		}		
		
		echo "]";
		


		
exit;
?>