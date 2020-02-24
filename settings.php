<?php
include("config.php");
include 'theme.php';
echo theme();
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

  <title>Setting</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
      <h1>Website Settings</h1>
    </div>
  </header>

  <div class="container-fluid bg-primary text-center justify-content-center">
    <div class="row">
      <div class="col-md-6 m-auto p-5">
        <div class="col-12 p-2">
          <h2>Change user inactivity time</h2></div>  
          <form action="inactivity_time.php" method="post">
            <div class="d-flex">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">Time</span>
                </div>
                <input type="number" class="form-control" name="time" required>

              </div>

              <div><select class="custom-select custom-select-lg" name="type">
                <option value="s">Sec</option>
                <option value="m">Min</option>
                <option value="h">Hours</option>
              </select>
            </div>
          </div>
          <div class="p-3 col-sm-12 ">
            <input type="submit" value="change" class="btn btn-success btn-lg">
          </div>        
        </form>
        </div>
       <div class="col-md-6 m-auto">
          <div class="col-12 p-2">
            <h2>Change Login message</h2>
            <p>to show the username in message write "@user" where you want to show.</p>
          </div>
            <form action="login_message.php" method="post">
          <div class="input-group input-group-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">Message</span>
            </div>
            <input class="form-control" aria-label="With textarea" name="message" required value='  <?php 
        $query = "SELECT * FROM settings WHERE `id` = 1;";
  $result = mysqli_query($conn, $query) or die("Invalid query");
  $num = mysqli_num_rows($result);
  if($num > 0){
  $data = mysqli_fetch_array($result);
  echo $data["login_messages"];   
}
        ?>'>
          </div>
          <div class="p-3 col-sm-12">
              <input type="submit" value="change" class="btn btn-success btn-lg">
        </div>
      </form>
      </div>
     

        

      <div class="col-md-12 m-auto p-5">
        <div class="col-12 p-2">
          <h2>Change login theme</h2>
        </div>
        <form action="login_theme.php" method="post">
        <div class="d-flex">
          <label>
            <input type="radio" name="theme" value="theme1" checked>
            <img src="theme_photo/theme1.png">
          </label>

          <label>
            <input type="radio" name="theme" value="theme2" >
            <img src="theme_photo/theme2.png">
          </label><label>
            <input type="radio" name="theme" value="theme3" >
            <img src="theme_photo/theme3.png">
          </label>


        </div>
                        <input type="submit" value="change" class="btn btn-success btn-lg">

      </form>
      </div>


    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
