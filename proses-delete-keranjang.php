<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];
	$idtrans=$_GET['idtransaksi'];
	$stok=$_GET['stok'];
	$jumlah=$_GET['jumlah'];
	echo $id;
	echo $stok;
	echo $jumlah;
		$query=mysqli_query($konek, "DELETE FROM transaksi where id_transaksi='$idtrans'");
		$query2=mysqli_query($konek, "UPDATE barang set stok=$stok+$jumlah where kd_barang='$id'");
		
	
	header ('location:belanjaan-saya.php');
?>