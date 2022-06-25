<?php
include "connect.php";
	$id_pinjaman 				= $_POST['id_pinjaman'];
	$id_anggota 				= $_POST['id_anggota'];
	$id_petugas 				= $_POST['id_petugas'];
	$besar_pinjaman 			= $_POST['besar_pinjaman'];
	$tgl_pengajuan_pinjaman 	= $_POST['tgl_pengajuan_pinjaman'];
	$tgl_acc_pinjaman 			= $_POST['tgl_acc_pinjaman'];
	$tgl_pinjaman 				= $_POST['tgl_pinjaman'];
	$tgl_pelunasan	 			= $_POST['tgl_pelunasan'];
	$query						= mysqli_query
							($conn, "UPDATE pinjaman  SET 	id_pinjaman='$id_pinjaman',
													id_anggota='$id_anggota',
													id_petugas='$id_petugas',
													besar_pinjaman='$besar_pinjaman',
													tgl_pengajuan_pinjaman='$tgl_pengajuan_pinjaman',
													tgl_acc_pinjaman='$tgl_acc_pinjaman',
													tgl_pinjaman='$tgl_pinjaman',
													tgl_pelunasan='$tgl_pelunasan'
							WHERE id_pinjaman='$id_pinjaman'");
	if ($query){
		echo "Sukses mengubah data!";
			header('location: pinjaman.php');
	} else {
		echo "Terjadi kesalahan saat mengubah data".mysqli_error($conn);
	}
?>