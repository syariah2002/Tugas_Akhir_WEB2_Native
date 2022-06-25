<?php
include "connect.php";
	$id_simpanan		= $_GET['id_simpanan'];
	$query				= mysqli_query($conn, "delete from simpanan where id_simpanan='$id_simpanan'");

if ($query){
	header('Location: simpanan.php');
} else {
	die('Terjadi kesalahan saat menghapus data'.mysqli_error($conn));
}
?>