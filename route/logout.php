<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['login']);
header("Location:../index.php");
?>
