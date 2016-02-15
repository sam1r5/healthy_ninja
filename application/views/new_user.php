<!DOCTYPE html>
<html>
<head>
	<title>New User page</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
</head>
<body>
<?php  
	if($this->session->flashdata("errors"))
	{
		echo $this->session->flashdata("errors");
	}
?>

	<h1>New User</h1>
	<form action="/users/create" method="post">
		<p>
			<label>First Name:</label>
			<input type="text" name="first_name">
		</p>
		<p>
			<label>Last Name:</label>
			<input type="text" name="last_name">
		</p>
		<input type="submit" name="Add User">
	</form>
</body>
</html>