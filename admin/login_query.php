<?php
session_start();
require 'conn.php';

if (isset($_POST['login']) && $_POST['g-recaptcha-response'] != "") {
	$ipAdd = $_SERVER["REMOTE_ADDR"];
	$secret = '6LcHD2EkAAAAADIgUG5gfxH0DI4HfVw7xYjQp2pM';
	$captRes = $_POST['g-recaptcha-response'];
	$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$captRes}&remoteip={
		$ipAdd}");
	$resposeData = json_decode($verifyResponse);
	echo $verifyResponse;

	if ($resposeData->success == true) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;

		if ($row > 0) {
			$_SESSION['user'] = $fetch['user_id'];
			$_SESSION['status'] = $fetch['status'];
			header("location:home.php");
		} else {
			$message = "wrong username or password";
			echo "<script>alert('$message'); window.location.href = './index.php'</script>";
		}
	}
} else {
	$message = "please check captcha";
	echo "<script>alert('$message'); window.location.href = './index.php'</script>";
}
