<?php 
// error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'api.php';
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == "GET"){
	$inputdata = json_decode(file_get_contents("php://input"),true);
	
		$user = all_users();

	 $response = json_decode($user);
	 $data = $response->data;
		foreach ($data as $value) {
			echo $value;
		}
		die();
	$url = 'update_user.php?'.http_build_query($data);
	header("Location: $url");
}else{
	$response = [
		'status' =>405,
		'message'=> $requestMethod.'Method Not Allowed',
	];
	echo json_encode($response);
}
?>