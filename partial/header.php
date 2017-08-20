<?php 

  require_once("konek.php") ;

  
  
  

  if (!isset($_SESSION['level']) ) {
    
  ?>
    <ul class="w3-navbar w3-blue">
      <li><a href="index.php">Beranda</a></li>
      <li><a href="toko.php">Toko</a></li>
      <li>
        <div class="w3-dropdown-hover">
    		  <button class="w3-btn w3-blue">Kategori</button>
            <div class="w3-dropdown-content w3-border">
      		    <a href="cincin.php">Cincin</a>
              <a href="kalung.php">Kalung</a>
              <a href="gelang.php">Gelang</a>
          <a href="anting.php">Anting</a>
          <a href="liontin.php">Liontin</a>
          <a href="bros.php">Bros</a>
          <a href="lainnya.php">Lainnya</a>
            </div>
        </div>
      </li>
    <li><a href="tampil_katalog.php">Katalog</a></li>
      <li>
        <a href="tentang.php">Tentang</a>
      </li>
      
     
      <li class="w3-dropdown-hover w3-right">
        <a href="#">Daftar</a>
        <div class="w3-dropdown-content w3-white w3-card-4">
          <a href="registerasi-penjual.php">Penjual</a>
          <a href="registerasi-pembeli.php">Pembeli</a>
        </div>
      </li>

      <li class="w3-dropdown-hover w3-right" class="w3-btn">
        <a href="#">Masuk</a>
        <div class="w3-dropdown-content w3-white w3-card-4">
          <a href="login-penjual.php">Penjual</a>
          <a href="login-pembeli.php">Pembeli</a>
          <a href="login-admin.php">Admin</a>
        </div>
      </li>
     
    </ul>
  <?php 
  }




 else if ($_SESSION['level']=='admin') {
  
  $username=$_SESSION['username'];

	?>
    <ul class="w3-navbar w3-blue">
      <li><a href="beli.php">Pembeli</a></li>
      <li><a href="dagang.php">Penjual</a></li>
      <li><a href="toko.php">Toko</a></li>
      <li><a href="barang.php">Barang</a></li>
      <li><a href="transaksi.php">Transaksi</a></li>
      <li>
        <a href="tentang.php">Tentang</a>
      </li>
      
      <li class="w3-right" class="w3-btn" class=" w3-red">
        <a href="session_destroy.php">Logout</a>
      </li>
      
      <li class="w3-right">
      <a href="#">
      <?php echo $_SESSION['username']; ?></a></li>
    </ul>
  
  <?php 
  } 





  	else if ($_SESSION['level']=='pembeli') {
      $username=$_SESSION['username'];
      $query = mysqli_query($konek, "SELECT * FROM pembeli where id_pembeli=$username");
      while ($baris=mysqli_fetch_assoc($query)):
        $gambar=$baris['gambar_pembeli'];
  ?>
  <ul class="w3-navbar w3-blue">
    <li><a href="index.php">Beranda</a></li>
    <li><a href="toko.php">Toko</a></li>
    <li>
    	<div class="w3-dropdown-hover">
    		<button class="w3-btn w3-blue">Kategori</button>
    	<div class="w3-dropdown-content w3-border">
      		<a href="cincin.php">Cincin</a>
     		<a href="kalung.php">Kalung</a>
      		<a href="gelang.php">Gelang</a>
          <a href="anting.php">Anting</a>
          <a href="liontin.php">Liontin</a>
          <a href="bros.php">Bros</a>
          <a href="lainnya.php">Lainnya</a>

    <li><a href="tampil_katalog.php">Katalog</a></li>
    </div>
  </div>
    </li>
    <li><a href="tentang.php">Tentang</a></li>
     

    <li class="w3-right" class="w3-btn w3-red"><a href="session_destroy.php">Logout</a></li>
    <li class="w3-dropdown-hover w3-right">
    <a href="#"><?php echo $_SESSION['badge']; ?><i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a  href='<?php echo "pembeli.php?id=$username"; ?>'> Lihat Profil</a>
      <a  href='<?php echo "update-data-pembeli.php?id=$username"; ?>'> Edit Profil</a>
      <a  href='<?php echo "belanjaan-saya.php?id=$username"; ?>'> Keranjang</a>
    </div>
  </li>
  <li class="w3-right"><a href="<?php echo "pembeli.php?id=$username"; ?>"><img src="foto/pembeli/<?php echo $gambar;?>" width="22px" height="22px" class="w3-circle" ></a></li>

  <!-- list pesan -->
  <li class="w3-right"><a href="<?php echo "inbox.php"; ?>"><img src="icon/email.png" width="20px">
   <?php
    $idpem=$_SESSION['username'];
    $cari=mysqli_query($konek, "SELECT nama_pembeli from pembeli where id_pembeli='$idpem'");
    while ($baris=mysqli_fetch_assoc($cari)):
        $nama=$baris['nama_pembeli'];
    

    $hasil=mysqli_query($konek, "SELECT * from pesan where penerima='$nama' and status='unread'");
    $jumlah=mysqli_num_rows($hasil);

    if ($jumlah!=0) {
   ?>
   <span style="padding: 1px 5px 1px 5px; background-color: red;" class="w3-circle"><?php echo $jumlah; ?></span>

  <?php 
  }
  endwhile;
  ?>
   </a> </li>
  </ul>
  <?php
    endwhile;
  }

  	else if ($_SESSION['level']=='penjual') { 
      $username=$_SESSION['username'];
      $query = mysqli_query($konek, "SELECT * FROM penjual where id_penjual=$username");
      while ($baris=mysqli_fetch_assoc($query)):
        $gambar=$baris['gambar_penjual'];
  	?>

  	<ul class="w3-navbar w3-blue">
    <li><a href="index.php">Beranda</a></li>
    <li><a href="toko.php">Toko</a></li>
    <li>
    	<div class="w3-dropdown-hover">
    		<button class="w3-btn w3-blue">Kategori</button>
    	<div class="w3-dropdown-content w3-border">
      		<a href="cincin.php">Cincin</a>
     		<a href="kalung.php">Kalung</a>
      		<a href="gelang.php">Gelang</a>
          <a href="anting.php">Anting</a>
          <a href="liontin.php">Liontin</a>
          <a href="bros.php">Bros</a>
          <a href="lainnya.php">Lainnya</a>

      </div>
     </div>
    </li>
    <li><a href="tampil_katalog.php">Katalog</a></li>
    <li><a href="tentang.php">Tentang</a></li>
     
    <li class="w3-right"  class="w3-btn" class="w3-red"><a href="session_destroy.php">Logout</a></li>
    <li class="w3-right"  class="w3-btn" class="w3-red"><a href="registerasi-toko.php">Registrasi Toko</a></li>
    <li class="w3-dropdown-hover w3-right">
    <a href="#"><?php echo $_SESSION['badge']; ?><i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
    <a  href='<?php echo "penjual.php?id=$username"; ?>'> Lihat Profil</a>
      <a  href='<?php echo "update-data-penjual.php?id=$username"; ?>'> Edit Profil</a>
      <a href="upload.php">Upload Barang</a>
      <a href='<?php echo "barang-saya.php?id=$username"; ?>'>Barang Saya</a>
      <a href='<?php echo "daftar-tunggu.php?id=$username"; ?>'>Daftar Tunggu</a>
      <a href='<?php echo "toko-saya.php?id=$username"; ?>'>Toko Saya</a>
    </div>
    
    </li>
   <li class="w3-right"><a href="<?php echo "penjual.php?id=$username"; ?>"><img src="foto/penjual/<?php echo $gambar;?>" width="22px" height="22px" class="w3-circle" ></a></li>


   <!-- list pesan -->
   <li class="w3-right"><a href="<?php echo "inbox2.php"; ?>"><img src="icon/email.png" width="20px" height="20px">
   <?php
    $idpen=$_SESSION['username'];
    $cari=mysqli_query($konek, "SELECT nama_penjual from penjual where id_penjual='$idpen'");
    while ($baris=mysqli_fetch_assoc($cari)):
        $nama=$baris['nama_penjual'];
    

    $hasil=mysqli_query($konek, "SELECT * from pesan where penerima='$nama' and status='unread'");
    $jumlah=mysqli_num_rows($hasil);

    if ($jumlah!=0) {
   ?>
   <span style="padding: 1px 5px 1px 5px; background-color: red;" class="w3-circle"><?php echo $jumlah; ?></span>

  <?php 
  }
  endwhile;
  ?>

   </a> </li>
  </ul>
  <?php
   endwhile;
   }
   ?>