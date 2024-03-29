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
			padding-left: 70%;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
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
    padding-left: 15px;
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
  .container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
	border-radius: 20px;
}
  .scroll
  {
    width: 100%;
    height: 400px;
    overflow: auto;
  }
  th,td
  {
    width: 10%;
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
  <div class="container">
    
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>

      <div style="float: left; padding: 25px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
        <?php
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT user.username,uic,books.bid,name,authors,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT user.username,uic,books.bid,name,authors,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT user.username,uic,books.bid,name,authors,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "IC No";  echo "</th>";
        echo "<th>"; echo "ISBN";  echo "</th>";
        echo "<th>"; echo "Title";  echo "</th>";
        echo "<th>"; echo "Author";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scIC'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['uic']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
    }
    else {
      ?>
      <h3 style="text-align: center;">You Must login to see Expired List</h3>
    <?php
  }
    ?>
</div>
</body>
</html>