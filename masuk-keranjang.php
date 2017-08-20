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
include('partial/title.php');
?>

<?php
 		require_once("konek.php");
 		if(!isset($_SESSION)) 
   			 { 
     		   session_start(); 
   			 }

 		$id=$_POST['id']; //id=kode barang
        $jml=$_POST['jumlah'];
        $stok=$_POST['stok'];
 		$sid=$_SESSION['username'];

        echo $id." ".$jml." ".$sid;

        if ($jml>$stok) {
            header("Location:detail-barang.php?id=$id");
        }
        else {
 		$sql = mysqli_query($konek,"SELECT id_transaksi FROM transaksi WHERE id_barang='$id' AND id_pembeli='$sid'");



        $query= mysqli_query($konek,"UPDATE barang SET stok=$stok-$jml where kd_barang='$id'");


    	$ketemu=mysqli_num_rows($sql);
    	if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
        mysqli_query($konek,"INSERT INTO transaksi (id_barang, jumlah_barang, id_pembeli,status)
                VALUES ('$id', '$jml', '$sid','Belum Bayar')");

        echo "insert";
        header("Location:belanjaan-saya.php"); 
    	} 
    	else {
        //  kalau barang ada, maka di jalankan perintah update
        mysqli_query($konek,"UPDATE transaksi
                SET jumlah_barang = jumlah_barang+$jml
                WHERE id_pembeli ='$sid' AND id_barang='$id'"); 
        echo "update";
                header("Location:belanjaan-saya.php");      
    }   
}
?>	
 
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