<?php
    session_start();
    include "connect.php";
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $id         = $_POST['id'];
    $alamat     = $_POST['alamat'];
    $tgl_lhr    = $_POST['tgl_lhr'];
    $tmp_lhr    = $_POST['tmp_lhr'];
    $j_kel      = $_POST['j_kel'];
    $status     = $_POST['status'];
    $no_tlp     = $_POST['no_tlp'];


    switch ($_SESSION['typeuser']) {
        case 'admin':
            $query = "UPDATE login INNER JOIN petugas ON login.username = petugas.username SET login.username = '$username' WHERE petugas.id_petugas='$id'";
            $query1 = "UPDATE petugas SET id_petugas='$id', nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', tmp_lhr='$tmp_lhr', j_kel='$j_kel', status='$status', no_tlp='$no_tlp' WHERE id_petugas='$id'";
            $exe = mysqli_query($conn, $query);
            $exe1 = mysqli_query($conn, $query1);
            break;
        
        case 'member':
            $query = "UPDATE login INNER JOIN anggota ON login.username = anggota.username SET login.username = '$username' WHERE anggota.id_anggota='$id'";
            $query1 = "UPDATE anggota SET id_anggota='$id', nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', tmp_lhr='$tmp_lhr', j_kel='$j_kel', status='$status', no_tlp='$no_tlp' WHERE id_anggota='$id'";
            $exe = mysqli_query($conn, $query);
            $exe1 = mysqli_query($conn, $query1);
            break;

            default:
                echo "Terjadi kesalahan...".mysqli_error($conn);
            break;
    }

    global $exe;
    global $exe1;


    if ($exe && $exe1){
        session_unset($_SESSION['username']);

        $cek = mysqli_query($conn, "select * from login where username='$username'");
		
		if ($cek){
			$fetch	= mysqli_fetch_array($cek);
			$_SESSION['username'] = $fetch['username'];
			$_SESSION['typeuser'] = $fetch['typeuser'];	
			}

            echo "Berhasil mengupdate profil!";        
    
    } else {
        echo "Gagal..".mysqli_error($conn);
    }
?>