<?php 
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'api.php';
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == "POST"){
	$inputdata = json_decode(file_get_contents("php://input"),true);
	if(empty($inputdata)){
		$insert_data = insert_user();
	}else{
		$insert_data = insert_user($inputdata);
	}
	 $data = json_decode($insert_data);

	 if($data->message == "User Created Successfull"){
		$response = [
			'status' =>$data->status,
			'message'=> $data->message,
			'userInfo'=>$data->user_id,
		]; 
		$_SESSION['id'] = $data->user_id;
		$_SESSION['status'] = $data->message;
	}else{
		$response = [
			'status' =>$data->status,
			'message'=> $data->message,
			'userInfo'=>$data->user_id,
		]; 
		$_SESSION['id'] = "";
		$_SESSION['status'] = $data->message;
	}
	echo json_encode($response);

}else{
	$response = [
		'status' =>405,
		'message'=> $requestMethod.'Method Not Allowed',
	];
	echo json_encode($response);
}
?>