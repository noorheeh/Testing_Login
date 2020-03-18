<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form action="../login.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" min="8" placeholder="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember" value="1" onchange="toggleCheckbox(this)" > Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.html">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="forgot.html">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
function toggleCheckbox(element)
 {
 	// when remmeber me enabled
   if(element.checked == true){
   	// check if cookies enabled
   	var cookieEnabled=(navigator.cookieEnabled)? true : false
 
//if not IE4+ nor NS6+
if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){ 
    document.cookie="testcookie"
    cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false
}
 //if cookies are enabled on client's browser
if (!cookieEnabled){
	alert("Please enable cookies to activate this feature");
	element.checked = false;

} 
   }
 }
</script>
</body>
</html>