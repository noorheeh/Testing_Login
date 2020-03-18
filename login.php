
<?php
include 'theme.php';
session_start();
  date_default_timezone_set('Asia/Jerusalem');
$conn = mysqli_connect("localhost:3306", "root", "","testing")
or die("Could not connect: ".mysqli_error($conn));

$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM users WHERE username = '" . $username . "';";
$result = mysqli_query($conn, $query) or die("Invalid query");
$num = mysqli_num_rows($result);
if($num > 0){
	$data = mysqli_fetch_array($result);
	if(password_verify($password, $data['password'])){
		if(!empty($_POST["remember"]))
			if ($_POST["remember"] == 1) {
				setcookie("username", $username, time() +(60*60*24*365),"/",null,null,TRUE);
				setcookie("password", $password, time() +(60*60*24*365),"/",null,null,TRUE);
			}
			
			$_SESSION["username"] = $username;
			$_SESSION["userid"] = $data['id'];
			$update = "UPDATE `users` SET `date` = CURRENT_TIME() , `active` = 'on' WHERE `username` = '$username';";
			$result = mysqli_query($conn, $update) or die(mysql_error());
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
					loginDate: "'.date("Y/m/d").'",
					loginTime: "'.date("H:i:s").'",
					userIP: "'.file_get_contents("https://api.ipify.org").'"
				};
				websocket.send(JSON.stringify(msg)); 
				websocket.close();
			}    

			</script>';
			echo "<script>
			setTimeout(function(){ 
				window.location = '../index.php';
				}, 600);  
				</script>";

			}else{
				echo "<label>username or password Invalid</label>";
			}

		}else{
			$query = "SELECT * FROM admin WHERE name = '" . $username . "';";
			$result = mysqli_query($conn, $query) or die("Invalid query");
			$num = mysqli_num_rows($result);
			if($num > 0){
				$data = mysqli_fetch_array($result);
				if(password_verify($password, $data['password'])){
					if(!empty($_POST["remember"]))
						if ($_POST["remember"] == 1) {
							setcookie("username", $username, time() +(60*60*24),"/",null,null,TRUE);
							setcookie("password", $password, time() +(60*60*24),"/",null,null,TRUE);
						}
						$_SESSION["admin"] = $username;
						$_SESSION["userid"] = $data['id'];
						echo '
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
						<script language="javascript" type="text/javascript">  

						var wsUri = "ws://localhost:9000/server.php";
						websocket = new WebSocket(wsUri); 

						websocket.onopen = function() { 

						}    
						websocket.onmessage = function() { 
							var msg = {
								username: "'.$_SESSION["admin"].'",
								userID: "'.$data['id'].'",
								sessionID: "'.session_id().'",
								loginDate: "'.date("Y/m/d").'",
								loginTime: "'.date("H:i:s").'",
								userIP: "'.file_get_contents("https://api.ipify.org").'"
							};
							websocket.send(JSON.stringify(msg)); 
							websocket.close();
						}    

						</script>';

						echo "<script>
						setTimeout(function(){ 
							window.location.assign('../admin.php');
							}, 600);  
							</script>";
						}
					}else{
						echo "<label>username or password Invalid</label>";
					}

				}
				mysqli_close($conn);
				?>

