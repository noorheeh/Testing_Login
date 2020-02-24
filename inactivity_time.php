<?php
include 'config.php';

$time = $_POST["time"];
$type = $_POST["type"];
$query = "SELECT * FROM settings WHERE `id` = 1;";
$result = mysqli_query($conn, $query) or die("Invalid query");
$num = mysqli_num_rows($result);
if($type == "h")
	$time = $time*60*60*1000;
elseif($type == "m")
	$time = $time*60*1000;
else
	$time = $time*1000;
if($num > 0){	
	$update = "UPDATE `settings` SET `inactivity_time` = '$time' WHERE `id` = 1;";
	$result = mysqli_query($conn, $update) or die(mysql_error());
}else{
	$insert ="INSERT INTO `settings`(`id`,`inactivity_time`, `login_messages`,`login_theme`) VALUES ('1','$time','Welcome @user','theme1');";
	$result = mysqli_query($conn, $insert) or die(mysql_error());
}
echo "<script>alert('inactivity time set to ".$_POST["time"]." $type');
window.location.assign('settings.php');</script>";
?>
