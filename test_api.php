<?php
include('api.php');
if($_GET['action'] == 'all_users'){
	$user_id = $_GET['id'];
	$data = all_users($user_id);
}
echo json_encode($data);
?>