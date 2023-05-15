<?php include('includes/header.php');
session_start();
if(!isset($_SESSION['AdminLoginId'])){
	header("location: login.php");
}


?>
<?php include('includes/connection.php');
?>
	<div class="AddPost">
		<form action="alert.php" id="postForm" method="POST">
			<div class="input-post">
				<h2>Title</h2>
				<input type="text" placeholder="Title" name="PostTitle">
			</div>
			<div class="input-post">
				<h2>Content</h2>
				<input type="text" placeholder="Content" name="PostContent">
			</div>
			<button class="btn" name="addPost">Add Post</button>
		</form>
	<!-- </div> -->
</div>
</body>
</html>

