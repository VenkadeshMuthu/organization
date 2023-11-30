<?php 
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'api.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
if($requestMethod == "POST"){
	$inputdata = json_decode(file_get_contents("php://input"),true);
	if(empty($inputdata)){
		$data = update_user($_POST);
	}else{
		$data = update_user($inputdata);
	}
	$response = json_decode($data);
	if($response->message == "User Update Successfull"){
		 $_SESSION['status'] = $response->message;
		 header("Location:home.php");	
	}else{
		 $response = json_decode($data);
		 $_SESSION['status'] = $response->message;
		header('Location:home.php');
	}

}else{
	$response = [
		'status' =>405,
		'message'=> $requestMethod.'Method Not Allowed',
	];
	echo json_encode($response);
}
?>