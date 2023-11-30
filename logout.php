<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["user_type"]);
$_SESSION["status"] = "logout successful";
header("Location:login.php");
?>