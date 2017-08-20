<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];
	$query=mysqli_query($konek, "DELETE FROM toko where id_toko='$id'");
	$query=mysqli_query($konek, "DELETE FROM barang where id_toko='$id'");
	header ('location:toko.php');
?>