<?php 
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
/*header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers");
header("Content-Type: Acess-Control-Allow-Methods");
header("Content-Type:Authorization");*/
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$request_method = $_SERVER['REQUEST_METHOD'];
if($request_method == "POST"){

$data = json_decode(file_get_contents("php://input"),true);
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$username = $data['username'];

//https://www.onlyxcodes.com/2020/05/php-crud-api-tutorial.html

//including config file for database connection
require_once('config.php');

if(!empty($firstname) && !empty($lastname) && !empty($username)){
$insert_user = "INSERT INTO users(firstname,lastname,username)VALUES('".$firstname."','".$lastname."','".$username."')";

	if(mysqli_query($conn,$insert_user) or die("Insert Query Failed")){
		echo json_encode(array("message"=>"User Inserted Successfully","status"=>true));

	}else{
		echo json_encode(array("message"=>"Failed to Insert","status"=>false));

	}
}else{
	echo json_encode(array("message"=>"Failed to insert some fields are missing","status"=>false));

}
}
else{
	echo json_encode(array("message"=>"Invalid Request Method","status"=>false));

}
?>