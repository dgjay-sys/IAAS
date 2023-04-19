<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
	<head>
		<title>Student Document File System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">Student Document File System</label>
			<?php 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $fetch['firstname']." ".$fetch['lastname'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
		</div>
	</nav>
	<?php include 'sidebar.php'?>
	<div id = "content">
		<br /><br /><br />
		<div class="alert alert-info"><h3><b>MISSION</b></h3></div> 
		<p><b>Turn out vocationally, technically, technologically, and scientifically trained graduates who will be economically productive, self-sufficient, effective, responsible and discipline citizen of the Philippines.</b></p>
		<div class="alert alert-info"><h3><b>VISION</b></h3></div> 
		<p><b>EARIST is envisioned to be a center of excellence in trades, business, arts, science and technology education.</b></p>
		<div class="alert alert-info"><h3><b>GOALS</b></h3></div> 
		<p><b>Provide professional, scientific, technological, technical, and vocational instruction and training in trades, business, arts, sciences, and technology and for special purposes promote research, advanced studies and progressive leadership.</b></p>
		<div class="alert alert-info"><h3><b>OBJECTIVES</b></h3></div> 
		<p><b>&#x2022; Strive for academic excellence in instruction, research, extension and production through accreditation.</b></p>	
		<p><b>&#x2022; Provide appropriate and continuing faculty and staff development programs.</b></p>
		<p><b>&#x2022; Provide and maintain appropriate technologies, instructional facilities, materials and equipment.</b></p>
		<p><b>&#x2022; Produce quality graduates who are globally competitive to man the needs of business and industry.</b></p>
		<p><b>&#x2022; Attain university status through Unity, Solidarity and Teamwork.</b></p>	
	</div>
	</div>
	
<?php include 'script.php'?>	
</body>
</html>