<?php
	#remove the directory path we don't want
	$request = str_replace("/waifai.tk/", "", $_SERVER['REQUEST_URI']);
	//$request = substr($_SERVER['REQUEST_URI'], 1);

	#split the path by '/'
	$params  = explode("/", $request);

	if(!isset($params[0])){
		$params[0] = "";
	}

	if ($params[0] == ""){
		include "application/site/welcome.php";
	}

	elseif($params[0] == "login"){
		include "application/login/login.php";
	}

	elseif($params[0] == "logout"){
		include "application/login/logout.php";
	}

	elseif($params[0] == "forgotpassword"){
		echo "Hayo... mau ngapain???";
	}

	elseif($params[0] == "admin"){
		include "application/admin/route.php";
	}

	elseif($params[0] == "user"){
		include "application/user/route.php";
	}

	elseif($params[0] == "changelog"){
		echo "<pre>"; include "changelog.txt"; echo "</pre>";
	}

	else{
		echo "404 Page Not Found";
	}
?>