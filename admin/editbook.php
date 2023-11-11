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
form {
	margin: 0
}
.form-horizontal .control-group, .form-vertical .control-group {
	margin-bottom: 0
}
.form-horizontal .control-group+.control-group, .form-vertical .control-group+.control-group {
	margin-top: 13px;
	padding-top: 13px;
	border-top: 1px solid #f5f5f5
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
<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alamanda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted for updating
if (isset($_POST['submit'])) {
    $bid = $_GET['bid']; // Use $_POST['bid'] here
    $name = $_POST['Name'];
    $authors = $_POST['Authors'];
    $publisher = $_POST['Publisher'];
    $published = $_POST['Published'];
    $language = $_POST['Language'];
    $description = $_POST['Description'];
    $status = $_POST['Status'];
    $quantity = $_POST['Quantity'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE books SET name=?, authors=?, publisher=?, published=?, language=?, description=?, status=?, quantity=? WHERE bid=?");
    $stmt->bind_param("ssssssssi", $name, $authors, $publisher, $published, $language, $description, $status, $quantity, $bid);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Success')</script>";
        echo "<meta http-equiv='refresh' content='0.01;url=books.php'>";
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error updating book details: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

// Check if the form is submitted for deletion
if (isset($_POST['delete'])) {
    $bid = $_GET['bid']; 

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM books WHERE bid=?");
    $stmt->bind_param("i", $bid);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Success')</script>";
        echo "<meta http-equiv='refresh' content='0.01;url=books.php'>";
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error deleting book: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$bid = $_GET['bid'];
$sql = "SELECT * FROM books WHERE bid='$bid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['name'];
$authors = $row['authors'];
$publisher = $row['publisher'];
$published = $row['published'];
$language = $row['language'];
$description = $row['description'];
$status = $row['status'];
$quantity = $row['quantity'];
?>
<div class="module">
    <div class="module-head">
        <h3>Update Book Details</h3>
    </div>
    <div class="module-body">
        <form class="form-horizontal row-fluid" action="editbook.php?bid=<?php echo $bid ?>" method="post">
        
        <div class="control-group">
                <b><label class="control-label" for="Name">Book Name:</label></b>
                <div class="controls">
                    <input type="text" id="Name" name="Name" value="<?php echo $name ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Authors">Authors:</label></b>
                <div class="controls">
                    <input type="text" id="Authors" name="Authors" value="<?php echo $authors ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Publisher">Publisher:</label></b>
                <div class="controls">
                    <input type="text" id="Publisher" name="Publisher" value="<?php echo $publisher ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Published">Published:</label></b>
                <div class="controls">
                    <input type="text" id="Published" name="Published" value="<?php echo $published ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Language">Language:</label></b>
                <div class="controls">
                    <input type="text" id="Language" name="Language" value="<?php echo $language ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Description">Description:</label></b>
                <div class="controls">
                    <textarea id="Description" name="Description" class="span8" rows="5" style="width: 300px;" required><?php echo $description ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Status">Status:</label></b>
                <div class="controls">
                    <input type="text" id="Status" name="Status" value="<?php echo $status ?>" class="span8" required>
                </div>
            </div>

            <div class="control-group">
                <b><label class="control-label" for="Quantity">Quantity:</label></b>
                <div class="controls">
                    <input type="text" id="Quantity" name="Quantity" value="<?php echo $quantity ?>" class="span8" required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="submit" class="btn">Update Details</button>
                    <!-- Add the delete button -->
                    <button type="submit" name="delete" class="btn btn-danger">Delete Book</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>