<?php
	require 'koneksi.php';

	$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>BELAJAR CRUD</title>
</head>
<body>
	
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
						<a href="proses.php?delete=<?php echo $data["id"] ?>">delete<i>&#x1F5D1;</i></a>
					</td>
				</tr>
			<?php
				}
			?>
	</table>
</body>
</html>
