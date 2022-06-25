<?php
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $subjek     = $_POST['subjek'];
    $pesan      = $_POST['pesan'];
    $tujuan     = "syariah.syariah2002@gmail.com";
    $header     = "From: $email";

    if ( mail($tujuan, $subjek, $pesan, $header) ){
        echo "Pesan berhasil dikirim!";
    }

?>