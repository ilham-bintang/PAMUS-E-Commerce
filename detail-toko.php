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
<h1 align="center" class="w3-panel w3-light-blue w3-card-8">DETAIL TOKO</h1>
<div >
<table align="center" class="w3-tables w3-border">
<?php
 		require_once("konek.php") ;

 		$pen=$_GET['id'];
    $toko=$_GET['toko'];
 		$hasil=mysqli_query($konek, "SELECT * from toko,penjual where toko.id_penjual=penjual.id_penjual and id_toko ='$toko'");
  		while ($baris=mysqli_fetch_assoc($hasil)):
  		$id=$baris['id_penjual'];
  		$nama=$baris['nama_penjual'];
  		$username=$baris['username'];
  		$alamat=$baris['alamat'];
  		$no_hp=$baris['no_hp'];
  		$gambarpen=$baris['gambar_penjual'];
      $gambar=$baris['gambar_toko'];
  		$jenis=$baris['jk'];
      $idtoko=$baris['id_toko'];
      $namatoko=$baris['nama_toko'];
      $alamattoko=$baris['alamat_toko'];
?>
	<tr>
		<td width="200px">
			<img src="foto/toko/<?php echo $baris['gambar_toko']; ?>" width='200px'>
		</td>
		<td width="800px">
			<table align="center" class="w3-tables" width="100%">
				<tr>
          <td width="200px">ID toko</td>
          <td><?php echo $baris['id_toko']; ?></td>
        </tr>
        <tr>
          <td width="200px">Nama Toko</td>
          <td><?php echo $baris['nama_toko']; ?></td>
        </tr>
        <tr>
          <td width="200px">Alamat Toko</td>
          <td><?php echo $baris['alamat_toko']; ?></td>
        </tr>

        <tr>
					<td width="200px">id penjual</td>
					<td><?php echo $baris['id_penjual']; ?></td>
				</tr>
				<tr>
					<td>Nama Penjual</td>
					<td><?php echo $baris['nama_penjual']; ?></td>
				</tr>
				
				<tr>
					<td>email</td>
					<td><?php echo $baris['email']; ?></td>
				</tr>
				<tr>
					<td>Kontak</td>
					<td><?php echo $baris['no_hp']; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td><?php echo $baris['jk']; ?></td>
				</tr>
			</table>
		</td>
	</tr>
<?php endwhile; ?>
    <tr>
    <td  align="center">
      <button type="submit" class="w3-btn w3-blue"> 
      <a href='<?php echo "penjual.php?id=$id"; ?>'> DETAIL PEMILIK</a> </button>
    </td>
  </tr>

</table>
<br>
</div>



<br><br>
<h1 align="center" class="w3-panel w3-light-blue w3-card-8">BARANG DARI TOKO</h1>



<?php
include ("konek.php");
$pen=$_GET['toko'];
$query=mysqli_query($konek, "SELECT * FROM barang where id_toko='$pen'");
$gambar=$baris['gambar_barang'];

?>
 
<table cellpadding='50' align="center">
<tr> 
<?php
  $jml_kolom=3;
  $cnt = 0;
  while($data=mysqli_fetch_object($query))
  {
      if ($cnt >= $jml_kolom) 
      {
          echo "</tr><tr>";
          $cnt = 0;
    }
    $cnt++;
    $id=$data->kd_barang;
    /*  $id=$data['kd_barang'];*/
    
    /*while ($baris=mysqlI_fetch_assoc($query)): */
  ?>
    
     <td align=center>       
      <div>
        <img src="foto/<?php echo $data->gambar_barang ?>" height='200px'>
      </div>
      <div>
        <?php echo $data->nama_brg; ?>
      </div>     
      <div>
        <?php echo $data->desk; ?>
      </div> 
      <div>
        <?php echo $data->harga; ?>
      </div> 
        <a href="<?php echo "detail-barang.php?id=$id";?>">
          <button type="submit" name="submit" class="w3-btn w3-blue"> LIHAT</button>
        </a>
    

     </td>
  <?php
/*  endwhile;*/
  }
  ?>
 
  </tr>
</table>




<br>
<br>

<?php
include 'partial/footer.php';
?>

</body>
</html>