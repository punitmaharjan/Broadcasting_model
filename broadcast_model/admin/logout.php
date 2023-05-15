<?php
// include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


session_destroy();
    header("location: login.php");

?>