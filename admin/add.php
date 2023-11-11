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
        background-color: #008080;
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

        .book
        {
            width: 400px;
            margin: 0px auto;
        }
        .form-control
        {
        background-color: #080707;
        color: white;
        height: 40px;
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

  <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue.php">Issue Information</a></div>
  <div class="h"> <a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776;</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post" enctype="multipart/form-data">

        <input type="file" name="image" class="form-control"  accept=".jpg, .jpeg, .png" required=""><br>
        <input type="text" name="bid" class="form-control" placeholder="Book ISBN" required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Title" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Author" required=""><br>
        <input type="text" name="publisher" class="form-control" placeholder="Publisher" required=""><br>
        <input type="text" name="published" class="form-control" placeholder="Published" required=""><br>
        <input type="text" name="language" class="form-control" placeholder="Language" required=""><br>
        <textarea name="description" class="form-control" placeholder="Description" required></textarea><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>

  <?php
if (isset($_POST['submit'])) {
  if (isset($_SESSION['login_user'])) {
      // Get the uploaded image file
      $image = $_FILES['image'];

      // Check if the file was uploaded without errors
      if ($image['error'] === UPLOAD_ERR_OK) {
          // Extract the file extension
          $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);

          // Get the book ID
          $book_id = $_POST['bid'];

          // Generate a unique filename based on the book ID
          $new_filename = "../bookimage/" . $book_id . '.' . $file_extension;

          // Move the uploaded image to the new location with the unique filename
          if (move_uploaded_file($image['tmp_name'], $new_filename)) {
              // Create a prepared statement to insert the book data
              $sql = "INSERT INTO books (image, bid, name, authors, publisher, published, language, description, status, quantity) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

              $stmt = mysqli_prepare($db, $sql);

              if ($stmt) {
                  // Bind parameters with proper data types
                  mysqli_stmt_bind_param($stmt, "ssssssssss", $new_filename, $book_id, $_POST['name'], $_POST['authors'], $_POST['publisher'], $_POST['published'], $_POST['language'], $_POST['description'], $_POST['status'], $_POST['quantity']);

                  // Execute the statement
                  if (mysqli_stmt_execute($stmt)) {
                      ?>
                      <script type="text/javascript">
                          alert("Book Added Successfully.");
                      </script>
                      <?php
                  } else {
                      // Handle any database insertion errors
                      echo "Error: " . mysqli_error($db);
                  }

                  // Close the prepared statement
                  mysqli_stmt_close($stmt);
              } else {
                  // Handle the case where the statement preparation fails
                  echo "Error: Failed to prepare the statement.";
              }
          } else {
              // Handle the case where the image upload or move fails
              echo "Error: Failed to upload and move the image file.";
          }
      } else {
          // Handle file upload errors
          echo "Error: File upload failed. Error code: " . $image['error'];
      }
  } else {
      // Handle the case where the user is not logged in
      ?>
      <script type="text/javascript">
          alert("You are not logged in. Please log in to add a book.");
      </script>
      <?php
  }
}

?>


</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#024629";
}
</script>

</body>