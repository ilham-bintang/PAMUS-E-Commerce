
<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		h2{
			align:center;
		}
	</style>
</head>
<body>


 <?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	include('partial/header.php');
	include('partial/title.php');
	
	?>

<br>
<h1 align="center">DAFTAR TOKO SAYA</h1>
<table class="w3-table w3-striped w3-border" align="center" border="1">
	<tr>
		<td  height="55px">ID</td>
		<td >Nama Pemilik</td>
		<td >Nama Toko</td>
		<td ">Alamat</td>
		<td >No HP</td>
		<td >Gambar</td>
		<td >Tools</td>
	</tr>

	<?php
 		require_once("konek.php") ;
 		$pen=$_SESSION['username'];
  		$hasil=mysqli_query($konek, "SELECT * from toko, penjual where penjual.id_penjual = toko.id_penjual and penjual.id_penjual=$pen ");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_penjual'];
  		$nama=$baris['nama_toko'];
  		$alamat=$baris['alamat_toko'];
  		$penjual=$baris['nama_penjual'];
  		$no_hp=$baris['no_hp'];
  		$idtoko=$baris['id_toko'];
	?>

	<tr>
		<td> <?php echo $baris['id_penjual']; ?> </td>
		<td> <?php echo $baris['nama_toko']; ?> </td>
		<td> <?php echo $baris['alamat_toko']; ?> </td>
		<td> <?php echo $baris['nama_penjual']; ?> </td>
		<td> <?php echo $baris['no_hp']; ?> </td>
		<td> <img src="foto/toko/<?php echo $baris['gambar_toko']; ?>" width="100px">
		 </td>
		<td>
		<a href="detail-toko.php">
			<button type="submit" class="w3-btn w3-blue">
			<a href='<?php echo "detail-toko.php?id=$id&toko=$idtoko" ; ?>'>LIHAT</button>
		</a>

			<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "update-data-toko.php?id=$id&toko=$idtoko"; ?>'>UPDATE </a></button>
		<a href="proses-delete-dagang.php">
			<button type="submit" class="w3-btn w3-red"> 
				<a href='<?php echo "proses-delete-toko.php?id=$idtoko"; ?>'> DELETE</a> </button>
		</a>

		</td>
	</tr>
<?php endwhile; ?> 

</table>
<br><br>
<br><br>
<br><br>

<script type="text/javascript">
	function konfir() {
	   confirm("Yakin ingin menghapus data ini?");
	   	if (confirm==false) {
	   		return true;
	   	}
	}
</script>



</body>
</html>