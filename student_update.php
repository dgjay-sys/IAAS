<!DOCTYPE html>
<?php 
	session_start();
	if(!ISSET($_SESSION['student'])){
		header("location: index.php");
	}
	require_once 'admin/conn.php'
?>
<html lang="en">
	<head>
		<title>Update Student Information</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="admin/css/style.css" />
	</head>
<body style="background-image: url('img/earist.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; ">
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">Student Document File System</label>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
			?>
			<ul class="nav navbar-right">
				<li class="dropdown">
					<a class="user dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span>
						<?php
						echo $fetch['firstname'] . " " . $fetch['lastname'];
						?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class="col-md-3">
		<div class="panel panel-warning" style="margin-top: 50%; margin-right: -165%; margin-left: 170%;">
			<div class="panel-heading">
				<h1 class="panel-title"><b>Update Student Information</b></h1>
			</div>
			<!-- <?php
				$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
				
			?> -->
			<div class="panel-body">
				<form method="POST" action="update_query.php">
					<div class="form-group">
						<input type="text" value ="<?php echo $_SESSION['student']; ?>"  name="stud_id" hidden>
						<label>Password:</label> 
						<input type="password" class="form-control"  name="password" required="required"/>
					</div>
					<a class="btn btn-default" href="student_profile.php">Cancel</a> <button class="btn btn-warning" name="update"><span class="glyphicon glyphicon-edit"></span> Update</button>
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'script.php'?>
</body>
</html>