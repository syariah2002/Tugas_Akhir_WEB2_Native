<?php
include "connect.php";
	$id_petugas		= $_POST['id_petugas'];
	$username			= $_POST['username'];
	$password			= $_POST['password'];
	$nama_petugas 		= $_POST['nama_petugas'];
	$alamat 			= $_POST['alamat'];
	$tgl_lhr 			= $_POST['tgl_lhr'];
	$tmp_lhr	 		= $_POST['tmp_lhr'];
	$j_kel				= $_POST['j_kel'];
	$status 			= $_POST['status'];
	$no_tlp				= $_POST['no_tlp'];
	$query				= mysqli_query 
					($con, "INSERT INTO petugas 
					(id_petugas,username, password, nama_petugas,alamat,tgl_lhr,tmp_lhr,j_kel,status,no_tlp) 
						VALUES
					('$id_petugas','$username','$password','$nama_petugas','$alamat','$tgl_lhr','$tmp_lhr','$j_kel','$status','$no_tlp')
		");//query sql untuk insert data
if($query){
	echo "sukses";
?><script>document.location.href="dashboard.php"</script><?php
}else{
echo "gagal:".mysqli_error($con);
}
?>
</body>
</html>