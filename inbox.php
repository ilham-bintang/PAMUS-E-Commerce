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

	$id=$_SESSION['username'];
		$cari=mysqli_query($konek, "SELECT nama_pembeli from pembeli where id_pembeli='$id'");
    	while ($baris=mysqli_fetch_assoc($cari)):
     	$penerima=$baris['nama_pembeli'];
		endwhile;
		$hasil=mysqli_query($konek, "SELECT * from pesan where penerima='$penerima' and status='unread'");
		$hasil2=mysqli_query($konek, "SELECT distinct pengirim, status from pesan where penerima='$penerima'  order by waktu desc");
		$j=mysqli_num_rows($hasil2);
		$jml=mysqli_num_rows($hasil);
?>

<table width="500px" align="center">
<tr>
	<td><br></td>
</tr>
<tr>
	<td class="w3-panel w3-blue">
		<p align="center">
			INBOX <?php echo $penerima; ?>
		</p>
	</td>
</tr>
<tr>
	<td class="w3-border" style="padding-left: 15px; padding-right: 15px">
<?php

  		while ($baris=mysqli_fetch_assoc($hasil2)):
  		/*$text=$baris['teks'];
  		$waktu=$baris['waktu'];
		$id_pesan=$baris['id_pesan'];*/
		$pengirim=$baris['pengirim'];
	?>	
	<a href="<?php echo "cek-inbox.php?nama=$pengirim&penerima=$penerima";?>">
	<?php 
		if ($baris['status']=='read'and !isset($baru)) {
			
			?>
			<p class="w3-grey" style="padding-left: 10px; height: 50px">
		<b>
			<?php echo $baris['pengirim'];?>
			</b>
			<!-- <br>
			<?php echo $baris['teks'];?>
			<br>
			<?php echo $baris['waktu'];?> -->
		</p>
	
	<?php
		}
	else if ($baris['status']=='unread') {
		$baru=true;
	?>
		<p class="w3-green" style="padding-left: 10px; height: 50px;">
			<b>
			<?php echo $baris['pengirim'];?>
			</b><span style="padding: 1px 5px 1px 5px; background-color: red;" class="w3-circle"><?php echo $jml; ?></span>
			<!-- <br>
			<?php echo $baris['teks'];?>
			<br>
			<?php echo $baris['waktu'];?> -->
		</p>
	<?php
	}
	?>
	</a>
	<?php	
	endwhile;
	?>
	</td>
</tr>


</table>

</body>
</html>
