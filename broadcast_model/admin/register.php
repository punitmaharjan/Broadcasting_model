<?php
// include("includes/header.php");
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}
?>
<?php include('includes/connection.php');
?>
<html>

<head>
    <title>Admin Registration</title>
    <!-- <meta charset="utf-8" name="viewport" content="width=device-width, initial scale=1.0, shrink -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://kit.fontawesome.com/d42c36ec92.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login-form">
        <h2>Admin Registration Panel</h2>
        <form method="POST">
            <!-- <input name="signin" value="login" type="hidden" /> -->
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Admin Name" name="AdminName">
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="AdminPassword">
            </div>
			<div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" name="ConfirmPassword">
            </div>

            <button name="SignIn">Register</button>

			<div class="extra" style="display: flex;
  justify-content: space-between;">
				<a href="http://localhost/egov/php/admin/login.php">Already have an account?</a>
				<a href="http://localhost/egov/php/admin/index.php">Admin Panel?</a>
            </div>
        </form>
    </div>
	<?php
			if(isset($_POST['SignIn'])){
				$adminName=$_POST['AdminName'];
				$password=$_POST['AdminPassword'];
				$cpassword=$_POST['ConfirmPassword'];
				if($password==$cpassword){
					session_start();
					$_SESSION['Admin']=$adminName;
					$_SESSION['pw']=$password;
					header("location: adminRegistration.php");
				}
				else{
					echo '<script>alert("Password does not match")</script>';
				}
			}

?>