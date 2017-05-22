<?php
	require_once'system/PEAR2_Net_RouterOS-1.0.0b5.phar';
	require 	'system/settings.php';
	require 	'system/functions.php';
	require 	'system/route.php';
	
	$sekarang	= sekarang();
	$ip			= getUserIP();
	$url		= getUrlSekarang();
	$agent		= getBrowserInfo();

	// record activity
	$sql_log = "INSERT INTO log (datetime, ip, url, agent) VALUES ('$sekarang', '$ip', '$url', '$agent')";
	$conn->query($sql_log);
?>