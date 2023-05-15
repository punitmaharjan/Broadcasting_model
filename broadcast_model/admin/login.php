<?php include('includes/connection.php');
session_start();
if(isset($_SESSION['AdminLoginId'])){
	header("location: index.php");
}
?>
<html>

<head>
    <title>Admin Panel</title>
    <!-- <meta charset="utf-8" name="viewport" content="width=device-width, initial scale=1.0, shrink -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://kit.fontawesome.com/d42c36ec92.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login-form">
        <h2>ADMIN LOGIN PANEL</h2>
        <form action="login.php" method="POST">
            <input name="signin" value="login" type="hidden" />
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Admin Name" name="AdminName">
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="AdminPassword">
            </div>

            <button name="SignIn">Sign In</button>

            <div class="extra">
                <a href="#">Forget Password?</a>
            </div>
        </form>
    </div>
    <?php 
    if (isset($_POST['signin'])) {
        $admin_name = $_POST['AdminName'];
        $admin_password = $_POST['AdminPassword'];

        // if($_POST['AdminName'] == "" || $_POST['AdminName'] == null){
        //     print("Empty username");
        // }

        // if($_POST['AdminPassword'] == "" || $_POST['AdminPassword'] == null){
        //     print("Empty password");
        // }

        $sql = "SELECT * FROM admin_login WHERE Admin_Name = '$admin_name' AND Admin_Password = '$admin_password'";
        $result = $conn->query($sql);

        if($result->num_rows==1){
            session_start();
            $_SESSION['AdminLoginId']=$admin_name;
            header("location: index.php");
        } else {
            echo("<script>alert('Incorrect Password')</script>");
        }
    }

    ?>
</body>

</html>