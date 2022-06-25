<?php
include "connect.php";
	$id_anggota 				= $_POST['id_anggota'];
	$username		 			= $_POST['username'];
	$nama 						= $_POST['nama'];
	$alamat		 				= $_POST['alamat'];
	$tgl_lhr		 			= $_POST['tgl_lhr'];
	$tmp_lhr				 	= $_POST['tmp_lhr'];
	$j_kel			 			= $_POST['j_kel'];
	$status		 				= $_POST['status'];
	$no_tlp			 			= $_POST['no_tlp'];
	$query						= mysqli_query
							($conn, "UPDATE anggota  SET 	id_anggota='$id_anggota',
													username='$username',
													nama='$nama',
													alamat='$alamat',
													tgl_lhr='$tgl_lhr',
													tmp_lhr='$tmp_lhr',
													j_kel='$j_kel',
													status='$status',
													no_tlp='$no_tlp'
							WHERE id_anggota='$id_anggota'");
if ($query){
	echo "sukses";
		header('Location: anggota.php');
} else {
	echo "gagal".mysqli_error($conn);
}
	?>