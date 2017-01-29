<html>
<head>
	<title>Welcome Page For User</title>
</head>
<body>
	<h2>Welcome <?php echo $this->session->userdata['first_name']; ?> </h2>

	<h3>User Information</h3>
	<p>First Name: <?php echo $this->session->userdata['first_name']; ?> </p>
	<p>Last Name: <?php echo $this->session->userdata['last_name']; ?> </p>
	<p>Email Address: <?php echo $this->session->userdata['email']; ?> </p>
	<a href="/students/logout">Log off</a>

</body>
</html>