<?php
    include "connect.php";
    //ambil data dari form
	$username   = $_POST['username'];
	$password	= $_POST['password'];
	$nama 	    = $_POST['nama'];
	$alamat		= $_POST['alamat'];
	$tgl_lhr	= $_POST['tgl_lhr'];
	$tmp_lhr 	= $_POST['tmp_lhr'];
	$j_kel		= $_POST['j_kel'];
	$no_tlp	    = $_POST['no_tlp'];

    //input data dari form ke database (tabel login)
    $query		= mysqli_query
                ($conn, "INSERT INTO login (username, password, typeuser) 
                VALUES ('$username','$password','member')
                ");

    //input data dari form ke database (tabel anggota)    
    $query1		= mysqli_query
            ($conn, "INSERT INTO anggota (username, nama,alamat,tgl_lhr,tmp_lhr,j_kel,status,no_tlp) 
			    VALUES ('$username','$nama','$alamat','$tgl_lhr','$tmp_lhr','$j_kel','Anggota','$no_tlp')
	    	");

    if($query && $query1){
        header('Location: login.html');
    } else {
         echo "Gagal mendaftar.. <br>".mysqli_error($conn);
     }
?>