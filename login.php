<?php
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
</head>
<body>

	<form method="POST" action="proses.php">
		<label>Username: </label>
		<input type="text" name="username" required>
		<br><br>

		<label>Password: </label>
		<input type="password" name="password" required>
		<br>

		<input type="submit" name="submit_login_admin">
	</form>

</body>
</html>