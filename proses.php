<?php
	require 'koneksi.php';

	if(isset($_POST['submit'])){
		$nisn = $_POST['nisn'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];

		$namaFoto = $_FILES['foto']['name'];
		$foto = $_FILES['foto']['tmp_name'];

		for ($i=0; $i < count($nisn); $i++) { 
			$namaFotoBaru = $tglAndWaktu.$namaFoto[$i];

			move_uploaded_file($foto[$i], 'media/foto_profile/'.$namaFotoBaru);

			$sql = "INSERT INTO siswa (id, nisn, nama, alamat, jenis_kelamin, foto) VALUES ('', '$nisn[$i]', '$nama[$i]', '$alamat[$i]', '$jenis_kelamin[$i]', '$namaFotoBaru')";

			$result = mysqli_query($conn, $sql);
		}

		if ($result) {
			echo "<script>

			alert('Data berhasil ditambah');window.location='index.php'

			</script>";
		}
	}

	elseif (isset($_POST['submit_edit'])) {
		$id = $_POST['id'];
		$nisn = $_POST['nisn'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];

		$queryShow = "SELECT * FROM siswa WHERE id = '$id';";
		$sqlShow = mysqli_query($conn, $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if($_FILES['foto']['name'] == ""){
			$foto = $result['foto'];
		}
		else{
			$foto = $tglAndWaktu.$_FILES['foto']['name'];
			unlink("media/foto_profile/".$result['foto']);
			move_uploaded_file($_FILES['foto']['tmp_name'], "media/foto_profile/".$foto);
		}
		$query = "UPDATE siswa SET nisn='$nisn', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', foto='$foto' WHERE id = '$id';";
		$sql = mysqli_query($conn, $query);

		echo "<script>
			alert('Data Berhasil Diedit :)');window.location='index.php'
			</script>
			";
	}

	elseif (isset($_GET['delete'])) {
		$idnya = $_GET['delete'];

		$query = "SELECT * FROM siswa WHERE id = '$idnya';";
		$sql = mysqli_query($conn, $query);
		$result = mysqli_fetch_assoc($sql);

		if($result == NULL){
			echo "<script>
			alert('Data Tidak Ditemukan :(');window.location='index.php'
			</script>
			";
		}
		else{
			unlink("media/foto_profile/".$result['foto']);
			$query2 = "DELETE FROM siswa WHERE siswa.id = '$idnya';";
			$sql2 = mysqli_query($conn, $query2);

			if($sql2){
				echo "<script>
				alert('Data Berhasil Dihapus :(');window.location='index.php'
				</script>
				";
			}
		}
	}
?>