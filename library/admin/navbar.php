<?php

	session_start();
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>

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

	<link href="https://fonts.googleapis.com/css2?family=Bigelow+Rules&family=Flavors&family=Grand+Hotel&family=Grandstander&family=Kurale&family=Rye&display=swap" rel="stylesheet">


</head>
<body>
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar header">			
					<a class="navbar-brand active"><b>Online Library Management System</b></a>
				</div>

				<?php
					if(isset($_SESSION['login_user'])){
						?>

							<div style="color: #FFC0CB ;font-family: 'Kurale', serif; margin-left: 200px; margin-top: 13px;">
								<?php

						echo "<img class='img_circle profile_img' height=50 width=50 src='image/prfl.png". $_SESSION['pic']."'>";		
						echo " ".$_SESSION['login_user'];
						?>
						</div>
					

					<ul class="nav navbar-nav navbar-right">
						<li class="ul_c"><a href="index.php">HOME</a></li>
						<li class="ul_c"><a href="books.php">BOOKS</a>
						<li class="ul_c"><a href="feedback.php">FEEDBACK</a></li>
						<li class="ul_c"><a href="student.php">STUDENT_INFO</a></li>
						<li class="ul_c"><a href="profile.php">PROFILE</a></li>

						<li class="ul_c"><a href="logout.php"><span class="glyphicon glyphicon-log-out "> LOG-OUT</span></a></li>
					</ul>
						<?php
					}

					else{
						?>
						<ul class="nav navbar-nav navbar-right">
					<li class="ul_c"><a href="index.php">HOME</a></li>
					<li class="ul_c"><a href="books.php">BOOKS</a>
					<li class="ul_c"><a href="feedback.php">FEEDBACK</a></li>

					<li class="ul_c"><a href="admin_login.php"><span class="glyphicon glyphicon-log-in "> LOG-IN</span></a></li>
					
					<li class="ul_c"><a href="registration.php"><span class="glyphicon glyphicon-user "> SIGN-UP</span></a></li>
					
				</ul>
				<?php
					}


				?>
				

			
				
			</div>
		</nav>
	

</body>
</html>