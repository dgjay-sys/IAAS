<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="col-md-4"></div>
<div class="col-md-3">
	<div class="panel panel-primary" id="panel-margin"  style="margin-top: 50%; margin-right: -20%; margin-left: 20%;">
		<div class="panel-heading">
			<center><h1 class="panel-title"><b>Administrator</b></h1></center>
		</div>
		<div class="panel-body">
			<form  action="./login_query.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" name="username" placeholder="Username" type="text" required="required" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required="required" >
				</div>
				<div class="g-recaptcha" data-sitekey="6LcHD2EkAAAAAEwCwTOMqtWiqV_mnJh72WGThyWD"></div>
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div>
</div>	