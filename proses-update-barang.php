<?php
	require_once("konek.php");
	if(isset($_POST['submit'])){
	$id=$_GET['id'];
  	$nama=$_POST['nama'];
  	$jenis=$_POST['jenis'];
  	$desk=$_POST['desk'];
  	$harga=$_POST['harga'];
  	$stok=$_POST['stok'];

  	$folder="./foto/";
  	$nama_file=$_FILES['foto']['name'];
  	$ukuran=$_FILES['foto']['size'];
  	$tmp_file=$_FILES['foto']['tmp_name'];
  	move_uploaded_file($tmp_file, $folder.$nama_file);

	
	$cekuser=mysqli_query($konek,"SELECT * from barang where kd_barang='$id'");

	
			$simpan=mysqli_query($konek, "UPDATE  barang set nama_brg='$nama', jenis=$jenis, desk=$desk, stok=$stok, harga=$harga,gambar=$nama_file  where kd_barang=$id");
			if($simpan){
			echo "SUKSES";
			header("location: barang.php");
			}
			else{
			echo "penyimpanan gagal";
			}
		}
	


include 'partial/footer.php';
?>