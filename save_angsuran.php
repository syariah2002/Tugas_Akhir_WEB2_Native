<?php
include "connect.php";
	$id_angsuran 		= $_POST['id_angsuran'];
	$id_petugas 		= $_POST['id_petugas'];
	$id_anggota 		= $_POST['id_anggota'];
	$id_pinjaman		= $_POST['id_pinjaman'];
	$tgl_pembayaran		= $_POST['tgl_pembayaran'];
	$angsuran_ke	 	= $_POST['angsuran_ke'];
	$ket			 	= $_POST['ket'];
	$query				= mysqli_query 
						($conn, "INSERT INTO angsuran 
(id_angsuran,id_petugas,id_anggota,id_pinjaman, tgl_pembayaran,angsuran_ke,ket) 
						VALUES
('$id_angsuran','$id_petugas','$id_anggota', '$id_pinjaman', '$tgl_pembayaran','$angsuran_ke','$ket')
		");

	if ($query){
		echo "sukses";
			header('location: angsuran.php');
	} else {
		echo "Terjadi kesalahan saat menambah data... <br>".mysqli_error($conn);
	}
?>
