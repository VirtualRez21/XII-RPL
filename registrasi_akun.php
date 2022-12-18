<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrasi Akun</title>
</head>
<body>

	<form method="POST" action="proses.php">
		<label>Nama: </label>
		<input type="text" name="nama" required>
		<br><br>

		<label>Username: </label>
		<input type="text" name="username" required>
		<br><br>

		<label>Password: </label>
		<input type="password" name="password" required>
		<br><br>

		<label>Konfirmasi Password: </label>
		<input type="password" name="konfir_password" required>
		<br><br>

		<input type="submit" name="submit_registrasi">
	</form>

</body>
</html>