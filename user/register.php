<?php
  include "../connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Alamanda Library</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img">

    <br><br><br><br>
    
    <div class="box2">
        <h1 style="text-align: center; font-size: 30px;">User Registration Form</h1>
        <br><br>
      <form name="Registration" action="" method="post">
        
        <div class="login">
        <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="uic" placeholder="IC No" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
          <input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width: 70px; height: 30px" style="color: white; padding-left: 15px;">
          Already have an account?<a style="color: yellow; text-decoration: none;" href="userLogin.php">&nbspLogin</a>
        </div>
      </form>
     
    </div>
  </div>
</section>

<?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT username from `user`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `USER` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[uic]', '$_POST[email]', '$_POST[contact]', 'p.jpg');");
        ?>
          <script type="text/javascript">
            alert("Registration successful");
        </script>
        <?php

        header("Location: userLogin.php");
        exit();
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

?>

</body>
</html>