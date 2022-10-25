<?php
	require 'koneksi.php';

	if(isset($_POST['submit'])){
		$nisn = $_POST['nisn'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$namaFoto = $tglAndWaktu.$_FILES['foto']['name'];
		$foto = $_FILES['foto']['tmp_name'];

		move_uploaded_file($foto, 'media/foto_profile/'.$namaFoto);

		$sql = "INSERT INTO siswa (id, nisn, nama, alamat, jenis_kelamin, foto) VALUES ('', '$nisn', '$nama', '$alamat', '$jenis_kelamin', '$namaFoto')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>

			alert('data berhasil ditambah');

			</script>";
		}
	}

	if ($_GET['edit']) {
		
	}

	if ($_GET['delete']) {
		
	}
?>