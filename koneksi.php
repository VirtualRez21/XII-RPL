<?php
	session_start();
	date_default_timezone_set('Asia/Makassar');
	$tgl = date("Y-m-d");
	$waktu = date("h-i-sa");
	$tglAndWaktu = $tgl.$waktu;

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'smk_ketopong';
	$conn = mysqli_connect($host, $user, $pass, $dbname);

	if (!$conn) {
	    die("Koneksi gagal: " . mysqli_connect_error());
	}
?>