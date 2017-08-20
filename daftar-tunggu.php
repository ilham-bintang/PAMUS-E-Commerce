<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

 <?php
 include 'konek.php';
	include('partial/header.php');
	include('partial/title.php');
	
	?>

<br>
<h1 align="center">DAFTAR TUNGGU</h1>
<table class="w3-table w3-striped w3-border" align="center">
	<tr>
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Harga</td>
		<td>Jumlah</td>
		<td>ID Pembeli</td>
		
		<td>Status</td>
		<td>Tools</td>
		<td>Jumlah</td>
	</tr>
	<?php
 		include 'konek.php';
 		if(!isset($_SESSION)) 
    	{ 
        session_start(); 
    	}

    	$beli=$_SESSION['username'];
  		$hasil=mysqli_query($konek, "SELECT * from transaksi,barang,pembeli where transaksi.id_barang=barang.kd_barang and transaksi.id_pembeli=pembeli.id_pembeli and barang.id_penjual='$beli'");
  		$total=0;
  		
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_barang'];
  		$nama=$baris['nama_brg'];
  		$harga=$baris['harga'];
  		$deskripsi=$baris['desk'];
  		$gambar=$baris['gambar_barang'];
  		$penjual=$baris['id_penjual'];
  		$jumlah=$baris['jumlah_barang'];
  		$status=$baris['status'];

  		$subtotal=$jumlah*$harga;
		$total=$total+$subtotal;
		?>
	<tr>
		<td> <?php echo $baris['kd_barang']; ?> </td>
		<td> <?php echo $baris['nama_brg']; ?> </td>
		<td> <?php echo $baris['harga']; ?> </td>
		<td> <?php echo $baris['jumlah_barang']; ?></td>
		<td> <?php echo $baris['id_pembeli']; ?> </td>
		<td> <?php echo $baris['status']; ?> </td>
		<td>
			<a href="<?php echo "lihat-pembayaran.php?id=$id";?>">
			<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT DETAIL</button>
		</a>
			
		<td>
			<?php echo $subtotal; ?>
		</td>
		
		</td>

	</tr>
<?php endwhile; 	
?>
	<tr>
		<td align="right" colspan="7">Total Barang
		</td>
		<td>
		<?php
		echo $total;
		?>
			
		</td>
	</tr>
</table>

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