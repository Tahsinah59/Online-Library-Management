<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style type="">
		body{
			
			background-image:url("image/fpass.jpg"); 
			
			background-repeat: no-repeat;
			background-size: 1366px 656px;
		}
		.wrapper{
			width: 400px;
			height: 400px;
			margin: 0 auto;
			background-color: black;
			opacity: .6;
			color: white;

		}
		
		.form-control{
			width: 300px;

		}
		.place{
			padding-left: 50px;
		}

	</style>
</head>
<body>
	<div class="wrapper">
		
		
		<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console">Change Your Password</h1>
		<div class=place>
		<form action="" method="post">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit">Change</button><br>

		</form>
		</div>
	</div>

	<?php
		if(isset($_POST['submit'])){
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
			{
				?>
				<script type="text/javascript">
					alert("The password updated successfully.");
				</script>

				<?php
			}
		}
	?>

</body>
</html>