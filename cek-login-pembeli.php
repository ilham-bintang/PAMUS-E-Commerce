<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style">
	<style type="text/css">
		h2{
			align:center;
		}
	</style>
</head>
<body>


<?php
include 'partial/header.php';
include 'partial/title.php';

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require "konek.php";
	$username=$_POST['uname'];
	$password=$_POST['psw'];
	$cekuser=mysqli_query($konek, "SELECT * from pembeli where username='$username' and password='$password'");
	$jumlah=mysqli_num_rows($cekuser);
	$hasil=mysqli_fetch_array($cekuser);

	if($jumlah==0){
	?>
		
		<br><br><br>
		
			<h2 align="center" style="color:red;">USERNAME TERSEBUT BELUM TERDAFTAR SEBAGAI PEMBELI</h2><br>
		</table>
		<h3 align="center"><a href="login-pembeli.php" style="text-decoration: none"> Kembali </a></h3>';
		
		<?php	
	}

	else{
			$_SESSION['username']=$hasil['id_pembeli'];
			$_SESSION['badge']=$hasil['username'];
			$_SESSION['level']='pembeli';
			 header("location: index.php");
			 echo "selamat datang $username";
		
	}
?>
</body>
</html>