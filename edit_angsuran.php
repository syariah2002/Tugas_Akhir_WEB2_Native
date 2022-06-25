<?php
include "connect.php";
	$id_angsuran 				= $_POST['id_angsuran'];
	$id_petugas 				= $_POST['id_petugas'];
	$id_anggota 				= $_POST['id_anggota'];
	$id_pinjaman				= $_POST['id_pinjaman'];
	$tgl_pembayaran			 	= $_POST['tgl_pembayaran'];
	$angsuran_ke	 			= $_POST['angsuran_ke'];
	$ket			 			= $_POST['ket'];
	$query						= mysqli_query
							($conn, "UPDATE angsuran  SET 	id_angsuran='$id_angsuran',
													id_petugas='$id_petugas',
													id_anggota='$id_anggota',
													id_pinjaman='$id_pinjaman',
													tgl_pembayaran='$tgl_pembayaran',
													angsuran_ke='$angsuran_ke',
													ket='$ket'
							WHERE id_angsuran='$id_angsuran'");
	if ($query){
		echo "sukses";
			header('location: angsuran.php');
	} else {
		echo "Terjadi kesalahan saat mengubah data... <br>".mysqli_error($conn);
	}
?>