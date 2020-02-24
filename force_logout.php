<?php
include 'config.php';
include 'theme.php';

session_start();

if (empty($_SESSION["admin"]))
   header('Location: '.theme().'/index.php');

if(isset($_POST['users'])){
   $users = $_POST['users'];
   
   foreach ($users as $users=>$value) {
   	$update = "UPDATE `users` SET `date` = CURRENT_TIME(),`active` = 'off' WHERE `username` = '".$value."';";
  $result = mysqli_query($conn, $update) or die(mysql_error());
  header("Location: admin.php");

        }
}else{
	header("Location: admin.php")
;}


 mysqli_close($conn);
?>