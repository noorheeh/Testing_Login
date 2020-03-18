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


		date_default_timezone_set('Asia/Jerusalem');
		echo '
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script language="javascript" type="text/javascript">  

		var wsUri = "ws://localhost:9000/server.php";
		websocket = new WebSocket(wsUri); 

		websocket.onopen = function() { 
			var msg = {
				username: "'.$value.'",
				sessionID: "'.session_id().'",
				logoutDate: "'.date("Y/m/d").'",
				logoutTime: "'.date("H:i:s").'",
				userIP: "0.0.0.0"
			};
			setTimeout(function(){ 
				websocket.send(JSON.stringify(msg)); 
				}, 500); 
			}    
			</script>';
		}
		echo "<script>
		setTimeout(function(){ 
			window.location.assign('admin.php');
			}, 1000);  
			</script>";
		}else{
			header("Location: admin.php");
		}
			mysqli_close($conn);
			?>