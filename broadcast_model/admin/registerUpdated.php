<script src="https://kit.fontawesome.com/d42c36ec92.js" crossorigin="anonymous"></script>

<?php
// include("includes/header.php");
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}
?>
<?php include('includes/connection.php');
include('includes/header.php');
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
        <?php
        echo $row["Admin_Password"];
        ?>
        </td>
        <td align="center" style="padding:10px;"><a href="updateAdmin.php?id=<?php echo $row['id'] ?>" style="color: green;"><i class="fa fa-edit"></i></a></td>
        <td align="center" style="padding:10px;"><a href="delete.php?id=<?php echo $row['id'] ?>" style="color: red;"><i class="fa fa-trash"></i></a></td>
        </tr>
        <tr>
        	<td align="center" style="padding:10px;"><a href="adminAdmin.php?id=<?php echo $row['id'] ?>" style="color: green;">Add Admin</a></td>
        </tr>
   <?php
    }
}
    ?>
</table>