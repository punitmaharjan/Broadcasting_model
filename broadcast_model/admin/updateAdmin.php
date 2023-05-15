
<?php include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


?>
<?php include('includes/connection.php');
?>
	<div class="AddPost">
		<form id="postForm" method="POST">
       
       <?php
        $id=$_GET['id'];
        $sql=" SELECT * FROM admin_login where id=$id";
        $query= $conn->query($sql);
        $result=$query->fetch_assoc();

?>
			<div class="input-post">
				<h2>Admin</h2>
				<input type="text" placeholder="Admin" name="AdminName" value=" <?php
        echo $result["Admin_Name"];
        ?>">
			</div>
			<div class="input-post">
				<h2>Admin Password</h2>
				<input type="text" placeholder="Admin Password" name="AdminPassword" value=" <?php
        echo $result["Admin_Password"];
        ?>">
			</div>
			<button class="btn" name="update">Update</button>
		</form>
	<!-- </div> -->
</div>
</body>
</html>
<?php
if(isset($_POST['update'])){
    $adminName=$_POST['AdminName'];
    $adminPassword=$_POST['AdminPassword'];

    $update= "UPDATE admin_login SET id=$id, Admin_Name='$adminName', Admin_Password='$adminPassword' WHERE id=$id";
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

