<?php

	// set PHP Information
	date_default_timezone_set("Asia/Jakarta");
	$base_url="http://".$_SERVER['SERVER_NAME']."/waifai.tk";

	// Database Login Information
	
	$db_host	= "localhost";
	$db_username	= "root";
	$db_password	= "";
	$db_name 	= "waifai.tk";

	// Port API MikroTik
	$port			= "8728";

	// Create and Check Connection
	$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
