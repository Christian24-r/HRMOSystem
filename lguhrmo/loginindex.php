<?php
session_start();
session_destroy();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = md5($password);
    require_once "conn.php";
    $sql = "SELECT * FROM tbl_user WHERE `username` = '$username' and `password`='$hashedPassword'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if ($user["usertype"] == 'ADMIN') {
            session_start();
            $_SESSION["usertype"] =  $user["usertype"];
            $_SESSION["tbl_user"] = "yes";
            header("Location: dashboard.php");
            die();
        }
        else if($user["usertype"] == 'PESO'){
            session_start();
            $_SESSION["usertype"] =  $user["usertype"];
            $_SESSION["tbl_user"] = "yes";
            header("Location: dashboard-user.php");
            die();
        }
         else {
            // Show password error message as a JavaScript alert
             echo "<script>alert('Password does not match');</script>";
           
        }
    } else {
        // Show username error message as a JavaScript alert
        echo "<script>alert('Username does not match');</script>";
        
       
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/lgu.png">
	<title>HRMS Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/lgu.png">
		</div>
		<div class="login-content">
			<form method="post" action="loginindex.php">
				<img src="img/lgu.png">
				<h3 class="title">Welcome to Human Resources Management System</h3>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name = "username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name = "password">
            	   </div>
            	</div>

            	<input type="submit" class="btn" value="Login" name= "login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
