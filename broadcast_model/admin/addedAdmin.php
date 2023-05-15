<?php
include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


    $adminName=$_POST['AdminName'];
    $adminPassword=$_POST['AdminPassword'];
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
    $stmt= $conn->prepare("INSERT INTO admin_login (Admin_Name,Admin_Password) VALUES (?,?)");
    $stmt->bind_param("ss",$adminName,$adminPassword);
    $stmt->execute();
    ?>
    <div style="color: white; margin:300px 500px; text-align:center; font-size:50px;display:flex; flex-direction: column;width:600px;">
        <span><strong>New Admin Added Succesfully.</strong></span>
        <a href="http://localhost/egov/phpMy/admin/index.php"><button class="btn">Return To Admin Panel</button></a>
    </div>
<?php
    $stmt->close();
    $conn->close();
}
?>