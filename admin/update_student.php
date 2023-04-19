<?php
	require_once 'conn.php';
	if(ISSET($_POST['update'])){
		// $stud_id = $_POST['stud_id'];
		// echo $stud_id;
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$department = $_POST['department'];
		$course = $_POST['course'];
		$major = $_POST['major'];
		$year = $_POST['year']." ".$_POST['section'];
		$status = $_POST['status'];
		$cabinet = $_POST['cabinet'];
		$password = md5($_POST['password']);
		
		mysqli_query($conn, "UPDATE `student` SET `firstname` = '$firstname', `lastname` = '$lastname', `gender` = '$gender', `department` = '$department', `course` = '$course', `major` = '$major', `year` = '$year', `status` = '$status', `cabinet` = '$cabinet',  `password` = '$password' WHERE `stud_no` = '$stud_no'") or die(mysqli_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'student.php'</script>";
	}
?>