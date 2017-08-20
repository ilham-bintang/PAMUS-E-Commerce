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

<br>
<h1 align="center">DETAIL TRANSAKSI</h1>
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php");
 		if(!isset($_SESSION)) 
   			 { 
     		   session_start(); 
   			 }
   	$sid=$_GET['username'];//id pembeli
    $id=$_GET['id'];
	$sql = mysqli_query($konek,"SELECT * FROM transaksi, barang WHERE id_pembeli='$sid' AND transaksi.id_barang=barang.kd_barang");       
	while($d=mysqli_fetch_assoc($sql)){
		$harga=$d[harga];
		$jumlah=$d[jumlah];
        $subtotal    = $harga * $jumlah ;
        $total       = $total + $subtotal;
        
        echo"
        <tr>
        	<td>$d[nama_brg]</td>
            <td>$d[jumlah]</td>
            <td>$d[harga]</td>
            <td>$subtotal</td>
        </tr>";
        echo $d['harga'];
        echo $d['jumlah_barang'];
}
echo"</table>
<h2>Total Belanja : <b>
$total
</b></h2>
<ul>
<li><a href='daftar_produk.php'>Tambah Barang</a></li>
<li><a href='selesai.php'>Selesai belanja</a></li>";
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