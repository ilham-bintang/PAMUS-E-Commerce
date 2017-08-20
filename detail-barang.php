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
<h1 align="center">DETAIL BARANG</h1>
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php");
 		if(!isset($_SESSION)) 
   			 { 
     		   session_start(); 
   			 }

 		$id=$_GET['id'];
 		

  		$hasil=mysqli_query($konek,"SELECT * from barang,penjual,toko where barang.id_penjual=penjual.id_penjual and barang.id_toko=toko.id_toko and kd_barang=$id");

  		while ($baris=mysqli_fetch_assoc($hasil)):

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
					<td>Stok</td>
					<td><?php echo $baris['stok']; ?></td>
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
			</table>
		</td>
	</tr>


	<tr>
		<td  align="center">
			<button type="submit" class="w3-btn w3-blue"> 
			<a href='<?php echo "penjual.php?id=$idpenjual"; ?>'> DETAIL PENJUAL</a> </button>
		</td>
	</tr>




<?php endwhile; ?>	
	</table>

	<br>

		<?php

			if (!isset($_SESSION['level'])) {
		
			}
			if (isset($_GET['menu'])) {
 				$menu=$_GET['menu'];
 			}

 			if (isset($_SESSION['level'])) {
 				
			if ($_SESSION['level']=='pembeli') {
			$session=$_SESSION['username'];
 			
 		

		?>


		<table align="center" width="400px" class="w3-tables w3-border">
		
		
		<tr>
		<td align="center">
		<form action="masuk-keranjang.php" method="POST" name="form">
			<input type="text" class="w3-input w3-border" name="jumlah" id="jumlah" placeholder="Masukkan jumlah barang yang ingin anda beli">
			<input type="hidden" name="stok" value="<?php echo $stok ?>">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<button type="submit" class="w3-btn w3-red" onclick="cekstok()" >BELI</button>
		</form>	
		</td>
		</tr>
		</table>


	<?php 


	} 
	}?>
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

<script>
	function cekstok() {
		 	var stok = <?php echo $stok;?>;//work	
		if (document.getElementById('jumlah').value > stok ) {
			window.alert("Stok tidak mencukupi");
			form.jumlah(focus);
			form.jumlah(select);
			
		}
		else {
			window.alert("barang telah dimasukkan kedalam keranjang anda");
		}
	}
	</script>
</body>
</html>