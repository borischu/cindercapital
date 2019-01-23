<?php
	session_start();
	session_destroy();
	setcookie("loggedIn", "false", time()-3600);
	$_SESSION["username"] = null;
	$_SESSION["admin"] = false;
	header('Location: index.php');
?>