
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<span class="login100-form-title p-b-37">
				Login
			</span>
			<div id="response" class="bg-danger text-center"></div>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
				<input class="input100" type="text" placeholder="username" id="username" name="username" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" required>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
				<input class="input100" id="password" type="password" name="password" placeholder="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input m-b-25">

				<input  type="checkbox" name="remember" id="remember" value="0" onchange="toggleCheckbox(this)" > Remember Me
			</div>

			<div class="container-login100-form-btn">
				<button id="loginbtn" class="login100-form-btn" type="submit" value="Login">
					Login
				</button>
			</div>

			<div class="text-center">
				<br> <p>Dont have an account ?</p>
				<br>
				<a href="signup.html" class="txt2 hov1">
					Sign Up
				</a><br>

				<a href="forgot.html" class="txt2 hov1">
					Forget password
				</a>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/login-check.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>