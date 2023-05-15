
<?php include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


?>
<?php include('includes/connection.php');
?>
	<div class="AddPost">
		<form action="addedAdmin.php" id="postForm" method="POST">
			<div class="input-post">
				<h2>Admin</h2>
				<input type="text" placeholder="Admin" name="AdminName">
			</div>
			<div class="input-post">
				<h2>Admin Password</h2>
				<input type="text" placeholder="Admin Password" name="AdminPassword">
			</div>
			<button class="btn" name="update">Add Admin</button>
		</form>
	<!-- </div> -->
</div>
</body>
</html>
<?php
if(isset($_POST['update'])){
    $adminName=$_POST['AdminName'];
    $adminPassword=$_POST['AdminPassword'];

    $update= "INSERT INTO admin_login (Admin_Name, Admin_Password) VALUES ($adminName,$adminPassword)";
    $qury=$conn->query($update);
    if($qury){
?>
<script>alert('Update Successful');</script>
<?php
    header("location: index.php");
    }
    else{
        ?>
        <script>alert('Not Updated')</script>
<?php
    }
}

?>

