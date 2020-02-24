<?php
include 'theme.php';
include 'config.php';
session_start();

if (empty($_SESSION["admin"]))
    header('Location: '.theme().'/index.php');
if(isset($_POST['users'])){
   $users = $_POST['users'];

   foreach ($users as $users=>$value) {
   	$update = "UPDATE `users` SET `blocked` = 'on' WHERE `username` = '".$value."';";
  $result = mysqli_query($conn, $update) or die(mysql_error());
  echo "Done";

        }
}else{
	echo "error";
}
 
?>