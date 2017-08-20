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
<h1 align="center">DETAIL PROFIL</h1>
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php") ;

 		$pen=$_GET['id'];
  		$hasil=mysqli_query($konek, "SELECT * from pembeli where id_pembeli='$pen'");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_pembeli'];
  		$nama=$baris['nama_pembeli'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$no_hp=$baris['no_hp'];
		$gambar=$baris['gambar_pembeli'];
		$jenis=$baris['jk'];
?>
	<tr>
		<td width="200px">
			<img src="foto/pembeli/<?php echo $baris['gambar_pembeli']; ?>" width='300px'>
		</td>		
		<td width="10px"></td>
		<td width="800px">
		<font style="font-size: 16px;" >
			<table align="center" class="w3-tables w3-border w3-striped" width="100%">
				<tr>
					<td width="40px" height="50px">
						<img src="icon/logo_profil.png" width="35px">
					</td>
					<td width="150px">id pembeli</td>
					<td><?php echo $baris['id_pembeli']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/username.png" width="35px">
					</td>
					<td>Nama Pembeli</td>
					<td><?php echo $baris['nama_pembeli']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px" >
						<img src="icon/admin.png" width="35px">
					</td>
					<td>Username</td>
					<td><?php echo $baris['username']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/lokasi.png" width="35px">
					</td>
					<td>Alamat</td>
					<td><?php echo $baris['alamat']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/email.png" width="35px">
					</td>
					<td>Email</td>
					<td><?php echo $baris['email']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/post.png" width="35px">
					</td>
					<td>Kontak</td>
					<td><?php echo $baris['no_hp']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/username.png" width="35px">
					</td>
					<td>Jenis Kelamin</td>
					<td><?php echo $baris['jk']; ?></td>
				</tr>
				<tr>
					<td width="40px" height="50px">
						<img src="icon/telepon.png" width="35px">
					</td>
					<td>Nomor HP</td>
					<td><?php echo $baris['no_hp']; ?></td>
				</tr>
			</table>
			</font>
		</td>
	</tr>
<?php endwhile; ?>
</table>

<br><br>
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