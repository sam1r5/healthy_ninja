<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
</head>
<body>
	<h1><?= $user["first_name"] . " " . $user["last_name"] . "'s profile page" ?></h1>

	<a href="/users/edit/<?= $user['id'] ?>">Edit User</a>
</body>
</html>