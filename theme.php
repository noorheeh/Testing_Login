<?php
	function theme() {
		include 'config.php';
	$query = "SELECT * FROM settings WHERE `id` = 1;";
	$result = mysqli_query($conn, $query) or die("Invalid query3");
	$num = mysqli_num_rows($result);
	
	if($num > 0){
				$data = mysqli_fetch_array($result);
return $data["login_theme"];

	}
	return "theme1";
}

?>