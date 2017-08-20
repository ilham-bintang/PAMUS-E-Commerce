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
	include('partial/kolom-cari.php');

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>	


<br>

<h1 align="center">KATEGORI: LAINNYA</h1>
<br>
<table class="w3-table w3-striped w3-border" align="center">
	<tr>
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Harga</td>
		<td>Deskripsi Barang</td>
		
		<td>Tools</td>
	</tr>

	<?php
 		include 'konek.php';
 		if(!isset($_SESSION)) 
    	{ 
        session_start(); 
    	}
  		$hasil=mysqli_query($konek, "SELECT substring(desk,1, 20) as deskripsi , kd_barang,nama_brg,harga, gambar_barang from barang where jenis='lainnya' order by kd_barang desc");
  		
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$harga=$baris['harga'];
  		$deskripsi=$baris['deskripsi'];
  		$gambar=$baris['gambar_barang'];
		?> 	 	
	<tr>
		<td> <?php echo $baris['kd_barang']; ?> </td>
		<td> <?php echo $baris['nama_brg']; ?> </td>
		<td> <?php echo $baris['harga']; ?> </td>
		<td> <?php echo $baris['deskripsi']; ?> </td>
		<td> <img src="foto/<?php echo $baris['gambar_barang']; ?>" width='100px'> </td>
		<td>
		
		<a href="<?php echo "detail-barang.php?id=$id";?>">
			<button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
		</a>
		<?php
			if(!isset($_SESSION)) 
   			 { 
     		   session_start(); 
   			 } 

   			else if (!isset($_SESSION['level']) ) {
				break;
			}
			else if ($_SESSION['level']=='admin') {
		?>

		<a href="penjual.php">
			<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "edit-pembeli.php?id=$id"; ?>'>UPDATE </a></button>
		</a>
		<a href="beli.php">
			<button type="submit" class="w3-btn w3-red"> 
				<a href='<?php echo "proses-delete-barang.php?id=$id"; ?>'> DELETE</a> </button>
		</a>
		<?php		
			}
		?>

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