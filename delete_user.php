<?php 
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'api.php';
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == "GET"){
	$user_id = $_SESSION['id'];
		$data = delete_user($_GET['id'], $user_id);
	
	$response = json_decode($data);
	if($response->message == "User Deleted Successfull"){
		if($response->user_type == 1){
			$_SESSION['status'] = $response->message;
		 header("Location:home.php");
		}else{
		 	$_SESSION['status'] = $response->message;
		 	header("Location:login.php");
		}
	}else{
		 $response = json_decode($data);
		 $_SESSION['status'] = $response->message;
		 echo $data;
		header('Location:login.php');
	}

}else{
	$response = [
		'status' =>405,
		'message'=> $requestMethod.'Method Not Allowed',
	];
	echo json_encode($response);
}
?>