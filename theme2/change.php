<?php
include("../user_status.php");
?>
<!DOCTYPE html>
<html lang="en" onload="StartTimers();" onmousemove="ResetTimers();" ontouchmove="ResetTimers();">
<head>
	<title>reset</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<span class="login100-form-title">
					Change password
				</span>
				<div id="response" class="bg-danger text-center"></div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="password input100" id="oldpass" type="password" name="oldpass" placeholder="current password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="password input100" id="newpass" type="password" name="newpass" placeholder="new Password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = " confirm Password">
					<input class="password input100" id="newpass2" type="password" name="newpass2" placeholder="confirm Password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<br><div class="container-login100-form-btn pb-2">
					<button id="changebtn" class="login100-form-btn" type="submit" value="Change">
						done
					</button>
				</div>
				<button class="login100-form-btn bg-primary" onclick="window.location.href = '../index.php';">
					Back to home
				</button>
			</div>
		</div>
	</div>
	
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
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>