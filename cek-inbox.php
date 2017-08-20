<?php
	require_once ("konek.php");
/*
	$id=$_GET['id'];*/
	$nama=$_GET['nama'];//nama pengirim
	$penerima=$_GET['penerima'];
	$query=mysqli_query($konek, "UPDATE pesan set status='read' where pengirim='$nama' and penerima='$penerima'");
	header ("location:kirim_pesan.php?nama=$nama");
	
?>