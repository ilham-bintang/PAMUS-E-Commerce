<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
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
<h1 align="center">TENTANG</h1>
<div class="w3-panel w3-blue w3-padding-16">
<p style="margin-left: 50px;" >
	PAMUS merupakan perusahaan yang membantu pedagang-pedagang mutaira lokal yang berada di daerah sekarbela untuk memasarkan produk-produk mutiara lokal kepada pembeli yang berada di daerah luar Lombok sehingga siapapun bisa mendapatkan informasi kapanpun dan dimanapun. 
</P>

<p style="margin-left: 50px;">
	TIM PENGEMBANG:<br>
	-Aldian Wahyu	: Back-End Developer<br>
	-Heru Mulyana	: Front-End Developer<br>
	-Ilham Bintang	: Database Engineer
</p>

</div>
<br><br>

<h1 align="center">PETA SEKARBELA</h1>



<iframe
  width="100%"
  height="600"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqc2RKQtZ8t6ZqMD6jU09-wSPtssZSYIQ
    &q=Sekarbela,+Mataram+City,+West+Nusa+Tenggara" allowfullscreen>
</iframe>
<br><br>
<br><br>
	<h1 align="center">SITEMAP</h1><br>
	<?php 
	if (!isset($_SESSION['level'])) {
	?>
	<div align="center">
		<img src="img/sitemap/non-member.png" width="100%">
	</div>
	<?php	
	}
	else {
		if ($_SESSION['level']=='admin') {
	
	?>
	<div align="center">
		<img src="img/sitemap/admin.png" width="100%">
	</div>
	<?php
		}
		if ($_SESSION['level']=='pembeli') {
	?>
	<div align="center">
		<img src="img/sitemap/member.png" width="100%">
	</div>
	<?php
		}
		if ($_SESSION['level']=='penjual') {
	?>
	<div align="center">
		<img src="img/sitemap/penjual.png" width="100%">
	</div>
	<?php
		}
	}
	?>

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