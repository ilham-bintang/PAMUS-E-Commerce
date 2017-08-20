<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style">
	<style type="text/css">
		h2{
			align:center;
		}
	</style>
</head>
<body>
<?php

	require_once("konek.php");
	include 'partial/header.php';
	include 'partial/title.php';

	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$repassword=$_POST['password2'];
	$email=$_POST['email'];
	$rekening=$_POST['rekening'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['hp'];
	$jenis=$_POST['jenis'];

	$folder="./foto/penjual/";
	$nama_file=$_FILES['foto']['name'];
	$ukuran_file=$_FILES['foto']['size'];
	$tmp_file=$_FILES['foto']['tmp_name'];

	move_uploaded_file($tmp_file, $folder.$nama_file);

	$cekuser=mysqli_query($konek, "SELECT * from penjual where username='$username'");
	
	if(mysqli_num_rows($cekuser) <> 0){
 		?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">USERNAME TERSEBUT SUDAH TERDAFTAR SEBAGAI PENJUAL</h2><br>
		<h3 align="center"><a href="registerasi-penjual.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php
	}

	else{
		if($password!=$repassword){
			?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">MOHON MASUKKAN PASSWORD YANG SESUAI</h2><br>
		
		<h3 align="center"><a href="registerasi-penjual.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php
		}
		else if(!$username || !$password){
			?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">SILAHKAN LENGKAPI DATA ANDA</h2><br>
		
		<h3 align="center"><a href="registerasi-penjual.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php
		}

		else{
			$simpan=mysqli_query($konek, "INSERT INTO penjual (id_penjual,nama_penjual, username,password,email,alamat,no_hp,gambar_penjual,jk,rekening) VALUES (NULL,'$nama','$username','$password','$email','$alamat','$no_hp','$nama_file','$jenis','$rekening')");
			if($simpan){
				?>

				<script type="text/javascript">
					window.alert("Sukses Registrasi Penjual. Silahkan Login dengan username dan password yang telah anda buat");
				</script>
				<?php
			header ('location:index.php');
			}
			else{
			?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">PENYIMPANAN GAGAL</h2><br>
		</table>
		<h3 align="center"><a href="registerasi-penjual.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php
			}
		}
	}
?>
</body>
</html>


