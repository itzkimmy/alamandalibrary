<?php
  include "../connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 800px;
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
        color: #f1f1f1;
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
                	
                { 
                    echo "<img class='img-circle profile_img' height=120 width=120 src='../images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                
                ?>
            </div>
<br><br>
  <div class="h"><a href="add.php">Add Book</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue.php">Issue Information</a></div>
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

<div class="container">
    <div class="srch">
	<form class="navbar-form" method="post" name="form1">
			
			<input class="form-control" type="text" name="search" placeholder="User username.." required="">
			<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span>
			</button>
	</form>
    </div>

    <h2>List Of Users</h2>
    <?php
    if (isset($_POST['submit'])) {
        // Your search logic
    } else {
        $res = mysqli_query($db, "SELECT first,last,username,uic,email,contact FROM `user`;");
        echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
        // Table header
        echo "<th>"; echo "First Name"; echo "</th>";
        echo "<th>"; echo "Last Name"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
        echo "<th>"; echo "IC No"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "<th>"; echo "Contact"; echo "</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>"; echo $row['first']; echo "</td>";
            echo "<td>"; echo $row['last']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['uic']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; echo $row['contact']; echo "</td>";
            echo "<td>";
			echo "<form method='post'>";
			echo "<input type='hidden' name='bid' value='" . $row['uic'] . "'/>";
			echo "<button type='submit' name='submit2' class='btn btn-danger'>Delete</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";	
        }
        echo "</table>";
    }

    if (isset($_POST['submit2'])) {
        // Your delete logic
        if (isset($_SESSION['login_user'])) {
            $bidToDelete = $_POST['bid'];
            $checkUserQuery = "SELECT * FROM user WHERE uic = '$bidToDelete'";
            $result = mysqli_query($db, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                $deleteQuery = "DELETE FROM user WHERE uic = '$bidToDelete'";
                if (mysqli_query($db, $deleteQuery)) {
                    ?>
                    <script type="text/javascript">
                        alert("Delete Successful.");
                        window.location = "user.php"; // Change this to the current page
                    </script>
                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("Error deleting user.");
                    </script>
                    <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("User does not exist.");
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Please Login First.");
            </script>
            <?php
        }
    }
    ?>
</div>
</body>
</html>