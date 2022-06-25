<?php
include ('connect.php');
	$id_angsuran		= $_GET['id_angsuran'];
	$query				= mysqli_query($conn, "delete from angsuran where id_angsuran='$id_angsuran'");

	if ($query){
		echo "Berhasil menghapus data!";
			header('location: angsuran.php');
	} else {
		echo "Terjadi kesalahan saat menghapus data... <br>".mysqli_error($conn);
	}
?>