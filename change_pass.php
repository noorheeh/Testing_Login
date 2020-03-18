<?php
include 'user_status.php';
$username = $_SESSION["username"];
$oldpass = $_POST["oldpass"];
$newpass = $_POST["newpass"]; 

$query = 'SELECT * FROM users WHERE username = "'.$username.'";';
$result = mysqli_query($conn, $query) or die("Invalid query1");
$num = mysqli_num_rows($result);

if($num > 0){
	$data = mysqli_fetch_array($result);
	if(password_verify($oldpass, $data['password'])){
		$hash_pass =password_hash($newpass, PASSWORD_DEFAULT); 
		$update = "UPDATE `users` SET `password` = '".$hash_pass."' WHERE `username` = '".$username."';";
		$result = mysqli_query($conn, $update) or die(mysql_error());


		echo "<div class='bg-success'><label>Password changed successfuly</label></div>";
	}else{
		echo "password Invalid";
	}
	
}
else  {
	echo "username not found";
	
}
mysqli_close($conn);

?>