<?php
session_start();
require 'admin/conn.php';

if (isset($_POST['login'])  && $_POST['g-recaptcha-response'] != "") {
	$ipAdd = $_SERVER["REMOTE_ADDR"];
	$secret = '6LdY2WAkAAAAAE1NrAoA4RbIqa755aBfS60sILht';
	$captRes = $_POST['g-recaptcha-response'];
	$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$captRes}&remoteip={
		$ipAdd}");
	$resposeData = json_decode($verifyResponse);

	if ($resposeData->success == true) {
		$stud_no = $_POST['stud_no'];
		$password = md5($_POST['password']);
		echo $stud_no . $password;
		$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_no` = '$stud_no' and `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		if ($row > 0) {
			$_SESSION['student'] = $fetch['stud_id'];
			header("location:student_profile.php");
		} else {
			$message = "wrong username or password";
			echo "<script>alert('$message'); window.location.href = './index.php'</script>";
		}
	}
} else {
	$message = "please check captcha";
	echo "<script>alert('$message'); window.location.href = './index.php'</script>";
}
