
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

<h1 align="center">DAFTAR PENJUAL</h1>
<table class="w3-table w3-striped w3-border" align="center" border="1">
<tr>
		<td>ID</td>
		<td >Username</td>
		<td >Nama Penjual</td>
		<td >Alamat</td>
		<td >No HP</td>
		<td >TOOLS</td>
	</tr>


<?php
 		require_once("konek.php") ;
  		$hasil=mysqli_query($konek, "SELECT * from penjual order by id_penjual desc");
  		while ($baris=mysqli_fetch_assoc($hasil)):

  		$id=$baris['id_penjual'];
  		$nama=$baris['nama_penjual'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$no_hp=$baris['no_hp'];
?>
	<tr>
		<td> <?php echo $baris['id_penjual']; ?> </td>
		<td> <?php echo $baris['username']; ?> </td>
		<td> <?php echo $baris['nama_penjual']; ?> </td>
		<td> <?php echo $baris['alamat']; ?> </td>
		<td> <?php echo $baris['no_hp']; ?> </td>
		<td>
		<a href="penjual.php">
			<button type="submit" class="w3-btn w3-blue"> <a href='<?php echo "penjual.php?id=$id"; ?>'>  LIHAT</button>
		</a>
		<?php 
			if ($_SESSION['level']=='admin') {
				
		?>
		<a href="update-barang.php">
			<button type="submit" class="w3-btn w3-yellow"><a href='<?php echo "update-data-penjual.php?id=$id"; ?>'>UPDATE </a></button>
		</a>
		<a href="proses-delete-dagang.php">
			<button type="submit" class="w3-btn w3-red" > 
				<a href='<?php echo "proses-delete-dagang.php?id=$id"; ?>'> DELETE</a> </button>
		</a>

		</td>
	</tr>
<?php } endwhile; ?> 
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