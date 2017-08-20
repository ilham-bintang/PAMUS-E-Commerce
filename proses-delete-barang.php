<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];
	$query=mysqli_query($konek, "DELETE FROM barang where kd_barang='$id'");


	header ('location:barang.php');
?>