	<div class="w3-blue">
		<button class="w3-button w3-blue w3-xlarge" onclick="w3_open()">&#9776;</button>
		<div class="w3-container">
			<h1><i class="fa fa-home"></i> Dashboard</h1>
		</div>
	</div>

	<div class="w3-container">
		<p>Selamat datang di WaiFai[dot]TK</p>
		<p>Ini adalah halaman admin untuk mengatur User dan Profile Hotspot MikroTik.</p>
		<p>
		<?php
			$router = getRouterInfo($_SESSION['admin_id']);
			echo "terhubung ke ".$router['platform']." ".$router['board-name']." v".$router['version'];
		?>
		</p>
	</div>