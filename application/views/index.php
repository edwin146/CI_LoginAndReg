<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<h3>Login</h3>
	<form action="/students/login" method="post">
		<!-- <input type="hidden" name="action" value="login"> -->
		<label>Email</label><br>
		<input type='text' name="email"><br>
		<label>Password</label><br>
		<input type="password" name="password"><br>
		<input type="submit" value="Login"><br>
	</form>

	<?php 
	  if($this->session->flashdata("login_error")) 
	  {
	    echo $this->session->flashdata("login_error");
	  }
	?>


	<h3>Or Register</h3>
	<form action="/students/create" method="post">
		<!-- <input type="hidden" name="action" value="register"> -->
		<label>First Name:</label><br>
		<input type='text' name='first_name'><br>
		<label>Last Name:</label><br>
		<input type='text' name='last_name'><br>
		<label>Email Address:</label><br>
		<input type='text' name='email'><br>
		<label>Password:</label><br>
		<input type='password' name='password'><br>
		<label>Confirm Password:</label><br>
		<input type='password' name='confirm_password'><br>
		<input type='submit' value="Register">
	</form>

	<?php if(isset($errors) && !empty($errors)){
			echo $errors;
	} ?>

</body>
</html>