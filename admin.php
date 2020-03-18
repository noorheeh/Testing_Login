<?php
include 'theme.php';
session_start();
if (empty($_SESSION["admin"]))
	header('Location: '.theme().'/index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="vendor/jquery/jquery.min.js"></script>
	`
</head>

<body id="page-top">

	<!-- Navigation -->
	<div class="w3-top" style="background-color: white;">

		<nav class="w3-bar navbar navbar-expand-md navbar-light bg-transparent" id="mainNav">
			<div class="container-fluid">
				<a class="navbar-brand js-scroll-trigger" href="admin.php">Admin</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger w3-bar-item w3-button" href="admin.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="settings.php"><i class="fa fa-gear"></i>Settings</a>
						</li>
						<li class="nav-item">
							<button class="btn btn-danger" type="button" id="button-addon2" onclick="window.location.href = 'logout.php';"><i class="fa fa-sign-out"></i>Logout</button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<header class="bg-primary text-white">
		<div class="container-fluid text-center">
			<h1>Users Settings</h1>
		</div>
	</header>
	<div class="container-fluid bg-primary text-center justify-content-center">
		<div class="row">
			<?php 
			include 'config.php';

		//check if there is users in DB
			$query = "SELECT * FROM users;";
			$result = mysqli_query($conn, $query) or die("Invalid query");
			$num = mysqli_num_rows($result);
			if($num > 0){

				$query = "SELECT * FROM users WHERE active = 'on';";
				$result = mysqli_query($conn, $query) or die("Invalid query");
				$num = mysqli_num_rows($result);

				if($num > 0){
					echo '<div class="col-md-6 pb-5">
					<div><h3 class="bg-success">Logged in Users</h3></div>';
					echo ' <form action="force_logout.php" method="post">';
					echo '<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-striped table-light table-hover ">
					<thead class="thead-dark">';
					echo '<tr>
					<th ><input id="allLogedout" type="checkbox"></th>
					<th >Name</th>
					<th >active From</th>
					</tr>
					</thead>
					<tbody>';
					while($row = mysqli_fetch_array($result)) {
						echo '
						<tr>
						<td> <input class="LogedoutBox" type="checkbox" name="users[]" value="'.$row["username"].'"></td>
						<td> '.$row["username"].'</td>
						<td> <span>'.$row["date"].'</span> </td>
						</tr>
						';}
						echo ' </tbody></table>
						</div>              

						<div><input type="submit" value="Logout" class="btn btn-danger btn-lg"></div>
						</form>
						</div>';

					}
					$query = "SELECT * FROM users WHERE active = 'off';";
					$result = mysqli_query($conn, $query) or die("Invalid query");
					$num = mysqli_num_rows($result);

					if($num > 0){
						echo '<div class="col-md-6 pb-5">
						<div><h3 class="bg-danger">Logged out Users</h3></div>';
						echo '<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-striped table-light table-hover ">
						<thead class="thead-dark">';
						echo '<tr>
						<th ></th>
						<th >UserName</th>
						<th >Last active</th>
						</tr>
						</thead><tbody>';

						while($row = mysqli_fetch_array($result)) {
							echo '<tr>
							<td><input type="checkbox" name="users[]" value="'.$row["username"].'"></td>
							<td>'.$row["username"].'</td>
							<td><span>'.$row["date"].'</span></td>
							</tr>';
						}
						echo '    </tbody>
						</table>
						</div>
						</div>';
					}

					$query = "SELECT * FROM users;";
					$result = mysqli_query($conn, $query) or die("Invalid query");
					$num = mysqli_num_rows($result);

					if($num > 0){
						echo ' <div class="col-md-6 pb-5">
						<div><h3 class="bg-warning">Enabled/Disabled Users</h3></div>
						<div id="response" class="bg-success text-center"></div>';
						echo '<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-striped table-light table-hover ">
						<thead class="thead-dark">
						<tr>
						<th ><input id="allCheckBoxes" type="checkbox"></th>
						<th >Name</th>
						<th >Last active</th>
						<th >Status</th>
						</tr>
						</thead>
						<tbody>';

						while($row = mysqli_fetch_array($result)) {

							echo '<tr>
							<td><input class="blockcheckbox" type="checkbox" name="users[]" value="'.$row["username"].'"></td>
							<td>'.$row["username"].'</td>
							<td><span>'.$row["date"].'</span></td>';
							if($row["blocked"] == "off"){
								echo '<td><label class="bg-success">Enabled</label></td>';
							}else{
								echo '<td><label class="bg-danger">Disabled</label></td>';

							}
							echo '
							<td><label class="enabled"></label></td>
							</tr>';
						}
						echo '</tbody>
						</table>
						</div>
						<div>
						<input id="enable" type="submit" value="Enable" class="btn btn-success btn-lg">
						<input id="disable" type="submit" value="Disable" class="btn btn-danger btn-lg"></div>
						</div> ';

					}
				}else{
					echo "no user in DB";
				}
				mysqli_close($conn);	
				?>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				setInterval(function(){
					$("body").load("admin.php");
				}, 60000);
				$("#allLogedout").click(function () {
					if($("#allLogedout").is(":checked")){
						$('.LogedoutBox').each(function(i){
							$(this).prop( "checked", true );
						});		
					}else{
						$('.LogedoutBox').each(function(i){
							$(this).prop( "checked", false );
						});	
					}
				});

				$("#allCheckBoxes").click(function () {
					if($("#allCheckBoxes").is(":checked")){
						$('.blockcheckbox').each(function(i){
							$(this).prop( "checked", true );
						});		
					}else{
						$('.blockcheckbox').each(function(i){
							$(this).prop( "checked", false );
						});	
					}
				});
		//send info to signup.php to check
		$("#disable").click(function() {
			var users = [];
			$('.blockcheckbox:checked').each(function(i){
				users[i] = $(this).val();
			});			
			var formDATA = {
				"users[]" : users
			}
			$.ajax({    
				type: "POST",
				url: "block_users.php",             
				data: formDATA,               
				success: function(response){   
					$("#response").html(response);
					location.reload();	
				}
			});
			
		});

		$("#enable").click(function() {
			var users = [];
			$(':checkbox:checked').each(function(i){
				users[i] = $(this).val();
			});			
			var formDATA = {
				"users[]" : users
			}
			$.ajax({    
				type: "POST",
				url: "unblock_users.php",             
				data: formDATA,               
				success: function(response){   
					$("#response").html(response);
					location.reload();	
				}
			});
			
		});
	//	setInterval("windows.reload()", 60000);

});
</script>
<!-- Bootstrap core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>
</html>