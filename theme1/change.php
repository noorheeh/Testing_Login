<?php
include("../user_status.php");
?>
<!DOCTYPE html>
<html onload="StartTimers();" onmousemove="ResetTimers();" ontouchmove="ResetTimers();">
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/change-pass.js"></script>

</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Change password</h3>
				</div>
				<div class="card-body">
					<div id="response" class="bg-danger text-center"></div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="oldpass" class="password form-control" name="oldpass" placeholder="Curunt password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="newpass" class="password form-control" name="newpass" placeholder="New password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="newpass2" class="password form-control" name="newpass2" placeholder="New password" required>
					</div>
					<div class="form-group">
						<input type="submit" id="changebtn" value="Change" class="btn float-right login_btn" >
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						<a href="../index.php">Return to home</a>
					</div>
				</div>
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
</body>
</html>