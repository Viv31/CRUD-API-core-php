<?php 
$db_host = "localhost";
$db_user = "root";
$db_pwd = "";
$db_name = "crud-api-core-php";
$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
if($conn){
	//echo "Connected Successfully";
}else{
	echo "Not Connected";
}


?>