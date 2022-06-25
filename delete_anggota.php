<?php
include "connect.php";
	$id_anggota		= $_GET['id_anggota'];
	$query			= mysqli_query($conn, "delete from anggota where id_anggota='$id_anggota'");

if($query){
		header('Location : anggota.php');
	} else {
		echo "Gagal menghapus data... <br>".mysqli_error($conn);
	}
?>