<?php
include 'config.php';
include 'theme.php';

	if(isset($_POST["email"])){
	$email = $_POST["email"];
	$query = "SELECT * FROM users WHERE email = '" . $email . "';";
	$result = mysqli_query($conn, $query) or die("Invalid query");
	$num = mysqli_num_rows($result);
	if($num > 0){
		$data = mysqli_fetch_array($result);
		$password = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
		$content = "
    <html>
      <head>
      </head>
      <body>
    <center><h2><b>Forgot Password Mail</b></h2></center><br><p>Dear ".$data['username'].", <br>
        You Have received this mail because you have registered with us and you have clicked the forgot   password option:-<br>
        Account Details are:- <br>
        UserName:-  <b>".$data['username']."</b><br>
        Password:- <b>".$password."</b><br>
        Use the above credentials for future use.<br></p>";
            $content2 = "</body>
        </html>";
        $body = $content.$content2;
        $from ='noorxb64@gmail.com';
        $subject = "Forgot Password for ".$data['username']."";
        $server=$_SERVER['HTTP_HOST'];
        $headers = "From: Admin<".$from. ">\r\nContent-type: text/html; charset=iso-8859-1\r\nMIME-        Version: 1.0\r\n";
        $to = $data['email'];
        $send_email = mail($to, $subject, $body, $headers);
        $b= "Password containing mail sent..";
$new_pass =password_hash($password, PASSWORD_DEFAULT); 
 $update = "UPDATE `users` SET `password` = '$new_pass'  WHERE `email` = '$email';";
  $result = mysqli_query($conn, $update) or die(mysql_error());

        echo "<script>alert('Check your email');window.location.assign('".theme()."/index.php');</script>";
		

	}else{
		echo "<script>alert('Email not found');
		window.location.assign('".theme()."/forgot.html');</script>";
		}
    }
	mysqli_close($conn);
    ?>
    