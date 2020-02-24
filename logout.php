<?php
include 'config.php';
include 'theme.php';
session_start();
 $update = "UPDATE `users` SET `date` = CURRENT_TIME(),`active` = 'off' WHERE `username` = '".$_SESSION["username"]."';";
  $result = mysqli_query($conn, $update) or die(mysql_error());
   session_destroy();
   echo "<script>
   alert('Logged out successfuly!');
   window.location='".theme()."/index.php';
   </script>";
?>