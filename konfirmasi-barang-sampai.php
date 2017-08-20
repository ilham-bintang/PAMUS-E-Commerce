<?php
    include 'konek.php';
    $id=$_GET['id'];

      $simpan=mysqli_query($konek, "UPDATE transaksi set  status='sudah diterima' where id_transaksi=$id");
      if($simpan){
/*      echo "SUKSES";*/
      header("location: belanjaan-saya.php?id=$id");
      }
      else{
      echo "penyimpanan gagal";
      }
    

?>