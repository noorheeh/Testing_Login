<?php
include 'user_status.php';
if(!empty($_SESSION["admin"]))
  header("Location: admin.php");
?>
<!DOCTYPE html>
<html lang="en" onload="StartTimers();" onmousemove="ResetTimers();" ontouchmove="ResetTimers();">

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
  

</head>

<body id="page-top">

  <!-- Navigation -->
  <?php
  $query = "SELECT * FROM settings WHERE `id` = 1;";
  $result = mysqli_query($conn, $query) or die("Invalid query");
  $num = mysqli_num_rows($result);
  $theme = "theme1";
  if($num > 0){ 
    $data = mysqli_fetch_array($result);
    $theme = $data["login_theme"];
  }

  echo '<div class="w3-top" style="background-color: white;">

  <nav class="w3-bar navbar navbar-expand-md navbar-light bg-transparent" id="mainNav">
  <div class="container-fluid">
  <a class="navbar-brand js-scroll-trigger" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
  <a class="nav-link js-scroll-trigger w3-bar-item w3-button" href="index.php">Home</a>
  </li>
  <li class="nav-item">
  <a class="nav-link js-scroll-trigger" href="'.$theme,'/change.php"><i class="fa fa-gear"></i>Change Password</a>
  </li>
  <li class="nav-item">
  <button class="btn btn-danger" type="button" id="button-addon2" onclick="window.location.href = \'logout.php\';"><i class="fa fa-sign-out"></i>Logout</button>
  </"
  </ul>
  </div>
  </div>
  </nav>
  </div>';
  
  $query = "SELECT * FROM settings WHERE `id` = 1;";
  $result = mysqli_query($conn, $query) or die("Invalid query");
  $num = mysqli_num_rows($result);
  $username = $_SESSION['username'];
  $message= $_SESSION["username"];
  if($num > 0){ 
    $data = mysqli_fetch_array($result);
    $message = $data["login_messages"];
    if (strstr( $data["login_messages"], '@user' ) ) {
      $message=str_replace("@user",$username,$message);
    } 
  }
  echo '<header class="bg-primary text-white">
  <div class="container-fluid text-center">
  <h1>'.$message.'</h1>
  </div>
  </header>';   
  ?>

  

  <script type="text/javascript" >
  // Set timeout variables.
  var timoutNow = <?php 
  $query = "SELECT * FROM settings WHERE `id` = 1;";
  $result = mysqli_query($conn, $query) or die("Invalid query");
  $num = mysqli_num_rows($result);
  if($num > 0){ 
    $data = mysqli_fetch_array($result);
    echo $data["inactivity_time"];

  }else{
    echo "60000";  // Timeout in 1 min.
  }
  mysqli_close($conn);

  ?>;
  var timeoutTimer;

// Start timers.
function StartTimers() {
  timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
}

// Reset timers.
function ResetTimers() {
  clearTimeout(timeoutTimer);
  StartTimers();
}

// Logout the user.
function IdleTimeout() {
  alert("Session Timeout");
  window.location = 'logout.php';
}
</script>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>

</html>
