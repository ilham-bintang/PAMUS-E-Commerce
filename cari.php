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
	include('partial/kolom-cari.php');
	?>

<?php
 		include 'konek.php';
 		if(!isset($_SESSION)) 
    	{ 
        	session_start(); 
    	}

    	$jenis=$_POST['jenis'];
    	
    	if($jenis=='barang') {
?>
		<br>
			<h1 align="center">HASIL PENCARIAN</h1>
			<table class="w3-table w3-striped w3-border" align="center">
				<tr>
					<td width="150px"><b>Nama Barang</b></td>
					<td width="300px"><b>Harga</b></td>
					<td width="300px"><b>Deskripsi Barang</b></td>
					<td width="300px"><b>Gambar</b></td>
					<td width="300px"><b>Tools</b></td>
				</tr>
<?php
    			$cari=$_POST['cari'];
  				$hasil=mysqli_query($konek, "SELECT substring(desk,1, 20) as deskripsi , kd_barang,nama_brg,harga, gambar_barang from barang where nama_brg like '%$cari%' or nama_brg like '$cari%' or nama_brg like '%$cari'");
  		
  				if(!$hasil) {
  					echo "HASIL PENCARIAN KOSONG";
  				}
  				else {

		  			while ($baris=mysqli_fetch_assoc($hasil)):
  					$id=$baris['kd_barang'];
  					$nama=$baris['nama_brg'];
	  				$harga=$baris['harga'];
  					$deskripsi=$baris['deskripsi'];
	  				$gambar=$baris['gambar_barang'];
 
 ?>
				<tr>
					<td> <?php echo $baris['nama_brg']; ?> </td>
					<td> <?php echo $baris['harga']; ?> </td>
					<td> <?php echo $baris['deskripsi']; ?> </td>
					<td> <img src="foto/<?php echo $baris['gambar_barang']; ?>" width='100px'>
					 </td>
					<td>
						<a href="<?php echo "detail-barang.php?id=$id";?>">
							<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
						</a>
					</td>
				</tr>
<?php 
		endwhile ; } 
?>	
</table>

<?php		
		}
?>


<br>
	
		
<?php
  		 if ($jenis=='penjual') {
?>  		
			<table class="w3-table w3-striped w3-border" align="center">
				<tr>
					<td width="150px"><b>ID Penjual</b></td>
					<td width="300px"><b>Nama Penjual</b></td>
					<td width="300px"><b>Alamat Penjual</b></td>
					<td width="300px"><b>Username</b></td>
					<td width="300px"><b>Gambar</b></td>					
					<td width="300px"><b>Tools</b></td>
				</tr>		
<?php
			$cari=$_POST['cari'];
  			$hasil=mysqli_query($konek, "SELECT * from penjual where nama_penjual like '%$cari%' or nama_penjual like '$cari%' or nama_penjual like '%$cari'");
  		
  			if(!$hasil) {
  				echo "HASIL PENCARIAN KOSONG";
  			}
  			else {

		  		while ($baris=mysqli_fetch_assoc($hasil)):
  				$idpen=$baris['id_penjual'];
  				$nama=$baris['nama_penjual'];
	  			$username=$baris['username'];
  				$password=$baris['password'];
  				$email=$baris['email'];
	  			$alamat=$baris['alamat'];
	  			$hp=$baris['no_hp'];
  				$gambar=$baris['gambar_penjual'];
  				$jk=$baris['jk'];
  			
?>
				<tr>
					<td> <?php echo $baris['id_penjual']; ?> </td>
					<td> <?php echo $baris['nama_penjual']; ?> </td>
					<td> <?php echo $baris['alamat']; ?> </td>
					<td> <?php echo $baris['username']; ?> </td>
					<td> <img src="foto/penjual/<?php echo $baris['gambar_penjual']; ?>" width='100px'>
					 </td>
					<td>
						<a href="<?php echo "penjual.php?id=$idpen";?>">
						<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
						</a>
		</td>
	</tr>
<?php  endwhile;} ?>
</table>

<?php		
			}
?>
	<br>
		
<?php
  		 if ($jenis=='toko') {
?>
			<table class="w3-table w3-striped w3-border" align="center">
			<tr>
				<td width="150px"><b>ID Toko</b></td>
				<td width="300px"><b>Nama Toko</b></td>
				<td width="300px"><b>Alamat Toko</b></td>
				<td width="300px"><b>Gambar</b></td>
				<td width="300px"><b>Tools</b></td>
			</tr>		
<?php
				$cari=$_POST['cari'];
  				$hasil=mysqli_query($konek, "SELECT * from toko where nama_toko like '%$cari%' or nama_toko like '$cari%' or nama_toko like '%$cari'");
  		
  			if(!$hasil) {
  				echo "HASIL PENCARIAN KOSONG";
  			}
  			else {

	  		while ($baris=mysqli_fetch_assoc($hasil)):
  			$id=$baris['id_toko'];
  			$idpen=$baris['id_penjual'];
  			$nama=$baris['nama_toko'];
	  		$alamat=$baris['alamat_toko'];
  			$gambar=$baris['gambar_toko'];
  			
		?>
		<tr>
		<td> <?php echo $baris['id_toko']; ?> </td>
		<td> <?php echo $baris['nama_toko']; ?> </td>
		<td> <?php echo $baris['alamat_toko']; ?> </td>
		<td> <img src="foto/toko/<?php echo $baris['gambar_toko']; ?>" width='100px'>
					 </td>
		<td>
			<a href="<?php echo "detail-toko.php?id=$idpen&toko=$id";?>">
			<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
		</a>
		</td>
	</tr>
<?php  endwhile; } ?>
</table>
<?php		
		}
?>

<br><br>
<br><br>


<?php
include 'partial/footer.php';
?>

</body>
</html>