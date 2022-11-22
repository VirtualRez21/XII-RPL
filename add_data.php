<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BELAJAR CRUD</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	
</head>
<body>
	<form action="proses.php" method="POST" enctype="multipart/form-data">
		<div class="apsection">
			<label>nisn</label>
			<input type="number" name="nisn[]">
			<br><br>
			<label>nama</label>
			<input type="text" name="nama[]">
			<br><br>
			<label>alamat</label>
			<input type="text" name="alamat[]">
			<br><br>
			<label>jenis kelamin</label>
			<input type="text" name="jenis_kelamin[]">
			<br><br>
			<label>foto</label>
			<input type="file" name="foto[]" accept="image/*" required>
			<br><br>
		</div>

		<input type="submit" name="submit"> <!-- tombol kirim -->
		<button	id="btn">Add More</button>


	</form>

<script>
	$('document').ready(function(){
		$('#btn').click(function(e){
			e.preventDefault();
			$('.apsection').append('<label>nisn</label><input type="number" name="nisn[]"><br><br><label>nama</label><input type="text" name="nama[]"><br><br><label>alamat</label><input type="text" name="alamat[]"><br><br><label>jenis kelamin</label><input type="text" name="jenis_kelamin[]"><br><br><label>foto</label><input type="file" name="foto[]" accept="image/*" required><br><br>')
		});
	});
</script>
</body>
</html>