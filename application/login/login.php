<!DOCTYPE html>
<html>
<head>
	<title>WaiFai Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
	// Initial Value
	session_start();

	$status		= 10;
	$message	= "";
	
	$sekarang	= sekarang();
	$ip			= getUserIP();

	// Check Login
	if(isset($_POST['submitLogin'])) {
		$username	= $_POST['username'];
		$password	= $_POST['password'];

		$query_check = "SELECT * FROM admin WHERE username='$username'";
		$result	= $conn->query($query_check);

		if ($result->num_rows > 0){
		while ($row = $result->fetch_assoc()){
			// Simpan informasi dari database
			$id				= $row['id'];
			$password_hash	= $row['password'];
			
			// Cek informasi
			$cekbener	= cekpwd($password, $password_hash);
			if ($cekbener == TRUE){
				$status		= 1;
				$message 	= "Login berhasil";

				//Set Sessions
				$_SESSION['admin_id']     	= $id;
				$_SESSION['admin_username'] = $username;
        		
			}else{
				$status		= 0;
				$message 	= "Password untuk $username salah, klik <a href='/forgotpassword'>di sini</a> untuk lupa password";
			}
		}
		}else{
			$status  = 2;
			$message = "User $username tidak ada";
		}

		// record activity
		if ($status == 0 OR $status == 2){
			$sql_log = "INSERT INTO log_login (datetime, ip, username, password, status) VALUES ('$sekarang', '$ip', '$username', '$password', 'gagal')";
			$conn->query($sql_log);
		}elseif($status == 1){
			$sql_log = "INSERT INTO log_login (datetime, ip, username, password, status) VALUES ('$sekarang', '$ip', '$username', 'OK', 'berhasil')";
			$conn->query($sql_log);
		}
	} 
?>

<div class="w3-container w3-margin">
<?php
	// Check Sessions
	if(isset($_SESSION['admin_id'])) {
		header("location:$base_url/admin/dashboard");
	} ?>

	<div class="w3-card-4">
		<header class="w3-container w3-blue">
			<h4><i class="fa fa-user-circle-o" aria-hidden="true"></i> Silahkan login</h4>
		</header>

	<?php
		if($status == 1){ // benar ?>
		<div class="w3-container w3-margin w3-green">
			<p><?php echo $message	?></p>
		</div>

	<?php
		}elseif($status == 0){ // salah ?>
		<div class="w3-container w3-margin w3-red">
			<p><?php echo $message	?></p>
		</div>

	<?php
		}elseif($status == 2){ // tidak ada ?>
		<div class="w3-container w3-margin w3-indigo">
			<p><?php echo $message	?></p>
		</div>
	<?php
		}
	?>

	<form action="login" method="POST">
		<div class="w3-container w3-margin">
			<label>Username</label>
			<input type="text" name="username" class="w3-input w3-border" placeholder="Masukkan username di sini">
			<label>Password</label>
			<input type="password" name="password" class="w3-input w3-border" placeholder="Password">
		</div>
		<footer>
			<div class="w3-row">
				<div class="w3-col s6">
					<button type="submit" name="submitLogin" class="w3-button w3-block w3-green"><i class="fa fa-check-circle" aria-hidden="true"></i> Login</button>
				</div>
				<div class="w3-col s6">
					<button type="reset" name="resetLogin" class="w3-button w3-block w3-orange"><i class="fa fa-times" aria-hidden="true"></i> Reset</button>
				</div>
			</div>
		</footer>
	</form>
	</div>
</div>
</body>
</html>