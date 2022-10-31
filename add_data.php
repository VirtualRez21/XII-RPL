<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BELAJAR CRUD</title>
</head>
<body>

	<form method="POST" action="proses.php" enctype="multipart/form-data">
		<label>nisn</label> <!-- inputan pertama -->
		<input type="number" name="nisn">
		<br><br>
		<label>nama</label> <!-- inputan kedua -->
		<input type="text" name="nama">
		<br><br>
		<label>alamat</label> <!-- inputan ketiga -->
		<input type="text" name="alamat">
		<br><br>
		<label>jenis kelamin</label> <!-- inputan keempat -->
		<input type="text" name="jenis_kelamin">
		<br><br>
		<label>foto</label> <!-- inputan kelima -->
		<input type="file" name="foto" accept="image/*" required>
		<br><br>
		<input type="submit" name="submit"> <!-- tombol kirim -->
	</form>

</body>
</html>
