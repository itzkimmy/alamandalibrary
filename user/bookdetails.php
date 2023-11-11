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

.module {
	box-shadow: 0 0 3px rgba(0,0,0,.1);
	border-color: #e9e9e9;
	margin-bottom: 20px;
    background-color: #fff;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.module-head {
	
	color: black;
    background-color: #999999;
    border-color: #e9e9e9;
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.module-head h3 {
	font-size: 14px;
	line-height: 20px;
	height: 20px;
	margin: 0
}
.module-option {
	border-bottom: 1px solid #e5e5e5;
	padding: 15px 0;
	margin: 0 15px
}
.module-body {
	padding: 15px
}
.module-body.table {
	padding: 15px 0
}
.module-body.table .table th, .module-body.table .table td {
	padding-left: 15px;
	padding-right: 15px
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

<div class="module">
    <div class="module-head">
        <h3>Book Details</h3>
    </div>
    <div class="module-body">
    <?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alamanda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Now you can use $conn in your subsequent code

// Ensure that the 'bid' parameter is set and not empty
if(isset($_GET['bid']) && !empty($_GET['bid'])) {
    $bid = $_GET['bid'];

    // Fetch book details from the database based on the 'bid'
    $sql = "SELECT * FROM books WHERE bid='$bid'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();    

        $bid = $row['bid'];
        $name = $row['name'];
        $authors = $row['authors'];
        $publisher = $row['publisher'];
        $published = $row['published'];
        $language = $row['language'];
        $description = $row['description'];
        $status = $row['status'];
        $quantity = $row['quantity'];

        echo "<b>ISBN:</b> " . $bid . "<br><br>";
        echo "<b>Title:</b> " . $name . "<br><br>";
        echo "<b>Author:</b> " . $authors . "<br><br>";
        echo "<b>Publisher:</b> " . $publisher . "<br><br>";
        echo "<b>Published:</b> " . $published . "<br><br>";
        echo "<b>Language:</b> " . $language . "<br><br>";
        echo "<b>Description:</b><br> " . $description . "<br><br>";
        echo "<b>Status:</b> " . $status . "<br><br>";
        echo "<b>Quantity:</b> " . $quantity . "<br><br>";
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid request. Please provide a valid 'bid' parameter.";
}

// Close the connection
$conn->close();
?>
        <a href="books.php" class="btn btn-primary">Go Back</a>                             
    </div>
</div>
</body>
</html>