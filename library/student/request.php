<?php
	include "connection.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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


  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="request.php">Book Request</a>
  <a href="issu_info.php">Issue Information</a>
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
<?php
if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db, "SELECT * FROM issu_book WHERE username='$_SESSION[login_user]';");

			if(mysqli_num_rows($q)==0)
			{
				echo "There is no pending request";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr style='background-color: #9ac5da;'>";

						echo "<th>"; echo "Book_ID"; echo "</th>";
						echo "<th>"; echo "Approve Status"; echo "</th>";

						echo "<th>"; echo "Issue Date"; echo "</th>";
						echo "<th>"; echo "Return Date"; echo "</th>";
						
					echo "</tr>";

					while($row=mysqli_fetch_assoc($q))
					{
						echo "<tr>";
							echo "<td>"; echo $row['book_id']; echo "</td>";
							echo "<td>"; echo $row['approve']; echo "</td>";
							echo "<td>"; echo $row['issu']; echo "</td>";
							echo "<td>"; echo $row['returnn']; echo "</td>";
							
						echo "</tr>";
					}
				echo "</table>";
			}

		}
		else
		{
			echo "</br></br></br>";
			echo "<h2><b>";
			echo "Please login first to see the request";
			echo "</h2><b>";
		}
		?>

</body>
</html>