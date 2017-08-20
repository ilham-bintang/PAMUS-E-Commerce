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
  include('partial/header.php');
  include 'partial/title.php';
  include 'partial/kolom-cari.php';
  ?>

<br>
<h1 align="center">KATALOG</h1>

<?php
include ("konek.php");

$batas = 3;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

if ( empty( $pg ) ) {
  $posisi = 0;
  $pg = 1;
} 

else {
  $posisi = ( $pg - 1 ) * $batas;
}

$query=mysqli_query($konek, "SELECT * FROM barang order by kd_barang desc");
$no = 1+$posisi;
?>
 
<table cellpadding='50' align="center" class="w3-border w3-right">
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
    
     <td align=center width="30%">       
        <a href="<?php echo "detail-barang.php?id=$id";?>">
        <div class="w3-border">
      <div>
        <img src="foto/<?php echo $data->gambar_barang; ?>" height='200px'>
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
          <!--   -->
          </div>
        </a>
     </td>
  <?php
/*  endwhile;*/
  $no++;
  }
  ?>
 
  </tr>
</table>

<?php
//hitung jumlah data
$jml_data = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM barang"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas


$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
?>


<!-- <table border='1' style="border-collapse:collapse" cellpadding="5px">

<tr>
<th>No</th>
<th>Nama Negara</th>
<th>Kode Negara</th>
</tr>
 --> 
<!-- <?php
$batas = 10;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}
 
$sql = mysql_query("SELECT * FROM countries limit $posisi, $batas");
$no = 1+$posisi;
while ( $r = mysql_fetch_assoc( $sql ) ) {
?>
<tr align="center">
<td><?= $no; ?></td>
<td><?= $r['country_name']; ?></td>
<td><?= $r['country_code']; ?></td>
</tr>
<?php
$no++;
}
?>
<tr>
<td colspan="3">
<?php
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM countries"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>Sebelumnya </a>";
} else {
$prev = "Sebelumnya ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
 
//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = " <a href='?pg=$link'>Selanjutnya</a>";
} else {
$next = " Selanjutnya";
}
 
//Tampilkan navigasi
echo $prev . $nmr . $next;
?>
</td>
</tr>
</table>
<br />
Total Data Anda adalah :<b> <?php echo $jml_data; ?> </b> -->
<br>
<br>

<?php
include 'partial/footer.php';
?>

</body>
</html>