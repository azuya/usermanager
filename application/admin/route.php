<?php
	session_start();

	if(!isset($params[1])){
		$params[1] = "";
	}

	if($params[1] == ""){
		$file_admin = "dashboard.php";
		$title_admin= "Dashboard";
	}

	elseif($params[1] == "dashboard"){
		$file_admin = "dashboard.php";
		$title_admin= "Dashboard";
	}

	elseif($params[1] == "add"){
		$file_admin = "add_admin.php";
		$title_admin= "Tambah Data Admin";
	}

	elseif($params[1] == "user"){
		$file_admin = "user.php";
		$title_admin= "Manage User Hotspot";
	}

	elseif($params[1] == "profile"){
		$file_admin = "profile.php";
		$title_admin= "Manage Profile Hotspot";
	}

	elseif($params[1] == "changepassword"){
		$file_admin = "changepassword.php";
		$title_admin= "Change Password";
	}

	elseif($params[1] == "router"){
		$file_admin = "routersetting.php";
		$title_admin= "Router Setting";
	}

	else{
		echo "404 Page Not Found";
	}

	include "template_admin.php";
?>
