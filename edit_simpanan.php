<?php
include "connect.php";
	$id_simpanan 		= $_POST['id_simpanan'];
	$id_petugas 		= $_POST['id_petugas'];
	$id_anggota 		= $_POST['id_anggota'];
	$nm_simpanan 		= $_POST['nm_simpanan'];
	$tgl_simpanan 		= $_POST['tgl_simpanan'];
	$besar_simpanan 	= $_POST['besar_simpanan'];
	$query				= mysqli_query
							($conn, "UPDATE simpanan  SET 	id_simpanan='$id_simpanan',
													id_petugas='$id_petugas',
													id_anggota='$id_anggota',
													nm_simpanan='$nm_simpanan',
													tgl_simpanan='$tgl_simpanan',
													besar_simpanan='$besar_simpanan'
							WHERE id_simpanan='$id_simpanan'");
?><script>document.location.href='simpanan.php'</script><?php
if ($query){
	echo "sukses";
} else {
	echo "gagal".mysqli_error($conn);
}
	?>