<?php 
	include "../connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="box1">
		<div style="text-align: center;">
        <br>
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
        <br><br><br>
		</div>
		<div style="padding-left: 5px; ">
		<form action="" method="post" >
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
		</form>

	</div>
    <?php

if(isset($_POST['submit']))
{
    if(mysqli_query($db,"UPDATE user SET password='$_POST[password]' WHERE username='$_POST[username]'
    AND email='$_POST[email]' ;"))
    {
        ?>
            <script type="text/javascript">
                alert("The Password Updated Successfully.");
                window.location = "userLogin.php";
            </script>
        <?php
    }
    
}
?></div>
</body>
</html>