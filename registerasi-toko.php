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
	include('partial/header.php');
	include 'partial/title.php';

	$idpen=$_SESSION['username'];
	?>




 
     
<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Registrasi Toko pada ID Penjual <?php echo $idpen; ?></h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container " action="masuk-data-toko.php" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Toko</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama toko anda">
  </p>
 
    <p>
  	<label class="w3-label w3-text-blue">Alamat Toko</label>
  	<input class="w3-input w3-border" type="text" name="alamat" id="alamat" placeholder="masukkan alamat toko anda">
  </p>

  <p>      
  <label class="w3-label w3-text-blue">Foto</label>
  <input class="w3-file w3-border" type="file" name="foto" id="foto" >
  </p>

<div align="center">
	<button class="w3-btn w3-blue" >Daftar</button></p>
</div>
</td>
</tr>
</table>
</form>


<br><br>
<br>


<?php
include 'partial/footer.php';
?>


</body>
</html>