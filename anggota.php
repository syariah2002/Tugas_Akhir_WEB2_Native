<?php include('connect.php'); ?>
<?php include('header.php');?>
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
          <a class="navbar-brand" href=""> <?php echo 'Hai, '.$_SESSION['username'] ?> </a>
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
            <li class="active"><a href="anggota.php"> Anggota </a></li>
            <li><a href="angsuran.php"> Angsuran </a></li>
          </ul>
        </div>
		
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="text-wrapper">
			<h3 id="text-header"> Data Anggota </h3>
		</div>
	<div class="box">
		<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
			<a class="btn btn-primary" data-toggle="modal" href="#add-modal"><i class="fa fa-plus"></i></a>
		<?php } ?>
			<a class="btn btn-default pull pull-right" href="print_anggota.php"><i class="fa fa-print"></i> </a>
	</div>
	
	<div class="alert alert-info">
		<button	type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>&nbsp;Data Anggota</strong>
	</div>

<div class="table-container">
<table class="table table-striped table-bordered table-condensed" id="example">
		<thead>
			<tr>
				<th> ID Anggota </th>
				<th> Username </th>
				<th> Nama </th>
				<th> Alamat </th>
				<th> Tanggal Lahir </th>
				<th> Tempat Lahir </th>
				<th> Gender </th>
				<th> Status </th>
				<th> No Telp </th>
			<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
				<th> Action </th>
			<?php } ?>
			</tr>
		</thead>

	<?php
		$perPage 	= 5;
		$page 		= isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		$start 		= ($page > 1) ? ($page * $perPage) - $perPage : 0;
		$articles 	= "SELECT * from anggota LIMIT $start, $perPage";
		$result 	= mysqli_query($conn, "SELECT * from anggota");
		$result2 	= mysqli_query($conn, $articles);
		$total		= mysqli_num_rows($result);
		$pages 		= ceil($total/$perPage);
			while ($row = mysqli_fetch_array($result2)) {
		$id 	    = $row['id_anggota'];
	?>		

		<tbody>	
			<tr>
				<td> <?php echo $row ['id_anggota']; ?>	</td>
				<td> <?php echo $row ['username']; ?>	</td>
				<td> <?php echo $row ['nama']; ?>		</td>
				<td> <?php echo $row ['alamat']; ?>		</td>
				<td> <?php echo $row ['tgl_lhr']; ?>	</td>
				<td> <?php echo $row ['tmp_lhr']; ?>	</td>
				<td> <?php echo $row ['j_kel']; ?>		</td>
				<td> <?php echo $row ['status']; ?>		</td>
				<td> <?php echo $row ['no_tlp']; ?>		</td>
			<!-- Tombol Action -->
			<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
				<td style="width:125px;">
					<a data-target="#edit-modal<?php echo $id; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-pencil"></i> </a>
					<a data-target="#delete-modal<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash" ></i> </a>
				</td>
			<?php } ?>
			</tr>
		</tbody>
	<?php } ?>
	</table>
</div>

<div class="pagination pull pull-right">
	<?php for($i=1; $i<=$pages; $i++){ ?>
		<a href="?halaman=<?php echo $i ?>"> <?php echo $i ?> </a>
	<?php } ?>
</div>
		</div>
  </div>
  
	<?php
		$result		= mysqli_query($conn, "select * from anggota") or die (mysqli_error($conn));
			while ($row = mysqli_fetch_array($result)) {
		$id			= $row['id_anggota'];
	?>
	<!-- Modal Delete -->
	<div id="delete-modal<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 id="myModalLabel"> Delete Data Anggota </h3>
				</div>
				<div class="modal-body">
					<p class="text-warning"> Apakah anda yakin akan menghapus data ini?</p>
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
					<a href="delete_anggota.php<?php echo '?id_anggota='.$id;?>" class="btn btn-danger">Yes</a>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal Edit -->
	<div id="edit-modal<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 id="myModalLabel"> Edit Data Anggota </h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" action="edit_anggota.php" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label"> ID Anggota </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_anggota" value="<?php echo  $row ['id_anggota'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Username </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="username" value="<?php echo $row ['username'] ;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"> Nama </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama" value="<?php echo $row ['nama'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Alamat </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="alamat" value="<?php echo $row ['alamat'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Tanggal Lahir </label>
						<div class="col-md-9">
							<input type="text"  class="datepicker form-control" name="tgl_lhr" value="<?php echo $row ['tgl_lhr'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Tempat Lahir </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tmp_lhr" value="<?php echo $row ['tmp_lhr'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Jenis Kelamin </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="j_kel" value="<?php echo $row ['j_kel'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Status </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="status" value="<?php echo $row ['status'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> No Telepon </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="no_tlp" value="<?php echo $row ['no_tlp'] ;?>">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<a href="anggota.php" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Tutup </a>
				<button type="submit" name="submit" class="btn btn-primary"> Ubah </button>
			</div>
				</form>
		</div>
	</div>
	</div> <!-- tag modal -->
	
<!-- Tambah Data Menggunakan Modal-->
	<div class="modal fade" tabindex="-1" role="dialog" id="add-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
				<?php
					$query 			= mysqli_query($conn, "SELECT MAX(id_anggota) AS id_anggota FROM anggota");
					$fetch 			= mysqli_fetch_array($query);
					$id_anggota		= $fetch['id_anggota']+1;				
				?>
					<div class="modal-header">
						<h3> Tambah Data Anggota </h3>
					</div>
						<br>
				<form class="form-horizontal" role="form" method="post" action="save_anggota.php" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> ID Anggota </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="id_anggota" value="<?php echo $id_anggota?>"></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Username </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="username" placeholder="username" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Nama </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nama" placeholder="nama" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Alamat </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="alamat" placeholder="alamat" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Tanggal Lahir </label>
						<div class="col-md-9">
							<input type="text" class="datepicker form-control" name="tgl_lhr" placeholder="tgl_lhr" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Tempat Lahir </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tmp_lhr" placeholder="tmp_lhr" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Jenis Kelamin </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="j_kel" placeholder="j_kel" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Status </label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="status" placeholder="status" ></td>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> No Telepon </label>
						<div class="col-md-9">	
							<input type="text" class="form-control" name="no_tlp" placeholder="no_tlp" ></td>
						</div>
					</div>				
				</div>	
		<!-- Modal footer berisi button -->
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Close </button>
					<button type="submit" name="submit" class="btn btn-primary"> Add </button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
</body>
</html>