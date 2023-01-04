<?php 
	error_reporting(0);
	session_start();
	require "settings.php";

	$signup = $_POST['signup'];
	$login = $_POST['login'];
	$name = $_POST['name'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$tel = $_POST['tel'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$lgnpass = $_POST['pass'];
	$updateactive = $_POST['updateactive'];
	$active = $_POST['active'];

	if (isset($signup)) {
		$cntrl = $pdo->query("SELECT * FROM user WHERE mail = '$email'");
		if ($cntrl->fetchColumn() > 0 ){
			$_SESSION["error"] = 1;$_SESSION['error_message'] = "There is already an account registered to this e-mail address. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "danger";$_SESSION['error_url']="signup.php";
		}
		else if(strlen($pass1) < 8 || $pass1 != $pass2){
			$_SESSION["error"] = 3;$_SESSION['error_message'] = "Your Password Short or the Passwords do not match. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "danger";$_SESSION['error_url']="signup.php";
		}
		else
		{
			$Passwd = $pass1;
			$string = $password;
			$encrypt_method = 'AES-256-CBC';
			$secret_key = '11*_33';
			$secret_iv = '22-=**_';
			$key = hash('sha256', $secret_key); 
			$iv = substr(hash('sha256', $secret_iv), 0, 16); 

			$encrypt = openssl_encrypt($Passwd,$encrypt_method, $key, false, $iv);
			$adduser = $pdo->query("INSERT INTO user(name, pass, role, job, gender, mail, tel) VALUES ('$name','$encrypt','0','$job','$gender','$email', '$tel')");
			$_SESSION["error"] = 2;$_SESSION['error_message'] = "The user has been created, you are redirected to the login screen. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "success";$_SESSION['error_url']="index.php";
			header("Refresh: 0; url=../index.php");
		}
		header("Refresh: 0; url=../signup.php");
	}
	if (isset($login)) {
		$Passwd = $lgnpass;
		$string = $password;
		$encrypt_method = 'AES-256-CBC';
		$secret_key = '11*_33';
		$secret_iv = '22-=**_';
		$key = hash('sha256', $secret_key); 
		$iv = substr(hash('sha256', $secret_iv), 0, 16); 

		$encrypt = openssl_encrypt($Passwd,$encrypt_method, $key, false, $iv);
		$cntrl = $pdo->query("SELECT * FROM user WHERE mail = '$email'")->fetch(PDO::FETCH_ASSOC);
		if($cntrl["pass"] == $encrypt)
		{
			$_SESSION["error"] = 1;$_SESSION['error_message'] = "Login successful, you are redirected to the homepage. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "success";$_SESSION['error_url']="home.php";
			$_SESSION["login"] = true;$_SESSION['user'] = $cntrl["name"]; $_SESSION['id'] = $cntrl["id"];
		}
		else if (!$cntrl) {
			$_SESSION["error"] = 1;$_SESSION['error_message'] = "No account found for the information entered. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "warning";$_SESSION['error_url']="index.php";
		}
		else if ($cntrl["pass"] != $encrypt){
			$_SESSION["error"] = 1;$_SESSION['error_message'] = "The entered password is incorrect, please try again. !"; $_SESSION["error_time"] = 3;$_SESSION['alert'] = "danger";$_SESSION['error_url']="index.php";
		}
		header("Refresh: 0; url=../index.php");
	}

	if (isset($updateactive)) {
		$cntrl = $pdo->query("SELECT * FROM notes WHERE id ='$active'")->fetch(PDO::FETCH_ASSOC);
		if($cntrl["active"] == 1)
			$update = 0;
		else
			$update = 1;
		$active_update = $pdo->query("UPDATE notes SET active='$update' WHERE id='$active'");
		header("Refresh: 0; url=../home.php");
	}
 ?>
