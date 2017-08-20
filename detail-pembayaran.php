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
<h1 align="center">DETAIL PEMBAYARAN</h1>
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php");
 		if(!isset($_SESSION)) 
   			 { 
     		   session_start(); 
   			 }

 		$id=$_GET['id'];
 		
  		$hasil=mysqli_query($konek,"SELECT * from barang, penjual, toko, transaksi where barang.id_penjual=penjual.id_penjual and toko.id_penjual=penjual.id_penjual and transaksi.id_barang=barang.kd_barang and transaksi.id_transaksi=$id");

  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$idtransaksi=$baris['id_transaksi'];
  		$id=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$jenis=$baris['jenis'];
  		$deskripsi=$baris['desk'];
  		$harga=$baris['harga'];
  		$gambar=$baris['gambar_barang'];
  		$idpenjual=$baris['id_penjual'];
  		$namapenjual=$baris['nama_penjual'];
  		$hppenjual=$baris['no_hp'];
  		$gambarpen=$baris['gambar_penjual'];
  		$idtoko=$baris['id_toko'];
  		$namatoko=$baris['nama_toko'];
  		$stok=$baris['stok'];

		

?>
	<tr>
		<td width="200px">
			<img src="foto/<?php echo $baris['gambar_barang']; ?>" width='200px'>
		</td>
		
		<td width="800px">
			<table align="center" class="w3-tables w3-striped w3-border" width="100%">
				<tr>
					<td width="200px">id barang</td>
					<td><?php echo $baris['kd_barang']; ?></td>
				</tr>
				<tr>
					<td>Nama Barang</td>
					<td><?php echo $baris['nama_brg']; ?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td><?php echo $baris['jenis']; ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td><?php echo $baris['desk']; ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><?php echo $baris['harga']; ?></td>
				</tr>
				<tr>
					<td>Id Penjual</td>
					<td><?php echo $baris['id_penjual']; ?></td>
				</tr>
				<tr>
					<td>Nama Penjual</td>
					<td><?php echo $baris['nama_penjual']; ?></td>
				</tr>				
				<tr>
					<td>Alamat Penjual</td>
					<td><?php echo $baris['alamat']; ?></td>
				</tr>
				<tr>
					<td>ID Toko</td>
					<td><?php echo $baris['id_toko']; ?></td>
				</tr>
				<tr>
					<td>Nama Toko</td>
					<td><?php echo $baris['nama_toko']; ?></td>
				</tr>
				<tr>
					<td>Alamat Toko</td>
					<td><?php echo $baris['alamat_toko']; ?></td>
				</tr>
				<tr>
					<td>Rekening</td>
					<td><?php echo $baris['rekening']; ?></td>
				</tr>
			</table>
		</td>
	</tr>


	</table>
	<div class="w3-panel w3-green w3-center">
		<h2>SILAHKAN TRANSFER KE REKENING PENJUAL :</h2><br>
		<h2><?php echo $baris['rekening'];?></h2>
		<h2>ATAS NAMA</h2>
		<h2><?php echo $baris['nama_penjual'];?></h2>
	</div>
</table>
<?php endwhile; ?>	

	<br>
		

<div class="w3-center">
<a href="<?php echo "checkout.php?idtransaksi=$idtransaksi";?>">
          <button type="submit" name="submit" class="w3-btn w3-blue">LANJUT KE PEMBAYARAN</button>
        </a>
</div>
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