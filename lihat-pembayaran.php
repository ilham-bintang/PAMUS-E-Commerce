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
 include 'partial/title.php';
 ?>



<br>
<h1 align="center">DETAIL PEMBAYARAN</h1>
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php") ;

 		$pen=$_GET['id']; //kd-barang
  		$hasil=mysqli_query($konek, "SELECT * from pembeli,transaksi,barang where barang.kd_barang = transaksi.id_barang and pembeli.id_pembeli=transaksi.id_pembeli and barang.kd_barang='$pen'");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_pembeli'];
  		$nama=$baris['nama_pembeli'];
  		$alamat=$baris['alamat'];
  		$username=$baris['username'];
  		$no_hp=$baris['no_hp'];
		$jenis=$baris['jenis'];
		$harga=$baris['harga'];
		$stok=$baris['stok'];
		$jumlah=$baris['jumlah_barang'];
		$gambar=$baris['gambar_barang'];
		$id_barang=$baris['kd_barang'];
		$status=$baris['status'];
?>

	


	<tr>
		<td width="200px">
			<img src="foto/transfer/<?php echo $baris['gambar_konfirmasi']; ?>" style="width:200px;cursor:zoom-in" onclick="document.getElementById('modal01').style.display='block'">

			<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  				<span class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
  				<img class="w3-modal-content w3-animate-zoom" src="foto/transfer/<?php echo $baris['gambar_konfirmasi']; ?>" style="width:100%">
			</div>
		</td>		
		<td width="800px">
			<table align="center" class="w3-tables" width="100%">
				<tr>
					<td width="200px">id barang</td>
					<td><?php echo $id_barang; ?></td>
				</tr>
				<tr>
					<td>Nama Barang</td>
					<td><?php echo $baris['nama_brg']; ?></td>
				</tr>
				<tr>
					<td>Jenis Barang</td>
					<td><?php echo $jenis; ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><?php echo $harga; ?></td>
				</tr>
				<tr>
					<td>Stok</td>
					<td><?php echo $stok; ?></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td><?php echo $jumlah; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $status; ?></td>
				</tr>
			</table>
		</td>
	</tr>
<?php endwhile; ?>
</table>

<?php 
if ($_SESSION['level']=='penjual'&& $status=='menunggu konfirmasi') {
	?>
<div align="center">
	<button type="submit" class="w3-btn w3-blue"> 
			<a href='<?php echo "konfirmasi-pembayaran.php?id=$id_barang&stok=$stok&jumlah=$jumlah"; ?>'> KONFIRMASI</a> </button>
</div>
<?php
}
?>
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