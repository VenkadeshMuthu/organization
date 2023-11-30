<?php 
session_start();
if($_SESSION['status'] == "User Login Successfull"){
	header("Location:home.php");
}else{
	header("Location:Login.php");
}
?>