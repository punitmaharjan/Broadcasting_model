<?php
include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


$title=$_POST['PostTitle'];
$content=$_POST['PostContent'];
// database connection
$servername = "localhost";
$username = "root";
$password = "";
$database="broadcast";

// Create connection
$conn =new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
    $stmt= $conn->prepare("INSERT INTO post (Title,Content) VALUES (?,?)");
    $stmt->bind_param("ss",$title,$content);
    $stmt->execute();
    ?>
    <div style="color: white; margin:300px 500px; text-align:center; font-size:50px;display:flex; flex-direction: column;width:600px;">
        <span><strong>Post Added Succesfully.</strong></span>
        <a href="http://localhost/broadcast/admin/addpost.php"><button class="btn">Add New Post</button></a>
    </div>
<?php
    $stmt->close();
    $conn->close();
}
?>