<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>JSON Receiver 2</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<script language="javascript" type="text/javascript">  
	$(document).ready(function(){

		var wsUri = "ws://localhost:9000/server.php";
		websocket = new WebSocket(wsUri); 

		websocket.onopen = function() { 
			$('#message_box').append("<div class=\"system_msg\">Connected!</div>");
		}

		websocket.onmessage = function(ev) {
			var msg = JSON.stringify (ev.data,null, 2);
			msg = msg.replace(/\\/g, '');
			msg = msg.replace(/"([^"]+(?="))"/g, '$1');
			if(ev.data.includes("Message")){
				$('#message_box').append("<div><span class=\"user_message\">"+msg+"</span></div></br>");
			}
		};

		websocket.onerror = function(ev){$('#message_box').append("<div class=\"system_error\">Error</div>");}; 
		websocket.onclose   = function(ev){$('#message_box').append("<div class=\"system_msg\">Server closed</div>");}; 
	});
</script>
<body>

	<div class="container">
		<div class="message_box" id="message_box"></div>
		<br>    
	</div> 
</body>
</html>
