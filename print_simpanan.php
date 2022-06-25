<?php
	session_start();
	include "connect.php";
	$data	= mysqli_query($conn, "SELECT * from simpanan");
?>
<html>
	<head>
		<title> Print Document </title>
	</head>
	
	<body>
	  <h3 align="center"> Data Simpanan Koperasi Simpan Pinjam </h3>
		
		<p style="text-align: right;"> Dicetak oleh <?= $_SESSION['username']; ?></p>
		
		<table border="1" width="90%" style="border-collapse: collapse;" align="center">
		  <tr class="tableheader">
		    <th rowspan="1"> ID Simpanan </th>
			<th align="center"> ID Petugas </th>
			<th align="center"> ID Anggota </th>
			<th align="center"> Nama Simpanan </th>
			<th align="center"> Tanggal Simpanan </th>
			<th align="center"> Besar Simpanan </th>
			</tr>
		  
		  <?php while ($hasil = mysqli_fetch_array($data)){ ?>
		  
		   <tr id="rowHeader">
		    <td align="center" width="auto"> <?php echo $hasil['id_simpanan']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_petugas']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_anggota']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['nm_simpanan']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_simpanan']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['besar_simpanan']; ?> </td>
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