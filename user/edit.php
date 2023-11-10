<?php
	include "navbar.php";
	include "../connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin: auto;
			width: 300px;
            height: 650px;
            background-color: black;
            margin: 0px auto;
            opacity: .7;
            color: white;
            padding: 20px;
            border-radius: 20px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #008080;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
    <?php
		
		$sql = "SELECT * FROM user WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysqli_error($db));

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
            $uic=$row['uic'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>

	<div style="text-align: center;">
	<h2 style="color: white; font-family: 'Arial';">Welcome, <?php echo $_SESSION['login_user']; ?></h2>
	</div>
	
	<div class="form1">
    <form action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="file" name="file">

        <label><h4><b>First Name: </b></h4></label>
        <input class="form-control" type="text" name="first" value="<?php echo isset($first) ? $first : ''; ?>">

        <label><h4><b>Last Name</b></h4></label>
        <input class="form-control" type="text" name="last" value="<?php echo isset($last) ? $last : ''; ?>">

        <label><h4><b>Username</b></h4></label>
        <input class="form-control" type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">

        <label><h4><b>Password</b></h4></label>
        <input class="form-control" type="text" name="password" value="<?php echo isset($password) ? $password : ''; ?>">

        <label><h4><b>IC No</b></h4></label>
        <input class="form-control" type="text" name="uic" value="<?php echo isset($uic) ? $uic : ''; ?>">

        <label><h4><b>Email</b></h4></label>
        <input class="form-control" type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">

        <label><h4><b>Contact No</b></h4></label>
        <input class="form-control" type="text" name="contact" value="<?php echo isset($contact) ? $contact : ''; ?>">

        <br>
        <div style="padding-left: 100px;">
            <button class="btn btn-default" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $uic = $_POST['uic'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pic = $_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], "../images/" . $pic);

    $sql1 = "UPDATE user SET pic='$pic', first='$first', last='$last', username='$username', password='$password', uic='$uic', email='$email', contact='$contact' WHERE username='" . $_SESSION['login_user'] . "';";

    if (mysqli_query($db, $sql1)) {
        ?>
        <script type="text/javascript">
            alert("Saved Successfully.");
            window.location = "profile.php";
        </script>
        <?php
    }
}
?>

</body>
</html>