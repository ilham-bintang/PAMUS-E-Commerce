<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<script type="text/javascript" src="js/javascript.js">

	</script>


	<?php
	include('partial/header.php');
	include('partial/title.php');

	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
	?>	


	<br>

	<h1 align="center">BARANG SAYA</h1>
	<br>
	<table class="w3-table w3-striped w3-border" align="center">
		<tr>
			<td width="150px">Nama Barang</td>
			<td width="300px">Harga</td>
			<td width="300px">Deskripsi Barang</td>
			<td width="300px">Gambar</td>
			<td width="300px">Tools</td>
		</tr>

		<?php
		include 'konek.php';
		
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
		$id=$_GET['id'];
		$hasil=mysqli_query($konek, "SELECT * from barang,penjual where barang.id_penjual=penjual.id_penjual and barang.id_penjual='$id' order by kd_barang desc");

		while ($baris=mysqli_fetch_assoc($hasil)):
			$kd=$baris['kd_barang'];
		$nama=$baris['nama_brg'];
		$harga=$baris['harga'];
		$deskripsi=$baris['desk'];

		?>
		<tr>
			<td> <?php echo $baris['nama_brg']; ?> </td>
			<td> <?php echo $baris['harga']; ?> </td>
			<td> <?php echo $baris['desk']; ?> </td>
			<td> <img src="foto/<?php echo $baris['gambar_barang']; ?>" width="100px">
			</td>
			<td>

				<a href="<?php echo "detail-barang.php?id=$kd";?>">
					<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
				</a>

				<a href="penjual.php">
					<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "update-barang.php?id=$kd"; ?>'>UPDATE </a></button>
				</a>
				<a href="beli.php">
					<button type="submit" class="w3-btn w3-red"> 
						<a href='<?php echo "proses-delete-barang.php?id=$kd"; ?>'> DELETE</a> </button>
					</a>


				</td>
			</tr>
		<?php endwhile; ?>
	</table>
	
	<br><br>
	<br><br>
	<br><br>
	<br>

	<br>
	<br>


	<?php
	include 'partial/footer.php';
	?>

</body>
</html>