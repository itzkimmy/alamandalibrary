<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Alamanda Library</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="Logo">
                <img src="../images/logo.png" alt="Library Logo">
                <h1>Alamanda Library</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="adminLogin.php">ADMIN LOGIN</a></li>
                    <li><a href="../user/userLogin.php">USER LOGIN</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
            </nav>
        </header>
        <section class="library_bg">
            <div class="box">
                <br><br><br><br><br><br>
                <h1 style="font-size: 35px;">Welcome to Alamanda Library</h1>
                <br><br><br>
                <p style="font-size: 20px;">Opens at: 09:00</p>
                <br><br><br>
                <p style="font-size: 20px;">Closes at: 17:00</p>
                <br><br><br><br><br><br>
            </div>
        </section>
    </div>
    <?php  

		include "../footer.php";
	?>
</body>
</html>
