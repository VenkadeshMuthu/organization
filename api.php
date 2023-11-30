<?php
session_start();
$conn = mysqli_connect("localhost","root","","organizations");
if (!$conn) {
	http_response_code(400);
	header('Content_type: text/plain');
  die("Connection failed: " . mysqli_connect_error());
}
function error422($msg){
	$response = [
		'status' =>422,
		'message'=> $msg,
	];
	// header("HTTP/1.0 422 Unprocessable Entry");
	return json_encode($response);
	die();
}
function insert_user(){
	global $conn;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	if(empty($name)){
		return error422('Enter your Name');
	}elseif (empty($email)) {
		return error422('Enter your Email');
	}elseif(empty($password)){
		return error422('Enter your Password');
	}elseif(empty($phone)){
		return error422('Enter your Phone');
	}elseif(empty($address)){
		return error422('Enter your address');

	}else{
		$query = "INSERT INTO users (name,email,password,phone,address)value('$name','$email','$password','$phone','$address')";
		$result = mysqli_query($conn,$query);
		if($result){
			$user_id = mysqli_insert_id($conn);
			$_SESSION['id'] = $user_id;
			$response = [
				'status' =>201,
				'message'=> 'User Created Successfull',
				'user_id'=> $user_id,
			];
			// header("HTTP/1.0 201 Created");
			return json_encode($response);
		}else{
			$response = [
				'status' =>500,
				'message'=> 'Internal Server Error',
				'user_id'=> "User Not Found",
			];
			header("HTTP/1.0 500 Internal Server Error");
			return json_encode($response);
		}
	}
}
function check_user(){
	global $conn;
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email)) {
		return error422('Enter your Email');
	}elseif(empty($password)){
		return error422('Enter your Password');
	}else{
		$query = "SELECT * FROM users WHERE email='$email'";

		$result = mysqli_query($conn,$query);
		$hash_password = mysqli_fetch_assoc($result);
		
        if (isset($hash_password) && $hash_password['email'] == $email && password_verify($password, $hash_password['password'])) {
            
                // echo "Logged in!";

                $_SESSION['email'] = $hash_password['email'];

                $_SESSION['name'] = $hash_password['name'];

                $_SESSION['id'] = $hash_password['id'];

                $_SESSION['user_type'] = $hash_password['admin'];

		$response = [
			'status' =>201,
			'message'=> 'User Login Successfull',
			'user_id'=> $hash_password['id'],
		];
		// header("HTTP/1.0 201 Created");
		return json_encode($response);
				
		}else{
			$response = [
				'status' =>500,
				'message'=> 'Invalid email and password',
				'user_id'=> "User Not Found",
			];
			header("HTTP/1.0 500 Internal Server Error");
			return json_encode($response);
		}
	}
}
function all_users($user_id){
	global $conn;

	if(isset($user_id)){

		$user_type = "SELECT * FROM users WHERE id = ".$user_id." order by id ASC";
		$value =  mysqli_query($conn,$user_type);
		$admin = mysqli_fetch_assoc($value);
		if ($admin["admin"] == 1 ) {
			$query = "SELECT * FROM users ORDER BY id ASC";
			$result =  mysqli_query($conn,$query);
		}else{
			$query = "SELECT * FROM users WHERE id = '$user_id' ORDER BY id ASC";
			$result =  mysqli_query($conn,$query);
		}
		 if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	            	$data[]=$row;
	            }
	            return $data;
	            echo $data;
	            die();
		}
	}
}
function update_user($user_value){
	global $conn;
	
	$id = $user_value['id'];
	$name = $user_value['name'];
	$email = $user_value['email'];
	$password = password_hash($user_value['password'],PASSWORD_BCRYPT);
	$phone = $user_value['phone'];
	$address = $user_value['address'];
	
	if(empty($name)){
		return error422('Enter your Name');
	}elseif (empty($email)) {
		return error422('Enter your Email');
	}elseif(empty($phone)){
		return error422('Enter your Phone');
	}elseif(empty($address)){
		return error422('Enter your address');

	}else{
		$query = "UPDATE users SET name = '$name',email='$email',phone= '$phone',address = '$address' WHERE id = '$id'";
		
		$result = mysqli_query($conn,$query);
		if($result){
			$response = [
				'status' =>201,
				'message'=> 'User Update Successfull',
			];
			// header("HTTP/1.0 201 Created");
			return json_encode($response);
		}else{
			$response = [
				'status' =>500,
				'message'=> 'Internal Server Error',
			];
			header("HTTP/1.0 500 Internal Server Error");
			return json_encode($response);
		}
	}
}
function delete_user($user_id,$current_id){
global $conn;
	if(empty($user_id)){
		return error422('user_id not found');
	}else{
		$user_type = "SELECT * FROM users WHERE id = ".$current_id." order by id ASC";
		$query = "DELETE FROM users WHERE id=$user_id";
		$value =  mysqli_query($conn,$user_type);
		$admin = mysqli_fetch_assoc($value);
		$result = mysqli_query($conn,$query);
		if($result){
			$response = [
				'status' =>201,
				'message'=> 'User Deleted Successfull',
				"user_type"=> $admin['admin'],
			];
			// header("HTTP/1.0 201 Created");
			return json_encode($response);
		}else{
			$response = [
				'status' =>500,
				'message'=> 'Internal Server Error',
			];
			//header("HTTP/1.0 500 Internal Server Error");
			return json_encode($response);
		}	
	}
}
?>