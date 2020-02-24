<?php
include 'config.php';
include 'theme.php';
session_start();

if (empty($_SESSION["username"]))
    header('Location: '.theme().'/index.php');

		$query = "SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "';";
	$result = mysqli_query($conn, $query) or die("Invalid query");
	$num = mysqli_num_rows($result);
	if($num > 0){

		$data = mysqli_fetch_array($result);
		if($data["active"] == "off"){
  		header("Location: ".theme()."/index.php");
}elseif ($data["blocked"] == "on") {
	echo "<script>alert('You are blocked by Admin');
		window.location.assign('".theme()."/index.php');</script>";
   	$update = "UPDATE `users` SET `date` = CURRENT_TIME(),`active` = 'off' WHERE `username` = '".$_SESSION["username"]."';";
   	  $result = mysqli_query($conn, $update) or die(mysql_error());

}
        }


 
?>