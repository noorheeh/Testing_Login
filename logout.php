<?php
include 'config.php';
include 'theme.php';
session_start();

date_default_timezone_set('Asia/Jerusalem');
if(!empty($_SESSION["username"])){
	$username = $_SESSION["username"];
	$update = "UPDATE `users` SET `date` = CURRENT_TIME(),`active` = 'off' WHERE `username` = '".$_SESSION["username"]."';";
	$result = mysqli_query($conn, $update) or die(mysql_error());
}else{
	$username = $_SESSION["admin"];
}

echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  

var wsUri = "ws://localhost:9000/server.php";
websocket = new WebSocket(wsUri); 

websocket.onopen = function() { 
	var msg = {
		username: "'.$username.'",
		userID: "'.$_SESSION["userid"].'",
		sessionID: "'.session_id().'",
		logoutDate: "'.date("Y/m/d").'",
		logoutTime: "'.date("H:i:s").'",
		userIP: "'.file_get_contents("https://api.ipify.org").'"
	};
	websocket.send(JSON.stringify(msg)); 
	websocket.close(); 
}    

</script>';

session_destroy();
echo "<script>
alert('Logged out successfuly!');
setTimeout(function(){ 
	window.location='".theme()."/index.php';
	}, 600);  
	</script>";

	?>