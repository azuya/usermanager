	<div class="w3-blue">
		<button class="w3-button w3-blue w3-xlarge" onclick="w3_open()">&#9776;</button>
		<div class="w3-container">
			<h1><i class="fa fa-address-book-o"></i> Add Admin</h1>
		</div>
	</div>
	
	<div class="w3-container">
		<?php
		// Initial Value
		$status		= 2;
		$message	= "";

		// Tambah data admin
		if(isset($_POST['submitAdd'])) { 
			$username	= $_POST['username'];
			$password	= buatpwd($_POST['password']);
			$query_add	= "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

			if ($conn->query($query_add) === TRUE) {
			    $message	= "$username berhasil ditambahkan";
			    $status		= 1;
			} else {
			    $message	= "Gagal menambah data";
			    $status		= 0;
			}
		}
		?>
		<?php
			if ($status == 1){
				echo $message;
			}elseif ($status == 0){
				echo $message;
			}
		?>
		
		<div class="w3-row">
			<div class="w3-col m6 s12">
				<div class="w3-container w3-green w3-margin-top w3-margin-bottom">
					<p>Halaman ini digunakan untuk menambah admin baru</p>
				</div>

				<form action="add" method="POST">
					<label>Username</label>
					<input type="text" class="w3-input" name="username"><br>
					<label>Password</label>
					<input type="password" class="w3-input" name="password"><br>
					<button type="submit" class="w3-button w3-green" name="submitAdd">Simpan</button>
				</form>
			</div>
		</div>
	</div>


