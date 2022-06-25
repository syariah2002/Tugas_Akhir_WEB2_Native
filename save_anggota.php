<?php
include "connect.php";
	$id_anggota 	= $_POST['id_anggota'];
	$username		= $_POST['username'];
	$nama 			= $_POST['nama'];
	$alamat		 	= $_POST['alamat'];
	$tgl_lhr		= $_POST['tgl_lhr'];
	$tmp_lhr		= $_POST['tmp_lhr'];
	$j_kel			= $_POST['j_kel'];
	$status		 	= $_POST['status'];
	$no_tlp			= $_POST['no_tlp'];
	$query			= mysqli_query 
					($conn, "INSERT INTO anggota 
					(id_anggota,username,nama,alamat,tgl_lhr,tmp_lhr,j_kel,status,no_tlp) 
						VALUES
					('$id_anggota','$username','$nama','$alamat','$tgl_lhr','$tmp_lhr','$j_kel','$status','$no_tlp')
					");
	if($query){
		echo "Berhasil menambah data!";
			header('Location : anggota.php');
	} else {
		echo "Gagal menambah data... <br>".mysqli_error($con);
	}

?>
