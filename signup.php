    <?php
    include 'config.php';
	session_start();
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password1"];
	$active = "off";
	$blocked="off"; 	

	$query = 'SELECT * FROM users WHERE username = "'.$username.'" OR email = "'.$email.'";';
	$result = mysqli_query($conn, $query) or die("Invalid query1");
	$num = mysqli_num_rows($result);
	
	if($num > 0){
		$data = mysqli_fetch_array($result);
		if($data["username"] == $username){
			echo "<label>This username already exist</label>";
		}else{
	echo "<label>You have an account</label>";
	}
}
	else  {
		$new_pass =password_hash($password, PASSWORD_DEFAULT); 
		$date = date("Y-m-d H:i:s");
		$query2 = "INSERT INTO `users` (`username`, `password`,`email` ,`date`,`active`,`blocked`) VALUES ('" . $username . "', '" . $new_pass . "','" . $email . "', '" . $date . "', '" . $active . "', '" . $blocked . "');";
		$result2 = mysqli_query($conn, $query2) or die("Invalid query");
			echo "<script>alert('Done!');
		window.location.assign('index.php');</script>";
		
		}
	mysqli_close($conn);
    ?>
    