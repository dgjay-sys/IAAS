<!DOCTYPE html>
<?php
require 'validator.php';
require_once 'conn.php'
?>
<html lang="en">

<head>
	<title>Student Document File System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">Student Document File System</label>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
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
	<?php include 'sidebar.php' ?>
	<div id="content">
		<br /><br /><br />
		<div class="alert alert-info">
			<h3>Accounts / Students</h3>
		</div>
		<button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Student</button>
		<div>
			<form action="./addbatch.php" enctype="multipart/form-data" method="POST">
				<input type="file" name="excel" id="excel" style="margin-top: 10px;">
				<button class="btn btn-success" type="submit" name="import" id="import">Import</button>
			</form>
		</div>


		<br /><br />
		<table id="table" class="table table-bordered">
			<thead>
				<tr>
					<th>Stud No.</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Gender</th>
					<th>College Department</th>
					<th>Course</th>
					<th>Major</th>
					<th>Year/Section</th>
					<th>Status</th>
					<th>Cabinet</th>
					<th>Password</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = mysqli_query($conn, "SELECT * FROM `student`") or die(mysqli_error());
				while ($fetch = mysqli_fetch_array($query)) {
				?>
					<tr class="del_student<?php echo $fetch['stud_id'] ?>">
						<td><?php echo $fetch['stud_no'] ?></td>
						<td><?php echo $fetch['firstname'] ?></td>
						<td><?php echo $fetch['lastname'] ?></td>
						<td><?php echo $fetch['gender'] ?></td>
						<td><?php echo $fetch['department'] ?></td>
						<td><?php echo $fetch['course'] ?></td>
						<td><?php echo $fetch['major'] ?></td>
						<td><?php echo $fetch['year'] ?></td>
						<td><?php echo $fetch['status'] ?></td>
						<td><?php echo $fetch['cabinet'] ?></td>
						<td>********</td>
						<td>
							<center>
								<button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['stud_id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
								<button class="btn btn-danger btn-delete" id="<?php echo $fetch['stud_id'] ?>" type="button"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							</center>
						</td>
					</tr>
					<div class="modal fade" id="edit_modal<?php echo $fetch['stud_id'] ?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form method="POST" action="update_student.php">
									<div class="modal-header">
										<h4 class="modal-title"> Update Student</h4>
										<input type="text" hidden name="studend_id" value="<?php echo $fetch['stud_id'] ?>">
									</div>
									<div class="modal-body">
										<div class="col-md-12">
											<div class="form-group">
												<label>Stud No.</label>
												<input type="number" name="stud_no" value="<?php echo $fetch['stud_no'] ?>" class="form-control" readonly="readonly" />
											</div>
											<div class="form-group">
												<label>Firstname</label>
												<input type="text" name="firstname" value="<?php echo $fetch['firstname'] ?>" class="form-control" required="required" />
											</div>
											<div class="form-group">
												<label>Lastname</label>
												<input type="text" name="lastname" value="<?php echo $fetch['lastname'] ?>" class="form-control" required="required" />
											</div>
											<div class="form-group">
												<label>Gender</label>
												<select name="gender" class="form-control" required="required">
													<option value=""></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="form-group">
												<label>College Department</label>
												<select name="department" class="form-control" required="required">
													<option value=""></option>
													<option value="CAFA">College of Architecture and Fine Arts</option>
													<option value="CAS">College of Arts and Sciences</option>
													<option value="CBA">College of Business Administration</option>
													<option value="CEd">College of Education</option>
													<option value="CE">College of Engineering</option>
													<option value="CHM">College of Hospitality Management</option>
													<option value="CIT">College of Industrial Technology</option>
													<option value="CPAC">College of Public Administration and Criminology</option>
												</select>
											</div>
											<div class="form-group">
												<label>Course</label>
												<select name="course" class="form-control" required="required">
													<option value=""></option>
													<option value="BSARCHI">Bachelor of Science in Architecture (BS ARCHI.)</option>
													<option value="BSID">Bachelor of Science in Interior Design (BSID)</option>
													<option value="BFA">Bachelor in Fine Arts (BFA)</option>
													<option value="BSAP">Bachelor of Science in Applied Physics with Computer Science Emphasis (BSAP)</option>
													<option value="BSCS">Bachelor of Science in Computer Science (BSCS)</option>
													<option value="BSINFOTECH">Bachelor of Science in Information Technology (BS INFO. TECH.)</option>
													<option value="BSPSYCH">Bachelor of Science in Psychology (BSPSYCH)</option>
													<option value="BSMATH">Bachelor of Science in Mathematics (BSMATH)</option>
													<option value="BSBA">Bachelor of Science in Business Administration (BSBA)</option>
													<option value="BSEM">Bachelor of Science in Entrepreneurship (BSEM)</option>
													<option value="BSOA">Bachelor of Science in Office Administration (BSOA)</option>
													<option value="BSE">Bachelor in Secondary Education (BSE)</option>
													<option value="BSNEd">Bachelor in Special Needs Education (BSNEd)</option>
													<option value="BTLE">Bachelor in Technology and Livelihood Education (BTLE)</option>
													<option value="BSCHE">Bachelor of Science in Chemical Engineering (BSCHE)</option>
													<option value="BSCE">Bachelor of Science in Civil Engineering (BSCE)</option>
													<option value="BSEE">Bachelor of Science in Electrical Engineering (BSEE)</option>
													<option value="BSECE">Bachelor of Science in Electronics and Communication Engineering (BSECE)</option>
													<option value="BSME">Bachelor of Science in Mechanical Engineering (BSME)</option>
													<option value="BSCOE">Bachelor of Science in Computer Engineering (BSCOE)</option>
													<option value="BST">Bachelor of Science in Tourism Management (BST)</option>
													<option value="BSHM">Bachelor of Science in Hospitality Management (BSHM)</option>
													<option value="BSIT">Bachelor of Science in Industrial Technology (BSIT)</option>
													<option value="BPA">Bachelor in Public Administration (BPA)</option>
													<option value="BSCRIM">Bachelor of Science in Criminology (BSCRIM)</option>
												</select>
											</div>
											<div class="form-group">
												<label>Major</label>
												<select name="major" class="form-control" required="required">
													<option value=""></option>
													<option value="">-</option>
													<option value="Painting">Painting</option>
													<option value="Visual-Communication">Visual Communication</option>
													<option value="Marketing-Management">Marketing Management</option>
													<option value="Human-Resource-Development-Management">Human Resource Development Management</option>
													<option value="Science">Science</option>
													<option value="Mathematics">Mathematics</option>
													<option value="Filipino">Filipino</option>
													<option value="Home-Economics">Home Economics</option>
													<option value="Industrial-Arts">Industrial Arts</option>
													<option value="Automotive-Technology">Automotive Technology</option>
													<option value="Electrical-Technology">Electrical Technology</option>
													<option value="Electronics-Technology">Electronics Technology</option>
													<option value="Food-Technology">Food Technology</option>
													<option value="Fashion-and-Apparel-Technology">Fashion and Apparel Technology</option>
													<option value="Industrial-Chemistry">Industrial Chemistry</option>
													<option value="Drafting-Technology">Drafting Technology</option>
													<option value="Machine-Shop-Technology">Machine Shop Technology</option>
													<option value="Refrigeration-and-Air-Conditioning">Refrigeration and Air Conditioning</option>
												</select>
											</div>
											<div class="form-group">
												<label>Year</label>
												<select name="year" class="form-control" required="required">
													<option value=""> Current Year <?php echo $fetch['year'] ?></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
												<label>Section</label>
												<select name="section" class="form-control" required="required">
													<option value=""></option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
												</select>
											</div>
											<div class="form-group">
												<label>Status</label>
												<select name="status" class="form-control" required="required">
													<option value=""></option>
													<option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
													<option value="Graduate">Graduate</option>
												</select>
											</div>
											<div class="form-group">
												<label>Cabinet</label>
												<select name="cabinet" class="form-control" required="required">
													<option value=""></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
											<br />
											<div class="form-group">
												<label>Password</label>
												<input type="password" name="password" class="form-control" required="required" />
											</div>
										</div>
									</div>
									<div style="clear:both;"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
										<button name="update" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span> Update</button>
									</div>
							</div>
						</div>

						</form>
					</div>
	</div>
	</div>
<?php
				}
?>
</tbody>
</table>
</div>
<div class="modal fade" id="modal_confirm" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">System</h3>
			</div>
			<div class="modal-body">
				<center>
					<h4 class="text-danger">All files of the student will also be deleted.</h4>
				</center>
				<center>
					<h3 class="text-danger">Are you sure you want to delete this data?</h3>
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="btn_yes">Yes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" action="save_student.php">
				<div class="modal-header">
					<h4 class="modal-title">Add Student</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-12">

						<br />
						<div class="form-group">
							<label>Stud No.</label>
							<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="5" name="stud_no" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="firstname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lastname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control" required="required">
								<option value=""></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>College Department</label>
							<select name="department" class="form-control" required="required">
								<option value=""></option>
								<option value="CAFA">College of Architecture and Fine Arts</option>
								<option value="CAS">College of Arts and Sciences</option>
								<option value="CBA">College of Business Administration</option>
								<option value="CEd">College of Education</option>
								<option value="CE">College of Engineering</option>
								<option value="CHM">College of Hospitality Management</option>
								<option value="CIT">College of Industrial Technology</option>
								<option value="CPAC">College of Public Administration and Criminology</option>
							</select>
						</div>
						<div class="form-group">
							<label>Course</label>
							<select name="course" class="form-control" required="required">
								<option value=""></option>
								<option value="BSARCHI">Bachelor of Science in Architecture (BS ARCHI.)</option>
								<option value="BSID">Bachelor of Science in Interior Design (BSID)</option>
								<option value="BFA">Bachelor in Fine Arts (BFA)</option>
								<option value="BSAP">Bachelor of Science in Applied Physics with Computer Science Emphasis (BSAP)</option>
								<option value="BSCS">Bachelor of Science in Computer Science (BSCS)</option>
								<option value="BSINFOTECH">Bachelor of Science in Information Technology (BS INFO. TECH.)</option>
								<option value="BSPSYCH">Bachelor of Science in Psychology (BSPSYCH)</option>
								<option value="BSMATH">Bachelor of Science in Mathematics (BSMATH)</option>
								<option value="BSBA">Bachelor of Science in Business Administration (BSBA)</option>
								<option value="BSEM">Bachelor of Science in Entrepreneurship (BSEM)</option>
								<option value="BSOA">Bachelor of Science in Office Administration (BSOA)</option>
								<option value="BSE">Bachelor in Secondary Education (BSE)</option>
								<option value="BSNEd">Bachelor in Special Needs Education (BSNEd)</option>
								<option value="BTLE">Bachelor in Technology and Livelihood Education (BTLE)</option>
								<option value="BSCHE">Bachelor of Science in Chemical Engineering (BSCHE)</option>
								<option value="BSCE">Bachelor of Science in Civil Engineering (BSCE)</option>
								<option value="BSEE">Bachelor of Science in Electrical Engineering (BSEE)</option>
								<option value="BSECE">Bachelor of Science in Electronics and Communication Engineering (BSECE)</option>
								<option value="BSME">Bachelor of Science in Mechanical Engineering (BSME)</option>
								<option value="BSCOE">Bachelor of Science in Computer Engineering (BSCOE)</option>
								<option value="BST">Bachelor of Science in Tourism Management (BST)</option>
								<option value="BSHM">Bachelor of Science in Hospitality Management (BSHM)</option>
								<option value="BSIT">Bachelor of Science in Industrial Technology (BSIT)</option>
								<option value="BPA">Bachelor in Public Administration (BPA)</option>
								<option value="BSCRIM">Bachelor of Science in Criminology (BSCRIM)</option>
							</select>
						</div>
						<div class="form-group">
							<label>Major</label>
							<select name="major" class="form-control" required="required">
								<option value=""></option>
								<option value="">-</option>
								<option value="Painting">Painting</option>
								<option value="Visual-Communication">Visual Communication</option>
								<option value="Marketing-Management">Marketing Management</option>
								<option value="Human-Resource-Development-Management">Human Resource Development Management</option>
								<option value="Science">Science</option>
								<option value="Mathematics">Mathematics</option>
								<option value="Filipino">Filipino</option>
								<option value="Home-Economics">Home Economics</option>
								<option value="Industrial-Arts">Industrial Arts</option>
								<option value="Automotive-Technology">Automotive Technology</option>
								<option value="Electrical-Technology">Electrical Technology</option>
								<option value="Electronics-Technology">Electronics Technology</option>
								<option value="Food-Technology">Food Technology</option>
								<option value="Fashion-and-Apparel-Technology">Fashion and Apparel Technology</option>
								<option value="Industrial-Chemistry">Industrial Chemistry</option>
								<option value="Drafting-Technology">Drafting Technology</option>
								<option value="Machine-Shop-Technology">Machine Shop Technology</option>
								<option value="Refrigeration-and-Air-Conditioning">Refrigeration and Air Conditioning</option>
							</select>
						</div>
						<div class="form-inline">
							<label>Status</label>
							<select name="status" class="form-control" required="required">
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
								<option value="Graduate">Graduate</option>
							</select>
							<label>Cabinet</label>
							<select name="cabinet" class="form-control" required="required">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<br>
						<div class="form-inline">
							<label>Year</label>
							<select name="year" class="form-control" required="required">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<label>Section</label>
							<select name="section" class="form-control" required="required">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
					</div>
				</div>

				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button name="save" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include 'script.php' ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-delete').on('click', function() {
			var stud_id = $(this).attr('id');
			console.log(stud_id);
			$("#modal_confirm").modal('show');
			$('#btn_yes').attr('name', stud_id);
		});
		$('#btn_yes').on('click', function() {
			var id = $(this).attr('name');
			alert(id);
			$.ajax({
				type: "POST",
				url: "delete_student.php",
				data: {
					stud_id: id
				},
				success: function() {
					$("#modal_confirm").modal('hide');
					$(".del_student" + id).empty();
					$(".del_student" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
					setTimeout(function() {
						$(".del_student" + id).fadeOut('slow');
					}, 1000);
				}
			});
		});

	});
</script>
</body>

</html>