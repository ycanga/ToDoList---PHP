<?php 
	require "settings.php";
	session_start();
	$note = $_POST['note'];
	$add = $_POST["add"];
	$note_id = $_SESSION['id'];
	$date = $_POST['date'];
	if(!empty($note))
	{
		$note = $note;
		$string = $password;
		$encrypt_method = 'AES-256-CBC';
		$secret_key = '11*_33';
		$secret_iv = '22-=**_';
		$key = hash('sha256', $secret_key); 
		$iv = substr(hash('sha256', $secret_iv), 0, 16); 

		$note = openssl_encrypt($note,$encrypt_method, $key, false, $iv);
		$add_note = $pdo->query("INSERT INTO notes(user_id, note, active, note_date) VALUES ('$note_id','$note','1','$date')");
		if($add_note)
			$_SESSION['error'] = 0;
		else
			$_SESSION["error"] = 1;
	}
	else
		$_SESSION["error"] = 1;
	
	header("Refresh: 0; url=../home.php");
 ?>
