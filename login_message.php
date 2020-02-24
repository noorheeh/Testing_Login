<?php
include 'config.php';

	
	$message = $_POST["message"];
	$query = "SELECT * FROM settings WHERE `id` = 1;";
	$result = mysqli_query($conn, $query) or die("Invalid query");
	$num = mysqli_num_rows($result);
	if($num > 0){	
	  $update = "UPDATE `settings` SET `login_messages` = '$message' WHERE `id` = 1;";
  $result = mysqli_query($conn, $update) or die(mysql_error());
	}else{
		$insert ="INSERT INTO `settings`(`id`,`inactivity_time`, `login_messages`,`login_theme`) VALUES ('1','60000','$message','theme1');";
			  $result = mysqli_query($conn, $insert) or die(mysql_error());

		}
		echo "<script>alert('Message set to ".$_POST["message"]."');window.location.assign('settings.php');</script>"
		      ?>
    