<!DOCTYPE html>
<html>
<head>
	<title>Editing User</title>
</head>
<body>
	<h1>Edit <?= $user["first_name"] . " " . $user["last_name"] ?></h1>
	<form action="/users/update/<?= $user['id'] ?>" method="post">
		<p>
			<label>First Name:</label>
			<input type="text" name="first_name" value="<?= $user["first_name"] ?>">
		</p>
		<p>
			<label>Last Name:</label>
			<input type="text" name="last_name" value="<?= $user["last_name"] ?>">
		</p>
		<input type="submit" name="Edit User">
	</form>
</body>
</html>