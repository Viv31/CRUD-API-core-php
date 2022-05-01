<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method == "PUT"){

$data = json_decode(file_get_contents("php://input"),true);
$userid = $data['id'];
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$username = $data['username'];
//including config file for database connection
require_once('config.php');

if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($userid)){
	$get_user_by_id = "SELECT * FROM users WHERE id = '".$userid."'";
	$result = mysqli_query($conn,$get_user_by_id);
	if(mysqli_num_rows($result)>0){
		$update_data = "UPDATE users SET 
	firstname = '".$firstname."',lastname = '".$lastname."',username = '".$username."' WHERE id ='".$userid."'";
	if(mysqli_query($conn,$update_data)){
		echo json_encode(array("message"=>"User Updated Successfully","status"=>true ));

	}else{
		echo json_encode(array("message"=>"Failed to Update data","status"=>false));
	}

	}else{
		echo json_encode(array("message"=>"Userid not found","status"=>false));

	}
}else{
	echo json_encode(array("message"=>"Failed to Update data,some fields are missing","status"=>false));
}
}else{
	echo json_encode(array("message"=>"Invalid Request Method","status"=>false));

}


?>