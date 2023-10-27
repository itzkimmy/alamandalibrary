<?php 
	include "../connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 500px;
 			background-color: black;
            margin: 0px auto;
            opacity: .7;
            color: white;
            padding: 20px;
            border-radius: 20px;
 		}
 	</style>
 </head>
 <body style="background-color: #008080; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
        <br><br><br>
 		<div class="wrapper">
         <?php

        if(isset($_POST['submit1']))
        {
            ?>
                <script type="text/javascript">
                    window.location="edit.php"
                </script>
            <?php
        }
        $q=mysqli_query($db,"SELECT * FROM user where username='$_SESSION[login_user]' ;");
        ?>
        <h2 style="text-align: center;">My Profile</h2>

        <?php
        $row=mysqli_fetch_assoc($q);

        echo "<br><div style='text-align: center'>
            <img class='img-circle profile-img' height=110 width=120 src='../images/".$_SESSION['pic']."'>
        </div><br>";

        ?>
        <div style="text-align: center;">
        <h2 style="font-family: 'Arial';">Welcome, <?php echo $_SESSION['login_user']; ?></h2>
        </div>
        <?php
        echo "<b>";
        echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<td>";
                    echo "<b> First Name: </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['first'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Last Name: </b>";
                echo "</td>";
                echo "<td>";
                    echo $row['last'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> User Name: </b>";
                echo "</td>";
                echo "<td>";
                    echo $row['username'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Password: </b>";
                echo "</td>";
                echo "<td>";
                    echo $row['password'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> IC: </b>";	
                echo "</td>";
                echo "<td>";
                    echo $row['uic'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Email: </b>";	
                echo "</td>";
                echo "<td>";
                    echo $row['email'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Contact: </b>";
                echo "</td>";
                echo "<td>";
                    echo $row['contact'];
                echo "</td>";
            echo "</tr>";

            
        echo "</table>";
        echo "</b>";
        ?>
</div>
</div>
</body>
</html>