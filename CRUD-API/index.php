<?php 
header('Content-type:application/json');
header('Access-Control-Allow-Origin: *');
//including config file for database connection
require_once('config.php');

$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method == "GET"){
//Getting all users data from database
$get_users_list = "SELECT * FROM users";
$res = mysqli_query($conn,$get_users_list);
$count = mysqli_num_rows($res);
if($count > 0){
	 while ($row = mysqli_fetch_assoc($res)){
	 	echo json_encode($row);
	 }
}else{
	echo json_encode(array("message" => "No user found","status" => false));
}
}else{
	echo json_encode(array("message" => "Invalid Request Method","status" => false));

}
?>