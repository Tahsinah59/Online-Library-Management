<?php

	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT_INFO</title>

	<style type="text/css">
		
		
			
			.srch{
				padding-left: 980px;
			}
		
	</style>
</head>
<body>
<!----------------------------------------------Search Bar--------------------------->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" style="width:300px"; type="text" name="search" placeholder="Search username..." required="">
			
				<button style="background-color:#9ac5da; " type="submit" name="submit" class="btn btn-default">
			

				<span class="glyphicon glyphicon-search"></span>
				
			</button>
		</form>
		
	</div>





	<h2>List of Students</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db, "SELECT first,last,username,roll,email FROM student WHERE username like '%$_POST[search]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No student found. Try again.";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr style='background-color: #9ac5da;'>";

						echo "<th>"; echo "FIRST NAME"; echo "</th>";
						echo "<th>"; echo "LAST NAME"; echo "</th>";

						echo "<th>"; echo "USERNAME"; echo "</th>";
						echo "<th>"; echo "Roll"; echo "</th>";
						echo "<th>"; echo "Email"; echo "</th>";
						
					echo "</tr>";

					while($row=mysqli_fetch_assoc($q))
					{
						echo "<tr>";
							echo "<td>"; echo $row['first']; echo "</td>";
							echo "<td>"; echo $row['last']; echo "</td>";
							echo "<td>"; echo $row['username']; echo "</td>";
							
							echo "<td>"; echo $row['roll']; echo "</td>";
							echo "<td>"; echo $row['email']; echo "</td>";
							
						echo "</tr>";
					}
				echo "</table>";
			}

		}
		else
		{

		$res=mysqli_query($db,"SELECT  first,last,username,roll,email FROM `student`  ;");
		echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #9ac5da;'>";

				echo "<th>"; echo "FIRST NAME"; echo "</th>";
				echo "<th>"; echo "LAST NAME"; echo "</th>";

				echo "<th>"; echo "USERNAME"; echo "</th>";
				echo "<th>"; echo "Roll"; echo "</th>";
				echo "<th>"; echo "Email"; echo "</th>";

			echo "</tr>";

				while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";
					echo "<td>"; echo $row['first']; echo "</td>";
					echo "<td>"; echo $row['last']; echo "</td>";
					echo "<td>"; echo $row['username']; echo "</td>";
							
					echo "<td>"; echo $row['roll']; echo "</td>";
					echo "<td>"; echo $row['email']; echo "</td>";
					echo "</tr>";
				}
		echo "</table>";
	}
	?>

</body>
</html>