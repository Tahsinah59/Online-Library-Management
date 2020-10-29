<?php
	include "connection.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-image: url(image/fbk.jpg);
			background-size: 1364px 0660px;
		}
		.wrapper{
			padding: 10px;
			margin: -20px auto;
			width:900px;
			height: 600px;
			background-color: gray;
			opacity: .8;
			color: white;

		}
		.form-control{
			height: 70px;
			width: 60%;
		}
		.scroll{
			width:100%;
			height:300px ;
			overflow: auto;
		}
	
	</style>
</head>
<body>

	<div class="wrapper">
		<h4>If you haveany suggestion or question please comment below.</h4>
		<form style="" action="" method="post">
			<input  class="form-control "type="text" name="comment" placeholder="Write something..."><br><br>
			<input  class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35; padding-bottom: 25px">

			
		</form>
	

	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comment` VALUES( '','$_POST[comment]');";
				if(mysqli_query($db,$sql)){
					$q="SELECT * FROM `comment` ORDER BY `comment`.`comment` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered'>";
					while($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
								echo "<td>"; echo $row['comment'];  echo"</td>";
						echo "</tr>";
					}
				}
			}
			


		?>
	</div>
</div>

</body>
</html>


