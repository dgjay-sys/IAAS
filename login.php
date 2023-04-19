
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="col-md-4"></div>
<div class="col-md-4">
	<div class="panel panel-default" id="panel-margin">
		<div class="panel-heading">
			<center>
				<h1 class="panel-title"><b>Student Login</b></h1>
			</center>
		</div>
		<div class="panel-body">
			<form action="./login_query.php" method="POST">
				<div class="form-group">
					<label for="username">Student Number</label>
					<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="5" name="stud_no" class="form-control" required="required" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" type="password" required="required">
				</div>
				<div class="g-recaptcha" data-sitekey="6LdY2WAkAAAAADcuN73fER5LnNDTEBuCgxJ9Mzz6"></div>
				<div class="form-group">
					<button class="btn btn-block btn-primary" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	
</script>