<?php
include "connect.php";
	$id_pinjaman		= $_GET['id_pinjaman'];
	$query				= mysqli_query($conn, "delete from pinjaman where id_pinjaman='$id_pinjaman'");

if ($query){
	header('Location: pinjaman.php');
} else {
	die('Terjadi kesalahan saat menghapus data'.mysqli_error($conn));
}

?>
