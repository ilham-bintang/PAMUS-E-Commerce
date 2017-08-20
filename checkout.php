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
	require_once("konek.php") ;
//	include('partial/header.php');
	include 'partial/title.php';

		$id=$_GET['idtransaksi'];
		$hasil=mysqli_query($konek,"SELECT * from barang,penjual, transaksi, pembeli where barang.id_penjual=penjual.id_penjual and transaksi.id_barang=barang.kd_barang and transaksi.id_pembeli=pembeli.id_pembeli and id_transaksi=$id");

  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$kd=$baris['kd_barang'];
  		$nama=$baris['nama_brg'];
  		$jenis=$baris['jenis'];
  		$deskripsi=$baris['desk'];
  		$harga=$baris['harga'];
  		$penjual=$baris['nama_penjual'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$no_hp=$baris['no_hp'];
  		$gambar=$baris['gambar_barang'];
  		$jenis=$baris['jk'];
      $harga=$baris['harga'];
      $jumlah=$baris['jumlah_barang'];
      $rekening=$baris['rekening'];
      $transaksi=$baris['id_transaksi'];
?>
<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Konfirmasi Pembayaran</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container" action="proses-upload-transfer.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $transaksi; ?>">
  <p>
  	<label class="w3-label w3-text-blue">Nama Penerima</label>
  	<input class="w3-input w3-border" type="text" name="nama" id="nama" placeholder="masukkan nama lengkap anda" value="<?php echo $baris['nama_pembeli']; ?>">
  </p>
  <p>
  	<label class="w3-label w3-text-blue">Alamat Lengkap</label>
  	<input class="w3-input w3-border" type="text" name="alamat" id="alamat" placeholder="masukkan alamat lengkap anda" value="<?php echo $baris['alamat']; ?>">
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Provinsi</label>
  <input class="w3-input w3-border" type="text" name="provinsi" id="provinsi" placeholder="masukkan provinsi anda" >
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Kota</label>
  <input class="w3-input w3-border" type="text" name="kota" id="kota" placeholder="masukkan kota anda" >
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Kecamatan</label>
  <input class="w3-input w3-border" type="text" name="kecamatan" id="kecamatan" placeholder="masukkan kecamatan anda" >
  </p>
     <p>      
  <label class="w3-label w3-text-blue">Email</label>
  <input class="w3-input w3-border" type="text" name="email" id="email" placeholder="masukkan email anda" value="<?php echo $baris['email']; ?>">
  </p>
    <p>      
  <label class="w3-label w3-text-blue">Rekening Penjual : </label>
  <b>
  <?php 
  echo $rekening;
  echo "  A/N  ";
  echo $penjual;
  ?>
  </b></label>

</p>
     <p>      
  <label class="w3-label w3-text-blue">Harga : </label>
  <b>
  <?php 
  echo $harga;
  ?>
	</b></label>

</p>
<label class="w3-label w3-text-blue">Jumlah : </label>
  <b>
  <?php 
  echo $jumlah;
  ?>
  </b></label>
</p>

  <p>      
    <label class="w3-label w3-text-blue">Total Pembayaran : </label>
    <label class="w3-label w3-text-blue"> <b>
    
    <?php 
      echo $harga*$jumlah;
    ?>
    </b></label>
  </p>

  <p>      
  <label class="w3-label w3-text-blue">Bukti Pembayaran</label>
  <input class="w3-file w3-border" type="file" name="foto">
  </p>

  <div align="center">
	<button class="w3-btn w3-blue" >KONFIRMASI</button></p>
	</div>
</td>
</tr>
</form>
<?php endwhile; ?>
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



</body>
</html>