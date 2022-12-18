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
	elseif(isset($_POST['submit_login_admin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		// admin
		$password = md5($password);
		// 21232f297a57a5a743894a0e4a801fc3

		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1){
			$login = mysqli_fetch_assoc($result);
			if($login['username'] === $username && $login['password'] === $password){
				$_SESSION['username'] = $login['username'];
				$_SESSION['password'] = $login['password'];
				echo "<script>
				alert('Berhasil Login :)');window.location='index.php'
				</script>
				";
			}
			else{
				echo "<script>
					alert('Username atau Password Salah!');window.location='index.php'
					</script>
					";
			}
		}
		else{
			echo "<script>
				alert('Username atau Password Salah!');window.location='index.php'
				</script>
				";
		}
	}

	elseif (isset($_POST['submit_registrasi'])) {
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$konfir_passwd = $_POST['konfir_password'];

		$sql = "SELECT * FROM user WHERE username='$username';";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			if($row['username'] == $username){
				echo "<script>alert('Username Sudah Terdaftar, Silahkan Gunakan Username Yang Lain');window.location='registrasi_akun.php'</script>";
			}
		}
		elseif ($password != $konfir_passwd || $konfir_passwd != $password) {
			echo "<script>alert('Password Tidak Sesuai Dengan Konfirmasi Password!');window.location='registrasi_akun.php'</script>";
		}
		elseif(strlen($password) >= 6){
			$password = md5($password);
			$sql = "INSERT INTO user VALUES ('', '$username', '$password', '$nama');";
			$result = mysqli_query($conn, $sql);

			echo "<script>alert('Registrasi Akun Berhasil :)');window.location='registrasi_akun.php'</script>";
		}
		else{
			echo "<script>alert('Password Tidak Disetujui!');window.location='registrasi_akun.php'</script>";
		}
	}
?>