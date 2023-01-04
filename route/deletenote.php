<?php 
	require "settings.php";

	$id = $_POST['id'];

	$id = explode('?', $id);
	if($id[0] == "all")
		$del_note = $pdo->query("DELETE FROM notes WHERE user_id = '$id[1]'");
	else
		$del_note = $pdo->query("DELETE FROM notes WHERE id='$id[0]'");
	if(!$del_note)
			$_SESSION['error'] = 1;
	header("Refresh: 0; url=../home.php");
 ?>
