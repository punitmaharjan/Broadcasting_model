
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
        $sql=" SELECT * FROM post where id=$id";
        $query= $conn->query($sql);
        $result=$query->fetch_assoc();

?>
			<div class="input-post">
				<h2>Title</h2>
				<input type="text" placeholder="Title" name="PostTitle" value=" <?php
        echo $result["Title"];
        ?>">
			</div>
			<div class="input-post">
				<h2>Content</h2>
				<input type="text" placeholder="Content" name="PostContent" value=" <?php
        echo $result["Content"];
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
    $title=$_POST['PostTitle'];
    $content=$_POST['PostContent'];

    $update= "UPDATE post SET id=$id, Title='$title', Content='$content' WHERE id=$id";
    $qury=$conn->query($update);
    if($qury){
?>
<script>alert('Update Successful');</script>
<?php
    header("location: database.php");
    }
    else{
        ?>
        <script>alert('Not Updated')</script>
<?php
    }
}

?>

