<?php 
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}
include('includes/header.php');
?>
<div style="color: whitesmoke; text-align:center; margin-top: 50px">
	<h2>WELCOME TO ADMIN PANEL - <?php
	echo $_SESSION['AdminLoginId'];
	?>
	</h2>
</div>
<script src="https://kit.fontawesome.com/d42c36ec92.js" crossorigin="anonymous"></script>

<?php
// include("includes/header.php");
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}
?>
<?php include('includes/connection.php');
 		$sql= "SELECT * FROM admin_login";
        $result= $conn->query($sql);
?>
<table border ="1" style="width:800px;color:white; margin: 100px;border-collapse: collapse;">
    <tr>
        <th>Admin</th>
        <th>Admin Password</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
        
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
    ?>
        <tr>        
        <td align="center" style="padding:10px ;">
        <?php
        echo $row["Admin_Name"];
        ?>
        </td>
        <td align="center" style="padding:10px ;">
        *******
        </td>
        <td align="center" style="padding:10px;"><a href="updateAdmin.php?id=<?php echo $row['id'] ?>" style="color: green;"><i class="fa fa-edit"></i></a></td>
        <td align="center" style="padding:10px;"><a href="deleteAdmin.php?id=<?php echo $row['id'] ?>" style="color: red;"><i class="fa fa-trash"></i></a></td>
        </tr>

   <?php
    }
    ?>
    	<tr>
    		<td colspan="4" align="center" style="padding:10px;"><a href="addAdmin.php" style="color: green;">Add New Admin</a></td>
    	</tr>
    <?php
}
    ?>
</table>