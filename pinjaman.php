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

	
	<!-- Content -->
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
		<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="simpanan.php"> Simpanan <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="pinjaman.php"> Pinjaman </a></li>
            <li><a href="anggota.php"> Anggota </a></li>
            <li><a href="angsuran.php"> Angsuran </a></li>
          </ul>
        </div>
		
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="text-wrapper">
			<h3 id="text-header"> Data Pinjaman </h3>
		</div>
	<div class="box">
		<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
			<a class="btn btn-primary " data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>
		<?php } ?>
			<a class="btn btn-default pull pull-right" href="print_pinjaman.php"><i class="fa fa-print"></i> </a>
	</div>
		
		<div class="alert alert-info">
			<button	type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><i class="icon-user icon-large"></i>&nbsp;Data Pinjaman</strong>
		</div>
			
	<div class="table-container">
		<table class="table table-striped table-bordered table-condensed" id="example">
		<thead>
			<tr>
				<th> ID Pinjaman </th>
				<th> ID Anggota </th>
				<th> ID Petugas </th>
				<th> Besar Pinjaman </th>
				<th> Tanggal Pengajuan </th>
				<th> Tanggal Acc </th>
				<th> Tanggal Pinjaman </th>
				<th> Tanggal Pelunasan </th>
			<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
				<th> Action </th>
			<?php } ?>
			</tr>
		</thead>
		<tbody>
		
		<?php
			$perPage 	= 5;
			$page 		= isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
			$start 		= ($page > 1) ? ($page * $perPage) - $perPage : 0;
			$articles 	= "SELECT * from pinjaman LIMIT $start, $perPage";
			$result 	= mysqli_query($conn, "SELECT * from pinjaman"); //menampilkan data
			$result2 	= mysqli_query($conn, $articles);
			$total		= mysqli_num_rows($result);
			$pages 		= ceil($total/$perPage);
				while ($row = mysqli_fetch_array($result2)) {
			$id=$row['id_pinjaman'];
		?>
	
			<tr>
				<td> <?php echo $row ['id_pinjaman']; ?></td>
				<td> <?php echo $row ['id_anggota']; ?></td>
				<td> <?php echo $row ['id_petugas']; ?></td>
				<td> Rp. <?php echo $row ['besar_pinjaman']; ?></td>
				<td> <?php echo $row ['tgl_pengajuan_pinjaman']; ?></td>
				<td> <?php echo $row ['tgl_acc_pinjaman']; ?></td>
				<td> <?php echo $row ['tgl_pinjaman']; ?></td>
				<td> <?php echo $row ['tgl_pelunasan']; ?></td>
			<!-- Tombol Action -->
			<?php if ($_SESSION['typeuser'] != "admin"){  } else { ?>
				<td style="text-align:center; width:150px;">
					<a data-target="#edit-modal<?php echo $id; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-pencil"></i> </a>
					<a data-target="#delete-modal<?php echo $id; ?>" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" ></i> </a>
				</td>
			<?php } ?>
				<?php } ?>
			</tr>
			</tbody>
		</table>
		</div> <!-- Main -->
	
	<div class="pagination pull pull-right">
		<?php for($i=1; $i<=$pages; $i++){ ?>
			<a href="?halaman=<?php echo $i ?>"> <?php echo $i ?> </a>
		<?php } ?>
	</div>

		</div>
 	 </div>
 
		<?php
			$result = mysqli_query($conn, "select * from pinjaman") or die (mysqli_error($connect));
			while ($row = mysqli_fetch_array($result)) {
			$id     = $row['id_pinjaman'];
		?>
	<!-- Modal Delete -->
	<div id="delete-modal<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 id="myModalLabel"> Delete Data Pinjaman </h3>
				</div>
				<div class="modal-body">
					<p class="text-warning"> Apakah anda yakin akan menghapus data ini?</p>
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
					<a href="delete_pinjaman.php<?php echo '?id_pinjaman='.$id;?>" class="btn btn-danger">Yes</a>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal Edit -->
	<div id="edit-modal<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 id="myModalLabel"> Edit Data Pinjaman </h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" action="edit_pinjaman.php" method="post">
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Pinjaman </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="id_pinjaman" value="<?php echo  $row ['id_pinjaman'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Anggota </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="id_anggota" value="<?php echo $row ['id_anggota'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Petugas </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="id_petugas" value="<?php echo $row ['id_petugas'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Besar_Pinjaman </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="besar_pinjaman" value="<?php echo $row ['besar_pinjaman'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pengajuan Pinjaman </label>
						<div class="col-md-8">
							<input type="text" class="datepicker form-control" name="tgl_pengajuan_pinjaman" value="<?php echo $row ['tgl_pengajuan_pinjaman'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Acc Pinjaman </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_acc_pinjaman" value="<?php echo $row ['tgl_acc_pinjaman'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pinjaman </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_pinjaman" value="<?php echo $row ['tgl_acc_pinjaman'] ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pelunasan </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_pelunasan" value="<?php echo $row ['tgl_pelunasan'] ;?>">
						</div>
					</div>
					
				</div>
			<div class="modal-footer">
				<a href="dashboard.php" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"> Tutup </a>
				<button type="submit" name="submit" class="btn btn-primary"> Ubah </button>
			</div>
				</form>
		</div>
	</div>
	</div> <!-- tag modal -->
	</tr>
	
<!--  Tambah Data Menggunakan Modal-->
	<div class="modal fade" tabindex="-1" role="dialog" id="add-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
				<?php
					$query 			= mysqli_query($conn, "SELECT MAX(id_pinjaman) AS id_pinjaman FROM pinjaman");
					$fetch 			= mysqli_fetch_array($query);
					$id_pinjaman	= $fetch['id_pinjaman']+1;				
				?>
					<div class="modal-header">
						<h3> <i class="fa fa-plus"></i> Tambah Data Pinjaman </h3>
					</div>
				<form class="form-horizontal" role="form" method="post" action="save_pinjaman.php" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Pinjaman </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="id_pinjaman" value="<?php echo $id_pinjaman?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Anggota </label>
						<div class="col-md-8">
							<select class="form-control" name="id_anggota">
							<?php
								$query = mysqli_query($conn, "SELECT * from anggota");
								while($fetch = mysqli_fetch_array($query)){
								echo "<option value='$fetch[id_anggota]'> $fetch[id_anggota] </option>";
								}
							?>							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> ID Petugas </label>
						<div class="col-md-8">
							<select class="form-control" name="id_petugas">
							<?php
								$query = mysqli_query($conn, "SELECT * from petugas");
								while($fetch = mysqli_fetch_array($query)){
								echo "<option value='$fetch[id_petugas]'> $fetch[id_petugas] </option>";
								}
							?>							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Besar Pinjaman </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="besar_pinjaman" placeholder="besar_pinjaman" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pengajuan Pinjaman </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_pengajuan_pinjaman" placeholder="tgl_pengajuan_pinjaman" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Acc Pinjaman </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_acc_pinjaman" placeholder="tgl_acc_pinjaman">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pinjaman </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_pinjaman" placeholder="tgl_pinjaman">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"> Tanggal Pelunasan </label>
						<div class="col-md-8">
							<input type="text"  class="datepicker form-control" name="tgl_pelunasan" placeholder="tgl_pelunasan">
						</div>
					</div>
					
				</table>
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
</div>
	<?php } ?>
        </div>
      </div>
</body>
</html>