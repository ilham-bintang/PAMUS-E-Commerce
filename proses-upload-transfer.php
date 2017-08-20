<?php
    include 'konek.php';
    $d=$_POST['id'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $provinsi=$_POST['provinsi'];
    $kota=$_POST['kota'];
    $kecamatan=$_POST['kecamatan'];
    $email=$_POST['email'];

    $folder="./foto/transfer/";
    $nama_file=$_FILES['foto']['name'];
    $ukuran=$_FILES['foto']['size'];
    $tmp_file=$_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp_file, $folder.$nama_file);

      $simpan=mysqli_query($konek, "UPDATE transaksi set gambar_konfirmasi='$nama_file', status='menunggu konfirmasi', nama_penerima='$nama', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', email='$email' where id_transaksi=$d");
      if($simpan){
/*      echo "SUKSES";*/
      header("location: nota.php?id=$d");
      }
      else{
      echo "penyimpanan gagal";
      }
    

?>