<?php
  session_start();
  include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
			<title> Koperasi Simpan Pinjam </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- CSS -->
		<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">		
    <link href="modal/css/bootstrap.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/profile.css">
		<link rel="stylesheet" href="assets/jQuery/jquery-ui.css">
		
		<!-- Javascript -->
		<script src="modal/js/jquery.js" type="text/javascript"></script>
		<script src="modal/js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" language="javascript" src="assets/jQuery/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="assets/jQuery/jquery-ui.js"></script>
		<script type="text/javascript" language="javascript" class="init">
		$(function(){
			$(".datepicker").datepicker({
				dateFormat: "yy-mm-dd"
			});
		});
	
		</script>
	
	</head>

  <body>
	
  <?php
		if( !isset($_SESSION['username']) ){
			die ("Anda belum login, login terlebih dahulu");
      			
		} //else if ($_SESSION['typeuser'] != "admin"){
				//die("Anda bukan admin, dilarang mengakses halaman ini");
		  //}

            $username = $_SESSION['username'];
      $typeuser = $_SESSION['typeuser'];

      switch ($_SESSION['typeuser']) {
        case 'admin':
        $query = mysqli_query($conn, "SELECT * FROM petugas INNER JOIN login ON petugas.username = login.username WHERE login.username = '$username' AND login.typeuser='$typeuser'");  
        $fetch = mysqli_fetch_array($query);
        $id = $fetch['id_petugas'];
        if($fetch){
          }  else {
            echo "Gagal" .mysqli_error($conn);
          }
          break;
        
        case 'member':
        $query = mysqli_query($conn, "SELECT * FROM anggota WHERE username='$username'");
        $fetch = mysqli_fetch_array($query);
        $id = $fetch['id_anggota'];
        if($fetch){
          }  else {
            echo "Gagal" .mysqli_error($conn);
          }
          break;

        default:
          echo "Terjadi kesalahan, tidak bisa menampilkan informasi pada akun anda".mysqli_error($conn);
          break;
      }

    global $fetch;

			
	?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="profile.php"> <?php echo 'Hai, '.$_SESSION['username'] ?> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           	<li><a href="index.html"> Beranda </a></li>
           <li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Dashboard <span class="caret"></span></a>
          		<ul class="dropdown-menu">
				    <li><a href="dashboard.php"> Dashboard </a></li>
					<li class="divider"></li>
            		<li><a href="simpanan.php"> Simpanan </a></li>
            		<li><a href="pinjaman.php"> Pinjaman </a></li>
					<li><a href="anggota.php"> Anggota </a></li>
            		<li><a href="angsuran.php"> Angsuran </a></li>
          		</ul>
        	</li>
  			<li class="dropdown">
          		<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Akun <span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="profile.php"> Profil </a></li>
            		<li><a href="logout.php"> Logout </a></li>
          		</ul>
        	</li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="header">
	   <h3 id="lead"><i class="fa fa-group"></i> Halaman Profil </h3>
	</div>	

  <div class="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="foto">
                        <?php
                $username = $_SESSION['username'];

                  switch ($_SESSION['typeuser']) {
                    case 'admin':
                      $exe  = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
                      $ambil = mysqli_fetch_array($exe);
                      
                      if($ambil){
                      
                      }  else {
                        echo "Gagal" .mysqli_error($conn);
                      }

                      break;
                    
                    case 'member':
                      $query = "SELECT * FROM anggota WHERE username = '$username'";
                      $exe   = mysqli_query($conn, $query);
                      $ambil = mysqli_fetch_array($exe);
                      
                      if($ambil){
                      
                      }  else {
                        echo "Gagal" .mysqli_error($conn);
                      }

                      break;
                    
                    default:
                      echo "Error! tidak dapat menampilkan foto profil anda..".mysqli_error($conn);
                      break;
                  }

                  global $ambil;
                ?>

            <img src="assets/img/<?= $ambil['gambar']?>" class="img-thumbnail">
              <p id="pname"> <?php echo $fetch ['nama']; ?> </p>
                <div class="group-button">
                  <a href="form_profile.php" class="btn btn-primary"><i class="fa fa-pencil fa-2x"></i> </a>
                  <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out fa-2x"></i> </a>
                </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="info">
            <div class="info-header">
              <h3> Informasi Akun </h3>
            </div>
            <ul>
              <li> Username : <?php echo $fetch ['username']; ?> </li>
              <li> ID : <?php echo $id ?> </li>
              <li> Alamat : <?php echo $fetch ['alamat']; ?> </li>
              <li> Tanggal Lahir : <?php echo $fetch ['tgl_lhr']; ?> </li>
              <li> Tempat Lahir : <?php echo $fetch ['tmp_lhr']; ?> </li>
              <li> Jenis Kelamin : <?php echo $fetch ['j_kel']; ?> </li>
              <li> Status : <?php echo $fetch ['status']; ?> </li>
              <li> No. Telp : <?php echo $fetch ['no_tlp']; ?> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </body>
</html>