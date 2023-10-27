<?php
  include "navbar.php";
  include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <br>
        <h1 style="text-align: center; font-size: 35px;font-family: Arial;">Admin Login</h1>
        <br><br><br>
      <form  name="login" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br><br>
        <a style="color:yellow;text-decoration: none;" href="forgot.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp  
        New to this website?<a style="color: yellow; text-decoration: none;" href="register.php">&nbspRegister</a>
      </p>
    </form>
    </div>
  </div>
</section>

  <?php
    if (isset($_POST['submit'])) {
      $count = 0;
      $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
  
      $row = mysqli_fetch_assoc($res);
  
      $count = mysqli_num_rows($res);
  
      if ($count == 0) {
          ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
              <strong>The user doesn't exist or the username and password don't match</strong>
          </div>
          <?php
      }
      else
      {
        /*-------------if username & password matches---*/

        $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="profile.php"
          </script>
        <?php
      }
    }

  ?>

</body>
</html>