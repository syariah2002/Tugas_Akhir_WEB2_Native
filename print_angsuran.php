<?php
	session_start();
	include "connect.php";
	$data	= mysqli_query($conn, "SELECT * from angsuran");
?>
<html>
	<head>
		<title> Print Document </title>
	</head>
	
	<body>
	  <h3 align="center"> Data Angsuran Koperasi Simpan Pinjam </h3>
		
		<p style="text-align: right;"> Dicetak oleh <?= $_SESSION['username']; ?></p>

		<table border="1" width="90%" style="border-collapse: collapse;" align="center">
		  <tr class="tableheader">
		    <th align="center" style="text-align:center;"> ID Angsuran </th>
			<th align="center" style="text-align:center;"> ID Petugas </th>
			<th align="center" style="text-align:center;"> ID Anggota </th>
			<th align="center" style="text-align:center;"> ID Pinjaman </th>
			<th align="center" style="text-align:center;"> Tanggal Pembayaran </th>
			<th align="center" style="text-align:center;"> Angsuran Ke- </th>
			<th align="center" style="text-align:center;"> Keterangan </th>
		  </tr>
		  
		  <?php while ($hasil = mysqli_fetch_array($data)){ ?>
		  
		   <tr id="rowHeader">
		    <td align="center" width="auto" align="center"> <?php echo $hasil['id_angsuran']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_petugas']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_anggota']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['id_pinjaman']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_pembayaran']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['angsuran_ke']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['ket']; ?> </td>
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