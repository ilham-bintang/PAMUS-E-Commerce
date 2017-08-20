<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];//idbarang
	$stok=$_GET['stok'];
		$query=mysqli_query($konek, "UPDATE transaksi set status='Tahap Pengiriman' where id_barang='$id'");
		$query2=mysqli_query($konek,"UPDATE barang set stok='$stok' where kd_barang='$id'");

	header ('location:daftar-tunggu.php');
?>