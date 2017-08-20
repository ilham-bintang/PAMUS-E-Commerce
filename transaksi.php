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
<h1 align="center">DAFTAR TRANSAKSI</h1>
<table class="w3-table w3-striped w3-border" align="center" border="1">
	<tr>
		<td >Kode Barang</td>
		<td >Nama Barang</td>
		<td >Jenis</td>
		<td >Status</td>
		<td >Nama Pembeli</td>
		<td >Harga</td>
		<td >Jumlah</td>
		<td >Tools</td>
	</tr>
	<?php
 		require_once("konek.php") ;
  		
  		$hasil=mysqli_query($konek, "SELECT * from pembeli,barang,transaksi where barang.kd_barang=transaksi.id_barang and pembeli.id_pembeli=transaksi.id_pembeli");
  		
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		
  		$id=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$username=$baris['jenis'];
  		$alamat=$baris['desk'];
  		$no_hp=$baris['harga'];
		?>

	<tr>
		<td> <?php echo $baris['kd_barang']; ?> </td>
		<td> <?php echo $baris['nama_brg']; ?> </td>
		<td> <?php echo $baris['jenis']; ?> </td>
		<td> <?php echo $baris['status']; ?> </td>
		<td> <?php echo $baris['nama_pembeli']; ?> </td>
		<td> <?php echo $baris['harga']; ?> </td>
		<td> <?php echo $baris['jumlah_barang']; ?> </td>
		
		<td  align="center">
      <button type="submit" class="w3-btn w3-blue"> 
      <a href='<?php echo "lihat-pembayaran.php?id=$id"; ?>'> DETAIL TRANSAKSI</a> </button>
    </td>
	</tr>
<?php endwhile; ?>	


</table>
<br><br>
<br><br>
<br><br>
<br>

<?php
include 'partial/footer.php';
?>

</body>
</html>
