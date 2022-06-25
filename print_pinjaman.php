<?php
	session_start();
	include "connect.php";
	$data	= mysqli_query($conn, "SELECT * from pinjaman");
?>
<html>
	<head>
		<title> Print Document </title>
	</head>
	
	<body>
	  <h3 align="center"> Data Pinjaman Koperasi Simpan Pinjam </h3>

		<p style="text-align: right;"> Dicetak oleh <?= $_SESSION['username']; ?></p>

		<table border="1" width="90%" style="border-collapse: collapse;" align="center">
		  <tr class="tableheader">
		    <th rowspan="1" style="text-align:center;"> ID Pinjaman </th>
			<th style="text-align:center;"> ID Anggota </th>
			<th style="text-align:center;"> ID Petugas </th>
			<th style="text-align:center;"> Besar Pinjaman </th>
			<th style="text-align:center;"> Tanggal Pengajuan </th>
			<th style="text-align:center;"> Tanggal Acc </th>
			<th style="text-align:center;"> Tanggal Pinjaman </th>
			<th style="text-align:center;"> Tanggal Pelunasan </th>
		  </tr>
		  
		  <?php while ($hasil = mysqli_fetch_array($data)){ ?>
		  
		   <tr id="rowHeader">
		    <td align="center" width="auto" align="center"> <?php echo $hasil['id_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_anggota']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_petugas']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['besar_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_pengajuan_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_acc_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_pelunasan']; ?> </td>
		  </tr>
		  
		  <?php } ?>
		  
		</table>
		
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
	</body>
</html>