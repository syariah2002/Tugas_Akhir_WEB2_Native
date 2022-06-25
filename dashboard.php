<!DOCTYPE html>
<?php
	include('connect.php');
	include('header.php');
?>

  <body>
	
  <?php
	session_start();
		if( !isset($_SESSION['username']) ){
			die ("Anda belum login, login terlebih dahulu");
      			
		} //else if ($_SESSION['typeuser'] != "admin"){
				//die("Anda bukan admin, dilarang mengakses halaman ini");
		  //}
			
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="simpanan.php"> Simpanan <span class="sr-only">(current)</span></a></li>
            <li><a href="pinjaman.php"> Pinjaman </a></li>
            <li><a href="anggota.php"> Anggota </a></li>
            <li><a href="angsuran.php"> Angsuran </a></li>
          </ul>
        </div>
		
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header">
			    <h3 id="text-header"> Dashboard Admin Koperasi Simpan Pinjam </h3>
		    </div>

      	<?php	if( isset($_SESSION['username']) ){ ?>
	      	<div class="alert alert-success alert-dismissable">
		      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			  	    &times;
			     </button>
		    
         
         
          <div class="row">
            <div class="col-lg-12">
                        <div class="alert alert-info">
                          <?php	echo $_SESSION['username'] ?>, Anda berhasil login! sebagai <?= $_SESSION['typeuser']; ?><br><br>
                          <center><img src="assets/img/20170215012741.jpg" height="300" width="300"><br><br></center>
                        </div>
              </div>
          </div>
        
	
		     </div>
       <?php }  ?>		  

        <?php if ($_SESSION['typeuser'] != "admin"){     } else {     ?>
       <h2 class="text-center" style="margin:4% auto;"><i class="fa fa-group"></i> Hak Admin </h2>
       <div class="col-md-6">
         <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-remove fa-3x"></i><h3 style="display:inline-block; margin-left:30%; text-align:center;"> Hapus </h3>
         </div>
         <div class="panel-body">
            <p> Admin dapat menghapus pada website yang sudah terintegrasi dengan database </p>
          </div>
        </div>
		  </div>

       <div class="col-md-6">
         <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-pencil fa-3x"></i><h3 style="display:inline-block; margin-left:30%; text-align:center;"> Ubah </h3>
         </div>
         <div class="panel-body">
            <p> Admin dapat mengubah data pada website yang sudah terintegrasi dengan database </p>
          </div>
        </div>
		  </div>
        
        <div class="col-md-6">
         <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-plus fa-3x"></i><h3 style="display:inline-block; margin-left:30%; text-align:center;"> Tambah </h3>
         </div>
         <div class="panel-body">
            <p> Admin dapat menambah data pada website yang sudah terintegrasi dengan database </p>
          </div>
        </div>
		  </div>

      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-check-circle fa-3x"></i><h3 style="display:inline-block; margin-left:30%; text-align:center;"> Hak Akses </h3>
          </div>
         <div class="panel-body">
            <p> Admin mendapatkan hak akses dan kendali penuh terhadap website </p>
          </div>
        </div>
		  </div>

        <?php } ?>

        </div>
      </div>
    </div>
	</body>
</html>