<?php
  include "../connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>Alamanda Library</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
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
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='../images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	<h2>List Of Books</h2>
	<?php

if (isset($_POST['submit'])) {
  $q = mysqli_query($db, "SELECT * from books where name like '%$_POST[search]%' ");

  if (mysqli_num_rows($q) == 0) {
      echo "Sorry! No book found. Try searching again.";
  } else {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #6db6b9e6;'>";
      //Table header
      echo "<th>";
      echo "";
      echo "</th>";
      echo "<th>";
      echo "ISBN";
      echo "</th>";
      echo "<th>";
      echo "Title";
      echo "</th>";
      echo "<th>";
      echo "Author";
      echo "</th>";
      echo "<th>";
      echo "publisher";
      echo "</th>";
      echo "<th>";
      echo "Status";
      echo "</th>";
      echo "<th>";
      echo "Quantity";
      echo "</th>";
      echo "</tr>";

      while ($row = mysqli_fetch_assoc($q)) {
          echo "<tr>";
          // Modify the image tag to set height and width
          echo '<td><img src="' . $row['image'] . '" height="200" width="150"></td>';
          echo "<td>";
          echo $row['bid'];
          echo "</td>";
          echo "<td>";
          echo $row['name'];
          echo "</td>";
          echo "<td>";
          echo $row['authors'];
          echo "</td>";
          echo "<td>";
          echo $row['publisher'];
          echo "</td>";
          echo "<td>";
          echo $row['status'];
          echo "</td>";
          echo "<td>";
          echo $row['quantity'];
          echo "</td>";
          echo "<td><a href='bookdetails.php?bid=" . $row['bid'] . "' style='background-color: #00FFFF;' class='btn btn-default'>Details</a></td>";
          echo "<td>";
          echo "<form method='post'>";
          echo "<input type='hidden' name='bid' value='" . $row['bid'] . "'/>";
          echo "<button type='submit' name='submit1' class='btn btn-default'>Request</button>";
          echo "</form>";
          echo "</td>";

          echo "</tr>";
      }
      echo "</table>";
  }
} else {
  $res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");

  echo "<table class='table table-bordered table-hover'>";
  echo "<tr style='background-color: #6db6b9e6;'>";
  //Table header
  echo "<th>";
  echo "";
  echo "</th>";
  echo "<th>";
  echo "ISBN";
  echo "</th>";
  echo "<th>";
  echo "Title";
  echo "</th>";
  echo "<th>";
  echo "Author";
  echo "</th>";
  echo "<th>";
  echo "publisher";
  echo "</th>";
  echo "<th>";
  echo "Status";
  echo "</th>";
  echo "<th>";
  echo "Quantity";
  echo "</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($res)) {
      echo "<tr>";
      echo '<td><img src="' . $row['image'] . '" height="200" width="150"></td>';
      echo "<td>";
      echo $row['bid'];
      echo "</td>";
      echo "<td>";
      echo $row['name'];
      echo "</td>";
      echo "<td>";
      echo $row['authors'];
      echo "</td>";
      echo "<td>";
      echo $row['publisher'];
      echo "</td>";
      echo "<td>";
      echo $row['status'];
      echo "</td>";
      echo "<td>";
      echo $row['quantity'];
      echo "</td>";
      echo "<td><a href='bookdetails.php?bid=" . $row['bid'] . "' style='background-color: #00FFFF;' class='btn btn-default'>Details</a></td>";
      echo "<td>";
      echo "<form method='post'>";
      echo "<input type='hidden' name='bid' value='" . $row['bid'] . "'/>";
      echo "<button type='submit' name='submit1' class='btn btn-warning'>Request</button>";
      echo "</form>";
      echo "</td>";

      echo "</tr>";
  }
  echo "</table>";
}
if (isset($_POST['submit1'])) {
  if (isset($_SESSION['login_user'])) {
      $bid = $_POST['bid'];

      // Check book availability
      $checkAvailabilityQuery = "SELECT status, quantity FROM books WHERE bid = '$bid'";
      $result = mysqli_query($db, $checkAvailabilityQuery);

      if ($result && mysqli_num_rows($result) > 0) {
          $bookData = mysqli_fetch_assoc($result);
          $status = $bookData['status'];
          $quantity = $bookData['quantity'];

          if ($status === 'Available' && $quantity > 0) {
              // The book is available, proceed with the request
              mysqli_query($db, "INSERT INTO issue_book VALUES('$_SESSION[login_user]', '$bid', '', '', '');");
              ?>
              <script type="text/javascript">
                  window.location = "request.php";
              </script>
              <?php
          } else {
              // The book is not available
              ?>
              <script type="text/javascript">
                  alert("This book is not available right now.");
              </script>
              <?php
          }
      } else {
          // Handle the SQL query error
          echo "SQL Error: " . mysqli_error($db);
      }
  } else {
      ?>
      <script type="text/javascript">
          alert("You must log in to request a book.");
      </script>
      <?php
  }
}
?>
</div>
</body>
</html>