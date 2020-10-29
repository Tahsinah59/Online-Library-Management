<?php
	include "connection.php";
	include "navbar.php";
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student-login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style type="">
		
		section
		{
			margin-top: -20px;
		}

	</style>


</head>
<body>


	

	<section>
		<div class="log_img">
			<br><br><br>
			<div class="box1">
				<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console">Library Management System</h1>
				<h1 style="text-align: center; font-size: 25px;">Usser Login Form</h1>
				
			<form name="login"; action=""; method="post">
				<div class="login"><br>
				<input class="form-control" type="text" name="username" placeholder="username"><br>
				<input class="form-control" type="password" name="password" placeholder="Password"><br>
				<input class="btn btn-default" type="submit" name="submit" value="log-in" style="color: #ec0808; width:70px; height: 30px"><br>
				</div>
			</form>
			<p style="color: black">
				<br>
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a style="color: black"; href="update_password.php">Forgot Password?</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
				New To This Website? <a style="color:black"; href="registration.html">Sign Up</a>
			</p>
				
			</div>
			
		</div>
	</section>


	<?php
    if(isset($_POST['submit'])){
      $count=0;
      $res= mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]'; ");

       $p=mysqli_fetch_assoc($res);
      $count= mysqli_num_rows($res);
      if($count==0){
        ?>
          <script type="text/javascript">
            alert("username and password doesnt exist");
          </script>
        <?php
          
      }
      else{
      	$_SESSION['login_user'] = $_POST['username'];
      		$_SESSION['pic'] = $row['pic'];
        ?>
          <script type="text/javascript">
            window.location="index.php";
          </script>
        <?php
      }
    }


  ?>


</body>
</html>