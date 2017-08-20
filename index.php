<?php
require "konek.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/style.css">
  
</head>
<body>

<?php
	if(!isset($_SESSION)) 
    	{ 
        	session_start(); 
    	}

	include 'partial/header.php';
	include 'partial/title.php';
	echo "<br>";
	include 'partial/kolom-cari.php';
?>


<br>
<table width="100%">
<tr>
<td>

<a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
<a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)">&#10095;</a>

<div class=" mySlides">
  <img src="img/slider/1.jpg" style="width:100%">
  
</div>

<div class="w3-display-container mySlides">
  <img src="img/slider/2.jpg" style="width:100%">
  
</div>

<div class="w3-display-container mySlides">
  <img src="img/slider/3.jpg" style="width:100%">
</div>

<div class="w3-display-container mySlides">
  <img src="img/slider/4.jpg" style="width:100%">
</div>

<div class="w3-display-container mySlides">
<img src="img/slider/5.jpg" style="width:100%">
</div>


</td>
</tr>
</table>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<br>

<br>
<br>

<table align="center" width="100%">
	<tr>
		<td colspan="5" width="30%" align="center">ANTING</td>
		<td colspan="5" width="30%" align="center">GELANG</td>
		<td colspan="5" width="30%" align="center">KALUNG</td>
	</tr>
<?php
$query=mysqli_query($konek, "SELECT * FROM barang order by kd_barang desc limit 6");
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
 
  }
  ?>
 
  </tr>
</table>


	<tr>
		<td height="80px" ><img src="img/5.jpg" class="gambar"></td>
		<td><img  src="img/1.jpg" class="gambar"></td>
		<td><img src="img/2.jpg" class="gambar"></td>
		<td><img src="img/3.jpg" class="gambar"></td>
		<td><img src="img/4.jpg" class="gambar"></td>
		

		<td><img src="img/1.jpg" class="gambar"></td>
		<td><img src="img/2.jpg" class="gambar"></td>
		<td><img src="img/3.jpg" class="gambar"></td>
		<td><img src="img/4.jpg" class="gambar"></td>
		<td><img src="img/5.jpg" class="gambar"></td>
		

		<td><img src="img/1.jpg" class="gambar"></td>
		<td><img src="img/2.jpg" class="gambar"></td>
		<td><img src="img/3.jpg" class="gambar"></td>
		<td><img src="img/4.jpg" class="gambar"></td>
		<td><img src="img/5.jpg" class="gambar"></td>
		
	</tr>
</table>

<?php
	include 'partial/footer.php';
?>

</body>
</html>