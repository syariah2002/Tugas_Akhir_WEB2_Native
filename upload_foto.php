<?php
    session_start();
    include "connect.php";
    $nama   = $_FILES['upload']['name'];
    $tmp    = $_FILES['upload']['tmp_name'];
    $error  = $_FILES['upload']['error'];
    $size   = $_FILES['upload']['size'];
    $format = $_FILES['upload']['type'];

    //validasi gambar

    if ( $error == 0){

        if ($size < 3000000){//3MB

            if ($format = 'image/jpeg' || 'image/png'){
                move_uploaded_file($tmp, 'data/img/'. $nama);
                $username = $_SESSION['username'];

                switch ($_SESSION['typeuser']) {
                    case 'admin':
                        $query = "UPDATE petugas SET gambar = '$nama' WHERE username = '$username'";
                        $exe = mysqli_query($conn, $query);
                        break;
                    
                    case 'member':
                        $query = "UPDATE anggota SET gambar = '$nama' WHERE username = '$username'";
                        $exe = mysqli_query($conn, $query);
                        break;

                    default:
                        echo "Terjadi kesalahan, tidak dapat mengupload file..".mysqli_error($conn);
                        break;
                }

                    if ($exe){
                        echo "Berhasil mengupload foto!";
                    } else {
                        echo "Gagal mengupload foto...".mysqli_error($conn);
                    }

            } else {
                echo "File yang anda upload harus jpeg/png..";
            }

        } else {
            echo "Ukuran gambar yang diupload terlalu besar, Silahkan pilih gambar lain..";
        }

    } else {
        echo "Ada error!".mysqli_error($conn);
    }


?>