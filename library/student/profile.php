<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		profile
	</title>

	<style type="text/css">
		.wrapper{
			width: 500px;
			margin:0 auto;
			color: white;
			background-color: black;
		}
	</style>
</head>
<body style="background-color: #004528;">

	<div>
		<form action="", method="">
			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
			
		</form>

		<div class="wrapper">
			<?php
				$q=mysqli_query($db,"SELECT * FROM student WHERE username='$_SESSION[login_user]';");
			 ?>
			 <h2 style="text-align: center;">My Profile</h2>
			 <?php
			 	$row=mysqli_fetch_assoc($q);
			 	echo "<div style='text-align:center'><img  height=150 width=150 src='image/prfl.png ". $_SESSION['pic']."'></div>";
			 ?>

			 <div style="text-align: center;"><b>Welcome</b>
			 <h4>
			 	<?php
			 		echo $_SESSION['login_user'];

			 	?>
			 </h4>
			 </div>
			 <?php  
			 	echo "<br>";
			 	echo "<table class='table table-bordered'>";
			 		echo "<tr>";
			 			echo "<td>";
			 				echo "<b> First Name: </b>";
			 			echo "</td>";
			 		
			 			echo "<td>";
			 				echo $row['first'];
			 			echo "</td>";
			 		echo "</tr>";


			 		echo "<tr>";
			 			echo "<td>";
			 				echo "<b> Last Name: </b>";
			 			echo "</td>";
			 		
			 			echo "<td>";
			 				echo $row['last'];
			 			echo "</td>";
			 		echo "</tr>";


			 		echo "<tr>";
			 			echo "<td>";
			 				echo "<b> Username: </b>";
			 			echo "</td>";
			 		
			 			echo "<td>";
			 				echo $row['username'];
			 			echo "</td>";
			 		echo "</tr>";


			 		echo "<tr>";
			 			echo "<td>";
			 				echo "<b> Roll: </b>";
			 			echo "</td>";
			 		
			 			echo "<td>";
			 				echo $row['roll'];
			 			echo "</td>";
			 		echo "</tr>";

			 		echo "<tr>";
			 			echo "<td>";
			 				echo "<b> Email: </b>";
			 			echo "</td>";
			 		
			 			echo "<td>";
			 				echo $row['email'];
			 			echo "</td>";
			 		echo "</tr>";

			 	echo "</table>";
			 	echo "</br>";
			 ?>

		</div>
	</div>

</body>
</html>