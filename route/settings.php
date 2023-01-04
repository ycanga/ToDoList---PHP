<?php 
	date_default_timezone_set('Europe/Istanbul');

	$host = 'localhost';
	$db = 'todolist';
	$user = 'root';
	$password = '';

	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

	try {
		$pdo = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
 ?>
