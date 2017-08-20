<!DOCTYPE html>
<html>
<head>
	<title>PAMUS</title>
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>

 <script type="text/javascript" src="js/javascript.js">
	
</script>

 <?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
 include 'konek.php';
	include 'partial/header.php';
	include 'partial/title.php';

	?>

 
  

<br>

<table width="500px" align="center">
<tr>
	<td >
		<div align="center" class="w3-container w3-blue">
  			<h1>Login Admin</h1>
		</div>
	</td>
</tr>
<tr >
<td class="w3-border">
<form class="w3-container " action="cek-login-admin.php" method="POST">
  <p>
  <label class="w3-label w3-text-blue">Username</label>
  <input class="w3-input w3-border" type="text" name="uname"></p>
  <p>      
  <label class="w3-label w3-text-blue">Password</label>
  <input class="w3-input w3-border" type="password" name="psw"></p>
<div align="center">
	<button class="w3-btn w3-blue" >LOGIN</button></p>
</div>
</td>
</tr>
</table>
</form>

<br><br>
<br><br>
<br>

<?php
include 'partial/footer.php';
?>

</body>
</html>