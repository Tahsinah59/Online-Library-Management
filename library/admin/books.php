<?php

	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		
		
			
			.srch{
				padding-left:900px;
			}

			body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  margin-top:60px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.h:hover{
	color: white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
		
	</style>
</head>
<body>

	<!----------------side nav------------------>

	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


  <div style="color: #FFC0CB ;font-family: 'Kurale', serif; margin-left: 70px; margin-top: 13px;">


	<?php
	if(isset($_SESSION['login_user'])){
	echo "<img class='img_circle profile_img' height=80 width=80 src='image/prfl.png". $_SESSION['pic']."'>";	
		echo "<br>"	;
		echo "Welcome  ".$_SESSION['login_user'];
	}
		?>
</div>
<br><br>

  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delete.php">Delete Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="#">Issu Information</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<!--------------search bar--------------->


<div class="srch">
		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" style="width:300px"; type="text" name="search" placeholder="Search books..." required="">
			
				<button style="background-color:#9ac5da; " type="submit" name="submit" class="btn btn-default">
			

				<span class="glyphicon glyphicon-search"></span>
				
			</button>
		</form>


		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" style="width:300px"; type="text" name="book_id" placeholder="Enter Book ID" required="">
			
				<button style="background-color:#9ac5da; " type="submit" name="submit1" class="btn btn-default">
			

				<span >Delete</span>
				
			</button>
		</form>
		
	</div>


	<h2>List of Books</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db, "SELECT * FROM books WHERE name like '%$_POST[search]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No books found. Try again.";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr style='background-color: #9ac5da;'>";

						echo "<th>"; echo "ID"; echo "</th>";
						echo "<th>"; echo "Book Name"; echo "</th>";

						echo "<th>"; echo "Authors Name"; echo "</th>";
						echo "<th>"; echo "Edition"; echo "</th>";
						echo "<th>"; echo "Status"; echo "</th>";
						echo "<th>"; echo "Quantity"; echo "</th>";
						echo "<th>"; echo "Depertment"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_assoc($q))
					{
						echo "<tr>";
							echo "<td>"; echo $row['book_id']; echo "</td>";
							echo "<td>"; echo $row['name']; echo "</td>";
							echo "<td>"; echo $row['author']; echo "</td>";
							echo "<td>"; echo $row['edition']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";
							echo "<td>"; echo $row['quantity']; echo "</td>";
							echo "<td>"; echo $row['depertment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}

		}
		else
		{

		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC ;");
		echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #9ac5da;'>";

				echo "<th>"; echo "ID"; echo "</th>";
				echo "<th>"; echo "Book Name"; echo "</th>";

				echo "<th>"; echo "Authors Name"; echo "</th>";
				echo "<th>"; echo "Edition"; echo "</th>";
				echo "<th>"; echo "Status"; echo "</th>";
				echo "<th>"; echo "Quantity"; echo "</th>";
				echo "<th>"; echo "Depertment"; echo "</th>";

			echo "</tr>";

				while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";
					echo "<td>"; echo $row['book_id']; echo "</td>";
					echo "<td>"; echo $row['name']; echo "</td>";
					echo "<td>"; echo $row['author']; echo "</td>";
					echo "<td>"; echo $row['edition']; echo "</td>";
					echo "<td>"; echo $row['status']; echo "</td>";
					echo "<td>"; echo $row['quantity']; echo "</td>";
					echo "<td>"; echo $row['depertment']; echo "</td>";
					echo "</tr>";
				}
		echo "</table>";
	}

	if(isset($_POST['submit1'])){
		if(isset($_SESSION['login_user'])){
			mysqli_query($db,"DELETE FROM books WHERE book_id='$_POST[book_id]';");

			?>
				<script type="text/javascript">
					alert("Deleted Successfully.");
				</script>

			<?php
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Please login first.");
				</script>

			<?php

		}
	}

	?>
	</div>

</body>
</html>