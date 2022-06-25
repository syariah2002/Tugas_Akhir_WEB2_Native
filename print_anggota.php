<?php
	session_start();
	include "connect.php";
	$data	= mysqli_query($conn, "SELECT * from anggota");
?>
<html>
	<head>
		<title> Print Document </title>
	</head>
	
	<body>
	  <h3 align="center"> Data Anggota Koperasi Simpan Pinjam </h3>

		<p style="text-align: right;"> Dicetak oleh <?= $_SESSION['username']; ?></p>

		<table border="1" width="90%" style="border-collapse: collapse;" align="center">
		  <tr class="tableheader">
		  <th align="center" style="text-align:center;"> ID Anggota </th>
			<th align="center" style="text-align:center;"> Username </th>
			<th align="center" style="text-align:center;"> Nama </th>
			<th align="center" style="text-align:center;"> Alamat </th>
			<th align="center" style="text-align:center;"> Tanggal Lahir </th>
			<th align="center" style="text-align:center;"> Tempat Lahir </th>
			<th align="center" style="text-align:center;"> Jenis Kelamin </th>
			<th align="center" style="text-align:center;"> Status </th>
			<th align="center" style="text-align:center;"> No Telepon </th>
		
		  </tr>
		  
		  <?php while ($hasil = mysqli_fetch_array($data)){ ?>
		  
		   <tr id="rowHeader">
		    <td align="center" width="auto" align="center"> <?php echo $hasil['id_anggota']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['username']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['nama']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['alamat']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tgl_lhr']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['tmp_lhr']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['j_kel']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['status']; ?> </td>
			<td align="center" width="auto" id="column-padding"> <?php echo $hasil['no_tlp']; ?> </td>
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