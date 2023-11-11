<?php
  include "../connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body 
    {
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

  			<div style="color: white; margin-left: 60px; font-size: 25px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='../images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
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
        // Table header
        echo "<th></th>";
        echo "<th>ISBN</th>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Publisher</th>";
        echo "<th>Status</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr>";
            // Modify the image tag to set height and width
            echo "<td><img src='" . $row['image'] . "' height='200' width='150'></td>";
            echo "<td>" . $row['bid'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['authors'] . "</td>";
            echo "<td>" . $row['publisher'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td><a href='bookdetails.php?bid=" . $row['bid'] . "' style='background-color: #00FFFF;' class='btn btn-default'>Details</a></td>";
            echo "<td><a href='editbook.php?bid=" . $row['bid'] . "' style='background-color: yellow;' class='btn btn-default'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    $res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");

    echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color: #6db6b9e6;'>";
    // Table header
    echo "<th></th>";
    echo "<th>ISBN</th>";
    echo "<th>Title</th>";
    echo "<th>Author</th>";
    echo "<th>Publisher</th>";
    echo "<th>Status</th>";
    echo "<th>Quantity</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td><img src='" . $row['image'] . "' height='200' width='150'></td>";
        echo "<td>" . $row['bid'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['authors'] . "</td>";
        echo "<td>" . $row['publisher'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>
        <a href='bookdetails.php?bid=" . $row['bid'] . "' style='background-color: #00FFFF;' class='btn btn-default'>Details</a>
        &nbsp;&nbsp;
        <a href='editbook.php?bid=" . $row['bid'] . "' style='background-color: yellow;' class='btn btn-default'>Edit</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
}
	?>
</div>
</body>
</html>