<?php
  include "navbar.php";
  include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">

    	.wrapper
    	{
    		padding: 10px;
    		margin: 50px auto;
    		width:1000px;
    		height: 600px;
    		background-color: black;
    		opacity: .8;
    		color: white;
            border-radius: 15px;
    	}
    	.form-control
    	{
    		height: 70px;
    		width: 60%;
    	}
    	.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}

    </style>
</head>
<body>

	<div class="wrapper">
		<h4>If you have any suggesions or questions please comment below.</h4>
	<form method="post">
    	<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>    
    	<input class="btn btn-default" type="submit" name="submit" value="Post" style="width: 100px; height: 35px;">
    	<input class="btn btn-danger" type="submit" name="clear" value="Clear Chat" style="width: 100px; height: 35px;">
	</form>
	<script type="text/javascript">
    function clearChat() {
        // Assuming you have a <div> element with the class "scroll" to clear
        var chatDiv = document.querySelector(".scroll");
        chatDiv.innerHTML = ""; // Clear the chat content
    }
	</script>


	
<br><br>
	<div class="scroll">
	<?php
if (isset($_POST['submit'])) {
    if (isset($_SESSION['login_user'])) {
        $sql = "INSERT INTO `comments` VALUES('', 'Admin', '$_POST[comment]');";
        if (mysqli_query($db, $sql)) {
            $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
            $res = mysqli_query($db, $q);

            echo "<table class='table table-bordered'>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "You must log in first to leave a comment.";
    }
} else {
    $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
    $res = mysqli_query($db, $q);

    echo "<table class='table table-bordered'>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['comment']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST['clear'])) {
    if (isset($_SESSION['login_user'])) {
        // Delete all comments
        $clearQuery = "DELETE FROM `comments`";
        if (mysqli_query($db, $clearQuery)) {
            echo "<script>alert('Chat cleared successfully.')</script>";
        } else {
            echo "<script>alert('Error clearing chat.')</script>";
        }
    } else {
        echo "<script>alert('You must log in first to clear the chat.')</script>";
    }
}

?>

	</div>
	</div>
	
</body>
</html>
