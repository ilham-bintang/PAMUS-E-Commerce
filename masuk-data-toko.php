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
	$idpen=$_SESSION['username'];
	$alamat=$_POST['alamat'];
	

	$folder="./foto/toko/";
	$nama_file=$_FILES['foto']['name'];
	$ukuran_file=$_FILES['foto']['size'];
	$tmp_file=$_FILES['foto']['tmp_name'];

	move_uploaded_file($tmp_file, $folder.$nama_file);


			$simpan=mysqli_query($konek, "INSERT INTO toko (id_toko, nama_toko, alamat_toko, id_penjual,gambar_toko) VALUES (null,'$nama','$alamat','$idpen','$nama_file')");
			if($simpan){
			header ('location:index.php');
			}
			else{
			?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">PENYIMPANAN GAGAL</h2><br>
		</table>
		<h3 align="center"><a href="registerasi-toko.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php
			}
		
?>
</body>
</html>


