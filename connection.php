<?php
	include_once("env.php");

	$con = mysqli_connect(getenv('DB_SERVER'), DB_getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>