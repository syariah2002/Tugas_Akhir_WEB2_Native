<?php
	session_start();
		include "connect.php";
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$typeuser   = $_POST['typeuser'];
	$query		= mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
		
		if ($cek = mysqli_num_rows($query) == 1){
			$query1 = mysqli_query($conn, "SELECT typeuser FROM login WHERE username = '$username'"); 
			$fetch	= mysqli_fetch_array($query1);
			$typeuser1 = $fetch['typeuser'];

			if ( $typeuser == $typeuser1 ){
				$_SESSION['username'] = $username;
				$_SESSION['typeuser'] = $typeuser1;	
					
					if($typeuser == "admin" || "member"){
						header('Location: dashboard.php');
					} else {
						"Gagal mengalihkan anda ke halaman dashboard".mysqli_error($conn);
					}
			
			} else {
				echo "Typeuser yang anda pilih tidak sesuai dengan akun anda..";
			}		
			
		} else {
			echo 'Username atau password yang anda masukan salah!'.mysqli_error($conn);
		}
?>