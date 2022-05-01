<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: DELETE");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method == "DELETE"){
$data = json_decode(file_get_contents("php://input"),true);
$userid = $data['id'];
//including config file for database connection
require_once('config.php');
	$get_user_by_userid = "SELECT * FROM users where id = '".$userid."'";
	$result = mysqli_query($conn,$get_user_by_userid);
	if(mysqli_num_rows($result) > 0){
		$delete_data = "DELETE FROM users WHERE id = '".$userid."'";
	if(mysqli_query($conn,$delete_data)){
		echo json_encode(array("message"=>"User Deleted Successfully","status"=>true));
	}else{
		echo json_encode(array("message"=>"User can not be deleted","status"=>false));
	}

	}else{
		echo json_encode(array("message"=>"User id not found","status"=>false));

	}
}
else{
		echo json_encode(array("message"=>"Invalid Request Method","status"=>false));


}

	


?>