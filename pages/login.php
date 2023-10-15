<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Noticeboard Login</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">

</head>

<style>
    .alert {
	padding: 20px;
	background-color: #f44336;
	color: white;
  }
  
  .closebtn {
	margin-left: 15px;
	color: white;
	font-weight: bold;
	float: right;
	font-size: 22px;
	line-height: 20px;
	cursor: pointer;
	transition: 0.3s;
  }
  
  .closebtn:hover {
	color: black;
  }
</style>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="login.php" method = "post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Code" name ="code">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<?php
require('../conn/db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST["code"];
    $pass = $_POST["password"];

    if (empty($code) || empty($pass)) {
        echo "Code and password are required fields.";
    } else {
        $sql = "SELECT * FROM `users` WHERE `code` = '$code'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row["password"];
            $codestr = strval($code);
            $length = strlen($codestr);
            if ($pass === $storedPassword) {
                if($length >= 5){
                    header("Location: noticeboard.php");
                    exit;
                }elseif($length==4){
                    header("Location: admin.php");
                    exit;
                }
            } else {
                echo '<div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                        <strong>Invalid Credential!</strong> Enter correct code and password.
                      </div>';
                
            }
        } else {
            echo "User not found.";
        }
    }
} else {
    // Handle cases where the form was not submitted
    echo "Not Found";
}
?>

</body>
</html>
