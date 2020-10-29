<?php
	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<style type="text/css">
		nav
		{
		    float: right;
		    word-spacing: 30px;
		    padding: 20px;
		}
		nav li
		{
		    display: inline-block;
		    line-height: 80px;
		}

		.soro
		{

			margin-top: 23px;
    		margin-right: 30px;
		}


	</style>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="logo">			
				<img src="image/ruet-monogram.png" style="margin-left: 10px;" width="100px" height="100px">
				<h1 style="color:white; margin-left: 10px ">Online Library Management System</h1>
			</div>

			<?php
				if (isset($_SESSION['login_user']))
				{
					?>
					<nav>
				<div class="soro">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
					<li><a href="registration.php">REGISTRATION</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
				</div>
			</nav>
			<?php
				}
			else
			{?>
				<nav>
				<div class="soro">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="login.php">LOGIN</a></li>
					<li><a href="registration.php">REGISTRATION</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
				</div>
			</nav>

			<?php

			}
			?>

			
		</header>

		<section>
		<div class="header">
		
			<br>
			<div class="box">
				<br><br><br><br><br><br>
				<h1 style="text-align: center; font-size: 35px">Welcome To Library</h1>
				<h1 style="text-align: center; font-size: 30px">Open at: 9:00am </h1>
				<h1 style="text-align: center; font-size: 30px">Close at: 15:00pm</h1>
			</div>
		</div>
		
		</section>

		
	</div>
	<?php
		include "footer.php";
	?>

</body>
</html>