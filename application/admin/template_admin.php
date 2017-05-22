<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title_admin ?> - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="w3-sidebar w3-card-4 w3-animate-left w3-col m4 s10" style="display:none;z-index:5" id="mySidebar">
	<div class="w3-bar w3-blue">
		<span class="w3-bar-item w3-padding-16">Menu</span>
		<button onclick="w3_close()" class="w3-bar-item w3-button w3-right w3-padding-16" title="close Sidebar"><i class="fa fa-times"></i></button>
	</div>
	<div class="w3-container w3-blue" style="height: 150px;">
		<img src="http://www.hit4hit.org/img/login/user-icon-6.png" style="height: 98%;">
	</div>
	<div class="w3-container w3-blue">
		<p>Selamat datang <i><?php echo $_SESSION['admin_username'] ?></i></p>
	</div>
	<div class="w3-bar-block">
	  	<a href="<?php echo $base_url.'/admin/dashboard/' ?>" 		class="w3-bar-item w3-button"><i class="fa fa-home"></i>&emsp;Dashboard</a>
		<a href="<?php echo $base_url.'/admin/add/' ?>" 			class="w3-bar-item w3-button"><i class="fa fa-address-book-o"></i>&emsp;Add Admin</a>
		<a href="<?php echo $base_url.'/admin/user/' ?>" 			class="w3-bar-item w3-button"><i class="fa fa-user"></i>&emsp;User</a>
		<a href="<?php echo $base_url.'/admin/profile/' ?>" 		class="w3-bar-item w3-button"><i class="fa fa-signal"></i>&emsp;Profile Hotspot</a>
		<a href="<?php echo $base_url.'/admin/changepassword/' ?>" 	class="w3-bar-item w3-button"><i class="fa fa-unlock-alt"></i>&emsp;Change Password</a>
		<a href="<?php echo $base_url.'/admin/router/' ?>" 			class="w3-bar-item w3-button"><i class="fa fa-cogs"></i>&emsp;Router Setting</a>
		<a href="<?php echo $base_url.'/logout' ?>" 				class="w3-bar-item w3-button w3-red"><i class="fa fa-sign-out"></i>&emsp;Logout</a>
	</div>
</div>
<div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<div class="w3-main" id="main">
	<?php
		// Check Sessions
		if(!isset($_SESSION['admin_id'])) {
			echo "Anda belum login, silahkan login terlebih dahulu.";
			echo "<meta http-equiv='refresh' content='1; url=$base_url/login' />";
		}else{
			include $file_admin;
		}
	?>
</div>

<script>
	function w3_open() {
	    document.getElementById("mySidebar").style.display = "block";
	    document.getElementById("myOverlay").style.display = "block";
	}
	function w3_close() {
	    document.getElementById("mySidebar").style.display = "none";
	    document.getElementById("myOverlay").style.display = "none";
	}
</script>
</body>
</html>
