<?php 
	require 'koneksi.php';
	if($_SESSION['username'] == ""){
		header('location: login.php');
	}
	else{
		if (isset($_GET['edit'])) {
			$idnya = $_GET['edit'];

			$query = "SELECT * FROM siswa WHERE id = '$idnya';";
			$sql = mysqli_query($conn, $query);
			$result = mysqli_fetch_assoc($sql);

			if ($result == NULL) {
				echo "
					<script>
					alert('Data Tidak Ditemukan');window.location='index.php'
					</script>
				";
			}
			else{
				$id = $result['id'];
				$nisn = $result['nisn'];
				$nama = $result['nama'];
				$alamat = $result['alamat'];
				$jenis_kelamin = $result['jenis_kelamin'];
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belajar Edit</title>
</head>
<body>
	<form method="POST" action="proses.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id ?>">

		<label>Nisn: </label>
		<input type="number" name="nisn" value="<?php echo $nisn ?>">
		<br><br>

		<label>Nama: </label>
		<input type="text" name="nama" value="<?php echo $nama ?>">
		<br><br>

		<label>Alamat: </label>
		<input type="text" name="alamat" value="<?php echo $alamat ?>">
		<br><br>
		
		<label>Jenis Kelamin: </label>
		<input type="text" name="jenis_kelamin" value="<?php echo $jenis_kelamin ?>">
		<br><br>
		
		<label>Foto: </label>
		<input type="file" name="foto" accept="image/*">
		<br><br>

		<input type="submit" name="submit_edit">
	</form>
</body>
</html>