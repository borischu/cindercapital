<?php
	session_start();
	extract($_POST);
	$username = $_POST["username"];
	$password = $_POST["password"];

	$correctlogin = false;

	include 'connectDB.php';
	$table = "users";

	$qry = "SELECT userName, passWord, admin from $table";
	$result = mysqli_query($connect, $qry);

	$userPassArray = array();
	$admin = false;
	while ($row = $result->fetch_row()) {
		$userPassArray[$row[0]] = $row[1];
		$admin = $row[2];
	}

	if ($userPassArray[$username] == $password) {
		$correctlogin = true;
	}


	if ($correctlogin) {
		setcookie("loggedIn", "true");
		$_SESSION["username"] = $username;
		$_SESSION["admin"] = $admin;
		header("Location: index.php");
	} 
	else {
		include "login.php";
		echo '<script>';
		echo 'alert("Login Failed. Either the username or password was incorrect.")';
		echo '</script>';
	}
    mysqli_close($connect);
?>