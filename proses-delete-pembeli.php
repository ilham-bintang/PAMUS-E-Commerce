<?php
	require_once ("konek.php");
	//$user = $_SESSION ['id'];
	$id=$_GET['id'];
	$query=mysqli_query($konek, "DELETE FROM pembeli where id_pembeli='$id'");

	header ('location:beli.php');
?>