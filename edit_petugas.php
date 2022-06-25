<?php
include ('connect.php');
	$id_petugas		= $_POST['id_petugas'];
	$nama_petugas 		= $_POST['nama_petugas'];
	$alamat 			= $_POST['alamat'];
	$tgl_lhr 			= $_POST['tgl_lhr'];
	$tmp_lhr	 		= $_POST['tmp_lhr'];
	$j_kel				= $_POST['j_kel'];
	$status 			= $_POST['status'];
	$no_tlp				= $_POST['no_tlp'];
	$query				= mysqli_query 
							($con, "UPDATE petugas  SET id_petugas='$id_petugas',
													nama_petugas='$nama_petugas',
													alamat='$alamat',
													tgl_lhr='$tgl_lhr',
													tmp_lhr='$tmp_lhr',
													j_kel='$j_kel',
													status='$status',
													no_tlp='$no_tlp'
							WHERE id_petugas='$id_petugas'");
?><script>document.location.href='dashboard.php'</script>
<?php
if ($query){
	echo "sukses";
} else {
	echo "gagal".mysqli_error($con);
}
	?>