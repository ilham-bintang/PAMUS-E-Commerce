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
include 'partial/header.php';
include 'partial/title.php';
	include 'konek.php';
	if(isset($_POST['submit'])) {
	$nama=$_POST['nama'];
	$jenis=$_POST['jenis'];
	$deskripsi=$_POST['desk'];
	$harga=$_POST['harga'];
	$stok=$_POST['stok'];
	$id_penjual=$_SESSION['username'];
	$idtoko=$_POST['toko'];
	

	$folder="./foto/";
	$nama_file=$_FILES['foto']['name'];
	$ukuran_file=$_FILES['foto']['size'];
	$tmp_file=$_FILES['foto']['tmp_name'];

	move_uploaded_file($tmp_file, $folder.$nama_file);

	$simpan= mysqli_query ($konek, "INSERT INTO barang (nama_brg,jenis,desk,harga,kd_barang,id_penjual,gambar_barang,stok,id_toko) VALUES ('$nama','$jenis','$deskripsi','$harga',null,'$id_penjual','$nama_file','$stok','$idtoko')");
		if($simpan){
		//header ('location:upload.php');
		?>
		<h2 align="center" style="color: blue;"> BARANG ANDA SUDAH TERSIMPAN </h2>
		<br>
		<h2 align="center"> <a href="index.php">KEMBALI</a> </h2>
		<?php
		}
		else{
			?>
		<h2 align="center" style="color: red;"> PENYIMPANAN GAGAL </h2>
		<?php
		}
	}
?>

</body>
</html>

