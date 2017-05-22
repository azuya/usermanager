<?php
	use PEAR2\Net\RouterOS;

	function buatpwd($string){
		$options = [
	    	'cost' => 12,
	    	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$hash = password_hash($string, PASSWORD_BCRYPT, $options);
		return $hash;
	}

	function cekpwd($string, $hash){
		if (password_verify($string, $hash)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//fungsi untuk mengambil ip address
	function getUserIP(){
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP)){
	        $ip = $client;
	    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
	        $ip = $forward;
	    }else{
	        $ip = $remote;
	    }
	    return $ip;
	}

	//fungsi untuk mengambil Informasi Browser
	function getBrowserInfo(){
		return $_SERVER['HTTP_USER_AGENT'];
	}

	function sekarang(){
		return date("Y-m-d H:i:s");
	}

	function getUrlSekarang(){
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];
		return $url;
	}

	function getRouterLogin($id_admin){
		global $conn;
		$query_inforouter 	= "SELECT * FROM router WHERE id_admin = $id_admin";
		$result				= $conn->query($query_inforouter);

		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				// Simpan informasi dari database
				$hasil['host']		= $row['host'];
				$hasil['username']	= $row['username'];
				$hasil['password']	= $row['password'];
			}
		return $hasil;
		}
	}

	function getRouterInfo($id_admin){
		$info 		= getRouterLogin($id_admin);
		global 		$port;
		$host 		= $info['host'];
		$username 	= $info['username'];
		$password 	= $info['password'];

		try {
		    $util = new RouterOS\Util($client = new RouterOS\Client($host, $username, $password, $port));

		    foreach ($util->setMenu('/system/resource')->getAll() as $entry) {
		    	// router info
		    	$hasil['platform'] 		= $entry('platform');
		    	$hasil['board-name']	= $entry('board-name');
		    	$hasil['version']		= $entry('version');

		    	// resource info
		    	$hasil['uptime']		= $entry('uptime');
		    	$hasil['free-memory']	= $entry('free-memory');
		    	$hasil['total-memory']	= $entry('total-memory');
		    	$hasil['free-hdd-space']= $entry('free-hdd-space');
		    	$hasil['total-hdd-space']= $entry('total-hdd-space');
		    	$hasil['cpu']			= $entry('cpu');
		    	$hasil['cpu-count']		= $entry('cpu-count');
		    	$hasil['cpu-frequency']	= $entry('cpu-frequency');
		    	$hasil['cpu-load']		= $entry('cpu-load');
		    	
		    	return $hasil;
		    }
		} catch (Exception $e) {
		    echo 'Unable to connect to RouterOS.';
		}
	}
		
?>