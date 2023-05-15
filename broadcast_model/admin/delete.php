<?php
include('includes/connection.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}
$id=$_GET['id'];
$deletequery="DELETE FROM post WHERE id=$id";
$query=$conn->query($deletequery);
if($query){
    
    header("location: database.php");
        }
        else{
            ?>
            <script>alert('Not Deleted')</script>
    <?php
        }
    
    ?>