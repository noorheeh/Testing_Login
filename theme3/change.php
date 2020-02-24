<?php
include("../user_status.php");
?>
<!DOCTYPE html>
<html lang="en" onload="StartTimers();" onmousemove="ResetTimers();" ontouchmove="ResetTimers();">
<head>
	<title>Login </title>
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
				Change password 
			</span>
			<div id="response" class="bg-danger text-center"></div>

			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter a current password ">
				<input class="password input100" type="password" id="oldpass" name="oldpass" placeholder="enter current password" required>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-25" data-validate = " new password">
				<input id="newpass" class="password input100" type="password" name="newpass " placeholder="new password" required>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-25" data-validate = " again Enter  new password">
				<input id="newpass2" class="password input100" type="password" name="newpass2 " placeholder="again enter new password" required>
				<span class="focus-input100"></span>
			</div>

			<div class="container-login100-form-btn">
				<input id="changebtn" class="login100-form-btn" type="submit" value="Change">
			</div>
<button class="login100-form-btn bg-primary" onclick="window.location.href = '../index.php';">
							Back to Home
						</button>		
					</div>
	</div>
</div>

<div id="dropDownSelect1"></div>

<script type="text/javascript">
	// Set timeout variables.
	var timoutNow = <?php 
	$query = "SELECT * FROM settings WHERE `id` = 1;";
	$result = mysqli_query($conn, $query) or die("Invalid query");
	$num = mysqli_num_rows($result);
	if($num > 0){	
		$data = mysqli_fetch_array($result);
		echo $data["inactivity_time"];

	}else{
		echo "60000";  // Timeout in 1 min.
	}
	mysqli_close($conn);

	?>;
	var timeoutTimer;

// Start timers.
function StartTimers() {
	timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
}

// Reset timers.
function ResetTimers() {
	clearTimeout(timeoutTimer);
	StartTimers();
}

// Logout the user.
function IdleTimeout() {
	alert("Session Timeout");
	window.location = '../logout.php';
}

</script>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/change-pass.js"></script>
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