<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	include 'konek.php';
	include 'partial/header.php';
	include 'partial/title.php';

	$pengirim=$_GET['nama'];
	$id=$_SESSION['username'];
    $cari=mysqli_query($konek, "SELECT nama_penjual from penjual where id_penjual='$id'");
    while ($baris=mysqli_fetch_assoc($cari)):
     $penerima=$baris['nama_penjual'];
	
	$hasil=mysqli_query($konek, "SELECT * from pesan where pengirim='$pengirim' and penerima='$penerima' or pengirim='$penerima' and penerima='$pengirim' order by waktu");
	endwhile;

?>


<table width="500px" align="center">


<tr>
	<td><br></td>
</tr>
<tr>
	<td class="w3-panel w3-blue">
		<p align="center">
			<?php echo $pengirim; ?>
		</p>
	</td>
</tr>
<tr>
	<td class="w3-border" style="padding-left: 15px; padding-right: 15px">
	<div id="" style="overflow-y:scroll; height:400px;">
<?php

  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$text=$baris['teks'];
  		$waktu=$baris['waktu'];
	
		if ($baris['pengirim']==$penerima) {
	?>	
			<div align="right">
		<p class="w3-dark-grey w3-right" style="width: 300px">
		<font color="white">
			<b>
			<?php echo $penerima;?>
			</b>
			<br>
			<?php echo $text;?>
			<br>
			<?php echo $waktu;?>
		</font>
		<br>
		<?php if ($baris['status']=='read') {
			?>
			<span style="color: yellow;">read</span>
		<?php
		} ?>
		</p>
		</div>
				<br><br><br><br><br><br>
		<?php
	}
	else {
		?>
				<p class="w3-green" style="width: 300px">
			<b>
			<?php echo $pengirim;?>
			</b>
			<br>
			<?php echo $text;?>
			<br>
			<?php echo $waktu;?>
		</p>

	<?php
	}
	endwhile;
	?>
	</div>
	</td>
</tr>

<tr >
<td class="w3-border">
<form class="w3-container" action="" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Masukkan Pesan Anda</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="Masukkan pesan">
  </p>

<div align="center">
	<input class="w3-btn w3-blue" type="submit" name="submit" value="kirim">
</div>
</td>
</tr>
</table>
</form>

<?php
	if(isset($_POST['submit'])){
		$teks=$_POST['nama'];
		$timestamp = date('Y-m-d G:i:s');
	$query=mysqli_query($konek,"INSERT INTO pesan (id_pesan, pengirim, penerima, nm_toko, status, teks, waktu) values ('null','$penerima','$pengirim','null','unread','$teks','$timestamp')");
	
	}
?>


</body>
</html>
