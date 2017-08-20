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
<h1 align="center">
UPDATE DATA: PEMBELI
</h1>
<br>
<?php
	require_once("konek.php") ;
 		$pen=$_GET['id'];
  		$hasil=mysqli_query($konek, "SELECT * from pembeli where id_pembeli='$pen'");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_pembeli'];
  		$nama=$baris['nama_pembeli'];
  		$password=$baris['password'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$email=$baris['email'];
  		$no_hp=$baris['no_hp'];
?>
<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Update Data Pembeli</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container " action="" method="POST" enctype="multipart/form-data">
  <p>
  	<label class="w3-label w3-text-blue">Nama Lengkap</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama lengkap anda" value="<?php echo $baris['nama_pembeli']; ?>">
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Username</label>
  	<input class="w3-input w3-border" type="text" name="username" id="username" placeholder="masukkan username anda" value="<?php echo $baris['username']; ?>">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Password</label>
  <input class="w3-input w3-border" type="password" name="password" id="password" placeholder="masukkan password anda" value="<?php echo $baris['password']; ?>">
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Ulangi Password</label>
  <input class="w3-input w3-border" type="password" name="password2" id="password2" placeholder="masukkan kembali password anda" value="<?php echo $baris['password']; ?>">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Email</label>
  <input class="w3-input w3-border" type="text" name="email" id="email" placeholder="masukkan email anda" value="<?php echo $baris['email']; ?>">
  </p>
  
  <p>      
  <label class="w3-label w3-text-blue">Jenis Kelamin</label><br>
  <input class="w3-radio w3-border" type="radio" name="jenis" value="laki-laki" >Laki-Laki<br>
  <input class="w3-radio w3-border" type="radio" name="jenis" value="perempuan" >Perempuan
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Alamat</label>
  <input class="w3-input w3-border" type="textarea" name="alamat" id="alamat" placeholder="masukkan alamat lengkap anda" value="<?php echo $baris['alamat']; ?>">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">No HP</label>
  <input class="w3-input w3-border" type="text" name="hp" id="hp" placeholder="masukkan no HP anda" value="<?php echo $baris['no_hp']; ?>">
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
	$username=$_POST['username'];
	$password=$_POST['password'];
	$repassword=$_POST['password2'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['hp'];
	$cekuser=mysqli_query($konek,"SELECT * from pembeli where id_pembeli='$pen'");

	$folder="./foto/pembeli/";
    $nama_file=$_FILES['foto']['name'];
    $ukuran=$_FILES['foto']['size'];
    $tmp_file=$_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp_file, $folder.$nama_file);

		if($password!=$repassword){
			echo "Mohon Masukkan Password yang sama!";
			echo '<a href="registerasi-pembeli.php"> kembali </a>';
		}
		else if(!$username || !$password){
			echo "Silakan Lengkapi Data";
			echo '<a href="registerasi-pembeli.php"> kembali </a>';
		}

		else{

			$simpan=mysqli_query($konek, "UPDATE  pembeli set nama_pembeli='$nama', username='$username', password='$password', email='$email', alamat='$alamat', no_hp=$no_hp, gambar_pembeli='$nama_file' where id_pembeli=$pen");
			if($simpan){
			?>
			<script type="text/javascript">
				window.alert("Data berhasil diperbarui");
			</script>
			<?php
			echo "SUKSES";

			}
			else{
			echo "penyimpanan gagal";
			}
		}
	}


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