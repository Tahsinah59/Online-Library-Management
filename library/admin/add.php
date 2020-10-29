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
				padding-left: 980px;
			}

body {
  background-color: #2ea99b;
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

.form-control{
    width: 400px;
    margin: 0 auto;

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
  <div class="h"><a href="#">Book Request</a></div>
  <div class="h"><a href="#">Issu Information</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color: black; font-family:Lucida Console ; text-align: center;">Add New Books</h2>
    <form class="" action="" method="post" style="text-align: center;">
    <input type="text" name="book_id" class="form-control" placeholder="Book Id" required=""><br>
    <input type="text" name="name" class="form-control" placeholder="Books Name"><br>
    <input type="text" name="author" class="form-control" placeholder="Authors Name" required=""><br>
    <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
    <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
    <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
    <input type="text" name="depertment" class="form-control" placeholder="Department" required=""><br>

    <button  class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>

  <?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user'])){
        mysqli_query($db," INSERT INTO books VALUES('$_POST[book_id]','$_POST[name]','$_POST[author]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[depertment]');");

        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php
      }
      else
      {
        ?>
            <script type="text/javascript">
              alert("You need to log in first.");
            </script>
        <?php
      }
    }

  ?>

</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#2ea99b";
}
</script>

</div>


</html>