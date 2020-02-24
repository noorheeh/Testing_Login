
<?php
include 'theme.php';

session_start();
$conn = mysqli_connect("localhost:3306", "root", "","testing")
or die("Could not connect: ".mysqli_error($conn));

$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM users WHERE username = '" . $username . "';";
$result = mysqli_query($conn, $query) or die("Invalid query");
$num = mysqli_num_rows($result);
if($num > 0){
	$data = mysqli_fetch_array($result);
	if(password_verify($password, $data['password'])){
		if(!empty($_POST["remember"]))
			if ($_POST["remember"] == 1) {
				setcookie("username", $username, time() +(60*60*24*365),"/",null,null,TRUE);
				setcookie("password", $password, time() +(60*60*24*365),"/",null,null,TRUE);
			}
			
			$_SESSION["username"] = $username;
			$update = "UPDATE `users` SET `date` = CURRENT_TIME() , `active` = 'on' WHERE `username` = '$username';";
			$result = mysqli_query($conn, $update) or die(mysql_error());
			echo "<script>window.location.assign('../index.php');</script>";
		}else{
			echo "<label>username or password Invalid</label>";
		}
		
	}else{
		$query = "SELECT * FROM admin WHERE name = '" . $username . "';";
		$result = mysqli_query($conn, $query) or die("Invalid query");
		$num = mysqli_num_rows($result);
		if($num > 0){
			$data = mysqli_fetch_array($result);
			if(password_verify($password, $data['password'])){
				if(!empty($_POST["remember"]))
					if ($_POST["remember"] == 1) {
						setcookie("username", $username, time() +(60*60*24),"/",null,null,TRUE);
						setcookie("password", $password, time() +(60*60*24),"/",null,null,TRUE);
					}
					$_SESSION["admin"] = $username;
					echo "<script>window.location.assign('../admin.php');</script>";
				}
			}else{
				echo "<label>username or password Invalid</label>";
			}
			
		}
		mysqli_close($conn);
		?>
		
		