<?php
	require 'koneksi.php';

	if (isset($_POST['submit_cari'])) {
		$cariData = $_POST['cari_data'];
		$cariDataSiswa = $_POST['cari_data_siswa'];

		if($cariData == "nisn"){
			$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn LIKE '%$cariDataSiswa%';");
		}
		elseif($cariData == "nama"){
			$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nama LIKE '%$cariDataSiswa%';");
		}
		elseif ($cariData == "alamat") {
			$result = mysqli_query($conn, "SELECT * FROM siswa WHERE alamat LIKE '%$cariDataSiswa%';");
		}
		elseif($cariData == "jenis_kelamin"){
			$result = mysqli_query($conn, "SELECT * FROM siswa WHERE jenis_kelamin LIKE '%$cariDataSiswa%';");
		}

		$number_of_results = mysqli_num_rows($result);
		if ($number_of_results == 0 || mysqli_num_rows($result) == 0) {
		 	echo "<script>
			alert('Data Tidak Ditemukan :(');window.location='index.php'
			</script>
			";
		 }
	}
	elseif(isset($_POST['submit_sort'])){
		$dataSort = $_POST['sort_data'];
		$dataSortValue = $_POST['sorting'];

		if ($dataSort == "nisn") {
			if($dataSortValue == "ascending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nisn ASC");
			}
			elseif($dataSortValue == "descending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nisn DESC");
			}
		}
		elseif ($dataSort == "nama") {
			if($dataSortValue == "ascending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nama ASC");
			}
			elseif($dataSortValue == "descending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nama DESC");
			}
		}
		elseif ($dataSort == "alamat") {
			if($dataSortValue == "ascending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY alamat ASC");
			}
			elseif($dataSortValue == "descending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY alamat DESC");
			}
		}
		elseif ($dataSort == "jenis_kelamin") {
			if($dataSortValue == "ascending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY jenis_kelamin ASC");
			}
			elseif($dataSortValue == "descending"){
				$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY jenis_kelamin DESC");
			}
		}
	}
	else{
		// $result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
		$siswa = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");

		$results_per_page = 4;
		$number_of_results = mysqli_num_rows($siswa);
		$number_of_pages = ceil($number_of_results / $results_per_page);

		if (isset($_GET['page'])){
		    if ( $_GET['page'] <= "0" || $_GET['page'] > $number_of_pages){
		        echo "<script>alert('Halaman tidak ditemukan'); document.location.href = 'index.php'; </script>";
		    }
		}

		$page = 1;
		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		}
		else{
		    $_GET['page'] = 1;
		}

		$this_page_first_result = ($page - 1) * $results_per_page;
		$sql = 'SELECT * FROM siswa ORDER BY id DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
		$result = mysqli_query($conn, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BELAJAR CRUD</title>
	<script type="text/javascript">
		function checkDelete(){
			return confirm('Yakin Data Ingin Dihapus?');
		}
	</script>
</head>
<body>
	<form method="POST" action="index.php">
		<select name="cari_data">
		  <option value="nisn">NISN</option>
		  <option value="nama">NAMA</option>
		  <option value="alamat">ALAMAT</option>
		  <option value="jenis_kelamin">JENIS KELAMIN</option>
		</select>

		<input type="text" name="cari_data_siswa" required>

		<input type="submit" name="submit_cari">
	</form>

	<br><br>

	<form method="POST" action="index.php">
		<select name="sort_data">
		  <option value="nisn">NISN</option>
		  <option value="nama">NAMA</option>
		  <option value="alamat">ALAMAT</option>
		  <option value="jenis_kelamin">JENIS KELAMIN</option>
		</select>

		<br>

		<input type="radio" name="sorting" value="ascending" required>
		<label>Ascending</label><br>

		<input type="radio" name="sorting" value="descending" required>
		<label>Descending</label><br>

		<input type="submit" name="submit_sort">
	</form>
	<br>

	<table border="4">
		<tr>
			<td>id</td>
			<td>nisn</td>
			<td>nama</td>
			<td>alamat</td>
			<td>jenis kelamin</td>
			<td>foto</td>
			<td>aksi</td>
		</tr>

			<?php
			while ($data = mysqli_fetch_assoc($result)) {
				?>

				<tr>
					<td> <?php echo $data["id"] ?></td>
					<td> <?php echo $data["nisn"] ?></td>
					<td> <?php echo $data["nama"] ?> </td>
					<td> <?php echo $data["alamat"] ?></td>
					<td> <?php echo $data["jenis_kelamin"] ?></td>
					<td> <img src="media/foto_profile/<?php echo $data['foto'] ?>" width="128"></td>
					<td>
						<a href="edit.php?edit=<?php echo $data["id"] ?>">edit<i>&#x270F;</i></a>
						<br>
						<a onclick="return checkDelete()" href="proses.php?delete=<?php echo $data["id"] ?>" >delete<i>&#x1F5D1;</i></a>
					</td>
				</tr>
			<?php
				}
			?>
	</table>
	<p>Page: </p>
	<?php
	    for ($page = 1; $page <= $number_of_pages; $page++) {
	    ?>
	         <a href="index.php?page=<?php echo $page; ?>" style="text-decoration:none"><u><?php echo $page; ?></u></a>
	    <?php
	    }
    ?>
</body>
</html>