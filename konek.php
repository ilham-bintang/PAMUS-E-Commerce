<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	$host="localhost";
	$user="root";
	$pass="";
	$db="pamus";
	$konek=mysqli_connect($host,$user,$pass) or die ("Koneksi Gagal!");
	mysqli_select_db ($konek,$db);
?>