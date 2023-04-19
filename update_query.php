<?php
	require_once 'admin/conn.php';
	
	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		// $firstname = $_POST['firstname'];
		// $lastname = $_POST['lastname'];
		// $gender = $_POST['gender'];
		// $department = $_POST['department'];
		// $course = $_POST['course'];
		// $major = $_POST['major'];
		// $year = $_POST['year']."".$_POST['section'];
		$password = md5($_POST['password']);
		echo($stud_id . " " . $password);
		mysqli_query($conn, "UPDATE `student` SET `password`='$password' WHERE `stud_id`='$stud_id' ") or die(mysqli_error());
	
		header('location: student_profile.php');
	}
