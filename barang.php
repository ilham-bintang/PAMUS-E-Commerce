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
<h1 align="center">DAFTAR BARANG</h1>
<table class="w3-table w3-striped w3-border" align="center" border="1">
	<tr>
		<td >Kode Barang</td>
		<td >Nama Barang</td>
		<td >Jenis</td>
		<td width="350px">Deskripsi</td>
		<td >Harga</td>
		<td >Nama_penjual</td>
		<td >Tools</td>
	</tr>
	<?php
 		require_once("konek.php") ;
  		
  		$hasil=mysqli_query($konek, "SELECT * from barang,penjual where barang.id_penjual=penjual.id_penjual order by kd_barang desc");
  		
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		
  		$id=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$username=$baris['jenis'];
  		$alamat=$baris['desk'];
  		$no_hp=$baris['harga'];
  		$penjual=$baris['nama_penjual']
		?>

	<tr>
		<td> <?php echo $baris['kd_barang']; ?> </td>
		<td> <?php echo $baris['nama_brg']; ?> </td>
		<td> <?php echo $baris['jenis']; ?> </td>
		<td> <?php echo $baris['desk']; ?> </td>
		<td> <?php echo $baris['harga']; ?> </td>
		<td> <?php echo $baris['nama_penjual']; ?> </td>
		<td>
		<a href="detail-barang.php">
			<button type="submit" class="w3-btn w3-blue"><a href='<?php echo "detail-barang.php?id=$id"; ?>'>LIHAT </a></button>
		</a>
		<a href="update-barang.php">
			<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "update-barang.php?id=$id"; ?>'>UPDATE </a></button>
		</a>
		<a href="proses-delete-barang.php">
			<button type="submit" class="w3-btn w3-red" onclick="konfir()"> 
				<a href='<?php echo "proses-delete-barang.php?id=$id"; ?>'> DELETE</a> </button>
		</a>

		</td>
	</tr>
<?php endwhile; ?>	


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
