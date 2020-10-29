<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student-registration</title>
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
			margin-top: -70px;
		}

	</style>


</head>
<body>
<!--

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar header">			
				
				<a class="navbar-brand active"><b>Online Library Management System</b></a>
			</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="ul_c"><a href="index.html">HOME</a></li>
					<li class="ul_c"><a href="">BOOKS</a>
					<li class="ul_c"><a href="">FEEDBACK</a></li>
					<li class="ul_c"><a href="student_login.html"><span class="glyphicon glyphicon-log-in "> LOG-IN</span></a></li>
					<li class="ul_c"><a href="student_login.html"><span class="glyphicon glyphicon-log-out "> LOG-OUT</span></a></li>
					<li class="ul_c"><a href="registration.html"><span class="glyphicon glyphicon-user "> SIGN-UP</span></a></li>
					
				</ul>
				
			</div>
		</nav>
	-->

	<section>
		<div class="reg_img">
			<br>
			<div class="box2">
				<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console">Library Management System</h1>
				<h1 style="text-align: center;font-size: 25px;">Registration Form</h1>
				
			<form name="registration"; action=""; method="post">
				<div class="login">
				<input class="form-control" type="text" name="first" placeholder="First name" required=""><br>
				<input class="form-control" type="text" name="last" placeholder="Last name" required=""><br>
				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
				<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
				<input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
				<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
				
				
				<input class="btn btn-default" type="submit" name="submit" value="log-in" style="color: #ec0808; width:70px; height: 30px"><br></div>
			</form>
			
				
			</div>
			
		</div>
	</section>

	<?php
	if(isset($_POST['submit']))
	{
		$count=0;
		$sql="SELECT username FREOM student";
		$res=mysqli_query($db,$sql);
		while($row=mysqli_fetch_assoc($res)){
				if($row['username']==$_POST['username']){
					$count=$count+1;
				}

		}

		if($count==0){

		mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','prfl.png');");

	?>
	<script type="text/javascript">
		alert("Registration Succesful");
	</script>

	<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert("The username is always exist.");
	</script>
	<?php
	}
	}
	?>
	

	

</body>
</html>
