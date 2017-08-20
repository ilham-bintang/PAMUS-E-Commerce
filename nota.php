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

		$id=$_GET['id'];
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
?>


<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Bukti Pembayaran</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">

<input type="hidden" name="id" value="<?php echo $kd; ?>">
  <p>
  	<label class="w3-label w3-text-blue">Nama</label><p>
    <label class="w3-label w3-text-black"><?php echo $baris['nama_pembeli']; ?></label>
  <p>
    <label class="w3-label w3-text-blue">Alamat</label><p>
    <label class="w3-label w3-text-black"><?php echo $baris['alamat_lengkap']; ?></label>
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Provinsi</label><p>
    <label class="w3-label w3-text-black"><?php echo $baris['provinsi']; ?></label>
  </p>
   <p>      
  <label class="w3-label w3-text-blue">Kota</label><p>
    <label class="w3-label w3-text-black"><?php echo $baris['kota']; ?></label>
  </p>
  <p>      
  <label class="w3-label w3-text-blue">Kecamatan</label><p>
    <label class="w3-label w3-text-black"><?php echo $baris['kecamatan']; ?></label>
  </p>
     <p>      
  <label class="w3-label w3-text-blue">Email</label><p>
    <label class="w3-label w3-text-blue"><?php echo $baris['email']; ?></label>
  </p>
    <p>      
  <label class="w3-label w3-text-blue">Rekening Penjual : </label><p>
    <label class="w3-label w3-text-blue"><?php echo $baris['rekening']; ?></label>
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
    <label class="w3-label w3-text-blue">Status Pembayaran : </label>
    <label class="w3-label w3-text-blue"><?php echo $baris['status']; ?></label>
  </p>

  <div align="center">
	<button class="w3-btn w3-blue" onclick="cetak()">PRINT</button></p>
	</div>
  <a href="tampil_katalog.php">
  <div align="center">
  <button class="w3-btn w3-blue">LANJUT BERBELANJA</button></p>
  </div>
  </a>
</td>
</tr>
<?php endwhile; ?>
</table>


<script type="text/javascript">
  function cetak() {
    window.print();
  }
</script>
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