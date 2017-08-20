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
	require_once("konek.php") ;
 		$pen=$_GET['id'];
  		$hasil=mysqli_query($konek, "SELECT * from toko where id_penjual='$pen'");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_penjual'];
  		$toko=$baris['nama_toko'];
  		$nama=$baris['alamat_toko'];
?>

<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Update Data Toko</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">

<form class="w3-container" action="" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Toko</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama lengkap anda" value="<?php echo $baris['nama_toko']; ?>">
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Alamat</label>
  <input class="w3-input w3-border" type="textarea" name="alamat" id="alamat" placeholder="masukkan alamat lengkap anda" value="<?php echo $baris['alamat_toko']; ?>">
  </p>
   
  <p>      
    <label class="w3-label w3-text-blue">Foto</label><br>
    <input class="w3-file w3-border" type="file" name="foto" id="foto">
  </p>

<div align="center">
	<input class="w3-btn w3-blue" type="submit" name="submit">
</div>
</td>
</tr>
</table>
</form>
<?php endwhile; ?>




<?php
	require_once("konek.php");
	if(isset($_POST['submit'])){

	$id=$_GET['toko'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];

    $folder="./foto/toko/";
    $nama_file=$_FILES['foto']['name'];
    $ukuran=$_FILES['foto']['size'];
    $tmp_file=$_FILES['foto'][ 'tmp_name'];
    move_uploaded_file($tmp_file, $folder.$nama_file);

	
			$simpan=mysqli_query($konek, "UPDATE toko set nama_toko='$nama', alamat_toko='$alamat', gambar_toko='$nama_file' where id_penjual=$pen");

			if($simpan){
			echo "SUKSES";
			header("location: index.php");
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

</body>
</html>