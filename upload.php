

<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


 <?php
	include ("konek.php");
	include('partial/header.php');
	include('partial/title.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

?>

<!-- <br>
<h1 align="center">
UPLOAD BARANG
</h1>
<br> -->

<form id="daftar" method="POST" action="proses-upload.php" enctype="multipart/form-data">
<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>UPLOAD BARANG</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container " action="masuk-data-penjual.php" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Barang</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama barang anda">
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
  <br>
  <p>
    <label class="w3-label w3-text-blue">ID Toko</label>
    <input class="w3-input w3-border" type="text" name="toko" id="toko" placeholder="masukkan ID toko tempat barang berada">
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Deskripsi</label>
  	<input class="w3-input w3-border" type="text" name="desk" id="desk" placeholder="masukkan deskripsi barang anda">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Harga</label>
  <input class="w3-input w3-border" type="text" name="harga" id="harga" placeholder="masukkan harga barang anda">
  </p>
    <p>      
  <label class="w3-label w3-text-blue">Stok</label>
  <input class="w3-input w3-border" type="text" name="stok" id="stok" placeholder="masukkan stok barang anda">
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




<br>
<br>





<?php
include 'partial/footer.php';
?>

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