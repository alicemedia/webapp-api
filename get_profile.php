<?
//Database Information
include "dbConfig.php";


if(isset($_GET['follower']) && ($_GET['follower'] != "")) {
$user = $_GET['follower'];
$result = $conn->prepare("SELECT * FROM `fortuite`.`followers` WHERE uid =:user");
$result->execute([':user' => $user]);
$result->setFetchMode(PDO::FETCH_ASSOC);
$followerlist = $result->fetch();
}


else { 
echo "missing field error";
 }

		echo "[";
//Table followerlist (country was not add to the program)
		$user = $followerlist['id'];
		$name = $followerlist['name'];
		$last_name = $followerlist['last_name'];
		$email = $followerlist['email'];
		$profilepic = $followerlist['profilepic'];
		$description = $followerlist['description'];
		$dob = $followerlist['dob'];
		$phone = $followerlist['phone'];
		$address = $followerlist['address'];
		$ville = $followerlist['ville'];
		$province = $followerlist['province'];
		$email = $followerlist['email'];
		$code_postal = $followerlist['code_postal'];
		
		

		
		//country wasn't add to the code
		if(isset($_GET['follower']) && ($_GET['follower'] != "")) {
		echo "{\"followers\": {\"id\":\"" . $user . "\",  
      \"name\":\"" . $name . "\",
      \"last_name\":\"" . $last_name . "\",
      \"email\":\"" . $email . "\",
      \"profilpic\":\"" . $profilepic . "\",
	  \"description\":\"" . $description . "\",
	  \"dob\":\"" . $dob . "\",
	  \"phone\":\"" . $phone . "\",
	  \"address\":\"" . $address . "\",
	  \"ville\":\"" . $ville . "\",
	  \"province\":\"" . $province . "\",
	  \"code_postal\":\"" . $code_postal . "\"
      
 } }";
		}		
		
		echo "]";
		


		
exit;
?>