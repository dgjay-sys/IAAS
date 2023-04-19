<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$department = $_POST['department'];
		$course = $_POST['course'];
		$major = $_POST['major'];
		$year = $_POST['year']."".$_POST['section'];
		$status = $_POST['status'];
		$cabinet = $_POST['cabinet'];
		$password = md5($_POST['password']);
		
		mysqli_query($conn, "INSERT INTO `student` VALUES('', '$stud_no', '$firstname', '$lastname', '$gender', '$department', '$course', '$major', '$year', '$status', '$cabinet', '$password')") or die(mysqli_error());
		
		header('location: student.php');
	}
?>