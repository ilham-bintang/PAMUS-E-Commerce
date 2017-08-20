

<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

		
	
<?php
	if(!isset($_SESSION)) 
    { 
        session_start();
    }
    include 'partial/header.php';
	include('partial/title.php');
?>



<br>
<h1 align="center">DAFTAR PEMBELI</h1>
<table class="w3-table w3-striped w3-border" align="center" border="1">
	<tr>
		<td>ID</td>
		<td width="150px">Nama</td>
		<td width="150px">Username</td>
		<td width="300px">Alamat</td>
		<td width="300px">No HP</td>
		<td width="300px">TOOLS</td>
	</tr>
	<?php
 		require_once("konek.php") ;
  		
  		$hasil=mysqli_query($konek, "SELECT * from pembeli order by id_pembeli desc");
  		
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		
  		$id=$baris['id_pembeli'];
  		$nama=$baris['nama_pembeli'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$no_hp=$baris['no_hp'];
		?>

	<tr>
		<td> <?php echo $baris['id_pembeli']; ?> </td>
		<td> <?php echo $baris['nama_pembeli']; ?> </td>
		<td> <?php echo $baris['username']; ?> </td>
		<td> <?php echo $baris['alamat']; ?> </td>
		<td> <?php echo $baris['no_hp']; ?> </td>
		<td>
		
		<a href="pembeli.php">
			<button type="submit" class="w3-btn w3-blue"><a href='<?php echo "pembeli.php?id=$id"; ?>'>LIHAT </a></button>
		</a>
		<?php 
			if ($_SESSION['level']=='admin') {
				
		?>
		<a href="update-barang.php">
			<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "update-data-pembeli.php?id=$id"; ?>'>UPDATE </a></button>
		</a>
		<a href="proses-delete-pembeli.php">
			<button type="submit" class="w3-btn w3-red" > 
				<a href='<?php echo "proses-delete-pembeli.php?id=$id"; ?>'> DELETE</a> </button>
		</a>

		</td>
	</tr>
<?php } endwhile; ?> 	


</table>
<br><br>
<br><br>
<br><br>
<br>

<script type="text/javascript">
	function konfir() {
	   confirm("Yakin ingin menghapus data ini?");
	   	if (confirm==false) {
	   		return true;
	   	}
	}
</script>


<?php
include 'partial/footer.php';
?>

</body>
</html>
