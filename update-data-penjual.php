<!DOCTYPE html>
<html>
<head>
  <title>PAMUS</title>
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php
  include 'partial/header.php';
  include 'partial/title.php';

  require_once("konek.php") ;
    $pen=$_GET['id'];

      $hasil=mysqli_query($konek, "SELECT * from penjual where id_penjual='$pen'");
      while ($baris=mysqli_fetch_assoc($hasil)):
      $id=$baris['id_penjual'];
      $nama=$baris['nama_penjual'];
      $password=$baris['password'];
      $username=$baris['username'];
      $alamat=$baris['alamat'];
      $email=$baris['email'];
      $no_hp=$baris['no_hp'];
      $gambar=$baris['gambar_penjual'];
      $jk=$baris['jk'];
      $rekening=$baris['rekening'];
?>

    
<table width="500px" align="center">
<tr>
  <td >
    <div align="center" class="w3-container w3-blue">
        <h1>UPDATE DATA PENJUAL</h1>
    </div>
  </td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container " action="" method="POST" enctype="multipart/form-data">
  <p>
    <label class="w3-label w3-text-blue">Nama Lengkap</label>
    <input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama lengkap anda" value="<?php echo $baris['nama_penjual']; ?>">
  </p>
 
    <p>
    <label class="w3-label w3-text-blue">No Rekening Bank</label>
    <input class="w3-input w3-border" type="text" name="rekening" id="rekening" placeholder="masukkan nomor rekening anda" value="<?php echo $baris['rekening']; ?>">
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
  <input class="w3-radio w3-border" type="radio" name="jenis" value="perempuan" >Perempuan<br>
  </p>
  <p>      
  <label class="w3-label w3-text-blue">No HP</label>
  <input class="w3-input w3-border" type="text" name="hp" id="hp" value="<?php echo $baris['no_hp'];?>" placeholder="masukkan no HP anda">
  </p>
  <p>
  <label class="w3-label w3-text-blue">Alamat</label> 
  <input class="w3-input w3-border" type="textarea" name="alamat" id="alamat" placeholder="masukkan alamat lengkap anda" value="<?php echo $baris['alamat'];?>">
  </p>
 <p>      
  <label class="w3-label w3-text-blue">Gambar</label>
  <input type="file" name="foto" >
  </p>
<div align="center">
  <button class="w3-btn w3-blue" name="submit">Update</button></p>
</div>
</td>
</tr>
</table>
</form>

<?php endwhile; 


echo "<br>
<br>";

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
  $jenis=$_POST['jenis'];
  $rekening=$_POST['rekening'];

    $folder="./foto/penjual/";
    $nama_file=$_FILES['foto']['name'];
    $ukuran=$_FILES['foto']['size'];
    $tmp_file=$_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp_file, $folder.$nama_file);

		$cekuser=mysqli_query($konek,"SELECT * from penjual where id_penjual='$pen'");

	 		if($password!=$repassword){
			echo "Mohon Masukkan Password yang sama!";
			echo '<a href="registerasi-penjual.php"> kembali </a>';
		}
		else if(!$username || !$password){
			echo "Silakan Lengkapi Data";
			echo '<a href="registerasi-penjual.php"> kembali </a>';
		}

		else{

			$simpan=mysqli_query($konek, "UPDATE  penjual set nama_penjual='$nama', username='$username', password='$password', email='$email', alamat='$alamat', no_hp='$no_hp', jk='$jenis', rekening='$rekening', gambar_penjual='$nama_file' where id_penjual=$pen");
		
      if($simpan){
      ?>
      <script type="text/javascript">
        window.alert("Data berhasil diperbarui");
      </script>
      <?php
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