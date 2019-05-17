<?php 
    session_start();
	if(!isset($_SESSION['user_email'])){
	header("location:admin-login.php");
	exit();
	}
?>