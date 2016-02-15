<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>
</head>
<body>
	<h1>All Users</h1>
<?php  
	foreach($users as $user) 
	{
?>
		<p>
			<a href="/users/show/<?= $user['id'] ?>">First Name: <?= $user["first_name"] ?> | Last Name: <?= $user["last_name"] ?></a>
		</p>
<?php
	}
?>
	<a href="/users/new_user">New User</a>


	<form action="/users/updating" method="put">
		<!-- <input type="hidden" name="_method" value="patch"> -->
		<input type="submit" value="work!">
	</form>
</body>
</html>