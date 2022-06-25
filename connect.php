<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "db_koperasi_simpan_pinjam";

	$conn =	mysqli_connect($host,$user,$pass,$db) or die("Gagal terhubung ke database".mysqli_connect_error());
?>