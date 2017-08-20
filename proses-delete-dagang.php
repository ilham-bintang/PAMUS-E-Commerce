<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];
	$query=mysqli_query($konek, "DELETE FROM penjual where id_penjual='$id'");

	header ('location:dagang.php');
?>