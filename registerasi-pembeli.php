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

	?>
 
     
<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Registrasi Pembeli</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container" action="masuk-data-pembeli.php" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Lengkap</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama lengkap anda">
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Username</label>
  	<input class="w3-input w3-border" type="text" name="username" id="username" placeholder="masukkan username anda">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Password</label>
  <input class="w3-input w3-border" type="password" name="password" id="password" placeholder="masukkan password anda">
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Ulangi Password</label>
  <input class="w3-input w3-border" type="password" name="password2" id="password2" placeholder="masukkan kembali password anda">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Email</label>
  <input class="w3-input w3-border" type="text" name="email" id="email" placeholder="masukkan email anda">
  </p>
  
  <p>      
  <label class="w3-label w3-text-blue">Jenis Kelamin</label><br>
  <input class="w3-radio w3-border" type="radio" name="jenis" value="laki-laki" >Laki-Laki<br>
  <input class="w3-radio w3-border" type="radio" name="jenis" value="perempuan" >Perempuan<br>
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Alamat</label>
  <input class="w3-input w3-border" type="textarea" name="alamat" id="alamat" placeholder="masukkan alamat lengkap anda">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">No HP</label>
  <input class="w3-input w3-border" type="text" name="hp" id="hp" placeholder="masukkan no HP anda">
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


<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>


<?php
include 'partial/footer.php';
?>

<script type="text/javascript">
	var nama=getElementById(daftar.nama);
	var namatoko=getElementById(daftar.namatoko);
	var password=getElementById(daftar.password);
	var username=getElementById(daftar.username);
	var password2=getElementById(daftar.password2);
	var email=getElementById(daftar.email);
	var hp=getElementById(daftar.hp);
	var alamat=getElementById(daftar.alamat);

	function cek () {
		if (password!=password2) {
			window.alert("Password harus sama");
			return(false);
		}
		function cek()
		{
		if(nama==””)
		{
			alert(“Nama Tidak Boleh Kosong”);
			daftar.nama.focus();
			return false;
		}
		
		if(alamat==””)
		{
			alert(“Alamat tidak boleh kosong”);
			daftar.alamat.focus();
			daftar.alamat.select();
			return false;
		}
		if(username==””)
		{
			alert(“Username tidak boleh kosong”);
			daftar.username.focus();
			daftar.username.select();
			return false;
		}
		if(hp==””)
		{
			alert (“No HP tidak boleh kosong”);
			daftar.hp.focus();
			daftar.hp.select();
			return false;
		}
	return true
	}
}
</script>



</body>
</html>