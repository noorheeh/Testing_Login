<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>JSON Receiver 1</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="message_box" id="message_box"></div>  
	</div> 
<script language="javascript" type="text/javascript">  
	$(document).ready(function(){

		var wsUri = "ws://localhost:9000/server.php";
		websocket = new WebSocket(wsUri); 

		websocket.onopen = function() { 
			$('#message_box').append("<div class=\"system_msg\">Connected!</div>");
			console.log('Connected!');
		}
		websocket.onmessage = function(ev) {
			var msg = ev.data;
			if(msg.includes("username")){
				if(msg.includes("userID")){
				if(msg.includes("login")){
					$('#message_box').append("<div><span class='user_message'>Login</span></div>");
				}
				else{
					$('#message_box').append("<div><span class='user_message'>Logout</span></div>");
				}
			}else{
				$('#message_box').append("<div><span class='user_message'>Logout by Admin</span></div>");
			}

				msg = msg.replace(/\\/g, '');
				msg = msg.slice(1, -1);
				$('#message_box').append("<div><span class='user_message'>"+msg+"</span></div></br>");

				var today = new Date();
				var date = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
				var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
				var msg = {
					Message: "Ok",
					NotificationTime: time,
					NotificationDate: date
				};
				websocket.send(JSON.stringify(msg)); 
			} 
		};

		websocket.onerror = function(ev){$('#message_box').append("<div class=\"system_error\">Error</div>");}; 
		websocket.onclose   = function(ev){$('#message_box').append("<div class=\"system_msg\">Server closed</div>");}; 
	});
</script>
</body>
</html>
