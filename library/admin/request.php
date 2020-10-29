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
				background-image: url("image/1.jpg");
				background-repeat: no-repeat;
				background-size: 1364px 660px;
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
.container{
	height: 700px;
	background-color:black;
	opacity: .6;
	color: white;
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
<div class="container">
	<h3 style="text-align: center;">Request Of Book</h3>
<?php
if(isset($_SESSION['login_user']))
{
	$sql="SELECT student.username ,roll,books.book_id, name,author,edition,status FROM student inner join issu_book ON student.username=issu_book.username inner join books ON issu_book.book_id WHERE issu_book.approve='' ;";
	$res=mysqli_query($db, $sql);

	if(mysqli_num_rows($res)==0){
		echo "<h2><b>";
		echo "There's no pending request.";
		echo "</h2></b>";
	}
	else
	{
		echo "<table class='table table-bordered '>";
					echo "<tr style='background-color: #9ac5da;'>";

						echo "<th>"; echo "Username"; echo "</th>";
						echo "<th>"; echo "Roll No"; echo "</th>";

						echo "<th>"; echo "Book_id"; echo "</th>";
						echo "<th>"; echo "Book Name"; echo "</th>";
						echo "<th>"; echo "Edition"; echo "</th>";
						echo "<th>"; echo "Status"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['roll']; echo "</td>";
							echo "<td>"; echo $row['book_id']; echo "</td>";
							echo "<td>"; echo $row['author']; echo "</td>";
							echo "<td>"; echo $row['edition']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";
							
						echo "</tr>";
					}
				echo "</table>";

		}
	
	}
	else
	{
		?>
		<br>
		<h4 style="text-align: center;">"You need to login to show the request</h4>
		


		<?php
	}

		?>
	</div>

</body>
</html>
