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
					($conn, "INSERT INTO pinjaman 
(id_pinjaman,id_anggota,id_petugas,besar_pinjaman,tgl_pengajuan_pinjaman,tgl_acc_pinjaman,tgl_pinjaman,tgl_pelunasan) 
						VALUES
('$id_pinjaman','$id_anggota','$id_petugas','$besar_pinjaman','$tgl_pengajuan_pinjaman','$tgl_acc_pinjaman','$tgl_pinjaman','$tgl_pelunasan')
		");

if($query){
	echo "Berhasil menambah data!";
		header('location: pinjaman.php');
} else {
	echo "Terjadi kesalahan saat menambah data <br>".mysqli_error($conn);
}
?>
