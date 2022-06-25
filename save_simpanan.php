<?php
include "connect.php";
	$id_simpanan 		= $_POST['id_simpanan'];
	$id_petugas 		= $_POST['id_petugas'];
	$id_anggota			= $_POST['id_anggota'];
	$nm_simpanan 		= $_POST['nm_simpanan'];
	$tgl_simpanan		= $_POST['tgl_simpanan'];
	$besar_simpanan 	= $_POST['besar_simpanan'];
	$query				= mysqli_query 
					($conn, "INSERT INTO simpanan 
					(id_simpanan,id_petugas,id_anggota,nm_simpanan,tgl_simpanan,besar_simpanan) 
						VALUES
					('$id_simpanan','$id_petugas','$id_anggota','$nm_simpanan','$tgl_simpanan','$besar_simpanan')
		");//query sql untuk insert data
	if($query){
		echo "sukses";
	?><script>document.location.href="simpanan.php"</script><?php
	} else {
		echo "gagal:".mysqli_error($conn);
	}
?>