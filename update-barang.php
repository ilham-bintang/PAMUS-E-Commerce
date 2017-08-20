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
<br>

<?php
	require_once("konek.php");
 	$pen=$_GET['id'];
	$hasil=mysqli_query($konek, "SELECT * from barang where kd_barang='$pen'");
  		
  	while ($baris=mysqli_fetch_assoc($hasil)):
 
  		$id=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$jenis=$baris['jenis'];
  		$desk=$baris['desk'];
  		$harga=$baris['harga'];
      $stok=$baris['stok'];
?>

<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>UPDATE BARANG</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">


<form class="w3-container " action="" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Barang</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama barang anda" value="<?php echo $baris['nama_brg']; ?>" >
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Jenis Barang</label> <br>
  	<select name="jenis" size="1">
			<option selected value="cincin">Cincin</option>
      <option value="gelang">Gelang</option>
      <option value="kalung">Kalung</option>
      <option value="anting">Anting</option>
      <option value="liontin">Liontin</option>
      <option value="bros">Bros</option>
      <option value="lainnya">Lainnya</option>

  </p>

  <p>
    <label class="w3-label w3-text-blue">ID Toko</label>
    <input class="w3-input w3-border" type="text" name="toko" id="toko" placeholder="masukkan ID toko tempat barang berada">
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Deskripsi</label>
  	<input class="w3-input w3-border" type="text" name="desk" id="desk" placeholder="masukkan deskripsi barang anda" value="<?php echo $baris['desk']; ?>">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Harga</label>
  <input class="w3-input w3-border" type="text" name="harga" id="harga" placeholder="masukkan harga barang anda" value="<?php echo $baris['harga']; ?>">
  </p>
    <p>      
  <label class="w3-label w3-text-blue">Stok</label>
  <input class="w3-input w3-border" type="text" name="stok" id="stok" placeholder="masukkan stok barang anda" value="<?php echo $baris['stok']; ?>">
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Gambar</label>
	<input type="file" name="foto">
  </p>

  
<div align="center">
	<input class="w3-btn w3-blue" type="submit" name="submit" onsubmit="cek()">
</div>
</td>
</tr>
</table>


<?php endwhile; ?>
</form>

<?php

	require_once("konek.php");

	if(isset($_POST['submit'])){
	$id=$_GET['id'];
  	$nama=$_POST['nama'];
  	$jenis=$_POST['jenis'];
  	$desk=$_POST['desk'];
  	$harga=$_POST['harga'];
    $idtoko=$_POST['toko'];

//    echo $id . " " . $nama . " " . $jenis . " " . $desk . " " . $harga . " " . $idtoko . " ";

  	$folder="./foto/";
  	$nama_file=$_FILES['foto']['name'];
  	$ukuran=$_FILES['foto']['size'];
  	$tmp_file=$_FILES['foto']['tmp_name'];
  	move_uploaded_file($tmp_file, $folder.$nama_file);

	
	$cekuser=mysqli_query($konek,"SELECT * from barang where kd_barang='$id'");

	
			$simpan=mysqli_query($konek, "UPDATE  barang set nama_brg='$nama', jenis='$jenis', desk='$desk', harga='$harga', gambar_barang='$nama_file', stok='$stok', id_toko='$idtoko' where kd_barang=$id");
			if($simpan){
/*			echo "SUKSES";*/
			header("location: barang.php");
			}
			else{
			echo "penyimpanan gagal";
			}
		}
	
?>
<?php
include 'partial/footer.php';
?>

<br>
<br>



<script type="text/javascript">
	var password=getElementById(daftar.password);
	var password2=getElementById(daftar.password2);

	function cek () {
		if (password!=password2) {
			window.alert("Password harus sama");
			return(false);
		}
	}
</script>



</body>
</html>